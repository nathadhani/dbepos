var sisa_stock_amount = 0;
var sisa_stock_sheet = 0;
var xtr_id = (decrypt(tr_uri_code) === 'buy' ? 1 : decrypt(tr_uri_code) === 'sell' ? 2 : 0);
back_to_page_ini();

function reset_form_header(){    
    $('#tr_number').prop('disabled', true);
    $("#store_id").html('').sel2dma();
    $("#customer_name").html('');
    $("#customer_soure").html('');
    $("#customer_purpose").html('');
}

function reset_form_input(){
    $("#stock_nominal").html('');
    $("#stock_sheet").html('');
    $("#stock_amount").html('');

    $("#currency_id").html('').sel2dma(); 
    $("#currency_code").html('');

    $("#nominal").val('');
    $("#sheet").val('');
    $('#total_amount').html('');
    $("#price").val('');
    $("#subtotal").val('');
    $("#btn-add-detail-data").focus();
}

function show_customer(){
    if ($("#ftitle").html().substr(0, 3) == "Add") {
        if( typeof(customerId) !== 'undefined') {
            if(customerId !== null && customerId !== '') {
                $.ajax({
                    url: baseUrl + 'transaction/transaction_buysell/show_customer',
                    type: 'POST',
                    data: {'customer_id' : customerId},
                    datatype: 'json',
                    success: function(data){
                        if (data !== '[]'){   
                            var d = JSON.parse(data)[0];
                            $("#customer_name").html(d.customer_name);
                        } else {
                            $("#customer_name").html('');
                            customerId = null;
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
}    

function getcurrencyTrx(company_id, store_id){
    if( typeof(id_header) != 'undefined' && id_header !== null && id_header !== '' ) {
        // $("#currency_id").html('').sel2dma();
        // $.ajax({
        //     url : baseUrl +  'master_data/m_currency/getcurrencyTrx',
        //     type: 'POST',
        //     data: {'company_id' : company_id , 'store_id' : store_id, 'tr_id' : xtr_id},
        //     datatype: 'json',
        //     success: function(data){
        //         $('#currency_id').prop('disabled', false);      
        //         $('#currency_id').html(data);
        //     },
        //     error: function(xhr){
        //         alertify.error("error");
        //         StringtoFile(xhr.responseText, 'error');
        //     }
        // });
        $('#currency_id').prop('disabled', false);
    }    
}

function show_header(){
    reset_form_header();    
    if( typeof(id_header) != 'undefined' && id_header !== null && id_header !== '' ) {    
        if( typeof(customerId) !== 'undefined' && customerId !== null && customerId !== '') {
            $.ajax({
                url: baseUrl + "transaction/transaction_buysell/show_header",
                type: 'POST',
                data: {'customer_id' : customerId, 'tr_id' : xtr_id, 'id' : id_header},
                datatype: 'json',
                success: function(data){
                    if (data !== '[]' && data.length > 0){
                        var d = JSON.parse(data)[0];
                        $('#btn-simpan-header').prop('disabled', false);                        
                        $('#btn-add-row-detail').prop('disabled', false);                        

                        $("#created_by").html('Created by : '+d.createdby_name +' | '+d.created);
                        if(d.status == '2'){
                            $("#cancel_by").html('Canceled by : '+d.updatedby_name +' | '+d.updated);
                        }

                        $("#tr_date").val(bksfn.revDate(d.tr_date));
                        $('#tr_date').prop('disabled', true);
                        $("#tr_number").val(d.tr_number_temp);

                        $("#customer_name").html(d.customer_name);
                        
                        if (d.store_id != null) {
                            $("#store_id").html('<option value="' + d.store_id + '">' + d.store_name + ' [' + d.store_address + ']' + '</option>').sel2dma();
                            $('#store_id').prop('disabled', false);
                            getcurrencyTrx(d.company_id, d.store_id);
                        } else {
                            $('#store_id').removeAttr('disabled');
                            $("#store_id").html('').sel2dma();
                            $('#currency_id').prop('disabled', true);                  
                            $("#currency_id").html('').sel2dma();
                        }          
                        
                        $("#customer_source").val(d.customer_source);
                        $("#customer_purpose").val(d.customer_purpose);

                        $("#ftitle").html(lstatus_name(d.status, d.id));
                        show_detail(d.status);
                    } else{                        
                        reset_form_header();
                        var url = "transaction/nasabah/index/";
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

function show_detail(statusTrx){
    reset_form_input();
    if( typeof(customerId) !== 'undefined' && customerId !== null && customerId !== '') {    
        $('#table-detail tbody').empty();
        var counter = document.getElementById('table-detail').rows.length;
        $.ajax({
            url: baseUrl + 'transaction/transaction_buysell/show_detail',
            type: 'POST',
            data: {'customer_id' : customerId, 'tr_id' : xtr_id, 'header_id' : id_header},
            dataType: 'json',
            success: function (data) {                
                if (data !== '[]' && data.length > 0){
                    var totalpricex = 0;
                    $.each(data, function (i, d) {
                        totalpricex += Number(d.subtotal);
                        if(d.status === '1'){                            
                            var rows =`<tr id="` + counter + `">
                                        <td width="5%" style="text-align:center;vertical-align:middle">
                                            ` + counter + `
                                        </td>
                                        <td width="35%" style="vertical-align: middle;color:black">
                                            ` + d.currency_code + ' - ' + d.currency_name +`
                                            <a style="color:red; cursor:pointer" title="hapus" onClick="delete_line_detail(` + d.id + `)"> / <i>remove<i></a>
                                        </td>
                                        <td width="10%" style='text-align:left;'>
                                            ` + formatRupiah(d.nominal) + `
                                        </td>
                                        <td width="10%" style='text-align:left;'>
                                            ` + formatRupiah(d.sheet) + `
                                        </td>
                                        <td width="10%" style='text-align:left;'>
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
                        } else {
                            var rows =`<tr id="` + counter + `">
                                        <td width="5%" style="text-align:center;vertical-align:middle">
                                            ` + counter + `
                                        </td>
                                        <td width="35%" style="vertical-align: middle;color:black">
                                            ` + d.currency_code + ' - ' + d.currency_name +`                                            
                                        </td>
                                        <td width="10%" style='text-align:left;'>
                                            ` + formatRupiah(d.nominal) + `
                                        </td>
                                        <td width="10%" style='text-align:left;'>
                                            ` + formatRupiah(d.sheet) + `
                                        </td>
                                        <td width="10%" style='text-align:left;'>
                                            ` + formatRupiah(d.nominal * d.sheet) + `
                                        </td>
                                        <td width="15%" style='text-align:left;'>
                                            ` + formatRupiah(d.price) + `
                                        </td>
                                        <td width="15%" style='text-align:left;'>
                                            ` + formatRupiah(d.subtotal) + `
                                        </td>                         
                                    </tr>`
                            $('#table-detail tbody').append(rows);
                        }
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
                    if(statusTrx === '1') {
                        $("#btn-confirm").show();
                        $("#btn-cancel").show();
                    }
                }else{
                    reset_form_input();
                    $("#btn-confirm").hide();
                    $("#btn-cancel").show();
                }
            },
            error: function(xhr){                
                alertify.error("error");
                StringtoFile(xhr.responseText, 'error');
            }
        });        
    }         
}

function delete_line_detail($id){
    if( typeof($id) != 'undefined' && $id !== null && $id !== '' ) {
        $.ajax({
            url : baseUrl +  'transaction/transaction_buysell/delete_detail',
            type: 'POST',
            data: {'id' : $id },
            datatype: 'json',
            success: function(data){
                back_to_page_ini();
                alertify.success("Delete Item Success");
            },
            error: function(xhr){                
                alertify.error("error");
                StringtoFile(xhr.responseText, 'error');
            }
        });
    }       
}

function add_item(){    
    $.post('transaction/transaction_buysell/insert_detail', $("#form_detail").serialize() + "&header_id=" + id_header + "&tr_id=" + xtr_id + "&user_id=" + userId , function (obj) {
        if (obj.msg == 1) {
            reset_form_input();
            back_to_page_ini()
            alertify.success("Insert Data Item Success");                
        } else {
            bksfn.errMsg(obj.msg);
        }
    }, "json").fail(function (xhr) {        
        alertify.error("error");
        StringtoFile(xhr.responseText, 'error');
    });    
}

$('#currency_id').on('change',function(){
    if($(this).val() != null && $(this).val() != ''){
        getratebyid();
    } else {
        $('#price').val('');
    }
});

$("#nominal").keyup(function(e) {
    e.preventDefault();
    $(this).val($(this).val());    
    subtotal_input();    
});

$("#sheet").keyup(function(e) {
    e.preventDefault();
    $(this).val($(this).val());
    subtotal_input();
    getstockbyid();
    getratebyid();
});    

$("#price").keyup(function(e) {
    e.preventDefault();
    $(this).val($(this).val());
    subtotal_input();
});

function subtotal_input() {
    var xtotal_amount = (($('#nominal').val() * $('#sheet').val()));
    var xtotal  = Math.round((xtotal_amount * $('#price').val()));
    $('#total_amount').html(formatRupiah(xtotal_amount.toString()));
    $('#subtotal').val(formatRupiah(xtotal.toString()));
}

$("#btn-add-row-detail").on('click', function (e) {
    e.preventDefault();
    if (id_header !== null && id_header !== '') {
        if ( $("#currency_id").val() === null || $("#currency_id").val() === '' ){
            bksfn.errMsg("mata uang belum di pilih!");
            $("#currency_id").focus();
        } else if( $("#nominal").val() === 0 || $("#nominal").val() === '' ) {
            bksfn.errMsg("jumlah nominal mata uang belum di input!");
            $("#nominal").focus();    
        } else if( $("#sheet").val() === 0 || $("#sheet").val() === '' ) {
            bksfn.errMsg("jumlah lembar mata uang belum di input!");
            $("#sheet").focus();
        } else if( $("#price").val() === 0 || $("#price").val() === '' ){
            bksfn.errMsg("rate belum di input!");
            $("#price").focus();
        } else {
            var cek_price = parseInt(formatRupiahtoNumber($('#price').val()));
            var cek_price_asli = parseInt(formatRupiahtoNumber($('#price_asli').val()));
            var cek_price_bot = parseInt(formatRupiahtoNumber($('#price_bot').val()));
            var cek_price_top = parseInt(formatRupiahtoNumber($('#price_top').val()))

            if( cek_price_asli > 0 && (cek_price < (cek_price_asli - cek_price_bot )) ){
                alertify.alert('Rate tidak boleh kurang dari ' + formatRupiah((cek_price_asli - cek_price_bot).toString()) + ' !');
                $("#price").val(cek_price_asli);
                subtotal_input();
            } else if( cek_price_asli > 0 && (cek_price > (cek_price_asli + cek_price_top )) ){
                alertify.alert('Rate tidak boleh lebih dari ' + formatRupiah((cek_price_asli + cek_price_top).toString()) + ' !');
                $("#price").val(cek_price_asli);
                subtotal_input();
            } else {
                getstockbyid();
                if(xtr_id == 1){ // Trx Buy                        
                    add_item();
                }
                if(xtr_id == 2){ // Trx Sell
                    if(sisa_stock_sheet > 0){
                        var sheet_input = parseInt(formatRupiahtoNumber( ($("#sheet").val() == null || $("#sheet").val() == '' ? 0 : $("#sheet").val()) ));
                        if( sisa_stock_sheet < sheet_input ){
                            alertify.alert('Stok kurang, hanya tersedia ' + sisa_stock_sheet + ' lembar !');
                            $("#sheet").val(sisa_stock_sheet);
                            subtotal_input();
                            return false;                                                                                                                                                            
                        }
                        if( sisa_stock_sheet >= sheet_input ){
                            add_item();                                            
                        }
                    } else {
                        alertify.alert('Stok kosong!');
                        return false;
                    }                    
                }
            }                                    
        }
    } else {
        bksfn.errMsg("save data terlebih dahulu!");
    }    
});

function getstockbyid(){    
    $.ajax({
        url: baseUrl + 'transaction/transaction_buysell/getstockbyid',
        type: 'POST',
        data: {'company_id' : companyId, 'store_id' : $("#store_id").val(), 'currency_id' : $("#currency_id").val(), 'nominal' : $("#nominal").val() },
        datatype: 'json',
        success: function(data){
            if (data !== undefined) {
                if (data !== '[]'){   
                    var d = JSON.parse(data)[0];
                    sisa_stock_sheet = (d.last_stock_sheet === null ? 0 : d.last_stock_sheet);
                    sisa_stock_amount = (d.last_stock_amount === null ? 0 : d.last_stock_amount);
                    if(sisa_stock_sheet > 0){
                        $("#stock_nominal").html(formatRupiah(d.nominal));
                        $("#stock_sheet").html(formatRupiah(sisa_stock_sheet));
                        $("#stock_amount").html(formatRupiah(sisa_stock_amount));
                    }                                                                    
                }
            }
        },
        error: function(xhr){            
            alertify.error("error");
            StringtoFile(xhr.responseText, 'error');
        }
    });
}

function back_to_page_ini(){
    $("#btn-confirm").hide();
    $("#btn-cancel").hide();  

    $('#btn-simpan-header').prop('disabled', true);
    $('#currency_id').prop('disabled', true);
    $('#btn-add-row-detail').prop('disabled', true);
    if( typeof(id_header) != 'undefined' && id_header !== null && id_header !== '' ) {
        if( typeof(customerId) !== 'undefined' && customerId !== null && customerId !== '') {
            $("#btn-cancel").show();
            let url = '';
            if( xtr_id == 1 ){
                url = call_page_task_buy(customerId, id_header);
            } else {
                url = call_page_task_sell(customerId, id_header);
            }    
            if(url !== ''){
                $.ajax({
                    url: url,
                    type: 'POST',
                    success: function(data) {            
                        if (data !== '[]') {                        
                            show_header();
                        }
                    },
                    error: function(xhr){
                        alertify.error("error");
                        StringtoFile(xhr.responseText, 'error');
                    }
                });
            }                        
        }
    } else {
        reset_form_header();
        reset_form_input();
        $("#ftitle").html('Add');
        var url = '';
        if( xtr_id == 1 ){
            url = call_page_task_buy(customerId, null);
        } else {
            url = call_page_task_sell(customerId, null);
        }
        if(url !== ''){
            $.ajax({
                url: url,
                type: 'POST',
                success: function() {                
                    show_customer();
                },
                error: function(xhr){
                    alertify.error("error");
                    StringtoFile(xhr.responseText, 'error');
                }
            });
        }
    }                          
}

function back_to_page_task(){
    var url = "transaction/transaction_buysell_task/index/";
    if(url){
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

function back_to_page_show($id){
    $.ajax({
        url: baseUrl + 'transaction/transaction_buysell/getshowid',
        type: 'POST',
        data: {'id' : $id},
        datatype: 'json',
        success: function(data){
            if (data !== undefined) {
                if (data !== '[]'){   
                    var d = JSON.parse(data)[0];
                    if(d.customer_id !== null && d.customer_id !== '' && d.customer_id !== null && d.customer_id !== ''){
                        var url = '';
                        if(Number(d.tr_id) == 1){
                            url = call_page_show_buy(d.customer_id, d.id);
                        } else {
                            url = call_page_show_sell(d.customer_id, d.id);
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
                    } else {
                        back_to_page_task();
                    }         
                }
            } else {
                back_to_page_task();
            }
        },
        error: function(xhr){
            alertify.error("error");
            StringtoFile(xhr.responseText, 'error');
        }
    });    
}


function getratebyid(){
    $("#price").val(0);
    $("#price_asli").val(0);                
    $("#price_bot").val(0);
    $.ajax({
        url: baseUrl + 'transaction/transaction_buysell/getratebyid',
        type: 'POST',
        data: {'store_id' : $("#store_id").val(), 'currency_id' : $("#currency_id").val(), 'tr_id' : xtr_id},
        datatype: 'json',
        success: function(data){
            if (data !== undefined) {
                if (data !== '[]' && data.length > 0){
                    var d = JSON.parse(data)[0];
                    var xrate_today = (d.rate_today === null ? 0 : d.rate_today);
                    var xrate_today_bot = (d.rate_today_bot === null ? 0 : d.rate_today_bot);
                    var xrate_today_top = (d.rate_today_top === null ? 0 : d.rate_today_top);
                    if(Number(xrate_today) > 0){
                        $("#price").val(xrate_today);
                        $("#price_asli").val(xrate_today);           
                        if(Number(xrate_today_bot) > 0){
                            $("#price_bot").val(xrate_today_bot);
                        }
                        if(Number(xrate_today_top) > 0){
                            $("#price_top").val(xrate_today_top);
                        }
                    }                 
                }
            }    
        },
        error: function(xhr){
            alertify.error("error");
            StringtoFile(xhr.responseText, 'error');
        }
    });
}

$('#store_id').on('change',function(){
    if($(this).val() != null && $(this).val() != ''){
        $('#btn-simpan-header').prop('disabled', false);
    } else {
        $('#btn-simpan-header').prop('disabled', true);
    }
});

$('#btn-simpan-header').on('click', function (e) {
    e.preventDefault();
    if( $("#store_id").val() === null || $("#store_id").val() === '' ) {
        bksfn.errMsg("Stor belum di pilih!");
        $("#store_id").focus();
    } else {
        alertify.confirm("are you sure, SAVE transaction ?", function (x) {
            if (x) {
                if ($("#ftitle").html().substr(0, 3) == "Add") {            
                    $.post('transaction/transaction_buysell/insert_header', $("#form_header").serialize() + "&customer_id=" + customerId + "&tr_id=" + xtr_id + "&store_id=" + $("#store_id").val() + "&user_id=" + userId , function (obj) {
                        if (obj.msg == 1) {              
                            id_header = obj.id;      
                            alertify.success("Insert Data Success");                    
                            var url = '';
                            if( xtr_id == 1 ){
                                url = call_page_task_buy(customerId, id_header);
                            } else {
                                url = call_page_task_sell(customerId, id_header);
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
                        } else {
                            reset_form_header();
                            reset_form_input();
                            bksfn.errMsg(obj.msg);
                        }
                    }, "json").fail(function (xhr) {                
                        alertify.error("error");
                        StringtoFile(xhr.responseText, 'error');
                    });
                }
                if (id_header !== null && id_header !== '') {
                    $.post('transaction/transaction_buysell/update_header', $("#form_header").serialize() + "&id=" + id_header + "&user_id=" + userId + "&store_id=" + $("#store_id").val(), function (obj) {
                        if (obj.msg == 1) {
                            back_to_page_ini();
                            alertify.success("Edit Data Success");
                        } else {
                            reset_form_input();
                            bksfn.errMsg(obj.msg);
                        }
                    }, "json").fail(function (xhr) {
                        alertify.error("error");
                        StringtoFile(xhr.responseText, 'error');
                    });
                }            
            }
        });
    }
});

$("#btn-confirm").on('click', function (e) {
    e.preventDefault();
    if( document.getElementById('table-detail').rows.length < 1 ) {
        bksfn.errMsg("Mata uang belum diinput!");        
    } else {
        alertify.confirm("are you sure, CONFIRM transaction ?", function (x) {
            if (x) {
                $.ajax({
                    url: baseUrl + 'transaction/transaction_buysell/confirm_task',
                    type: 'POST',
                    data: {'id' : id_header},
                    datatype: 'json',
                    success: function(data) {
                        if(data.length > 0){
                            if(Number(Apimethod) == 1){
                                try {
                                    var d = JSON.parse(data);
                                    if(d.tr_header_id !== null && d.tr_header_id !== ''){
                                        var id_tr_header = d.tr_header_id;
                                        // api_ap_input_trx(id_tr_header);
                                        back_to_page_show(id_header);
                                    } else {
                                        back_to_page_task();
                                    }
                                } catch (e) {
                                    alertify.error("Error parsing JSON"+e);
                                    console.error('Error parsing JSON:', e);
                                    back_to_page_task();
                                }                                
                            } else {
                                back_to_page_show(id_header);
                            }    
                            alertify.success('confirm transaction success!');
                        } else {
                            back_to_page_task();
                        }                        
                    },
                    error: function(xhr){
                        alertify.error("error");
                        StringtoFile(xhr.responseText, 'error');
                    }
                });
            }
        });
    }        
});

$("#btn-cancel").on('click', function (e) {
    e.preventDefault();
    alertify.confirm("Are you sure, CANCEL transaction ?", function (x) {
        if (x) {           
            $.ajax({
                url: baseUrl + 'transaction/transaction_buysell/cancel_task',
                type: 'POST',
                data: {'id' : id_header},
                datatype: 'json',
                success: function() {
                    alertify.success('CANCEL Transaction Success!');
                    back_to_page_task();
                },
                error: function(xhr){
                    alertify.error("error");
                    StringtoFile(xhr.responseText, 'error');
                }
            });     
        }    
    });    
});

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
            alertify.error("can't open page.!");
        }
    }); 
});

function lstatus_name(status_id, id) {
    var status_Id =  Number(status_id);
    var lstatus = '';
    switch(status_Id) {
        case 1:
            lstatus += 'Task';
            break;
        case 2:
            lstatus += 'Canceled';
            $("#btn-simpan-header").hide();
            $(".form_detail_input").hide();
            $("#btn-confirm").hide();
            $("#btn-cancel").hide();
            break;
        case 3:
            lstatus += 'Confirm';
            $("#btn-simpan-header").hide();
            $(".form_detail_input").hide();
            $("#btn-confirm").hide();
            $("#btn-cancel").hide();
            back_to_page_show(id);
            break;
        default:
            lstatus = '';
    }
    return lstatus;
}