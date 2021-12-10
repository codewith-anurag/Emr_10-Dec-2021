<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family_history extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
      'dashboard_patient/insurance_model',
			'dashboard_patient/home_model',
			'dashboard_patient/patient_model',
			'dashboard_patient/doctor_model',
      'dashboard_patient/document/document_model'
		));

		if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 10)
			redirect('login');
	}

	
	function familysearch()
	 {
		$p_id = trim($this->input->get_post('p_id'));
		$patient_id = $this->session->userdata('patient_id');
		$p = $this->db->select("*")->from("patient")->where('patient_id',$patient_id)->get()->row();
     
		 if($p_id!=''){
			 $sql ="SELECT * FROM family_member WHERE (patient_id ='".$p->id."') and  (name like '%".($p_id)."%' or relation_to_patient like '%".($p_id)."%' or races like '%".($p_id)."%' or gender like '%".($p_id)."%' or ethnicities like '%".($p_id)."%') ORDER BY member_id DESC";
			 $query = $this->db->query($sql);
				$searchdetail =  $query->result();
				$msg ='';
				//if(count($searchdetail)>0){
					foreach ($searchdetail as $value) {
						
						$msg.='<tr style="border-bottom: 1px solid #ddd;" class="hovertr">';
						
						$msg.='<td>';
						
						$msg.=$value->prefix.' '.$value->name;
						$msg.='</td>';
						
						$msg.='<td>'.$value->relation_to_patient.'</td>';
						$msg.='<td>'.$value->races.'</td>';
						$msg.= '<td>';
					
					 $msg.=$value->gender.'</td>';
					 $msg.='<td>'.$value->ethnicities.'</td>';
						$msg.=				 '</tr>';

						
					}


				 echo json_encode($msg);
			 }else{
				 	$sql ="SELECT * FROM family_member WHERE (patient_id ='".$p->id."') ORDER BY member_id DESC";
			 		$query = $this->db->query($sql);
					$searchdetail =  $query->result();
				$msg ='';
				//if(count($searchdetail)>0){
					foreach ($searchdetail as $value) {
						
						$msg.='<tr style="border-bottom: 1px solid #ddd;" class="hovertr">';
						
						$msg.='<td>';
						
						$msg.=$value->prefix.' '.$value->name;
						$msg.='</td>';
						
						$msg.='<td>'.$value->relation_to_patient.'</td>';
						$msg.='<td>'.$value->races.'</td>';
						$msg.= '<td>';
					
					 $msg.=$value->gender.'</td>';
					 $msg.='<td>'.$value->ethnicities.'</td>';
						$msg.=				 '</tr>';

						
					}


				 echo json_encode($msg);

			 }

	 }
	
	
	
	public function index()
	{
		//echo 'tet';
		//exit;
		//print_r($_SESSION);
		$patient_id = $this->session->userdata('patient_id');
		$p = $this->db->select("*")->from("patient")->where('patient_id',$patient_id)->get()->row();
	  $data['patients'] =	$this->db->select("*")->from("patient")->where('patient_id',$patient_id)->get()->result();
		$data['title'] = display('patient_list');

	//	$data['patients'] = $this->patient_model->read();
  $result = $this->db->select("*")->from("family_member")->where("patient_id",$p->id)->get()->result();
	//echo $this->db->last_query();
  $data['familymembers'] = $result;  //$this->insurance_model->read();
		$data['content'] = $this->load->view('dashboard_patient/family_history/family_history',$data,true);
		$this->load->view('dashboard_patient/main_wrapper',$data);
	}







	public function delete_familymember($id,$patient_id){
		$this->db->where("member_id",$id);
		$sql = $this->db->delete("family_member");
		if ($sql) {
			redirect("dashboard_patient/family_history/family_history/");
		}else{
			redirect("dashboard_patient/family_history/family_history/");
		}
	}












}
