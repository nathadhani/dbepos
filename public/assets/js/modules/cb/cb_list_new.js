reset_form_input_header()
reset_form_input_new();
$("#btn-cancel").hide();
$(".input-edit").hide();
$(".input-file").hide();
if( $("body").data("id") !== null && $("body").data("id") !== '' ){
    show_header();
    show_detail();
}

$('#cb_id').on('change',function(e){
    e.preventDefault()
    if($(this).val() != null && $(this).val() != ''){
        $('#cb_pos_id').html('').sel2dma();
        $('#cb_pos_id').prop('disabled', false);
        $('#cb_pos_id').focus()
        $.ajax({
            url : baseUrl +  'master_data/m_cb_pos/getmcbpos',
            type: 'POST',
            data: {'cb_id' : $(this).val()},
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

$("#cb_pos_id").on("change", function(e) {
    e.preventDefault();
    $("#description").val( $("#cb_pos_id option:selected").text() );
});

$("#amount").keyup(function(e) {
    e.preventDefault();
    $(this).val($(this).val());
    if( Number($(this).val()) > 0 ){
        $("#terbilang_amount").html('<i>Value</i> : ' + bksfn.terBilang($(this).val()));
    }
});

$("#btn-add").on('click', function (e) {
    e.preventDefault();
    if( $("#cb_id").val() === '' || $("#cb_id").val() === null) {
        bksfn.errMsg('Source belum diinput!');
    } else if( $("#cb_pos_id").val() === '' || $("#cb_pos_id").val() === null) {
        bksfn.errMsg('purpose belum diinput!');
    } else if( $("#description").val() === '' || $("#description").val() === null) {
        bksfn.errMsg('keterangan belum diinput!');    
    } else if( $("#amount").val() === '' || $("#amount").val() === null || Number($("#amount").val()) <= 0) {
        bksfn.errMsg('jumlah belum diinput!');
    } else {
        $.post(baseUrl + 'cb/cb_list_new/insert', $("#mainForm").serialize() + "&header_id=" + $("body").data("id"), function (obj) {
            if (obj.msg == 1) {
                alertify.success('Data add success!');
                reset_form_input_new();
                if ($("#ftitle").html().substr(0, 3) == "New") {
                    call_page_cb_edit(obj.id_header);
                }
                show_detail();
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

$("#btn-cancel").on('click', function (e) {
    e.preventDefault();
    $("#ModalNew").modal('hide');
    $(".modal-dialog").width('1200px');
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
                    url: baseUrl + 'cb/cb_list_new/cancel_trx',
                    type: 'POST',
                    data: {'id' : $("body").data("id"), 'description' : $("#modal-cancel-description").val()},
                    datatype: 'json',
                    success: function() {
                        $("#ModalCancel").modal('hide');                        
                        history.go(0); // untuk memuat ulang halaman tanpa cache.
                        show_header();
                        show_detail();
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

$('#upload_file').on('change',function(e){
    e.preventDefault();  
    var files = $('#upload_file')[0].files;
    // var file_exist = files.length > 0 ? 1 : 0;
    var error = '';
    var formData = new FormData(document.getElementById("mainForm"));
    formData.append('tr_number', document.getElementById('tr_number').innerHTML);
    var name = files[0].name;
    var extension = name.split('.').pop().toLowerCase();    

    if ($.inArray(extension, ['pdf']) == -1) {
        error += "Invalid File";
    }

    if (error == '') {
        $.ajax({
            url: 'cb/cb_list_new/add_file',
            method: 'POST',
            beforeSend: function(){
                $(".ajax-loader").height($(document).height());
                $('.ajax-loader').css("visibility", "visible");
            },
            data: formData,
            contentType: false,
            cache: false,
            async: false,
            processData: false,
            success: function (data) {
                if(data.length > 0){
                    alertify.error(data);
                } else {
                    history.go(0); // untuk memuat ulang halaman tanpa cache.
                    alertify.success('File has been uploaded');
                }
            },
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            },
            error: function(xhr){
                alertify.alert(xhr.responseText);
            }
        });
    } else {
        bksfn.errMsg(error);
    }            
});

function delete_line_detail($id){
    if( typeof($id) != 'undefined' && $id !== null && $id !== '' ) {
        $.ajax({
            url : baseUrl +  'cb/cb_list_new/delete_detail',
            type: 'POST',
            data: {'id' : $id },
            datatype: 'json',
            success: function(data){
                show_detail($("body").data("id"));
                alertify.success("Delete Item Success");
            },
            error: function(xhr){                
                alertify.error("error");
                StringtoFile(xhr.responseText, 'error');
            }
        });
    }       
}

function reset_form_input_header(){
    $('#tr_number').val('');
    $('#cb_id').html('').sel2dma();
    $("#cb_pos_id").html('').sel2dma();
    $('#cb_id').prop('disabled', false);
    $('#cb_pos_id').prop('disabled', true);
    $("#ftitle").html('New');
}

function reset_form_input_new(){
    $('#description').val('');
    $("#amount").val('');
    $("#terbilang_amount").html('');
}

function show_header(){
    if( typeof($("body").data("id")) !== 'undefined') {
        if($("body").data("id") !== null && $("body").data("id") !== '') {
            $("#ftitle").html('Edit');
            $("#btn-cancel").show();
            $(".input-edit").show();
            $(".input-file").show();
            $.ajax({
                url: baseUrl + "cb/cb_list_new/show_header",
                type: 'POST',
                data: {'header_id' : $("body").data("id")},
                datatype: 'json',
                success: function(data){
                    if (data !== '[]' && data.length > 0){
                        var d = JSON.parse(data)[0];
                        $("#store_address").html(d.store_address);
                        $("#tr_number").html(d.tr_number);
                        $("#created").html(d.created);
                        $("#created_by").html(d.createdby_name.trim());

                        $('#tr_date').val(bksfn.revDate(d.tr_date));
                        $('#tr_date').prop('disabled', true);
                        if (d.cb_id != 0 && d.cb_id != null && d.cb_id != '') {
                            $("#cb_id").html('<option value="' + d.cb_id + '">' + d.cb_name + '</option>').sel2dma();
                        } else {
                            $("#cb_id").html('').sel2dma();
                        }
                        if (d.cb_pos_id != 0 && d.cb_pos_id != null && d.cb_pos_id != '') {
                            $("#cb_pos_id").html('<option value="' + d.cb_pos_id + '">' + d.cb_pos_name + '</option>').sel2dma();
                        } else {
                            $("#cb_pos_id").html('').sel2dma();
                        }

                        $("#description_header").html(d.status == 2 ? d.cb_pos_name + ' - '+ d.description : d.cb_name + ' - ' + d.cb_pos_name);
                        $("#fstatus").html(d.status == 2 ? '<span style="color:red;font-weight:bolder;">'+d.status_name+'</span>' : d.status_name);
                        if(d.status == '2' || $("body").data("usergroup_id") == '2'){
                            $("#ftitle").html(d.status == 2 ? '<span style="color:red;font-weight:bolder;">'+d.status_name+'</span>' : d.status_name);
                            $(".input-detail").hide();
                            $("#updated").html(d.updated);
                            $("#updated_by").html(d.updatedby_name);                            
                            $("#btn-cancel").hide();
                            $(".input-file").hide();
                        }
                    } else{
                        return false;
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

function show_detail(){
    $('#table-detail tbody').empty();
    if( typeof($("body").data("id")) !== 'undefined') {
        if($("body").data("id") !== null && $("body").data("id") !== '') {
            $("#ftitle").html('Edit');
            var counter = document.getElementById('table-detail').rows.length;
            $.ajax({
                url: baseUrl + 'cb/cb_list_new/show_detail',
                type: 'POST',
                data: {'header_id' : $("body").data("id")},
                dataType: 'json',
                success: function (data) {
                    if (data !== '[]' && data.length > 0){
                        var amountx = 0;
                        var totalamounx = 0;
                        var rows = '';
                        $.each(data, function (i, d) {      
                            if(Number(d.amount_in) > 0){
                                amountx = Number(d.amount_in);
                            }
                            if(Number(d.amount_out) > 0){
                                amountx = Number(d.amount_out);
                            }
                            totalamounx += amountx;
                            if(Number(d.status) === 3){
                                rows =`<tr id="` + counter + `">
                                            <td width="5%" style="text-align:center;vertical-align:middle">
                                                ` + counter + `
                                            </td>
                                            <td width="10%" style="vertical-align: middle;color:black">
                                                ` + d.cb_name.trim() +`
                                                <a style="color:red; cursor:pointer" title="hapus" onClick="delete_line_detail(` + d.id + `)"> / <i>remove<i></a>
                                            </td>
                                            <td width="20%" style="vertical-align: middle;color:black">
                                                ` + d.cb_pos_name +`
                                            </td>
                                            <td width="30%" style='text-align:left;'>
                                                ` + d.description.trim() + `
                                            </td>
                                            <td width="15%" style='text-align:left;'>
                                                ` + (isDecimal(amountx) ? formatDecimal(amountx,2) : formatRupiah(amountx) ) + `
                                            </td>
                                        </tr>`                        
                            } else {
                                rows =`<tr id="` + counter + `">
                                            <td width="5%" style="text-align:center;vertical-align:middle">
                                                ` + counter + `
                                            </td>
                                            <td width="10%" style="vertical-align: middle;color:black">
                                                ` + d.cb_name.trim() +`
                                            </td>
                                            <td width="20%" style="vertical-align: middle;color:black">
                                                ` + d.cb_pos_name +`
                                            </td>
                                            <td width="30%" style='text-align:left;'>
                                                ` + d.description.trim() + `
                                            </td>
                                            <td width="15%" style='text-align:left;'>
                                                ` + (isDecimal(amountx) ? formatDecimal(amountx,2) : formatRupiah(amountx) ) + `
                                            </td>
                                        </tr>`                        
                            }                    
                            if(rows.length > 0){
                                $('#table-detail tbody').append(rows);   
                                rows = '';
                                counter++;
                            }                               
                        });
                        var rowsx =`<tr>
                                        <td colspan="4" style='vertical-align:middle;text-align:center;background-color:#FFFFFF;font-weight:bold;font-size:14px;'>
                                            Total
                                        </td>
                                        <td style='text-align:left;font-weight:bold;font-size:15px;'>
                                            ` + formatRupiah(totalamounx) + `
                                        </td>
                                    </tr>`   
                        $('#table-detail tbody').append(rowsx); 
                        $("#total_transaction_terbilang").html('Say : ' + bksfn.terBilang(totalamounx) + ' Rupiah');
                        $('#cb_id').prop('disabled', true);
                        $('#cb_pos_id').prop('disabled', true);
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
    }
}