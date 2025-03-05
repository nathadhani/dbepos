(function ($) {    
    $("#btn-submit").on('click', function (e) {
        e.preventDefault();
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');
        } else {
            $.ajax({
                url: baseUrl + 'stock/stock_calculate/generate_stock_pull',
                type: 'POST',
                beforeSend: function(){
                    $(".ajax-loader").height($(document).height());
                    $('.ajax-loader').css("visibility", "visible");
                },
                data: {'store_id' : $('#store_id').val(), 'periode' : $('#periode').val()},
                datatype: 'json',
                success: function(data){
                    $.ajax({
                        url: baseUrl + 'stock/stock_calculate/generate_stock_price',
                        type: 'POST',
                        beforeSend: function(){
                            $(".ajax-loader").height($(document).height());
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        data: {'store_id' : $('#store_id').val(), 'periode' : $('#periode').val()},
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