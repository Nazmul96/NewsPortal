<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @System  : Media controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class TipsPrediction extends MX_Controller {
    
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
    public function create_Tips_prediction() {
        $this->permission->check_label('create_Tips_prediction')->create()->redirect();
        
        $data['title'] = display('create_Tips_prediction');
        $data['module'] = "tips_and_prediction"; 
        $data['page']   = "create_Tips_prediction"; 
        echo Modules::run('template/layout', $data);   

    }
    

    // library photo upload
    public function saveTipsPrediction() {
        
        $this->permission->check_label('create_Tips_prediction')->create()->redirect();

            $welcome_bonus = $this->input->post('welcome_bonus',TRUE);
            $win_rate = $this->input->post('win_rate',TRUE);
            $payout = $this->input->post('payout',TRUE);
            $rating = $this->input->post('rating',TRUE);
            $website_url = $this->input->post('website_url',TRUE);
            $color = $this->input->post('color',TRUE);

            // $sizes = array($thumb_w_x => $thumb_h_y, $larg_w_x => $larg_h_y);

            $pst_imge = $_FILES['image']['name'];
            $image_chk = explode(".",$pst_imge);

            $max_file_size = 1*1024 * 1024; // 1MB
            $valid_exts = array('jpeg', 'jpg', 'png', 'gif','webp');


            if ($_FILES['image']['size'] <= $max_file_size) {

                $FILES = $_FILES['image'];
                $ext = strtolower(pathinfo($FILES['name'], PATHINFO_EXTENSION));
                
                if (in_array($ext, $valid_exts)) {

                    $file_location = $this->logo_upload($FILES);

                    $insertData = array(
                        'logo' => $file_location,
                        'welcome_bonus' => $welcome_bonus,
                        'win_rate'      => $win_rate,
                        'payout'             => $payout,
                        'rating'          => $rating,
                        'website_url'        => $website_url,
                        'color'            => $color,
                    );

                    $this->db->insert('photo_library', $insertData);

                    $this->session->set_flashdata('message', 'Saved successful');
                    redirect("tips_and_prediction/TipsPrediction/tips_prediction_list");

                }else{
                    $this->session->set_flashdata('exception','Unsupported file!');
                    redirect('tips_and_prediction/TipsPrediction/tips_prediction_list');
                }
            }else{
                $this->session->set_flashdata('exception','Please upload image smaller than 1MB!');
                redirect('tips_and_prediction/TipsPrediction/tips_prediction_list');
            }

          
    }


  


    #------------------------------------------------- 
    # end function pb_delete_temp;
    
	public function logo_upload($FILES)
	{
		if($FILES){
			$config['upload_path'] = './assets/newDesign/tipsPrediction/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
			$config['file_name'] = time().$FILES['image']['name'];
			
            //Load upload library and initialize here configuration
			$this->load->library('image_lib',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('image')){
				$uploadData = $this->upload->data();
				$image = $uploadData['file_name'];

			}else{
				$image = 'oo';
			}
            return $image;
		}
		
	}
    public function tips_prediction_list() {
        die('hello');
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