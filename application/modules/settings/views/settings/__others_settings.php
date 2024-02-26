<?php
    $user_type = $this->session->userdata('user_type');
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('application/modules/dashboard/assets/css/style.css')?>">


    
                <div class="card mb-4">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['others','settings'])?> </h6>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">

                        <?php echo form_open_multipart('settings/others_settings/save_setting',array('id'=>'redirectForm'));?>
                            
                          

                                <div class="row" id="table">
                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <h5 class="font-weight-600">User Registration </h5>
                                        <p>User registration mail activation</p>
                                        <div class="toggle-example">
                                            <input type="checkbox" <?php echo (@$ot->reg_status==1?'checked':'')?> name="reg_status" id="testCk" data-toggle="toggle"  data-style="ios" onchange="setSettings()">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <h5 class="font-weight-600">Registration Email</h5>
                                        <p>Registration Mail Sending</p>
                                        <div class="toggle-example">
                                            <input type="checkbox" <?php echo (@$ot->reg_mail_status==1?'checked':'')?> name="reg_mail_status" data-toggle="toggle" data-style="ios" onchange="setSettings()">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <h5 class="font-weight-600">Contact Page</h5>
                                        <p>Contact page activation</p>
                                        <div class="toggle-example">
                                            <input type="checkbox" <?php echo (@$ot->contact_status==1?'checked':'')?> name="contact_status" data-toggle="toggle" data-style="ios" onchange="setSettings()">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <h5 class="font-weight-600">Contact Email</h5>
                                        <p>Contact Mail Sending</p>
                                        <div class="toggle-example">
                                            <input type="checkbox" <?php echo (@$ot->contact_mail_status==1?'checked':'')?> name="contact_mail_status" data-toggle="toggle" data-style="ios" onchange="setSettings()">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <h5 class="font-weight-600">Comments </h5>
                                        <p>Comments activation</p>
                                        <div class="toggle-example">
                                            <input type="checkbox" <?php echo (@$ot->comments_status==1?'checked':'')?> name="comments_status" data-toggle="toggle" data-style="ios" onchange="setSettings()">
                                        </div>
                                    </div>

                                </div>

                                <div class="row" id="table">
                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <h5 class="font-weight-600">Default image</h5>
                                        <p>Set default image for post</p>

                                        <div class="toggle-example">
                                            <input type="checkbox" <?php echo (@$ot->reg_status==1?'checked':'')?> name="reg_status" id="testCk" data-toggle="toggle"  data-style="ios" onchange="setSettings()">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">
                                            <strong> <i class="fas fa-exclamation-triangle"></i></strong>
                                           The page activation and email sending status here
                                        </div>
                                    </div>
                                </div>

                        <?php echo form_close();?>
                            
                    </div>



                </div>

    
                <div class="card mb-4">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Default image </h6>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">

                       
                        <?php echo form_open_multipart('settings/others_settings/defaultimag_set',array('id'=>'redirectForm'));?>
                            
                            <div class="card-body">

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label class="font-weight-600">Default post image</label>
                                        <input type="file" name="defaultimg" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label class="font-weight-600"><?php echo makeString(['preview'])?></label><br>
                                        <?php
                                            echo '<img src="' . base_url() . html_escape(@$dif->img) . '" width="200" >';
                                        ?>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div >
                                        <label></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-sm btn-success"> <?php echo display('update')?></button>
                                    </div>
                                </div> 
                                
                            </div>

                        <?php echo form_close();?>

                </div>




                <script>

                    function setSettings() {
                        "use strict";
                        var url = "<?php echo base_url()?>settings/others_settings/save_setting";
                        $.ajax({
                            url : url,
                            type: "POST",
                            data: $('#redirectForm').serialize(),
                            dataType: "JSON",
                            success: function(data)
                            {
                                if(data.status=='1') 
                                {
                                    toastr.success('Update successful');
                                }else{
                                    toastr.warning('Please fill up al the fields');
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

                </script>
           
