var arrdata = [];
var t = '';
default_row();
$('#btn_add').hide();
$('#text_search').on('keyup',function(){
    $('.toggle-close').show();
});

const input = document.getElementById('text_search');
input.addEventListener('keydown', function(event) {
    if (event.keyCode === 13) {
        var xtext_search = $('#text_search').val();
        if (xtext_search == '' || xtext_search == null ) {
            bksfn.errMsg("Ketik kata yang mau di cari");
            $('#text_search').val('').focus();
            $('#mainTable').dataTable().fnClearTable();
            $('#mainTable').DataTable().destroy();
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
        }
    }
});

$('.toggle-close').hide();
$(".toggle-close").click(function() {
    $('.toggle-close').hide();
    $('#btn_add').hide();
    $('#text_search').val('').focus();
    $('#mainTable').dataTable().fnClearTable();
    $('#mainTable').DataTable().destroy();
    default_row();
});

// $("#btn_search").click(function (e) {
//     e.preventDefault();    
//     var xtext_search = $('#text_search').val();
//     if (xtext_search == '' || xtext_search == null ) {
//         bksfn.errMsg("Ketik kata yang mau di cari");
//         $('#text_search').val('').focus();
//         return false;    
//     } else {
//         if ( $.fn.dataTable.isDataTable('#mainTable') ) {
//             $('#mainTable').dataTable().fnClearTable();
//             $('#mainTable').DataTable().destroy();            
//             fetch_data();
//             select_row();
//         } else {
//             fetch_data();
//             select_row();
//         }
//     }
// });

function fetch_data(){
    t = $('#mainTable').DataTable({
        // columnDefs: [
        //     { orderable: false, targets: 0 }
        // ],
        // order: [[ 0, 'asc' ]],
        paging:false,
        ordering:false,
        info: true,
        responsive: true,
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        dom: '<"top"i>rt<"bottom"flp><"clear">',
        lengthMenu: [[50, 100, -1], [50, 100, "All"]],
        ajax: {
            url: "transaction/customer/getdata",
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
            {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                    var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                    return act;
                }
            },
            // {data: 'customer_code', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
            //         return '<a title="Edit" href="#"><i class="fa fa-edit"></i></a>';
            //     }
            // },           
        ],
        initComplete: function() {
            var table = $('#mainTable').DataTable();
            var table_length = table.data().count();
            if(Number(table_length) <= 0){   
                alertify.error('data not found.!');
                $('#btn_add').show();                                
            }
            $('.ajax-loader').css("visibility", "hidden");
        }
    });

    $('#mainTable').on('click', 'a[title^=Edit]', function (e) {
        e.preventDefault();
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        alertify.confirm('Customer Name : ' + d.customer_name +'<br> Customer Address : ' + d.customer_address, function (x) {    
            if (x) {           
                edit_data(d.id, arrdata.push(d));
            } else {
                return;
            }    
        });        
    });    
}

function default_row(){
    var rows =`<tr style="height:22px;">
                    <td width='25%'></td>
                    <td width='70%'></td>
                    <td width='5%'></td>
                </tr>`;
    for (let i = 0; i < 5; i++) {
        $('#mainTable tbody').append(rows);
    }
}

function edit_data($id) {   
    if($id !== null && $id !== ''){
        d = arrdata.filter(data => data.id === $id.toString())[0];
        var url = "transaction/customer_form/index/"+d.id+"/null";
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
    } else {
        alertify.error("can't open page.!");
    }
}

function select_row(){
    t.on('click', 'tbody tr', function (e) {
        e.preventDefault();
        let data = t.row(this).data();
        edit_data(data.id, arrdata.push(data));
    });
}

$("#btn_add").click(function (e) {
    e.preventDefault();
    var text_search = $("#text_search").val();
    var text_celluler = null;
    if( text_search.substring(0,2).trim() === '08' && text_search.length > 10 ){
        text_celluler = $("#text_search").val();
    }
    var url = "transaction/customer_form/index/null/"+text_celluler;
    $.ajax({
        url: url,
        type: 'POST',
        success: function() {
            window.open(url,'_self'); 
        }
    });    
});