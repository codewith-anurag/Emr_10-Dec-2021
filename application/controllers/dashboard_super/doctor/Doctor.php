<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'dashboard_super/doctor/doctor_model',
			'dashboard_super/doctor/department_model'
		));

		if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 11)
		redirect('login');
	}



	public function index($id = null)
	{
		$data['title']   = display('doctor_list');
		$data['doctors'] = $this->doctor_model->read($id);
		$data['admin_id'] = $id;
		$data['content'] = $this->load->view('dashboard_super/doctor/doctor',$data,true);
		$this->load->view('dashboard_super/main_wrapper',$data);
	}
	public function department_delete()
	{

		$did = $this->input->get('d_id');
		echo 'test';
		exit;
	//	$result = $this->db->select("*")->from("user")->where("user_id",$did)->get()->row();
		//$department = $this->db->select("*")->from("department")->where("dprt_id",$result->department_id)->get()->row();
		$this->db->where('dprt_id', $did);
$this->db->delete("department");
		echo "success";
		exit;
	}

	public function role_delete()
	{

		$did = $this->input->get('d_id');
	//	$result = $this->db->select("*")->from("user")->where("user_id",$did)->get()->row();
		//$department = $this->db->select("*")->from("department")->where("dprt_id",$result->department_id)->get()->row();
		$this->db->where('r_id', $did);
	$this->db->delete("role");
		echo "success";
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
			//	$this->email->attach($pdf_name);
			//}
			@$this->email->send();
		}
