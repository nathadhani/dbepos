$("#btn-stock-calculate").on('click', function (e) {
    e.preventDefault();
    if(usergroupId === 2 || usergroupId === 6){
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');
        } else {
            $.ajax({
                url: baseUrl + 'stock/stock_price/generate_tr_stock_price',
                type: 'POST',
                beforeSend: function(){
                    $(".ajax-loader").height($(document).height());
                    $('.ajax-loader').css("visibility", "visible");
                },
                data: {'store_id' : $('#store_id').val(), 'period' : $('#period').val()},
                datatype: 'json',
                success: function(data){
                    alertify.success('Calculate stock in exchange rate average done.!');
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                },
                error: function(xhr){
                    $('.ajax-loader').css("visibility", "hidden");
                    alertify.error("error calculate stock in exchange rate average.!");
                    StringtoFile(xhr.response.text(), 'error');
                }
            });                                
        }
    } else {
        $.ajax({
            url: baseUrl + 'stock/stock_price/generate_tr_stock_price',
            type: 'POST',
            beforeSend: function(){
                $(".ajax-loader").height($(document).height());
                $('.ajax-loader').css("visibility", "visible");
            },
            data: {'store_id' : $('#store_id').val(), 'period' : $('#period').val()},
            datatype: 'json',
            success: function(data){
                alertify.success('Calculate stock in exchange rate average done.!');
            },
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            },
            error: function(xhr){
                $('.ajax-loader').css("visibility", "hidden");
                alertify.error("error calculate stock in exchange rate average.!");
                StringtoFile(xhr.response.text(), 'error');
            }
        });
    }
}); 

$("#btn-submit").on('click', function (e) {
    e.preventDefault();
    if(usergroupId === 2 || usergroupId === 6){
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');    
        } else {
            $("#btn-excel").hide();
            fethdata();
        }
    } else {
        $("#btn-excel").hide();
        fethdata();
    }
});

$("#btn-excel").hide();
$("#btn-excel").on('click', function (e) {
    e.preventDefault();
    if(usergroupId === 2 || usergroupId === 6){
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');            
        } else {
            alertify.confirm("export xlsx ?", function (e) {
                if (e) {
                    var url = "stock/stock_price/excel/";
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
                            $a.attr("download","stock in average price "+$('#period').val()+".xlsx");
                            $a[0].click();
                            $a.remove();
                    });                                    
                }    
            });
        }
    } else {
        alertify.confirm("export xlsx ?", function (e) {
            if (e) {
                var url = "stock/stock_price/excel/";
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
                        $a.attr("download","stock in average price "+$('#period').val()+".xlsx");
                        $a[0].click();
                        $a.remove();
                });                                    
            }    
        });
    }              
});

//--- Datatables
function fethdata(){
    gettotal();      
    var t = $('#mainTable table').DataTable({
        retrieve: true,
        serverSide: true,
        processing: true,
        autoWidth: false,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],            
        sDom: 'it<"row"lp>',
        ajax: {
            url: baseUrl + 'stock/stock_price/getData',
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
            {data: 'currency_code',  width: "5%", render: function (data, type, row, meta) {
                return data;
            }},
            {data: 'stock_date',  width: "7%", render: function (data, type, row, meta) {
                return bksfn.revDate(data);
            }},

            {data: 'buy_tr_number', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                return (data == null ? '-' : data.substr(data.length - 4));
            }},
            {data: 'buy_amount', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                return ( data == 0 ? '-' : formatRupiah(data));
            }},
            {data: 'buy_price', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                return ( data == 0 ? '-' : formatRupiah(data));
            }},
            {data: 'buy_total', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 ? '-' : formatRupiah(data));
            }},

            {data: 'sell_tr_number', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                return (data == null ? '-' : data.substr(data.length - 4));
            }},
            {data: 'sell_amount', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                return ( data == 0 ? '-' : formatRupiah(data));
            }},
            {data: 'sell_price', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                return ( data == 0 ? '-' : formatRupiah(data));
            }},
            {data: 'sell_total', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 ? '-' : formatRupiah(data));
            }},

            {data: 'stock_last_amount', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                return ( data == 0 ? '-' : formatRupiah(data));
            }},
            {data: 'stock_last_price', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                return ( data == 0 ? '-' : formatDecimal(data,3));
            }},
            {data: 'stock_last_total', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 ? '-' : formatRupiah(data));
            }},

            {data: 'profit', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                return ( data == 0 ? '-' : formatRupiah(data));
            }},
                        
            {data: 'id', visible: false},
            {data: 'currency_code', visible: false},
            {data: 'currency_name', visible: false},
            {data: 'created', visible: false},
        ],            
        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            // if (iDisplayIndex >= 2 && iDisplayIndex <= 5 ) {
                for (i=3; i<=6; i++) {
                    $(nRow).find('td:eq('+i+')').css('color','#0000FF');
                    // $(nRow).find('td:eq('+i+')').css('font-weight','bold');
                }
            // }
            // if (iDisplayIndex >= 2 && iDisplayIndex <= 5 ) {
                for (i=7; i<=10; i++) {
                    $(nRow).find('td:eq('+i+')').css('color','#FF0000');
                    // $(nRow).find('td:eq('+i+')').css('font-weight','bold');
                }
            // }            
            if (Number(aData.profit) > 0) {
                $(nRow).find('td:eq(14)').css('color','#000');
                // $(nRow).find('td:eq(13)').css('background-color','#adff00');
                // $(nRow).find('td:eq(13)').css('font-weight','bold');
            }   
            if (Number(aData.profit) < 0) {
                $(nRow).find('td:eq(14)').css('color','#FF0000');
                // $(nRow).find('td:eq(13)').css('background-color','#adff00');
                // $(nRow).find('td:eq(13)').css('font-weight','bold');
            }                             
        },  
        order: [[1, 'asc']]
    });
    t.draw();

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && ( $(this).index() <= 2 ) ) {
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

function gettotal(){
    $("#totalbuy").html('');
    $("#totalsell").html('');
    $("#totalstock").html('');
    $("#totalprofit").html('');
    $.ajax({
        url: baseUrl + 'stock/stock_price/gettotal',
        type: 'POST',
        data: {'store_id' : $("#store_id").val(), 'period' : $('#period').val()},
        datatype: 'json',
        success: function(data){
            try {
                if (data !== '[]' && data.length > 0){
                    var d = JSON.parse(data)[0];
                    $("#totalbuy").html(formatRupiah(d.totalbuy));
                    $("#totalsell").html(formatRupiah(d.totalsell));
                    $("#totalstock").html(formatRupiah(d.totalstock));
                    $("#totalprofit").html(formatRupiah(d.totalprofit));
                } else {
                    return 'data empty';
                }  
            } catch (e) {
                alertify.error("Error parsing JSON"+e);
                console.error('Error parsing JSON:', e);
            }       
        },
        error: function(xhr){                        
            alertify.error("error");
            StringtoFile(xhr.responseText, 'error');
        }
    });
}