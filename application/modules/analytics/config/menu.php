<?php

// module name
$HmvcMenu["analytics"] = array(
    //set icon
    "icon"           => "<i class='typcn typcn-chart-bar mr-2'></i>", 
    //menu name
        "live_now" => array( 
            "controller" => "user_analytics",
            "method"     => "index",
            "permission" => "read"
        ),

        "location_based" => array( 
            "controller" => "user_analytics",
            "method"     => "location_based",
            "permission" => "read"
        ),

        "news_based" => array( 
            "controller" => "user_analytics",
            "method"     => "news_based",
            "permission" => "read"
        ),

        "clear_analytics" => array( 
            "controller" => "user_analytics",
            "method"     => "clear_analytics",
            "permission" => "read"
        )
   
);
   

 