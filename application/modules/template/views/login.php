<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="<?php echo  html_escape($settings->website_title)?>">
        <meta name="author" content="Bdtask">
        <title><?php echo  html_escape($settings->website_title)?></title>
        <link rel="shortcut icon" href="<?php echo base_url(). html_escape($settings->favicon)?>">
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/dist/css/login.css" rel="stylesheet">

<style type="text/css">
.bottom-0 {
    bottom: -2px!important;
}
</style>

    </head>

    <body class="bg-white body-bg" >
        
        <!-- ========== MAIN CONTENT ========== -->
        <main class="register-content">

            <div class="bg-img-hero position-fixed top-0 right-0 left-0">
                
            </div>

            <!-- Content -->
            <div class="container py-5 py-sm-7">

                <a class="d-flex justify-content-center mb-5 news365-logo" href="<?php echo base_url('admin')?>">
                    <img class="z-index-2" src="<?php echo base_url().$settings->logo?>" alt="Image Description">
                </a>

                <div class="row justify-content-center">
                    
                    <div class="col-md-7 col-lg-5">


                    <?php if ($this->session->flashdata('message') != null) {  ?>
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div> 
                    <?php } ?>

                    
                    <?php if ($this->session->flashdata('exception') != null) {  ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $this->session->flashdata('exception'); ?>
                    </div>
                    <?php } ?>
                    
                   
                        <!-- Card -->
                        <div class="form-card mb-5">
                            <div class="form-card_body">
                                <!-- Form -->
                                <?php echo form_open('login','id="loginForm" novalidate'); ?>
                                    <div class="text-center">
                                        <div class="mb-5">
                                            <h1 class="display-4 mt-0 font-weight-semi-bold"><?php echo display('admin_login_header')?></h1>
                                            <p><?php echo display('admin_login_description')?></p>
                                        </div>
                                       </div>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label class="input-label font-weight-bold" for="signinSrEmail">Your email</label>
                                        <input type="email" class="form-control" id="signinSrEmail" tabindex="1" name="email" id="email" placeholder="<?php echo display('email') ?>" value="<?php echo @$user->email?>">
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label class="input-label font-weight-bold" for="signupSrPassword">Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control password" placeholder="<?php echo display('password') ?>" name="password" id="password" value="<?php echo @$user->password?>">
                                            <i class="fa fa-eye-slash"></i>
                                        </div>
                                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                                    </div>
                                    <!-- End Form Group -->


                                    <?php if($settings->captcha==1){?>
                                    <div class="form-group">
                                        <label class="control-label mb-4" for="captcha"><?php echo $captcha_image ?></label>

                                        <input type="captcha"  placeholder="<?php echo display('captcha') ?>" name="captcha" id="captcha" class="form-control" requierd> 
                                        <span class="text-danger"><?php echo form_error('captcha'); ?></span>
                                    </div> 
                                    <?php } ?>


                                    
                                    <!-- End Checkbox -->
                                    <button type="submit" class="btn btn-lg btn-block btn-success">Sign in</button>
                                <?php echo form_close()?>
                                <!-- End Form -->
                            </div>
                        </div>
                        <!-- End Card -->

                    </div>
                </div>
            </div>
            <!-- End Content -->
        </main>


        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/hideShowPassword.min.js"></script>
        <!-- Third Party Scripts(used by this page)-->

        <script type="text/javascript">
            // toggle password visibility
            $('.password + .fa').on('click', function () {
                $(this).toggleClass('fa-eye').toggleClass('fa-eye-slash'); // toggle our classes for the eye icon
                $('.password').togglePassword(); // activate the hideShowPassword plugin
            });
        </script>



    </body>
</html>