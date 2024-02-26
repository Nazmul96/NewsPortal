<?php
// module directory name
$HmvcConfig['menu']["_title"]     = "menu System";
$HmvcConfig['menu']["_description"] = "Simple menu System";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['menu']['_database'] = FALSE;
$HmvcConfig['menu']["_tables"] = array( );
$HmvcConfig['menu']['csrf_protection'] = FALSE;