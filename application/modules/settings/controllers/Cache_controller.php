<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @System  : Cache controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Cache_controller extends MX_Controller {

    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');

    }


    public function cache() {

        $this->permission->check_label('cache_system')->read()->redirect();

        $data['d'] = $this->db->select('*')->from('cache')->where('id',1)->get()->row();

        $data['title'] = display('theme_color_setting');
        $data['module'] = "settings"; 
        $data['page']   = "settings/__cache_setting"; 
        echo Modules::run('template/layout', $data); 

    }


    public function delete_cache(){
        $this->permission->check_label('cache_system')->delete()->redirect();
        $files = glob('application/cache/web/*'); 
        $val = count($files);

        foreach($files as $file){
            if(is_file($file))
            unlink($file); 
        }

        $this->session->set_flashdata('message',display('delete_message'));
        redirect('settings/cache_controller/cache');
        
    }

    

    public function ceche_on(){
        $this->permission->check_label('cache_system')->update()->redirect();
        //set the path of files
        $data = array('cache_path'=>'application/cache/web/',
            'status'=>1);
        $config_path = 'application/config/config.php';
        $data = $this->db->where('status',0)->update('cache',$data);
     
        $config_path = 'application/config/config.php';
        $result = $this->cach_path_no($config_path);   
        $this->session->set_flashdata('message',display('cache_on_msg'));
        redirect('settings/cache_controller/cache');
    }


    // Function to set the base url of config file
    public function cach_path_no($config_file = NULL)
    { 
        $this->permission->check_label('cache_system')->update()->redirect();
            
            $config_data = file_get_contents($config_file);
            //replace string
            $replace = '$config["cache_path"] = "application/cache/web/"; ';
            //set a flag
            $flag = '$config["cache_path"] = $config["cache_path"]; ';
            //Find string 
            $pattern = '/[^\n]*cache_path[^\n]*/';
            $matches = array();
            preg_match($pattern, $config_data, $matches);

            //if $matches[0] is not empty
            if ($matches[0]!=NULL) {
                //check config data is not matche with flag data
                if ($matches[0]!=$flag) {
                    //set $matches[0] as $original data  
                    $original = $matches[0];
                    //set output file mode  
                    @chmod($config_file,0777);  
                    //Replace file with new string 
                    $new  = str_replace($original,$replace,$config_data); 
                    // Write the new config.php file
                    $handle = fopen($config_file,'w+');
                    // Chmod the file, in case the user forgot
                    @chmod($config_file,0777);
                    //Verify file permission
                    if (is_writable($config_file)) {
                        //file write
                        if (fwrite($handle,$new)) {
                            return true;
                        } else {
                            //file is not write
                            return false;
                        } 
                    } else {
                        //file is not writeable
                        return false;
                    }
                } else {
                    //$config_data is match with $flag data
                    return true;
                }
            } else {
                return false;
            }
            
    }


    public function ceche_off(){

        $this->permission->check_label('cache_system')->update()->redirect();
        //set the path of files
        $data = array('cache_path'=>'FALSE',
            'status'=>0);
        $config_path = 'application/config/config.php';
        $data = $this->db->where('status',1)->update('cache',$data);
     
        $config_path = 'application/config/config.php';
        $result = $this->cach_path_off($config_path);   
        $this->session->set_flashdata('message',display('cache_off_msg'));
         redirect('settings/cache_controller/cache');
    }


    // Function to set the base url of config file
    public function cach_path_off($config_file = NULL)
    { 
        $this->permission->check_label('cache_system')->update()->redirect();
            
            $config_data = file_get_contents($config_file);
            //replace string
            $replace = '$config["cache_path"] = "FALSE"; ';
            //set a flag
            $flag = '$config["cache_path"] = $config["cache_path"]';
            //Find string 
            $pattern = '/[^\n]*cache_path[^\n]*/';
            $matches = array();
            preg_match($pattern, $config_data, $matches);

            //if $matches[0] is not empty
            if ($matches[0]!=NULL) {
                //check config data is not matche with flag data
                if ($matches[0]!=$flag) {
                    //set $matches[0] as $original data  
                    $original = $matches[0];
                    //set output file mode  
                    @chmod($config_file,0777);  
                    //Replace file with new string 
                    $new  = str_replace($original,$replace,$config_data); 
                    // Write the new config.php file
                    $handle = fopen($config_file,'w+');
                    // Chmod the file, in case the user forgot
                    @chmod($config_file,0777);
                    //Verify file permission
                    if (is_writable($config_file)) {
                        //file write
                        if (fwrite($handle,$new)) {
                            return true;
                        } else {
                            //file is not write
                            return false;
                        } 
                    } else {
                        //file is not writeable
                        return false;
                    }
                } else {
                    //$config_data is match with $flag data
                    return true;
                }
            } else {
                //if $matches[0] is empty
                return false;
            }
            
    }


}

