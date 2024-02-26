<?php
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
?>
    <!-- newsfeed Area
        ============================================ -->
    <section class="news-feed">
        <div class="container">

                <div class="row row-margin">

                <div class="col-sm-4 col-padding">
                    <?php if(@$hn['news_title_1']!=NULL){?>
                    <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                        <div class="img-zoom-in sl">

                            <?php if(@$hn['image_check_1']!=NULL){?>
                            <a href="<?php echo html_escape(@$hn['news_link_1']);?>">
                                <img class="entry-thumb" src="<?php echo html_escape(@$hn['image_large_1'])?>" alt="<?php echo  html_escape(@$hn['image_alt_1']) ?>">
                            </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$hn['news_link_1']);?>" rel="bookmark">
                                    <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo html_escape(@$hn['video_1']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                        </div>

                        <div class="post-info">
                            <span class="color-4"><a href="<?php echo html_escape(@$hn['category_link_1'])?>"><?php echo html_escape(@$hn['category_name_1'])?></a> </span>
                            <h3 class="post-title"><a href="<?php echo html_escape(@$hn['news_link_1']);?>" rel="bookmark"><?php echo html_escape(@$hn['news_title_1']);?></a></h3>
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$hn['post_date_as_1']); ?>
                                </div>
                                <!-- read more -->
                               <?php if(@$hn['video_1']!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo html_escape(@$hn['news_link_1']);?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                <a class="readmore pull-right" href="<?php echo html_escape(@$hn['news_link_1'])?>"><i class="pe-7s-angle-right"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="col-xs-4 col-md-4 col-sm-4 col-padding">
                    <div id="news-feed-carousel" class="owl-carousel owl-theme">
                        <?php for($i=2;$i<=2;$i++){
                            if (!isset($hn['news_title_'.$i]))
                            continue;
                        ?>
                        <div class="item">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                                <div class=" img-zoom-in sl">
                                <?php if(@$hn['image_check_'.$i]!=NULL){?>
                                    <a href="<?php echo html_escape(@$hn['news_link_'.$i])?>">
                                        <img class="entry-thumb" src="<?php echo html_escape(@$hn['image_large_'.$i])?>" alt="<?php echo  html_escape(@$hn['image_alt_'.$i]) ?>">
                                    </a>
                                <?php } else{ ?>
                                    <a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>" rel="bookmark">
                                        <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo html_escape(@$hn['video_'.$i]);?>/0.jpg" alt="" >
                                    </a>
                                <?php }?>
                                    
                                </div>
                                <div class="post-info">
                                    <span class="color-2"><a href="<?php echo html_escape(@$hn['category_link_'.$i])?>"><?php echo html_escape(@$hn['category_name_'.$i])?></a></span>
                                    <h3 class="post-title"><a href="<?php echo html_escape(@$hn['news_link_'.$i])?>" rel="bookmark"><?php echo html_escape(@$hn['news_title_'.$i])?> </a></h3>
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo html_escape(@$hn['post_date_as_'.$i]); ?>
                                        </div>
                                        <!-- read more -->
                                        <?php if(@$hn['video_'.$i]!=NULL) {?>
                                        <a class="playvideo pull-right" href="<?php echo html_escape(@$hn['news_link_'.$i]);?>"><i class="fa fa-play-circle-o"></i></a>
                                        <?php } else{?>
                                        <a class="readmore pull-right" href="<?php echo html_escape(@$hn['news_link_'.$i])?>"><i class="pe-7s-angle-right"></i></a>
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-sm-4  col-padding">
                    <?php if(@$hn['news_title_3']!=NULL){?>
                    <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                        <div class="img-zoom-in sl">
                           
                            <?php if(@$hn['image_check_5']!=NULL){?>
                            <a href="<?php echo html_escape(@$hn['news_link_3'])?>">
                                <img class="entry-thumb" src="<?php echo html_escape(@$hn['image_large_3'])?>" alt="<?php echo  html_escape(@$hn['image_alt_3']) ?>">
                            </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$hn['news_link_3']);?>" rel="bookmark">
                                    <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo html_escape(@$hn['video_3']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                        </div>
                        <div class="post-info">
                            <span class="color-5"><a href="<?php echo html_escape(@$hn['category_link_3'])?>"><?php echo html_escape(@$hn['category_name_5'])?></a> </span>
                            <h3 class="post-title"><a href="<?php echo html_escape(@$hn['news_link_3'])?>" rel="bookmark"><?php echo html_escape(@$hn['news_title_3'])?></a></h3>
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$hn['post_date_as_3']); ?>
                                </div>
                               <!-- read more -->
                               <?php if(@$hn['video_5']!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo html_escape(@$hn['news_link_3']);?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                <a class="readmore pull-right" href="<?php echo html_escape(@$hn['news_link_3'])?>"><i class="pe-7s-angle-right"></i></a>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">

                <!-- ad area two -->
                <div class="<?php echo (html_escape(@$lg_status_12)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_12)==0?'hidden-xs hidden-sm':'')?>"> <!-- add -->
                    <?php echo htmlspecialchars_decode(@$home_12); ?>
                </div><br>

                    <?php if(@$home_page_positions[1]['status']==1){ ?>
                        <div class="col-sm-6 col-md-6">
                            <div class="buisness">
                                <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[1]['slug'])?>"><?php echo html_escape(@$home_page_positions[1]['cat_name']);?></a></h3>

                             

                                <div class="headding-border bg-color-5"></div>
                                <?php  if(@$pn['position_1']['news_title_1']!=NULL){?>
                                
                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                    <!-- post title -->
                                    <h3><a href="<?php echo html_escape(@$pn['position_1']['news_link_1'])?>"><?php echo html_escape(@$pn['position_1']['news_title_1'])?></a></h3>
                                    <!-- post image -->
                                    <div class="post-thumb">
                                        <?php if(@$pn['position_1']['image_check_1']){?>
                                            <a href="<?php echo html_escape(@$pn['position_1']['news_link_1'])?>">
                                                <img src="<?php echo html_escape(@$pn['position_1']['image_large_1'])?>" class="img-responsive" alt="<?php echo html_escape($pn['position_1']['image_alt_1']);?>">
                                            </a>
                                        <?php } else{ ?>
                                            <a href="<?php echo html_escape(@$pn['position_1']['news_link_1'])?>" rel="bookmark">
                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_1']['video_1']);?>/0.jpg" alt="" >
                                            </a>
                                        <?php }?>
                                       
                                    </div>
                                </div>

                                <div class="post-title-author-details">
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_1']['post_date_as_1'])?>
                                        </div>
                                        <!-- post comment -->
                                    </div>
                                    <p>
                                        <?php echo htmlspecialchars_decode(@$pn['position_1']['short_news_1']); ?>
                                        <a href="<?php echo html_escape(@$pn['position_1']['news_link_1'])?>"><?php echo display('read_more');?></a>
                                    </p>
                                </div>
                                <?php }?>

                            <?php for($i=2; $i<=3; $i++){
                                if (!isset($pn['position_1']['news_title_'.$i]))
                                    continue;
                            ?>
                                <div class="box-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <div class="img-thumb">
                                        <?php if(@$pn['position_1']['image_check_'.$i]){?>
                                            <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i])?>" rel="bookmark">
                                                    <img class="entry-thumb" src="<?php echo html_escape(@$pn['position_1']['image_thumb_'.$i])?>" alt="<?php echo html_escape($pn['position_1']['image_alt_'.$i]);?>" height="70" width="100"></a>
                                        <?php } else{ ?>
                                            <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i])?>" rel="bookmark">
                                                <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_1']['video_'.$i]);?>/0.jpg" alt="" height="70" width="100" >
                                            </a>
                                        <?php }?>
                                    </div>
                                    
                                    <div class="item-details">
                                        <h3 class="td-module-title"><a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_1']['news_title_'.$i])?></a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_1']['post_date_as_'.$i])?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>

                        </div>
                    <?php }?>


                    <?php if(@$home_page_positions[2]['status']==1){ ?>
                        <div class="col-sm-6 col-md-6">
                            <div class="international">
                                <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[2]['slug'])?>"><?php echo html_escape(@$home_page_positions[2]['cat_name']);?></a></h3>
                                
                                <div class="headding-border bg-color-2"></div>
                                 <?php if(@$pn['position_2']['news_title_1']!=NULL){?>
                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                    <!-- post title -->
                                    <h3><a href="<?php echo html_escape(@$pn['position_2']['news_link_1'])?>"><?php echo html_escape(@$pn['position_2']['news_title_1'])?></a></h3>
                                    <!-- post image -->
                                    <div class="post-thumb">
                                        <?php if(@$pn['position_2']['image_check_1']){?>
                                            <a href="<?php echo html_escape(@$pn['position_2']['news_link_1'])?>">
                                                        <img src="<?php echo html_escape(@$pn['position_2']['image_large_1'])?>" class="img-responsive" alt="<?php echo html_escape($pn['position_2']['image_alt_1']);?>">
                                                    </a>
                                        <?php } else{ ?>
                                            <a href="<?php echo html_escape(@$pn['position_2']['news_link_1'])?>" rel="bookmark">
                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_2']['video_1']);?>/0.jpg" alt="" >
                                            </a>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="post-title-author-details">
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_2']['post_date_as_1'])?>
                                        </div>
                                    </div>
                                    <p>
                                        <?php
                                            echo htmlspecialchars_decode(@$pn['position_2']['short_news_1']); 
                                        ?>
                                        <a href="<?php echo html_escape(@$pn['position_2']['news_link_1'])?>"><?php echo display('read_more');?></a>
                                    </p>
                                </div>
                                <?php } ?>

                                <?php for($i=2; $i<=3; $i++){
                                    if (!isset($pn['position_2']['news_title_'.$i]))
                                    continue;
                                ?>
                                <div class="box-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <div class="img-thumb">
                                        <?php if(@$pn['position_2']['image_check_'.$i]){?>
                                           <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i])?>" rel="bookmark"><img class="entry-thumb" src="<?php echo html_escape(@$pn['position_2']['image_thumb_'.$i])?>" alt="<?php echo html_escape($pn['position_2']['image_alt_'.$i]);?>" height="70" width="100"></a>
                                        <?php } else{ ?>
                                            <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i])?>" rel="bookmark">
                                                <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_2']['video_'.$i]);?>/0.jpg" alt="" height="70" width="100">
                                            </a>
                                        <?php }?>
                                    </div>
                                    <div class="item-details">
                                        <h3 class="td-module-title"><a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_2']['news_title_'.$i])?></a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i><?php echo html_escape(@$pn['position_2']['post_date_as_'.$i])?>
                                            </div>
                                            <!-- post comment -->
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- /.international -->
                        </div>
                    <?php } ?>

                    <!-- add three -->
                    <div class="<?php echo (html_escape(@$lg_status_13)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_13)==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo htmlspecialchars_decode(@$home_13); ?>
                    </div><br>


                    <?php if ($home_page_positions[3]['status'] == 1) { ?>
                        <section class="politics_wrapper">
                            <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[3]['slug'])?>"><?php echo html_escape(@$home_page_positions[3]['cat_name']);?></a></h3>
                            <div class="headding-border"></div>
                            <div class="row">
                                <div id="content-slide-2" class="owl-carousel">
                                    <!-- item-1 -->
                                    <div class="item">
                                        <div class="row">
                                            <!-- main post -->
                                            <div class="col-sm-6 col-md-6">
                                            <?php if(@$pn['position_3']['news_title_1']!=NULL){?>
                                                <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                                                    <!-- post title -->
                                                    <h3><a href="<?php echo html_escape(@$pn['position_3']['news_link_1']); ?>"><?php echo html_escape(@$pn['position_3']['news_title_1']); ?></a></h3>
                                                    <!-- post image -->
                                                    <div class="post-thumb">
                                                    <?php if(@$pn['position_3']['image_check_1']!=NULL){?>
                                                        <a href="<?php echo html_escape(@$pn['position_3']['news_link_1']); ?>">
                                                            <img src="<?php echo html_escape(@$pn['position_3']['image_large_1']); ?>" class="img-responsive" alt="<?php echo html_escape($pn['position_3']['image_alt_1']);?>">
                                                        </a>
                                                        <?php } else{ ?>
                                                            <a href="<?php echo html_escape(@$pn['position_3']['news_link_1']);?>" rel="bookmark">
                                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_3']['video_1']);?>/0.jpg" alt="" >
                                                            </a>
                                                    <?php }?>
                                                        
                                                    </div>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <div class="post-editor-date">
                                                        <!-- post date -->
                                                        <div class="post-date">
                                                            <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_3']['ptime_1']); ?>
                                                        </div>
                                                        <!-- post comment -->
                                                    </div>
                                                    <p>

                                                <?php
                                                    echo htmlspecialchars_decode(@$pn['position_3']['short_news_1']); 
                                                ?> <a href="<?php echo html_escape(@$pn['position_3']['news_link_1']); ?>"><?php echo display('read_more');?></a>
                                                    </p>
                                                </div>
                                                <?php }?>
                                            </div>


                                            <!-- right side post -->
                                            <div class="col-sm-6 col-md-6">
                                                <div class="row rn_block">
                                                   <?php 
                                                   for($i=2; $i<=5; $i++){
                                                    if (!isset($pn['position_3']['news_title_'.$i]))
                                                    continue;
                                                    ?>
                                                        <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                            <div class="home2-post">
                                                                <!-- post image -->
                                                                <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                                    
                                                                    <?php if(@$pn['position_3']['image_check_'.$i]){?>
                                                                    <a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i]); ?>">
                                                                        <img src="<?php echo html_escape(@$pn['position_3']['image_thumb_'.$i]); ?>" class="img-responsive" alt="<?php echo html_escape($pn['position_3']['image_alt_'.$i]);?>">
                                                                    </a>
                                                                    <?php } else{ ?>
                                                                        <a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i]);?>" rel="bookmark">
                                                                            <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_3']['video_'.$i]);?>/0.jpg" alt="" >
                                                                        </a>
                                                                    <?php }?>
                                                                </div>
                                                                <div class="post-title-author-details">
                                                                    <!-- post image -->
                                                                    <h5><a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_3']['news_title_'.$i]); ?></a></h5>
                                                                    <div class="date">
                                                                        <ul>
                                                                            <li><a title="" href="#"><?php echo html_escape(@$pn['position_3']['post_date_as_'.$i]); ?></a></li>
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
                                            <?php if(@$pn['position_3']['news_title_6']!=NULL){?>
                                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                    <!-- post title -->
                                                    <h3><a href="<?php echo html_escape(@$pn['position_3']['news_link_6']); ?>"><?php echo html_escape(@$pn['position_3']['news_title_6']); ?></a></h3>
                                                    <!-- post image -->
                                                    <div class="post-thumb">
                                                    <?php if(@$pn['position_3']['image_check_6']!=NULL){?>
                                                            <a href="<?php echo html_escape(@$pn['position_3']['news_link_6']); ?>">
                                                            <img src="<?php echo html_escape(@$pn['position_3']['image_large_6']); ?>" class="img-responsive" alt="<?php echo html_escape($pn['position_3']['image_alt_6']);?>">
                                                        </a>
                                                        <?php } else{ ?>
                                                            <a href="<?php echo html_escape(@$pn['position_3']['news_link_6']);?>" rel="bookmark">
                                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_3']['video_6']);?>/0.jpg" alt="" >
                                                            </a>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <div class="post-editor-date">
                                                        <!-- post date -->
                                                        <div class="post-date">
                                                            <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_3']['ptime_6']); ?>
                                                        </div>
                                                        <!-- post comment -->
                                                    </div>
                                                    <p>
                                                <?php
                                                echo htmlspecialchars_decode(@$pn['position_3']['short_news_6'])
                                                ?> <a href="<?php echo html_escape(@$pn['position_3']['news_link_6']); ?>"><?php echo display('read_more');?></a>
                                                    </p>
                                                </div>

                                                <?php }?>
                                            </div>
                                            <!-- right side post -->
                                            <div class="col-sm-6 col-md-6">
                                                <div class="row rn_block">
                                                    <?php 
                                                    for($i=7; $i<=10; $i++){
                                                        if (!isset($pn['position_3']['news_title_'.$i]))
                                                        continue;
                                                    ?>
                                                        <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                            <div class="home2-post">
                                                                <!-- post image -->
                                                                <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                                    <?php if(@$pn['position_3']['image_check_'.$i]!=NULL){?>
                                                                    <a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i]); ?>">
                                                                        <img src="<?php echo html_escape(@$pn['position_3']['image_thumb_'.$i]); ?>" class="img-responsive" alt="<?php echo html_escape($pn['position_3']['image_alt_'.$i]);?>">
                                                                    </a>
                                                                    <?php } else{ ?>
                                                                        <a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i]);?>" rel="bookmark">
                                                                            <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_3']['video_'.$i]);?>/0.jpg" alt="" >
                                                                        </a>
                                                                    <?php }?>

                                                                </div>
                                                                <div class="post-title-author-details">
                                                                    <!-- post image -->
                                                                    <h5><a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_3']['news_title_'.$i]); ?></a></h5>
                                                                    <div class="date">
                                                                        <ul>
                                                                            <li><a title="" href="#"><?php echo html_escape(@$pn['position_3']['post_date_as_'.$i]); ?></a></li>
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
                        </section>
                    <?php } ?>

               
            </div>

            <!-- /.left content inner -->
            <div class="col-md-4 col-sm-4 left-padding">
                
                    <?php
                        $fa = array('method' =>'GET' ); 
                        echo form_open('search',$fa);?>
                        <div class="input-group search-area"> <!-- search area -->
                            <input type="text" class="form-control" placeholder="<?php echo display('search')?>" name="q">
                            <div class="input-group-btn">
                                <button class="btn btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div> <!-- /.search area -->
                    <?php echo form_close();?>

                    <div class="tab-inner">
                            <ul class="tabs">
                                <li><a href="#"><?php echo display('latest_news');?></a></li>
                                <li><a href="#"><?php echo display('most_read'); ?></a></li>
                            </ul><hr> <!-- tabs -->
                            <div class="tab_content">
                                <div class="tab-item-inner">
                                <?php 
                                for($i=1; $i<=4; $i++){ 
                                    if (!isset($ln['news_title_'.$i]))
                                        continue;
                                ?>
                                    <div class="box-item wow fadeIn" data-wow-duration="1s">
                                        <div class="img-thumb">
                                            <?php if(@$ln['image_check_' . $i]!=NULL){?>
                                                 <a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>" rel="bookmark"><img class="entry-thumb" src="<?php echo html_escape(@$ln['image_thumb_' . $i]); ?>" alt="<?php echo html_escape(@$ln['image_alt_'.$i]);?>" height="80" width="90"></a>
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
                                 <?php for($i=1; $i<=4; $i++){ 
                                    if (!isset($mr['news_title_'.$i]))
                                        continue;
                                ?>
                                    <div class="box-item">
                                        <div class="img-thumb">
                                            <?php if(@$mr['image_check_' . $i]!=NULL){?>
                                                 <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" rel="bookmark"><img class="entry-thumb" src="<?php echo html_escape(@$mr['image_thumb_' . $i]); ?>" alt="<?php echo html_escape(@$mr['image_alt_'.$i]);?>" height="80" width="90"></a>
                                            <?php } else{?>
                                            <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" rel="bookmark">
                                            <img  src="http://img.youtube.com/vi/<?php echo html_escape(@$mr['video_' . $i]); ?>/0.jpg" alt=""  height="80" width="90">
                                           </a>
                                            <?php }?>
                                   
                                        </div>
                                        <div class="item-details">
                                            <h6 class="sub-category-title bg-color-5">
                                                <a href="<?php echo html_escape(@$mr['category_link_'.$i]);?>"><?php echo html_escape(@$mr['category_name_'.$i]);?></a>
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

                    <!-- add four -->
                    <div class="banner-add <?php echo (html_escape(@$lg_status_14)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_14)==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo htmlspecialchars_decode(@$home_14); ?>
                    </div>
               
            </div>
        </div>
    </div>



<!-- add five -->
<div class="<?php echo (html_escape(@$lg_status_15)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_15)==0?'hidden-xs hidden-sm':'')?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <?php echo htmlspecialchars_decode(@$home_15); ?>
                </div>
            </div>
        </div>
</div>


    <?php if(@$home_page_positions[4]['status']==1){ ?>
        <section class="news-feed">
            <div class="container">
                <div class="row row-margin">

                    <h3 class="category-headding-two "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[4]['slug'])?>"><?php echo html_escape(@$home_page_positions[4]['cat_name']);?></a></h3>

                    <div class="headding-border bg-color-two"></div>

                    <div id="content-slide-4" class="owl-carousel">
                        <?php for($i=1; $i<=6; $i++){ 
                            if (!isset($pn['position_4']['news_title_'.$i]))
                            continue;
                        ?>
                        <div class="item">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                <div class="img-zoom-in">
                                    <?php if(@$pn['position_4']['image_check_'.$i]){?>
                                        <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i])?>">
                                            <img class="entry-thumb" src="<?php echo html_escape(@$pn['position_4']['image_large_'.$i])?>" alt="<?php echo html_escape($pn['position_4']['image_alt_'.$i]);?>">
                                        </a>
                                    <?php } else{ ?>
                                        <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i])?>" rel="bookmark">
                                            <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_2']['video_'.$i]);?>/0.jpg" alt="" >
                                        </a>
                                    <?php }?>
                                </div>

                                <div class="post-info">
                                    <h3 class="post-title"><a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i])?>" rel="bookmark"><?php echo html_escape(@$pn['position_4']['news_title_'.$i])?> </a></h3>
                                    <div class="post-editor-date">

                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_4']['ptime_'.$i])?>
                                        </div>
                                        <?php if(@$hn['video_'.$i]!=NULL) {?>
                                        <a class="playvideo pull-right" href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i])?>"><i class="fa fa-play-circle-o"></i></a>
                                        <?php } else{?>
                                         <a class="readmore pull-right" href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i])?>"><i class="pe-7s-angle-right"></i></a>
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
    <?php  } ?>

