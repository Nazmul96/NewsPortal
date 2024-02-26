<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @System  : Home controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Home extends MX_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
		if (! $this->session->userdata('isLogIn'))
			redirect('login');

 		$this->load->model(array('home_model','dashboard_model')); 
 	}



    /**
     * -------------------------------------
     * Backend Home view dashboard
     * @access public 
     * @return author  data array 
     * -------------------------------------
     */
	public function index()
	{

	    $months='';
	    $readHit='';
	    $yearlyPost='';
	    $monthly_comments='';
	    $year=date('Y');
	    $numbery=date('y');
	    $prevyear=$numbery-1;
	    $prevyearformat=$year-1;
	    $syear='';
	    $syearformat='';

	    for($k = 1; $k < 13; $k++){

	     	$month=date('m', strtotime("+$k month")); 
	     	$gety= date('y', strtotime("+$k month")); 
	     	if($gety==$numbery){
	       		$syear= $prevyear;
	       		$syearformat= $prevyearformat;
	       	}
	     	else{
		        $syear=$numbery;
		        $syearformat= $year;
		    }

		    $monthlyReadHit=$this->dashboard_model->readHit($syearformat,$month);

		    $comments=$this->dashboard_model->comments($syearformat,$month);

		    $monthly_comments.=($comments->total_comment?$comments->total_comment:0).', ';


		    $readHit.=($monthlyReadHit->read_hit?$monthlyReadHit->read_hit:0).', ';
		    
		    $yearlyPost.=($monthlyReadHit->total_post?$monthlyReadHit->total_post:0).', ';
		    $months.=  '"'.date('F-'.$syear, strtotime("+$k month")).'", '; 
	    }



	    $data["monthly_comments"] =trim($monthly_comments,',');
	    $data["yearlyPost"] =trim($yearlyPost,',');
	    $data["readHit"] =trim($readHit,',');
	    $data["months"] =trim($months,',');
	    $data['total_comment'] = $this->dashboard_model->last_year_comments();
	    $data['yearly_total_post'] = $this->dashboard_model->last_year_readhit_totapost();


		$date = date('y-m-d');
		$data['total_post'] = $this->db->get('news_mst')->num_rows();

		$data['today_post'] = $this->db->where('publish_date',$date)->get('news_mst')->num_rows();

		$data['total_subscribers'] = $this->db->count_all('subscription');
		$data['today_subscribers'] = $this->db->where('subscription_date',$date)->get('subscription')->num_rows();
		
		$data['total_comments'] = $this->db->count_all('comments_info');
		$data['today_comments'] = $this->db->like('com_date_time',$date)->get('comments_info')->num_rows();

		$data['total_hit'] = $this->db->select("SUM(reader_hit) as total")->get('news_mst')->row();

 		$data['user'] = $this->dashboard_model->user_reporter();
		$data['latest_post'] = $this->dashboard_model->latest_post();


		$data['lastWeekPost'] = $this->dashboard_model->lastWeekPost();
		$data['lastWeekComments'] = $this->dashboard_model->lastWeekComments();

		



		$data['title']    = "Home";
		$data['module'] = "dashboard";  
		$data['page']   = "home/home";  
		echo Modules::run('template/layout', $data);
		 
	}



	
}
