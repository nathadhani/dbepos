$(function () {
    $.formUtils.addValidator({
        name: 'date_range',
        validatorFunction: function (value, el, config, language, form) {
            var urlFilter = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4} - (0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/i;
            return urlFilter.test(value);
        },
        errorMessage: 'You have not given a correct date'
    });
    
    $.formUtils.addValidator({
        name: 'confirmation',
        validatorFunction: function (value, el, config, language, form) {
            return (value === $("input[name=newpassword]").val());            
        },
        errorMessage: 'Password Confirmation is incorrect'
    });
});