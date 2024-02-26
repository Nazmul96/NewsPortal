<?php
// module directory name
$HmvcConfig['archive']["_title"]     = "archive System";
$HmvcConfig['archive']["_description"] = "Simple archive System";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['archive']['_database'] = FALSE;
$HmvcConfig['archive']["_tables"] = array( );
$HmvcConfig['archive']['csrf_protection'] = FALSE;