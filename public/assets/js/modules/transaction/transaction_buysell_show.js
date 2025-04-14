var xtr_id = 0;
var xcashierby = 0;
var xcashierby_name = '';
$(".dropbtn").hide();
$("#btn-submit").hide();
$("#btn-cancel").hide();
$("#btn-pdf").hide();
back_to_page_show();

function back_to_page_show(){
    show_header(id_tr_header);
    show_detail(id_tr_header);
}  

function show_header($id){
    if( typeof(customerId) !== 'undefined') {
        if(customerId !== null && customerId !== '') {
            $.ajax({
                url: baseUrl + "transaction/transaction_buysell/show_header",
                type: 'POST',
                data: {'customer_id' : customerId, 'tr_id' : xtr_id, 'id' : $id},
                datatype: 'json',
                success: function(data){
                    if (data !== '[]'){
                        var d = JSON.parse(data)[0];
                        xtr_id = d.tr_id;
                        if(xtr_id === '1'){
                            $("#trx_name").html('<span style="color:blue;font-weight:bold;font-size:16px;">Buy / Beli</span>');
                        }
                        if(xtr_id === '2'){
                            $("#trx_name").html('<span style="color:red;font-weight:bold;font-size:16px;">Sell / Jual</span>');
                        }
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
                        
                        $(".dropbtn").hide();
                        $("#btn-payment").hide();
                        $("#btn-submit").hide();
                        $("#btn-cancel").hide();
                        $("#btn-pdf").hide();                        
                        if(Number(d.createdby) === Number(userId)){
                            switch(Number(d.status)) {
                                case 1:     
                                    $(".dropbtn").hide();
                                    $("#btn-payment").hide();           
                                    $("#btn-submit").hide();
                                    $("#btn-cancel").show();
                                    $("#btn-pdf").hide();
                                    break;
                                case 2:
                                    $(".dropbtn").show();
                                    $("#btn-payment").hide();
                                    $("#btn-submit").hide();
                                    $("#btn-cancel").show();
                                    $("#btn-pdf").show();
                                    break;
                                case 3:
                                    $(".dropbtn").show();
                                    if(Number(Apimethod) === 1){                                            
                                        $("#btn-submit").show();
                                    }
                                    $("#btn-payment").show();
                                    $("#btn-cancel").show();
                                    $("#btn-pdf").show();              
                                    break;
                                case 4:
                                    $(".dropbtn").show();
                                    if(Number(Apimethod) === 1){                                          
                                        $("#btn-submit").show();
                                    }
                                    $("#btn-payment").show();
                                    $("#btn-cancel").show();
                                    $("#btn-pdf").show();              
                                    break;
                                case 9:
                                    $(".dropbtn").show();
                                    $("#btn-payment").hide();
                                    $("#btn-submit").hide();
                                    $("#btn-cancel").show();
                                    $("#btn-pdf").show();                                           
                                    break;
                                default:
                                    $(".dropbtn").hide();
                                    $("#btn-payment").hide();
                                    $("#btn-submit").hide();
                                    $("#btn-cancel").hide();
                                    $("#btn-pdf").hide();
                                    break;
                            }
                        }                      
                                                
                        $("#created").html(d.created);
                        $("#created_by").html(d.createdby_name.trim());
                        if(d.status == '2'){
                            $("#updated").html(d.updated);
                            $("#updated_by").html(d.updatedby_name.trim());
                        }                            

                        $("#customer_name").html(d.customer_name.trim());
                        $("#customer_address").html(d.customer_address.trim());
                        $("#customer_act_on").html(d.customer_act_on);
                        $("#customer_source").html(d.customer_source);
                        $("#customer_purpose").html(d.customer_purpose);

                        if(d.cashierby !== null){
                            xcashierby = d.cashierby;
                            xcashierby_name = d.cashierby_name;                            
                        }                        
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

function show_detail($header_id){
    if( typeof(customerId) !== 'undefined') {
        if(customerId !== null && customerId !== '') {
            $('#table-detail tbody').empty();
            var counter = document.getElementById('table-detail').rows.length;
            $.ajax({
                url: baseUrl + 'transaction/transaction_buysell/show_detail',
                type: 'POST',
                data: {'customer_id' : customerId, 'tr_id' : xtr_id, 'header_id' : $header_id},
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
                                    <td style='text-align:left;font-weight:bold;font-size:15px;'>
                                        Rp. ` + formatRupiah(totalpricex) + `
                                    </td>                         
                                </tr>`   
                        $('#table-detail tbody').append(rowsx);     
                        $("#modal_total_value").val(formatRupiah(totalpricex));
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

function show_detail_payment($header_id){
    $('#table-modal-payment tbody').empty();
    var counter = document.getElementById('table-modal-payment').rows.length;
    $("#modal_remaining_payment_value").val($("#modal_total_value").val());
    $.ajax({
        url: baseUrl + 'transaction/transaction_buysell/show_detail_payment',
        type: 'POST',
        data: {'header_id' : $header_id},
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
                                        <td width="20%" style="vertical-align: middle;color:black">
                                            ` + d.payment_type_name +`
                                            <a style="color:red; cursor:pointer" title="hapus" onClick="delete_line_detail_payment(` + d.id + `)"> 
                                                <i>remove<i>
                                            </a>
                                        </td>
                                        <td width="30%" style='text-align:left;'>
                                            ` + d.cb_name.trim() + `
                                        </td>                                        
                                        <td width="30%" style='text-align:left;'>
                                            ` + d.cb_pos_name.trim() + `
                                        </td>                                        
                                        <td width="15%" style='text-align:left;'>
                                            ` + (isDecimal(d.amount) ? formatDecimal(d.amount,2) : formatRupiah(d.amount) ) + `
                                        </td>
                                    </tr>`
                    $('#table-modal-payment tbody').append(rows);
                    counter++;
                });
                var rowsx =`<tr>
                                <td colspan="4" style='vertical-align:middle;text-align:center;background-color:#e3e4e6;font-weight:bold;font-size:14px;'>
                                    Total Payment Value
                                </td>
                                <td style='text-align:left;font-weight:bold;font-size:15px;'>
                                    Rp. ` + formatRupiah(totalpaymentx) + `
                                </td>                         
                            </tr>`   
                $('#table-modal-payment tbody').append(rowsx); 
                $("#modal_remaining_payment_value").val(formatRupiah( formatRupiahtoNumber($("#modal_total_value").val()) - (totalpaymentx) ));
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

function delete_line_detail_payment($id){
    if( typeof($id) != 'undefined' && $id !== null && $id !== '' ) {
        $.ajax({
            url : baseUrl +  'transaction/transaction_buysell/delete_detail_payment',
            type: 'POST',
            data: {'id' : $id },
            datatype: 'json',
            success: function(data){
                show_detail_payment(id_tr_header);
                alertify.success("Delete Item Success");
            },
            error: function(xhr){                
                alertify.error("error");
                StringtoFile(xhr.responseText, 'error');
            }
        });
    }       
}

function reset_form_input_payment(){
    $("#modal_payment_type").html('').sel2dma();
    $("#cb_id").html('').sel2dma();
    $("#cb_pos_id").html('').sel2dma();
    $("#modal_payment_amount").val('');
    $("#terbilang_modal_payment_amount").html('');
}   

$("#btn-payment").on('click', function (e) {
    e.preventDefault();
    $(".modal-dialog").width('1200px');
    $("#ModalPayment").modal('show');
    $("#modal_cashierby").empty();
    if(xcashierby !== 0){
        $("#modal_cashierby").html('<option value="' + xcashierby + '">' + xcashierby_name + '</option>');
    }
    $.ajax({
        type: "GET",
        url: baseUrl + 'user/user/getdatacashier',
        dataType: "json",
        success: function(data) {            
            $("#modal_cashierby").append("<option value=''>Pilih Kasir...</option>");
            $.each(data, function(index, d) {
                $("#modal_cashierby").append("<option value='" + d.id + "'>" + d.fullname + "</option>");
            });
        }
    });
    reset_form_input_payment();
    show_detail_payment(id_tr_header);                 
});
$("#modal_payment_type").on("change", function(e) {
    e.preventDefault();
    if( formatRupiahtoNumber($("#modal_remaining_payment_value").val()) > 0) {
        $("#modal_payment_amount").val( formatRupiahtoNumber($("#modal_remaining_payment_value").val()) );
        $("#terbilang_modal_payment_amount").html('<i>Payment Value</i> : ' + bksfn.terBilang( $("#modal_payment_amount").val( )));

        $('#cb_id').html('').sel2dma();
        $('#cb_id').prop('disabled', false);
        $('#cb_id').focus()
        $.ajax({
            url : baseUrl +  'master_data/m_cb/getmcbpayment',
            type: 'POST',
            data: {'cb_id' : $(this).val()},
            datatype: 'json',
            success: function(data){
                $('#cb_id').html(data);
            },
            error: function(){
                alert("can't get store");  
            }
        });        
    } else {
        reset_form_input_payment();
    }    
});

$('#cb_id').on('change',function(e){
    e.preventDefault()
    if($(this).val() != null && $(this).val() != ''){
        $('#cb_pos_id').html('').sel2dma();
        $('#cb_pos_id').prop('disabled', false);
        $('#cb_pos_id').focus()
        $.ajax({
            url : baseUrl +  'master_data/m_cb_pos/getmcbpospayment',
            type: 'POST',
            data: {'cb_id' : $(this).val(), 'tr_id' : xtr_id, 'paymenttype_id' : $("#modal_payment_type").val()},
            datatype: 'json',
            success: function(data){
                $('#cb_pos_id').html(data);
            },
            error: function(){
                alert("can't get store");  
            }
        });
    }
});

$("#modal_payment_amount").keyup(function(e) {
    e.preventDefault();
    $(this).val($(this).val());
    if( Number($(this).val()) > 0 ){
        $("#terbilang_modal_payment_amount").html('<i>Payment Value</i> : ' + bksfn.terBilang($(this).val()));
    }
}); 
$("#btn-modal-add-row-payment").on('click', function (e) {
    e.preventDefault();
    if( $("#modal_cashierby").val() === '' || $("#modal_cashierby").val() === null) {
        bksfn.errMsg('Kasir belum diinput!');
    } else if( $("#modal_payment_type").val() === '' || $("#modal_payment_type").val() === null) {
        bksfn.errMsg('tipe pembayaran belum diinput!');
    } else if( $("#modal_payment_amount").val() === '' || $("#modal_payment_amount").val() === null || Number($("#modal_payment_amount").val()) <= 0) {
        bksfn.errMsg('jumlah pembayaran belum diinput!');
    } else {
        $.post(baseUrl + 'transaction/transaction_buysell/insert_payment', $("#mainFormModalPayment").serialize() + "&header_id=" + id_tr_header + "&cashierby=" + $("#modal_cashierby").val(), function (obj) {
            if (obj.msg == 1) {
                alertify.success('Data add success!');
                reset_form_input_payment();
                show_detail_payment(id_tr_header);                
                back_to_page_show();
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
$("#btn-modal-payment-close").on('click', function (e) {
    e.preventDefault();
    $("#ModalPayment").modal('hide');
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
                            // history.go(0);
                        } else {
                            back_to_page_show();
                            // history.go(0); // untuk memuat ulang halaman tanpa cache.
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

$("#btn-submit").on('click', function (e) {
    e.preventDefault();
    alertify.confirm("are you sure, Submit to ECSys applicatoin Angkasapura ?", function (x) {
        if (x) {
            api_ap_input_trx(id_tr_header);
            history.go(0);
        }
    });
});

$("#customer_name").on('click', function (e) {
    e.preventDefault();
    if(Number(usergroupId) !== 6){
        var url = "transaction/customer_form/index/"+customerId;
        $.ajax({
            url: url,
            type: 'POST',
            success: function() {            
                window.open(url,'_self'); 
            },
            error: function(){
                alertify.error("can't open page");
            }
        });
    }
});

$("#btn_cashier_save").on('click', function (e) {
    e.preventDefault();
    if($("#modal_cashierby").val() === '' || $("#modal_cashierby").val() === null ){
        bksfn.errMsg('kasir belum di input!');
    } else {            
        $.ajax({
            url: baseUrl + 'transaction/transaction_buysell/update_payment_cashierby',
            type: 'POST',
            data: {'id' : id_tr_header, 'cashierby' : $("#modal_cashierby").val()},
            datatype: 'json',
            success: function() {
                show_header(id_tr_header);
                alertify.success('Edit Success!');
            },
            error: function(xhr){
                alertify.error("error");
                StringtoFile(xhr.responseText, 'error');
            }
        });           
    }          
});

$("#btn-pdf").on('click', function (e) {
    e.preventDefault();
    // alertify.confirm("export to Pdf Trx. No " + document.getElementById('tr_number').innerText + " ?", function (e) {    
    //     if (e) {                
            var url = "transaction/transaction_buysell/printnota/" + id_tr_header + "/" + xtr_id;
            $.ajax({
                url: url,
                type: 'POST',
                success: function(resp){
                    // window.open(url,'_self').contentWindow.print();;
                    // window.print();            
                    document.location.href = url; 
                },
                error: function(xhr){
                    alertify.error("error can't print");
                    StringtoFile(xhr.responseText, 'error');
                }
            });                                       
    //     }    
    // });  
});