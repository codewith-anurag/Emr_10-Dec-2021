<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	private $table = "user";

	public function create($data = [])
	{
		return $this->db->insert($this->table,$data);
	}
	public function createvital($data = [])
  {

 	 return $this->db->insert("pa_vital_sign",$data);

  }
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->order_by('user_id','desc')
			->get()
			->result();
	}

	public function read_by_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('user_id',$id)
			->get()
			->row();
	}

	public function update($data = [])
	{
		return $this->db->where('user_id',$data['user_id'])
			->update($this->table,$data);
	}
	public function updatevital($data = [])

 	 {

 		 return $this->db->where('vital_id',$data['vital_id'])

 			 ->update("pa_vital_sign",$data);

 	 }
	 public function delete($user_id = null)

	 {

	 	$this->db->where('user_id',$user_id)

	 		->group_start()

	 		->where('user_role',1)

	 		->group_end()

	 		->delete($this->table);



	 	if ($this->db->affected_rows()) {

	 		return true;

	 	} else {

	 		return false;

	 	}

	 }

}
