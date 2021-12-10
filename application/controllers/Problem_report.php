<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Problem_report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_model',
			'doctor_model',
            'document_model'
		));

		if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 1)
			redirect('login');
	}

	public function index()
	{
		if($this->session->userdata('isadmin')==0 ){
			$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('user_id'))->get()->row();
		}else if($this->session->userdata('isadmin')==1){
			$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('hospital_id'))->get()->row();
		}
		
		$problem  = $this->db->get_where("health_problem",array("status"=>1))->result();
		$data['problem'] = $problem;   
		$data['title'] = display('Problem Report');
		$data['patients'] = $this->patient_model->read();
		$data['content'] = $this->load->view('problem_report',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
	
	
	function problem_report_search($patient_id=""){

		$problem 	= $this->input->get_post('problem');
		$from_date 	= ($this->input->get_post('from_date')!="") ? date("Y-m-d",strtotime($this->input->get_post('from_date'))) : "";
		$to_date 	= ($this->input->get_post('to_date')!="") ? date("Y-m-d",strtotime($this->input->get_post('to_date'))) : "";
		$sql = "";
   		if($problem!="" && $from_date!="" && $to_date!="" ){
			$sql = "SELECT * FROM healthreport_problem		 
		  	WHERE  healthreport_problem.problem_id = '".$problem."' and DATE(healthreport_problem.diagnosis_datetime) >= '$from_date' and DATE(healthreport_problem.diagnosis_datetime)  <= '$to_date' ORDER BY date DESC";
		}else if($problem!=""){
			$sql ="SELECT * FROM healthreport_problem WHERE  healthreport_problem.problem_id = '".$problem."'  ORDER BY date DESC";
		}else if($from_date!="" && $to_date!=""){
			$sql ="SELECT * FROM healthreport_problem		 
		  	WHERE   DATE(healthreport_problem.diagnosis_datetime) >= '$from_date' and DATE(healthreport_problem.diagnosis_datetime)  <= '$to_date' OR (DATE(healthreport_problem.diagnosis_datetime) = '$from_date') ORDER BY date DESC";
		}
		$query = $this->db->query($sql);
		$searchdetail =  $query->result();
		$msg ='';
	   if(count($searchdetail)>0){
		 foreach ($searchdetail as $value) {
		 	$sqlQ = " select patient.id,fname,lname,prefix,date_of_birth from patient where id=".$value->patient_id;
		 	$Pquery = $this->db->query($sqlQ);
	 		$patientdetail =  $Pquery->row();

			 	if($value->status=='active'){
					$value->status='Active';
				}else if ($value->status=='inactive') {
					$value->status='Inactive';
				}else{
					$value->status='Resolved';
				}	
				

			 $msg.='<tr style="border-bottom: 1px solid #ddd;" class="hovertr">';

			 $msg.='<td><div class="kpull-left"><div class="word-break">';
			 $msg.='<span class="text-primary">'.$patientdetail->prefix."  ".$patientdetail->fname."  ".$patientdetail->lname.'</span>';
			 $msg.='</div></div></td>';

			 $msg.='<td><span class="text-primary">'.date("d-m-Y",strtotime($patientdetail->date_of_birth)).'</span></td>';
			 $msg.='<td><div class="kpull-left"><div class="word-break">';
			 $msg.='<span class="text-primary">'.$value->problem_id .'</span>';
			 $msg.='</div></div></td>';


			 $msg.='<td>'.$value->icd_version_id.'</td>';
			 $msg.='<td>'.$value->icd10_code.'</td>';
			 $msg.='<td>'.$value->status.'</td>';
			 $msg.='<td>'.$value->diagnosis_datetime.'</td>';
			 $msg.='<td>'.$value->changed_datetime.'</td>
			</tr>';
				
		    }
		}else{
			$msg.='<tr style="border-bottom: 1px solid #ddd; text-align:center;" class="hovertr"><td colspan="8">Data Not Found.</td></tr>';
		}    
		echo json_encode($msg);			
	}

	public function sendEmailAttachment($to, $subject, $htmlMessage) {
		if($this->session->userdata('isadmin')==0 ){
			$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('user_id'))->get()->row();
		}else if($this->session->userdata('isadmin')==1){
			$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('hospital_id'))->get()->row();
		}
			$this->load->library('email');
			$this->load->helper('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('sahil@gtimecs.org', $hospital_name->hospitalname);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($htmlMessage);
		//	if (!empty($pdf_name)) {
		//		$this->email->attach($pdf_name);
		//	}
			@$this->email->send();
	}
	public function download_excel()
	{
			$this->load->library('excel');
			require_once './application/third_party/PHPExcel.php';
			require_once './application/third_party/PHPExcel/IOFactory.php';
			$objPHPExcel = new PHPExcel();


			$default_border = array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('rgb' => '000000'),
			);

			$acc_default_border = array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('rgb' => 'c7c7c7'),
			);
			$outlet_style_header = array(
			'font' => array(
			'color' => array('rgb' => '000000'),
			'size' => 10,
			'name' => 'Arial',
			'bold' => true,
			),
			);
			$top_header_style = array(
			'borders' => array(
			'bottom' => $default_border,
			'left' => $default_border,
			'top' => $default_border,
			'right' => $default_border,
			),
			'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb' => '150aec'),
			),
			'font' => array(
			'color' => array('rgb' => 'ffffff'),
			'size' => 15,
			'name' => 'Arial',
			'bold' => true,
			),
			'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
			);
			$style_header = array(
			'borders' => array(
			'bottom' => $default_border,
			'left' => $default_border,
			'top' => $default_border,
			'right' => $default_border,
			),
			'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb' => '150aec'),
			),
			'font' => array(
			'color' => array('rgb' => 'ffffff'),
			'size' => 12,
			'name' => 'Arial',
			'bold' => true,
			),
			'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
			),
			);
			$account_value_style_header = array(
			'borders' => array(
			'bottom' => $default_border,
			'left' => $default_border,
			'top' => $default_border,
			'right' => $default_border,
			),
			'font' => array(
			'color' => array('rgb' => 'ffffff'),
			'size' => 12,
			'name' => 'Arial',
			),
			'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
			),
			);
			$text_align_style = array(
				'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
				'borders' => array(
				'bottom' => $default_border,
				'left' => $default_border,
				'top' => $default_border,
				'right' => $default_border,
				),
				'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => '150aec'),
				),
				'font' => array(
				'color' => array('rgb' => 'ffffff'),
				'size' => 12,
				'name' => 'Arial',
				'bold' => true,
				),
			);

		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:I1');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Problem Report');

		$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($top_header_style);
		
		



		$objPHPExcel->getActiveSheet()->setCellValue('A2', 'Patient Name');
		$objPHPExcel->getActiveSheet()->setCellValue('B2', 'Date Of Birth');
		$objPHPExcel->getActiveSheet()->setCellValue('C2', 'Problem');
		$objPHPExcel->getActiveSheet()->setCellValue('D2', 'ICD Version');
		$objPHPExcel->getActiveSheet()->setCellValue('E2', 'ICD10 Code');
		$objPHPExcel->getActiveSheet()->setCellValue('F2', 'Status');
		$objPHPExcel->getActiveSheet()->setCellValue('G2', 'Datetime Diagnosis');
		$objPHPExcel->getActiveSheet()->setCellValue('H2', 'Datetime Channged');	
	




		$objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('C2')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('E2')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('F2')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('G2')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('H2')->applyFromArray($style_header);
	
	


		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
		
		

		$row = 3;
		$problem 	= "";
		if((count($this->uri->segment_array()) == 5 && $this->uri->segment(3) !="" ) || count($this->uri->segment_array()) == 3){
			$problem 	= ($this->uri->segment(3) !="") ? $this->uri->segment(3) : "";
			$from_date 	= ($this->uri->segment(4)!="") ? date("Y-m-d",strtotime($this->uri->segment(4))) : "";
			$to_date 	= ($this->uri->segment(5)!="") ? date("Y-m-d",strtotime($this->uri->segment(5))) : "";		
		}else if(count($this->uri->segment_array()) == 4 || $this->uri->segment(3) !=""){
			
			$from_date 	= ($this->uri->segment(3)!="") ? date("Y-m-d",strtotime($this->uri->segment(3))) : "";
			$to_date 	= ($this->uri->segment(4)!="") ? date("Y-m-d",strtotime($this->uri->segment(4))) : "";		
		}
		

		$pro = str_replace("%20", " ", $problem);
		$sql = "";
	   	if($pro!="" && $from_date!="" && $to_date!="" ){
			$sql = "SELECT * FROM healthreport_problem		 
		  	WHERE  healthreport_problem.problem_id = '".$pro."' and DATE(healthreport_problem.diagnosis_datetime) >= '$from_date' and DATE(healthreport_problem.diagnosis_datetime)  <= '$to_date' ORDER BY date DESC";
		}else if($pro!=""){
			$sql ="SELECT * FROM healthreport_problem WHERE  healthreport_problem.problem_id = '".$pro."'  ORDER BY date DESC";
		}else if($from_date!="" && $to_date!=""){
			$sql ="SELECT * FROM healthreport_problem		 
			  	WHERE   DATE(healthreport_problem.diagnosis_datetime) >= '$from_date' and DATE(healthreport_problem.diagnosis_datetime)  <= '$to_date' OR (DATE(healthreport_problem.diagnosis_datetime) = '$from_date') ORDER BY date DESC";
		}
		$query = $this->db->query($sql);
		$searchdetail =  $query->result();
		$msg ='';
		if(count($searchdetail)>0){
			foreach ($searchdetail as $value) {
				$sqlQ = " select patient.id,fname,lname,prefix,date_of_birth from patient where id=".$value->patient_id;
			 	$Pquery = $this->db->query($sqlQ);
		 		$patientdetail =  $Pquery->row();

			 	if($value->status=='active'){
					$value->status='Active';
				}else if ($value->status=='inactive') {
					$value->status='Inactive';
				}else{
					$value->status='Resolved';
				}	
					

				$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $patientdetail->prefix.' '.$patientdetail->fname.' '.$patientdetail->lname);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $patientdetail->date_of_birth);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $value->problem_id);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $value->icd_version_id);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $value->icd10_code);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $value->status);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $value->diagnosis_datetime);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $value->changed_datetime);
				
				$row++;
			}

			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Problem_Report.xls"');
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
		}
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
		public function create()
		{
			$session_id = $this->session->userdata('user_id');
			$created_by_id = $this->session->userdata('created_by');
	        $isadmin = $this->session->userdata('isadmin');
	        if($isadmin == 1){
	        	$session_id = $created_by_id;
	        }
			$data['title'] = display('add_patient');
					$id = $this->input->post('id');
			#-------------------------------#
			$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
									$pass = array(); //remember to declare $pass as an array
									$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
									for ($i = 0; $i < 8; $i++) {
											$n = rand(0, $alphaLength);
											$pass[] = $alphabet[$n];
									}
									$newpass = implode($pass);
			//$datas['password'] = md5($newpass);
			$pass = $newpass;
			$this->form_validation->set_rules('fname', display('first_name'),'required|max_length[50]');
			$this->form_validation->set_rules('lname', "Last Name",'required|max_length[50]');
			$this->form_validation->set_rules('sex', 'Sex','required');

			if ($this->input->post('id') == null) {
				$this->form_validation->set_rules('email', "Email I'd",'required|max_length[100]|is_unique[patient.email]|valid_email|is_unique[user.email]');
				$this->form_validation->set_message('is_unique', " %s already exist!"); //Email I'd already exist!

			} else {
				$this->form_validation->set_rules('email',display('email'), "required|max_length[50]|valid_email|callback_email_check[$id]");
			}

			//$this->form_validation->set_rules('password', display('password'),'required|max_length[32]');
			//$this->form_validation->set_rules('phone', display('phone'),'max_length[20]');
			if($this->input->get_post('mobilecheck')!='1'){
				$this->form_validation->set_rules('mobile', display('mobile'),'required|max_length[20]');
			}
//echo $this->input->get_post('mobilecheck');
			//$this->form_validation->set_rules('blood_group', display('blood_group'),'max_length[10]');
			//$this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
			$this->form_validation->set_rules('date_of_birth', display('date_of_birth'),'required|max_length[10]');
			//$this->form_validation->set_rules('address', display('address'),'required|max_length[255]');
			//$this->form_validation->set_rules('status', display('status'),'required');
			#-------------------------------#
			//picture upload
			$picture = $this->fileupload->do_upload(
				'assets/images/patient/',
				'picture'
			);
			// if picture is uploaded then resize the picture
			if ($picture !== false && $picture != null) {
				$this->fileupload->do_resize(
					$picture,
					200,
					150
				);
			}
			//if picture is not uploaded
		//	if ($picture === false) {
				//$this->session->set_flashdata('exception', display('invalid_picture'));
			//}

			//insurance
		//	$insurance = $this->fileupload->do_upload(
			//	'assets/images/patient/',
			//	'insurance_file'
			//);
			// if picture is uploaded then resize the picture
		//	if ($insurance !== false && $insurance != null) {
			//	$this->fileupload->do_resize(
			//		$insurance,
			//		200,
			//		150
			//	);
		//	}
			//if picture is not uploaded
		//	if ($insurance === false) {
		//		$this->session->set_flashdata('exception', 'Invalid insurance file');
	//		}

			#-------------------------------#
     $ethnicity_race ='';
  //   if($this->input->get_post('ethnicity_race')=='choose'){
			// $arr_s = $this->input->get_post('ethnicity_race_option');
			// $ethnicity_race = implode(",",$arr_s);
		 //}else{
			 $ethnicity_race = $this->input->get_post('ethnicity_race');
		// }

			$pid = "P".$this->randStrGen(2,7);
			if ($this->input->post('id') == null) { //create a patient
				$data['patient'] = (object)$postData = [
					'id'   		   => $this->input->post('id'),
					'mobilecheck'   		   => ($this->input->post('mobilecheck')!='')?$this->input->post('mobilecheck'):'0',
					'patient_id'   => $pid,
					'prefix'    => $this->input->post('prefix'),
					'fname' 	   => $this->input->post('fname'),
					'mname' 	   => $this->input->post('mname'),
					'lname' 	   => $this->input->post('lname'),
					'password' 	   => md5($newpass),
					//'phone'   	   => $this->input->post('phone'),
					'suffix'       => $this->input->post('suffix'),
					//'blood_group'  => $this->input->post('blood_group'),
					'secondlastname' 		   => $this->input->post('secondlastname'),
					'previousfname' 		   => $this->input->post('previousfname'),
					'date_of_birth' => date('Y-m-d', strtotime(($this->input->post('date_of_birth') != null)? $this->input->post('date_of_birth'): date('Y-m-d'))),
					'previousmname' 	   => $this->input->post('previousmname'),
					'previouslname' 	   => $this->input->post('previouslname'),
					'sex' 	   => $this->input->post('sex'),
'dod' 	   => date('Y-m-d', strtotime(($this->input->post('dod') != null)? $this->input->post('dod'): "0000-00-00")),
'ssn' 	   => $this->input->post('ssn'),
//'gestitation' 	   => $this->input->post('gestitation'),
'mobile_prefix' 	   => $this->input->post('mobile_prefix'),
'mobile' 	   => ($this->input->post('mobile')!='')?$this->input->post('mobile'):'',
'email' 	   => $this->input->post('email'),
'phone' 	   => $this->input->post('phone'),
'workphone' 	   => $this->input->post('workphone'),
'ext' 	   => $this->input->post('ext'),
'address1' 	   => $this->input->post('address1'),
'country' 	   => $this->input->post('country'),
'city' 	   => $this->input->post('city'),
'state' 	   => $this->input->post('state'),
'zip' 	   => $this->input->post('zip'),
'methodofcommunication' 	   => $this->input->post('methodofcommunication'),
'emailreminders' 	   => $this->input->post('emailreminders'),
'voicereminders' 	   => $this->input->post('voicereminders'),
'smsreminders' 	   => $this->input->post('smsreminders'),
'relationship_to_guarantor' 	   => $this->input->post('relationship_to_guarantor'),
'guarantor_fname' 	   => $this->input->post('guarantor_fname'),
'guarantor_mname' 	   => $this->input->post('guarantor_mname'),
'guarantor_lname' 	   => $this->input->post('guarantor_lname'),
'guarantor_address1' 	   => $this->input->post('guarantor_address1'),
'guarantor_country' 	   => $this->input->post('guarantor_country'),
'guarantor_city' 	   => $this->input->post('guarantor_city '),
'guarantor_state' 	   => $this->input->post('guarantor_state'),
'guarantor_zip' 	   => $this->input->post('guarantor_zip'),
'guarantor_dob' 	   => date('Y-m-d', strtotime(($this->input->post('guarantor_dob') != null)? $this->input->post('guarantor_dob'): date('Y-m-d'))),
'guarantor_sex' 	   => $this->input->post('guarantor_sex'),
'guarantor_ssn' 	   => $this->input->post('guarantor_ssn'),
'guarantor_primary_phone' 	   => $this->input->post('guarantor_primary_phone'),
'guarantor_primary_ext' 	   => $this->input->post('guarantor_primary_ext'),
'guarantor_secondary_phone' 	   => $this->input->post('guarantor_secondary_phone'),
'guarantor_secondary_ext' 	   => $this->input->post('guarantor_secondary_ext'),
'primary_fname' 	   => $this->input->post('primary_fname'),
'primary_mname' 	   => $this->input->post('primary_mname'),
'primary_lname' 	   => $this->input->post('primary_lname'),
'relation_to_patient' 	   => $this->input->post('relation_to_patient'),
'primary_phone' 	   => $this->input->post('primary_phone'),
'primary_phone_type' 	   => $this->input->post('primary_phone_type'),
'primary_address_1' 	   => $this->input->post('primary_address_1'),
'primary_city' 	   => $this->input->post('primary_city'),
'primary_state' 	   => $this->input->post('primary_state'),
'primary_country' 	   => $this->input->post('primary_country'),
'primary_zip' 	   => $this->input->post('primary_zip'),
'patient_mother_name' 	   => $this->input->post('patient_mother_name'),

'immunization_registery_status' 	   => $this->input->post('immunization_registery_status'),

'immunization_effective_date' 	   => date('Y-m-d', strtotime(($this->input->post('immunization_effective_date') != null)? $this->input->post('immunization_effective_date'): date('Y-m-d'))),
'data_privacy' 	   => $this->input->post('data_privacy'),
'reminder_call' 	   => $this->input->post('reminder_call'),








					'create_date'  => date('Y-m-d'),
					'created_by'   => $this->session->userdata('user_id'),
					'status'       => '1',
					'hospital_id'   => $session_id,
				//	'preferred_language'       => $this->input->post('preferred_language'),
					'ethnicity_race'       => $ethnicity_race,
					'picture'       => $picture,
					'my_practice' => ($this->input->post('my_practice')!='')?$this->input->post('my_practice'):'No'

				//	'insurance'       => $this->input->post('insurance'),
				//	'insurance_file'       => (!empty($insurance)?$insurance:$this->input->post('old_insurance')),
					//
				];
			} else { // update patient
				$data['patient'] = (object)$postData = [
					'id'   		   => $this->input->post('id'),
					//'patient_id'   => "P".$this->randStrGen(2,7),
					'mobilecheck'   		   => ($this->input->post('mobilecheck')!='')?$this->input->post('mobilecheck'):'0',
					'prefix'    => $this->input->post('prefix'),
					'fname' 	   => $this->input->post('fname'),
					'mname' 	   => $this->input->post('mname'),
					'lname' 	   => $this->input->post('lname'),
					//'password' 	   => md5($newpass),
					//'phone'   	   => $this->input->post('phone'),
					'suffix'       => $this->input->post('suffix'),
					//'blood_group'  => $this->input->post('blood_group'),
					'secondlastname' 		   => $this->input->post('secondlastname'),
					'previousfname' 		   => $this->input->post('previousfname'),
					'date_of_birth' => date('Y-m-d', strtotime(($this->input->post('date_of_birth') != null)? $this->input->post('date_of_birth'): date('Y-m-d'))),
					'previousmname' 	   => $this->input->post('previousmname'),
					'previouslname' 	   => $this->input->post('previouslname'),
					'sex' 	   => $this->input->post('sex'),
'dod' 	   => date('Y-m-d', strtotime(($this->input->post('dod') != null)? $this->input->post('dod'): "0000-00-00")),
'ssn' 	   => $this->input->post('ssn'),
//'gestitation' 	   => $this->input->post('gestitation'),
'mobile_prefix' 	   => $this->input->post('mobile_prefix'),
'mobile' 	   => ($this->input->post('mobile')!='')?$this->input->post('mobile'):'',
'email' 	   => $this->input->post('email'),
'phone' 	   => $this->input->post('phone'),
'workphone' 	   => $this->input->post('workphone'),
'ext' 	   => $this->input->post('ext'),
'address1' 	   => $this->input->post('address1'),
'country' 	   => $this->input->post('country'),
'city' 	   => $this->input->post('city'),
'state' 	   => $this->input->post('state'),
'zip' 	   => $this->input->post('zip'),
'methodofcommunication' 	   => $this->input->post('methodofcommunication'),
'emailreminders' 	   => $this->input->post('emailreminders'),
'voicereminders' 	   => $this->input->post('voicereminders'),
'smsreminders' 	   => $this->input->post('smsreminders'),
'relationship_to_guarantor' 	   => $this->input->post('relationship_to_guarantor'),
'guarantor_fname' 	   => $this->input->post('guarantor_fname'),
'guarantor_mname' 	   => $this->input->post('guarantor_mname'),
'guarantor_lname' 	   => $this->input->post('guarantor_lname'),
'guarantor_address1' 	   => $this->input->post('guarantor_address1'),
'guarantor_country' 	   => $this->input->post('guarantor_country'),
'guarantor_city' 	   => $this->input->post('guarantor_city '),
'guarantor_state' 	   => $this->input->post('guarantor_state'),
'guarantor_zip' 	   => $this->input->post('guarantor_zip'),
'guarantor_dob' 	   => date('Y-m-d', strtotime(($this->input->post('guarantor_dob') != null)? $this->input->post('guarantor_dob'): date('Y-m-d'))),
'guarantor_sex' 	   => $this->input->post('guarantor_sex'),
'guarantor_ssn' 	   => $this->input->post('guarantor_ssn'),
'guarantor_primary_phone' 	   => $this->input->post('guarantor_primary_phone'),
'guarantor_primary_ext' 	   => $this->input->post('guarantor_primary_ext'),
'guarantor_secondary_phone' 	   => $this->input->post('guarantor_secondary_phone'),
'guarantor_secondary_ext' 	   => $this->input->post('guarantor_secondary_ext'),
'primary_fname' 	   => $this->input->post('primary_fname'),
'primary_mname' 	   => $this->input->post('primary_mname'),
'primary_lname' 	   => $this->input->post('primary_lname'),
//'relation_to_patient' 	   => $this->input->post('relation_to_patient'),
'primary_phone' 	   => $this->input->post('primary_phone'),
'primary_phone_type' 	   => $this->input->post('primary_phone_type'),
'primary_address_1' 	   => $this->input->post('primary_address_1'),
'primary_country' 	   => $this->input->post('primary_country'),
'primary_city' 	   => $this->input->post('primary_city'),
'primary_state' 	   => $this->input->post('primary_state'),
'primary_zip' 	   => $this->input->post('primary_zip'),

'patient_mother_name' 	   => $this->input->post('patient_mother_name'),

'immunization_registery_status' 	   => $this->input->post('immunization_registery_status'),

'immunization_effective_date' 	   => date('Y-m-d', strtotime(($this->input->post('immunization_effective_date') != null)? $this->input->post('immunization_effective_date'): date('Y-m-d'))),
'data_privacy' 	   => $this->input->post('data_privacy'),
'reminder_call' 	   => $this->input->post('reminder_call'),
					'create_date'  => date('Y-m-d'),
					'created_by'   => $this->session->userdata('user_id'),
					'status'       => '1',
					'hospital_id'   => $session_id,
					//'preferred_language'       => $this->input->post('preferred_language'),
					'ethnicity_race'       => $ethnicity_race,
					'picture'       => (!empty($picture)?$picture:$this->input->post('old_picture')),
					'my_practice' => ($this->input->post('my_practice')!='')?$this->input->post('my_practice'):'No'
				//	'insurance'       => $this->input->post('insurance'),
					//'insurance_file'       => (!empty($insurance)?$insurance:$this->input->post('old_insurance')),
					//
				];
			}
			#-------------------------------#
			if ($this->form_validation->run() === true) {

				#if empty $id then insert data
				if (empty($postData['id'])) {
					if ($this->patient_model->create($postData)) {
						if($this->session->userdata('isadmin')==0 ){
							$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('user_id'))->get()->row();
						}else if($this->session->userdata('isadmin')==1){
							$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('hospital_id'))->get()->row();
						}
						$patient_id = $this->db->insert_id();
						$insurance_u_id = $this->input->get_post('insurance_u_id');
						$this->db->where("insurance_u_id",$insurance_u_id);
						$arr['patient_id'] = $pid;
						$this->db->update("insurance",$arr);
						#set success message
						$to =$this->input->post('email',true);
						$subject="Welcome to ".$hospital_name->hospitalname;
					$htmlMessage='<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>New register in  '. $hospital_name->hospitalname .'</title>
								<style type="text/css">
									body{
										 background-color: #e8e4e4;
										 font-family: Arial, Helvetica, sans-serif;
										font-size: 14px;
										line-height: 1.12857143;
										color: #847f7f;
									}
									p{
										margin-left: 15px;
									}
								</style>
							</head>
						<body>
						<table class="table" style="width: 100%;">
							<tr>
								<td width="20%"></td>
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.base_url()."assets/images/logo.png".' style="margin:10px 0px;"  /></td>
								<td width="20%"></td>
							</tr>
						 <tr>
								<td width="20%"></td>
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
									<p style="color: #150aec;font-weight: 700;font-size: 16px;">New register in '. $hospital_name->hospitalname .'</p>
									<p><b>Hello '.$this->input->post('email',true).',</b></p>
									<p>Your account has been registered on '. $hospital_name->hospitalname .'</p>
									<p>You can sign in to your account by using your this  email  '.$this->input->post('email',true).' and password:  '. $pass.'</p>
								 </td>
								<td width="20%"></td>
							</tr>
								<tr>
									<td width="20%"></td>
									<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
										<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%;">
											<tbody>
												<tr>
													<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Fullname</td>
													<td style="border:1px solid #ccc5c5;padding: 8px;">'.$this->input->post('firstname',true).' '.$this->input->post('lastname',true).'</td>
												</tr>
												<tr>
													<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Email</td>
													<td style="border:1px solid #ccc5c5;padding: 8px;">'.$this->input->post('email',true).'</td>
												</tr>
												<tr>
													<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Phone No.</td>
													<td style="border:1px solid #ccc5c5;padding: 8px;">'.$this->input->post('mobile',true).'</td>
												</tr>
												<tr>
													<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Birth Date</td>
													<td style="border:1px solid #ccc5c5;padding: 8px;">'.date('Y-m-d', strtotime($this->input->post('date_of_birth',true))).'</td>
												</tr>
												<tr>
													<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Role</td>
													<td style="border:1px solid #ccc5c5;padding: 8px;">Patient</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Join Date </td>
												<td style="border:1px solid #ccc5c5;padding: 8px;">'.date('Y-m-d').'</td>
											</tr>
										</tbody>
									</table>
									<p style="color: #6f5f5f;">* Thanks! For new register in '. $hospital_name->hospitalname .' application.</p>
								</td>
							<td width="20%"></td>
						</tr>
						<tr>
						 <td width="20%"></td>
							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
								<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$hospital_name->email.'</span></p>
							<td width="20%"></td>
						</tr>
						</table>
						</body>
						</html>';
						//$htmlMessage="Your Username is your register email address"."<br>";
						// $htmlMessage.="Your Password is:  ".$pass;
						$this->sendEmailAttachment($to,$subject,$htmlMessage);
						$this->session->set_flashdata('message', display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception', display('please_try_again'));
					}
		redirect('patient');
					//redirect('patient/profile/' . $patient_id);
				} else {
					if ($this->patient_model->update($postData)) {
						#set success message
						$this->session->set_flashdata('message', display('update_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception', display('please_try_again'));
						redirect('patient/edit/'.$postData['id']);
					}

					redirect('patient');
				}

			} else {
				$data['content'] = $this->load->view('patient_form',$data,true);
				$this->load->view('layout/main_wrapper',$data);
			}
		}
	public function create_old()
	{
		$data['title'] = display('add_patient');
        $id = $this->input->post('id');
		#-------------------------------#
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                $pass = array(); //remember to declare $pass as an array
                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                for ($i = 0; $i < 8; $i++) {
                    $n = rand(0, $alphaLength);
                    $pass[] = $alphabet[$n];
                }
                $newpass = implode($pass);
    //$datas['password'] = md5($newpass);
		$pass = $newpass;
		$this->form_validation->set_rules('firstname', display('first_name'),'required|max_length[50]');
		$this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');
		if ($this->input->post('id') == null) {
			$this->form_validation->set_rules('email', display('email'),'required|max_length[100]|is_unique[patient.email]|valid_email|is_unique[user.email]');
		} else {
			$this->form_validation->set_rules('email',display('email'), "required|max_length[50]|valid_email|callback_email_check[$id]");
		}

		//$this->form_validation->set_rules('password', display('password'),'required|max_length[32]');
		$this->form_validation->set_rules('phone', display('phone'),'max_length[20]');
		$this->form_validation->set_rules('mobile', display('mobile'),'required|max_length[20]');
		$this->form_validation->set_rules('blood_group', display('blood_group'),'max_length[10]');
		$this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
		$this->form_validation->set_rules('date_of_birth', display('date_of_birth'),'required|max_length[10]');
		$this->form_validation->set_rules('address', display('address'),'required|max_length[255]');
		//$this->form_validation->set_rules('status', display('status'),'required');
		#-------------------------------#
		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets/images/patient/',
			'picture'
		);
		// if picture is uploaded then resize the picture
		if ($picture !== false && $picture != null) {
			$this->fileupload->do_resize(
				$picture,
				200,
				150
			);
		}
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', display('invalid_picture'));
		}

		//insurance
		$insurance = $this->fileupload->do_upload(
			'assets/images/patient/',
			'insurance_file'
		);
		// if picture is uploaded then resize the picture
		if ($insurance !== false && $insurance != null) {
			$this->fileupload->do_resize(
				$insurance,
				200,
				150
			);
		}
		//if picture is not uploaded
		if ($insurance === false) {
			$this->session->set_flashdata('exception', 'Invalid insurance file');
		}

		#-------------------------------#
		if ($this->input->post('id') == null) { //create a patient
			$data['patient'] = (object)$postData = [
				'id'   		   => $this->input->post('id'),
				'patient_id'   => "P".$this->randStrGen(2,7),
				'firstname'    => $this->input->post('firstname'),
				'lastname' 	   => $this->input->post('lastname'),
				'email' 	   => $this->input->post('email'),
				'password' 	   => md5($newpass),
				//'phone'   	   => $this->input->post('phone'),
				'mobile'       => $this->input->post('mobile'),
				//'blood_group'  => $this->input->post('blood_group'),
				'sex' 		   => $this->input->post('sex'),
				'date_of_birth' => date('Y-m-d', strtotime(($this->input->post('date_of_birth') != null)? $this->input->post('date_of_birth'): date('Y-m-d'))),
				'address' 	   => $this->input->post('address'),
				'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				'affliate'     => null,
				'create_date'  => date('Y-m-d'),
				'created_by'   => $this->session->userdata('user_id'),
				'status'       => '1',
				'insurance'       => $this->input->post('insurance'),
				'insurance_file'       => (!empty($insurance)?$insurance:$this->input->post('old_insurance')),
				//
			];
		} else { // update patient
			$data['patient'] = (object)$postData = [
				'id'   		   => $this->input->post('id'),
				'firstname'    => $this->input->post('firstname'),
				'lastname' 	   => $this->input->post('lastname'),
				'email' 	   => $this->input->post('email'),
				'password' 	   => md5($this->input->post('password')),
				'phone'   	   => $this->input->post('phone'),
				'mobile'       => $this->input->post('mobile'),
				'blood_group'  => $this->input->post('blood_group'),
				'sex' 		   => $this->input->post('sex'),
				'date_of_birth' => date('Y-m-d', strtotime($this->input->post('date_of_birth'))),
				'address' 	   => $this->input->post('address'),
				'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				'affliate'     => null,
				'created_by'   => $this->session->userdata('user_id'),
				'status'       => $this->input->post('status'),
				'insurance'       => $this->input->post('insurance'),
				'insurance_file'       => (!empty($insurance)?$insurance:$this->input->post('old_insurance')),
			];
		}
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($postData['id'])) {
				if ($this->patient_model->create($postData)) {
					$patient_id = $this->db->insert_id();
					#set success message
					$to =$this->input->post('email',true);
					$subject="Welcome to ".$hospital_name->hospitalname;
				$htmlMessage='<html>
					  <head>
					    <meta name="viewport" content="width=device-width" />
					    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					    <title>New register in '. $hospital_name->hospitalname .'</title>
					    <style type="text/css">
					      body{
					         background-color: #e8e4e4;
					         font-family: Arial, Helvetica, sans-serif;
					        font-size: 14px;
					        line-height: 1.12857143;
					        color: #847f7f;
					      }
					      p{
					        margin-left: 15px;
					      }
					    </style>
					  </head>
					<body>
					<table class="table" style="width: 100%;">
					  <tr>
					    <td width="20%"></td>
					    <td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.base_url()."assets/images/logo.png".' style="margin:10px 0px;"  /></td>
					    <td width="20%"></td>
					  </tr>
					 <tr>
					    <td width="20%"></td>
					    <td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
					      <p style="color: #150aec;font-weight: 700;font-size: 16px;">New register in '. $hospital_name->hospitalname .'</p>
					      <p><b>Hello '.$this->input->post('email',true).',</b></p>
					      <p>Your account has been registered on '. $hospital_name->hospitalname .'</p>
					      <p>You can sign in to your account by using your this  email  '.$this->input->post('email',true).' and password:  '. $pass.',</p>
					     </td>
					    <td width="20%"></td>
					  </tr>
					    <tr>
					      <td width="20%"></td>
					      <td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
					        <table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%;">
					          <tbody>
					            <tr>
					              <td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Fullname</td>
					              <td style="border:1px solid #ccc5c5;padding: 8px;">'.$this->input->post('firstname',true).' '.$this->input->post('lastname',true).'</td>
					            </tr>
					            <tr>
					              <td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Email</td>
					              <td style="border:1px solid #ccc5c5;padding: 8px;">'.$this->input->post('email',true).'</td>
					            </tr>
					            <tr>
					              <td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Phone No.</td>
					              <td style="border:1px solid #ccc5c5;padding: 8px;">'.$this->input->post('mobile',true).'</td>
					            </tr>
					            <tr>
					              <td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Birth Date</td>
					              <td style="border:1px solid #ccc5c5;padding: 8px;">'.date('Y-m-d', strtotime($this->input->post('date_of_birth',true))).'</td>
					            </tr>
					            <tr>
					              <td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Role</td>
					              <td style="border:1px solid #ccc5c5;padding: 8px;">Patient</td>
										</tr>
										<tr>
											<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Join Date </td>
											<td style="border:1px solid #ccc5c5;padding: 8px;">'.date('Y-m-d').'</td>
										</tr>
									</tbody>
								</table>
								<p style="color: #6f5f5f;">* Thanks! For new register in '. $hospital_name->hospitalname .' application.</p>
							</td>
						<td width="20%"></td>
					</tr>
					<tr>
					 <td width="20%"></td>
						<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
							<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$hospital_name->email.'</span></p>
						<td width="20%"></td>
					</tr>
					</table>
					</body>
					</html>';
					//$htmlMessage="Your Username is your register email address"."<br>";
					// $htmlMessage.="Your Password is:  ".$pass;
					$this->sendEmailAttachment($to,$subject,$htmlMessage);
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
			redirect('patient');
				//redirect('patient/profile/' . $patient_id);
			} else {
				if ($this->patient_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
					redirect('patient/edit/'.$postData['id']);
				}

				redirect('patient');
			}

		} else {
			$data['content'] = $this->load->view('patient_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		}
	}

	function problem_report_pdf()
	{
		//echo count($this->uri->segment_array());exit;
		$problem 	= "";
		if((count($this->uri->segment_array()) == 5 && $this->uri->segment(3) !="" ) || count($this->uri->segment_array()) == 3){
			$problem 	= ($this->uri->segment(3) !="") ? $this->uri->segment(3) : "";
			$from_date 	= ($this->uri->segment(4)!="") ? date("Y-m-d",strtotime($this->uri->segment(4))) : "";
			$to_date 	= ($this->uri->segment(5)!="") ? date("Y-m-d",strtotime($this->uri->segment(5))) : "";		
		}else if(count($this->uri->segment_array()) == 4 || $this->uri->segment(3) !=""){
			
			$from_date 	= ($this->uri->segment(3)!="") ? date("Y-m-d",strtotime($this->uri->segment(3))) : "";
			$to_date 	= ($this->uri->segment(4)!="") ? date("Y-m-d",strtotime($this->uri->segment(4))) : "";		
		}
		

		$pro = str_replace("%20", " ", $problem);
		$this->load->library('dompdf_gen');
		$customPaper = array(0,0,1024,1000);
		$this->dompdf->set_paper($customPaper);
		//	$this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
		$pdfname = "Problem_report" . date('YmdHis') . '.pdf';
		$html = '<style>
								table {
									display: table; border-collapse: collapse;
								}
								.pricedetail tr td
								{
										font-family:Verdana;


								}
								.pricedetail tr th
								{
										font-family:Verdana;

								}
						</style>
            			<h3 style="text-align:center;">Problem Report</h3>
						<table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
								 <tr>
									<th>Patient Name</th>										
									<th>DOB</th>
									<th>Problem</th>
									<th>ICD Version</th>
									<th>ICD10 Code</th>
									<th>Status</th>
									<th>DATETIME DIAGNOSIS</th>
									<th>DATETIME CHANNGED</th>																			
								</tr>';
							
			$sql = "";
	   		if($problem!="" && $from_date!="" && $to_date!="" ){
				$sql = "SELECT * FROM healthreport_problem		 
			  	WHERE  healthreport_problem.problem_id = '".$pro."' and DATE(healthreport_problem.diagnosis_datetime) >= '$from_date' and DATE(healthreport_problem.diagnosis_datetime)  <= '$to_date' ORDER BY date DESC";
			}else if($problem!=""){
				$sql ="SELECT * FROM healthreport_problem WHERE  healthreport_problem.problem_id = '".$pro."'  ORDER BY date DESC";
			}else if($from_date!="" && $to_date!=""){
				$sql ="SELECT * FROM healthreport_problem		 
			  	WHERE   DATE(healthreport_problem.diagnosis_datetime) >= '$from_date' and DATE(healthreport_problem.diagnosis_datetime)  <= '$to_date' OR (DATE(healthreport_problem.diagnosis_datetime) = '$from_date') ORDER BY date DESC";
			}		
	   		
			$query = $this->db->query($sql);
			$problem = $query->result_array();
			//print_r($problem);exit;
			
			foreach ($problem as $problem_list) { 
				$sqlQ = " select patient.id,fname,lname,prefix,date_of_birth from patient where id=".$problem_list['patient_id'];
		 		$Pquery = $this->db->query($sqlQ);
	 			$patientdetail =  $Pquery->row_array();

			 	if($problem_list['status'] =='active'){
					$problem_list['status'] ='Active';
				}else if ($problem_list['status'] =='inactive') {
					$problem_list['status'] ='Inactive';
				}else{
					$problem_list['status'] ='Resolved';
				}	
				
					$html.='<tr style="border-bottom: 1px solid #ddd;" class="hovertr">';

					 $html.='<td><div class="kpull-left"><div class="word-break">';
					 $html.='<span class="text-primary">'.$patientdetail['prefix']."  ".$patientdetail['fname']."  ".$patientdetail['lname'].'</span>';
					 $html.='</div></div></td>';

					 $html.='<td><span class="text-primary">'.date("d-m-Y",strtotime($patientdetail['date_of_birth'])).'</span></td>';
					 $html.='<td><div class="kpull-left"><div class="word-break">';
					 $html.='<span class="text-primary">'.$problem_list['problem_id'].'</span>';
					 $html.='</div></div></td>';


					 $html.='<td>'.$problem_list['icd_version_id'].'</td>';
					 $html.='<td>'.$problem_list['icd10_code'].'</td>';
					 $html.='<td>'.$problem_list['status'].'</td>';
					 $html.='<td>'.$problem_list['diagnosis_datetime'].'</td>';
					 $html.='<td>'.$problem_list['changed_datetime'].'</td>
					</tr>';
								
				}

						$html .='</table>';
					 /*echo $html;
					 	exit;*/
		$load = $this->dompdf->load_html($html);
		//print_r($load);exit;
		$this->dompdf->render();
		$output = $this->dompdf->output();
		//print_r($output);exit;
		file_put_contents('pdf/' . $pdfname . '', $output);
		redirect('pdf/' . $pdfname . '', $output);
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
			$this->load->view('layout/main_wrapper',$data);
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
		$this->load->view('layout/main_wrapper',$data);
	}
	public function add_insurance($patient_id = null)
	{
		$data['title'] =  display('patient_information');
		#-------------------------------#
		//$data['profile'] = $this->patient_model->read_by_id($patient_id);
		//$data['documents'] = $this->document_model->read_by_patient($patient_id);
	//	$this->db->select('*')
				//		 ->from('pa_vital_sign')
			///			 ->join('patient', 'patient.patient_id = pa_vital_sign.patient_id')
					//	 ->where('patient.id',$patient_id)->order_by('pa_vital_sign.created_time','desc')->order_by('pa_vital_sign.created_date','desc');
	//	$result = $this->db->get();
	//	echo $this->db->last_query();
	//	$data['vital'] = $result->result();
		$data['content'] = $this->load->view('insurance_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function edit($patient_id = null)
	{
		$data['title'] = display('patient_edit');
		#-------------------------------#
		$data['patient'] = $this->patient_model->read_by_id($patient_id);
		$data['content'] = $this->load->view('patient_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}


	public function delete($patient_id = null)
	{
		if ($this->patient_model->delete($patient_id)) {
			#set success message
			$this->session->set_flashdata('message','Patient profile delete successfully');
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('patient');
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
		$this->load->view('layout/main_wrapper',$data);
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
            $this->load->view('layout/main_wrapper',$data);
        }
    }
	 public function delete_profile_pic($id){
	      $this->db->set('picture','');
	      $this->db->where('id',$id);
	      $delete = $this->db->update('patient');
	    if ($delete) {
	      $this->session->set_flashdata('message',display('update_successfully'));
	      $this->session->unset_userdata('picture','');
	    } else {
	       $this->session->set_flashdata('exception', display('please_try_again'));
	    }
	      redirect('patient/');
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