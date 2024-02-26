        <?php 
            if($user_info->user_type==3){
                $designation = 'Contributor';
            }elseif($user_info->user_type==4){
                $designation = 'Contributor';
            }elseif($user_info->user_type==2){
                $designation = 'Contributor';
            }
        ?>
        <div class="profile-content" >
            <div class="container">
                <div class="jumbotron profile-card">
                    <div class="row ">
                        <div class="col-lg-4">
                            <div class="text-center">
                                <div class="avatar">
                                    <img src="<?php echo base_url().@$user_info->photo?>" class="img-fluid img-thumbnail" alt="<?php echo @$user_info->name?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <h2 ><?php echo @$designation?></h2>
                            <h3 class="border-top"><?php echo @$user_info->name?></h3>
                            <h4 >Number of post <?php echo @$number_of_post;?></h4>
                            <p><?php echo @$user_info->about?></p>
                        </div>
                    </div>


                    <div class="row text-center">
                        <div class="col-lg-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="article-post-inner">
            <div class="container">
                <div class="row">

                    <div class="text-center"><h2><?php echo display('las_20_post_heare')?></h2></div>

                    <div class="col-sm-6">

                        <div class="articale-list">
                           
                            <?php 
                                for($i=1; $i<=7; $i++){
                                if(!isset($author_post['news_title_'.$i]))
                                continue
                            ?>
                            <!--Post list-->
                           <div class="post-style2  fadeIn" data-wow-duration="1s">

                                <?php
                                    if (@$author_post['image_check_'.$i]!=NULL) {
                                    echo' <a href="'.html_escape(@$author_post['news_link_'.$i]).'">
                                                <img class="lazy" data-src="'. html_escape(@$author_post['image_thumb_'.$i]).'" src="'.@$befor_img.'" alt="'. html_escape(@$hn['image_alt_'.$i]).'" style="width:200px; height:136px;">
                                            </a>';
                                    } else {
                                        echo '<a href="'.html_escape(@$author_post['news_link_'.$i]).'">
                                        <img width="100%" src="http://img.youtube.com/vi/' . html_escape(@$author_post['video_' . $i]) . '/0.jpg" alt="photography" /></a>';
                                    }
                                ?>
                                
                                <div class="post-style2-detail">

                                    <h3><a href="<?php echo html_escape(@$author_post['news_link_'.$i]); ?>" title="">
                                        <?php echo html_escape(@$author_post['news_title_'.$i]); ?>
                                    </a></h3>
                                   
                                    <p><?php 
                                        @$news_details = $author_post['news_'.$i];
                                        $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 12));
                                        echo htmlspecialchars_decode($exploded);
                                    ?></p>

                                </div>
                            </div>
                            <?php } ?>
                        </div>

                    </div>

                    <div class="col-sm-6">


                        <div class="articale-list">
                           
                            <?php 
                                for($i=8; $i<=14; $i++){
                                if(!isset($author_post['news_title_'.$i]))
                                continue
                            ?>
                            <!--Post list-->
                           <div class="post-style2  fadeIn" data-wow-duration="1s">

                                <?php
                                    if (@$author_post['image_check_'.$i]!=NULL) {
                                    echo' <a href="'.html_escape(@$author_post['news_link_'.$i]).'">
                                                <img class="lazy" data-src="'. html_escape(@$author_post['image_thumb_'.$i]).'" src="'.@$befor_img.'" alt="'. html_escape(@$hn['image_alt_'.$i]).'" style="width:200px; height:136px;">
                                            </a>';
                                    } else {
                                        echo '<a href="'.html_escape(@$author_post['news_link_'.$i]).'">
                                        <img width="100%" src="http://img.youtube.com/vi/' . html_escape(@$author_post['video_' . $i]) . '/0.jpg" alt="photography" /></a>';
                                    }
                                ?>

                                

                                <div class="post-style2-detail">
                                    <h3><a href="<?php echo html_escape(@$author_post['news_link_'.$i]); ?>" title="">
                                        <?php echo html_escape(@$author_post['news_title_'.$i]); ?>
                                    </a></h3>
                                   

                                    <p><?php 
                                        @$news_details = $author_post['news_'.$i];
                                        $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 12));
                                        echo htmlspecialchars_decode($exploded);
                                    ?></p>

                                </div>
                            </div>

                            <?php } ?>
                            
                        </div>

                    </div>

                </div>
            </div>
        </section>
