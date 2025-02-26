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
            $.ajax({
                url: baseUrl + 'stock/stockcalculate/generate_stock_pull',
                type: 'POST',
                beforeSend: function(){
                    $(".ajax-loader").height($(document).height());
                    $('.ajax-loader').css("visibility", "visible");
                },
                data: {'company_id' : $('#company_id').val() , 'store_id' : $('#store_id').val(), 'periode' : $('#periode').val()},
                datatype: 'json',
                success: function(data){
                    $.ajax({
                        url: baseUrl + 'stock/stockcalculate/generate_stock_price_average',
                        type: 'POST',
                        beforeSend: function(){
                            $(".ajax-loader").height($(document).height());
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        data: {'company_id' : $('#company_id').val() , 'store_id' : $('#store_id').val(), 'periode' : $('#periode').val()},
                        datatype: 'json',
                        success: function(data){
                            alertify.success('Calculate done.!');
                        },
                        complete: function(){
                            $('.ajax-loader').css("visibility", "hidden");
                        },
                        error: function(xhr){
                            $('.ajax-loader').css("visibility", "hidden");
                            alertify.error("error calculate prive average.!");
                            StringtoFile(xhr.response.text(), 'error');
                        }
                    });
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                },
                error: function(xhr){
                    $('.ajax-loader').css("visibility", "hidden");
                    alertify.error("error calculate stock.!");
                    StringtoFile(xhr.response.text(), 'error');
                }
            });                        
        }
    });

})(jQuery);