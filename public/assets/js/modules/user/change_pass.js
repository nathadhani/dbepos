(function ($) {
    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {
        $("#oldpassword").focus();
        $(':submit').removeAttr('disabled');
    });

    //--- Validasi
    $.validate({
        form: "#mainForm",
        validateOnBlur: false,
        onError: function () {
            $('.help-block').remove();
            bksfn.errMsg("Please fill form");
        },
        onSuccess: function () {
            if($("#password").val() != $("#password2").val()) {
                 bksfn.errMsg("New Password & Retype New Password different");
                 return false;
            }
            if ($("#ftitle").html().substr(0, 6) == "Change") {
                //--- Edit
                $.post('user/Change-pass/update', $("#mainForm").serialize(), function (obj) {
                    if (obj.msg == 1) {
                        $("#mainForm")[0].reset();
                        $('#mainTable table').DataTable().ajax.reload();
                        alertify.success("Edit Data Success");
                    } else {
                        bksfn.errMsg(obj.msg);
                    }
                }, "json").fail(function (xhr) {
                    alertify.onError(xhr.responseText);
                });
            } 
        }
    });

})(jQuery);