<?php

// module name
$HmvcMenu["user"] = array(
    //set icon
    "icon"           => "<i class='fas fa-users mr-2'></i>", 
    //menu name
        "user_list" => array( 
            "controller" => "users",
            "method"     => "user_list",
            "permission" => "read"
        ),
   
);
   

 