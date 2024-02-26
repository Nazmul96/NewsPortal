<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Rss extends CI_Model {


    public function get_settings() {
        $data = $this->db->select('*')->get('rss_link_setup_tbl')->result();
        return $data;
    }

    public function save_settings($data) {

        $this->db->insert('rss_link_setup_tbl',$data);
    }

    public function check_settings($link) {
        return $this->db->where('rss_link',$link)->get('rss_link_setup_tbl')->row();
    }

    public function delete_link($id) {
        return $this->db->where('id',$id)->delete('rss_link_setup_tbl');
    }


    public function get_info($id) {
        return $this->db->where('id',$id)->get('rss_link_setup_tbl')->row();
    }


    public function update_settings($post) {
        return $this->db->where('id',$post['id'])->update('rss_link_setup_tbl',$post);
    }


}
