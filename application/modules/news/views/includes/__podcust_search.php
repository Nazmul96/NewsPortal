<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
    $settings = $this->db->get('app_settings')->row();
?>
<!doctype html>
<html lang="en">

    <head>
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
        <style>
            .page-loader-wrapper {
                background: #eeeeee40;
            }
        </style>
    </head>



    <input type="hidden" id="base_url" value="<?php echo base_url()?>">
    <input type="hidden" id="imageLink" value="<?php echo imageLink()?>">


    <body class="fixed">

        <!-- Page Loader -->
        <div class="page-loader-wrapper d-none" id="preloader1" >
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Uploading...</p>
            </div>
        </div>

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
                                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('upload')?></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                    <div class="alert alert-warning" role="alert">
                                        <strong>Note : </strong>
                                        Max upload size Depend on your server's bellow configuration. You should configure your server as your required  <span class="alert-link">max_execution_time, max_input_time,memory_limit, post_max_size and upload_max_filesize</span>.
                                    </div>

                                        <?php 
                                            $attributes = array('id'=>'podcustUpload','class'=>"needs-validation");
                                            echo form_open_multipart('backend/Podcust/podcustUpload',$attributes);
                                        ?>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="col-lg-12 col-xs-12 ">
                                                        <div class="form-group">
                                                            <label><?php echo makeString(['video','or','audio'])?><span class="text-danger">*</span></label>
                                                            <input type="file"  name="videos" id="upload" class="form-control"  required />
                                                            <div id="setPreview"></div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-8">
                                                    <input type="hidden" id="base_url" value="<?php echo base_url()?>">
                                                    <div class="col-lg-12 col-xs-12">
                                                        <div class="form-group">
                                                            <label><?php echo display('title')?><span class="text-danger">*</span></label>
                                                            <input type="text" name="title" required  class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-xs-12">
                                                        <div class="form-group ">
                                                            <label></label>
                                                            <button type="button" onClick="protcustUpload()" id="upload" class="btn btn-success btn-s"> <?php echo makeString(['upload'])?></button>
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
                                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['list'])?></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" id="readi">
                                        
                                        <?php echo form_open('backend/Podcust/podcastList',array('name' =>'fname', 'id'=>'SeForm' ));?>

                                            <div class="row form-group">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="filename" id="filename" placeholder="<?php echo display('search')?>">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-success" type="button" onClick="searchMform()"><?php echo display('search')?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php echo form_close();?>

                                        <div id="searchResult">
                                            <?php
                                                $query = $this->db->query("SELECT id,file_name,title,podcust_url FROM podcust_tbl  order by id desc limit 0,100");
                                                foreach ($query->result_array() as $row) {
                                            ?>
                                            <img class="img-responsive img-thumbnail" src="<?php echo base_url().$settings->logo; ?>" height="100" width="100" onclick="sendValue('<?php echo html_escape($row['id'])?>,<?php echo html_escape($row['file_name']); ?>')" />
                                            <span><?php echo html_escape($row['file_name'])?></span>
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
        <script src="<?php echo base_url()?>application/modules/news/assets/js/podcust_uploadjs.js?v=3.1"></script>
        <!-- Third Party Scripts(used by this page)-->

    </body>
</html>