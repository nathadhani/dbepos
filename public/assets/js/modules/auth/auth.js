(function ($) {
    //--- Language 
    var msg = getCookie('loginlang');
    msg = msg.length === 0 ? "id" : msg;
    var en = {
        fill: 'Please fill the form',
        errc: 'Connection Problem',
        wuser: 'Wrong Username',
        wpass: 'Wrong Password',
        noactiv: 'User Not Active, Contact Admin',
        errweb : 'User Can Not Access Web, Contact Admin'
    }
    var id = {
        fill: 'input user & password.!',
        errc: 'Masalah koneksi',
        wuser: 'Username tidak ditemukan',
        wpass: 'Password salah',
        noactiv: 'User tidak aktif, Silahkan kontak admin',
        errweb : 'User tidak bisa akses web, silahkan kontak admin'
    }

    $("#frmLogin").submit(function (e) {
        e.preventDefault();
        if ($("#username").val() == '' || $("#password").val() == '') {
            alertify.error(eval(msg).fill);
        } else {
            var hr = decodeURIComponent($(location).attr('search'));
            $.post('auth/Login', $(this).serialize(), function (obj) {
                switch (obj) {
                    case 'U':
                        alertify.error(eval(msg).wuser);
                        break;
                    case 'P':
                        alertify.error(eval(msg).wpass);
                        break;
                    case 'S':
                        alertify.error(eval(msg).noactiv);
                        break;
                    case 'W':
                        alertify.error(eval(msg).errweb);
                        break;
                    case 'C':
                        window.location.replace('auth/pass');
                        break;    
                    default:
                        hr = (hr.substr(3) != '') ? hr.substr(3) : '.';
                        window.location.replace(hr);
                }
            }
            ).fail(function () {
                alertify.error(eval(msg).errc);
            });
        }

    })

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ')
                c = c.substring(1);
            if (c.indexOf(name) == 0)
                return c.substring(name.length, c.length);
        }
        return "";
    }

    function verticalAlignMiddle() {
        var bodyHeight = $(window).height();
        var formHeight = $('.vamiddle').height();
        var marginTop = (bodyHeight / 2) - (formHeight / 2);
        if (marginTop > 0)
        {
            $('.vamiddle').css('margin-top', marginTop - 80);
        }
    }

    verticalAlignMiddle();
    $(window).bind('resize', verticalAlignMiddle);

})(jQuery);

$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});