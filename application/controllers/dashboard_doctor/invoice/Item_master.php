<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('dompdf_gen');	
		//print_r($_SESSION);exit;
		$this->load->model(array(
			'doctor_model',
      		'item_master_model',
			'department_model',
			'dashboard_model'

		));

		
	}
 	public function auto_login(){ 
 		$payment_id = $_GET['paymentId'];
 		$patient_id 	= $this->uri->segment(5);
 		$login_id 		= $this->uri->segment(7);
 		$orderID		= $this->uri->segment(6);

 		$user_Data      = $this->db->get_where("patient",array("id"=>$patient_id))->row();
		$data['user'] = (object)$postData = [
				'email'     => $user_Data->email,
				'password'  => $user_Data->password,
				'user_role' => 10,
			];
				
		$check_user = $this->dashboard_model->check_patient($postData);
		
		$check_user_data = $check_user->row();
		//check_user_status
		//echo $check_user->num_rows();exit;
				
		if ($check_user->num_rows() === 1) {											
				//store data in session
				$this->session->set_userdata([
						'isLogIn'   => true,
						'user_id' => (($postData['user_role']==10)?$check_user_data->id:$check_user_data->user_id),
						'patient_id' => (($postData['user_role']==10)?$check_user_data->patient_id:null),
						'email'     => $check_user_data->email,
						'fullname'  => $check_user_data->fname.' '.$check_user_data->lname,
						'user_role' => (($postData['user_role']==10)?10:$check_user_data->user_role),
						'picture'   => $check_user_data->picture,
						'title'     => (!empty($setting->title)?$setting->title:null),
						'address'   => (!empty($setting->description)?$setting->description:null),
						'logo'      => (!empty($setting->logo)?$setting->logo:null),
						'favicon'      => (!empty($setting->favicon)?$setting->favicon:null),
						'footer_text' => (!empty($setting->footer_text)?$setting->footer_text:null),
						'isadmin' =>($check_user_data->is_admin=='1')?$check_user_data->is_admin:'0',
						'created_by' =>$check_user_data->created_by,
						'features' =>$check_user_data->features,
						'hospital_id'=>$check_user_data->hospital_id
				]);
				//print_r($_SESSION);exit;
				$this->success_payment($patient_id,$orderID,$login_id,$payment_id);
						
		}else{
			redirect('login');
		} 			
 	}


	public function index()
	{

		$list = $this->db->select("*")->from("item_master")->get()->result();
		$data['list'] = $list;
		$data['content']  = $this->load->view('item_master' ,$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}

	public function get_patient_list()
	{
		
		$p_id = trim($this->input->get_post('p_id'));
		$id = $this->session->userdata('user_id');
    	$created_by_id = $this->session->userdata('created_by');
		$isadmin = $this->session->userdata('isadmin');
        if($isadmin != 1){
        	$id = $created_by_id;
        }
		$sql ="SELECT * FROM patient WHERE hospital_id='$id' and (patient_id like '%".($p_id)."%' or fname like '%".($p_id)."%' or email like '%".($p_id)."%' or date_of_birth like '%".($p_id)."%') ORDER BY id DESC";
		$query = $this->db->query($sql);
		$searchdetail =  $query->result();
		$msg ='';
		$total = 0;

		foreach ($searchdetail as $value) {
			$subscribe = $this->db->get_where("subscribe",array('patient_id' =>$value->id ))->result();

                foreach ($subscribe as $key => $subscribe_value) {      
                    $total = $subscribe_value->amount + $total;
                    $start_date = date("d-m-Y h:i:s",strtotime($subscribe_value->start_date));
                }   

                $unpaid_subscribe = $this->db->get_where("subscribe",array('patient_id' =>$patientvalue->id,"status"=>0 ))->result();
                
                foreach ($unpaid_subscribe as  $unpaid_subscribe_value) {      
                    $unpaid_total = $unpaid_subscribe_value->amount + $unpaid_total;
                    $created_date = date("d-m-Y h:i:s",strtotime($unpaid_subscribe_value->created_date));
                }
                $Final_total  = $Paidtotal + $unpaid_total;
				
				 
				$msg.='<tr style="border-bottom: 1px solid #ddd;" class="hovertr">';								
				$msg.='<td class="text-left"><a href='.base_url("dashboard_doctor/invoice/item_master/invoice/".$patientvalue->id).'>'.$value->fname." ".$value->lname.'</a></td>';
				$msg.='<td class="text-left"><a href='.base_url("dashboard_doctor/invoice/item_master/invoice/".$patientvalue->id).'>'.$total.'</a></td>';
				$msg.='<td class="text-left"><a href='.base_url("dashboard_doctor/invoice/item_master/invoice/".$patientvalue->id).'>'.$unpaid_total.'</a></td>';
				$msg.='<td class="text-left"><a href='.base_url("dashboard_doctor/invoice/item_master/invoice/".$patientvalue->id).'>'.$Final_total.'</a></td>';				
				$msg.='</tr>';

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
			//	$this->email->attach($pdf_name);
		//}
		@$this->email->send();
	}
	public function changestatus()
	{
		$id = $this->input->get_post('id');
		$value = $this->input->get_post('value');

		$arr['status'] = $value;
		$this->db->where('id',$id);
		$this->db->update('item_master',$arr);
		echo 'success';
		exit;
	}
	public function changestatus_itemcategory()
	{
		$id = $this->input->get_post('id');
		$value = $this->input->get_post('value');

		$arr['status'] = $value;
		$this->db->where('category_id',$id);
		$this->db->update('itemcategory_master',$arr);
		echo 'success';
		exit;
	}
	

	public function create()
	{
		$data['title'] = display('add_doctor');
		#-------------------------------#

		$this->form_validation->set_rules('service_name', display('service_name') ,'required');
		$this->form_validation->set_rules('category', display('category'),'required');

		$session_id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
        if($isadmin == 1){
        	$session_id = $created_by_id;
        }

		if ($this->input->post('id',true) == null) {
			$data['doctor'] = (object)$postData = [
				'id'      => $this->input->post('id',true),
				'service_name'    => $this->input->post('service_name',true),
				'amount'    => $this->input->post('amount',true),
				'category' 	   => $this->input->post('category',true),
				'status' 	   => $this->input->post('status',true),
				'date' 	   => date('Y-m-d'),
				'hospital_id'    => $session_id

				//$this->input->post('status',true),
			];
		} else { //update a user
			$data['doctor'] = (object)$postData = [
        		'id'   => $this->input->post('id',true),
				'service_name'    => $this->input->post('service_name',true),
				'amount'    => $this->input->post('amount',true),
				'category' 	   => $this->input->post('category',true),
				'status' 	   => $this->input->post('status',true),
				'date' 	   => date('Y-m-d'),
				'hospital_id'    => $session_id
			];
		}

		#-------------------------------#
		if ($this->form_validation->run() === true) {
    //  print_r($postData);
    //  exit;
			#if empty $user_id then insert data
			if (empty($postData['id'])) {
				if ($this->item_master_model->create($postData)) {
					#set success message

					$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"itemmaster","Add Item Master",$this->input->post('service_name',true)." Item is Add by Admin.",$this->session->userdata("hospital_id"),$this->session->userdata("user_id"),$hospital_name->hospitalname,1);


					$this->session->set_flashdata('message',display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
					redirect('item_master/create');
				}



				//redirect('doctor/create');
				redirect('item_master/');
			} else {
				if ($this->item_master_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
					redirect('item_master/edit/'.$postData['user_id']);
				}

				//update profile picture


				//redirect('doctor/edit/'.$postData['user_id']);
				redirect('item_master/');
			}

		} else {
			$data['category'] = $this->item_master_model->get_category();
			
      		$data['content']  = $this->load->view('item_master_form' ,$data,true);
			$this->load->view('dashboard_doctor/main_wrapper',$data);
		}
	}
	 
	public function billing(){
		$data['title'] = display('Bill List');
		#-------------------------------#
		$id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
        if($isadmin == 0){
        	$id = $created_by_id;
        }
        $patient =  $this->db->select("*")
		->from("patient")
		->where('hospital_id',$id)
		->order_by('id','desc')
		->get()
		->result();
		
		$data["patient"] = $patient;
		//print_r($data);exit;
		$data['content']  = $this->load->view('dashboard_doctor/invoice/billing' ,$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}	

	public function delete_billing($patient_id)
	{
		$this->db->where("patient_id",$patient_id);
		$this->db->delete("subscribe");

		$this->db->where("patient_id",$patient_id);
		$this->db->delete('communication_log');

		redirect(base_url('dashboard_doctor/invoice/item_master/billing'));
	}

	public function invoice(){
		
		$data['title'] = display('invoice');
		#-------------------------------#
		$item = $this->db->get_where("item_master",array("status"=>"active"))->result();
		$data["item"] = $item;
		$patient_id  = $this->uri->segment(5);

		$id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
        if($isadmin == 0){
        	$id = $created_by_id;
        }
        $patientData =  $this->db->select("*")
		->from("patient")
		->where('hospital_id',$id)
		->where('id',$patient_id)
		->order_by('id','desc')
		->get()
		->row();
		//echo $this->db->last_query();exit;
		$data["patient"] = $patientData;

		$subscribeData =  $this->db->select("*")
		->from("subscribe")		
		->where('patient_id',$patient_id)
		->where('status',0)
		->where('subscribe',1)
		->order_by('start_date','desc')
		->get()
		->result();

		$data["subscribe"] = $subscribeData;

		$InvoiceData =  $this->db->select("*")
		->from("subscribe")		
		->where('patient_id',$patient_id)		
		->where('status',0)
		->order_by('created_date','desc')
		->get()
		->result();
		$data["invoice"] = $InvoiceData;
		//echo $this->db->last_query();exit;
		
		$billing_historyData =  $this->db->select("*")
		->from("subscribe")		
		->where('patient_id',$patient_id)
		->where('status',1)
		->order_by('start_date','desc')
		->get()
		->result();
		$data["billing_history"] = $billing_historyData;

		$communication_log = $this->db->select("*")
							->from("communication_log")
							->order_by('date','desc')
							->where('patient_id',$patient_id)
							->get()
							->result();
		$data["communication_log"] = $communication_log;
		

		$data['content']  = $this->load->view('dashboard_doctor/invoice/invoice' ,$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}	

	public function get_item_info()
	{	$item_id = $this->input->post("item_id");
		$item = $this->db->get_where("item_master",array("status"=>"active","id"=>$item_id))->result();
		echo json_encode($item);
	}

	public function edit_subscribe()
	{	$data = array();
		$subscribe_id = $this->input->post("subscribe_id");
		$item = $this->db->get_where("item_master",array("status"=>"active"))->result();
		$data["item"] = $item;
		
		$item = $this->db->get_where("subscribe",array("status"=>"0","id"=>$subscribe_id))->row();
        $n = explode(',',$item->item);
				$this->db->select('id, service_name, amount');
				$this->db->from('item_master');
				$this->db->where_in('id', $n);
				$service_name = $this->db->get()->result();					
		$data["item"]	=  $item;
		$data["service_names"] = $service_name;
		//echo $this->db->last_query();exit;
		echo json_encode($data);
	}

	public function insert_subscribe($value='')
	{
	
		$item = $this->input->post("item_Data");		
		$items 		= implode(",", $item);
		$orderID 	= rand(99,8978);
		$patient_id = $this->input->post("patientid");
		$date 		= date("Y-m-d");
		$subscribe  = $this->input->post("subscribe");
		$duration   = $this->input->post("duration");
		$endDate    = "";
		$login_id   = $this->session->userdata("user_id");

		if($duration == "monthly"){
			$endDate = date('Y-m-d', strtotime('+1 month', strtotime(date("Y-m-d"))));
		}elseif ($duration == "quaterly") {
			$endDate = date('Y-m-d', strtotime('+4 month', strtotime(date("Y-m-d"))));			
		}elseif ($duration == "yearly") {
			$endDate = date('Y-m-d', strtotime('+1 years', strtotime(date("Y-m-d"))));
		}

		$amount 	=  $this->input->post("amount");
		$data 		= array("order_id"=>$orderID,"patient_id"=>$patient_id,"item"=>$items,"amount"=>$amount,"subscribe"=>$subscribe,"duration"=>$duration,"status"=>0,"start_date"=>$date,"end_date"=>$endDate,"created_date"=>date("Y-m-d h:i:s"));		
		$this->db->insert("subscribe",$data);
		$subscribeid = $this->db->insert_id();
		if($this->db->insert_id()){
			if($subscribe == 0){
				ob_start();
				$subscribe_detail = $this->db->get_where("subscribe",array("id"=>$this->db->insert_id()))->row();
				$billing_date = date("d-M-Y",strtotime($subscribe_detail->start_date));
				$orderID      = $subscribe_detail->order_id;
				$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('hospital_id'))->get()->row();
				$patientDetail = $this->db->get_where("patient",array("id"=>$patient_id))->row();
				$amount = $subscribe_detail->amount;
				$item = explode(",", $subscribe_detail->item);
				$currency_code = 'usd';

				$logo = ($hospital_name->picture != "") ? base_url().$hospital_name->picture : base_url()."assets/images/logo.png";
				
				$ch = curl_init();
		    	$clientId = "AdkXCzeGeEyf6aZMlz-RZFr0MDF9AdTLMfbVSNveyatlGQP8HE4LtI3ZjP2GvHxlc5ZCkj2TQrJ2bjNz";
		    	$secret = "EKT3L-Q8Pu2TfRO-mVkzkYpaxk1VC7XiZPGc-pIWLdlUacCW9UsTx02TMZcDDFIvc3xCqONAG1Vk9NSU";

			    curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
			    curl_setopt($ch, CURLOPT_HEADER, 0);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			    curl_setopt($ch, CURLOPT_SSLVERSION , 6); 
			    curl_setopt($ch, CURLOPT_POST, true);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			    curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
			    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

	    		$result = curl_exec($ch);

		    	if(empty($result))die("Error: No response.");
		    	else
		    	{
		        	$json = json_decode($result, TRUE);
		    	}
		    	curl_close($ch); 

		    	$ch2 = curl_init();
	    		$token = $json['access_token'];
		    	$data = '{
		            "transactions": [{
		            "amount": {
		                "currency":"USD",
		                "total":'.$amount.'
		            },
		            "description":"creating a payment"
		            }],
		            "payer": {
		                "payment_method":"paypal"
		            },
		            "intent":"sale",
		            "redirect_urls": {
		                "cancel_url":"https://emr.gthealthsystem.com/dashboard_doctor/invoice/item_master/billing",
		                "return_url":"https://emr.gthealthsystem.com/dashboard_doctor/invoice/item_master/auto_login/'.$patient_id.'/'.$orderID.'/'.$login_id.'"
		            }
		       }'; 

		       	$authorization = "Authorization: Bearer ".$token;
		       	$header = array('Content-Type: application/json' , $authorization );
		       
			    curl_setopt($ch2, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment");
			    curl_setopt($ch2, CURLOPT_VERBOSE, 1);
			    curl_setopt($ch2, CURLOPT_HEADER, 0);
			    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
			    curl_setopt($ch2, CURLOPT_HTTPHEADER ,$header );
			    //curl_setopt($ch2, CURLOPT_HTTPHEADER , );
			    curl_setopt($ch2, CURLOPT_POST, 1);
			    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
			    curl_setopt($ch2, CURLOPT_POSTFIELDS, $data);

			    $result = curl_exec($ch2);
			    $json = json_decode($result, TRUE); 			   
			    $payment_Link = $json["links"][1]["href"];			    

			    /*******************************  Invoice  PDF Genrate ***************************************************/
			    			    
				$patientDetail 		= $this->db->get_where("patient",array("id"=>$patient_id))->row();
				$subscribeDetail 	= $this->db->get_where("subscribe",array("id"=>$subscribeid))->row();

				$status =  ($subscribeDetail->status == 1) ? "Paid" : "Unpaid";
				$item = "";

				//$hospital_id = ($this->session->userdata('hospital_id') != "") ? $this->session->userdata('hospital_id') : $this->session->userdata('user_id');
				/*$userData = $this->db->select("*")->from("user")->where('user_id', $hospital_id)->get()->row();				
				print_r($userData);exit;*/

				$logo = ($hospital_name->picture != "") ? base_url().$hospital_name->picture : base_url()."assets/images/logo.png";


		if(strpos($subscribeDetail->item, ",") !== false) {
     		//echo "Found";
     		$item = explode(",", $subscribeDetail->item);
		}else{
			$item = array();
			array_push($item, $subscribeDetail->item);
		}		   

		$html ='<style> .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            }
            .table {
              width: 100%;

              background-color: transparent;
              border-collapse: collapse;
              text-align: left!important;
              }
              .table td, .table th {
                padding: .75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
              }
            .ms-panel-header.header-mini {
              border-bottom: 0;
              padding-bottom: 0;
            }

            .ms-panel-header {
              position: relative;
              padding: 1.5rem;
              border-bottom: 1px solid rgba(0,0,0,0.1);
            }
            .justify-content-between {
              -ms-flex-pack: justify!important;
              justify-content: space-between!important;
            }

            .d-flex {
              display: -ms-flexbox!important;
              display: flex!important;
            }
            .ms-panel-header h6 {
              margin-bottom: 0;
              text-transform: uppercase;
              font-weight: 700;
            }
            .ms-panel-body, .ms-panel-footer {
              position: relative;
              padding: 1.5rem;
            }
            .thead-light thead {
              background-color: rgb(244,244,244);
            }
            ul {
    list-style: none;
    padding: 0;
}
h6 {
    font-size: 16px;
}
 ul {
    margin-top: 0;
    margin-bottom: 1rem;
}
ul {
    display: block;
    list-style-type: none;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
.right{
  float:right;

}
            </style>
<div style="border:1px solid #ccc !important; padding: 25px !important; margin: 25px !important;">
    <div style="border-bottom: 1px solid #ccc !important;">
        <img src="'.$logo.'" style="margin-left:250px !important;width: 30%; margin-bottom: 8px;">
        <h3 style="margin-top: 15px;">GT health system</h3>
        <div style="margin-top: 10px !important;margin-bottom: 20px !important;">
            4599 Oakmound Drive<br>
            Chicago, IL 60607
        </div>
          <div style="margin-top: 15px !important; position: relative; top: -70px; left: 450px;">
        <ul class="invoice-date">
        	<li>Order Date :' .date('d-M-Y',strtotime($subscribeDetail->start_date)).'</li>
        	<li>Status : '.$status.' </li>
        </ul>            
    </div>
    </div>
    <div style="margin-bottom:10px !important;">
        <h4>Bill to : '.$patientDetail->fname.'  '.$patientDetail->lname.'</h4>       	
    </div>
    <div class="ms-invoice-table table-responsive mt-50" style="margin-top:50px">
    	<table class="table table-hover text-left thead-light" >
    	<thead>
    	<tr class="text-capitalize">
    	<th></th>
    	<th>#</th>
    	<th>Item</th>
    	<th>Amount</th>
    	</tr>
    	</thead>
    	<tbody><tr><td></td><td></td> </tr>';
    		$i = 1;
    	foreach($item as $item_list){
    		$Item_master = $this->db->get_where("item_master",array("id"=>$item_list))->row();
    		
    		$html .='<tr>    			
					<td></td>	
					<td></td>	
	    			<td>'.$i.'</td>
	    			<td>'.$Item_master->service_name.'</td>
	    			<td>$ '.$Item_master->amount.'</td>
    		</tr>';
    		$i++;
    	}
    	
    		$html .='<tr>
    			<td></td>
    			<td></td>
    			<td></td>	
    			<td style="float:right;"><b>Total Amount</b></td> 
    			<td><b>$ '.$subscribeDetail->amount.'</b></td>
    		</tr>
    		</tr>
    			<tr>
    			
    			<td></td>
    			<td></td>    			
    			<td style="float:right;"><b>Total Amount</b></td> 
    			<td><b>$ '.$subscribeDetail->amount.'</b></td>
    		</tr>
    		</tbody>
    		</table>
    </div>
</div>
</div>';
		//echo $html;exit;
	    $this->dompdf->load_html($html);
		$this->dompdf->render();
		$pdfname = "invoice_".date('YmdHis').'.pdf';		
        $output = $this->dompdf->Output($pdfname, 'S');
        $pdf_FILE = file_put_contents('pdf/'.$pdfname, $output);        

			  /**************************   Patient Invoice Mail ************************************************************/
			    $to = $patientDetail->email;
				$subject="Invoice Payment Link ".$hospital_name->hospitalname;
				$htmlMessage='<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Payment Link  '. $hospital_name->hospitalname .'</title>
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
								<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js" integrity="sha512-Wm00XTqNHcGqQgiDlZVpK4QIhO2MmMJfzNJfh8wwbBC9BR0FtdJwPqDhEYy8jCfKEhWWZe/LDB6FwY7YE9QhMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" integrity="sha512-5RNDl2gYvm6wpoVAU4J2+cMGZQeE2o4/AksK/bi355p/C31aRibC93EYxXczXq3ja2PJj60uifzcocu2Ca2FBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
							</head>
						<body>
						<table class="table" style="width:100%;">
							<tr style="padding:15px;">
    							<td  width="20%"></td>
    							<td  width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.$logo.' style="margin:10px 0px;"  /></td>
    							<td width="20%"></td>
  							</tr>
  							<tr style="padding:15px;">
      							<td width="20%"></td>
      							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
        							<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%; border-bottom:1px solid #ccc; padding: 10px;" border="0">
	          							<tbody>
										 	<tr>											 												
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white; margin-left:0px; padding-left: 0px; color: #150aec;" colspan="2">									
													<p><b>Hello '.$patientDetail->fname."  ".$patientDetail->lname.',</b></p>
												</td>
											</tr>
											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Date</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<span>'.$billing_date.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Number</td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$orderID.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Amount: USD </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>$ '.$amount.' </span>
												</td>
											</tr>
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> Your Payment Link has been given bellow.</span>																								
												</td>
											</tr>																									
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2"> <span> <a href='.$payment_Link.' target="_blank">'.$payment_Link.'</a></span></td>
											</tr>													
										</tbody>
									</table>
								</td>
							</tr>							
							<tr>	
								<td width="20%"></td>					 
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
									<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$hospital_name->email.'</span></p>
								</td>
								<td width="20%"></td>							
							</tr>
						</table>
						</body>
						</html>';
				$this->load->library('email');
				$this->load->helper('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('sahil@gtimecs.org', $hospital_name->hospitalname);
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($htmlMessage);
				$PDF_FILE = $_SERVER["DOCUMENT_ROOT"].'/pdf/'.$pdfname;				
				$this->email->attach($PDF_FILE);					
				@$this->email->send();

				/******************************************* Medical Provider Mail Send **************************************************************************/
				$this->email->clear(TRUE);
				$MedicalProvider_to = $this->session->userdata("email");
				$MedicalProvidersubject="Invoice Payment Link ".$hospital_name->hospitalname;
				$MedicalProviderhtmlMessage='<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Payment Link  '. $hospital_name->hospitalname .'</title>
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
								<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js" integrity="sha512-Wm00XTqNHcGqQgiDlZVpK4QIhO2MmMJfzNJfh8wwbBC9BR0FtdJwPqDhEYy8jCfKEhWWZe/LDB6FwY7YE9QhMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" integrity="sha512-5RNDl2gYvm6wpoVAU4J2+cMGZQeE2o4/AksK/bi355p/C31aRibC93EYxXczXq3ja2PJj60uifzcocu2Ca2FBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
							</head>
						<body>
						<table class="table" style="width:100%;">
							<tr style="padding:15px;">
    							<td  width="20%"></td>
    							<td  width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.$logo.' style="margin:10px 0px;"  /></td>
    							<td width="20%"></td>
  							</tr>
  							<tr style="padding:15px;">
      							<td width="20%"></td>
      							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
        							<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%; border-bottom:1px solid #ccc; padding: 10px;" border="0">
	          							<tbody>
										 	<tr>											 												
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white; margin-left:0px; padding-left: 0px; color: #150aec;" colspan="2">									
													<p><b>Hello '.$hospital_name->firstname.'  '.$hospital_name->lastname.',</b></p>
												</td>
											</tr>
											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Patient Name</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;border-bottom:1px solid #d7d0d0;">
													<span>'.$patientDetail->fname."  ".$patientDetail->lname.'</span>
												</td>
											
											</tr>
											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Date</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<span>'.$billing_date.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Number</td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$orderID.'</span>
												</td>
											</tr>
											
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Amount: USD </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>$ '.$amount.'</span>
												</td>
											</tr>
											<tr>

												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span>  <b>'.$patientDetail->fname."  ".$patientDetail->lname. '  Payment Link has been Created.</b></span>																								
												</td>
											</tr>																									
																							
										</tbody>
									</table>
								</td>
							</tr>							
							<tr>	
								<td width="20%"></td>					 
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
									<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$hospital_name->email.'</span></p>
								</td>
								<td width="20%"></td>							
							</tr>
						</table>
						</body>
						</html>';
						
				$this->load->library('email');
				$this->load->helper('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('sahil@gtimecs.org', $hospital_name->hospitalname);
				$this->email->to($MedicalProvider_to);
				$this->email->cc($hospital_name->email);
				$this->email->subject($MedicalProvidersubject);
				$this->email->message($MedicalProviderhtmlMessage);				
				$AdminPDF_FILE2 = $_SERVER["DOCUMENT_ROOT"].'/pdf/'.$pdfname;
				$this->email->attach($AdminPDF_FILE2);				
				@$this->email->send();

				$communication_log = array("patient_id"=>$patient_id,"type"=>"Not subscribe.","note"=>"Invoice Payment Link Mail Send.","amount_owed"=>$amount,"date"=>date("Y-m-d h:i:s"));
				$this->db->insert("communication_log",$communication_log);
			}

				$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"invoice-billing","Add Invoice - Billing",
                $hospital_name->hospitalname." Hospital Admin ".$userData->firstname.'  '.$userData->lastname." Add Subscription of ".$patientDetail->fname." ".$patientDetail->lname ." Patient at ".date("Y-m-d h:i:s"),$this->session->userdata("hospital_id"),$patientDetail->id,$patientDetail->fname." ".$patientDetail->lname,10);

			echo $this->db->insert_id();		
		}		
	}


	public function update_invoice()
	{
		$item = $this->input->post("item_Data");		
		$items 			= implode(",", $item);
		$subscribe_id 	= $this->input->post("subscribe_id");
		$patient_id = $this->input->post("patientid");	
			
		$login_id   = $this->session->userdata("user_id");
		$amount 	=  $this->input->post("amount");
		$payment_type  = $this->input->post("payment_type");
		$data 		=  "";

		if($payment_type == 0){

			$data 		= array("item"=>$items,"amount"=>$amount,"payment_type"=>$payment_type,"status"=>1,"updated_date"=>date("Y-m-d h:i:s"));
		}else{
			$data 		= array("item"=>$items,"amount"=>$amount,"payment_type"=>$payment_type,"status"=>0,"updated_date"=>date("Y-m-d h:i:s"));
		}
		//print_r($data);exit;
		$this->db->where("patient_id",$patient_id);
		$this->db->where("id",$subscribe_id);
		$this->db->update("subscribe",$data);
		//echo $this->db->last_query();exit;
		if($this->db->affected_rows()){

			/*******************************  Invoice  PDF Genrate ***************************************************/
			    			    
				$patientDetail 		= $this->db->get_where("patient",array("id"=>$patient_id))->row();
				$subscribeDetail 	= $this->db->get_where("subscribe",array("id"=>$subscribe_id))->row();

				$status =  ($subscribeDetail->status == 1) ? "Paid" : "Unpaid";
				$item = "";

				$hospital_id =  $this->session->userdata('hospital_id');
				$hospital_name = $this->db->select("*")->from("user")->where('user_id', $hospital_id)->get()->row();
				$medicalProvider_Data = $this->db->select("*")->from("user")->where('user_id', $this->session->userdata('user_id'))->get()->row();
				$logo = ($userData->picture != "") ? base_url().$userData->picture : base_url()."assets/images/logo.png";


				if(strpos($subscribeDetail->item, ",") !== false) {
		     		//echo "Found";
		     		$item = explode(",", $subscribeDetail->item);
				}else{
					$item = array();
					array_push($item, $subscribeDetail->item);
				}		   
					//print_r($item);exit;
					$html ='<style> .table-responsive {
			            display: block;
			            width: 100%;
			            overflow-x: auto;
			            -webkit-overflow-scrolling: touch;
			            -ms-overflow-style: -ms-autohiding-scrollbar;
			            }
			            .table {
			              width: 100%;

			              background-color: transparent;
			              border-collapse: collapse;
			              text-align: left!important;
			              }
			              .table td, .table th {
			                padding: .75rem;
			                vertical-align: top;
			                border-top: 1px solid #dee2e6;
			              }
			            .ms-panel-header.header-mini {
			              border-bottom: 0;
			              padding-bottom: 0;
			            }

			            .ms-panel-header {
			              position: relative;
			              padding: 1.5rem;
			              border-bottom: 1px solid rgba(0,0,0,0.1);
			            }
			            .justify-content-between {
			              -ms-flex-pack: justify!important;
			              justify-content: space-between!important;
			            }

			            .d-flex {
			              display: -ms-flexbox!important;
			              display: flex!important;
			            }
			            .ms-panel-header h6 {
			              margin-bottom: 0;
			              text-transform: uppercase;
			              font-weight: 700;
			            }
			            .ms-panel-body, .ms-panel-footer {
			              position: relative;
			              padding: 1.5rem;
			            }
			            .thead-light thead {
			              background-color: rgb(244,244,244);
			            }
			            ul {
			    list-style: none;
			    padding: 0;
			}
			h6 {
			    font-size: 16px;
			}
			 ul {
			    margin-top: 0;
			    margin-bottom: 1rem;
			}
			ul {
			    display: block;
			    list-style-type: none;
			    margin-block-start: 1em;
			    margin-block-end: 1em;
			    margin-inline-start: 0px;
			    margin-inline-end: 0px;
			    padding-inline-start: 40px;
			}
			.right{
			  float:right;

			}
			            </style>
			<div style="border:1px solid #ccc !important; padding: 25px !important; margin: 25px !important;">
			    <div style="border-bottom: 1px solid #ccc !important;">
			        <img src="'.$logo.'" style="margin-left:250px !important;width: 30%; margin-bottom: 8px;">
			        <h3 style="margin-top: 15px;">GT health system</h3>
			        <div style="margin-top: 10px !important;margin-bottom: 20px !important;">
			            4599 Oakmound Drive<br>
			            Chicago, IL 60607
			        </div>
			          <div style="margin-top: 15px !important; position: relative; top: -70px; left: 450px;">
			        <ul class="invoice-date">
			        	<li>Order Date :' .date('d-M-Y',strtotime($subscribeDetail->start_date)).'</li>
			        	<li>Status : '.$status.' </li>
			        </ul>            
			    </div>
			    </div>
			    <div style="margin-bottom:10px !important;">
			        <h4>Bill to : '.$patientDetail->fname.'  '.$patientDetail->lname.'</h4>       	
			    </div>
			    

			  
			    <div class="ms-invoice-table table-responsive mt-50" style="margin-top:50px">
			    	<table class="table table-hover text-left thead-light" >
			    	<thead>
			    	<tr class="text-capitalize">
			    	<th></th>
			    	<th>#</th>
			    	<th>Item</th>
			    	<th>Amount</th>
			    	</tr>
			    	</thead>
			    	<tbody><tr><td></td><td></td> </tr>';
			    		$i = 1;
			    	foreach($item as $item_list){
			    		$Item_master = $this->db->get_where("item_master",array("id"=>$item_list))->row();
			    		
			    		$html .='<tr>    			
								<td></td>	
								<td></td>	
				    			<td>'.$i.'</td>
				    			<td>'.$Item_master->service_name.'</td>
				    			<td>$ '.$Item_master->amount.'</td>
			    		</tr>';
			    		$i++;
			    	}
			    	//echo $html;exit;
			    		$html .='<tr>
			    			<td></td>
			    			<td></td>
			    			<td></td>	
			    			<td style="float:right;"><b>Total Amount</b></td> 
			    			<td><b>$ '.$subscribeDetail->amount.'</b></td>
			    		</tr>
			    		</tr>
			    			<tr>
			    			
			    			<td></td>
			    			<td></td>    			
			    			<td style="float:right;"><b>Total Amount</b></td> 
			    			<td><b>$ '.$subscribeDetail->amount.'</b></td>
			    		</tr>
			    		</tbody>
			    		</table>
			    </div>
			</div>
			</div>';
				
			 //echo $html;exit;
		    $this->dompdf->load_html($html);
			$this->dompdf->render();
			$succ_pdfname = "invoice_".date('YmdHis').'.pdf';		
	        $output = $this->dompdf->Output($pdfname, 'S');
	        $Success_pdf_FILE = file_put_contents('pdf/'.$succ_pdfname, $output);
        
			if($payment_type == 1){
				ob_start();
				$subscribe_detail = $this->db->get_where("subscribe",array("id"=>$subscribe_id))->row();
				$billing_date = date("d-M-Y",strtotime($subscribe_detail->start_date));
				$orderID      = $subscribe_detail->order_id;
				
				//$userData 		=	$this->db->select("*")->from("user")->where('user_id', $hospital_id)->get()->row();
				//$hospitalData 	=  $this->db->select("*")->from("user")->where('user_id', $login_id)->get()->row();

				$patient_Detail = $this->db->get_where("patient",array("id"=>$patient_id))->row();

				$amount = $subscribe_detail->amount;
				$item = explode(",", $subscribe_detail->item);
				$currency_code = 'usd';

				$logo = ($hospital_name->picture != "") ? base_url().$hospital_name->picture : base_url()."assets/images/logo.png";
				
				$ch = curl_init();
		    	$clientId = "AdkXCzeGeEyf6aZMlz-RZFr0MDF9AdTLMfbVSNveyatlGQP8HE4LtI3ZjP2GvHxlc5ZCkj2TQrJ2bjNz";
		    	$secret = "EKT3L-Q8Pu2TfRO-mVkzkYpaxk1VC7XiZPGc-pIWLdlUacCW9UsTx02TMZcDDFIvc3xCqONAG1Vk9NSU";

			    curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
			    curl_setopt($ch, CURLOPT_HEADER, 0);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			    curl_setopt($ch, CURLOPT_SSLVERSION , 6); 
			    curl_setopt($ch, CURLOPT_POST, true);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			    curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
			    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

	    		$result = curl_exec($ch);
	    		//print_r($result);exit;

		    	if(empty($result))die("Error: No response.");
		    	else
		    	{
		        	$json = json_decode($result, TRUE);
		    	}
		    	curl_close($ch); 

		    	$ch2 = curl_init();
	    		$token = $json['access_token'];
		    	$data = '{
		            "transactions": [{
		            "amount": {
		                "currency":"USD",
		                "total":'.$amount.'
		            },
		            "description":"creating a payment"
		            }],
		            "payer": {
		                "payment_method":"paypal"
		            },
		            "intent":"sale",
		            "redirect_urls": {
		                "cancel_url":"https://emr.gthealthsystem.com/item_master/billing",
		                "return_url":"https://emr.gthealthsystem.com/item_master/auto_login/'.$patient_id.'/'.$orderID.'/'.$login_id.'"
		            }
		       }'; 

		  		// echo $data;
		     	//  exit;

		       	$authorization = "Authorization: Bearer ".$token;
		       	$header = array('Content-Type: application/json' , $authorization );
		       
			    curl_setopt($ch2, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment");
			    curl_setopt($ch2, CURLOPT_VERBOSE, 1);
			    curl_setopt($ch2, CURLOPT_HEADER, 0);
			    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
			    curl_setopt($ch2, CURLOPT_HTTPHEADER ,$header );
			    //curl_setopt($ch2, CURLOPT_HTTPHEADER , );
			    curl_setopt($ch2, CURLOPT_POST, 1);
			    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
			    curl_setopt($ch2, CURLOPT_POSTFIELDS, $data);

			    $result = curl_exec($ch2);
			    $json = json_decode($result, TRUE); 
			   /* echo  "<pre>";
			    print_r($json);*/
			    $payment_Link = $json["links"][1]["href"];
			    //echo $payment_Link;exit;
			   
			    $to = $patient_Detail->email;
				$subject="Updated Payment Link ".$hospital_name->hospitalname;
				$PatientMail_htmlMessage='<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Update Invoice Payment Link  '. $hospital_name->hospitalname .'</title>
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
								<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js" integrity="sha512-Wm00XTqNHcGqQgiDlZVpK4QIhO2MmMJfzNJfh8wwbBC9BR0FtdJwPqDhEYy8jCfKEhWWZe/LDB6FwY7YE9QhMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" integrity="sha512-5RNDl2gYvm6wpoVAU4J2+cMGZQeE2o4/AksK/bi355p/C31aRibC93EYxXczXq3ja2PJj60uifzcocu2Ca2FBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
							</head>
						<body>
						<table class="table" style="width:100%;">
							<tr style="padding:15px;">
    							<td  width="20%"></td>
    							<td  width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.$logo.' style="margin:10px 0px;"  /></td>
    							<td width="20%"></td>
  							</tr>
  							<tr style="padding:15px;">
      							<td width="20%"></td>
      							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
        							<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%; border-bottom:1px solid #ccc; padding: 10px;" border="0">
	          							<tbody>
										 	
										<tr>											 												
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white; margin-left:0px; padding-left: 0px; color: #150aec;" colspan="2">									
													<p><b>Hello '.$patient_Detail->fname.'  '.$patient_Detail->lname.',</b></p>
												</td>
											</tr>
										
										
											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Date</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<span>'.$billing_date.'</span>
												</td>
											</tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Number</td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$orderID.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Amount: USD </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span> $ '.$amount.'</span>
												</td>
											</tr>
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> Your Updated Payment Link has been given bellow.</span>																								
												</td>
											</tr>																									
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2"> <span> <a href='.$payment_Link.' target="_blank">'.$payment_Link.'</a></span></td>
											</tr>													
										</tbody>
									</table>
								</td>
							</tr>							
							<tr>	
								<td width="20%"></td>					 
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
									<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$hospital_name->email.'</span></p>
								</td>
								<td width="20%"></td>							
							</tr>
						</table>
						</body>
						</html>';
					
				$this->load->library('email');
				$this->load->helper('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('sahil@gtimecs.org', $hospital_name->hospitalname);
				$this->email->to($to);				
				$this->email->subject($subject);
				$this->email->message($PatientMail_htmlMessage);
				$PSuccess_PDF_FILE = $_SERVER["DOCUMENT_ROOT"].'/pdf/'.$succ_pdfname;
				$this->email->attach($PSuccess_PDF_FILE);
				@$this->email->send();

				$this->email->clear(TRUE);
						$Admin_subject= $patient_Detail->fname."  ".$patient_Detail->lname."  Updated Payment Link ".$hospital_name->hospitalname;
						$Admin_Mail_htmlMessage= '<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Payment Done Successfully  '. $userData->hospitalname .'</title>
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
								<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js" integrity="sha512-Wm00XTqNHcGqQgiDlZVpK4QIhO2MmMJfzNJfh8wwbBC9BR0FtdJwPqDhEYy8jCfKEhWWZe/LDB6FwY7YE9QhMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" integrity="sha512-5RNDl2gYvm6wpoVAU4J2+cMGZQeE2o4/AksK/bi355p/C31aRibC93EYxXczXq3ja2PJj60uifzcocu2Ca2FBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
							</head>
						<body>
						<table class="table" style="width:100%;">
							<tr style="padding:15px;">
    							<td  width="20%"></td>
    							<td  width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.$logo.' style="margin:10px 0px;"  /></td>
    							<td width="20%"></td>
  							</tr>
  							<tr style="padding:15px;">
      							<td width="20%"></td>
      							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
        							<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%; border-bottom:1px solid #ccc; padding: 10px;" border="0">
	          							<tbody>
	          							
	          								<tr>											 												
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white; margin-left:0px; padding-left: 0px; color: #150aec;" colspan="2">				
													<p><b>Hello '.$this->session->userdata("fullname").',</b></p>
												</td>
											</tr>										
										
											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Date</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<span>'.$billing_date.'</span>
												</td>
											</tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Number</td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$orderID.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Amount: USD </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span> $ '.$amount.'</span>
												</td>
											</tr>
											
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> '.$patient_Detail->fname."  ".$patient_Detail->lname.' Updated Payment Link has been Created.</span>																						
												</td>
											</tr>											
											
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> Thank you</span>																								
												</td>
											</tr>																								
																						
										</tbody>
									</table>
								</td>
							</tr>							
							<tr>	
								<td width="20%"></td>					 
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
									<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$userData->email.'</span></p>
								</td>
								<td width="20%"></td>							
							</tr>
						</table>
						</body>
						</html>';

			

			$this->load->library('email');
			$this->load->helper('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('sahil@gtimecs.org', $hospital_name->hospitalname);
			$this->email->to($hospital_name->email);	
			$this->email->cc($medicalProvider_Data->email);
			$this->email->subject($Admin_subject);
			$this->email->message($Admin_Mail_htmlMessage);						
			$this->email->attach($Success_PDF_FILE);				
			@$this->email->send();


				$communication_log = array("patient_id"=>$patient_id,"type"=>"Update Invoice.","note"=>"Update Invoice and  Payment Link Mail Send.","amount_owed"=>$amount,"date"=>date("Y-m-d h:i:s"));
				$this->db->insert("communication_log",$communication_log);
			}else{				
				$patient_Details = $this->db->get_where("patient",array("id"=>$patient_id))->row();
				$subscribes_Detail = $this->db->get_where("subscribe",array("id"=>$subscribe_id,"status"=>1,"payment_type"=>$payment_type))->row();	
				//print_r($subscribe_detail);
				$order = $this->db->get_where("subscribe",array("order_id"=>$subscribes_Detail->order_id))->row();
				//print_r($order);		
				$orderID = $subscribes_Detail->order_id;

				$logo = ($hospital_name->picture != "") ? base_url().$hospital_name->picture : base_url()."assets/images/logo.png";
				$billing_date = date("d-M-Y",strtotime($subscribes_Detail->start_date));
				$amount       = $subscribes_Detail->amount;

				$to = $patient_Details->email;
				$subject="Your Payment Done Successfully ".$hospital_name->hospitalname;
				$Mail_htmlMessage= '<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Payment Done Successfully  '. $userData->hospitalname .'</title>
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
								<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js" integrity="sha512-Wm00XTqNHcGqQgiDlZVpK4QIhO2MmMJfzNJfh8wwbBC9BR0FtdJwPqDhEYy8jCfKEhWWZe/LDB6FwY7YE9QhMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" integrity="sha512-5RNDl2gYvm6wpoVAU4J2+cMGZQeE2o4/AksK/bi355p/C31aRibC93EYxXczXq3ja2PJj60uifzcocu2Ca2FBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
							</head>
						<body>
						<table class="table" style="width:100%;">
							<tr style="padding:15px;">
    							<td  width="20%"></td>
    							<td  width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.$logo.' style="margin:10px 0px;"  /></td>
    							<td width="20%"></td>
  							</tr>
  							<tr style="padding:15px;">
      							<td width="20%"></td>
      							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
        							<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%; border-bottom:1px solid #ccc; padding: 10px;" border="0">
	          							<tbody>
	          							
	          								<tr>											 												
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white; margin-left:0px; padding-left: 0px; color: #150aec;" colspan="2">									
													<p><b>Hello '.$patient_Details->fname."  ".$patient_Details->lname.',</b></p>
												</td>
											</tr>										
										
											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Date</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<span>'.$billing_date.'</span>
												</td>
											</tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Number</td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$orderID.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Amount: USD </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span> $ '.$amount.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Payment ID </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span> Cash </span>
												</td>
											</tr>
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> Your payment has been done successfully.</span>																								
												</td>
											</tr>
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> Thank you</span>																								
												</td>
											</tr>																								
																						
										</tbody>
									</table>
								</td>
							</tr>							
							<tr>	
								<td width="20%"></td>					 
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
									<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$hospital_name->email.'</span></p>
								</td>
								<td width="20%"></td>							
							</tr>
						</table>
						</body>
						</html>';
					$Success_PDF_FILE = $_SERVER["DOCUMENT_ROOT"].'/pdf/'.$succ_pdfname;
					$this->load->library('email');
					$this->load->helper('email');
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					$this->email->from('sahil@gtimecs.org', $hospital_name->hospitalname);
					$this->email->to($to);					
					$this->email->subject($subject);
					$this->email->message($Mail_htmlMessage);						
					$this->email->attach($Success_PDF_FILE);				
					@$this->email->send();

					$this->email->clear(TRUE);
						$Admin_subject= $patient_Details->fname."  ".$patient_Details->lname."  Payment Done Successfully".$hospital_name->hospitalname;
						$Admin_Mail_htmlMessage= '<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Payment Done Successfully  '. $hospital_name->hospitalname .'</title>
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
								<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js" integrity="sha512-Wm00XTqNHcGqQgiDlZVpK4QIhO2MmMJfzNJfh8wwbBC9BR0FtdJwPqDhEYy8jCfKEhWWZe/LDB6FwY7YE9QhMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" integrity="sha512-5RNDl2gYvm6wpoVAU4J2+cMGZQeE2o4/AksK/bi355p/C31aRibC93EYxXczXq3ja2PJj60uifzcocu2Ca2FBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
							</head>
						<body>
						<table class="table" style="width:100%;">
							<tr style="padding:15px;">
    							<td  width="20%"></td>
    							<td  width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.$logo.' style="margin:10px 0px;"  /></td>
    							<td width="20%"></td>
  							</tr>
  							<tr style="padding:15px;">
      							<td width="20%"></td>
      							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
        							<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%; border-bottom:1px solid #ccc; padding: 10px;" border="0">
	          							<tbody>
	          							
	          								<tr>											 												
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white; margin-left:0px; padding-left: 0px; color: #150aec;" colspan="2">									
													<p><b>Hello '.$this->session->userdata("fullname").',</b></p>
												</td>
											</tr>										
										
											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Date</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<span>'.$billing_date.'</span>
												</td>
											</tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Number</td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$orderID.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Amount: USD </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span> $ '.$amount.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Payment ID </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span> Cash </span>
												</td>
											</tr>
											<tr>
													<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
														<span> '.$patient_Details->fname."  ".$patient_Details->lname.' payment has been done successfully.</span>																						
													</td>
												</tr>
											
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> Thank you</span>																								
												</td>
											</tr>																								
																						
										</tbody>
									</table>
								</td>
							</tr>							
							<tr>	
								<td width="20%"></td>					 
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
									<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$hospital_name->email.'</span></p>
								</td>
								<td width="20%"></td>							
							</tr>
						</table>
						</body>
						</html>';

			$this->load->library('email');
			$this->load->helper('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('sahil@gtimecs.org', $hospital_name->hospitalname);
			$this->email->to($hospital_name->email);	
			$this->email->cc($medicalProvider_Data->email);				
			$this->email->subject($Admin_subject);
			$this->email->message($Admin_Mail_htmlMessage);						
			$this->email->attach($Success_PDF_FILE);				
			@$this->email->send();

			$communication_log = array("patient_id"=>$patient_id,"type"=>"Payment Done.","note"=>"Payment done successfully.","amount_owed"=>$amount,"date"=>date("Y-m-d h:i:s"));
			$this->db->insert("communication_log",$communication_log);

			}
			$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"invoice-billing","Update Invoice - Billing",$hospital_name->hospitalname." Hospital Medical Provider ".$userData->firstname.'  '.$userData->lastname." Update Subscription of ".$patient_Details->fname." ".$patient_Details->lname ." Patient at ".date("Y-m-d h:i:s"),$this->session->userdata("hospital_id"),$patientDetail->id,$patientDetail->fname." ".$patientDetail->lname,10);
			echo $this->db->insert_id();		
		}	
		/*$data['content']  = $this->load->view('success_payment' ,$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);		*/
	}

	public function send_invoice_paymentlink($invoice_id,$patient_id)
	{
		$subscribeDetail = $this->db->get_where("subscribe",array("id"=>$invoice_id,"subscribe"=>0,"status"=>0))->row();
		$patientDetail  = $this->db->get_where("patient",array("id"=>$patient_id,"status"=>1))->row();
		$billing_date = date("d-M-Y",strtotime($subscribeDetail->start_date));
		$orderID      = $subscribeDetail->order_id;
		$amount = $subscribeDetail->amount;
		$item = explode(",", $subscribeDetail->item);
		$currency_code = 'usd';
		$login_id   = $this->session->userdata("user_id");
		$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('hospital_id'))->get()->row();
		$logo = ($hospital_name->picture != "") ? base_url().$hospital_name->picture : base_url()."assets/images/logo.png";

		/*******************************  Invoice  PDF Genrate ***************************************************/

			$status =  ($subscribeDetail->status == 1) ? "Paid" : "Unpaid";
			$item = "";

			$hospital_id = ($this->session->userdata('hospital_id') != "") ? $this->session->userdata('hospital_id') : $this->session->userdata('user_id');
			
			$logo = ($hospital_name->picture != "") ? base_url().$hospital_name->picture : base_url()."assets/images/logo.png";


		if(strpos($subscribeDetail->item, ",") !== false) {
     		//echo "Found";
     		$item = explode(",", $subscribeDetail->item);
		}else{
			$item = array();
			array_push($item, $subscribeDetail->item);
		}		   

		$html ='<style> .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            }
            .table {
              width: 100%;

              background-color: transparent;
              border-collapse: collapse;
              text-align: left!important;
              }
              .table td, .table th {
                padding: .75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
              }
            .ms-panel-header.header-mini {
              border-bottom: 0;
              padding-bottom: 0;
            }

            .ms-panel-header {
              position: relative;
              padding: 1.5rem;
              border-bottom: 1px solid rgba(0,0,0,0.1);
            }
            .justify-content-between {
              -ms-flex-pack: justify!important;
              justify-content: space-between!important;
            }

            .d-flex {
              display: -ms-flexbox!important;
              display: flex!important;
            }
            .ms-panel-header h6 {
              margin-bottom: 0;
              text-transform: uppercase;
              font-weight: 700;
            }
            .ms-panel-body, .ms-panel-footer {
              position: relative;
              padding: 1.5rem;
            }
            .thead-light thead {
              background-color: rgb(244,244,244);
            }
            ul {
    list-style: none;
    padding: 0;
}
h6 {
    font-size: 16px;
}
 ul {
    margin-top: 0;
    margin-bottom: 1rem;
}
ul {
    display: block;
    list-style-type: none;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
.right{
  float:right;

}
            </style>
<div style="border:1px solid #ccc !important; padding: 25px !important; margin: 25px !important;">
    <div style="border-bottom: 1px solid #ccc !important;">
        <img src="'.$logo.'" style="margin-left:250px !important;width: 30%; margin-bottom: 8px;">
        <h3 style="margin-top: 15px;">GT health system</h3>
        <div style="margin-top: 10px !important;margin-bottom: 20px !important;">
            4599 Oakmound Drive<br>
            Chicago, IL 60607
        </div>
          <div style="margin-top: 15px !important; position: relative; top: -70px; left: 450px;">
        <ul class="invoice-date">
        	<li>Order Date :' .date('d-M-Y',strtotime($subscribeDetail->start_date)).'</li>
        	<li>Status : '.$status.' </li>
        </ul>            
    </div>
    </div>
    <div style="margin-bottom:10px !important;">
        <h4>Bill to : '.$patientDetail->fname.'  '.$patientDetail->lname.'</h4>       	
    </div>
    

  
    <div class="ms-invoice-table table-responsive mt-50" style="margin-top:50px">
    	<table class="table table-hover text-left thead-light" >
    	<thead>
    	<tr class="text-capitalize">
    	<th></th>
    	<th>#</th>
    	<th>Item</th>
    	<th>Amount</th>
    	</tr>
    	</thead>
    	<tbody><tr><td></td><td></td> </tr>';
    		$i = 1;
    	foreach($item as $item_list){
    		$Item_master = $this->db->get_where("item_master",array("id"=>$item_list))->row();
    		
    		$html .='<tr>    			
					<td></td>	
					<td></td>	
	    			<td>'.$i.'</td>
	    			<td>'.$Item_master->service_name.'</td>
	    			<td>$ '.$Item_master->amount.'</td>
    		</tr>';
    		$i++;
    	}
    	
    		$html .='<tr>
    			<td></td>
    			<td></td>
    			<td></td>	
    			<td style="float:right;"><b>Total Amount</b></td> 
    			<td><b>$ '.$subscribeDetail->amount.'</b></td>
    		</tr>
    		</tr>
    			<tr>
    			
    			<td></td>
    			<td></td>    			
    			<td style="float:right;"><b>Total Amount</b></td> 
    			<td><b>$ '.$subscribeDetail->amount.'</b></td>
    		</tr>
    		</tbody>
    		</table>
    </div>
</div>
</div>';
	
	    $this->dompdf->load_html($html);
		$this->dompdf->render();
		$pdfname = "invoice_".date('YmdHis').'.pdf';		
        $output = $this->dompdf->Output($pdfname, 'S');
        $pdf_FILE = file_put_contents('pdf/'.$pdfname, $output);   


				
			$ch = curl_init();
	    	$clientId = "AdkXCzeGeEyf6aZMlz-RZFr0MDF9AdTLMfbVSNveyatlGQP8HE4LtI3ZjP2GvHxlc5ZCkj2TQrJ2bjNz";
	    	$secret = "EKT3L-Q8Pu2TfRO-mVkzkYpaxk1VC7XiZPGc-pIWLdlUacCW9UsTx02TMZcDDFIvc3xCqONAG1Vk9NSU";

		    curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
		    curl_setopt($ch, CURLOPT_HEADER, 0);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		    curl_setopt($ch, CURLOPT_SSLVERSION , 6); 
		    curl_setopt($ch, CURLOPT_POST, true);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		    curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

    		$result = curl_exec($ch);
    		//print_r($result);exit;

	    		if(empty($result))die("Error: No response.");
		    	else
		    	{
		        	$json = json_decode($result, TRUE);
		    	}
		    	curl_close($ch); 

		    	$ch2 = curl_init();
	    		$token = $json['access_token'];
		    	$data = '{
		            "transactions": [{
		            "amount": {
		                "currency":"USD",
		                "total":'.$amount.'
		            },
		            "description":"creating a payment"
		            }],
		            "payer": {
		                "payment_method":"paypal"
		            },
		            "intent":"sale",
		            "redirect_urls": {
		                "cancel_url":"https://emr.gthealthsystem.com/item_master/billing",
		                "return_url":"https://emr.gthealthsystem.com/item_master/auto_login/'.$patient_id.'/'.$orderID.'/'.$login_id.'"
		            }
		       }'; 

		  		// echo $data;
		     	//  exit;

		       	$authorization = "Authorization: Bearer ".$token;
		       	$header = array('Content-Type: application/json' , $authorization );
		       
			    curl_setopt($ch2, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment");
			    curl_setopt($ch2, CURLOPT_VERBOSE, 1);
			    curl_setopt($ch2, CURLOPT_HEADER, 0);
			    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
			    curl_setopt($ch2, CURLOPT_HTTPHEADER ,$header );
			    //curl_setopt($ch2, CURLOPT_HTTPHEADER , );
			    curl_setopt($ch2, CURLOPT_POST, 1);
			    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
			    curl_setopt($ch2, CURLOPT_POSTFIELDS, $data);

			    $result = curl_exec($ch2);
			    $json = json_decode($result, TRUE); 
			   /* echo  "<pre>";
			    print_r($json);*/
			    $payment_Link = $json["links"][1]["href"];
			    //echo $payment_Link;exit;
			   
			  /**************************   Patient Invoice Mail ************************************************************/
			    $to = $patientDetail->email;
				$subject="Invoice Payment Link ".$hospital_name->hospitalname;
				$htmlMessage='<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Payment Link  '. $hospital_name->hospitalname .'</title>
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
								<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js" integrity="sha512-Wm00XTqNHcGqQgiDlZVpK4QIhO2MmMJfzNJfh8wwbBC9BR0FtdJwPqDhEYy8jCfKEhWWZe/LDB6FwY7YE9QhMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" integrity="sha512-5RNDl2gYvm6wpoVAU4J2+cMGZQeE2o4/AksK/bi355p/C31aRibC93EYxXczXq3ja2PJj60uifzcocu2Ca2FBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
							</head>
						<body>
						<table class="table" style="width:100%;">
							<tr style="padding:15px;">
    							<td  width="20%"></td>
    							<td  width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.$logo.' style="margin:10px 0px;"  /></td>
    							<td width="20%"></td>
  							</tr>
  							<tr style="padding:15px;">
      							<td width="20%"></td>
      							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
        							<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%; border-bottom:1px solid #ccc; padding: 10px;" border="0">
	          							<tbody>
										 	<tr>											 												
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white; margin-left:0px; padding-left: 0px; color: #150aec;" colspan="2">									
													<p><b>Hello '.$patientDetail->fname."  ".$patientDetail->lname.',</b></p>
												</td>
											</tr>
											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Date</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<span>'.$billing_date.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Number</td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$orderID.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Amount: USD </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>$ '.$amount.' </span>
												</td>
											</tr>
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> Your Payment Link has been given bellow.</span>																								
												</td>
											</tr>																									
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2"> <span> <a href='.$payment_Link.' target="_blank">'.$payment_Link.'</a></span></td>
											</tr>													
										</tbody>
									</table>
								</td>
							</tr>							
							<tr>	
								<td width="20%"></td>					 
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
									<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$hospital_name->email.'</span></p>
								</td>
								<td width="20%"></td>							
							</tr>
						</table>
						</body>
						</html>';
				$this->load->library('email');
				$this->load->helper('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('sahil@gtimecs.org', $hospital_name->hospitalname);
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($htmlMessage);
				$PDF_FILE = $_SERVER["DOCUMENT_ROOT"].'/pdf/'.$pdfname;				
				$this->email->attach($PDF_FILE);					
				@$this->email->send();

				/******************************************* Admin Mail Send **************************************************************************/
				$this->email->clear(TRUE);
				$adminto = $hospital_name->email;
				$medicalProvider_to = $this->session->userdata("email");
				$adminsubject="Invoice Payment Link ".$hospital_name->hospitalname;
				$adminhtmlMessage='<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Payment Link  '. $hospital_name->hospitalname .'</title>
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
								<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js" integrity="sha512-Wm00XTqNHcGqQgiDlZVpK4QIhO2MmMJfzNJfh8wwbBC9BR0FtdJwPqDhEYy8jCfKEhWWZe/LDB6FwY7YE9QhMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" integrity="sha512-5RNDl2gYvm6wpoVAU4J2+cMGZQeE2o4/AksK/bi355p/C31aRibC93EYxXczXq3ja2PJj60uifzcocu2Ca2FBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
							</head>
						<body>
						<table class="table" style="width:100%;">
							<tr style="padding:15px;">
    							<td  width="20%"></td>
    							<td  width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.$logo.' style="margin:10px 0px;"  /></td>
    							<td width="20%"></td>
  							</tr>
  							<tr style="padding:15px;">
      							<td width="20%"></td>
      							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
        							<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%; border-bottom:1px solid #ccc; padding: 10px;" border="0">
	          							<tbody>
										 	<tr>											 												
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white; margin-left:0px; padding-left: 0px; color: #150aec;" colspan="2">									
													<p><b>Hello '.$hospital_name->firstname.'  '.$hospital_name->lastname.',</b></p>
												</td>
											</tr>
											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Patient Name</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;border-bottom:1px solid #d7d0d0;">
													<span>'.$patientDetail->fname."  ".$patientDetail->lname.'</span>
												</td>
											
											</tr>
											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Date</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<span>'.$billing_date.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Number</td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$orderID.'</span>
												</td>
											</tr>
											
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Amount: USD </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>$ '.$amount.'</span>
												</td>
											</tr>
											<tr>

												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span>  <b>'.$patientDetail->fname."  ".$patientDetail->lname. '  Payment Link has been Created.</b></span>																								
												</td>
											</tr>																									
																							
										</tbody>
									</table>
								</td>
							</tr>							
							<tr>	
								<td width="20%"></td>					 
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
									<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$hospital_name->email.'</span></p>
								</td>
								<td width="20%"></td>							
							</tr>
						</table>
						</body>
						</html>';
						
				$this->load->library('email');
				$this->load->helper('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('sahil@gtimecs.org', $hospital_name->hospitalname);
				$this->email->to($medicalProvider_to);
				$this->email->cc($adminto);
				$this->email->subject($adminsubject);
				$this->email->message($adminhtmlMessage);				
				$AdminPDF_FILE2 = $_SERVER["DOCUMENT_ROOT"].'/pdf/'.$pdfname;
				$this->email->attach($AdminPDF_FILE2);				
				@$this->email->send();

				$communication_log = array("patient_id"=>$patient_id,"type"=>"Not subscribe.","note"=>"Resend Invoice Payment Link Mail.","amount_owed"=>$amount,"date"=>date("Y-m-d"));
				$this->db->insert("communication_log",$communication_log);
				
				redirect(base_url('dashboard_doctor/invoice/item_master/invoice/'.$patient_id));

	}

	public function update_item_info()
	{
		//print_r($_SESSION);exit;
		$userid = $this->session->userdata("user_id");
		$date   = date("Y-m-d");
		$total  = $this->input->post("total");		
		$query = $this->db->query("select id from subscribe_item where user_id='$userid' and date_time='$date'");
		$result = $query->row();
		$no = $query->num_rows();
		if($no == 1){
			
			$this->db->where("user_id",$userid);			
			$this->db->update("subscribe_item",array("total"=>$total,"date_time"=>$date));
			echo $this->db->last_query();
		}else{
			$this->db->insert("subscribe_item",array("total"=>$total,"user_id"=>$userid,"date_time"=>$date));						
		}
	}

	public function remove_item_info()
	{
		//print_r($_SESSION);exit;
		$userid 		= $this->session->userdata("user_id");
		$date   		= date("Y-m-d");
		$item_amount  	= $this->input->post("item_amount");
		$item_id  		= $this->input->post("item_id");

		$query = $this->db->query("select id,total from subscribe_item where user_id='$userid' and date_time='$date'");		
		$no = $query->num_rows();
		$result = $query->row();	

		$total = $result->total - $item_amount;

		$this->db->where("user_id",$userid);			
		$this->db->update("subscribe_item",array("total"=>$total,"date_time"=>$date));

		$query1 = $this->db->query("select id,total from subscribe_item where user_id='$userid' and date_time='$date'");
		$finalresult = $query1->row();	
		//echo $this->db->last_query();	
		echo json_encode($finalresult);
		
	}

	public function invoice_pdf($subscribeid,$patient_id)
	{

		$this->load->library('dompdf_gen');
		$patientDetail 		= $this->db->get_where("patient",array("id"=>$patient_id))->row();
		$subscribeDetail 	= $this->db->get_where("subscribe",array("id"=>$subscribeid))->row();
		$status =  ($subscribeDetail->status == 1) ? "Paid" : "Unpaid";
		$item = "";

		$hospital_id = ($this->session->userdata('hospital_id') != "") ? $this->session->userdata('hospital_id') : $this->session->userdata('user_id');
		$userData = $this->db->select("*")->from("user")->where('user_id', $hospital_id)->get()->row();
		$logo = ($userData->picture != "") ? base_url().$userData->picture : base_url()."assets/images/logo.png";


		if(strpos($subscribeDetail->item, ",") !== false) {
     		//echo "Found";
     		$item = explode(",", $subscribeDetail->item);
		}else{
			$item = array();
			array_push($item, $subscribeDetail->item);
		}		   
		//print_r($item);exit;
		$html ='<style> .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            }
            .table {
              width: 100%;

              background-color: transparent;
              border-collapse: collapse;
              text-align: left!important;
              }
              .table td, .table th {
                padding: .75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
              }
            .ms-panel-header.header-mini {
              border-bottom: 0;
              padding-bottom: 0;
            }

            .ms-panel-header {
              position: relative;
              padding: 1.5rem;
              border-bottom: 1px solid rgba(0,0,0,0.1);
            }
            .justify-content-between {
              -ms-flex-pack: justify!important;
              justify-content: space-between!important;
            }

            .d-flex {
              display: -ms-flexbox!important;
              display: flex!important;
            }
            .ms-panel-header h6 {
              margin-bottom: 0;
              text-transform: uppercase;
              font-weight: 700;
            }
            .ms-panel-body, .ms-panel-footer {
              position: relative;
              padding: 1.5rem;
            }
            .thead-light thead {
              background-color: rgb(244,244,244);
            }
            ul {
    list-style: none;
    padding: 0;
}
h6 {
    font-size: 16px;
}
 ul {
    margin-top: 0;
    margin-bottom: 1rem;
}
ul {
    display: block;
    list-style-type: none;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
.right{
  float:right;

}
            </style>
<div style="border:1px solid #ccc !important; padding: 25px !important; margin: 25px !important;">
    <div style="border-bottom: 1px solid #ccc !important;">
        <img src="'.$logo.'" style="margin-left:250px !important;width: 30%; margin-bottom: 8px;">
        <h3 style="margin-top: 15px;">GT health system</h3>
        <div style="margin-top: 10px !important;margin-bottom: 20px !important;">
            4599 Oakmound Drive<br>
            Chicago, IL 60607
        </div>
          <div style="margin-top: 15px !important; position: relative; top: -70px; left: 450px;">
        <ul class="invoice-date">
        	<li>Order Date :' .date('d-M-Y',strtotime($subscribeDetail->start_date)).'</li>
        	<li>Status : '.$status.' </li>
        </ul>            
    </div>
    </div>
    <div style="margin-bottom:10px !important;">
        <h4>Bill to : '.$patientDetail->fname.'  '.$patientDetail->lname.'</h4>       	
    </div>
    

  
    <div class="ms-invoice-table table-responsive mt-50" style="margin-top:50px">
    	<table class="table table-hover text-left thead-light" >
    	<thead>
    	<tr class="text-capitalize">
    	<th></th>
    	<th>#</th>
    	<th>Item</th>
    	<th>Amount</th>
    	</tr>
    	</thead>
    	<tbody><tr><td></td><td></td> </tr>';
    		$i = 1;
    	foreach($item as $item_list){
    		$Item_master = $this->db->get_where("item_master",array("id"=>$item_list))->row();
    		$html .='<tr>    			
					<td></td>	
					<td></td>	
	    			<td>'.$i.'</td>
	    			<td>'.$Item_master->service_name.'</td>
	    			<td>$ '.$Item_master->amount.'</td>
    		</tr>';
    		$i++;
    	}
    	//echo $html;exit;
    		$html .='<tr>
    			<td></td>
    			<td></td>
    			<td></td>	
    			<td style="float:right;"><b>Total Amount</b></td> 
    			<td><b>$ '.$subscribeDetail->amount.'</b></td>
    		</tr>
    		</tr>
    			<tr>
    			
    			<td></td>
    			<td></td>    			
    			<td style="float:right;"><b>Total Amount</b></td> 
    			<td><b>$ '.$subscribeDetail->amount.'</b></td>
    		</tr>
    		</tbody>
    		</table>
    </div>
</div>
</div>';
	
 //echo $html;exit;
	    $this->dompdf->load_html($html);
		$this->dompdf->render();
		$pdfname = "invoice_".date('YmdHis') . '.pdf';
			
		$this->dompdf->stream($pdfname,array("Attachment"=>0));
		/*$this->load->library('dompdf_gen');
		//ob_start();
    	///echo "</br>".$html = $_SERVER['DOCUMENT_ROOT']."/application/views/invoice_pdf.php"FCPATH."application/views/invoice_pdf.php";
    	$html = $this->load->view('invoice_pdf');
		//print_r($html);
	    $this->dompdf->load_html($html->output->final_output);
		$this->dompdf->render();
		$output = $this->dompdf->output();
        $pdfname = "invoice_".date('YmdHis') . '.pdf';
        //echo $output;exit();
        file_put_contents('pdf/' . $pdfname . '', $output);
        redirect('pdf/' . $pdfname . '', $output);*/
	}

	public function delete_subscribe($id,$patient_id)
	{
		$this->db->where('id',$id);
		$this->db->delete('subscribe');
		if($patient_id){
			redirect(base_url('item_master/invoice/'.$patient_id));
		}else{			
			redirect(base_url('item_master/invoice/'.$patient_id));
		}		
	}
	public function send_paymentlink($subscribe,$patient_id)
	{
		ob_start();
		$subscribe_detail = $this->db->get_where("subscribe",array("id"=>$subscribe,"status"=>0))->row();
		//print_r($subscribe_detail);

		$price = $subscribe_detail->amount;
		$item = explode(",", $subscribe_detail->item);
		$currency_code = 'USD';
		$orderID      = $subscribe_detail->order_id;
		$login_id = $this->session->userdata("user_id");

		
		$ch = curl_init();
    	$clientId = "AdkXCzeGeEyf6aZMlz-RZFr0MDF9AdTLMfbVSNveyatlGQP8HE4LtI3ZjP2GvHxlc5ZCkj2TQrJ2bjNz";
    	$secret = "EKT3L-Q8Pu2TfRO-mVkzkYpaxk1VC7XiZPGc-pIWLdlUacCW9UsTx02TMZcDDFIvc3xCqONAG1Vk9NSU";

	    curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSLVERSION , 6); 
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	    curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

    	$result = curl_exec($ch);
    	//print_r($result);exit;

	    if(empty($result))die("Error: No response.");
	    else
	    {
	        $json = json_decode($result, TRUE);
	    }
	    curl_close($ch); 

	    $ch2 = curl_init();
    	$token = $json['access_token'];
    	$data = '{
            "transactions": [{
            "amount": {
                "currency":"USD",
                "total":'.$price.'
            },
            "description":"creating a payment"
            }],
            "payer": {
                "payment_method":"paypal"
            },
            "intent":"sale",
            "redirect_urls": {
                "cancel_url":"https://emr.gthealthsystem.com/item_master/billing",
                "return_url":"https://emr.gthealthsystem.com/item_master/auto_login/'.$patient_id.'/'.$orderID.'/'.$login_id.'"    
            }
       }'; 
       $authorization = "Authorization: Bearer ".$token;
       $header = array('Content-Type: application/json' , $authorization );
       
	    curl_setopt($ch2, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment");
	    curl_setopt($ch2, CURLOPT_VERBOSE, 1);
	    curl_setopt($ch2, CURLOPT_HEADER, 0);
	    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch2, CURLOPT_HTTPHEADER ,$header );
	    //curl_setopt($ch2, CURLOPT_HTTPHEADER , );
	    curl_setopt($ch2, CURLOPT_POST, 1);
	    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch2, CURLOPT_POSTFIELDS, $data);

	    $result = curl_exec($ch2);
	    $json = json_decode($result, TRUE); 
	    /*echo  "<pre>";
	    print_r($json);*/
	    $payment_Link = $json["links"][1]["href"];
	    //print_r($payment_Link); exit;
	    curl_close($ch2);

	    
		$billing_date = date("d-M-Y",strtotime($subscribe_detail->start_date));
		
		//print_r($subscribe_detail);

		$patientDetail = $this->db->get_where("patient",array("id"=>$patient_id))->row();

		$amount = $subscribe_detail->amount;
		$item = explode(",", $subscribe_detail->item);
		$currency_code = 'USD';

		if($this->session->userdata('isadmin')==0 ){
			$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('user_id'))->get()->row();
		}else if($this->session->userdata('isadmin')==1){
			$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('hospital_id'))->get()->row();
		}

		$logo = ($hospital_name->picture != "") ? base_url().$hospital_name->picture : base_url()."assets/images/logo.png";

	    $to = $patientDetail->email;
		$subject="Updated Payment Link ".$hospital_name->hospitalname;
		$htmlMessage='<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Payment Link  '. $hospital_name->hospitalname .'</title>
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
								<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js" integrity="sha512-Wm00XTqNHcGqQgiDlZVpK4QIhO2MmMJfzNJfh8wwbBC9BR0FtdJwPqDhEYy8jCfKEhWWZe/LDB6FwY7YE9QhMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" integrity="sha512-5RNDl2gYvm6wpoVAU4J2+cMGZQeE2o4/AksK/bi355p/C31aRibC93EYxXczXq3ja2PJj60uifzcocu2Ca2FBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
							</head>
						<body>
						<table class="table" style="width:100%;">
							<tr style="padding:15px;">
    							<td  width="20%"></td>
    							<td  width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.$logo.' style="margin:10px 0px;"  /></td>
    							<td width="20%"></td>
  							</tr>
  							<tr style="padding:15px;">
      							<td width="20%"></td>
      							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
        							<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%; border-bottom:1px solid #ccc; padding: 10px;" border="0">
	          							<tbody>
										 	<tr>											 												
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white; margin-left:0px; padding-left: 0px; color: #150aec;" colspan="2">									
													<p><b>Hello '.$patientDetail->fname."  ".$patientDetail->lname.',</b></p>
												</td>
											</tr>
											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Date</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<span>'.$billing_date.'</span>
												</td>
											</tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Number</td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$orderID.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Amount: USD </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$amount.' USD $</span>
												</td>
											</tr>
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> Your Payment Link has been given bellow.</span>																								
												</td>
											</tr>																									
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2"> <span> <a href='.$payment_Link.' target="_blank">'.$payment_Link.'</a></span></td>
											</tr>													
										</tbody>
									</table>
								</td>
							</tr>							
							<tr>	
								<td width="20%"></td>					 
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
									<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$hospital_name->email.'</span></p>
								</td>
								<td width="20%"></td>							
							</tr>
						</table>
						</body>
						</html>';
						//echo $htmlMessage;exit;						
			//$this->sendEmailAttachment($to, $subject, $htmlMessage);		
			
			$this->load->library('email');
			$this->load->helper('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('sahil@gtimecs.org', $hospital_name->hospitalname);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($htmlMessage);				
			@$this->email->send();
			$communication_log = array("patient_id"=>$patient_id,"type"=>"subscribe","note"=>"Resend Subscribe Payment Link Mail.","amount_owed"=>$price,"date"=>date("Y-m-d"));
				$this->db->insert("communication_log",$communication_log);

			redirect(base_url("item_master/invoice/".$patient_id));
	}
	public function send_paymentlink_cron()
	{
		ob_start();
		$login_id   = $this->session->userdata("user_id");
		$subscribe_detail = $this->db->get_where("subscribe",array("subscribe"=>1,"status"=>0,"end_date"=>date("Y-m-d")))->result();
		//print_r($subscribe_detail);
		for($i=0;$i<count($subscribe_detail);$i++){
			$price = $subscribe_detail[$i]->amount;
			$item = explode(",", $subscribe_detail[$i]->item);
			$orderID = $subscribe_detail[$i]->order_id;
			$patient_id =  $subscribe_detail[$i]->patient_id;
			$currency_code = 'USD';
			$mailDate = $subscribe_detail[$i]->end_date;
			if($mailDate == date("Y-m-d")){
				//echo "HIIIIII";exit;
				$ch = curl_init();
				$clientId = "AdkXCzeGeEyf6aZMlz-RZFr0MDF9AdTLMfbVSNveyatlGQP8HE4LtI3ZjP2GvHxlc5ZCkj2TQrJ2bjNz";
				$secret = "EKT3L-Q8Pu2TfRO-mVkzkYpaxk1VC7XiZPGc-pIWLdlUacCW9UsTx02TMZcDDFIvc3xCqONAG1Vk9NSU";

			    curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
			    curl_setopt($ch, CURLOPT_HEADER, 0);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			    curl_setopt($ch, CURLOPT_SSLVERSION , 6); 
			    curl_setopt($ch, CURLOPT_POST, true);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			    curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
			    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

				$result = curl_exec($ch);
				//print_r($result);exit;

	    		if(empty($result))die("Error: No response.");
			    else
			    {
			        $json = json_decode($result, TRUE);
			    }
	    		curl_close($ch); 

			    $ch2 = curl_init();
		    	$token = $json['access_token'];
		    	$data = '{
		            "transactions": [{
		            "amount": {
		                "currency":"USD",
		                "total":'.$price.'
		            },
		            "description":"creating a payment"
		            }],
		            "payer": {
		                "payment_method":"paypal"
		            },
		            "intent":"sale",
		            "redirect_urls": {
		                "cancel_url":"'.base_url().'/item_master/billing",
		                "return_url":"'.base_url().'/item_master/auto_login/'.$patient_id.'/'.$orderID.'/'.$login_id.'"   
		            }
		       }'; 
       			$authorization = "Authorization: Bearer ".$token;
       			$header = array('Content-Type: application/json' , $authorization );
       
			    curl_setopt($ch2, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment");
			    curl_setopt($ch2, CURLOPT_VERBOSE, 1);
			    curl_setopt($ch2, CURLOPT_HEADER, 0);
			    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
			    curl_setopt($ch2, CURLOPT_HTTPHEADER ,$header );
			    //curl_setopt($ch2, CURLOPT_HTTPHEADER , );
			    curl_setopt($ch2, CURLOPT_POST, 1);
			    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
			    curl_setopt($ch2, CURLOPT_POSTFIELDS, $data);

			    $result = curl_exec($ch2);
			    $json = json_decode($result, TRUE); 
			    /*echo  "<pre>";
			    print_r($json);*/
			    $payment_Link = $json["links"][1]["href"];
			    //print_r($payment_Link); exit;
			    curl_close($ch2);

			    
				$billing_date = date("d-M-Y",strtotime($subscribe_detail[$i]->start_date));
				$orderID      = $subscribe_detail[$i]->order_id;
				//print_r($subscribe_detail);
				$patient_id = $subscribe_detail[$i]->patient_id;
				$patientDetail = $this->db->get_where("patient",array("id"=>$patient_id))->row();
				
				$amount = $subscribe_detail[$i]->amount;
				$item = explode(",", $subscribe_detail->item);
				$currency_code = 'usd';

				if($this->session->userdata('isadmin')==0 ){
					$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('user_id'))->get()->row();
				}else if($this->session->userdata('isadmin')==1){
					$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('hospital_id'))->get()->row();
				}

				$logo = ($hospital_name->picture != "") ? base_url().$hospital_name->picture : base_url()."assets/images/logo.png";

    			$to = $patientDetail->email;
				$subject="Payment Link ".$hospital_name->hospitalname;
				$htmlMessage='<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Payment Link  '. $hospital_name->hospitalname .'</title>
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
								<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js" integrity="sha512-Wm00XTqNHcGqQgiDlZVpK4QIhO2MmMJfzNJfh8wwbBC9BR0FtdJwPqDhEYy8jCfKEhWWZe/LDB6FwY7YE9QhMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" integrity="sha512-5RNDl2gYvm6wpoVAU4J2+cMGZQeE2o4/AksK/bi355p/C31aRibC93EYxXczXq3ja2PJj60uifzcocu2Ca2FBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
							</head>
						<body>
						<table class="table" style="width:100%;">
							<tr style="padding:15px;">
    							<td  width="20%"></td>
    							<td  width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.$logo.' style="margin:10px 0px;"  /></td>
    							<td width="20%"></td>
  							</tr>
  							<tr style="padding:15px;">
      							<td width="20%"></td>
      							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
        							<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%; border-bottom:1px solid #ccc; padding: 10px;" border="0">
	          							<tbody>
										 	<tr>											 												
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white; margin-left:0px; padding-left: 0px; color: #150aec;" colspan="2">									
													<p><b>Hello '.$patientDetail->fname."  ".$patientDetail->lname.',</b></p>
												</td>
											</tr>
											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Date</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<span>'.$billing_date.'</span>
												</td>
											</tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Number</td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$orderID.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Amount: USD </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$amount.' $</span>
												</td>
											</tr>
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> Your Payment Link has been given bellow.</span>																								
												</td>
											</tr>																									
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2"> <span> <a href='.$payment_Link.' target="_blank">'.$payment_Link.'</a></span></td>
											</tr>													
										</tbody>
									</table>
								</td>
							</tr>							
							<tr>	
								<td width="20%"></td>					 
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
									<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$to.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$hospital_name->email.'</span></p>
								</td>
								<td width="20%"></td>							
							</tr>
						</table>
						</body>
						</html>';
					//echo $htmlMessage;exit;												
				
				$this->load->library('email');
				$this->load->helper('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('sahil@gtimecs.org', $hospital_name->hospitalname);
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($htmlMessage);				
				@$this->email->send();

				$communication_log = array("patient_id"=>$patient_id,"type"=>"subscribe","note"=>"Subscribe Link Mail Send.","amount_owed"=>$amount,"date"=>date("Y-m-d"));
				$this->db->insert("communication_log",$communication_log);
			}else{
				echo "Date Not Matched.";
			}		
		}
		
	}

	public function success_payment($patient_id="",$orderID="",$login_id="",$payment_Id="")
	{

		$this->pdf = new DOMPDF();

		$this->db->where("order_id",$orderID);
		$this->db->where("patient_id",$patient_id);
		$this->db->update("subscribe",array("status"=>1,"payment_id"=>$payment_Id,"payment_type"=>1,"updated_date"=>date("Y-m-d h:i:s")));

		$patientDetail 		= $this->db->get_where("patient",array("id"=>$patient_id))->row();
		$order = $this->db->get_where("subscribe",array("order_id"=>$orderID))->row();		
		$subscribe_detail = $this->db->get_where("subscribe",array("id"=>$order->id))->row();

		$status =  ($subscribe_detail->status == 1) ? "Paid" : "Unpaid";
		$item = "";
		$hospital_id =  $this->session->userdata('hospital_id') ;

		$userData 		=	$this->db->select("*")->from("user")->where('user_id', $hospital_id)->get()->row();
		$hospitalData 	=  $this->db->select("*")->from("user")->where('user_id', $login_id)->get()->row();

		$logo = ($userData->picture != "") ? base_url().$userData->picture : base_url()."assets/images/logo.png";

		if(strpos($subscribe_detail->item, ",") !== false) {     		
     		$item = explode(",", $subscribe_detail->item);
		}else{
			$item = array();
			array_push($item, $subscribe_detail->item);
		}		   
		$html ='<style> .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            }
            .table {
              width: 100%;

              background-color: transparent;
              border-collapse: collapse;
              text-align: left!important;
              }
              .table td, .table th {
                padding: .75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
              }
            .ms-panel-header.header-mini {
              border-bottom: 0;
              padding-bottom: 0;
            }

            .ms-panel-header {
              position: relative;
              padding: 1.5rem;
              border-bottom: 1px solid rgba(0,0,0,0.1);
            }
            .justify-content-between {
              -ms-flex-pack: justify!important;
              justify-content: space-between!important;
            }

            .d-flex {
              display: -ms-flexbox!important;
              display: flex!important;
            }
            .ms-panel-header h6 {
              margin-bottom: 0;
              text-transform: uppercase;
              font-weight: 700;
            }
            .ms-panel-body, .ms-panel-footer {
              position: relative;
              padding: 1.5rem;
            }
            .thead-light thead {
              background-color: rgb(244,244,244);
            }
            ul {
    list-style: none;
    padding: 0;
}
h6 {
    font-size: 16px;
}
 ul {
    margin-top: 0;
    margin-bottom: 1rem;
}
ul {
    display: block;
    list-style-type: none;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
.right{
  float:right;

}
 </style>
<div style="border:1px solid #ccc !important; padding: 25px !important; margin: 25px !important;">
    <div style="border-bottom: 1px solid #ccc !important;">
        <img src="'.$logo.'" style="margin-left:250px !important;width: 30%; margin-bottom: 8px;">
        <h3 style="margin-top: 15px;">GT health system</h3>
        <div style="margin-top: 10px !important;margin-bottom: 20px !important;">
            4599 Oakmound Drive<br>
            Chicago, IL 60607
        </div>
          <div style="margin-top: 15px !important; position: relative; top: -70px; left: 450px;">
        <ul class="invoice-date">
        	<li>Order Date :' .date('d-M-Y',strtotime($subscribe_detail->start_date)).'</li>
        	<li>Status : '.$status.' </li>
        </ul>            
    </div>
    </div>
    <div style="margin-bottom:10px !important;">
        <h4>Bill to : '.$patientDetail->fname.'  '.$patientDetail->lname.'</h4>       	
    </div>
    
    <div class="ms-invoice-table table-responsive mt-50" style="margin-top:50px">
    	<table class="table table-hover text-left thead-light" >
    	<thead>
    	<tr class="text-capitalize">
    	<th></th>
    	<th>#</th>
    	<th>Item</th>
    	<th>Amount</th>
    	</tr>
    	</thead>
    	<tbody><tr><td></td><td></td> </tr>';
    		$i = 1;
    	foreach($item as $item_list){
    		$Item_master = $this->db->get_where("item_master",array("id"=>$item_list))->row();
    		
    		$html .='<tr>    			
					<td></td>	
					<td></td>	
	    			<td>'.$i.'</td>
	    			<td>'.$Item_master->service_name.'</td>
	    			<td>$ '.$Item_master->amount.'</td>
    		</tr>';
    		$i++;
    	}
    	//echo $html;exit;
    		$html .='<tr>
    			<td></td>
    			<td></td>
    			<td></td>	
    			<td style="float:right;"><b>Total Amount</b></td> 
    			<td><b>$ '.$subscribe_detail->amount.'</b></td>
    		</tr>
    		</tr>
    			<tr>
    			
    			<td></td>
    			<td></td>    			
    			<td style="float:right;"><b>Total Amount</b></td> 
    			<td><b>$ '.$subscribe_detail->amount.'</b></td>
    		</tr>
    		</tbody>
    	</table>
    </div>
</div>
</div>';
	
 //echo $html;exit;
	    $this->pdf->load_html($html);
		$this->pdf->render();
		$pdfname = "invoice_".date('YmdHis').'.pdf';		
        $output = $this->pdf->Output($pdfname, 'S');
        $pdf_FILE = file_put_contents('pdf/'.$pdfname, $output);

		$billing_date = date("d-M-Y",strtotime($subscribe_detail->start_date));
		$amount       = $subscribe_detail->amount;
				
		$subject="Your Payment Done Successfully ".$userData->hospitalname;
		$Mail_htmlMessage = '<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Payment Done Successfully  '. $userData->hospitalname .'</title>
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
								<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js" integrity="sha512-Wm00XTqNHcGqQgiDlZVpK4QIhO2MmMJfzNJfh8wwbBC9BR0FtdJwPqDhEYy8jCfKEhWWZe/LDB6FwY7YE9QhMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" integrity="sha512-5RNDl2gYvm6wpoVAU4J2+cMGZQeE2o4/AksK/bi355p/C31aRibC93EYxXczXq3ja2PJj60uifzcocu2Ca2FBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
							</head>
						<body>
						<table class="table" style="width:100%;">
							<tr style="padding:15px;">
    							<td  width="20%"></td>
    							<td  width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.$logo.' style="margin:10px 0px;"  /></td>
    							<td width="20%"></td>
  							</tr>
  							<tr style="padding:15px;">
      							<td width="20%"></td>
      							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
        							<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%; border-bottom:1px solid #ccc; padding: 10px;" border="0">
	          							<tbody>
																						
											<tr>											 												
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white; margin-left:0px; padding-left: 0px; color: #150aec;" colspan="2">									
													<p><b>Hello '.$patientDetail->fname."  ".$patientDetail->lname.',</b></p>
												</td>
											</tr>

											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Date</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<span>'.$billing_date.'</span>
												</td>
											</tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Number</td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$orderID.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Amount: USD </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span> $ '.$amount.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Payment ID </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$subscribe_detail->payment_id.'</span>
												</td>
											</tr>
											
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> Your Payment has been done successfully.</span>																						
												</td>
											</tr>											
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> Thank you</span>																								
												</td>
											</tr>																								
																						
										</tbody>
									</table>
								</td>
							</tr>							
							<tr>	
								<td width="20%"></td>					 
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
									<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$patientDetail->email.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$userData->email.'</span></p>
								</td>
								<td width="20%"></td>							
							</tr>
						</table>
						</body>
						</html>';
			
			$config['mailtype'] = 'html';
			$to = $patientDetail->email;			
			$this->email->initialize($config);
			$this->email->from('sahil@gtimecs.org', $userData->hospitalname);
			$this->email->to($to);						
			$this->email->subject($subject);
			$this->email->message($Mail_htmlMessage);	
			$FinalPDF_FILE = $_SERVER["DOCUMENT_ROOT"].'/pdf/'.$pdfname;	
			$this->email->attach($FinalPDF_FILE);					
			$this->email->send();
			$this->email->clear(TRUE);

					$MedicalProvider_subject= $patientDetail->fname.'  '.$patientDetail->lname." Payment Done Successfully ".$userData->hospitalname;
					$MedicalProvidersMail_htmlMessage = '<html>
							<head>
								<meta name="viewport" content="width=device-width" />
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Payment Done Successfully  '. $userData->hospitalname .'</title>
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
								<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js" integrity="sha512-Wm00XTqNHcGqQgiDlZVpK4QIhO2MmMJfzNJfh8wwbBC9BR0FtdJwPqDhEYy8jCfKEhWWZe/LDB6FwY7YE9QhMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" integrity="sha512-5RNDl2gYvm6wpoVAU4J2+cMGZQeE2o4/AksK/bi355p/C31aRibC93EYxXczXq3ja2PJj60uifzcocu2Ca2FBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
							</head>
						<body>
						<table class="table" style="width:100%;">
							<tr style="padding:15px;">
    							<td  width="20%"></td>
    							<td  width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;border-top: 1px solid #d7d0d0;background-color: white;text-align: center;"><img width="250px" src='.$logo.' style="margin:10px 0px;"  /></td>
    							<td width="20%"></td>
  							</tr>
  							<tr style="padding:15px;">
      							<td width="20%"></td>
      							<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
        							<table class="table" style="border-collapse: collapse;margin-left: 15px;margin-right: 15px;margin-top:15px;width: 90%; border-bottom:1px solid #ccc; padding: 10px;" border="0">
	          							<tbody>										 	
											
											<tr>											 												
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white; margin-left:0px; padding-left: 0px; color: #150aec;" colspan="2">									
													<p><b>Hello '.$hospitalData->firstname.''.$hospitalData->lastname.',</b></p>
												</td>
											</tr>

											<tr>		
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Date</td>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;">
													<span>'.$billing_date.'</span>
												</td>
											</tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Invoice Number</td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$orderID.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Amount: USD </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span> $ '.$amount.'</span>
												</td>
											</tr>
											<tr>
												<td style="border:1px solid #ccc5c5;padding: 8px;width: 25%;font-weight: 600;">Payment ID </td>
												<td width="60%" style="border: 1px solid #d7d0d0;background-color: white;">
													<span>'.$subscribe_detail->payment_id.'</span>
												</td>
											</tr>
											
											<tr>
													<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
														<span>'. $patientDetail->fname.'  '.$patientDetail->lname.' Payment Done Successfully.</span>																						
													</td>
											</tr>											
											<tr>
												<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: white;" colspan="2">
													<span> Thank you</span>																								
												</td>
											</tr>																								
																						
										</tbody>
									</table>
								</td>
							</tr>							
							<tr>	
								<td width="20%"></td>					 
								<td width="60%" style="border-right: 1px solid #d7d0d0;border-left: 1px solid #d7d0d0;background-color: black;">
									<p style="text-align: center;color: white;">This message was sent to <span style="color: orange;">'.$patientDetail->email.'.</span> If this is not you please delete this email and send an email to support to report this error. This email has been generated with user knowledge by our system. Please login to change your preference if you no longer wish to receive this email. or contact support. We do not transmit nor do we ask for sensitive information over email. If any such information is transmitted or requested over email please report it to support. If you have any questions, contact us at <span style="color: orange;">'.$userData->email.'</span></p>
								</td>
								<td width="20%"></td>							
							</tr>
						</table>
						</body>
						</html>';
			$MedicalPRoviderTo = $hospitalData->email;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('sahil@gtimecs.org', $userData->hospitalname);
			$this->email->to($MedicalPRoviderTo);
			$this->email->cc($userData->email);
			$this->email->subject($MedicalProvider_subject);
			$this->email->message($MedicalProvidersMail_htmlMessage);	
			$MedicalProviderFinalPDF_FILE = $_SERVER["DOCUMENT_ROOT"].'/pdf/'.$pdfname;	
			$this->email->attach($MedicalProviderFinalPDF_FILE);		
			$this->email->send();
			$communication_log = array("patient_id"=>$patient_id,"type"=>"Payment Done.","note"=>"Payment done successfully.","amount_owed"=>$amount,"date"=>date("Y-m-d h:i:s"));
			$this->db->insert("communication_log",$communication_log);
			$data['content']  = $this->load->view('dashboard_patient/invoice/success_payment' ,$data,true);
			$this->load->view('layout/main_wrapper',$data);	
	}

	public function delete_communication_log($id,$patient_id)
	{
		$this->db->where("id",$id);
		$this->db->where("patient_id",$patient_id);
		$this->db->delete("communication_log");         

		$patientDetail 		= $this->db->get_where("patient",array("id"=>$patient_id))->row();
		$userData           = $this->db->get_where("user",array("user_id"=>$this->session->userdata("user_id")))->row();

		if($this->session->userdata('isadmin')==0 ){
			$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('user_id'))->get()->row();
		}else if($this->session->userdata('isadmin')==1){
			$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('hospital_id'))->get()->row();
		}


		$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"invoice-billing","Delete communication log - Billing",
                $hospital_name->hospitalname." Hospital Medical Provider ".$userData->firstname.'  '.$userData->lastname." Delete Communication Log of ".$patientDetail->fname." ".$patientDetail->lname ." Patient at ".date("Y-m-d h:i:s"),$this->session->userdata("hospital_id"),$patientDetail->id,$patientDetail->fname." ".$patientDetail->lname,10);

		redirect("dashboard_doctor/invoice/item_master/invoice/".$patient_id);


	}
	
	function doctordetail()
	{

		$did = $this->input->get('d_id');
		$result = $this->db->select("*")->from("user")->where("user_id",$did)->get()->row();
		$department = $this->db->select("*")->from("department")->where("dprt_id",$result->department_id)->get()->row();
		$role = $this->db->select("*")->from("role")->where("r_id",$result->role_id)->get()->row();
		$result->contactinfo = $result->address;
		if($department!=''){
				$result->department = $department->name;
		}else{
			$result->department = "";
		}
		if($role!=''){
			$result->role = $role->name;
		}else{
				$result->role = "";
		}
		//$result->department = ($department->name!='')?$department->name:'';
		//$result->role  = ($role->name!='')?$role->name:'';
		$result->fullname = $result->firstname.' '.$result->lastname;
		$result->date_of_birth = date('d/m/Y',strtotime($result->date_of_birth));


		$result->mobile = $result->mobile_prefix.' '.$result->mobile;
		$result->create_date = date('d/m/Y',strtotime($result->create_date));

		$result->status = ($result->status=='1')?'Active':'Inactive';
		$result->phone = ($result->phone!='')?$result->phone:'';
$result->admin_access = ($result->is_admin=='1')?'Yes':'No';
		echo json_encode($result);
	}
	function doctor_report()
	{
		$this->load->library('dompdf_gen');
		$customPaper = array(0,0,1024,1000);
//$this->dompdf->set_paper($customPaper);
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
							$doctors =	$this->doctor_model->read();
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
$doctors =	$this->doctor_model->read();
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
// function docotr_search(){
// 	$p_id = trim($this->input->get_post('p_id'));

// 		 if($p_id!=''){
// 			 $sql ="SELECT * FROM user WHERE (user_role='2') and (firstname like '%".($p_id)."%' or email like '%".($p_id)."%' or lastname like '%".($p_id)."%' or date_of_birth like '%".($p_id)."%') ORDER BY user_id DESC";
// 			 $query = $this->db->query($sql);
// 				$searchdetail =  $query->result();
// 				$msg ='';
// 				//if(count($searchdetail)>0){
// 					foreach ($searchdetail as $value) {
// 						if($value->sex==''){
// 							 $value->sex='Male';
// 						 }
// 						$value->date_of_birth=date('d/m/Y',strtotime($value->date_of_birth));
// 						$msg.='<tr style="border-bottom: 1px solid #ddd;" class="hovertr"><td>';
// 						$msg.='<img  src="'.base_url().'assets/images/patient/2017-01-16/p5.png"></td>';
// 						$msg.='<td><div class="kpull-left"><div class="word-break">';
// 						$msg.='<span  class="fa fa-circle" data-toggle="tooltip" title="Patient online"> </span>';
// 						$msg.='<span class="text-primary">'.$value->firstname.' </span>';
// 						$msg.='</div></div></td>';
// 						$msg.='<td><span class="text-primary">'.$value->lastname.'</span></td>';
// 						$msg.='<td>'.$value->date_of_birth.'</td><td>'.$value->sex.'</td>';
// 						$msg.='<td>'.$value->address.'<br><span class="light-grey">M</span>'.$value->mobile.'<span class="light-grey ml-15">H</span>'.$value->phone.'</td>';
// 						$msg.= '<td>';
// 					$role = $this->db->select("*")->from("role")->where("r_id",$value->role_id)->get()->row();
// 			    if(isset($role)){
// 						$msg.=$role->name;
// 					}
// 					$msg.='</td>';
// 						$msg.= '<td><div class="btn-group"><select class="btn btn-default form-control" onchange="call(\''.$value->user_id.'\',this.options[this.selectedIndex].value)"><option value="1" '.(($value->status==1)?'Selected':'').'>Active</option><option value="0"'.(($value->status==0)?'Selected':'').'>Inactive</option>   </select>
// 	</div></td>';
// 					 $msg.='<td class="pt-15"><div class="btn-group" style="float: right;display: flex;"><a href="'.base_url("doctor/edit/$value->user_id").'" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>';
// 					 $msg.='<a href="'.base_url("doctor/delete/$value->user_id").'" class="btn btn-xs btn-danger" onclick="return confirm('.display('are_you_sure').')"><i class="fa fa-trash"></i></a></div></td></tr>';
// 					}


// 				 echo json_encode($msg);
// 			 }else{
// 				 $ds = "";
// 				 echo json_encode($ds);

// 			 }
// 	 }

	function doctor_search(){
	$p_id = $this->input->get_post('p_id');
	$doctor_id = $this->session->userdata('user_id');
	$searchdetail = $this->db->select("user.*,department.name")
					->from("user")
					->join('department','department.dprt_id = user.department_id','left')
					->where('user.user_role',2)
					->where('user.created_by',$doctor_id)
					->where("(user.firstname LIKE '%".$p_id."%' OR user.email LIKE '%".$p_id."%' OR user.lastname LIKE '%".$p_id."%')", NULL, FALSE)
					->order_by('user.user_id','desc')
					->get()
					->result();
					//echo $this->db->last_query(); die;

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
				$msg .= '<td class="text-primary" onclick="doctor_info('.$value->user_id.')">'. date('d/m/Y',strtotime($value->date_of_birth)).'</td>';
				$msg .= '<td onclick="doctor_info('.$value->user_id.')">'.$value->sex.'</td>';
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
				// echo json_encode($msg);

			 }
			}else{
				$msg = '<tr><td colspan="9" align="center">No data found!</td></tr>';
			}
			echo $msg;
}


	 function docotr_all()
	  {
	 //$p_id = trim($this->input->get_post('p_id'));


	 		 $sql ="SELECT * FROM user WHERE (user_role='2') ORDER BY user_id DESC";
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
	 					$msg.='<img  src="'.base_url().'assets/images/patient/2017-01-16/p5.png"></td>';
	 					$msg.='<td><div class="kpull-left"><div class="word-break">';
	 					$msg.='<span  class="fa fa-circle" data-toggle="tooltip" title="Patient online"> </span>';
	 					$msg.='<span class="text-primary">'.$value->firstname.' </span>';
	 					$msg.='</div></div></td>';
	 					$msg.='<td><span class="text-primary">'.$value->lastname.'</span></td>';
	 					$msg.='<td>'.$value->date_of_birth.'</td><td>'.$value->sex.'</td>';
	 					$msg.='<td>'.$value->address.'<br><span class="light-grey">M</span>'.$value->mobile.'<span class="light-grey ml-15">H</span>'.$value->phone.'</td>';
	 					$msg.= '<td>';
	 				$role = $this->db->select("*")->from("role")->where("r_id",$value->role_id)->get()->row();
	 				if(isset($role)){
	 					$msg.=$role->name;
	 				}
	 				$msg.='</td>';
	 					$msg.= '<td><div class="btn-group"><select class="btn btn-default form-control" onchange="call(\''.$value->user_id.'\',this.options[this.selectedIndex].value)"><option value="1" '.(($value->status==1)?'Selected':'').'>Active</option><option value="0"'.(($value->status==0)?'Selected':'').'>Inactive</option>   </select>
	 </div></td>';
	 				 $msg.='<td class="pt-15"><div class="btn-group" style="float: right;display: flex;"><a href="'.base_url("doctor/edit/$value->user_id").'" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>';
	 				 $msg.='<a href="'.base_url("doctor/delete/$value->user_id").'" class="btn btn-xs btn-danger" onclick="return confirm('.display('are_you_sure').')"><i class="fa fa-trash"></i></a></div>
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
	public function profile($user_id = null)
	{
		$data['title'] = display('doctor_profile');
		#-------------------------------#
		$data['user'] = $this->doctor_model->read_by_id($user_id);
		$data['content'] = $this->load->view('doctor_profile',$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}
	public function item_category($user_id = null)
	{
		$data['title'] = display('doctor_profile');
		$data['category'] = $this->item_master_model->get_category();
		$data['content'] = $this->load->view('item_category',$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}

	public function add_item_category($user_id = null)
	{
		$data['title'] = display('doctor_profile');
		
		if(!empty($_POST)){
			$item_category = str_replace(' ', '', $this->input->post("category_name"));
			$status        = $this->input->post("status");
			$hospital_id = $this->session->userdata('user_id');
			$created_by_id = $this->session->userdata('created_by');
        	$isadmin = $this->session->userdata('isadmin');
	        if($isadmin == 1){
	        	$hospital_id = $created_by_id;
	        }
			

			$data = array("category_name"=>$item_category,"status"=>$status,"hospital_id"=>$hospital_id);
			$result = $this->item_master_model->insert($data);
			if($result){
				redirect("item_master/item_category");
			}
		}

		$data['content'] = $this->load->view('add_item_category',$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}

	public function edit_item_category($id = null)
	{
		$data['title'] = display('doctor_profile');
		
		if(!empty($_POST)){
			$category_id   = $this->input->post("category_id");
			$item_category = str_replace(' ', '', $this->input->post("category_name"));
			$status        = $this->input->post("status");
			$hospital_id = $this->session->userdata('user_id');
			$created_by_id = $this->session->userdata('created_by');
        	$isadmin = $this->session->userdata('isadmin');
	        if($isadmin == 1){
	        	$hospital_id = $created_by_id;
	        }
			

			$data = array("category_name"=>$item_category,"status"=>$status,"hospital_id"=>$hospital_id);
					   $this->db->where("category_id",$category_id);	
			$result = $this->db->update("itemcategory_master",$data);
			
			if($result){
				redirect("item_master/item_category");
			}
		}
		$item_category = $this->db->get_where("itemcategory_master",array("category_id"=>$id))->row();
		$data["category"] = $item_category;
		$data['content'] = $this->load->view('edit_item_category',$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}

	public function delete_item_category($id)
	{
		$this->db->where("category_id",$id);
		$this->db->delete("itemcategory_master");
		redirect("item_master/item_category");
	}

	function itemcategory_search($patient_id=""){

		$p_id = str_replace(' ', '', $this->input->post('p_id'));
		$hospital_id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
	    if($isadmin == 1){
	      	$hospital_id = $created_by_id;
	    }
		if($p_id!=''){
		
			$sql ="SELECT * FROM itemcategory_master WHERE (hospital_id ='".$hospital_id."') and  (category_name like '%".($p_id)."%')";
			$query = $this->db->query($sql);
			 $searchdetail =  $query->result();
			 $msg ='';
			 //if(count($searchdetail)>0){
				 foreach ($searchdetail as $value) {
					 $msg.='<tr class="hovertr" style="border-bottom: 1px solid #ccc;">';

					 $msg.='<td class="text-left">'.$value->category_name.'</td>';
					
					 $selected_active = ($value->status == "active") ? "selected='selected'" : "";
					 $selected_inactive = $value->status == "inactive" ? "selected='selected'" : "";
					 $msg.=' <td class="text-left">
                   <div class="btn-group">
                        <select class="btn btn-default form-control" onchange="return call(<?php echo  $value->category_id?>,this.value)">
                            <option value="active" '.$selected.'>Active</option>
                            <option value="inactive" '.$selected_inactive.'>Inactive</option>
                        </select>
                    </div>
                </td>';
					 


					 $msg.='<td class="pt-15"><div class="btn-group" style="float: right;display: flex;"><a href="'.base_url("item_master/edit_item_category/$value->category_id").'" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>';
					$msg.='<a href="'.base_url("patient/delete/$value->category_id").'" class="btn btn-xs btn-danger" onclick="return confirm('.display('are_you_sure').')"><i class="fa fa-trash"></i></a></div></td>
										</tr>';


				 }

				echo json_encode($msg);
			}else{
				$sql ="SELECT * FROM itemcategory_master WHERE hospital_id ='".$hospital_id."'";
				$query = $this->db->query($sql);
				$searchdetail =  $query->result();
				$msg ='';
				foreach ($searchdetail as $value) {
					 $msg.='<tr class="hovertr" style="border-bottom: 1px solid #ccc;">';

					 $msg.='<td class="text-left">'.$value->category_name.'</td>';
					
					 $selected_active = ($value->status == "active") ? "selected='selected'" : "";
					 $selected_inactive = $value->status == "inactive" ? "selected='selected'" : "";
					 $msg.=' <td class="text-left">
                   <div class="btn-group">
                        <select class="btn btn-default form-control" onchange="return call(<?php echo  $value->category_id?>,this.value)">
                            <option value="active" '.$selected.'>Active</option>
                            <option value="inactive" '.$selected_inactive.'>Inactive</option>
                        </select>
                    </div>
                </td>';
					 


					 $msg.='<td class="pt-15"><div class="btn-group" style="float: right;display: flex;"><a href="'.base_url("item_master/edit_item_category/$value->category_id").'" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>';
					$msg.='<a href="'.base_url("item_master/delete_item_category/$value->category_id").'" class="btn btn-xs btn-danger" onclick="return confirm('.display('are_you_sure').')"><i class="fa fa-trash"></i></a></div></td>
										</tr>';


				 }
				echo json_encode($msg);
			}
		}

		function item_search($patient_id=""){

		$p_id = str_replace(' ', '', $this->input->post('p_id'));
		$hospital_id = $this->session->userdata('user_id');
		$created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
	    if($isadmin == 1){
	      	$hospital_id = $created_by_id;
	    }
		if($p_id!=''){
		
			$sql ="SELECT * FROM item_master WHERE (hospital_id ='".$hospital_id."') and  (service_name like '%".($p_id)."%') or (amount like '%".($p_id)."%')";
			$query = $this->db->query($sql);
			 $searchdetail =  $query->result();
			 $msg ='';
			 //if(count($searchdetail)>0){
				 foreach ($searchdetail as $value) {
				 	$category = $this->db->get_where("itemcategory_master", array('category_id' => $value->category))->row();   
					 $msg.='<tr class="hovertr" style="border-bottom: 1px solid #ccc;">';
					             
					 $msg.='<td class="text-left">'.$value->service_name.'</td>';
					 $msg.='<td class="text-left">'.$value->amount.'</td>';
					 $msg.='<td class="text-left">'.$category->category_name.'</td>';
					
					 $selected_active = ($value->status == "active") ? "selected='selected'" : "";
					 $selected_inactive = $value->status == "inactive" ? "selected='selected'" : "";
					 $msg.=' <td class="text-left">
                   <div class="btn-group">
                        <select class="btn btn-default form-control" onchange="return call(<?php echo  $value->category_id?>,this.value)">
                            <option value="active" '.$selected.'>Active</option>
                            <option value="inactive" '.$selected_inactive.'>Inactive</option>
                        </select>
                    </div>
                </td>';
					 


					 $msg.='<td class="pt-15"><div class="btn-group" style="float: right;display: flex;"><a href="'.base_url("item_master/edit_item_category/$value->category_id").'" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>';
					$msg.='<a href="'.base_url("patient/delete/$value->category_id").'" class="btn btn-xs btn-danger" onclick="return confirm('.display('are_you_sure').')"><i class="fa fa-trash"></i></a></div></td>
										</tr>';


				 }

				echo json_encode($msg);
			}else{
				$sql ="SELECT * FROM item_master WHERE hospital_id ='".$hospital_id."'";
				$query = $this->db->query($sql);
				$searchdetail =  $query->result();
				$msg ='';
				foreach ($searchdetail as $value) {
					$category = $this->db->get_where("itemcategory_master", array('category_id' => $value->category))->row();
					 $msg.='<tr class="hovertr" style="border-bottom: 1px solid #ccc;">';
					 $msg.='<td class="text-left">'.$value->service_name.'</td>';
					 $msg.='<td class="text-left">'.$category->category_name.'</td>';
					
					 $selected_active = ($value->status == "active") ? "selected='selected'" : "";
					 $selected_inactive = $value->status == "inactive" ? "selected='selected'" : "";
					 $msg.=' <td class="text-left">
                   <div class="btn-group">
                        <select class="btn btn-default form-control" onchange="return call(<?php echo  $value->category_id?>,this.value)">
                            <option value="active" '.$selected.'>Active</option>
                            <option value="inactive" '.$selected_inactive.'>Inactive</option>
                        </select>
                    </div>
                </td>';
					 


					 $msg.='<td class="pt-15"><div class="btn-group" style="float: right;display: flex;"><a href="'.base_url("item_master/edit_item_category/$value->category_id").'" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>';
					$msg.='<a href="'.base_url("item_master/delete_item_category/$value->category_id").'" class="btn btn-xs btn-danger" onclick="return confirm('.display('are_you_sure').')"><i class="fa fa-trash"></i></a></div></td>
										</tr>';


				 }
				echo json_encode($msg);
			}
		}


	
	
	public function edit($user_id = null)
	{

		$data['title'] = "Edit Item Master";
		#-------------------------------#
		$data['category'] = $this->item_master_model->get_category();
		$data['item'] = $this->item_master_model->read_by_id($user_id);

		#-------------------------------#
		$data['content'] = $this->load->view('item_master_form',$data,true);
		$this->load->view('dashboard_doctor/main_wrapper',$data);
	}


	public function delete($user_id = null)
	{
		if ($this->item_master_model->delete($user_id)) {
			#set success message
			$this->session->set_flashdata('message','Item delete successfully');   //display('delete_successfully')
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('item_master');
	}

	public function  delete_billinghistory($id,$patient_id){
		$this->db->where("id",$id);
		$this->db->delete("subscribe");
		$this->session->set_flashdata('message',display('Billing History Delete successfully'));

		$patientDetail 		= $this->db->get_where("patient",array("id"=>$patient_id))->row();
		$userData           = $this->db->get_where("user",array("user_id"=>$this->session->userdata("user_id")))->row();

		if($this->session->userdata('isadmin')==0 ){
			$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('user_id'))->get()->row();
		}else if($this->session->userdata('isadmin')==1){
			$hospital_name = $this->db->select("*")->from("user")->where("user_id",$this->session->userdata('hospital_id'))->get()->row();
		}


		$audit_success = insert_auditdump($this->session->userdata("user_id"),$this->session->userdata("user_role"),"invoice-billing","Delete Billing History - Billing",
                $hospital_name->hospitalname." Hospital Medical Provider ".$userData->firstname.'  '.$userData->lastname." Delete Communication Log of ".$patientDetail->fname." ".$patientDetail->lname ." Patient at ".date("Y-m-d h:i:s"),$this->session->userdata("hospital_id"),$patientDetail->id,$patientDetail->fname." ".$patientDetail->lname,10);

		redirect('dashboard_doctor/invoice/item_master/invoice/'.$patient_id);
	}	

}
