(function ($) {
    fethdata();
    //--- Datatables
    function fethdata(){
        var t = $('#mainTable table').DataTable({
            retrieve: true,
            serverSide: true,
            processing: true,
            autoWidth: false,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            sDom: 'it<"row"lp>',
            ajax: {
                url: baseUrl + 'api/api_ap_input/getData',
                type: 'POST'
            },
            columns: [
                {data: "#", className: "dt-body-center", width: "5%", orderable: false, searchable: false},   
                {data: 'tr_name', width: "8%", render: function (data, type, row, meta) {                    
                    return data;
                }},
                {data: 'tr_date',  width: "10%", render: function (data, type, row, meta) {
                        return bksfn.revDate(data);
                }},
                {data: 'tr_number',  width: "10%", render: function (data, type, row, meta) {
                    return data;
                }},                                
                {data: 'total', width: "8%", render: function (data, type, row, meta) {
                    return formatRupiah(data);
                }},
                {data: 'customer_name',  width: "35%", render: function (data, type, row, meta) {
                        return data;
                }},
                {data: 'createdby_name',  width: "15%", render: function (data, type, row, meta) {
                        return data;
                }},                
                {data: 'status_name', width: "10%", render: function (data, type, row, meta) {
                    return data;
                }},     
                {data: 'id', className: "dt-body-center", orderable: false, width: "10%", render: function (data, type, row, meta) {
                        return '<a title="Edit" href="#"><i class="fa fa-edit"></i></a>';
                    }
                },     
                {data: 'tr_id', visible: false},
                {data: 'customer_id', visible: false},
                {data: 'tr_name', visible: false},
                {data: 'status', visible: false},
                {data: 'createdby', visible: false},
            ],            
            fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                if (Number(aData.status) == 2) {
                    $(nRow).find('td:eq(7)').css('color','#FF0000');
                    $(nRow).find('td:eq(7)').css('font-weight','bold');
                }                                    
            },                       
            order: [[1, 'asc'],[3, 'asc'],[2, 'asc']]
        });
        t.draw();

        // Setup - add a text input to each header cell
        $('#searchid td').each(function () {
            if ($(this).index() != 0 && $(this).index() != 4 && $(this).index() != 8) {
                $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
            }            
            if ($(this).index() == 2) {
                var index = parseInt($(this).index()) + 1;
                $(this).html('<input class="dpM1" style="width:100%; border: solid 1px #ccc; padding: 4px;" type="text" placeholder="Search" data-id="' + index + '" />');
                $(".dpM1").datepicker({
                    format: "yyyy-mm-dd",
                    autoclose: true,
                    todayHighlight: true
                });
            }            
        });
        $('#searchid input').keyup(function () {
            t.columns($(this).data('id')).search(this.value).draw();
        });
        $('#searchid .dpM1').change(function () {
            t.columns(2).search(this.value).draw();
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
            var elm = $(this).closest("tr");
            var d = t.row(elm).data();          
            url = call_page_show_buysell(d.customer_id, d.id);
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
        });
    }
})(jQuery);