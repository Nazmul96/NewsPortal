
                <div class="row">
                        <div class="col-md-12">

                            <div class="comment-bx-area">
                             <?php echo form_open('Comments_controller/comments', 'id="CommentForm"');?>
                                <div class="comment-body">
                                    <div class="comment-as">
                                        <span class="com-title">Comment As:</span>
                                        
                                        <div class="dropdown main-nav">
                                            <?php if($this->session->userdata('id')!=NULL){?>
                                           
                                            <button class="btn btn-com dropdown-toggle" type="button" data-toggle="dropdown"> <?php echo $this->session->userdata('name');?>
                                                    <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url(); ?>Signout/index" class="popup-with-zoom-anim"><?php echo display('signout')?></a></li>
                                            </ul>
                                            <?php } else{?>
                                                <button class="btn btn-com dropdown-toggle" type="button" data-toggle="dropdown"><?php echo display('sign_in')?>
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo base_url();?>Registration/index" class="cd-signin" ><?php echo display('sign_in')?></a></li>
                                                    <li><a href="<?php echo base_url();?>Registration/index" class="cd-signup" ><?php echo display('sign_up')?></a></li>
                                                </ul>

                                            <?php }?>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <span class="successMessage"></span>

                                    <?php if($this->session->userdata('id')!=NULL){?>
                                        <textarea class="form-control" id="message" name="comment" placeholder="Entter Your Comment ..." maxlength="140" rows="4"></textarea>
                                        <input type="hidden" name="news_id" value="<?php echo html_escape($news_id);?>">

                                        <div class="comment-footer">
                                            <button type="submit" class="btn btn-com active"><?php echo display('publish')?></button>
                                        </div>
                                    
                                    <?php }?>
                                <?php echo form_close();?>
                            </div>


                            <!-- comment box
                            ============================================ -->
                            <div class="comments-container">

                                <div class="block">
                                    <!-- filters select -->
                                    <h4 class="block-title"><span><?php echo display('comment')?> (<?php echo html_escape(@$total_comments);?>)</span></h4>
                                </div>

                                <div class="mid-content">
                                <?php
                                if (isset($comments)) {
                                    foreach ($comments as $comment) {
                                ?>
                                <ul id="comments-list" class="comments-list loadMoreicon">
                                    <li>
                                        <div class="comment-main-level">
                                            <!-- Avatar -->
                                            <div class="comment-avatar">
                                                <?php if($comment->photo!=NULL){?>
                                                <img src="<?php echo base_url(). $comment->photo;?>" class="img-responsive" alt="">
                                                <?php } else{ ?>
                                                <img src="<?php echo base_url();?> uploads/user/user.png" class="img-responsive" alt="">
                                                <?php } ?>
                                            </div>
                                            <!-- Contenedor del Comentario -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name"><a href="#"><?php echo html_escape(strip_tags($comment->name));?></a></h6>
                                                    <span>
                                                        <?php 
                                                            echo html_escape($comment->com_date_time);
                                                        ?>   
                                                    </span>
                                                    
                                                    <i class="fa fa-reply replayComment"></i>
                                                    <input type="hidden" value="<?php echo html_escape($comment->com_id);?>">
                                                </div>

                                                <div class="comment-content">
                                                    <?php echo htmlspecialchars_decode($comment->comments)?>
                                                </div>

                                                 <?php
                                                    $c_u_isLogedIn=$this->session->userdata("id");
                                                    if ($c_u_isLogedIn != null) {
                                                ?>

                                                <div class="comment-bx-area hide replayCommentBox">
                                                   <?php echo form_open('Comments_controller/re_comments', 'class="reComments"');?>
                                                    <div class="comment-body">
                                                        <textarea class="form-control" name="comments" placeholder="Enter Your Message" rows="4"></textarea>
                                                        
                                                        <input type="hidden" name="com_replay_id" value="<?php echo html_escape($comment->com_id)?>">
                                                        <input type="hidden" name="news_id" value="<?php echo html_escape($news_id);?>">
                                                    </div>
                                                    <div class="comment-footer">
                                                        <button type="submit" class="btn btn-com active"><?php echo display('publish')?></button>
                                                    </div>
                                                    <?php echo form_close();?>
                                                </div>

                                                <?php }?>
                                            </div>
                                        </div>

                                        <!-- Respuestas de los comentarios -->
                                        <ul class="comments-list reply-list">
                                                <?php
                                                   $replies = $this->db->select('user_info.id,user_info.name,user_info.photo,comments_info.*')
                                                    ->from('comments_info')
                                                    ->join('user_info', 'comments_info.com_user_id = user_info.id')
                                                    ->where('com_replay_id', $comment->com_id)
                                                    ->where('com_status', '1')
                                                    ->where_not_in('com_status', '0')
                                                    ->get()
                                                    ->result();
                                                    foreach ($replies as $reply) {
                                                ?>
                                            <li>
                                                <!-- Avatar -->
                                                <div class="comment-avatar">
                                                    <?php if($reply->photo!=NULL){?>
                                                    <img src="<?php echo base_url(). html_escape($reply->photo);?>" class="img-responsive" alt="">
                                                    <?php } else{ ?>
                                                    <img src="<?php echo base_url();?> uploads/user/user.png" class="img-responsive" alt="">
                                                    <?php } ?>
                                                </div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="comment-name"><a href="#"><?php echo html_escape(strip_tags(@$reply->name))?></a></h6>
                                                        <span>
                                                            <?php 
                                                                echo html_escape($reply->com_date_time);
                                                            ?>
                                                        </span>
                                                        <i class="fa fa-reply replayComment1"></i>
                                                    </div>

                                                    <div class="comment-content">
                                                       <?php echo html_escape($reply->comments)?>
                                                    </div>


                                                    <?php
                                                        $c_u_isLogedIn=$this->session->userdata("id");
                                                        if ($c_u_isLogedIn != null) {
                                                    ?>
                                                    <div class="comment-bx-area hide replayCommentBox margin-bottom15" >
                                                        
                                                        <?php echo form_open('Comments_controller/re_comments', 'class="reComments1"');?>
                                                        
                                                        <div class="comment-body">
                                                            <textarea class="form-control" name="comments" placeholder="Enter Your Message" rows="4"></textarea>
                                                            <input type="hidden" name="com_replay_id" value="<?php echo html_escape($reply->com_id)?>">
                                                            <input type="hidden" name="news_id" value="<?php echo html_escape($news_id);?>">
                                                        </div>
                                                        <div class="comment-footer">
                                                            <button type="submit" class="btn btn-com active"><?php echo display('publish')?></button>
                                                        </div>

                                                        <?php echo form_close();?>
                                                    </div>
                                                    <?php } ?>
                                                </div>


                                                <ul class="comments-list reply-list">
                                                    <?php
                                                       $recommentrep = $this->db->select('user_info.id,user_info.name,user_info.photo,comments_info.*')
                                                        ->from('comments_info')
                                                        ->join('user_info', 'comments_info.com_user_id = user_info.id')
                                                        ->where('com_replay_id', $reply->com_id)
                                                        ->where('com_status', '1')
                                                        ->where_not_in('com_status', '0')
                                                        ->get()
                                                        ->result();

                                                    foreach ($recommentrep as $reply1) {
                                                    ?>
                                                    <li>
                                                        <!-- Avatar -->
                                                         <div class="comment-avatar">
                                                            <?php if(@$reply1->photo!=NULL){?>
                                                            <img src="<?php echo base_url(). html_escape($reply1->photo);?>" class="img-responsive" alt="">
                                                            <?php } else{ ?>
                                                            <img src="<?php echo base_url();?> uploads/user/user.png" class="img-responsive" alt="">
                                                            <?php } ?>
                                                        </div>
                                                        <!-- Contenedor del Comentario -->
                                                        <div class="comment-box">
                                                            <div class="comment-head">
                                                                <h6 class="comment-name"><a href="#"><?php echo html_escape(strip_tags($reply1->name))?></a></h6>
                                                                <span>
                                                                <?php 
                                                                    echo html_escape($reply1->com_date_time);
                                                                    $now = date("Y-m-d H:i:s");
                                                                     
                                                                ?> 
                                                                </span>
                                                                <input type="hidden" name="com_replay_id" value="<?php echo html_escape($reply1->com_id);?>">
                                                                <input type="hidden" name="news_id" value="<?php echo html_escape($news_id);?>">
                                                            </div>
                                                            <div class="comment-content">
                                                               <?php echo htmlspecialchars_decode($reply1->comments)?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php
                                                    }
                                                    ?>  
                                                </ul>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                                <?php
                                    }
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                </div><!--END OF COMMENTS AREA-->