<!-- add six -->
<div class="<?php echo (html_escape(@$lg_status_16)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_16)==0?'hidden-xs hidden-sm':'')?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <?php echo htmlspecialchars_decode(@$home_16); ?>
                </div>
            </div>
        </div><br>
</div>




    <section class="all-category-inner">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-4">
                 <?php if(@$home_page_positions[5]['status']==1){ ?>
                    <!-- sports -->
                    <div class="sports-inner">
                        <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[5]['slug'])?>"><?php echo html_escape(@$home_page_positions[5]['cat_name']);?></a></h3>
                        <div class="headding-border bg-color-1"></div>
                         <?php if(@$pn['position_5']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_5']['news_link_1'])?>"><?php echo html_escape(@$pn['position_5']['news_title_1'])?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">
                            <?php if(@$pn['position_5']['image_check_1']){?>
                              <a href="<?php echo html_escape(@$pn['position_5']['news_link_1'])?>">
                                    <img src="<?php echo html_escape(@$pn['position_5']['image_large_1'])?>" class="img-responsive" alt="<?php echo html_escape($pn['position_5']['image_alt_1']);?>">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$pn['position_5']['news_link_1'])?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_5']['video_1']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>

                                
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_5']['post_date_as_1'])?>
                                </div>
                                <!-- post comment -->
                            </div>
                                <?php
                                    echo htmlspecialchars_decode(@$pn['position_5']['short_news_1']); 
                                ?>
                                <a href="<?php echo html_escape(@$pn['position_5']['news_link_1'])?>"><?php echo display('read_more');?></a>
                        
                        </div>
                        <?php }?>
                    </div>
                     <?php } ?>
                </div>
                <!-- /.sports -->
                <div class="col-md-4 col-sm-4">
                <?php if(@$home_page_positions[6]['status']==1){?>
                    <!-- fashion -->
                    <div class="fashion-inner">
                        <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[6]['slug'])?>"><?php echo html_escape(@$home_page_positions[6]['cat_name'])?></a></h3>
                        <div class="headding-border bg-color-4"></div>
                         <?php if(@$pn['position_6']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_6']['news_link_1'])?>">
                            <?php echo html_escape(@$pn['position_6']['news_title_1'])?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                            <?php if(@$pn['position_6']['image_check_1']){?>
                              <a href="<?php echo html_escape(@$pn['position_6']['news_link_1'])?>">
                                    <img src="<?php echo html_escape(@$pn['position_6']['image_large_1'])?>" class="img-responsive" alt="<?php echo html_escape(@$pn['position_6']['image_alt_1']);?>">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$pn['position_6']['news_link_1'])?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_6']['video_1']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                                
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_6']['post_date_as_1'])?>
                                </div>
                                <!-- post comment -->
                            </div>
                                <?php
                                    echo  htmlspecialchars_decode(@$pn['position_6']['short_news_1']); 
                                ?>
                                <a href="<?php echo html_escape(@$pn['position_6']['news_link_1'])?>"><?php echo display('read_more');?></a>
                            
                        </div>
                        <?php }?>
                    </div>
                    <?php }?>
                </div>
                <!-- /.fashion -->
                <div class="col-md-4 col-sm-4">
                <?php if(@$home_page_positions[7]['status']==1){?>
                    <!-- travel -->
                    <div class="travel-inner">
                        <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[7]['slug'])?>"><?php echo html_escape($home_page_positions[7]['cat_name'])?></a></h3>
                        <div class="headding-border bg-color-3"></div>
                         <?php if(@$pn['position_7']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_7']['news_link_1'])?>"><?php echo html_escape(@$pn['position_7']['news_title_1'])?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                            <?php if(@$pn['position_7']['image_check_1']){?>
                               <a href="<?php echo html_escape(@$pn['position_7']['news_link_1'])?>">
                                    <img src="<?php echo html_escape(@$pn['position_7']['image_large_1'])?>" class="img-responsive" alt="<?php echo html_escape($pn['position_7']['image_alt_1']);?>">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$pn['position_7']['news_link_1'])?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_7']['video_1']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>

                               
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_7']['post_date_as_1'])?>
                                </div>
                                <!-- post comment -->
                            </div>                                
                                <?php
                                    echo htmlspecialchars_decode(@$pn['position_7']['short_news_1']); 
                                ?>
                                <a href="<?php echo html_escape(@$pn['position_7']['news_link_1'])?>"><?php echo display('read_more');?></a>
                            
                         </div>
                         <?php }?>
                    </div>
                </div>
                <?php } ?>
                <!-- /.travel -->
            </div>


            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <?php if(@$home_page_positions[8]['status']==1){?>
                    <!-- food -->
                    <div class="food-inner">
                        <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[8]['slug'])?>"><?php echo html_escape(@$home_page_positions[8]['cat_name'])?></a></h3>
                        <div class="headding-border bg-color-4"></div>
                         <?php if(@$pn['position_8']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_8']['news_link_1'])?>"><?php echo html_escape(@$pn['position_8']['news_title_1'])?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                            <?php if(@$pn['position_8']['image_check_1']){?>
                               <a href="<?php echo html_escape(@$pn['position_8']['news_link_1'])?>">
                                    <img src="<?php echo html_escape(@$pn['position_8']['image_large_1'])?>" class="img-responsive" alt="<?php echo html_escape($pn['position_8']['image_alt_1']);?>">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$pn['position_8']['news_link_1'])?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_8']['video_1']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_8']['post_date_as_1'])?>
                                </div>
                                <!-- post comment -->
                            </div>
                            
                                <?php
                                echo htmlspecialchars_decode(@$pn['position_8']['short_news_1']); 
                                ?>
                                <a href="<?php echo html_escape(@$pn['position_8']['news_link_1'])?>"><?php echo display('read_more');?></a>

                       </div>
                       <?php }?>
                    </div>
                    <?php }?>
                </div>

                <div class="col-md-4 col-sm-4">
                    <?php if(@$home_page_positions[9]['status']==1){?>
                    <!-- politics -->
                    <div class="politics-inner">
                        <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[9]['slug'])?>"><?php echo html_escape($home_page_positions[9]['cat_name'])?></a></h3>
                        <div class="headding-border bg-color-5"></div>
                         <?php if(@$pn['position_9']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_9']['news_link_1'])?>"><?php echo html_escape(@$pn['position_9']['news_title_1'])?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                            <?php if(@$pn['position_9']['image_check_1']){?>
                                <a href="<?php echo html_escape(@$pn['position_9']['news_link_1'])?>">
                                    <img src="<?php echo html_escape(@$pn['position_9']['image_large_1'])?>" class="img-responsive" alt="<?php echo html_escape($pn['position_9']['image_alt_1']);?>">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$pn['position_9']['news_link_1'])?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_9']['video_1']);?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                                
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_9']['post_date_as_1'])?>
                                </div>
                                <!-- post comment -->
                            </div>
                          
                                <?php echo htmlspecialchars_decode(@$pn['position_9']['short_news_1']); ?>
                                <a href="<?php echo html_escape(@$pn['position_9']['news_link_1'])?>"><?php echo display('read_more');?></a>
                            
                         </div>
                         <?php }?>
                    </div>
                    <?php }?>
                </div>

                <div class="col-md-4 col-sm-4">
                    <?php if(@$home_page_positions[10]['status']==1){?>
                    <!-- health -->
                    <div class="health-inner">
                        <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[10]['slug'])?>"><?php echo html_escape($home_page_positions[10]['cat_name'])?></a></h3>
                        <div class="headding-border bg-color-3"></div>
                         <?php if(@$pn['position_10']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo html_escape(@$pn['position_10']['news_link_1'])?>"><?php echo html_escape(@$pn['position_10']['news_title_1'])?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                                <?php if(@$pn['position_10']['image_check_1']){?>
                                    <a href="<?php echo html_escape(@$pn['position_10']['news_link_1'])?>">
                                    <img class="img-responsive" src="<?php echo html_escape(@$pn['position_10']['image_thumb_1'])?>" alt="<?php echo html_escape($pn['position_10']['image_alt_1']);?>">
                                </a>
                                    <?php } else{ ?>
                                        <a href="<?php echo html_escape(@$pn['position_10']['news_link_1'])?>" rel="bookmark">
                                            <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_10']['video_1']);?>/0.jpg" alt="" >
                                        </a>
                                    <?php }?>
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_10']['post_date_as_1'])?>
                                </div>
                                <!-- post comment -->
                            </div>
                        
                                <?php
                                    echo  htmlspecialchars_decode(@$pn['position_10']['short_news_1']); 
                                ?>
                                <a href="<?php echo html_escape(@$pn['position_10']['news_link_1'])?>"><?php echo display('read_more');?></a>
                            
                        </div>
                        <?php }?>
                    </div>
                    <?php }?>
                </div>

            </div>

        </div>
    </section>

    <!-- add seven -->
    <div class="<?php echo (html_escape(@$lg_status_17)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_17)==0?'hidden-xs hidden-sm':'')?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <?php echo htmlspecialchars_decode(@$home_17); ?>
                </div>
            </div>
        </div>
    </div><br>



    <div class="lat_arti_cont_wrap">

        <div class="container">
            <div class="row">
                <div class="col-sm-8">

                    <?php

                    if(@$home_page_positions[11]['status']==1){?>
                    <section class="articale-inner">
                        <h3 class="category-headding "><a href="<?php echo base_url('category/').html_escape(@$home_page_positions[11]['slug'])?>"><?php echo html_escape($home_page_positions[11]['cat_name'])?></a></h3>
                        <div class="headding-border"></div>

                        <div class="row">
                            <div id="content-slide-5" class="owl-carousel">
                                <!-- item-1 -->
                                <div class="item">
                                    <div class="row rn_block">
                                    <?php for($i=1; $i<=6; $i++){
                                        if (!isset($pn['position_11']['news_title_'.$i]))
                                        continue;
                                    ?>
                                        <div class="col-xs-6 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                <!-- image -->
                                                <div class="post-thumb">
                                                    
                                                    <?php if(@$pn['position_11']['image_check_'.$i]){?>
                                                        <a href="<?php echo html_escape(@$pn['position_11']['news_link_'.$i])?>">
                                                        <img class="img-responsive" src="<?php echo html_escape(@$pn['position_11']['image_thumb_'.$i])?>" alt="<?php echo html_escape($pn['position_11']['image_alt_1']);?>">
                                                    </a>

                                                    <?php } else{ ?>
                                                        <a href="<?php echo html_escape(@$pn['position_11']['news_link_'.$i])?>" rel="bookmark">
                                                            <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo html_escape(@$pn['position_11']['video_'.$i]);?>/0.jpg" alt="" >
                                                        </a>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><a href="<?php echo html_escape(@$pn['position_11']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_11']['news_title_'.$i])?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_11']['ptime_'.$i])?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <!-- item-2 -->
                                <div class="item">
                                    <div class="row rn_block">
                                    <?php for($i=7; $i<=12; $i++){
                                        if (!isset($pn['position_11']['news_title_'.$i]))
                                    continue;
                                    ?>
                                        <div class="col-xs-6 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                <!-- image -->
                                                <div class="post-thumb">
                                                    <a href="<?php echo html_escape(@$pn['position_11']['news_link_'.$i])?>">
                                                        <img class="img-responsive" src="<?php echo html_escape(@$pn['position_11']['image_large_'.$i])?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="<?php echo html_escape(@$pn['position_11']['news_link_'.$i])?>" class="post-badge btn_five"><?php echo html_escape(@$pn['position_11']['category_'.$i])?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><a href="<?php echo html_escape(@$pn['position_11']['news_link_'.$i])?>"><?php echo html_escape(@$pn['position_11']['news_title_'.$i])?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo html_escape(@$pn['position_11']['ptime_'.$i])?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php }?>

                </div>


                 <!-- /.article -->
                <div class="col-sm-4 left-padding">
                    <aside>
                        

                        <!-- archive calander -->
                        <div class="archive" >
                            <span class=" category-headding"><?php echo display('archive')?></span>
                            <div class="headding-border"></div>
                            <div class="calendar_part">
                                <div id="datepicker"></div>
                            </div>
                        </div> 


                    </aside>
                </div>

                

            </div>
        </div>
    </div>

    <!-- add eight -->
    <div class="<?php echo (html_escape(@$lg_status_18)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_18)==0?'hidden-xs hidden-sm':'')?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <?php echo htmlspecialchars_decode(@$home_18); ?>
                </div>
            </div>
        </div>
    </div><br>


    