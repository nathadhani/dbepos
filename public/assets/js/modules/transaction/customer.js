var arrdata = [];
var t = '';
default_row();
$('#btn_add').hide();
$("#task-table").hide();

$('#text_search').on('keyup',function(){
    $('.toggle-close').show();
});

$('.toggle-close').hide();
$(".toggle-close").click(function() {
    $('.toggle-close').hide();
    $('#btn_add').hide();
    $("#task-table").hide();
    $('#text_search').val('').focus();
    $('#mainTable').dataTable().fnClearTable();
    $('#mainTable').DataTable().destroy();
    default_row();
});

$("#btn_search").click(function (e) {
    e.preventDefault();    
    var xtext_search = $('#text_search').val();
    if (xtext_search == '' || xtext_search == null ) {
        bksfn.errMsg("Ketik kata yang mau di cari");
        $('#text_search').val('').focus();
        return false;    
    } else {
        if ( $.fn.dataTable.isDataTable('#mainTable') ) {
            $('#mainTable').dataTable().fnClearTable();
            $('#mainTable').DataTable().destroy();            
            fetch_data();
            select_row();
        } else {
            fetch_data();
            select_row();
        }
        
        function fetch_data(){
            t = $('#mainTable').DataTable({
                // columnDefs: [
                //     { orderable: false, targets: 0 }
                // ],
                // order: [[ 0, 'asc' ]],
                ordering:false,
                responsive: true,
                scrollY: "300px",
                scrollX: true,
                scrollCollapse: true,
                lengthMenu: [[8, 25, 50, 100, -1], [8, 25, 50, 100, "All"]],
                ajax: {
                    url: "transaksi/nasabah/getData",
                    type: "POST",
                    beforeSend: function(){
                        $(".ajax-loader").height($(document).height());
                        $('.ajax-loader').css("visibility", "visible");
                    },
                    data: {'search' : $('#text_search').val()},
                    dataSrc: ""
                },
                columns: [                   
                    {data: 'customer_name', render: function (data, type, row, meta) {                   
                            if(data === 'NaN' || data === '' || data === null){
                                return '';
                            } else {
                                str = data.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                    return letter.toUpperCase();
                                });
                                return str.trim();
                            }
                        }
                    },
                    {data: 'customer_address', render: function (data, type, row, meta) {                   
                            if(data === 'NaN' || data === '' || data === null){
                                return '';
                            } else {
                                str = data.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                    return letter.toUpperCase();
                                });
                                return str.trim();
                            }
                        }
                    },             
                    {data: 'customer_handphone'},       
                    {data: 'customer_data_name'},
                    {data: 'customer_data_number'},
                    // {data: 'customer_code', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                    //         // return '<a href="#" onClick="edit_data(' + row.id + "," + arrdata.push(row)  + ')">'+data+'</a>';                            
                    //         return data;
                    //     }
                    // },           
                    {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                        var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                        return act;
                    }},
                ],
                initComplete: function() {
                    var table = $('#mainTable').DataTable();
                    var table_length = table.data().count();
                    // if(Number(table_length) <= 0){   
                        $('#btn_add').show();
                        $("#task-table").show();
                    // }
                    $('.ajax-loader').css("visibility", "hidden");
                }
            });
        } 
    }
});

function default_row(){
    var rows =`<tr style="height:22px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>                                      
                </tr>`;
    for (let i = 0; i < 4; i++) {
        $('#mainTable tbody').append(rows);
    }
}

$("#btn_add").click(function (e) {
    e.preventDefault();
    var text_search = $("#text_search").val();
    var text_celluler = null;
    if( text_search.substring(0,2).trim() === '08' && text_search.length > 10 ){
        text_celluler = $("#text_search").val();
    }
    var url = "transaksi/nasabah_form/index/null/"+text_celluler;
    $.ajax({
        url: url,
        type: 'POST',
        success: function() {
            window.open(url,'_self'); 
        }
    });    
});

function edit_data(id) {
    d = arrdata.filter(data => data.id === id.toString())[0];
    var xnama = d.customer_name.trim();      
    var url = "transaksi/nasabah_form/index/"+d.id+"/null";
    $.ajax({
        url: url,
        type: 'POST',
        success: function() {
            window.open(url,'_self'); 
        }
    }); 
}

function select_row(){
    t.on('click', 'tbody tr', function (e) {
        e.preventDefault();
        let data = t.row(this).data();
        alertify.confirm('Cust. Name : ' + data.customer_name +'<br> Cust. Address : ' + data.customer_address, function (x) {    
            if (x) {           
                edit_data(data.id, arrdata.push(data));       
            } else {
                return;
            }    
        }); 
    });
}