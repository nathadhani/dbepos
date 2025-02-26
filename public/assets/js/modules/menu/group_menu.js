(function ($) {
    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {
        $("#ftitle").html('Add');
        $("#menu_id").html('').sel2dma().focus();
        $("#parent_id").html('').sel2dma();
        $("#status").iCheck('check');
        $(':submit').removeAttr('disabled');
    });

    //--- Select Group
    $("#usergroup_id").on("change", function (e) {
        $(".clrs").click();
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
                $.post('menu/Group-menu/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
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
                $.post('menu/Group-menu/insert', $("#mainForm").serialize(), function (obj) {
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

//--- Edit Button
    $('#mainTable').on('click', 'a[title^=Edit]', function (e) {
        e.preventDefault();
        // $("#mainForm")[0].reset();
        window.scroll(0, 0);
        if ($("#mainForm .panel-body").css('display') == 'none') {
            $("#mainForm .panel-controls a").click();
        }
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        $("#ftitle").html('Edit');
        if (d.usergroup_id != null) {
            $("#usergroup_id").html('<option value="' + d.usergroup_id + '">' + d.usergroupname + '</option>').sel2dma();
        } else {
            $("#usergroup_id").html('').sel2dma();
        }
        if (d.menu_id != null) {
            $("#menu_id").html('<option value="' + d.menu_id + '">' + d.menu + '</option>').sel2dma();
        } else {
            $("#menu_id").html('').sel2dma();
        }
        if (d.parent_id != 0) {
            $("#parent_id").html('<option value="' + d.parent_id + '">' + d.parent + '</option>').sel2dma();
        } else {
            $("#parent_id").html('').sel2dma();
        }
        $("#menuorder").val(d.menuorder).focus();
        $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');
        $("body").data("id", d.id);
    });

//--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'it<"row"lp>',
        pageLength: 100,
        ajax: {
            url: baseUrl + 'menu/Group-menu/getDataMenu/',
            type: 'POST',
            data: function (d) {
                d.gid = $("#usergroup_id").val();
            }
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'icon', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<i class="fa  ' + data + '"></i>';
                }},
            {data: 'menu', render: function (data, type, row, meta) {
                    return (row.parent != null) ? '&nbsp&nbsp&nbsp&nbsp<span>' + data + '</span>' : '<span class="label label-success">' + data + '</span>';
                }},
            {data: 'link'},
            {data: 'parent'},
            {data: 'menuorder'},
            {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                    var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                    return act;
                }},
            {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<a title="Edit" href="#"><i class="fa fa-edit"></i></a>';
                }},
            {data: 'usergroup_id', visible: false, searchable: false, className: 'never'},
            {data: 'usergroupname', visible: false, searchable: false, className: 'never'},
            {data: 'menu_id', visible: false, searchable: false, className: 'never'},
            {data: 'parent_id', visible: false, searchable: false, className: 'never'},
        ],
        order: [[5, 'asc']]
    });
//--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTBks(t, 'menu/Group-menu/delete');

// Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() != 1 && $(this).index() != 7) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
        if ($(this).index() >= 6 && $(this).index() <= 6) {
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

    $("#delmenu").click(function (e) {
        e.preventDefault();
        var dr = t.rows('.selected').data();
        if (dr.length == 0 || dr.length > 1) {
            alertify.error("Please select only one row");
            return false;
        }
        alertify.confirm(dr.length + " rows data will be delete", function (e) {
            if (e) {
                var id = dr[0].id;
                $.post(baseUrl + 'menu/Group-menu/delete', {id: JSON.stringify(id)}, function (obj) {
                    if (obj.msg == 1) {
                        t.ajax.reload();
                        alertify.success("Delete Data Success");
                    } else {
                        alertify.error("Error : " + obj.msg);
                    }
                }, "json").fail(function () {
                    alertify.error("Error Connection");
                });
            }
        });
    });

})(jQuery);