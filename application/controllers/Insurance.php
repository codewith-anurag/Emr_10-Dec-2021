<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
      'insurance_model',
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
		$data['title'] = display('patient_list');
		$data['patients'] = $this->patient_model->read();
		$data['insurance'] = $this->insurance_model->read();
		$data['content'] = $this->load->view('insurance',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
	public function sendEmailAttachment($to, $subject, $htmlMessage) {
			$this->load->library('email');
			$this->load->helper('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('sahil@gtimecs.org', 'GT Health System');
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($htmlMessage);
		//	if (!empty($pdf_name)) {
		//		$this->email->attach($pdf_name);
		//	}
			@$this->email->send();
		}
		function print($id='')
		{
		//	echo $id;
			//exit;
			$this->load->library('dompdf_gen');
			$customPaper = array(0,0,1024,1000);
	//$this->dompdf->set_paper($customPaper);
	$this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');

			$pdfname = "Insurance" . date('YmdHis') . '.pdf';
	$html = '<style>
	               page {
									 width:100%;
									 max-width:100%;
								 }
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
	<center><h3><b> Insurance </b></h3></center>
	            <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
	                 <tr>
	                    <th>Payer</th>

	                    <th>Type</th>
											<th>Insurance Id	</th>
											<th>Effective From</th>
											<th>Effective To	</th>
											<th>Copay</th>
											<th>Eligibility	</th>
											<th>Status</th>

	                </tr>';
									$insurance = $this->db->select("*")->from("insurance")->where("insurance_u_id",$id)->get()->result();
								//$doctors =	$this->doctor_model->read();
	foreach ($insurance as $doctor) {

	                $html .='<tr>
	                    <td>'.$doctor->payer_name.'</td>
											<td>'.$doctor->plan_name_and_type.'</td>
											<td>'.$doctor->insurance_id.'</td>


											<td>'.date('d/m/Y',strtotime($doctor->effective_from)).'</td>
											<td>'.date('d/m/Y',strtotime($doctor->effective_to)).'</td>
											<td>'.$doctor->copay_type.'</td>
											<td>'.$doctor->eligiblility.'</td>
											<td>'.$doctor->status.'</td>

	                </tr>';
							}

	            $html .='</table>';
	$this->dompdf->load_html($html);
			$this->dompdf->render();
			$output = $this->dompdf->output();
			//print_r($output);
			file_put_contents('pdf/' . $pdfname . '', $output);
			redirect('pdf/' . $pdfname . '', $output);
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

	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:AJ1');
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Insurance Report');

	$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($top_header_style);




	$objPHPExcel->getActiveSheet()->setCellValue('A2', 'Patient Id');
	$objPHPExcel->getActiveSheet()->setCellValue('B2', 'Status');
	$objPHPExcel->getActiveSheet()->setCellValue('C2', 'Payer Name');
	$objPHPExcel->getActiveSheet()->setCellValue('D2', 'Plan Name And Type');
	$objPHPExcel->getActiveSheet()->setCellValue('E2', 'Order Of Benefits');
	$objPHPExcel->getActiveSheet()->setCellValue('F2', 'Workers Compensation');
	$objPHPExcel->getActiveSheet()->setCellValue('G2', 'Insurance Id');
	$objPHPExcel->getActiveSheet()->setCellValue('H2', 'Group Id');
	$objPHPExcel->getActiveSheet()->setCellValue('I2', 'Effective From');
	$objPHPExcel->getActiveSheet()->setCellValue('J2', 'Effective To');
	$objPHPExcel->getActiveSheet()->setCellValue('K2', 'Relation To Insured');
	$objPHPExcel->getActiveSheet()->setCellValue('L2', 'Copay Type');
	$objPHPExcel->getActiveSheet()->setCellValue('M2', 'Copay Amount');
	$objPHPExcel->getActiveSheet()->setCellValue('N2', 'Claim Number');
	$objPHPExcel->getActiveSheet()->setCellValue('O2', 'Notes');
	$objPHPExcel->getActiveSheet()->setCellValue('P2', 'Employer Name');
	$objPHPExcel->getActiveSheet()->setCellValue('Q2', 'Employer Address1');
	$objPHPExcel->getActiveSheet()->setCellValue('R2', 'Employer Address2');
	$objPHPExcel->getActiveSheet()->setCellValue('S2', 'City');
	$objPHPExcel->getActiveSheet()->setCellValue('T2', 'State');
	$objPHPExcel->getActiveSheet()->setCellValue('U2', 'Zip');
	$objPHPExcel->getActiveSheet()->setCellValue('V2', 'Subscribers First Name');
	$objPHPExcel->getActiveSheet()->setCellValue('W2', 'Subscribers Middle Name');
	$objPHPExcel->getActiveSheet()->setCellValue('X2', 'Subscribers Last Name');
	$objPHPExcel->getActiveSheet()->setCellValue('Y2', 'Subscribers DOB');
	$objPHPExcel->getActiveSheet()->setCellValue('Z2', 'Subscribers Sex');
	$objPHPExcel->getActiveSheet()->setCellValue('AA2', 'Subscribers SSN');
	$objPHPExcel->getActiveSheet()->setCellValue('AB2', 'Subscribers Address1');
	$objPHPExcel->getActiveSheet()->setCellValue('AC2', 'Subscribers Address2');
	$objPHPExcel->getActiveSheet()->setCellValue('AD2', 'Subscribers City');
	$objPHPExcel->getActiveSheet()->setCellValue('AE2', 'Subscribers State');
	$objPHPExcel->getActiveSheet()->setCellValue('AF2', 'Subscribers Primary Number');
	$objPHPExcel->getActiveSheet()->setCellValue('AG2', 'Subscribers Primary Ext');
	$objPHPExcel->getActiveSheet()->setCellValue('AH2', 'Subscribers Secondary Number');
	$objPHPExcel->getActiveSheet()->setCellValue('AI2', 'Subscribers Secondary Ext');
	$objPHPExcel->getActiveSheet()->setCellValue('AJ2', 'Eligiblility');





	$objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($style_header);
	$objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($style_header);
	$objPHPExcel->getActiveSheet()->getStyle('C2')->applyFromArray($style_header);
	$objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($style_header);
	$objPHPExcel->getActiveSheet()->getStyle('E2')->applyFromArray($style_header);
	$objPHPExcel->getActiveSheet()->getStyle('F2')->applyFromArray($style_header);
	$objPHPExcel->getActiveSheet()->getStyle('G2')->applyFromArray($style_header);
	$objPHPExcel->getActiveSheet()->getStyle('H2')->applyFromArray($style_header);
	$objPHPExcel->getActiveSheet()->getStyle('I2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('J2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('K2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('L2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('M2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('N2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('O2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('P2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('Q2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('R2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('S2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('T2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('U2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('V2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('W2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('X2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('Y2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('Z2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('AA2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('AB2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('AC2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('AD2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('AE2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('AF2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('AG2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('AH2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('AI2')->applyFromArray($style_header);
$objPHPExcel->getActiveSheet()->getStyle('AJ2')->applyFromArray($style_header);



		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);

	$row = 3;
	//$custDtaData  = $this->panel_internal_model->panel_sale_list_all(0);
	//$doctors =	$this->doctor_model->read();
	//$patients =	$this->patient_model->read();
	$id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
        if($isadmin == 1){
        	$id = $created_by_id;
        }
	$insurance = $this->db->select("*")->from("insurance")->where("hospital_id",$id)->where("status",'Active')->get()->result();
	foreach ($insurance as $value)
	{



	$value->effective_from = date('d/m/Y',strtotime($value->effective_from));
	$value->effective_to = date('d/m/Y',strtotime($value->effective_to));
//	$value->create_date = date('d/m/Y',strtotime($value->create_date));
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $value->patient_id);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $value->status);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $value->payer_name);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $value->plan_name_and_type);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $value->order_of_benefits);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $value->workers_compensation);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $value->insurance_id);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $value->group_id);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $value->effective_from);
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $value->effective_to);
				$objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $value->relation_to_insured);
				$objPHPExcel->getActiveSheet()->setCellValue('L'.$row, $value->copay_type);
				$objPHPExcel->getActiveSheet()->setCellValue('M'.$row, $value->copay_amount);
				$objPHPExcel->getActiveSheet()->setCellValue('N'.$row, $value->claim_number);
				$objPHPExcel->getActiveSheet()->setCellValue('O'.$row, $value->notes);
				$objPHPExcel->getActiveSheet()->setCellValue('P'.$row, $value->employer_name);
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.$row, $value->employer_address1);
				$objPHPExcel->getActiveSheet()->setCellValue('R'.$row, $value->employer_address2);
				$objPHPExcel->getActiveSheet()->setCellValue('S'.$row, $value->city);
				$objPHPExcel->getActiveSheet()->setCellValue('T'.$row, $value->state);
				$objPHPExcel->getActiveSheet()->setCellValue('U'.$row, $value->zip);
				$objPHPExcel->getActiveSheet()->setCellValue('V'.$row, $value->subscribers_fname);
				$objPHPExcel->getActiveSheet()->setCellValue('W'.$row, $value->subscribers_mname);
				$objPHPExcel->getActiveSheet()->setCellValue('X'.$row, $value->subscribers_lname);
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.$row, $value->subscribers_dob);
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.$row, $value->subscribers_sex);
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.$row, $value->subscribers_ssn);
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.$row, $value->subscribers_address1);
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.$row, $value->subscribers_address2);
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.$row, $value->subscribers_city);
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.$row, $value->subscribers_state);
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.$row, $value->subscribers_zip);
				$objPHPExcel->getActiveSheet()->setCellValue('AG'.$row, $value->subscribers_primary_ext);
				$objPHPExcel->getActiveSheet()->setCellValue('AH'.$row, $value->subscribers_secondary_number);
				$objPHPExcel->getActiveSheet()->setCellValue('AI'.$row, $value->subscribers_secondary_ext);
				$objPHPExcel->getActiveSheet()->setCellValue('AJ'.$row, $value->eligiblility);
				$row++;
	}
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="insurance_report.xls"');
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
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
'hospital_id'   => $this->session->userdata('user_id'),


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
			//	$this->load->view('layout/main_wrapper',$data);
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
'hospital_id'   => $this->session->userdata('user_id'),


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
'hospital_id'   => $this->session->userdata('user_id'),


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
redirect('insurance');
				//redirect('patient/profile/' . $patient_id);
			} else {
				if ($this->insurance_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
					redirect('insurance/edit/'.$postData['id']);
				}

				redirect('insurance');
			}

		} else {
			$data['content'] = $this->load->view('insurance_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
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
	// 	$this->load->view('layout/main_wrapper',$data);
	// }

	public function edit($patient_id = null)
	{
		$data['title'] = "Insurance edit";//display('patient_edit');
		#-------------------------------#
	//	$data['patient'] = $this->patient_model->read_by_id($patient_id);
		$data['insurance'] = $this->insurance_model->read_by_id($patient_id);
			//$data['insurance'] = $this->insurance_model->read();
		$data['content'] = $this->load->view('insurance_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
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
		redirect('insurance');
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
