<?php
    if (isset($ads) && is_array(@$ads)) {
        extract($ads);
    }
    $bu = base_url();
    include('common_file/function.php');
    $ascurl = base_url().'application/views/themes/'.html_escape($default_theme).'/web-assets';
    $CI =& get_instance();
    $CI->load->model('settings');
    $ot = json_decode($CI->settings->get_previous_settings('settings', 115));
if($photo){
        $reporterImg = base_url().$photo;
    }else{
        $reporterImg = $ascurl.'/images/avatar1.jpg';
    }

?>

<?php 
    $imgurl = ($image_base_url?$image_base_url:base_url());
    $img_url = $imgurl.'uploads/'.$image; 
    $ext = explode(".", @$file_name);
    $ext = end($ext);
?>

<link href="<?php echo $ascurl; ?>/css/audio.css?<?php echo version() ?>" rel="stylesheet">



            <!-- /.End of banner content -->
            <div class="page-content">


                <div class="container">
                    <div class="row mt-5">
                        <main class="col-lg-8 col-xl-9 content p_r_40">
                            <div class="details-body">
                                <div class="post_details stickydetails">
                                    <div class="mb-4 <?php echo (html_escape(@$lg_status_31)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_31)==0?'d-xs-none':'')?>">
                                        <?php echo htmlspecialchars_decode(@$news_view_31); ?>
                                    </div>
                                    
                                    <header class="details-header mt-4">

                                        <div class="post-cat">
                                            <?php 
                                            if(!empty($tags)){
                                            foreach($tags as $val){
                                                $tag  = str_replace('-', ' ', $val->tag); 
                                            ?>
                                            <a href="<?php  echo base_url('tag/'). @$val->tag?>"><?php echo html_escape(@$tag)?></a>
                                            <?php } }?>
                                                    
                                        </div>

                                        <h2><?php echo htmlspecialchars_decode(strip_tags($title)); ?></h2>

                                        <div class="element-block">
                                            <div class="entry-meta">
                                                <span class="entry-date"><i class="fa fa-calendar-o" ></i>
                                                    <?php 
                                                    $strtime = strtotime($post_date);
                                                    $converted_date = convertDate(date('l, d M, Y', $strtime)); 
                                                    echo $converted_date;?>
                                                </span>
                                            </div>
                                        </div>

                                    </header>


                                    <div class="gallery_post popup-gallery">
                                        <figure class="effect-lily">

                                            <?php if($ext=='mp3'){ ?>

                                                <div class="audio_part mb-4">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <?php 
                                                                if($image){
                                                                    echo'<img src="'. html_escape($img_url).'" class="img-fluid img-cover">';
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <h4 class="audio_title"><?php echo htmlspecialchars_decode(strip_tags($title)); ?></h4>
                                                            <p class="audio_sub"><?php echo time_elaps_test($post_date, $time_stamp);?></p>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="audiofile" value="<?php echo $adiourl = $podcust_url.'uploads/podcasts/'.$file_name?>">
                                                    <?php //echo $adiourl = $podcust_url.'uploads/podcasts/'.$file_name?>
                                                    
                                                    <div class="audio-player">
                                                        <div class="timeline">
                                                            <div class="progress"></div>
                                                        </div>
                                                        <div class="controls">
                                                            <div class="play-container">
                                                                <div class="toggle-play play">
                                                                </div>
                                                            </div>
                                                            <div class="time">
                                                                <div class="current">0:00</div>
                                                                <div class="divider">/</div>
                                                                <div class="length"></div>
                                                            </div>
                                                            <div class="volume-container">
                                                                <div class="volume-button">
                                                                    <div class="volume icono-volumeMedium">
                                                                        <i class="fa fa-volume-down"></i>
                                                                    </div>
                                                                </div>

                                                                <div class="volume-slider">
                                                                    <div class="volume-percentage"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>

                                            <?php if($ext=='mp4'){?>
                                                <video width="100%"controls>
                                                    <source src="<?php echo $podcust_url.'uploads/podcasts/'.$file_name?>" type="video/mp4">
                                                    <source src="example.webm" type="video/webm">
                                                </video>
                                            <?php } ?>

                                            
                                            <?php

                                                if ($videos!=NULL) {

                                                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $videos, $match)) {
                                                        $videos = $match['1']; 
                                                    }else{
                                                        $videos = '';
                                                    }
                                                    echo '<iframe width="100%" height="470px" src="https://www.youtube.com/embed/' . html_escape($videos) . '" frameborder="0" allowfullscreen></iframe>';
                                                
                                                }else{
                                                    if(isset($image) && $ext!='mp4'){
                                                        echo'<img src="'. html_escape($img_url).'" class="img-fluid" width="100%">';
                                                    }
                                                }

                                            ?>
                                        </figure>
                                    </div>

                                    <div class="media posted_by align-items-center mb-4 d-flex">
                                        <img class="mr-2 post_img" src="<?php echo @$reporterImg;?>" alt="Generic placeholder image"> 
                                        <div class="media-body">
                                            <div class="mt-0"> &nbsp;&nbsp;<?php echo html_escape(strip_tags($name)); ?></div>
                                        </div>
                                    </div>


                                    <?php echo htmlspecialchars_decode($news); ?>

                                    <?php if($reference!=NULL){?>
                                        <b><?php echo html_escape($reference);?></b>
                                    <?php } ?>

                                    <?php $share_link = base_url().$this->uri->segment(1);?>

                                    <div class="share-btn">
                                        <ul>
                                            <li><a class="facebook" href="javascript:void(0)"  onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_link?>', 'Share This Post', 'width=640,height=450');return false"><i class="fa  fa-facebook"></i> </a></li>

                                            <li><a class="twitter" href="javascript:void(0)" onclick="window.open('https://twitter.com/share?url=<?php echo $share_link?>&amp;text=<?php echo html_escape(strip_tags($title)); ?>', 'Share This Post', 'width=640,height=450');return false" ><i class="fa  fa-twitter"></i></a></li>

                                            <li><a class="linkedin" href="javascript:void(0)" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $share_link?>', 'Share This Post', 'width=640,height=450');return false" ><i class="fa fa-linkedin"></i> </a></li>

                                            <li><a class="whatsapp" href="https://api.whatsapp.com/send?text=<?php echo $title?> - <?php echo $share_link?>"  target="_blank"><i class="fa fa-whatsapp"></i>  </a></li>
                                            
                                            <li><a class="pinterest" href="javascript:void(0)" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo $share_link?>;media=<?php echo $img_url?>', 'Share This Post', 'width=640,height=450');return false" ><i class="fa fa-pinterest"></i>  </a></li>

                                            <li><a class="tumblr" href="javascript:void(0)" onclick="window.open('http://www.tumblr.com/share/link?url=<?php echo $share_link?>;title=<?php echo $title?>', 'Share This Post', 'width=640,height=450');return false" ><i class="fa fa-tumblr"></i>  </a></li>
                                            
                                        </ul>
                                    </div>
                                    <!-- /.social icon -->
                                </div>
                            </div>


                            <!-- /.End of details body -->
                            <div class="mb-4 <?php echo (html_escape(@$lg_status_32)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_32)==0?'d-xs-none':'')?>">
                                <?php echo htmlspecialchars_decode(@$news_view_32); ?>  
                            </div>


                            
                            <div class="row mt-4">

                                <div class="col-md-12">
                                    <div class="sec-block mb-4">
                                        <a href="<?php echo html_escape(@$sn['hn']['category_link_1']) ?>" class="sec-title"><?php echo  display('related_news'); ?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                        <div class="btn-part">
                                            <a href="<?php echo html_escape(@$sn['hn']['category_link_1']) ?>" class="btn-more"><?php echo display('read_more')?></a>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    for ($i = 2; $i <= 7; $i++) {

                                        if (!isset($sn['hn']['title_' . $i]))
                                            continue;
                                ?>

                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <article class="grid_post grid_post_lg text-xs-center">
                                        <figure>
                                            <?php if (@$sn['hn']['image_check_' . $i]!=NULL) {?>
                                                <a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i])?>" class="grid_image">
                                                    <?php echo @$sn['hn']['playbtn_'.$i]?>
                                                    <img class="img-fluid img_cover full_width" src="<?php echo html_escape(@$sn['hn']['image_thumb_' . $i]);?>" alt="">
                                                </a>
                                            <?php  } else { ?>
                                                <a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i])?>" class="grid_image">
                                                    <?php echo @$sn['hn']['playbtn_'.$i]?>
                                                    <img class="img-fluid img_cover full_width" src="<?php echo html_escape(@$sn['hn']['default_img_' . $i]);?>" alt="">
                                                </a>
                                            <?php }?> 

                                            <figcaption>
                                                <div class="vh_center">
                                                    <div class="post-cat"><a href="<?php echo html_escape(@$sn['hn']['category_link_' . $i]) ?>"><?php echo html_escape(@$sn['hn']['category_name_' . $i]) ?></a></div>
                                                    <div class="entry-meta">
                                                        <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i></i> <?php echo @$sn['hn']['post_date_as_' . $i]; ?></span>
                                                    </div>
                                                </div>
                                                <h5 class="grid_post_title"><a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i]) ?>" class="line_height_25"><?php echo htmlspecialchars_decode(@$sn['hn']['news_title_' . $i]) ?></a></h5>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>

                                <?php } ?>
                                
                            </div>


                            <div class="mb-4 <?php echo (html_escape(@$lg_status_33)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_33)==0?'d-xs-none':'')?>">
                                <?php echo htmlspecialchars_decode(@$news_view_33); ?>  
                            </div>

                            <?php 
                                if($ot->comments_status=='1'){
                                    $this->load->view('themes/'.html_escape($default_theme).'/__comments_view');
                                }
                            ?>

                        </main>


                        <aside class="col-lg-4 col-xl-3 rightSidebar show-lg">

                            <div class="<?php echo (html_escape(@$lg_status_34)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_34)==0?'d-xs-none':'')?>">
                                <?php echo htmlspecialchars_decode(@$news_view_34); ?>  
                            </div>

                            <?php 
                                $this->load->view('themes/' . $default_theme . '/components/__most_read');
                            ?>

                            <div class="<?php echo (html_escape(@$lg_status_35)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_35)==0?'d-xs-none':'')?>">
                                <?php echo htmlspecialchars_decode(@$news_view_35); ?>  
                            </div>


                            <?php 
                                $this->load->view('themes/' . $default_theme . '/components/__site_category');
                            ?>

                            <div class="mt-4 <?php echo (html_escape(@$lg_status_36)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_36)==0?'d-xs-none':'')?>">
                                <?php echo htmlspecialchars_decode(@$news_view_36); ?>  
                            </div>


                        </aside>

                    </div>

                    <div class="row ad_area my-4">
                        <div class="col-md-12">
                            <div class="<?php echo (html_escape(@$lg_status_37)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_37)==0?'d-xs-none':'')?>">
                                <?php echo htmlspecialchars_decode(@$news_view_37); ?>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        

        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
        <script src="<?php echo base_url()?>assets/dist/js/comments.js"></script>
        <script src="<?php echo $ascurl; ?>/js/audio.js"></script>

