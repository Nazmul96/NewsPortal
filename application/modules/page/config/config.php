<?php
// module directory name
$HmvcConfig['page']["_title"]     = "page System";
$HmvcConfig['page']["_description"] = "Simple page System";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['page']['_database'] = FALSE;
$HmvcConfig['page']["_tables"] = array( );
$HmvcConfig['page']['csrf_protection'] = FALSE;