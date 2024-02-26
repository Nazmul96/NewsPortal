<?php
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
?>



        <div class="page-outer-wrap">

            <div class="page-content mt-5">
                <div class="container">
                    <div class="row">

                        <main class="col-xl-9 col-lg-8 content p_r_40">
                            <div>
                                <div class="row">

                                    <?php
                                        $n_s = 1;
                                        for ($i = 1; $i <= 2; $i++) {
                                            if (!isset($pn['news_title_' . $i]))
                                                continue;
                                    ?>
                                        <div class="col-md-6">
                                            <div class="classic_post category-item">
                                                <figure>

                                                    <?php if (@$pn['image_check_' . $i]!=NULL) { ?>
                                                        <a class="classic_img position-relative" href="<?php echo html_escape($pn['news_link_'.$i])?>">
                                                            <?php echo @$pn['playbtn_'.$i]?>
                                                            <img class="img-fluid" src="<?php echo html_escape(@$pn['image_large_' . $i])?>" alt="<?php echo html_escape(@$pn['image_alt_' . $i])?>">
                                                        </a>
                                                    <?php } else { ?>
                                                        <a class="classic_img position-relative" href="<?php echo html_escape($pn['news_link_'.$i])?>">
                                                            <?php echo @$pn['playbtn_'.$i]?>
                                                            <img class="img-fluid" src="<?php echo html_escape(@$pn['default_img_' . $i])?>" >
                                                        </a>
                                                    <?php }?>

                                                    <figcaption>
                                                        <div class="post-header">
                                                            <h2 class="classic_post_title"><a href="<?php echo html_escape(@$pn['news_link_'.$i]);?>"><?php echo htmlspecialchars_decode(@$pn['news_title_'.$i]);?></a></h2>
                                                            <div class="entry-meta">
                                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                                <?php echo  html_escape(@$pn['post_date_as_' . $i]); ?></span> 
                                                                
                                                            </div>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- /.End of classic post -->
                                        </div>
                                    <?php } ?>

                                </div>

                                <div class="row">
                                    <?php
                                        $n_s = 3;
                                        for ($i = 3; $i <= 4; $i++) {
                                            if (!isset($pn['news_title_' . $i]))
                                                continue;
                                    ?>
                                        <div class="col-md-6">
                                            <div class="classic_post category-item">
                                                <figure>

                                                    <?php if (@$pn['image_check_' . $i]!=NULL) { ?>
                                                        <a class="classic_img position-relative" href="<?php echo html_escape($pn['news_link_'.$i])?>">
                                                            <?php echo @$pn['playbtn_'.$i]?>
                                                            <img class="img-fluid" src="<?php echo html_escape(@$pn['image_large_' . $i])?>" alt="<?php echo html_escape(@$pn['image_alt_' . $i])?>">
                                                        </a>
                                                    <?php } else { ?>
                                                        <a class="classic_img position-relative" href="<?php echo html_escape($pn['news_link_'.$i])?>">
                                                            <?php echo @$pn['playbtn_'.$i]?>
                                                            <img class="img-fluid" src="<?php echo html_escape(@$pn['default_img_' . $i])?>" >
                                                        </a>
                                                    <?php }?>

                                                    <figcaption>
                                                        <div class="post-header">
                                                            <h2 class="classic_post_title"><a href="<?php echo html_escape(@$pn['news_link_'.$i]);?>"><?php echo htmlspecialchars_decode(@$pn['news_title_'.$i]);?></a></h2>
                                                            <div class="entry-meta">
                                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                                <?php echo html_escape(@$pn['post_date_as_' . $i]); ?></span> 
                                                                
                                                            </div>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- /.End of classic post -->
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="row">
                                    <?php
                                        $n_s = 5;
                                        for ($i = 5; $i <= 6; $i++) {
                                            if (!isset($pn['news_title_' . $i]))
                                                continue;
                                    ?>
                                        <div class="col-md-6">
                                            <div class="classic_post category-item">
                                                <figure>

                                                    <?php if (@$pn['image_check_' . $i]!=NULL) { ?>
                                                        <a class="classic_img position-relative" href="<?php echo html_escape($pn['news_link_'.$i])?>">
                                                            <?php echo @$pn['playbtn_'.$i]?>
                                                            <img class="img-fluid" src="<?php echo html_escape(@$pn['image_large_' . $i])?>" alt="<?php echo html_escape(@$pn['image_alt_' . $i])?>">
                                                        </a>
                                                    <?php } else { ?>
                                                        <a class="classic_img position-relative" href="<?php echo html_escape($pn['news_link_'.$i])?>">
                                                            <?php echo @$pn['playbtn_'.$i]?>
                                                            <img class="img-fluid" src="<?php echo html_escape(@$pn['default_img_' . $i])?>" >
                                                        </a>
                                                    <?php }?>

                                                    <figcaption>
                                                        <div class="post-header">
                                                            <h2 class="classic_post_title"><a href="<?php echo html_escape(@$pn['news_link_'.$i]);?>"><?php echo htmlspecialchars_decode(@$pn['news_title_'.$i]);?></a></h2>
                                                            <div class="entry-meta">
                                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                                <?php echo html_escape(@$pn['post_date_as_' . $i]); ?></span> 
                                                                
                                                            </div>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- /.End of classic post -->
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="row">
                                    <?php
                                        $n_s = 7;
                                        for ($i = 7; $i <= 8; $i++) {
                                            if (!isset($pn['news_title_' . $i]))
                                                continue;
                                    ?>
                                        <div class="col-md-6">
                                            <div class="classic_post category-item">
                                                <figure>

                                                    <?php if (@$pn['image_check_' . $i]!=NULL) { ?>
                                                        <a class="classic_img position-relative" href="<?php echo html_escape($pn['news_link_'.$i])?>">
                                                            <?php echo @$pn['playbtn_'.$i]?>
                                                            <img class="img-fluid" src="<?php echo html_escape(@$pn['image_large_' . $i])?>" alt="<?php echo html_escape(@$pn['image_alt_' . $i])?>">
                                                        </a>
                                                    <?php } else { ?>
                                                        <a class="classic_img position-relative" href="<?php echo html_escape($pn['news_link_'.$i])?>">
                                                            <?php echo @$pn['playbtn_'.$i]?>
                                                            <img class="img-fluid" src="<?php echo html_escape(@$pn['default_img_' . $i])?>" >
                                                        </a>
                                                    <?php }?>

                                                    <figcaption>
                                                        <div class="post-header">
                                                            <h2 class="classic_post_title"><a href="<?php echo html_escape(@$pn['news_link_'.$i]);?>"><?php echo htmlspecialchars_decode(@$pn['news_title_'.$i]);?></a></h2>
                                                            <div class="entry-meta">
                                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                                <?php echo html_escape(@$pn['post_date_as_' . $i]); ?></span> 
                                                                
                                                            </div>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- /.End of classic post -->
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="row">
                                    <?php
                                        $n_s = 9;
                                        for ($i = 9; $i <= 10; $i++) {
                                            if (!isset($pn['news_title_' . $i]))
                                                continue;
                                    ?>
                                        <div class="col-md-6">
                                            <div class="classic_post category-item">
                                                <figure>

                                                    <?php if (@$pn['image_check_' . $i]!=NULL) { ?>
                                                        <a class="classic_img position-relative" href="<?php echo html_escape($pn['news_link_'.$i])?>">
                                                            <?php echo @$pn['playbtn_'.$i]?>
                                                            <img class="img-fluid" src="<?php echo html_escape(@$pn['image_large_' . $i])?>" alt="<?php echo html_escape(@$pn['image_alt_' . $i])?>">
                                                        </a>
                                                    <?php } else { ?>
                                                        <a class="classic_img position-relative" href="<?php echo html_escape($pn['news_link_'.$i])?>">
                                                            <?php echo @$pn['playbtn_'.$i]?>
                                                            <img class="img-fluid" src="<?php echo html_escape(@$pn['default_img_' . $i])?>" >
                                                        </a>
                                                    <?php }?>

                                                    <figcaption>
                                                        <div class="post-header">
                                                            <h2 class="classic_post_title"><a href="<?php echo html_escape(@$pn['news_link_'.$i]);?>"><?php echo htmlspecialchars_decode(@$pn['news_title_'.$i]);?></a></h2>
                                                            <div class="entry-meta">
                                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                                <?php echo html_escape(@$pn['post_date_as_' . $i]); ?></span> 
                                                                
                                                            </div>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- /.End of classic post -->
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <ul class="pagination">
                                <?php echo htmlspecialchars_decode($this->pagination->create_links()); ?>

                            </ul>
                        </main>


                        <aside class="col-xl-3 col-lg-4 rightSidebar show-lg">

                            <div class="mb-4 <?php echo (html_escape(@$lg_status_23)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_23)==0?'d-xs-none':'')?>">
                                <?php echo htmlspecialchars_decode(@$category_23); ?>
                            </div>

                            <div class="latest_post_widget">

                                <div class="sec-block mb-4">
                                    <a href="#" class="sec-title"><?php echo display('most_read'); ?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                </div>

                                <?php for($i=1; $i<=6; $i++){ 
                                    if (!isset($mr['news_title_'.$i]))
                                    continue;
                                ?>

                                <div class="media latest_post">
                                    <?php if(@$mr['image_check_' . $i]!=NULL){?>
                                        <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"  class="media-left">
                                            <?php echo @$mr['playbtn_'.$i]?>
                                            <img class="media-object" src="<?php echo html_escape(@$mr['image_thumb_' . $i]); ?>" alt="<?php echo html_escape(@$mr['image_alt_'.$i])?>" ></a>
                                    <?php } else{?>

                                        <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" class="media-left">
                                            <?php echo @$mr['playbtn_'.$i]?>
                                            <img  src="http://img.youtube.com/vi/<?php echo html_escape(@$mr['video_' . $i]); ?>/0.jpg"  class="media-object">
                                       </a>
                                    <?php }?>

                                    <div class="media-body">
                                        <h6 class="media-heading"><a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"><?php echo html_escape(@$mr['news_title_'.$i]);?></a></h6>
                                        <div class="entry-meta">
                                            <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$mr['post_date_as_'.$i]);?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>

                            <div class="<?php echo (html_escape(@$lg_status_24)==0?'d-md-none':'')?> <?php echo (html_escape(@$sm_status_24)==0?'d-xs-none':'')?>">
                                <?php echo htmlspecialchars_decode(@$category_24); ?>
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
        </div>

        