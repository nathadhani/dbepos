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

var companyId = ($("#company_id").val() === '' || $("#company_id").val() === null ? companyIduser : $("#company_id").val());
var storeId =  $("#store_id").val();
var title_tahun = $("#periode").val();

$("#btn-submit").on('click', function (e) {
    e.preventDefault();
    if($('#company_id').val() === null || $('#company_id').val() === ''){
        bksfn.errMsg('Cabang Belum Dipilih!');
    } else {
        companyId = $("#company_id").val();
        storeId = $("#store_id").val();
        title_tahun = $('#periode').val();
        loaddata();
    }
});

function loaddata(){
    getdatatable1();
    getchart1(); 
    getdatatable2();
    getchart2();
    getlastupdated();
}

function getdatatable1(){
    $('#table1 tbody').empty();
    $("#table1").tableHeadFixer();
    $("#title-table1").html(title_tahun);
    $.ajax({
        url: baseUrl + 'dashboard/dashboard/getdatatable1',
        type: 'POST',
        data: {'company_id' : companyId,
                'store_id' : storeId,
                'periode' : $('#periode').val()
            },
        dataType: 'json',
        success: function (data) {
            if (data !== '[]' && data.length > 0){
                var tot_buy = 0;
                var tot_sale = 0;
                $.each(data, function (i, d) {       
                    tot_buy = tot_buy + Number(d.buy_equivalent);
                    tot_sale = tot_sale + Number(d.sales_equivalent);  
                    var rows =`<tr>
                                <td width="10%" style="vertical-align: middle;color:black">
                                    ` + getfullbulan(Number(d.tr_month)) +`                       
                                </td>

                                <td width="45%" style='color:blue;'>
                                    ` + (Number(d.buy_equivalent) == 0 ? '-' : toRp(d.buy_equivalent)) + `
                                </td>
                                <td width="45%" style='color:red;'>
                                    ` + (Number(d.sales_equivalent) == 0 ? '-' : toRp(d.sales_equivalent)) + `
                                </td>                                
                            </tr>`
                    $('#table1 tbody').append(rows);
                });
                var rows =`<tr>
                            <td width="10%" style="text-align:center;vertical-align: middle;color:black">
                                Total
                            </td>

                            <td width="45%" style='text-align:center;color:blue;'>
                                ` + (Number(tot_buy) == 0 ? '-' : toRp(tot_buy)) + `
                            </td>
                            <td width="45%" style='text-align:center;color:red;'>
                                ` + (Number(tot_sale) == 0 ? '-' : toRp(tot_sale)) + `
                            </td>                                
                        </tr>`
                $('#table1 tbody').append(rows);                
            }
        },
        error: function(xhr){
            alertify.error(xhr.responseText);
        }
    });
}

function getdatatable2(){
    $('#table2 tbody').empty();
    $("#table2").tableHeadFixer();
    $("#title-table2").html(title_tahun);
    $.ajax({
        url: baseUrl + 'dashboard/dashboard/getdatatable2',
        type: 'POST',
        data: {'company_id' : companyId,
                'store_id' : storeId,
                'periode' : $('#periode').val()
            },
        dataType: 'json',
        success: function (data) {
            if (data !== '[]' && data.length > 0){
                var tot_buy = 0;
                var tot_sale = 0;
                $.each(data, function (i, d) {       
                    tot_buy = tot_buy + Number(d.buy_equivalent);
                    tot_sale = tot_sale + Number(d.sales_equivalent);  
                    var rows =`<tr>
                                <td width="10%" style="vertical-align: middle;color:black">
                                    ` + d.valas_code +`                       
                                </td>

                                <td width="45%" style='color:blue;'>
                                    ` + (Number(d.buy_equivalent) == 0 ? '-' : toRp(d.buy_equivalent)) + `
                                </td>
                                <td width="45%" style='color:red;'>
                                    ` + (Number(d.sales_equivalent) == 0 ? '-' : toRp(d.sales_equivalent)) + `
                                </td>                                
                            </tr>`
                    $('#table2 tbody').append(rows);
                });
                var rows =`<tr>
                            <td width="10%" style="text-align:center;vertical-align: middle;color:black">
                                Total
                            </td>

                            <td width="45%" style='text-align:center;color:blue;'>
                                ` + (Number(tot_buy) == 0 ? '-' : toRp(tot_buy)) + `
                            </td>
                            <td width="45%" style='text-align:center;color:red;'>
                                ` + (Number(tot_sale) == 0 ? '-' : toRp(tot_sale)) + `
                            </td>                                
                        </tr>`
                $('#table2 tbody').append(rows);                
            }
        },
        error: function(xhr){
            alertify.error(xhr.responseText);
        }
    });
}

