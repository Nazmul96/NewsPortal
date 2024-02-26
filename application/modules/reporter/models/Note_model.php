<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note_model extends CI_Model {
 

	public function getNotesList($postData=null, $search=null)
	{


        $response = array();
        ## Read value
        $draw       		= @$postData['draw'];
        $start      		= @$postData['start'];
        $rowperpage 		= @$postData['length']; // Rows display per page
        $columnIndex 		= $postData['order'][0]['column']; // Column index
        $columnName 		= $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder 	= $postData['order'][0]['dir']; // asc or desc
        $searchValue 		= $postData['search']['value']; // Search value

        ## Search 
        $searchQuery = "";
        if($searchValue != ''){
           $searchQuery = " (setup_outlet_tbl.outlet_name like '%".$searchValue."%'
            or setup_outlet_tbl.street_name like'%".$searchValue."%'
            or setup_outlet_tbl.street_no like'%".$searchValue."%'
            or setup_outlet_tbl.geo_lat like'%".$searchValue."%'
            or setup_outlet_tbl.geo_long like'%".$searchValue."%') ";
        }

        ## Total number of records without filtering
        $totalRecords = $this->total_count($search,$searchQuery);
        ## Total number of record with filtering
        $totalRecordwithFilter = $this->total_count($search,$searchQuery);

        ## Fetch records
        $this->db->select("notes_tbl.*,
            setup_outlet_tbl.outlet_name,
            setup_outlet_tbl.street_no,
            setup_outlet_tbl.fk_location_id,
            setup_outlet_tbl.street_name,
            setup_outlet_tbl.geo_long,
            setup_outlet_tbl.geo_lat,
        setup_location_tbl.location_name,
        CONCAT_WS(' ', user.firstname, user.lastname) AS fullname");
        $this->db->from('notes_tbl');
        $this->db->join('setup_outlet_tbl','setup_outlet_tbl.outlet_id=notes_tbl.fk_outlet_id','left');
        $this->db->join('setup_location_tbl','setup_location_tbl.location_id=setup_outlet_tbl.fk_location_id','left');
        $this->db->join('user','user.id=notes_tbl.fk_user_id','left');
        
        if($searchValue != '')
            $this->db->where($searchQuery);

        if(!empty($search->note_type)){
            $this->db->where('notes_tbl.note_type',$search->note_type);
        } 

        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $this->db->group_by('notes_tbl.note_id');
        $records = $this->db->get()->result();
        $data = array();
        


        foreach($records as $record ){

            $button = '';
            $button .= '<div class="btn-group">
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">'.display("action").'</button>
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">';
                    if($this->permission->check_label('add_outlet')->create()->access()):
                        $button .= '<li><a href="'.base_url("outlet/outlet/outlet_details/".$record->note_id).'"><i class="fa fa-eye text-info"></i> '.display('view').'</a></li>';
                    endif;
                    if($this->permission->check_label('add_outlet')->update()->access()):
                        $button .= '<li><a href="'.base_url("outlet/outlet/edit_outlet/".$record->note_id).'" ><i class="fa fa-edit text-success"></i> '.display('edit').'</a></li>';
                    endif;

                    if($this->permission->check_label('add_outlet')->delete()->access()):
                        $button .= '<li><a href="'.base_url("outlet/outlet/outlet_details/".$record->note_id).'" ><i class="fa fa-trash text-danger"></i> '.display('delete').'</a></li>';
                    endif;
                    $button .= '</ul></div>';

                     $checkAll = '<input type="checkbox" name="check_id[]" value="'.$record->note_id.'" id="check_id">';

            $data[] = array( 
               "id"=>$record->note_id,
               "checkAll"=>$checkAll,
               "outlet_name"=>$record->outlet_name,
               "location"=> $record->street_no.', '.$record->street_name.', '.$record->location_name.'<br>Lat:'.$record->geo_lat.', Long:'.$record->geo_long,
               "fullname"=>$record->fullname,
               "create_date"=>$record->create_date,
               "note_text"=>$record->note_text
            ); 

        }

        ## Response
        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecordwithFilter,
           "iTotalDisplayRecords" => $totalRecords,
           "aaData" => $data
        );
        return $response; 
	}


	public function total_count($search=null,$searchQuery=null)
	{
		
        $this->db->select("count(*) as allcount");
        $this->db->join('setup_outlet_tbl','setup_outlet_tbl.outlet_id=notes_tbl.fk_outlet_id','left');
        $this->db->join('setup_location_tbl','setup_location_tbl.location_id=setup_outlet_tbl.fk_location_id','left');
        $this->db->join('user','user.id=notes_tbl.fk_user_id','left');
        if($searchQuery != '')
            $this->db->where($searchQuery);

        if(!empty($search->note_type)){
            $this->db->where('notes_tbl.note_type',$search->note_type);
        } 

        $records = $this->db->get('notes_tbl')->result();
        $result = $records[0]->allcount;

        return $result;

	}

	

}