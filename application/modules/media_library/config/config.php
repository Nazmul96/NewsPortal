<?php
// module directory name
$HmvcConfig['media_library']["_title"]     = "media_library System";
$HmvcConfig['media_library']["_description"] = "Simple media_library System";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['media_library']['_database'] = FALSE;
$HmvcConfig['media_library']["_tables"] = array( );
$HmvcConfig['media_library']['csrf_protection'] = FALSE;