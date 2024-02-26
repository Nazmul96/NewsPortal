<?php
    if (isset($ads) && is_array(@$ads)) {
        extract($ads);
    }
    $bu = base_url();
    include('common_file/function.php');
    $ascurl = base_url().'application/views/themes/'.html_escape($default_theme).'/web-assets';

?>

            <!-- /.End of banner content -->
            <div class="page-content">
                <div class="container">
                    <div class="row mt-5">
                        <main class="col-lg-8 col-xl-9 content p_r_40">
                            <div class="details-body">
                                <div class="post_details stickydetails">

                                    <div class="mb-4"></div>

                                    <div class="gallery_post popup-gallery">
                                        <figure class="effect-lily">

                                            <?php if(@$pd['video_url']!='' || @$pd['image_id']!=''){?>
                                           
                                            <?php if(@$pd['image_id']!=''){?>
                                                <img src="<?php echo base_url().html_escape(@$pd['image_id'])?>" class="img-fluid" width="100%">
                                             <?php } else{ 
                                                 echo '<iframe width="100%" height="370px" src="https://www.youtube.com/embed/' . html_escape(@$pd['video_url']) . '" frameborder="0" allowfullscreen></iframe>';
                                                }
                                            ?>
                                            
                                            <?php } ?>
                                            
                                        </figure>
                                    </div>


                                   <h2><?php echo htmlspecialchars_decode(strip_tags(@$pd['title']));?></h2>
                                    <div>
                                        <?php echo htmlspecialchars_decode(@$pd['description']);?>
                                    </div>
                                </div>
                            </div>

                        </main>


                        <aside class="col-lg-4 col-xl-3 rightSidebar show-lg">

                            <div class="<?php echo (html_escape(@$lg_status_34)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_34)==0?'d-xs-none':'')?>">
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
                                    <?php if(@$mr['image_check_' . $i]!=NULL){?>
                                        <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"  class="media-left">
                                            <?php echo @$mr['playbtn_'.$i]?>
                                            <img class="media-object" src="<?php echo html_escape(@$mr['image_thumb_' . $i]); ?>" alt="<?php echo html_escape(@$mr['image_alt_'.$i])?>" >
                                        </a>
                                    <?php } else{?>
                                        <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" class="media-left">
                                            <?php echo @$mr['playbtn_'.$i]?>
                                            <img class="media-object" src="<?php echo html_escape(@$mr['default_img_' . $i]); ?>" alt="<?php echo html_escape(@$mr['image_alt_'.$i])?>" >
                                        </a>
                                    <?php }?>

                                    <div class="media-body">
                                        <h6 class="media-heading"><a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"><?php echo htmlspecialchars_decode(@$mr['news_title_'.$i]);?></a></h6>
                                        <div class="entry-meta">
                                            <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$mr['ptime_'.$i]);?></span>
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

                            <div class="mt-4 <?php echo (html_escape(@$lg_status_36)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_36)==0?'d-xs-none':'')?>">
                                <?php echo htmlspecialchars_decode(@$news_view_36); ?>  
                            </div>

                        </aside>
                    </div>

                </div>
            </div>
        

