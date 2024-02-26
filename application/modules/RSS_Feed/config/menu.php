<?php
// module name
$HmvcMenu["RSS_Feed"] = array(
    
    //set icon
    "icon"           => "<i class='fas fa-rss mr-2'></i>", 
    //menu name
    "rss_feed_import" => array( 
        "controller" => "rss_import_setup",
        "method"     => "setup",
        "permission" => "read"
    ),

    "rss_&_sitemap_link" => array( 
        "controller" => "rss_import_setup",
        "method"     => "rss_sitemap",
        "permission" => "read"
    ),

);
   

 