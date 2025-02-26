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
    
    $("#btn-submit").on('click', function (e) {
        e.preventDefault();
        if($('#company_id').val() === null || $('#company_id').val() === ''){
            bksfn.errMsg('Cabang Belum Dipilih!');
        } else if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');            
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
                    var url = "stock/stock/excel/"+$('#periode').val()+"/"+$('#company_id').val()+"/"+$('#store_id').val();
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
                url: baseUrl + 'stock/stock/getData',
                type: 'POST',
                data: function(d) {
                    d.company_id = $('#company_id').val(),
                    d.tenant_id = $('#tenant_id').val(),
                    d.store_id = $('#store_id').val(),
                    d.periode = $('#periode').val()
                },                
                complete: function(){
                    $("#btn-excel").show();
                }
            },
            columns: [
                {data: "#", className: "dt-body-center" , width: "5%", orderable: false, searchable: false},            
                {data: 'valas_code',  width: "25%", render: function (data, type, row, meta) {
                    return data + ' - ' + row.valas_name;
                }},
                {data: 'nominal', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( data == 0 || data == null ? '-' : bksfn.toRp(data));
                }},

                {data: 'beginning_stock_sheet', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( data == 0 || data == null ? '-' : bksfn.toRp(data));
                }},
                {data: 'invin_sheet', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( data == 0 || data == null ? '-' : bksfn.toRp(data));
                }},
                {data: 'invout_sheet', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( data == 0 || data == null ? '-' : bksfn.toRp(data));
                }},
                {data: 'buy_sheet', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( data == 0 || data == null ? '-' : bksfn.toRp(data));
                }},
                {data: 'sales_sheet', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( data == 0 || data == null ? '-' : bksfn.toRp(data));
                }},
                {data: 'sales_alocation_sheet', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( data == 0 || data == null ? '-' : bksfn.toRp(data));
                }},
                {data: 'last_stock_sheet', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( data == 0 || data == null ? '-' : bksfn.toRp(data));
                }},                 
                {data: 'valas_id', className: "dt-body-center" ,  width: "10%", render: function (data, type, row, meta) {
                    return ( row.last_stock_sheet == 0 || row.last_stock_sheet == null ? '-' : bksfn.toRp(row.last_stock_sheet * row.nominal));
                }},
                {data: 'id', visible: false},
                {data: 'company_id', visible: false},
                {data: 'valas_code', visible: false},
                {data: 'valas_name', visible: false},
                {data: 'created', visible: false},
                {data: 'updated', visible: false},
            ],            
            fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                if (Number(aData.buy_sheet) > 0) {
                    $(nRow).find('td:eq(6)').css('color','#0000ff');
                }
                if (Number(aData.sales_sheet) > 0) {
                    $(nRow).find('td:eq(7)').css('color','#ff0000');
                }
                if (Number(aData.sales_alocation_sheet) > 0) {
                    $(nRow).find('td:eq(8)').css('color','#ff0000');
                }                
            },  
            order: [[10, 'asc'],[2, 'asc']]
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
})(jQuery);