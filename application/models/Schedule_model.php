<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_model extends CI_Model {

	private $table = "schedule";

	public function create($data = [])
	{

		return $this->db->insert("schedule",$data);
	}

	public function read()
	{
		$session_id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
        if($isadmin == 1){
        	$session_id = $created_by_id;
        }
		return $this->db->select("*")
			->from($this->table)
			->where("hospital_id",$session_id)
			//->join('user','user.user_id = schedule.doctor_id','left')
			//->join('department','department.dprt_id = user.department_id','left')
			->order_by('schedule.schedule_id','desc')
			->get()
			->result();
	}


	public function read_by_id($schedule_id = null)
	{
		$session_id = $this->session->userdata('user_id');
		return $this->db->select("*")
			->from($this->table)
			->where('schedule_id',$schedule_id)
			->where('hospital_id',$session_id)
			->get()
			->row();
	}


	public function update($data = [])
	{
		return $this->db->where('schedule_id',$data['schedule_id'])
			->update($this->table,$data);
	}

	public function delete($schedule_id = null)
	{
		$this->db->where('schedule_id',$schedule_id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}


}
