(function ($) {
    var storeId = '';
    var xtr_id = (decrypt(tr_uri_code) === 'buy' ? 1 : decrypt(tr_uri_code) === 'sell' ? 2 : 0);
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
                            $("body").data("id", d.id);
                            $("#tr_number").html(': '+d.tr_number);
                            $("#tr_date").html(': '+bksfn.revDate(d.tr_date));
                            $("#ftitle").html(lstatus_name(d.status));
                            
                            $("#created_by").html('Created by : '+d.createdby_name +' | '+d.created);
                            if(d.status == '2'){
                                $("#cancel_by").html('Canceled by : '+d.updatedby_name +' | '+d.updated);
                            }                            

                            $("#customer_name").html(d.customer_code + ' - ' + d.customer_name);

                            $("#store_address").html(d.store_address);   
                            
                            $("#description_header").html(d.description);
                            $("#payment_name").html(d.payment_type_name);
                            $("#cashier_name").html(d.cashier_name);

                            storeId = d.store_id;
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
                                                ` + d.valas_code + ' - ' + d.valas_name +`                       
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
                                                ` + (isDecimal(d.price) ? formatDecimal(d.price,3) : formatRupiah(d.price) ) + `
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

    function lstatus_name(status_id) {
        var status_Id =  Number(status_id);
        var lstatus = '';
        switch(status_Id) {
            case 1:
                lstatus += 'Task';
                $("#btn-submit").hide();
                break;
            case 2:
                lstatus += 'Canceled';
                $("#btn-submit").hide();
                $("#btn-cancel").hide();
                $("#btn-pdf").hide();
                break;
            case 3:
                lstatus += 'Confirm';
                $("#btn-submit").hide();                
                break;

            case 4:
                lstatus += 'API - inputtrx';
                if(Number(Apimethod) == 1){
                    $("#btn-submit").show();
                    $("#btn-cancel").show();
                }                
                $("#btn-submit").hide();                
                break;    
            default:
                lstatus = '';
        }
        return lstatus;
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

    $("#btn-input").on('click', function (e) {
        e.preventDefault();
        alertify.confirm("are you sure, Submit API - Input ?", function (x) {
            if (x) {
                api_ap_input_trx(id_tr_header);
            }
        });
    });    

    // $("li#btn-cancel").click(function(e) {
    $("#btn-cancel").on('click', function (e) {
        e.preventDefault();
        if(Number(Apimethod) == 1){
            alertify.confirm("are you sure, API - Transaction Adjustment ?", function (x) {
                if (x) {
                    api_ap_adjustment_trx(id_tr_header);
                }
            });
        } else {
            alertify.confirm("are you sure, CANCEL transaction ?", function (x) {
                if (x) {
                    $.ajax({
                        url: baseUrl + 'transaction/transaction_buysell/cancel_trx',
                        type: 'POST',
                        data: {'id' : id_tr_header},
                        datatype: 'json',
                        success: function() {
                            back_to_page_show();
                            alertify.success('CANCEL Transaction Success!');
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
        
})(jQuery);