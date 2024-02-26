<?php 
    $ascurl = base_url().'application/views/themes/'.html_escape($default_theme).'/web-assets';
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
    require('common_file/function.php');
?>

        <!-- /.Start of news masonry -->
        <div class="news-masonry mt-5">
            <div class="container">
                <div class="row mas-m">
                    <div class="col-xl-3 col-6 col-xxs-12 mas-p">
                        <?php 
                            for($i=2;$i<=3;$i++){
                            if (!isset($hn['news_title_'.$i]))
                            continue;
                        ?>

                        <div class="mas-item mas-item-sm mb-1 text-center play-button_hover">
                            <?php if(@$hn['image_check_'.$i]!=NULL){?>
                                <a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>" class="opadow">
                                    <?php echo @$hn['playbtn_'.$i]?>
                                    <img class="img-fluid full-width-sm" src="<?php echo html_escape(@$hn['image_thumb_'.$i])?>" alt="<?php echo  html_escape(@$hn['image_alt_'.$i]) ?>">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>" class="opadow">
                                    <?php echo @$hn['playbtn_'.$i]?>
                                    <img  src="<?php echo html_escape(@$hn['default_ima_'.$i]);?>" class="img-fluid full-width-sm">
                                </a>
                            <?php }?>

                                <div class="mas-text">
                                    <div class="post-cat"><a href="<?php echo html_escape(@$hn['category_link_'.$i])?>"><?php echo html_escape(@$hn['category_name_'.$i])?></a></div>
                                    <h6 class="mas-title"><a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>"><?php echo htmlspecialchars_decode(@$hn['news_title_'.$i]);?></a></h6>
                                    <a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>" class="read-more"><?php echo display('read_more')?> &#8702;</a>
                                </div>
                        </div>

                        <?php }?>
                    </div>


                    <?php if(@$hn['news_title_1']!=NULL){?>

                        <div class="col-xl-6 show-xl mas-p">
                            <div class="mas-item text-center play-button_hover">
                                <?php if(@$hn['image_check_1']!=NULL){?>
                                    <a href="<?php echo html_escape(@$hn['news_link_1']);?>" class="opadow">
                                        <?php echo @$hn['playbtn_1']?>
                                        <img class="img-fluid full-width-sm" src="<?php echo html_escape(@$hn['image_large_1']);?>" alt="<?php echo  html_escape(@$hn['image_alt_1']) ?>">
                                    </a>
                                <?php } else{ ?>
                                    <a href="<?php echo html_escape(@$hn['news_link_1']);?>" class="opadow">
                                        <?php echo @$hn['playbtn_1']?>
                                        <img class="img-fluid full-width-sm" src="<?php echo html_escape(@$hn['default_ima_1']);?>" alt="<?php echo  html_escape(@$hn['image_alt_1']) ?>">
                                    </a>
                                <?php } ?>

                                <div class="mas-text">
                                    <div class="post-cat"><a href="<?php echo html_escape(@$hn['category_link_1'])?>"><?php echo html_escape(@$hn['category_name_1']);?></a></div>
                                    <h5 class="mas-title"><a href="<?php echo html_escape(@$hn['news_link_1']);?>"><?php echo htmlspecialchars_decode(@$hn['news_title_1']);?></a></h5>
                                    <a href="<?php echo html_escape(@$hn['news_link_1']);?>" class="read-more"><?php echo display('read_more')?> &#8702;</a>
                                </div>
                            </div>
                        </div>

                    <?php }?>

                    <div class="col-xl-3 col-6 col-xxs-12 mas-p">
                        <?php 
                            for($i=4;$i<=5;$i++){
                            if (!isset($hn['news_title_'.$i]))
                            continue;
                        ?>
                            <div class="mas-item mas-item-sm mb-1 text-center play-button_hover">
                                
                                <?php if(@$hn['image_check_'.$i]!=NULL){?>
                                    <a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>" class="opadow">
                                        <?php echo @$hn['playbtn_'.$i]?>
                                        <img class="img-fluid full-width-sm" src="<?php echo html_escape(@$hn['image_thumb_'.$i])?>" alt="<?php echo  html_escape(@$hn['image_alt_'.$i]) ?>">
                                    </a>
                                <?php } else{ ?>
                                    <a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>" class="opadow">
                                        <?php echo @$hn['playbtn_'.$i]?>
                                        <img  src="<?php echo base_url('uploads/default-post-img.jpg');?>" class="img-fluid full-width-sm">
                                    </a>
                                <?php }?>
                                <div class="mas-text">
                                    <div class="post-cat"><a href="<?php echo html_escape(@$hn['category_link_'.$i])?>"><?php echo html_escape(@$hn['category_name_'.$i])?></a></div>
                                    <h6 class="mas-title"><a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>"><?php echo htmlspecialchars_decode(@$hn['news_title_'.$i]);?></a></h6>
                                    <a href="<?php echo html_escape(@$hn['news_link_'.$i]);?>" class="read-more"><?php echo display('read_more')?> &#8702;</a>
                                </div>

                            </div>
                        <?php }?>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.End of news masonry -->

        <div class="page-content">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-xl-9 col-lg-8 content-4">

                        <?php
                            if ($home_page_positions[1]['status'] == 1) { 
                        ?>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="sec-block mb-4">
                                    <a href="<?php echo base_url('category/').$pn['position_1']['category_1']?>" class="sec-title"><?php echo html_escape(@$home_page_positions[1]['cat_name']); ?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                    <div class="btn-part">
                                        <a href="<?php echo base_url('category/').$pn['position_1']['category_1']?>" class="btn-more"><?php echo display('read_more')?></a>
                                    </div>
                                </div>
                            </div>

                            <?php 
                                for($i=1; $i<=2; $i++){
                                    if (!isset($pn['position_1']['news_title_'.$i]))
                                    continue;
                            ?>

                            <div class="col-md-6">
                                <article class="grid_post grid_post_lg text-xs-center">
                                    <figure>
                                        <?php if(@$pn['position_1']['image_check_'.$i]!=NULL){?>
                                            <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>" class="grid_image">
                                                <?php echo @$pn['position_1']['playbtn_'.$i]?>
                                                <img class="img-fluid" src="<?php echo html_escape(@$pn['position_1']['image_large_'.$i]); ?>" alt="<?php echo html_escape($pn['position_1']['image_alt_'.$i])?>">
                                            </a>
                                        <?php } else{ ?>
                                            <?php echo @$pn['position_1']['playbtn_'.$i]?>
                                            <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>"  class="grid_image">
                                                <?php echo @$pn['position_1']['playbtn_'.$i]?>
                                                <img class="img-fluid" src="<?php echo html_escape(@$pn['position_1']['default_img_'.$i]); ?>" alt="<?php echo html_escape($pn['position_1']['image_alt_'.$i])?>">
                                            </a>
                                        <?php }?>
                                        <figcaption>
                                            <div class="vh_center">
                                                <div class="entry-meta">
                                                    <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_1']['post_date_as_'.$i]); ?></span>
                                                </div>
                                            </div>
                                            <h4 class="grid_post_title"><a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>" class="line_height_30"><?php echo htmlspecialchars_decode(@$pn['position_1']['news_title_'.$i]); ?></a></h4>
                                            <?php echo ($pn['position_1']['short_news_'.$i]);?>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>

                            <?php } ?>

                            <?php 
                                for($i=3; $i<=5; $i++){
                                    if (!isset($pn['position_1']['news_title_'.$i]))
                                    continue;
                            ?>
                                <div class="col-md-4">
                                    <article class="grid_post grid_post_lg text-xs-center">
                                        <figure>

                                        <?php if(@$pn['position_1']['image_check_'.$i]!=NULL){?>
                                            <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>" class="grid_image">
                                                <?php echo @$pn['position_1']['playbtn_'.$i]?>
                                                <img class="img-fluid" src="<?php echo html_escape(@$pn['position_1']['image_large_'.$i]); ?>" alt="<?php echo html_escape($pn['position_1']['image_alt_'.$i])?>">
                                            </a>
                                        <?php } else{ ?>
                                            <a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>"  class="grid_image">
                                                <?php echo @$pn['position_1']['playbtn_'.$i]?>
                                                <img class="img-fluid" src="<?php echo html_escape(@$pn['position_1']['default_img_'.$i]); ?>" alt="">
                                            </a>
                                        <?php }?>

                                            <figcaption>
                                                <div class="vh_center">
                                                    <div class="post-cat"><a href="<?php echo html_escape(@$pn['position_1']['category_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_1']['category_name_'.$i]); ?></a></div>
                                                    <div class="entry-meta">
                                                        <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_1']['post_date_as_'.$i]); ?></span>
                                                    </div>
                                                </div>
                                                <h6 class="grid_post_title"><a href="<?php echo html_escape(@$pn['position_1']['news_link_'.$i]); ?>" class="line_height_20"><?php echo htmlspecialchars_decode(@$pn['position_1']['news_title_'.$i]); ?></a></h6>
                                                <!-- /.Post button -->
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>

                        <?php } ?>

                        <!-- ad area Two -->
                        <div class=" row my-4 <?php echo (@$lg_status_12==0?'d-md-none':'')?> <?php echo (@$sm_status_12==0?'d-xs-none':'')?>"> <!-- add -->
                            <div class="col-md-12">
                               <?php echo @$home_12; ?>
                           </div>
                        </div>

                        <?php if(@$home_page_positions[2]['status']==1){ ?>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="sec-block mb-4">
                                    <a href="<?php echo base_url('category/').$pn['position_2']['category_1']?>" class="sec-title"><?php echo html_escape($home_page_positions[2]['cat_name']);?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                    <div class="btn-part">
                                        <a href="<?php echo base_url('category/').$pn['position_2']['category_1']?>" class="btn-more"><?php echo @display('read_more');?></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <article class="grid_post grid_post_lg text-xs-center">
                                    <figure>
                                        <!-- post image -->
                                        <?php if(@$pn['position_2']['image_check_1']!=NULL){?>
                                            <a href="<?php echo html_escape(@$pn['position_2']['news_link_1']); ?>" class="grid_image">
                                                <?php echo @$pn['position_2']['playbtn_1']?>
                                                <img src="<?php echo html_escape(@$pn['position_2']['image_large_1']); ?>" class="img-fluid" alt="<?php echo html_escape(@$pn['position_2']['image_alt_1'])?>">
                                            </a>
                                        <?php } else{?>
                                            <a href="<?php echo html_escape(@$pn['position_2']['news_link_1']); ?>" class="grid_image">
                                                <img class="img-responsive" src="<?php echo html_escape(@$pn['position_2']['default_img_1']); ?>" class="img-fluid">
                                            </a>
                                        <?php } ?>  

                                        <figcaption>
                                            <div class="vh_center">
                                                <div class="post-cat"><a href="<?php echo html_escape(@$pn['position_2']['category_link_1']); ?>"><?php echo html_escape(@$pn['position_2']['category_name_1']); ?></a></div>
                                                <div class="entry-meta">
                                                    <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_2']['post_date_as_1']); ?></span>
                                                </div>
                                            </div>
                                            <h4 class="grid_post_title"><a href="<?php echo html_escape(@$pn['position_2']['news_link_1']); ?>" class="line_height_30"><?php echo htmlspecialchars_decode(@$pn['position_2']['news_title_1']); ?></a></h4>
                                            <?php echo ($pn['position_2']['short_news_1']);?>
                                            <!-- /.Post button -->
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>

                            <div class="col-xl-6">
                                <div class="row">
                                    <?php for($i=2; $i<=5; $i++){
                                        if (!isset($pn['position_2']['news_title_'.$i]))
                                        continue;
                                    ?>
                                        <div class="col-md-6">
                                            <article class="grid_post grid_post_lg text-xs-center">
                                                <figure>
                                                    <!-- post image -->
                                                    <?php if(@$pn['position_2']['image_check_'.$i]!=NULL){?>
                                                        <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>" class="grid_image">
                                                            <?php echo @$pn['position_2']['playbtn_1']?>
                                                            <img src="<?php echo html_escape(@$pn['position_2']['image_large_'.$i]); ?>" class="img-fluid" alt="<?php echo html_escape(@$pn['position_2']['image_alt_'.$i])?>">
                                                        </a>
                                                    <?php } else{?>
                                                     <a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>" class="grid_image">
                                                            <?php echo @$pn['position_2']['playbtn_'.$i]?>
                                                            <img src="<?php echo html_escape(@$pn['position_2']['default_img_'.$i]); ?>" class="img-fluid" alt="<?php echo html_escape(@$pn['position_2']['image_alt_'.$i])?>">
                                                        </a>
                                                    <?php } ?>

                                                    <figcaption>
                                                        <div class="post-cat mb-2"><a href="<?php echo html_escape(@$pn['position_2']['category_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_2']['category_name_'.$i]); ?></a></div>
                                                        <div class="entry-meta">
                                                            <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_2']['post_date_as_'.$i]); ?></span>
                                                            
                                                        </div>
                                                        <h6 class="grid_post_title"><a href="<?php echo html_escape(@$pn['position_2']['news_link_'.$i]); ?>" class="line_height_20"><?php echo htmlspecialchars_decode(@$pn['position_2']['news_title_'.$i]); ?></a></h6>
                                                        <!-- /.Post button -->
                                                    </figcaption>
                                                </figure>
                                            </article>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                        <!-- ad area Three -->
                        <div class="row my-4 <?php echo (@$lg_status_13==0?'d-md-none':'')?> <?php echo (@$sm_status_13==0?'d-xs-none':'')?>"> <!-- add -->
                            <div class="col-md-12">
                               <?php echo @$home_13; ?>
                           </div>
                        </div>


                        <?php if(@$home_page_positions[3]['status']==1){ ?>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="sec-block mb-4">
                                    <a href="<?php echo base_url('category/').$pn['position_3']['category_1']?>" class="sec-title"><?php echo html_escape($home_page_positions[3]['cat_name']);?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                    <div class="btn-part">
                                        <a href="<?php echo base_url('category/').$pn['position_2']['category_1']?>" class="btn-more"><?php echo display('read_more')?></a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-7 col-lg-12">

                                <article class="grid_post grid_post_lg text-xs-center">

                                    <figure>
                                        <!-- post image -->
                                        <?php if(@$pn['position_3']['image_check_1']!=NULL){?>
                                            <a href="<?php echo html_escape(@$pn['position_3']['news_link_1']); ?>" class="grid_image">
                                                <?php echo @$pn['position_3']['playbtn_1']?>
                                                <img src="<?php echo html_escape(@$pn['position_3']['image_large_1']); ?>" class="img-fluid" alt="<?php echo html_escape(@$pn['position_3']['image_alt_1'])?>">
                                            </a>
                                        <?php } else{?>
                                            <a href="<?php echo html_escape(@$pn['position_3']['news_link_1']); ?>" class="grid_image">
                                                <img src="<?php echo html_escape(@$pn['position_3']['default_img_1']); ?>" class="img-fluid" alt="<?php echo html_escape(@$pn['position_3']['image_alt_1'])?>">
                                            </a>
                                        <?php } ?>  

                                        <figcaption>
                                            <div class="vh_center">
                                                <div class="post-cat"><a href="<?php echo html_escape(@$pn['position_3']['category_link_1']); ?>"><?php echo html_escape(@$pn['position_3']['category_name_1']); ?></a></div>
                                                <div class="entry-meta">
                                                    <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_3']['post_date_as_1']); ?></span>
                                                    
                                                </div>
                                            </div>
                                            <h4 class="grid_post_title"><a href="<?php echo html_escape(@$pn['position_3']['news_link_1']); ?>" class="line_height_30"><?php echo htmlspecialchars_decode(@$pn['position_3']['news_title_1']); ?></a></h4>
                                            <?php echo ($pn['position_3']['short_news_1']);?>
                                            <!-- /.Post button -->
                                        </figcaption>

                                    </figure>

                                </article>

                            </div>

                            <div class="col-xl-5 col-lg-12">

                                <?php for($i=2; $i<=6; $i++){
                                    if (!isset($pn['position_3']['news_title_'.$i]))
                                    continue;
                                ?>

                                <div class="media meida-md">

                                    <div class="media-left">
                                        <!-- post image -->
                                        <?php if(@$pn['position_3']['image_check_'.$i]!=NULL){?>
                                            <a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i]); ?>" >
                                                <?php echo @$pn['position_3']['playbtn_'.$i]?>
                                                <img src="<?php echo html_escape(@$pn['position_3']['image_large_'.$i]); ?>" class="media-object" alt="<?php echo html_escape(@$pn['position_3']['image_alt_'.$i])?>">
                                            </a>
                                        <?php } else{?>
                                            <a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i]); ?>">
                                                <?php echo @$pn['position_3']['playbtn_'.$i]?>
                                                <img src="<?php echo html_escape(@$pn['position_3']['default_img_'.$i]); ?>" class="media-object" alt="<?php echo html_escape(@$pn['position_3']['image_alt_'.$i])?>">
                                            </a>
                                        <?php } ?>
                                    </div>

                                    <!-- /.Post image -->
                                    <div class="media-body">
                                        <div class="post-header">
                                            <h3 class="media-heading"><a href="<?php echo html_escape(@$pn['position_3']['news_link_'.$i])?>">
                                                <?php echo character_limiter(htmlspecialchars_decode(@$pn['position_3']['news_title_'.$i]),30)?>
                                            </a></h3>
                                            <div class="entry-meta">
                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_3']['post_date_as_'.$i]); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>  

                            </div>
                        </div>
                        <?php } ?>
                    </div>


                    <div class="col-xl-3 col-lg-4 rightSidebar show-lg">


                    <div class="img-fluid <?php echo (@$lg_status_14==0?'d-md-none':'')?> <?php echo (@$sm_status_14==0?'d-xs-none':'')?>">
                        <?php echo @$home_14; ?>
                    </div>

                        

                        <?php if(!empty($pull['question'])){?>

                            <form action="javascript:pollTest();" method="post">

                                <div class="donation_widget mt-4">

                                    <div class="result"></div>
                                    <h4 class="donation_title"><?php echo html_escape(@$pull['question'])?></h4>

                                    <div class="donation_header" id="resultview">
                                        <input type="hidden" id="question_id" value="<?php echo @$pull['id']; ?>" />
                                        
                                        <div class="radio radio-danger">
                                            <input type="radio" name="radio2" id="radio3" value="yes">
                                            <label for="radio3"> <?php echo display('yes')?> </label>
                                            <span class="vote-count"><?php echo html_escape(@$pull['yes'])?>%</span>
                                        </div>

                                        <div class="radio radio-danger">
                                            <input type="radio" name="radio2" id="radio4" value="no" >
                                            <label for="radio4"> <?php echo display('no')?> </label>
                                            <span class="vote-count"><?php echo html_escape(@$pull['no'])?>%</span>
                                        </div>

                                        <div class="radio radio-danger">
                                            <input type="radio" name="radio2" id="radio5" value="on_comment">
                                            <label for="radio5"> <?php echo display('no_comment')?> </label>
                                            <span class="vote-count"><?php echo html_escape(@$pull['on_comment'])?>%</span>
                                        </div>

                                    </div>

                                    <button type="submit" name="vote_submit" class="btn link-btn"><?php echo makeString(['submit','vote'])?>  ⇾</button>

                                </div>

                            </form>

                        <?php }?>

                        <div class="latest_post_widget mt-4">

                            <div class="sec-block mb-4">
                                <a class="sec-title"><?php echo display('latest_news');?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                            </div>

                            <?php 
                            for($i=1; $i<=5; $i++){
                                if (!isset($ln['news_title_'.$i]))
                                continue; 
                            ?>
                                <div class="media latest_post">

                                    <?php if(@$ln['image_check_' . $i]!=NULL){?>
                                        <a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>" class="media-left">
                                            <?php echo @$ln['playbtn_'.$i]?>
                                            <img class="media-object" src="<?php echo @$ln['image_thumb_' . $i]; ?>" alt="<?php echo html_escape(@$ln['image_alt_'.$i])?>" ></a>
                                   <?php } else{?>
                                        <a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>" class="media-left">
                                            <?php echo @$ln['playbtn_'.$i]?>
                                            <img class="media-object" src="<?php echo @$ln['default_img_' . $i]; ?>" alt="<?php echo html_escape(@$ln['image_alt_'.$i])?>" ></a>
                                        </a>
                                    <?php }?>

                                    <div class="media-body">
                                        <h6 class="media-heading"><a href="<?php echo html_escape(@$ln['news_link_'.$i]);?>"><?php echo htmlspecialchars_decode(@$ln['news_title_'.$i]);?></a></h6>
                                        <div class="entry-meta">
                                            <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$ln['post_date_as_'.$i]);?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(@$home_page_positions[4]['status']==1){ ?>

            <div class="news-masonry mt-4">
                <div class="container container-full-sm">
                    <div class="row mas-m">

                        <?php for($i=1; $i<=3; $i++){
                            if (!isset($pn['position_4']['news_title_'.$i]))
                            continue;
                        ?>
                            <div class="col-sm-4 mas-p">
                                <div class="mas-item text-center mb-4 mb-sm-0">

                                    <?php if(@$pn['position_4']['image_check_'.$i]!=NULL){?>
                                        <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i]); ?>" class="opadow">
                                            <?php echo @$pn['position_4']['playbtn_'.$i]?>
                                            <img src="<?php echo html_escape(@$pn['position_4']['image_large_'.$i]); ?>" class="img-fluid full-width-xs homecat_img" alt="<?php echo html_escape(@$pn['position_4']['image_alt_'.$i])?>">
                                        </a>
                                    <?php } else{?>
                                        <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i]); ?>">
                                            <img src="<?php echo html_escape(@$pn['position_4']['default_img_'.$i]); ?>" class="img-fluid full-width-xs homecat_img" alt="<?php echo html_escape(@$pn['position_4']['image_alt_'.$i])?>">
                                        </a>
                                    <?php } ?>

                                
                                    <div class="mas-text">
                                        <div class="post-cat"><a href="<?php echo html_escape(@$pn['position_4']['category_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_4']['category_name_'.$i]); ?></a></div>
                                        <h5 class="mas-title"><a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i]); ?>"><?php echo htmlspecialchars_decode(@$pn['position_4']['news_title_'.$i]); ?></a></h5>
                                        <a href="<?php echo html_escape(@$pn['position_4']['news_link_'.$i]); ?>" class="read-more"><?php echo display('read_more')?> &#8702;</a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>




            <div class="container">

                <div class="row mt-4">
                    <div class="col-xl-9 col-lg-8 content-4">
                        

                        <div class="row">

                            <?php if(@$home_page_positions[5]['status']==1){ ?>

                            <div class="col-lg-6">

                                <div class="sec-block mb-4">
                                    <a href="<?php echo base_url('category/').$pn['position_5']['category_1']?>" class="sec-title"><?php echo html_escape($home_page_positions[5]['cat_name']);?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                    <div class="btn-part">
                                        <a href="<?php echo base_url('category/').$pn['position_5']['category_1']?>" class="btn-more"><?php echo display('read_more')?></a>
                                    </div>
                                </div>

                                <article class="grid_post grid_post_lg text-xs-center">
                                    <figure>

                                        <?php if(@$pn['position_5']['image_check_1']!=NULL){?>
                                            <a href="<?php echo html_escape(@$pn['position_5']['news_link_1']); ?>" class="grid_image">
                                                <?php echo @$pn['position_5']['playbtn_1']?>
                                                <img src="<?php echo html_escape(@$pn['position_5']['image_large_1']); ?>" class="img-fluid full-width-md" alt="<?php echo html_escape(@$pn['position_5']['image_alt_1'])?>">
                                            </a>
                                        <?php } else{?>
                                            <a href="<?php echo html_escape(@$pn['position_5']['news_link_1']); ?>" class="grid_image">
                                                <img src="<?php echo html_escape(@$pn['position_5']['default_img_1']); ?>" class="img-fluid full-width-md" alt="<?php echo html_escape(@$pn['position_5']['image_alt_1'])?>">
                                            </a>
                                        <?php } ?>  


                                        <figcaption>
                                            <div class="vh_center">
                                                <div class="post-cat"><a href="<?php echo html_escape(@$pn['position_5']['category_link_1']); ?>"><?php echo html_escape(@$pn['position_5']['category_name_1']); ?></a></div>
                                                <div class="entry-meta">
                                                    <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_5']['post_date_as_1']); ?></span>
                                                </div>
                                            </div>
                                            <h5 class="grid_post_title"><a href="<?php echo html_escape(@$pn['position_5']['news_link_1']); ?>" class="line_height_25"><?php echo htmlspecialchars_decode(@$pn['position_5']['news_title_1']); ?></a></h5>
                                            <?php echo ($pn['position_5']['short_news_1']);?>
                                            <!-- /.Post button -->
                                        </figcaption>
                                    </figure>

                                </article>

                                <?php for($i=2; $i<=4; $i++){
                                    if (!isset($pn['position_5']['news_title_'.$i]))
                                    continue;
                                ?>

                                    <div class="media meida-md">
                                        <div class="media-left">
                                            <?php if(@$pn['position_5']['image_check_'.$i]!=NULL){?>
                                                <a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i]); ?>" class="grid_image">
                                                    <?php echo @$pn['position_5']['playbtn_'.$i]?>
                                                    <img src="<?php echo html_escape(@$pn['position_5']['image_large_'.$i]); ?>" class="media-object width-60-lg" alt="<?php echo html_escape(@$pn['position_5']['image_alt_'.$i])?>">
                                                </a>
                                            <?php } else{?>
                                                <a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i]); ?>" class="grid_image">
                                                    <?php echo @$pn['position_5']['playbtn_'.$i]?>
                                                    <img src="<?php echo html_escape(@$pn['position_5']['default_img_'.$i]); ?>" class="media-object width-60-lg" alt="<?php echo html_escape(@$pn['position_5']['image_alt_'.$i])?>">
                                                </a>
                                            <?php } ?>
                                        </div>
                                        <!-- /.Post image -->
                                        <div class="media-body">
                                            <div class="post-header">
                                                <h3 class="media-heading"><a href="<?php echo html_escape(@$pn['position_5']['news_link_'.$i]); ?>"><?php echo htmlspecialchars_decode(@$pn['position_5']['news_title_'.$i]); ?></a></h3>
                                                <div class="entry-meta">
                                                    <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_5']['post_date_as_'.$i]); ?></span>
                                                </div>
                                                <!-- /.Post meta -->
                                            </div>
                                        </div>
                                    </div>

                                <?php }?>

                            </div>

                            <?php } ?>


                            <?php if(@$home_page_positions[6]['status']==1){ ?>

                                <div class="col-lg-6">
                                    <div class="sec-block mb-4">
                                        <a href="<?php echo base_url('category/').$pn['position_6']['category_1']?>" class="sec-title"><?php echo html_escape($home_page_positions[6]['cat_name']);?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                        <div class="btn-part">
                                            <a href="<?php echo base_url('category/').$pn['position_6']['category_1']?>" class="btn-more"><?php echo display('read_more')?></a>
                                        </div>
                                    </div>

                                    <article class="grid_post grid_post_lg text-xs-center">
                                        <figure>

                                            <?php if(@$pn['position_6']['image_check_1']!=NULL){?>
                                                <a href="<?php echo html_escape(@$pn['position_6']['news_link_1']); ?>" class="grid_image">
                                                    <?php echo @$pn['position_6']['playbtn_6']?>
                                                    <img src="<?php echo html_escape(@$pn['position_6']['image_large_1']); ?>" class="img-fluid full-width-md" alt="<?php echo html_escape(@$pn['position_6']['image_alt_1'])?>">
                                                </a>
                                            <?php } else{?>
                                                <a href="<?php echo html_escape(@$pn['position_6']['news_link_1']); ?>" class="grid_image">
                                                    <?php echo @$pn['position_6']['playbtn_6']?>
                                                    <img src="<?php echo html_escape(@$pn['position_6']['default_img_1']); ?>" class="img-fluid full-width-md" alt="<?php echo html_escape(@$pn['position_6']['image_alt_1'])?>">
                                                </a>
                                            <?php } ?>  


                                            <figcaption>
                                                <div class="vh_center">
                                                    <div class="post-cat"><a href="<?php echo html_escape(@$pn['position_6']['category_link_1']); ?>"><?php echo html_escape(@$pn['position_6']['category_name_1']); ?></a></div>
                                                    <div class="entry-meta">
                                                        <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_6']['post_date_as_1']); ?></span>
                                                    </div>
                                                </div>
                                                <h5 class="grid_post_title"><a href="<?php echo html_escape(@$pn['position_6']['news_link_1']); ?>" class="line_height_25"><?php echo htmlspecialchars_decode(@$pn['position_6']['news_title_1']); ?></a></h5>
                                                <?php echo ($pn['position_6']['short_news_1']);?>
                                                <!-- /.Post button -->
                                            </figcaption>

                                        </figure>

                                    </article>

                                    <?php for($i=2; $i<=4; $i++){
                                        if (!isset($pn['position_6']['news_title_'.$i]))
                                        continue;
                                    ?>

                                        <div class="media meida-md">
                                            <div class="media-left">
                                                <?php if(@$pn['position_6']['image_check_'.$i]!=NULL){?>
                                                    <a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i]); ?>" class="grid_image">
                                                        <?php echo @$pn['position_6']['playbtn_'.$i]?>
                                                        <img src="<?php echo html_escape(@$pn['position_6']['image_large_'.$i]); ?>" class="media-object width-60-lg" alt="<?php echo html_escape(@$pn['position_6']['image_alt_'.$i])?>">
                                                    </a>
                                                <?php } else{?>
                                                    <a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i]); ?>" class="grid_image">
                                                        <?php echo @$pn['position_6']['playbtn_'.$i]?>
                                                        <img src="<?php echo html_escape(@$pn['position_6']['default_img_'.$i]); ?>" class="media-object width-60-lg" alt="<?php echo html_escape(@$pn['position_6']['image_alt_'.$i])?>">
                                                    </a>
                                                <?php } ?>
                                            </div>

                                            <!-- /.Post image -->
                                            <div class="media-body">
                                                <div class="post-header">
                                                    <h3 class="media-heading"><a href="<?php echo html_escape(@$pn['position_6']['news_link_'.$i]); ?>"><?php echo htmlspecialchars_decode(@$pn['position_6']['news_title_'.$i]); ?></a></h3>
                                                    <div class="entry-meta">
                                                        <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_6']['post_date_as_'.$i]); ?></span>
                                                    </div>
                                                    <!-- /.Post meta -->
                                                </div>
                                            </div>
                                            
                                        </div>

                                    <?php }?>
                                </div>

                            <?php } ?>

                        </div>
                        

                        <?php if(@$home_page_positions[7]['status']==1){ ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="sec-block mb-4">
                                    <a href="<?php echo base_url('category/').$pn['position_7']['category_1']?>" class="sec-title"><?php echo html_escape($home_page_positions[7]['cat_name']);?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                    <div class="btn-part">
                                        <a href="<?php echo base_url('category/').$pn['position_7']['category_1']?>" class="btn-more"><?php echo display('read_more')?></a>
                                    </div>
                                </div>
                            </div>

                            <?php for($i=1; $i<=9; $i++){
                                if (!isset($pn['position_7']['news_title_'.$i]))
                                continue;
                            ?>

                                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                    <article class="grid_post grid_post_lg text-xs-center">
                                        <figure>
                                            <?php if(@$pn['position_7']['image_check_'.$i]!=NULL){?>
                                                <a href="<?php echo html_escape(@$pn['position_7']['news_link_'.$i]); ?>" class="grid_image">
                                                    <?php echo @$pn['position_7']['playbtn_'.$i]?>
                                                    <img src="<?php echo html_escape(@$pn['position_7']['image_large_'.$i]); ?>" class="img-fluid full-width-md" alt="<?php echo html_escape(@$pn['position_7']['image_alt_'.$i])?>">
                                                </a>
                                            <?php } else{?>
                                                <a href="<?php echo html_escape(@$pn['position_7']['news_link_'.$i]); ?>" class="grid_image">
                                                    <?php echo @$pn['position_7']['playbtn_'.$i]?>
                                                    <img src="<?php echo html_escape(@$pn['position_7']['default_img_'.$i]); ?>" class="img-fluid full-width-md" alt="<?php echo html_escape(@$pn['position_7']['image_alt_'.$i])?>">
                                                </a>
                                            <?php } ?>

                                            <figcaption>
                                                <div class="vh_center">
                                                    <div class="post-cat"><a href="<?php echo html_escape(@$pn['position_7']['category_link_'.$i]); ?>"><?php echo html_escape(@$pn['position_7']['category_name_'.$i]); ?></a></div>
                                                    <div class="entry-meta">
                                                        <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i></i><?php echo html_escape(@$pn['position_7']['post_date_as_'.$i]); ?></span>
                                                    </div>
                                                </div>
                                                <h6 class="grid_post_title"><a href="<?php echo html_escape(@$pn['position_7']['news_link_'.$i]); ?>" class="line_height_22"><?php echo html_escape(@$pn['position_7']['news_name_'.$i]); ?></a></h6>
                                                <!-- /.Post button -->
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            <?php }?>
                            
                        </div>
                        <?php } ?>

                    </div>


                    <div class="col-xl-3 col-lg-4 rightSidebar show-lg">

                        <?php 
                            $this->load->view('themes/' . $default_theme . '/components/__most_read');
                        ?>
                        
                        <?php 
                            $this->load->view('themes/' . $default_theme . '/components/__calender');
                        ?>

                        <?php 
                            $this->load->view('themes/' . $default_theme . '/components/__site_category');
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="row mt-4">

                    <?php if(@$home_page_positions[8]['status']==1){ ?>

                        <div class="col-lg-4">
                            <div class="sec-block mb-4">
                                <a href="<?php echo base_url('category/').$pn['position_8']['category_1']?>" class="sec-title"><?php echo html_escape($home_page_positions[8]['cat_name']);?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <div class="btn-part">
                                    <a href="<?php echo base_url('category/').$pn['position_8']['category_1']?>" class="btn-more"><?php echo display('read_more');?></a>
                                </div>
                            </div>

                            <article class="grid_post grid_post_lg text-xs-center">
                                <figure>
                                    <?php if(@$pn['position_8']['image_check_1']!=NULL){?>
                                        <a href="<?php echo html_escape(@$pn['position_8']['news_link_1']); ?>" class="grid_image">
                                            <?php echo @$pn['position_8']['playbtn_1']?>
                                            <img src="<?php echo html_escape(@$pn['position_8']['image_large_1']); ?>" class="img-fluid full-width-md" alt="<?php echo html_escape(@$pn['position_8']['image_alt_1'])?>">
                                        </a>
                                    <?php } else{?>
                                        <a href="<?php echo html_escape(@$pn['position_8']['news_link_1']); ?>" class="grid_image">
                                            <?php echo @$pn['position_8']['playbtn_1']?>
                                            <img src="<?php echo html_escape(@$pn['position_8']['default_img_1']); ?>" class="img-fluid full-width-md" alt="<?php echo html_escape(@$pn['position_8']['image_alt_1'])?>">
                                        </a>
                                    <?php } ?>  


                                    <figcaption>
                                        <div class="vh_center">
                                            <div class="post-cat"><a href="<?php echo html_escape(@$pn['position_8']['category_link_1']); ?>"><?php echo html_escape(@$pn['position_8']['category_name_1']); ?></a></div>
                                            <div class="entry-meta">
                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_8']['post_date_as_1']); ?></span>
                                            </div>
                                        </div>
                                        <h5 class="grid_post_title"><a href="<?php echo html_escape(@$pn['position_8']['news_link_1']); ?>" class="line_height_25"><?php echo htmlspecialchars_decode(@$pn['position_8']['news_title_1']); ?></a></h5>
                                        <?php echo ($pn['position_8']['short_news_1']);?>
                                        <!-- /.Post button -->
                                    </figcaption>
                                </figure>
                            </article>


                            <?php for($i=2; $i<=4; $i++){
                                if (!isset($pn['position_8']['news_title_'.$i]))
                                continue;
                            ?>

                                <div class="media meida-md">
                                    <div class="media-left">
                                        <?php if(@$pn['position_8']['image_check_'.$i]!=NULL){?>
                                            <a href="<?php echo html_escape(@$pn['position_8']['news_link_'.$i]); ?>" class="grid_image">
                                                <?php echo @$pn['position_8']['playbtn_'.$i]?>
                                                <img src="<?php echo html_escape(@$pn['position_8']['image_large_'.$i]); ?>" class="media-object width-60-lg" alt="<?php echo html_escape(@$pn['position_8']['image_alt_'.$i])?>">
                                            </a>
                                        <?php } else{?>
                                            <a href="<?php echo html_escape(@$pn['position_8']['news_link_'.$i]); ?>" class="grid_image">
                                                <?php echo @$pn['position_8']['playbtn_'.$i]?>
                                                <img src="<?php echo html_escape(@$pn['position_8']['default_img_'.$i]); ?>" class="media-object width-60-lg" alt="<?php echo html_escape(@$pn['position_8']['image_alt_'.$i])?>">
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <!-- /.Post image -->
                                    <div class="media-body">
                                        <div class="post-header">
                                            <h3 class="media-heading"><a href="<?php echo html_escape(@$pn['position_8']['news_link_'.$i]); ?>"><?php echo htmlspecialchars_decode(@$pn['position_8']['news_title_'.$i]); ?></a></h3>
                                            <div class="entry-meta">
                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_8']['post_date_as_'.$i]); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }?>

                        </div>

                    <?php }?>



                    <?php if(@$home_page_positions[9]['status']==1){ ?>

                        <div class="col-lg-4">
                            <div class="sec-block mb-4">
                                <a href="<?php echo base_url('category/').$pn['position_9']['category_1']?>" class="sec-title"><?php echo html_escape($home_page_positions[9]['cat_name']);?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <div class="btn-part">
                                    <a href="<?php echo base_url('category/').$pn['position_9']['category_1']?>" class="btn-more"><?php echo display('read_more');?></a>
                                </div>
                            </div>

                            <article class="grid_post grid_post_lg text-xs-center">

                                <figure>

                                    <?php if(@$pn['position_9']['image_check_1']!=NULL){?>
                                        <a href="<?php echo html_escape(@$pn['position_9']['news_link_1']); ?>" class="grid_image">
                                            <?php echo @$pn['position_9']['playbtn_1']?>
                                            <img src="<?php echo html_escape(@$pn['position_9']['image_large_1']); ?>" class="img-fluid full-width-md" alt="<?php echo html_escape(@$pn['position_9']['image_alt_1'])?>">
                                        </a>
                                    <?php } else{?>
                                        <a href="<?php echo html_escape(@$pn['position_9']['news_link_1']); ?>" class="grid_image">
                                            <?php echo @$pn['position_9']['playbtn_'.$i]?>
                                            <img src="<?php echo html_escape(@$pn['position_9']['default_img_1']); ?>" class="img-fluid full-width-md" alt="<?php echo html_escape(@$pn['position_9']['image_alt_1'])?>">
                                        </a>
                                    <?php } ?>  


                                    <figcaption>
                                        <div class="vh_center">
                                            <div class="post-cat"><a href="<?php echo html_escape(@$pn['position_9']['category_link_1']); ?>"><?php echo html_escape(@$pn['position_9']['category_name_1']); ?></a></div>
                                            <div class="entry-meta">
                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_9']['post_date_as_1']); ?></span>
                                            </div>
                                        </div>
                                        <h5 class="grid_post_title"><a href="<?php echo html_escape(@$pn['position_9']['news_link_1']); ?>" class="line_height_25"><?php echo htmlspecialchars_decode(@$pn['position_9']['news_title_1']); ?></a></h5>
                                        <?php echo ($pn['position_9']['short_news_1']);?>
                                        <!-- /.Post button -->
                                    </figcaption>

                                </figure>

                            </article>


                            <?php for($i=2; $i<=4; $i++){
                                if (!isset($pn['position_9']['news_title_'.$i]))
                                continue;
                            ?>

                                <div class="media meida-md">
                                    <div class="media-left">
                                        <?php if(@$pn['position_9']['image_check_'.$i]!=NULL){?>
                                            <a href="<?php echo html_escape(@$pn['position_9']['news_link_'.$i]); ?>" class="grid_image">
                                                <?php echo @$pn['position_9']['playbtn_'.$i]?>
                                                <img src="<?php echo html_escape(@$pn['position_9']['image_large_'.$i]); ?>" class="media-object width-60-lg" alt="<?php echo html_escape(@$pn['position_9']['image_alt_'.$i])?>">
                                            </a>
                                        <?php } else{?>
                                            <a href="<?php echo html_escape(@$pn['position_9']['news_link_'.$i]); ?>" class="grid_image">
                                                <?php echo @$pn['position_9']['playbtn_'.$i]?>
                                                <img src="<?php echo html_escape(@$pn['position_9']['default_img_'.$i]); ?>" class="media-object width-60-lg" alt="<?php echo html_escape(@$pn['position_9']['image_alt_'.$i])?>">
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <!-- /.Post image -->
                                    <div class="media-body">
                                        <div class="post-header">
                                            <h3 class="media-heading"><a href="<?php echo html_escape(@$pn['position_9']['news_link_'.$i]); ?>"><?php echo htmlspecialchars_decode(@$pn['position_9']['news_title_'.$i]); ?></a></h3>
                                            <div class="entry-meta">
                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_9']['post_date_as_'.$i]); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }?>

                        </div>

                    <?php }?>


                    <?php if(@$home_page_positions[10]['status']==1){ ?>

                        <div class="col-lg-4">
                            <div class="sec-block mb-4">
                                <a href="<?php echo base_url('category/').$pn['position_10']['category_1']?>" class="sec-title"><?php echo html_escape($home_page_positions[10]['cat_name']);?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <div class="btn-part">
                                    <a href="<?php echo base_url('category/').$pn['position_10']['category_1']?>" class="btn-more"><?php echo display('read_more');?></a>
                                </div>
                            </div>

                            <article class="grid_post grid_post_lg text-xs-center">
                                <figure>
                                    <?php if(@$pn['position_10']['image_check_1']!=NULL){?>
                                        <a href="<?php echo html_escape(@$pn['position_10']['news_link_1']); ?>" class="grid_image">
                                            <?php echo @$pn['position_10']['playbtn_1']?>
                                            <img src="<?php echo html_escape(@$pn['position_10']['image_large_1']); ?>" class="img-fluid full-width-md" alt="<?php echo html_escape(@$pn['position_10']['image_alt_1'])?>">
                                        </a>
                                    <?php } else{?>
                                        <a href="<?php echo html_escape(@$pn['position_10']['news_link_1']); ?>" class="grid_image">
                                            <?php echo @$pn['position_10']['playbtn_'.$i]?>
                                            <img src="<?php echo html_escape(@$pn['position_10']['default_img_1']); ?>" class="img-fluid full-width-md" alt="<?php echo html_escape(@$pn['position_10']['image_alt_1'])?>">
                                        </a>
                                    <?php } ?>  


                                    <figcaption>
                                        <div class="vh_center">
                                            <div class="post-cat"><a href="<?php echo html_escape(@$pn['position_10']['category_link_1']); ?>"><?php echo html_escape(@$pn['position_10']['category_name_1']); ?></a></div>
                                            <div class="entry-meta">
                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_10']['post_date_as_1']); ?></span>
                                            </div>
                                        </div>
                                        <h5 class="grid_post_title"><a href="<?php echo html_escape(@$pn['position_10']['news_link_1']); ?>" class="line_height_25"><?php echo htmlspecialchars_decode(@$pn['position_10']['news_title_1']); ?></a></h5>
                                        <?php echo ($pn['position_10']['short_news_1']);?>
                                        <!-- /.Post button -->
                                    </figcaption>

                                </figure>

                            </article>


                            <?php for($i=2; $i<=4; $i++){
                                if (!isset($pn['position_10']['news_title_'.$i]))
                                continue;
                            ?>

                                <div class="media meida-md">

                                    <div class="media-left">
                                        <?php if(@$pn['position_10']['image_check_'.$i]!=NULL){?>
                                            <a href="<?php echo html_escape(@$pn['position_10']['news_link_'.$i]); ?>" class="grid_image">
                                                <?php echo @$pn['position_10']['playbtn_'.$i]?>
                                                <img src="<?php echo html_escape(@$pn['position_10']['image_large_'.$i]); ?>" class="media-object width-60-lg" alt="<?php echo html_escape(@$pn['position_10']['image_alt_'.$i])?>">
                                            </a>
                                        <?php } else{?>
                                            <a href="<?php echo html_escape(@$pn['position_10']['news_link_'.$i]); ?>" class="grid_image">
                                                <?php echo @$pn['position_10']['playbtn_'.$i]?>
                                                <img src="<?php echo html_escape(@$pn['position_10']['default_img_'.$i]); ?>" class="media-object width-60-lg" alt="<?php echo html_escape(@$pn['position_10']['image_alt_'.$i])?>">
                                            </a>
                                        <?php } ?>
                                    </div>

                                    <!-- /.Post image -->
                                    <div class="media-body">
                                        <div class="post-header">
                                            <h3 class="media-heading"><a href="<?php echo html_escape(@$pn['position_10']['news_link_'.$i]); ?>"><?php echo htmlspecialchars_decode(@$pn['position_10']['news_title_'.$i]); ?></a></h3>
                                            <div class="entry-meta">
                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$pn['position_10']['post_date_as_'.$i]); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            <?php }?>

                        </div>

                    <?php }?>


                </div>
            </div>
        </div>

