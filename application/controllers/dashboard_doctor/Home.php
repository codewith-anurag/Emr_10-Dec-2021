<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'dashboard_doctor/home_model',
            'dashboard_doctor/patient/patient_model',
      			'dashboard_doctor/patient/document_model',
             'department_model'
        ));

        if ($this->session->userdata('isLogIn') == false
            || $this->session->userdata('user_role') != 2)
            redirect('login');
    }
    public function update_password(){


     //	$this->form_validation->set_rules('password', display('password'),'required');
       if ($this->input->post('password',true) != '') {
         $user_id = $this->session->userdata('user_id');
         $arr['attemt_login'] = '1';
         $arr['password'] = md5($this->input->post('password',true));
         $this->db->where('user_id',$user_id);
         $this->db->update('user',$arr);
         $this->session->set_flashdata('message',display('update_successfully'));
         redirect('dashboard_doctor/home');
       }else{
         redirect('dashboard_doctor/home');
         //http://emr.gthealthsystem.com/dashboard/home
       }

    }
    public function close_login(){


     //	$this->form_validation->set_rules('password', display('password'),'required');

         $user_id = $this->session->userdata('user_id');
         $arr['attemt_login'] = '1';
        // $arr['password'] = md5($this->input->post('password',true));
         $this->db->where('user_id',$user_id);
         $this->db->update('user',$arr);
        // $this->session->set_flashdata('message',display('update_successfully'));
      //   redirect('dashboard_patient/home');
      echo 'success';


    }
    public function attemt_login(){

    $user_id  = $this->session->userdata('user_id');
		$user = $this->db->select('*')->from('user')->where('user_id',$user_id)->get()->row();

   $data['attemt_login'] = $user->attemt_login;
		echo json_encode($data);


		}
    public function index()
    {
      //print_r($_SESSION);
        $data['title'] = display('home');
        $data['notices'] = $this->home_model->notice();
        $data['messages'] = $this->home_model->inbox($this->session->userdata('user_id'));
        $data['patients'] = $this->patient_model->read();
        $data['content'] = $this->load->view('dashboard_doctor/home/dashboard',$data,true);
        $this->load->view('dashboard_doctor/main_wrapper',$data);
    }

    public function profile()
    {
        $data['title'] = display('profile');
        #------------------------------#
        $user_id = $this->session->userdata('user_id');
        $data['user']    = $this->home_model->profile($user_id);
        $data['content'] = $this->load->view('dashboard_doctor/home/profile', $data, true);
        $this->load->view('dashboard_doctor/main_wrapper',$data);
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
      redirect('dashboard_doctor/home/form/');
  }


    public function form()
    {
        $data['title'] = display('edit_profile');
        $user_id = $this->session->userdata('user_id');
        #-------------------------------#
        $this->form_validation->set_rules('firstname', display('first_name') ,'required|max_length[50]');
        $this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');

        $this->form_validation->set_rules('email',display('email'), "required|max_length[50]|valid_email|callback_email_check[$user_id]");

        // $this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');

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
        $role_id ='';
    		if($this->input->post('role',true) != null){
    			$arrrs['name'] = $this->input->post('role',true);
    			$arrrs['status'] = '1';
    			$this->db->insert('role',$arrrs);
    			$role_id = $this->db->insert_id();
    		}else{
    			$role_id=$this->input->post('role_id',true);
    		}
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
            'address'      => trim($this->input->post('address',true)),
            'phone'        => $this->input->post('phone',true),
            'mobile'       => $this->input->post('mobile',true),
            'email'        => $this->input->post('email',true),
            // 'password'     => md5($this->input->post('password',true)),
            'short_biography' => $this->input->post('short_biography',true),
            'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
            'specialist'   => $this->input->post('specialist',true),
            'date_of_birth' => date('Y-m-d', strtotime($this->input->post('date_of_birth',true))),
            'sex'          => $this->input->post('sex',true),
            'blood_group'  => $this->input->post('blood_group',true),
            'back_ground'  => trim($this->input->post('back_ground',true)),
            'degree'       => $this->input->post('degree',true),
            // 'created_by'   => $this->session->userdata('created_by'),
            'create_date'  => date('Y-m-d'),
            // 'status'       => $this->input->post('status',true),
            'role_id' =>$role_id
        ];
        if($this->input->post('password',true)){
          $postData['password'] = md5($this->input->post('password',true));
        }
        #-------------------------------#
        if ($this->form_validation->run() === true) {

            if ($this->home_model->update($postData)) {
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

            redirect('dashboard_doctor/home/form/');

        } else {
            $user_id = $this->session->userdata('user_id');
            $data['department_list'] = $this->home_model->department_list();
            $data['role_list'] = $this->department_model->role_list();
            $data['doctor'] = $this->home_model->profile($user_id);
            $data['content'] = $this->load->view('dashboard_doctor/home/profile_form',$data,true);
            $this->load->view('dashboard_doctor/main_wrapper',$data);
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    function search_patient()
     {
    $p_id = trim($this->input->get_post('p_id'));
    $user_id =$this->session->userdata('user_id');
    $hospital_id = $this->session->userdata('created_by');
       if($p_id!=''){
        // if($this->session->userdata('isadmin')=='0'){
         $sql ="SELECT * FROM patient WHERE (hospital_id ='".$hospital_id."' ) and (patient_id like '%".($p_id)."%' or fname like '%".($p_id)."%' or email like '%".($p_id)."%' or date_of_birth like '%".($p_id)."%') ORDER BY id DESC";

      // }else{
         // $sql ="SELECT * FROM patient WHERE patient_id like '%".($p_id)."%' or fname like '%".($p_id)."%' or email like '%".($p_id)."%' or date_of_birth like '%".($p_id)."%' ORDER BY id DESC";
      // }
         $query = $this->db->query($sql);
          $searchdetail =  $query->result();
          // echo $this->db->last_query();
          if(count($searchdetail)>0){
            foreach ($searchdetail as $value) {
              if($value->sex==''){
                 $value->sex='Male';
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

}
