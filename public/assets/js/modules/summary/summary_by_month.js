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
            alertify.confirm("download trx period " + $("#periode").val() + " ?", function (e) {    
                if (e) {
                    var url = "summary/summary_by_month/excel/"+$('#periode').val()+"/"+$('#company_id').val()+"/"+$('#store_id').val();
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
                            $a.attr("download","trx.xlsx");
                            $a[0].click();
                            $a.remove();
                    });                                    
                }    
            });
        }              
    });

    //--- Datatables
    function fethdata(){
        $("#ftitle").html($('#periode').val());
        $("#total_buy").html('');
        $("#total_sales").html('');
        $("#count_buy").html('');
        $("#count_sales").html('');
        var t = $('#mainTable table').DataTable({
            retrieve: true,
            serverSide: true,
            processing: true,
            autoWidth: false,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            sDom: 'it<"row"lp>',
            ajax: {
                url: baseUrl + 'summary/summary_by_month/getData',
                type: 'POST',
                // beforeSend: function(){
                //     $(".ajax-loader").height($(document).height());
                //     $('.ajax-loader').css("visibility", "visible");
                // },
                data: function(d) {
                    d.company_id = $('#company_id').val(),
                    d.store_id = $('#store_id').val(),
                    d.periode = $('#periode').val()
                },
                complete: function(){
                    // $('.ajax-loader').css("visibility", "hidden");
                    $.ajax({
                        url: baseUrl + 'summary/summary_by_month/gettotal',
                        type: 'POST',
                        data: {'company_id' : $("#company_id").val(),
                                'store_id' : $("#store_id").val(),
                                'periode' : $('#periode').val()
                              },
                        datatype: 'json',
                        success: function(data){
                            if (data !== undefined) {
                                if (data !== '[]'){   
                                    var d = JSON.parse(data)[0];
                                    var total_buy = Number(d.buy_equivalent === null ? 0 : d.buy_equivalent);
                                    var total_sales = Number(d.sales_equivalent === null ? 0 : d.sales_equivalent);
                                    if(total_buy > 0){
                                        $("#total_buy").html(bksfn.toRp(total_buy));
                                    }                                
                                    if(total_sales > 0){
                                        $("#total_sales").html(bksfn.toRp(total_sales));
                                    }
                                    if(total_buy > 0 || total_sales > 0 ){               
                                        $("#btn-excel").show();
                                    }                        
                                }
                            }    
                        },
                        error: function(xhr){
                            alertify.error(xhr.responseText);
                        }
                    });
                    $.ajax({
                        url: baseUrl + 'summary/summary_by_month/getcount',
                        type: 'POST',
                        data: {'company_id' : $("#company_id").val(),
                            'store_id' : $("#store_id").val(),
                            'periode' : $('#periode').val()
                          },
                        datatype: 'json',
                        success: function(data){
                            if (data !== undefined) {
                                if (data !== '[]'){   
                                    var d = JSON.parse(data)[0];
                                    var total_buy = Number(d.buy_count === null ? 0 : d.buy_count);
                                    var total_sales = Number(d.sales_count === null ? 0 : d.sales_count);                                    
                                    if(total_buy > 0){
                                        $("#count_buy").html(bksfn.toRp(total_buy));
                                    }                                
                                    if(total_sales > 0){
                                        $("#count_sales").html(bksfn.toRp(total_sales));
                                    }                                       
                                }
                            }    
                        },
                        error: function(xhr){
                            alertify.error(xhr.responseText);
                        }
                    });
                }
            },
            columns: [
                {data: "#", className: "dt-body-center", width: "5%", orderable: false, searchable: false},
                {data: 'valas_code',  width: "45%", render: function (data, type, row, meta) {
                    return row.valas_code + ' - ' + row.valas_name;
                }},
                {data: 'valas_id', className: "dt-body-right", width: "10%", render: function (data, type, row, meta) {
                    return bksfn.toRp(row.buy_nominal);
                }},
                {data: 'buy_equivalent', className: "dt-body-right", width: "15%", render: function (data, type, row, meta) {
                    return bksfn.toRp(data);
                }},
                {data: 'sales_nominal', className: "dt-body-right", width: "10%", render: function (data, type, row, meta) {
                    return bksfn.toRp(data);
                }},
                {data: 'sales_equivalent', className: "dt-body-right", width: "15%", render: function (data, type, row, meta) {
                    return bksfn.toRp(data);
                }},
                {data: 'company_id', visible: false},
                {data: 'buy_nominal', visible: false},
                {data: 'valas_name', visible: false},
            ],            
            order: [[2, 'asc']]
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
        });    }
})(jQuery);