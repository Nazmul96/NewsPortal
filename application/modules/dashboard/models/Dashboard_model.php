<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @System  : Dashboard model
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Dashboard_model extends CI_model
{



	public function latest_post()
	{

		$todate = date('Y-m-d');
        $this->db->select('news_mst.news_id,news_mst.encode_title,news_mst.title,news_mst.image,news_mst.reader_hit,
            news_mst.videos,news_mst.page,news_mst.time_stamp,
            news_mst.post_date,news_mst.news,news_mst.post_by,news_mst.image_title,news_mst.image_alt,
            user_info.id,user_info.photo,user_info.name,user_info.id as user_id,categories.category_name');
        $this->db->from('news_mst');
        $this->db->join('user_info', 'user_info.id=news_mst.post_by');
         $this->db->join('categories', 'categories.slug=news_mst.page');
        $this->db->where('news_mst.publish_date <=',date("Y-m-d"));
        $this->db->where('news_mst.is_latest', 1);
        $this->db->where('news_mst.status', 0);
        $this->db->where('news_mst.publish_date',$todate);
        $this->db->order_by('news_mst.id', 'desc');
        $this->db->limit(30);
        $result = $this->db->get()->result();

        if (!empty($result)) {
        	return $result;
        }else{

        	$this->db->select('news_mst.news_id,news_mst.encode_title,news_mst.title,news_mst.image,news_mst.reader_hit,
            news_mst.videos,news_mst.page,news_mst.time_stamp,
            news_mst.post_date,news_mst.news,news_mst.post_by,news_mst.image_title,news_mst.image_alt,
            user_info.id,user_info.photo,user_info.name,user_info.id as user_id,categories.category_name');
	        $this->db->from('news_mst');
	        $this->db->join('user_info', 'user_info.id=news_mst.post_by');
	         $this->db->join('categories', 'categories.slug=news_mst.page');
	        $this->db->where('news_mst.publish_date <=',date("Y-m-d"));
	        $this->db->where('news_mst.is_latest', 1);
	        $this->db->where('news_mst.status', 0);
	        $this->db->order_by('news_mst.id', 'desc');
	        $this->db->limit(30);
	        return $result = $this->db->get()->result();
        }

	}


	public function populer_post()
	{

		$todate = date('Y-m-d');

		$this->db->select('t1.news_id,t1.encode_title,t1.stitle,t1.title,t1.page,t1.image,t1.videos,t1.reader_hit,t1.time_stamp,t1.image_title,t1.image_alt,t1.reader_hit,
            t1.post_date,t1.news,t2.id,t2.name,t2.photo,t4.category_name
        ');
        $this->db->from('news_mst t1');
        $this->db->join('user_info t2', 't2.id=t1.post_by');
        $this->db->join('categories t4', 't4.slug=t1.page');
        $this->db->where('t1.publish_date',$todate);
        $this->db->order_by('t1.reader_hit', 'desc');
        $this->db->limit(30);
        $result = $this->db->get()->result();

        if (!empty($result)) {
        	return $result;
        }else{

        	$this->db->select('t1.news_id,t1.encode_title,t1.stitle,t1.title,t1.page,t1.image,t1.videos,t1.reader_hit,t1.time_stamp,t1.image_title,t1.image_alt,
            t1.post_date,t1.news,t2.id,t2.name,t2.photo,t4.category_name
	        ');
	        $this->db->from('news_mst t1');
	        $this->db->join('user_info t2', 't2.id=t1.post_by');
	        $this->db->join('categories t4', 't4.slug=t1.page');
	        $this->db->order_by('t1.reader_hit', 'desc');
	        $this->db->limit(30);

	        return $result = $this->db->get()->result();
        }

       
	}



	public function user_reporter()
	{
		$this->db->select(
 		"COUNT(IF( user_type = 5, user_type, NULL)) AS total_users, 
 		COUNT(IF( user_type != 3 && user_type!=5, user_type, NULL)) AS total_reporter");
 		return $this->db->get('user_info')->row();
	}



    public function readHit($year,$month)
    {
          $wherequery = "YEAR(publish_date)='$year' AND month(publish_date)='$month' GROUP BY YEAR(publish_date), MONTH(publish_date)";
          $this->db->select('SUM(reader_hit) as read_hit, COUNT(news_id) as total_post');
          $this->db->from('news_mst');
          $this->db->where($wherequery, NULL, FALSE);; 
          $query = $this->db->get();
          if ($query->num_rows() > 0) {
            $result=$query->row(); 
            return $result;
          }
          return (object)array('read_hit'=>0,'total_post'=>0);
        
    }




    public function last_year_readhit_totapost()
    {

        $where = "`publish_date` BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW()";
        $this->db->select('SUM(reader_hit) as read_hit, COUNT(news_id) as total_post');
        $this->db->from('news_mst');
        $this->db->where($where, NULL, FALSE);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result=$query->row(); 
            return $result;
        }
        return 0;


    }





    public function comments($year,$month)
    {
          $wherequery = "YEAR(com_date_time)='$year' AND month(com_date_time)='$month' GROUP BY YEAR(com_date_time), MONTH(com_date_time)";
          $this->db->select('COUNT(com_id) as total_comment');
          $this->db->from('comments_info');
          $this->db->where($wherequery, NULL, FALSE);; 
          $query = $this->db->get();
          if ($query->num_rows() > 0) {
            $result=$query->row(); 
            return $result;
          }
          return (object) array('total_comment'=>0);
    }




    public function last_year_comments()
    {

        $sql = "SELECT COUNT(com_id) as comments
        FROM comments_info
        WHERE com_date_time >= NOW() - INTERVAL 1 YEAR";
        return $data = $this->db->query($sql)->row();

    }




    public function lastWeekPost()
    {

        $where = "`publish_date` BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()";
        $this->db->select('SUM(reader_hit) as read_hit, COUNT(news_id) as total_post');
        $this->db->from('news_mst');
        $this->db->where($where, NULL, FALSE);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result=$query->row(); 
            return $result;
        }
        return (object) array('total_post'=>0,'read_hit'=>0);
        
    }



    public function lastWeekComments()
    {

        $where = "`com_date_time` BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()";
        $this->db->select('*');
        $this->db->from('comments_info');
        $this->db->where($where, NULL, FALSE);
        return $query = $this->db->get()->num_rows();

       
        
    }







}