<?php
// module directory name
$HmvcConfig['categories']["_title"]     = "categories System";
$HmvcConfig['categories']["_description"] = "Simple categories System";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['categories']['_database'] = FALSE;
$HmvcConfig['categories']["_tables"] = array( );
$HmvcConfig['categories']['csrf_protection'] = FALSE;