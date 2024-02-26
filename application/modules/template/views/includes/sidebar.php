        <?php 
            $id = $this->session->userdata('id');
            $u_p_n = $this->db->select('photo,name,email')->from('user_info')->where('id',$id)->get()->row();
            if(!empty($u_p_n->photo)){
                $img = base_url() . $u_p_n->photo;
            }else{
                $img = base_url('uploads/user/demo-pic.png');
            }
            $bu = base_url();
            $user_type = $this->session->userdata('user_type');
           
        ?>

        
                <div class="sidebar-header">
                    <a href="<?php echo base_url('dashboard/home')?>" class="logo">
                        <img src="<?php echo base_url()?><?php echo $settings->app_logo;?>" alt="">
                    </a>
                </div><!--/.sidebar header-->

                <div class="profile-element d-flex align-items-center flex-shrink-0">
                    <div class="avatar online">
                        <img src="<?php echo html_escape(@$img);?>" class="img-fluid rounded-circle" alt="">
                    </div>
                    <div class="profile-text">
                        <h6 class="m-0"><?php echo html_escape(@$u_p_n->name)?></h6>
                        <span><?php echo html_escape(@$u_p_n->email)?></span>
                    </div>
                </div><!--/.profile element-->



                <div class="sidebar-body">
                    
                    <nav class="sidebar-nav">
                        
                        <ul class="metismenu">
                            <li class="nav-label"></li>

                            <li class="home">
                                <a href="<?php echo base_url('dashboard/home');?>"> 
                                    <i class="fas fa-tachometer-alt mr-2"></i> 
                                    <?php echo display('dashboard')?>
                                </a>
                            <li>

                            
                            <!-- *************************************
                            **********STATS OF CUSTOM MODULES*********
                            ************************************* -->
                            <?php  
                            $path = 'application/modules/';
                            $map  = directory_map($path);
                            $HmvcMenu   = array();
                            if (is_array($map) && sizeof($map) > 0)
                            foreach ($map as $key => $value) {
                                $menu = str_replace("\\", '/', $path.$key.'config/menu.php'); 
                                if (file_exists($menu)) {
                                    @include($menu);
                                }  
                            } 


                            if(isset($HmvcMenu) && $HmvcMenu!=null && sizeof($HmvcMenu) > 0)
                            foreach ($HmvcMenu as $moduleName => $moduleData) {

                            // check module permission 
                            if ($this->permission->module($moduleName)->access()) {


                            ?>
                                    <li class="<?php echo (($this->uri->segment(1)==$moduleName)?"mm-active":null) ?>">

                                        <a href="#" class="has-arrow material-ripple">
                                            <?php echo (($moduleData['icon']!=null)?$moduleData['icon']:null) ?>  <?php echo display($moduleName) ?>
                                            
                                        </a> 


                                        <ul class="nav-second-level">
                                            
                                            <?php foreach ($moduleData as $groupLabel => $label) {  ?>

                                                <?php   
                                                if ($groupLabel!='icon') 
                                                if ((isset($label['controller']) && $label['controller']!=null) && ($label['method']!=null)) {
                                                    if ($this->permission->method($moduleName,$label['permission'])->access()) {
                                                    
                                                ?> 
                                                    <!-- single level menu/link -->
                                                    <li>
                                                        <a href="<?php echo base_url($moduleName."/".$label['controller']."/".$label['method']) ?>"><?php echo display($groupLabel) ?></a>
                                                    </li>

                                                <?php 
                                                    } 
                                                } else { 
                                                ?>

                                                    <!-- multilevel menu/link -->
                                                    <!-- extract $label to compare with segment -->
                                                    <?php foreach ($label as $url) ?>
                                                    <li class="<?php echo (($this->uri->segment(2)==$url['controller'])?"active":null) ?>">
                                                        <a href="#"><?php echo display($groupLabel) ?>
                                                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                                                        </a>

                                                        <ul class="treeview-menu <?php echo (($this->uri->segment(2)==$url['controller'])?"menu-open":null) ?>"> 
                                                        <?php 
                                                            foreach ($label as $name => $value) {
                                                                if ($this->permission->method($moduleName,$value['permission'])->access()) {  
                                                        ?>
                                                                <li class="<?php echo (($this->uri->segment(3)==$value['method'])?"active":null) ?>"><a href="<?php echo base_url($moduleName."/".$value['controller']."/".$value['method']) ?>"><?php echo display($name) ?></a></li>
                                                        <?php 
                                                                } //endif
                                                            } //endforeach
                                                        ?> 
                                                        </ul>
                                                    </li> 

                                                <!-- endif -->
                                                <?php } ?>
                                            <!-- endforeach -->
                                            <?php } ?>
                                        </ul>
                                    </li> 

                                    
                                <!-- end if -->
                                <?php } ?>
                            <!-- end foreach -->
                            <?php } ?> 


                            <?php if(@$user_type==3){?>


                                <li class="autoupdate">
                                    <a href="<?php echo base_url('dashboard/autoupdate');?>"> 
                                        <i class='fas fa-sync mr-2'></i>
                                        <?php echo display('autoupdate')?>
                                    </a>
                                <li>

                                
                                <li class="role">
                                    <a class="has-arrow material-ripple " href="#">
                                        <i class="fas fa-wheelchair mr-2"></i>
                                        <?php echo display('role')?>
                                    </a>
                                    <ul class="nav-second-level  role-mm">
                                            <li><a href="<?php echo base_url('dashboard/role/create_system_role') ?>"><?php echo display('add_role')?></a></li>
                                            <li><a href="<?php echo base_url('dashboard/role/role_list') ?>"><?php echo display('role_list')?></a></li>
                                            <li><a href="<?php echo base_url('dashboard/role/user_access_role') ?>"><?php echo display('user_access_role')?></a></li> 
                                    </ul>
                                </li>

                                <li class="theme">
                                    <a href="<?php echo base_url('addon/theme');?>"> 
                                        <i class='typcn typcn-device-laptop mr-2'></i>
                                        <?php echo display('theme')?>
                                    </a>
                                <li>

                                <li class="module">
                                    <a href="<?php echo base_url('addon/module');?>"> 
                                        <i class="fas fa-universal-access mr-2"></i> 
                                        <?php echo display('module')?>
                                    </a>
                                <li>


                            <?php } ?> 

                            
                            <!-- *************************************
                            **********ENDS OF CUSTOM MODULES*********
                            ************************************* -->

                        </ul>
                    </nav>
                </div><!-- sidebar-body -->