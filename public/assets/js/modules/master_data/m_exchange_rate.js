//--- Refresh Button  
$("#btn-generate").on('click', function (e) {
    e.preventDefault();
    if(usergroupId === 2 || usergroupId === 6){
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');
        } else {
            alertify.confirm("Generate Data " + $("#tr_date").val() + " ?", function (e) {
                if (e) {
                    $.ajax({
                        url: 'master_data/m_exchange_rate/insert',
                        type: 'POST',
                        beforeSend: function(){
                            $(".ajax-loader").height($(document).height());
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        data: { 'store_id' :  $('#store_id').val(), 'tr_date' :  $('#tr_date').val() },
                        success: function(msg) {   
                            if (msg = '1') {
                                fetch_date();
                                alertify.success("Refresh Data Success");
                            } else {
                                bksfn.errMsg(msg);
                            }   
                        },
                        complete: function(){
                            $('.ajax-loader').css("visibility", "hidden");
                        },
                        error: function(xhr){
                            alertify.alert(xhr.responseText);
                        }
                    });
                }    
            });
        }
    } else {
        alertify.confirm("Generate Data " + $("#tr_date").val() + " ?", function (e) {
            if (e) {
                $.ajax({
                    url: 'master_data/m_exchange_rate/insert',
                    type: 'POST',
                    beforeSend: function(){
                        $(".ajax-loader").height($(document).height());
                        $('.ajax-loader').css("visibility", "visible");
                    },
                    data: { 'store_id' :  $('#store_id').val(), 'tr_date' :  $('#tr_date').val() },
                    success: function(msg) {   
                        if (msg = '1') {
                            fetch_date();
                            alertify.success("Refresh Data Success");
                        } else {
                            bksfn.errMsg(msg);
                        }   
                    },
                    complete: function(){
                        $('.ajax-loader').css("visibility", "hidden");
                    },
                    error: function(xhr){
                        alertify.alert(xhr.responseText);
                    }
                });
            }    
        });
    }
});

$("#btn-export-pdf").on('click', function (e) {
    e.preventDefault();
    if(usergroupId === 2 || usergroupId === 6){
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');
        } else {
            alertify.confirm("Export data " + $("#tr_date").val() + " ?", function (e) {
                if (e) {                
                    var url = "master_data/m_exchange_rate/exportpdf";
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: { 'store_id' :  $('#store_id').val(), 'tr_date' :  $('#tr_date').val() },
                        dataType: 'json',            
                        success: function(resp){
                            const pdfBase64 = resp.pdf;
                            setTimeout(() => {
                                                const pdfWindow = window.open();
                                                pdfWindow.document.write(`<iframe width="100%" height="100%" src="data:application/pdf;base64,${pdfBase64}"></iframe>`);
                                            }, 100);
                        },
                        error: function(xhr){
                            alertify.error("error can't export");
                            StringtoFile(xhr.responseText, 'error');
                        }
                    });
                    // done(function(data){
                    //     var $a = $("<a>");
                    //         $a.attr("href",data.file);
                    //         $("body").append($a);
                    //         $a.attr("download","Saldo Kas Bank " + $("#tr_date").val() + ".pdf");
                    //         $a[0].click();
                    //         $a.remove();
                    // });
                }    
            });
        }
    } else {
        alertify.confirm("Export data " + $("#tr_date").val() + " ?", function (e) {
            if (e) {                
                var url = "master_data/m_exchange_rate/exportpdf";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: { 'store_id' :  $('#store_id').val(), 'tr_date' :  $('#tr_date').val() },
                    dataType: 'json',            
                    success: function(resp){
                        const pdfBase64 = resp.pdf;
                        setTimeout(() => {
                                            const pdfWindow = window.open();
                                            pdfWindow.document.write(`<iframe width="100%" height="100%" src="data:application/pdf;base64,${pdfBase64}"></iframe>`);
                                        }, 100);
                    },
                    error: function(xhr){
                        alertify.error("error can't export");
                        StringtoFile(xhr.responseText, 'error');
                    }
                });
                // done(function(data){
                //     var $a = $("<a>");
                //         $a.attr("href",data.file);
                //         $("body").append($a);
                //         $a.attr("download","Saldo Kas Bank " + $("#tr_date").val() + ".pdf");
                //         $a[0].click();
                //         $a.remove();
                // });
            }    
        });
    }
});

//--- Refresh Button  
$("#btn-show").on('click', function (e) {
    e.preventDefault();
    if(usergroupId === 2 || usergroupId === 6){
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');
        } else {
            fetch_date();
        }
    } else {
        fetch_date();
    }
});

