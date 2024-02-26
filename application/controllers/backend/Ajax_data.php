<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Ajax  Controller
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */



class Ajax_data extends CI_Controller {

    // constructor function
    public function __construct() {
        parent::__construct();
        $this->load->model('backend/photo_uploader');
        $this->load->library('s3');
    }


    public function index() {

        $id = $this->input->post('image_name',TRUE);
        $query = $this->db->select('*')->from('photo_library')->like('picture_name',$id)->get()->result_array();

        foreach ($query as $row) {
            echo '<img src="'.imageLink().'uploads/thumb/'.$row['actual_image_name'].'" class="img-responsive img-thumbnail" height="100" width="100" onclick="sendValue('."'".$row['actual_image_name']."'".')" title="'.$row['picture_name'].'" />';
        }
    }


    // library photo upload
    public function imageUpload() {

        $this->permission->check_label('photo_upload')->create()->redirect();

            $title = $this->input->post('title',TRUE);
            $thumb_w_x = $this->input->post('thumb_w_x',TRUE);
            $thumb_h_y = $this->input->post('thumb_h_y',TRUE);
            $larg_w_x = $this->input->post('larg_w_x',TRUE);
            $larg_h_y = $this->input->post('larg_h_y',TRUE);
            $sizes = array($thumb_w_x => $thumb_h_y, $larg_w_x => $larg_h_y);

            $pst_imge = $_FILES['image']['name'];
            $image_chk = explode(".",$pst_imge);

            if($title){
                $title = $title;
            }else{
                $title = $image_chk[0];
            }


            $max_file_size = 1*1024 * 1024; // 1MB
            $valid_exts = array('jpeg', 'jpg', 'png', 'gif','webp');


            if ($_FILES['image']['size'] <= $max_file_size) {

                $FILES = $_FILES['image'];
                $ext = strtolower(pathinfo($FILES['name'], PATHINFO_EXTENSION));
               
                
                if (in_array($ext, $valid_exts)) {

                    if ($this->db->table_exists('space_setup_tbl')){
                        $spaceInfo = $this->db->where('active_status',1)->get('space_setup_tbl')->row();
                    }else{

                        $spaceInfo = [];
                    }


                //    print_r($spaceInfo);exit;
                    

                    if(!empty(@$spaceInfo)){

                        $thumb_diractory = 'uploads/thumb';
                        $main_diractory = 'uploads';

                        $diractory = array('uploads/thumb', 'uploads');

                        $k = 0;
                        foreach ($sizes as $w => $h) {

                            $result = $this->doUpload($w, $h, $FILES, $diractory[$k]);

                            if($result){

                                $insertData = array(
                                    'id'                => "",
                                    'image_base_url' => imageLink(),
                                    'actual_image_name' => $pst_imge,
                                    'picture_name'      => $image_chk[0],
                                    'title'             => $title,
                                    'category'          => $this->input->post('category',TRUE),
                                    'time_stamp'        => time() + 6 * 60 * 60,
                                    'status'            => 0
                                );
                                $this->db->insert('photo_library', $insertData); 
                            }

                            $k++;
                        }

                    }else{

                        
                        $file_location = $this->photo_uploader->do_upload($_FILES['image'], $sizes);
                        $image = explode('/', $file_location[0]);
                       
                        $insertData = array(
                            'id'                => "",
                            'image_base_url' => imageLink(),
                            'actual_image_name' => end($image),
                            'picture_name'      => $image_chk[0],
                            'title'             => $title,
                            'category'          => $this->input->post('category',TRUE),
                            'time_stamp'        => time() + 6 * 60 * 60,
                            'status'            => 0
                        );

                        $this->db->insert('photo_library', $insertData);   
                    }
            
                    echo '1';

                }else{
                    echo '0';
                }
                
            }else{
                echo '2';
            }

          
    }


  


    #------------------------------------------------- 
    # end function pb_delete_temp;
    function doUpload($width, $height, $FILES, $diractory) {

        // Load Space Library
        $this->load->library('Space');
        $this->spaceobj = new Space();
        //load for s3
        $this->load->library('s3');


        #------------resize image------------#
        $this->load->library('image_lib');
        $config['image_library']    = 'gd2';
        $config['source_image']     = $FILES['tmp_name'];
        $config['create_thumb']     = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality']            = 100;
        $config['width']            = $width;
        $config['height']           = $height;

        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        #-------------resize image----------#


        $ext = explode(".", $FILES['name']);
        $filename = str_replace(' ', '-', $ext[0]);
        $file_path = $FILES["tmp_name"];
        $mime_type = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $file_path);
        $path = $diractory . '/' . $filename . '.' . end($ext);

        // Get info
        if ($this->db->table_exists('space_setup_tbl')){
            $spaceInfo = $this->db->where('active_status',1)->get('space_setup_tbl')->row();
        }else{
            $spaceInfo = '';
        }

        // upload file in aws s3
        if($spaceInfo->type==1){
            $saved = $this->s3->putObjectFile($file_path,$spaceInfo->bucket_name,$path,S3::ACL_PUBLIC_READ,array(),$mime_type);
        }

        // upload file in space
        if($spaceInfo->type==2){
            $saved = $this->spaceobj->upload_to_space($FILES['tmp_name'], $path);
        }
        
        return $saved;

    }



    public function user_info_update() {
        $post_by = $this->session->userdata('id',TRUE);
        $fill = $this->input->post('fill_name',TRUE);
        $value = $this->input->post('value',TRUE);

        $data_arr = array($fill => $value);
        $this->db->where('id', $post_by);
        $rv = $this->db->update('user_info', $data_arr);
    }


    public function UpdateUserInfo() {
        $post_by = $this->session->userdata('id');
        $this->db->where('id', $post_by);
        $rv = $this->db->update('user_info', $_POST);
        redirect('admin/profile');
    }





    public function podcustUpload()
    {

        $this->permission->check_label('photo_upload')->create()->redirect();
            
            $file_name = $_FILES['videos']['name'];
            $image_chk = explode(".",$file_name);
            $max_file_size = 12*1024 * 1024; 
            $valid_exts = array('mp3', 'MP3','mp4','MP4');

           
            // if ($_FILES['videos']['size'] <= $max_file_size) {

                $FILES = $_FILES['videos'];
                 $ext = strtolower(pathinfo($FILES['name'], PATHINFO_EXTENSION));                 
                if (in_array($ext, $valid_exts)) {

                    if ($this->db->table_exists('space_setup_tbl')){
                        $spaceInfo = $this->db->where('active_status',1)->get('space_setup_tbl')->row();
                    }else{
                        $spaceInfo = '';
                    }

                    // $checkExist = $this->db->where('file_name',$file_name)->get('podcust_tbl')->row();

                    // if($checkExist){
                    //     echo "2";exit;
                    // }
                   

                    if(!empty($spaceInfo)){

                        $main_diractory = '/uploads/podcasts';
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


                }else{
                    echo "0"; exit;
                }
                
            // }else{
            //     echo "0"; exit;
            // }
    }


    #------------------------------------------------- 
    # end function pb_delete_temp;
    function doUploadPodcust( $FILES, $diractory) {

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
            $saved = $this->spaceobj->upload_to_space($FILES['tmp_name'], $path);
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
