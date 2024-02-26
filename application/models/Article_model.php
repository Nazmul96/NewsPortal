<?php  defined('BASEPATH') OR exit('No direct script access allowed');
class Article_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    #----------------------------------------
    #   news details
    #----------------------------------------
    function article_select($news_id=NULL) {
        
        $this->db->select('news_mst.*,user_info.id as user_id,user_info.name,user_info.photo,podcust_tbl.podcust_url,podcust_tbl.file_name,podcust_tbl.title as podcust_title');
        $this->db->from('news_mst');
        $this->db->join('user_info', 'user_info.id=news_mst.post_by','left');
        $this->db->join('podcust_tbl', 'podcust_tbl.id=news_mst.podcust_id','left');
        $this->db->where('news_mst.news_id', $news_id);
        @$row = $this->db->get()->row_array();
        
        if (!empty($row)) {
            return $row;
        } else {
            redirect('home');
        }
    }

}

