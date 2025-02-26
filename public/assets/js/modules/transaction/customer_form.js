/**
 * Page Init
 */
window.scroll(0,0);
$("#btn-buy").hide();
$("#btn-sale").hide();
reset_form();
if(text_celluler !== null && text_celluler !== ''){
    var choice = text_celluler;
    if (choice.substr(0,2) === '08'){
        $("#customer_handphone").val(text_celluler);
    }
}

/**
 * Select Tipe Data
 */
$(".perorangan").hide();
$(".cnpwp").hide();
$(".cfoto").hide();
$('#customer_type_id').on('change',function(){
    if ($('#customer_type_id').val() !== null && $('#customer_type_id').val() !== ''){
        if ($('#customer_type_id').val() === '1'){
            $(".perorangan").show();
            $(".cnpwp").hide();
            if ($('#customer_code').val() !== null && $('#customer_code').val() !== ''){
                $(".cfoto").show();
            }    
        } else {
            $(".perorangan").hide();
            $(".cnpwp").show();
            $(".cfoto").hide();
        }
    }   
});

/**
 * Form Submit
 */
$("#mainForm").submit(function (e) {
    e.preventDefault();
    $(':submit', this).attr('disabled', true);
}).on('reset', function (e) {
    reset_form();
});

/**
 * Validasi Form
 */
$.validate({
    form: "#mainForm",
    validateOnBlur: false,
    onError: function () {
        $('.help-block').remove();
        bksfn.errMsg("input data dengan lengkap tanda **");
    },
    onSuccess: function () {
        if( $("#customer_type_id").val() === '' || $("#customer_type_id").val() === null){
            bksfn.errMsg("input tipe nasabah **");
        } else if( $("#customer_name").val() === '' || $("#customer_name").val() === null){
            bksfn.errMsg("input nama lengkap **");
        } else if( $("#customer_handphone").val() === '' || $("#customer_handphone").val() === null){
            bksfn.errMsg("input nomor handphone **");                        
        } else if( $("#customer_address").val() === '' || $("#customer_address").val() === null){
            bksfn.errMsg("input alamat **");                        
        } else {           
            if ($('#customer_type_id').val() === '1'){ // Pelanggan Per Orangan
                if ($("#ftitle").html().substr(0, 4) == "Edit") {
                    var image_url = baseUrl + "assets/img/foto_nasabah/" + $("#customer_code").val() + ".jpg";
                    $.ajax({
                        url:image_url,
                        type:'HEAD',
                        error: function() {
                            //file not exists                            
                            //--- Edit
                            $.post('transaksi/nasabah_form/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
                                if (obj.msg == 1) {                                
                                    $("body").data("text_search", '');
                                    alertify.success("Edit Data Success");     
                                    back_to_page_ini();
                                } else {
                                    bksfn.errMsg(obj.msg);
                                }
                            }, "json").fail(function (xhr) {
                                alertify.error(xhr.responseText);
                            });
                        },
                        success: function() {
                            //file exists
                            if( $("#customer_data_id").val() === '' || $("#customer_data_id").val() === null){
                                bksfn.errMsg("input jenis identitas");
                                $("#customer_data_id").focus();
                            } else if( $("#customer_data_number").val() === '' || $("#customer_data_number").val() === null){
                                bksfn.errMsg("input nomor identitas"); 
                                $("#customer_data_number").focus();
                            } else if( $("#work_id").val() === '' || $("#work_id").val() === null){
                                bksfn.errMsg("input pekerjaan");
                            } else if( $("#nationality_id").val() === '' || $("#nationality_id").val() === null){
                                bksfn.errMsg("input warga negara");
                            } else {
                                //--- Edit
                                $.post('transaksi/nasabah_form/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
                                    if (obj.msg == 1) {                                
                                        $("body").data("text_search", '');
                                        alertify.success("Edit Data Success");     
                                        back_to_page_ini();
                                    } else {
                                        bksfn.errMsg(obj.msg);
                                    }
                                }, "json").fail(function (xhr) {
                                    alertify.error(xhr.responseText);
                                });
                            }                            
                        }
                    });                          
                } else {
                    //--- Insert
                    $.post('transaksi/nasabah_form/insert', $("#mainForm").serialize(), function (obj) {
                        if (obj.msg == 1) {                            
                            $("body").data("id", '');
                            $("body").data("text_search", '');
                            $("body").data("id", obj.id);     
                            alertify.success("Insert Data Success");                
                            back_to_page_ini();
                        } else {
                            bksfn.errMsg(obj.msg);
                        }
                    }, "json").fail(function (xhr) {
                        alertify.error(xhr.responseText);
                    });
                }    
            } else { // Selain Pelanggan Per Orangan
                if ($("#ftitle").html().substr(0, 4) == "Edit") {
                    //--- Edit
                    $.post('transaksi/nasabah_form/update', $("#mainForm").serialize() + "&id=" + $("body").data("id") , function (obj) {
                        if (obj.msg == 1) {                            
                            $("body").data("text_search", '');
                            back_to_page_ini();
                            alertify.success("Edit Data Success");     
                        } else {
                            bksfn.errMsg(obj.msg);
                        }
                    }, "json").fail(function (xhr) {
                        alertify.error(xhr.responseText);
                    });
                } else {
                    //--- Insert
                    $.post('transaksi/nasabah_form/insert', $("#mainForm").serialize(), function (obj) {
                        if (obj.msg == 1) {                            
                            $("body").data("id", '');
                            $("body").data("text_search", '');
                            $("body").data("id", obj.id);     
                            alertify.success("Insert Data Success");
                            back_to_page_ini();
                        } else {
                            bksfn.errMsg(obj.msg);
                        }
                    }, "json").fail(function (xhr) {
                        alertify.error(xhr.responseText);
                    });
                }
            }
            // window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: "smooth" });
        }
    }
});

