<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Drug_model extends CI_Model {

	private $table = "drug";

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
			->order_by('drug_id','desc')
			->get()
			->result();
	}

	public function read_by_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('drug_id',$id)
			->get()
			->row();
	}

	public function update($data = [])
	{
		return $this->db->where('drug_id',$data['drug_id'])
			->update($this->table,$data);
	}
	public function updatevital($data = [])

 	 {

 		 return $this->db->where('vital_id',$data['vital_id'])

 			 ->update("pa_vital_sign",$data);

 	 }
	 public function delete($drug_id = null)

	 {

	 	$this->db->where('drug_id',$drug_id)->delete($this->table);
	 	if ($this->db->affected_rows()) {

	 		return true;

	 	} else {

	 		return false;

	 	}

	 }

}
