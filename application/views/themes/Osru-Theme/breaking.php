<?php 
    $orgDate = date("Y-m-d");  
    $newDate = date("l, d M, Y", strtotime($orgDate)); 

    $CI =& get_instance();
    $CI->load->model('settings');
    $ot = json_decode($CI->settings->get_previous_settings('settings', 115));


?>
    <!-- /.End of Sign up  Sing in -->
    <div class="main-content animsition">
        <div class="top-header dark">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6 col-md-5">
                        <ul class="top-socia-share">
                            <li>
                                <span class="headre-weather"><i class="fa fa-calendar-check-o"></i>&nbsp; <?php echo $newDate;?></span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-6 col-md-7">
                        <div class="header-nav">
                            <ul>
                                <?php if($ot->contact_status=='1'){ ?>
                                    <li><a href="<?php echo base_url();?>contact/index"><?php echo display('contact')?></a></li>
                                <?php } ?>
                                
                                <?php if($this->session->userdata('user_type')==5){?>
                                    <li><a href="<?php echo base_url();?>users/user_profile"> <?php echo display('my_profile')?> </a></li>
                                    <li><a href="<?php echo base_url();?>signout/index"> <?php echo display('logout')?> </a></li>
                                <?php } else{ ?>
                                    <?php if(@$ot->reg_status=='1'){?>
                                        <li><a href="javascript:void(0)" data-toggle="modal" data-target="#user-modal2"><?php echo display('login')?>/<?php echo display('registration')?></a></li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>