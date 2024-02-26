        
        function addNew()
        {
            "use strict";
            var base_url = $('#base_url').val();
            var url = base_url+"archive/archive/add_category_to_archive";
            $('#actionurl').val(url);
            $('#addForm')[0].reset(); 
            $('.form-group').removeClass('has-error'); 
            $('.help-block').empty(); 
            $('#modal_form').modal('show'); 
            $('.modal-title').text('Add New Category for archive'); 
        }


            // category save to archive
            function saveCategory()
            {

                "use strict";
                $('#btnSave').text('saving...'); 
                $('#btnSave').attr('disabled',true);

                var url = $('#actionurl').val();
                var base_url = $('#base_url').val();

                $.ajax({
                    url : url,
                    type: "POST",
                    data: $('#addForm').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
                        if(data.status=='1') 
                        {
                            $('#modal_form').modal('hide');
                            toastr.success('Save successful');
                            $("#table").load(location.href+" #table>*","");
                            $('#btnSave').attr('disabled',false);

                        }else if(data.status=='2'){
                            toastr.warning('Already exist');
                            $('#btnSave').text('save');
                            $('#btnSave').attr('disabled',false);
                        }

                    },

                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                        $('#btnSave').text('save'); 
                        $('#btnSave').attr('disabled',false);
                    }
                });

            }


            // delete archive category
            function deleteCat(id)
            {
                "use strict";
                if(confirm('Do you want to delete this?'))
                {
                    var base_url = $('#base_url').val();
                    var url = base_url+"archive/archive/delete_category/"+id;
                    // ajax delete data to database
                    $.ajax({
                        url : url,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            toastr.success('Delete successful');
                            $("#table").load(location.href+" #table>*","");
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error deleting data');
                        }
                    });

                }
            }



        "use strict";
        $(document).ready(function () {

            var base_url = $('#base_url').val();
            

            function test(catID_Avaibale) {
                $('#myModalLabel').html("Archive News");
                $.ajax({
                    url: base_url+"archive/archive/archive_newses_by_category/" + catID_Avaibale,
                    context: document.body
                }).done(function (data) {
                });
            }


            $('.archive_modal').click(function () {
                $('.a').attr('id', this.id);
            });

            
            $('#start_archive').click(function () {

                $("#processing").html("Processing....");

                var catID_Avaibale = $('.a').attr('id');
                var total_news_by_category = catID_Avaibale.split("~");
                var total_call = Math.ceil(total_news_by_category[1] / 10);
                var timerId = 0;
                var counter = 0;

                timerId = setInterval(function () {
                    ++counter;
                    test(catID_Avaibale);
                    var percentage = Math.round(((10 * counter) * 100) / total_news_by_category[1]);
                    if (percentage > 100) {
                        percentage = 100;
                    }

                    $('.archive_process').css(
                        'width', percentage + '%'
                    );

                    $('.archive_process').html(percentage + '%');

                    if (counter === total_call) {
                        $("#processing").html("Completed");
                        $(".archive_status").removeClass('d-none');
                        $(".archive_status").addClass('d-block');
                        $(".a").addClass('disabled');
                        clearInterval(timerId);
                    }

                }, 5000);
            });
            
            $('#myModal').on('hide.bs.modal', function () {
                location.reload();
            });
        });