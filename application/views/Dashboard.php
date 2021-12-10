<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

		public function __construct()
		{
				parent::__construct();

				$this->load->model(array(
						'dashboard_model',
						'setting_model',
						'patient_model',
						'doctor_model',
						'document_model'
				));
		}

		public function index()
		{


			$session_id = $this->session->userdata('user_id');
			$created_by_id = $this->session->userdata('created_by');
					$isadmin = $this->session->userdata('isadmin');
					if($isadmin == 1){
						$session_id = $created_by_id;
					}
		//echo("hello");exit;
				// redirect to dashboard home page
				if($this->session->userdata('isLogIn'))
				if($this->session->userdata('isadmin')==1){
					$this->redirectTo('1');
				}else{
					$this->redirectTo($this->session->userdata('user_role'));
				}
			//  $this->redirectTo($this->session->userdata('user_role'));

				$this->form_validation->set_rules('email', display('email'),'required|max_length[50]|valid_email');
				$this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');
				$this->form_validation->set_rules('user_role',display('user_role'),'required');
				#-------------------------------#
				$setting = $this->setting_model->read();
				$data['title']   = (!empty($setting->title)?$setting->title:null);
				$data['logo']    = (!empty($setting->logo)?$setting->logo:null);
				$data['favicon'] = (!empty($setting->favicon)?$setting->favicon:null);
				$data['footer_text'] = (!empty($setting->footer_text)?$setting->footer_text:null);

				$data['user'] = (object)$postData = [
						'email'     => $this->input->post('email',true),
						'password'  => md5($this->input->post('password',true)),
						'user_role' => $this->input->post('user_role',true),
				];
				#-------------------------------#
				if ($this->form_validation->run() === true) {
						//check user data
						$check_user = $this->dashboard_model->check_user($postData);

						if ($postData['user_role'] == 10) {
								$check_user = $this->dashboard_model->check_patient($postData);
						} else {
								$check_user = $this->dashboard_model->check_user($postData);
						}
						if ($postData['user_role'] == 10) {
						$check_user_status = $this->dashboard_model->check_user_pstatus($postData);
							} else {
								$check_user_status = $this->dashboard_model->check_user_status($postData);
								}
//check_user_status
						if ($check_user->num_rows() === 1) {
								//retrive setting data and store to session

								//store data in session
								$this->session->set_userdata([
										'isLogIn'   => true,
										'user_id' => (($postData['user_role']==10)?$check_user->row()->id:$check_user->row()->user_id),
										'patient_id' => (($postData['user_role']==10)?$check_user->row()->patient_id:null),
										'email'     => $check_user->row()->email,
										'fullname'  => $check_user->row()->firstname.' '.$check_user->row()->lastname,
										'user_role' => (($postData['user_role']==10)?10:$check_user->row()->user_role),
										'picture'   => $check_user->row()->picture,
										'title'     => (!empty($setting->title)?$setting->title:null),
										'address'   => (!empty($setting->description)?$setting->description:null),
										'logo'      => (!empty($setting->logo)?$setting->logo:null),
										'favicon'      => (!empty($setting->favicon)?$setting->favicon:null),
										'footer_text' => (!empty($setting->footer_text)?$setting->footer_text:null),
										'isadmin' =>($check_user->row()->is_admin=='1')?$check_user->row()->is_admin:'0',
										'created_by' =>$check_user->row()->created_by,
										'features' =>$check_user->row()->features,
										'hospital_id'=>$check_user->row()->hospital_id
								]);

								//redirect to dashboard home page
								if($check_user->row()->is_admin==1){
									$this->session->set_userdata(['user_role' => 1]);
									$this->redirectTo($this->session->userdata('user_role'));
								}else{
									$this->redirectTo($postData['user_role']);
								}


						}else if($check_user_status->num_rows() === 1){
							$this->session->set_flashdata('exception','Your account has been disable please contact to admin!');
							//redirect to login form
							redirect('login');

						} else {
								#set exception message
$check_username = $this->dashboard_model->check_user_name($postData);
$check_password = $this->dashboard_model->check_user_password($postData);
$check_role = $this->dashboard_model->check_user_role($postData);

if($check_password->num_rows() === 0){
	$this->session->set_flashdata('exception',"Invalid Password!");
	// return false;
}else if($check_username->num_rows() === 0){
	$this->session->set_flashdata('exception',"Invalid Username!");
	// return false;
}else if($check_role->num_rows() === 0){
	$this->session->set_flashdata('exception',"Invalid Role!");
	// return false;
}





								//redirect to login form
								redirect('login');
						}

				} else {
						$this->load->view('layout/login_wrapper',$data);
				}
		}
		function search_patient()
		 {
	 $p_id = trim($this->input->get_post('p_id'));
	 $id = $this->session->userdata('user_id');
	 $created_by_id = $this->session->userdata('created_by');
	 $isadmin = $this->session->userdata('isadmin');
			 if($p_id!=''){
				if($isadmin==1){
					$sql ="SELECT * FROM patient WHERE (patient_id like '%".($p_id)."%' or fname like '%".($p_id)."%' or email like '%".($p_id)."%' or date_of_birth like '%".($p_id)."%') and (hospital_id = $created_by_id)  ORDER BY id DESC";
				}else{
					$sql ="SELECT * FROM patient WHERE (patient_id like '%".($p_id)."%' or fname like '%".($p_id)."%' or email like '%".($p_id)."%' or date_of_birth like '%".($p_id)."%') and (hospital_id = $id)  ORDER BY id DESC";
				}


				 $query = $this->db->query($sql);
					$searchdetail =  $query->result();
					if(count($searchdetail)>0){
						foreach ($searchdetail as $value) {
							if($value->sex==''){
								 $value->sex='Male';
							 }
							 if($value->picture!='' && $value->picture!=null){
								 $value->picture = $value->picture;
							 }else{
								 $value->picture = "assets/images/user-img.png";
							 }
							 //else{
							//   $value->sex='F';
							// }
$value->date_of_births=date('Y-m-d',strtotime($value->date_of_birth));
							//$value->picture = ($value->picture!='')?$value->picture:"assets/images/patient/2017-01-16/p5.png";
							// code...
							$d1 = new DateTime();
$d2 = new DateTime($value->date_of_births);

$diff = $d2->diff($d1);

if($diff->y!=0){
	$value->age = $diff->y.'  yrs';
}elseif($diff->m!=0){
	$value->age = $diff->m.'  Months';
}elseif($diff->d!=0){
	$value->age = $diff->d.'  Days';
}
$value->date_of_birth=date('d/m/Y',strtotime($value->date_of_birth));
	//$value->age = $diff->y;
							$data[] = $value;
						}
					}else{
						$data = array();
					}


					 echo json_encode($data);
				 }else{
					 $ds = "";
					 echo json_encode($ds);

				 }

			 // }else{
			 //
			 //
			 //   $lead = $this->patient_model->read();
			 //   if(count($lead)>0){
			 //     foreach ($lead as $value) {
			 //       if($value->sex=='Male'){
			 //         $value->sex='M';
			 //       }else{
			 //         $value->sex='F';
			 //       }
			 //       $value->date_of_birth=date('Y-m-d',strtotime($value->date_of_birth));
			 //      // $value->picture = ($value->picture!='')?$value->picture:"assets/images/patient/2017-01-16/p5.png";
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

		 function patient_search(){
		 	
 			$p_id = trim($this->input->get_post('p_id'));				
			$id = $this->session->userdata('user_id');
	    	$created_by_id = $this->session->userdata('created_by');
    		$isadmin = $this->session->userdata('isadmin');
	        if($isadmin == 1){
	        	$id = $created_by_id;
	        }
			$sql ="SELECT * FROM patient WHERE hospital_id='$id' and (patient_id like '%".($p_id)."%' or fname like '%".($p_id)."%' or email like '%".($p_id)."%' or date_of_birth like '%".($p_id)."%') ORDER BY id DESC";
			$query = $this->db->query($sql);
			 $searchdetail =  $query->result();
			 $msg ='';
			 
				foreach ($searchdetail as $value) {
					 if($value->sex==''){
							$value->sex='Male';
						}
					 $value->date_of_birth=date('d/m/Y',strtotime($value->date_of_birth));
					 $msg.='<tr style="border-bottom: 1px solid #ddd;" class="hovertr"><td>';
					// $msg.='<img  src="'.base_url().'assets/images/patient/2017-01-16/p5.png"></td>';
					 if($value->picture!=''){
						 $msg.='<img style="border-radius: 50%;width: 50px;  height: 50px;" src="'.base_url().$value->picture.'"></td>';
					 }else{
						 $msg.='<img style="border-radius: 50%; width: 50px;  height: 50px;"  src="'.base_url().'assets/images/patient/2017-01-16/p5.png"></td>';
					 }
					 $msg.='<td><div class="kpull-left"><div class="word-break">';
					 $msg.='<span data-id="'.$value->patient_id.'" class="fa fa-circle" data-toggle="tooltip" title="Patient online"> </span>';
					 $msg.='<span class="text-primary">'.$value->fname.'  <br> <a href="#" class="color-black">'.$value->patient_id.'</a> </span>';
					 $msg.='</div></div></td>';
					 $msg.='<td><span class="text-primary">'.$value->lname.'</span></td>';
					 $msg.='<td>'.$value->date_of_birth.'</td><td>'.$value->sex.'</td>';
					 $msg.='<td>'.$value->address1.' '.$value->country.' '.$value->city.' '.$value->state.' '.$value->zip.'<br><span class="light-grey">M</span>'.$value->mobile.'<span class="light-grey ml-15">H</span>'.$value->phone.'</td>';
					 $msg.= '<td>'.date('d/m/Y',strtotime($value->create_date)).'</td>';
					 $msg.= '<td><div class="btn-group"><select class="btn btn-default form-control" onchange="call(\''.$value->patient_id.'\',this.options[this.selectedIndex].value)"><option value="1" '.(($value->status==1)?'Selected':'').'>Active</option><option value="0"'.(($value->status==0)?'Selected':'').'>Inactive</option>   </select> </div></td>';
					$msg.='<td class="pt-15"><div class="btn-group" style="float: right;display: flex;">
					<a href="'.base_url("patient/familymember/$patient->id").'" class="btn btn-xs icon-box" style="margin-right:10px;">Family Member</a>
					<a href="#" onclick="patient_info(\''.$value->patient_id.'\')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a><a href="'.base_url("patient/edit/$value->id").'" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>';
					$msg.='<a href="'.base_url("patient/delete/$value->id").'" class="btn btn-xs btn-danger" onclick="return confirm('.display('are_you_sure').')"><i class="fa fa-trash"></i></a></div></td></tr>';					
				}
				echo json_encode($msg);					
			}
			function patient_searchall()
			 {
				$p_id = trim($this->input->get_post('p_id'));

				// if($p_id!=''){
					 $sql ="SELECT * FROM patient  ORDER BY id DESC";
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

								if($value->picture!=''){
									$msg.='<img style="border-radius: 50%; width: 50px;  height: 50px;"  src="'.base_url().$value->picture.'"></td>';
								}else{
									$msg.='<img style="border-radius: 50%; width: 50px;  height: 50px;"  src="'.base_url().'assets/images/patient/2017-01-16/p5.png"></td>';
								}
								$msg.='<td><div class="kpull-left"><div class="word-break">';
								$msg.='<span data-id="'.$value->patient_id.'" class="fa fa-circle" data-toggle="tooltip" title="Patient online"> </span>';
								$msg.='<span class="text-primary">'.$value->fname.'  <br> <a href="#" class="color-black">'.$value->patient_id.'</a> </span>';
								$msg.='</div></div></td>';
								$msg.='<td><span class="text-primary">'.$value->lname.'</span></td>';
								$msg.='<td>'.$value->date_of_birth.'</td><td>'.$value->sex.'</td>';
								$msg.='<td>'.$value->address1.' '.$value->country.' '.$value->city.' '.$value->state.' '.$value->zip.'<br><span class="light-grey">M</span>'.$value->mobile.'<span class="light-grey ml-15">H</span>'.$value->phone.'</td>';
								$msg.= '<td>'.date('d/m/Y',strtotime($value->create_date)).'</td>';
								$msg.= '<td><div class="btn-group"><select class="btn btn-default form-control" onchange="call(\''.$value->patient_id.'\',this.options[this.selectedIndex].value)"><option value="1" '.(($value->status==1)?'Selected':'').'>Active</option><option value="0"'.(($value->status==0)?'Selected':'').'>Inactive</option>   </select>
			</div></td>';
							 $msg.='<td class="pt-15"><div class="btn-group" style="float: right;display: flex;"><a href="#" onclick="patient_info(\''.$value->patient_id.'\')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a><a href="'.base_url("patient/edit/$value->id").'" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>';
							 $msg.='<a href="'.base_url("patient/delete/$value->id").'" class="btn btn-xs btn-danger" onclick="return confirm('.display('are_you_sure').')"><i class="fa fa-trash"></i></a></div>
																							 </td>
												 </tr>';

								 //else{
								//   $value->sex='F';
								// }


			//   $value->date_of_birth=date('d/m/Y',strtotime($value->date_of_birth));
			//$value->age = $diff->y;
								//$data[] = $value;
							}


						 echo json_encode($msg);
					// }else{
					//   $ds = "";
					//   echo json_encode($ds);

					// }

				 // }else{
				 //
				 //
				 //   $lead = $this->patient_model->read();
				 //   if(count($lead)>0){
				 //     foreach ($lead as $value) {
				 //       if($value->sex=='Male'){
				 //         $value->sex='M';
				 //       }else{
				 //         $value->sex='F';
				 //       }
				 //       $value->date_of_birth=date('Y-m-d',strtotime($value->date_of_birth));
				 //      // $value->picture = ($value->picture!='')?$value->picture:"assets/images/patient/2017-01-16/p5.png";
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
		 function search_patients()
			{
		 $p_id = $this->input->get_post('p_id');

				if($p_id!=''){
					$sql ="SELECT * FROM patient WHERE patient_id like '%" .($p_id) . "%' or fname like '%" .($p_id) . "%' or lname like '%" .($p_id) . "%' or email like '%" .($p_id) . "%' or date_of_birth like '%" .($p_id) . "%' ORDER BY id DESC";
					$query = $this->db->query($sql);
					 $searchdetail =  $query->result();
					 $msg='';
					 if(count($searchdetail)>0){

						 foreach ($searchdetail as $value) {
							 $msg ='<div class="row" onClick="test('.$value->patient_id.')"><div class="col-12 col-md-2 mt-15"><span>3 months</span></div><div class="col-12 col-md-2 mt-15"><span>Female</span></div><div class="col-12 col-md-2 mt-15 text-center"><span>02/12/2019</span></div><div class="col-12 col-md-2 mt-15"><span>a@gmail.com</span></div><div class="col-12 col-md-4 mt-15"><span><b>M</b></span><span class="ml-10">(555) 555 - 1234</span></div><div class="col-12 col-md-3 mt-15"><span><b>PRN</b></span><span class="ml-10">as123456</span></div></div>';

							// $value->date_of_birth=date('Y-m-d',strtotime($value->date_of_birth));
							 //$value->picture = ($value->picture!='')?$value->picture:"assets/images/patient/2017-01-16/p5.png";
							 // code...
							 //$data[] = $value;
						 }
					 }else{
						$msg='';
					 }


						//echo json_encode($data);
						echo json_encode($msg);
				}else{


					$lead = $this->patient_model->read();
					if(count($lead)>0){
						foreach ($lead as $value) {
							if($value->sex=='Male'){
								$value->sex='M';
							}else{
								$value->sex='F';
							}
							$value->date_of_birth=date('Y-m-d',strtotime($value->date_of_birth));
						 // $value->picture = ($value->picture!='')?$value->picture:"assets/images/patient/2017-01-16/p5.png";
							// code...
							$data[] = $value;
						}
					}else{
						$data = array();
					}
					echo json_encode($data);
				}
					//$sql  = "SELECT * ";





			}
		public function redirectTo($user_role = null)
		{
				//redirect to dashboard/home page
				switch ($user_role) {
						case 1:
										redirect('dashboard/home');
								break;
						case 2:
										redirect('dashboard_doctor/home');
								break;
						case 3:
										redirect('dashboard_accountant/home');
								break;
						case 4:
										redirect('dashboard_laboratorist/home');
								break;
						case 5:
										redirect('dashboard_nurse/home');
								break;
						case 6:
										redirect('dashboard_pharmacist/home');
								break;
						case 7:
										redirect('dashboard_receptionist/home');
								break;
						case 8:
										redirect('dashboard_representative/home');
								break;
						case 9:
										redirect('dashboard_case_manager/home');
								break;
						case 10:
										redirect('dashboard_patient/home');
								break;
						case 11:
												// redirect('dashboard_super/home');
								redirect('dashboard_super/admin/admin');
										break;
						//if $user_role is not set
						//then redirect to login
						default:
										redirect('login');
								break;
				}
		}


		public function home()
		{
			// print_r($_SESSION);
			// exit;
				if ($this->session->userdata('isLogIn') == false
						|| $this->session->userdata('user_role') != 1)
				redirect('login');
				$session_id = $this->session->userdata('user_id');
				$created_by_id = $this->session->userdata('created_by');
						$isadmin = $this->session->userdata('isadmin');
						if($isadmin == 1){
							$session_id = $created_by_id;
						}
				$data['title'] = display('home');
				#------------------------------#
				$data['notify']   = $this->dashboard_model->notify();
				$data['enquires'] = $this->dashboard_model->enquiry();
				// $data['chart']    = $this->dashboard_model->chart();
				$data['patients'] = $this->patient_model->read();
			//	$data['content'] = $this->load->view('patient',$data,true);
			$where_in = 'schedule';
					if($isadmin == 1){
						$doctor_detail = $this->db->select("*")->from("user")->where("user_role","2")->where('user.created_by',$created_by_id)->where("status","1")->where('find_in_set("'.$where_in.'", features) <> 0')->get()->result();
					}else{
						$doctor_detail = $this->db->select("*")->from("user")->where("user_role","2")->where('user.created_by',$session_id)->where("status","1")->where('find_in_set("'.$where_in.'", features) <> 0')->get()->result();
					}
					// var_dump($this->session->userdata());
					 //echo $this->db->last_query();die;
					$data['doctor'] =  $doctor_detail;
				$data['content']  = $this->load->view('home',$data,true);
				$this->load->view('layout/main_wrapper',$data);
		}

		public function profile()
		{
				$data['title'] = display('profile');
				#------------------------------#
				$user_id = $this->session->userdata('user_id');
				$data['user']    = $this->dashboard_model->profile($user_id);
				$data['content'] = $this->load->view('profile', $data, true);
				$this->load->view('layout/main_wrapper',$data);
		}
		public function reset_password()
		{
				$data['title'] = "Reset Password";//display('profile');
				#------------------------------#
				$user_id = $this->session->userdata('user_id');
				$this->form_validation->set_rules('email', display('email'),'required|max_length[50]|valid_email');
				//$data['user']    = $this->dashboard_model->profile($user_id);
				//$data['content'] = $this->load->view('profile', $data, true);
				$email = $this->input->get_post('email');
				if ($this->form_validation->run() === true) {
					$doctoremailExists = $this->db->select('email')
							->where('email',$email)
							->get('user')
							->num_rows();
							$patientemailExists = $this->db->select('email')
									->where('email',$email)
									->get('patient')
									->num_rows();
									if($doctoremailExists > 0 or $patientemailExists > 0){
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

										$arr['password'] = md5($pass);
										$detail = '';
										if($doctoremailExists > 0){
											$this->db->where("email",$email);
											$this->db->update("user",$arr);
											$detail = $this->db->select("*")->from("user")->where("email",$email)->get()->row();


										}else if($patientemailExists > 0)
											{
													$this->db->where("email",$email);
													$this->db->update("patient",$arr);
													$detail = $this->db->select("*")->from("patient")->where("email",$email)->get()->row();
											}


										$to = $email;
										$subject = "Reset password";
									//  $htmlMessage = "Yor new password:".$pass;
										$getHospitalName = SYS_NAME;
										if($detail->hospital_id){
											$getHospital = $this->db->select("*")->from("user")->where("user_id",$detail->hospital_id)->get()->row();
											$getHospitalName = $getHospital->hospitalname;
										}
										$htmlMessage = '<html>
											<head>
												<meta name="viewport" content="width=device-width" />
												<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
												<title>Forget Password Mail</title>
												<style type="text/css">
													body{
														 background-color: #e8e4e4;
														 font-family: Arial, Helvetica, sans-serif;;
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
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img src='.base_url()."assets/images/logo.png".' style="height: 250px;" /></td>
												<td width="20%"></td>
											</tr>
										 <tr>
												<td width="20%"></td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<p style="color: #ca6710;font-weight: 500;font-size: 16px;">Resetting your password for '.'  '.$getHospitalName .'</p>
													<p><b>Hello  '.$detail->firstname.$detail->lastname.',</b></p>
													<p>We have sent you this email in response to your request to reset your password on '.'  '. $getHospitalName .'. After you reset your password to change to your own password.</p>
													<p>To set a password for your account,</p>
													<p>You can access the '.'  '. $getHospitalName .' with following credentials:</p></td>
												<td width="20%"></td>
											</tr>
												<tr>
													<td width="20%"></td>
													<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
														<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%;">
															<tbody>
															 <tr>
																	<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Login Username </td>
																	<td style="border:1px solid #ccc5c5;padding: 8px;">'.$detail->email.'</td>
																</tr>
																<tr>
																	<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Password</td>
																	<td style="border:1px solid #ccc5c5;padding: 8px;">'.$pass.'</td>
																</tr>
															</tbody>
														</table>
														<p style="color: #6f5f5f;">* We recommend that you keep your password secure and not share it with anyone.</p>
													</td>
												<td width="20%"></td>
											</tr>
											<tr>
											 <td width="20%"></td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
													<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$email.'</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.' '. SYS_EMAIL .'</span></p>
												<td width="20%"></td>
											</tr>
										</table>
										</body>
										</html>';
										$this->load->library('email');
										$this->load->helper('email');
										$config['mailtype'] = 'html';
										$this->email->initialize($config);
										$this->email->from(SYS_EMAIL, $getHospitalName);
										$this->email->to($to);
										$this->email->subject($subject);
										$this->email->message($htmlMessage);
									//	if (!empty($pdf_name)) {
										//	$this->email->attach($pdf_name); GT HEALTH SYSTEM
										//}
										@$this->email->send();
										//$this->form_validation->set_message('message', 'New password changed successfully !');
										$this->session->set_flashdata('message','We have emailed your new password!');
									//  return true;
										redirect('dashboard');
									}else{

										$this->session->set_flashdata('message','Email address not exist! !');
										redirect('dashboard');
									//  return false;
										//redirect('dashboard/reset_password');

									}

					// echo"success";
				}else {
						$this->load->view('layout/reset_wrapper',$data);
			}

		}

		public function email_check($email, $user_id)
		{
				$emailExists = $this->db->select('email')
						->where('email',$email)
						->where_not_in('user_id',$user_id)
						->get('user')
						->num_rows();

				if ($emailExists > 0) {
						$this->form_validation->set_message('email_check', 'The {field} field must contain a unique value.');
						return false;
				} else {
						return true;
				}
		}


		public function form()
		{
				$data['title'] = display('edit_profile');
				$user_id = $this->session->userdata('user_id');
				#-------------------------------#
				$this->form_validation->set_rules('firstname', display('first_name') ,'required|max_length[50]');
				$this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');

				$this->form_validation->set_rules('email',display('email'), "required|max_length[50]|valid_email|callback_email_check[$user_id]");
			if($this->input->post('password',true)){
							$this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');
						}

				$this->form_validation->set_rules('phone', display('phone') ,'max_length[20]');
				$this->form_validation->set_rules('mobile', display('mobile'),'required|max_length[20]');
				$this->form_validation->set_rules('blood_group', display('blood_group'),'max_length[10]');
				$this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
				$this->form_validation->set_rules('date_of_birth', display('date_of_birth'),'max_length[10]');
				$this->form_validation->set_rules('address',display('address'),'required|max_length[255]');
				// $this->form_validation->set_rules('status',display('status'));
				#-------------------------------#
				//picture upload
				// $picture = $this->fileupload->do_upload(
				//     'assets/images/doctor/',
				//     'picture'
				// );
				// // if picture is uploaded then resize the picture
				// if ($picture !== false && $picture != null) {
				//     $this->fileupload->do_resize(
				//         $picture,
				//         260,
				//         60
				//     );
				// }
				// Upload Crop Image
				$picture = '';
				if($_POST['croppicture'] !=''){
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

				#-------------------------------#
				$data['doctor'] = (object)$postData = [
						'user_id'      => $this->input->post('user_id',true),
						'firstname'    => $this->input->post('firstname',true),
						'lastname'     => $this->input->post('lastname',true),
						'designation'  => $this->input->post('designation',true),
						'department_id' => $this->input->post('department_id',true),
						'address'      => $this->input->post('address',true),
						'phone'        => $this->input->post('phone',true),
						'mobile'       => $this->input->post('mobile',true),
						'email'        => $this->input->post('email',true),
						'short_biography' => $this->input->post('short_biography',true),
						'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
						'specialist'   => $this->input->post('specialist',true),
						'date_of_birth' => date('Y-m-d', strtotime($this->input->post('date_of_birth',true))),
						'sex'          => $this->input->post('sex',true),
						'blood_group'  => $this->input->post('blood_group',true),
						'degree'       => $this->input->post('degree',true),
						// 'created_by'   => $this->session->userdata('user_id'),
						'create_date'  => date('Y-m-d'),
						// 'status'       => $this->input->post('status',true),
				];
				if($this->input->post('password',true)){
					$postData['password'] = md5($this->input->post('password',true));
				}
				#-------------------------------#
				if ($this->form_validation->run() === true) {

						if ($this->dashboard_model->update($postData)) {
								#set success message
								$this->session->set_flashdata('message',display('update_successfully'));
						} else {
								#set exception message
								$this->session->set_flashdata('exception', display('please_try_again'));
						}

						//update profile picture
						if ($postData['user_id'] == $this->session->userdata('user_id')) {
								$this->session->set_userdata([
										'picture'   => $postData['picture'],
										'fullname'  => $postData['firstname'].' '.$postData['lastname']
								]);
						}

						redirect('dashboard/form/');

				} else {
						$user_id = $this->session->userdata('user_id');
						$data['doctor'] = $this->dashboard_model->profile($user_id);
						$data['content'] = $this->load->view('profile_form',$data,true);
						$this->load->view('layout/main_wrapper',$data);
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
			redirect('dashboard/form/');
	}
	public function logout()
		{
				$this->session->sess_destroy();
				redirect('login');
		}

}
