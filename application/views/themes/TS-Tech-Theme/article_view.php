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
<?php 
    $imgurl = ($image_base_url?$image_base_url:base_url());
    $img_url = $imgurl.'uploads/'.$image; 
    $ext = explode(".", @$file_name);
    $ext = end($ext);
?>



<div class="container">
   

        <?php $status = $this->session->flashdata('status');?>

        <?php if($status){?>
            <div class="alert alert-success " style="margin-top: 20px;" >
              <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/news_edit/index/').$news_id?>">Update post</a>
              <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/news_edit/publishd/').$news_id?>">Publish post</a>
            </div>
        <?php } ?>


     

            <article class="content">

                <!-- ad area one -->
                <div class="ad-s <?php echo (html_escape(@$lg_status_31)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_31)==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo htmlspecialchars_decode(@$news_view_31); ?>
                </div>


                <h1><?php echo htmlspecialchars_decode(strip_tags($title)); ?></h1>
                <p class="short-head"><?php echo htmlspecialchars_decode(strip_tags(@$stitle));?></p>
                    
                <div class="date">
                    <ul>
                        <li><?php echo display('by')?> <a title="" href="<?php echo base_url('author/profile/').$user_id?>"><span><?php echo html_escape(strip_tags($name)); ?></span></a> --</li>
                        <li>
                            <a>
                                <?php 
                                    $strtime = strtotime($post_date);
                                    $converted_date = convertDate(date('l, d M, Y', $strtime)); 
                                    echo $converted_date;
                                ?>   
                            </a> 
                        </li>
                    </ul>
                </div>


                <div class="">

                    
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
        
                </div>

                <?php 
                    $share_link = base_url().$this->uri->segment(1);
                    if(!empty($post_table_of_content)){ 
                        $col = 9;
                    }else{ 
                        $col=12;
                    }
                ?>

                <div class="row mt-30">

                    <div class="col-sm-12 col-md-<?php echo $col;?> bodyContent">
                        <div class="position-relative">
                            <div class="paragraph-padding stickydetails">
                                <!-- ad area two -->
                                <div class="ad-s <?php echo (html_escape(@$lg_status_32)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_32)==0?'hidden-xs hidden-sm':'')?>">
                                    <?php echo htmlspecialchars_decode(@$news_view_32); ?>
                                </div>

                                <?php echo htmlspecialchars_decode($news); ?>

                                <?php if($reference!=NULL){?>
                                    <b><?php echo html_escape($reference);?></b>
                                <?php } ?>
                                          
                             </div>
                            <div class="social sticky-shear stickyshare">
                                <ul class="list-unstyle">
                                    <li><a href="javascript:void(0)" class="facebook"  onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_link?>', 'Share This Post', 'width=640,height=450');return false"><i class="fa  fa-facebook"></i> </a></li>

                                    <li><a href="javascript:void(0)" class="twitter" onclick="window.open('https://twitter.com/share?url=<?php echo $share_link?>&amp;text=<?php echo html_escape(strip_tags($title)); ?>', 'Share This Post', 'width=640,height=450');return false" ><i class="fa  fa-twitter"></i></a></li>

                                    <li><a href="javascript:void(0)" class="linkedin" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $share_link?>', 'Share This Post', 'width=640,height=450');return false" ><i class="fa fa-linkedin"></i> </a></li>

                                    <li><a  href="javascript:void(0)" class="pinterest" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo $share_link?>;media=<?php echo $img_url?>', 'Share This Post', 'width=640,height=450');return false" ><i class="fa fa-pinterest"></i>  </a></li>

                                    <li><a class="whatsapp" href="https://api.whatsapp.com/send?text=<?php echo $title?> - <?php echo $share_link?>"  target="_blank"><i class="fa fa-whatsapp"></i>  </a></li>
                                    
                                    <li><a class="tumblr" href="javascript:void(0)" onclick="window.open('http://www.tumblr.com/share/link?url=<?php echo $share_link?>;title=<?php echo $title?>', 'Share This Post', 'width=640,height=450');return false" ><i class="fa fa-tumblr"></i>  </a></li>
                            
                                    <li><a class="print" href="<?php echo html_escape($bu) . 'Print_article/print_page/' . $news_id; ?>" class="icon_n_d"  target="_blank" title="Click to Print"><i class="fa fa-print" aria-hidden="true"></i></a></li>
                        
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php if(!empty($post_table_of_content)){?>
                        <div class="col-md-3 sectionNav hidden-sm hidden-xs">
                            <h3>Table Of Contents</h3>
                            <ul class="section-nav">
                            <?php foreach($post_table_of_content as $val){?>
                                <li class="toc-entry"><a class="js-scroll-trigger" href="#<?php echo @$val->section_id?>"><?php echo @$val->section_name?></a></li>
                            <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>

                <!-- ad area three -->
                <div class="<?php echo (html_escape(@$lg_status_33)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_33)==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo htmlspecialchars_decode(@$news_view_33); ?>
                </div>
                        

                <!-- tags -->
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
                                                        <img class="img-responsive" src="<?php echo html_escape(@$sn['hn']['image_thumb_' . $i]);?>" alt="<?php echo html_escape(@$sn['hn']['image_alt_' . $i]);?>">
                                                    </a>
                                                    <?php 
                                                        } else {
                                                        echo '<img width="250" src="http://img.youtube.com/vi/'.html_escape($sn['hn']['video_'.$i]).'/0.jpg" alt="photography" class="img-responsive"/>';
                                                    }
                                                    ?>                                                
                                                </div>
                                                

                                            </div>

                                            <div class="post-title-author-details">
                                                <h4><a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i]) ?>"><?php echo html_escape(@$sn['hn']['news_title_' . $i]); ?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> 
                                                        <?php echo (date('l, d M, Y', html_escape(@$sn['hn']['ptime_' . $i]))); ?>
                                                        

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
                                                        <img class="img-responsive" src="<?php echo html_escape(@$sn['hn']['image_thumb_' . $i]);?>" alt="<?php echo html_escape(@$sn['hn']['image_alt_' . $i]);?>">
                                                    </a>
                                                    <?php 
                                                        } else {
                                                        echo '<img width="250" src="http://img.youtube.com/vi/'.html_escape($sn['hn']['video_'.$i]).'/0.jpg" alt="photography" class="img-responsive"/>';
                                                    }
                                                    ?>                                                
                                                </div>
                                                
                                            </div>

                                            <div class="post-title-author-details">
                                                <h4><a href="<?php echo html_escape(@$sn['hn']['news_link_' . $i]) ?>"><?php echo html_escape(@$sn['hn']['news_title_' . $i]); ?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', html_escape(@$sn['hn']['ptime_' . $i]))); ?>
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
                <div class="<?php echo (html_escape(@$lg_status_34)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_34)==0?'hidden-xs hidden-sm':'')?>">
                 <?php echo htmlspecialchars_decode(@$news_view_34); ?>
                </div><br>

                    <?php 
                        if($ot->comments_status=='1'){
                            $this->load->view('themes/'.html_escape($default_theme).'/__comments_view');
                        }
                    ?>

                    <!-- ad area five -->
                    <div class="<?php echo (html_escape(@$lg_status_35)==0?'hidden-lg hidden-md':'')?> <?php echo (html_escape(@$sm_status_35)==0?'hidden-xs hidden-sm':'')?>">
                     <?php echo htmlspecialchars_decode(@$news_view_35); ?>
                    </div><br>
                
            </article>
       

   
</div>

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">

<script src="<?php echo base_url()?>assets/dist/js/comments.js"></script>

