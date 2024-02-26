<?php
// module name
$HmvcMenu["settings"] = array(
    //set icon
    "icon"           => " <i class='fas fa-cogs mr-2'></i> ", 
    
        //menu name
        'app_setting'    => array( 
            "controller" => "view_setup",
            "method"     => "app_setting",
            "permission" => "create"
        ),

        'panel_face'    => array( 
            "controller" => "view_setup",
            "method"     => "panel_face",
            "permission" => "create"
        ),

        'home_page'  => array( 
            "controller" => "view_setup",
            "method"     => "home_view_settings",
            "permission" => "read"
        ), 

        'contact_page_setup'  => array( 
            "controller" => "view_setup",
            "method"     => "contact_page_setup",
            "permission" => "read"
        ),

        '404_page_setting'  => array( 
            "controller" => "view_setup",
            "method"     => "page_setup_404",
            "permission" => "create"
        ),

        'email_setting'  => array( 
            "controller" => "view_setup",
            "method"     => "email_setting",
            "permission" => "read"
        ),

        'social_auth_setting'  => array( 
            "controller" => "view_setup",
            "method"     => "social_auth_setting",
            "permission" => "read"
        ),

        'color_setting'  => array( 
            "controller" => "color_setting",
            "method"     => "theme_color_setting",
            "permission" => "read"
        ),

        'cache_system'  => array( 
            "controller" => "cache_controller",
            "method"     => "cache",
            "permission" => "read"
        ),

        'others'  => array( 
            "controller" => "others_settings",
            "method"     => "setting",
            "permission" => "read"
        ),

        'date_field_setup'  => array( 
            "controller" => "others_settings",
            "method"     => "dateconverter",
            "permission" => "read"
        ),


        'language_setting'  => array( 
            "controller" => "language",
            "method"     => "index",
            "permission" => "read"
        )

     
);
   

 