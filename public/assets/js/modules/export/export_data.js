function hide_parameter(){
    $(".store_id").hide();
    $(".period_year").hide();
    $(".triwulan_ke").hide();
}

hide_parameter();
$('#export_id').on('change',function(e){
    e.preventDefault()
    if($(this).val() != null && $(this).val() != ''){
        export_id = $("#export_id").val();
        if(export_id === '1'){ // Data Custoemr
            $(".store_id").hide();
            $(".period_year").hide();
            $(".triwulan_ke").hide();
        }
        if(export_id === '2'){ // Data Sipesat
            $(".store_id").hide();
            $(".period_year").show();
            $(".triwulan_ke").show();
        }
        if(export_id === '3'){ // Data Summary Transaction By Currency
            $(".store_id").show();
            $(".period_year").show();
            $(".triwulan_ke").hide();
        }
        if(export_id === '4'){ // Data Summary Transaction By Job Customer
            $(".store_id").show();
            $(".period_year").show();
            $(".triwulan_ke").hide();
        }
    }
});

$("#form_export_data").submit(function (e) {
    e.preventDefault();
    $(':submit', this).attr('disabled', true);
}).on('reset', function (e) {        
    $('#export_id').val('');
    $('#store_id').html('').sel2dma();
    $(':submit').removeAttr('disabled');
});
$.validate({
    form: "#form_export_data",
    validateOnBlur: false,
    onError: function () {
        $('.help-block').remove();
        bksfn.errMsg("Please fill form");
    },
    onSuccess: function () {       
        if($('#export_id').val() === null || $('#export_id').val() === ''){
            bksfn.errMsg('List Belum Dipilih!');
        } else {            
            // Export - Data Customer
            if($("#export_id").val() === '1'){
                $.post('export/export_data/export_data', $("#form_export_data").serialize(), function (obj) {
                    if (obj.file) {
                        alertify.success("Export Data Success");
                        $(':submit').removeAttr('disabled');
                        var $a = $("<a>");
                                $a.attr("href",obj.file);
                                $("body").append($a);
                                $a.attr("download","Export - Data Customer.xlsx");
                                $a[0].click();
                                $a.remove();
                    } else {
                        bksfn.errMsg(obj.msg);
                    }
                }, "json").fail(function () {
                    bksfn.errMsg();
                });
            }

            // Export - Data Sipesat
            if($("#export_id").val() === '2'){
                if($('#triwulan_ke').val() === null || $('#triwulan_ke').val() === ''){
                    bksfn.errMsg('Triwulan Belum Dipilih!');
                } else {
                    $.post('export/export_data/export_data', $("#form_export_data").serialize(), function (obj) {
                        if (obj.file) {
                            alertify.success("Export Data Success");
                            $(':submit').removeAttr('disabled');
                            var $a = $("<a>");
                                    $a.attr("href",obj.file);
                                    $("body").append($a);
                                    $a.attr("download","Export - Data Sipesat " + $("#period_year").val() + " Triwulan " + $("#triwulan_ke").val() + ".xlsx");
                                    $a[0].click();
                                    $a.remove();
                        } else {
                            bksfn.errMsg(obj.msg);
                        }
                    }, "json").fail(function () {
                        bksfn.errMsg();
                    });
                }
            }  

            // Export - Data Summary Transaction By Currency
            if(export_id === '3'){
                if($('#store_id').val() === null || $('#store_id').val() === ''){
                    bksfn.errMsg('Lokasi Belum Dipilih!');
                } else {
                    $.post('export/export_data/export_data', $("#form_export_data").serialize(), function (obj) {
                        if (obj.file) {
                            alertify.success("Export Data Success");
                            $(':submit').removeAttr('disabled');
                            var $a = $("<a>");
                                    $a.attr("href",obj.file);
                                    $("body").append($a);
                                    $a.attr("download","Export -  Data Summary Transaction By Currency " + $("#period_year").val() + ".xlsx");
                                    $a[0].click();
                                    $a.remove();
                        } else {
                            bksfn.errMsg(obj.msg);
                        }
                    }, "json").fail(function () {
                        bksfn.errMsg();
                    });
                }
            }

            // Export - Data Summary Transaction By Job Customer
            if(export_id === '4'){
                if($('#store_id').val() === null || $('#store_id').val() === ''){
                    bksfn.errMsg('Lokasi Belum Dipilih!');
                } else {
                    $.post('export/export_data/export_data', $("#form_export_data").serialize(), function (obj) {
                        if (obj.file) {
                            alertify.success("Export Data Success");
                            $(':submit').removeAttr('disabled');
                            var $a = $("<a>");
                                    $a.attr("href",obj.file);
                                    $("body").append($a);
                                    $a.attr("download","Export -  Data Summary Transaction By Job Customer " + $("#period_year").val() + ".xlsx");
                                    $a[0].click();
                                    $a.remove();
                        } else {
                            bksfn.errMsg(obj.msg);
                        }
                    }, "json").fail(function () {
                        bksfn.errMsg();
                    });
                }
            }
            
            
        }           
    }
});