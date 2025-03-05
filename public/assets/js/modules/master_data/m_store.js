(function ($) {    
    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {
        $("#ftitle").html('Add');        
        $("#store_name").html('').focus();
        $("#store_address").val('');
        $("#store_email").val('');
        $("#api_store_id").val('');
        $("#api_angkasapura").val('');
        $("#status").iCheck('check');
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
            if ($("#ftitle").html().substr(0, 4) == "Edit") {
                //--- Edit
                $.post('master_data/m_store/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
                    if (obj.msg == 1) {
                        $("#mainForm")[0].reset();
                        $('#mainTable table').DataTable().ajax.reload();
                        alertify.success("Edit Data Success");
                    } else {
                        bksfn.errMsg(obj.msg);
                    }
                }, "json").fail(function () {
                    bksfn.errMsg();
                });
            } else {
                //--- Insert
                $.post('master_data/m_store/insert', $("#mainForm").serialize(), function (obj) {
                    if (obj.msg == 1) {
                        $("#mainForm")[0].reset();
                        $('#mainTable table').DataTable().ajax.reload();
                        alertify.success("Insert Data Success");
                    } else {
                        bksfn.errMsg(obj.msg);
                    }
                }, "json").fail(function () {
                    bksfn.errMsg();
                });
            }
        }
    });    

    $('#mainTable').on('click', 'a[title^=Edit]', function (e) {
        e.preventDefault();
        window.scroll(0, 0);
        if ($("#mainForm .panel-body").css('display') == 'none') {
            $("#mainForm .panel-controls a").click();
        }
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        $("#ftitle").html('Edit');
        $("#store_name").val(d.store_name).focus();
        $("#store_address").val(d.store_address);
        $("#store_email").val(d.store_email);
        $("#api_store_id").val(d.api_store_id);
        $("#api_angkasapura").val(d.api_angkasapura);
        $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');
        $("body").data("id", d.id);
    });    

    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'it<"row"lp>',
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        ajax: {
            url: baseUrl + 'master_data/m_store/getdata',
            type: 'POST'
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'store_name', render: function (data, type, row, meta) {
                    return data;
                }
            },
            {data: 'store_address'},
            {data: 'api_store_id'},
            {data: 'api_angkasapura'},
            {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                return act;
            }},
            {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<a title="Edit" href="#"><i class="fa fa-edit"></i></a>';
                }
            },            
            {data: 'store_email', visible: false},
        ],
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTBks(t, 'master_data/m_store/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() <= 3) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
        if ($(this).index() == 5) {
            $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Active</option><option value="0">Not Active</option><select/>');
        }
    });
    $('#searchid input').keyup(function () {
        t.columns($(this).data('id')).search(this.value).draw();
    });
    $('#searchid select').change(function () {
        t.columns(5).search(this.value).draw();
    });
    $(".clrs").click(function () {
        $('#searchid input').val('');
        $('#searchid select').val('');
        t.search('')
        t.columns().search('').draw();
    });

    $("#btn-get-store-ap").on('click', function (e) {
        e.preventDefault();
        alertify.confirm("Are you sure Get Store Angkasapura ?", function (x) {
            if (x) {                       
                $.ajax({
                    url: baseUrl + 'api/api_ap/ap_post_api',
                    type: 'POST',
                    data: {'method' : 'getstore', 'store_id' : '1'},
                    datatype: 'json',
                    success: function(data) {    
                        if(data.length > 0) {
                            $('#mainTable table').DataTable().ajax.reload();
                            alertify.success('Get Store Success!');
                        }                       
                    },
                    error: function(xhr){
                        alertify.error(xhr.responseText);
                    }
                });
            } else {
                return;
            }             
        });                             
    });

    $('#mainTable').on('click', 'a[title^=Register]', function (e) {
        e.preventDefault();
        window.scroll(0, 0);
        if ($("#mainForm .panel-body").css('display') == 'none') {
            $("#mainForm .panel-controls a").click();
        }
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        var Id = d.id;
        alertify.confirm("Are you sure register store AP1 ?", function (x) {
            if (x) {           
                var StringLog = '';
                $.ajax({
                    url: baseUrl + 'api/api_ap1/ap1_sha1',
                    type: 'POST',
                    data: {'method' : 'register', 'id' : Id},
                    datatype: 'json',
                    success: function(tmp) {
                        if(tmp.length > 0) {
                            var datasha = JSON.parse(tmp);
                            var encodeBase64_sha1 = encodeBase64(datasha.sha1);
                            var base64key = encodeBase64(datasha.base64key);
                            $.ajax({
                                url: baseUrl + 'api/api_ap1/ap1_encrypt_store',
                                type: 'POST',
                                data: {'id' : Id, 'sign' : encodeBase64_sha1},
                                datatype: 'json',
                                success: function(data) {
                                    if(data.length > 0) {            
                                        var dataenc = encryptCriptoJS(data, base64key);                                        
                                        $.ajax({
                                            url: baseUrl + 'api/api_ap1/ap1_post_api',
                                            type: 'POST',
                                            data: {'method' : 'register', 'dataenc' : "'"+dataenc+"'"},
                                            datatype: 'json',
                                            success: function(resp) {
                                                StringLog = decryptCriptoJS(resp, base64key);
                                                // StringtoFile(StringLog, 'Register_Store');
                                                if (resp) {
                                                    let result;
                                                    try {
                                                        result = JSON.parse(decryptCriptoJS(resp));
                                                        responseServerAP1(result);
                                                    } catch (err) {
                                                        alertify.error("error");
                                                        StringtoFile(err.message, 'error');    
                                                    }                            
                                                }    
                                            },
                                            error: function(){
                                                alertify.error("can't register store API.!");
                                            }
                                        });                            
                                    }
                                },
                                error: function(){
                                    alertify.error("can't ecrypt data trx API.!");
                                }
                            });
                        }
                    },
                    error: function(){
                        alertify.error("can't ecrypt data sha1.!");
                    }
                });          
            }
        });
    });

})(jQuery);

