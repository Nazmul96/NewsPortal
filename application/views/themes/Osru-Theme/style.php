<!--
    #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    #------------------------------------    
-->

<?php 

    // query dynamic css from theme color setup table
    $dcss  = $this->db->where('theme_name',$default_theme)->get('theme_color_setup')->row();

    $font_one = (@$dcss->font_one?@$dcss->font_one:'Alegreya+Sans');
    $font_two = (@$dcss->font_two?@$dcss->font_two:'Libre+Franklin');

    if ($font_one=='Lato') {
        $font_one = $font_one.', sans-serif';
    }
    if ($font_two=='Ubuntu') {
        $font_two = $font_two.', sans-serif';
    }
?>


<style type="text/css">

    body {
        font-size: 15px;
        transition: unset;
        font-family: <?php echo $font_two?>;
    }

    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
        font-family: <?php echo $font_two?>;
    }

    .post_details .details-header h2 {
        font-family: <?php echo $font_two?>;
    }

    .sec-title {
        font-family: <?php echo $font_two?>;
    }

    .mfp-title {
        font-family: <?php echo $font_two?>;
    }

    .dropdown-toggle.btn-search {
        background: <?php echo @$dcss->color_code;?>;
        color: #ffffff;
    }

    .post-cat a {
       background: <?php echo @$dcss->color_code;?>;
       color: #ffffff;
    }

    .mas-text .post-cat a {
        background: <?php echo @$dcss->color_code;?>;
        color: #fff;
    }

    .sec-title {
        color: <?php echo @$dcss->color_code;?>;
        font-family: <?php echo $font_two?>;
        font-size: 18px;
    }


    .btn-more {
        background: <?php echo @$dcss->color_code;?>;
        color: #fff;
        border: 1px solid <?php echo @$dcss->color_code;?>;
    }

    .link-btn:hover {
        background-color: <?php echo @$dcss->color_code;?>;
    }

    .link-btn {
        border: 2px solid <?php echo @$dcss->color_code;?>;
        
    }

    .btn:hover {
        text-decoration: none;
    }

    .btn-top {
        background: <?php echo @$dcss->color_code;?>;
        color: #fff;
    }

    .sidebar-search .btn-search, .search_box_wrapper .btn-search {
        color: #fff;
        background: <?php echo @$dcss->color_code;?>;
    }
    .search_box_wrapper .search_input {
        border: 1px solid <?php echo @$dcss->color_code;?>;
        height: 40px;
    }

    .ui-datepicker .ui-datepicker-header {
        background: <?php echo @$dcss->color_code;?>;
        color: #fff;
    }

    .ui-state-hover, .ui-widget-content .ui-state-hover {
        background: <?php echo @$dcss->color_code;?>;
        color: #fff;
        border: 1px solid <?php echo @$dcss->color_code;?>;
    }

    .ui-state-active, .ui-widget-content .ui-state-active, .ui-state-highlight, .ui-widget-content .ui-state-highlight {
        border: 1px solid <?php echo @$dcss->color_code;?>;
        background: <?php echo @$dcss->color_code;?>;
    }


    /*color code*/
    .comment-as .com-title, .reatting, .comment-box .comment-name .btn-com.active:hover,
    .btn-com.active:hover, .comment-box .comment-name a, .social ul li a,
    #form-dialog .nav-tabs > li > a:hover, #form-dialog .nav-tabs > li.active > a,
    #form-dialog .nav-tabs > li.active > a:focus, #form-dialog .nav-tabs > li.active > a:hover {
        color: <?php echo @$dcss->color_code;?>;
    }
    .dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover, .btn-com:hover,
    .btn-com.active, .block-title span{
        background-color: <?php echo @$dcss->color_code;?>;
    }

    .comment-body .form-control:focus, .btn-com:hover, .btn-com.active,
    #form-dialog .nav-tabs > li.active > a, #form-dialog .nav-tabs > li.active > a:focus,
    #form-dialog .nav-tabs > li.active > a:hover, .block-title,
    .form-inner .form-control:focus{
        border-color: <?php echo @$dcss->color_code;?> !important;
    }

    .menu_wrapper{
        background-color: <?php echo $dcss->menubg_color;?>;
    }

    .navbar-light .navbar-nav .nav-link {
        color: <?php echo @$dcss->menu_font_color;?>;
        font-family: <?php echo @$font_two;?>;
        font-size: <?php echo $dcss->menu_font_size;?>'px';
    }

    .navbar-light .navbar-nav .nav-link:hover{
        color: <?php echo @$dcss->menu_hover_color?>;
    }
    

</style>