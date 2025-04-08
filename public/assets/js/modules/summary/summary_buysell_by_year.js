$("#btn-pdf").hide();
$("#btn-excel").hide();
$("#btn-submit").on('click', function (e) {
    e.preventDefault();
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');            
    } else {
        fethdata();
    }        
});

//--- Datatables
function fethdata(){        
    $("#totalbuy").html('');
    $("#totalsell").html('');
    $('#table-detail tbody').empty();
    $("#table-detail").tableHeadFixer();
    var counter = document.getElementById('table-detail').rows.length - 1;
    $.ajax({
        url: baseUrl + 'summary/summary_buysell_by_year/getdata',
        type: 'POST',
        data: {'store_id' : $("#store_id").val(), 'period' : $('#period').val()},
        dataType: 'json',
        success: function (data) {
            if (data !== '[]' && data.length > 0){
                var totalbuy = 0;
                var totalsell = 0;
                $.each(data, function (i, d) {                 
                    totalbuy += Number(d.buy_equivalent);
                    totalsell += Number(d.sell_equivalent);
                    var rows =`<tr id="` + counter + `" style="vertical-align:middle">
                                <td width="5%" style="text-align:center;">
                                    ` + counter + `
                                </td>
                                <td width="5%">
                                    ` + d.currency_code +`                       
                                </td>
                                <td width="10%" style='text-align:left;font-weight:600;'>
                                    ` + (d.st_beginning_amount !== null && Number(d.st_beginning_amount) > 0 ? formatRupiah(d.st_beginning_amount) : '-') + `
                                </td>
                                <td width="10%" style='text-align:left;color:blue;font-weight:600;'>
                                    ` + (d.buy_amount !== null && Number(d.buy_amount) > 0 ? formatRupiah(d.buy_amount) : '-')  + `
                                </td>
                                <td width="10%" style='text-align:left;color:blue;font-weight:600;'>
                                    ` + (d.buy_equivalent !== null && Number(d.buy_equivalent) > 0 ? formatRupiah(d.buy_equivalent) : '-') + `
                                </td>
                                <td width="10%" style='text-align:left;color:red;font-weight:600;'>
                                    ` + (d.sell_amount !== null && Number(d.sell_amount) > 0 ? formatRupiah(d.sell_amount) : '-') + `
                                </td>
                                <td width="10%" style='text-align:left;color:red;font-weight:600;'>
                                    ` + (d.sell_equivalent !== null && Number(d.sell_equivalent) > 0 ? formatRupiah(d.sell_equivalent) : '-') + `
                                </td>
                                <td width="10%" style='text-align:left;font-weight:600;'>
                                    ` + (d.st_end_amount !== null && Number(d.st_end_amount) > 0 ? formatRupiah(d.st_end_amount) : '-') + `
                                </td>
                                <td width="30%">
                                    ` + d.currency_name +`                       
                                </td>
                            </tr>`
                    $('#table-detail tbody').append(rows);
                    counter++;
                });                
                $("#totalbuy").html(formatRupiah(totalbuy));
                $("#totalsell").html(formatRupiah(totalsell));
                $("#btn-pdf").show();
                $("#btn-excel").show();
            }else{
                return false;
            }
        },
        error: function(xhr){
            alertify.error("error");
            StringtoFile(xhr.responseText, 'error');
        }
    });        
}

$("#btn-pdf").on('click', function (e) {
    e.preventDefault();    
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');
    } else {
        alertify.confirm("export pdf ?", function (e) {    
            if (e) {                
                var url = "summary/summary_buysell_by_year/exportpdf/";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {'store_id' : $("#store_id").val(), 'period' : $('#period').val()},
                    dataType: 'json',            
                    success: function(resp){
                        const pdfBase64 = resp.pdf;
                        setTimeout(() => {
                                            const pdfWindow = window.open();
                                            pdfWindow.document.write(`<iframe width="100%" height="100%" src="data:application/pdf;base64,${pdfBase64}"></iframe>`);
                                        }, 100);
                    },
                    error: function(xhr){
                        alertify.error("error can't print");
                        StringtoFile(xhr.responseText, 'error');
                    }
                });
                // done(function(data){
                //     var $a = $("<a>");
                //         $a.attr("href",data.file);
                //         $("body").append($a);
                //         $a.attr("download","Summary Buy Sell by month " + $("#period").val() + ".pdf");
                //         $a[0].click();
                //         $a.remove();
                // });
            }    
        });
    }
});

$("#btn-excel").on('click', function (e) {
    e.preventDefault();
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');
    } else {
        alertify.confirm("export xlsx ?", function (e) {    
            if (e) {
                var url = "summary/summary_buysell_by_year/excel/";
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
                        $a.attr("download","Summary Buy Sell Period " + $("#period").val() + ".xlsx");
                        $a[0].click();
                        $a.remove();
                });                                    
            }    
        });
    }              
});