<?php
// module directory name
$HmvcConfig['reporter']["_title"]     = "reporter System";
$HmvcConfig['reporter']["_description"] = "Simple reporter System";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['reporter']['_database'] = FALSE;
$HmvcConfig['reporter']["_tables"] = array( );
$HmvcConfig['reporter']['csrf_protection'] = FALSE;