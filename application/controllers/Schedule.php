<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'schedule_model',
			'doctor_model'
		));

		if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 1)
			redirect('login');

	}

	public function index()
	{
	//	print_r($_SESSION);
		$session_id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
        if($isadmin == 1){
        	$session_id = $created_by_id;
        }
		$data['title'] = display('schedule_list');
		$data['schedules'] = $this->schedule_model->read();
		$date = date('Y-m-d');
		$data['schedulestoday'] = $this->db->select("*")->from("schedule")->where("hospital_id",$session_id)->where("whens",$date)->order_by('whens','asc')->get()->result();
//echo "<pre>";
	//	print_r($data);
	//	exit;
	//	echo $this->db->last_query();
		//exit;
$where_in = 'schedule';
	//	if($isadmin == 1){
	//		$doctor_detail = $this->db->select("*")->from("user")->where("user_role","2")->where('user.created_by',$created_by_id)->where("status","1")->where('find_in_set("'.$where_in.'", features) <> 0')->get()->result();
	//	}else{
			$doctor_detail = $this->db->select("*")->from("user")->where("user_role","2")->where('user.created_by',$session_id)->where("status","1")->where('find_in_set("'.$where_in.'", features) <> 0')->get()->result();
		//}
		// var_dump($this->session->userdata());
	//	 echo $this->db->last_query();die;
		$data['doctor'] =  $doctor_detail;
		$patient_detail = $this->db->select("*")->from("patient")->where("status","1")->get()->result();
		$data['patient'] =  $patient_detail;
		$data['content'] = $this->load->view('schedule',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
  public function getdetail()
	{
		$session_id = $this->session->userdata('user_id');
	$created_by_id = $this->session->userdata('created_by');
			$isadmin = $this->session->userdata('isadmin');
			if($isadmin == 1){
				$session_id = $created_by_id;
			}
		$id = $this->input->get('schedule_id');
		$detail = $this->db->select('*')->from("schedule")->where("schedule_id",$id)->where("hospital_id",$session_id)->get()->row();
		$doctor ='';
		$patient='';
		if($detail->type=="appointment"){
			$doctor = $this->db->select("*")->from("user")->where("user_id",$detail->doctor_id)->where("user_role","2")->where('user.created_by',$session_id)->get()->row();
			$patient = $this->db->select("*")->from("patient")->where("patient_id",$detail->patent_id)->get()->row();
			//echo json_encode($doctor);
		}
		$doctor_name='';
		$patient_name='';
		if($doctor!=''){
			$doctor_name = $doctor->firstname.' '.$doctor->lastname;
		}else{
			$doctor_name ='';
		}
		if($patient!=''){
			$patient_name = $patient->fname.' '.$patient->lname;
		}else{
			$patient_name ='';
		}
		$detail->whens = date('d-m-Y',strtotime($detail->whens));
		$detail->from_time = date('h:i A',strtotime($detail->from_time));
		$detail->to_time = date('h:i A',strtotime($detail->to_time));
		$detail->created_date = date('Y-m-d h:i A',strtotime($detail->created_date));
		$detail->doctor_name = $doctor_name;
    $detail->patient_name = $patient_name;
		echo json_encode($detail);
		exit;

	}
	public function get_todayleft(){
		$schedule_id = $this->input->get_post('p_id');
		$type = $this->input->get_post('type');
	//	echo $type;
	//$p_date='';
		if($type=='today'){
			$date =  date('Y-m-d',strtotime($schedule_id));
			$date = date('Y-m-d', strtotime('-1 day', strtotime($date)));
			$where = "whens = '$date'";
			$p_date = date('jS F, Y',strtotime($date));
		}else if($type=='month'){
			$date =  date('Y-m-d',strtotime($schedule_id));
			$date = date('Y-m-d', strtotime('-30 day', strtotime($date)));
			//$where = "whens BETWEEN '$date' AND '$from_date'";
			$where = "Month(whens)=MONTH('$date') and YEAR(whens)=YEAR('$date')";
			$p_date = date('F Y',strtotime($date));
		}else if($type=='week')
		{
			$explode = explode(" ",$schedule_id);
			$m = $explode[0];
			$start_date = $explode[1];
			$year = $explode[3];
			$years = explode(",",$year);
		$dates = $years[1].'-'.$m.'-'.$start_date;
		$schedule_id = date('Y-m-d',strtotime($dates));
			$date = date('Y-m-d', strtotime('-1 week', strtotime($schedule_id)));
			$from_date = date('Y-m-d', strtotime('+6 day', strtotime($date)));
			//$where = "whens > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
			//$where = "whens > DATE_SUB('$date', INTERVAL 1 WEEK)";
			//$where = "whens BETWEEN DATE_ADD(DAY, -7, '$schedule_id') AND DATE_ADD(DAY, 1, '$schedule_id')";
			$sunday = strtotime($date);  //strtotime("last sunday");
			$sunday = date('w', $sunday)==date('w') ? $sunday+7*86400 : $sunday;

			$satday = strtotime(date("Y-m-d",$sunday)." +6 days");

			$this_week_sd = date("M d",$sunday);
			$this_week_ed = date("d,Y",$satday);

		$p_date =	date('M d',$sunday).' - '.date('d,Y',$satday);
			$where = "whens BETWEEN '$date' AND '$from_date'";
		}
//echo $m.' '.$start_date.' '.$years[1];
//echo $date;
//exit;
		//$date = date('Y-m-d');
	//	Select * From Acb Where WorkDate BETWEEN DATEADD(DAY, -7, GETDATE()) AND DATEADD(DAY, 1, GETDATE())
	$session_id = $this->session->userdata('user_id');
	$created_by_id = $this->session->userdata('created_by');
			$isadmin = $this->session->userdata('isadmin');
			if($isadmin == 1){
				$session_id = $created_by_id;
			}
//$session_id = $this->session->userdata('user_id');
			$schedules = $this->db->select("*")->from("schedule")->where($where)->where('hospital_id',$session_id)->order_by('whens','asc')->get()->result();
			//echo $this->db->last_query();
		//	exit;
			//$query = $this->db->query("select * from schedule where Month(whens) = MONTH(CURRENT_DATE())");
				//$schedules = $query->result();
			$msg ='';
			//if(count($schedules)>0){
//$session_id = $this->session->userdata('user_id');
			foreach ($schedules as  $value) {
				$msg.='<tr style="border-bottom: 1px solid #ddd; border-left: 1px solid #ddd;" class="hovertr">';
		$insurance = $this->db->select("*")->from("insurance")->where("patient_id",$value->patent_id)->get()->row();
		$patient = $this->db->select("*")->from("patient")->where("patient_id",$value->patent_id)->get()->row();
		$bprovider = $this->db->select("*")->from("user")->where("user_id",$value->block_time_for)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();
		if($value->doctor_id!='0'){
		$provider = $this->db->select("*")->from("user")->where("user_id",$value->doctor_id)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();

			}
			else{
				$provider  =  new stdClass();
				$provider->firstname ='';
				$provider->lastname ='';
			}

			$msg.='<td>';
			if($provider!='' and $value->type!='block'){
			 $msg.=$provider->firstname.' '.$provider->lastname;
			}else if($value->type=='block' and $value->block_time_for=='all'){
			$msg.='Block time for all';
			}else if(($value->type=='block') and ($value->block_time_for!='all')){
			 $msg.=$provider->firstname.' '.$provider->lastname;
			}
			$msg.='</td>';

		if($patient!=''){
		$msg.='<td>'.$patient->fname.' '.$patient->mname.' '.$patient->lname.'</td>';
		}else{
		$msg.='<td></td>';
		}


		if($insurance!='' and $value->patent_id!=''){
		$msg.='<td>'.$insurance->status.'</td>';
		}else{
		$msg.='<td>Inactive</td>';
		}
		if($value->type=='block'){
		$msg.='<td>Block Time</td>';
		}else{
			$msg.='<td>'.$value->appointment_type.'</td>';
		}
		$msg.='<td>'.date('d-m-Y',strtotime($value->whens)).'</td>';
		$msg.='<td>'.date('Y-m-d h:i:A',strtotime($value->created_date)).'</td>';

if($value->created_by_role=='1' || $value->created_by_role=='2'){
				$created_by =$this->db->select("*")->from("user")->where("user_id",$value->created_by)->get()->row();
				$created_by->firstname = $created_by->firstname;
				$created_by->lastname = $created_by->lastname;
}else if($value->created_by_role=='10'){
	$created_by = $this->db->select("*")->from("patient")->where("id",$value->created_by)->get()->row();
	$created_by->firstname = $created_by->fname;
	$created_by->lastname = $created_by->lname;
}
$msg.='<td>'.$created_by->firstname.' '.$created_by->lastname.'</td>';
		$msg.='<td>'.date('h:i A',strtotime($value->from_time)).'</td>';
		$msg.='<td>'.$value->chief_complaint.'</td>';

		if($insurance!='' and $value->patent_id!=''){
		$msg.='<td>'.$insurance->copay_type.'</td>';
		}else{
		$msg.='<td></td>';
		}
		if($insurance!='' and $value->patent_id!=''){
		$msg.='<td>'.$insurance->eligiblility.'</td>';
		}else{
		$msg.='<td></td>';
		}
		if($value->note!=''){
		$msg.='<td>'.$value->note.'</td>';
		}else{
		$msg.='<td></td>';
		}
		$msg.='</tr>';

		}
$msg.='~~'.$p_date;
		//	unset($u);
		//	unset($value);
		//	$sqlquery = "SELECT user.user_id,user.firstname,user.lastname FROM `schedule` INNER JOIN user on user.user_id = schedule.doctor_id where schedule.start_time!= '$time' and schedule.date ='$date' and user.user_role ='2' and user.status ='1'";
		//	$query = $this->db->query($sqlquery);
		//	$results = $query->result();
			echo json_encode($msg);





	}
	public function get_todayright(){
		$schedule_id = $this->input->get_post('p_id');
		$type = $this->input->get_post('type');
	//	echo $type;
	//$p_date='';
		if($type=='today'){
			$date =  date('Y-m-d',strtotime($schedule_id));
			$date = date('Y-m-d', strtotime('+1 day', strtotime($date)));
			$where = "whens = '$date'";
			$p_date = date('jS F, Y',strtotime($date));
		}else if($type=='month'){
			$date =  date('Y-m-d',strtotime($schedule_id));
			$dates = date('Y-m-d', strtotime('+1 month', strtotime($date)));

			//$where = "whens BETWEEN '$date' AND '$from_date'";
			$where = "Month(whens)=MONTH('$dates') and YEAR(whens)=YEAR('$dates')";
			$p_date = date('F Y',strtotime($dates));
		}else if($type=='week')
		{
			$explode = explode(" ",$schedule_id);
			$m = $explode[0];
			$start_date = $explode[1];
			$year = $explode[3];
			$years = explode(",",$year);
		$dates = $years[1].'-'.$m.'-'.$start_date;
		$schedule_id = date('Y-m-d',strtotime($dates));
			$date = date('Y-m-d', strtotime('+1 week', strtotime($schedule_id)));
			$from_date = date('Y-m-d', strtotime('+6 day', strtotime($date)));
			//$where = "whens > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
			//$where = "whens > DATE_SUB('$date', INTERVAL 1 WEEK)";
			//$where = "whens BETWEEN DATE_ADD(DAY, -7, '$schedule_id') AND DATE_ADD(DAY, 1, '$schedule_id')";
			$sunday = strtotime($date);  //strtotime("last sunday");
			$sunday = date('w', $sunday)==date('w') ? $sunday+7*86400 : $sunday;

			$satday = strtotime(date("Y-m-d",$sunday)." +6 days");

			$this_week_sd = date("M d",$sunday);
			$this_week_ed = date("d,Y",$satday);

		$p_date =	date('M d',$sunday).' - '.date('d,Y',$satday);
			$where = "whens BETWEEN '$date' AND '$from_date'";
		}
//echo $m.' '.$start_date.' '.$years[1];
//echo $date;
//exit;
		//$date = date('Y-m-d');
	//	Select * From Acb Where WorkDate BETWEEN DATEADD(DAY, -7, GETDATE()) AND DATEADD(DAY, 1, GETDATE())
	$session_id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
				$isadmin = $this->session->userdata('isadmin');
				if($isadmin == 1){
					$session_id = $created_by_id;
				}
			$schedules = $this->db->select("*")->from("schedule")->where($where)->where('hospital_id',$session_id)->order_by('whens','asc')->get()->result();
			//echo $this->db->last_query();
		//	exit;
			//$query = $this->db->query("select * from schedule where Month(whens) = MONTH(CURRENT_DATE())");
				//$schedules = $query->result();
			$msg ='';
			//if(count($schedules)>0){
//$session_id = $this->session->userdata('user_id');
			foreach ($schedules as  $value) {
				$msg.='<tr style="border-bottom: 1px solid #ddd; border-left: 1px solid #ddd;" class="hovertr">';
		$insurance = $this->db->select("*")->from("insurance")->where("patient_id",$value->patent_id)->get()->row();
		$patient = $this->db->select("*")->from("patient")->where("patient_id",$value->patent_id)->get()->row();
		$bprovider = $this->db->select("*")->from("user")->where("user_id",$value->block_time_for)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();
		if($value->doctor_id!='0'){
		$provider = $this->db->select("*")->from("user")->where("user_id",$value->doctor_id)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();

			}else{
				$provider  =  new stdClass();
				$provider->firstname ='';
				$provider->lastname ='';
			}

			$msg.='<td>';
			if($provider!='' and $value->type!='block'){
			 $msg.=$provider->firstname.' '.$provider->lastname;
			}else if($value->type=='block' and $value->block_time_for=='all'){
			$msg.='Block time for all';
			}else if(($value->type=='block') and ($value->block_time_for!='all')){
			 $msg.=$provider->firstname.' '.$provider->lastname;
			}
			$msg.='</td>';

		if($patient!=''){
		$msg.='<td>'.$patient->fname.' '.$patient->mname.' '.$patient->lname.'</td>';
		}else{
		$msg.='<td></td>';
		}


		if($insurance!='' and $value->patent_id!=''){
		$msg.='<td>'.$insurance->status.'</td>';
		}else{
		$msg.='<td>Inactive</td>';
		}
		if($value->type=='block'){
		$msg.='<td>Block Time</td>';
		}else{
			$msg.='<td>'.$value->appointment_type.'</td>';
		}
		$msg.='<td>'.date('d-m-Y',strtotime($value->whens)).'</td>';
		$msg.='<td>'.date('Y-m-d h:i:A',strtotime($value->created_date)).'</td>';

if($value->created_by_role=='1' || $value->created_by_role=='2'){
				$created_by =$this->db->select("*")->from("user")->where("user_id",$value->created_by)->get()->row();
				$created_by->firstname = $created_by->firstname;
				$created_by->lastname = $created_by->lastname;
}else if($value->created_by_role=='10'){
	$created_by = $this->db->select("*")->from("patient")->where("id",$value->created_by)->get()->row();
	$created_by->firstname = $created_by->fname;
	$created_by->lastname = $created_by->lname;
}
$msg.='<td>'.$created_by->firstname.' '.$created_by->lastname.'</td>';
		$msg.='<td>'.date('h:i A',strtotime($value->from_time)).'</td>';
		$msg.='<td>'.$value->chief_complaint.'</td>';

		if($insurance!='' and $value->patent_id!=''){
		$msg.='<td>'.$insurance->copay_type.'</td>';
		}else{
		$msg.='<td></td>';
		}
		if($insurance!='' and $value->patent_id!=''){
		$msg.='<td>'.$insurance->eligiblility.'</td>';
		}else{
		$msg.='<td></td>';
		}
		if($value->note!=''){
		$msg.='<td>'.$value->note.'</td>';
		}else{
		$msg.='<td></td>';
		}
		$msg.='</tr>';

		}
$msg.='~~'.$p_date;
		//	unset($u);
		//	unset($value);
		//	$sqlquery = "SELECT user.user_id,user.firstname,user.lastname FROM `schedule` INNER JOIN user on user.user_id = schedule.doctor_id where schedule.start_time!= '$time' and schedule.date ='$date' and user.user_role ='2' and user.status ='1'";
		//	$query = $this->db->query($sqlquery);
		//	$results = $query->result();
			echo json_encode($msg);





	}
  public function deleteappotment()
	{
		   $session_id = $this->session->userdata('user_id');
		   $schedule_id = $this->input->get_post('schedule_id');
       $schedule_detail = $this->db->select("*")->from("schedule")->where("schedule_id",$schedule_id)->where("hospital_id",$session_id)->get()->row();
			 $doctordetail = $this->db->select("*")->from("user")->where("user_id",$schedule_detail->doctor_id)->get()->row();
			 $pdetail = $this->db->select("*")->from("patient")->where("patient_id",$schedule_detail->patent_id)->get()->row();
			 $to = $doctordetail->email;
			 	$ap_type = $schedule_detail->appointment_type;
			 	$dd_when = date('m/d/Y',strtotime($schedule_detail->whens));
			 	$ttime = date('h:i A',strtotime($schedule_detail->from_time));
			 	$subject=$ap_type." Appointment cancelled with ".$pdetail->fname.' '.$pdetail->lname." on ".$dd_when.' '.$ttime;
			 	$htmlMessage_doc = "Hello  ".$doctordetail->firstname.' '.$doctordetail->lastname.','."<br><br><br>";
			 	$htmlMessage_doc .= "Your scheduled  ".$ap_type." appointment with ".$pdetail->fname.' '.$pdetail->lname."  has been cancelled.<br><br><br>";
			 	$htmlMessage_doc .= "When:  ".date('l,F d,Y',strtotime($schedule_detail->whens)).'  at  '.$ttime.".<br><br><br>";
			 	$htmlMessage_doc .= "If you have questions or need help, please contact us by phone: 856XXXXX."."<br><br><br>";
			 //	$htmlMessage_doc .= "Join from your PC, Mac, iOS or Android device: https://telemed.advancedmd.com/Application.Web.MVC/?code=841370XX. (don't join it)"."<br>";

			 	$this->sendEmailAttachment($to,$subject,$htmlMessage_doc);
			 	$to_p = $pdetail->email;
			 	$ap_type = $schedule_detail->appointment_type;
			 	$dd_when = date('m/d/Y',strtotime($schedule_detail->whens));
			 	$ttime = date('h:i A',strtotime($schedule_detail->from_time));
			 	$subjectp=$ap_type." Appointment cancelled with ".$doctordetail->firstname.' '.$doctordetail->lastname." on ".$dd_when.' '.$ttime;
			 	$htmlMessage_p = "Hello  ".$pdetail->fname.' '.$pdetail->lname.','."<br><br><br>";
			 	$htmlMessage_p .= "Your scheduled ".$ap_type." appointment with ".$doctordetail->firstname.' '.$doctordetail->lastname."  has been cancelled.<br><br><br>";
			 	$htmlMessage_p .= "When:  ".date('l,F d,Y',strtotime($schedule_detail->whens)).'  at  '.$ttime.".<br><br><br>";
			 	$htmlMessage_p .= "If you have questions or need help, please contact us by phone: 856XXXXX."."<br><br><br>";
			 //	$htmlMessage_p .= "Join from your PC, Mac, iOS or Android device: https://telemed.advancedmd.com/Application.Web.MVC/?code=841370XX. (don't join it)"."<br>";

			 	$this->sendEmailAttachment($to_p,$subjectp,$htmlMessage_p);


			 $this->db->where('schedule_id',$schedule_id);
			 $this->db->delete('schedule');
			// echo $this->db->last_query();
			 //exit;




			 $this->session->set_flashdata('message',"Appointment Cancel!");
			 redirect('schedule');
	}
	public function get_appoitmentlist(){

		$times = $this->input->get('p_id');
		$stime = explode(",",$times);
		$date = date('Y-m-d');

$type = $this->input->get('type');
	$schedule_id = $this->input->get('date');
	//echo $schedule_id;
	//exit;
	if($type=='month'){
		$date =  date('Y-m-d',strtotime($schedule_id));
			//$dates = date('Y-m-d', strtotime('+1 month', strtotime($date)));

			//$where = "whens BETWEEN '$date' AND '$from_date'";
			$where = "Month(whens)=MONTH('$date') and YEAR(whens)=YEAR('$date')";
	}else if($type=='today')
	{
		$date =  date('Y-m-d',strtotime($schedule_id));
		$where = "whens = '$date'";
	}else if($type=='week'){
		$explode = explode(" ",$schedule_id);
				$m = $explode[0];
				$start_date = $explode[1];
				$year = $explode[3];
				$years = explode(",",$year);
			$dates = $years[1].'-'.$m.'-'.$start_date;
			//$schedule_id = date('Y-m-d',strtotime($dates));
		$date = date('Y-m-d',strtotime($dates));
			$from_date = date('Y-m-d', strtotime('+6 day', strtotime($date)));
$where = "whens BETWEEN '$date' AND '$from_date'";
	}
	$session_id = $this->session->userdata('user_id');
$created_by_id = $this->session->userdata('created_by');
		$isadmin = $this->session->userdata('isadmin');
		if($isadmin == 1){
			$session_id = $created_by_id;
		}
		$schedules = $this->db->select("*")->from("schedule")->where_in("doctor_id",$stime)->where("hospital_id",$session_id)->where($where)->order_by('whens','asc')->get()->result();
		$msg ='';
		if(count($schedules)>0){

			foreach ($schedules as  $value) {
 	 		$msg.='<tr style="border-bottom: 1px solid #ddd; border-left: 1px solid #ddd;" class="hovertr">';
 	 $insurance = $this->db->select("*")->from("insurance")->where("patient_id",$value->patent_id)->get()->row();
 	 $patient = $this->db->select("*")->from("patient")->where("patient_id",$value->patent_id)->get()->row();
 	 $bprovider = $this->db->select("*")->from("user")->where("user_id",$value->block_time_for)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();
 	 if($value->doctor_id!='0'){
 	 $provider = $this->db->select("*")->from("user")->where("user_id",$value->doctor_id)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();

 	 	}else{
			$provider  =  new stdClass();
			$provider->firstname ='';
			$provider->lastname ='';
		}


		$msg.='<td>';
 	 if($provider!='' and $value->type!='block'){
 	  $msg.=$provider->firstname.' '.$provider->lastname;
 	 }else if($value->type=='block' and $value->block_time_for=='all'){
 	 $msg.='Block time for all';
 	 }else if(($value->type=='block') and ($value->block_time_for!='all')){
 	  $msg.=$provider->firstname.' '.$provider->lastname;
 	 }
 	 $msg.='</td>';

 	 if($patient!=''){
 	 $msg.='<td>'.$patient->fname.' '.$patient->mname.' '.$patient->lname.'</td>';
 	 }else{
 	 $msg.='<td></td>';
 	 }


 	 if($insurance!='' and $value->patent_id!=''){
 	 $msg.='<td>'.$insurance->status.'</td>';
 	 }else{
 	 $msg.='<td>Inactive</td>';
 	 }
 	 if($value->type=='block'){
 	 $msg.='<td>Block Time</td>';
 	 }else{
 	 	$msg.='<td>'.$value->appointment_type.'</td>';
 	 }
	 $msg.='<td>'.date('d-m-Y',strtotime($value->whens)).'</td>';
	 $msg.='<td>'.date('Y-m-d h:i:A',strtotime($value->created_date)).'</td>';

if($value->created_by_role=='1' || $value->created_by_role=='2'){
				$created_by =$this->db->select("*")->from("user")->where("user_id",$value->created_by)->get()->row();
				$created_by->firstname = $created_by->firstname;
				$created_by->lastname = $created_by->lastname;
}else if($value->created_by_role=='10'){
	$created_by = $this->db->select("*")->from("patient")->where("id",$value->created_by)->get()->row();
	$created_by->firstname = $created_by->fname;
	$created_by->lastname = $created_by->lname;
}
$msg.='<td>'.$created_by->firstname.' '.$created_by->lastname.'</td>';
 	 $msg.='<td>'.date('h:i A',strtotime($value->from_time)).'</td>';
 	 $msg.='<td>'.$value->chief_complaint.'</td>';

 	 if($insurance!='' and $value->patent_id!=''){
 	 $msg.='<td>'.$insurance->copay_type.'</td>';
 	 }else{
 	 $msg.='<td></td>';
 	 }
 	 if($insurance!='' and $value->patent_id!=''){
 	 $msg.='<td>'.$insurance->eligiblility.'</td>';
 	 }else{
 	 $msg.='<td></td>';
 	 }
 	 if($value->note!=''){
 	 $msg.='<td>'.$value->note.'</td>';
 	 }else{
 	 $msg.='<td></td>';
 	 }
 	 $msg.='</tr>';
 	 }

	//	unset($u);
	//	unset($value);
	//	$sqlquery = "SELECT user.user_id,user.firstname,user.lastname FROM `schedule` INNER JOIN user on user.user_id = schedule.doctor_id where schedule.start_time!= '$time' and schedule.date ='$date' and user.user_role ='2' and user.status ='1'";
	//	$query = $this->db->query($sqlquery);
	//	$results = $query->result();
		echo json_encode($msg);
	//	unset($data);
}
}
public function get_appoitmentbytype(){
	$times = $this->input->get('p_id');
	$stime = explode(",",$times);
	$date = date('Y-m-d');
  $type = $this->input->get('type');
	$schedule_id = $this->input->get('date');
	if($type=='month'){
		$date =  date('Y-m-d',strtotime($schedule_id));
			//$dates = date('Y-m-d', strtotime('+1 month', strtotime($date)));

			//$where = "whens BETWEEN '$date' AND '$from_date'";
			$where = "Month(whens)=MONTH('$date') and YEAR(whens)=YEAR('$date')";
	}else if($type=='today')
	{
		$date =  date('Y-m-d',strtotime($schedule_id));
		$where = "whens = '$date'";
	}else if($type=='week'){
		$explode = explode(" ",$schedule_id);
				$m = $explode[0];
				$start_date = $explode[1];
				$year = $explode[3];
				$years = explode(",",$year);
			$dates = $years[1].'-'.$m.'-'.$start_date;
			//$schedule_id = date('Y-m-d',strtotime($dates));
		$date = date('Y-m-d',strtotime($dates));
			$from_date = date('Y-m-d', strtotime('+6 day', strtotime($date)));
$where = "whens BETWEEN '$date' AND '$from_date'";
	}
	$session_id = $this->session->userdata('user_id');
	$created_by_id = $this->session->userdata('created_by');
			$isadmin = $this->session->userdata('isadmin');
			if($isadmin == 1){
				$session_id = $created_by_id;
			}
	$schedules = $this->db->select("*")->from("schedule")->where_in("appointment_type",$stime)->where("hospital_id",$session_id)->where($where)->order_by('whens','asc')->get()->result();
	//echo $this->db->last_query();
	$msg ='';
	if(count($schedules)>0){
// $session_id = $this->session->userdata('user_id');
		foreach ($schedules as  $value) {
			$msg.='<tr style="border-bottom: 1px solid #ddd; border-left: 1px solid #ddd;" class="hovertr">';
	$insurance = $this->db->select("*")->from("insurance")->where("patient_id",$value->patent_id)->get()->row();
	$patient = $this->db->select("*")->from("patient")->where("patient_id",$value->patent_id)->get()->row();
	$bprovider = $this->db->select("*")->from("user")->where("user_id",$value->block_time_for)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();
	if($value->doctor_id!='0'){
	$provider = $this->db->select("*")->from("user")->where("user_id",$value->doctor_id)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();

		}else{
			$provider  =  new stdClass();
			$provider->firstname ='';
			$provider->lastname ='';
		}


		$msg.='<td>';
		if($provider!='' and $value->type!='block'){
		 $msg.=$provider->firstname.' '.$provider->lastname;
		}else if($value->type=='block' and $value->block_time_for=='all'){
		$msg.='Block time for all';
		}else if(($value->type=='block') and ($value->block_time_for!='all')){
		 $msg.=$provider->firstname.' '.$provider->lastname;
		}
		$msg.='</td>';

	if($patient!=''){
	$msg.='<td>'.$patient->fname.' '.$patient->mname.' '.$patient->lname.'</td>';
	}else{
	$msg.='<td></td>';
	}


	if($insurance!='' and $value->patent_id!=''){
	$msg.='<td>'.$insurance->status.'</td>';
	}else{
	$msg.='<td>Inactive</td>';
	}
	if($value->type=='block'){
	$msg.='<td>Block Time</td>';
	}else{
		$msg.='<td>'.$value->appointment_type.'</td>';
	}
	$msg.='<td>'.date('d-m-Y',strtotime($value->whens)).'</td>';
	$msg.='<td>'.date('Y-m-d h:i:A',strtotime($value->created_date)).'</td>';

if($value->created_by_role=='1' || $value->created_by_role=='2'){
				$created_by =$this->db->select("*")->from("user")->where("user_id",$value->created_by)->get()->row();
				$created_by->firstname = $created_by->firstname;
				$created_by->lastname = $created_by->lastname;
}else if($value->created_by_role=='10'){
	$created_by = $this->db->select("*")->from("patient")->where("id",$value->created_by)->get()->row();
	$created_by->firstname = $created_by->fname;
	$created_by->lastname = $created_by->lname;
}
$msg.='<td>'.$created_by->firstname.' '.$created_by->lastname.'</td>';
	$msg.='<td>'.date('h:i A',strtotime($value->from_time)).'</td>';
	$msg.='<td>'.$value->chief_complaint.'</td>';

	if($insurance!='' and $value->patent_id!=''){
	$msg.='<td>'.$insurance->copay_type.'</td>';
	}else{
	$msg.='<td></td>';
	}
	if($insurance!='' and $value->patent_id!=''){
	$msg.='<td>'.$insurance->eligiblility.'</td>';
	}else{
	$msg.='<td></td>';
	}
	if($value->note!=''){
	$msg.='<td>'.$value->note.'</td>';
	}else{
	$msg.='<td></td>';
	}
	$msg.='</tr>';
	}

//	unset($u);
//	unset($value);
//	$sqlquery = "SELECT user.user_id,user.firstname,user.lastname FROM `schedule` INNER JOIN user on user.user_id = schedule.doctor_id where schedule.start_time!= '$time' and schedule.date ='$date' and user.user_role ='2' and user.status ='1'";
//	$query = $this->db->query($sqlquery);
//	$results = $query->result();
	echo json_encode($msg);
//	unset($data);
}
}
public function get_appoitmentlistforblock(){
	//$times = $this->input->get('p_id');
	//$stime = explode(",",$times);
	//$date = date('Y-m-d');
	$type = $this->input->get('type');
		$schedule_id = $this->input->get('date');
		if($type=='month'){
				$date =  date('Y-m-d',strtotime($schedule_id));
					//$dates = date('Y-m-d', strtotime('+1 month', strtotime($date)));

					//$where = "whens BETWEEN '$date' AND '$from_date'";
					$where = "Month(whens)=MONTH('$date') and YEAR(whens)=YEAR('$date')";
			}else if($type=='today')
			{
				$date =  date('Y-m-d',strtotime($schedule_id));
				$where = "whens = '$date'";
			}else if($type=='week'){
				$explode = explode(" ",$schedule_id);
						$m = $explode[0];
						$start_date = $explode[1];
						$year = $explode[3];
						$years = explode(",",$year);
					$dates = $years[1].'-'.$m.'-'.$start_date;
					//$schedule_id = date('Y-m-d',strtotime($dates));
				$date = date('Y-m-d',strtotime($dates));
					$from_date = date('Y-m-d', strtotime('+6 day', strtotime($date)));
		$where = "whens BETWEEN '$date' AND '$from_date'";
			}


			$session_id = $this->session->userdata('user_id');
				$created_by_id = $this->session->userdata('created_by');
						$isadmin = $this->session->userdata('isadmin');
						if($isadmin == 1){
							$session_id = $created_by_id;
						}
	$schedules = $this->db->select("*")->from("schedule")->where("type",'block')->where($where)->where("hospital_id",$session_id)->order_by('whens','asc')->get()->result();
	$msg ='';
	if(count($schedules)>0){
//$session_id = $this->session->userdata('user_id');
		foreach ($schedules as  $value) {
			$msg.='<tr style="border-bottom: 1px solid #ddd; border-left: 1px solid #ddd;" class="hovertr">';
	$insurance = $this->db->select("*")->from("insurance")->where("patient_id",$value->patent_id)->get()->row();
	$patient = $this->db->select("*")->from("patient")->where("patient_id",$value->patent_id)->get()->row();
	$bprovider = $this->db->select("*")->from("user")->where("user_id",$value->block_time_for)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();
	if($value->doctor_id!='0'){
	$provider = $this->db->select("*")->from("user")->where("user_id",$value->doctor_id)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();

		}else{
			$provider  =  new stdClass();
			$provider->firstname ='';
			$provider->lastname ='';
		}


		$msg.='<td>';
		if($provider!='' and $value->type!='block'){
		 $msg.=$provider->firstname.''.$provider->lastname;
		}else if($value->type=='block' and $value->block_time_for=='all'){
		$msg.='Block time for all';
		}else if(($value->type=='block') and ($value->block_time_for!='all')){
		 $msg.=$provider->firstname.''.$provider->lastname;
		}
		$msg.='</td>';

	if($patient!=''){
	$msg.='<td>'.$patient->fname.$patient->mname.$patient->lname.'</td>';
	}else{
	$msg.='<td></td>';
	}


	if($insurance!='' and $value->patent_id!=''){
	$msg.='<td>'.$insurance->status.'</td>';
	}else{
	$msg.='<td>Inactive</td>';
	}
	if($value->type=='block'){
	$msg.='<td>Block Time</td>';
	}else{
		$msg.='<td>'.$value->appointment_type.'</td>';
	}
	$msg.='<td>'.date('d-m-Y',strtotime($value->whens)).'</td>';
	$msg.='<td>'.date('Y-m-d h:i:A',strtotime($value->created_date)).'</td>';

if($value->created_by_role=='1' || $value->created_by_role=='2'){
				$created_by =$this->db->select("*")->from("user")->where("user_id",$value->created_by)->get()->row();
				$created_by->firstname = $created_by->firstname;
				$created_by->lastname = $created_by->lastname;
}else if($value->created_by_role=='10'){
	$created_by = $this->db->select("*")->from("patient")->where("id",$value->created_by)->get()->row();
	$created_by->firstname = $created_by->fname;
	$created_by->lastname = $created_by->lname;
}
$msg.='<td>'.$created_by->firstname.' '.$created_by->lastname.'</td>';
	$msg.='<td>'.date('h:i A',strtotime($value->from_time)).'</td>';
	$msg.='<td>'.$value->chief_complaint.'</td>';

	if($insurance!='' and $value->patent_id!=''){
	$msg.='<td>'.$insurance->copay_type.'</td>';
	}else{
	$msg.='<td></td>';
	}
	if($insurance!='' and $value->patent_id!=''){
	$msg.='<td>'.$insurance->eligiblility.'</td>';
	}else{
	$msg.='<td></td>';
	}
	if($value->note!=''){
	$msg.='<td>'.$value->note.'</td>';
	}else{
	$msg.='<td></td>';
	}
	$msg.='</tr>';
	}

//	unset($u);
//	unset($value);
//	$sqlquery = "SELECT user.user_id,user.firstname,user.lastname FROM `schedule` INNER JOIN user on user.user_id = schedule.doctor_id where schedule.start_time!= '$time' and schedule.date ='$date' and user.user_role ='2' and user.status ='1'";
//	$query = $this->db->query($sqlquery);
//	$results = $query->result();
	echo json_encode($msg);
//	unset($data);
}
}

public function get_appoitmentlistall(){
	//$times = $this->input->get('p_id');
	//$stime = explode(",",$times);
	//$date = date('Y-m-d');
	$where = "1=1";
	$type = $this->input->get('type');
	$schedule_id = $this->input->get('date');
	if($type=='month'){
		$date =  date('Y-m-d',strtotime($schedule_id));
			//$dates = date('Y-m-d', strtotime('+1 month', strtotime($date)));

			//$where = "whens BETWEEN '$date' AND '$from_date'";
			$where = "Month(whens)=MONTH('$date') and YEAR(whens)=YEAR('$date')";
	}else if($type=='today')
	{
		$date =  date('Y-m-d',strtotime($schedule_id));
		$where = "whens = '$date'";
	}else if($type=='week'){
		$explode = explode(" ",$schedule_id);
				$m = $explode[0];
				$start_date = $explode[1];
				$year = $explode[3];
				$years = explode(",",$year);
			$dates = $years[1].'-'.$m.'-'.$start_date;
			//$schedule_id = date('Y-m-d',strtotime($dates));
		$date = date('Y-m-d',strtotime($dates));
			$from_date = date('Y-m-d', strtotime('+6 day', strtotime($date)));
$where = "whens BETWEEN '$date' AND '$from_date'";
	}
	$session_id = $this->session->userdata('user_id');
	$created_by_id = $this->session->userdata('created_by');
			$isadmin = $this->session->userdata('isadmin');
			if($isadmin == 1){
				$session_id = $created_by_id;
			}
	$schedules = $this->db->select("*")->from("schedule")->where($where)->where("hospital_id",$session_id)->order_by('whens','asc')->get()->result();

	$msg ='';
	if(count($schedules)>0){
//$session_id = $this->session->userdata('user_id');
		foreach ($schedules as  $value) {
			$msg.='<tr style="border-bottom: 1px solid #ddd; border-left: 1px solid #ddd;" class="hovertr">';
	$insurance = $this->db->select("*")->from("insurance")->where("patient_id",$value->patent_id)->get()->row();
	$patient = $this->db->select("*")->from("patient")->where("patient_id",$value->patent_id)->get()->row();
	$bprovider = $this->db->select("*")->from("user")->where("user_id",$value->block_time_for)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();
	if($value->doctor_id!='0'){
	$provider = $this->db->select("*")->from("user")->where("user_id",$value->doctor_id)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();

		}else{
			$provider  =  new stdClass();
			$provider->firstname ='';
			$provider->lastname ='';
		}



		$msg.='<td>';
		if($provider!='' and $value->type!='block'){
		 $msg.=$provider->firstname.' '.$provider->lastname;
		}else if($value->type=='block' and $value->block_time_for=='all'){
		$msg.='Block time for all';
		}else if(($value->type=='block') and ($value->block_time_for!='all')){
		 $msg.=$provider->firstname.' '.$provider->lastname;
		}
		$msg.='</td>';

	if($patient!=''){
	$msg.='<td>'.$patient->fname.' '.$patient->mname.' '.$patient->lname.'</td>';
	}else{
	$msg.='<td></td>';
	}


	if($insurance!='' and $value->patent_id!=''){
	$msg.='<td>'.$insurance->status.'</td>';
	}else{
	$msg.='<td>Inactive</td>';
	}
	if($value->type=='block'){
	$msg.='<td>Block Time</td>';
	}else{
		$msg.='<td>'.$value->appointment_type.'</td>';
	}
	$msg.='<td>'.date('d-m-Y',strtotime($value->whens)).'</td>';

	$msg.='<td>'.date('Y-m-d h:i:A',strtotime($value->created_date)).'</td>';

if($value->created_by_role=='1' || $value->created_by_role=='2'){
				$created_by =$this->db->select("*")->from("user")->where("user_id",$value->created_by)->get()->row();
				$created_by->firstname = $created_by->firstname;
				$created_by->lastname = $created_by->lastname;
}else if($value->created_by_role=='10'){
	$created_by = $this->db->select("*")->from("patient")->where("id",$value->created_by)->get()->row();
	$created_by->firstname = $created_by->fname;
	$created_by->lastname = $created_by->lname;
}
$msg.='<td>'.$created_by->firstname.' '.$created_by->lastname.'</td>';
	$msg.='<td>'.date('h:i A',strtotime($value->from_time)).'</td>';
	$msg.='<td>'.$value->chief_complaint.'</td>';

	if($insurance!='' and $value->patent_id!=''){
	$msg.='<td>'.$insurance->copay_type.'</td>';
	}else{
	$msg.='<td></td>';
	}
	if($insurance!='' and $value->patent_id!=''){
	$msg.='<td>'.$insurance->eligiblility.'</td>';
	}else{
	$msg.='<td></td>';
	}
	if($value->note!=''){
	$msg.='<td>'.$value->note.'</td>';
	}else{
	$msg.='<td></td>';
	}
	$msg.='</tr>';
	}

//	unset($u);
//	unset($value);
//	$sqlquery = "SELECT user.user_id,user.firstname,user.lastname FROM `schedule` INNER JOIN user on user.user_id = schedule.doctor_id where schedule.start_time!= '$time' and schedule.date ='$date' and user.user_role ='2' and user.status ='1'";
//	$query = $this->db->query($sqlquery);
//	$results = $query->result();
	echo json_encode($msg);
//	unset($data);
}
}

public function get_appoitmentlistallforcalender(){
	//$times = $this->input->get('p_id');
	//$stime = explode(",",$times);
	//$date = date('Y-m-d');
	//$type = $this->input->get('filter_id');
//	$schedule_id = $this->input->get('date');
$times = $this->input->get('filter_id');
	$stime = explode(",",$times);
	//	$where = "appointment_type = '$type'";

	$session_id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
				$isadmin = $this->session->userdata('isadmin');
				if($isadmin == 1){
					$session_id = $created_by_id;
				}
	$schedules = $this->db->select("*")->from("schedule")->where_in("appointment_type",$stime)->where("hospital_id",$session_id)->get()->result();
	$i=1;
	$response["events"]   = array();
	foreach ($schedules as $schedule)
	{

		$getSchedulingrow= $schedule->whens;
	 //  start_time
	 if(!empty($getSchedulingrow))
	 {

								$s_dateString = $schedule->whens.' '.$schedule->from_time;
								$e_dateString = $schedule->whens.' '.$schedule->to_time;
								$sdateObject = new DateTime($s_dateString);
								$edateObject = new DateTime($e_dateString);
							 // echo $dateObject->format('d-m-Y h:i A');
							 $doctor = $this->db->select("*")->from("user")->where("user_id",$schedule->doctor_id)->get()->row();
							 $patient = $this->db->select("*")->from("patient")->where("patient_id",$schedule->patent_id)->get()->row();
							 $dfname ='';
							 $dlname ='';
							 $pfname='';
							 $plname='';
							 $bcolor='';
							 if($doctor!=''){
								 $dfname = $doctor->firstname;
								 $dlname = $doctor->lastname;
							 }
							 if($patient!=''){
								 $pfname=$patient->fname;
								 $plname=$patient->lname;
							 }
							 $arr['id'] = $schedule->schedule_id;
							 $arr['title'] =$dfname.' '.$dlname;
							 $arr['start'] = $s_dateString;
							 $arr['end'] =$e_dateString;
							 if($schedule->appointment_type=='Follow-up Visit'){
						            $bcolor = '#B25900';

						   }else if($schedule->appointment_type=='Wellness Exam'){
$bcolor = '#4D8285';


						   }else if($schedule->appointment_type=='Nursing Only'){

						     $bcolor = '#537343';
						   }else if($schedule->appointment_type=='Urgent Visit'){

						     $bcolor = '#854D64';
						   }else if($schedule->appointment_type=='New Patient Visit'){
						     $bcolor = '#6A4D85';
						   }else if($schedule->appointment_type=='Video Visit'){

						     $bcolor = '#FFCC99';
						   }else if($schedule->type=='block'){
$bcolor = '#FF0000';

						   }
							 $arr['color']  = '#00a2ff';
							 $arr['backgroundColor'] =$bcolor;
							 $arr['tip'] ='Dr. '.$dfname.' '.$dlname .'-'.  $pfname.' '.$plname;
							 //$arr['allDay'] ='true';
array_push($response["events"], $arr);
}
	        //$data[] = $schedule;
	  }


	 //$events = array();

	 // $agenda['allDay'] = true;
	 // $agenda['start'] = new DateTime('2020-06-16 12:00:00');
	 // $agenda['end'] = new DateTime('2020-06-16 2:00:00');
	 // $agenda['title'] = "Hello World";
	 // $agenda['id']= "1";
	 // $events[] = $agenda;
	 //
	 // $agenda['allDay'] = false;
	 // $agenda['start'] = new DateTime('2020-06-16 12:00:00');
	 // $agenda['end'] = new DateTime('2020-06-16 2:00:00');
	 // $agenda['title'] = "Blah";
	 // $agenda['id']= "2";
	 // $events[] = $agenda;

	echo json_encode($response);
//	unset($data);

}
public function get_appoitmentlistalluserforcalender(){
	//$times = $this->input->get('p_id');
	//$stime = explode(",",$times);
	//$date = date('Y-m-d');
	//$type = $this->input->get('filter_id');
//	$schedule_id = $this->input->get('date');
$times = $this->input->get('filter_id');
	$stime = explode(",",$times);
	//	$where = "appointment_type = '$type'";

	$session_id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
				$isadmin = $this->session->userdata('isadmin');
				if($isadmin == 1){
					$session_id = $created_by_id;
				}
	$schedules = $this->db->select("*")->from("schedule")->where_in("doctor_id",$stime)->where("hospital_id",$session_id)->get()->result();
	$i=1;
	$response["events"]   = array();
	foreach ($schedules as $schedule)
	{

		$getSchedulingrow= $schedule->whens;
	 //  start_time
	 if(!empty($getSchedulingrow))
	 {

								$s_dateString = $schedule->whens.' '.$schedule->from_time;
								$e_dateString = $schedule->whens.' '.$schedule->to_time;
								$sdateObject = new DateTime($s_dateString);
								$edateObject = new DateTime($e_dateString);
							 // echo $dateObject->format('d-m-Y h:i A');
							 $doctor = $this->db->select("*")->from("user")->where("user_id",$schedule->doctor_id)->get()->row();
							 $patient = $this->db->select("*")->from("patient")->where("patient_id",$schedule->patent_id)->get()->row();
							 $dfname ='';
							 $dlname ='';
							 $pfname='';
							 $plname='';
							 $bcolor='';
							 if($doctor!=''){
								 $dfname = $doctor->firstname;
								 $dlname = $doctor->lastname;
							 }
							 if($patient!=''){
								 $pfname=$patient->fname;
								 $plname=$patient->lname;
							 }
							 $arr['id'] = $schedule->schedule_id;
							 $arr['title'] =$dfname.' '.$dlname;
							 $arr['start'] = $s_dateString;
							 $arr['end'] =$e_dateString;
							 if($schedule->appointment_type=='Follow-up Visit'){
						            $bcolor = '#B25900';

						   }else if($schedule->appointment_type=='Wellness Exam'){
$bcolor = '#4D8285';


						   }else if($schedule->appointment_type=='Nursing Only'){

						     $bcolor = '#537343';
						   }else if($schedule->appointment_type=='Urgent Visit'){

						     $bcolor = '#854D64';
						   }else if($schedule->appointment_type=='New Patient Visit'){
						     $bcolor = '#6A4D85';
						   }else if($schedule->appointment_type=='Video Visit'){

						     $bcolor = '#FFCC99';
						   }else if($schedule->type=='block'){
$bcolor = '#FF0000';

						   }
							 $arr['color']  = '#00a2ff';
							 $arr['backgroundColor'] =$bcolor;
							 $arr['tip'] ='Dr. '.$dfname.' '.$dlname .'-'.  $pfname.' '.$plname;
							 //$arr['allDay'] ='true';
array_push($response["events"], $arr);
}
	        //$data[] = $schedule;
	  }


	 //$events = array();

	 // $agenda['allDay'] = true;
	 // $agenda['start'] = new DateTime('2020-06-16 12:00:00');
	 // $agenda['end'] = new DateTime('2020-06-16 2:00:00');
	 // $agenda['title'] = "Hello World";
	 // $agenda['id']= "1";
	 // $events[] = $agenda;
	 //
	 // $agenda['allDay'] = false;
	 // $agenda['start'] = new DateTime('2020-06-16 12:00:00');
	 // $agenda['end'] = new DateTime('2020-06-16 2:00:00');
	 // $agenda['title'] = "Blah";
	 // $agenda['id']= "2";
	 // $events[] = $agenda;

	echo json_encode($response);
//	unset($data);

}
public function get_appoitmentlistallforcalenderall(){
	//$times = $this->input->get('p_id');
	//$stime = explode(",",$times);
	//$date = date('Y-m-d');
	//$type = $this->input->get('filter_id');
//	$schedule_id = $this->input->get('date');
//	if($type=='all'){
		//$date =  date('Y-m-d',strtotime($schedule_id));
			//$dates = date('Y-m-d', strtotime('+1 month', strtotime($date)));

			//$where = "whens BETWEEN '$date' AND '$from_date'";
			$where = "1=1";
//	}
$session_id = $this->session->userdata('user_id');
	$created_by_id = $this->session->userdata('created_by');
			$isadmin = $this->session->userdata('isadmin');
			if($isadmin == 1){
				$session_id = $created_by_id;
			}
	$schedules = $this->db->select("*")->from("schedule")->where($where)->where("hospital_id",$session_id)->get()->result();
	$i=1;
	$response["events"]   = array();
	foreach ($schedules as $schedule)
	{

		$getSchedulingrow= $schedule->whens;
	 //  start_time
	 if(!empty($getSchedulingrow))
	 {

								$s_dateString = $schedule->whens.' '.$schedule->from_time;
								$e_dateString = $schedule->whens.' '.$schedule->to_time;
								$sdateObject = new DateTime($s_dateString);
								$edateObject = new DateTime($e_dateString);
							 // echo $dateObject->format('d-m-Y h:i A');
							 $doctor = $this->db->select("*")->from("user")->where("user_id",$schedule->doctor_id)->get()->row();
							 $patient = $this->db->select("*")->from("patient")->where("patient_id",$schedule->patent_id)->get()->row();
							 $dfname ='';
							 $dlname ='';
							 $pfname='';
							 $plname='';
							 $bcolor='';
							 if($doctor!=''){
								 $dfname = $doctor->firstname;
								 $dlname = $doctor->lastname;
							 }
							 if($patient!=''){
								 $pfname=$patient->fname;
								 $plname=$patient->lname;
							 }
							 $arr['id'] = $schedule->schedule_id;
							 $arr['title'] =$dfname.' '.$dlname;
							 $arr['start'] = $s_dateString;
							 $arr['end'] =$e_dateString;
							 if($schedule->appointment_type=='Follow-up Visit'){
						            $bcolor = '#B25900';

						   }else if($schedule->appointment_type=='Wellness Exam'){

 $bcolor = '#4D8285';

						   }else if($schedule->appointment_type=='Nursing Only'){

						     $bcolor = '#537343';
						   }else if($schedule->appointment_type=='Urgent Visit'){

						     $bcolor = '#854D64';
						   }else if($schedule->appointment_type=='New Patient Visit'){
						     $bcolor = '#6A4D85';
						   }else if($schedule->appointment_type=='Video Visit'){

						     $bcolor = '#FFCC99';
						   }else if($schedule->type=='block'){


								 $bcolor = '#FF0000';
						   }
							 $arr['color']  = '#00a2ff';
							 $arr['backgroundColor'] =$bcolor;
							 $arr['tip'] ='Dr. '.$dfname.' '.$dlname .'-'.  $pfname.' '.$plname;
							 //$arr['allDay'] ='true';
array_push($response["events"], $arr);
}
	        //$data[] = $schedule;
	  }


	 //$events = array();

	 // $agenda['allDay'] = true;
	 // $agenda['start'] = new DateTime('2020-06-16 12:00:00');
	 // $agenda['end'] = new DateTime('2020-06-16 2:00:00');
	 // $agenda['title'] = "Hello World";
	 // $agenda['id']= "1";
	 // $events[] = $agenda;
	 //
	 // $agenda['allDay'] = false;
	 // $agenda['start'] = new DateTime('2020-06-16 12:00:00');
	 // $agenda['end'] = new DateTime('2020-06-16 2:00:00');
	 // $agenda['title'] = "Blah";
	 // $agenda['id']= "2";
	 // $events[] = $agenda;

	echo json_encode($response);
//	unset($data);

}
public function get_appoitmentlistallforcalenderblock(){
	//$times = $this->input->get('p_id');
	//$stime = explode(",",$times);
	//$date = date('Y-m-d');
	//$type = $this->input->get('filter_id');
//	$schedule_id = $this->input->get('date');
//	if($type=='all'){
		//$date =  date('Y-m-d',strtotime($schedule_id));
			//$dates = date('Y-m-d', strtotime('+1 month', strtotime($date)));

			//$where = "whens BETWEEN '$date' AND '$from_date'";
			$where = "1=1";
//	}
$session_id = $this->session->userdata('user_id');
	$created_by_id = $this->session->userdata('created_by');
			$isadmin = $this->session->userdata('isadmin');
			if($isadmin == 1){
				$session_id = $created_by_id;
			}
	$schedules = $this->db->select("*")->from("schedule")->where("type",'block')->where("hospital_id",$session_id)->get()->result();
	$i=1;
	$response["events"]   = array();
	foreach ($schedules as $schedule)
	{

		$getSchedulingrow= $schedule->whens;
	 //  start_time
	 if(!empty($getSchedulingrow))
	 {

								$s_dateString = $schedule->whens.' '.$schedule->from_time;
								$e_dateString = $schedule->whens.' '.$schedule->to_time;
								$sdateObject = new DateTime($s_dateString);
								$edateObject = new DateTime($e_dateString);
							 // echo $dateObject->format('d-m-Y h:i A');
							 $doctor = $this->db->select("*")->from("user")->where("user_id",$schedule->doctor_id)->get()->row();
							 $patient = $this->db->select("*")->from("patient")->where("patient_id",$schedule->patent_id)->get()->row();
							 $dfname ='';
							 $dlname ='';
							 $pfname='';
							 $plname='';
							 $bcolor='';
							 if($doctor!=''){
								 $dfname = $doctor->firstname;
								 $dlname = $doctor->lastname;
							 }
							 if($patient!=''){
								 $pfname=$patient->fname;
								 $plname=$patient->lname;
							 }
							 $arr['id'] = $schedule->schedule_id;
							 $arr['title'] =$dfname.' '.$dlname;
							 $arr['start'] = $s_dateString;
							 $arr['end'] =$e_dateString;
							 if($schedule->appointment_type=='Follow-up Visit'){
						            $bcolor = '#B25900';

						   }else if($schedule->appointment_type=='Wellness Exam'){

$bcolor = '#4D8285';

						   }else if($schedule->appointment_type=='Nursing Only'){

						     $bcolor = '#537343';
						   }else if($schedule->appointment_type=='Urgent Visit'){

						     $bcolor = '#854D64';
						   }else if($schedule->appointment_type=='New Patient Visit'){
						     $bcolor = '#6A4D85';
						   }else if($schedule->appointment_type=='Video Visit'){

						     $bcolor = '#FFCC99';
						   }else if($schedule->type=='block'){


								 $bcolor = '#FF0000';
						   }
							 $arr['color']  = '#00a2ff';
							 $arr['backgroundColor'] =$bcolor;
							 $arr['tip'] ='Dr. '.$dfname.' '.$dlname .'-'.  $pfname.' '.$plname;
							 //$arr['allDay'] ='true';
array_push($response["events"], $arr);
}
	        //$data[] = $schedule;
	  }


	 //$events = array();

	 // $agenda['allDay'] = true;
	 // $agenda['start'] = new DateTime('2020-06-16 12:00:00');
	 // $agenda['end'] = new DateTime('2020-06-16 2:00:00');
	 // $agenda['title'] = "Hello World";
	 // $agenda['id']= "1";
	 // $events[] = $agenda;
	 //
	 // $agenda['allDay'] = false;
	 // $agenda['start'] = new DateTime('2020-06-16 12:00:00');
	 // $agenda['end'] = new DateTime('2020-06-16 2:00:00');
	 // $agenda['title'] = "Blah";
	 // $agenda['id']= "2";
	 // $events[] = $agenda;

	echo json_encode($response);
//	unset($data);

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
	//		$this->email->attach($pdf_name);
	//	}
		@$this->email->send();
	}
public function get_appoitmentlistbymonth(){
	//$times = $this->input->get('p_id');
	//$stime = explode(",",$times);
//	$date = date('Y-m-d');
$session_id = $this->session->userdata('user_id');
	$created_by_id = $this->session->userdata('created_by');
			$isadmin = $this->session->userdata('isadmin');
			if($isadmin == 1){
				$session_id = $created_by_id;
			}
$where = "Month(whens)=MONTH(CURRENT_DATE()) AND hospital_id='$session_id'";
	$schedules = $this->db->select("*")->from("schedule")->where($where)->order_by('whens','asc')->get()->result();
	//$query = $this->db->query("select * from schedule where Month(whens) = MONTH(CURRENT_DATE())");
		//$schedules = $query->result();
		//echo $this->db->last_query();
	//	exit;
	$msg ='';
	//if(count($schedules)>0){

	foreach ($schedules as  $value) {
		$msg.='<tr style="border-bottom: 1px solid #ddd; border-left: 1px solid #ddd;" class="hovertr">';
$insurance = $this->db->select("*")->from("insurance")->where("patient_id",$value->patent_id)->get()->row();
$patient = $this->db->select("*")->from("patient")->where("patient_id",$value->patent_id)->get()->row();
$bprovider = $this->db->select("*")->from("user")->where("user_id",$value->block_time_for)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();
if($value->doctor_id!='0'){
$provider = $this->db->select("*")->from("user")->where("user_id",$value->doctor_id)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();

	}
//
//print_r($provider);
//echo $provider[0]->firstname;
$msg.='<td>';
if($provider!='' and $value->type!='block'){
 $msg.=$provider->firstname.' '.$provider->lastname;
}else if($value->type=='block' and $value->block_time_for=='all'){
$msg.='Block time for all';
}else if(($value->type=='block') and ($value->block_time_for!='all')){
 $msg.=$provider->firstname.' '.$provider->lastname;
}
$msg.='</td>';
if($patient!=''){
$msg.='<td>'.$patient->fname.' '.$patient->mname.' '.$patient->lname.'</td>';
}else{
$msg.='<td></td>';
}


if($insurance!='' and $value->patent_id!=''){
$msg.='<td>'.$insurance->status.'</td>';
}else{
$msg.='<td>Inactive</td>';
}
if($value->type=='block'){
$msg.='<td>Block Time</td>';
}else{
	$msg.='<td>'.$value->appointment_type.'</td>';
}
$msg.='<td>'.date('d-m-Y',strtotime($value->whens)).'</td>';
$msg.='<td>'.date('Y-m-d h:i:A',strtotime($value->created_date)).'</td>';
if($value->created_by_role=='1' || $value->created_by_role=='2'){
				$created_by =$this->db->select("*")->from("user")->where("user_id",$value->created_by)->get()->row();
				$created_by->firstname = $created_by->firstname;
				$created_by->lastname = $created_by->lastname;
}else if($value->created_by_role=='10'){
	$created_by = $this->db->select("*")->from("patient")->where("id",$value->created_by)->get()->row();
	$created_by->firstname = $created_by->fname;
	$created_by->lastname = $created_by->lname;
}
$msg.='<td>'.$created_by->firstname.' '.$created_by->lastname.'</td>';
$msg.='<td>'.date('h:i A',strtotime($value->from_time)).'</td>';
$msg.='<td>'.$value->chief_complaint.'</td>';

if($insurance!='' and $value->patent_id!=''){
$msg.='<td>'.$insurance->copay_type.'</td>';
}else{
$msg.='<td></td>';
}
if($insurance!='' and $value->patent_id!=''){
$msg.='<td>'.$insurance->eligiblility.'</td>';
}else{
$msg.='<td></td>';
}
if($value->note!=''){
$msg.='<td>'.$value->note.'</td>';
}else{
$msg.='<td></td>';
}
$msg.='</tr>';
}

//	unset($u);
//	unset($value);
//	$sqlquery = "SELECT user.user_id,user.firstname,user.lastname FROM `schedule` INNER JOIN user on user.user_id = schedule.doctor_id where schedule.start_time!= '$time' and schedule.date ='$date' and user.user_role ='2' and user.status ='1'";
//	$query = $this->db->query($sqlquery);
//	$results = $query->result();
	echo json_encode($msg);
//	unset($data);
//}
}

public function get_appoitmentlistbyweek(){
	//$times = $this->input->get('p_id');
	//$stime = explode(",",$times);
//	$date = date('Y-m-d');
//SELECT * FROM schedule WHERE
//$where = "whens > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
//$date = date('Y-m-d');
		//	$from_date = date('Y-m-d', strtotime('+6 day', strtotime($date)));
			$sunday = strtotime("last sunday");
			$sunday = date('w', $sunday)==date('w') ? $sunday+7*86400 : $sunday;

			$satday = strtotime(date("Y-m-d",$sunday)." +6 days");

			$this_week_sd = date("Y-m-d",$sunday);
			$this_week_ed = date("Y-m-d",$satday);

//$session_id = $this->session->userdata('user_id');

$where = "whens BETWEEN '$this_week_sd' AND '$this_week_ed'";
$session_id = $this->session->userdata('user_id');
	$created_by_id = $this->session->userdata('created_by');
			$isadmin = $this->session->userdata('isadmin');
			if($isadmin == 1){
				$session_id = $created_by_id;
			}
	$schedules = $this->db->select("*")->from("schedule")->where($where)->where('hospital_id',$session_id)->order_by('whens','asc')->get()->result();
	//$query = $this->db->query("select * from schedule where Month(whens) = MONTH(CURRENT_DATE())");
		//$schedules = $query->result();
	$msg ='';
	//if(count($schedules)>0){
//$session_id = $this->session->userdata('user_id');
	foreach ($schedules as  $value) {
		$msg.='<tr style="border-bottom: 1px solid #ddd; border-left: 1px solid #ddd;" class="hovertr">';
$insurance = $this->db->select("*")->from("insurance")->where("patient_id",$value->patent_id)->get()->row();
$patient = $this->db->select("*")->from("patient")->where("patient_id",$value->patent_id)->get()->row();
$bprovider = $this->db->select("*")->from("user")->where("user_id",$value->block_time_for)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();

//$provider ='';
if($value->doctor_id!='0'){
$provider = $this->db->select("*")->from("user")->where("user_id",$value->doctor_id)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();

}else{
	$provider  =  new stdClass();
	$provider->firstname ='';
	$provider->lastname ='';
}


$msg.='<td>';
if($provider!='' and $value->type!='block'){
 $msg.=$provider->firstname.' '.$provider->lastname;
}else if($value->type=='block' and $value->block_time_for=='all'){
$msg.='Block time for all';
}else if(($value->type=='block') and ($value->block_time_for!='all')){
 $msg.=$provider->firstname.' '.$provider->lastname;
}
$msg.='</td>';

if($patient!=''){
$msg.='<td>'.$patient->fname.' '.$patient->mname.' '.$patient->lname.'</td>';
}else{
$msg.='<td></td>';
}


if($insurance!='' and $value->patent_id!=''){
$msg.='<td>'.$insurance->status.'</td>';
}else{
$msg.='<td>Inactive</td>';
}
if($value->type=='block'){
$msg.='<td>Block Time</td>';
}else{
	$msg.='<td>'.$value->appointment_type.'</td>';
}
$msg.='<td>'.date('d-m-Y',strtotime($value->whens)).'</td>';
$msg.='<td>'.date('Y-m-d h:i:A',strtotime($value->created_date)).'</td>';

if($value->created_by_role=='1' || $value->created_by_role=='2'){
				$created_by =$this->db->select("*")->from("user")->where("user_id",$value->created_by)->get()->row();
				$created_by->firstname = $created_by->firstname;
				$created_by->lastname = $created_by->lastname;
}else if($value->created_by_role=='10'){
	$created_by = $this->db->select("*")->from("patient")->where("id",$value->created_by)->get()->row();
	$created_by->firstname = $created_by->fname;
	$created_by->lastname = $created_by->lname;
}
$msg.='<td>'.$created_by->firstname.' '.$created_by->lastname.'</td>';
$msg.='<td>'.date('h:i A',strtotime($value->from_time)).'</td>';
$msg.='<td>'.$value->chief_complaint.'</td>';

if($insurance!='' and $value->patent_id!=''){
$msg.='<td>'.$insurance->copay_type.'</td>';
}else{
$msg.='<td></td>';
}
if($insurance!='' and $value->patent_id!=''){
$msg.='<td>'.$insurance->eligiblility.'</td>';
}else{
$msg.='<td></td>';
}
if($value->note!=''){
$msg.='<td>'.$value->note.'</td>';
}else{
$msg.='<td></td>';
}
$msg.='</tr>';
}

//	unset($u);
//	unset($value);
//	$sqlquery = "SELECT user.user_id,user.firstname,user.lastname FROM `schedule` INNER JOIN user on user.user_id = schedule.doctor_id where schedule.start_time!= '$time' and schedule.date ='$date' and user.user_role ='2' and user.status ='1'";
//	$query = $this->db->query($sqlquery);
//	$results = $query->result();
	echo json_encode($msg);
//	unset($data);
//}
}
public function get_appoitmentlistbytoday(){
	//$times = $this->input->get('p_id');
	//$stime = explode(",",$times);
//	$date = date('Y-m-d');
//SELECT * FROM schedule WHERE
//$where = "whens > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
$date = date('Y-m-d');
$session_id = $this->session->userdata('user_id');
	$created_by_id = $this->session->userdata('created_by');
			$isadmin = $this->session->userdata('isadmin');
			if($isadmin == 1){
				$session_id = $created_by_id;
			}
	$schedules = $this->db->select("*")->from("schedule")->where('whens',$date)->where("hospital_id",$session_id)->order_by('whens','asc')->get()->result();
	//$query = $this->db->query("select * from schedule where Month(whens) = MONTH(CURRENT_DATE())");
		//$schedules = $query->result();
	$msg ='';
	//if(count($schedules)>0){
//$session_id = $this->session->userdata('user_id');
	foreach ($schedules as  $value) {
		$msg.='<tr style="border-bottom: 1px solid #ddd; border-left: 1px solid #ddd;" class="hovertr">';
$insurance = $this->db->select("*")->from("insurance")->where("patient_id",$value->patent_id)->get()->row();
$patient = $this->db->select("*")->from("patient")->where("patient_id",$value->patent_id)->get()->row();
$bprovider = $this->db->select("*")->from("user")->where("user_id",$value->block_time_for)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();
if($value->doctor_id!='0'){
$provider = $this->db->select("*")->from("user")->where("user_id",$value->doctor_id)->where('user_role','2')->where('user.created_by',$session_id)->get()->row();

	}else{
		$provider  =  new stdClass();
		$provider->firstname ='';
		$provider->lastname ='';
	}


	$msg.='<td>';
	if($provider!='' and $value->type!='block'){
	 $msg.=$provider->firstname.' '.$provider->lastname;
	}else if($value->type=='block' and $value->block_time_for=='all'){
	$msg.='Block time for all';
	}else if(($value->type=='block') and ($value->block_time_for!='all')){
	 $msg.=$provider->firstname.' '.$provider->lastname;
	}
	$msg.='</td>';

if($patient!=''){
$msg.='<td>'.$patient->fname.' '.$patient->mname.' '.$patient->lname.'</td>';
}else{
$msg.='<td></td>';
}


if($insurance!='' and $value->patent_id!=''){
$msg.='<td>'.$insurance->status.'</td>';
}else{
$msg.='<td>Inactive</td>';
}
if($value->type=='block'){
$msg.='<td>Block Time</td>';
}else{
	$msg.='<td>'.$value->appointment_type.'</td>';
}
$msg.='<td>'.date('d-m-Y',strtotime($value->whens)).'</td>';
$msg.='<td>'.date('Y-m-d h:i:A',strtotime($value->created_date)).'</td>';

if($value->created_by_role=='1' || $value->created_by_role=='2'){
				$created_by =$this->db->select("*")->from("user")->where("user_id",$value->created_by)->get()->row();
				$created_by->firstname = $created_by->firstname;
				$created_by->lastname = $created_by->lastname;
}else if($value->created_by_role=='10'){
	$created_by = $this->db->select("*")->from("patient")->where("id",$value->created_by)->get()->row();
	$created_by->firstname = $created_by->fname;
	$created_by->lastname = $created_by->lname;
}
$msg.='<td>'.$created_by->firstname.' '.$created_by->lastname.'</td>';
$msg.='<td>'.date('h:i A',strtotime($value->from_time)).'</td>';
$msg.='<td>'.$value->chief_complaint.'</td>';

if($insurance!='' and $value->patent_id!=''){
$msg.='<td>'.$insurance->copay_type.'</td>';
}else{
$msg.='<td></td>';
}
if($insurance!='' and $value->patent_id!=''){
$msg.='<td>'.$insurance->eligiblility.'</td>';
}else{
$msg.='<td></td>';
}
if($value->note!=''){
$msg.='<td>'.$value->note.'</td>';
}else{
$msg.='<td></td>';
}
$msg.='</tr>';
}

//	unset($u);
//	unset($value);
//	$sqlquery = "SELECT user.user_id,user.firstname,user.lastname FROM `schedule` INNER JOIN user on user.user_id = schedule.doctor_id where schedule.start_time!= '$time' and schedule.date ='$date' and user.user_role ='2' and user.status ='1'";
//	$query = $this->db->query($sqlquery);
//	$results = $query->result();
	echo json_encode($msg);
//	unset($data);
//}
}
public function getdoctor(){
	$session_id = $this->session->userdata('user_id');
	$times = $this->input->get('start');
	$stime = explode("T",$times);
	$time = $stime[1];
	$date = $stime[0];
	$schedule = $this->db->select("doctor_id")->from("schedule")->where("start_time",$time)->where("hospital_id",$session_id)->where("date",$date)->get()->result();
	foreach ($schedule as  $value) {
		$d[]= $value->doctor_id;
		// code...
	}

	//foreach ($schedule as $value) {
		$user = $this->db->select("user.user_id,user.firstname,user.lastname")->from("user")->where_not_in("user_id",$d)->where("user_role",'2')->where("status",'1')->get()->result();
  //  $s = new stdClass();
		foreach ($user as $u) {
			// code...
			//$data[] =
		//}
$data[] = $u;
	//	unset($s);
		// code...
	}
//	unset($u);
//	unset($value);
//	$sqlquery = "SELECT user.user_id,user.firstname,user.lastname FROM `schedule` INNER JOIN user on user.user_id = schedule.doctor_id where schedule.start_time!= '$time' and schedule.date ='$date' and user.user_role ='2' and user.status ='1'";
//	$query = $this->db->query($sqlquery);
//	$results = $query->result();
	echo json_encode($data);
	unset($data);
}
public function getpatient(){
	$session_id = $this->session->userdata('user_id');
	$times = $this->input->get('start');
	$stime = explode("T",$times);
	$time = $stime[1];
	$date = $stime[0];
	$schedule = $this->db->select("patent_id")->from("schedule")->where("start_time",$time)->where("hospital_id",$session_id)->where("date",$date)->get()->result();
	foreach ($schedule as  $value) {
		$d[]= $value->patent_id;
		// code...
	}

	//foreach ($schedule as $value) {
		$user = $this->db->select("patient.patient_id,patient.firstname,patient.lastname")->from("patient")->where_not_in("patient_id",$d)->where("status",'1')->get()->result();
  //  $s = new stdClass();
	if(count($user)>0){
		foreach ($user as $u) {
			// code...
			//$data[] =
		//}
$data[] = $u;
	//	unset($s);
		// code...
	}
}else{
	$data = array();
}
//	unset($u);
//	unset($value);
//	$sqlquery = "SELECT user.user_id,user.firstname,user.lastname FROM `schedule` INNER JOIN user on user.user_id = schedule.doctor_id where schedule.start_time!= '$time' and schedule.date ='$date' and user.user_role ='2' and user.status ='1'";
//	$query = $this->db->query($sqlquery);
//	$results = $query->result();
	echo json_encode($data);
	unset($data);
}
 	public function create()
	{
			$data['doctor'] = $this->doctor_model->doctor_list();
		$data['title'] = display('add_schedule');
		#-------------------------------#
//echo $this->input->get_post('block_time_for',true);
//exit;
		if($this->input->get_post('block_time_for')!=null){
			//echo 'test';
			//exit;
			$this->form_validation->set_rules('block_time_for',"Block Time For",'required');
			//$this->form_validation->set_rules('bduration',"Duration",'required');
			$this->form_validation->set_rules('reason',"reason",'required');
		}else if($this->input->get_post('doctor_id',true)!=null){
			$this->form_validation->set_rules('doctor_id', display('doctor_name'),'required|max_length[11]');
			$this->form_validation->set_rules('patent_id', "Patient",'required|max_length[11]');
			$this->form_validation->set_rules('aduration',"Duration",'required');
			$this->form_validation->set_rules('appointment_type',"Appointment Type",'required');
			$this->form_validation->set_rules('awhens',"WHENS",'required');
			$this->form_validation->set_rules('afrom_time',"FROM TIME",'required');
			$this->form_validation->set_rules('ato_time',"TO TIME",'required');
		}else{
			$this->form_validation->set_rules('patent_id', "Patient",'required|max_length[11]');
		}

	//	$this->form_validation->set_rules('start_time', display('start_time'),'required|max_length[8]');
	//	$this->form_validation->set_rules('end_time', display('end_time'),'required|max_length[8]');
	//	$this->form_validation->set_rules('available_days[]', display('available_days'),'required|min_length[1]');
	//	$this->form_validation->set_rules('per_patient_time', display('per_patient_time'),'required|min_length[1]');
	//	$this->form_validation->set_rules('serial_visibility_type', display('serial_visibility_type') ,'max_length[5]');
	//	$this->form_validation->set_rules('status', display('status'),'required');
	//	$this->form_validation->set_rules('date', 'Date','required');
		#-------------------------------#

//echo $this->input->post('from_time',true);
//exit;
$whens='';
$from_time='';
$to_time ='';
$type='';
$repeatdate='';
$reason='';
$repeat='';
if($this->input->post('repeat_date',true)!=''){
	$repeatdate = date('Y-m-d',strtotime($this->input->post('repeat_date',true)));
}else{
	$repeatdate = '0000-00-00';
}
if($this->input->post('awhens',true)){
	$whens = date('Y-m-d',strtotime($this->input->post('awhens',true)));
}else if($this->input->post('bwhens',true)){
	$whens = date('Y-m-d',strtotime($this->input->post('bwhens',true)));
}
if($this->input->post('afrom_time',true)){
	$from_time = date('H:i:s',strtotime($this->input->post('afrom_time',true)));
}else if($this->input->post('bfrom_time',true)){
	$from_time = date('H:i:s',strtotime($this->input->post('bfrom_time',true)));
}

if($this->input->post('ato_time',true)){
	$to_time = date('H:i:s',strtotime($this->input->post('ato_time',true)));
}else if($this->input->post('bto_time',true)) {
	$to_time = date('H:i:s',strtotime($this->input->post('bto_time',true)));
}
if($this->input->post('block_time_for',true)){
	$type = $this->input->post('btype',true);
	$reason=$this->input->post('reason',true);
	$repeat=$this->input->post('repeat',true);
	$chief_complaint="";
	$appointment_type="";
}else{
	$type = $this->input->post('atype',true);
	$chief_complaint = $this->input->post('chief_complaint',true);
	$appointment_type=$this->input->post('appointment_type',true);
}



$session_id = $this->session->userdata('user_id');
$created_by_id = $this->session->userdata('created_by');
$isadmin = $this->session->userdata('isadmin');
if($isadmin == 1){
	$session_id = $created_by_id;
}
$doctordetail = $this->db->select("*")->from("user")->where("user_id",$this->input->post('doctor_id',true))->get()->row();
$pdetail = $this->db->select("*")->from("patient")->where("patient_id",$this->input->post('patent_id',true))->get()->row();
    //$whens =   date('Y-m-d',strtotime($this->input->post('whens',true)))
		$data['schedule'] = (object)$postData = [
			'schedule_id' 	 => $this->input->post('schedule_id',true),
			'doctor_id' 	 => ($this->input->post('doctor_id',true)!='')?$this->input->post('doctor_id',true):0,
			'block_time_for' 	 => ($this->input->post('block_time_for',true)!='')?$this->input->post('block_time_for',true):0,
			'duration' =>($this->input->post('aduration',true)!='')?$this->input->post('aduration',true):$this->input->post('bduration',true),
			'chief_complaint' 	 => $chief_complaint,
			'appointment_type' 	 => $appointment_type,
			'whens' =>$whens,
			'from_time' => $from_time,
			'to_time' => $to_time,
			//'is_repeat' => ($this->input->post('is_repeat',true)!='')?$this->input->post('is_repeat',true):"0",
			'repeat' =>$repeat,
			'reason' => $reason,
			'repeat_date' => $repeatdate,
			//'description' => ($this->input->post('description',true)!='')?$this->input->post('description',true):'',
			'note' => ($this->input->post('note',true)!='')?$this->input->post('note',true):'',
			'type' => $type,
			'patent_id' => ($this->input->post('patent_id',true)!='')?$this->input->post('patent_id',true):'',
			'hospital_id'=> $session_id,
			'created_date' => date('Y-m-d h:i:s'),
			'created_by'=>$this->session->userdata('user_id'),
			'created_by_role'=>$this->session->userdata('user_role')
		];

		#-------------------------------#
		if ($this->form_validation->run() === true) {

			//echo $type;exit;
			//print_r($data);
			//exit;
			#if empty $schedule_id then insert data
			//if (empty($postData['schedule_id'])) {


			 if($repeat!=''){

			 		$doctordetail = $this->db->select("*")->from("user")->where("user_id",$this->input->post('block_time_for',true))->get()->row();
					$pdetail = $this->db->select("*")->from("patient")->where("patient_id",$this->input->post('patent_id',true))->get()->row();
				 $begin = new DateTime($whens);
				 $stop_date = date('Y-m-d', strtotime($repeatdate . ' +1 day'));
 				$end =  new DateTime($stop_date);

 				$interval = DateInterval::createFromDateString('1 day');
 				$period = new DatePeriod($begin, $interval, $end);

 				foreach ($period as $dt) {
 				    //echo $dt->format("l Y-m-d H:i:s\n");


						$arrr['schedule_id'] =$this->input->post('schedule_id',true);
						$arrr['doctor_id'] = ($this->input->post('doctor_id',true)!='')?$this->input->post('doctor_id',true):0;
						$arrr['block_time_for'] = ($this->input->post('block_time_for',true)!='')?$this->input->post('block_time_for',true):0;
						$arrr['duration'] = ($this->input->post('aduration',true)!='')?$this->input->post('aduration',true):$this->input->post('bduration',true);
						$arrr['chief_complaint'] = $chief_complaint;
						$arrr['appointment_type'] = $appointment_type;
						$arrr['whens'] = $dt->format('Y-m-d');
						$arrr['from_time'] = $from_time;
						$arrr['to_time'] = $to_time;
						$arrr['repeat'] = $repeat;
						$arrr['reason'] = $reason;
						$arrr['description'] = '';
						$arrr['repeat_date'] = $repeatdate;
						$arrr['note'] = ($this->input->post('note',true)!='')?$this->input->post('note',true):'';
						$arrr['type'] = $type;
						$arrr['patent_id'] = ($this->input->post('patent_id',true)!='')?$this->input->post('patent_id',true):'';
						$arrr['hospital_id'] = $session_id;
						$arrr['created_date'] = date('Y-m-d h:i:s');
						$arrr['created_by'] = $this->session->userdata('user_id');
						$arrr['created_by_role'] = $this->session->userdata('user_role');
						//$this->schedule_model->create($postDatas);
						$this->db->insert('schedule',$arrr);
          //  echo $this->db->last_query();
					//	exit;


 				}
				$inserted_id = $this->db->insert_id();
				if($inserted_id){
									  
					if($type == "appointment"){
						$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"scheduleappointment","Add  Appointment",
                			$pdetail->fname." ".$pdetail->lname." Patient Appointment fixed with ".$doctordetail->firstname."  ".$doctordetail->lastname." Medical Provider at ".date('Y-m-d',strtotime($this->input->post('awhens',true)))." ".date('h:i:s',strtotime($from_time))." To ".date('h:i:s',strtotime($to_time)),$this->session->userdata("hospital_id"),$pdetail->id,$pdetail->fname." ".$pdetail->lname,10);
					}else{

						$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"scheduleappointment","Add  Block",
                			$doctordetail->firstname."  ".$doctordetail->lastname."  Medical Provider Appointment has been blocked with Patient at ".date('Y-m-d',strtotime($this->input->post('bwhens',true)))." ".date('h:i:s',strtotime($from_time))." To ".date('h:i:s',strtotime($to_time)),$this->session->userdata("hospital_id"),$doctordetail->user_id,$doctordetail->firstname." ".$doctordetail->lastname,2);						
					}

					$this->session->set_flashdata('message',display('save_successfully'));
				}else{
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
				//exit;

			 }else{
			 	$doctordetail = $this->db->select("*")->from("user")->where("user_id",$this->input->post('block_time_for',true))->get()->row();
					$pdetail = $this->db->select("*")->from("patient")->where("patient_id",$this->input->post('patent_id',true))->get()->row();
			//	 print_r($postData);
				// exit;
			//	 $this->schedule_model->create($postData);
			//	 exit;
				 if ($this->schedule_model->create($postData)) {

			if($doctordetail!='' and $pdetail!=''){
				$to = $doctordetail->email;
				$ap_type = $this->input->post('appointment_type',true);
				$dd_when = date('m/d/Y',strtotime($this->input->post('awhens',true)));
				$ttime = date('h:i A',strtotime($from_time));
				$subject=$ap_type." Appointment with ".$pdetail->fname.' '.$pdetail->lname." on ".$dd_when.' '.$ttime;
				$htmlMessage_doc = "Hello ".$doctordetail->firstname.' '.$doctordetail->lastname.','."<br><br><br>";
				$htmlMessage_doc .= "You are scheduled for a ".$ap_type." appointment with ".$pdetail->fname.' '.$pdetail->lname.".<br><br><br>";
				$htmlMessage_doc .= "When:  ".date('l,F d,Y',strtotime($this->input->post('awhens',true))).'  at  '.$ttime.".<br><br><br>";
				$htmlMessage_doc .= "If you have questions or need help, please contact us by phone: 856XXXXX"."<br><br><br>";
				$htmlMessage_doc .= "Thank you,"."<br>";
				$htmlMessage_doc .= SYS_NAME."<br><br>";
				$this->sendEmailAttachment($to,$subject,$htmlMessage_doc);

				$to_p = $pdetail->email;
				$ap_type = $this->input->post('appointment_type',true);
				$dd_when = date('m/d/Y',strtotime($this->input->post('awhens',true)));
				$ttime = date('h:i A',strtotime($from_time));
				$subjectp=$ap_type." Appointment with ".$doctordetail->firstname.' '.$doctordetail->lastname." on ".$dd_when.' '.$ttime;
				$htmlMessage_p = "Hello ".$pdetail->fname.' '.$pdetail->lname.','."<br><br><br>";
				$htmlMessage_p .= "You are scheduled for a ".$ap_type." appointment with ".$doctordetail->firstname.' '.$doctordetail->lastname.".<br><br><br>";
				$htmlMessage_p .= "When:  ".date('l,F d,Y',strtotime($this->input->post('awhens',true))).'  at  '.$ttime.".<br><br><br>";
				$htmlMessage_p .= "We recommend that you reach the venue 15 minutes before your appointment time in order to complete any necessary forms."."<br><br><br>";

				$htmlMessage_p .= "If you have questions or need help, please contact us by phone: 856XXXXX"."<br><br><br>";
				$htmlMessage_p .= "Thank you,"."<br>";
				$htmlMessage_p .= SYS_NAME."<br><br>";
				$this->sendEmailAttachment($to_p,$subjectp,$htmlMessage_p);
			}
           //$doctordetail = new stdClass();

					
					 
					if($type == "appointment"){
						$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"scheduleappointment","Add  Appointment",
                			$pdetail->fname." ".$pdetail->lname." Patient Appointment fixed with ".$doctordetail->firstname."  ".$doctordetail->lastname." Medical Provider at ".date('Y-m-d',strtotime($this->input->post('awhens',true)))." ".date('h:i:s',strtotime($from_time))." To ".date('h:i:s',strtotime($to_time)),$this->session->userdata("hospital_id"),$pdetail->id,$pdetail->fname." ".$pdetail->lname,10);
					}else{
						$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"scheduleappointment","Add  Block",
                			$doctordetail->firstname."  ".$doctordetail->lastname." Medical Provider Appointment has been blocked with Patient at ".date('Y-m-d',strtotime($this->input->post('bwhens',true)))." ".date('h:i:s',strtotime($from_time))." To ".date('h:i:s',strtotime($to_time)),$this->session->userdata("hospital_id"),$doctordetail->user_id,$doctordetail->firstname." ".$doctordetail->lastname,2);			
					}

					

 					#set success message
 					$this->session->set_flashdata('message',display('save_successfully'));
 				} else {
 					#set exception message
 					$this->session->set_flashdata('exception',display('please_try_again'));
 				}
			 }

			//	redirect('schedule/create'); schedule
			redirect('schedule');
			//}
			// else {
			// 	if ($this->schedule_model->update($postData)) {
			// 		#set success message
			// 		$this->session->set_flashdata('message',display('update_successfully'));
			// 	} else {
			// 		#set exception message
			// 		$this->session->set_flashdata('exception',display('please_try_again'));
			// 	}
			// 	redirect('schedule/edit/'.$postData['schedule_id']);
			// }

		} else {
			$session_id = $this->session->userdata('user_id');
			$date = date('Y-m-d');
			$data['schedulestoday'] = $this->db->select("*")->from("schedule")->where("whens",$date)->where("hospital_id",$session_id)->order_by('whens','asc')->get()->result();
			$data['doctor_list'] = $this->doctor_model->doctor_list();
			$data['content'] = $this->load->view('schedule',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		}
	}
	public function createold()
	{
		$data['title'] = display('add_schedule');
		#-------------------------------#
		$this->form_validation->set_rules('doctor_id', display('doctor_name'),'required|max_length[11]');
	//	$this->form_validation->set_rules('start_time', display('start_time'),'required|max_length[8]');
	//	$this->form_validation->set_rules('end_time', display('end_time'),'required|max_length[8]');
	//	$this->form_validation->set_rules('available_days[]', display('available_days'),'required|min_length[1]');
	//	$this->form_validation->set_rules('per_patient_time', display('per_patient_time'),'required|min_length[1]');
	//	$this->form_validation->set_rules('serial_visibility_type', display('serial_visibility_type') ,'max_length[5]');
	//	$this->form_validation->set_rules('status', display('status'),'required');
	//	$this->form_validation->set_rules('date', 'Date','required');
		#-------------------------------#


		$starttime = $this->input->post('start_time',true);
		$end_time = $this->input->post('end_time',true);
		$stime = explode("T",$starttime);
		$etime = explode("T",$end_time);
		//echo $stime[0].''.$stime[1];
		//exit;
		$available_days = date("l", strtotime($stime[1]));
		$data['schedule'] = (object)$postData = [
			'schedule_id' 	 => $this->input->post('schedule_id',true),
			'doctor_id' 	 => $this->input->post('doctor_id',true),
			'available_days' => $available_days,
			'start_time' 	 => $stime[1],
			'end_time' 	 	 => $etime[1],
			'per_patient_time' => '00:30:18',//$this->input->post('per_patient_time',true),
			'serial_visibility_type' => $this->input->post('serial_visibility_type',true),
			'status'         => '1',//$this->input->post('status',true),
			'date'         => date('Y-m-d',strtotime($stime[0])),
			'description' => $this->input->post('description',true),
			'patent_id' => $this->input->post('patent_id',true)
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $schedule_id then insert data
			if (empty($postData['schedule_id'])) {

				if ($this->schedule_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
			//	redirect('schedule/create'); schedule
			redirect('schedule');
			} else {
				if ($this->schedule_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
				redirect('schedule/edit/'.$postData['schedule_id']);
			}

		} else {
			$data['doctor_list'] = $this->doctor_model->doctor_list();
			$data['content'] = $this->load->view('schedule_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		}
	}

	public function edit($schedule_id = null)
	{
		$data['title'] = display('schedule_edit');
		#-------------------------------#
		$data['schedule'] = $this->schedule_model->read_by_id($schedule_id);
		$data['doctor_list'] = $this->doctor_model->doctor_list();
		$data['content'] = $this->load->view('schedule_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}


	public function delete($schedule_id = null)
	{
		if ($this->session->userdata('user_role') != 1)
		redirect('login');

		if ($this->schedule_model->delete($schedule_id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('schedule');
	}


}
