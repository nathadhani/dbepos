(function ($) {
    $("#btn-excel").hide();     

    $("#btn-submit").on('click', function (e) {
        e.preventDefault();
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');
        } else {
            $("#btn-excel").show();
            fethdata();
        }        
    });
    
    $("#btn-excel").on('click', function (e) {
        e.preventDefault();
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');
        } else {
            alertify.confirm("download transaction ?", function (e) {    
                if (e) {
                    var url = "transaction/transaction_buysell_list/excel/"+$('#store_id').val()+"/"+$('#tr_date1').val()+"/"+$('#tr_date2').val();
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {},
                        beforeSend: function(){
                            $(".ajax-loader").height($(document).height());
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        success: function() {
                            window.open(url,'_self'); 
                        },
                        complete: function(){
                            $('.ajax-loader').css("visibility", "hidden");
                        }
                    }).done(function(data){
                        var $a = $("<a>");
                            $a.attr("href",data.file);
                            $("body").append($a);
                            $a.attr("download","transaction buy sell.xlsx");
                            $a[0].click();
                            $a.remove();
                    });                                    
                }    
            });
        }              
    });

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
                url: baseUrl + 'transaction/transaction_buysell_list/getdata',
                type: 'POST',
                // beforeSend: function(){
                //     $(".ajax-loader").height($(document).height());
                //     $('.ajax-loader').css("visibility", "visible");
                // },
                data: function(d) {
                    d.store_id = $('#store_id').val(),
                    d.periode1 = $('#tr_date1').val(),
                    d.periode2 = $('#tr_date2').val()
                },
                complete: function(){
                    // $('.ajax-loader').css("visibility", "hidden");
                }
            },
            columns: [
                {data: "#", className: "dt-body-center", width: "5%", orderable: false, searchable: false},   
                {data: 'tr_name', width: "8%", render: function (data, type, row, meta) {                    
                    return data;
                }},
                {data: 'tr_number',  width: "10%", render: function (data, type, row, meta) {
                    return '<a title="Pilih" href="#">' + data + '</a>';
                }},
                {data: 'tr_date',  width: "10%", render: function (data, type, row, meta) {
                        return bksfn.revDate(data);
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
                {data: 'status_name', width: "13%", render: function (data, type, row, meta) {
                    return data;
                }},         
                {data: 'id', visible: false},
                {data: 'tr_id', visible: false},
                {data: 'customer_id', visible: false},
                {data: 'tr_name', visible: false},
                {data: 'status', visible: false},
            ],            
            order: [[1, 'asc'],[3, 'asc'],[2, 'asc']]
        });
        t.draw();

        // Setup - add a text input to each header cell
        $('#searchid td').each(function () {
            if ($(this).index() != 0 && $(this).index() != 4 ) {
                $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
            }            
            if ($(this).index() == 3) {
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
        $('#searchid select').change(function () {
            t.columns(1).search(this.value).draw();
        });
        $('#searchid .dpM1').change(function () {
            t.columns(3).search(this.value).draw();
        });
        $(".clrs").click(function () {
            $('#searchid input').val('');
            $('#searchid select').val('');
            t.search('')
            t.columns().search('').draw();
        });
        
        $('#mainTable').on('click', 'a[title^=Pilih]', function (e) {
            e.preventDefault();
            var elm = $(this).closest("tr");
            var d = t.row(elm).data();
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
        });
    }
})(jQuery);