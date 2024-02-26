<?php
    if (isset($ads) && is_array(@$ads)) {
        extract($ads);
    }
    $bu = base_url();
    include('common_file/function.php');
    $CI =& get_instance();
    $CI->load->model('settings');
    $ot = json_decode($CI->settings->get_previous_settings('settings', 115));
?>



<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <article class="content">

                <!-- ad area one -->
                <div class="banner-add <?php echo (html_escape(@$lg_status_31)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_31)==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo @$news_view_31; ?>
                </div>
                    
                <div class="post-thumb">
                    <?php 
                        $imgurl = ($image_base_url?$image_base_url:base_url());
                        $img_url = $imgurl.'uploads/'.$image; ?>

                        <?php
                            if ($videos!=NULL) {
                                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $videos, $match)) {
                                        $videos = $match['1']; 
                                    }else{
                                        $videos = '';
                                    }
                                echo '<iframe width="100%" height="370px" src="https://www.youtube.com/embed/' . html_escape($videos) . '" frameborder="0" allowfullscreen></iframe>';
                            }else{
                                if($image){
                                    echo'<img src="'. html_escape($img_url).'" class="img-responsive" width="100%" alt="'.$image_alt.'">';
                                }
                            }   
                        ?>
                </div>


                <div class="post-body">

                    <?php $share_link = base_url().$this->uri->segment(1);?>

                    <div class="share-btn">
                        <ul>
                            <li><a class="facebook" href="javascript:void(0)"  onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_link?>', 'Share This Post', 'width=640,height=450');return false"><i class="fa  fa-facebook"></i> </a></li>

                            <li><a class="twitter" href="javascript:void(0)" onclick="window.open('https://twitter.com/share?url=<?php echo $share_link?>&amp;text=<?php echo html_escape(strip_tags($title)); ?>', 'Share This Post', 'width=640,height=450');return false" ><i class="fa  fa-twitter"></i></a></li>

                            <li><a class="linkedin" href="javascript:void(0)" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $share_link?>', 'Share This Post', 'width=640,height=450');return false" ><i class="fa fa-linkedin"></i> </a></li>

                            <li><a class="whatsapp" href="https://api.whatsapp.com/send?text=<?php echo $title?> - <?php echo $share_link?>"  target="_blank"><i class="fa fa-whatsapp"></i>  </a></li>
                            
                            <li><a class="pinterest" href="javascript:void(0)" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo $share_link?>;media=<?php echo $img_url?>', 'Share This Post', 'width=640,height=450');return false" ><i class="fa fa-pinterest"></i>  </a></li>

                            <li><a class="tumblr" href="javascript:void(0)" onclick="window.open('http://www.tumblr.com/share/link?url=<?php echo $share_link?>;title=<?php echo $title?>', 'Share This Post', 'width=640,height=450');return false" ><i class="fa fa-tumblr"></i>  </a></li>
                            
                            <li><a class="print" href="<?php echo html_escape($bu) . 'Print_article/print_page/' . $news_id; ?>" class="icon_n_d"  target="_blank" title="Click to Print"><i class="fa fa-print" aria-hidden="true"></i></a></li>
                        </ul>

                    </div>
                    <!-- /.social icon -->
            
                    <p class="short-head"><?php echo htmlspecialchars_decode(strip_tags(@$stitle));?></p>
                    <h1><?php echo htmlspecialchars_decode(strip_tags($title)); ?></h1>
                    <div class="date">
                        <ul>
                            <li><?php echo display('by')?> <a title="" href="#"><span><?php echo html_escape(strip_tags($name)); ?></span></a> --</li>
                            <li><a>
                                    <?php 
                                        $strtime = strtotime($post_date);
                                        $converted_date = convertDate(date('l, d M, Y', $strtime)); 
                                        echo $converted_date;
                                    ?>   
                                </a> 
                            </li>
                        </ul>
                    </div>

                    <!-- ad area two -->
                    <div class="banner-add <?php echo (html_escape(@$lg_status_32)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_32)==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo @$news_view_32; ?>
                    </div>


                    <div id="DetailsNews" >       
                        <?php echo htmlspecialchars_decode($news); ?>

                        <?php if($reference!=NULL){?>
                            <b><?php echo html_escape($reference);?></b>
                        <?php } ?>
                    </div>

                    
                    <!-- ad area three -->
                    <div class="<?php echo (html_escape(@$lg_status_33)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_33)==0?'hidden-xs hidden-sm':'')?>">
                     <?php echo @$news_view_33; ?>
                    </div>

            </div>
                

                    <div class="tags">
                        <ul>
                            <?php 
                            if(!empty($tags)){
                            foreach($tags as $val){
                                $tag  = str_replace('-', ' ', $val->tag); 
                            ?>
                            <li> <a href="<?php  echo base_url('tag/'). @$val->tag?>"><?php echo html_escape(@$tag)?></a></li>
                            <?php } }?>
                            
                        </ul>
                    </div>


                <!-- Related news area
                ============================================ -->
                <div class="related-news-inner">
                    <h3 class="category-headding "> <?php echo  display('related_news'); ?></h3>
                    <div class="headding-border"></div>
                    <div class="row">
                        <div id="content-slide-5" class="owl-carousel">
                            <!-- item-1 -->
                            <div class="item">
                                <div class="row rn_block">

                                    <?php
                                    for ($i = 2; $i <= 4; $i++) {
                                        if (!isset($sn['hn']['title_' . $i]))
                                            continue;
                                        ?>
                                    
                                        <div class="col-xs-12 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s"><!-- image -->
                                                <div class="post-thumb">
                                                    <?php
                                                        if (@$sn['hn']['image_check_' . $i]!=NULL) {
                                                    ?>
                                                    <a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i])?>">
                                                        <img class="img-responsive" src="<?php echo html_escape(@$sn['hn']['image_thumb_' . $i]);?>" alt="">
                                                    </a>
                                                    <?php  } else {?>
                                                        <a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i])?>">
                                                            <img class="img-responsive" src="<?php echo html_escape(@$sn['hn']['default_img_' . $i]);?>" alt="">
                                                        </a>
                                                    <?php }?>                                                
                                                </div>
                                                
                                            </div>

                                            <div class="post-title-author-details">
                                                <h4><a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i]) ?>"><?php echo htmlspecialchars_decode(@$sn['hn']['news_title_' . $i]); ?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo  html_escape(@$sn['hn']['post_date_as_' . $i]); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>


                            <!-- item-2 -->
                            <div class="item">
                                <div class="row rn_block">
                                    <?php
                                    for ($i = 4; $i <= 6; $i++) {
                                        if (!isset($sn['hn']['title_' . $i]))
                                            continue;
                                        ?>

                                        <div class="col-xs-12 col-md-4 col-sm-4 padd">
                                            
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s"><!-- image -->
                                                <div class="post-thumb">
                                                    <?php
                                                        if (@$sn['hn']['image_check_' . $i]!=NULL) {
                                                    ?>
                                                    <a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i])?>">
                                                        <img class="img-responsive" src="<?php echo html_escape(@$sn['hn']['image_thumb_' . $i]);?>" alt="">
                                                    </a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i])?>">
                                                            <img class="img-responsive" src="<?php echo htmlspecialchars_decode(@$sn['hn']['default_img_' . $i]);?>" alt="">
                                                        </a>
                                                    <?php }?>                                                
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="<?php echo base_url(). html_escape(@$sn['hn']['category_' . $i]); ?>" class="post-badge btn_five"><?php echo html_escape(@$sn['hn']['category_' . $i]); ?></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="post-title-author-details">
                                                <h4><a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i]) ?>"><?php echo html_escape(@$sn['hn']['news_title_' . $i]); ?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo html_escape(@$sn['hn']['post_date_as_' . $i]); ?>
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

                <!-- ad area four -->
                <div class="banner-add <?php echo (html_escape(@$lg_status_34)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_34)==0?'hidden-xs hidden-sm':'')?>">
                 <?php echo @$news_view_34; ?>
                </div><br>
                <?php 
                    if(@$ot->comments_status=='1'){
                        $this->load->view('themes/'.html_escape($default_theme).'/__comments_view');
                    }
                ?>
                <!-- ad area five -->
                <div class="banner-add <?php echo (html_escape(@$lg_status_35)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_35)==0?'hidden-xs hidden-sm':'')?>">
                 <?php echo @$news_view_35; ?>
                </div><br>


                
            </article>
        </div>



        <div class="col-sm-4 left-padding">
            <aside class="sidebar">

                <!-- ad area five -->
                <div class="banner-add <?php echo (html_escape(@$lg_status_36)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_36)==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo @$news_view_36; ?>
                </div>

                <?php if (@$social_page->fb && ($social_page->status=='1')) { ?>
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
                <?php }?>


                <?php if(!empty($post_table_of_content)){?>
                    <div class="sectionNav">
                        <h3>Table Of Contents</h3>
                        <ul class="section-nav">
                        <?php foreach($post_table_of_content as $val){?>
                            <li class="toc-entry"><a class="js-scroll-trigger" href="#<?php echo @$val->section_id?>"><?php echo @$val->section_name?></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                    <br><br>
                <?php } ?>


                <div class="tab-inner">
                        <ul class="tabs">
                            <li><a href="#"><?php echo display('latest_news');?></a></li>
                            <li><a href="#"><?php echo display('most_read');?></a></li>
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
                                        <?php if(@$ln['image_check_' . $i]!=NULL){?>
                                        <a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>" rel="bookmark">
                                             <img class="entry-thumb" src="<?php echo html_escape(@$ln['image_thumb_' . $i]); ?>" alt="" height="80" width="90">
                                        </a>
                                       <?php } else{?>
                                        <a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>" rel="bookmark">
                                             <img class="entry-thumb" src="<?php echo html_escape(@$ln['default_img_' . $i]); ?>" alt="" height="80" width="90">
                                        </a>
                                        <?php }?>
                                    </div>

                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-1">
                                            <a href="<?php echo html_escape(@$ln['category_link_'.$i]);?>"><?php echo html_escape(@$ln['category_'.$i]);?></a>
                                        </h6>
                                        <h3 class="td-module-title"><a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>"><?php echo htmlspecialchars_decode(@$ln['news_title_'.$i]);?></a></h3>
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
                            <?php 
                             for($i=1; $i<=3; $i++){ 
                                if(!isset($mr['news_title_'.$i]))
                                continue
                            ?>
                                <div class="box-item">
                                    <div class="img-thumb">
                                        <?php if(@$mr['image_check_' . $i]!=Null){?>
                                            <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" rel="bookmark"><img class="entry-thumb" src="<?php echo html_escape(@$mr['image_thumb_' . $i]); ?>" alt="" height="80" width="90"></a>
                                        <?php } else{?>
                                             <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" rel="bookmark"><img class="entry-thumb" src="<?php echo html_escape(@$mr['default_img_' . $i]); ?>" alt="" height="80" width="90"></a>
                                        <?php }?>
                               
                                    </div>

                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-5">
                                            <a href="<?php echo html_escape(@$mr['category_link_'.$i]);?>"><?php echo html_escape(@$mr['category_'.$i]);?></a>
                                        </h6>
                                        <h3 class="td-module-title">
                                        <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"><?php echo htmlspecialchars_decode(@$mr['news_title_'.$i]);?></a>
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
                </div> <!-- / tab -->

                <!-- ad area seven -->
                <div class="banner-add <?php echo (html_escape(@$lg_status_37)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_37)==0?'hidden-xs hidden-sm':'')?>"> <!-- add -->
                    <span class="add-title"></span>
                    <?php echo @$news_view_37; ?>
                </div>
               
                <!-- slider widget -->
                <div class="widget-slider-inner">
                    <h3 class="category-headding "><?php echo  html_escape(@$Editor['hn']['category_1']); ?></h3>
                    <div class="headding-border"></div>
                    <div id="widget-slider" class="owl-carousel owl-theme">
                        <!-- widget item -->
                            <?php 
                            for($i=1;$i<=3;$i++){
                                if(!isset($Editor['hn']['news_title_'.$i]))
                                    continue
                            ?>
                            <div class="item">

                                <a href="<?php echo html_escape(@$Editor['hn']['news_link_'.$i])?>">
                                <?php
                                    if (@$Editor['hn']['image_check_'.$i]!=NULL) {
                                          echo'<img  src="'. html_escape(@$Editor['hn']['image_thumb_'.$i]).'" alt="">';
                                    } else {
                                         echo'<img  src="'. html_escape(@$Editor['hn']['default_img_'.$i]).'" alt="">';
                                    }
                                    ?>
                                </a>
                                <h4><a href="<?php echo html_escape(@$Editor['hn']['news_link_'.$i])?>"><?php echo htmlspecialchars_decode(@$Editor['hn']['news_title_'.$i])?></a></h4>
                                <div class="date">
                                    <ul>
                                        <li><?php echo display('by')?><a><span><?php echo html_escape(@$Editor['hn']['post_by_name_'.$i])?></span></a> --</li>
                                        <li><a><?php echo html_escape(@$Editor['hn']['post_date_as_'.$i]);?></a></li>
                                    </ul>
                                </div>
                                <?php 
                                    $news_details = @$Editor['hn']['full_news_'.$i];
                                    $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                    echo htmlspecialchars_decode($exploded);
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                
                <!-- ad area eight -->
                <div class="banner-add <?php echo (html_escape(@$lg_status_38)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_38)==0?'hidden-xs hidden-sm':'')?>"> <!-- add -->
                    <span class="add-title"></span>
                    <?php echo @$news_view_38; ?>
                </div>

              
            </aside>
        </div>
    </div>
</div>

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">

<script src="<?php echo base_url()?>assets/dist/js/comments.js"></script>

