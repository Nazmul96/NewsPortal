<?php

// module name
$HmvcMenu["page"] = array(
    //set icon
    "icon"           => "<i class='typcn typcn-th-list-outline mr-2'></i>", 
    //menu name
        "add_new_page" => array( 
            "controller" => "page_controller",
            "method"     => "create_new_page",
            "permission" => "create"
        ),

        "page_list" => array( 
            "controller" => "page_controller",
            "method"     => "pages",
            "permission" => "read"
        )
   
);
   

 