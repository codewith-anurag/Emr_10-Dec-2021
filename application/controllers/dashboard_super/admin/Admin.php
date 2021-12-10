<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'dashboard_super/admin/admin_model',
			'dashboard_super/admin/document_model',
			'doctor_model',
		));

		if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 11)
			redirect('login');

	}

	public function index()
	{
		$data['title'] = 'Admin List';//display('admin_list');
		$isadmin = $this->session->userdata('isadmin');
					$user_id = $this->session->userdata('user_id');
					//if($isadmin=='1'){
						$admin =	$this->db->select("*")
								->from("user")
								->where("user_role",'1')
								->order_by('user_id','desc')
								->get()
								->result();
				//	}else{
					//	$admins =	$this->db->select("*")
							//	->from("admin")
							//	->where("created_by",$user_id)
							//	->order_by('id','desc')
							//	->get()
							//	->result();
					//}
		$data['admin'] = $admin; //$this->admin_model->read();
		$data['content'] = $this->load->view('dashboard_super/admin/admin',$data,true);
		$this->load->view('dashboard_super/main_wrapper',$data);
	}
	public function sendEmailAttachment($to, $subject, $htmlMessage) {
			$this->load->library('email');
			$this->load->helper('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('sahil@gtimecs.org', SYS_NAME);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($htmlMessage);
		//	if (!empty($pdf_name)) {
			//	$this->email->attach($pdf_name);
			//}
			@$this->email->send();
		}
		function admindetail()
		{

			$did = $this->input->get('d_id');
			$result = $this->db->select("*")->from("user")->where("user_id",$did)->get()->row();
		//	echo $this->db->last_query();
		//print_r($result);
			$department = $this->db->select("*")->from("department")->where("dprt_id",$result->department_id)->get()->row();
			$role = $this->db->select("*")->from("role")->where("r_id",$result->role_id)->get()->row();
			$result->contactinfo = $result->address;
			if($department){
					$result->department = $department->name;
			}else{
				$result->department = '';
			}

      if($role){
				$result->role = $role->name;
			}else{
				$result->role = '';
			}


			$result->fullname = $result->firstname.' '.$result->lastname;
			$result->date_of_birth = date('d/m/Y',strtotime($result->date_of_birth));


			$result->mobile = $result->mobile_prefix.' '.$result->mobile;
			$result->create_date = date('d/m/Y',strtotime($result->create_date));

			$result->status = ($result->status=='1')?'Active':'Inactive';
			$result->phone = ($result->phone!='')?$result->phone:'';
	$result->admin_access = ($result->is_admin=='1')?'Yes':'No';
			echo json_encode($result);
		}
		function admin_search()
		 {
		$p_id = trim($this->input->get_post('p_id'));

        $isadmin = $this->session->userdata('isadmin');
			$user_id = $this->session->userdata('user_id');


			 if($p_id!=''){
				 //if($isadmin=='1'){
					 $sql ="SELECT * FROM admin WHERE admin_id like '%".($p_id)."%' or fname like '%".($p_id)."%' or email like '%".($p_id)."%' or date_of_birth like '%".($p_id)."%' ORDER BY id DESC";
				// }else{
					// $sql ="SELECT * FROM admin WHERE (created_by = $user_id) and (admin_id like '%".($p_id)."%' or fname like '%".($p_id)."%' or email like '%".($p_id)."%' or date_of_birth like '%".($p_id)."%') ORDER BY id DESC";
				// }

				 $query = $this->db->query($sql);
					$searchdetail =  $query->result();
					$msg ='';
					//if(count($searchdetail)>0){
						foreach ($searchdetail as $value) {
							if($value->sex==''){
								 $value->sex='Male';
							 }
							$value->date_of_birth=date('d/m/Y',strtotime($value->date_of_birth));
							$msg.='<tr style="border-bottom: 1px solid #ddd;" class="hovertr"><td>';
							$msg.='<img  src="'.base_url().'assets/images/admin/2017-01-16/p5.png"></td>';
							$msg.='<td><div class="kpull-left"><div class="word-break">';
							$msg.='<span data-id="'.$value->admin_id.'" class="fa fa-circle" data-toggle="tooltip" title="admin online"> </span>';
							$msg.='<span class="text-primary">'.$value->fname.'  <br> <a href="#" class="color-black">'.$value->admin_id.'</a> </span>';
							$msg.='</div></div></td>';
							$msg.='<td><span class="text-primary">'.$value->lname.'</span></td>';
							$msg.='<td>'.$value->date_of_birth.'<br>'.$value->sex.'</td>';
							$msg.='<td>'.$value->address1.' '.$value->address2.' '.$value->city.' '.$value->state.' '.$value->zip.'<br><span class="light-grey">M</span>'.$value->mobile.'<span class="light-grey ml-15">H</span>'.$value->phone.'</td>';
							$msg.= '<td>'.date('d/m/Y',strtotime($value->create_date)).'</td>';
							$msg.= '<td><span style="color:green" class="btn btn-default">'.(($value->status==1)?'Active':'Inactive').'</span></td>';
					//	 $msg.='<td class="pt-15"><div class="btn-group" style="float: right;display: flex;"><a href="'.base_url("admin/edit/$value->id").'" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>';
						// $msg.='<a href="'.base_url("admin/delete/$value->id").'" class="btn btn-xs btn-danger" onclick="return confirm('.display('are_you_sure').')"><i class="fa fa-trash"></i></a></div>
																						// </td>
								$msg.='</tr>';

							 //else{
							//   $value->sex='F';
							// }


		//   $value->date_of_birth=date('d/m/Y',strtotime($value->date_of_birth));
		//$value->age = $diff->y;
							//$data[] = $value;
						}


					 echo json_encode($msg);
				 }else{
					 $ds = "";
					 echo json_encode($ds);

				 }

			 // }else{
			 //
			 //
			 //   $lead = $this->admin_model->read();
			 //   if(count($lead)>0){
			 //     foreach ($lead as $value) {
			 //       if($value->sex=='Male'){
			 //         $value->sex='M';
			 //       }else{
			 //         $value->sex='F';
			 //       }
			 //       $value->date_of_birth=date('Y-m-d',strtotime($value->date_of_birth));
			 //      // $value->picture = ($value->picture!='')?$value->picture:"assets/images/admin/2017-01-16/p5.png";
			 //       // code...
			 //       $data[] = $value;
			 //     }
			 //   }else{
			 //     $data = array();
			 //   }
			 //   echo json_encode($data);
			 // }
				 //$sql  = "SELECT * ";





		 }
		 function admin_report()
	 	{
	 		$this->load->library('dompdf_gen');
	 		$pdfname = "admin" . date('YmdHis') . '.pdf';
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
	             <h5>admin Report</h5>
	 						<table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
	 								 <tr>
	 										<th>Name</th>

	 										<th>DOB</th>
	 										<th>Contact Info</th>
	 										<th>Email</th>
	 										<th>Join Date</th>
	 										<th>Status</th>
	 								</tr>';
	 							//$doctors =	$this->doctor_model->read();

$isadmin = $this->session->userdata('isadmin');
			$user_id = $this->session->userdata('user_id');
			if($isadmin=='1'){
				$admins =	$this->db->select("*")
						->from("admin")
						->order_by('id','desc')
						->get()
						->result();
			}else{
				$admins =	$this->db->select("*")
						->from("admin")
						->where("created_by",$user_id)
						->order_by('id','desc')
						->get()
						->result();
			}

	 						//$admins =	$this->admin_model->read();
	 foreach ($admins as $admin) {
	 //$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
	 								$html .='<tr>
	 										<td>'.$admin->fname.' '.$admin->lname.'</td>

	 										<td>'.date('d/m/Y',strtotime($admin->date_of_birth)).'<br>'.$admin->sex.'</td>
	 										<td align="left">
	 												<p>'.$admin->address1.' '.$admin->address2.' '.$admin->city.' '.$admin->state.' '.$admin->zip.'</p>
	 												<p>M '.$admin->mobile.'</p>
	 												<p>H '.$admin->phone.'</p>

	 										</td>
	 										<td>'.$admin->email.'</td>';

	 										$html .='<td>'.date('d/m/Y',strtotime($admin->create_date)).'</td>';

	 									if($admin->status==1){
	 										$status = 'Active';
	 									}else{
	 										$status = 'Inactive';
	 									}
	 										$html .='<td>'.$status.'</td>
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
	'color' => array('rgb' => 'ffff03'),
	),
	'font' => array(
	'color' => array('rgb' => '000000'),
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
	'color' => array('rgb' => 'ffff03'),
	),
	'font' => array(
	'color' => array('rgb' => '000000'),
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
	'color' => array('rgb' => '000000'),
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
	'color' => array('rgb' => 'ffff03'),
	),
	'font' => array(
	'color' => array('rgb' => '000000'),
	'size' => 12,
	'name' => 'Arial',
	'bold' => true,
	),
	);

	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:J1');
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'admin Report');

	$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($top_header_style);
	$objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($top_header_style);

	$objPHPExcel->getActiveSheet()->setCellValue('A2', 'ID');
	$objPHPExcel->getActiveSheet()->setCellValue('B2', 'Name');
	$objPHPExcel->getActiveSheet()->setCellValue('C2', 'DOB');
	$objPHPExcel->getActiveSheet()->setCellValue('D2', 'SEX');
	$objPHPExcel->getActiveSheet()->setCellValue('E2', 'address');
	$objPHPExcel->getActiveSheet()->setCellValue('F2', 'Email');
	$objPHPExcel->getActiveSheet()->setCellValue('G2', 'Mobile');
	$objPHPExcel->getActiveSheet()->setCellValue('H2', 'Phone');
	$objPHPExcel->getActiveSheet()->setCellValue('I2', 'Join Date');
	$objPHPExcel->getActiveSheet()->setCellValue('J2', 'Status');




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
	$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);

	$row = 3;
	//$custDtaData  = $this->panel_internal_model->panel_sale_list_all(0);
	//$doctors =	$this->doctor_model->read();
	$isadmin = $this->session->userdata('isadmin');
				$user_id = $this->session->userdata('user_id');
				if($isadmin=='1'){
					$admins =	$this->db->select("*")
							->from("admin")
							->order_by('id','desc')
							->get()
							->result();
				}else{
					$admins =	$this->db->select("*")
							->from("admin")
							->where("created_by",$user_id)
							->order_by('id','desc')
							->get()
							->result();
				}
