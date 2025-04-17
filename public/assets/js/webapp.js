var bksfn = ({
    revDate: function (mystr, splitt, delimiter) {
        splitt = splitt || "-";
        delimiter = delimiter || "-";
        if (mystr != null) {
            var myarr = mystr.split(splitt);
            myarr = myarr[2] + delimiter + myarr[1] + delimiter + myarr[0];
            return myarr;
        } else {
            return null;
        }
    },
    errMsg: function (err) {
        err = (err == undefined) ? "Error Connection" : "message : " + err;
        alertify.error(err);
        $(':submit').removeAttr('disabled');
    },    
    toBulan: function (bulan) {
        var month;
        switch (bulan) {
            case 1:
                month = "Jan";
                break;
            case 2:
                month = "Feb";
                break;
            case 3:
                month = "Mar";
                break;
            case 4:
                month = "Apr";
                break;
            case 5:
                month = "Mei";
                break;
            case 6:
                month = "Jun";
                break;
            case 7:
                month = "Jul";
                break;
            case 8:
                month = "Agt";
                break;
            case 9:
                month = "Sep";
                break;
            case 10:
                month = "Okt";
                break;
            case 11:
                month = "Nop";
                break;
            case 12:
                month = "Des";
                break;
        }
        return month;
    },
    toTglIndo: function(tanggal) {
        if (tanggal != null) {
            var dateArray = tanggal.split("-");
            var bln = this.toBulan(parseInt(dateArray[1]));
            return dateArray[2] + " " + bln + " " + dateArray[0];
        } else {
            return null;
        }
    },
    formatRupiahInput: function(number) {
        var number_string = number.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
        if(ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return rupiah;
    },    
    getAge: function (tanggal_lahir) {
        var date = tanggal_lahir; 
        var today = new Date();
        var birthday = new Date(date);
        var year = 0;
        if (today.getMonth() < birthday.getMonth()) {
            year = 1;
        } else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
            year = 1;
        }
        var age = today.getFullYear() - birthday.getFullYear() - year;
    
        if(age < 0){
            age = 0;
        }
        return age;
    },
    terBilang:function pembilang(nilai) {
        nilai = Math.floor(Math.abs(nilai));
       
        var simpanNilaiBagi = 0;
        var huruf = [
          '',
          'Satu',
          'Dua',
          'Tiga',
          'Empat',
          'Lima',
          'Enam',
          'Tujuh',
          'Delapan',
          'Sembilan',
          'Sepuluh',
          'Sebelas',
        ];
        var temp = '';
       
        if (nilai < 12) {
          temp = ' ' + huruf[nilai];
        } else if (nilai < 20) {
          temp = pembilang(Math.floor(nilai - 10)) + ' Belas';
        } else if (nilai < 100) {
          simpanNilaiBagi = Math.floor(nilai / 10);
          temp = pembilang(simpanNilaiBagi) + ' Puluh' + pembilang(nilai % 10);
        } else if (nilai < 200) {
          temp = ' Seratus' + pembilang(nilai - 100);
        } else if (nilai < 1000) {
          simpanNilaiBagi = Math.floor(nilai / 100);
          temp = pembilang(simpanNilaiBagi) + ' Ratus' + pembilang(nilai % 100);
        } else if (nilai < 2000) {
          temp = ' Seribu' + pembilang(nilai - 1000);
        } else if (nilai < 1000000) {
          simpanNilaiBagi = Math.floor(nilai / 1000);
          temp = pembilang(simpanNilaiBagi) + ' Ribu' + pembilang(nilai % 1000);
        } else if (nilai < 1000000000) {
          simpanNilaiBagi = Math.floor(nilai / 1000000);
          temp = pembilang(simpanNilaiBagi) + ' Juta' + pembilang(nilai % 1000000);
        } else if (nilai < 1000000000000) {
          simpanNilaiBagi = Math.floor(nilai / 1000000000);
          temp =
            pembilang(simpanNilaiBagi) + ' Miliar' + pembilang(nilai % 1000000000);
        } else if (nilai < 1000000000000000) {
          simpanNilaiBagi = Math.floor(nilai / 1000000000000);
          temp = pembilang(nilai / 1000000000000) + ' Triliun' + pembilang(nilai % 1000000000000);
        }       
        return temp;
      }
});
    
