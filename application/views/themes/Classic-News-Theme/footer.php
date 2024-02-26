<?php
// archive selected date
if ($this->uri->segment(1) == 'archive' && $this->uri->segment(2) != '') {
    $current_archive_date = $this->uri->segment(2);
} else {
    $current_archive_date = date("Y-m-d");
}
?>

<?php 
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

?>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="footer-box footer-logo-address"> <!-- address  -->
                        <img  src="<?php echo base_url() . html_escape(@$setting->footer_logo); ?>" class="img-responsive" alt="">
                        <address>
                            <?php echo @$setting->footer_text; ?>
                        </address>
                    </div> <!-- /.address  -->
                </div>
                <div class="col-sm-2 col-sm-offset-5">
                    <div class="subscribe-class">
                        <a  href="<?php echo base_url();?>subscription/index" class="btn text-white"><?php echo display('subscribe')?></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


        <div class="sub-footer">
            <!-- sub footer -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p><?php echo htmlspecialchars_decode(strip_tags(@$setting->copy_right));?></p>
                        <div class="social">
                            <ul>
                                <li><a href="<?php if (isset($social_link->fb)) echo html_escape(@$social_link->fb); ?>" class="facebook"><i class="fa  fa-facebook"></i> </a></li>
                                <li><a href="<?php if (isset($social_link->tw)) echo html_escape(@$social_link->tw); ?>" class="twitter"><i class="fa  fa-twitter"></i></a></li>
                                <li><a href="<?php if (isset($social_link->flickr)) echo html_escape(@$social_link->flickr); ?>" class="flickr"><i class="fa fa-flickr"></i></a></li>
                                <li><a href="<?php if (isset($social_link->youtube)) echo html_escape(@$social_link->youtube); ?>" class="youtube"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="<?php if (isset($social_link->vimo)) echo html_escape(@$social_link->vimo); ?>" class="vimeo"><i class="fa fa-vimeo"></i></a></li>
                                <li><a href="<?php if (isset($social_link->vk)) echo html_escape(@$social_link->vk); ?>" class="vk"><i class="fa fa-vk"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        
        <?php if($setting->speed_optimization==1){?>
            <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/app.js"></script>
        <?php } else{ ?>

        <script type="text/javascript" src="<?php echo base_url(); ?>movi/highslide-with-html.js"></script>
        <!-- /.sub footer -->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/metismenu/metisMenu.min.js"></script>
        <!-- Scrollbar js -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <!--theia sticky sidebar-->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/theia-sticky-sidebar/ResizeSensor.min.js"></script>
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.min.js"></script>
        <!-- animate js -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/WOW/wow.min.js"></script>
        
        <!-- Newstricker js -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/jquery.newsTicker.js"></script>
        <!--  classify JavaScript -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/classie.js"></script>
        <!-- owl carousel js -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/OwlCarousel2/owl.carousel.min.js"></script>
        <!-- youtube js -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/RYPP.js"></script>
        <!--bootstrap datepicker-->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- toastr -->
        <script src="<?php echo base_url()?>assets/plugins/toastr/toastr.min.js"></script>
        <!-- form -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/form-classie.js"></script>
        <!-- jquery easing -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/jquery.easing.min.js"></script>
        <!-- custom js -->
        <script src="<?php echo base_url(); ?>application/views/themes/<?php echo html_escape($default_theme); ?>/web-assets/js/custom.js"></script>

        <?php } ?>


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
