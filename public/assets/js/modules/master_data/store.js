(function ($) {    
    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'it<"row"lp>',
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        ajax: {
            url: baseUrl + 'master_data/store/getData',
            type: 'POST'
        },
        columns: [
            {data: "#", className: "dt-body-center", width: "5%", orderable: false, searchable: false},
            {data: 'company_address', render: function (data, type, row, meta) {
                return data;
            }},          
            {data: 'store_name', render: function (data, type, row, meta) {
                    return data;
                }
            },
            {data: 'store_address'},            
            {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                return act;
            }},
            {data: 'company_id', visible: false},
            {data: 'company_name', visible: false},
            {data: 'company_city', visible: false},
            {data: 'airport_id', visible: false},
            {data: 'airport_code', visible: false},
            {data: 'airport_desc', visible: false},
            {data: 'airport_terminal', visible: false},
            {data: 'register_status', visible: false},
            {data: 'store_reference_id', visible: false},
        ],
        order: [[1, 'asc'],[2, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTBks(t, 'master_data/m_store/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
        if ($(this).index() == 4) {
            $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Active</option><option value="0">Not Active</option><select/>');
        }
    });
    $('#searchid input').keyup(function () {
        t.columns($(this).data('id')).search(this.value).draw();
    });
    $('#searchid select').change(function () {
        t.columns(4).search(this.value).draw();
    });
    $(".clrs").click(function () {
        $('#searchid input').val('');
        $('#searchid select').val('');
        t.search('')
        t.columns().search('').draw();
    });

})(jQuery);

