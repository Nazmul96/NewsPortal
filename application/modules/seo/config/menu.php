<?php

// module name
$HmvcMenu["seo"] = array(
    //set icon
    "icon"           => "<i class='typcn typcn-arrow-shuffle mr-2'></i>", 
    //menu name

        "meta_setting" => array( 
            "controller" => "seo_controller",
            "method"     => "meta_setting",
            "permission" => "read"
        ),
       
        "social_sites" => array( 
            "controller" => "seo_controller",
            "method"     => "social_sites",
            "permission" => "read"
        ),
       
        "social_link" => array( 
            "controller" => "seo_controller",
            "method"     => "social_link",
            "permission" => "read"
        ),

        
   
);
   

 