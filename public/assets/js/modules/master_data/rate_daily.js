(function ($) {
    window.scroll(0, 0); 

    //--- Refresh Button  
    $("#btnrefresh").on('click', function (e) {
        e.preventDefault();
        alertify.confirm("Rate Date " + $("#rate_date").val() + " ?", function (e) {
            if (e) {
                $.ajax({
                    url: 'master_data/Rate_daily/insert',
                    type: 'POST',
                    beforeSend: function(){
                        $(".ajax-loader").height($(document).height());
                        $('.ajax-loader').css("visibility", "visible");
                    },
                    data: {'periode' :  $('#rate_date').val()},
                    success: function(msg) {   
                        if (msg = '1') {
                            $('#mainTable table').DataTable().ajax.reload();
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
    });

    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'it<"row"lp>',
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        ajax: {
            url: baseUrl + 'master_data/Rate_daily/getData',
            type: 'POST',
            // beforeSend: function(){
            //     $(".ajax-loader").height($(document).height());
            //     $('.ajax-loader').css("visibility", "visible");
            // },
            data: function(d) {
                d.periode = $('#rate_date').val();    
            },
            // complete: function(){
            //     $('.ajax-loader').css("visibility", "hidden");
            // }
        },
        columns: [
            {data: "#", className: "dt-body-center", width: "5%", orderable: false, searchable: false},
            {data: 'valas_code',  width: "7%", render: function (data, type, row, meta) {
                return data;
            }},
            {data: 'valas_name'},
            {data: 'rate_date', render: function (data, type, row, meta) {
                    return bksfn.revDate(data);
            }},
            {data: 'rate_buy', render: function (data, type, row, meta) {
                    return bksfn.toRp(data);
            }},                
            {data: 'difference_buy', render: function (data, type, row, meta) {
                    return bksfn.toRp(data);
            }},                
            {data: 'rate_sale', render: function (data, type, row, meta) {
                    return bksfn.toRp(data);
            }},                
            {data: 'difference_sale', render: function (data, type, row, meta) {
                    return bksfn.toRp(data);
            }},
            {data: 'price_buy_bot', render: function (data, type, row, meta) {
                    return bksfn.toRp(data);
            }},
            {data: 'price_buy_top', render: function (data, type, row, meta) {
                    return bksfn.toRp(data);
            }},
            {data: 'price_sale_bot', render: function (data, type, row, meta) {
                    return bksfn.toRp(data);
            }},
            {data: 'price_sale_top', render: function (data, type, row, meta) {
                    return bksfn.toRp(data);
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
            {data: 'valas_id', visible: false},
        ],
        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            // Color Beli
            if (aData.rate_buy > 0) {
                $(nRow).find('td:eq(4)').css('color','#0000ff');
            }    
            if (aData.difference_buy > 0) {
                $(nRow).find('td:eq(5)').css('color','#0000ff');
            }    
            if (aData.price_buy_bot != 0) {
                $(nRow).find('td:eq(8)').css('color','#0000ff');
            }    
            if (aData.price_buy_top != 0) {
                $(nRow).find('td:eq(9)').css('color','#0000ff');
            }    

            // Color Jual
            $(nRow).find('td:eq(6)').css('color','#ff0000');
            $(nRow).find('td:eq(7)').css('color','#ff0000');
            $(nRow).find('td:eq(10)').css('color','#ff0000');
            $(nRow).find('td:eq(11)').css('color','#ff0000');
            
            // Color Status
            // if (aData.jenis_pasien.trim() === '2') { // Pasien BPJS
            //     $('td', nRow).css('background-color', '#baffc9');
            // }
            // if (aData.status === '3') { // Transaksi Batal
            //     $('td', nRow).css('background-color', '#ffffba');
            //     $(nRow).find('td:eq(5)').css('color','#ff0000');
            //     $(nRow).find('td:eq(5)').css('font-weight','bold');
            // }
        },
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTBks(t, 'master_data/Rate_daily/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() != 13 && ( $(this).index() < 3 && $(this).index() <= 11 ) ) {
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
        $("body").data("valas_id", d.valas_id);

        $('#valas_code').val(d.valas_code);
        $('#valas_name').val(d.valas_name);
        $('#rate_date2').val(d.rate_date);
        $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');
        
        $("#rate_buy").val( (d.rate_buy == null || d.rate_buy == '' ? 0 : bksfn.toRp(d.rate_buy)) );
        $("#difference_buy").val( (d.difference_buy == null || d.difference_buy == '' ? 0 : bksfn.toRp(d.difference_buy)) );

        $("#rate_sale").val( (d.rate_sale == null || d.rate_sale == '' ? 0 : bksfn.toRp(d.rate_sale)) );
        $("#difference_sale").val( (d.difference_sale == null || d.difference_sale == '' ? 0 : bksfn.toRp(d.difference_sale)) );

        $("#price_buy_bot").val( (d.price_buy_bot == null || d.price_buy_bot == '' ? 0 : bksfn.toRp(d.price_buy_bot)) );
        $("#price_buy_top").val( (d.price_buy_top == null || d.price_buy_top == '' ? 0 : bksfn.toRp(d.price_buy_top)) );

        $("#price_sale_bot").val( (d.price_sale_bot == null || d.price_sale_bot == '' ? 0 : bksfn.toRp(d.price_sale_bot)) );
        $("#price_sale_top").val( (d.price_sale_top == null || d.price_sale_top == '' ? 0 : bksfn.toRp(d.price_sale_top)) );

        // Format Number
        $("#rate_buy").keyup(function(e) {
            e.preventDefault();
            $(this).val(formatRupiah($(this).val()));
        });
        $("#price_buy_bot").keyup(function(e) {
            e.preventDefault();
            $(this).val(formatRupiah($(this).val()));
        });
        $("#price_buy_top").keyup(function(e) {
            e.preventDefault();
            $(this).val(formatRupiah($(this).val()));
        });

        $("#rate_sale").keyup(function(e) {
            e.preventDefault();
            $(this).val(formatRupiah($(this).val()));
        });
        $("#price_sale_bot").keyup(function(e) {
            e.preventDefault();
            $(this).val(formatRupiah($(this).val()));
        });
        $("#price_sale_top").keyup(function(e) {
            e.preventDefault();
            $(this).val(formatRupiah($(this).val()));
        });

        $(".modal-dialog").width('1200px');
        $("#ModalEdit").modal('show');
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
            alertify.confirm("Yakin Update Kurs " + $("#valas_code").val() + " ?", function (e) {
                if (e) {
                    //--- Edit
                    $.post('master_data/Rate_daily/update', $("#mainForm").serialize() + "&id=" + $("body").data("id") + "&valas_id=" + $("body").data("valas_id"), function (obj) {
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
        $("#rate_buy").val( 0 );
        $("#difference_buy").val( 0 );
        $("#rate_sale").val( 0 );
        $("#difference_sale").val( 0 );
        $("#price_buy_bot").val( 0 );
        $("#price_buy_top").val( 0 );
        $("#price_sale_bot").val( 0 );
        $("#price_sale_top").val(  );
        $("#status").iCheck('checked');
        $(':submit').removeAttr('disabled');
    });

    /**
     * Button Print Pdf
    */
    $(".print-pdf").on('click', function (e) {
        e.preventDefault();
        alertify.confirm("Print Kurs Tanggal " + $("#rate_date").val() + " ?", function (e) {    
            if (e) {
                var url = "master_data/Rate_daily/print_Pdf/" + $("#rate_date").val();
                $.ajax({
                    url: url,
                    type: 'POST',
                    beforeSend: function(){
                        $(".ajax-loader").height($(document).height());
                        $('.ajax-loader').css("visibility", "visible");
                    },
                    success: function(data, textStatus, jqXHR){
                        // alertify.success('Data Sudah DIcetak Ke Printer');
                        window.open(url, 'top=25, left=250, toolbar=no, width=1000, height=600'); 
                    },
                    complete: function(){
                        $('.ajax-loader').css("visibility", "hidden");
                    },
                    error: function(xhr){
                        alertify.error(xhr.responseText);
                    }
                });                                           
            }    
        });  
    });


})(jQuery);