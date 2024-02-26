<?php 
    date_default_timezone_set($setting->time_zone);
    $ascurl = base_url().'application/views/themes/'.html_escape($default_theme).'/web-assets';
    
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
    $menu_slug = $this->uri->segment(1);
    $selected = 'active';
    
    $dynamic_color  = $this->db->where('theme_name',$default_theme)->get('theme_color_setup')->row();    
    $font_one = (@$dynamic_color->font_one?@$dynamic_color->font_one:'Alegreya+Sans');
    $font_two = (@$dynamic_color->font_two?@$dynamic_color->font_two:'Libre+Franklin');

    if(isset($seo_title) && !empty($seo_title)){
        $meta_title = @$seo_title;

    }elseif(isset($setting->website_title)){
        $meta_title = @$setting->website_title;
    }else{

        $meta_title = @$title;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News365 - News, Blog &amp; Magazine HTML Template</title>
    <link href="assets/images/favicon.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&family=Libre+Franklin:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- dynamic meta keywords and description -->
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

    <?php if(!empty($dynamic_color) && $dynamic_color->active_status==1){?>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=<?php echo @$font_one?>:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&family=<?php echo @$font_two?>:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <?php }else{?>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&family=Libre+Franklin:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <?php } ?>
    <!-- Favicon -->
    <title> <?php echo html_escape(@$meta_title);?></title>
    <link rel="shortcut icon" href="<?php echo base_url(). html_escape(@$setting->favicon);?>"/>

    <link href="<?php echo $ascurl; ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $ascurl; ?>/themify-icons/themify-icons.css" rel="stylesheet">

    <?php if($setting->speed_optimization==1){?>
        <!-- optimization css link -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/css/app.css?<?php echo version()?>">
    
    <?php } else{ ?>
        
        <link href="<?php echo $ascurl;?>/plugins/bootstrap-4.5.3/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
        <!-- <link href="<?php echo $ascurl;?>/plugins/bootstrap-5.3.0/css/bootstrap.rtl.min.css" rel="stylesheet"> -->

        <link href="<?php echo $ascurl;?>/css/animsition.min.css" rel="stylesheet">
        <link href="<?php echo $ascurl;?>/plugins/metismenu/dist/metisMenu.min.css" rel="stylesheet">
        <link href="<?php echo $ascurl;?>/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo $ascurl;?>/plugins/multilingual-calendar-date-picker/jquery.calendar.css" rel="stylesheet">
        <link href="<?php echo $ascurl;?>/css/style.css" rel="stylesheet">
        <link href="<?php echo $ascurl;?>/css/style-rtl.css?<?php echo version()?>" rel="stylesheet">

    <?php }  ?>
    <link href="<?php echo $ascurl; ?>/css/customcss.css?<?php echo version()?>" rel="stylesheet">

    <?php 
        if(!empty($dynamic_color) && $dynamic_color->active_status==1){
            $this->load->view('themes/'.$default_theme.'/style.php');
        }
    ?>
    
    <!-- analytics code -->
    <?php if(@$meta->google_analytics!=NULL){ ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo html_escape(@$meta->google_analytics)?>"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', '<?php echo html_escape(@$meta->google_analytics)?>');
        </script>
    <?php }?>

    <!-- for google add -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <script src="<?php echo $ascurl; ?>/js/jquery-3-6-4.min.js"></script>
    <!-- <script src="<?php echo $ascurl; ?>/js/jquery-3-6-4.min"></script> -->


</head>

<body>

    <input type="hidden" id="base_url" value="<?php echo base_url();?>">
    <?php 
        echo $this->load->view('themes/'.html_escape($default_theme).'/__modal.php');
    ?>