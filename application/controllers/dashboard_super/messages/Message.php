<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
            'dashboard_super/messages/message_model'
		));

        if ($this->session->userdata('isLogIn') == false
            || $this->session->userdata('user_role') != 11
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
		$this->db->select('*');
		$this->db->from('contact_super_admin');
		$this->db->group_by("from_email_address");
		$this->db->where('from_user_id !=',$user_id);
		$this->db->order_by('date','DESC');
		$allquery = $this->db->get();
		$data['all_message'] = $allquery->result();
        $data['content']  = $this->load->view('dashboard_super/messages/inbox' ,$data,true);
        $this->load->view('dashboard_super/main_wrapper',$data);
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

	public function sent()
	{
        $data['title']    =  display('sent');
        $user_id = $this->session->userdata('user_id');
		#-------------------------------#
		$data['messages'] = $this->message_model->sent($user_id);
		$data['content'] = $this->load->view('dashboard_super/messages/sent' ,$data,true);
		$this->load->view('dashboard_super/main_wrapper',$data);
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
        $data['content'] = $this->load->view('dashboard_super/messages/inbox_information',$data,true);
        $this->load->view('dashboard_super/main_wrapper',$data);
    }

    public function sent_information($id = null, $receiver_id = null)
    {
        $data['title'] = display('messages');
        $sender_id = $this->session->userdata('user_id');
        #-------------------------------#
        $data['message'] = $this->message_model->sent_information($id, $sender_id, $receiver_id);
        $data['content'] = $this->load->view('dashboard_super/messages/sent_information',$data,true);
        $this->load->view('dashboard_super/main_wrapper',$data);
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

        /*-----------CREATE A NEW RECORD-----------*/
      //  if ($this->form_validation->run() === true) {
            if ($this->message_model->create($postData)) {
                #set success message
                $this->session->set_flashdata('message', "Message send successfully");
            } else {
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
            }
            redirect('dashboard_super/messages/message');
        //}// else {
				//	redirect('dashboard_super/messages/message');

          //  $data['title'] = display('new_message');
        //    $data['user_list'] = $this->message_model->user_list($user_id);
            //$data['content'] = $this->load->view('dashboard_super/messages/new_message',$data,true);
          //  $this->load->view('dashboard_super/main_wrapper',$data);
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
				//if ($this->form_validation->run() === true) {
						if ($this->message_model->create($postData)) {
								#set success message
								$this->session->set_flashdata('message', "Message send successfully");
						} else {
								#set exception message
								$this->session->set_flashdata('exception',display('please_try_again'));
						}
						redirect('dashboard_super/messages/message');
				//} //else {
					//redirect('dashboard_super/messages/message');

					//  $data['title'] = display('new_message');
				//    $data['user_list'] = $this->message_model->user_list($user_id);
						//$data['content'] = $this->load->view('dashboard_super/messages/new_message',$data,true);
					//  $this->load->view('dashboard_super/main_wrapper',$data);
			//	}
		}
		public function new_message_admin()
		{
				
				/*----------FORM VALIDATION RULES----------*/
				$this->form_validation->set_rules('to_email_address', "To" ,'required|max_length[11]');
		        $this->form_validation->set_rules('from_email_address', "From",'required|max_length[255]');
		        $this->form_validation->set_rules('message', display('message'),'required|trim');
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
			            'to_email_address'   => $this->input->post('to_email_address'),
						'message'     => $this->input->post('message'),
						'subject'     => $this->input->post('subject'),
						'date'    => date("Y-m-d h:i:s"),
						'file'    => (!empty($file)?$file:''),
						// 'user_type' => 'medical_admin'
				);
				$attched_file = base_url().$file;

				$this->db->insert('contact_super_admin',$data['message']);
				$insert_id = $this->db->insert_id();

				$this->load->library('email');
		        $config['mailtype'] = 'html';
		        $this->email->initialize($config);
		        $this->email->from('sahil@gtimecs.org', 'Admin New Message');
		        $this->email->to($this->input->post('to_email_address'));

		        $userData = $this->db->select("*")->from("user")->where("user_id",$this->input->post('from_user_id'))->get()->row();
		        $AdminData = $this->db->select("*")->from("user")->where("user_id",$this->input->post('to_user_id'))->get()->row();

		        $subject = $this->input->post('subject');
		        $send_body = "";
		        $send_body .= "<p>Hi! Someone want to contact with you.</p>";
		        $send_body .= "Name : " . $userData->firstname.' '.$userData->lastname ."<br>";
		        $send_body .= "Email : " . $this->input->post('from_email_address') . "<br>";
		        $send_body .= "Message : " . $this->input->post('message') . "<br>";

		        $this->email->subject($subject);
		        $this->email->message($send_body);
		        // $this->email->attach('http://emr.gthealthsystem.com/assets/message/2020-11-27/_.png');
		        $this->email->attach($attched_file);
		        $this->email->send();

				// echo $this->db->last_query(); die;
				/*-----------CREATE A NEW RECORD-----------*/
				//if ($this->form_validation->run() === true) {
						if ($insert_id) {

							$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"contacttosupport","Add Support",
                " Super Admin send message to ".$AdminData->firstname.' '.$AdminData->lastname ."  at ".date("Y-m-d h:i:s"),($this->session->userdata("hospital_id")!="") ? $this->session->userdata("hospital_id") : $this->session->userdata("user_role"),$userData->user_id,$AdminData->firstname." ".$AdminData->lastname,11);
							//echo $this->db->last_query();exit;
								#set success message
								$this->session->set_flashdata('message', "Message send successfully");
						} else {
								#set exception message
								$this->session->set_flashdata('exception',display('please_try_again'));
						}
						redirect('dashboard_super/messages/message');
			//} else {
					// redirect('dashboard_super/messages/message');

					//  $data['title'] = display('new_message');
				 //     $data['user_list'] = $this->message_model->user_list($user_id);
					//  $data['content'] = $this->load->view('dashboard_super/messages/new_message',$data,true);
					//  $this->load->view('dashboard_super/main_wrapper',$data);
				//}
		}
		// Sand email
		  public function sendContactUsMail($postData) {
		      $arr['name'] = $postData['name'];
		      $arr['email'] = $postData['email'];
		      $arr['phone'] = $postData['phone'];
		      $arr['message'] = $postData['message'];
		      if (!empty($arr)) {

		        $this->load->library('email');
		        $config['mailtype'] = 'html';
		        $this->email->initialize($config);
		        $this->email->from('info@place-me.uk', 'Place Me uk');
		        $this->email->to($arr['email']);

		        $subject = "Contact Us Inquiry";
		        $send_body = "";
		        $send_body .= "<p>Hi! Someone want to contact with you.</p>";
		        $send_body .= "Name : " . $arr['name'] . "<br>";
		        $send_body .= "Email : " . $arr['email'] . "<br>";
		        $send_body .= "Phone no : " . $arr['phone'] . "<br>";
		        $send_body .= "Message : " . $arr['message'] . "<br>";

		        $this->email->subject($subject);
		        $this->email->message($send_body);
		       if($this->email->send()){
		          $json['success'] = 1;
		          $json['message'] = "Thank you - your message has been received and we endeavor to respond to you within 24 hours.";
		       }else{
		          $json['success'] = 0;
		          $json['message'] = "Opps.. Something went wrong. Please try again later.";
		       }
		  }else {
		      $json['success'] = 0;
		      $json['message'] = "Parameter Missing!";
		    }
		    return $json;
		}
		// Sand email
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
								#set success message

								$this->session->set_flashdata('message', "Message send successfully");
						} else {
								#set exception message
								$this->session->set_flashdata('exception',display('please_try_again'));
						}
						redirect('dashboard_super/messages/message');
			//	} else {
		//			print_r($data);
			//		exit;
			//		redirect('dashboard_super/messages/message');

					//  $data['title'] = display('new_message');
				//    $data['user_list'] = $this->message_model->user_list($user_id);
						//$data['content'] = $this->load->view('dashboard_super/messages/new_message',$data,true);
					//  $this->load->view('dashboard_super/main_wrapper',$data);
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
						redirect('dashboard_super/messages/message');
			//	} else {
		//			print_r($data);
			//		exit;
			//		redirect('dashboard_super/messages/message');

					//  $data['title'] = display('new_message');
				//    $data['user_list'] = $this->message_model->user_list($user_id);
						//$data['content'] = $this->load->view('dashboard_super/messages/new_message',$data,true);
					//  $this->load->view('dashboard_super/main_wrapper',$data);
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
				redirect('dashboard_super/messages/message');
		//}// else {
		//	redirect('dashboard_super/messages/message');

			//  $data['title'] = display('new_message');
		//    $data['user_list'] = $this->message_model->user_list($user_id);
				//$data['content'] = $this->load->view('dashboard_super/messages/new_message',$data,true);
			//  $this->load->view('dashboard_super/main_wrapper',$data);
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
		//echo $this->db->last_query();
		//exit;
 		echo 'success';
 	}
	public function contact_read()
 {
	 $id = $this->input->get('msg_id');
	 $read = $this->db->select("*")->from("contact_super_admin")->where("from_user_id",$id)->where('is_read','0')->order_by('date','DESC')->get()->result();
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
	public function areadmessage()
 {
	 $id = $this->input->get('msg_id');
	 $this->db->where('amessage_id',$id);
	 $arr['is_read'] ='1';
	 $this->db->update('message',$arr);
	 //echo $this->db->last_query();
	// exit;
	 echo 'success';
 }
    public function delete($id)
    {
    	$user_id = $this->session->userdata('user_id');
    	$userData = $this->db->query("select * from user where user_id='$user_id'")->row();
        $this->db->where('message_id',$id);
		$this->db->delete('message');

		$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"contacttosupport","Delete support",
                "  Admin Delete Suppert Message at ".date("Y-m-d h:i:s"),($this->session->userdata("hospital_id")!="") ? $this->session->userdata("hospital_id") : $this->session->userdata("user_role"),$userData->user_id,$userData->firstname."  ".$userData->lastname,11);

         $this->session->set_flashdata('message', display('delete_successfully'));
        redirect($_SERVER['HTTP_REFERER']);
    }

   public function delete_admin_mag($id)
    {
    	$user_id = $this->session->userdata('user_id');
        $this->db->where('from_user_id',$id);
		$this->db->delete('contact_super_admin');

		$this->db->where('to_user_id',$id);
		$this->db->delete('contact_super_admin');

		$userData = $this->db->query("select * from user where user_id='$user_id'")->row();

		$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"contacttosupport","Delete support",
                " Super Admin Delete Suppert Message at ".date("Y-m-d h:i:s"),($this->session->userdata("hospital_id")!="") ? $this->session->userdata("hospital_id") : $this->session->userdata("user_role"),$userData->user_id,$userData->firstname."  ".$userData->lastname,11);

		// echo $this->db->last_query(); die;
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
//echo'hello';
//exit;
       if($p_id!=''){
         $sql ="SELECT * FROM message WHERE (user_type ='medical_admin') and (to_user like '%".($p_id)."%' or from_user like '%".($p_id)."%' or subject like '%".($p_id)."%' or message like '%".($p_id)."%' or message_type like '%".($p_id)."%') ORDER BY message_id DESC";
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
         }else{
           $ds = "";
           echo json_encode($ds);

         }

     }
		 function patientmsgsearch()
      {
    $p_id = trim($this->input->get_post('p_id'));

        if($p_id!=''){
          $sql ="SELECT * FROM message WHERE (user_type ='medical_patient') and (to_user like '%".($p_id)."%' or from_user like '%".($p_id)."%' or subject like '%".($p_id)."%' or message like '%".($p_id)."%' or message_type like '%".($p_id)."%') ORDER BY message_id DESC";
          $query = $this->db->query($sql);
           $searchdetail =  $query->result();
 					//echo $this->db->last_query();
           if(count($searchdetail)>0){
             $data = $searchdetail;
           }else{
             $data = array();
           }


            echo json_encode($data);
          }else{
            $ds = "";
            echo json_encode($ds);

          }

      }
	public function search_messages()
	{
		$search = trim($this->input->get_post('search'));
	//echo'hello';
	//exit;
		$user_id = $this->session->userdata('user_id');
		$this->db->where('from_user_id !=',$user_id);
			// $sql ="SELECT * FROM contact_super_admin WHERE (from_email_address like '%".($p_id)."%') ORDER BY message_id DESC";
			$query = $this->db->like('from_email_address', $search)->where('from_user_id !=',$user_id)->group_by('from_email_address')->order_by('contact_id')->get('contact_super_admin');
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
	// public function delete_message($id)
 //    {

 //        $this->db->where('message_id',$id);
	// 	$this->db->delete('contact_super_admin');
 //            $this->session->set_flashdata('message', display('delete_successfully'));
 //        redirect($_SERVER['HTTP_REFERER']);
 //    }

}
