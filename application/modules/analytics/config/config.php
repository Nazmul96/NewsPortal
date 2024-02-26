<?php
// module directory name
$HmvcConfig['analytics']["_title"]     = "analytics System";
$HmvcConfig['analytics']["_description"] = "Simple analytics System";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['analytics']['_database'] = FALSE;
$HmvcConfig['analytics']["_tables"] = array( );
$HmvcConfig['analytics']['csrf_protection'] = FALSE;