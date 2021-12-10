<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
            'messages/message_model'
		));

        if ($this->session->userdata('isLogIn') == false
            || $this->session->userdata('user_role') != 1
        )
        redirect('login');
	}

    public function index()
    {
        $data['title']    =  display('inbox');
        $user_id = $this->session->userdata('user_id');
				$session_email = $this->session->userdata('email');
        #-------------------------------#
				// patient
				$this->db->select('*');
				$this->db->from('message');
				//$this->db->join('patient', 'message.to_user = patient.email');
				$wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
				$this->db->where('message.user_type','patient_admin');
				$this->db->where($wh);
				$this->db->order_by('message.created_date','desc');
				$allquery = $this->db->get();
				$data['all_patient'] = $allquery->result();

				// $sql ="SELECT * FROM message WHERE (user_type ='patient_admin' AND to_user = '$session_email' or from_user= '$session_email') ORDER BY message_id DESC";
			 //        $query = $this->db->query($sql);
			 //        $data['all_patient'] =  $query->result();


				$this->db->select('*');
				$this->db->from('message');
				$wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
				//$this->db->join('patient', 'message.to_user = patient.email');
				$this->db->where('message.user_type','patient_admin');
				$this->db->where($wh);
				$this->db->where('message.is_read','0');
				$allquery = $this->db->get();
				$data['all_patient_count'] = $allquery->result();

				$this->db->select('*');
				$this->db->from('message');
			//	$this->db->join('patient', 'message.to_user = patient.email');
				$this->db->where('message.user_type','patient_admin');
				$this->db->where('message.to_user',$session_email);
				$this->db->order_by('message.created_date','desc');
				$iquery = $this->db->get();
				$data['patient_incoming'] = $iquery->result();

				$this->db->select('*');
				$this->db->from('message');
				//$this->db->join('patient', 'message.to_user = patient.email');
				$this->db->where('message.user_type','patient_admin');
				$this->db->where('message.to_user',$session_email);
				$this->db->where('message.is_read','0');
				$iquery = $this->db->get();
				$data['patient_incoming_count'] = $iquery->result();

				$this->db->select('*');
				$this->db->from('message');
			//	$this->db->join('patient', 'message.from_user = patient.email');
				$this->db->where('message.user_type','patient_admin');
				$this->db->where('message.from_user',$session_email);
				$this->db->order_by('message.created_date','desc');
				$squery = $this->db->get();
				$data['patient_sent'] = $squery->result();

				$this->db->select('*');
				$this->db->from('message');
				//$this->db->join('patient', 'message.from_user = patient.email');
				$this->db->where('message.from_user',$session_email);
				$this->db->where('message.user_type','patient_admin');
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
				$this->db->where('message.user_type','medical_provider');
				$this->db->where('message.from_user',$session_email);
			//	$this->db->where('user.role_id','2');
				$this->db->order_by('message.is_read');
				$mquery = $this->db->get();
				$data['medical_sent'] = $mquery->result();
				$this->db->select('*');
				$this->db->from('message');
			//	$this->db->join('user', 'message.from_user = user.email');
				$this->db->where('message.user_type','medical_provider');
				$this->db->where('message.from_user',$session_email);
			//	$this->db->where('user.role_id','2');
				$this->db->where('message.is_read','0');
				$mquery = $this->db->get();
				$data['medical_sent_count'] = $mquery->result();
				//echo $this->db->last_query()
			//	$wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
				$this->db->select('*');
				$this->db->from('message');
				//$this->db->join('user', 'message.to_user = user.email');
				$this->db->where('message.to_user',$session_email);
				$this->db->where('message.user_type','medical_provider');
				//	$this->db->where('user.role_id','2');
				$this->db->order_by('message.is_read');
				$miquery = $this->db->get();
				$data['medical_incoming'] = $miquery->result();

				$this->db->select('*');
				$this->db->from('message');
				$this->db->where('message.to_user',$session_email);
			//	$this->db->join('user', 'message.to_user = user.email');
				$this->db->where('message.user_type','medical_provider');
				//	$this->db->where('user.role_id','2');
				$this->db->where('message.is_read','0');
				$miquery = $this->db->get();
				$data['medical_incoming_count'] = $miquery->result();
				// medical

				// admin
				$wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
				$this->db->select('*');
				$this->db->from('message');
				$this->db->where('message.user_type','medical_admin');
				$this->db->where($wh);
				$this->db->order_by('message.is_read');
				$allquery = $this->db->get();
				$data['all_admin'] = $allquery->result();

				$wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
				$this->db->select('*');
				$this->db->from('message');
				$this->db->where('message.user_type','medical_admin');
				$this->db->where('message.is_read','0');
				$this->db->where($wh);
				$allquery = $this->db->get();
				$data['all_admin_count'] = $allquery->result();

				//admin sent
				$this->db->select('*');
				$this->db->from('message');
				$this->db->where('message.from_user',$session_email);
				$this->db->where('message.user_type','medical_admin');
				$this->db->order_by('message.is_read');
				$mquery = $this->db->get();
				$data['admin_sent'] = $mquery->result();

				$this->db->select('*');
				$this->db->from('message');
				$this->db->where('message.from_user',$session_email);
				$this->db->where('message.user_type','medical_admin');
				$this->db->where('message.is_read','0');
				$mquery = $this->db->get();
				$data['admin_sent_count'] = $mquery->result();

				//admin Incoming
				$this->db->select('*');
				$this->db->from('message');
				$this->db->where('message.to_user',$session_email);
				$this->db->where('message.user_type','medical_admin');
				$this->db->order_by('message.is_read');
				$miquery = $this->db->get();
				$data['admin_incoming'] = $miquery->result();

				$this->db->select('*');
				$this->db->from('message');
				$this->db->where('message.to_user',$session_email);
				$this->db->where('message.user_type','medical_admin');
				$this->db->where('message.is_read','0');
				$miquery = $this->db->get();
				$data['admin_incoming_count'] = $miquery->result();
				// admin


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
        $data['content']  = $this->load->view('messages/inbox' ,$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }

		
	public function sent()
	{
        $data['title']    =  display('sent');
        $user_id = $this->session->userdata('user_id');
		#-------------------------------#
		$data['messages'] = $this->message_model->sent($user_id);
		$data['content'] = $this->load->view('messages/sent' ,$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
	// public function contact_read()
 // {
	//  $id = $this->input->get('msg_id');
	//  $this->db->where('contact_id',$id);
	//  $arr['is_read'] ='1';
	//  $this->db->update('contact_super_admin',$arr);
	//  //echo $this->db->last_query();
	//  //exit;
	//  echo 'success';
 // }
 public function contact_read()
 {
	$id = $this->input->get('msg_id');
//	$read = $this->db->select("*")->from("contact_super_admin")->where("from_user_id",$id)->where('is_read','0')->order_by('date','DESC')->get()->result();
	$read = $this->db->select("*")->from("contact_super_admin")->where("to_user_id",$id)->where('is_read','0')->order_by('date','DESC')->get()->result();
	foreach($read as $vl){
		$ds[] = $vl->contact_id;
	}
	$this->db->where_in('contact_id',$ds);
	$arr['is_read'] ='1';
	$this->db->update('contact_super_admin',$arr);
	//echo $this->db->last_query();
	//exit;
	echo 'success';
 }
	public function contact_admin()
	{

		$data['title']    =  display('inbox');
        $user_id = $this->session->userdata('user_id');
        #-------------------------------#
		$this->db->select('*');
		$this->db->from('contact_super_admin');
		$this->db->where('from_user_id =',$user_id);
		$this->db->group_by('from_email_address');
		$allquery = $this->db->get();
		$data['all_message'] = $allquery->result();

		// $this->db->select('*');
		// $this->db->from('contact_super_admin');
		// $this->db->where('(to_user_id = "'.$user_id.'" OR from_user_id = "'.$user_id.'")');
		// $allquery = $this->db->get();
		// $data['all_message'] = $allquery->result();

		// $data['messages'] = $this->message_model->sent($user_id);
        $data['content'] = $this->load->view('messages/contact_admin' ,$data,true);
        $this->load->view('layout/main_wrapper',$data);
	}
	public function getAllMsgData(){
        $userid = $this->input->post('from_user_id');
        if(!empty($userid)){
            	$this->db->select('*');
				$this->db->from('contact_super_admin');
				$this->db->where('(to_user_id = "'.$userid.'" OR from_user_id = "'.$userid.'")');
				$this->db->order_by('contact_id','DESC');
				$allquery = $this->db->get();
				$messageData = $allquery->result();
				// $message['sander'] = array();
				$s = 0;
				$r = 0;
            	foreach ($messageData as $msg) {
            		if($userid == $msg->from_user_id){
            			$type = 1; // Sander
            		  }else{
            		  	$type = 2; // reciver
            		  }
            			$message['msg'][$s]['contact_id'] = $msg->contact_id;
            			$message['msg'][$s]['date'] 	= $msg->date;
            			$message['msg'][$s]['from_email_address'] = $msg->from_email_address;
            			$message['msg'][$s]['to_email_address'] = $msg->to_email_address;
            			$message['msg'][$s]['from_user_id'] = $msg->from_user_id;
            			$message['msg'][$s]['to_user_id'] = $msg->to_user_id;
            			$message['msg'][$s]['message'] = $msg->message;
            			$message['msg'][$s]['subject'] = $msg->subject;
            			$message['msg'][$s]['file'] = $msg->file ? $msg->file : '';
            			$message['msg'][$s]['type'] = $type;
            			$s++;
            	}
            // Return data as JSON format
            echo json_encode($message);
        }
    }

   public function search_messages()
	{
		$search = trim($this->input->get_post('search'));
	//echo'hello';
	//exit;
		$user_id = $this->session->userdata('user_id');
		// $this->db->where('from_user_id',$user_id);
			// $sql ="SELECT * FROM contact_super_admin WHERE (from_email_address like '%".($p_id)."%') ORDER BY message_id DESC";
			$query = $this->db->like('from_email_address', $search)->where('from_user_id',$user_id)->group_by('from_email_address')->order_by('contact_id')->get('contact_super_admin');
    //return $query->result();
			// $query = $this->db->query($sql);
			$searchdetail =  $query->result();
			// var_dump($searchdetail);
			// echo $this->db->last_query();
		if(count($searchdetail)>0){
			$data = $searchdetail;
		}else{
			$data = array();
		}
			echo json_encode($data);
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
        $data['content'] = $this->load->view('messages/inbox_information',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }

    public function sent_information($id = null, $receiver_id = null)
    {
        $data['title'] = display('messages');
        $sender_id = $this->session->userdata('user_id');
        #-------------------------------#
        $data['message'] = $this->message_model->sent_information($id, $sender_id, $receiver_id);
        $data['content'] = $this->load->view('messages/sent_information',$data,true);
        $this->load->view('layout/main_wrapper',$data);
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
			'user_type' => 'patient_admin'
        );

        $userData = $this->db->select("*")->from("user")->where("email",$this->input->post('from_user'))->get()->row();
        

        /*-----------CREATE A NEW RECORD-----------*/
      //  if ($this->form_validation->run() === true) {
            if ($this->message_model->create($postData)) {

            	$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"contacttosupport","Send Message Contact To Support",
                $userData->firstname." ".$userData->lastname." Send Message To Super Admin at ".date("d-m-Y h:i:s"),$this->session->userdata("hospital_id"),$userData->user_id,$userData->firstname." ".$userData->lastname,11);
                #set success message
                $this->session->set_flashdata('message', "Message send successfully");
            } else {
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
            }
            redirect('messages/message');
        //}// else {
				//	redirect('messages/message');

          //  $data['title'] = display('new_message');
        //    $data['user_list'] = $this->message_model->user_list($user_id);
            //$data['content'] = $this->load->view('messages/new_message',$data,true);
          //  $this->load->view('layout/main_wrapper',$data);
        //}
    }
public function new_message_admin()
    {

        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('to_email_address', "To" ,'required|max_length[11]');
        $this->form_validation->set_rules('from_email_address', "From",'required|max_length[255]');
        $this->form_validation->set_rules('message', display('message'),'required|trim');
		//$this->form_validation->set_rules('message_type', "Message Type",'required|trim');
		$this->form_validation->set_rules('subject', "subject",'required|trim');

        /*-------------STORE DATA------------*/
        //$user_id = $this->session->userdata('user_id');
        //$date    = $this->input->post('date');

				$file = $this->fileupload->do_upload(
					'assets/message/',
					'file'
				);

        $data['message'] = (object)$postData = array(
            'from_user_id'          => $this->input->post('from_user_id'),
            'from_email_address' => $this->input->post('from_email_address'),
            'to_user_id'     => $this->input->post('to_user_id'),
            'to_email_address'     => $this->input->post('to_email_address'),
			'message'     => $this->input->post('message'),
			'subject'     => $this->input->post('subject'),
			'date'    => date("Y-m-d h:i:s"),
			'is_read'    => 0,
			'file'    => (!empty($file)?$file:''),
          //  'created_date'    => date("Y-m-d h:i:s"),
					//	'user_type' => 'patient_admin'
        );
        $attched_file = base_url().$file;

        $this->db->insert('contact_super_admin',$data['message']);
		$insert_id = $this->db->insert_id();

		$this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from('sahil@gtimecs.org', 'Super Admin New Message');
        $this->email->to($this->input->post('to_email_address'));

        $userData = $this->db->select("*")->from("user")->where("user_id",$this->input->post('from_user_id'))->get()->row();

        $subject = $this->input->post('subject');
        $send_body = "";
        $send_body .= "<p>Hi! Someone want to contact with you.</p>";
        $send_body .= "Name : " . $userData->firstname.' '.$userData->lastname ."<br>";
		$send_body .= "Email : " . $this->input->post('from_email_address') . "<br>";
        $send_body .= "Message : " . $this->input->post('message') . "<br>";

        $this->email->subject($subject);
        $this->email->message($send_body);
        $this->email->attach($attched_file);
        $this->email->send();
        /*-----------CREATE A NEW RECORD-----------*/
      //  if ($this->form_validation->run() === true) {
            if ($insert_id) {

            	$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"contacttosupport","Send Message Contact To Support",
                $userData->firstname." ".$userData->lastname." Send Message To Admin at ".date("d-m-Y h:i:s"),$this->session->userdata("hospital_id"),$userData->user_id,$userData->firstname." ".$userData->lastname,11);
                
                #set success message
                $this->session->set_flashdata('message', "Message send successfully");
            } else {
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
            }
            redirect('messages/message/contact_admin');
        //}// else {
				//	redirect('messages/message');

          //  $data['title'] = display('new_message');
        //    $data['user_list'] = $this->message_model->user_list($user_id);
            //$data['content'] = $this->load->view('messages/new_message',$data,true);
          //  $this->load->view('layout/main_wrapper',$data);
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

				$file = $this->fileupload->do_upload(
					'assets/message/',
					'file'
				);

                $isadmin = $this->session->userdata('isadmin');
                // $user_type = 'medical_admin';
                if($isadmin==1){
                	$user_type = 'medical_provider';
                }else{
                	$user_type = 'medical_admin';
                }

                $userData = $this->db->select("*")->from("user")->where("email",$this->input->post('from_user'))->get()->row();

				$data['message'] = (object)$postData = array(
						'to_user'          => $this->input->post('to_user'),
						'from_user' => $this->input->post('from_user'),
						'subject'     => $this->input->post('subject'),
						'message'     => $this->input->post('message'),
						'message_type'     => $this->input->post('message_type'),
						'created_date'    => date("Y-m-d h:i:s"),
						'file'    => (!empty($file)?$file:''),
						'user_type' => $user_type
				);
				
				/*-----------CREATE A NEW RECORD-----------*/
				//if ($this->form_validation->run() === true) {
						if ($this->message_model->create($postData)) {
							$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"contacttosupport","Send Message Contact To Support", $userData->firstname." ".$userData->lastname." Send Message To Super Admin at ".date("d-m-Y h:i:s"),$this->session->userdata("hospital_id"),$userData->user_id,$userData->firstname." ".$userData->lastname,11);

								#set success message
								$this->session->set_flashdata('message', "Message send successfully");
						} else {
								#set exception message
								$this->session->set_flashdata('exception',display('please_try_again'));
						}
						redirect('messages/message');
				//} //else {
					//redirect('messages/message');

					//  $data['title'] = display('new_message');
				//    $data['user_list'] = $this->message_model->user_list($user_id);
						//$data['content'] = $this->load->view('messages/new_message',$data,true);
					//  $this->load->view('layout/main_wrapper',$data);
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

			 $isadmin = $this->session->userdata('isadmin');
                // $user_type = 'medical_admin';
                if($isadmin==1){
                	$user_type = 'medical_provider';
                }else{
                	$user_type = 'medical_admin';
                }
				$data['message'] = (object)$postData = array(
						'to_user'          => $this->input->post('to_user'),
						'from_user' => $this->input->post('from_user'),
						'subject'     => $this->input->post('subject'),
						'message'     => $this->input->post('message'),
						'message_type'     => $this->input->post('message_type'),
						'created_date'    => date("Y-m-d h:i:s"),
						'file'    => (!empty($file)?$file:''),
						'user_type' => $user_type
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
						redirect('messages/message');
			//	} else {
		//			print_r($data);
			//		exit;
			//		redirect('messages/message');

					//  $data['title'] = display('new_message');
				//    $data['user_list'] = $this->message_model->user_list($user_id);
						//$data['content'] = $this->load->view('messages/new_message',$data,true);
					//  $this->load->view('layout/main_wrapper',$data);
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
				'user_type' => 'patient_admin'
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
				redirect('messages/message');
		//}// else {
		//	redirect('messages/message');

			//  $data['title'] = display('new_message');
		//    $data['user_list'] = $this->message_model->user_list($user_id);
				//$data['content'] = $this->load->view('messages/new_message',$data,true);
			//  $this->load->view('layout/main_wrapper',$data);
		//}
		}
		public function new_message_medical_admin()
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
						redirect('messages/message');
				//} //else {
					//redirect('dashboard_doctor/messages/message');

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
						redirect('messages/message');
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
   public function getMedicalAdminById()
	 {
		    $to_user_val = $this->input->post('to_user_val');
		    $login_email = $this->session->userdata('email');
            $user_id =$this->session->userdata('user_id');
            $created_by_id = $this->session->userdata('created_by');
            $isadmin = $this->session->userdata('isadmin');
            $ignore = array($login_email);
            if($to_user_val == 'admin'){
			    if($isadmin==1){
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
	            }else{
	              $medical_drop = $this->db->select("*")->from("user")->where("created_by",$user_id)->where("is_admin",'1')->where("find_in_set('message', features)")->where_not_in("email",$ignore)->get()->result();
	            }
	        }
	        if($to_user_val == 'medical'){
		        if($isadmin==1){
		            $medical_drop = $this->db->select("*")->from("user")->where("created_by",$created_by_id)->where("user_role",'2')->where("find_in_set('message', features)")->where_not_in("email",$ignore)->get()->result();
		        }else{
		            $medical_drop = $this->db->select("*")->from("user")->where("created_by",$user_id)->where("user_role",'2')->where("find_in_set('message', features)")->where_not_in("email",$ignore)->get()->result();
			       }
		    }

		 echo json_encode($medical_drop);
	 }
 public function mmessage_detail()
	 {
		 $id = $this->input->get('msg_id');
		 $msgdetail = $this->db->select("*")->from("message")->where("message_id",$id)->get()->row();
		 echo json_encode($msgdetail);
	 }
	 public function readmessage()
 	{
 		$id = $this->input->get('msg_id');
 		$this->db->where('message_id',$id);
		$arr['is_read'] ='1';
		$this->db->update('message',$arr);
 		echo 'success';
 	}

	public function areadmessage()
 {
	 $id = $this->input->get('msg_id');
	 $this->db->where('amessage_id',$id);
	 $arr['is_read'] ='1';
	 $this->db->update('admin_message',$arr);
	 echo $this->db->last_query();
	 exit;
	 echo 'success';
 }
 public function adelete($id)
 {

		 $this->db->where('amessage_id',$id);
		 $this->db->delete('admin_message');


				 $this->session->set_flashdata('message', display('delete_successfully'));

		 redirect($_SERVER['HTTP_REFERER']);
 }
 public function ammessage_detail()
 {
	 $id = $this->input->get('msg_id');
	 $msgdetail = $this->db->select("*")->from("admin_message")->where("amessage_id",$id)->get()->row();
	 echo json_encode($msgdetail);
 }
    public function delete($id)
    {

        $this->db->where('message_id',$id);
		$this->db->delete('message');
		$userData =	$this->db->select("*")->from("user")->where("user_id",$this->session->userdata("user_id"))->get()->row();
		 

		$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"message","message delete",$userData->firstname."  ".$userData->lastname." Admin Delete Message at ".date("Y-m-d h:i:s"),$this->session->userdata("hospital_id"),$this->session->userdata("user_id"),$userData->firstname."  ".$userData->lastname,1);


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
       // if($p_id!=''){
         $sql ="SELECT * FROM message WHERE (to_user = '$session_email' or from_user= '$session_email' AND user_type ='medical_admin') and (to_user like '%".($p_id)."%' or from_user like '%".($p_id)."%' or subject like '%".($p_id)."%' or message like '%".($p_id)."%' or message_type like '%".($p_id)."%') ORDER BY message_id DESC";
         $query = $this->db->query($sql);
          $searchdetail =  $query->result();
		//echo $this->db->last_query(); die;
          if(count($searchdetail)>0){
            $data = $searchdetail;
          }else{
            $data = $searchdetail;
          }


           echo json_encode($data);
         // }else{
         //   $ds = "";
         //   echo json_encode($ds);

         // }

     }
		 function patientmsgsearch()
      {
    $p_id = trim($this->input->get_post('p_id'));

        // if($p_id!=''){
        	$user_id = $this->session->userdata('user_id');
				$session_email = $this->session->userdata('email');
        #-------------------------------#
				$this->db->select('*');
				$this->db->from('message');
				//$this->db->join('patient', 'message.to_user = patient.email');
				$wh = "(message.to_user= '$session_email' or message.from_user= '$session_email')";
				// $this->db->where('message.user_type','patient_admin');
				$this->db->where($wh);
					$this->db->order_by('message.is_read');
				$allquery = $this->db->get();
				$data['all_patient'] = $allquery->result();

          $sql ="SELECT * FROM message WHERE (user_type ='patient_admin' AND to_user = '$session_email' or from_user= '$session_email') and (to_user like '%".($p_id)."%' or from_user like '%".($p_id)."%' or subject like '%".($p_id)."%' or message like '%".($p_id)."%' or message_type like '%".($p_id)."%') ORDER BY message_id DESC";
          $query = $this->db->query($sql);
           $searchdetail =  $query->result();
 			// echo $this->db->last_query();
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
