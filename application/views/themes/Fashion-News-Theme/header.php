<?php 
    date_default_timezone_set($setting->time_zone);
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
    $menu_slug = $this->uri->segment(1);
    $selected = 'active';
    $dynamic_color  = $this->db->where('theme_name',$default_theme)->get('theme_color_setup')->row();    
    $font_one = (@$dynamic_color->font_one?@$dynamic_color->font_one:'Playfair Display');
    $font_two = (@$dynamic_color->font_two?@$dynamic_color->font_two:'Playfair Display');

    if(isset($seo_title)){
        $meta_title = $seo_title;
    }elseif(isset($setting->website_title)){
        $meta_title = $setting->website_title;
    }else{
        $meta_title = $title;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php if(@$postmeta!=NULL){ ?>  
            <meta name="keywords" content="<?php echo html_escape(@$postmeta->meta_keyword); ?>" />
            <meta name="description" content="<?php echo html_escape(@$postmeta->meta_description); ?>" />
        <?php } else { ?>
            <meta name="keywords" content="<?php echo html_escape(@$meta->meta_tag); ?>" />
            <meta name="description" content="<?php echo html_escape(@$meta->meta_description); ?>"/>
        <?php } ?>

        <?php 
            $this->load->helper('text');
            @$img_url = (is_file('uploads/'. @$image)) ? base_url().'uploads/' . @$image : base_url(). 'uploads/' . @$image;
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        ?>

        <!-- facebook meta -->
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo @$title; ?>" />
        <meta property="og:description" content="<?php echo strip_tags(word_limiter(@$news, 20)); ?>" />
        <meta property="og:url" content="<?php echo @$url; ?>" />
        <meta property="og:site_name" content="<?php echo @$settings->website_title;?>" />
        <meta property="article:author" content="<?php echo base_url(); ?>" />
        <meta property="og:image" content="<?php echo @$img_url; ?>" />
        <meta property="fb:app_id" content="493761004294417" />
        <meta property="og:image:secure_url" content="<?php echo @$img_url; ?>" />
        <meta property="og:image:width" content="760" />
        <meta property="og:image:height" content="420" />

        <!-- twitter meta -->
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:site" content="@<?php echo @$settings->website_title;?>"/>
        <meta name="twitter:creator" content="@admin"/>
        <meta name="twitter:title" content="<?php echo @$title; ?>"/>
        <meta name="twitter:description" content="<?php echo strip_tags(word_limiter(@$news, 20)); ?>"/>
        <meta name="twitter:image" content="<?php echo @$img_url; ?>"/>

        <link rel="canonical" href="<?php echo @$url; ?>" />


        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(). html_escape(@$setting->favicon);?>"/>
        <title> <?php echo html_escape(@$meta_title);?></title>


        <?php if(!empty($dynamic_color) && $dynamic_color->active_status==1){?>
        <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css?family=<?php echo @$font_one?>:100,100i,300,300i,400,400i,700,700i,900,900i|<?php echo @$font_two?>:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
        <?php }else{?>
            <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
        <?php } ?>
        
        
        <?php if($setting->speed_optimization==1){?>
            <!-- optimization css link -->
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/css/app.css?<?php echo version()?>">
        <?php } else{ ?>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->
        
        <!--metismenu-->
        <link href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/metismenu/metisMenu.min.css" rel="stylesheet" type="text/css"/>
        <!-- Owl Carousel css -->
        <link href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/OwlCarousel2/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/OwlCarousel2/assets/owl.theme.default.css" rel="stylesheet">
        <!-- youtube css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/css/RYPP.css" />
        <!--bootstrap datepicker-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/css/animate.min.css">
        <!-- comment css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/css/comments.css?<?php echo version()?>">
        <!--Pe-icon-7-stroke-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/css/Pe-icon-7-stroke.css" />
        <!-- custom css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/css/style.css?<?php echo version()?>">
        <!-- toastr css -->
        <link href="<?php echo base_url()?>assets/plugins/toastr/toastr.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>movi/highslide.css" />
       
        <?php } ?>

        <!-- font awesome -->
        <link href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/css/customcss.css?<?php echo version()?>" rel="stylesheet">
        
        <!-- dynamic css -->
        <?php 
            if(!empty($dynamic_color) && $dynamic_color->active_status==1){
                $this->load->view('themes/'.$default_theme.'/style.php');
            }
        ?>

        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/jquery/jquery-3-6-4.min.js"></script>
        

        <!-- analytics code -->
        <?php if(@$meta->google_analytics!=NULL){ ?>
            <!-- analytics code -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo html_escape(@$meta->google_analytics)?>"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', '<?php echo html_escape(@$meta->google_analytics)?>');
            </script>
        <?php }?>
        
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


    </head>


    <body>

        <?php if(@$setting->preloader_status=='1'){?>
            <div class="se-pre-con"></div>
        <?php }?>

        <input type="hidden" id="base_url" value="<?php echo base_url()?>">

        <?php if (@$social_page->fb && ($social_page->status=='1')) { ?>
            <div class="fb-script" id="remove">
                <?php $this->load->view('themes/'.html_escape($default_theme).'/__fbscript.php');?>
            </div>
        <?php } ?>


        <header>
            <!-- Mobile Menu Start -->
            <div class="mobile-menu-area navbar-fixed-top hidden-sm hidden-md hidden-lg">
                <nav class="mobile-menu" id="mobile-menu" data-image-src="<?php echo base_url() . html_escape(@$setting->mobile_menu_image) ?>">
                    <div class="sidebar-nav">
                        <ul id="metismenu" class="nav side-menu">
                            <li class="sidebar-search">
                                <?php $fa = array('method' =>'GET' ); echo form_open('search',$fa);?>
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="<?php echo display('search')?>..." name="q">
                                    <span class="input-group-btn">
                                        <button class="btn mobile-menu-btn" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                 <?php echo form_close();?>
                                <!-- /input-group -->
                            </li>
                            

                            <li class="active"><a href="<?php echo html_escape($bu) ?>" class="active"><?php echo display('home')?></a></li>
                            <?php
                                $i = 2;
                                foreach ($main_menu as $key => $value) {

                                    $num_rows1 = $this->db->select('*')->from('menu_content')->where('parents_id',$value->menu_content_id)->order_by('menu_position','ASC')->get()->result();

                                    if($value->slug!=NULL){
                                        $slug1 = $bu.'category/'.$value->slug;
                                    }elseif ($value->link_url!=NULL) {
                                        $slug1 = $value->link_url;
                                    }else{
                                        $slug1 = $bu."#";
                                    }

                                    if ($num_rows1) {
                                        echo '<li>';
                                        echo '<a  href="' . $slug1 . '">' . $value->menu_lavel . '<span class="fa arrow"></span></a>';
                                        echo '<ul class="nav nav-third-level">';
                                        foreach ($num_rows1 as $key1 => $value1) {

                                            if($value1->slug!=NULL){
                                                $slug2 = $bu.'category/'.$value1->slug;
                                            }elseif ($value1->link_url!=NULL) {
                                                $slug2 = $value1->link_url;
                                            }else{
                                                $slug2 = $bu."#";
                                            }

                                            echo' <li><a '.(($slug2 == $menu_slug) ? $selected : '').' href="' .  $slug2. '/">' . $value1->menu_lavel. '</a></li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        if(@$value->parents_id>0){

                                        }else{
                                            echo '<li> <a '.(($slug1 == $menu_slug) ? $selected : '').' href="' . html_escape($slug1) . '/">' . html_escape($value->menu_lavel) . '</a>';
                                        } 
                                    }
                                    echo '</li>';
                                }
                                ?>
                                
                        </ul>
                    </div>
                </nav>


                <div class="container">
                    
                    <div class="top_header_icon">
                        <span class="top_header_icon_wrap">
                            <a target="_blank" href="<?php if (isset($social_link->tw)) echo html_escape(@$social_link->tw); ?>" title="Twitter"><i class="fa fa-twitter"></i></a>
                        </span>
                        <span class="top_header_icon_wrap">
                            <a target="_blank" href="<?php if (isset($social_link->fb)) echo html_escape(@$social_link->fb); ?>" title="Facebook"><i class="fa fa-facebook"></i></a>
                        </span>
                        <span class="top_header_icon_wrap">
                            <a target="_blank" href="<?php if (isset($social_link->vimo)) echo html_escape(@$social_link->vimo); ?>" title="Vimeo"><i class="fa fa-vimeo"></i></a>
                        </span>
                        <span class="top_header_icon_wrap">
                            <a target="_blank" href="<?php if (isset($social_link->pin)) echo html_escape(@$social_link->pin); ?>" title="Pintereset"><i class="fa fa-pinterest-p"></i></a>
                        </span>
                    </div>

                    <div id="showLeft" class="nav-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu End -->


