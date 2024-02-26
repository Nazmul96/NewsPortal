<?php 
    $f_auth = $this->db->where('id',1)->where('status',1)->get('social_auth')->row();
    $g_auth = $this->db->where('id',2)->where('status',1)->get('social_auth')->row();
?>    
    <div class="modal" tabindex="-1" role="dialog" id="user-modal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">

                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <?php if($this->session->userdata('user_type')==5){?>
                                <li><a class="nav-item nav-link" href="<?php echo base_url();?>registration/sign_out"> <?php echo display('logout')?> </a></li>
                                <li><a class="nav-item nav-link" href="<?php echo base_url();?>users/user_profile"> <?php echo display('my_profile')?> </a></li>
                            <?php } else{ ?>
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo display('login')?></a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo display('registration')?></a>
                            <?php } ?>
                        </div>
                    </nav>

                    <div class="tab-content p-4" id="nav-tabContent">
                        
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            
                            <div class="text-center">
                                <h4><?php echo display('login')?></h4>
                                <p><?php echo display('login_to_your_account')?></p>
                                <div class="social-btn">
                                    <?php if(!empty($f_auth)){?>
                                        <a href="<?php echo $this->facebook->login_url(); ?>" class="btn btn-fb mb-2"><i class="fa fa-facebook"></i><?php echo display('login_with_facebook')?></a>
                                    <?php } ?>

                                    <?php if(!empty($g_auth)){?>
                                        <a href="<?php echo $login_url?>" class="btn btn-plush mb-2"><i class="fa fa-google-plus"></i><?php echo display('login_with_google')?></a>
                                    <?php } ?>
                                </div>
                            </div>

                            <?php echo form_open('User_login/login', 'class="cd-form" id="UserLogin"');?>
                                
                                <div class="form-group">
                                    <label for="Emailaddres"><?php echo display('email')?></label>
                                    <input type="email" class="form-control" name="email" id="Emailaddres">
                                </div>
                                <div class="form-group">
                                    <label for="psword"><?php echo display('password')?></label>
                                    <input type="password" class="form-control" name="password" id="psword">
                                </div>
                                <button type="submit" class="btn link-btn"><?php echo display('login')?> </button>
                            <?php echo form_close();?>
                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="text-center">
                                <h4><?php echo display('registration')?></h4>
                                <p><?php echo display('singin_for_free');?></p>
                            </div>
                            <?php echo form_open('User_login/registration', 'class="cd-form" id="SignUp"');?>
                                <div class="form-group">
                                    <label for="FullName"><?php echo display('full_name');?></label>
                                    <input type="text" class="form-control" name="name" id="FullName">
                                </div>
                                <div class="form-group">
                                    <label for="Email2"><?php echo display('email');?></label>
                                    <input type="email" class="form-control" name="email" id="Email2">
                                </div>
                                <div class="form-group">
                                    <label for="psword2"><?php echo display('password')?></label>
                                    <input type="password" class="form-control" name="pass" id="psword2">
                                </div>
                                <button type="submit" class="btn link-btn"><?php echo display('sign_up')?></button>
                            <?php echo form_close();?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