//--- Validasi Form
$.validate({
    form: "#mainForm",
    validateOnBlur: false,
    onError: function () {
        $('.help-block').remove();
        bksfn.errMsg("Please fill the form");
    },
    onSuccess: function () {
        alertify.confirm("Yakin mau di update " + $("#currency_code").val() + " ?", function (e) {
            if (e) {
                //--- Edit
                $.post('master_data/m_exchange_rate/update', $("#mainForm").serialize() + "&id=" + $("body").data("id") + "&store_id=" + $("body").data("store_id") + "&currency_id=" + $("body").data("currency_id"), function (obj) {
                    if (obj.msg == 1) {
                        $("#mainForm")[0].reset();
                        $("#ModalEdit").modal('hide');
                        $('#mainTable table').DataTable().ajax.reload();
                        alertify.success("Edit Data Success");
                    } else {
                        bksfn.errMsg(obj.msg);
                    }
                }, "json").fail(function () {
                    bksfn.errMsg();
                });
            }else{
                $(':submit').removeAttr('disabled');
            }    
        });
    }
});

//--- Form Submit
$("#mainForm").submit(function (e) {
    e.preventDefault();
    $(':submit', this).attr('disabled', true);
}).on('reset', function (e) {
    $("body").data("id",'');
    $("body").data("store_id",'');
    $("body").data("currency_id",'');
    $("#source_rate").val('');
    $("#exchange_rate_buy").val( 0 );
    $("#difference_buy").val( 0 );
    $("#exchange_rate_sell").val( 0 );
    $("#difference_sell").val( 0 );
    $("#price_buy_bot").val( 0 );
    $("#price_buy_top").val( 0 );
    $("#price_sell_bot").val( 0 );
    $("#price_sell_top").val( 0 );
    $("#status").iCheck('checked');
    $(':submit').removeAttr('disabled');
});    

