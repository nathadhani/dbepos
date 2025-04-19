$("#btn-stock-calculate").on('click', function (e) {
    e.preventDefault();
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');
    } else {
        $.ajax({
            url: baseUrl + 'stock/stock/generate_tr_stock_pull',
            type: 'POST',
            beforeSend: function(){
                $(".ajax-loader").height($(document).height());
                $('.ajax-loader').css("visibility", "visible");
            },
            data: {'store_id' : $('#store_id').val(), 'periode' : $('#periode').val()},
            datatype: 'json',
            success: function(data){
                alertify.success('Calculate stock in total and sheet done.!');
                $.ajax({
                    url: baseUrl + 'stock/stock/generate_tr_stock_price',
                    type: 'POST',
                    beforeSend: function(){
                        $(".ajax-loader").height($(document).height());
                        $('.ajax-loader').css("visibility", "visible");
                    },
                    data: {'store_id' : $('#store_id').val(), 'period' : $('#period').val()},
                    datatype: 'json',
                    success: function(data){
                        alertify.success('Calculate stock by currency done.!');
                    },
                    complete: function(){
                        $('.ajax-loader').css("visibility", "hidden");
                    },
                    error: function(xhr){
                        $('.ajax-loader').css("visibility", "hidden");
                        alertify.error("error calculate stock by currency.!");
                        StringtoFile(xhr.response.text(), 'error');
                    }
                });
            },
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            },
            error: function(xhr){
                $('.ajax-loader').css("visibility", "hidden");
                alertify.error("error calculate stock in total and sheet.!");
                StringtoFile(xhr.response.text(), 'error');
            }
        });                        
    }
});

$("#btn-submit").on('click', function (e) {
    e.preventDefault();
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');            
    } else {
        fethdata1();
        fethdata2();
    }
});

// Stock - In Total
function fethdata1(){        
    var t1 = $('#mainTable1 table').DataTable({
        retrieve: true,
        serverSide: true,
        processing: true,
        autoWidth: false,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],            
        sDom: 'it<"row"lp>',
        ajax: {
            url: baseUrl + 'stock/stock/getData1',
            type: 'POST',
            data: function(d) {                    
                d.store_id = $('#store_id').val(),
                d.period = $('#period').val()
            }
        },
        columns: [
            {data: "#", className: "dt-body-center" , width: "5%", orderable: false, searchable: false},            
            {data: 'currency_code',  width: "25%", render: function (data, type, row, meta) {
                return data + ' - ' + row.currency_name;
            }},
            {data: 'beginning_stock', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 || data == null ? '-' : formatRupiah(data));
            }},
            {data: 'buy', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 || data == null ? '-' : formatRupiah(data));
            }},
            {data: 'sell', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 || data == null ? '-' : formatRupiah(data));
            }},
            {data: 'sell_alocation', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 || data == null ? '-' : formatRupiah(data));
            }},
            {data: 'currency_id', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( row.last_stock == 0 || row.last_stock == null ? '-' : formatRupiah(row.last_stock));
            }},                
            {data: 'id', visible: false},
            {data: 'currency_code', visible: false},
            {data: 'currency_name', visible: false},
            {data: 'last_stock', visible: false},
            {data: 'created', visible: false},
            {data: 'updated', visible: false},
        ],            
        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            if (Number(aData.sell_alocation) > 0) {
                $(nRow).find('td:eq(5)').css('color','#ff0000');
            }                
        },  
        order: [[6, 'asc']]
    });
    t1.draw();

    // Setup - add a text input to each header cell
    $('#searchid1 td').each(function () {
        if ($(this).index() != 0 && ( $(this).index() <= 1 ) ) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
    });
    $('#searchid1 input').keyup(function () {
        t1.columns($(this).data('id')).search(this.value).draw();
    });
    $(".clrs1").click(function () {
        $('#searchid1 input').val('');
        $('#searchid1 select').val('');
        t1.search('')
        t1.columns().search('').draw();
    });    
}

// Stock - In Sheet
function fethdata2(){        
    var t2 = $('#mainTable2 table').DataTable({
        retrieve: true,
        serverSide: true,
        processing: true,
        autoWidth: false,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],            
        sDom: 'it<"row"lp>',
        ajax: {
            url: baseUrl + 'stock/stock/getData2',
            type: 'POST',
            data: function(d) {                    
                d.store_id = $('#store_id').val(),
                d.period = $('#period').val()
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
            if (Number(aData.sell_alocation_sheet) > 0) {
                $(nRow).find('td:eq(6)').css('color','#ff0000');
            }                
        },  
        order: [[8, 'asc']]
    });
    t2.draw();

    // Setup - add a text input to each header cell
    $('#searchid2 td').each(function () {
        if ($(this).index() != 0 && ( $(this).index() <= 1 ) ) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
    });
    $('#searchid2 input').keyup(function () {
        t2.columns($(this).data('id')).search(this.value).draw();
    });
    $(".clrs2").click(function () {
        $('#searchid2 input').val('');
        $('#searchid2 select').val('');
        t2.search('')
        t2.columns().search('').draw();
    });    
}