function getchart1(){
    if( typeof(companyId) !== 'undefined') {
        if(companyId !== null && companyId !== '') {
            var datasource = [];
            $("#chart1").empty();
            $("#title-chart1").html(title_tahun);
            $.ajax({
                url: baseUrl + 'dashboard/dashboard/getchart1',
                type: 'POST',
                data: {'company_id' : companyId,
                       'store_id' : storeId,
                       'periode' : $('#periode').val()
                    },
                dataType: 'json',
                success: function (data) {
                    if (data !== '[]' && data.length > 0){
                        var d = (data)[0];
                        $.each(data, function (i, d) {
                            var xbuy_equivalent = (d.buy_equivalent === null || isNaN(d.buy_equivalent) ? 0 : Number(d.buy_equivalent));
                            var xsales_equivalent = (d.sales_equivalent === null ||  isNaN(d.sales_equivalent) ? 0 : Number(d.sales_equivalent));
                            if(xbuy_equivalent > 0 || xsales_equivalent > 0){
                                var obj = {};
                                obj["tr_month"] = d.tr_month;
                                obj["month"] = getsortbulan(Number(d.tr_month));
                                obj["buy"] = xbuy_equivalent.toFixed(3);
                                obj["sale"] = xsales_equivalent.toFixed(3);
                                datasource.push(obj);
                            }
                        });
                        if(datasource.length > 0){
                            console.log(datasource);
                            Morris.Line({
                                element: 'chart1',
                                data : datasource,
                                xkey: 'month',
                                ykeys: ['buy','sale'],
                                labels: ['Buy','Sale'],
                                parseTime: false,
                                hideHover: true,
                                gridTextSize: '10px',
                                lineColors: ['#0000FF', '#FF0000'],
                                gridLineColor: '#E5E5E5'
                              });     
                        }                        
                    }
                },
                error: function(xhr){
                    alertify.error(xhr.responseText);
                }
            });
        }
    }        
}

function getchart2(){
    if( typeof(companyId) !== 'undefined') {
        if(companyId !== null && companyId !== '') {
            var datasource = [];
            $("#chart2").empty();
            $("#title-chart2").html(title_tahun);
            $.ajax({
                url: baseUrl + 'dashboard/dashboard/getchart2',
                type: 'POST',
                data: {'company_id' : companyId,
                       'store_id' : storeId,
                       'periode' : $('#periode').val()
                    },
                dataType: 'json',
                success: function (data) {
                    if (data !== '[]' && data.length > 0){
                        var d = (data)[0];
                        let xurut = 1;
                        $.each(data, function (i, d) {
                            var xbuy_equivalent = (d.buy_equivalent === null || isNaN(d.buy_equivalent) ? 0 : Number(d.buy_equivalent));
                            var xsales_equivalent = (d.sales_equivalent === null ||  isNaN(d.sales_equivalent) ? 0 : Number(d.sales_equivalent));
                            if(xbuy_equivalent > 0 || xsales_equivalent > 0){
                                var obj = {};
                                obj["valas_id"] = d.valas_id;
                                obj["valas_code"] = xurut.toString()+'. '+d.valas_code.trim();
                                obj["buy"] = xbuy_equivalent.toFixed(3);
                                obj["sale"] = xsales_equivalent.toFixed(3);
                                datasource.push(obj);
                                xurut++;
                            }    
                        });
                        if(datasource.length > 0){
                            console.log(datasource);
                            Morris.Bar({
                                element: 'chart2',                                        
                                data : datasource,
                                xkey: 'valas_code',
                                ykeys: ['buy', 'sale'],
                                labels: ['Buy', 'Sale'],
                                barColors: ['#0000FF', '#FF0000'],
                                gridTextSize: '10px',
                                hideHover: true,
                                resize: true,
                                gridLineColor: '#E5E5E5'
                            });
                        }                        
                    }
                },
                error: function(xhr){
                    alertify.error(xhr.responseText);
                }
            });
        }
    }        
}


function getlastupdated(){
    $("#lastupdated").html('');
    $.ajax({
        url: baseUrl + 'dashboard/dashboard/getlastupdated',
        type: 'POST',
        data: {'company_id' : companyId,
                'store_id' : storeId
            },
        dataType: 'json',
        success: function (data) {
            if (data !== '[]' && data.length > 0){
                $("#lastupdated").html('Last Updated : ' + data[0].lastupdated);
            }
        },
        error: function(xhr){
            alertify.error(xhr.responseText);
        }
    });
}


function getfullbulan(bln){
    var lbulan = '';
    switch(bln) {
        case 1:
            lbulan = 'January';
            break;
        case 2:
            lbulan = 'February';
            break;
        case 3:
            lbulan = 'March';
            break;  
        case 4:
            lbulan = 'April';
            break;
        case 5:
            lbulan = 'Mei';
            break;
        case 6:
            lbulan = 'Juni';
            break;             
        case 7:
            lbulan = 'July';
            break;
        case 8:
            lbulan = 'August';
            break;
        case 9:
            lbulan = 'September';
            break;  
        case 10:
            lbulan = 'October';
            break;
        case 11:
            lbulan = 'November';
            break;
        case 12:
            lbulan = 'December';
            break;
    }
    return lbulan;
}

function getsortbulan(bln){
    var lbulan = '';
    switch(bln) {
        case 1:
            lbulan = 'Jan';
            break;
        case 2:
            lbulan = 'Feb';
            break;
        case 3:
            lbulan = 'Mar';
            break;  
        case 4:
            lbulan = 'Apr';
            break;
        case 5:
            lbulan = 'Mei';
            break;
        case 6:
            lbulan = 'Juni';
            break;             
        case 7:
            lbulan = 'Jul';
            break;
        case 8:
            lbulan = 'Ags';
            break;
        case 9:
            lbulan = 'Sep';
            break;  
        case 10:
            lbulan = 'Oct';
            break;
        case 11:
            lbulan = 'Nov';
            break;
        case 12:
            lbulan = 'Dec';
            break;
    }
    return lbulan;
}

function toRp(angka) {
    var rev = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2 = '';
    for (var i = 0; i < rev.length; i++) {
        rev2 += rev[i];
        if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
            rev2 += '.';
        }
    }
    return rev2.split('').reverse().join('');
}