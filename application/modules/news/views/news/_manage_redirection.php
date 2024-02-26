

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Redirection List</h6>
                            </div>
                            <button class="btn btn-success float-right" onclick="addTitle()"><i class="fa fa-plus"></i>Add New</button>
                        </div>
                    </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover bg-white m-0 card-table" id="table">
                                    
                                    <thead>
                                        <tr>
                                            <th>#sl </th>
                                            <th>Form Title </th>
                                            <th>To Title</th>
                                            <th width="100"><?php echo display('action');?></th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                        if(!empty($rr)){
                                        $sl = 1;
                                            foreach ($rr as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $sl++; ?></td>
                                                <td><?php echo html_escape(@$row->from_title); ?></td>
                                                <td><?php echo html_escape(@$row->to_title); ?></td>
                                                
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="editTitle('<?php echo $row->id?>')"><i class="fa fa-edit"></i></a>
                                                    <a onclick="linkDelete('<?php echo $row->id?>')" href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
           

    <input type="hidden" id="base_url" value="<?php echo base_url();?>">

    <!-- Modal -->
    <div class="modal fade" id="modal_form"  tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title font-weight-600" id="myModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php 
                    $attributes = array('id'=>'redirectForm');
                    echo form_open_multipart('#', $attributes);
                ?>
                    <div class="modal-body">

                        <div class="alert alert-warning">
                            <strong> <i class="fas fa-exclamation-triangle"></i></strong>
                            Note : You put here your post url title, Like this https://news365v3.bdtask.com/News365-HMVC-v6.3<u class="text-danger">/Lorem-Ipsum--is-simply</u>
                        </div>

                        <input type="hidden" value="" id='id' name="id"/> 
                        <input type="hidden" value="" id='actionurl' name="actionurl"/> 

                        <div class="form-body">
                            <div class="col-md-12 pr-md-1">
                                <div class="form-group pr-md-1">
                                    <label class="font-weight-600">From Url Title<span class="text-danger">*</span></label>
                                    <input name="from_title" id="from_title"  class="form-control" type="text" required="">
                                    <span>Like this: <u>/Lorem-Ipsum--is-simply</u></span>
                                </div>
                            </div>

                             <div class="col-md-12 pr-md-1">
                                <div class="form-group pr-md-1">
                                    <label class="font-weight-600">To Url Title<span class="text-danger">*</span></label>
                                    <input name="to_title" id="to_title" class="form-control" type="text" required="">
                                    <span>Like this: <u>/Lorem-Ipsum--is-simply</u></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="saveTitle()" class="btn btn-primary"><?php echo display('save')?></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo display('close')?></button>
                    </div>

                <?php echo form_close();?>
            </div>
        </div>
    </div>

<script type="text/javascript">


    function addTitle()
    {
        "use strict";
        var base_url = $('#base_url').val();
        var url = base_url+"news/redirection/save";
        $('#actionurl').val(url);
        $('#redirectForm')[0].reset(); 
        $('.form-group').removeClass('has-error'); 
        $('.help-block').empty(); 
        $('#modal_form').modal('show'); 
        $('.modal-title').text('Add new'); 
    }


    function editTitle(id)
    {
        "use strict";        
        $('#redirectForm')[0].reset(); 
        $('.form-group').removeClass('has-error'); 
        $('.help-block').empty(); 
        var base_url = $('#base_url').val();
        var url = base_url+"news/redirection/edit/"+id;
        //Ajax Load data from ajax
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
                $('[name="from_title"]').val(data.from_title);
                $('[name="to_title"]').val(data.to_title);

                $('#modal_form').modal('show'); 
                $('.modal-title').text('Edit'); 
                var urls = base_url+"news/redirection/save_update";

                $('#btnSave').text('Update');
                $('#actionurl').val(urls);

            },

            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }

        });

    }


    function saveTitle()
    {
        "use strict";

        $('#btnSave').text('saving...'); 
        $('#btnSave').attr('disabled',true);
        var url = $('#actionurl').val();
        var base_url = $('#base_url').val();
        var from_title = $('#from_title').val();
        var to_title = $('#to_title').val();

        if(from_title==='' && to_title ===''){
           toastr.warning('Please fill up al the fields');
           $('#modal_form').modal('hide'); 
           $('#btnSave').text('save');
           $('#btnSave').attr('disabled',false);
        }else{
       
            $.ajax({

                url : url,
                type: "POST",
                data: $('#redirectForm').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    
                    if(data.status=='1') 
                    {
                        $('#modal_form').modal('hide');
                        toastr.success('Update successful');
                        $("#table").load(location.href+" #table>*","");
                        $('#btnSave').text('save');
                        $('#btnSave').attr('disabled',false);
                    }else if(data.status=='0'){
                        toastr.warning('Please fill up al the fields');
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
    }



    function linkDelete(id)
    {
        "use strict";        
        var base_url = $('#base_url').val();
        var url = base_url+"news/redirection/delete/"+id;
        //Ajax Load data from ajax
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                if(data.status=='1') 
                {
                    $('#modal_form').modal('hide');
                    toastr.success('Update successful');
                    $("#table").load(location.href+" #table>*","");
                    $('#btnSave').attr('disabled',false);

                }else if(data.status=='0'){

                    toastr.warning('Please fill up al the fields');
                    $('#btnSave').text('save');
                    $('#btnSave').attr('disabled',false);

                }

            },

            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }

        });
    }
    
</script>