<?php
    // archive selected date
    if ($this->uri->segment(1) == 'archive' && $this->uri->segment(2) != '') {
        $current_archive_date = $this->uri->segment(2);
    } else {
        $current_archive_date = date("Y-m-d");
    }

    #------------------------------------------
    #  user analytics, save the database
    #------------------------------------------
    $status = $this->db->select('*')->from('settings')->where('id', 8)->get()->row();
    $an = json_decode(@$status->details);

    if($an->user_analytics=='active'){

        $ip = $_SERVER['REMOTE_ADDR'];

        function get_content($URL){
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($ch, CURLOPT_URL, $URL);
              $data = curl_exec($ch);
              curl_close($ch);
              return $data;
        }
        
        @$info = (object)json_decode(get_content("https://ipinfo.io/{$ip}/json"));  
        

        @$news_id = $this->uri->segment(3);
        @$link = base_url(uri_string());
        $user_analiytics = array(
            'ip' => @$ip,
            'country' => @$info->country,
            'city' => @$info->city,
            'link' => @$link,
            'news_id' => @$news_id,
            'date_time' => date("Y-m-d h:i:s"),
            'browser' =>  $this->input->user_agent(),
            'session' => session_id()
        );

        if (preg_match('/bot|crawl|curl|dataprovider|search|get|spider|find|java|majesticsEO|google|yahoo|teoma|contaxe|yandex|libwww-perl|facebookexternalhit/i', $_SERVER['HTTP_USER_AGENT'])) {
        } else {   
            $this->db->insert('user_analiytics',$user_analiytics);
        }
    }

    $CI =& get_instance();
    $CI->load->model('settings');
    $contact = $CI->settings->get_previous_settings('settings', 113);
    $contact_page = json_decode('[' . $contact . ']');

    $ascurl = base_url().'application/views/themes/'.html_escape($default_theme).'/web-assets';

?>

        <footer>
            <div class="main-footer mt-5">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-3 col-md-4">
                            <div class="footer-box">
                                <div class="footer-logo">
                                    <img src="<?php echo base_url() . html_escape(@$setting->footer_logo); ?>" class="img-fluid" alt="">
                                </div>
                                <p><?php echo @$setting->footer_text; ?></p>
                            </div>

                            <div class="col-sm-12">
                                <a class="btn link-btn" href="<?php echo base_url();?>subscription/index" ><?php echo display('subscribe')?> ⇾</a>
                            </div>
                        </div>

                        

                        <div class="col-sm-2 col-md-2">

                            <?php if (isset($footer_menu) && is_array($footer_menu)) {?>
                                    <div class="footer-box">
                                        <h3 class="widget-title"><?php echo html_escape(strip_tags(@$footer_menu[0]->menu_name));?></h3>
                                        <ul class="footer-cat">
                                            <?php
                                                $bu = base_url();
                                                if (isset($footer_menu) && is_array($footer_menu)) {
                                                    $menu = '';
                                                    foreach ($footer_menu as $key => $value) {
                                                        if($value->slug!=NULL){
                                                            $slug1 = $bu.'page/'.html_escape(strip_tags($value->slug));
                                                        }elseif ($value->link_url!=NULL) {
                                                            $slug1 = $value->link_url;
                                                        }else{
                                                            $slug1 = $bu."#";
                                                        }

                                                       echo  '<li><a href="' . html_escape($slug1) . '/">' . html_escape(strip_tags($value->menu_lavel)) . ' </a></li>';
                                                    }
                                                }
                                            ?>
                                        </ul>
                                    </div>
                            <?php } ?>

                        </div>

                        <div class="col-sm-3 col-md-3">
                            <div class="footer-box">
                                <h3 class="widget-title"><?php echo display('contact_us')?></h3>
                                <div class="textwidget">
                                    <p>
                                        <?php if (isset($contact_page[0]->address)) echo htmlspecialchars_decode(@$contact_page[0]->address); ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-3 columns">
                            <div class="footer-box">
                                <h3 class="widget-title"><?php echo display('most_read'); ?></h3>

                                <?php for($i=1; $i<=3; $i++){ 
                                    if (!isset($mr['news_title_'.$i]))
                                    continue;
                                ?>

                                <div class="media latest_post">
                                    <?php if(@$mr['image_check_' . $i]!=NULL){?>
                                         <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"  class="media-left"><img class="media-object" src="<?php echo html_escape(@$mr['image_thumb_' . $i]); ?>" alt="<?php echo html_escape(@$mr['image_alt_'.$i])?>" ></a>
                                    <?php } else{?>
                                        <a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>" class="media-left">
                                            <img  src="http://img.youtube.com/vi/<?php echo html_escape(@$mr['video_' . $i]); ?>/0.jpg"  class="media-object">
                                       </a>
                                    <?php }?>

                                    <div class="media-body">
                                        <h6 class="media-heading"><a href="<?php echo html_escape(@$mr['news_link_'.$i]);?>"><?php echo html_escape(@$mr['news_title_'.$i]);?></a></h6>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="sub-footer">
                <?php echo html_escape(@$setting->copy_right);?>
            </div>
        </footer>
    </div>

    <?php if($setting->speed_optimization==1){?>
    <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/app.js?<?php echo version()?>"></script>
    <?php } else{ ?> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo $ascurl;?>/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="https://jqueryui.com/resources/demos/datepicker/i18n/datepicker-ar.js" type="text/javascript"></script>
    <script src="<?php echo $ascurl;?>/plugins/bootstrap-4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo $ascurl;?>/js/animsition.min.js"></script>
    <script src="<?php echo $ascurl;?>/plugins/metismenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo $ascurl;?>/plugins/theia-sticky-sidebar/dist/ResizeSensor.min.js"></script>
    <script src="<?php echo $ascurl;?>/plugins/theia-sticky-sidebar/dist/theia-sticky-sidebar.min.js"></script>
    <script src="<?php echo $ascurl;?>/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo $ascurl;?>/js/readingTime.min.js"></script>
    <script src="<?php echo $ascurl;?>/js/theme.js"></script>
    <?php } ?> 

    <script src="<?php echo $ascurl; ?>/plugins/jquery-ui-1.12.1.custom/i18n/ar.js" type="text/javascript"></script>
    
        <?php if(!empty($schema)){?>
            <!-- schema js -->
            <script type="application/ld+json">
                <?php 
                echo '{
                      "@context": "https://schema.org",
                      "@type": "'.@$schema->type.'",
                      "mainEntityOfPage": {
                        "@type": "WebPage",
                        "@id": "'.@$schema->url.'/"
                      },
                      "headline": "'.@$schema->headline.'",
                      "description": "'.@$schema->description.'",
                      "image": "'.@$schema->image_url.'",  
                      "author": {
                        "@type": "'.@$schema->author_type.'",
                        "name": "'.@$schema->author_name.'"
                      },  
                      "publisher": {
                        "@type": "Organization",
                        "name": "'.@$schema->publisher.'",
                        "logo": {
                          "@type": "ImageObject",
                          "url": "'.@$schema->publisher_logo.'"
                        }
                      },
                      "datePublished": "'.@$schema->publishdate.'",
                      "dateModified": "'.@$schema->modifidate.'"
                    }';
                ?>
            </script>
        <?php } ?>

        <?php if(!empty($cschema)){?>
            <?php foreach($cschema as $cval){?>
            <!-- schema js -->
            <script type="application/ld+json">
                <?php echo @$cval->schema?>
            </script>
        <?php }?>
        <?php }?>


</body>

</html>