//	$admins =	$this->admin_model->read();
	foreach ($admins as $value)
	{

	if($value->status==1){
		$value->status='Active';
	}else{
		$value->status='Inactive';
	}
	$value->date_of_birth = date('d/m/Y',strtotime($value->date_of_birth));
	$value->create_date = date('d/m/Y',strtotime($value->create_date));
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $value->admin_id);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $value->fname.' '.$value->lname);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $value->date_of_birth);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $value->sex);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $value->address1.' '.$value->address2.' '.$value->city.' '.$value->state.' '.$value->zip);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $value->email);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $value->mobile);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $value->phone);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $value->create_date);
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $value->status);
				$row++;
	}


	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="admin_report.xls"');
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');










		}
		public function changestatus()
		{
			$id = $this->input->get_post('id');
			$value = $this->input->get_post('value');

			$gethospital_detail = $this->db->query("select * from user where user_role ='1' and user_id='$id'")->row();

		 $arr['status'] = $value;
		 $status_value = ($value == 1) ? "Active" : "Inactive";
		 $this->db->where('user_id',$id);
		 $this->db->update('user',$arr);

		 $audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"hospital","Chang Status Hospital",
                $gethospital_detail->hospitalname." Hospital  is ".$status_value." by Super Admin at ".date("Y-m-d h:i:s"),($this->session->userdata("hospital_id")!="") ? $this->session->userdata("hospital_id") : $this->session->userdata("user_role"),$id,$gethospital_detail->hospitalname,1);
		 echo 'success';
		 exit;
		}
    public function email_check($email, $id)
    {
        $emailExists = $this->db->select('email')
            ->where('email',$email)
            ->where_not_in('user_id',$id)
            ->get('user')
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
			$data['title'] = 'Add admin';//display('add_admin');
					$id = $this->input->post('user_id');

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
			$this->form_validation->set_rules('lastname', "Last Name",'required|max_length[50]');
			$this->form_validation->set_rules('sex', 'Sex','required');
			$this->form_validation->set_rules('feature[]', 'Feature','required');
			$this->form_validation->set_rules('hospitalName', 'Hospital Name','required');

			if ($this->input->post('user_id') == null) {

				$this->form_validation->set_rules('email', display('email'),'required|max_length[100]|is_unique[user.email]|valid_email|is_unique[user.email]');
			}
			//else {
				//echo $this->input->post('user_id');
			//	exit;
			//	$this->form_validation->set_rules('email',display('email'), "required|max_length[50]|valid_email|callback_email_check[$id]");
		//	}

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
			// $picture = $this->fileupload->do_upload(
			// 	'assets/images/admin/',
			// 	'hospital_logo'
			// );
			// // if picture is uploaded then resize the picture
			// if ($picture !== false && $picture != null) {
			// 	$this->fileupload->do_resize(
			// 		$picture,
			// 		260,
			// 		60
			// 	);
			// }
			// Upload Crop Image
			$picture = '';
			if($_POST['croppicture'] != ''){
				define('UPLOAD_DIR', 'assets/images/admin/');
				$image_parts = explode(";base64,", $_POST['croppicture']);
				$image_type_aux = explode("image/", $image_parts[0]);
				$image_type = $image_type_aux[1];
				$image_base64 = base64_decode($image_parts[1]);
				$picture = UPLOAD_DIR . uniqid() . '.png';
				file_put_contents($picture, $image_base64);
			}
			// Upload Crop Image
			// var_dump($picture); die;
			//if picture is not uploaded
			if ($picture === false) {
				$this->session->set_flashdata('exception', display('invalid_picture'));
			}

			//insurance
		//	$insurance = $this->fileupload->do_upload(
			//	'assets/images/admin/',
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
			// var_dump($this->input->post('feature')); die;
		 $ethnicity_race ='';
		 if($this->input->get_post('ethnicity_race')=='choose'){
			 $arr_s = $this->input->get_post('ethnicity_race_option');
			 $ethnicity_race = implode(",",$arr_s);
		 }else{
			 $ethnicity_race = $this->input->get_post('ethnicity_race');
		 }
		 if($this->input->post('feature')!=''){
			 $feature = implode(",",$this->input->post('feature'));
		 }else{
			 $feature='';
		 }

     $secret = $this->input->post('secret');
		 $client_id = $this->input->post('client_id');

			$pid = "P".$this->randStrGen(2,7);
			if ($this->input->post('user_id') == null) { //create a admin
				$data['admin'] = (object)$postData = [
					'user_id'   		   => $this->input->post('user_id'),

					'firstname' 	   => $this->input->post('firstname'),
					'lastname' 	   => $this->input->post('lastname'),
					'hospitalname' 	   => $this->input->post('hospitalName'),
					'email' 	   => $this->input->post('email'),
					'password' 	   => md5($newpass),
					//'phone'   	   => $this->input->post('phone'),
					'phone'       => $this->input->post('phone'),
					//'blood_group'  => $this->input->post('blood_group'),
					'mobile' 		   => $this->input->post('mobile'),

					'date_of_birth' => date('Y-m-d', strtotime(($this->input->post('date_of_birth') != null)? $this->input->post('date_of_birth'): date('Y-m-d'))),
					'address' 	   => $this->input->post('address'),
					'city'         => $this->input->post('city'),
		            'state'        => $this->input->post('state'),
		            'country'      => $this->input->post('country'),
		            'zipcode'      => $this->input->post('zipcode'),
					'sex' 	   => $this->input->post('sex'),
					'user_role' 	   => '1',
					'picture' 		=> $picture,
					'create_date'  => date('Y-m-d'),
					'created_by'   => $this->session->userdata('user_id'),
					'status'       => '1',
					'features' => $feature,
					'client_id'=>($client_id!='')?$client_id:'',
					'secret'=>($secret!='')?$secret:''

				//	'insurance'       => $this->input->post('insurance'),
				//	'insurance_file'       => (!empty($insurance)?$insurance:$this->input->post('old_insurance')),
					//
				];
			} else { // update admin
				$data['admin'] = (object)$postData = [
					'user_id'   		   => $this->input->post('user_id'),

					'firstname' 	   => $this->input->post('firstname'),
					'lastname' 	   => $this->input->post('lastname'),
					'hospitalname' 	   => $this->input->post('hospitalName'),
					'email' 	   => $this->input->post('email'),
					//'password' 	   => md5($newpass),
					//'phone'   	   => $this->input->post('phone'),
					'phone'       => $this->input->post('phone'),
					//'blood_group'  => $this->input->post('blood_group'),
					'mobile' 		   => $this->input->post('mobile'),
					'short_biography' 		   => $this->input->post('short_biography'),
					'date_of_birth' => date('Y-m-d', strtotime(($this->input->post('date_of_birth') != null)? $this->input->post('date_of_birth'): date('Y-m-d'))),
					'address' 	   => $this->input->post('address'),
					'city'         => $this->input->post('city'),
		            'state'        => $this->input->post('state'),
		            'country'      => $this->input->post('country'),
		            'zipcode'      => $this->input->post('zipcode'),
					'sex' 	   => $this->input->post('sex'),
					'user_role' 	   => '1',
					'create_date'  => date('Y-m-d'),
					'created_by'   => $this->session->userdata('user_id'),
					'status'       => '1',
					'features' => $feature,
					'client_id'=>($client_id!='')?$client_id:'',
					'secret'=>($secret!='')?$secret:''
				//	'insurance'       => $this->input->post('insurance'),
					//'insurance_file'       => (!empty($insurance)?$insurance:$this->input->post('old_insurance')),
					//
				];
				if($picture){
					$postData['picture'] = $picture;
				}else{
					$picture = '';
				}
			}
			#-------------------------------#
			if ($this->form_validation->run() === true) {

				#if empty $id then insert data
				if (empty($postData['user_id'])) {
					if ($this->admin_model->create($postData)) {
						$admin_id = $this->db->insert_id();

						$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"hospital","Add Admin  - Hospital",
                $this->input->post('hospitalName')." Hospital  is Add by Super Admin at ".date("Y-m-d h:i:s"),($this->session->userdata("hospital_id")!="") ? $this->session->userdata("hospital_id") : $this->session->userdata("user_role"),$admin_id,$this->input->post('firstname')."  ".$this->input->post('lastname'),1);

						$arr['admin_id'] = $this->input->post('user_id');

						#set success message
						$to =$this->input->post('email',true);
						$subject="Welcome to ".SYS_NAME;
					$htmlMessage='<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>New register in '.SYS_NAME.'</title>
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
									<p style="color: #150aec;font-weight: 700;font-size: 16px;">New register in '. SYS_NAME .'</p>
									<p><b>Hello '.$this->input->post('email',true).',</b></p>
									<p>Your account has been registered on '. SYS_NAME .'</p>
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
													<td style="border:1px solid #ccc5c5;padding: 8px;">admin</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Join Date </td>
												<td style="border:1px solid #ccc5c5;padding: 8px;">'.date('Y-m-d').'</td>
											</tr>
										</tbody>
									</table>
									<p style="color: #6f5f5f;">* Thanks! For new register in '. SYS_NAME .' application.</p>
								</td>
							<td width="20%"></td>
						</tr>
						<tr>
						 <td width="20%"></td>
							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
								<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.SYS_EMAIL.'</span></p>
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
					redirect('dashboard_super/admin/admin/');
					//redirect('admin/profile/' . $admin_id);
				} else {
					if ($this->admin_model->update($postData)) {
						#set success message
						$this->db->where('hospital_id',$postData['user_id']);
						//$this->db->where('user_role',$postData['user_id']);
						$f['features'] = $feature;
						$this->db->update('user',$f);
						$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"hospital","Edit Admin  - Hospital",
                $this->input->post('hospitalName')." Hospital  is Edit by Super Admin at ".date("Y-m-d h:i:s"),($this->session->userdata("hospital_id")!="") ? $this->session->userdata("hospital_id") : $this->session->userdata("user_role"),$postData['user_id'],$this->input->post('firstname')."  ".$this->input->post('lastname'),1);

						$this->session->set_flashdata('message', display('update_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception', display('please_try_again'));
						redirect('dashboard_super/admin/admin/edit/'.$postData['id']);
					}

					redirect('dashboard_super/admin/admin/');
				}

			} else {
				$data['content'] = $this->load->view('dashboard_super/admin/admin_form',$data,true);
				$this->load->view('dashboard_super/main_wrapper',$data);
			}
		}
	  public function delete_profile_pic($id){
	      $this->db->set('picture','');
	      $this->db->where('user_id',$id);
	      $delete = $this->db->update('user');
	    if ($delete) {
	      $this->session->set_flashdata('message',display('update_successfully'));
	      $this->session->unset_userdata('picture','');
	    } else {
	       $this->session->set_flashdata('exception', display('please_try_again'));
	    }
	      redirect('dashboard_super/admin/admin/');
	  }
	public function createvital()
	{
		$data['title'] = display('add_vital_sign');
				$id = $this->input->post('vital_id');
		#-------------------------------#

		$this->form_validation->set_rules('admin_id', display('admin_id'),'required|max_length[50]');
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
		if ($this->input->post('id') == null) { //create a admin
			$data['admin'] = (object)$postData = [
				'vital_id'   		   => $this->input->post('vital_id'),
				'admin_id'   => $this->input->post('admin_id'),
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
		} else { // update admin
			$data['admin'] = (object)$postData = [
				'vital_id'   		   => $this->input->post('vital_id'),
				'admin_id'   => $this->input->post('admin_id'),
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
				if ($this->admin_model->createvital($postData)) {
					$vital_id = $this->db->insert_id();
					#set success message

					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
			$result =	$this->db->select('*')
								 ->from('admin')
								 ->where('admin_id',$this->input->post('admin_id'))->get()->row();

				redirect('dashboard_super/admin/admin/profile/' . $result->id);
				//	redirect('dashboard_super/admin/admin');
			} else {
				if ($this->admin_model->updatevital($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('dashboard_super/admin/editvital/'.$postData['vital_id']);
		//		redirect('admin');
			}

		} else {
			$data['content'] = $this->load->view('dashboard_super/admin/vital_form',$data,true);
			$this->load->view('dashboard_super/main_wrapper',$data);
		}
	}
	public function profile($admin_id = null)
	{
		$data['title'] =  display('admin_information');
		#-------------------------------#
		$data['profile'] = $this->admin_model->read_by_id($admin_id);
		$data['documents'] = $this->document_model->read_by_admin($admin_id);
		$this->db->select('*')
		         ->from('pa_vital_sign')
		         ->join('admin', 'admin.admin_id = pa_vital_sign.admin_id')
						 ->where('admin.id',$admin_id)->order_by('pa_vital_sign.created_time','desc')->order_by('pa_vital_sign.created_date','desc');
		$result = $this->db->get();
	//	echo $this->db->last_query();
		$data['vital'] = $result->result();


		$data['content'] = $this->load->view('dashboard_super/admin/admin_profile',$data,true);
		$this->load->view('dashboard_super/main_wrapper',$data);
	}


	public function edit($admin_id = null)
	{
		$data['title'] = display('admin_edit');
		#-------------------------------#
		$data['admin'] = $this->admin_model->read_by_id($admin_id);
		$data['content'] = $this->load->view('dashboard_super/admin/admin_form',$data,true);
		$this->load->view('dashboard_super/main_wrapper',$data);
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
		$data['documents'] = $this->document_model->read($this->session->userdata('user_id'));
		$data['content'] = $this->load->view('dashboard_super/admin/document',$data,true);
		$this->load->view('dashboard_super/main_wrapper',$data);
	}

	public function delete($user_id = null)
	{
		$gethospital_detail = $this->db->query("select * from user where user_role ='1' and user_id='$user_id'")->row();
		$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"hospital","Delete Hospital",
                $gethospital_detail->hospitalname." Hospital  is Delete by Super Admin at ".date("Y-m-d h:i:s"),($this->session->userdata("hospital_id")!="") ? $this->session->userdata("hospital_id") : $this->session->userdata("user_role"),$user_id,$gethospital_detail->hospitalname,1);

		if ($this->admin_model->delete($user_id)) {
			$this->delete_admin_mag($user_id);
			#set success message
			$this->session->set_flashdata('message','Admin delete successfully');   //display('delete_successfully')
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('dashboard_super/admin/admin');
	}

	public function delete_admin_mag($id)
	    {
	        $this->db->where('from_user_id',$id);
			$this->db->delete('contact_super_admin');

			$this->db->where('to_user_id',$id);
			$this->db->delete('contact_super_admin');
	    }


    public function document_form()
    {
        $data['title'] = display('add_document');
        /*----------VALIDATION RULES----------*/
        $this->form_validation->set_rules('admin_id', display('admin_id') ,'required|max_length[30]');
        $this->form_validation->set_rules('description', display('description'),'trim');
        $this->form_validation->set_rules('hidden_attach_file', display('attach_file'),'required|max_length[255]');
        /*-------------STORE DATA------------*/
        $urole = $this->session->userdata('user_role');
        $data['document'] = (object)$postData = array(
            'admin_id'  => $this->input->post('admin_id'),
            'doctor_id'   => $this->session->userdata('user_id'),
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
            redirect('dashboard_super/admin/admin/document_form');
        } else {
            $data['doctor_list'] = $this->doctor_model->doctor_list();
            $data['content'] = $this->load->view('dashboard_super/admin/document_form',$data,true);
            $this->load->view('dashboard_super/main_wrapper',$data);
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
