<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
    <head>
         <?php $this->load->view('includes/head') ?>

         <style type="text/css">

                blink {
                    -webkit-animation: 2s linear infinite condemned_blink_effect; // for android
                    animation: 2s linear infinite condemned_blink_effect;
                }
                @-webkit-keyframes condemned_blink_effect { // for android
                    0% {
                        visibility: hidden;
                    }
                    50% {
                        visibility: hidden;
                    }
                    100% {
                        visibility: visible;
                    }
                }
                @keyframes condemned_blink_effect {
                    0% {
                        visibility: hidden;
                    }
                    50% {
                        visibility: hidden;
                    }
                    100% {
                        visibility: visible;
                    }
                }
         </style>
    </head>

    <body class="fixed">
        
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
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
                <p>Please wait...</p>
            </div>
        </div>


        <!-- #END# Page Loader -->
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav class="sidebar sidebar-bunker">
                <?php $this->load->view('includes/sidebar') ?>
            </nav>
            <!-- Page Content  -->
            <div class="content-wrapper">
                <div class="main-content">
                    <nav class="navbar-custom-menu navbar navbar-expand-lg m-0">
                       <?php $this->load->view('includes/header') ?>
                    </nav><!--/.navbar-->
                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
                    <!-- load messages -->
                    <?php $this->load->view('includes/messages') ?>
                    <!-- load custom page -->
                    <?php echo $this->load->view($module.'/'.$page) ?>
                    </div><!--/.body content-->
                </div><!--/.main content-->

                <footer class="footer-content">
                    <div class="footer-text d-flex align-items-center justify-content-between">
                        <div class="copy"><?php echo @$settings->copy_right?></div>
                    </div>
                </footer><!--/.footer content-->
                <div class="overlay"></div>
            </div><!--/.wrapper-->
        </div>
       
        <!-- Start Core Plugins-->
        <?php $this->load->view('includes/js') ?>

       
    </body>
</html>


