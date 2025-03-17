(function ($) {    
    var xtr_id = (decrypt(tr_uri_code) === 'buy' ? 1 : decrypt(tr_uri_code) === 'sell' ? 2 : 0);
    $("#btn-submit").hide();
    $("#btn-cancel").hide();
    $("#btn-pdf").hide();
    back_to_page_show();

    function back_to_page_show(){
        show_header(id_tr_header);
        show_detail(id_tr_header);
    }  

    function show_header(id){
        if( typeof(customerId) !== 'undefined') {
            if(customerId !== null && customerId !== '') {
                $.ajax({
                    url: baseUrl + "transaction/transaction_buysell_show/show_header",
                    type: 'POST',
                    data: {'customer_id' : customerId, 'tr_id' : xtr_id, 'id' : id},
                    datatype: 'json',
                    success: function(data){
                        if (data !== '[]'){
                            var d = JSON.parse(data)[0];

                            if(Number(d.status) === 1){ // back to task
                                if(Number(d.tr_id) === 1){
                                    url = call_page_task_buy(d.customer_id,d.id);
                                }
                                if(Number(d.tr_id) === 2){
                                    url = call_page_task_sell(d.customer_id,d.id);
                                }         
                                if(url !== ''){
                                    $.ajax({
                                        url: url,
                                        type: 'POST',
                                        success: function() {
                                            window.open(url,'_self'); 
                                        },
                                        error: function(){
                                            alertify.error("can't open page.!");
                                        }
                                    });    
                                }                       
                            }

                            $("body").data("id", d.id);
                            $("#store_address").html(d.store_address);
                            $("#tr_number").html(d.tr_number);
                            $("#tr_date").html(bksfn.revDate(d.tr_date));  
                            $("#ftitle").html(d.status == 2 ? '<span style="color:red;font-weight:bolder;">'+d.status_name+'</span>' : d.status_name);
                            $("#description_header").html(d.description);

                            if(Number(d.createdby) === Number(userId)){
                                switch(Number(d.status)) {
                                    case 1:                
                                        $("#btn-submit").hide();
                                        $("#btn-cancel").show();
                                        $("#btn-pdf").show();
                                        break;
                                    case 2:
                                        $("#btn-submit").hide();
                                        $("#btn-cancel").hide();
                                        $("#btn-pdf").show();
                                        break;
                                    case 3:
                                        if(Number(Apimethod) === 1){                                            
                                            $("#btn-submit").show();
                                        }
                                        $("#btn-cancel").show();
                                        $("#btn-pdf").show();              
                                        break;
                                    case 4:
                                        $("#btn-submit").hide();   
                                        $("#btn-cancel").show();
                                        $("#btn-pdf").show();                                           
                                        break;
                                    default:
                                        $("#btn-submit").hide();
                                        $("#btn-cancel").hide();
                                        $("#btn-pdf").hide();
                                        break;
                                }
                            }
                            
                            if(Number(d.createdby) !== Number(userId)){
                                $("#btn-submit").hide();
                                $("#btn-cancel").hide();
                                $("#btn-pdf").hide();
                            }
                            
                            $("#created_by").html('Created by : '+d.createdby_name +' - '+d.created);
                            if(d.status == '2'){
                                $("#cancel_by").html('Canceled by : '+d.updatedby_name +' - '+d.updated);
                            }                            

                            $("#customer_name").html(d.customer_name.trim() + ' ( ' + d.customer_address.trim() + ' )');
                            $("#customer_act_on").html(d.customer_act_on);
                            $("#customer_source").html(d.customer_source);
                            $("#customer_purpose").html(d.customer_purpose);
                        } else{                        
                            var url = "transaction/customer/index/";
                            window.open(url,'_self');    
                        }               
                    },
                    error: function(xhr){
                        alertify.error("error");
                        StringtoFile(xhr.responseText, 'error');
                    }
                });
            }
        }        
    }

    function show_detail(header_id){
        if( typeof(customerId) !== 'undefined') {
            if(customerId !== null && customerId !== '') {
                $('#table-detail tbody').empty();
                var counter = document.getElementById('table-detail').rows.length;
                $.ajax({
                    url: baseUrl + 'transaction/transaction_buysell_show/show_detail',
                    type: 'POST',
                    data: {'customer_id' : customerId, 'tr_id' : xtr_id, 'header_id' : header_id},
                    dataType: 'json',
                    success: function (data) {
                        if (data !== '[]' && data.length > 0){
                            var totalpricex = 0;
                            $.each(data, function (i, d) {                 
                                totalpricex += Number(d.subtotal);
                                var rows =`<tr id="` + counter + `">
                                            <td width="5%" style="text-align:center;vertical-align:middle">
                                                ` + counter + `
                                            </td>
                                            <td width="30%" style="vertical-align: middle;color:black">
                                                ` + d.currency_code + ' - ' + d.currency_name +`                       
                                            </td>
                                            <td width="10%" style='text-align:left;'>
                                                ` + formatRupiah(d.nominal) + `
                                            </td>
                                            <td width="10%" style='text-align:left;'>
                                                ` + formatRupiah(d.sheet) + `
                                            </td>
                                            <td width="15%" style='text-align:left;'>
                                                ` + formatRupiah(d.nominal * d.sheet) + `
                                            </td>
                                            <td width="15%" style='text-align:left;'>
                                                ` + (isDecimal(d.price) ? formatDecimal(d.price,2) : formatRupiah(d.price) ) + `
                                            </td>
                                            <td width="15%" style='text-align:left;'>
                                                ` + formatRupiah(d.subtotal) + `
                                            </td>
                                        </tr>`
                                $('#table-detail tbody').append(rows);
                                counter++;
                            });
                            var rowsx =`<tr>
                                        <td colspan="6" style='vertical-align:middle;text-align:center;background-color:#e3e4e6;font-weight:bold;font-size:14px;'>
                                        <i>Say</i> : ` + bksfn.terBilang(totalpricex) + `
                                        </td>
                                        <td style='text-align:left;background-color:#f1f5f9;font-weight:bold;font-size:15px;'>
                                            Rp. ` + formatRupiah(totalpricex) + `
                                        </td>                         
                                    </tr>`   
                            $('#table-detail tbody').append(rowsx);     
                        }else{
                            var url = "transaction/customer/index/";
                            window.open(url,'_self');
                        }
                    },
                    error: function(xhr){
                        alertify.error("error");
                        StringtoFile(xhr.responseText, 'error');
                    }
                });
            }
        }        
    }

    function show_detail_payment(header_id){
        $('#table-detail tbody').empty();
        var counter = document.getElementById('table-modal-payment').rows.length;
        $.ajax({
            url: baseUrl + 'transaction/transaction_buysell/show_detail_payment',
            type: 'POST',
            data: {'header_id' : header_id},
            dataType: 'json',
            success: function (data) {
                if (data !== '[]' && data.length > 0){
                    var totalpaymentx = 0;
                    $.each(data, function (i, d) {                 
                        totalpaymentx += Number(d.amount);
                        var rows =`<tr id="` + counter + `">
                                    <td width="5%" style="text-align:center;vertical-align:middle">
                                        ` + counter + `
                                    </td>
                                    <td width="30%" style="vertical-align: middle;color:black">
                                        ` + d.payment_type_name +`
                                    </td>
                                    <td width="15%" style='text-align:left;'>
                                        ` + (isDecimal(d.amount) ? formatDecimal(d.amount,2) : formatRupiah(d.amount) ) + `
                                    </td>
                                    <td width="50%" style='text-align:left;'>
                                        ` + d.payment_description + `
                                    </td>
                                </tr>`
                        $('#table-modal-payment tbody').append(rows);
                        counter++;
                    });
                    var rowsx =`<tr>
                                <td colspan="3" style='vertical-align:middle;text-align:center;background-color:#e3e4e6;font-weight:bold;font-size:14px;'>
                                <i>Say</i> : ` + bksfn.terBilang(totalpaymentx) + `
                                </td>
                                <td style='text-align:left;background-color:#f1f5f9;font-weight:bold;font-size:15px;'>
                                    Rp. ` + formatRupiah(totalpaymentx) + `
                                </td>                         
                            </tr>`   
                    $('#table-modal-payment tbody').append(rowsx);     
                }else{
                    return false;
                }
            },
            error: function(xhr){
                alertify.error("error");
                StringtoFile(xhr.responseText, 'error');
            }
        });
    }    
    

    $("#customer_name").on('click', function (e) {
        e.preventDefault();
        var url = "transaction/customer_form/index/"+customerId;
        $.ajax({
            url: url,
            type: 'POST',
            success: function() {            
                window.open(url,'_blank'); 
            },
            error: function(){
                alertify.error("can't open page");
            }
        }); 
    });

    $("#btn-payment").on('click', function (e) {
        e.preventDefault();
        $(".modal-dialog").width('1200px');
        $("#ModalPayment").modal('show');                    
    });
    $("#btn-modal-payment-close").on('click', function (e) {
        e.preventDefault();
        $("#ModalPayment").modal('hide');
    });
    // $("#modal_payment_amount").keyup(function(e) {
    //     e.preventDefault();
    //     $(this).val(bksfn.toRp($(this).val()));
    // }); 
    $("#btn-modal-add-row-payment").on('click', function (e) {
        e.preventDefault();
        if( $("#modal_payment_type").val() === '' || $("#modal_payment_type").val() === null) {
            bksfn.errMsg('tipe pembayaran belum diinput!');
        } else if( $("#modal_payment_type").val() === '' || $("#modal_payment_type").val() === null) {
            bksfn.errMsg('tipe pembayaran belum diinput!');
        } else {
            $.post(baseUrl + 'transaction/transaction_buysell/insert_payment', $("#mainFormModalPayment").serialize() + "&header_id=" + id_tr_header, function (obj) {
                if (obj.msg == 1) {
                    alertify.success('Data add success!');
                    show_detail_payment(id_tr_header);
                } else {
                    alertify.error("error");
                    StringtoFile(xhr.responseText, 'error');
                }
            }, "json").fail(function (xhr) {        
                alertify.error("error");
                StringtoFile(xhr.responseText, 'error');
            });
        }
    });   
    $("#btn-modal-payment").on('click', function (e) {
        e.preventDefault();
        if( document.getElementById('table-modal-payment').rows.length < 2 ) {
            bksfn.errMsg('pembayaran belum diinput!');
        } else {            
            alertify.confirm("are you sure, SAVE payment transaction ?", function (x) {
                if (x) {$.ajax({
                        url: baseUrl + 'transaction/transaction_buysell/insert_payment',
                        type: 'POST',
                        data: {'id' : id_tr_header},
                        datatype: 'json',
                        success: function() {
                            back_to_page_show();
                            alertify.success('Payment Transaction Success!');
                            $("#ModalPayment").modal('hide');                
                        },
                        error: function(xhr){
                            alertify.error("error");
                            StringtoFile(xhr.responseText, 'error');
                            back_to_page_show();
                        }
                    });                                                    
                } else {
                    back_to_page_show();
                }   
            });            
        }          
    });

    $("#btn-cancel").on('click', function (e) {
        e.preventDefault();
        $(".modal-dialog").width('1000px');
        $("#ModalCancel").modal('show');
    });    
    $("#btn-modal-cancel-close").on('click', function (e) {
        e.preventDefault();
        $("#ModalCancel").modal('hide');
    });    
    $("#btn-modal-cancel").on('click', function (e) {
        e.preventDefault();
        if($("#modal-cancel-description").val() === '' || $("#modal-cancel-description").val() === null ){
            bksfn.errMsg('Alasan batal belum di input!');
        } else {            
            alertify.confirm("are you sure, CANCEL transaction ?", function (x) {
                if (x) {
                    $.ajax({
                        url: baseUrl + 'transaction/transaction_buysell/cancel_trx',
                        type: 'POST',
                        data: {'id' : id_tr_header, 'description' : $("#modal-cancel-description").val()},
                        datatype: 'json',
                        success: function() {
                            if(Number(Apimethod) == 1){
                                api_ap_adjustment_trx(id_tr_header);
                            } else {
                                back_to_page_show();
                                alertify.success('CANCEL Transaction Success!');
                            }         
                            $("#ModalCancel").modal('hide');                
                        },
                        error: function(xhr){
                            alertify.error("error");
                            StringtoFile(xhr.responseText, 'error');
                            back_to_page_show();
                        }
                    });                                                    
                } else {
                    back_to_page_show();
                }   
            });            
        }          
    });    

    $("#btn-pdf").on('click', function (e) {
        e.preventDefault();
        // alertify.confirm("export to Pdf Trx. No " + document.getElementById('tr_number').innerText + " ?", function (e) {    
        //     if (e) {                
                var url = "transaction/transaction_buysell_show/printnota/" + id_tr_header + "/" + xtr_id;
                $.ajax({
                    url: url,
                    type: 'POST',
                    success: function(resp){
                        window.open(url,'blank');                                                                             
                    },
                    error: function(xhr){
                        alertify.error("error can't print");
                        StringtoFile(xhr.responseText, 'error');
                    }
                });                                       
        //     }    
        // });  
    });

    $("#btn-submit").on('click', function (e) {
        e.preventDefault();
        alertify.confirm("are you sure, Submit to ECSYS applicatoin Angkasapura ?", function (x) {
            if (x) {
                api_ap_input_trx(id_tr_header);
            }
        });
    });    

        
})(jQuery);