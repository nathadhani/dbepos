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
            fethdata();
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
                url: baseUrl + 'inventory/inventory_list/getData',
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
                {data: 'tr_number',  width: "10%", render: function (data, type, row, meta) {
                    return '<a title="Pilih" href="#">' + data + '</a>';
                }},
                {data: 'tr_date',  width: "10%", render: function (data, type, row, meta) {
                        return bksfn.revDate(data);
                }},
                {data: 'tr_description',  width: "30%", render: function (data, type, row, meta) {
                    return data;
                }},
                {data: 'createdby_name',  width: "15%", render: function (data, type, row, meta) {
                        return data;
                }},                
                {data: 'tr_id',  width: "10%", render: function (data, type, row, meta) {
                    var act = (data == '3') ? '<Stong>Inventory In</Stong>' : '<Stong">Inventory Out</Stong>';
                    return act;
                }},
                {data: 'status', width: "10%", render: function (data, type, row, meta) {
                    return lstatus_name(data);
                }},         
                {data: 'id', visible: false},
            ],            
            order: [[1, 'asc']]
        });
        t.draw();

        // Setup - add a text input to each header cell
        $('#searchid td').each(function () {
            if ($(this).index() != 0 && $(this).index() != 4 ) {
                $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
            }
            if ($(this).index() == 5) {
                $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="3">Inventory In</option><option value="4">Inventory Out</option><select/>');
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
            if ($(this).index() == 6) {
                $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="3">Confirm</option><option value="2">Canceled</option>');
            }
        });
        $('#searchid input').keyup(function () {
            t.columns($(this).data('id')).search(this.value).draw();
        });
        $('#searchid .dpM1').change(function () {
            t.columns(2).search(this.value).draw();
        });
        $('#searchid select').change(function () {
            t.columns(5).search(this.value).draw();
        });
        $('#searchid select').change(function () {
            t.columns(6).search(this.value).draw();
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
            url = "inventory/inventory/index/"+d.id;
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
            lstatus += '<strong>Open</strong>';
            break;
        case 2:
            lstatus += '<strong style="color:red;">Canceled</strong>';
            break;
        case 3:
            lstatus += '<strong>Confirm</strong>';
            break;    
        default:
            lstatus = '';
    }
    return lstatus;
}