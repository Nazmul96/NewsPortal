<?php

// module name
$HmvcMenu["media_library"] = array(
    //set icon
    "icon"           => " <i class='typcn typcn-film mr-2'></i>", 
    //menu name
        "photo_upload" => array( 
            "controller" => "media_controller",
            "method"     => "photo_upload",
            "permission" => "create"
        ),


        "photo_list" => array( 
            "controller" => "media_controller",
            "method"     => "photo_list",
            "permission" => "read"
        ),
   
        "podcust" => array( 
            "controller" => "Podcust_controller",
            "method"     => "list",
            "permission" => "read"
        ),

);
   

 