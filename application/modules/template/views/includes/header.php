        <?php 
            $id = $this->session->userdata('id');
            $u_p_n = $this->db->select('photo,name,email')->from('user_info')->where('id',$id)->get()->row();
            if(!empty($u_p_n->photo)){
                $img = base_url() . $u_p_n->photo;
            }else{
                $img = base_url('uploads/user/demo-pic.png');
            }
            $bu = base_url();
        ?>


                        <input type="hidden" id="segment1" value="<?php echo $this->uri->segment(1); ?>">
                        <input type="hidden" id="segment2" value="<?php echo $this->uri->segment(2); ?>">
                        <input type="hidden" id="segment3" value="<?php echo $this->uri->segment(3); ?>">


                        <div class="sidebar-toggle-icon" id="sidebarCollapse">
                            sidebar toggle<span></span>
                        </div><!--/.sidebar toggle icon-->

                        <div class="d-flex flex-grow-1">

                            <ul class="navbar-nav flex-row align-items-center ml-auto">

                                <?php if(@$message_autoupdate!=''){?>
                                    <a href="<?php echo base_url('dashboard/autoupdate')?>"><blink class="btn btn-sm btn-danger text-whait" style="display: block;"> <?php echo @$message_autoupdate ?></blink></a>&nbsp;&nbsp;&nbsp;
                                <?php }?>

                                <a href="<?php echo base_url()?>" target="__banck" class="btn btn-sm btn-success text-whait"><i class="fa fa-eye"></i>  <?php echo display('website')?></a> &nbsp;&nbsp;&nbsp;
                                
                                <li class="nav-item dropdown user-menu">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                        <i class="typcn typcn-user-add-outline"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" >
                                        <div class="dropdown-header d-sm-none">
                                            <a href="" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                                        </div>
                                        <div class="user-header">
                                            <div class="img-user">
                                                <img src="<?php echo html_escape($img)?>" alt="">
                                            </div><!-- img-user -->
                                            <h6><?php echo html_escape($u_p_n->name)?></h6>
                                            <span><?php echo html_escape($u_p_n->email)?></span>
                                        </div><!-- user-header -->
                                        <a href="<?php echo base_url(); ?>dashboard/profile" class="dropdown-item"><i class="typcn typcn-user-outline"></i><?php echo display('my_profile')?></a>
                                        <a href="<?php echo base_url(); ?>dashboard/profile/change_password" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> <?php echo display('password_change')?></a>
                                        <a href="<?php echo base_url(); ?>dashboard/auth/logout" class="dropdown-item"><i class="typcn typcn-key-outline"></i><?php echo display('sign_out')?></a>
                                    </div><!--/.dropdown-menu -->
                                </li>
                                
                            </ul><!--/.navbar nav-->

                            
                            <div class="nav-clock">
                                <div class="time">
                                    <span class="time-hours"></span>
                                    <span class="time-min"></span>
                                    <span class="time-sec"></span>
                                </div>
                            </div><!-- nav-clock -->
                        </div>




