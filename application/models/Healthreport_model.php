<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Healthreport_model extends CI_Model {

	private $table = "user";

	public function get_problem_healthreport($problem)
	{
		$problem =  $this->db->select("*")
					->from("health_problem")
					->like("problem_name",$problem,'after')
					->where("status",'1')
					->get()
					//echo $this->db->last_query();exit;
					->result();
					return $problem;
	}

	public function get_allergy_healthreport()
	{
		$allergy_type = $this->db->select("*")
					->from("allergy_type")
				//	->where("parent_id",'0')
					->where("status",'1')
					->get()
					->result();
					return $allergy_type;
	}

	public function get_icdversion_healthreport($icdversion)
	{
		$icd_version = $this->db->select("*")
					->from("icd_version")
					->like("icd_name",$icdversion,'after')
					->where("status",'1')
					->get()
					->result();
					return $icd_version;
	}

	public function get_loinccode_healthreport($loinc_code)
	{
		$loinc_code = $this->db->select("*")
					->from("loinc_code")
					->like("loinc_code",$loinc_code,'after')
					->where("status",'1')
					->get()
					->result();
					return $loinc_code;
	}

	/*
	 * Add Health Report Immunizations CVX Code
	 */
	public function get_immunizations_cvxcode($cvxcode_immunizations_value){
		$cvx_code = $this->db->select("*")
			->from("cvx_code")
			->like("cvx_code",$cvxcode_immunizations_value)
			->where("status",'1')
			->get()
			->result();
		return $cvx_code;
	}

	/**
	 * Health Report Immunizations Manufacturer
	 */
	public function get_immunizations_manufacturer($manufacture){
			$manufacture = $this->db->select("*")
				->from("manufacture")
				->like("manufacture",$manufacture,'after')
				->where("status",'1')
				->get()
				->result();
			return $manufacture;
	}


	public function get_cptcode_healthreport($cpt_code)
	{
		$cpt_code = $this->db->select("*")
					->from("cpt_code")
					->like("cpt_code",$cpt_code,'after')
					->where("status",'1')
					->get()
					->result();					
					return $cpt_code;
	}

	public function get_drug_healthreport($drug_name)
	{
		$drug =    $this->db->select("*")
					->from("drug")
					->like("drug_name",$drug_name,'after')
					->where("status",'1')
					->get()
					->result();
					return $drug;
	}
	public function get_apointment_healthreport($session_id){
		return $this->db->select("*")->from("schedule")->where("hospital_id",$session_id)->order_by('whens','asc')->get()->result();
	}
	public function get_ordering_doctor_healthreport($session_id){
		return $this->db->select("*")->from("user")->where("hospital_id",$session_id)->where("role_id",2)->get()->result();
	}
	public function get_data_recordvaccinations_healthreport($colunm_name,$table_name){
		return $this->db->select($colunm_name)->from($table_name)->get()->result();

	}

	public function create($data = [])
	{
		return $this->db->insert($this->table,$data);
	}

	public function save_vitalsing($vitasing_data)
	{
		$sql = $this->db->insert("pa_vital_sign",$vitasing_data);
		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function save_problemlist($problemlist_data)
	{
		$sql = $this->db->insert("healthreport_problem",$problemlist_data);
		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function save_allergylist($allergylist_data)
	{
		$sql = $this->db->insert("healthreport_allergies",$allergylist_data);
//echo $this->db->last_query();
	//	exit;
		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function save_labresult($labresult_data)
	{
		$sql = $this->db->insert("lab_result",$labresult_data);

		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function save_imagingorder($imagingorder_data)
	{
		$sql = $this->db->insert("imaging_order",$imagingorder_data);

		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function save_e_prescription($e_prescription_data)
	{
		$sql = $this->db->insert("e_prescription",$e_prescription_data);
		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function save_summary($summary_data)
	{
		$sql = $this->db->insert("healthreport_summary",$summary_data);


		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function save_healthrecord($healthrecord_data)
	{
		$sql = $this->db->insert("healthreport_healthrecord",$healthrecord_data);
    

		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function save_vaccines($vaccines_data)
	{
		$sql = $this->db->insert("healthreport_vaccines",$vaccines_data);

		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function save_record_vaccinations($recordvaccinations)
	{
		$sql = $this->db->insert("healthreport_recordvaccinations",$recordvaccinations);
		//echo $this->db->last_query();exit;
		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function save_clinical_notes($clinical_notes){
		$sql = $this->db->insert("healthreport_lockedclinicalnotes",$clinical_notes);
		//echo $this->db->last_query();exit;
		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function save_singed_consent($clinical_notes){
		$sql = $this->db->insert("healthreport_singedconsentforms",$clinical_notes);
		//echo $this->db->last_query();exit;
		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function save_lab_result($lab_result){
		$sql = $this->db->insert("document_labresult",$lab_result);
		//echo $this->db->last_query();exit;
		if ($sql) {
			return 1;
		}else{
			return 0;
		}
	}

	public function read()
	{
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
			->where('user.created_by',$session_id)
			->where_not_in("email",$ignore)
			->order_by('user.user_id','desc')
			->get()
			->result();

    //    }
			// 	else{
      //   return $this->db->select("user.*,department.name")
			// ->from("user")
			// ->join('department','department.dprt_id = user.department_id','left')
			// ->where('user.user_role',2)
			// ->where('user.created_by',$id)
			// ->order_by('user.user_id','desc')
			// ->get()
			// ->result();
      //   }
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
