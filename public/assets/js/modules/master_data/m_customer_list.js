(function ($) {    
    $("#btn-submit").on('click', function (e) {
        e.preventDefault();
        if($('#company_id').val() === null || $('#company_id').val() === ''){
            bksfn.errMsg('Cabang Belum Dipilih!');
        } else {
            fethdata();
        }        
    });

    $("#btn-excel").hide();
    $("#btn-excel").on('click', function (e) {
        e.preventDefault();
        if($('#company_id').val() === null || $('#company_id').val() === ''){
            bksfn.errMsg('Cabang Belum Dipilih!');
        } else {
            alertify.confirm("download data customer ?", function (e) {
                if (e) {
                    var url = "master_data/m_customer_list/excel/"+$('#company_id').val();
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
                            $a.attr("download","temp.xlsx");
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
                url: baseUrl + 'master_data/m_customer_list/getData',
                type: 'POST',
                // beforeSend: function(){
                //     $(".ajax-loader").height($(document).height());
                //     $('.ajax-loader').css("visibility", "visible");
                // },
                data: function(d) {
                    d.company_id = $('#company_id').val()
                },
                complete: function(){
                    $("#btn-excel").show();
                    // $('.ajax-loader').css("visibility", "hidden");                   
                }
            },
            columns: [
                {data: "#", className: "dt-body-center", width: "5%", orderable: false, searchable: false},
                {data: 'customer_name',  render: function (data, type, row, meta) {
                        return data;
                    }
                },
                {data: 'customer_address', render: function (data, type, row, meta) {
                        return data;
                    }
                },
                {data: 'customer_handphone', width: "10%", render: function (data, type, row, meta) {
                        return data;
                    }
                },
                {data: 'customer_data_name', width: "12%", render: function (data, type, row, meta) {
                        return data;
                    }
                },
                {data: 'customer_data_number', width: "15%", render: function (data, type, row, meta) {
                        return data;
                    }
                },
                {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                        var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                        return act;
                    }
                },
                {data: 'id', visible: false},
                {data: 'company_id', visible: false},
            ],            
            order: [[1, 'asc']]
        });
        t.draw();

        // Setup - add a text input to each header cell
        $('#searchid td').each(function () {
            if ($(this).index() != 0) {
                $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
            }
            if ($(this).index() == 6) {
                $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Active</option><option value="0">Not Active</option><select/>');
            }
        });
        $('#searchid input').keyup(function () {
            t.columns($(this).data('id')).search(this.value).draw();
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
        });
    }
})(jQuery);