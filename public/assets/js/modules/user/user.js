(function ($) {
    if( usergroupId == 1) {
        $("#ftitle").html('Add');
    } else {
        $("#ftitle").html('Edit');
    }

    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {        
        if( usergroupId == 1) {
            $("#ftitle").html('Add');
        } else {
            $("#ftitle").html('Edit');
        }   

        $("#username").focus();
        $("#fullname").html('');
        $("#email").html('');
        $("#celluler").html('');
        $("#status").iCheck('checked');

        if( usergroupId == 1) {
            $("#store_id").html('').sel2dma();
            $("#store_id_multiple").html('').sel2dma();
            $("#usergroup_id").html('').sel2dma();
            $("#userlevel_id").html('').sel2dma();    
        }

        $('#password').prev().addClass('mandatory');
        $('#password').attr('data-validation', 'required');
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
            if( usergroupId == 1) {
                var store_id = $("#store_id").val();
            } else {
                var store_id = storeId;
            }  
            if ($("#ftitle").html().substr(0, 4) == "Edit") {
                //--- Edit
                $.post('user/update', $("#mainForm").serialize() + "&id=" + $("body").data("id") + "&store_id=" + store_id, function (obj) {
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
                if( usergroupId == 1) {
                    //--- Insert
                    $.post('user/insert', $("#mainForm").serialize() + "&store_id=" + store_id, function (obj) {
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
                } else {
                    $.ajax({
                        url: baseUrl + 'user/getcountuserbystoreid',
                        type: 'POST',
                        data: {'store_id' : storeId},
                        datatype: 'json',
                        success: function(data){
                            if (data !== undefined) {
                                if (data !== '[]'){
                                    var d = JSON.parse(data);
                                    if(Number(d.count_users) < Number(d.user_limits) ){
                                        //--- Insert
                                        $.post('user/insert', $("#mainForm").serialize() + "&store_id=" + store_id, function (obj) {
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
                                    } else {
                                        $("#mainForm")[0].reset();
                                        alertify.error('maaf jumlah user dibatasi, hanya ' + d.user_limits + ' akun saja.!');
                                    }
                                }
                            }
                        },
                        error: function(xhr){
                            alertify.error(xhr.responseText);
                        }
                    });
                }                                
            }
        }
    });    

    //--- getData Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'it<"row"lp>',
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        ajax: {
            url: baseUrl + 'user/getData',
            type: 'POST'
        },
        columns: [
            {data: "#", className: "dt-body-center", width: "5%", orderable: false, searchable: false},
            {data: 'username', render: function (data, type, row, meta) {                    
                    return data;                    
                }
            },            
            {data: 'fullname'},    
            {data: 'userlevelname'},
            {data: 'store_address'},
            {data: 'userlevel_id', render: function (data, type, row, meta) {
                var act = (row.lastlog !== null) ? row.lastlog : '';
                return act;
            }},          
            {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                    var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                    return act;
                }
            },            
            {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    if( userlevelId == 1){
                        return '<a title="Edit" href="#"><i class="fa fa-edit"></i></a>';
                    } else {
                        return '';
                    }                    
                }
            },
            {data: 'id', visible: false},
            {data: 'store_id', visible: false},
            {data: 'store_name', visible: false},            
            {data: 'store_id_multiple', visible: false},
            {data: 'store_id_multiple_object', visible: false},
            {data: 'usergroup_id', visible: false},
            {data: 'usergroupname', visible: false},
            {data: 'userlevel_id', visible: false},
            {data: 'email', visible: false},
            {data: 'celluler', visible: false},
            {data: 'lastlog', visible: false},
        ],
        order: [[1, 'asc'],[2, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTBks(t, 'user/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() < 8) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
        if ($(this).index() == 6) {
            $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Active</option><option value="0">Not Active</option><select/>');
        }
    });
    $('#searchid input').keyup(function () {
        t.columns($(this).data('id')).search(this.value).draw();
    });
    $('#searchid select').change(function () {
        t.columns(6).search(this.value).draw();
    });
    $(".clrs").click(function () {
        $('#searchid input').val('');
        $('#searchid select').val('');
        t.search('')
        t.columns().search('').draw();
    });    

    //--- Edit Data
    $('#mainTable').on('click', 'a[title^=Edit]', function (e) {
        e.preventDefault();
        $("#mainForm")[0].reset();
        window.scroll(0, 0);
        if ($("#mainForm .panel-body").css('display') == 'none') {
            $("#mainForm .panel-controls a").click();
        }
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        $("#ftitle").html('Edit');
        $("#username").val(d.username).focus();
        $('#password').prev().removeClass('mandatory');
        $('#password').removeAttr('data-validation');

        $("#fullname").val(d.fullname);

        if (d.usergroup_id != null) {
            $("#usergroup_id").html('<option value="' + d.usergroup_id + '">' + d.usergroupname + '</option>').sel2dma();
        } else {
            $("#usergroup_id").html('').sel2dma();
        }

        if (d.userlevel_id != null) {
            $("#userlevel_id").html('<option value="' + d.userlevel_id + '">' + d.userlevelname + '</option>').sel2dma();
        } else {
            $("#userlevel_id").html('').sel2dma();
        }

        $("#email").val(d.email);
        $("#celluler").val(d.celluler);
        
        $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');

        if( usergroupId == 1) {
            if (d.store_id != null) {
                $("#store_id").html('<option value="' + d.store_id + '">' + d.store_address + '</option>').sel2dma();
            } else {
                $("#store_id").html('').sel2dma();
            }
            
            if (d.store_id_multiple_object != null) {
                store_id_multiple_object = JSON.parse(d.store_id_multiple_object);
                console.log(store_id_multiple_object);    
                $("#store_id_multiple").html('').sel2dma();    
                $.each(store_id_multiple_object, function (i, val) {
                    $("#store_id_multiple").append(`<option value="${val.id}">${val.store_address} [${val.id}]</option>`);    
                    $("#store_id_multiple-container").find("span.select2-container ul.select2-selection__rendered").append(`<li class="select2-selection__choice" title="${val.store_address} [${val.id}]"><span class="select2-selection__choice__remove" role="presentation">×</span>${val.store_address} [${val.id}]</li>`);
                });    
                $("input.select2-search__field").attr('placeholder', '');
                $("input.select2-search__field").css("width", "0");
                $("ul.select2-selection__rendered").append('<span class="select2-selection__clear">×</span>');
            }    
            if (d.store_id_multiple != null) {
                $("#store_id_multiple").val(d.store_id_multiple.split(','));
            }
        }       
        $("body").data("id", d.id);
    });    

})(jQuery);