<?php
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
    $archive_date = $this->input->get('date',TRUE);
?>

<section class="block-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h1><?php echo display('archive')?></h1>

                <div class="breadcrumbs">
                    <ul>
                        <li><i class="pe-7s-home"></i> <a href="<?php echo base_url();?>" title=""><?php echo display('home')?></a></li>
                        <li><a href="<?php echo base_url();?>" title=""><?php echo html_escape(@$archive_date);?></a></li>
                    </ul>
                </div>

                <?php
                $fa = array('method' =>'GET' ); 
                echo form_open('archive',$fa);?>

                    <div class="form-group">
                        <label for="from"><?php echo display('archive')?></label>
                        <input  class="form-control" type="text" id="archive-date" autocomplete="off" required="1" name="date">
                        <input class="btn btn-style" type="submit" value="Search">
                    </div> 

                <?php echo form_close();?>    
            </div>
        </div>
    </div>
</section>


<section class="archive">
    <!-- left content -->
    <div class="container">
        <div class="row">
          

                <?php if (isset($sn) && empty($sn)){ ?>
                    <div class="col-sm-12 col-md-12">
                        <div class="alert alert-danger"><button class="close" data-dismiss="alert">&times;</button><b>
                        <span >There is no news available on the = <?php echo html_escape($archive_date?$archive_date:'') ?></span>
                        </b></div>
                    </div>
                <?php } ?>



                <?php
                    $n_s = 1;
                    for ($i = 1; $i <= 8; $i++) {
                        if (!isset($sn['news_title_' . $i]))
                            continue;
                ?>


                    <div class="col-sm-12 col-md-12">
                        <!-- archive post -->
                        <div class="post-style2 archive-post-style-2">

                            <?php
                                if (@$sn['image_check_' . $i]!=NULL) {
                                    echo'<a  href="'.html_escape($sn['news_link_'.$i]).'">
                                    <img  src="'.html_escape(@$sn['image_large_' . $i]).'" alt="'.html_escape(@$sn['image_alt_' . $i]).'"></a>';
                                } else {
                                    echo'<a  href="'.html_escape($sn['news_link_'.$i]).'">
                                    <img src="http://img.youtube.com/vi/' . html_escape($sn['video_' . $i]) . '/0.jpg" alt="photography" /></a>';
                                }
                            ?>

                            <div class="post-style2-detail">
                                <h4><a href="<?php echo html_escape(@$sn['news_link_'.$i]);?>" title=""><?php echo html_escape(@$sn['news_title_'.$i]);?></a></h4>
                                <div class="date">
                                    <ul>
                                        <li><?php echo display('by')?> <a title="" ><span><?php echo html_escape($sn['post_by_name_' . $i]); ?></span></a> --</li>
                                        <li><a ><?php echo html_escape(@$sn['post_date_as_' . $i]); ?></a><li>

                                    </ul>
                                </div>
                                <?php echo implode(' ', array_slice(explode(' ', htmlspecialchars_decode(strip_tags($sn['full_news_' . $i]))), 0, 35));
                                ?><a href="<?php echo html_escape(@$sn['news_link_'.$i]);?>"> <?php echo display('read_more')?></a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            <!-- pagination -->
            <div class="row">
                <div class="col-sm-12">
                <?php echo htmlspecialchars_decode($links);?>
                </div>
            </div>
          
        </div>
        <!-- pagination -->     
    </div>
</section>

 
