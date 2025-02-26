(function ($) {
    window.scroll(0, 0);

    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {
        $("#ftitle").html('Import');
        $("#file").focus();        
        $(':submit').removeAttr('disabled');
    });

    //--- Import Data
    $('#mainForm').on('submit', function(e){
        e.preventDefault();
        alertify.confirm("Import File " + $("#file").val() + " ?", function (x) {    
            if (x) {
                var form_data = new FormData(document.getElementById("mainForm"));
                $.ajax({    
                    url: 'master_data/Dttot/insert',    
                    method:"POST",
                    beforeSend: function(){
                        $(".ajax-loader").height($(document).height());
                        $('.ajax-loader').css("visibility", "visible");
                    },   
                    data: form_data,
                    contentType:false,    
                    cache:false,    
                    processData:false,    
                    success:function(data){    
                        $("#mainForm")[0].reset();   
                        $('#mainTable table').DataTable().ajax.reload();
                        alertify.success("Import Data Success");
                    },
                    complete: function(){
                        $('.ajax-loader').css("visibility", "hidden");
                    },
                    error: function(xhr){
                        alertify.alert(xhr.responseText);
                    }  
                })
            } else {
                $("#mainForm")[0].reset();
            }    
        });   
    });        

    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'it<"row"lp>',
        ajax: {
            url: baseUrl + 'master_data/Dttot/getData',
            type: 'POST',
            beforeSend: function(){
                $(".ajax-loader").height($(document).height());
                $('.ajax-loader').css("visibility", "visible");
            },
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            }
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},            
            {data: 'nama'},
            {data: 'deskripsi'},
            {data: 'terduga'},
            {data: 'kode_densus'},
            {data: 'tpt_lahir'},
            {data: 'tgl_lahir'},
            {data: 'warga_negara'},
            {data: 'alamat'},
            {data: 'created'},
            {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                return act;
            }},
            {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<a title="Edit" href="#"><i class="fa fa-edit"></i></a>';
                }
            },                
        ],
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTBks(t, 'master_data/Dttot/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() < 9 ) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
        if ($(this).index() == 10) {
            $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Active</option><option value="0">Not Active</option><select/>');
        }
    });
    $('#searchid input').keyup(function () {
        t.columns($(this).data('id')).search(this.value).draw();
    });
    $('#searchid select').change(function () {
        t.columns(10).search(this.value).draw();
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

        $('#kode').html(d.kode_densus);
        $('#nama').html(d.nama);
        $('#deskripsi').html(d.deskripsi);
        $('#terduga').html(d.terduga);
        $('#tpt_lahir').html(d.tpt_lahir);
        $('#tgl_lahir').html(d.tgl_lahir);
        $('#warga_negara').html(d.warga_negara);
        $('#alamat').html(d.alamat);
        
        $(".modal-dialog").width('1200px');
        $("#ModalEdit").modal('show');
    });   

})(jQuery);