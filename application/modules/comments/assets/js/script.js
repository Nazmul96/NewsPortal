
    $(".datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        showOtherMonths: true,
        selectOtherMonths: true,
        changeMonth: true,
        changeYear: true,
    });


     //datatable
    $('#notesList').DataTable({ 
        responsive: true, 
        dom: "<'row'<'col-sm-4 text-center'B><'col-sm-4'f>>","lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "All"]],
         buttons: [  
            {extend: 'copy', className: 'btn-sm'}, 
            {extend: 'csv', title: 'Notes List', className: 'btn-sm'}, 
            {extend: 'excel', title: 'Notes List', className: 'btn-sm'}
        ] 
    });


