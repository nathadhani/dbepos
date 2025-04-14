(function ($) {    
    $("#btn-submit").on('click', function (e) {
        e.preventDefault();
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');
        } else {
            $.ajax({
                url: baseUrl + 'stock/stock_calculate/generate_tr_stock_pull',
                type: 'POST',
                beforeSend: function(){
                    $(".ajax-loader").height($(document).height());
                    $('.ajax-loader').css("visibility", "visible");
                },
                data: {'store_id' : $('#store_id').val(), 'tr_date' : $('#tr_date').val()},
                datatype: 'json',
                success: function(data){
                    alertify.success('Calculate stock done.!');
                    $.ajax({
                        url: baseUrl + 'stock/stock_calculate/generate_tr_stock_price',
                        type: 'POST',
                        beforeSend: function(){
                            $(".ajax-loader").height($(document).height());
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        data: {'store_id' : $('#store_id').val(), 'tr_date' : $('#tr_date').val()},
                        datatype: 'json',
                        success: function(data){
                            alertify.success('Calculate stock price average done.!');
                            $.ajax({
                                url: baseUrl + 'transaction/closing_buysell/closing_trxdate',
                                type: 'POST',
                                beforeSend: function(){
                                    $(".ajax-loader").height($(document).height());
                                    $('.ajax-loader').css("visibility", "visible");
                                },
                                data: {'store_id' : $('#store_id').val(), 'tr_date' : $('#tr_date').val()},
                                datatype: 'json',
                                success: function(data){
                                    alertify.success('Closing transaction buy / sell done.!');
                                },
                                complete: function(){
                                    $('.ajax-loader').css("visibility", "hidden");
                                },
                                error: function(xhr){
                                    $('.ajax-loader').css("visibility", "hidden");
                                    alertify.error("error losing transaction buy / sell.!");
                                    StringtoFile(xhr.response.text(), 'error');
                                }
                            });
                        },
                        complete: function(){
                            $('.ajax-loader').css("visibility", "hidden");
                        },
                        error: function(xhr){
                            $('.ajax-loader').css("visibility", "hidden");
                            alertify.error("error calculate stock price average.!");
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