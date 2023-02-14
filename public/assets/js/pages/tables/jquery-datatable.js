$(function() {
    $('.js-basic-example').DataTable({
        pageLength: 50,
        lengthMenu: [10, 20, 50],
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});