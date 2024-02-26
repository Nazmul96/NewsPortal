<?php defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller {


    public function __construct() {
        parent::__construct();
    }

	//Index is loading first
	public function index(){

		$json[] = array(
			'status' => "OK"
		);
		echo json_encode(array('json' => $json),JSON_UNESCAPED_UNICODE);

	}
	

	public function userlist()
	{
		$users = $this->db->select('*')->from('user_info')->get()->result();

		echo json_encode(array('data' => $users),JSON_UNESCAPED_UNICODE);
	}
	

	/*
	|---------------------------------------------------
	|	Web	Settings Data 
	|---------------------------------------------------
	*/
	public function web_setting(){

		$settings = $this->db->get('app_settings')->row();

		if (!empty($settings)) {
			$json['response'] = [
				'status'  => 'ok',
				'settings'  => $settings
			];

		}else{

			$json['response'] = [
				'status'  => 'error',
				'message'  => "Settngs not found!"
			];
			
		}
		echo $json_encode = json_encode($json, JSON_UNESCAPED_UNICODE);

	}

	
	/*
	|---------------------------------------------------
	|	Get language Data
	|---------------------------------------------------
	*/
	public function language(){

		$language = $this->db->select('*')->from('lg_setting')->get()->row();
		$landata = $this->db->select('phrase,'.$language->language)->from('language')->get()->result();

		if ($landata) {
			$arrayName = array();
			foreach ($landata as $key => $value) {			
				$array = (array) $value;
				$arrayName[$array['phrase']] = $array[$language->language];
				
			}	

			echo $json_encode = json_encode(array('setting_info' => $arrayName),JSON_UNESCAPED_UNICODE);
		}else{
			$json[] = array(
					'status' => 'false',
					'error'  => 'No logo found !',
				);
				
			echo $json_encode = json_encode(array('setting_info' => $json),JSON_UNESCAPED_UNICODE);
		}
	}



	/*
	|---------------------------------------------------
	|	user Login Method
	|---------------------------------------------------
	*/
	public function login()
	{

		$email 	  = $this->input->post('email',TRUE);
		$password = $this->input->post('password',TRUE);
		$fb_log_status = $this->input->post('fb_log_status',TRUE);
		$full_name  = $this->input->post('full_name',TRUE);

		if(isset($fb_log_status)){

			// check this user by mail 
			$check_status = $this->db->select('*')->from('user_info')->where('email',$email)->get()->row();
			// if exist the user then login this system
			if($check_status){
				$json[] = array(
					'auth-status' => 'true',
					'user_id'	  => $check_status->id,
					'email' 	=> $check_status->email,
				);

				echo $json_encode = json_encode(array('user_info' => $json),JSON_UNESCAPED_UNICODE);
			} else{

				//rendom password generator
				$password = $this->randstrGen();
					// registration information
					$data = array(
						'name' 		=> $full_name,
						'email'		=> $email,
						'password' 	=> md5($password),
						'user_type' => 5,
						'status' 	=> 1,
					);
					//insert data userinfo
					$result = $this->db->insert('user_info',$data);
					$id = $this->db->insert_id();
					if ($result) {
						
						$json[] = array(
							'auth-status' => 'true',
							'user_id'	  => $id,
							'email' => $email,
						);
						echo $json_encode = json_encode(array('user_info' => $json),JSON_UNESCAPED_UNICODE);
					}
				}

		} else{

			if (empty($email) || empty($password))
			{

				$json[] = array(
					'error' => "Please fill up all required field !"
				);

				echo json_encode(array('user_info' => $json),JSON_UNESCAPED_UNICODE);

			}else{

				$password = md5($password);

		        $result   = $this->db->where('email',$email)->where('password',$password)->where('status',1)->get('user_info')->row();

				if ($result)
				{
					$json[] = array(
						'auth-status' => 'true',
						'user_id'	  => $result->id,
						'email' => $email,
					);
					echo $json_encode = json_encode(array('user_info' => $json),JSON_UNESCAPED_UNICODE);
				}else{
					$json[] = array(
						'auth-status' => 'false',
						'user_id'	  => (!empty($result->id)?$result->id:null)
					);
					echo $json_encode = json_encode(array('user_info' => $json),JSON_UNESCAPED_UNICODE);
				}
			}
		}
	}



	/*
	|---------------------------------------------------
	|	User Registration Method
	|---------------------------------------------------
	*/
	public function registration(){
		
		$full_name  = $this->input->post('full_name',TRUE);
		$email 		= $this->input->post('email',TRUE);
		$password 	= $this->input->post('password',TRUE);


		if (empty($full_name) || empty($email) || empty($password)) {

			$json[] = array(
				'error' => "Please fillup all required field !", 
			);
			echo $json_encode = json_encode(array('registration_info' => $json),JSON_UNESCAPED_UNICODE);
		} else {

			$check_email = $this->test_input($email);

			if (filter_var($check_email, FILTER_VALIDATE_EMAIL)) {

				//Email existing check
				$user = $this->db->select('*')
						->from('user_info')
						->where('email',$email)
						->get()
						->num_rows();

				if ($user > 0) {

					$json[] = array(
						'error'  => 'Email already exists !'
					);
					echo $json_encode = json_encode(array('registration_info' => $json),JSON_UNESCAPED_UNICODE);

				}else{

					$data = array(
						'name' 		=> $full_name,
						'email'		=> $email,
						'password' 	=> md5($password),
						'user_type' => 5,
						'status' 	=> 1,
					);
					$result = $this->db->insert('user_info',$data);
					$id = $this->db->insert_id();
					if ($result) {
						$json[] = array(
							'user_id' => $id, 
							'status'  => 'true'
						);
						echo $json_encode = json_encode(array('registration_info' => $json),JSON_UNESCAPED_UNICODE);
					}
				}

			} else {
				$json[] = array(
					'error' => "Email is not validate!", 
				);
				echo $json_encode = json_encode(array('registration_info' => $json),JSON_UNESCAPED_UNICODE);
			}
		}
	}



	//Email testing
	public function test_input($data) {
	  	$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	  	return $data;
	}


	/*
	|---------------------------------------------------
	|  Comments submit By users
	|	Get news_id, comment, user_id,
	|---------------------------------------------------
	*/
	public function comments() {

		$news_id 		= $this->input->post('news_id',TRUE);
		$comments 		= $this->input->post('comment',TRUE);
		$com_user_id 	= $this->input->post('user_id',TRUE);
		$com_date_time 	= date("Y-m-d H:i:s");
		$com_status 	= 0;

        if (empty($news_id) || empty($comments) || empty($com_user_id)) {

			$json[] = array(
				'error' => "Please fillup all required field !", 
			);
			echo $json_encode = json_encode(array('comments_info' => $json),JSON_UNESCAPED_UNICODE);
		
		} else {

			$checkUser = $this->db->where('id',$com_user_id)->get('user_info')->num_rows();
			if ($checkUser<1) {
				$json[] = array(
				'error' => "You are not ragistered user, Please atfirst ragistration.", 
					);
				echo $json_encode = json_encode(array('comments_info' => $json),JSON_UNESCAPED_UNICODE);
				
			} else{

				$data['com_type'] 		= "1";
				$data['news_id'] 		= $news_id;
				$data['comments'] 		= $comments;
				$data['com_user_id'] 	= $com_user_id;
				$data['com_date_time'] 	= date("Y-m-d H:i:s");
				$data['com_status'] 	= 0;
				$result = $this->db->insert('comments_info',$data);

				if ($result) {
					$json[] = array(
							'status'  => 'true'
					);
					echo $json_encode = json_encode(array('comments_info' => $json),JSON_UNESCAPED_UNICODE);
				}
			}
		} 
	}



	/*
	|---------------------------------------------------
	|  	Replay Comments submit By users
	|	Get news_id, comment, user_id, comment_replay_id
	|---------------------------------------------------
	*/

	public function replay_comments() {

		$news_id 		= $this->input->post('news_id',TRUE);
		$comments 		= $this->input->post('comment',TRUE);
		$com_user_id 	= $this->input->post('user_id',TRUE);
		$comment_rep_id = $this->input->post('comment_replay_id',TRUE);
		$com_date_time 	= date("Y-m-d H:i:s");
		$com_status 	= 0;

        if (empty($news_id) || empty($comments) || empty($com_user_id || empty($comment_rep_id))) {
			$json[] = array(
				'error' => "Please fillup all required field !", 
			);
			echo $json_encode = json_encode(array('comments_info' => $json),JSON_UNESCAPED_UNICODE);
		} else {

			$checkUser = $this->db->where('id',$com_user_id)->get('user_info')->num_rows();
			if ($checkUser<1) {
				$json[] = array(
				'error' => "You are not ragistered user, Please atfirst ragistration.", 
					);
				echo $json_encode = json_encode(array('comments_info' => $json),JSON_UNESCAPED_UNICODE);
				
			} else {

				$data['com_type'] 		= "2";
				$data['com_replay_id'] 	= $comment_rep_id;
				$data['news_id'] 		= $news_id;
				$data['com_user_id'] 	= $com_user_id;
				$data['comments'] 		= $comments;
				$data['com_date_time'] 	= date("Y-m-d H:i:s");
				$data['com_status'] 	= 0;

				$result = $this->db->insert('comments_info',$data);
				if ($result) {
					$json[] = array(
						'status'  => 'true'
					);
					echo $json_encode = json_encode(array('comments_info' => $json),JSON_UNESCAPED_UNICODE);
				}
			}
		} 
	}



	/*
	|---------------------------------------------------
	|	All  Comments List by news id
	|---------------------------------------------------
	*/

	public function comments_list() {

		$news_id = $this->input->post('news_id',TRUE);

        if (empty($news_id)) {
			$json[] = array(
				'status' =>'error',
				'message' => "Please fillup all required field !",
				'comments_info'=>''
			);
			echo json_encode( $json,JSON_UNESCAPED_UNICODE);
		} else {

			$main_comm = array();

				$this->db->select('user_info.id,user_info.name,user_info.photo,comments_info.*');
				$this->db->from('comments_info');
				$this->db->join('user_info', 'comments_info.com_user_id = user_info.id');
				$this->db->where('com_status',1);
				$this->db->where('com_replay_id',0);
				$this->db->where('comments_info.news_id',$news_id);
				$result = $this->db->get()->result_array();


				if ($result) {

					foreach ($result as $row) {

						$replies = $this->db->select('user_info.id,user_info.name,user_info.photo,comments_info.*')
                            ->from('comments_info')
                            ->join('user_info', 'comments_info.com_user_id = user_info.id')
                            ->where('com_replay_id', $row['com_id'])
                            ->where('com_status', '1')
                            ->where_not_in('com_status', '0')
                            ->get()
                            ->result_array();
                            $sub_comm = array();

                            foreach ($replies as $row1) {

                            	$sub_comm2 = array();
                            	$recommentrep = $this->db->select('user_info.id,user_info.name,user_info.photo,comments_info.*')
                                    ->from('comments_info')
                                    ->join('user_info', 'comments_info.com_user_id = user_info.id')
                                    ->where('com_replay_id', $row1['com_id'])
                                    ->where('com_status', '1')
                                    ->where_not_in('com_status', '0')
                                    ->get()
                                    ->result_array();
                                    foreach ($recommentrep as $row2) {
                                    	array_push($sub_comm2, $row2);
                                    }

								$row1['commentleveltwo'] = $sub_comm2;
						        array_push($sub_comm, $row1);
                            }

	                    $row['commentlevelone'] = $sub_comm;
					    array_push($main_comm, $row);

					}
					$json[] = array(
						'status' =>'error',
						'message' => 'No comments',
						'comments_info'=>$main_comm
					);

					echo  json_encode($json,JSON_UNESCAPED_UNICODE);

				}else{
					$json[] = array(
						'status' =>'error',
						'message' => 'No comments',
						'comments_info'=>''
					);

					echo  json_encode($json,JSON_UNESCAPED_UNICODE);
				}
			
		} 
	}



	/*
	|---------------------------------------------------
	|		GET All Categories
	|---------------------------------------------------
	*/
	public function category_list(){

		$main_cat = array();

		$main = $this->db->select('menu_content.*,menu.*,categories.category_imgae')
        ->from('menu_content')
        ->join('menu','menu.menu_id=menu_content.menu_id')
        ->join('categories','categories.slug=menu_content.slug','left')
        ->where('menu.menu_position',1)
        ->order_by('menu_content.menu_position','ASC')
        ->get()
        ->result_array();

        foreach ($main as  $row) {

        	 	$id = $row["menu_content_id"];
        	  	$query1 = $this->db->query("SELECT * FROM menu_content WHERE parents_id='$id' ORDER BY menu_position ASC");
        	   	$num_rows1 = $query1->result_array();

        			$sub_cat1 = array();

	                foreach ($num_rows1 as $rows) {
		        		array_push($sub_cat1, $rows); 
	                }

	        $row['categorieslevelone'] = $sub_cat1;
		    array_push($main_cat, $row);

        }

		echo json_encode(array('category_info' => $main_cat));
	}


	/*
	|---------------------------------------------------
	|	Return Slide news limit 10
	|	Return Category waise New  
	|---------------------------------------------------
	*/

	public function home_page_news_view(){
		
        $home = $this->db->select('t1.news_id, t1.encode_title,t1.post_date,t1.time_stamp,t1.page,t1.stitle,t1.title,t1.image,t1.news,t1.reference,t1.ref_date,t1.publish_date,t1.post_by,t1.reporter,t1.status,t1.videos,t1.image_alt,t1.image_title,t3.id,t3.name,t3.photo,t4.category_name')
                ->from('news_position t2')
                ->join('news_mst t1', 't1.news_id=t2.news_id', 'left')
                ->join('user_info t3', 't3.id=t1.post_by','left')
                ->join('categories t4', 't4.slug=t1.page')
                ->where('t1.publish_date <=',date("Y-m-d"))
                 ->where('t2.page', 'home')
                ->where('t1.status', '0')
                ->limit(10)
                ->order_by('t2.position', 'ASC')
                ->order_by('t2.news_id', 'DESC')
                ->get()
                ->result();


		if ($home) {

			foreach ($home as $newss) {
				
				$splited_TITLE = $this->string_clean($this->explodedtitle($newss->title));
				$HM[] = array(
					'id' 			=> $newss->news_id,
					'title'			=> (!empty($newss->title)?$newss->title:null),
					'encode_title'	=> (!empty($newss->encode_title)?$newss->encode_title:null),
					'image_thumb' 	=>  base_url() . 'uploads/thumb/' . $newss->image,
					'image_large' 	=>  base_url() .'uploads/' . $newss->image,
					'category_name' =>  $newss->category_name,
					'slug' 			=>  $newss->page,
					'news' 			=>  $newss->news,
					'video' 		=>  $newss->videos,
					'reporter' 		=>  $newss->name,
					'reporter_image' =>  base_url() .$newss->photo,
					'post_date' 	=>  $newss->post_date,
					'time_stamp' 	=>  $newss->time_stamp,
            
				);	
			}

		// Call to add_home_category_position_data function 
		$home_page_position = $this->add_home_category_position_data();
        
        if ($home_page_position) {
        	
            foreach ($home_page_position as $key1 => $va) {
                foreach ($va as $key => $value) {

                	if($value['status']==1){
                   		$cat_list[] = trim($value['slug']) . '~' . $key;
               		}
                } 
            }
            $cat_list = implode(',', $cat_list);
            @$PN = $this->page_data_for_home($cat_list);
           
        } else {
            $PN = '';
        }
        $NewsData = array('slid_news' => $HM, 'news1_info' => $PN);
        
		echo $json_encode = json_encode($NewsData,JSON_UNESCAPED_UNICODE);

		}else{
			$json[] = array(
				'error' => "Product not found !", 
			);
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}
	}


    // Getting Page data for home page settings
    function page_data_for_home($page_comma_seperator, $limit = 15) {
	        
	        $PN = array();
	        $N = array();
	        $P = array();
	        $bu = base_url();
	        $page_list = explode(',', $page_comma_seperator);

	        $word_limit = 30;
	        $i = 1;
	        foreach ($page_list as $page){
	            list($page, $position) = explode('~', $page);



	            $this->db->select('t1.news_id,t1.encode_title,t1.time_stamp,t1.page,t1.stitle,t1.title,t1.image,t1.videos,
                t1.news,t1.reference,t1.ref_date,t1.reporter,t1.videos,t1.post_date,t1.post_by,t1.image_alt,t1.image_title,
                t3.id,t3.photo,t3.name,t4.category_name');
	            $this->db->from('news_position t2');
	            $this->db->where('t2.page', $page);
	            $this->db->where('t2.status', '1');
	            $this->db->join('news_mst t1', 't1.news_id=t2.news_id', 'left');
	            $this->db->join('user_info t3', 't3.id=t1.post_by');
	            $this->db->join('categories t4', 't4.slug=t2.page');
	            $this->db->where('t1.publish_date <=',date("Y-m-d"));
	            $this->db->order_by('t2.position', 'ASC');
	            $this->db->limit(50);  
	            $result = $this->db->get()->result();


	            
	            $i = 1;
	            $c_news = array();

	            $cat = $this->db->select('category_name')->where('slug',$page)->get('categories')->row();
	            $page_name = $cat->category_name;

	            foreach ($result as $newss) {

	            	$splited_TITLE = $this->string_clean($this->explodedtitle($newss->title));

	            	$c_news[] = array(
						'id' 			=> $newss->news_id,
						'title'			=> (!empty($newss->title)?$newss->title:null),
						'encode_title'	=> (!empty($newss->encode_title)?$newss->encode_title:null),
						'image_thumb' 	=>  base_url() . 'uploads/thumb/' . $newss->image,
						'image_large' 	=> base_url() .'uploads/' . $newss->image,
						'category_name' =>  $newss->category_name,
						'slug' 			=>  $newss->page,
						'news' 			=>  $newss->news,
						'video' 		=>  $newss->videos,
						'reporter' 		=>  $newss->name,
						'reporter_image' =>  base_url() .$newss->photo,
						'post_date' 	=>  $newss->post_date,
						'time_stamp' 	=>  $newss->time_stamp,
					);
	                
	                $i++;

	                if ($i > $limit) {
	                    break;
	                }
	            }

	            $N[] = array('category_name'=>$page_name,'NewseS'=>$c_news);

	            $PN= $N;
	        }    
			return $PN;   
	}



	#-----------------------------------------------
	#       hoem page positionign data
	#-----------------------------------------------    
  	public function add_home_category_position_data() {
    
        $settings = $this->check_settings_exist(4);
        
        if ($settings != false) {
            $setting_details = $this->object_to_Array(json_decode('[' . $settings . ']'));

            return $setting_details;
        } else {
            return '';
        }
    }



	// make object to array
	#----------------------------------------------
	function object_to_Array($object) {
	    if (!is_object($object) && !is_array($object))
	        return $object;
	    return array_map('self::object_to_Array', (array) $object);
	}

	#--------------------------------------------
	public function check_settings_exist($id) {
	    $query = $this->db->select('*')
	    ->from('settings')
	    ->where('id',$id)
	    ->get();
	    
	    $num_rows = $query->num_rows();
	  
	    if ($num_rows == 1) {
	        $fetch_settings = $query->row();
	        return $fetch_settings->details;
	    } else {
	        return false;
	    }
	}



	/*
	|---------------------------------------------------
	|		Retrun news list by category 
	|---------------------------------------------------
	*/

	public function newslist_by_category(){
		
		$cat_slug = $this->input->get('category',TRUE);
		$tag = $this->input->get('tag',TRUE);

		$newses = array();


		if (!empty($cat_slug)) {

	        $newses = $this->db->select('news_position.*,news_mst.*,user_info.id as user_id,user_info.name,user_info.photo,categories.category_name')
	        ->from('news_position')
	        ->join('news_mst', 'news_mst.news_id=news_position.news_id')
	        ->join('user_info', 'user_info.id=news_mst.post_by')
	        ->join('categories', 'categories.slug=news_mst.page')
	        ->where('news_position.page', $cat_slug)
	        ->where('news_position.status',1)
	        ->where('news_position.position >',0)
	        ->where('news_mst.publish_date <=',date("Y-m-d"))
	        ->limit(25)
	        ->order_by('news_position.position', 'asc')
	        ->order_by('news_position.news_id', 'DESC')
	        ->get()
	        ->result();


		}elseif(!empty($tag)) {

			$tags = $this->db->where('tag',$tag)->group_by('news_id')->get('post_tag_tbl')->result();

			if (!empty($tags)) {

				$news_ids = array();
	            foreach ($tags as $key => $value) {
	               $news_ids[] = $value->news_id;
	            }

		        $newses = $this->db->select('news_position.*,news_mst.*,user_info.id as user_id,user_info.name,user_info.photo,categories.category_name')
		        ->from('news_position')
		        ->join('news_mst', 'news_mst.news_id=news_position.news_id')
		        ->join('user_info', 'user_info.id=news_mst.post_by')
		        ->join('categories', 'categories.slug=news_mst.page')
		        ->where_in('news_mst.news_id', $news_ids)
	        	->where('news_mst.publish_date <=',date("Y-m-d"))
		        ->where('news_position.status',1)
		        ->where('news_position.position >',0)
		        ->limit(25)
		        ->order_by('news_position.position', 'asc')
		        ->order_by('news_position.news_id', 'DESC')
		        ->get()
		        ->result();
			}
            


		}else{

			$newses = array();

		}


		if (!empty($newses)) {
			foreach ($newses as $newss) {
				
				$splited_TITLE = $this->string_clean($this->explodedtitle($newss->title));
				$json[] = array(
					'id' 			=> $newss->news_id,
					'encode_title'			=> (!empty($newss->encode_title)?$newss->encode_title:null),
					'title'			=> (!empty($newss->title)?$newss->title:null),
					'image_thumb' 	=>  base_url() . 'uploads/thumb/' . $newss->image,
					'image_large' 	=> base_url() .'uploads/' . $newss->image,
					'category_name' =>  $newss->category_name,
					'slug' 			=>  $newss->page,
					
					'news' 			=>  $newss->news,
					'video' 		=>  $newss->videos,
					'reporter' 		=>  $newss->name,
					'reporter_image' =>  base_url() .$newss->photo,
					'post_date' 	=>  $newss->post_date,
					'time_stamp' 	=>  $newss->time_stamp,
            
				);
            		
			}

			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);

		}else{

			$json = array();
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}
	}


	/*
	|---------------------------------------------------
	|		Retrun Latest News List
	|---------------------------------------------------
	*/
	public function latest_news(){

		$newses = $this->db->select('news_position.*,news_mst.*,user_info.id as user_id,user_info.name,user_info.photo,categories.category_name')
	        ->from('news_position')
	        ->join('news_mst', 'news_mst.news_id=news_position.news_id')
	        ->join('user_info', 'user_info.id=news_mst.post_by')
	        ->join('categories', 'categories.slug=news_mst.page')
	        ->where('news_position.status',1)
	        ->where('news_position.position >',0)
	        ->where('news_mst.publish_date <=',date("Y-m-d"))
	        ->limit(5)
	        ->order_by('news_position.position', 'asc')
	        ->order_by('news_position.news_id', 'DESC')
	        ->get()
	        ->result();

		if ($newses) {
			foreach ($newses as $newss) {

				$splited_TITLE = $this->string_clean($this->explodedtitle($newss->title));
				
				$json[] = array(
					'id' 			=> $newss->news_id,
					'encode_title'			=> (!empty($newss->encode_title)?$newss->encode_title:null),
					'title'			=> (!empty($newss->title)?$newss->title:null),
					'image_thumb' 	=>  base_url() . 'uploads/thumb/' . $newss->image,
					'image_large' 	=>  base_url() .'uploads/' . $newss->image,
					'category_name' =>  $newss->category_name,
					'slug' 			=>  $newss->page,
					'news' 			=>  $newss->news,
					'video' 		=>  $newss->videos,
					'reporter' 		=>  $newss->name,
					'reporter_image' => base_url() .$newss->photo,
					'post_date' 	=>  $newss->post_date,
					'time_stamp' 	=>  $newss->time_stamp,
            
				);
            		
			}
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}else{
			$json = array();
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}
	}

/*
|---------------------------------------------------
|		Retrun Breaking News List
|---------------------------------------------------
*/

	public function breaking(){

        $this->db->select('news_mst.news_id,news_mst.title,news_mst.image,news_mst.videos,news_mst.page,news_mst.time_stamp,news_mst.post_date,news_mst.news,news_mst.post_by,user_info.id,user_info.photo,user_info.name,categories.category_name');
        $this->db->from('news_mst');
        $this->db->join('user_info', 'user_info.id=news_mst.post_by');
        $this->db->join('categories', 'categories.slug=news_mst.page');
        $this->db->where('news_mst.publish_date <=',date("Y-m-d"));
        $this->db->where('news_mst.is_breaking', 1);
        $this->db->where('news_mst.status', 0);
        $this->db->order_by('news_mst.id', 'desc');
        $this->db->limit(5);
        $newses = $this->db->get()->result();


		if ($newses) {
			foreach ($newses as $newss) {

				$splited_TITLE = $this->string_clean($this->explodedtitle($newss->title));
				
				$json[] = array(
					'id' 			=> $newss->news_id,
					'title'			=> (!empty($newss->title)?$newss->title:null),
					'encode_title'	=> (!empty($newss->encode_title)?$newss->encode_title:null),
					'image_thumb' 	=>  base_url() . 'uploads/thumb/' . $newss->image,
					'image_large' 	=>  base_url() .'uploads/' . $newss->image,
					'category_name' =>  $newss->category_name,
					'slug' 			=>  $newss->page,
					'news' 			=>  $newss->news,
					'video' 		=>  $newss->videos,
					'reporter' 		=>  $newss->name,
					'reporter_image' => base_url() .$newss->photo,
					'post_date' 	=>  $newss->post_date,
					'time_stamp' 	=>  $newss->time_stamp,
            
				);
            		
			}
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}else{
			$json = array();
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}
	}


	/*
	|---------------------------------------------------
	|		Retrun Most Read News List
	|---------------------------------------------------
	*/
	public function trending(){
        
        $date = date('Y-m-d');
		$this->db->select('t1.news_id,t1.encode_title,t1.stitle,t1.title,t1.page,t1.image,t1.videos,t1.reader_hit,t1.time_stamp,t1.image_title,t1.image_alt,
            t1.post_date,t1.news,t2.id,t2.name,t2.photo,t4.category_name
            ');
        $this->db->from('news_mst t1');
        $this->db->join('user_info t2', 't2.id=t1.post_by');
        $this->db->join('categories t4', 't4.slug=t1.page');
        $this->db->where('t1.publish_date', $date);
        $this->db->order_by('t1.reader_hit', 'desc');
        $this->db->limit(5);
        $newses = $this->db->get()->result();


		if ($newses) {
			foreach ($newses as $newss) {
				$splited_TITLE = $this->string_clean($this->explodedtitle($newss->title));

				$json[] = array(
					'id' 			=> $newss->news_id,
					'title'			=> (!empty($newss->title)?$newss->title:null),
					'encode_title'	=> (!empty($newss->encode_title)?$newss->encode_title:null),
					'image_thumb' 	=>  base_url() . 'uploads/thumb/' . $newss->image,
					'image_large' 	=> base_url() .'uploads/' . $newss->image,
					'category_name' =>  $newss->category_name,
					'slug' 			=>  $newss->page,
					'news' 			=>  $newss->news,
					'video' 		=>  $newss->videos,
					'reporter' 		=>  $newss->name,
					'reporter_image' =>  base_url() .$newss->photo,
					'post_date' 	=>  $newss->post_date,
					'time_stamp' 	=>  $newss->time_stamp,
            
				);
            		
			}
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}else{
			$json = array();
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}
	}
	
	
	/*
	|---------------------------------------------------
	|		Retrun Most Read News List
	|---------------------------------------------------
	*/
	public function most_read(){

		$this->db->select('t1.news_id,t1.encode_title,t1.stitle,t1.title,t1.page,t1.image,t1.videos,t1.reader_hit,t1.time_stamp,t1.image_title,t1.image_alt,
            t1.post_date,t1.news,t2.id,t2.name,t2.photo,t4.category_name
            ');
        $this->db->from('news_mst t1');
        $this->db->join('user_info t2', 't2.id=t1.post_by');
        $this->db->join('categories t4', 't4.slug=t1.page');
        $this->db->order_by('t1.reader_hit', 'desc');
        $this->db->limit(5);
        $newses = $this->db->get()->result();


		if ($newses) {
			foreach ($newses as $newss) {
				$splited_TITLE = $this->string_clean($this->explodedtitle($newss->title));

				$json[] = array(
					'id' 			=> $newss->news_id,
					'title'			=> (!empty($newss->title)?$newss->title:null),
					'encode_title'	=> (!empty($newss->encode_title)?$newss->encode_title:null),
					'image_thumb' 	=>  base_url() . 'uploads/thumb/' . $newss->image,
					'image_large' 	=> base_url() .'uploads/' . $newss->image,
					'category_name' =>  $newss->category_name,
					'slug' 			=>  $newss->page,
					'news' 			=>  $newss->news,
					'video' 		=>  $newss->videos,
					'reporter' 		=>  $newss->name,
					'reporter_image' =>  base_url() .$newss->photo,
					'post_date' 	=>  $newss->post_date,
					'time_stamp' 	=>  $newss->time_stamp,
            
				);
            		
			}
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}else{
			$json = array();
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}
	}


	/*
	|---------------------------------------------------
	|		Retrun Latest News List
	|---------------------------------------------------
	*/
	public function get_breaking_news(){
		

		$this->db->select('t1.news_id,t1.stitle,t1.title,t1.page,t1.image,t1.videos,t1.reader_hit,t1.time_stamp,t1.post_date,t1.news,t2.id,t2.name,t2.photo,t4.category_name');
        $this->db->from('news_mst t1');
        $this->db->join('user_info t2', 't2.id=t1.post_by');
        $this->db->join('categories t4', 't4.slug=t1.page');
        $this->db->order_by('t1.reader_hit', 'desc');
        $this->db->limit(15);
        $newses = $this->db->get()->result();



        $this->db->select('title');
        $this->db->from('breaking_news');
        $this->db->order_by('id', 'desc');
        $this->db->limit(5);
        $result = $this->db->get()->result();



		if ($newses) {
			foreach ($newses as $newss) {
				
				$json[] = array(
					'id' 			=> $newss->news_id,
					'title'			=> (!empty($newss->title)?$newss->title:null),
					'encode_title'	=> (!empty($newss->encode_title)?$newss->encode_title:null),
					'image_thumb' 	=>  base_url() . 'uploads/thumb/' . $newss->image,
					'image_large' 	=> base_url() .'uploads/' . $newss->image,
					'slug' 			=>  $newss->page,
					'category_name' =>  $newss->category_name,
					'news' 			=>  $newss->news,
					'video' 		=>  $newss->videos,
					'reporter' 		=>  $newss->name,
					'reporter_image' =>  base_url() .$newss->photo,
					'post_date' 	=>  $newss->post_date,
					'time_stamp' 	=>  $newss->time_stamp,
            
				);
            		
			}
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}else{
			$json = array();
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}
	}


	/*
	|---------------------------------------------------
	|		Retrun  News info by news id
	|---------------------------------------------------
	*/
	public function get_news_by_id(){
		
		$id = $this->input->post('news_id',TRUE);

	    $this->db->select('news_mst.*,user_info.id,user_info.name,user_info.photo,categories.category_name');
	    $this->db->from('news_mst');
	    $this->db->join('user_info', 'user_info.id=news_mst.post_by');
	    $this->db->join('categories', 'categories.slug=news_mst.page');
	    $this->db->where('news_mst.news_id', $id);
	    @$newses = $this->db->get()->row();

		if ($newses) {

			 $splited_TITLE = $this->string_clean($this->explodedtitle($newses->title));

				$json = (object) array(
					'id' 			=> $newses->news_id,
					'title'			=> (!empty($newses->title)?$newses->title:null),
					'encode_title'	=> (!empty($newses->encode_title)?$newses->encode_title:null),
					'image_thumb' 	=>  base_url() . 'uploads/thumb/' . $newses->image,
					'image_large' 	=> base_url() .'uploads/' . $newses->image,
					'category_name' => $newses->category_name,
					'slug' 			=>  $newses->page,
					'news' 			=>  $newses->news,
					'video' 		=>  $newses->videos,
					'reporter' 		=>  $newses->name,
					'reporter_image' =>  $newses->photo,
					'post_date' 	=>  $newses->post_date,
					'time_stamp' 	=>  $newses->time_stamp,
				);
            		
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}else{
			$json[] = array(
				'error' => "Product not found !", 
			);
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);
		}
	}


	/*
	|---------------------------------------------------
	|		Retrun  search news by keyword
	|---------------------------------------------------
	*/
	public function search(){

		$q = $this->input->get('keyword',TRUE);

        if(@$q!=NULL){
            $keyword = $this->input->get('q',TRUE);
            $keyword = strip_tags($keyword);
            $keyword = htmlspecialchars($keyword);
            $keyword = htmlentities($keyword); 
            $keyword = explode(' ', $keyword);
            $keyword = array_unique($keyword); 
            $keyword = implode(' ', $keyword); 
        }else{

            $keyword = '';
            
        }
        

        $newses = $this->db->select("news_mst.*,user_info.id,user_info.name,user_info.photo,categories.category_name")
        ->from("news_mst")
        ->join('user_info','user_info.id=news_mst.post_by')
        ->join('categories','categories.slug=news_mst.page')
        ->like('title',$keyword) 
        ->limit(15)
        ->get()
        ->result();


		if ($newses) {
			foreach ($newses as $newss) {
				$splited_TITLE = $this->string_clean($this->explodedtitle($newss->title));

				$json[] = array(
					'id' 			=> $newss->news_id,
					'title'			=> (!empty($newss->title)?$newss->title:null),
					'encode_title'	=> (!empty($newss->encode_title)?$newss->encode_title:null),
					'image_thumb' 	=>  base_url() . 'uploads/thumb/' . $newss->image,
					'image_large' 	=> base_url() .'uploads/' . $newss->image,
					'category_name' =>  $newss->category_name,
					'slug' 			=>  $newss->page,
					'news' 			=>  $newss->news,
					'video' 		=>  $newss->videos,
					'reporter' 		=>  $newss->name,
					'reporter_image' =>  base_url() .$newss->photo,
					'post_date' 	=>  $newss->post_date,
					'time_stamp' 	=>  $newss->time_stamp,
            
				);
            		
			}

			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);

		}else{

			$json = array();
			echo $json_encode = json_encode(array('news_info' => $json),JSON_UNESCAPED_UNICODE);

		}

	}

	
	public function post_tag()
	{
		$json = array();

		$data = $this->db->select('tag')->from('post_tag_tbl')->group_by('tag')->order_by('id','DESC')->get()->result();

		if (!empty($data)) {

			$json['response'] = [
					'status'  => 'ok',
					'data'  => $data
			];

		}else{
			$json['response'] = [
					'status'  => 'error',
					'data'  => ''
			];
			
		}

		echo $json_encode = json_encode($json, JSON_UNESCAPED_UNICODE);

	}


	#-----------------------
	# pssword genaretor
	#----------------------
    function randstrGen()
    {
        $result = "";
            $chars = "0123456789";
            $charArray = str_split($chars);
            for($i = 0; $i < 5; $i++) {
                    $randItem = array_rand($charArray);
                    $result .="".$charArray[$randItem];
            }
            return $result;
    }
	#-----------------------------------
	#explode Title
	#----------------------------------- 
    function explodedtitle($title) {
        return @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '-');
    }
	#------------------------------------
	#string_clean
	#------------------------------------ 
    function string_clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }



}