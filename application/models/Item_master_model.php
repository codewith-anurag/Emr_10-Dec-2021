<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item_master_model extends CI_Model {

	private $table = "item_master";

	public function create($data = [])
	{
		return $this->db->insert($this->table,$data);
	}

	public function get_category()
	{
		return $this->db->get("itemcategory_master")->result();

	}
	public function insert($data)
	{
		return $this->db->insert("itemcategory_master",$data);
	}

	public function read()
	{
		$id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
        if($isadmin == 1){
        	$id = $created_by_id;
        }
        return $this->db->select("*")
		->from("patient")
		->where('hospital_id',$id)
		->order_by('id','desc')
		->get()
		->result();
		
	}

	public function read_by_id($user_id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('id',$user_id)
			->get()
			->row();
	}

	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data);
	}

	public function delete($user_id = null)
	{
		$this->db->where('id',$user_id)
		//	->group_start()
		//	->where('user_role',2)
			//->group_end()
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}


	public function doctor_list()
	{
		$id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
        $login_email = $this->session->userdata('email');
        $ignore = array($login_email);
        if($isadmin == 1){
         $result = $this->db->select("*")
			->from($this->table)
			->where('user_role',2)
			->where('user.created_by',$created_by_id)
			->where('status',1)
			->where_not_in("email",$ignore)
			->get()
			->result();
        }else{
        $result = $this->db->select("*")
			->from($this->table)
			->where('user_role',2)
			->where('user.created_by',$id)
			->where('status',1)
			->get()
			->result();
        }

		$list[''] = display('select_doctor');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->user_id] = $value->firstname.' '.$value->lastname;
			}
			return $list;
		} else {
			return false;
		}
	}


}