/**
 * Upload Foto
 */
// $("#upload_foto").fileinput({
//     showUpload: false,
//     showCaption: true,
//     browseClass: "btn btn-danger",
//     fileType: "any"
// });
$('#upload_foto').on('change',function(e){
    e.preventDefault();    
    var files = $('#upload_foto')[0].files;
    var file_exist = files.length > 0 ? 1 : 0;
    var error = '';
    var formData = new FormData(document.getElementById("form_foto"));
    formData.append('kode', $('#customer_code').val());
    var name = files[0].name;
    var extension = name.split('.').pop().toLowerCase();    

    if ($.inArray(extension, ['jpg', 'jpeg', 'png']) == -1) {
        error += "Invalid Image File";
    }

    if (error == '') {
        $.ajax({
            url: 'transaksi/nasabah_form/add_foto',
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
                $("#form_foto")[0].reset();
                alertify.success('File has been uploaded');
                back_to_page_ini();
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
        $("#form_foto")[0].reset();
    }            
});

/**
 * Tampil Data
 */
 function tampil_data(){
    if( typeof($("body").data("id")) !== 'undefined') {
        if($("body").data("id") !== null && $("body").data("id") !== '') {
            $("body").data("text_search", '');
            $.ajax({
                url: baseUrl + 'transaksi/nasabah_form/getByID',
                type: 'POST',
                data: {'id' : $("body").data("id")},
                datatype: 'json',
                success: function(data){
                    var d = JSON.parse(data)[0];
                    $("#ftitle").html('Edit');
                    $("body").data("id", d.id);

                    $("#customer_code").val(d.customer_code);
                    
                    $('#links').empty();
                    $("#links").hide();
                    if (d.customer_type_id != 0 && d.customer_type_id != null && d.customer_type_id != '') {
                        $("#customer_type_id").html('<option value="' + d.customer_type_id + '">' + d.customer_type_name + '</option>').sel2dma();
                        if(d.customer_type_id === '1'){
                            $(".perorangan").show();
                            // $(".cfoto").show();
                            // if ($('#customer_code').val() !== null && $('#customer_code').val() !== ''){                     
                            //     var image_url = baseUrl + "assets/img/foto_nasabah/" + d.customer_code + ".jpg";
                            //     $.ajax({
                            //         url:image_url,
                            //         type:'HEAD',
                            //         error: function() {
                            //             //file not exists
                            //             $("#links").hide();
                            //         },
                            //         success: function() {
                            //             //file exists
                            //             var showfoto = '<a class="gallery-item" href="'+image_url+'" data-gallery>'+
                            //                                 '<div class="image">'+
                            //                                     '<img src="'+image_url+'" alt="" style="height:325px;width:550px;"/>'+
                            //                                 '</div>'+
                            //                             '</a>'                                                            
                            //             $('#links').append(showfoto);
                            //             $("#links").show();
                            //         }
                            //     });                                                     
                            // }                                         
                        } else {
                            $(".perorangan").hide();
                            $(".cnpwp").show();
                            $(".cfoto").hide();
                        }
                    } else {
                        $("#customer_type_id").html('').sel2dma();
                    }               

                    $("#customer_name").val(d.customer_name).focus();  
                    $("#customer_nick_name").val(d.customer_nick_name);                    
                    
                    $("#customer_handphone").val(d.customer_handphone);
                    $("#customer_phone").val(d.customer_phone);
                    $("#customer_address").val(d.customer_address);

                    if (d.customer_data_id != 0 && d.customer_data_id != null && d.customer_data_id != '') {
                        $("#customer_data_id").html('<option value="' + d.customer_data_id + '">' + d.customer_data_name + '</option>').sel2dma();
                    } else {
                        $("#customer_data_id").html('').sel2dma();
                    }
                    
                    $("#customer_data_number").val(d.customer_data_number);
                    $("#npwp_number").val(d.npwp_number);
                    
                    if (d.work_id != 0 && d.work_id != null && d.work_id != '') {
                        $("#work_id").html('<option value="' + d.work_id + '">' + d.customer_work_name + '</option>').sel2dma();
                    } else {
                        $("#work_id").html('').sel2dma();
                    }
                                                           
                    $("#placeofbirth").val(d.placeofbirth);
                    $("#bornday").val(bksfn.revDate(d.bornday));
                    
                    if(d.gender_id != 0 && d.gender_id != null && d.gender_id != '') {
                        $("#gender_id").val(d.gender_id);
                    }

                    if (d.nationality_id != 0 && d.nationality_id != null && d.nationality_id != '') {
                        $("#nationality_id").html('<option value="' + d.nationality_id + '">' + d.nationality_code + '</option>').sel2dma();
                    } else {
                        $("#nationality_id").html('').sel2dma();
                    }

                    $("#rt_rw").val(d.rt_rw);
                    $("#village").val(d.village);
                    $("#sub_district").val(d.sub_district);
                    $("#city").val(d.city);   
                    $("#kode_densus_dttot").val(d.kode_densus_dttot);
                    $("#customerprofil").val(d.customerprofil);    
                    $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');                     

                    $("#createdby_name").html(d.createdby_name);
                    $("#created").html(d.created);
                    $("#updatedby_name").html(d.updatedby_name);
                    $("#updated").html(d.updated);                    
                    
                    $("#btn-buy").show();
                    $("#btn-sale").show();
                    // window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: "smooth" });
                },
                error: function(xhr){
                    alertify.error(xhr.responseText);
                }
            });
        }    
    }    
}

/**
 * Reset Form
 */
function reset_form(){    
    $("#ftitle").html('Add');
    $("body").data("text_search", '');

    $("#customer_code").html('');
    
    $("#customer_type_id").html('').sel2dma();

    $("#customer_name").html('').focus();  
    $("#customer_nick_name").html();
        
    $("#status").iCheck('check');
    $("#customer_handphone").html('');  
    $("#customer_phone").html('');
    $("#customer_address").html('');

    $("#customer_data_id").html('').sel2dma();    
    $("#customer_data_number").html('');      
    $("#npwp_number").html('');   
    
    $("#work_id").html('').sel2dma();
    $("#placeofbirth").html('');
    $("#bornday").html('');    
    $("#gender_id").val('');

    $("#nationality_id").html('').sel2dma();
    $("#rt_rw").html('');
    $("#village").html('');
    $("#sub_district").html('');
    $("#city").html('');    
    $("#kode_densus_dttot").html('');
    $("#customerprofil").html('');
   
    $("#createdby_name").html('');
    $("#created").html('');
    $("#updatedby_name").html('');
    $("#updated").html('');

    $(':submit').removeAttr('disabled');

    $('#links').empty();
    $(".perorangan").hide();
    if( $("body").data("id") !== null && $("body").data("id") !== '' ){
        tampil_data();
    }
}

/**
 * redirect page
 */
function back_to_page_ini(){
    var url = "transaksi/nasabah_form/index/"+$("body").data("id")+"/null";
    $.ajax({
        url: url,
        type: 'POST',
        success: function() {
            window.open(url,'_self');
        }
    });
}

/**
 * button buy/beli
 */
$("#btn-buy").click(function (e) {
    e.preventDefault();
    $.ajax({
        url: baseUrl + 'transaksi/nasabah_form/getByID',
        type: 'POST',
        data: {'id' : $("body").data("id")},
        datatype: 'json',
        success: function(data){
            var d = JSON.parse(data)[0];            
            $("#customer_code").val(d.customer_code);        
            if(d.status === '0'){ // Non Active
                bksfn.errMsg("status data tidak aktif!");
            } else if (d.kode_densus_dttot !== '' && d.kode_densus_dttot !== null){ // Lock DTTOT
                bksfn.errMsg("nasabah terduga teroris!");
            } else {
                alertify.confirm("Transaction Buy ?", function (x) {    
                    if (x) {                                   
                        var url = call_page_task_buy($("body").data("id"), null);
                        if(url !== ''){
                            $.ajax({
                                url: url,
                                type: 'POST',
                                success: function() {
                                    window.open(url,'_self'); 
                                }
                            });
                        }                        
                    }    
                });                
            }
        },
        error: function(xhr){
            alertify.error(xhr.responseText);
        }
    });            
});

/**
 * button sale/jual
 */
$("#btn-sale").click(function (e) {
    e.preventDefault();
    $.ajax({
        url: baseUrl + 'transaksi/nasabah_form/getByID',
        type: 'POST',
        data: {'id' : $("body").data("id")},
        datatype: 'json',
        success: function(data){
            var d = JSON.parse(data)[0];            
            $("#customer_code").val(d.customer_code);        
            if(d.status === '0'){ // Non Active
                bksfn.errMsg("status data tidak aktif!");
            } else if (d.kode_densus_dttot !== '' && d.kode_densus_dttot !== null){ // Lock DTTOT
                bksfn.errMsg("nasabah terduga teroris!");
            } else {
                alertify.confirm("Transaction Sale ?", function (x) {    
                    if (x) {           
                        var url = call_page_task_sale($("body").data("id"), null);
                        if(url !== ''){
                            $.ajax({
                                url: url,
                                type: 'POST',
                                success: function() {
                                    window.open(url,'_self'); 
                                }
                            });
                        }                        
                    }    
                });                
            }
        },
        error: function(xhr){
            alertify.error(xhr.responseText);
        }
    });    
});