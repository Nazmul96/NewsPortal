<?php

// module name
$HmvcMenu["news"] = array(
    //set icon
    "icon"           => "<i class='fas fa-tasks mr-2'></i>", 
    //menu name
        "add_post" => array( 
            "controller" => "news_post",
            "method"     => "add_post",
            "permission" => "create"
        ),

        "news_list" => array( 
            "controller" => "news_list",
            "method"     => "newses",
            "permission" => "read"
        ),

        "breaking_news" => array( 
            "controller" => "breacking",
            "method"     => "breaking_news",
            "permission" => "create"
        ),

        "positioning" => array( 
            "controller" => "positioning",
            "method"     => "position",
            "permission" => "create"
        ),        
   
        "redirection" => array( 
            "controller" => "redirection",
            "method"     => "manage_redirection",
            "permission" => "read"
        ),        
   
);
   

 