(function ($) {
    //--- Fungsi Select2
    $.fn.sel2dma = function (formatResult, formatSelection, addParm) {
        var theSelect2 = this;
        var select2Config = {};
        if (theSelect2.data('ajax')) {
            select2Config.ajax = {
                'type': 'POST',
                'url': baseUrl + theSelect2.data('url'),
                'dataType': (theSelect2.data('datatype') ? theSelect2.data('datatype') : 'JSON'),
                'delay': (theSelect2.data('delay') ? theSelect2.data('delay') : 250),
                'data': (theSelect2.data('fnData') ? theSelect2.data('fnData') : function (params) {
                    return {
                        q: (params.term != undefined) ? params.term : '',
                        page: params.page,
                        addParm: addParm,
                        limit: theSelect2.data('limit') ? theSelect2.data('limit') : 10
                    }
                }),
                processResult: (theSelect2.data('fnProcessResult') ? theSelect2.data('fnProcessResult') : function (data, page) {
                    return {
                        results: data.items
                    };
                }),
                cache: (theSelect2.data('cache') ? theSelect2.data('cache') : true)
            };
        }
        ;
        if (formatResult != undefined) {
            select2Config.templateResult = formatResult;
            select2Config.templateSelection = formatSelection;
            select2Config.escapeMarkup = function (markup) {
                return markup;
            };
        }
        select2Config.allowClear = (theSelect2.data('allowclear') == "0") ? false : true;
        select2Config.minimumInputLength = theSelect2.data('mininputlength') ? theSelect2.data('mininputlength') : -1;
        var thDefaultValue = theSelect2.data('value');
        var initSelection = function () {

        };
        if (typeof (thDefaultValue) !== 'undefined' && String(thDefaultValue).length > 0) {
            select2Config.initSelection = function (elm, calb) {
                return $.ajax({
                    type: "POST",
                    url: baseUrl + theSelect2.data('url'),
                    dataType: 'json',
                    data: {
                        id: thDefaultValue,
                        action: 'initSelection'
                    },
                    success: function (data) {
                        calb(data);
                    }
                });
            };
        }
        theSelect2.select2(select2Config);
        return theSelect2;
    };
    var theSelectDOMopt = $("select.select2");
    var objSelect2 = [];
    theSelectDOMopt.each(function (key, val) {
        $(theSelectDOMopt[key]).sel2dma();
    });

    //--- Fungsi Datatables select row , toggle dan delete
    $.fn.selectDTBks = function (t, uRLDelete) {
        var selDT = this;
        //--- Select Row
        selDT.on('click', 'tr td', function () {
            if ($(this).parent().find("td").length < 3) {
                $(this).parent().toggleClass('selected');
            } else {
                if (!$(this).is(":last-child")) {
                    $(this).parent().toggleClass('selected');
                }
            }
            return selDT;
        });
        //--- Toogle
        selDT.find("button.toggle-selected").click(function (e) {
            e.preventDefault();
            $('tr', selDT).toggleClass('selected');
        });
        //--- Delete
        selDT.find("button.delete-selected").click(function (e) {
            e.preventDefault();
            var dr = t.rows('.selected').data();
            if (dr.length == 0) {
                alertify.error("Please select row");
                return false;
            }
            alertify.set({buttonFocus: "cancel"});
            // alertify.confirm(dr.length + " rows data will be delete", function (e) {
            alertify.confirm(dr.length + " baris data akan di hapus", function (e) {    
                if (e) {
                    var id = [];
                    $.each(dr, function (i, val) {
                        id[i] = val.id;
                    });
                    $.post(uRLDelete, {id: JSON.stringify(id)}, function (obj) {
                        if (obj.msg == 1) {
                            t.ajax.reload();
                            alertify.success("Delete Data Success");
                        } else {
                            alertify.error("Error : " + obj.msg);
                        }
                    },
                    "json").fail(function () {
                        alertify.error("can't delete!");
                    });
                }
            });
        });
    };

    $.fn.checkIfExist = function(alertElm, controller, field, formElm) {
        const elm = this;
        elm.on('keyup', function (e) {
            e.preventDefault();
            $.ajax({
                url : baseUrl + controller + '/checkIfExist',
                type: 'POST',
                data: {'value' : $(this).val(), 'field' : field},
                datatype: 'json',
                success: function(resp) {
                    if (resp == 1) {
                        $('#'+alertElm).fadeIn('slow', function() {
                            $('#'+formElm).find("button[type=\"submit\"]").attr("disabled",true);
                        });
                    } else {
                        $('#'+alertElm).fadeOut('slow', function() {
                            $('#'+formElm).find("button[type=\"submit\"]").removeAttr('disabled');
                        });
                    }
                },
                error: function(xhr){
                    alertify.error(xhr.responseText);
                }
            });
        });
    };    

    //---- iCheck
    $('input[type="checkbox"].icheck, input[type="radio"].icheck').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });

    //---- Collapse
    $('[data-widget="collapse"]').on('click', function (e) {
        e.preventDefault();
        el = $(this).parent().parent().next();
        $(el).slideToggle();
        if ($('i', this).hasClass('icon-arrow-down')) {
            $('i', this).removeClass('icon-arrow-down').addClass('icon-arrow-up');
        } else {
            $('i', this).removeClass('icon-arrow-up').addClass('icon-arrow-down');
        }
    });

    $.fn.dataTable.ext.errMode = 'none';
    $('#mainTable table').on('error.dt', function (e) {
        console.log(e);
        //window.location.replace('auth/?n=' + window.location.pathname.substr(1));
    });

    // Set Active Menu
    $.defaultPage = '.';
    url = window.location.pathname.replace(/^#/, '');
    if (url != '') {
        // setUpUrl(url.substring(1));
        
    } else {
        setUpUrl($.defaultPage);
    }

    function setUpUrl(url) {
        $('li.xn-openable').removeClass('active');
        $('.x-navigation li:has(a[href="' + url + '"])').addClass('active');
        $('.x-navigation a[href="' + url + '"]').parent().addClass('active');

    }

    //---- Datepicker
    $(".dp").datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight: true
    });
    $(".dpM").datepicker({
        format: "mm-yyyy",
        autoclose: true,
        minViewMode: 1
    });
    $(".dpMo").datepicker({
        format: "MM-yyyy",
        autoclose: true,
        minViewMode: 1
    });
    $(".dpY").datepicker({
        format: "yyyy",
        autoclose: true,
        minViewMode: 2
    });
    $(".tgl").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true,
        endDate: '+1d'
    });
    $(".tgl2").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true,
        startDate: '-7d',
        endDate: '+7d'
    });
    $(":input").inputmask();    

})(jQuery);

const bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];
const bulanIndo_sort = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Juni', 'Juli', 'Agust', 'Sept' , 'Okt', 'Nov', 'Des'];

function resetForms() {
    document.forms['mainForm'].reset();
}

function isDecimal(value) {
    // return !Number.isInteger(value);
    return value % 1 !== 0;
}


function formatDMY(inputFormat) {
    function pad(s) { return (s < 10) ? '0' + s : s; }
    var d = new Date(inputFormat);
    return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('-');
}

function formatDecimal(angka, decimal) {
    if(Number(angka) > 0 && Number(decimal) > 0){
        return Number(angka).toFixed(Number(decimal));
    } else {
        return 0;
    }
    
}

function formatRupiah(angka) {
    return Number(angka).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
}  

function formatRupiahtoNumber(v){
    if(!v){return 0;}
    // v=v.split('.').join('');
    // v=v.split(',').join('.');
    return Number(v.replace(/[^0-9.]/g, ""));
}

function round(value, exp) {
    if (typeof exp === 'undefined' || +exp === 0)
      return Math.round(value);

    value = +value;
    exp = +exp;

    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0))
      return NaN;

    // Shift
    value = value.toString().split('e');
    value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp)));

    // Shift back
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp));
}

function roundUp(num, precision) {
    precision = Math.pow(10, precision)
    return Math.ceil(num * precision) / precision
}

function validasiAngka(evt){
    if(evt.length > 0) {
        evt.value = evt.value.replace(/[^0-9]/g,"");
    }
}

