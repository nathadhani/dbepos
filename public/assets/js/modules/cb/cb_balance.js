$("#btn-submit").on('click', function (e) {
    e.preventDefault();
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');
    } else {
        $("#btn-excel").show();
        fethdata();
    }        
});

//--- Datatables
function fethdata(){
    let tbody = document.getElementById("mainTable");
    let rowCount = tbody.rows.length;
    for (let i = rowCount - 1; i >= 1; i--) {
        tbody.deleteRow(i);
    }
    var counter = document.getElementById('mainTable').rows.length;
    $.ajax({
        url: baseUrl + 'cb/cb_balance/getdata',
        type: 'POST',
        data: { 'store_id' : $('#store_id').val(), 'period' : $('#period').val() },
        dataType: 'json',
        success: function (data) {
            if (data !== '[]' && data.length > 0){
                var totalbeginningx = 0;
                var totalinx = 0;
                var totaloutx = 0;
                $.each(data, function (i, d) {                 
                    totalbeginningx += Number(d.beginning_saldo);
                    totalinx += Number(d.cbs_in);
                    totaloutx += Number(d.cbs_out);
                    var rows =`<tr id="` + counter + `">
                                        <td width="5%" style="text-align:center;vertical-align:middle">
                                            ` + counter + `
                                        </td>
                                        <td width="30%" style="vertical-align: middle;color:black">
                                            ` + d.cb_name.trim() +`
                                        </td>
                                        <td width="15%" style='text-align:left;'>
                                            ` + (isDecimal(d.beginning_saldo) ? formatDecimal(d.beginning_saldo,2) : formatRupiah(d.beginning_saldo) ) + `
                                        </td>
                                        <td width="15%" style='text-align:left;'>
                                            ` + (isDecimal(d.cbs_in) ? formatDecimal(d.cbs_in,2) : formatRupiah(d.cbs_in) ) + `
                                        </td>
                                        <td width="15%" style='text-align:left;'>
                                            ` + (isDecimal(d.cbs_out) ? formatDecimal(d.cbs_out,2) : formatRupiah(d.cbs_out) ) + `
                                        </td>
                                        <td width="15%" style='text-align:left;'>
                                            ` + (isDecimal(d.last_saldo) ? formatDecimal(d.last_saldo,2) : formatRupiah(d.last_saldo) ) + `
                                        </td>
                                    </tr>`
                    $('#mainTable tbody').append(rows);
                    counter++;
                });
                var total_balancex = totalbeginningx + totalinx - totaloutx;
                var rowsx =`<tr>
                                <td colspan="2" style='vertical-align:middle;text-align:center;font-weight:bold;background-color:#F5F5F5;color:#000;font-size:14px;'>
                                    Total
                                </td>
                                <td style='text-align:left;font-weight:bold;'>
                                    <i>Rp.</i> ` + formatRupiah(totalbeginningx) + `
                                </td>                         
                                <td style='text-align:left;font-weight:bold;'>
                                    <i>Rp.</i> ` + formatRupiah(totalinx) + `
                                </td>                         
                                <td style='text-align:left;font-weight:bold;'>
                                    <i>Rp.</i> ` + formatRupiah(totaloutx) + `
                                </td>                         
                                <td style='text-align:left;font-weight:bold;'>
                                    <i>Rp.</i> ` + formatRupiah(total_balancex) + `
                                </td>                         
                            </tr>`   
                $('#mainTable tbody').append(rowsx); 
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

$("#btn-calculate").on('click', function (e) {
    e.preventDefault();
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');
    } else {
        $.ajax({
            url: baseUrl + 'cb/cb_balance/generate_cb_balance',
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
                alertify.error("error calculate.!");
                StringtoFile(xhr.response.text(), 'error');
            }
        });                        
    }
});

$("#btn-pdf-rekap").on('click', function (e) {
    e.preventDefault();    
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');
    } else {
        alertify.confirm("export pdf ?", function (e) {    
            if (e) {                
                var url = "cb/cb_balance/exportpdf_rekap/";
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
                //         $a.attr("download","Saldo Kas Bank Periode " + $("#period").val() + ".pdf");
                //         $a[0].click();
                //         $a.remove();
                // });
            }    
        });
    }
});

$("#btn-pdf-detail").on('click', function (e) {
    e.preventDefault();    
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');
    } else {
        alertify.confirm("export pdf ?", function (e) {    
            if (e) {                
                var url = "cb/cb_balance/exportpdf_detail/";
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
                //         $a.attr("download","Saldo Kas Bank Periode " + $("#period").val() + ".pdf");
                //         $a[0].click();
                //         $a.remove();
                // });
            }    
        });
    }
});