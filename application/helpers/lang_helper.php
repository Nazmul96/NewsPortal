<?php defined('BASEPATH') OR exit('No direct script access allowed');


if (!function_exists("version")) {
    function version()
    {
        return $output = "v=3.4";
    }
}



if (!function_exists("convertedDate")) {
    
    function convertDate ($input)
    {

        $ci =& get_instance();
        $ci->load->database();


        $ci->db->select('*');
        $ci->db->from('settings');
        $ci->db->where('id',116);
        $qeury = $ci->db->get()->row();
        $ot = json_decode($qeury->details);

        if(@$ot->status==1){

            $engDATE =array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

            $dyDATE = array($ot->one, $ot->two, $ot->three, $ot->four, $ot->five, $ot->six, $ot->seven, $ot->eight, $ot->nine, $ot->zero, $ot->jan, $ot->feb, $ot->mar, $ot->app, $ot->may, $ot->june, $ot->july, $ot->aug, $ot->sep, $ot->oct, $ot->nov, $ot->dec, $ot->sat, $ot->sun, $ot->mon, $ot->tue, $ot->wed, $ot->thu, $ot->fri);

            $convertedDATE = str_replace($engDATE, $dyDATE, $input);
            return "$convertedDATE";

        }else{
            return $input;
        }
        
        
        
    }

}


if (!function_exists("makeString")) {
    
    function makeString ($data = [])
    {
        $output = "";
        $i = 0;
        foreach ($data as $val) {
            $output .= ($i>0?" ":"");
            $output .= display("$val");
            $i++;
        }
        return $output;
    }

}



if (!function_exists("imageLink")) {
    
    function imageLink()
    {
        $ci =& get_instance();
        $ci->load->database();

        if ($ci->db->table_exists('space_setup_tbl')){
            $spaceInfo = $ci->db->where('active_status',1)->get('space_setup_tbl')->row();
        }else{
            $spaceInfo = [];
        }

        if(@$spaceInfo){
            return html_escape($spaceInfo->url);
        }else{
            return base_url();
        }
        
    }

}



if (!function_exists('display')) {

    function display($text = null)
    {

        $ci =& get_instance();
        $ci->load->database();
        $table  = 'language';
        $phrase = 'phrase';
        $setting_table = 'lg_setting';
        $default_lang  = 'english';


        #---------------------------------------
        #   modify function 30-01-2018
        #--------------------------------------
        $set_lang = $ci->session->userdata('set_lang');
     
        if(!empty($set_lang)){
            $data = $ci->db->select('*')->from('set_language')->where('lang_code',$ci->session->userdata('set_lang'))->get()->row();
            
        } else {
            $data = $ci->db->get($setting_table)->row();
        }#end

        if (!empty($data->lang_name)) {
            $language =$data->lang_name; 
        } else {
            $language = $data->language; 
        } 


        if (!empty($text)) {

            if ($ci->db->table_exists($table)) { 

            
                if ($ci->db->field_exists($phrase, $table)) { 

                    if ($ci->db->field_exists($language, $table)) {

                        $row = $ci->db->select($language)
                              ->from($table)
                              ->where($phrase, $text)
                              ->get()
                              ->row(); 

                        if (!empty($row->$language)) {
                            return html_escape($row->$language);
                        } else {
                            return false;
                        }

                    } else {
                        return false;
                    }

                } else {
                    return false;
                }

            } else {
                return false;
            }            
        } else {
            return false;
        }  

    }
 
}


if (!function_exists('add')) {
    function add($text = null)
    {
        $google_ad_client = '<script><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5522088082187212" crossorigin="anonymous"></script> <ins class="adsbygoogle"   style="display:block" data-ad-client="ca-pub-5522088082187212" data-ad-slot="8352319773" data-ad-format="auto" data-full-width-responsive="true"></ins></script>';
    }
}

