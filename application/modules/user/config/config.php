<?php
// module directory name
$HmvcConfig['user']["_title"]     = "user System";
$HmvcConfig['user']["_description"] = "Simple user System";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['user']['_database'] = FALSE;
$HmvcConfig['user']["_tables"] = array( );
$HmvcConfig['user']['csrf_protection'] = FALSE;