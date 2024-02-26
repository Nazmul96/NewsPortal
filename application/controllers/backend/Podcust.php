<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Podcust extends CI_Controller {

    // constructor function
    public function __construct() {
        parent::__construct();
        $this->load->model('backend/photo_uploader', 'photo');
        $this->load->library('s3');
    }


    // library photo upload
    public function podcustUpload() {

        $this->permission->check_label('photo_upload')->create()->redirect();


            $title      = $this->input->post('title',TRUE);
            $file_name = $_FILES['videos']['name'];
            $image_chk = explode(".",$file_name);
            $max_file_size = 13*1024 * 1024; 
            $valid_exts = array('mp3', 'MP3','mp4','MP4');

           
            // if ($_FILES['videos']['size'] <= $max_file_size) {

                $FILES = $_FILES['videos'];
                $ext = strtolower(pathinfo($FILES['name'], PATHINFO_EXTENSION));

                
                if (in_array($ext, $valid_exts)) {

                    if ($this->db->table_exists('space_setup_tbl')){
                        $spaceInfo = $this->db->where('active_status',1)->get('space_setup_tbl')->row();
                    }else{
                        $spaceInfo = [];
                    }


                    if(!empty($spaceInfo)){

                        $main_diractory = 'uploads/podcasts';
                        //main image
                        $this->doUploadPodcust($FILES, $main_diractory);

                        if($title){
                            $title = $title;
                        }else{
                            $title = $image_chk[0];
                        }

                        $insertData = array(
                            'podcust_url'       => imageLink(),
                            'file_name'         => $file_name,
                            'file_ext'          => $ext,
                            'title'             => $title,
                            'create_date'       => date('Y-m-d'),
                            'status'            => 0
                        ); 
                        $this->db->insert('podcust_tbl', $insertData);

                        echo "1"; exit;
                    
                    }else{

                        $main_diractory = 'uploads/podcasts/';

                        $target_file = $main_diractory.basename($file_name);

                        if (move_uploaded_file($_FILES["videos"]["tmp_name"], $target_file)) {

                            if($title){
                                $title = $title;
                            }else{
                                $title = $image_chk[0];
                            }

                            $insertData = array(
                                'podcust_url'       => imageLink(),
                                'file_name'         => $file_name,
                                'file_ext'          => $ext,
                                'title'             => $title,
                                'create_date'       => date('Y-m-d'),
                                'status'            => 0
                            );

                            $this->db->insert('podcust_tbl', $insertData);

                            echo "1"; exit;

                            
                        } else {
                            echo "0"; exit;
                        }
         
                    }

                    echo "1";

                }else{
                    echo "0"; exit;
                }
                
            // }else{
            //     echo "0"; exit;
            // }

          
    }




    #------------------------------------------------- 
    # end function pb_delete_temp;
    function doUploadPodcust($FILES, $diractory) {

        // Load Space Library
        $this->load->library('Space');
        $this->spaceobj = new Space();
        //load for s3
        $this->load->library('s3');
        $ext = explode(".", $FILES['name']);
        $filename = str_replace(' ', '-', $ext[0]);
        $file_path = $FILES["tmp_name"];
        $mime_type = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $file_path);
        $path = $diractory . '/' . $filename . '.' . end($ext);

        // Get info
        if ($this->db->table_exists('space_setup_tbl')){
            $spaceInfo = $this->db->where('active_status',1)->get('space_setup_tbl')->row();
        }else{
            $spaceInfo = [];
        }
        // upload file in aws s3
        if($spaceInfo->type==1){
            $saved = $this->s3->putObjectFile($file_path,$spaceInfo->bucket_name,$path,S3::ACL_PUBLIC_READ,array(),$mime_type); 
        }
        // upload file in space
        if($spaceInfo->type==2){
            $saved = $this->spaceobj->upload_to_space($FILES['tmp_name'], $path,$mime_type);
        }
        return $saved;
    }







    public function podcastList() {

        $settings = $this->db->get('app_settings')->row();
        $filename = $this->input->post('filename',TRUE);
        $query = $this->db->select('*')->from('podcust_tbl')->like('file_name',$filename)->get()->result_array();

        foreach ($query as $row) {
            echo '<img class="img-responsive img-thumbnail" src="'.base_url().$settings->logo.'" height="100" width="100" 
            onclick="sendValue('."'".$row['id'].",".$row['file_name']."'".')" />
            <span>'.html_escape($row['file_name']).'</span>';
        }


    }




}
