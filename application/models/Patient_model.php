<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {

	private $table = "patient";

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
		$id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
        if($isadmin == 1){
        	$id = $created_by_id;
        }
        return $this->db->select("*")
		->from($this->table)
		->where('hospital_id',$id)
		->order_by('id','desc')
		->get()
		->result();

	}

	public function read_by_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('id',$id)
			->get()
			->row();
	}

	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data);
	}
	public function updatevital($data = [])

  	{

  		return $this->db->where('vital_id',$data['vital_id'])

  			->update("pa_vital_sign",$data);

  	}

	public function delete($id = null)
	{
		$this->db->where('id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}

}
