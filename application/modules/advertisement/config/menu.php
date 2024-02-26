<?php

// module name
$HmvcMenu["advertisement"] = array(
    //set icon
    "icon"           => "<i class='typcn typcn-volume-up mr-2'></i>", 

        "new_advertise" => array( 
            "controller" => "ad",
            "method"     => "index",
            "permission" => "create"
        ),
        
        "update_advertise" => array( 
            "controller" => "ad",
            "method"     => "view_ads",
            "permission" => "read"
        ),
   
);
   

 