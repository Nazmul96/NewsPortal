<?php
// module directory name
$HmvcConfig['advertisement']["_title"]     = "advertisement System";
$HmvcConfig['advertisement']["_description"] = "Simple advertisement System";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['advertisement']['_database'] = FALSE;
$HmvcConfig['advertisement']["_tables"] = array( );
$HmvcConfig['advertisement']['csrf_protection'] = FALSE;