function validasiEmail(inputText){
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(inputText.value.match(mailformat)) {
        return true;
    } else {
        alertfly.error("Email tidak valid!");
        return false;
    }
}

function encrypt(text){
    let key = '!XX9876543210';
    return [...text].map((x, i) => 
    (x.codePointAt() ^ key.charCodeAt(i % key.length) % 255)
     .toString(16)
     .padStart(2,"0")
   ).join('')
}

function decrypt(text){
    let key = '!XX9876543210';
    return String.fromCharCode(...text.match(/.{1,2}/g)
     .map((e,i) => 
       parseInt(e, 16) ^ key.charCodeAt(i % key.length) % 255)
     )
}

function cekFileExists(url) {
    return fetch(url, { method: 'HEAD' })
        .then(response => response.ok)
        .catch(() => false);
}

function StringtoFile(content, filename){
    const link = document.createElement("a");
    const file = new Blob([content], { type: 'text/plain' });
    link.href = URL.createObjectURL(file);
    link.download = filename + ".txt";
    link.click();
    return URL.revokeObjectURL(link.href);
}

function call_page_cb_new(){
    var url = "cb/cb_list_new/index/null";
    window.open(url,'_self');
}

function call_page_cb_edit(id){
    var url = "cb/cb_list_new/index/"+id;
    window.open(url,'_self');    
}

function call_page_customer_new(){
    var url = "transaction/customer/index/";
    window.open(url,'_self');    
}

function call_page_customer_edit(id){
    var url = "transaction/customer_form/index/"+id;
    window.open(url,'_self');    
}

function call_page_task_buysell(customer_id, id_tr_header){
    var url = "transaction/transaction_buysell/index/"+customer_id+"/"+id_tr_header;
    return url;
}

function call_page_show_buysell(customer_id, id_tr_header){
    var url = "transaction/transaction_buysell/indexs/"+customer_id+"/"+id_tr_header;
    return url;
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
                    try {
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
                        }
                    }catch (e) {
                        console.error('Error parsing JSON:', e);                        
                    }                        
                }
            }    
        },
        error: function(){
            alertify.error("can't open page.!");
        }
    });    
}

function api_ap_input_trx(id_tr_header){
    if(id_tr_header !== '' && id_tr_header !== null){
        $.ajax({
            url: baseUrl + 'api/api_ap/ap_post_api',
            type: 'POST',
            beforeSend: function(){
                $(".ajax-loader").height($(document).height());
                $('.ajax-loader').css("visibility", "visible");
            },
            data: {'method' : 'inputtrx', 'id' : id_tr_header},
            datatype: 'json',
            success: function(resp) {
                if (resp !== undefined) {
                    if (resp !== '[]') {
                        if(resp.length > 0) {
                            StringtoFile(resp, 'api_input');
                            // back_to_page_show(id_tr_header);
                        }
                    }
                }        
            },
            error: function(xhr){
                $('.ajax-loader').css("visibility", "hidden");
                alertify.error("can't SUBMIT transaction API.!");
                StringtoFile(xhr.responseText, 'error');
            },
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
    } else {
        alertify.error("id header IS NULL");           
    }
}

function api_ap_adjustment_trx(id_tr_header){
    if(id_tr_header !== '' && id_tr_header !== null){
        $.ajax({
            url: baseUrl + 'api/api_ap/ap_post_api',
            type: 'POST',
            beforeSend: function(){
                $(".ajax-loader").height($(document).height());
                $('.ajax-loader').css("visibility", "visible");
            },
            data: {'method' : 'adjustmenttrx', 'id' : id_tr_header},
            datatype: 'json',
            success: function(resp) {
                if (resp !== undefined) {
                    if (resp !== '[]') {
                        if(resp.length > 0) {
                            // StringtoFile(resp, 'api_adjusment');
                            back_to_page_show(id_tr_header);
                        }                        
                    }
                }    
            },
            error: function(xhr){
                $('.ajax-loader').css("visibility", "hidden");
                alertify.error("can't CANCEL transaction API.!");
                StringtoFile(xhr.responseText, 'error');
            },
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
    } else {
        alertify.error("id header IS NULL");
    }
}