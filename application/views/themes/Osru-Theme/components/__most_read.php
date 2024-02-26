<div class="latest_post_widget">
    <div class="sec-block mb-4">
        <a class="sec-title"><?php echo display('most_read');?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
    </div>

    <?php 
    for($i=1; $i<=5; $i++){
        if (!isset($mr['news_title_'.$i]))
        continue; 
    ?>
        <div class="media latest_post d-flex">

            <?php if(@$mr['image_check_' . $i]!=NULL){?>
                <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" class="media-left">
                    <?php echo @$mr['playbtn_'.$i]?>
                    <img class="media-object" src="<?php echo @$mr['image_thumb_' . $i]; ?>" alt="<?php echo html_escape(@$mr['image_alt_'.$i])?>" ></a>
            <?php } else{?>
                <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" class="media-left">
                    <?php echo @$mr['playbtn_'.$i]?>
                    <img class="media-object" src="<?php echo @$mr['default_img_' . $i]; ?>" alt="<?php echo html_escape(@$mr['image_alt_'.$i])?>" ></a>
                </a>
            <?php }?>

            <div class="media-body">
                <h6 class="media-heading"><a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"><?php echo htmlspecialchars_decode(@$mr['news_title_'.$i]);?></a></h6>
                <div class="entry-meta">
                    <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo html_escape(@$mr['post_date_as_'.$i]);?></span>
                </div>
            </div>
        </div>
    <?php }?>
</div>