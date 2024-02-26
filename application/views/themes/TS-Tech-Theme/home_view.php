<?php
    $this->load->helper('text');
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }

    $befor_img = base_url('assets/box.gif');
?>

            
        <section class="headding-news">
            <div class="container">
                <div class="row row-margin">
                    
                    <div class="col-sm-6 col-padding">
                        <div class="post-wrapper post-grid-6" data-wow-duration="1s">

                            <div class="post-thumb img-zoom-in">
                                <a href="<?php echo html_escape(@$hn['news_link_1']);?>">
                                    <?php if (@$hn['image_check_1']!=NULL) { ?>
                                        <img class="entry-thumb-top lazy"  data-src="<?php echo  html_escape(@$hn['image_large_1']) ?>" src="<?php echo $befor_img;?>" alt="<?php echo  html_escape(@$hn['image_alt_1']) ?>">
                                    <?php  } else { ?>
                                        <img class="entry-thumb-top"  src="http://img.youtube.com/vi/<?php echo html_escape($hn['video_1'])?>/0.jpg" />
                                    <?php  }?> 
                                </a>
                            </div>


                            <div class="post-info">
                                <span class="color-3"><?php echo html_escape(@$hn['category_name_1']);?> </span>
                                <h3 class="post-title post-title-size"><a href="<?php echo html_escape(@$hn['news_link_1']);?>" rel="bookmark"> <?php echo html_escape(@$hn['news_title_1']);?> </a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> </i> <?php echo  html_escape(@$hn['post_date_as_1']); ?>
                                    </div>
                                    <!-- read more -->
                                    <?php if(@$hn['video_1']!=NULL) {?>
                                    
                                    <div class="overlay" id="player">
                                        <a href="<?php echo html_escape(@$hn['news_link_1']);?>" class="expand" id="player-button"><i class="fa fa-play"></i></a>
                                    </div>

                                    <?php } else{?>

                                    <div class="overlay" id="player">
                                        <a href="<?php echo html_escape(@$hn['news_link_1']);?>" class="expand" id="player-button"><i class="fa fa-play"></i></a>
                                    </div>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-padding">
                        <div class="post-wrapper post-grid-7" data-wow-duration="1s">
                            <div class="post-thumb img-zoom-in">
                                <a href="<?php echo html_escape(@$hn['news_link_2']);?>">
                                    <?php if (@$hn['image_check_2']!=NULL) { ?>
                                        <img class="entry-thumb-top lazy"  data-src="<?php echo  html_escape(@$hn['image_large_2']) ?>" src="<?php echo $befor_img;?>" alt="<?php echo  html_escape(@$hn['image_alt_2']) ?>">
                                    <?php  } else { ?>
                                        <img class="entry-thumb-top"  src="http://img.youtube.com/vi/<?php echo html_escape($hn['video_2'])?>/0.jpg" />
                                    <?php  }?> 

                                </a>
                            </div>
                            <div class="post-info">
                                <span class="color-5"><?php echo html_escape(@$hn['category_name_2']);?> </span>
                                <h3 class="post-title post-title-size"><a href="<?php echo html_escape(@$hn['news_link_2']);?>" rel="bookmark"><?php echo html_escape(@$hn['news_title_2']);?> </a></h3>
                                <div class="post-editor-date">
                                   <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> </i> <?php echo  html_escape(@$hn['post_date_as_2']); ?>
                                    </div>
                                    <!-- read more -->
                                    <?php if(@$hn['video_2']!=NULL) {?>
                                    
                                    <div class="overlay" id="player">
                                        <a href="<?php echo html_escape(@$hn['news_link_2']);?>" class="expand" id="player-button"><i class="fa fa-play"></i></a>
                                    </div>

                                    <?php } else{?>

                                    <div class="overlay" id="player">
                                        <a href="<?php echo html_escape(@$hn['news_link_2']);?>" class="expand" id="player-button"><i class="fa fa-play"></i></a>
                                    </div>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row row-margin">
                    <div id="content-slide-4" class="owl-carousel">

                        <?php 
                            for($i=3;$i<=8;$i++){
                                if(!isset($hn['news_link_'.$i]))
                                    continue
                        ?>

                            <div class="item">
                                <div class="post-wrapper post-grid-8 wow " data-wow-duration="1s">
                                    <div class="img-zoom-in">

                                        <?php
                                        if (@$hn['image_check_'.$i]!=NULL){
                                            echo'<a href="'.html_escape(@$hn['news_link_'.$i]).'">
                                                    <img class="entry-thumb-bottom lazy" data-src="'. html_escape(@$hn['image_thumb_'.$i]).'" src="'.$befor_img.'" alt="'.html_escape(@$hn['image_alt_'.$i]).'">
                                                </a>';
                                        } else {
                                            echo '<a class="entry-thumb-bottom" href="'.html_escape(@$hn['news_link_'.$i]).'"><img  src="http://img.youtube.com/vi/' . html_escape(@$hn['video_' . $i]) . '/0.jpg" /></a>';
                                        }
                                    ?>  

                                    </div>

                                    <div class="post-info">
                                        <span class="color-4"><?php echo html_escape(@$hn['category_name_'.$i])?></span>
                                        <h3 class="post-title post-title-size"><a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>" rel="bookmark"><?php echo html_escape(@$hn['news_title_'.$i]);?></a></h3>
                                        <div class="post-editor-date">
                                            
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> </i> <?php echo  html_escape(@$hn['post_date_as_' . $i]); ?>
                                        </div>

                                        <!-- read more -->
                                        <?php if(@$hn['video_'.$i]!=NULL) {?>
                                            <a class="playvideo pull-right" href="<?php echo html_escape(@$hn['news_link_'.$i]);?>"><i class="fa-play-circle-o"></i></a>
                                        <?php } else{?>
                                            <a class="readmore pull-right" href="<?php echo html_escape(@$hn['news_link_'.$i]);?>"><i class="pe-7s-angle-right"></i></a>
                                        <?php } ?>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }?>


                    </div>
                </div>
            </div>
        </section>


        <section class="article-post-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">

                        <!-- add two -->
                        <div class="banner-add <?php echo (html_escape(@$lg_status_12)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_12)==0?'hidden-xs hidden-sm':'')?>">
                            <?php echo htmlspecialchars_decode(@$home_12); ?>
                        </div> 

                        <div class="articale-list">
                           
                            <?php 
                                for($i=1; $i<=7; $i++){
                                if(!isset($ln['news_title_'.$i]))
                                continue
                            ?>
                            <!--Post list-->
                           <div class="post-style2 wow fadeIn" data-wow-duration="1s">

                                <?php
                                    if (@$ln['image_check_'.$i]!=NULL) {
                                    echo' <a href="'.html_escape(@$ln['news_link_'.$i]).'">
                                                <img class="lazy" data-src="'. html_escape(@$ln['image_thumb_'.$i]).'" src="'.@$befor_img.'" alt="'. html_escape(@$hn['image_alt_'.$i]).'">
                                            </a>';
                                    } else {
                                        echo '<a href="'.html_escape(@$ln['news_link_'.$i]).'">
                                        <img width="100%" src="http://img.youtube.com/vi/' . html_escape(@$ln['video_' . $i]) . '/0.jpg" alt="photography" /></a>';
                                    }
                                ?>

                                

                                <div class="post-style2-detail">
                                    <h3><a href="<?php echo html_escape(@$ln['news_link_'.$i]); ?>" title="">
                                        <?php echo html_escape(@$ln['news_title_'.$i]); ?>
                                    </a></h3>
                                    <div class="date">
                                        <ul>
                                            <li><img src="<?php echo html_escape(@$ln['post_by_image_'.$i])?>" src="<?php echo $befor_img;?>" class="img-responsive lazy" alt=""></li>
                                            <li><?php echo display('by')?> <a title="<?php echo html_escape(@$ln['post_by_name_'.$i]); ?>" href="<?php echo html_escape(@$ln['author_profile_'.$i]); ?>"><span><?php echo html_escape(@$ln['post_by_name_'.$i]); ?></span></a> --</li>
                                            <li><a title="" href="#"><?php echo html_escape(@$ln['post_date_as_'.$i]); ?></a></li>
                                        </ul>
                                    </div>

                                    <p><?php 
                                        @$news_details = $ln['news_'.$i];
                                        $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 15));
                                        echo htmlspecialchars_decode($exploded);
                                    ?></p>

                                 </div>
                            </div>

                            <?php } ?>
                            
                        </div>

                    </div>

                    <div class="col-sm-4 left-padding">



                        <?php $fa = array('method' =>'GET' ); echo form_open('search',$fa);?>
                            <div class="input-group search-area"> <!-- search area -->
                                <input type="text" class="form-control" placeholder="<?php echo display('search')?>" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div> 
                        <?php echo form_close();?>


                        <!-- add three -->
                        <div class="banner-add <?php echo (html_escape(@$lg_status_14)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_14)==0?'hidden-xs hidden-sm':'')?>">
                            <?php echo htmlspecialchars_decode(@$home_14); ?>
                        </div>


                        <?php if (@$home_page_positions[5]['status'] == 1) {?>
                            <div class="widget-slider-inner">
                                <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[5]['slug'])?>"><?php echo html_escape(@$home_page_positions[5]['cat_name']); ?></a></h3>
                                <div class="headding-border"></div>
                                <div id="widget-slider" class="owl-carousel owl-theme">
                                    <!-- widget item -->

                                <?php 
                                    for($i=1;$i<=3;$i++){
                                        if(!isset($pn['position_5']['news_title_'.$i]))
                                            continue
                                ?>

                                
                                            <div class="item">
                                                <a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i]); ?>">
                                                <?php
                                                    if (@$pn['position_5']['image_check_'.$i]!=NULL) {
                                                          echo'<img class="lazy" data-src="'. html_escape($pn['position_5']['image_thumb_'.$i]).'" src="'. $befor_img.'" alt="'.html_escape($pn['position_5']['image_alt_'.$i]).'">';
                                                        } else {
                                                          echo'<img  class="img-responsive lazy"  src="http://img.youtube.com/vi/'.html_escape($pn['position_5']['video_'.$i]).'/0.jpg" alt="photography" />';
                                                        }
                                                    ?>
                                                </a>
                                                <h4><a href="<?php echo html_escape($pn['position_5']['news_link_'.$i])?>"><?php echo html_escape($pn['position_5']['news_title_'.$i])?></a></h4>


                                                <div class="date">
                                                    <ul>
                                                        <li><?php echo display('by')?><a title="" href="<?php echo html_escape(@$pn['position_5']['author_profile_'.$i]);?>"><span><?php echo html_escape(@$pn['position_5']['post_by_name_'.$i])?></span></a> --</li>
                                                        <li><a ><?php echo @$pn['position_5']['post_date_as_'.$i] ;?></a></li>
                                                    </ul>
                                                </div>
                                                
                                                <?php 
                                                    @$news_details = $pn['position_5']['full_news_'.$i];
                                                    $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                                    echo htmlspecialchars_decode($exploded);
                                                ?>
                                            </div>
                                        <?php } ?>

                                </div>
                            </div>
                        <?php }?>



                        <?php if (@$social_page->fb && ($social_page->status=='1')) { ?>
                            <div class="banner-add hidden-sm hidden-xs">
                                <h3 class="category-headding "><?php echo display('social_pixel')?></h3>
                                <div class="headding-border"></div>
                                <div class="ssm">
                                    <div class="fb-page" data-href="<?php echo html_escape(@$social_page->fb);?>/" data-tabs="timeline" data-width="" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <blockquote cite="<?php echo html_escape(@$social_page->fb);?>/" class="fb-xfbml-parse-ignore">
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        <?php }?>

                        



                    </div>
                </div>
            </div>
        </section>


        
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">

                    <!-- add four -->
                    <div class="banner-add <?php echo (html_escape(@$lg_status_13)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_13)==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo htmlspecialchars_decode(@$home_13); ?>
                    </div>

                    <?php
                        if (@$home_page_positions[1]['status'] == 1) {
                    ?>
                    <section class="recent_news_inner">
                        <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[1]['slug'])?>"><?php echo html_escape(@$home_page_positions[1]['cat_name']); ?></a></h3>
                        <div class="headding-border"></div>
                        <div class="row">
                            <div id="content-slide" class="owl-carousel">

                            <?php 
                                for($i=1;$i<=6;$i++){
                                    if(!isset($pn['position_1']['news_title_'.$i]))
                                        continue
                            ?>

                                <!-- item-1 -->
                                <div class="item home2-post">
                                    <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                        <!-- image -->
                                        <div class="post-thumb">

                                            <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>">
                                                <?php
                                                    if (@$pn['position_1']['image_check_'.$i]!=NULL) {
                                                        echo'<img class="img-responsive lazy" data-src="'. html_escape($pn['position_1']['image_thumb_'.$i]).'" src="'.$befor_img.'" alt="'. html_escape($pn['position_1']['image_alt_'.$i]).'">';
                                                    } else {
                                                        echo '<img width="100%" src="http://img.youtube.com/vi/' . html_escape(@$pn['position_1']['video_' . $i]) . '/0.jpg" alt="photography" />';
                                                    }
                                                ?>

                                            </a>
                                        </div>
                                        
                                    </div>
                                    <h3><a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_1']['news_title_'.$i]); ?></a></h3>
                                    <div class="post-title-author-details">
                                        <div class="date">
                                            <ul>
                                                <li><?php echo display('by')?> <a title="" href="<?php echo html_escape(@$pn['position_1']['author_profile_'.$i]);?>"><span><?php echo html_escape(@$pn['position_1']['post_by_name_'.$i]); ?></span></a> --</li>
                                                <li><a title="" href="#"><?php echo html_escape(@$pn['position_1']['post_date_as_'.$i]); ?></a> </li>
                                            </ul>
                                        </div>
                                        <?php echo htmlspecialchars_decode(@$pn['position_1']['short_news_'.$i]); ?> <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>"><?php echo display('read_more')?></a>
                                    </div>
                                </div>

                            <?php } ?>
                                
                            </div>
                        </div>
                    </section>
                    <?php }?>



                    <section class="politics_wrapper">

                    <?php if(@$home_page_positions[2]['status']==1){ ?>

                        <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[2]['slug'])?>"><?php echo html_escape(@$home_page_positions[2]['cat_name']);?></a></h3>
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
                                                        <a href="<?php echo html_escape(@$pn['position_2']['news_link_1'])?>">
                                                            <?php
                                                                if (@$pn['position_2']['image_check_1']) {
                                                                  echo'<img class="img-responsive lazy" data-src="'.html_escape(@$pn['position_2']['image_thumb_1']).'" src="'.$befor_img.'" alt="'.html_escape(@$pn['position_2']['image_alt_1']).'">';
                                                                } else {
                                                                    echo '<img  class="img-responsive"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_2']['video_1']) . '/0.jpg" alt="'. html_escape(@$pn['position_2']['video_1']) .'" />';
                                                                }
                                                            ?>

                                                        </a>
                                                    </div>
                                                    <!-- post title -->
                                                    <h3><a href="<?php echo html_escape(@$pn['position_2']['news_link_1'])?>">
                                                        <?php echo html_escape(@$pn['position_2']['news_title_1'])?></a></h3>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <div class="date">
                                                        <ul>
                                                            <li><?php echo display('by')?> <a title="" href="<?php echo html_escape(@$pn['position_1']['author_profile_1']);?>"><span><?php echo html_escape(@$pn['position_2']['post_by_name_1'])?></span></a> --</li>
                                                            <li><a title="" href="#"><?php echo html_escape(@$pn['position_2']['ptime_1'])?></a> </li>
                                                        </ul>
                                                    </div>
                                                    <?php echo htmlspecialchars_decode(@$pn['position_2']['short_news_1'])?>
                                                    <a href="<?php echo html_escape(@$pn['position_2']['news_link_1'])?>"><?php echo display('read_more')?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">

                                                <?php 
                                                 for($i=2;$i<=5;$i++){
                                                    if(!isset($pn['position_2']['news_title_'.$i]))
                                                    continue
                                                ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <div class="home2-post">
                                                        <!-- post image -->
                                                        <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                        
                                                            <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i])?>">
                                                                <?php
                                                                    if (@$pn['position_2']['image_check_'.$i]) {
                                                                      echo'<img class="img-responsive lazy" data-src="'.html_escape(@$pn['position_2']['image_thumb_'.$i]).'" src="'.$befor_img.'" alt="'.html_escape(@$pn['position_2']['image_alt_'.$i]).'"  height="70" width="100">';
                                                                    } else {
                                                                        echo '<img  class="img-responsive"  height="70" width="100"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_2']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                                    }
                                                                ?>
                                                            </a>
                                                        </div>
                                                        <div class="post-title-author-details">
                                                            <!-- post image -->
                                                            <h5><a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i])?>">
                                                                <?php echo html_escape(@$pn['position_2']['news_title_'.$i])?></a></h5>
                                                            <div class="date">
                                                                <ul>
                                                                    <li><a title="" href="<?php echo html_escape(@$pn['position_2']['author_profile_'.$i]);?>"><span><?php echo html_escape(@$pn['position_2']['post_by_name_'.$i])?></span></a> --</li>
                                                                    <li><a title="" href="#"><?php echo html_escape(@$pn['position_2']['post_date_as_'.$i])?></a></li>
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
                                                        <a href="<?php echo html_escape(@$pn['position_2']['news_link_6'])?>">
                                                            <?php
                                                                if (@$pn['position_2']['image_check_6']) {
                                                                  echo'<img class="img-responsive lazy" data-src="'.html_escape(@$pn['position_2']['image_thumb_6']).'" src="'.$befor_img.'" alt="'.html_escape(@$pn['position_2']['image_alt_6']).'">';
                                                                }
                                                            ?>

                                                        </a>
                                                    </div>
                                                    <!-- post title -->
                                                    <h3><a href="<?php echo html_escape(@$pn['position_2']['news_link_6'])?>">
                                                        <?php echo html_escape(@$pn['position_2']['news_title_6'])?></a></h3>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <div class="date">
                                                        <ul>
                                                            <li><?php echo display('by')?> <a title="" href="<?php echo html_escape(@$pn['position_2']['author_profile_6']);?>"><span><?php echo html_escape(@$pn['position_2']['post_by_name_6'])?></span></a> --</li>
                                                            <li><a title="" href="#"><?php echo html_escape(@$pn['position_2']['ptime_6'])?></a> </li>
                                                        </ul>
                                                    </div>
                                                    <p><?php echo html_escape(@$pn['position_2']['short_news_6'])?><a href="<?php echo html_escape(@$pn['position_2']['news_link_6'])?>"><?php echo display('read_more')?></a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">

                                                <?php 
                                                 for($i=7;$i<=10;$i++){
                                                    if(!isset($pn['position_2']['news_title_'.$i]))
                                                    continue
                                                ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <div class="home2-post">
                                                        <!-- post image -->
                                                        <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                        
                                                            <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i])?>">
                                                                <?php
                                                                    if (@$pn['position_2']['image_check_'.$i]) {
                                                                      echo'<img class="img-responsive lazy" data-src="'.html_escape(@$pn['position_2']['image_thumb_'.$i]).'" src="'.$befor_img.'" alt="'.html_escape(@$pn['position_2']['image_alt_'.$i]).'"  height="70" width="100">';
                                                                    } else {
                                                                        echo '<img  class="img-responsive"  height="70" width="100"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_2']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                                    }
                                                                ?>
                                                            </a>
                                                        </div>
                                                        <div class="post-title-author-details">
                                                            <!-- post image -->
                                                            <h5><a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i])?>">
                                                                <?php echo html_escape(@$pn['position_2']['news_title_'.$i])?></a></h5>
                                                            <div class="date">
                                                                <ul>
                                                                    <li><a title="" href="<?php echo html_escape(@$pn['position_2']['author_profile_'.$i]);?>"><span><?php echo html_escape(@$pn['position_2']['post_by_name_'.$i])?></span></a> --</li>
                                                                    <li><a><?php echo html_escape(@$pn['position_2']['post_date_as_'.$i])?></a></li>
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

                    <!-- add five -->
                    <div class="banner-add <?php echo (html_escape(@$lg_status_15)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_15)==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo htmlspecialchars_decode(@$home_15); ?>
                    </div><br>
                </div>
                <!-- /.left content inner -->
                <div class="col-md-4 col-sm-4 left-padding">

                    <!-- add-six -->
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
                                        for($i=1; $i<=5; $i++){ 
                                            if(!isset($ln['news_title_'.$i]))
                                            continue
                                    ?>
                                    <div class="box-item wow fadeIn" data-wow-duration="1s">
                                        <div class="img-thumb">
                                            <?php if(@$ln['image_check_'.$i]!=NULL){?>
                                              <a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>" rel="bookmark">
                                                 <img class="entry-thumb lazy" data-src="<?php echo html_escape(@$ln['image_thumb_' . $i]); ?>" src="<?php echo $befor_img?>" alt="<?php echo html_escape(@$ln['image_alt_' . $i]); ?>" height="80" width="90">
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
                                 <?php for($i=1; $i<=5; $i++){ 
                                         if(!isset($mr['news_title_'.$i]))
                                        continue
                                    ?>
                                    <div class="box-item">
                                        <div class="img-thumb">
                                            <?php if(@$mr['image_check_' . $i]!=NULL){?>
                                             <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" rel="bookmark">
                                                <img class="entry-thumb lazy" data-src="<?php echo html_escape(@$mr['image_thumb_' . $i]); ?>" src="<?php echo $befor_img?>" alt="<?php echo html_escape(@$mr['image_alt_' . $i]); ?>" height="80" width="90"></a>
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
                </div>
                <!-- side content end -->
            </div>
            <!-- row end -->
        </div>



        <section class="technology_wrapper">
            <div class="container">

                <?php if(@$home_page_positions[3]['status']==1){ ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[3]['slug'])?>"><?php echo html_escape(@$home_page_positions[3]['cat_name'])?></a></h3>
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
                                                if (@$pn['position_3']['image_check_1']!=NULL) {
                                                  echo'<img class="img-responsive lazy" data-src="'.html_escape(@$pn['position_3']['image_large_1']).'" src="'.$befor_img.'" alt="'.html_escape(@$pn['position_3']['image_alt_1']).'">';
                                                } else {
                                                    echo '<img  class="img-responsive"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_3']['video_1']) . '/0.jpg" alt="photography" />';
                                                }
                                            ?>
                                        </a>
                                    </div>
                                    <!-- post title -->
                                    <h3><a href="<?php echo html_escape(@$pn['position_3']['news_link_1'])?>"><?php echo html_escape(@$pn['position_3']['news_title_1'])?></a></h3>
                                </div>
                                <div class="post-title-author-details">
                                   
                                    <?php echo htmlspecialchars_decode(@$pn['position_3']['short_news_1'])?> 
                                    <a href="<?php echo html_escape(@$pn['position_3']['news_link_1'])?>"> <?php echo display('read_more')?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7 col-md-7">
                            <div class="row rn_block">

                                <?php 
                                     for($i=2;$i<=4;$i++){
                                        if(!isset($pn['position_3']['news_title_'.$i]))
                                        continue
                                    ?>

                                <div class="col-xs-6 col-md-4 col-sm-4 post-padding">
                                    <div class="home2-post">
                                        <!-- post image -->
                                        <div class="post-thumb">
                                            <a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i]) ?>">
                                                <?php
                                                    if (@$pn['position_3']['image_check_'.$i]!=NULL) {
                                                      echo'<img class="img-responsive lazy" data-src="'. html_escape(@$pn['position_3']['image_thumb_'.$i]).'" src="'.$befor_img.'" alt="'. html_escape(@$pn['position_3']['image_alt_'.$i]).'"  height="70" width="100">';
                                                    } else {
                                                        echo'<img class="img-responsive"  height="70" width="100"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_3']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                    }
                                                ?>
                                            </a>
                                        </div>

                                        <div class="post-title-author-details">
                                            <!-- post image -->
                                            <h5><a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_3']['news_title_'.$i])?></a></h5>
                                            
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="row rn_block">

                                <?php 
                                     for($i=5;$i<=7;$i++){
                                        if(!isset($pn['position_3']['news_title_'.$i]))
                                        continue
                                    ?>

                                <div class="col-xs-6 col-md-4 col-sm-4 post-padding">
                                    <div class="home2-post">
                                        <!-- post image -->
                                        <div class="post-thumb">
                                            <a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i]) ?>">
                                                <?php
                                                    if (@$pn['position_3']['image_check_'.$i]!=NULL) {
                                                      echo'<img class="img-responsive lazy" data-src="'. html_escape(@$pn['position_3']['image_thumb_'.$i]).'" src="'.$befor_img.'" alt="'. html_escape(@$pn['position_3']['image_alt_'.$i]).'"  height="70" width="100">';
                                                    } else {
                                                        echo'<img class="img-responsive"  height="70" width="100"  src="http://img.youtube.com/vi/' . html_escape(@$pn['position_3']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                    }
                                                ?>
                                            </a>
                                        </div>

                                        <div class="post-title-author-details">
                                            <!-- post image -->
                                            <h5><a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_3']['news_title_'.$i])?></a></h5>
                                            
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



        <section id="weekly_section_area">
            <div class="container">

                <?php if(@$home_page_positions[4]['status']==1){ ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[4]['slug'])?>"><?php echo html_escape(@$home_page_positions[4]['cat_name'])?></a></h3>
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
                                    if(!isset($pn['position_4']['news_title_'.$i]))
                                    continue
                                ?>

                                <div class="col-sm-4">
                                    <div class="item home2-post">
                                        <div class="post-wrapper">
                                            <!-- image -->
                                            <div class="post-thumb">
                                                <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i]);?>">
                                                    <?php
                                                        if (@$pn['position_4']['image_check_'.$i]!=NULL) {
                                                            echo'<img class="img-responsive lazy" data-src="'. html_escape(@$pn['position_4']['image_thumb_'.$i]).'" src="'.$befor_img.'" alt="'. html_escape(@$pn['position_4']['image_alt_'.$i]).'"  height="70" width="100">';
                                                        } else {
                                                            echo'<img class="img-responsive"  height="70" width="100"  src="http://img.youtube.com/vi/' .  html_escape(@$pn['position_4']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                        }
                                                    ?>

                                                </a>
                                            </div>
                                            
                                        </div>
                                        <h3><a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i]);?>"><?php echo  html_escape(@$pn['position_4']['news_title_'.$i]);?></a></h3>
                                        <div class="post-title-author-details">
                                            <?php echo htmlspecialchars_decode(@$pn['position_4']['short_news_'.$i]);?>
                                            <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i]);?>"><?php echo display('read_more')?></a>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>
                            </div>

                            <div class="row">


                                <?php 
                                for($i=4;$i<=6;$i++){
                                    if(!isset($pn['position_4']['news_title_'.$i]))
                                    continue
                                ?>

                                <div class="col-sm-4">
                                    <div class="item home2-post">
                                        <div class="post-wrapper">
                                            <!-- image -->
                                            <div class="post-thumb">
                                                <a href="<?php echo  html_escape(@$pn['position_4']['news_link_'.$i]);?>">
                                                    <?php
                                                        if (@$pn['position_4']['image_check_'.$i]!=NULL) {
                                                            echo'<img class="img-responsive lazy" data-src="'. html_escape(@$pn['position_4']['image_thumb_'.$i]).'" src="'.$befor_img.'" alt="'. html_escape(@$pn['position_4']['image_alt_'.$i]).'"  height="70" width="100">';
                                                        } else {
                                                            echo'<img class="img-responsive"  height="70" width="100"  src="http://img.youtube.com/vi/' .  html_escape(@$pn['position_4']['video_'.$i]) . '/0.jpg" alt="photography" />';
                                                        }
                                                    ?>

                                                </a>
                                            </div>
                                            
                                        </div>
                                        <h3><a href="<?php echo  html_escape(@$pn['position_4']['news_link_'.$i]);?>"><?php echo  html_escape(@$pn['position_4']['news_title_'.$i]);?></a></h3>
                                        <div class="post-title-author-details">
                                            <?php echo  htmlspecialchars_decode(@$pn['position_4']['short_news_'.$i]);?>
                                            <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i]);?>"><?php echo display('read_more')?></a>
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


        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="banner <?php echo (html_escape(@$lg_status_18)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_18)==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo htmlspecialchars_decode(@$home_18); ?>
                </div>
                </div>
            </div>
        </div>


