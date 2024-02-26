<?php
    $this->load->helper('text');
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
?>

        <!-- header news Area
            ============================================ -->
        <section class="headding-news">
            <div class="container">
                <div class="row row-margin">


                    <div class="col-sm-12 col-padding">
                     <?php if(@$hn['news_title_1']!=NULL){?>
                        <div class="post-wrapper post-grid-3 wow fadeIn" data-wow-duration="2s">
                            
                            <div class="img-zoom-in">
                                <?php if(@$hn['image_check_1']!=NULL){?>
                                <a href="<?php echo html_escape(@$hn['news_link_1']);?>">
                                    <img class="entry-thumb-middle" src="<?php echo html_escape(@$hn['image_large_1']);?>" alt="<?php echo  html_escape(@$hn['image_alt_1']) ?>">
                                </a>
                                <?php } else{ ?>
                                    <a href="<?php echo html_escape(@$hn['news_link_1']);?>" rel="bookmark">
                                        <img  src="http://img.youtube.com/vi/<?php echo html_escape(@$hn['video_1']);?>/0.jpg" alt="" class="entry-thumb-middle">
                                    </a>
                                <?php } ?>
                            </div>

                            <div class="post-info">
                                <span class="color-4"><a href="<?php echo html_escape(@$hn['category_link_1'])?>"><?php echo html_escape(@$hn['category_name_1']);?></a></span>
                                <h3 class="post-title"><a href="<?php echo html_escape(@$hn['news_link_1']);?>" rel="bookmark"><?php echo html_escape(@$hn['news_title_1']);?> </a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> <?php echo html_escape(@$hn['post_date_as_1']); ?>
                                    </div>
                                    <!-- post comment -->
                                    <!-- read more -->
                                <?php if(@$hn['video_'.$i]!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo html_escape(@$hn['news_link_1']);?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                 <a class="readmore pull-right" href="<?php echo html_escape(@$hn['news_link_1']);?>"><i class="pe-7s-angle-right"></i></a>
                                 <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>

                    
                </div>
        
            </div>
        </section>
        <!-- Latest news Area
            ============================================ -->
        <section class="article-post-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">

                    <div class="banner <?php echo (html_escape(@$lg_status_12)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_12)==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo htmlspecialchars_decode(@$home_12); ?>
                    </div> 

                    <?php
                        if (@$home_page_positions[1]['status'] == 1) {
                    ?>

                        <div class="articale-list">
                            <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[1]['cat_name']); ?></h3>
                            <div class="headding-border"></div>

                            <?php 
                                for($i=1; $i<=5; $i++){
                                if(!isset($pn['position_1']['news_title_'.$i]))
                                continue
                            ?>
                            <!--Post list-->
                            <div class="post-style2 wow fadeIn" data-wow-duration="1s">

                                <?php
                                    if (@$pn['position_1']['image_check_'.$i]!=NULL) {
                                    echo' <a href="'.html_escape(@$pn['position_1']['news_link_'.$i]).'">
                                                <img  src="'. html_escape(@$pn['position_1']['image_thumb_'.$i]).'" alt="">
                                            </a>';
                                    } else {
                                        echo '<a href="'.html_escape(@$pn['position_1']['news_link_'.$i]).'">
                                        <img width="100%" src="http://img.youtube.com/vi/' . html_escape(@$pn['position_1']['video_' . $i]) . '/0.jpg" alt="photography" /></a>';
                                    }
                                ?>

                                

                                <div class="post-style2-detail">
                                    <h3><a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>" title="">
                                        <?php echo html_escape(@$pn['position_1']['news_title_'.$i]); ?>
                                    </a></h3>
                                    <div class="date">
                                        <ul>
                                            <li><img src="<?php echo html_escape(@$pn['position_1']['post_by_image_'.$i])?>" class="img-responsive" alt=""></li>
                                            <li><?php echo display('by')?> <a title="" href="<?php echo html_escape(@$pn['position_1']['author_profile_'.$i]); ?>"><span><?php echo html_escape(@$pn['position_1']['post_by_name_'.$i]); ?></span></a> --</li>
                                            <li><a title="" href="#"><?php echo html_escape(@$pn['position_1']['post_date_as_'.$i]); ?></a></li>
                                        </ul>
                                    </div>
                                    <p><?php echo htmlspecialchars_decode(@$pn['position_1']['short_news_'.$i]); ?></p>
                                    <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>" class="btn btn-style"><?php echo display('read_more')?></a>
                                </div>
                            </div>

                            <?php } ?>
                            
                        </div>
                        <?php } ?>

                         

                    </div>

                    <div class="col-sm-4 left-padding">

                        <?php $fa = array('method' =>'GET' ); echo form_open('search',$fa);?>
                            <div class="input-group search-area"> <!-- search area -->
                                <input type="text" class="form-control" placeholder="<?php echo display('search')?>" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div> <!-- /.search area -->
                        <?php echo form_close();?>


                        <div class="banner-add <?php echo (html_escape(@$lg_status_14)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_14)==0?'hidden-xs hidden-sm':'')?>">
                            <!-- add -->
                            <?php echo htmlspecialchars_decode(@$home_14); ?>
                        </div>


                        
                        <!-- slider widget -->
                        <div class="widget-slider-inner">
                            <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[6]['cat_name']); ?></h3>
                            <div class="headding-border"></div>
                            <div id="widget-slider" class="owl-carousel owl-theme">
                                <!-- widget item -->

                                <?php 
                                   for($i=1;$i<=3;$i++){
                                    if(!isset($pn['position_6']['news_title_'.$i]))
                                    continue

                                    ?>
                                        <div class="item">
                                            <a href="<?php echo html_escape(@@$pn['position_6']['news_link_'.$i])?>">
                                            <?php
                                                if (@@$pn['position_6']['image_check_'.$i]!=NULL) {
                                                      echo'<img  src="'. html_escape(@@$pn['position_6']['image_thumb_'.$i]).'" alt="">';
                                                    } else {
                                                      echo'<img  class="img-responsive"  src="http://img.youtube.com/vi/'.html_escape(@@$pn['position_6']['video_'.$i]).'/0.jpg" alt="photography" />';
                                                    }
                                                ?>
                                            </a>
                                            <h4><a href="<?php echo html_escape(@@$pn['position_6']['news_link_'.$i])?>"><?php echo html_escape(@@$pn['position_6']['news_title_'.$i])?></a></h4>
                                            <div class="date">
                                                <ul>
                                                    <li><?php echo display('by')?><a title="" href="<?php echo html_escape(@$pn['position_1']['author_profile_'.$i]); ?>"><span><?php echo html_escape(@@$pn['position_6']['post_by_name_'.$i])?></span></a> --</li>
                                                    <li><a title="" href="#"><?php echo html_escape(@$pn['position_6']['post_date_as_'.$i]); ?></a></li>
                                                </ul>
                                            </div>
                                            
                                            <?php 
                                                @$news_details = @@$pn['position_6']['full_news_'.$i];
                                                $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                                echo htmlspecialchars_decode($exploded);
                                            ?>
                                        </div>
                                    <?php } ?>

                            </div>
                        </div>


                        <div class="banner-add">
                            <h3 class="category-headding "><?php echo display('social_pixel')?></h3>
                            <div class="headding-border"></div>
                            <div class="ssm">
                                <?php if (@$social_page->fb) { ?>
                                        <div class="fb-page" data-href="<?php echo html_escape(@$social_page->fb);?>/" data-tabs="timeline" data-width="" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                        <blockquote cite="<?php echo html_escape(@$social_page->fb);?>/" class="fb-xfbml-parse-ignore">
                                <?php }?>
                            </div>
                        </div>
                        <br><br>

                    </div>
                </div>
            </div>
        </section>


        
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="banner <?php echo (html_escape(@$lg_status_13)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_13)==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo htmlspecialchars_decode(@$home_13); ?>
                    </div>

                <?php
                    if (@$home_page_positions[2]['status'] == 1) {
                ?>
                    <section class="recent_news_inner">
                        <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[2]['cat_name']); ?></h3>
                        <div class="headding-border"></div>
                        <div class="row">
                            <div id="content-slide" class="owl-carousel">

                            <?php 
                                for($i=1;$i<=6;$i++){
                                    if(!isset($pn['position_2']['news_title_'.$i]))
                                        continue
                            ?>

                                <!-- item-1 -->
                                <div class="item home2-post">
                                    <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                        <!-- image -->
                                        <div class="post-thumb">

                                            <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>">
                                                <?php
                                                    if (@$pn['position_2']['image_check_'.$i]!=NULL) {
                                                        echo'<img class="img-responsive" src="'. html_escape($pn['position_2']['image_thumb_'.$i]).'" alt="">';
                                                    } else {
                                                        echo '<img width="100%" src="http://img.youtube.com/vi/' . html_escape(@$pn['position_2']['video_' . $i]) . '/0.jpg" alt="photography" />';
                                                    }
                                                ?>

                                            </a>
                                        </div>
                                        
                                    </div>
                                    <h3><a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_2']['news_title_'.$i]); ?></a></h3>
                                    <div class="post-title-author-details">
                                        <div class="date">
                                            <ul>
                                                <li><?php echo display('by')?> <a title="" href="<?php echo html_escape(@$pn['position_2']['author_profile_'.$i]); ?>"><span><?php echo html_escape(@$pn['position_2']['post_by_name_'.$i]); ?></span></a> --</li>
                                                <li><a title="" href="#"><?php echo html_escape(@$pn['position_2']['post_date_as_'.$i]); ?></a> </li>
                                            </ul>
                                        </div>
                                        <?php echo htmlspecialchars_decode(@$pn['position_2']['short_news_'.$i]); ?> <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>"><?php echo display('read_more')?></a>
                                    </div>
                                </div>

                            <?php } ?>
                                
                            </div>
                        </div>
                    </section>
                <?php }?>
                    <!-- Politics Area
                        ============================================ -->
                    <section class="politics_wrapper">

                    <?php if(@$home_page_positions[3]['status']==1){ ?>

                        <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[3]['cat_name']);?></h3>
                        <div class="headding-border"></div>
                        <div class="row">
                            <div id="content-slide-2" class="owl-carousel">
                                <!-- item-1 -->
                                <div class="item">
                                    <div class="row">
                                        <!-- main post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="home2-post">
                                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                    <!-- post image -->
                                                    <div class="post-thumb">
                                                        <a href="<?php echo html_escape(@$pn['position_3']['news_link_1'])?>">
                                                            <?php
                                                                if (@$pn['position_3']['image_check_1']) {
                                                                  echo'<img class="img-responsive" src="'.html_escape(@$pn['position_3']['image_thumb_1']).'" alt="">';
                                                                } else {
                                                                    echo '<img  class="img-responsive"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_3']['video_1']) . '/0.jpg" alt="photography" />';
                                                                }
                                                            ?>

                                                        </a>
                                                    </div>
                                                    <!-- post title -->
                                                    <h3><a href="<?php echo html_escape(@$pn['position_3']['news_link_1'])?>">
                                                        <?php echo html_escape(@$pn['position_3']['news_title_1'])?></a></h3>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <div class="date">
                                                        <ul>
                                                            <li><?php echo display('by')?> <a title="" href="<?php echo html_escape(@$pn['position_3']['author_profile_1']); ?>"><span><?php echo html_escape(@$pn['position_3']['post_by_name_1'])?></span></a> --</li>
                                                            <li><a title="" href="#"><?php echo html_escape(@$pn['position_3']['ptime_1'])?></a> </li>
                                                        </ul>
                                                    </div>
                                                    <?php echo htmlspecialchars_decode(@$pn['position_3']['short_news_1'])?>
                                                    <a href="<?php echo html_escape(@$pn['position_3']['news_link_1'])?>"><?php echo display('read_more')?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">

                                                <?php 
                                                 for($i=2;$i<=5;$i++){
                                                    if(!isset($pn['position_3']['news_title_'.$i]))
                                                    continue
                                                ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <div class="home2-post">
                                                        <!-- post image -->
                                                        <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                        
                                                            <a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>">
                                                                <?php
                                                                    if (@$pn['position_3']['image_check_'.$i]) {
                                                                      echo'<img class="img-responsive" src="'.html_escape(@$pn['position_3']['image_thumb_'.$i]).'" alt=""  height="70" width="100">';
                                                                    } else {
                                                                        echo '<img  class="img-responsive"  height="70" width="100"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_3']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                                    }
                                                                ?>
                                                            </a>
                                                        </div>
                                                        <div class="post-title-author-details">
                                                            <!-- post image -->
                                                            <h5><a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>">
                                                                <?php echo html_escape(@$pn['position_3']['news_title_'.$i])?></a></h5>
                                                            <div class="date">
                                                                <ul>
                                                                    <li><a title="" href="<?php echo html_escape(@$pn['position_3']['author_profile_'.$i]); ?>"><span><?php echo html_escape(@$pn['position_3']['post_by_name_'.$i])?></span></a> --</li>
                                                                    <li><a title="" href="#"><?php echo html_escape(@$pn['position_3']['post_date_as_'.$i])?></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php } ?>

                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- item-2 -->
                                <div class="item">
                                    <div class="row">
                                        <!-- main post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="home2-post">
                                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                    <!-- post image -->
                                                    <div class="post-thumb">
                                                        <a href="<?php echo html_escape(@$pn['position_3']['news_link_6'])?>">
                                                            <?php
                                                                if (@$pn['position_3']['image_check_6']) {
                                                                  echo'<img class="img-responsive" src="'.html_escape(@$pn['position_3']['image_thumb_6']).'" alt="">';
                                                                }
                                                            ?>

                                                        </a>
                                                    </div>
                                                    <!-- post title -->
                                                    <h3><a href="<?php echo html_escape(@$pn['position_3']['news_link_6'])?>">
                                                        <?php echo html_escape(@$pn['position_3']['news_title_6'])?></a></h3>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <div class="date">
                                                        <ul>
                                                            <li><?php echo display('by')?> <a title="" href="<?php echo html_escape(@$pn['position_3']['author_profile_6']); ?>"><span><?php echo html_escape(@$pn['position_3']['post_by_name_6'])?></span></a> --</li>
                                                            <li><a title="" href="#"><?php echo html_escape(@$pn['position_3']['ptime_6'])?></a> </li>
                                                        </ul>
                                                    </div>
                                                    <p><?php echo html_escape(@$pn['position_3']['short_news_6'])?><a href="<?php echo html_escape(@$pn['position_3']['news_link_6'])?>"><?php echo display('read_more')?></a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">

                                                <?php 
                                                 for($i=7;$i<=10;$i++){
                                                    if(!isset($pn['position_3']['news_title_'.$i]))
                                                    continue
                                                ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <div class="home2-post">
                                                        <!-- post image -->
                                                        <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                        
                                                            <a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>">
                                                                <?php
                                                                    if (@$pn['position_3']['image_check_'.$i]) {
                                                                      echo'<img class="img-responsive" src="'.html_escape(@$pn['position_3']['image_thumb_'.$i]).'" alt=""  height="70" width="100">';
                                                                    } else {
                                                                        echo '<img  class="img-responsive"  height="70" width="100"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_3']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                                    }
                                                                ?>
                                                            </a>
                                                        </div>
                                                        <div class="post-title-author-details">
                                                            <!-- post image -->
                                                            <h5><a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>">
                                                                <?php echo html_escape(@$pn['position_3']['news_title_'.$i])?></a></h5>
                                                            <div class="date">
                                                                <ul>
                                                                    <li><a title="" href="<?php echo html_escape(@$pn['position_3']['author_profile_'.$i]); ?>"><span><?php echo html_escape(@$pn['position_3']['post_by_name_'.$i])?></span></a> --</li>
                                                                    <li><a title="" href="#"><?php echo html_escape(@$pn['position_3']['post_date_as_'.$i])?></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php } ?>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    <?php } ?>
                    </section>
                    <!-- /.Politics -->

                    <div class="add <?php echo (html_escape(@$lg_status_15)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_15)==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo htmlspecialchars_decode(@$home_15); ?>
                    </div><br>
                   
                </div>
                <!-- /.left content inner -->
                <div class="col-md-4 col-sm-4 left-padding">

                    <div class="banner-add <?php echo (html_escape(@$lg_status_16)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_16)==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo htmlspecialchars_decode(@$home_16); ?>
                    </div>
                    
                    <div class="tab-inner">
                            <ul class="tabs">
                                <li><a href="#"><?php echo display('latest_news');?></a></li>
                                <li><a href="#"><?php echo display('most_read'); ?></a></li>
                            </ul><hr> <!-- tabs -->
                            <div class="tab_content">
                                <div class="tab-item-inner">
                                    <?php 
                                        for($i=1; $i<=3; $i++){ 
                                            if(!isset($ln['news_title_'.$i]))
                                            continue
                                    ?>
                                    <div class="box-item wow fadeIn" data-wow-duration="1s">
                                        <div class="img-thumb">
                                            <?php if(@$ln['image_check_'.$i]!=NULL){?>
                                              <a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>" rel="bookmark">
                                                 <img class="entry-thumb" src="<?php echo html_escape(@$ln['image_thumb_' . $i]); ?>" alt="" height="80" width="90">
                                            </a>
                                           <?php } else{?>
                                           <a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>" rel="bookmark">
                                            <img  src="http://img.youtube.com/vi/<?php echo html_escape(@$ln['video_' . $i]); ?>/0.jpg" alt=""  height="80" width="90">
                                           </a>
                                            
                                            <?php }?>
                                        </div>

                                        <div class="item-details">
                                            <h6 class="sub-category-title bg-color-1">
                                                <a href="<?php echo html_escape(@$ln['category_link_'.$i]);?>"><?php echo html_escape(@$ln['category_name_'.$i]);?></a>
                                            </h6>
                                            <h3 class="td-module-title"><a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>"><?php echo html_escape(@$ln['news_title_'.$i]);?></a></h3>
                                            <div class="post-editor-date">
                                                <!-- post date -->
                                                <div class="post-date">
                                                    <i class="pe-7s-clock"></i><?php echo html_escape(@$ln['post_date_as_'.$i]);?>
                                                </div>
                                                <!-- post comment -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div> <!-- / tab item -->

                                <div class="tab-item-inner">
                                 <?php for($i=1; $i<=3; $i++){ 
                                         if(!isset($mr['news_title_'.$i]))
                                        continue
                                    ?>
                                    <div class="box-item">
                                        <div class="img-thumb">
                                            <?php if(@$mr['image_check_' . $i]!=NULL){?>
                                             <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" rel="bookmark"><img class="entry-thumb" src="<?php echo html_escape(@$mr['image_thumb_' . $i]); ?>" alt="" height="80" width="90"></a>
                                            <?php } else{?>
                                            <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" rel="bookmark">
                                                <img  src="http://img.youtube.com/vi/<?php echo html_escape(@$mr['video_' . $i]); ?>/0.jpg" alt=""  height="80" width="90">
                                           </a>
                                            <?php }?>
                                        </div>
                                        
                                        <div class="item-details">
                                            <h6 class="sub-category-title bg-color-5">
                                                <a href="<?php echo html_escape(@$mr['category_link_'.$i]);?>">
                                                    <?php echo html_escape(@$mr['category_name_'.$i]);?></a>
                                            </h6>
                                            <h3 class="td-module-title">
                                            <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"><?php echo html_escape(@$mr['news_title_'.$i]);?></a>
                                            </h3>
                                            <div class="post-editor-date">
                                                <!-- post date -->
                                                <div class="post-date">
                                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$mr['post_date_as_'.$i]);?>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div> <!-- / tab item -->
                            </div> <!-- / tab_content -->
                    </div> 

                    <div class="banner-add <?php echo (html_escape(@$lg_status_17)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_17)==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo htmlspecialchars_decode(@$home_17); ?>
                    </div>


                    <!-- archive calander -->
                        <div class="archive" >
                            <span class=" category-headding"><?php echo display('archive')?></span>
                            <div class="headding-border"></div>
                            <div class="calendar_part">
                                <div id="datepicker"></div>
                            </div>
                        </div> 

                </div>
                <!-- side content end -->
            </div>
            <!-- row end -->
        </div>


        <!-- technology area
            ============================================ -->
        <section class="technology_wrapper">
            <div class="container">

                <?php if(@$home_page_positions[4]['status']==1){ ?>

                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[4]['cat_name'])?></h3>
                        <div class="headding-border"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 col-md-5">
                        <div class="home2-post">
                            <div class="post-wrapper">
                                <!-- post image -->
                                <div class="post-thumb img-zoom-in">
                                    <a href="#">
                                        <?php
                                            if (@$pn['position_4']['image_check_1']!=NULL) {
                                              echo'<img class="img-responsive" src="'.html_escape(@$pn['position_4']['image_large_1']).'" alt="">';
                                            } else {
                                                echo '<img  class="img-responsive"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_4']['video_1']) . '/0.jpg" alt="photography" />';
                                            }
                                        ?>
                                    </a>
                                </div>
                                <!-- post title -->
                                <h3><a href="<?php echo html_escape(@$pn['position_4']['news_link_1'])?>"><?php echo html_escape(@$pn['position_4']['news_title_1'])?></a></h3>
                            </div>
                            <div class="post-title-author-details">
                                <div class="date">
                                    <ul>
                                        <li><?php echo display('by')?> <a title="" href="<?php echo html_escape(@$pn['position_4']['author_profile_1']); ?>"><span><?php echo html_escape(@$pn['position_4']['post_by_name_1'])?></span></a> --</li>
                                        <li><a title="" href="#"><?php echo html_escape(@$pn['position_4']['post_date_as_1'])?></a></li>
                                    </ul>
                                </div>
                                <?php echo htmlspecialchars_decode(@$pn['position_4']['short_news_1'])?> 
                                <a href="<?php echo html_escape(@$pn['position_4']['news_link_1'])?>"> <?php echo display('read_more')?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-7">
                        <div class="row rn_block">

                            <?php 
                                 for($i=2;$i<=7;$i++){
                                    if(!isset($pn['position_4']['news_title_'.$i]))
                                    continue
                                ?>

                            <div class="col-xs-6 col-md-4 col-sm-4 post-padding">
                                <div class="home2-post">
                                    <!-- post image -->
                                    <div class="post-thumb">
                                        <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i]) ?>">
                                            <?php
                                                if (@$pn['position_4']['image_check_'.$i]!=NULL) {
                                                  echo'<img class="img-responsive"src="'. html_escape(@$pn['position_4']['image_thumb_'.$i]).'" alt=""  height="70" width="100">';
                                                } else {
                                                    echo'<img class="img-responsive"  height="70" width="100"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_4']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                }
                                            ?>
                                        </a>
                                    </div>

                                    <div class="post-title-author-details">
                                        <!-- post image -->
                                        <h5><a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_4']['news_title_'.$i])?></a></h5>
                                        <div class="date">
                                            <ul>
                                                <li><a title="" href="<?php echo html_escape(@$pn['position_4']['author_profile_'.$i]); ?>"><span><?php echo html_escape(@$pn['position_4']['post_by_name_'.$i])?></span></a> --</li>
                                                <li><a title="" href="#"><?php echo html_escape(@$pn['position_4']['post_date_as_'.$i])?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
        <!-- weekly section area
            ============================================ -->
        <section id="weekly_section_area">
            <div class="container">

                <?php if(@$home_page_positions[5]['status']==1){ ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="category-headding "><?php echo html_escape(@$home_page_positions[5]['cat_name'])?></h3>
                            <div class="headding-border"></div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <!-- /col -->
                        <!-- right post -->
                        <div class="col-sm-12 col-md-12">
                           
                            <!-- post-2 -->
                            <div class="row">

                                <?php 
                                for($i=1;$i<=3;$i++){
                                    if(!isset($pn['position_5']['news_title_'.$i]))
                                    continue
                                ?>

                                <div class="col-sm-4">
                                    <div class="item home2-post">
                                        <div class="post-wrapper">
                                            <!-- image -->
                                            <div class="post-thumb">
                                                <a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i]);?>">
                                                    <?php
                                                        if (@$pn['position_5']['image_check_'.$i]!=NULL) {
                                                            echo'<img class="img-responsive" src="'. html_escape(@$pn['position_5']['image_thumb_'.$i]).'" alt=""  height="70" width="100">';
                                                        } else {
                                                            echo'<img class="img-responsive"  height="70" width="100"  src="http://img.youtube.com/vi/' .  html_escape(@$pn['position_5']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                        }
                                                    ?>

                                                </a>
                                            </div>
                                            
                                        </div>
                                        <h3><a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i]);?>"><?php echo  html_escape(@$pn['position_5']['news_title_'.$i]);?></a></h3>
                                        <div class="post-title-author-details">
                                            <?php echo htmlspecialchars_decode(@$pn['position_5']['short_news_'.$i]);?>
                                            <a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i]);?>"><?php echo display('read_more')?></a>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>
                            </div>

                            <div class="row">


                                <?php 
                                for($i=4;$i<=6;$i++){
                                    if(!isset($pn['position_5']['news_title_'.$i]))
                                    continue
                                ?>

                                <div class="col-sm-4">
                                    <div class="item home2-post">
                                        <div class="post-wrapper">
                                            <!-- image -->
                                            <div class="post-thumb">
                                                <a href="<?php echo  html_escape(@$pn['position_5']['news_link_'.$i]);?>">
                                                    <?php
                                                        if (@$pn['position_5']['image_check_'.$i]!=NULL) {
                                                            echo'<img class="img-responsive" src="'. html_escape(@$pn['position_5']['image_thumb_'.$i]).'" alt=""  height="70" width="100">';
                                                        } else {
                                                            echo'<img class="img-responsive"  height="70" width="100"  src="http://img.youtube.com/vi/' .  html_escape(@$pn['position_5']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                        }
                                                    ?>

                                                </a>
                                            </div>
                                            
                                        </div>
                                        <h3><a href="<?php echo  html_escape(@$pn['position_5']['news_link_'.$i]);?>"><?php echo  html_escape(@$pn['position_5']['news_title_'.$i]);?></a></h3>
                                        <div class="post-title-author-details">
                                            <?php echo  htmlspecialchars_decode(@$pn['position_5']['short_news_'.$i]);?>
                                            <a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i]);?>"><?php echo display('read_more')?></a>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </section>
        <br>
        <!-- pagination
            ============================================ -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="banner <?php echo (html_escape(@$lg_status_18)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_18)==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo htmlspecialchars_decode(@$home_18); ?>
                </div>
                </div>
            </div>
        </div>


