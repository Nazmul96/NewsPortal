<?php

// module name
$HmvcMenu["categories"] = array(
    //set icon
    "icon"           => "<i class='typcn typcn-tags mr-2'></i>", 
    //menu name
        "add_category" => array( 
            "controller" => "category",
            "method"     => "add_category",
            "permission" => "create"
        ),

        "category_list" => array( 
            "controller" => "category",
            "method"     => "list_of_categories",
            "permission" => "read"
        )
   
);
   

 