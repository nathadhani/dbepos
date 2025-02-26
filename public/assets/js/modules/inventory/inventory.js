back_to_page_ini();

function reset_form_header(){
    $("#tr_id").val('').focus();
    $("#tr_description").html('');
    $("#store_id").html('').sel2dma();
}

function reset_form_input(){
    $("#valas_id").html('').sel2dma();    
    $("#nominal").val('');
    $("#sheet").val('');
    $('#total_amount').html('');
    $("#price").val('');
    $("#subtotal").val('');
    $("#btn-add-detail-data").focus();
}

function back_to_page_ini(){
    $('#btn-add-row-detail').prop('disabled', true);
    $("#btn-confirm").hide();
    $("#btn-cancel").hide();
    $("#btn-pdf").hide();
    $("#pinfo").hide();
    if( typeof(id_header) != 'undefined' && id_header !== null && id_header !== '' ) {
        tampil_header();        
    } else {
        reset_form_header();
        reset_form_input();
        $("#ftitle").html('Add');
    }
}

function call_page(id_header){
    url = "inventory/inventory/index/"+id_header;
    window.open(url,'_self');
}

function tampil_header(){
    reset_form_header();
    if( typeof(id_header) != 'undefined' && id_header !== null && id_header !== '' ) {    
        $.ajax({
            url: baseUrl + "inventory/inventory/tampil_header",
            type: 'POST',
            data: {'id' : id_header, 'tr_id' : $("#tr_id").val()},
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

                    $("#tr_number").val(d.tr_number);
                    $("#tr_date").val(bksfn.revDate(d.tr_date));
                    if(d.tr_id !== null){
                        $("#tr_id").select2("val", d.tr_id);
                    }
                    if (d.store_id != null) {
                        $("#store_id").html('<option value="' + d.store_id + '">' + d.store_name + ' [' + d.store_address + ']' + '</option>').sel2dma();
                        $('#store_id').prop('disabled', false); 
                    }
                    $("#tr_description").html(d.tr_description);

                    $("#ftitle").html(lstatus_name(d.status, d.id));
                    tampil_detail(d.status);
                } else{                        
                    reset_form_header();
                    var url = "inventory/inventory";
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

function tampil_detail(statusTrx){
    reset_form_input();
    $("#pinfo").hide();
    if( typeof(id_header) != 'undefined' && id_header !== null && id_header !== '' ) {    
        $('#table-detail tbody').empty();
        $("#table-detail").tableHeadFixer();
        var counter = document.getElementById('table-detail').rows.length;
        $.ajax({
            url: baseUrl + 'inventory/inventory/tampil_detail',
            type: 'POST',
            data: {'tr_id' : $("#tr_id").val(), 'header_id' : id_header},
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
                                            ` + d.valas_code + ' - ' + d.valas_name +`
                                            <a style="color:red; cursor:pointer" title="hapus" onClick="delete_line_detail(` + d.id + `)"> / <i>remove<i></a>
                                        </td>
                                        <td width="10%" style='text-align:center;'>
                                            ` + bksfn.toRp(d.nominal) + `
                                        </td>
                                        <td width="10%" style='text-align:center;'>
                                            ` + bksfn.toRp(d.sheet) + `
                                        </td>
                                        <td width="10%" style='text-align:center;'>
                                            ` + bksfn.toRp(d.nominal * d.sheet) + `
                                        </td>
                                        <td width="15%" style='text-align:center;'>
                                            ` + bksfn.toRp(d.price) + `
                                        </td>
                                        <td width="15%" style='text-align:right;'>
                                            ` + bksfn.toRp(d.subtotal) + `
                                        </td>                         
                                    </tr>`    
                            $('#table-detail tbody').append(rows);           
                        } else {
                            var rows =`<tr id="` + counter + `">
                                        <td width="5%" style="text-align:center;vertical-align:middle">
                                            ` + counter + `
                                        </td>
                                        <td width="35%" style="vertical-align: middle;color:black">
                                            ` + d.valas_code + ' - ' + d.valas_name +`                                            
                                        </td>
                                        <td width="10%" style='text-align:center;'>
                                            ` + bksfn.toRp(d.nominal) + `
                                        </td>
                                        <td width="10%" style='text-align:center;'>
                                            ` + bksfn.toRp(d.sheet) + `
                                        </td>
                                        <td width="10%" style='text-align:center;'>
                                            ` + bksfn.toRp(d.nominal * d.sheet) + `
                                        </td>
                                        <td width="15%" style='text-align:center;'>
                                            ` + bksfn.toRp(d.price) + `
                                        </td>
                                        <td width="15%" style='text-align:right;'>
                                            ` + bksfn.toRp(d.subtotal) + `
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
                                    <td style='text-align:center;background-color:#f1f5f9;font-weight:bold;font-size:15px;'>
                                        Rp. ` + bksfn.toRp(totalpricex) + `
                                    </td>                         
                                </tr>`
                    $('#table-detail tbody').append(rowsx);
                    if(statusTrx === '1') {
                        $("#btn-confirm").show();
                        $("#btn-cancel").show();
                        $("#pinfo").show();
                        $("#pinfo_confirm").show();    
                    }
                }else{
                    reset_form_input();
                    $("#btn-confirm").hide();
                    $("#btn-cancel").show();
                    $("#pinfo").show();
                    $("#pinfo_confirm").hide();
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
            url : baseUrl +  'inventory/inventory/delete_detail',
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
    $.post('inventory/inventory/insert_detail', $("#form_detail").serialize() + "&header_id=" + id_header, function (obj) {
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

$('#valas_id').on('change',function(){
    if($(this).val() != null && $(this).val() != ''){
        $('#price').val('');
    }
});

$("#nominal").keyup(function(e) {
    e.preventDefault();
    $(this).val(formatRupiah($(this).val()));    
    subtotal_input();    
});

$("#sheet").keyup(function(e) {
    e.preventDefault();
    $(this).val(formatRupiah($(this).val()));
    subtotal_input();    
    
});    

$("#price").keyup(function(e) {
    e.preventDefault();
    $(this).val(formatRupiah($(this).val()));
    subtotal_input();    
});

function subtotal_input() {
    var xnominal = parseInt(price_to_number($('#nominal').val()));
    var xsheet = parseInt(price_to_number($('#sheet').val()));
    var xtotal_amount = ((xnominal * xsheet));
    $('#total_amount').html(formatRupiah(xtotal_amount.toString()));

    var xprice  = parseInt(price_to_number($('#price').val()));
    var xtotal  = (xtotal_amount * xprice);
    $('#subtotal').val(formatRupiah(xtotal.toString()));
}

$("#btn-add-row-detail").on('click', function (e) {
    e.preventDefault();
    if (id_header !== null && id_header !== '') {
        if ( $("#valas_id").val() === null || $("#valas_id").val() === '' ){
            bksfn.errMsg("mata uang belum di pilih!");
            $("#valas_id").focus();
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
            add_item();                                
        }
    } else {
        bksfn.errMsg("save data terlebih dahulu!");
    }    
});

$('#btn-simpan-header').on('click', function (e) {
    e.preventDefault();
    if( $("#tr_id").val() === null || $("#tr_id").val() === '' ) {
        bksfn.errMsg("Inventory belum di pilih!");
        $("#tr_id").focus();
    } else if( $("#store_id").val() === null || $("#store_id").val() === '' ) {
        bksfn.errMsg("Store belum di pilih!");
        $("#tr_id").focus();
    } else if( $("#tr_description").val() === null || $("#tr_description").val() === '' ) {
        bksfn.errMsg("Keterangan belum diinput!");
        $("#tr_description").focus();
    } else {
        if ($("#ftitle").html().substr(0, 3) == "Add") {            
            $.post('inventory/inventory/insert_header', $("#form_header").serialize() + "&tr_id=" + $("#tr_id").val() + "&store_id=" + $("#store_id").val() , function (obj) {
                if (obj.msg == 1) {              
                    id_header = obj.id;             
                    alertify.success("Insert Data Success");    
                    call_page(id_header);
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
            $.post('inventory/inventory/update_header', $("#form_header").serialize() + "&id=" + id_header + "&store_id=" + $("#store_id").val(), function (obj) {
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

$("#btn-confirm").on('click', function (e) {
    e.preventDefault();
    if( document.getElementById('table-detail').rows.length < 2 ) {
        bksfn.errMsg("Mata uang belum diinput!");        
    } else {
        alertify.confirm("are you sure, CONFIRM inventory ?", function (x) {
            if (x) {           
                $.ajax({
                    url: baseUrl + 'inventory/inventory/confirm',
                    type: 'POST',
                    data: {'id' : id_header},
                    datatype: 'json',
                    success: function() {
                        alertify.success('Confirm Inventory Success!');
                        back_to_page_ini()
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
    alertify.confirm("Are you sure, CANCEL Inventory ?", function (x) {
        if (x) {           
            $.ajax({
                url: baseUrl + 'inventory/inventory/cancel',
                type: 'POST',
                data: {'id' : id_header},
                datatype: 'json',
                success: function() {
                    alertify.success('Cancel Inventory Success!');
                    back_to_page_ini()
                },
                error: function(xhr){
                    alertify.error("error");
                    StringtoFile(xhr.responseText, 'error');
                }
            });     
        }    
    });    
});

$("#btn-pdf").on('click', function (e) {
    e.preventDefault();
    // alertify.confirm("export to Pdf Trx. No " + document.getElementById('tr_number').innerText + " ?", function (e) {    
    //     if (e) {                
            var url = "inventory/inventory/printpdf/" + id_header;
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

function lstatus_name(status_id, id) {
    var status_Id =  Number(status_id);
    var lstatus = '';
    $("#pinfo").hide();
    switch(status_Id) {
        case 1:
            lstatus += '<strong style="color:black;font-weight:bolder;font-size:14px">Open</strong>';
            $("#btn-confirm").show();
            $("#btn-cancel").show();
            $("#pinfo").show();
            break;
        case 2:
            lstatus += '<strong style="color:red;font-weight:bolder;font-size:14px">Canceled</strong>';
            $("#btn-simpan-header").hide(); 
            $(".form_detail_input").hide();     
            $("#btn-confirm").hide();
            $("#btn-cancel").hide();
            $("#pinfo").hide();

            $('#tr_date').prop('disabled', true);
            $('#tr_id').prop('disabled', true);
            $('#store_id').prop('disabled', true);
            $('#tr_description').prop('disabled', true);
            break;
        case 3:
            lstatus += '<strong style="color:black;font-weight:bolder;font-size:14px">Confirm</strong>';            
            $("#btn-simpan-header").hide();
            $(".form_detail_input").hide();
            $("#btn-confirm").hide();        
            $("#btn-cancel").show();
            $("#pinfo").show();
            $("#pinfo_confirm").hide();
            $("#btn-pdf").show();
            
            $('#tr_date').prop('disabled', true);
            $('#tr_id').prop('disabled', true);
            $('#store_id').prop('disabled', true);
            $('#tr_description').prop('disabled', true);
            break;
        default:
            lstatus = '';
    }
    return lstatus;
}