//--- Form Submit
$("#mainForm").submit(function (e) {
    e.preventDefault();
    $(':submit', this).attr('disabled', true);
}).on('reset', function (e) {
    $("#ftitle").html('Add');
    $("#cb_id").html('').sel2dma();
    $("#cb_pos_name").val('').focus();
    $("#cb_pos_in_out").val('');
    $("#buysell_tr_id").html('').sel2dma();
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
            $.post('master_data/m_cb_pos/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
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
            $.post('master_data/m_cb_pos/insert', $("#mainForm").serialize(), function (obj) {
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

//--- Datatables
var t = $('#mainTable table').DataTable({
    serverSide: true,
    processing: true,
    autoWidth: false,
    sDom: 'it<"row"lp>',
    lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
    ajax: {
        url: baseUrl + 'master_data/m_cb_pos/getdata',
        type: 'POST'
    },
    columns: [
        {data: "#", className: "dt-body-center", width: "5%", orderable: false, searchable: false},
        {data: 'store_address'},
        {data: 'cb_name'},
        {data: 'cb_pos_name'},
        {data: 'cb_pos_in_out', width: "5%"},
        {data: 'cb_biaya', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
            var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
            return act;
        }},
        {data: 'buysell_tr_id_name'},
        {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
            var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
            return act;
        }},
        {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                return '<a title="Edit" href="#"><i class="fa fa-edit"></i></a>';
            }
        },
        {data: 'cb_id', visible: false},
        {data: 'buysell_tr_id', visible: false},
    ],
    order: [[1, 'asc']]
});
//--- Select Row , Toggle Row & Delete
$('#mainTable').selectDTBks(t, 'master_data/m_cb_pos/delete');

// Setup - add a text input to each header cell
$('#searchid td').each(function () {
    if ($(this).index() != 0 && $(this).index() < 5) {
        $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
    }
    if ($(this).index() == 7) {
        $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Active</option><option value="0">Not Active</option><select/>');
    }
});
$('#searchid input').keyup(function () {
    t.columns($(this).data('id')).search(this.value).draw();
});
$('#searchid select').change(function () {
    t.columns(7).search(this.value).draw();
});
$(".clrs").click(function () {
    $('#searchid input').val('');
    $('#searchid select').val('');
    t.search('')
    t.columns().search('').draw();
});

//--- Edit Button
$('#mainTable').on('click', 'a[title^=Edit]', function (e) {
    e.preventDefault();
    window.scroll(0, 0);
    if ($("#mainForm .panel-body").css('display') == 'none') {
        $("#mainForm .panel-controls a").click();
    }
    var elm = $(this).closest("tr");
    var d = t.row(elm).data();
    $("#ftitle").html('Edit');
    if (d.cb_id != null) {
        $("#cb_id").html('<option value="' + d.cb_id + '">' + d.store_address + ' [ ' + d.cb_name + ' ]' + '</option>').sel2dma();
    } else {
        $("#cb_id").html('').sel2dma();
    }
    $("#cb_pos_name").val(d.cb_pos_name).focus();
    $("#cb_pos_in_out").val(d.cb_pos_in_out);
    if (d.cb_biaya != null) {
        $("#cb_biaya").val(d.cb_biaya);
    }
    if (d.buysell_tr_id != null) {
        $("#buysell_tr_id").html('<option value="' + d.buysell_tr_id + '">' + d.buysell_tr_id_name + '</option>').sel2dma();
    } else {
        $("#buysell_tr_id").html('').sel2dma();
    }
    $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');
    $("body").data("id", d.id);
});