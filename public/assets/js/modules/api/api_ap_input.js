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
                url: baseUrl + 'api/api_transaction_input/getData',
                type: 'POST'
            },
            columns: [
                {data: "#", className: "dt-body-center", width: "5%", orderable: false, searchable: false},   
                {data: 'tr_number',  width: "10%", render: function (data, type, row, meta) {
                    if(Number(row.createdby) == Number(userId)){
                        return '<a title="Pilih" href="#">' + data + '</a>';
                    } else {
                        return data;
                    }                    
                }},
                {data: 'tr_date',  width: "10%", render: function (data, type, row, meta) {
                        return bksfn.revDate(data);
                }},
                {data: 'customer_name',  width: "35%", render: function (data, type, row, meta) {
                        return data;
                }},
                {data: 'createdby_name',  width: "15%", render: function (data, type, row, meta) {
                        return data;
                }},
                {data: 'tr_id', width: "8%", render: function (data, type, row, meta) {
                    var act = (data == '1') ? '<Stong style="color:blue;">Trx Buy</Stong>' : '<Stong style="color:red;">Trx Sale</Stong>';
                    return act;
                }},
                {data: 'status', width: "10%", render: function (data, type, row, meta) {
                    return lstatus_name(data);
                }},          
                {data: 'id', visible: false},
                {data: 'customer_id', visible: false},
                {data: 'createdby', visible: false},
            ],            
            order: [[1, 'asc']]
        });
        t.draw();

        // Setup - add a text input to each header cell
        $('#searchid td').each(function () {
            if ($(this).index() != 0 && ( $(this).index() <= 5) ) {
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
            if ($(this).index() == 5) {
                $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Trx Buy</option><option value="2">Trx Sales</option><select/>');
            }
        });
        $('#searchid input').keyup(function () {
            t.columns($(this).data('id')).search(this.value).draw();
        });
        $('#searchid .dpM1').change(function () {
            t.columns(2).search(this.value).draw();
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

        //--- Edit Data
        $('#mainTable').on('click', 'a[title^=Pilih]', function (e) {
            e.preventDefault();
            var elm = $(this).closest("tr");
            var d = t.row(elm).data();          
            var url = '';
            if(Number(d.tr_id) == 1){
                url = call_page_show_buy(d.customer_id, d.id);
            } else {
                url = call_page_show_sale(d.customer_id, d.id);
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
        });
    }
})(jQuery);

function lstatus_name(status_id) {
    var status_Id =  Number(status_id);
    var lstatus = '';
    switch(status_Id) {
        case 1:
            lstatus += '<strong>Confirm</strong>';
            break;
        case 2:
            lstatus += '<strong style="color:red;">Canceled</strong>';
            break;
        case 3:
            lstatus += '<strong>Closed</strong>';
            break;
        case 4:
            lstatus += '<strong>Available</strong>';
            break;             
        default:
            lstatus = '';
    }
    return lstatus;
}