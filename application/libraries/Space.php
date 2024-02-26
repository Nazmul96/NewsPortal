<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Space {


	public  $spaceobj;
	public  $key;		
	public  $secret; 	
	public  $space_name; 
	public  $region; 	
	public  $ci; 	

	public function __construct()
	{
		$this->ci =& get_instance();

		$spaceInfo = $this->ci->db->select('*')->from('space_setup_tbl')->where('id',2)->get()->row();
		
		$this->key 		= @$spaceInfo->access_key;
		$this->secret 	= @$spaceInfo->secret_key;
		$this->space_name = @$spaceInfo->bucket_name;
		$this->region 	= @$spaceInfo->region;
	}




	public function index()
	{
		$this->connect_space();

		$result = $this->spaceobj->ListObjects();

		return $result;

	}
	public function connect_space()
	{
		require_once(APPPATH.'libraries/Spaces-API-master/spaces.php');

		$this->spaceobj = new SpacesConnect($this->key, $this->secret, $this->space_name, $this->region);
	}

	public function get_space_files()
	{
		$this->connect_space();

		$result = $this->spaceobj->ListObjects();

		return $result;

	}

	public function get_spacefile_by_filename($file_name = 'newimage.jpg')
	{
		$this->connect_space();

		$result = $this->spaceobj->GetObject($file_name);

		return $result;

	}

	public function  upload_to_space ($path_to_file = false, $save_as = false,$mime_type=false)
	{
		$this->connect_space();

		$result = $this->spaceobj->UploadFile($path_to_file, "public", $save_as,$mime_type);

		return $result;

	}

	public function delete_space_file($file_url) {

		$this->connect_space();

		$result = $this->spaceobj->DeleteObject($file_url);

		return $result;
	}

	// Downlaod File
	public function download_space_file($filepath, $save_path = false)
	{
		$this->connect_space();

		$result = $this->spaceobj->DownloadFile($filepath, $save_path);

		return $result;
	}
	

}