public function changestatus($id=null)
{
	$id = $this->input->get_post('id');
	$value = $this->input->get_post('value');

 $arr['status'] = $value;
 $this->db->where('user_id',$id);
 $this->db->update('user',$arr);
 echo 'success';
 exit;
}
	public function create()
	{
		// echo 'test';
		// exit;
		$data['admin_id'] =  $admin_id =$this->uri->segment(5);
		$data['title'] = display('add_doctor');
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
		$this->form_validation->set_rules('firstname', display('first_name') ,'required|max_length[50]');
		$this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');
		if ($this->input->post('user_id',true) == null) {
			$this->form_validation->set_rules('email', display('email'),'required|max_length[50]|valid_email|is_unique[user.email]|is_unique[patient.email]');
		//	$this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');
		}
		$this->form_validation->set_rules('phone', display('phone') ,'max_length[20]');
		$this->form_validation->set_rules('mobile', display('mobile'),'required|max_length[20]');
		$this->form_validation->set_rules('blood_group', display('blood_group'),'max_length[10]');
		$this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
		$this->form_validation->set_rules('date_of_birth', display('date_of_birth'),'max_length[10]');
	  $this->form_validation->set_rules('address',display('address'),'required|max_length[255]');
		//$this->form_validation->set_rules('status',display('status'),'required');
		#-------------------------------#
		//picture upload
		// $picture = $this->fileupload->do_upload(
		// 	'assets/images/doctor/',
		// 	'picture'
		// );
		// // if picture is uploaded then resize the picture
		// if ($picture !== false && $picture != null) {
		// 	$this->fileupload->do_resize(
		// 		$picture,
		// 		293,
		// 		350
		// 	);
		// }
	  // Upload Crop Image
        $picture = '';
	      if($_POST['croppicture'] != ''){
	        define('UPLOAD_DIR', 'assets/images/doctor/');
	        $image_parts = explode(";base64,", $_POST['croppicture']);
	        $image_type_aux = explode("image/", $image_parts[0]);
	        $image_type = $image_type_aux[1];
	        $image_base64 = base64_decode($image_parts[1]);
	        $picture = UPLOAD_DIR . uniqid() . '.png';
	        file_put_contents($picture, $image_base64);
	      }
      // Upload Crop Image
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', display('invalid_picture'));
		}
    #other department add
		$department_id ='';
		if($this->input->post('department',true) != null){
			$arrrs['name'] = $this->input->post('department',true);
			$arrrs['status'] = '1';
			$this->db->insert('department',$arrrs);
			$department_id = $this->db->insert_id();
		}else{
			$department_id=$this->input->post('department_id',true);
		}
		#other role add
		$role_id ='';
		if($this->input->post('role',true) != null){
			$arrrs['name'] = $this->input->post('role',true);
			$arrrs['status'] = '1';
			$this->db->insert('role',$arrrs);
			$role_id = $this->db->insert_id();
		}else{
			$role_id=$this->input->post('role_id',true);
		}
		#-------------------------------#
		//when create a user
	$is_admin =	$this->input->post('is_admin',true);
		if ($this->input->post('user_id',true) == null) {
			$data['doctor'] = (object)$postData = [
				'user_id'      => $this->input->post('user_id',true),
				'firstname'    => $this->input->post('firstname',true),
				'lastname' 	   => $this->input->post('lastname',true),
				'email' 	   => $this->input->post('email',true),
				'password' 	   => md5($newpass),
				'user_role'    => 2,
				'designation'  => $this->input->post('designation',true),
				'department_id' =>$department_id ,
				'address' 	   => $this->input->post('address',true),
				'city' 	   => $this->input->post('city',true),
				'state' 	   => $this->input->post('state',true),
				'country' 	   => $this->input->post('country',true),
				'zipcode' 	   => $this->input->post('zipcode',true),
				'phone'   	   => $this->input->post('phone',true),
				'mobile'       => $this->input->post('mobile',true),
				'mobile_prefix'       => $this->input->post('mobile_prefix',true),
				'short_biography' => $this->input->post('short_biography',true),
				'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				'specialist'   => $this->input->post('specialist',true),
        'date_of_birth' => date('Y-m-d', strtotime(($this->input->post('date_of_birth',true) != null)? $this->input->post('date_of_birth',true): date('Y-m-d'))),
				'sex' 		   => $this->input->post('sex',true),
				'blood_group'  => $this->input->post('blood_group',true),
				'degree'  	   => $this->input->post('degree',true),
				// 'created_by'   => $this->session->userdata('user_id'),
				'create_date'  => date('Y-m-d'),
				'status'       => '1',
				'role_id' =>$role_id,
				'is_admin' =>($is_admin!='')?$is_admin:0,

				//$this->input->post('status',true),
			];
		} else { //update a user
			$data['doctor'] = (object)$postData = [
				'user_id'      => $this->input->post('user_id',true),
				'firstname'    => $this->input->post('firstname',true),
				'lastname' 	   => $this->input->post('lastname',true),
				'designation'  => $this->input->post('designation',true),
				'department_id' => $department_id,//$this->input->post('department_id',true),
				'address' 	   => $this->input->post('address',true),
				'city' 	   => $this->input->post('city',true),
				'state' 	   => $this->input->post('state',true),
				'country' 	   => $this->input->post('country',true),
				'zipcode' 	   => $this->input->post('zipcode',true),
				'mobile_prefix'       => $this->input->post('mobile_prefix',true),
				'phone'   	   => $this->input->post('phone',true),
				'mobile'       => $this->input->post('mobile',true),
				'short_biography' => $this->input->post('short_biography',true),
				'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				'specialist'   => $this->input->post('specialist',true),
				'date_of_birth' => date('Y-m-d', strtotime($this->input->post('date_of_birth',true))),
				'sex' 		   => $this->input->post('sex',true),
				'blood_group'  => $this->input->post('blood_group',true),
				'degree'  	   => $this->input->post('degree',true),
				// 'created_by'   => $this->session->userdata('user_id'),
				'create_date'  => date('Y-m-d'),
				'status'       => $this->input->post('status',true),
				'role_id' =>$role_id,
				'is_admin' =>($is_admin!='')?$is_admin:0,
			];
		}

		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $user_id then insert data
			if (empty($postData['user_id'])) {
				if ($this->doctor_model->create($postData)) {
					#set success message
					$rold = $this->db->select("*")->from("role")->where("r_id",$role_id)->get()->row();


					$to =$this->input->post('email',true);
					$subject="Welcome to GT Health System";
$htmlMessage='<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>New register in GT Health System</title>
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
      <p style="color: #150aec;font-weight: 700;font-size: 16px;">New register in Visionary</p>
      <p><b>Hello '.$this->input->post('email',true).',</b></p>
      <p>Your account has been registered on Visionary</p>
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
              <td style="border:1px solid #ccc5c5;padding: 8px;">'.$rold->name.'</td>
					</tr>
					<tr>
						<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Join Date </td>
						<td style="border:1px solid #ccc5c5;padding: 8px;">'.date('Y-m-d').'</td>
					</tr>
				</tbody>
			</table>
			<p style="color: #6f5f5f;">* Thanks! For new register in visionary application.</p>
		</td>
	<td width="20%"></td>
</tr>
<tr>
 <td width="20%"></td>
	<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
		<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">sahilgtimecs@gmail.com</span></p>
	<td width="20%"></td>
</tr>
</table>
</body>
</html>';






					$this->sendEmailAttachment($to,$subject,$htmlMessage);
					$this->session->set_flashdata('message',display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
					redirect('dashboard_super/doctor/doctor/create'); //dashboard_super/doctor/doctor
				}

				//update profile picture
				if ($postData['user_id'] == $this->session->userdata('user_id')) {
					$this->session->set_userdata([
						'picture'   => $postData['picture'],
						'fullname'  => $postData['firstname'].' '.$postData['lastname']
					]);
				}

				//redirect('doctor/create');
				redirect('dashboard_super/doctor/doctor/'.$data['admin_id']);
			} else {
				if ($this->doctor_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
					redirect('dashboard_super/doctor/doctor/edit/'.$postData['user_id']);
				}

				//update profile picture
				if ($postData['user_id'] == $this->session->userdata('user_id')) {
					$this->session->set_userdata([
						'picture'   => $postData['picture'],
						'fullname'  => $postData['firstname'].' '.$postData['lastname']
					]);
				}

				//redirect('doctor/edit/'.$postData['user_id']);
				redirect('dashboard_super/doctor/doctor/'.$data['admin_id']);
			}

		} else {
			$data['department_list'] = $this->department_model->department_list();
			$data['role_list'] = $this->department_model->role_list();
			$data['content'] = $this->load->view('dashboard_super/doctor/doctor_form',$data,true);
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
	   $sessionCteate =  $this->session->userdata('user_id');
	      redirect('dashboard_super/admin/admin/');
	  }
	function doctordetail()
	{

		$did = $this->input->post('d_id');
		$result = $this->db->select("*")->from("user")->where("user_id",$did)->get()->row();
		$department = $this->db->select("*")->from("department")->where("dprt_id",$result->department_id)->get()->row();
		$role = $this->db->select("*")->from("role")->where("r_id",$result->role_id)->get()->row();
		$result->contactinfo = $result->address;
		$result->department = $department->name;
		$result->role = $role->name;
		$result->fullname = $result->firstname.' '.$result->lastname;
		$result->date_of_birth = date('d/m/Y',strtotime($result->date_of_birth));


		$result->mobile = $result->mobile_prefix.' '.$result->mobile;
		$result->create_date = date('d/m/Y',strtotime($result->create_date));

		$result->status = ($result->status=='1')?'Active':'Inactive';
		$result->phone = ($result->phone!='')?$result->phone:'';
		$result->admin_access = ($result->is_admin=='1')?'Yes':'No';
		echo json_encode($result);
	}
	function doctor_report($id=null)
	{
		$this->load->library('dompdf_gen');
			$customPaper = array(0,0,1024,1000);
		$this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
		$pdfname = "Doctor" . date('YmdHis') . '.pdf';
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
<center><h3><b>Medical Provider Report </b></h3></center>
            <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
                 <tr>
                    <th>Name</th>

                    <th>Date Of Birth</th>
										<th>Gender</th>
										<th>Address</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Phone</th>
										<th>Role</th>
										<th>Department</th>
										<th>Status</th>
                </tr>';
							$doctors =	$this->doctor_model->read($id);
foreach ($doctors as $doctor) {
$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
$department = $this->db->select("*")->from("department")->where("dprt_id",$doctor->department_id)->get()->row();
                $html .='<tr>
                    <td>'.$doctor->firstname.' '.$doctor->lastname.'</td>

										<td>'.date('d/m/Y',strtotime($doctor->date_of_birth)).'</td><td>'.$doctor->sex.'</td>
										<td>
                        '.$doctor->address.'</td>
												<td>'.$doctor->email.'</td>
                        <td>'.$doctor->mobile.'</td>
												<td>'.$doctor->phone.'</td>';
										if(isset($role)){
										$html .='<td>'.$role->name.'</td>';
									}else{
										$html .='<td></td>';
									}
									if(isset($department)){
									$html .='<td>'.$department->name.'</td>';
								}else{
									$html .='<td></td>';
								}
                  if($doctor->status==1){
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
	public function download_excel($id=null)
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

					$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:J1');
					$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Medical Provider Report');

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

					//$objPHPExcel->getActiveSheet()->setCellValue('A2', 'ID');
					$objPHPExcel->getActiveSheet()->setCellValue('A2', 'Name');
					$objPHPExcel->getActiveSheet()->setCellValue('B2', 'Date Of Birth');
					$objPHPExcel->getActiveSheet()->setCellValue('C2', 'Gender');
					$objPHPExcel->getActiveSheet()->setCellValue('D2', 'Address');
					$objPHPExcel->getActiveSheet()->setCellValue('E2', 'Email');
					$objPHPExcel->getActiveSheet()->setCellValue('F2', 'Mobile');
					$objPHPExcel->getActiveSheet()->setCellValue('G2', 'Phone');
					$objPHPExcel->getActiveSheet()->setCellValue('H2', 'Role');
					$objPHPExcel->getActiveSheet()->setCellValue('I2', 'Department');
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
$doctors =	$this->doctor_model->read($id);
foreach ($doctors as $value)
{
	$role = $this->db->select("*")->from("role")->where("r_id",$value->role_id)->get()->row();
	$department = $this->db->select("*")->from("department")->where("dprt_id",$value->department_id)->get()->row();
			$status = '';
			if(isset($role)){

					$status = $role->name;
			}
			else
			{
					$status = '';
			}
			$departments  = '';
			if(isset($department)){

					$departments = $department->name;
			}
			else
			{
					$departments = '';
			}
if($value->status==1){
	$value->status='Active';
}else{
	$value->status='Inactive';
}
$value->date_of_birth = date('d/m/Y',strtotime($value->date_of_birth));

			$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $value->firstname.' '.$value->lastname);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $value->date_of_birth);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $value->sex);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $value->address);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $value->email);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $value->mobile);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $value->phone);
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $status);
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $departments);
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $value->status);
			$row++;
}


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="doctor_report.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');










	}
