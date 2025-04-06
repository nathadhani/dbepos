(function ($) {    
    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {
        $("#ftitle").html('Add');        
        
        $("#store_name").val('').focus();
        $("#store_address").val();
        $("#store_email").val();
        $("#store_permit_number").val();

        $("#api_method").val();
        $("#api_angkasapura").val();        
        $("#api_username").val();
        $("#api_password").val();
        $("#api_store_id").val();
        $("#api_store_name").val();

        $("#ap_tr_id").html('').sel2dma();

        $("#status").iCheck('check');
        $(':submit').removeAttr('disabled');
    });

    //--- Validasi
    $.validate({
        form: "#mainForm",
        validateOnBlur: false,
        onError: function () {
            $('.help-block').remove();
            bksfn.errMsg("Please fill form");
        },
        onSuccess: function () {
            if ($("#ftitle").html().substr(0, 4) == "Edit") {
                //--- Edit
                $.post('master_data/m_store/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
                    if (obj.msg == 1) {
                        $("#mainForm")[0].reset();
                        $('#mainTable table').DataTable().ajax.reload();
                        alertify.success("Edit Data Success");
                    } else {
                        bksfn.errMsg(obj.msg);
                    }
                }, "json").fail(function () {
                    bksfn.errMsg();
                });
            } else {
                //--- Insert
                $.post('master_data/m_store/insert', $("#mainForm").serialize(), function (obj) {
                    if (obj.msg == 1) {
                        $("#mainForm")[0].reset();
                        $('#mainTable table').DataTable().ajax.reload();
                        alertify.success("Insert Data Success");
                    } else {
                        bksfn.errMsg(obj.msg);
                    }
                }, "json").fail(function () {
                    bksfn.errMsg();
                });
            }
        }
    });    

    $('#mainTable').on('click', 'a[title^=Edit]', function (e) {
        e.preventDefault();
        window.scroll(0, 0);
        if ($("#mainForm .panel-body").css('display') == 'none') {
            $("#mainForm .panel-controls a").click();
        }
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        $("#ftitle").html('Edit');

        $("#store_name").val(d.store_name).focus();
        $("#store_address").val(d.store_address);
        $("#store_email").val(d.store_email);
        $("#store_permit_number").val(d.store_permit_number);

        $("#api_method").val(d.api_method);
        $("#api_angkasapura").val(d.api_angkasapura);        
        $("#api_username").val(d.api_username);
        $("#api_password").val(d.api_password);
        $("#api_store_id").val(d.api_store_id);
        $("#api_store_name").val(d.api_store_name);

        if (d.tr_id_object != null) {
            tr_id_object = JSON.parse(d.tr_id_object);
            $("#ap_tr_id").html('').sel2dma();    
            $.each(tr_id_object, function (i, val) {
                $("#ap_tr_id").append(`<option value="${val.id}">${val.tr_name} [${val.id}]</option>`);    
                $("#ap_tr_id-container").find("span.select2-container ul.select2-selection__rendered").append(`<li class="select2-selection__choice" title="${val.tr_name} [${val.id}]"><span class="select2-selection__choice__remove" role="presentation">×</span>${val.tr_name} [${val.id}]</li>`);
            });    
            $("input.select2-search__field").attr('placeholder', '');
            $("input.select2-search__field").css("width", "0");
            $("ul.select2-selection__rendered").append('<span class="select2-selection__clear">×</span>');
        }    
        if (d.ap_tr_id != null) {
            $("#ap_tr_id").val(d.tr_id_object.split(','));
        }

        $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');
        $("body").data("id", d.id);
    });    

    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'it<"row"lp>',
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        ajax: {
            url: baseUrl + 'master_data/m_store/getdata',
            type: 'POST'
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'store_name', render: function (data, type, row, meta) {
                    return data;
                }
            },
            {data: 'store_address'},
            {data: 'api_store_id'},
            {data: 'api_angkasapura'},
            {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                return act;
            }},
            {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<a title="Edit" href="#"><i class="fa fa-edit"></i></a>';
                }
            },            
            {data: 'store_email', visible: false},
            {data: 'store_permit_number', visible: false},
            {data: 'api_method', visible: false},
            {data: 'api_angkasapura', visible: false},
            {data: 'api_username', visible: false},
            {data: 'api_password', visible: false},
            {data: 'api_store_name', visible: false},
            {data: 'ap_tr_id', visible: false},
            {data: 'tr_id_object', visible: false},
            {data: 'user_limits', visible: false},
        ],
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTBks(t, 'master_data/m_store/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() <= 3) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
        if ($(this).index() == 5) {
            $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Active</option><option value="0">Not Active</option><select/>');
        }
    });
    $('#searchid input').keyup(function () {
        t.columns($(this).data('id')).search(this.value).draw();
    });
    $('#searchid select').change(function () {
        t.columns(5).search(this.value).draw();
    });
    $(".clrs").click(function () {
        $('#searchid input').val('');
        $('#searchid select').val('');
        t.search('')
        t.columns().search('').draw();
    });

    $("#btn-get-store-ap").on('click', function (e) {
        e.preventDefault();
        alertify.confirm("Are you sure Get Store Angkasapura ?", function (x) {
            if (x) {                       
                $.ajax({
                    url: baseUrl + 'api/api_ap/ap_post_api',
                    type: 'POST',
                    data: {'method' : 'getstore', 'store_id' : '1'},
                    datatype: 'json',
                    success: function(data) {    
                        if(data.length > 0) {
                            $('#mainTable table').DataTable().ajax.reload();
                            alertify.success('Get Store Success!');
                        }                       
                    },
                    error: function(xhr){
                        alertify.error(xhr.responseText);
                    }
                });
            } else {
                return;
            }             
        });                             
    });
})(jQuery);

