<?php

// module name
$HmvcMenu["tips_and_prediction"] = array(
  
    "icon"           => " <i class='typcn typcn-film mr-2'></i>", 
     
    "create_tips_prediction" => array(
        "controller" => "TipsPrediction",
        "method"     => "create_Tips_prediction",
        "permission" => "create"
    ),

    "tips_prediction_list" => array(
        "controller" => "TipsPrediction",
        "method"     => "photo_list",
        "permission" => "read"
    ),

    "edit_tips_prediction" => array(
        "controller" => "Podcust_controller",
        "method"     => "list",
        "permission" => "read"
    ),

);
   

 