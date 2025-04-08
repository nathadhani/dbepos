$("#btn-buysell").hide();
$(".perorangan").hide();
$(".non-perorangan").hide();
reset_form();
if( $("body").data("id") !== null && $("body").data("id") !== '' ){
    tampil_data();
}

if(text_celluler !== null && text_celluler !== ''){
    var choice = text_celluler;
    if (choice.substr(0,2) === '08'){
        $("#customer_handphone").val(text_celluler);
    }
}

$('#customer_type_id').on('change',function(){
    if ($('#customer_type_id').val() !== null && $('#customer_type_id').val() !== ''){
        if ($('#customer_type_id').val() === '1'){
            $(".perorangan").show();
            $(".non-perorangan").hide();
        } else {
            $(".perorangan").hide();
            $(".non-perorangan").show();
        }
    } else {
        $(".perorangan").hide();
        $(".non-perorangan").hide();
    }  
});


$("#mainForm").submit(function (e) {
    e.preventDefault();
    $(':submit', this).attr('disabled', true);
}).on('reset', function (e) {
    reset_form();
});
$.validate({
    form: "#mainForm",
    validateOnBlur: false,
    onError: function () {
        $('.help-block').remove();
        bksfn.errMsg("input data dengan lengkap tanda *");
    },
    onSuccess: function () {
        if( $("#customer_type_id").val() === '' || $("#customer_type_id").val() === null){
            bksfn.errMsg("input tipe pelanggan *");
            window.scrollTo({ left: 0, top: 10, behavior: "smooth" });
            $("#customer_type_id").focus();
        } else if( $("#customer_name").val() === '' || $("#customer_name").val() === null){
            bksfn.errMsg("input nama lengkap *");
            window.scrollTo({ left: 0, top: 10, behavior: "smooth" });
            $("#customer_name").focus();
        } else if( $("#customer_handphone").val() === '' || $("#customer_handphone").val() === null){
            bksfn.errMsg("input nomor handphone *");                        
            window.scrollTo({ left: 0, top: 0, behavior: "smooth" });
            $("#customer_handphone").focus();
        } else if( $("#customer_address").val() === '' || $("#customer_address").val() === null){
            bksfn.errMsg("input alamat *");                        
            window.scrollTo({ left: 0, top: 0, behavior: "smooth" });
            $("#customer_address").focus();
        } else if( $("#job_id").val() === '' || $("#job_id").val() === null){
            bksfn.errMsg("input Pekerjaan *");                        
            window.scrollTo({ left: 0, top: 0, behavior: "smooth" });
            $("#job_id").focus();
        } else {           
            if ($('#customer_type_id').val() === '1'){ // Pelanggan Per Orangan
                if ($("#ftitle").html().substr(0, 4) == "Edit") {
                    var image_url = baseUrl + "assets/arsip/customer/" + $("#customer_code").val() + ".jpg";
                    $.ajax({
                        url:image_url,
                        type:'HEAD',
                        error: function() {
                            //file not exists                            
                            $.post('transaction/customer_form/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
                                if (obj.msg == 1) {                                
                                    $("body").data("text_search", '');
                                    alertify.success("Edit Data Success");     
                                    tampil_data();
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
                                bksfn.errMsg("input tipe identitas");
                                $("#customer_data_id").focus();
                            } else if( $("#customer_data_number").val() === '' || $("#customer_data_number").val() === null){
                                bksfn.errMsg("input nomor identitas"); 
                                $("#customer_data_number").focus();
                            } else if( $("#nationality_id").val() === '' || $("#nationality_id").val() === null){
                                bksfn.errMsg("input warga negara");
                            } else if( $("#job_id").val() === '' || $("#job_id").val() === null){
                                bksfn.errMsg("input pekerjaan");
                            } else if( $("#gender_id").val() === '' || $("#gender_id").val() === null){
                                bksfn.errMsg("input jenis kelamin");
                            } else if( $("#placeofbirth").val() === '' || $("#placeofbirth").val() === null){
                                bksfn.errMsg("input tempat lahir");
                            } else if( $("#bornday").val() === '' || $("#bornday").val() === null){
                                bksfn.errMsg("input tanggal lahir");
                            } else {
                                $.post('transaction/customer_form/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
                                    if (obj.msg == 1) {                                
                                        $("body").data("text_search", '');
                                        alertify.success("Edit Data Success");     
                                        tampil_data();
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
                    $.post('transaction/customer_form/insert', $("#mainForm").serialize(), function (obj) {
                        if (obj.msg == 1) {                            
                            $("body").data("text_search", '');
                            $("body").data("id", obj.id);     
                            $("#ftitle").html('Edit');
                            alertify.success("Insert Data Success");       
                            call_page_customer_edit(obj.id);
                            tampil_data();
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
                    $.post('transaction/customer_form/update', $("#mainForm").serialize() + "&id=" + $("body").data("id") , function (obj) {
                        if (obj.msg == 1) {                            
                            $("body").data("text_search", '');
                            $("body").data("id", obj.id);     
                            $("#ftitle").html('Edit');
                            alertify.success("Insert Data Success");       
                            call_page_customer_edit(obj.id);
                            tampil_data();
                        } else {
                            bksfn.errMsg(obj.msg);
                        }
                    }, "json").fail(function (xhr) {
                        alertify.error(xhr.responseText);
                    });
                } else {
                    //--- Insert
                    $.post('transaction/customer_form/insert', $("#mainForm").serialize(), function (obj) {
                        if (obj.msg == 1) {                            
                            $("body").data("text_search", '');
                            $("body").data("id", obj.id);     
                            alertify.success("Insert Data Success");
                            tampil_data();
                        } else {
                            bksfn.errMsg(obj.msg);
                        }
                    }, "json").fail(function (xhr) {
                        alertify.error(xhr.responseText);
                    });
                }
            }
        }
    }
});

$('#upload_foto').on('change',function(e){
    e.preventDefault();    
    var files = $('#upload_foto')[0].files;
    // var file_exist = files.length > 0 ? 1 : 0;
    var error = '';
    var formData = new FormData(document.getElementById("mainForm"));
    formData.append('CIF', $('#customer_code').val());
    var name = files[0].name;
    var extension = name.split('.').pop().toLowerCase();    

    if ($.inArray(extension, ['jpg', 'jpeg', 'png']) == -1) {
        error += "Invalid Image File";
    }

    if (error == '') {
        $.ajax({
            url: 'transaction/customer_form/add_foto',
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
                    alertify.success('File has been uploaded');
                }  
                history.go(0); // untuk memuat ulang halaman tanpa cache.
                tampil_data();
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
        // $("#form_foto")[0].reset();
    }            
});

 function tampil_data(){
    if( typeof($("body").data("id")) !== 'undefined') {
        if($("body").data("id") !== null && $("body").data("id") !== '') {
            $("body").data("text_search", '');
            $.ajax({
                url: baseUrl + 'transaction/customer_form/getcustomerbyid',
                type: 'POST',
                data: {'id' : $("body").data("id")},
                datatype: 'json',
                success: function(data){
                    var d = JSON.parse(data)[0];
                    $("#ftitle").html('Edit');
                    $("body").data("id", d.id);

                    if(d.status !== '1'){
                        $("#btn-buysell").hide();
                    }

                    $("#customer_code").val(d.customer_code);                    
                    if (d.customer_type_id != 0 && d.customer_type_id != null && d.customer_type_id != '') {
                        $("#customer_type_id").html('<option value="' + d.customer_type_id + '">' + d.customer_type_name + ' [' + d.customer_type_id + ']'  + '</option>').sel2dma();
                        if(d.customer_type_id === '1'){
                            $(".perorangan").show();
                            $(".non-perorangan").hide();
                        } else {
                            $(".perorangan").hide();
                            $(".non-perorangan").show();
                        }
                    } else {
                        $("#customer_type_id").html('').sel2dma();
                    }               

                    $("#customer_name").val(d.customer_name).focus();  
                    $("#customer_nick_name").val(d.customer_nick_name);                    

                    $("#permit_number").val(d.permit_number);                    
                    $("#permit_date_start").val(bksfn.revDate(d.permit_date_start));
                    $("#permit_date_end").val(bksfn.revDate(d.permit_date_end));

                    $("#customer_handphone").val(d.customer_handphone);
                    $("#customer_phone").val(d.customer_phone);
                    $("#customer_address").val(d.customer_address);

                    if (d.customer_data_id != 0 && d.customer_data_id != null && d.customer_data_id != '') {
                        $("#customer_data_id").html('<option value="' + d.customer_data_id + '">' + d.customer_data_name + ' [' + d.customer_data_id + ']' + '</option>').sel2dma();
                    } else {
                        $("#customer_data_id").html('').sel2dma();
                    }
                    
                    $("#customer_data_number").val(d.customer_data_number);
                    $("#npwp_number").val(d.npwp_number);
                    
                    if (d.job_id != 0 && d.job_id != null && d.job_id != '') {
                        $("#job_id").html('<option value="' + d.job_id + '">' + d.customer_job_name + '</option>').sel2dma();
                    } else {
                        $("#job_id").html('').sel2dma();
                    }
                                                           
                    $("#placeofbirth").val(d.placeofbirth);
                    $("#bornday").val(bksfn.revDate(d.bornday));
                    
                    if(d.gender_id != 0 && d.gender_id != null && d.gender_id != '') {
                        $("#gender_id").val(d.gender_id);
                    }

                    if (d.nationality_id != 0 && d.nationality_id != null && d.nationality_id != '') {
                        $("#nationality_id").html('<option value="' + d.nationality_id + '">' + d.nationality_desc + ' [' + d.nationality_code + ']' + '</option>').sel2dma();
                    } else {
                        $("#nationality_id").html('').sel2dma();
                    }

                    $("#rt_rw").val(d.rt_rw);
                    $("#village").val(d.village);
                    $("#sub_district").val(d.sub_district);
                    $("#city").val(d.city);   
                    $("#customerprofil").val(d.customerprofil);    
                    $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');                     
                    
                    $("#btn-buysell").show();                    
                    // window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: "smooth" });
                },
                error: function(xhr){
                    alertify.error(xhr.responseText);
                }
            });
        }    
    }    
    $(':submit').removeAttr('disabled');
}

function reset_form(){    
    $("#ftitle").html('Add');
    $("body").data("text_search", '');

    $("#customer_code").html('');
    $("#customer_type_id").html('').sel2dma().focus();
    $("#customer_name").html('');
    $("#customer_nick_name").html();  
    $("#customer_handphone").html('');
    $("#customer_phone").html('');
    $("#permit_number").val('');                    
    $("#permit_date_start").val('');
    $("#permit_date_end").val('');

    $("#customer_address").html('');
    $("#rt_rw").html('');
    $("#village").html('');
    $("#sub_district").html('');
    $("#city").html('');        
    $("#customerprofil").html('');
    $("#status").iCheck('check');

    $("#customer_data_id").html('').sel2dma();    
    $("#customer_data_number").html('');      
    $("#npwp_number").html('');       
    $("#nationality_id").html('').sel2dma();
    $("#job_id").html('').sel2dma();
    $("#placeofbirth").html('');
    $("#bornday").html('');    
    $("#gender_id").val('');

    $(':submit').removeAttr('disabled');
    $(".perorangan").hide();
    $(".non-perorangan").hide();
}

$("#btn-buysell").click(function (e) {
    e.preventDefault();    
    if($("#customer_data_number").val() !== '' && $("#customer_data_number").val() !== null){
        $.ajax({
            url: baseUrl + 'transaction/customer_form/ceknikdttot',
            type: 'POST',
            data: {'nik' : $("#customer_data_number").val()},
            datatype: 'json',
            success: function(data){
                try {
                    if (data !== '[]' && data.length > 0){
                        var d = JSON.parse(data)[0];
                        alertify.alert('Peringatan, Pelanggan ini Terdaftar di list DTTOT PPATK...!\n' + d.deskripsi.trim());
                        $("#btn-buysell").hide();
                    } else {
                        $.ajax({
                            url: baseUrl + 'transaction/customer_form/getcustomerbyid',
                            type: 'POST',
                            data: {'id' : $("body").data("id")},
                            datatype: 'json',
                            success: function(data){
                                var d = JSON.parse(data)[0];            
                                $("#customer_code").val(d.customer_code);        
                                if(d.status === '0'){ // Non Active
                                    bksfn.errMsg("status data tidak aktif!");
                                } else {
                                    var url = call_page_task_buysell($("body").data("id"), null);
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
                            },
                            error: function(xhr){
                                alertify.error(xhr.responseText);
                            }
                        });
                    }
                } catch (error) {
                    console.error('Error parsing JSON:', error.message);
                }                            
            },
            error: function(xhr){
                alertify.error(xhr.responseText);
            }
        });
    } else {
        $.ajax({
            url: baseUrl + 'transaction/customer_form/getcustomerbyid',
            type: 'POST',
            data: {'id' : $("body").data("id")},
            datatype: 'json',
            success: function(data){
                var d = JSON.parse(data)[0];            
                $("#customer_code").val(d.customer_code);        
                if(d.status === '0'){ // Non Active
                    bksfn.errMsg("status data tidak aktif!");
                } else {
                    var url = call_page_task_buysell($("body").data("id"), null);
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
            },
            error: function(xhr){
                alertify.error(xhr.responseText);
            }
        });
    }                  
});

const inputElement = document.getElementById('customer_data_number');
inputElement.addEventListener('change', function(e) {
    e.preventDefault();
    $.ajax({
        url: baseUrl + 'transaction/customer_form/ceknikdttot',
        type: 'POST',
        data: {'nik' : inputElement.value},
        datatype: 'json',
        success: function(data){
            try {
                var d = JSON.parse(data)[0];
                if(d.deskripsi !== null && d.deskripsi !== ''){
                    alertify.alert('Peringatan, Pelanggan ini Terdaftar di list DTTOT PPATK...!');
                    $("#btn-buysell").hide();
                }
            } catch (error) {
                console.error('Error parsing JSON:', error.message);
            }                            
        },
        error: function(xhr){
            alertify.error(xhr.responseText);
        }
    });
});