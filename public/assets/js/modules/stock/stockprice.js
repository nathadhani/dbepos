(function ($) {
    $('#company_id').on('change',function(e){
        e.preventDefault()
        if($(this).val() != null && $(this).val() != ''){
            $('#store_id').html('').sel2dma();
            $('#store_id').prop('disabled', false);
            $('#store_id').focus()
            $.ajax({
                url : baseUrl +  'master_data/m_store/getStore',
                type: 'POST',
                data: {'company_id' : $(this).val()},
                datatype: 'json',
                success: function(data){
                    $('#store_id').html(data);
                },
                error: function(){
                    alert("can't get store");  
                }
            });
        } else {    
            $('#store_id').html('').sel2dma();
            $('#store_id').prop('disabled', true);        
        }
    });  
    
    $('#store_id').on('change',function(e){
        e.preventDefault()
        if($(this).val() != null && $(this).val() != ''){
            $('#valas_id').html('').sel2dma();
            $('#valas_id').prop('disabled', false);
            $('#valas_id').focus()
            $.ajax({
                url : baseUrl +  'stock/stockprice/getValasStock',
                type: 'POST',
                data: {'company_id' : $("#company_id").val(), 'store_id' : $(this).val()},
                datatype: 'json',
                success: function(data){
                    $('#valas_id').html(data);
                },
                error: function(){
                    alert("can't get store");  
                }
            });
        }
    }); 
    
    $("#btn-submit").on('click', function (e) {
        e.preventDefault();
        if($('#company_id').val() === null || $('#company_id').val() === ''){
            bksfn.errMsg('Cabang Belum Dipilih!');
        } else if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');    
        } else if($('#valas_id').val() === null || $('#valas_id').val() === ''){
            bksfn.errMsg('Matauang Belum Dipilih!');            
        } else {
            $("#btn-excel").hide();
            fethdata();
        }
    });

    $("#btn-excel").hide();
    $("#btn-excel").on('click', function (e) {
        e.preventDefault();
        if($('#company_id').val() === null || $('#company_id').val() === ''){
            bksfn.errMsg('Cabang Belum Dipilih!');
        } else if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');            
        } else {
            alertify.confirm("download stock period " + $("#periode").val() + " ?", function (e) {
                if (e) {
                    var url = "stock/stockprice/excel/"+$('#periode').val()+"/"+$('#company_id').val()+"/"+$('#store_id').val();
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
                            $a.attr("download","temp.xlsx");
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
                url: baseUrl + 'stock/stockprice/getData',
                type: 'POST',
                data: function(d) {
                    d.company_id = $('#company_id').val(),
                    d.tenant_id = $('#tenant_id').val(),
                    d.store_id = $('#store_id').val(),
                    d.valas_id = $('#valas_id').val(),
                    d.periode = $('#periode').val()
                },                
                complete: function(){
                    $("#btn-excel").show();
                }
            },
            columns: [
                {data: "#", className: "dt-body-center" , width: "5%", orderable: false, searchable: false},      
                {data: 'stock_date',  width: "7%", render: function (data, type, row, meta) {
                    return bksfn.revDate(data);
                }},

                {data: 'buy_tr_number', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                    return (data == null ? '-' : data.substr(data.length - 4));
                }},
                {data: 'buy_amount', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                    return ( data == 0 ? '-' : bksfn.toRp(data));
                }},
                {data: 'buy_price', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                    return ( data == 0 ? '-' : bksfn.toRp(data));
                }},
                {data: 'buy_total', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( data == 0 ? '-' : bksfn.toRp(data));
                }},

                {data: 'sale_tr_number', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                    return (data == null ? '-' : data.substr(data.length - 4));
                }},
                {data: 'sale_amount', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                    return ( data == 0 ? '-' : bksfn.toRp(data));
                }},
                {data: 'sale_price', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                    return ( data == 0 ? '-' : bksfn.toRp(data));
                }},
                {data: 'sale_total', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( data == 0 ? '-' : bksfn.toRp(data));
                }},

                {data: 'stock_last_amount', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                    return ( data == 0 ? '-' : bksfn.toRp(data));
                }},
                {data: 'stock_last_price', className: "dt-body-center" ,  width: "5%", render: function (data, type, row, meta) {
                    return ( data == 0 ? '-' : numberWithCommas(data));
                }},
                {data: 'stock_last_total', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( data == 0 ? '-' : bksfn.toRp(data));
                }},

                {data: 'profit', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( data == 0 ? '-' : bksfn.toRp(data));
                }},
                           
                {data: 'id', visible: false},
                {data: 'company_id', visible: false},
                {data: 'valas_code', visible: false},
                {data: 'valas_name', visible: false},
                {data: 'created', visible: false},
            ],            
            fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                if (aData.buy_tr_number !== null) {
                    $(nRow).find('td:eq(2)').css('color','#0000ff');
                }
                if (aData.sale_tr_number !== null) {
                    $(nRow).find('td:eq(6)').css('color','#ff0000');
                }
                if (Number(aData.profit) > 0) {
                    $(nRow).find('td:eq(13)').css('color','#000');
                    $(nRow).find('td:eq(13)').css('background-color','#adff00');
                    $(nRow).find('td:eq(13)').css('font-weight','bold');
                }                    
            },  
            order: [[1, 'asc']]
        });
        t.draw();

        // Setup - add a text input to each header cell
        $('#searchid td').each(function () {
            if ($(this).index() != 0 && ( $(this).index() <= 1 ) ) {
                $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
            }
            if ($(this).index() == 1) {
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
            t.columns(1).search(this.value).draw();
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
})(jQuery);