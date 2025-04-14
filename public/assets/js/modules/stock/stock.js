$("#btn-submit").on('click', function (e) {
    e.preventDefault();
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');            
    } else {
        $("#btn-excel").hide();
        fethdata();
    }
});

$("#btn-excel").hide();
$("#btn-excel").on('click', function (e) {
    e.preventDefault();
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');            
    } else {
        alertify.confirm("export xlsx ?", function (e) {
            if (e) {
                var url = "stock/stock/excel/";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {'store_id' : $("#store_id").val(), 'period' : $('#period').val()},
                    dataType: 'json',
                    beforeSend: function(){
                        $(".ajax-loader").height($(document).height());
                        $('.ajax-loader').css("visibility", "visible");
                    },
                    complete: function(){
                        $('.ajax-loader').css("visibility", "hidden");
                    }
                }).done(function(data){
                    var $a = $("<a>");
                        $a.attr("href",data.file);
                        $("body").append($a);
                        $a.attr("download","stock in sheet "+$('#period').val()+".xlsx");
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
            url: baseUrl + 'stock/stock/getData',
            type: 'POST',
            data: function(d) {                    
                d.store_id = $('#store_id').val(),
                d.period = $('#period').val()
            },                
            complete: function(){
                $("#btn-excel").show();
            }
        },
        columns: [
            {data: "#", className: "dt-body-center" , width: "5%", orderable: false, searchable: false},            
            {data: 'currency_code',  width: "25%", render: function (data, type, row, meta) {
                return data + ' - ' + row.currency_name;
            }},
            {data: 'nominal', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 || data == null ? '-' : formatRupiah(data));
            }},

            {data: 'beginning_stock_sheet', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 || data == null ? '-' : formatRupiah(data));
            }},
            {data: 'buy_sheet', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 || data == null ? '-' : formatRupiah(data));
            }},
            {data: 'sell_sheet', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 || data == null ? '-' : formatRupiah(data));
            }},
            {data: 'sell_alocation_sheet', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 || data == null ? '-' : formatRupiah(data));
            }},
            {data: 'last_stock_sheet', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 || data == null ? '-' : formatRupiah(data));
            }},                 
            {data: 'currency_id', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( row.last_stock_sheet == 0 || row.last_stock_sheet == null ? '-' : formatRupiah(row.last_stock_sheet * row.nominal));
            }},
            {data: 'id', visible: false},
            {data: 'currency_code', visible: false},
            {data: 'currency_name', visible: false},
            {data: 'created', visible: false},
            {data: 'updated', visible: false},
        ],            
        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            if (Number(aData.buy_sheet) > 0) {
                $(nRow).find('td:eq(4)').css('color','#0000ff');
            }
            if (Number(aData.sell_sheet) > 0) {
                $(nRow).find('td:eq(5)').css('color','#ff0000');
            }
            if (Number(aData.sell_alocation_sheet) > 0) {
                $(nRow).find('td:eq(6)').css('color','#ff0000');
            }                
        },  
        order: [[8, 'asc']]
    });
    t.draw();

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && ( $(this).index() <= 1 ) ) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
    });
    $('#searchid input').keyup(function () {
        t.columns($(this).data('id')).search(this.value).draw();
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
        $("#mainForm")[0].reset();
        window.scroll(0, 0);
        if ($("#mainForm .panel-body").css('display') == 'none') {
            $("#mainForm .panel-controls a").click();
        }
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
    });
}