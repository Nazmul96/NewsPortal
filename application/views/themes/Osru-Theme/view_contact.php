<?php
    $contact_page = json_decode('[' . $contact_page_setup . ']');
    $ascurl = base_url().'application/views/themes/'.html_escape($default_theme).'/web-assets';
?>


        <!-- /.Start of news masonry -->
        <div class="page-outer-wrap">
            <!-- /.End of navigation -->
            <div class="page-content">
                <div class="container">
                    <div class="row mt-5">

                        <div class="col-sm-12">
                            <?php if(!empty(validation_errors())){?>
                               <div class="alert alert-danger ">
                               <a href="#" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong><?php  echo validation_errors(); ?></strong>
                               </div>

                                <?php 
                            }
                                if($this->session->flashdata('message')){
                                    echo '<div class="alert alert-success ">
                                   <a href="#" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong>'.$this->session->flashdata('message').'</strong>
                                   </div>';
                                }

                                if($this->session->flashdata('exception')){
                                    echo '<div class="alert alert-danger ">
                                   <a href="#" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong>'.$this->session->flashdata('exception').'</strong>
                                   </div>';
                                }
                            ?>
                        </div>


                        <div class="col-lg-6 p_r_40">
                            <div class="contact-info">
                                
                                <div class="contact-address">
                                    <div class="contact-text">
                                        <h4><?php echo display('get_in_touch')?></h4>
                                        <p><?php if (isset($contact_page[0]->content)) echo htmlspecialchars_decode(@$contact_page[0]->content); ?> </p>
                                    </div>
                                    <div class="address-info">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img src="<?php echo $ascurl;?>/images/icon/agenda.png" class="img-responsive" alt="">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="addon-title"><?php echo display('address')?></h4>
                                                <div class="addon-text"> <?php if (isset($contact_page[0]->address)) echo htmlspecialchars_decode(@$contact_page[0]->address); ?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="address-info">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img src="<?php echo $ascurl;?>/images/icon/email.png" class="img-responsive" alt="">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="addon-title"><?php echo display('email')?></h4>
                                                <div class="addon-text"><?php if (isset($contact_page[0]->email)) echo html_escape(@$contact_page[0]->email); ?><br>
                                                    <?php if (isset($contact_page[0]->website)) echo html_escape(@$contact_page[0]->website); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="address-info">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img src="<?php echo $ascurl;?>/images/icon/phone.png" class="img-responsive" alt="">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="addon-title"><?php echo display('phone')?></h4>
                                                <div class="addon-text"><?php if (isset($contact_page[0]->phone)) echo html_escape(@$contact_page[0]->phone); ?><br>
                                                    <?php if (isset($contact_page[0]->phone_two)) echo html_escape(@$contact_page[0]->phone_two); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mb-4"><?php echo display('send_us')?></h4>

                                <?php  echo form_open('contacts'); ?>

                                    <div class="row">

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control mb-4" name="first_name" required="1" autocomplete="off" placeholder="<?php echo display('first_name')?>">
                                        </div>

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control mb-4" name="last_name" required="1" autocomplete="off" placeholder="<?php echo display('last_name')?>">
                                        </div>

                                        <div class="col-12">
                                            <input type="email" class="form-control mb-4" name="email" required="1" autocomplete="off" placeholder="<?php echo display('email')?>">
                                        </div>

                                        <div class="col-12">
                                            <input type="text" class="form-control mb-4" name="subject" required="1" autocomplete="off" placeholder="<?php echo display('subject')?>">
                                        </div>

                                        <div class="col-12">
                                            <textarea class="form-control mb-4" id="textarea" rows="5" required="1" name="message" placeholder="<?php echo display('message')?>"></textarea>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn link-btn"><?php echo display('send')?> ⇾</button>
                                        </div>

                                    </div>

                                <?php echo form_close(); ?>
                            </div>
                        </div>

                        <div class="col-lg-6 p_l_40">
                            <!-- The element that will contain our Google Map. This is used in both the Javascript and CSS above. -->
                            <div id="map" class="gmap1"></div>
                        </div>
                    </div>
                </div>
                <div class="height_30"></div>
            </div>
        </div> 


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcMXKkIZSG1Ev3nNkDE5vZpfT_KG9zBT8"></script>
    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);
        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 15,
                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(<?php echo $contact_page[0]->latitude?>, <?php echo $contact_page[0]->longitude?>), //Dhaka
                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"color": "#444444"}]}, {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2f2f2"}]}, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100}, {"lightness": 45}]}, {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "simplified"}]}, {"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "water", "elementType": "all", "stylers": [{"color": "#d17c78"}, {"visibility": "on"}]}]
            };
            // image from external URL
            var myIcon = '<?php echo $ascurl;?>/images/icon/marker.png';
            //preparing the image so it can be used as a marker
            //https://developers.google.com/maps/documentation/javascript/reference#Icon
            //includes hacky fix "size" to allow for wobble
            var catIcon = {
                url: myIcon
            };
            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');
            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo $contact_page[0]->latitude?>, <?php echo $contact_page[0]->longitude?>), //Dhaka
                map: map,
                icon: catIcon,
                title: 'Snazzy!',
                animation: google.maps.Animation.DROP,
            });
        }
    </script>     
