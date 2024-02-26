<?php 
    $ascurl = base_url().'application/views/themes/'.html_escape($default_theme).'/web-assets';
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
    $menu_slug = $this->uri->segment(2);
    if(isset($menu_slug)){
        $selected = 'selected';
    }else{
        $selecte = 'selected';
    }
?>

<style type="text/css">
    .selected{
        color: #035fa0 !important;
    }
</style>




        <header class="mainHeader">
            <div class="logo-wrapper">
                <div class="container">
                    <div class="row mx-0 align-items-center justify-content-between">  
                        
                    
                        <div class="col-md-4 col-6">
                            <div class="align-items-center d-flex">
                                
                                <div class="sidebar-toggle-btn mmenu_icon">
                                    <button type="button" id="sidebarCollapse" class="btn lh-1 me-2">                                
                                        <i class="ti-menu"></i>
                                    </button>
                                </div>

                                <div class="header-logo text-start d-block">
                                    <a href="<?php echo base_url()?>" class="logo-img">
                                        <img src="<?php echo base_url().html_escape(@$setting->logo)?>" alt="">
                                    </a>
                                </div>
                            
                            </div>
                        </div>

                        <div class="col-md-8 col-6">
                            <div class="banner_area <?php echo (html_escape(@$lg_status_11)==0?'hidden-lg hidden-md':'')?> 
                            <?php echo (html_escape(@$sm_status_11)==0?'hidden-xs hidden-sm':'')?>">
                                <?php
                                    if(isset($home_11) && !empty($home_11))
                                        echo htmlspecialchars_decode(@$home_11); 
                                ?>
                            </div>

                            <div class="mmenu_icon sidebar-toggle-btn text-end">
                                <button type="button" id="sidebarSearch" class="btn">
                                    <i class="ti-search"></i>
                                </button>
                            </div>

                        </div>


                    </div>
                </div>
            </div>


            <nav class="sidebar-nav">
                <div class="dismiss">
                    <i class="ti-close"></i>
                </div>
                <ul class="metismenu list-unstyled" id="mobile-menu">
                    <li><a href="<?php echo base_url()?>"><?php echo display('home')?></a></li>

                    <?php
                    $i = 2;
                    foreach (@$main_menu as $key => $value) {

                        $num_rows1 = $this->db->select('*')->from('menu_content')->where('parents_id',$value->menu_content_id)->order_by('menu_position','ASC')->get()->result();
                    
                        if($value->slug!=NULL){
                            $slug1 = $bu.'category/'.$value->slug;
                        }elseif ($value->link_url!=NULL) {
                            $slug1 = $value->link_url;
                        }else{
                            $slug1 = $bu."#";
                        }

                        if ($num_rows1) {
                            echo '<li >';
                            echo '<a  href="' . $slug1 . '" aria-expanded="false">' . $value->menu_lavel . '<span class="fa arrow"></span></a>';
                            echo '<ul aria-expanded="false">';
                            foreach ($num_rows1 as $key1 => $value1) {
                                if($value1->slug!=NULL){
                                    $slug2 = $bu.'category/'.$value1->slug;
                                }elseif ($value1->link_url!=NULL) {
                                    $slug2 = $value1->link_url;
                                }else{
                                    $slug2 = $bu."#";
                                }
                                echo' <li class="'.(($value1->slug == $menu_slug) ? @$selected : '').'"><a  href="' . $slug2. '/">' . $value1->menu_lavel . '</a></li>';
                            }
                            echo '</ul>';
                        } else {
                            
                            if(@$value->parents_id>0){

                            }else{
                                echo '<li class="'.(($value->slug == $menu_slug) ? @$selected : '').'"> <a  href="' . $slug1 . '/" class="">' . html_escape($value->menu_lavel) . '</a>';
                            }            
                        }
                        echo '</li>';
                    }
                    ?>


                  
                </ul>


                <div class="latest_post_widget">
                    <div class="sec-block mb-4">
                        <a href="category.html" class="sec-title"><?php echo display('most_read'); ?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>

                    <?php for($i=1; $i<=5; $i++){ 
                        if (!isset($mr['news_title_'.$i]))
                        continue;
                    ?>

                    <div class="media latest_post">
                        <?php if(@$mr['image_check_' . $i]!=NULL){?>
                             <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"  class="media-left"><img class="media-object" src="<?php echo html_escape(@$mr['image_thumb_' . $i]); ?>" alt="<?php echo html_escape(@$mr['image_alt_'.$i])?>" ></a>
                        <?php } else{?>
                            <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" class="media-left">
                                <img  src="http://img.youtube.com/vi/<?php echo html_escape(@$mr['video_' . $i]); ?>/0.jpg"  class="media-object">
                           </a>
                        <?php }?>

                        <div class="media-body">
                            <h6 class="media-heading"><a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"><?php echo html_escape(@$mr['news_title_'.$i]);?></a></h6>
                            <div class="entry-meta">
                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$mr['ptime_'.$i]);?></span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </nav>


            <div class="sidebar-search">
                <div class="dismiss">
                    <i class="ti-close"></i>
                </div>
                <div class="container">
                    <h5 class="mt-5"><?php echo display('search')?></h5>
                    <?php
                    $fa = array('method' =>'GET' ); 
                    echo form_open('search',$fa);?>

                    <div class="input-group mt-4">
                        <input type="text" class="form-control search_input"  placeholder="<?php echo display('search')?>" name="q">
                        <div class="input-group-append">
                            <button class="btn btn-search d-flex align-items-center" type="submit">
                                <i id="btn-search2" class="icons ti-search"></i> <span><?php echo display('search')?></span>
                            </button>
                        </div>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>



            <div class="menu_wrapper menuBar">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">

                            <ul class="navbar-nav">
                                <li class='nav-item'><a class="nav-link" href="<?php echo base_url()?>"><?php echo display('home')?></a></li>

                    <?php
                    $i = 2;
                    foreach (@$main_menu as $key => $value) {

                        $num_rows1 = $this->db->select('*')->from('menu_content')->where('parents_id',$value->menu_content_id)->order_by('menu_position','ASC')->get()->result();
                    
                        if($value->slug!=NULL){
                            $slug1 = $bu.'category/'.$value->slug;
                        }elseif ($value->link_url!=NULL) {
                            $slug1 = $value->link_url;
                        }else{
                            $slug1 = $bu."#";
                        }

                        if ($num_rows1) {
                            echo '<li class="nav-item dropdown" >';
                            echo '<a  href="' . $slug1 . '" class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $value->menu_lavel . '</a>';
                            echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
                            foreach ($num_rows1 as $key1 => $value1) {
                                if($value1->slug!=NULL){
                                    $slug2 = $bu.'category/'.$value1->slug;
                                }elseif ($value1->link_url!=NULL) {
                                    $slug2 = $value1->link_url;
                                }else{
                                    $slug2 = $bu."#";
                                }
                                echo' <li class="'.(($value1->slug == $menu_slug) ? @$selected : '').'"><a class="dropdown-item" href="' . $slug2. '/">' . $value1->menu_lavel . '</a></li>';
                            }
                            echo '</ul>';
                        } else {
                            
                            if(@$value->parents_id>0){

                            }else{
                                echo '<li class="nav-item "> <a  href="' . $slug1 . '/" class="nav-link '.(($value->slug == $menu_slug) ? @$selected : '').'">' . html_escape($value->menu_lavel) . '</a>';
                            }            
                        }
                        echo '</li>';
                    }
                    ?>



                            </ul>
                            <ul class="navbar-nav">
                                <li class="btn-group">
                                    <button type="button" class="btn dropdown-toggle btn-search" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i id="btn-search1" class="icons ti-search"></i>
                                    </button>
                                    <?php
                                    $fa = array('method' =>'GET' ); 
                                    echo form_open('search',$fa);?>
                                    <div class="dropdown-menu search_box_wrapper">
                                        <div class="input-group">
                                            <input type="text" class="form-control search_input"  placeholder="<?php echo display('search')?>" name="q">
                                            <div class="input-group-append">
                                                <button class="btn btn-search d-flex" type="submit">
                                                    <i id="btn-search2" class="icons ti-search"></i> <?php echo display('search')?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close();?>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header> 
