<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @System  : Color setting controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Color_setting extends MX_Controller {


    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');

        $this->load->model('backend/view_setting_model');
    }



    public function theme_color_setting(){

        $this->permission->check_label('color_setting')->create()->redirect(); 

        $data['active_theme'] = json_decode($this->view_setting_model->get_previous_settings('settings', 16));

        $data['setting'] = $this->db->where('theme_name',$data['active_theme']->default_theme)->get('theme_color_setup')->row();

        $data['title'] = display('theme_color_setting');
        $data['module'] = "settings"; 
        $data['page']   = "settings/__color_setting"; 
        echo Modules::run('template/layout', $data); 



    }


    public function update_theme_color_setting(){

        $this->permission->check_label('color_setting')->update()->redirect(); 


        $theme_name = $this->input->post('theme_name');
        $color_code = $this->input->post('color_code');
        $active_status = $this->input->post('active_status');

        $font_one = $this->input->post('fontone');
        $font_two = $this->input->post('fonttwo');
        $body_font_size = $this->input->post('body_font_size');
        $body_line_hight = $this->input->post('body_line_hight');
        $menu_font_size = $this->input->post('menu_font_size');
        $menu_line_hight = $this->input->post('menu_line_hight');
        $menubg_color = $this->input->post('menubg_color');
        $menu_hover_color = $this->input->post('menu_hover_color');
        $menu_font_color = $this->input->post('menu_font_color');

        $data = array(
            'theme_name'        =>  $theme_name,
            'color_code'        =>  $color_code,
            'font_one'          => $font_one,
            'font_two'          => $font_two,
            'body_font_size'    => $body_font_size,
            'body_line_hight'   => $body_line_hight,
            'menu_font_size'    => $menu_font_size,
            'menu_line_hight'   => $menu_line_hight,
            'menubg_color'      => $menubg_color,
            'menu_hover_color'   => $menu_hover_color,
            'menu_font_color'   => $menu_font_color,
            'active_status'     => $active_status
        );
      
        $check  = $this->db->where('theme_name',$theme_name)->get('theme_color_setup')->row();
        
        if($check){
            $this->db->where('theme_name',$theme_name)->update('theme_color_setup',$data);
        }else{
            $this->db->insert('theme_color_setup',$data);
        }

        $this->session->set_flashdata('message',display('update_message'));
        redirect('settings/color_setting/theme_color_setting');
    }


}