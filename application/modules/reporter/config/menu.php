<?php

// module name
$HmvcMenu["reporter"] = array(
    //set icon
    "icon"           => "<i class='fas fa-user-tie mr-2'></i> ", 
    //menu name

        "repoter_list" => array( 
            "controller" => "reporters",
            "method"     => "repoter_list",
            "permission" => "read"
        ),
       
        "last_20_access" => array( 
            "controller" => "reporters",
            "method"     => "last_20_access",
            "permission" => "read"
        )
   

   
);
   

 