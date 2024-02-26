
    $(document).ready(function () {
        $('body').on('click', '#select_deselect', function () {
            $(".sameChecked").prop('checked', $(this).prop('checked'));
        });
        $('body').on('click', '.can_create_all', function () {
            var create_value = $(this).val();
            $("." + create_value + "_can_create").prop('checked', $(this).prop('checked'));
        });
        $('body').on('click', '.can_read_all', function () {
            var read_value = $(this).val();
            $("." + read_value + "_can_read").prop('checked', $(this).prop('checked'));
        });
        $('body').on('click', '.can_edit_all', function () {
            var edit_value = $(this).val();
            $("." + edit_value + "_can_edit").prop('checked', $(this).prop('checked'));
        });
        $('body').on('click', '.can_delete_all', function () {
            var delete_value = $(this).val();
            $("." + delete_value + "_can_delete").prop('checked', $(this).prop('checked'));
        });
    });


    

    
                "use strict";
                (function ($) {
                    "use strict";
                    var tableBootstrap4Style = {

                        initialize: function () {
                            this.bootstrap4Styling();
                            this.bootstrap4Modal();
                        },
                        bootstrap4Styling: function () {
                            $('.bootstrap4-styling').DataTable();
                        },
                        bootstrap4Modal: function () {
                            $('.example').DataTable({
                                responsive: {
                                    details: {
                                        display: $.fn.dataTable.Responsive.display.modal({
                                            header: function (row) {
                                                var data = row.data();
                                                return 'Details for ' + data[0] + ' ' + data[1];
                                            }
                                        })
                                        
                                    }
                                }
                            });
                        },
                      

                    };
                    // Initialize
                    $(document).ready(function () {
                        "use strict"; // Start of use strict
                        tableBootstrap4Style.initialize();
                    });

                }(jQuery));

