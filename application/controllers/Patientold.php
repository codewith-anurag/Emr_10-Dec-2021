<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

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
		$data['title'] = display('patient_list');
		$data['patients'] = $this->patient_model->read();
		$data['content'] = $this->load->view('patient',$data,true);
		$this->load->view('layout/main_wrapper',$data);
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
		
	public function create()
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
					$subject="Welcome to Visionary Health Services";
				$htmlMessage='<html>
					  <head>
					    <meta name="viewport" content="width=device-width" />
					    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					    <title>New register in Visionary</title>
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
								<p style="color: #6f5f5f;">* Thanks! For new register in visionary application.</p>
							</td>
						<td width="20%"></td>
					</tr>
					<tr>
					 <td width="20%"></td>
						<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
							<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">visionary@yahoo.com.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">support@visionary.com</span></p>
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
