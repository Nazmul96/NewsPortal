<?php
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
    $archive_date = $this->input->get('date',TRUE);
    $CI =& get_instance();
    $CI->load->model('archive_model');   
?>

        
        <div class="page-outer-wrap">
            <div class="container">
                <div class="row page-content mt-5">
                    <main class="col-lg-8 col-xl-9 content p_r_40">
                        <div class="archive_area">

                            <?php if(empty($pages)){?>

                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <a href="" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong>
                                            <?php  echo $archive_date; ?> -> News not found</strong>
                                   </div>

                                   <h2 class="text-center">No stories found !!</h2>
                                </div>

                            <?php }else{?>

                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <a href="" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong>
                                            <?php  echo $archive_date; ?> -> Result Is</strong>
                                   </div>
                                </div>

                            <?php }?>

                            <div class="row">
                                <?php

                                for ($i = 1; $i <= 2; $i++) {
                                    if (!isset($pages['slug_' . $i]))
                                        continue;
                                    $news_data = $this->archive_model->get_ar_data($archive_date, $pages['slug_' . $i]);
                                ?>

                                    <div class="archive_inner">
                                        <h6 class="sec-title mb-3"><?php echo $pages['category_' . $i];?> <i class="fa fa-caret-right" aria-hidden="true"></i></h6>
                                        <ul>
                                            <?php foreach($news_data as $val){?>
                                                <li>
                                                    <a href="<?php echo base_url().$val->encode_title;?>" class="archive_link">
                                                        <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                                                        <span><?php echo $val->title;?></span>
                                                    </a>
                                                </li>
                                            <?php }?>
                                        </ul>
                                    </div>

                                <?php } ?>

                            </div>

                            <div class="row">
                                <?php

                                for ($i = 3; $i <= 4; $i++) {
                                    if (!isset($pages['slug_' . $i]))
                                        continue;
                                    $news_data = $this->archive_model->get_ar_data($archive_date, $pages['slug_' . $i]);
                                ?>

                                    <div class="archive_inner">
                                        <h6 class="sec-title mb-3"><?php echo $pages['category_' . $i];?> <i class="fa fa-caret-right" aria-hidden="true"></i></h6>
                                        <ul>
                                            <?php foreach($news_data as $val){?>
                                                <li>
                                                    <a href="<?php echo base_url().$val->encode_title;?>" class="archive_link">
                                                        <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                                                        <span><?php echo $val->title;?></span>
                                                    </a>
                                                </li>
                                            <?php }?>
                                        </ul>
                                    </div>

                                <?php } ?>

                            </div>

                       

                            <div class="row">
                                <?php

                                for ($i = 5; $i <= 6; $i++) {
                                    if (!isset($pages['slug_' . $i]))
                                        continue;
                                    $news_data = $this->archive_model->get_ar_data($archive_date, $pages['slug_' . $i]);
                                ?>

                                    <div class="archive_inner">
                                        <h6 class="sec-title mb-3"><?php echo $pages['category_' . $i];?> <i class="fa fa-caret-right" aria-hidden="true"></i></h6>
                                        <ul>
                                            <?php foreach($news_data as $val){?>
                                                <li>
                                                    <a href="<?php echo base_url().$val->encode_title;?>" class="archive_link">
                                                        <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                                                        <span><?php echo $val->title;?></span>
                                                    </a>
                                                </li>
                                            <?php }?>

                                            
                                        </ul>
                                    </div>

                                <?php } ?>

                            </div>

                            <div class="row">
                                <?php

                                for ($i = 7; $i <= 8; $i++) {
                                    if (!isset($pages['slug_' . $i]))
                                        continue;
                                    $news_data = $this->archive_model->get_ar_data($archive_date, $pages['slug_' . $i]);
                                ?>

                                    <div class="archive_inner">
                                        <h6 class="sec-title mb-3"><?php echo $pages['category_' . $i];?> <i class="fa fa-caret-right" aria-hidden="true"></i></h6>
                                        <ul>
                                            <?php foreach($news_data as $val){?>
                                                <li>
                                                    <a href="<?php echo base_url().$val->encode_title;?>" class="archive_link">
                                                        <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                                                        <span><?php echo $val->title;?></span>
                                                    </a>
                                                </li>
                                            <?php }?>

                                            
                                        </ul>
                                    </div>

                                <?php } ?>

                            </div>


                            <div class="row">
                                <?php

                                for ($i = 9; $i <= 10; $i++) {
                                    if (!isset($pages['slug_' . $i]))
                                        continue;
                                    $news_data = $this->archive_model->get_ar_data($archive_date, $pages['slug_' . $i]);
                                ?>

                                    <div class="archive_inner">
                                        <h6 class="sec-title mb-3"><?php echo $pages['category_' . $i];?> <i class="fa fa-caret-right" aria-hidden="true"></i></h6>
                                        <ul>
                                            
                                            <?php foreach($news_data as $val){?>
                                                <li>
                                                    <a href="<?php echo base_url().$val->encode_title;?>" class="archive_link">
                                                        <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                                                        <span><?php echo $val->title;?></span>
                                                    </a>
                                                </li>
                                            <?php }?>


                                        </ul>
                                    </div>

                                <?php } ?>

                            </div>
                        </div>


                    </main>

                        <aside class="col-lg-4 col-xl-3 rightSidebar show-lg">

                            <div class="">
                                <div class="sec-block mb-4">
                                    <a href="category.html" class="sec-title"><?php echo display('archive')?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                </div>

                                <div class="calendar_part">
                                    <div id="datepicker"></div>
                                </div>
                            </div>


                            <div class="mt-4 <?php echo (html_escape(@$lg_status_34)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_34)==0?'d-xs-none':'')?>">
                                <?php echo htmlspecialchars_decode(@$news_view_34); ?>  
                            </div>
                            
                            <div class="latest_post_widget mt-4">

                               <div class="sec-block mb-4">
                                    <a href="#" class="sec-title"><?php echo display('most_read'); ?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                </div>

                                <?php for($i=1; $i<=5; $i++){ 
                                    if (!isset($mr['news_title_'.$i]))
                                    continue;
                                ?>

                                <div class="media latest_post">

                                    <?php if(@$mr['image_check_' . $i]!=NULL){ ?>
                                        <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"  class="media-left">
                                            <?php echo @$mr['playbtn_'.$i]?>
                                            <img class="media-object" src="<?php echo html_escape(@$mr['image_thumb_' . $i]); ?>" alt="<?php echo html_escape(@$mr['image_alt_'.$i])?>" >
                                        </a>
                                    <?php } else{ ?>
                                        <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" class="media-left">
                                            <?php echo @$mr['playbtn_'.$i]?>
                                            <img class="media-object" src="<?php echo html_escape(@$mr['default_img_' . $i]); ?>" alt="<?php echo html_escape(@$mr['image_alt_'.$i])?>" >
                                        </a>
                                    <?php } ?>

                                    <div class="media-body">
                                        <h6 class="media-heading"><a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"><?php echo html_escape(@$mr['news_title_'.$i]);?></a></h6>
                                        <div class="entry-meta">
                                            <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$mr['post_date_as_'.$i]);?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>

                            <div class="<?php echo (html_escape(@$lg_status_35)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_35)==0?'d-xs-none':'')?>">
                                <?php echo htmlspecialchars_decode(@$news_view_35); ?>  
                            </div>

                            <div class="mt-4">
                                
                                <div class="sec-block mb-4">
                                    <a href="#" class="sec-title"><?php echo display('category')?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                </div>
                                <ul class="cat_list">
                                    <?php foreach($cat as $val){?>
                                        <li><a href="<?php echo base_url('category/').$val->slug?>/"><?php echo @$val->menu_lavel?> <span><?php echo @$val->total?></span></a></li>
                                    <?php }?>
                                </ul>

                            </div>

                        </aside>
                
                </div>
            </div>
        </div>

 