function fetch_date(){
        //--- Datatables
        var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'it<"row"lp>',
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        ajax: {
            url: baseUrl + 'master_data/m_exchange_rate/getdata',
            type: 'POST',
            // beforeSend: function(){
            //     $(".ajax-loader").height($(document).height());
            //     $('.ajax-loader').css("visibility", "visible");
            // },
            data: function(d) {                
                d.store_id = $('#store_id').val();
                d.tr_date = $('#tr_date').val();
            },
            // complete: function(){
            //     $('.ajax-loader').css("visibility", "hidden");
            // }
        },
        columns: [
            {data: "#", className: "dt-body-center", width: "5%", orderable: false, searchable: false},
            {data: 'currency_code',  width: "7%"},
            {data: 'currency_name'},
            {data: 'currency_id', render: function (data, type, row, meta) {
                return bksfn.revDate(row.exchange_rate_date);
            }},
            {data: 'exchange_rate_buy', render: function (data, type, row, meta) {
                return ( (data === '0.00' || data === null ? '' : formatRupiah(data)) );
            }},                
            {data: 'difference_buy', render: function (data, type, row, meta) {
                return ( (data === '0.00' || data === null ? '' : formatRupiah(data)) );
            }},                
            {data: 'exchange_rate_sell', render: function (data, type, row, meta) {
                return ( (data === '0.00' || data === null ? '' : formatRupiah(data)));
            }},                
            {data: 'difference_sell', render: function (data, type, row, meta) {
                return ( (data === '0.00' || data === null ? '' : formatRupiah(data)) );
            }},
            {data: 'price_buy_bot', render: function (data, type, row, meta) {
                return ( (data === '0.00' || data === null ? '' : formatRupiah(data)) );
            }},
            {data: 'price_buy_top', render: function (data, type, row, meta) {
                return ( (data === '0.00' || data === null ? '' : formatRupiah(data)) );
            }},
            {data: 'price_sell_bot', render: function (data, type, row, meta) {
                return ( (data === '0.00' || data === null ? '' : formatRupiah(data)) );
            }},
            {data: 'price_sell_top', render: function (data, type, row, meta) {
                return ( (data === '0.00' || data === null ? '' : formatRupiah(data)) );
            }},
            {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                return act;
            }},          
            {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<a title="Edit" href="#"><i class="fa fa-edit"></i></a>';
                }
            },
            {data: 'id', visible: false},                
            {data: 'store_id', visible: false},
            {data: 'exchange_rate_date', visible: false},
            {data: 'source_rate', visible: false},
        ],
        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            // Color Beli
            if (aData.exchange_rate_buy > 0) {
                $(nRow).find('td:eq(4)').css('color','#0000ff');
                // $('td', nRow).css('background-color', '#ffffba');
                // $(nRow).find('td:eq(4)').css('font-weight','bold');
            }    
            if (aData.difference_buy > 0) {
                $(nRow).find('td:eq(5)').css('color','#0000ff');
            }    
            if (aData.price_buy_bot != 0) {
                $(nRow).find('td:eq(6)').css('color','#0000ff');
            }    
            if (aData.price_buy_top != 0) {
                $(nRow).find('td:eq(7)').css('color','#0000ff');
            }    

            // Color Jual
            if (aData.exchange_rate_sell > 0) {
                $(nRow).find('td:eq(8)').css('color','#ff0000');
            }    
            if (aData.difference_sell > 0) {
                $(nRow).find('td:eq(8)').css('color','#ff0000');
            }    
            if (aData.price_buy_sell != 0) {
                $(nRow).find('td:eq(10)').css('color','#ff0000');
            }    
            if (aData.price_buy_sell != 0) {
                $(nRow).find('td:eq(11)').css('color','#ff0000');
            }                
        },
        order: [[3, 'asc']]
    });
    t.draw();
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTBks(t, 'master_data/m_exchange_rate/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() <= 2) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
        if ($(this).index() == 12) {
            $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Active</option><option value="0">Not Active</option><select/>');
        }
    });
    $('#searchid input').keyup(function () {
        t.columns($(this).data('id')).search(this.value).draw();
    });
    $('#searchid select').change(function () {
        t.columns(12).search(this.value).draw();
    });
    $(".clrs").click(function () {
        $('#searchid input').val('');
        $('#searchid select').val('');
        t.search('')
        t.columns().search('').draw();
    });

    //--- Edit Data
    $('#mainTable').on('click', 'a[title^=Edit]', function (e) {
        e.preventDefault();
        $("#mainForm")[0].reset();
        window.scroll(0, 0);
        if ($("#mainForm .panel-body").css('display') == 'none') {
            $("#mainForm .panel-controls a").click();
        }
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        $("body").data("id", d.id);
        $("body").data("store_id", d.store_id);
        $("body").data("currency_id", d.currency_id);

        $('#currency_code').val(d.currency_code);
        $('#currency_name').val(d.currency_name);
        $('#source_rate').val(d.source_rate);

        $('#exchange_rate_date').val(d.exchange_rate_date);
        $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');
        
        $("#exchange_rate_buy").val( (d.exchange_rate_buy == null || d.exchange_rate_buy == '' ? 0 : d.exchange_rate_buy) );
        $("#difference_buy").val( (d.difference_buy == null || d.difference_buy == '' ? 0 : d.difference_buy) );

        $("#exchange_rate_sell").val( (d.exchange_rate_sell == null || d.exchange_rate_sell == '' ? 0 : d.exchange_rate_sell) );
        $("#difference_sell").val( (d.difference_sell == null || d.difference_sell == '' ? 0 : d.difference_sell) );

        $("#price_buy_bot").val( (d.price_buy_bot == null || d.price_buy_bot == '' ? 0 : d.price_buy_bot) );
        $("#price_buy_top").val( (d.price_buy_top == null || d.price_buy_top == '' ? 0 : d.price_buy_top) );

        $("#price_sell_bot").val( (d.price_sell_bot == null || d.price_sell_bot == '' ? 0 : d.price_sell_bot) );
        $("#price_sell_top").val( (d.price_sell_top == null || d.price_sell_top == '' ? 0 : d.price_sell_top) );

        // Format Number
        $("#exchange_rate_buy").keyup(function(e) {
            e.preventDefault();
            $(this).val($(this).val());
        });
        $("#price_buy_bot").keyup(function(e) {
            e.preventDefault();
            $(this).val($(this).val());
        });
        $("#price_buy_top").keyup(function(e) {
            e.preventDefault();
            $(this).val($(this).val());
        });

        $("#exchange_rate_sell").keyup(function(e) {
            e.preventDefault();
            $(this).val($(this).val());
        });
        $("#price_sell_bot").keyup(function(e) {
            e.preventDefault();
            $(this).val($(this).val());
        });
        $("#price_sell_top").keyup(function(e) {
            e.preventDefault();
            $(this).val($(this).val());
        });

        $(".modal-dialog").width('1200px');
        $("#ModalEdit").modal('show');
    });
}