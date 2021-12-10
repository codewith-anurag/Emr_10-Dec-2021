<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
            'dashboard_doctor/messages/message_model'
		));

        if ($this->session->userdata('isLogIn') == false
            || $this->session->userdata('user_role') != 2
        )
        redirect('login');
	}

    public function index()
    {
        $data['title']    =  display('inbox');
        $user_id = $this->session->userdata('user_id');
		$isadmin = $this->session->userdata('isadmin');
		$session_email = $this->session->userdata('email');
				//exit;
        #-------------------------------#
        // patient
	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('patient', 'message.to_user = patient.email');
	$wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
	$this->db->where('message.user_type','medical_patient');
	$this->db->where($wh);
	$this->db->order_by('message.created_date','desc');
	$allquery = $this->db->get();
	$data['all_patient'] = $allquery->result();

//print_r($_SESSION);
	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('patient', 'message.to_user = patient.email');
	$wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
	$this->db->where('message.user_type','medical_patient');
	$this->db->where('message.is_read','0');
	$this->db->where($wh);
	$allquery = $this->db->get();
	$data['all_patient_count'] = $allquery->result();

	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('patient', 'message.to_user = patient.email');
	$this->db->where('message.user_type','medical_patient');
	$this->db->where('message.to_user',$session_email);
	$this->db->order_by('message.created_date','desc');
	$iquery = $this->db->get();
	$data['patient_incoming'] = $iquery->result();
	$this->db->select('*');
	$this->db->from('message');
//$this->db->join('patient', 'message.to_user = patient.email');
$this->db->where('message.to_user',$session_email);
	$this->db->where('message.user_type','medical_patient');
	$this->db->where('message.is_read','0');
	$iquery = $this->db->get();
	$data['patient_incoming_count'] = $iquery->result();
	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('patient', 'message.from_user = patient.email');
	$this->db->where('message.user_type','medical_patient');
	$this->db->where('message.from_user',$session_email);
	$this->db->order_by('message.created_date','desc');
	$squery = $this->db->get();
	$data['patient_sent'] = $squery->result();
	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('patient', 'message.from_user = patient.email');
	$this->db->where('message.from_user',$session_email);
	$this->db->where('message.user_type','medical_patient');
		$this->db->where('message.is_read','0');
	$squery = $this->db->get();
	$data['patient_sent_count'] = $squery->result();

// patient
// medical
	$this->db->select('*');
	$this->db->from('message');
	$wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
	//$this->db->join('patient', 'message.to_user = patient.email');
	$this->db->where('message.user_type','medical_provider');
	$this->db->where($wh);
	$this->db->order_by('message.is_read');
	$allquery = $this->db->get();
//	echo $this->db->last_query();
	$data['all_medical'] = $allquery->result();


  $wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('patient', 'message.to_user = patient.email');
	$this->db->where('message.user_type','medical_provider');
	$this->db->where($wh);
	$this->db->where('message.is_read','0');
	$allquery = $this->db->get();
	$data['all_medical_count'] = $allquery->result();


	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('user', 'message.from_user = user.email');
	$this->db->where('message.from_user',$session_email);
	$this->db->where('message.user_type','medical_provider');
	//$this->db->where('user.role_id','2');
		$this->db->order_by('message.is_read');
	$mquery = $this->db->get();
	$data['medical_sent'] = $mquery->result();


	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('user', 'message.from_user = user.email');
	$this->db->where('message.from_user',$session_email);
	$this->db->where('message.user_type','medical_provider');
	//$this->db->where('user.role_id','2');
	$this->db->where('message.is_read','0');
	$mquery = $this->db->get();
	$data['medical_sent_count'] = $mquery->result();

	//echo $this->db->last_query()
	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('user', 'message.to_user = user.email');

//$this->db->join('user', 'user.email = message.from_user');
	$this->db->where('message.to_user',$session_email);
//	$this->db->where('user.user_role!=','1');
	$this->db->where('message.user_type','medical_provider');
		$this->db->order_by('message.is_read');
	//	$this->db->where('user.role_id','2');
	$miquery = $this->db->get();
	$data['medical_incoming'] = $miquery->result();

	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('user', 'message.to_user = user.email');
	$this->db->where('message.to_user',$session_email);
	$this->db->where('message.user_type','medical_provider');
	//$this->db->where('user.role_id','2');
	$this->db->where('message.is_read','0');
	$miquery = $this->db->get();
	$data['medical_incoming_count'] = $miquery->result();
	//medical

	// Admin

$wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('user', 'user.email = message.to_user');
	//$this->db->join('user', 'user.email = message.from_user');
	$this->db->where('message.user_type','medical_admin');
		//$this->db->where('user.user_role','1');
	$this->db->where($wh);
	//$this->db->or_where('message.from_user',$session_email);
		$this->db->order_by('message.is_read');
	$allquery = $this->db->get();
	//echo $this->db->last_query()
	$data['all_admin'] = $allquery->result();

  $wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
	$this->db->select('*');
	$this->db->from('message');
//	$this->db->join('user', 'user.email = message.from_user');
	//$this->db->join('patient', 'message.to_user = patient.email');
	//$this->db->where('user.user_role','1');
	$this->db->where('message.user_type','medical_admin');

	$this->db->where('message.is_read','0');
	$this->db->where($wh);
	//$this->db->or_where('message.from_user',$session_email);
	$allquery = $this->db->get();
	$data['all_admin_count'] = $allquery->result();

	//admin sent
	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('user', 'message.from_user = user.email');
	$this->db->where('message.from_user',$session_email);
	$this->db->where('message.user_type','medical_admin');
	//$this->db->where('user.role_id','2');
		$this->db->order_by('message.is_read');
	$mquery = $this->db->get();
	$data['admin_sent'] = $mquery->result();

	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('user', 'message.from_user = user.email');
	$this->db->where('message.from_user',$session_email);
	$this->db->where('message.user_type','medical_admin');
	//$this->db->where('user.role_id','2');
	$this->db->where('message.is_read','0');
	$mquery = $this->db->get();
	$data['admin_sent_count'] = $mquery->result();



	//admin Incoming
	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('user', 'message.to_user = user.email');

//$this->db->join('user', 'user.email = message.from_user');
	$this->db->where('message.to_user',$session_email);
//	$this->db->where('user.user_role!=','1');
	$this->db->where('message.user_type','medical_admin');
		$this->db->order_by('message.is_read');
	//	$this->db->where('user.role_id','2');
	$miquery = $this->db->get();
	$data['admin_incoming'] = $miquery->result();
	$this->db->select('*');
	$this->db->from('message');
	//$this->db->join('user', 'message.to_user = user.email');
	$this->db->where('message.to_user',$session_email);
	$this->db->where('message.user_type','medical_admin');
		//$this->db->where('user.role_id','2');
			$this->db->where('message.is_read','0');
	$miquery = $this->db->get();
	$data['admin_incoming_count'] = $miquery->result();
	// // medical/ admin
		$wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
		$type = "(message.user_type= 'medical_admin' or message.user_type= 'medical_provider')";
		$this->db->select('*');
		$this->db->from('message');
		// $this->db->join('user', 'message.from_user = user.email');
		$this->db->where($type);
		$this->db->where($wh);
		$this->db->order_by('message.created_date','desc');
		$allquery = $this->db->get();
		$data['all_medical_admin'] = $allquery->result();

		$this->db->select('*');
		$this->db->from('message');
		$this->db->where($type);
		$this->db->where('message.is_read','0');
		$this->db->where($wh);
		$allquery = $this->db->get();
		$data['all_medical_admin_count'] = $allquery->result();

		//admin access sent
		$this->db->select('*');
		$this->db->from('message');
		$this->db->where('message.from_user',$session_email);
		$this->db->where($type);
		$this->db->order_by('message.created_date','desc');
		$mquery = $this->db->get();
		$data['admin_medical_sent'] = $mquery->result();

		$this->db->select('*');
		$this->db->from('message');
		$this->db->where('message.from_user',$session_email);
		$this->db->where($type);
		$this->db->where('message.is_read','0');
		$mquery = $this->db->get();
		$data['admin_medical_sent_count'] = $mquery->result();

		//admin access Incoming
		$this->db->select('*');
		$this->db->from('message');
		$this->db->where('message.to_user',$session_email);
		$this->db->where($type);
		$this->db->order_by('message.created_date','desc');
		$miquery = $this->db->get();
		$data['admin_medical_incoming'] = $miquery->result();

		$this->db->select('*');
		$this->db->from('message');
		$this->db->where('message.to_user',$session_email);
		$this->db->where($type);
		$this->db->where('message.is_read','0');
		$miquery = $this->db->get();
		$data['admin_medical_incoming_count'] = $miquery->result();

		// // medical / admin

	    $data['messages'] = $this->message_model->inbox($user_id);
        $data['content']  = $this->load->view('dashboard_doctor/messages/inbox' ,$data,true);
        $this->load->view('dashboard_doctor/main_wrapper',$data);
    }

    public function getMedicalAdminById()
	 {
		    $to_user_val = $this->input->post('to_user_val');
		    $login_email = $this->session->userdata('email');
            $user_id =$this->session->userdata('user_id');
            $created_by_id = $this->session->userdata('created_by');
            $isadmin = $this->session->userdata('isadmin');
            $ignore = array($login_email);
            if($to_user_val == 'admin'){
			    // if($isadmin==1){
	              $getAdmin = $this->db->select("*")->from("user")->where("user_id",$created_by_id)->where("is_admin",'0')->where("find_in_set('message', features)")->where_not_in("email",$ignore)->get()->result();

	              $getMedical_admin = $this->db->select("*")->from("user")->where("created_by",$created_by_id)->where("is_admin",'1')->where("find_in_set('message', features)")->where_not_in("email",$ignore)->get()->result();

	              $medical_drop = array();
	              if ($getAdmin)
	              {
	                  $medical_drop = array_merge($medical_drop, $getAdmin);
	              }

	              if ($getMedical_admin)
	              {
	                  $medical_drop = array_merge($medical_drop, $getMedical_admin);
	              }
	            // }else{
	            //   $medical_drop = $this->db->select("*")->from("user")->where("created_by",$user_id)->where("is_admin",'1')->where_not_in("email",$ignore)->get()->result();
	            // }
	        }
	        if($to_user_val == 'medical'){
		        // if($isadmin==1){
		            $medical_drop = $this->db->select("*")->from("user")->where("created_by",$created_by_id)->where("user_role",'2')->where("find_in_set('message', features)")->where_not_in("email",$ignore)->get()->result();
		        // }else{
		        //     $medical_drop = $this->db->select("*")->from("user")->where("created_by",$user_id)->where("user_role",'2')->where_not_in("email",$ignore)->get()->result();
			       // }
		    }

		 echo json_encode($medical_drop);
	 }

	public function sent()
	{
        $data['title']    =  display('sent');
        $user_id = $this->session->userdata('user_id');
		#-------------------------------#
		$data['messages'] = $this->message_model->sent($user_id);
		$data['content'] = $this->load->view('dashboard_doctor/messages/sent' ,$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}

    public function inbox_information($id = null, $sender_id = null)
    {
        $data['title'] = display('messages');
        $receiver_id = $this->session->userdata('user_id');
        #-------------------------------#
        $this->message_model->update(
            array(
                'id' => $id,
                'receiver_status' => 1
            )
        );
        #-------------------------------#
        $data['message'] = $this->message_model->inbox_information($id, $sender_id, $receiver_id);
        $data['content'] = $this->load->view('dashboard_doctor/messages/inbox_information',$data,true);
        $this->load->view('dashboard_doctor/main_wrapper',$data);
    }

    public function sent_information($id = null, $receiver_id = null)
    {
        $data['title'] = display('messages');
        $sender_id = $this->session->userdata('user_id');
        #-------------------------------#
        $data['message'] = $this->message_model->sent_information($id, $sender_id, $receiver_id);
        $data['content'] = $this->load->view('dashboard_doctor/messages/sent_information',$data,true);
        $this->load->view('dashboard_doctor/main_wrapper',$data);
    }


    public function new_message()
    {

        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('to_user', "To" ,'required|max_length[11]');
        $this->form_validation->set_rules('from_user', "From",'required|max_length[255]');
        $this->form_validation->set_rules('message', display('message'),'required|trim');
				$this->form_validation->set_rules('message_type', "Message Type",'required|trim');
				$this->form_validation->set_rules('subject', "subject",'required|trim');

        /*-------------STORE DATA------------*/
        //$user_id = $this->session->userdata('user_id');
        //$date    = $this->input->post('date');

				$file = $this->fileupload->do_upload(
					'assets/message/',
					'file'
				);

        $data['message'] = (object)$postData = array(
            'to_user'          => $this->input->post('to_user'),
            'from_user' => $this->input->post('from_user'),
            'subject'     => $this->input->post('subject'),
            'message'     => $this->input->post('message'),
						'message_type'     => $this->input->post('message_type'),
            'created_date'    => date("Y-m-d h:i:s"),
						'file'    => (!empty($file)?$file:''),
						'user_type' => 'medical_patient'
        );
		$userData = $this->db->select("*")->from("user")->where("email",$this->input->post('from_user'))->get()->row();
		$patientData = $this->db->select("*")->from("patient")->where("email",$this->input->post('to_user'))->get()->row();
        /*-----------CREATE A NEW RECORD-----------*/
      //  if ($this->form_validation->run() === true) {
            if ($this->message_model->create($postData)) {

				$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"message","Send Message To patient",
                $userData->firstname." ".$userData->lastname." Send Message To Patient at ".date("d-m-Y h:i:s"),$this->session->userdata("hospital_id"),$patientData->id,$patientData->fname." ".$patientData->lname,10);

                #set success message
                $this->session->set_flashdata('message', "Message send successfully");
            } else {
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
            }
            redirect('dashboard_doctor/messages/message');
        //}// else {
				//	redirect('dashboard_doctor/messages/message');

          //  $data['title'] = display('new_message');
        //    $data['user_list'] = $this->message_model->user_list($user_id);
            //$data['content'] = $this->load->view('dashboard_doctor/messages/new_message',$data,true);
          //  $this->load->view('dashboard_doctor/main_wrapper',$data);
        //}
    }
		public function new_message_medical()
		{

				/*----------FORM VALIDATION RULES----------*/
				$this->form_validation->set_rules('to_user', "To" ,'required|max_length[11]');
				$this->form_validation->set_rules('from_user', "From",'required|max_length[255]');
				$this->form_validation->set_rules('message', display('message'),'required|trim');
				$this->form_validation->set_rules('message_type', "Message Type",'required|trim');
				$this->form_validation->set_rules('subject', "subject",'required|trim');

				/*-------------STORE DATA------------*/
				//$user_id = $this->session->userdata('user_id');
				//$date    = $this->input->post('date');
				if($this->input->post('message_to_user') == 'medical'){
					$messageType = 'medical_provider';
				}
				if($this->input->post('message_to_user') == 'admin'){
					$messageType = 'medical_admin';
				}

				$file = $this->fileupload->do_upload(
					'assets/message/',
					'file'
				);

				$data['message'] = (object)$postData = array(
						'to_user'          => $this->input->post('to_user'),
						'from_user' => $this->input->post('from_user'),
						'subject'     => $this->input->post('subject'),
						'message'     => $this->input->post('message'),
						'message_type'     => $this->input->post('message_type'),
						'created_date'    => date("Y-m-d h:i:s"),
						'file'    => (!empty($file)?$file:''),
						'user_type' => $messageType
				);
				$userData 	 = $this->db->select("*")->from("user")->where("email",$this->input->post('to_user'))->get()->row();
				$medicalData = $this->db->select("*")->from("user")->where("email",$this->input->post('from_user'))->get()->row();
				/*-----------CREATE A NEW RECORD-----------*/
				//if ($this->form_validation->run() === true) {
						if ($this->message_model->create($postData)) {
							if($this->input->post("message_to_user") == "admin"){
								$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"message","Send Message To admin",
                				$medicalData->firstname." ".$medicalData->lastname." Send Message To Admin at ".date("d-m-Y h:i:s"),$this->session->userdata("hospital_id"),$userData->user_id,$userData->firstname." ".$userData->lastname,1);
							}else if($this->input->post("message_to_user") == "medical"){
								$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"message","Send Message To Medical provider",
                				$medicalData->firstname." ".$medicalData->lastname." Send Message To Medical Provider at ".date("d-m-Y h:i:s"),$this->session->userdata("hospital_id"),$userData->user_id,$userData->firstname." ".$userData->lastname,2);
							}
								#set success message
								$this->session->set_flashdata('message', "Message send successfully");
						} else {
								#set exception message
								$this->session->set_flashdata('exception',display('please_try_again'));
						}
						redirect('dashboard_doctor/messages/message');
				//} //else {
					//redirect('dashboard_doctor/messages/message');

					//  $data['title'] = display('new_message');
				//    $data['user_list'] = $this->message_model->user_list($user_id);
						//$data['content'] = $this->load->view('dashboard_doctor/messages/new_message',$data,true);
					//  $this->load->view('dashboard_doctor/main_wrapper',$data);
			//	}
		}
		public function new_message_admin()
		{

				/*----------FORM VALIDATION RULES----------*/
				$this->form_validation->set_rules('to_user', "To" ,'required|max_length[11]');
				$this->form_validation->set_rules('from_user', "From",'required|max_length[255]');
				$this->form_validation->set_rules('message', display('message'),'required|trim');
				$this->form_validation->set_rules('message_type', "Message Type",'required|trim');
				$this->form_validation->set_rules('subject', "subject",'required|trim');

				/*-------------STORE DATA------------*/
				//$user_id = $this->session->userdata('user_id');
				//$date    = $this->input->post('date');

				$file = $this->fileupload->do_upload(
					'assets/message/',
					'file'
				);

				$data['message'] = (object)$postData = array(
						'to_user'          => $this->input->post('to_user'),
						'from_user' => $this->input->post('from_user'),
						'subject'     => $this->input->post('subject'),
						'message'     => $this->input->post('message'),
						'message_type'     => $this->input->post('message_type'),
						'created_date'    => date("Y-m-d h:i:s"),
						'file'    => (!empty($file)?$file:''),
						'user_type' => 'medical_admin'
				);

				/*-----------CREATE A NEW RECORD-----------*/
				//if ($this->form_validation->run() === true) {
						if ($this->message_model->create($postData)) {
								#set success message
								$this->session->set_flashdata('message', "Message send successfully");
						} else {
								#set exception message
								$this->session->set_flashdata('exception',display('please_try_again'));
						}
						redirect('dashboard_doctor/messages/message');
				//} //else {
					//redirect('dashboard_doctor/messages/message');

					//  $data['title'] = display('new_message');
				//    $data['user_list'] = $this->message_model->user_list($user_id);
						//$data['content'] = $this->load->view('dashboard_doctor/messages/new_message',$data,true);
					//  $this->load->view('dashboard_doctor/main_wrapper',$data);
			//	}
		}
		public function forward_message_medical()
		{
   //echo 'tee';
	 //exit;
				/*----------FORM VALIDATION RULES----------*/
				$this->form_validation->set_rules('to_user', "To" ,'required|max_length[11]');
				$this->form_validation->set_rules('from_user', "From",'required|max_length[255]');
				$this->form_validation->set_rules('message', display('message'),'required|trim');
				$this->form_validation->set_rules('message_type', "Message Type",'required|trim');
				$this->form_validation->set_rules('subject', "subject",'required|trim');

				/*-------------STORE DATA------------*/
				//$user_id = $this->session->userdata('user_id');
				//$date    = $this->input->post('date');

				$file = $this->fileupload->do_upload(
					'assets/message/',
					'file'
				);

				$data['message'] = (object)$postData = array(
						'to_user'          => $this->input->post('to_user'),
						'from_user' => $this->input->post('from_user'),
						'subject'     => $this->input->post('subject'),
						'message'     => $this->input->post('message'),
						'message_type'     => $this->input->post('message_type'),
						'created_date'    => date("Y-m-d h:i:s"),
						'file'    => (!empty($file)?$file:''),
						'user_type' => 'medical_provider'
				);

				/*-----------CREATE A NEW RECORD-----------*/
			//	if ($this->form_validation->run() === true) {
						if ($this->message_model->create($postData)) {

							if($this->input->post('message_to_user') == "admin"){

								$patient_id = $this->session->userdata('user_id');
								$hospital_id = $this->session->userdata('hospital_id');

								$patientdetail = $this->db->get_where("patient",array("id"=>$patient_id))->row();
								$adminData = $this->db->get_where("user",array("hospital_id"=>$hospital_id))->row();
								//print_r($adminData);exit;
								$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"message","message forward to admin",$patientdetail->fname."  ".$patientdetail->lname." Medical Provider Message forward to ".$adminData->firstname."  ".$adminData->lastname." admin.",$this->session->userdata("hospital_id"),$adminData->user_id,$adminData->firstname."  ".$adminData->lastname,1);

							}else if ($this->input->post('message_to_user') == "medical") {
								$medicalprovider = $this->input->post('to_user');
								$wh = "user.email = '$medicalprovider' and user_role='2'";
								$this->db->select('*');
								$this->db->from('user');
								$this->db->where($wh);
								$allquery = $this->db->get();
								//echo $this->db->last_query();
								$medicalproviderData = $allquery->row();

								$patient_id = $this->session->userdata('user_id');
								$hospital_id = $this->session->userdata('hospital_id');

								$patientdetail = $this->db->get_where("patient",array("id"=>$patient_id))->row();


								$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"message","message forward to medical provider",$patientdetail->fname."  ".$patientdetail->lname."  Medical Provider Message forward to ".$medicalproviderData->firstname."  ".$medicalproviderData->lastname." Medocal Provider.",$this->session->userdata("hospital_id"),$medicalproviderData->user_id,$medicalproviderData->firstname."  ".$medicalproviderData->lastname,2);
							}



								#set success message
								$this->session->set_flashdata('message', "Message send successfully");
						} else {
								#set exception message
								$this->session->set_flashdata('exception',display('please_try_again'));
						}
						redirect('dashboard_doctor/messages/message');
			//	} else {
		//			print_r($data);
			//		exit;
			//		redirect('dashboard_doctor/messages/message');

					//  $data['title'] = display('new_message');
				//    $data['user_list'] = $this->message_model->user_list($user_id);
						//$data['content'] = $this->load->view('dashboard_doctor/messages/new_message',$data,true);
					//  $this->load->view('dashboard_doctor/main_wrapper',$data);
			//	}
		}
		public function forward_message_admin()
		{
   //echo 'tee';
	 //exit;
				/*----------FORM VALIDATION RULES----------*/
				$this->form_validation->set_rules('to_user', "To" ,'required|max_length[11]');
				$this->form_validation->set_rules('from_user', "From",'required|max_length[255]');
				$this->form_validation->set_rules('message', display('message'),'required|trim');
				$this->form_validation->set_rules('message_type', "Message Type",'required|trim');
				$this->form_validation->set_rules('subject', "subject",'required|trim');

				/*-------------STORE DATA------------*/
				//$user_id = $this->session->userdata('user_id');
				//$date    = $this->input->post('date');

				$file = $this->fileupload->do_upload(
					'assets/message/',
					'file'
				);

				$data['message'] = (object)$postData = array(
						'to_user'          => $this->input->post('to_user'),
						'from_user' => $this->input->post('from_user'),
						'subject'     => $this->input->post('subject'),
						'message'     => $this->input->post('message'),
						'message_type'     => $this->input->post('message_type'),
						'created_date'    => date("Y-m-d h:i:s"),
						'file'    => (!empty($file)?$file:''),
						'user_type' => 'medical_admin'
				);

				/*-----------CREATE A NEW RECORD-----------*/
			//	if ($this->form_validation->run() === true) {
						if ($this->message_model->create($postData)) {
								#set success message

								$this->session->set_flashdata('message', "Message send successfully");
						} else {
								#set exception message
								$this->session->set_flashdata('exception',display('please_try_again'));
						}
						redirect('dashboard_doctor/messages/message');
			//	} else {
		//			print_r($data);
			//		exit;
			//		redirect('dashboard_doctor/messages/message');

					//  $data['title'] = display('new_message');
				//    $data['user_list'] = $this->message_model->user_list($user_id);
						//$data['content'] = $this->load->view('dashboard_doctor/messages/new_message',$data,true);
					//  $this->load->view('dashboard_doctor/main_wrapper',$data);
			//	}
		}
		public function forward_message_patient()
		{
		$this->form_validation->set_rules('to_user', "To" ,'required|max_length[11]');
		$this->form_validation->set_rules('from_user', "From",'required|max_length[255]');
		$this->form_validation->set_rules('message', display('message'),'required|trim');
		$this->form_validation->set_rules('message_type', "Message Type",'required|trim');
		$this->form_validation->set_rules('subject', "subject",'required|trim');

		/*-------------STORE DATA------------*/
		//$user_id = $this->session->userdata('user_id');
		//$date    = $this->input->post('date');

		$file = $this->fileupload->do_upload(
			'assets/message/',
			'file'
		);

		$data['message'] = (object)$postData = array(
				'to_user'          => $this->input->post('to_user'),
				'from_user' => $this->input->post('from_user'),
				'subject'     => $this->input->post('subject'),
				'message'     => $this->input->post('message'),
				'message_type'     => $this->input->post('message_type'),
				'created_date'    => date("Y-m-d h:i:s"),
				'file'    => (!empty($file)?$file:''),
				'user_type' => 'medical_patient'
		);

		/*-----------CREATE A NEW RECORD-----------*/
	//  if ($this->form_validation->run() === true) {
				if ($this->message_model->create($postData)) {
						#set success message
						$this->session->set_flashdata('message', "Message send successfully");
				} else {
						#set exception message
						$this->session->set_flashdata('exception',display('please_try_again'));
				}
				redirect('dashboard_doctor/messages/message');
		//}// else {
		//	redirect('dashboard_doctor/messages/message');

			//  $data['title'] = display('new_message');
		//    $data['user_list'] = $this->message_model->user_list($user_id);
				//$data['content'] = $this->load->view('dashboard_doctor/messages/new_message',$data,true);
			//  $this->load->view('dashboard_doctor/main_wrapper',$data);
		//}
		}
   public function mmessage_detail()
	 {
		 $id = $this->input->get('msg_id');
		 $msgdetail = $this->db->select("*")->from("message")->where("message_id",$id)->get()->row();
		 echo json_encode($msgdetail);
	 }
	 public function ammessage_detail()
	 {
		 $id = $this->input->get('msg_id');
		 $msgdetail = $this->db->select("*")->from("message")->where("amessage_id",$id)->get()->row();
		 echo json_encode($msgdetail);
	 }
	 public function readmessage()
 	{
 		$id = $this->input->get('msg_id');
 		$this->db->where('message_id',$id);
		$arr['is_read'] ='1';
		$this->db->update('message',$arr);
		echo $this->db->last_query();
		exit;
 		echo 'success';
 	}
	public function areadmessage()
 {
	 $id = $this->input->get('msg_id');
	 $this->db->where('amessage_id',$id);
	 $arr['is_read'] ='1';
	 $this->db->update('message',$arr);
	 echo $this->db->last_query();
	 exit;
	 echo 'success';
 }
    public function delete($id)
    {

        $this->db->where('message_id',$id);
		$this->db->delete('message');

		$userData =	$this->db->select("*")->from("user")->where("user_id",$this->session->userdata("user_id"))->get()->row();
		$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"message","message delete",$userData->firstname."  ".$userData->lastname." Medical Provider Delete Message at ".date("Y-m-d h:i:s"),$this->session->userdata("hospital_id"),$this->session->userdata("user_id"),$userData->firstname."  ".$userData->lastname,2);

            $this->session->set_flashdata('message', display('delete_successfully'));

        redirect($_SERVER['HTTP_REFERER']);
    }
		public function adelete($id)
    {

        $this->db->where('amessage_id',$id);
				$this->db->delete('message');


            $this->session->set_flashdata('message', display('delete_successfully'));

        redirect($_SERVER['HTTP_REFERER']);
    }
		public function deleteold($id = null, $sender_id = null, $receiver_id = null)
		{
				$user_id = $this->session->userdata('user_id');
				if ($user_id == $sender_id) {
						$condition = "sender_status";
						$this->message_model->delete($id, $condition);
						$this->session->set_flashdata('message', display('delete_successfully'));
				} else if ($user_id == $receiver_id) {
						$condition = "receiver_status";
						$this->message_model->delete($id, $condition);
						$this->session->set_flashdata('message', display('delete_successfully'));
				} else {
						$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect($_SERVER['HTTP_REFERER']);
		}
		function search()
     {
   $p_id = trim($this->input->get_post('p_id'));
   $user_id = $this->session->userdata('user_id');
    $session_email = $this->session->userdata('email');
//echo'hello';
//exit;
       // if($p_id!=''){
         // $sql ="SELECT * FROM message WHERE (user_type ='medical_admin') and (to_user like '%".($p_id)."%' or from_user like '%".($p_id)."%' or subject like '%".($p_id)."%' or message like '%".($p_id)."%' or message_type like '%".($p_id)."%') ORDER BY message_id DESC";
         $sql ="SELECT * FROM message WHERE (to_user = '$session_email' or from_user= '$session_email' AND user_type ='medical_admin') and (to_user like '%".($p_id)."%' or from_user like '%".($p_id)."%' or subject like '%".($p_id)."%' or message like '%".($p_id)."%' or message_type like '%".($p_id)."%') ORDER BY message_id DESC";
         $query = $this->db->query($sql);
          $searchdetail =  $query->result();
				//	echo $this->db->last_query();
				//	exit;
          if(count($searchdetail)>0){
            $data = $searchdetail;
          }else{
            $data = array();
          }


           echo json_encode($data);
         // }else{
         //   $ds = "";
         //   echo json_encode($ds);

     }
		 function patientmsgsearch()
      {
    $p_id = trim($this->input->get_post('p_id'));
    $user_id = $this->session->userdata('user_id');
    $session_email = $this->session->userdata('email');

        // if($p_id!=''){
          // $sql ="SELECT * FROM message WHERE (user_type ='medical_patient') and (to_user like '%".($p_id)."%' or from_user like '%".($p_id)."%' or subject like '%".($p_id)."%' or message like '%".($p_id)."%' or message_type like '%".($p_id)."%') ORDER BY message_id DESC";
     $sql ="SELECT * FROM message WHERE (user_type ='medical_patient' AND to_user = '$session_email' or from_user= '$session_email') and (to_user like '%".($p_id)."%' or from_user like '%".($p_id)."%' or subject like '%".($p_id)."%' or message like '%".($p_id)."%' or message_type like '%".($p_id)."%') ORDER BY message_id DESC";
          $query = $this->db->query($sql);
           $searchdetail =  $query->result();
 					//echo $this->db->last_query();
           if(count($searchdetail)>0){
             $data = $searchdetail;
           }else{
             $data = array();
           }


            echo json_encode($data);
          // }else{
          //   $ds = "";
          //   echo json_encode($ds);

          // }

      }

}
