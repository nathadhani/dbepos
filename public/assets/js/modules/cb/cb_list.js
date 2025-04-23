$("#btn-new").on('click', function (e) {
    e.preventDefault();
    call_page_cb_new();
});

$("#btn-generate-buysell").on('click', function (e) {
    e.preventDefault();
    if(usergroupId === 2 || usergroupId === 6){
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');
        } else {
            alertify.confirm("are you sure, Generate Buy / Sell transaction ?", function (x) {
                if (x) {
                    $.ajax({
                        url: baseUrl + 'cb/cb_list/generate_cb_buysell',
                        type: 'POST',
                        data: {'store_id' : $('#store_id').val(), 'period1' : $("#tr_date1").val(), 'period2' : $("#tr_date2").val() },
                        datatype: 'json',
                        success: function() {
                            alertify.success("Generate Buy / Sell Done!");
                            $('#table-modal-new tbody').empty();
                            history.go(0); // untuk memuat ulang halaman tanpa cache.
                        },
                        error: function(xhr){
                            alertify.error("error");
                            StringtoFile(xhr.responseText, 'error');
                        }
                    });
                }
            });
        }
    } else {
        alertify.confirm("are you sure, Generate Buy / Sell transaction ?", function (x) {
            if (x) {
                $.ajax({
                    url: baseUrl + 'cb/cb_list/generate_cb_buysell',
                    type: 'POST',
                    data: {'store_id' : $('#store_id').val(), 'period1' : $("#tr_date1").val(), 'period2' : $("#tr_date2").val() },
                    datatype: 'json',
                    success: function() {
                        alertify.success("Generate Buy / Sell Done!");
                        $('#table-modal-new tbody').empty();
                        history.go(0); // untuk memuat ulang halaman tanpa cache.
                    },
                    error: function(xhr){
                        alertify.error("error");
                        StringtoFile(xhr.responseText, 'error');
                    }
                });
            }
        });
    }    
});

$("#btn-excel").on('click', function (e) {
    e.preventDefault();
    if(usergroupId === 2 || usergroupId === 6){
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');
        } else {
            alertify.confirm("export xlsx ?", function (e) {    
                if (e) {
                    var url = "cb/cb_list/excel/";
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {'store_id' : $("#store_id").val(), 'period1' : $('#tr_date1').val(), 'period2' : $('#tr_date2').val()},
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
                            $a.attr("download","Transaction Cash Bank " + $("#tr_date1").val() + ' - ' + $("#tr_date2").val() + ".xlsx");
                            $a[0].click();
                            $a.remove();
                    });                                    
                }    
            });
        }
    } else {
        alertify.confirm("export xlsx ?", function (e) {
            if (e) {
                var url = "cb/cb_list/excel/";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {'store_id' : $("#store_id").val(), 'period1' : $('#tr_date1').val(), 'period2' : $('#tr_date2').val()},
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
                        $a.attr("download","Transaction Cash Bank " + $("#tr_date1").val() + ' - ' + $("#tr_date2").val() + ".xlsx");
                        $a[0].click();
                        $a.remove();
                });                                    
            }    
        });
    }              
});

$("#btn-new").hide();
$("#btn-generate-buysell").hide();
$("#btn-excel").hide();
$("#btn-submit").on('click', function (e) {
    e.preventDefault();
    if(usergroupId === 2 || usergroupId === 6){
        if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');
        } else {
            fethdata();
            $("#btn-new").show();
            $("#btn-excel").show();
            $("#btn-generate-buysell").show();
        }
    } else {        
        fethdata();
        $("#btn-new").show();
        $("#btn-excel").show();
        $("#btn-generate-buysell").show();
    }        
});

function fethdata(){
    var t = $('#mainTable table').DataTable({
        retrieve: true,
        serverSide: true,
        processing: true,
        autoWidth: false,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        sDom: 'it<"row"lp>',
        ajax: {
            url: baseUrl + 'cb/cb_list/getdata',
            type: 'POST',
            // beforeSend: function(){
            //     $(".ajax-loader").height($(document).height());
            //     $('.ajax-loader').css("visibility", "visible");
            // },
            data: function(d) {
                d.store_id = $('#store_id').val(),
                d.periode1 = $('#tr_date1').val(),
                d.periode2 = $('#tr_date2').val()
            },
            complete: function(){
                // $('.ajax-loader').css("visibility", "hidden");
            }
        },
        columns: [
            {data: "#", className: "dt-body-center", width: "5%", orderable: false, searchable: false},   
            {data: 'cb_name', width: "8%", render: function (data, type, row, meta) {                    
                return data;
            }},
            {data: 'tr_date',  width: "10%", render: function (data, type, row, meta) {
                    return bksfn.revDate(data);
            }},
            {data: 'tr_number',  width: "10%", render: function (data, type, row, meta) {
                return data;
            }},
            {data: 'cb_pos_name',  width: "35%", render: function (data, type, row, meta) {
                if(row.description !== null && row.description !== ''){
                    return data + ' - ' + row.description;
                } else {
                    return data;
                }                
            }},
            {data: 'total_in', width: "8%", render: function (data, type, row, meta) {
                return (Number(data) !== 0 ? formatRupiah(data) : '-');
            }},
            {data: 'total_out', width: "8%", render: function (data, type, row, meta) {
                return (Number(data) !== 0 ? formatRupiah(data) : '-');
            }},            
            {data: 'createdby_name',  width: "15%", render: function (data, type, row, meta) {
                    return data;
            }},
            {data: 'status_name', width: "13%", render: function (data, type, row, meta) {
                return data;
            }},         
            {data: 'id', className: "dt-body-center", orderable: false, width: "10%", render: function (data, type, row, meta) {
                    return '<a title="Detail" href="#"><i class="fa fa-eye"></i></a>';                                                
                }
            },
            {data: 'cb_id', visible: false},
            {data: 'cb_pos_id', visible: false},
            {data: 'status', visible: false},
            {data: 'description', visible: false},
        ],            
        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            if (Number(aData.status) == 2) {
                $(nRow).find('td:eq(8)').css('color','#FF0000');
                $(nRow).find('td:eq(8)').css('font-weight','bold');
            }                    
        },            
        order: [[1, 'asc'],[2, 'asc'],[3, 'asc']]
    });
    t.draw();

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() != 5 && $(this).index() != 6 && $(this).index() != 9 ) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }            
        if ($(this).index() == 2) {
            var index = parseInt($(this).index()) + 1;
            $(this).html('<input class="dpM1" style="width:100%; border: solid 1px #ccc; padding: 4px;" type="text" placeholder="Search" data-id="' + index + '" />');
            $(".dpM1").datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true
            });
        }                            
    });
    $('#searchid input').keyup(function () {
        t.columns($(this).data('id')).search(this.value).draw();
    });
    $('#searchid .dpM1').change(function () {
        t.columns(2).search(this.value).draw();
    });
    $(".clrs").click(function () {
        $('#searchid input').val('');
        $('#searchid select').val('');
        t.search('')
        t.columns().search('').draw();
    });
    
    $('#mainTable').on('click', 'a[title^=Detail]', function (e) {
        e.preventDefault();
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();       
        call_page_cb_edit(d.id);
    });
}
