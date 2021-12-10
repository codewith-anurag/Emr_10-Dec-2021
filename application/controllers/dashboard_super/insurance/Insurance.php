<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
      'dashboard_doctor/patient/insurance_model',
			'dashboard_doctor/patient/patient_model',
			'dashboard_doctor/patient/doctor_model',
            'dashboard_doctor/patient/document_model'
		));

		if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 2)
			redirect('login');
	}

	public function index()
	{
		//echo 'tet';
		//exit;
		$data['title'] = display('patient_list');
		$data['patients'] = $this->patient_model->read();
		$data['insurance'] = $this->insurance_model->read();
		$data['content'] = $this->load->view('dashboard_doctor/insurance/insurance',$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}
	public function sendEmailAttachment($to, $subject, $htmlMessage) {
			$this->load->library('email');
			$this->load->helper('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('sahil@gtimecs.org', 'VHS');
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($htmlMessage);
		//	if (!empty($pdf_name)) {
		//		$this->email->attach($pdf_name);
		//	}
			@$this->email->send();
		}
		public function changestatus()
		{
			$id = $this->input->get_post('id');
			$value = $this->input->get_post('value');

		 $arr['status'] = $value;
		 $this->db->where('patient_id',$id);
		 $this->db->update('patient',$arr);
		 echo 'success';
		 exit;
		}
    public function email_check($email, $id)
    {
        $emailExists = $this->db->select('email')
            ->where('email',$email)
            ->where_not_in('id',$id)
            ->get('patient')
            ->num_rows();
						$emailExistsdo = $this->db->select('email')
								->where('email',$email)
								->get('user')
								->num_rows();
        if ($emailExists > 0 or $emailExistsdo > 0) {
            $this->form_validation->set_message('email_check', 'The {field} field must contain a unique value.');
            return false;
        } else {
            return true;
        }
    }
		public function creates()
		{
			//echo 'test';
		//	exit;
		//exit;
			$data['title'] = 'Add Insurance';//display('add_patient');

		//	$this->form_validation->set_rules('payer_name', 'Payer Name','required|max_length[50]');


//echo $this->input->get_post('payer_name');
//exit;

		//	$this->form_validation->set_rules('plan_name_and_type', 'Plan Name And Type','required|max_length[20]');
    //  $this->form_validation->set_rules('order_of_benefits', 'Order Of Benefits','required|max_length[20]');
    //  $this->form_validation->set_rules('insurance_id', 'Insurance Id','required|max_length[20]');
    //  $this->form_validation->set_rules('effective_from', 'Effective From','required|max_length[20]');
			//$this->form_validation->set_rules('blood_group', display('blood_group'),'max_length[10]');
			//$this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
		//	$this->form_validation->set_rules('copay_amount', 'Copay Amount','required|max_length[10]');


			#-------------------------------#
		//	if ($this->input->post('id') == null) { //create a patient
				$data['insurance'] = (object)$postData = [
					//'insurance_u_id'   		   => $this->input->post('id'),
					'patient_id'   => '',
					'status'    => $this->input->get_post('status'),
					'payer_name' 	   => $this->input->get_post('payer_name'),
					'plan_name_and_type' 	   => $this->input->get_post('plan_name_and_type'),
					'order_of_benefits' 	   => $this->input->get_post('order_of_benefits'),
					'workers_compensation' 	   => $this->input->get_post('workers_compensation'),
					//'phone'   	   => $this->input->post('phone'),
					'insurance_id'       => $this->input->get_post('insurance_id'),
					//'blood_group'  => $this->input->post('blood_group'),
					'group_id' 		   => $this->input->get_post('group_id'),

					'effective_from' => date('Y-m-d', strtotime(($this->input->get_post('effective_from') != null)? $this->input->get_post('effective_from'): date('Y-m-d'))),
          'effective_to' => date('Y-m-d', strtotime(($this->input->get_post('effective_to') != null)? $this->input->get_post('effective_to'): '0000-00-00')),
					'relation_to_insured' 	   => $this->input->post('relation_to_insured'),
					'copay_type' 	   => $this->input->get_post('copay_type'),
					'copay_amount' 	   => $this->input->get_post('copay_amount'),
'claim_number' 	   => $this->input->get_post('claim_number'),
'notes' 	   => $this->input->get_post('notes'),
'employer_name' 	   => $this->input->get_post('employer_name'),
'employer_address1' 	   => $this->input->get_post('employer_address1'),
'employer_address2' 	   => $this->input->get_post('employer_address2'),
'city' 	   => $this->input->get_post('city'),
'state' 	   => $this->input->get_post('state'),
'zip' 	   => $this->input->get_post('zip'),

'subscribers_fname' 	   => $this->input->get_post('subscribers_fname'),
'subscribers_mname' 	   => $this->input->get_post('subscribers_mname'),
'subscribers_lname' 	   => $this->input->get_post('subscribers_lname'),
'subscribers_dob' 	   => date('Y-m-d', strtotime(($this->input->get_post('subscribers_dob') != null)? $this->input->get_post('subscribers_dob'): date('Y-m-d'))),
'subscribers_sex' 	   => $this->input->get_post('subscribers_sex'),
'subscribers_ssn' 	   => $this->input->get_post('subscribers_ssn'),
'subscribers_address1' 	   => $this->input->get_post('subscribers_address1'),
'subscribers_address2' 	   => $this->input->get_post('subscribers_address2'),
'subscribers_city' 	   => $this->input->get_post('subscribers_city'),
'subscribers_state' 	   => $this->input->get_post('subscribers_state'),
'subscribers_zip' 	   => $this->input->get_post('subscribers_zip'),
'subscribers_primary_number' 	   => $this->input->get_post('subscribers_primary_number'),
'subscribers_primary_ext' 	   => $this->input->get_post('subscribers_primary_ext'),
'subscribers_secondary_number' 	   => $this->input->get_post('subscribers_secondary_number '),
'subscribers_secondary_ext' 	   => $this->input->get_post('subscribers_secondary_ext'),
'eligiblility' 	   => $this->input->get_post('eligiblility'),


				//	'insurance'       => $this->input->post('insurance'),
				//	'insurance_file'       => (!empty($insurance)?$insurance:$this->input->post('old_insurance')),
					//
				];
			//} else { // update patient

			//}
			#-------------------------------#
			//if ($this->form_validation->run() === true) {

				#if empty $id then insert data
				//if (empty($postData['id'])) {
					if ($this->insurance_model->create($postData)) {
						$insurance_id = $this->db->insert_id();
						$result = $this->db->select("*")->from("insurance")->where("insurance_u_id",$insurance_id)->get()->row();
						#set success message

						//$this->session->set_flashdata('message', display('save_successfully'));
						echo json_encode($result);
						exit;
					} else {
						#set exception message
					//	$this->session->set_flashdata('exception', display('please_try_again'));
					$result = array();
						echo json_encode($result);
						exit;
					}
		//redirect('patient/create/'.$insurance_id);
					//redirect('patient/profile/' . $patient_id);
				// } else {
				// 	if ($this->insurance_model->update($postData)) {
				// 		#set success message
				// 		$this->session->set_flashdata('message', display('update_successfully'));
				// 	} else {
				// 		#set exception message
				// 		$this->session->set_flashdata('exception', display('please_try_again'));
				// 		redirect('patient/edit/'.$postData['id']);
				// 	}
				//
				// 	redirect('patient/create');
				// }

		//	} else {
			//	$data['content'] = $this->load->view('insurance_form',$data,true);
			//	$this->load->view('dashboard_doctor/main_wrapper',$data);
			//}
		}
	public function create()
	{
		$data['title'] = display('add_patient');
        $id = $this->input->post('id');
					$this->form_validation->set_rules('plan_name_and_type', 'Plan Name And Type','required|max_length[20]');
		     $this->form_validation->set_rules('order_of_benefits', 'Order Of Benefits','required|max_length[20]');
		    $this->form_validation->set_rules('insurance_id', 'Insurance Id','required|max_length[20]');
		     $this->form_validation->set_rules('effective_from', 'Effective From','required|max_length[20]');

					//$this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
					$this->form_validation->set_rules('copay_amount', 'Copay Amount','required|max_length[10]');
		$this->form_validation->set_rules('status', display('status'),'required');
		#-------------------------------#
		//picture upload

		#-------------------------------#
		if ($this->input->post('id') == null) { //create a patient
			$data['insurance'] = (object)$postData = [
				'insurance_u_id'   		   => $this->input->post('id'),
				'patient_id'   => $this->input->get_post('patient_id'),
				'status'    => $this->input->get_post('status'),
				'payer_name' 	   => $this->input->get_post('payer_name'),
				'plan_name_and_type' 	   => $this->input->get_post('plan_name_and_type'),
				'order_of_benefits' 	   => $this->input->get_post('order_of_benefits'),
				'workers_compensation' 	   => $this->input->get_post('workers_compensation'),
				//'phone'   	   => $this->input->post('phone'),
				'insurance_id'       => $this->input->get_post('insurance_id'),
				//'blood_group'  => $this->input->post('blood_group'),
				'group_id' 		   => $this->input->get_post('group_id'),

				'effective_from' => date('Y-m-d', strtotime(($this->input->get_post('effective_from') != null)? $this->input->get_post('effective_from'): date('Y-m-d'))),
				'effective_to' => date('Y-m-d', strtotime(($this->input->get_post('effective_to') != null)? $this->input->get_post('effective_to'): '0000-00-00')),
				'relation_to_insured' 	   => $this->input->post('relation_to_insured'),
				'copay_type' 	   => $this->input->get_post('copay_type'),
				'copay_amount' 	   => $this->input->get_post('copay_amount'),
'claim_number' 	   => $this->input->get_post('claim_number'),
'notes' 	   => $this->input->get_post('notes'),
'employer_name' 	   => $this->input->get_post('employer_name'),
'employer_address1' 	   => $this->input->get_post('employer_address1'),
'employer_address2' 	   => $this->input->get_post('employer_address2'),
'city' 	   => $this->input->get_post('city'),
'state' 	   => $this->input->get_post('state'),
'zip' 	   => $this->input->get_post('zip'),

'subscribers_fname' 	   => $this->input->get_post('subscribers_fname'),
'subscribers_mname' 	   => $this->input->get_post('subscribers_mname'),
'subscribers_lname' 	   => $this->input->get_post('subscribers_lname'),
'subscribers_dob' 	   => date('Y-m-d', strtotime(($this->input->get_post('subscribers_dob') != null)? $this->input->get_post('subscribers_dob'): date('Y-m-d'))),
'subscribers_sex' 	   => $this->input->get_post('subscribers_sex'),
'subscribers_ssn' 	   => $this->input->get_post('subscribers_ssn'),
'subscribers_address1' 	   => $this->input->get_post('subscribers_address1'),
'subscribers_address2' 	   => $this->input->get_post('subscribers_address2'),
'subscribers_city' 	   => $this->input->get_post('subscribers_city'),
'subscribers_state' 	   => $this->input->get_post('subscribers_state'),
'subscribers_zip' 	   => $this->input->get_post('subscribers_zip'),
'subscribers_primary_number' 	   => $this->input->get_post('subscribers_primary_number'),
'subscribers_primary_ext' 	   => $this->input->get_post('subscribers_primary_ext'),
'subscribers_secondary_number' 	   => $this->input->get_post('subscribers_secondary_number '),
'subscribers_secondary_ext' 	   => $this->input->get_post('subscribers_secondary_ext'),
'eligiblility' 	   => $this->input->get_post('eligiblility'),


			//	'insurance'       => $this->input->post('insurance'),
			//	'insurance_file'       => (!empty($insurance)?$insurance:$this->input->post('old_insurance')),
				//
			];
		} else { // update patient
			$data['insurance'] = (object)$postData = [
				//'insurance_u_id'   		   => $this->input->post('id'),
				'patient_id'   => $this->input->get_post('patient_id'),
				'status'    => $this->input->get_post('status'),
				'payer_name' 	   => $this->input->get_post('payer_name'),
				'plan_name_and_type' 	   => $this->input->get_post('plan_name_and_type'),
				'order_of_benefits' 	   => $this->input->get_post('order_of_benefits'),
				'workers_compensation' 	   => $this->input->get_post('workers_compensation'),
				//'phone'   	   => $this->input->post('phone'),
				'insurance_id'       => $this->input->get_post('insurance_id'),
				//'blood_group'  => $this->input->post('blood_group'),
				'group_id' 		   => $this->input->get_post('group_id'),

				'effective_from' => date('Y-m-d', strtotime(($this->input->get_post('effective_from') != null)? $this->input->get_post('effective_from'): date('Y-m-d'))),
				'effective_to' => date('Y-m-d', strtotime(($this->input->get_post('effective_to') != null)? $this->input->get_post('effective_to'): '0000-00-00')),
				'relation_to_insured' 	   => $this->input->post('relation_to_insured'),
				'copay_type' 	   => $this->input->get_post('copay_type'),
				'copay_amount' 	   => $this->input->get_post('copay_amount'),
'claim_number' 	   => $this->input->get_post('claim_number'),
'notes' 	   => $this->input->get_post('notes'),
'employer_name' 	   => $this->input->get_post('employer_name'),
'employer_address1' 	   => $this->input->get_post('employer_address1'),
'employer_address2' 	   => $this->input->get_post('employer_address2'),
'city' 	   => $this->input->get_post('city'),
'state' 	   => $this->input->get_post('state'),
'zip' 	   => $this->input->get_post('zip'),

'subscribers_fname' 	   => $this->input->get_post('subscribers_fname'),
'subscribers_mname' 	   => $this->input->get_post('subscribers_mname'),
'subscribers_lname' 	   => $this->input->get_post('subscribers_lname'),
'subscribers_dob' 	   => date('Y-m-d', strtotime(($this->input->get_post('subscribers_dob') != null)? $this->input->get_post('subscribers_dob'): date('Y-m-d'))),
'subscribers_sex' 	   => $this->input->get_post('subscribers_sex'),
'subscribers_ssn' 	   => $this->input->get_post('subscribers_ssn'),
'subscribers_address1' 	   => $this->input->get_post('subscribers_address1'),
'subscribers_address2' 	   => $this->input->get_post('subscribers_address2'),
'subscribers_city' 	   => $this->input->get_post('subscribers_city'),
'subscribers_state' 	   => $this->input->get_post('subscribers_state'),
'subscribers_zip' 	   => $this->input->get_post('subscribers_zip'),
'subscribers_primary_number' 	   => $this->input->get_post('subscribers_primary_number'),
'subscribers_primary_ext' 	   => $this->input->get_post('subscribers_primary_ext'),
'subscribers_secondary_number' 	   => $this->input->get_post('subscribers_secondary_number '),
'subscribers_secondary_ext' 	   => $this->input->get_post('subscribers_secondary_ext'),
'eligiblility' 	   => $this->input->get_post('eligiblility'),


			//	'insurance'       => $this->input->post('insurance'),
			//	'insurance_file'       => (!empty($insurance)?$insurance:$this->input->post('old_insurance')),
				//
			];
		}
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($postData['id'])) {
				if ($this->insurance_model->create($postData)) {
					$insurance_id = $this->db->insert_id();
					#set success message

					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
redirect('dashboard_doctor/insurance/insurance');

				//redirect('patient/profile/' . $patient_id);
			} else {
				if ($this->insurance_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
					redirect('dashboard_doctor/insurance/insurance/edit/'.$postData['id']);
				}

				redirect('dashboard_doctor/insurance/insurance');
			}

		} else {
			$data['content'] = $this->load->view('dashboard_doctor/insurance/insurance_form',$data,true);
			$this->load->view('dashboard_doctor/main_wrapper',$data);
		}
	}
	public function createvital()
	{
		$data['title'] = display('add_vital_sign');
				$id = $this->input->post('vital_id');
		#-------------------------------#

		$this->form_validation->set_rules('patient_id', display('patient_id'),'required|max_length[50]');
		$this->form_validation->set_rules('pulse', display('pulse'),'required|max_length[50]');


		$this->form_validation->set_rules('temperature', display('temperature'),'required|max_length[32]');
		$this->form_validation->set_rules('blood_pressure_sytolic', display('sytolic'),'required');
		$this->form_validation->set_rules('blood_pressure_diastolic', display('diastolic'),'required');
		$this->form_validation->set_rules('blood_pressure_position', 'Sitting or Standing','required');
		$this->form_validation->set_rules('weight', display('Weight(kg)'),'required');
		$this->form_validation->set_rules('rest_rate', display('Rest.Rate(Breaths/min)'),'required');

		#-------------------------------#
		//picture upload

		#-------------------------------#
		if ($this->input->post('id') == null) { //create a patient
			$data['patient'] = (object)$postData = [
				'vital_id'   		   => $this->input->post('vital_id'),
				'patient_id'   => $this->input->post('patient_id'),
				'pulse'    => $this->input->post('pulse'),
				'temperature' 	   => $this->input->post('temperature'),
				'temperature_a' 	   => $this->input->post('temperature_a'),
				'blood_pressure_sytolic' 	   => $this->input->post('blood_pressure_sytolic'),
				'blood_pressure_diastolic'   	   => $this->input->post('blood_pressure_diastolic'),
				'blood_pressure_position'       => $this->input->post('blood_pressure_position'),

				'weight' 		   => $this->input->post('weight'),
				'rest_rate' => $this->input->post('rest_rate'),
				'created_date' => date('Y-m-d'),
				'created_time' => date('H:i:s'),
			];
		} else { // update patient
			$data['patient'] = (object)$postData = [
				'vital_id'   		   => $this->input->post('vital_id'),
				'patient_id'   => $this->input->post('patient_id'),
				'pulse'    => $this->input->post('pulse'),
				'temperature' 	   => $this->input->post('temperature'),
				'temperature_a' 	   => $this->input->post('temperature_a'),
				'blood_pressure_sytolic' 	   => $this->input->post('blood_pressure_sytolic'),
				'blood_pressure_diastolic'   	   => $this->input->post('blood_pressure_diastolic'),
				'blood_pressure_position'       => $this->input->post('blood_pressure_position'),

				'weight' 		   => $this->input->post('weight'),
				'rest_rate' => $this->input->post('rest_rate'),
				'created_date' => date('Y-m-d'),
				'created_time' => date('H:i:s'),
			];
		}
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($postData['vital_id'])) {
				if ($this->patient_model->createvital($postData)) {
					$vital_id = $this->db->insert_id();
					#set success message

					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}

			//	redirect('patient/profile/' . $this->input->post('patient_id'));
				//	redirect('patient');
					$result =	$this->db->select('*')
										 ->from('patient')
										 ->where('patient_id',$this->input->post('patient_id'))->get()->row();

						redirect('patient/profile/' . $result->id);
			} else {
				if ($this->patient_model->updatevital($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('patient/editvital/'.$postData['vital_id']);
		//		redirect('patient');
			}

		} else {
			$data['content'] = $this->load->view('vital_form',$data,true);
			$this->load->view('dashboard_doctor/main_wrapper',$data);
		}
	}

	public function profile($patient_id = null)
	{
		$data['title'] =  display('patient_information');
		#-------------------------------#
		$data['profile'] = $this->patient_model->read_by_id($patient_id);
		$data['documents'] = $this->document_model->read_by_patient($patient_id);
		$this->db->select('*')
		         ->from('pa_vital_sign')
		         ->join('patient', 'patient.patient_id = pa_vital_sign.patient_id')
						 ->where('patient.id',$patient_id)->order_by('pa_vital_sign.created_time','desc')->order_by('pa_vital_sign.created_date','desc');
		$result = $this->db->get();
	//	echo $this->db->last_query();
		$data['vital'] = $result->result();
		$data['content'] = $this->load->view('patient_profile',$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}
	// public function add_insurance($patient_id = null)
	// {
	// 	$data['title'] =  display('patient_information');
	// 	#-------------------------------#
	// 	//$data['profile'] = $this->patient_model->read_by_id($patient_id);
	// 	//$data['documents'] = $this->document_model->read_by_patient($patient_id);
	// //	$this->db->select('*')
	// 			//		 ->from('pa_vital_sign')
	// 		///			 ->join('patient', 'patient.patient_id = pa_vital_sign.patient_id')
	// 				//	 ->where('patient.id',$patient_id)->order_by('pa_vital_sign.created_time','desc')->order_by('pa_vital_sign.created_date','desc');
	// //	$result = $this->db->get();
	// //	echo $this->db->last_query();
	// //	$data['vital'] = $result->result();
	// 	$data['content'] = $this->load->view('insurance_form',$data,true);
	// 	$this->load->view('dashboard_doctor/main_wrapper',$data);
	// }

	public function edit($patient_id = null)
	{
		$data['title'] = "Insurance edit";//display('patient_edit');
		#-------------------------------#
	//	$data['patient'] = $this->patient_model->read_by_id($patient_id);
		$data['insurance'] = $this->insurance_model->read_by_id($patient_id);
			//$data['insurance'] = $this->insurance_model->read();
		$data['content'] = $this->load->view('dashboard_doctor/insurance/insurance_form',$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}


	public function delete($patient_id = null)
	{
		if ($this->insurance_model->delete($patient_id)) {
			#set success message
			$this->session->set_flashdata('message','Insurance  delete successfully');
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('dashboard_doctor/insurance/insurance');
	}



    /*
    |----------------------------------------------
    |        id genaretor
    |----------------------------------------------
    */
    public function randStrGen($mode = null, $len = null){
        $result = "";
        if($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 4):
            $chars = "0123456789";
        endif;

        $charArray = str_split($chars);
        for($i = 0; $i < $len; $i++) {
                $randItem = array_rand($charArray);
                $result .="".$charArray[$randItem];
        }
        return $result;
    }
    /*
    |----------------------------------------------
    |         Ends of id genaretor
    |----------------------------------------------
    */


	public function document()
	{
		$data['title'] = display('document_list');
		$data['documents'] = $this->document_model->read();
		$data['content'] = $this->load->view('document',$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}



    public function document_form()
    {
        $data['title'] = display('add_document');
        /*----------VALIDATION RULES----------*/
        $this->form_validation->set_rules('patient_id', display('patient_id') ,'required|max_length[30]');
        $this->form_validation->set_rules('doctor_name', display('doctor_id'),'max_length[11]');
        $this->form_validation->set_rules('description', display('description'),'trim');
        $this->form_validation->set_rules('hidden_attach_file', display('attach_file'),'required|max_length[255]');
        /*-------------STORE DATA------------*/
        $urole = $this->session->userdata('user_role');
        $data['document'] = (object)$postData = array(
            'patient_id'  => $this->input->post('patient_id'),
            'doctor_id'   => $this->input->post('doctor_id'),
            'description' => $this->input->post('description'),
            'hidden_attach_file' => $this->input->post('hidden_attach_file'),
            'date'        => date('Y-m-d'),
            'upload_by'   => (($urole==10)?0:$this->session->userdata('user_id'))
        );

        /*-----------CREATE A NEW RECORD-----------*/
        if ($this->form_validation->run() === true) {

            if ($this->document_model->create($postData)) {
                #set success message
                $this->session->set_flashdata('message', display('save_successfully'));
            } else {
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
            }
            redirect('patient/document_form');
        } else {
            $data['doctor_list'] = $this->doctor_model->doctor_list();
            $data['content'] = $this->load->view('document_form',$data,true);
            $this->load->view('dashboard_doctor/main_wrapper',$data);
        }
    }


    public function do_upload()
    {
        ini_set('memory_limit', '200M');
        ini_set('upload_max_filesize', '200M');
        ini_set('post_max_size', '200M');
        ini_set('max_input_time', 3600);
        ini_set('max_execution_time', 3600);

        if (($_SERVER['REQUEST_METHOD']) == "POST") {
            $filename = $_FILES['attach_file']['name'];
            $filename = strstr($filename, '.', true);
            $email    = $this->session->userdata('email');
            $filename = strstr($email, '@', true)."_".$filename;
            $filename = strtolower($filename);
            /*-----------------------------*/

            $config['upload_path']   = FCPATH .'./assets/attachments/';
            // $config['allowed_types'] = 'csv|pdf|ai|xls|ppt|pptx|gz|gzip|tar|zip|rar|mp3|wav|bmp|gif|jpg|jpeg|jpe|png|txt|text|log|rtx|rtf|xsl|mpeg|mpg|mov|avi|doc|docx|dot|dotx|xlsx|xl|word|mp4|mpa|flv|webm|7zip|wma|svg';
            $config['allowed_types'] = '*';
            $config['max_size']      = 0;
            $config['max_width']     = 0;
            $config['max_height']    = 0;
            $config['file_ext_tolower'] = true;
            $config['file_name']     =  $filename;
            $config['overwrite']     = false;

            $this->load->library('upload', $config);

            $name = 'attach_file';
            if ( ! $this->upload->do_upload($name) ) {
                $data['exception'] = $this->upload->display_errors();
                $data['status'] = false;
                echo json_encode($data);
            } else {
                $upload =  $this->upload->data();
                $data['message'] = display('upload_successfully');
                $data['filepath'] = './assets/attachments/'.$upload['file_name'];
                $data['status'] = true;
                echo json_encode($data);
            }
        }
    }


    public function document_delete($id = null)
    {
    	if ($this->document_model->delete($id)) {

	    	$file = $this->input->get('file');
	    	if (file_exists($file)) {
	    		@unlink($file);
	    	}
    		$this->session->set_flashdata('message', display('save_successfully'));

    	} else {
    		$this->session->set_flashdata('exception', display('please_try_again'));
    	}

    	redirect($_SERVER['HTTP_REFERER']);
    }




}