function doctor_search()
{
	$p_id = $this->input->get_post('p_id');
	$doctor_id = $this->input->get_post('doctor_id');
	$searchdetail = $this->db->select("user.*,department.name")
					->from("user")
					->join('department','department.dprt_id = user.department_id','left')
					->where('user.user_role',2)
					// ->where('user.created_by',$doctor_id)
					// ->like('user.firstname',$p_id)
					// ->like('user.email',$p_id)
					// ->like('user.lastname',$p_id)
					// ->like('user.date_of_birth',$p_id)
					// ->or_like(array('user.lastname' => $p_id,'user.email'=>$p_id))
					// ->order_by('user.user_id','desc')
					// ->get()
					// ->result();
					->where('user.created_by', $doctor_id)
              		->where("(user.firstname LIKE '%".$p_id."%' OR user.email LIKE '%".$p_id."%' OR user.lastname LIKE '%".$p_id."%')", NULL, FALSE)
              		->order_by('user.user_id','desc')
              		->get()
              		->result();
					// echo $this->db->last_query(); die;
	$msg ='';
	if(!empty($searchdetail)){
			foreach ($searchdetail as $value) {
				if($value->sex==''){
					$value->sex='Male';
				}
				// if($value->picture ){

				// }
				$role = $this->db->select("*")->from("role")->where("r_id",$value->role_id)->get()->row();
			   // if(isset($role)){
			   //   echo $role->name;
			   // }
				$active = '';
				$inactive = '';
				if($value->status == 1){
					$active = 'Selected';
				}else{
					$inactive = 'Selected';
				}
				$imagePath = $value->picture ? base_url().$value->picture: base_url().'assets/images/patient/2017-01-16/p5.png';
				$msg .= '<tr style="border-bottom: 1px solid #ddd;" class="hovertr">';
				$msg .= '<td>';
				$msg .= '<img style="width: 50px;" src="'.$imagePath.'">';
				$msg .= '</td>';
				$msg .= '<td  onclick="doctor_info('.$value->user_id.')">';
				$msg .= '<div class="kpull-left"><div class="word-break"> <span data-id="" class="fa fa-circle" data-toggle="tooltip" title="Patient online"> </span> <span class="text-primary">'. $value->firstname.'</span>';
				$msg .= '</div></div>';
				$msg .= '</td>';
				$msg .= '<td onclick="doctor_info('. $value->user_id.')"><span class="text-primary">'.$value->lastname.'</span></td>';
				$msg .= '<td class="text-primary" onclick="doctor_info('.$value->user_id.')">'. date('d/m/Y',strtotime($value->date_of_birth)).' <br>'. $value->sex.'</td>';
				$msg .= '<td class="text-primary" onclick="doctor_info('. $value->user_id.')">'.$value->address.' <br>';
				$msg .= '<span class="light-grey">M</span>'.$value->mobile;
				$msg .= '<span class="light-grey ml-15">H</span>'.$value->phone;
				$msg .= '</td>';
				$msg .= '<td class="text-primary" onclick="doctor_info('.$value->user_id.')">'.$role->name;
				$msg .= '</td>';
				$msg .= '<td><div class="btn-group">';
				// $msg .= '<select class="btn btn-default dropdown-toggle"><option value="1"'.$value->status==1?"Selected":"".' >Active</option><option value="0" '.$value->status==0?"Selected":"".'>Inactive</option></select>';
				$msg .= '<select class="btn btn-default dropdown-toggle" onchange="call('. $value->user_id.',this.options[this.selectedIndex].value,'.$doctor_id.')"><option value="1"'.$active.'>Active</option><option value="0"'.$inactive.'>Inactive</option></select>';
				// $msg .= '<select class="btn btn-default dropdown-toggle" onchange="call('.$value->user_id.'",this.options[this.selectedIndex].value,"'. $doctor_id.')><option value="1" '.$value->status == 1?'Selected':"".'>Active</option><option value="0" '.$value->status == 0?'Selected':"".'>Inactive</option>';
				$msg .= '</div></td>';
				$msg .= '<td class="pt-15"><div class="btn-group" style="float: right;display: flex;">';
				$msg .= '<a href="#" onclick="doctor_info('. $value->user_id.')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>';
				$msg .= '<a  href="'. base_url("dashboard_super/doctor/doctor/edit/$doctor_id/$value->user_id") .'" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>';
				$msg .= '<a href="'. base_url("dashboard_super/doctor/doctor/delete/$doctor_id/$value->user_id").'" class="btn btn-xs btn-danger" onclick="confirmation()"> <i class="fa fa-trash"></i></a>';
				$msg .= '</div></td>';
				$msg .= '</tr>';
			 }
			}else{
				$msg = '<tr><td colspan="8" align="center">No data found!</td></tr>';
			}
				echo $msg;
}

	public function profile($user_id = null)
	{
		$data['title'] = display('doctor_profile');
		#-------------------------------#
		$data['user'] = $this->doctor_model->read_by_id($user_id);
		$data['content'] = $this->load->view('doctor_profile',$data,true);
		$this->load->view('dashboard_super/main_wrapper',$data);
	}


	public function edit($user_id = null)
	{
    $admin_id = $user_id;
    $user_id = $this->uri->segment(6);
    // var_dump($admin_id); die;
	//	exit;
		$user_role = $this->session->userdata('user_role');
		if ($user_role == 1 && $this->session->userdata('user_id') == $user_id)
			$data['title'] = display('edit_profile');
		elseif ($user_role == 2)
			$data['title'] = display('edit_profile');
		else
			$data['title'] = display('edit_doctor');
		#-------------------------------#
		$data['department_list'] = $this->department_model->department_list();
		$data['role_list'] = $this->department_model->role_list();
		$data['admin_id'] = $admin_id;
		$data['doctor'] = $this->doctor_model->read_by_id($user_id);

		#-------------------------------#
		if (($data['doctor']->user_id != $this->session->userdata('user_id'))
		&& $this->session->userdata('user_role') != 11)
			redirect('login');
		#-------------------------------#
		$data['content'] = $this->load->view('dashboard_super/doctor/doctor_form',$data,true);
		$this->load->view('dashboard_super/main_wrapper',$data);

	}


	public function delete($admin_id = null)
	{
		// var_dump($this->doctor_model->delete($user_id));
		$user_id = $this->uri->segment(6);
		if ($this->doctor_model->delete($user_id)) {
			#set success message
			$this->session->set_flashdata('message','Medical provider profile delete successfully');
			   //display('delete_successfully')
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('dashboard_super/doctor/doctor/'.$admin_id);
	}

}
