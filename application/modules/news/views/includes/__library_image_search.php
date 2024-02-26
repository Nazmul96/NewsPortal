<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
    $settings = $this->db->get('app_settings')->row();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
        <meta name="author" content="Bdtask">
        <title><?php echo html_escape($settings->website_title);?></title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url().html_escape(@$settings->favicon);?>">
        <!--Global Styles(used by all pages)-->
        <link href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/plugins/toastr/toastr.css" rel="stylesheet">
        <!--Start Your Custom Style Now-->
        <link href="<?php echo base_url()?>assets/dist/css/style.css" rel="stylesheet">
        <script src="<?php echo base_url()?>assets/plugins/jQuery/jquery.min.js"></script>

    </head>

    <input type="hidden" id="base_url" value="<?php echo base_url()?>">
    <input type="hidden" id="imageLink" value="<?php echo imageLink()?>">


    <body class="fixed">

        <div class="wrapper">

            <!-- Page Content  -->
            <div class="content-wrapper">

                <div class="main-content">

                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['insert','image'])?></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <div class="alert alert-warning" role="alert">
                                            <strong>Note : </strong>
                                            Max upload size Depend on your server's bellow configuration. You should configure your server as your required  <span class="alert-link">max_execution_time, max_input_time,memory_limit, post_max_size and upload_max_filesize</span>.
                                        </div>

                                        <?php 
                                            $attributes = array('id'=>'imgfname','class'=>"needs-validation");
                                            echo form_open_multipart('backend/ajax_data/image_upload',$attributes);
                                        ?>

                                        
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <input type="hidden" id="base_url" value="<?php echo base_url()?>">
                                                       

                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <legend>Thumb Image Size</legend>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Height(Y)</label>
                                                                        <input type="number" name="thumb_h_y" value="280" class="form-control"/>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                       <label>Width(X):</label>
                                                                        <input type="number" name="thumb_w_x" value="400" class="form-control"/>     
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <legend>Large Image Size</legend>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Height(Y):</label>
                                                                       <input type="number" name="larg_h_y" value="451" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                       <label>Width(X):</label>
                                                                         <input type="number" name="larg_w_x" value="643" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                     
                                                        
                                                        <div class="col-lg-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label><?php echo display('title')?><span class="text-danger">*</span></label>
                                                                <input type="text" name="title" required  class="form-control"/>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-xs-12">
                                                            <div class="form-group ">
                                                                <label></label>
                                                                <button type="button" onClick="imagesUpload()" class="btn btn-success btn-s"> <?php echo makeString(['add','image'])?></button>
                                                            </div>
                                                        </div>

                                                </div>

                                                <div class="col-md-3">
                                                    <div class="col-lg-12 col-xs-12 ">
                                                        <div class="form-group">
                                                            <label><?php echo display('image')?></label>
                                                            <input type="file" accept="image/*" onchange="loadFile(event)" name="image" id="upimg" class="form-control"  required />
                                                            <img id="output" class="img-responsive img-thumbnail" width="257" height="100">
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        <?php echo form_close();?>

                                      
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['image','list'])?></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" id="readi">
                                        

                                        <?php echo form_open('backend/ajax_data/index',array('name' =>'fname', 'id'=>'SeForm' ));?>

                                            <div class="row form-group">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="image_name" id="image_name" placeholder="<?php echo display('search')?>">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-success" type="button" onClick="searchMform()"><?php echo display('search')?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php echo form_close();?>


                                        <div id="searchResult" >
                                            <?php
                                                $query = $this->db->query("SELECT actual_image_name,picture_name,title,image_base_url FROM photo_library where picture_name like '%%' order by id desc limit 0,100");
                                                foreach ($query->result_array() as $row) {
                                                    if($row['image_base_url']){
                                                        $imageurl = $row['image_base_url'];
                                                    }else{
                                                        $imageurl=base_url();
                                                    }
                                            ?>
                                            <img class="img-responsive img-thumbnail" src="<?php echo $imageurl; ?>uploads/thumb/<?php echo html_escape($row['actual_image_name']); ?>" height="100" width="100" onclick="sendValue('<?php echo html_escape($row['actual_image_name']); ?>,<?php echo html_escape($row['title']); ?>')" title="<?php echo html_escape($row['picture_name']); ?>" />
                                            <?php } ?>
                                        </div>
                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Global script(used by all pages)-->
        <script src="<?php echo base_url()?>assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/toastr/toastr.min.js"></script>
        <script src="<?php echo base_url()?>application/modules/news/assets/js/photo_uploadjs.js"></script>
        <!-- Third Party Scripts(used by this page)-->

    </body>
</html>