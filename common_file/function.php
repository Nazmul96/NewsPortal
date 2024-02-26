<?php 


    function time_elaps_test($last_update,$time_stamp){

        $last_activatiy=strtotime($last_update) ;
        $current_time=strtotime(date('Y-m-d H:i:s'));
        $time_diff=$current_time-$last_activatiy;

        $sec     =  $time_diff;
        $min     = round($time_diff / 60 );
        $hrs     = round($time_diff  / 3600);
        $days    = round($time_diff / 86400 );
        $weeks   = round( $time_diff / 604800);
        $mnths   = round( $time_diff / 2600640 );
        $yrs     = round( $time_diff / 31207680 );

        if($sec <= 60) {
            echo ("$sec seconds ago");
        }
        // Check for minutes
        else if($min <= 60) {
            if($min==1) {
                echo ("one minute ago");
            }
            else {
                echo ("$min minutes ago");
            }
        }
        // Check for hours
        else if($hrs <= 24) {

            if($hrs == 1) {
            echo ("an hour ago");
            }
            else {
            echo ("$hrs hours ago");
            }
        }
        // Check for days
        else if($days <= 7) {
            echo date('l, d M, Y',$time_stamp);
        }
        // Check for weeks
        else if($weeks <= 4.3) {
            echo date('l, d M, Y',$time_stamp);
           
        }
        // Check for months
        else if($mnths <= 12) {
            echo date('l, d M, Y',$time_stamp);
        }
        // Check for years
        else {
            echo date('l, d M, Y',$time_stamp); 
        }
    }



?>