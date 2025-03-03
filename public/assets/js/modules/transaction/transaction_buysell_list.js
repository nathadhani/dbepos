(function ($) {
    $("#btn-excel").hide();
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
            $("#btn-excel").show();
            fethdata();
        }        
    });
    
    $("#btn-excel").on('click', function (e) {
        e.preventDefault();
        if($('#company_id').val() === null || $('#company_id').val() === ''){
            bksfn.errMsg('Cabang Belum Dipilih!');        
        } else if($('#store_id').val() === null || $('#store_id').val() === ''){
            bksfn.errMsg('Store Belum Dipilih!');
        } else {
            alertify.confirm("download transaction ?", function (e) {    
                if (e) {
                    var url = "transaction/transaction_buysell_list/excel/"+$('#company_id').val()+"/"+$('#store_id').val()+"/"+$('#tr_date1').val()+"/"+$('#tr_date2').val();
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
                            $a.attr("download","transaction buy sell.xlsx");
                            $a[0].click();
                            $a.remove();
                    });                                    
                }    
            });
        }              
    });

    //--- Datatables
    function fethdata(){
        var t = $('#mainTable table').DataTable({
            retrieve: true,
            serverSide: true,
            processing: true,
            autoWidth: false,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            sDom: 'it<"row"lp>',
            ajax: {
                url: baseUrl + 'transaction/transaction_buysell_list/getData',
                type: 'POST',
                // beforeSend: function(){
                //     $(".ajax-loader").height($(document).height());
                //     $('.ajax-loader').css("visibility", "visible");
                // },
                data: function(d) {
                    d.company_id = $('#company_id').val(),
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
                {data: 'tr_id',  width: "8%", render: function (data, type, row, meta) {
                    var act = (data == '1') ? '<Stong style="color:blue;">Trx Buy</Stong>' : '<Stong style="color:red;">Trx Sell</Stong>';
                    return act;
                }},
                {data: 'tr_number',  width: "10%", render: function (data, type, row, meta) {
                    return '<a title="Pilih" href="#">' + data + '</a>';
                }},
                {data: 'tr_date',  width: "10%", render: function (data, type, row, meta) {
                        return bksfn.revDate(data);
                }},
                {data: 'total', width: "8%", render: function (data, type, row, meta) {
                    return formatRupiah(data);
                }},
                {data: 'customer_name',  width: "35%", render: function (data, type, row, meta) {
                    return data;
                }},
                {data: 'createdby_name',  width: "15%", render: function (data, type, row, meta) {
                        return data;
                }},
                {data: 'status', width: "10%", render: function (data, type, row, meta) {
                    return lstatus_name(data);
                }},         
                {data: 'id', visible: false},
                {data: 'customer_id', visible: false},
            ],            
            order: [[1, 'asc'],[3, 'asc'],[2, 'asc']]
        });
        t.draw();

        // Setup - add a text input to each header cell
        $('#searchid td').each(function () {
            if ($(this).index() != 0 && $(this).index() != 4 ) {
                $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
            }
            if ($(this).index() == 1) {
                $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Trx Buy</option><option value="2">Trx Sell</option><select/>');
            }
            if ($(this).index() == 3) {
                var index = parseInt($(this).index()) + 1;
                $(this).html('<input class="dpM1" style="width:100%; border: solid 1px #ccc; padding: 4px;" type="text" placeholder="Search" data-id="' + index + '" />');
                $(".dpM1").datepicker({
                    format: "yyyy-mm-dd",
                    autoclose: true,
                    todayHighlight: true
                });
            }                
            if ($(this).index() == 7) {
                $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Task</option><option value="2">Canceled</option><option value="3">Confirm</option><option value="4">API - Input</option><select/>');
            }
        });
        $('#searchid input').keyup(function () {
            t.columns($(this).data('id')).search(this.value).draw();
        });
        $('#searchid select').change(function () {
            t.columns(1).search(this.value).draw();
        });
        $('#searchid .dpM1').change(function () {
            t.columns(3).search(this.value).draw();
        });        
        $('#searchid select').change(function () {
            t.columns(7).search(this.value).draw();
        });
        $(".clrs").click(function () {
            $('#searchid input').val('');
            $('#searchid select').val('');
            t.search('')
            t.columns().search('').draw();
        });
        
        $('#mainTable').on('click', 'a[title^=Pilih]', function (e) {
            e.preventDefault();
            var elm = $(this).closest("tr");
            var d = t.row(elm).data();
            var url = '';
            if(Number(d.tr_id) == 1){
                url = call_page_show_buy(d.customer_id, d.id);
            } else {
                url = call_page_show_sell(d.customer_id, d.id);
            }
            if(url !== ''){
                $.ajax({
                    url: url,
                    type: 'POST',
                    success: function() {
                        window.open(url,'_self'); 
                    },
                    error: function(){
                        alertify.error("can't open page.!");
                    }
                });    
            }
        });
    }
})(jQuery);

function lstatus_name(status_id) {
    var status_Id =  Number(status_id);
    var lstatus = '';
    switch(status_Id) {
        case 1:
            lstatus += '<strong>Task</strong>';
            break;
        case 2:
            lstatus += '<strong style="color:red;">Canceled</strong>';
            break;
        case 3:
            lstatus += '<strong>Confirm</strong>';
            break;
        case 4:
            lstatus += '<strong>API - inputtrx</strong>';
            break;
        default:
            lstatus = '';
    }
    return lstatus;
}