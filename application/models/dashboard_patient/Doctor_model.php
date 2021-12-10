<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_model extends CI_Model {

	private $table = "user";

	public function create($data = [])
	{
		return $this->db->insert($this->table,$data);
	}

	public function read()
	{
	//	print_r($_SESSION);
		/**$created_by_id = $this->session->userdata('created_by');
		return $this->db->select("user.*,department.name")
			->from("user")
			->join('department','department.dprt_id = user.department_id','left')
			->where('user.user_role',2)
			->where('user.created_by',$created_by_id)
			->order_by('user.user_id','desc')
			->get()
			->result();**/
			$id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
		$login_email = $this->session->userdata('email');
        $ignore = array($login_email);
				$session_id = $this->session->userdata('user_id');
				$created_by_id = $this->session->userdata('created_by');
		        $isadmin = $this->session->userdata('isadmin');
		        if($isadmin == 1){
		        	$session_id = $created_by_id;
		        }
      //  if($isadmin == 1){
         	return $this->db->select("user.*,department.name")
			->from("user")
			->join('department','department.dprt_id = user.department_id','left')
			->where('user.user_role',2)
			->where('user.status',1)
			->where('user.created_by',$_SESSION['hospital_id'])
			->where_not_in("email",$ignore)
			->order_by('user.user_id','desc')
			->get()
			->result();
	}

	public function read_by_id($user_id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->group_start()
				->where('user_role',1)
				->or_where('user_role',2)
			->group_end()
			->where('user_id',$user_id)
			->get()
			->row();
	}

	public function update($data = [])
	{
		return $this->db->where('user_id',$data['user_id'])
			->update($this->table,$data);
	}

	public function delete($user_id = null)
	{
		$this->db->where('user_id',$user_id)
			->group_start()
			->where('user_role',2)
			->group_end()
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}


	public function doctor_list()
	{
		$result = $this->db->select("*")
			->from($this->table)
			->where('user_role',2)
			->where('status',1)
			->get()
			->result();

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
