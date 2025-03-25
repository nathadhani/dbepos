var id_tr_header = '';
$("#btn-excel").hide();     

$("#btn-submit").on('click', function (e) {
    e.preventDefault();
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');
    } else {
        $("#btn-excel").show();
        fethdata();
    }        
});

$("#btn-excel").on('click', function (e) {
    e.preventDefault();
    if($('#store_id').val() === null || $('#store_id').val() === ''){
        bksfn.errMsg('Store Belum Dipilih!');
    } else {
        alertify.confirm("export xlsx ?", function (e) {    
            if (e) {
                var url = "cb/cb_list/excel/"+$('#store_id').val()+"/"+$('#tr_date1').val()+"/"+$('#tr_date2').val();
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
                        $a.attr("download","cash bank list.xlsx");
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
            {data: 'total', width: "8%", render: function (data, type, row, meta) {
                return formatRupiah(data);
            }},
            {data: 'cb_pos_name',  width: "35%", render: function (data, type, row, meta) {
                if(row.reason_cancel !== null && row.reason_cancel !== ''){
                    return data + ' - ' + row.reason_cancel;
                } else {
                    return data;
                }                
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
            {data: 'reason_cancel', visible: false},
        ],            
        order: [[1, 'asc'],[3, 'asc'],[2, 'asc']]
    });
    t.draw();

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() != 4 && $(this).index() != 8 ) {
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
        $(".modal-dialog").width('1200px');
        $("#ModalNew").modal('show');
        reset_form_input_header();
        reset_form_input_new();
        id_tr_header = d.id;
        show_detail(id_tr_header);
        $("#modal_new_tr_date").val(bksfn.revDate(d.tr_date));
        $('#modal_new_tr_date').prop('disabled', true);
        if (d.cb_id != null) {
            $("#cb_id").html('<option value="' + d.cb_id + '">' + d.cb_name + '</option>').sel2dma();
        } else {
            $("#cb_id").html('').sel2dma();
        }
        if (d.cb_pos_id != null) {
            $("#cb_pos_id").html('<option value="' + d.cb_pos_id + '">' + d.cb_pos_name + '</option>').sel2dma();
        } else {
            $("#cb_pos_id").html('').sel2dma();
        }
    });
}

$("#btn-modal-new-cancel").on('click', function (e) {
    e.preventDefault();
    $("#ModalNew").modal('hide');
    $(".modal-dialog").width('1200px');
    $("#ModalCancel").modal('show');
});
$("#btn-modal-cancel-close").on('click', function (e) {
    e.preventDefault();
    $("#ModalCancel").modal('hide');
});
$("#btn-modal-cancel").on('click', function (e) {
    e.preventDefault();
    if($("#modal-cancel-description").val() === '' || $("#modal-cancel-description").val() === null ){
        bksfn.errMsg('Alasan batal belum di input!');
    } else {
        alertify.confirm("are you sure, CANCEL transaction ?", function (x) {
            if (x) {
                $.ajax({
                    url: baseUrl + 'cb/cb_list/cancel_trx',
                    type: 'POST',
                    data: {'id' : id_tr_header, 'description' : $("#modal-cancel-description").val()},
                    datatype: 'json',
                    success: function() {
                        $("#ModalCancel").modal('hide');        
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


$("#btn-new").on('click', function (e) {
    e.preventDefault();
    $(".modal-dialog").width('1200px');
    $("#ModalNew").modal('show');
    reset_form_input_header();
    reset_form_input_new();
});
$("#btn-modal-new-close").on('click', function (e) {
    e.preventDefault();
    $("#ModalNew").modal('hide');
});
$('#cb_id').on('change',function(e){
    e.preventDefault()
    if($(this).val() != null && $(this).val() != ''){
        $('#cb_pos_id').html('').sel2dma();
        $('#cb_pos_id').prop('disabled', false);
        $('#cb_pos_id').focus()
        $.ajax({
            url : baseUrl +  'master_data/m_cb_pos/getmcbpos',
            type: 'POST',
            data: {'cb_id' : $(this).val()},
            datatype: 'json',
            success: function(data){
                $('#cb_pos_id').html(data);
            },
            error: function(){
                alert("can't get store");  
            }
        });
    }
});
$("#cb_pos_id").on("change", function(e) {
    e.preventDefault();
    $("#modal_new_description").val( $("#cb_pos_id option:selected").text() );
});
$("#modal_new_amount").keyup(function(e) {
    e.preventDefault();
    $(this).val($(this).val());
    if( Number($(this).val()) > 0 ){
        $("#terbilang_modal_new_amount").html('<i>Amount</i> : ' + bksfn.terBilang($(this).val()));
    }
});
$("#btn-modal-add-new").on('click', function (e) {
    e.preventDefault();
    if( $("#cb_id").val() === '' || $("#cb_id").val() === null) {
        bksfn.errMsg('Source belum diinput!');
    } else if( $("#cb_pos_id").val() === '' || $("#cb_pos_id").val() === null) {
        bksfn.errMsg('purpose belum diinput!');
    } else if( $("#modal_new_description").val() === '' || $("#modal_new_description").val() === null) {
        bksfn.errMsg('keterangan belum diinput!');    
    } else if( $("#modal_new_amount").val() === '' || $("#modal_new_amount").val() === null || Number($("#modal_new_amount").val()) <= 0) {
        bksfn.errMsg('jumlah belum diinput!');
    } else {
        $.post(baseUrl + 'cb/cb_list/insert_detail', $("#mainFormModalNew").serialize() + "&header_id=" + id_tr_header, function (obj) {
            if (obj.msg == 1) {
                alertify.success('Data add success!');
                reset_form_input_new();
                id_tr_header = obj.id_header;
                show_detail(id_tr_header);
            } else {
                alertify.error("error");
                StringtoFile(xhr.responseText, 'error');
            }
        }, "json").fail(function (xhr) {        
            alertify.error("error");
            StringtoFile(xhr.responseText, 'error');
        });
    }
});

function reset_form_input_header(){
    $('#cb_id').html('').sel2dma();
    $("#cb_pos_id").html('').sel2dma();
    $('#cb_id').prop('disabled', false);
    $('#cb_pos_id').prop('disabled', true);
}

function reset_form_input_new(){
    $('#modal_new_description').val('');
    $("#modal_new_amount").val('');
    $("#terbilang_modal_new_amount").html('');
}

function show_detail($header_id){
    // $('#table-modal-new tbody').empty();
    let tbody = document.getElementById("table-modal-new");
    let rowCount = tbody.rows.length;
    for (let i = rowCount - 1; i >= 1; i--) {
        tbody.deleteRow(i);
    }
    var counter = document.getElementById('table-modal-new').rows.length;
    $.ajax({
        url: baseUrl + 'cb/cb_list/show_detail',
        type: 'POST',
        data: {'header_id' : $header_id},
        dataType: 'json',
        success: function (data) {
            if (data !== '[]' && data.length > 0){
                var totalamountx = 0;
                $.each(data, function (i, d) {                 
                    totalamountx += Number(d.amount);
                    if(Number(d.status) === 3){
                        var rows =`<tr id="` + counter + `">
                                        <td width="5%" style="text-align:center;vertical-align:middle">
                                            ` + counter + `
                                        </td>
                                        <td width="10%" style="vertical-align: middle;color:black">
                                            ` + d.cb_name.trim() +`
                                            <a style="color:red; cursor:pointer" title="hapus" onClick="delete_line_detail(` + d.id + `)"> / <i>remove<i></a>
                                        </td>
                                        <td width="20%" style="vertical-align: middle;color:black">
                                            ` + d.cb_pos_name +`
                                        </td>
                                        <td width="45%" style='text-align:left;'>
                                            ` + d.cb_description.trim() + ` - ` + d.description.trim() + `
                                        </td>
                                        <td width="15%" style='text-align:left;'>
                                            ` + (isDecimal(d.amount) ? formatDecimal(d.amount,2) : formatRupiah(d.amount) ) + `
                                        </td>
                                    </tr>`
                        $('#table-modal-new tbody').append(rows);   
                    } else {
                        var rows =`<tr id="` + counter + `">
                                        <td width="5%" style="text-align:center;vertical-align:middle">
                                            ` + counter + `
                                        </td>
                                        <td width="10%" style="vertical-align: middle;color:black">
                                            ` + d.cb_name.trim() +`
                                        </td>
                                        <td width="20%" style="vertical-align: middle;color:black">
                                            ` + d.cb_pos_name +`
                                        </td>
                                        <td width="45%" style='text-align:left;'>
                                            ` + d.cb_description.trim() + ` - ` + d.description.trim() + `
                                        </td>
                                        <td width="15%" style='text-align:left;'>
                                            ` + (isDecimal(d.amount) ? formatDecimal(d.amount,2) : formatRupiah(d.amount) ) + `
                                        </td>
                                    </tr>`
                        $('#table-modal-new tbody').append(rows);
                    }                    
                    counter++;
                });
                var rowsx =`<tr>
                                <td colspan="4" style='vertical-align:middle;text-align:center;font-weight:bold;background-color:#f1f5f9;color:#56688A;font-size:13px;'>
                                    Total
                                </td>
                                <td style='text-align:left;font-weight:bold;'>
                                    Rp. ` + formatRupiah(totalamountx) + `
                                </td>                         
                            </tr>`   
                $('#table-modal-new tbody').append(rowsx); 
                $('#cb_id').prop('disabled', true);
                $('#cb_pos_id').prop('disabled', true);
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

function delete_line_detail($id){
    if( typeof($id) != 'undefined' && $id !== null && $id !== '' ) {
        $.ajax({
            url : baseUrl +  'cb/cb_list/delete_detail',
            type: 'POST',
            data: {'id' : $id },
            datatype: 'json',
            success: function(data){
                show_detail(id_tr_header);
                alertify.success("Delete Item Success");
            },
            error: function(xhr){                
                alertify.error("error");
                StringtoFile(xhr.responseText, 'error');
            }
        });
    }       
}

$("#btn-generate-buysell").on('click', function (e) {
    e.preventDefault();
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
                        alertify.success("Generate Done!");
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
