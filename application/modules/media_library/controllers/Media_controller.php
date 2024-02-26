<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @System  : Media controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Media_controller extends MX_Controller {
    
    #---------------------------------
    # Constructor Function
    public $spaceobj;
    public $CI;
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');
        $this->load->model('backend/photo_uploader');
    }



    #---------------------------------
    # View to upload photo
    public function photo_upload() {

        $this->permission->check_label('photo_upload')->create()->redirect();
        
        $data['title'] = display('photo_list');
        $data['module'] = "media_library"; 
        $data['page']   = "midea/__view_photo_upload"; 
        echo Modules::run('template/layout', $data);   

    }
    

    // library photo upload
    public function upload() {

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

                
                    $this->session->set_flashdata('message', 'Upload successful');
                    redirect("media_library/media_controller/photo_upload");


                }else{
                    $this->session->set_flashdata('exception','Unsupported file!');
                    redirect('media_library/media_controller/photo_upload');
                }
                
            }else{
                $this->session->set_flashdata('exception','Please upload image smaller than 1MB!');
                redirect('media_library/media_controller/photo_upload');
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
        //$spaceInfo = $this->db->where('active_status',1)->get('space_setup_tbl')->row();
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




    // update library photo
    public function edit() {

        $this->permission->check_label('photo_list')->update()->redirect();

        $id = $this->input->post('id');
        $data_arr = array(
            'picture_name'      => $this->input->post('picture_name',TRUE),
            'title'             => $this->input->post('title',TRUE),
            'category'          => $this->input->post('category',TRUE)
        );
        $this->db->where('id', $id);
        $this->db->update('photo_library', $data_arr);
        $this->load->view('media_library/media_controller/includes/close');
    }
    
    



    public function photo_list($search=NULL) {

        $this->permission->check_label('photo_list')->read()->redirect();

        $keyword = $this->input->get('search',TRUE);
        // pagination settings
        $total_rows = $this->db->select('*')->from('photo_library')->like("picture_name",$keyword)->get()->num_rows();
        $limit = 15;
        $config["base_url"] = base_url("media_library/media_controller/photo_list");
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $limit;

        $config['next_link'] = '→';
        $config['prev_link'] = '←'; 
        $config['full_tag_open'] = "<ul class='pagination justify-content-center'>";
        $config['full_tag_close'] = "</ul>"; 
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = "<li class='page-item disabled'>";
        $config['first_tagl_close'] = "</a></li>";
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        $start = $this->uri->segment(4);
        $data['query'] = $this->db->select("*")
        ->from("photo_library")
        ->like("picture_name",$keyword)
        ->limit($limit,$start)
        ->order_by('id','DESC')
        ->get()
        ->result_array();

        $data['title'] = display('photo_list');
        $data['module'] = "media_library"; 
        $data['page']   = "midea/__view_photo_list"; 
        echo Modules::run('template/layout', $data);   


    }
    
    public function status_edit() {

        $this->permission->check_label('photo_list')->update()->redirect();
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('photo_library', $data_arr);
        redirect("media_library/media_controller/photo_list");
    }


    //delete photo
    public function delete() {

        $this->permission->check_label('photo_list')->delete()->redirect();

        $id = $this->uri->segment(4);
        $data = $this->db->where('id', $id)->get('photo_library')->row();
        $link1 = base_url('uploads').$data->actual_image_name;
        $link = base_url('uploads/thumb').$data->actual_image_name;
        unlink($link1);
        unlink($link);
        $this->db->where('id', $id)->delete('photo_library');
        $this->session->set_flashdata('message', display('delete_message'));
        redirect("media_library/media_controller/photo_list");
    }




}