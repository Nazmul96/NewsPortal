                  
    function addNew()
    {
        "use strict";
        var base_url = $('#base_url').val();
        var url = base_url+"RSS_Feed/rss_import_setup/save_rss_link";
        $('#actionurl').val(url);
        $('#linkForm')[0].reset(); 
        $('.form-group').removeClass('has-error'); 
        $('.help-block').empty(); 
        $('#modal_form').modal('show'); 
        $('.modal-title').text('Add New Link'); 
    }


    function editLink(id)
    {
        "use strict";        
        $('#linkForm')[0].reset(); 
        $('.form-group').removeClass('has-error'); 
        $('.help-block').empty(); 
        var base_url = $('#base_url').val();
        var url = base_url+"RSS_Feed/rss_import_setup/get_edit_info/"+id;
        //Ajax Load data from ajax
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                var urls = base_url+"RSS_Feed/rss_import_setup/update_link";

                $('[name="id"]').val(data.id);
                $('[name="feed_name"]').val(data.feed_name);
                $('[name="rss_link"]').val(data.rss_link);
                $('[name="post_number"]').val(data.post_number);
                $('[name="category_slug"]').val(data.category_slug);
                $('[name="status"]').val(data.status);

                $('#modal_form').modal('show'); 
                $('.modal-title').text('Edit Link'); 

                $('#btnSave').text('Update');
                $('#actionurl').val(urls);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }


    function saveRssLink()
    {

        "use strict";
        $('#btnSave').text('saving...'); 
        $('#btnSave').attr('disabled',true);

        var url = $('#actionurl').val();
        var base_url = $('#base_url').val();

        $.ajax({
            url : url,
            type: "POST",
            data: $('#linkForm').serialize(),
            dataType: "JSON",
            success: function(res)
            {

                if(res.status=='1') 
                {
                    $('#modal_form').modal('hide');
                    toastr.success('Save successful');
                    $("#table").load(location.href+" #table>*","");
                    $('#btnSave').attr('disabled',false);

                }else if(res.status=='2'){
                    toastr.warning('Position already exist');
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



    function deleteLink(id)
    {
        "use strict";
        if(confirm('Do you want to delete this?'))
        {
            var base_url = $('#base_url').val();
            var url = base_url+"RSS_Feed/rss_import_setup/delete_link/"+id;
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
