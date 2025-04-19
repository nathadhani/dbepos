//--- Form Submit
$("#mainForm").submit(function (e) {
    e.preventDefault();
    $(':submit', this).attr('disabled', true);
}).on('reset', function (e) {
    $("#ftitle").html('Add');        
    $("#store_id").html('').sel2dma().focus();
    $("#tr_id").html('').sel2dma();
    $("#tr_date").val('');
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
            $.post('master_data/m_trxdate/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
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
            $.post('master_data/m_trxdate/insert', $("#mainForm").serialize(), function (obj) {
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
    window.scroll(0, 0);
    if ($("#mainForm .panel-body").css('display') == 'none') {
        $("#mainForm .panel-controls a").click();
    }
    var elm = $(this).closest("tr");
    var d = t.row(elm).data();
    $("#ftitle").html('Edit');        
    if (d.store_id != 0 || d.store_id !== null) {
        $("#store_id").html('<option value="' + d.store_id + '">' + d.store_name + ' [' + d.store_id + ']' + '</option>').sel2dma();
    } else {
        $("#store_id").html('').sel2dma();
    }
    if (d.tr_id != 0 || d.tr_id !== null ) {
        $("#tr_id").html('<option value="' + d.tr_id + '">' + d.description + ' [' + d.tr_id + ']' + '</option>').sel2dma();
    } else {
        $("#tr_id").html('').sel2dma();
    }
    $("#tr_date").val(bksfn.revDate(d.tr_date));
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
        url: baseUrl + 'master_data/m_trxdate/getdata',
        type: 'POST'
    },
    columns: [
        {data: "#", width: "5%", orderable: false, searchable: false},
        {data: 'store_address'},
        {data: 'tr_name'},            
        {data: 'tr_date', render: function (data, type, row, meta) {
                return bksfn.revDate(data);
            }},
        {data: 'updated'},
        {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                return act;
            }},
        {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                return '<a title="Edit" href="#"><i class="fa fa-edit"></i></a>';
            }
        },
        {data: 'store_name', visible: false},
        {data: 'tr_id', visible: false},
        {data: 'description', visible: false},
        {data: 'store_id', visible: false},
    ],
    order: [[1, 'asc']]
});
//--- Select Row , Toggle Row & Delete
$('#mainTable').selectDTBks(t, 'master_data/m_trxdate/delete');

// Setup - add a text input to each header cell
$('#searchid td').each(function () {
    if ($(this).index() != 0 && $(this).index() != 4 && $(this).index() < 6) {
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