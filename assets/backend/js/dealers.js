$(document).ready( () => {    
    $("#dealers").addClass('active');
     // Setup - add a text input to each footer cell
    $('#dataTable thead tr').clone(true).appendTo( '#dataTable thead' );
    $('#dataTable thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    });
    
    const table = $('#dataTable').DataTable( {
        "ajax": "Admin/DealersController/getDealers",
        orderCellsTop: true,
        fixedHeader: true,
        "columns": [
            { "data": "name" },
            { "data": "district" },
            { "data": "tehsil" },
            { "data": "depot" },
            { "data": "mobile" },
            // { "data": "email" },
            { "data": (item, index) => {return `<a href="dealerPdf/${item.id}" target="_blank"><i class="fas fa-fw fa-file-pdf"></i></a><a href="dealer/${item.id}/edit"><i class="fas fa-fw fa-edit"></i></a><a href="uploads/${item.adhar}" download><i class="fas fa-download"></i></a><a onclick="deleteDealer(${item.id})"><i class="fas fa-fw fa-trash"></i></a>`;} }
        ]
    });
});

function deleteDealer(obj) {
    $('#deleteModal').modal("toggle");
    $('#del_id').val(obj);
}

function confirmDelete() {
    const id = $('#del_id').val();
    const url = 'Admin/DealersController/deleteDealer';
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            id: id
        },
        success: (res) => {
            if (res.status === 'success') {
                window.location.reload();
            } else {
                console.log(res);
            }
        },
        error: (err) => {
            console.log(err);
        }
    });
}