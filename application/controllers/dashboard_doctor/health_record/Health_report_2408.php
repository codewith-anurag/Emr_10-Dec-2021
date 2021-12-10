<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Health_report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'healthreport_model',
            'department_model',
            'doctor_model',
            'patient_model'
        ));

        if ($this->session->userdata('isLogIn') == false   || $this->session->userdata('user_role') != 2)
        redirect('login');
    }

    public function graph()
    {
      $patient_name = $this->input->get_post('patient_ID');
      $sql = "SELECT * FROM patient where id='$patient_name'";
      $query = $this->db->query($sql);
      $patient_list =  $query->row();
      $vital_datail = $this->db->select('*')->from('pa_vital_sign')->where('patient_id',$patient_name)->order_by('date','ASC')->get()->result();
    //	$tem = array();
      foreach ($vital_datail as  $value) {
        $t[] = $value->temperature;
    $d[] = date('Y-m-d h:i:s A',strtotime($value->date));
    $h[] = $value->heart_rate;
    $bl[] = $value->blood_pressure;
    $rp[] = $value->respiratory_rate;
    $ox[] = $value->oxygen_saturation;
    $height[] = $value->height;
    $weight[] = $value->weight;
    $bmi[] = $value->bmi;
    $pain[] = $value->pain;
    $smoking_status[] = ($value->smoking_status=='yes')?1:0;
    $head_circumference[] = $value->head_circumference;
    $glucose_by_glucometer[] = $value->glucose_by_glucometer;

        //	$value->date;
        //	$d->t_tem=$value->temperature;
      //	$data[] = $d;

        // code...
      }
    //	array_merge($tem,$d);
    //	print_r($d);
    //	exit;
      //$tem = implode(",",$t);
    //	$t_array=explode(",",$tem);
    //	$date = implode(",",$d);
      //echo $tem;
      $data['tem'] = (count($t)!=0)?$t:array(0);
      $data['date'] = (count($d)!=0)?$d:array(0);;
      $data['h'] = (count($h)!=0)?$h:array(0);
      $data['bl'] = (count($bl)!=0)?$bl:array(0);
      $data['rp'] = (count($rp)!=0)?$rp:array(0);
      $data['ox'] = (count($ox)!=0)?$ox:array(0);
      $data['height'] = (count($height)!=0)?$height:array(0);
      $data['weight'] = (count($weight)!=0)?$weight:array(0);
      $data['bmi'] = (count($bmi)!=0)?$bmi:array(0);
      $data['pain'] = (count($pain)!=0)?$pain:array(0);
      $data['smoking_status'] = (count($smoking_status)!=0)?$smoking_status:array(0);
      $data['head_circumference'] = (count($head_circumference)!=0)?$head_circumference:array(0);
      $data['glucose_by_glucometer'] = (count($glucose_by_glucometer)!=0)?$glucose_by_glucometer:array(0);

    //	exit;
      echo json_encode($data);
    }
    public function index()
    {

        $data['title'] = display('doctor_list');

        $data['content'] = $this->load->view('dashboard_doctor/health_record/healthreport',$data,true);
        $this->load->view('dashboard_doctor/main_wrapper',$data);
    }

    public function get_suballergy_healthreport($sub_allergy)
    {
        $allergy_id = $this->input->post("allergy_id");
        $sub_allergy = $this->db->select("*")
                    ->from("allergy_type")
                    ->like("allergy_name",$sub_allergy)
                    ->get()
                    ->result();
                    return $sub_allergy;
        //echo json_encode($sub_allergy);exit;->where("parent_id",$allergy_id)
    }
    public function all_patient()
    {
        // echo $this->session->userdata('isadmin');
        // exit;
        $id = $this->session->userdata('hospital_id');
        $created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
        if($isadmin == 1){
            $id = $created_by_id;
        }

        $sql = " SELECT * FROM patient WHERE  hospital_id='$id'";
        $query = $this->db->query($sql);
        $patient_list =  $query->result();
      //  echo json_encode($patient_list);
        $data['title'] = display('patient_list');
        $data['patients'] = $patient_list;
        $data['content'] = $this->load->view('dashboard_doctor/health_record/healthreport_patientlist',$data,true);
        $this->load->view('dashboard_doctor/main_wrapper',$data);
    }
    public function get_recation_healthreport()
    {
        $suballergy_id  = $this->input->post("suballergy_id");
        $recation   = $this->db->select("*")
                            ->from("reaction_name")

                            ->get()
                            ->result();
        return $recation;
        //echo json_encode($recation)->where("suballergy_id",$suballergy_id);exit;
    }

    public function get_patient_autocomplete()
    {
        $patient = $this->input->post("patient_name");

        $id = $this->session->userdata('hospital_id');
        $created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
        if($isadmin == 1){
            $id = $created_by_id;
        }

        $sql = " SELECT * FROM patient WHERE hospital_id='$id' and (fname LIKE '%$patient%' or lname LIKE '%$patient%') ";
        $query = $this->db->query($sql);
        $patient_list =  $query->result();
        echo json_encode($patient_list);

    }

    public function get_patient_info($value='')
    {
        $patient_ID = $this->input->post("patient_ID");
        $sql = " SELECT * FROM patient WHERE id = '$patient_ID'";
        $query = $this->db->query($sql);
        $patient_list =  $query->row();
        echo json_encode($patient_list);
    }

    public function get_patient_profile()
    {
        $patient_name = $this->input->post("patient_name");
        $sql = "SELECT * FROM patient where id='$patient_name'";
        $query = $this->db->query($sql);
        $patient_list =  $query->row();
        $profile_picture = ($patient_list->picture!=NULL) ? base_url().$patient_list->picture : 'http://emr.gthealthsystem.com/assets/images/health_report/user-img.png';
    $vital_datail = $this->db->select('*')->from('pa_vital_sign')->where('patient_id',$patient_list->id)->order_by('date','DESC')->get()->row();
        $from = new DateTime($patient_list->date_of_birth);
$to   = new DateTime('today');

$insurance_detail = $this->db->select("*")->from("insurance")->where('patient_id',$patient_list->patient_id)->get()->row();
# procedural
        $sess_user = $this->session->userdata('user_id');
        $adminData = $this->db->select("*")->from("user")->where('user_id', $sess_user)->get()->row();
        $features_array = explode(',',$adminData->features);
        //print_r($features_array);exit;
        $growth_chart_style = "style='display:none'";
        if(in_array('growth_charts',$features_array)){
            $growth_chart_style = "style='display:block'";
        }
         $html = "<div class='profile-box'>
                            <div class='row' style='border-bottom:1px solid #ccc;padding:10px 0px;margin:0px -11px;'>
                              <div class='col-lg-2 col-md-2 profile'>
                                <img src=".$profile_picture." alt='Profile Image'>
                              </div>

                              <div class='col-12 col-md-10'>

                                <div class='row'>
                                  <div class='col-12 col-md-11'>
                                    <h3 style='color: #150aec;font-weight: 600;'>".$patient_list->prefix."  ".$patient_list->fname."  ".$patient_list->lname."</h3>
                                  </div>


                                </div>

                                <div class='row'>
                                  <div class='col-12 col-md-5'>
                                    <div class='text-profile'>
                                      <span>Bloodtype : </span><label>".$vital_datail->bloodtype."</label>
                                    </div>
                                  </div>
                                  <div class='col-12 col-md-4'>
                                    <div class='text-profile'>
                                      <span>Height : </span><label>".$vital_datail->height." in</label>
                                    </div>
                                  </div>
                                  <div class='col-12 col-md-3'>
                                    <div class='text-profile'>
                                      <span>Weight : </span><label> ".$vital_datail->weight." lb</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <div class='profile-middle'>
                            <div class='row'>

                              <div class='col-12 col-md-6'>

                                <div class='text-profile mt-15'>

                                  <span>Birthday : </span><label>".date('M d,Y',strtotime($patient_list->date_of_birth))." (".$from->diff($to)->y." y.o.)</label>

                                </div>

                              </div>

                              <div class='col-12 col-md-6'>

                                <div class='text-profile mt-15'>

                                  <span>Address : </span><label>".$patient_list->address1."</label>

                                </div>

                              </div>

                            </div>

                            <div class='row'>

                              <div class='col-12 col-md-6'>

                                <div class='text-profile mt-15'>

                                  <span style='padding-right:14px;'>Phone : </span><label> "."+  ".$patient_list->mobile_prefix." ".$patient_list->mobile."</label>

                                </div>

                              </div>

                              <div class='col-12 col-md-6'>

                                <div class='text-profile mt-15'>

                                  <span style='padding-right:18px;'>Email : </span><label> ".$patient_list->email."</label>

                                </div>

                              </div>

                            </div>

                            <div class='row'>

                              <div class='col-12 col-md-6'>

                                <div class='text-profile mt-15'>

                                  <span style='padding-right:18px;'>Policy Number / Insurance Id: </span><label> ".$insurance_detail->insurance_id."</label>

                                </div>

                              </div>

                            </div>
                            </div>
                        </div>";
                        $temperature ="";
                        $st ="";
                         if($vital_datail->temperature >= 97 and $vital_datail->temperature <= 99){
                             $temperature = "Normal";
                             $st = "check-details-normal";

                        }else if($vital_datail->temperature >= 99 and $vital_datail->temperature <= 100){
                          $temperature = "High";
                          $st = "check-details-high";
                        }else if($vital_datail->temperature <= 97){
                          $temperature = "Low";
                          $st = "check-details-low";
                        }
                        $heartrate ="";
                        $hr="";
                         if($vital_datail->heart_rate >= 60 and $vital_datail->heart_rate <= 100){
                             $heartrate = "Normal";
                             $hr = "check-details-normal";

                        }else if($vital_datail->heart_rate >= 100){
                          $heartrate = "High";
                          $hr = "check-details-high";
                        }else if($vital_datail->heart_rate <= 60){
                          $heartrate = "Low";
                          $hr = "check-details-low";
                        }
                        $blood_pressure ="";
                        $bl ="";
                         if($vital_datail->blood_pressure >= 60 and $vital_datail->blood_pressure <= 120){
                             $blood_pressure = "Normal";
                             $bl = "check-details-normal";

                        }else if($vital_datail->blood_pressure >= 120 and $vital_datail->blood_pressure <= 139){
                          $blood_pressure = "High";
                          $bl = "check-details-high";
                        }else if($vital_datail->blood_pressure <= 60){
                          $blood_pressure = "Low";
                          $bl = "check-details-low";
                        }
                        $respiratory_rate ="";
                        $re ="";
                         if($vital_datail->respiratory_rate >= 12 and $vital_datail->respiratory_rate <= 16){
                             $respiratory_rate = "Normal";
                             $re = "check-details-normal";

                        }else if($vital_datail->respiratory_rate >= 16 ){
                          $respiratory_rate = "High";
                          $re = "check-details-high";
                        }else if($vital_datail->respiratory_rate <= 12){
                          $respiratory_rate = "Low";
                          $re = "check-details-low";
                        }
                        $oxygen_saturation ="";
                        $ox ="";
                         if($vital_datail->oxygen_saturation >= 95 and $vital_datail->oxygen_saturation <= 100){
                             $oxygen_saturation = "Normal";
                             $ox = "check-details-normal";

                        }else if($vital_datail->oxygen_saturation >= 100 ){
                          $oxygen_saturation = "High";
                          $ox = "check-details-high";
                        }else if($vital_datail->oxygen_saturation <= 95){
                          $oxygen_saturation = "Low";
                          $ox = "check-details-low";
                        }
                        $height ="";
                        $he ="";
                         if($vital_datail->height == 69){
                             $height = "Normal";
                             $he = "check-details-normal";

                        }else if($vital_datail->height >= 69 ){
                          $height = "High";
                          $he = "check-details-high";
                        }else if($vital_datail->height <= 69){
                          $height = "Low";
                          $he = "check-details-low";
                        }
                        $weight ="";
                        $we ="";
                         if($vital_datail->weight >= 89 and $vital_datail->weight <= 90){
                             $weight = "Normal";
                             $we = "check-details-normal";

                        }else if($vital_datail->weight >= 91 ){
                          $weight = "High";
                          $we = "check-details-high";
                        }else if($vital_datail->weight <= 88){
                          $weight = "Low";
                          $we = "check-details-low";
                        }
                        $bmi ="";
                        $bm ="";
                        if($vital_datail->bmi <= 19){
                              $bmi = "Underweight";
                              $bm = "check-details-normal";

                         }else if($vital_datail->bmi >= 19  and $vital_datail->bmi <= 25){
                             $bmi = "Normal";
                             $bm = "check-details-normal";

                        }else if($vital_datail->bmi >= 25  and $vital_datail->bmi <= 30){
                          $bmi = "Over weight";
                          $bm = "check-details-high";
                        }else if($vital_datail->bmi >= 30){
                          $bmi = "Obese";
                          $bm = "check-details-high";
                        }
                        $pain ="";
                        $pa ="";
                         if($vital_datail->pain >= 1  and $vital_datail->pain <= 3){
                             $pain = "Mild";
                             $pa = "check-details-normal";

                        }else if($vital_datail->pain >= 4  and $vital_datail->pain <= 7){
                          $pain = "Moderate";
                          $pa = "check-details-high";
                        }else if($vital_datail->pain >= 8  and $vital_datail->pain <= 10){
                          $pain = "Severe";
                          $pa = "check-details-high";
                        }
                        $glucose_by_glucometer ="";
                        $gl ="";
                         if($vital_datail->glucose_by_glucometer == 140){
                             $glucose_by_glucometer = "Normal";
                             $gl = "check-details-normal";

                        }else if($vital_datail->glucose_by_glucometer >= 140 ){
                          $glucose_by_glucometer = "High";
                          $gl = "check-details-high";
                        }else if($vital_datail->glucose_by_glucometer <= 140 ){
                          $glucose_by_glucometer = "Low";
                          $gl = "check-details-high";
                        }
                    echo $html.='</section>
                    <div class="row mt-15" '.$growth_chart_style.'>

                      <div class="col-xl-3 col-lg-3 pl-30">

                        <div class="card-box overflow-hidden">

                          <div class="card-body pb-0">

                            <div class="dis-flex jusify-space">

                              <h2 class="fs-2 mb-2">Temperature(°F)</h2>

                              <span class="'.$st.'">'.$temperature.'</span>

                            </div>

                            <p class="mb-1" style="color:#528be7">'.$vital_datail->temperature. ' degree</p>

                            <div class="chart-wrapper mt-3">

                              <canvas id="AreaChart4" class="h-8"></canvas>

                            </div>

                          </div>

                        </div>

                      </div>

                      <div class="col-xl-3 col-lg-3">

                        <div class="card-box overflow-hidden">

                          <div class="card-body pb-0">

                            <div class="dis-flex jusify-space">

                              <h2 class="fs-2 mb-2">Heart Rate /Pulse (bpm)</h2>

                              <span class="'.$hr.'">'.$heartrate.'</span>

                            </div>

                            <p class="mb-1" style="color:#528be7"> '.$vital_datail->heart_rate.' bpm</p>

                            <div class="chart-wrapper mt-3">

                              <canvas id="AreaChart5" class="h-8"></canvas>

                            </div>

                          </div>

                        </div>

                      </div>

                      <div class="col-xl-3 col-lg-3">

                        <div class="card-box bg-gradient-secondary overflow-hidden">

                          <div class="card-body pb-0">

                            <div class="dis-flex jusify-space">

                              <h2 class="fs-2 mb-2">Blood Pressure (mmHg)</h2>

                            <span class="'.$bl.'">'.$blood_pressure.'</span>

                            </div>

                            <p class="mb-1" style="color:#528be7">'.$vital_datail->blood_pressure.' mmHg</p>

                            <div class="chart-wrapper mt-3">

                              <canvas id="AreaChart6" class="h-8"></canvas>

                            </div>

                          </div>

                        </div>

                      </div>

                      <div class="col-xl-3 col-lg-3 pr-30">

                        <div class="card-box overflow-hidden">

                          <div class="card-body pb-0">

                            <div class="dis-flex jusify-space">

                              <h2 class="fs-2 mb-2">Respiratory Rate (rpm)</h2>

                              <span class="'.$re.'">'.$respiratory_rate.'</span>

                            </div>

                            <p class="mb-1" style="color:#528be7">'.$vital_datail->respiratory_rate.' rpm</p>

                            <div class="chart-wrapper mt-3">

                              <canvas id="AreaChart7" class="h-8"></canvas>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>
                    <div class="row" '.$growth_chart_style.'>

                      <div class="col-xl-3 col-lg-3 pl-30">

                        <div class="card-box overflow-hidden">

                          <div class="card-body pb-0">

                            <div class="dis-flex jusify-space">

                              <h2 class="fs-2 mb-2">Oxygen Saturation (%)</h2>

                            <span class="'.$ox.'">'.$oxygen_saturation.'</span>

                            </div>

                            <p class="mb-1" style="color:#528be7">'.$vital_datail->oxygen_saturation. '%</p>

                            <div class="chart-wrapper mt-3">

                              <canvas id="AreaChart8" class="h-8"></canvas>

                            </div>

                          </div>

                        </div>

                      </div>

                      <div class="col-xl-3 col-lg-3">

                        <div class="card-box overflow-hidden">

                          <div class="card-body pb-0">

                            <div class="dis-flex jusify-space">

                              <h2 class="fs-2 mb-2">Height (in)</h2>

                              <span class="'.$he.'">'.$height.'</span>

                            </div>

                            <p class="mb-1" style="color:#528be7"> '.$vital_datail->height.' in</p>

                            <div class="chart-wrapper mt-3">

                              <canvas id="AreaChart9" class="h-8"></canvas>

                            </div>

                          </div>

                        </div>

                      </div>

                      <div class="col-xl-3 col-lg-3">

                        <div class="card-box bg-gradient-secondary overflow-hidden">

                          <div class="card-body pb-0">

                            <div class="dis-flex jusify-space">

                              <h2 class="fs-2 mb-2">Weight (lbs)</h2>

                              <span class="'.$we.'">'.$weight.'</span>

                            </div>

                            <p class="mb-1" style="color:#528be7">'.$vital_datail->weight.' lbs</p>

                            <div class="chart-wrapper mt-3">

                              <canvas id="AreaChart10" class="h-8"></canvas>

                            </div>

                          </div>

                        </div>

                      </div>

                      <div class="col-xl-3 col-lg-3 pr-30">

                        <div class="card-box overflow-hidden">

                          <div class="card-body pb-0">

                            <div class="dis-flex jusify-space">

                              <h2 class="fs-2 mb-2">BMI (kg/m2)</h2>

                              <span class="'.$bm.'">'.$bmi.'</span>

                            </div>

                            <p class="mb-1" style="color:#528be7">'.$vital_datail->bmi.' kg/m2</p>

                            <div class="chart-wrapper mt-3">

                              <canvas id="AreaChart11" class="h-8"></canvas>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>
                    <div class="row" '.$growth_chart_style.'>

                      <div class="col-xl-3 col-lg-3 pl-30">

                        <div class="card-box overflow-hidden">

                          <div class="card-body pb-0">

                            <div class="dis-flex jusify-space">

                              <h2 class="fs-2 mb-2">Pain (1-10) </h2>

                            <span class="'.$pa.'">'.$pain.'</span>

                            </div>

                            <p class="mb-1" style="color:#528be7">'.$vital_datail->pain.'</p>

                            <div class="chart-wrapper mt-3">

                              <canvas id="AreaChart12" class="h-8"></canvas>

                            </div>

                          </div>

                        </div>

                      </div>





                      <div class="col-xl-3 col-lg-3 pr-30">

                        <div class="card-box overflow-hidden">

                          <div class="card-body pb-0">

                            <div class="dis-flex jusify-space">

                              <h2 class="fs-2 mb-2">Glucose by Glucometer</h2>

                              <span class="'.$gl.'">'.$glucose_by_glucometer.'</span>

                            </div>

                            <p class="mb-1" style="color:#528be7">'.$vital_datail->glucose_by_glucometer.'</p>

                            <div class="chart-wrapper mt-3">

                              <canvas id="AreaChart15" class="h-8"></canvas>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>';
    }
    public function get_problem_allergies() {

        $patient_name = $this->input->post("patient_name");
        $sql = "SELECT * FROM healthreport_problem where patient_id='$patient_name' order by date desc";
        $query = $this->db->query($sql);
        $patient_list =  $query->result();

    //  $status = ($patient_list->status==1)?'Active':'Inactive';
    $msg = "";
    $p_id="0";
    $p_date="0";
    foreach ($patient_list as $value) {
        //$problem_name = $this->db->select("*")->from("health_problem")->where("problem_id",$value->problem_id)->get()->row();
        //$icd_code = $this->db->select("*")->from("icd_version")->where("icd_id",$value->icd_version_id)->get()->row();
        // code...

        $msg .= '<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                                    <td>'.$value->problem_id.'</td>

                                    <td>'.$value->icd_version_id.'</td>

                                    <td>'.$value->icd10_code.'</td>

                                    <td>'.$value->snomed_ct_code.'</td>

                                    <td>'.date('Y-m-d H:i', strtotime($value->diagnosis_datetime)).'</td>

                                    <td>'.date('Y-m-d H:i', strtotime($value->changed_datetime)).'</td>

                                    <td>'.$value->status.'</td>

                                    <td>'.$value->notes.'</td>
                                    <td>'.date('Y-m-d h:i:s A', strtotime($value->date)).'</td>
                                    <td>

                                      <div style="float: right;" class="btn-group">
                                        <a href="'.base_url().'dashboard_doctor/health_record/health_report/problemreport_print/healthreport_problem/'.$value->id.'" target="_blank" class="btn btn-xs icon-box"><i class="fa fa-print"></i></a>
                                      <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital(' . $value->id . ','.$p_id.','.$p_date.')"><i class="fa fa-edit"></i></a>

                                        <a href="#" onClick="remove_problem('.$value->id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                      </div>

                                    </td>

                                  </tr>';
            }
        echo $msg;
    }

    public function calculate_bmi()
    {
        $weight = $this->input->post("weight");
        $height = $this->input->post("height");
        if($weight !="" && $height!=""){
            $kgweight  = $weight / 2.2046;
            $meterheight = $height / 39.370;

            $heightsquar = pow($meterheight,2);

            $BMI = $kgweight / $heightsquar;
            echo round($BMI, 2);
        }else{
            echo "";
        }

        //$BMI = ($weight / $heightsquar)*703;

    }
    public function remove_problem()    {

        $patient_name = $this->input->post("patient_name");
            $patient_id = $this->input->post("patient_id");
          $this->db->where('id',$patient_name);
            $this->db->delete('healthreport_problem');
            echo $patient_id;
    }
    public function remove_allergies()  {
      //Allergy List
            $patient_name = $this->input->post("patient_name");
            $patient_id = $this->input->post("patient_id");
            $this->db->where('id',$patient_name);
            $this->db->delete('healthreport_allergies');
            echo $patient_id;
    }
        public function get_allergies() {

        $patient_name = $this->input->post("patient_name");
        $sql = "SELECT * FROM healthreport_allergies where patient_id='$patient_name' ORDER BY date DESC";
        $query = $this->db->query($sql);
        $patient_list =  $query->result();
        $msg = "";
        $p_id="0";
        $p_date="0";
        foreach ($patient_list as $value) {
        //$parent_allergy = $this->db->select("*")->from("allergy_type")->where("allergy_id",$value->allergy_type)->get()->row();
        //$child_allergy = $this->db->select("*")->from("allergy_type")->where("allergy_id",$value->drug_allergy)->get()->row();
        //$reaction= $this->db->select("*")->from("reaction_name")->where("reaction_id",$value->reaction)->get()->row();
    //  $status = ($patient_list->status==1)?'Active':'Inactive';
        $msg .='<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                                    <td>'.$value->allergy_type.' : '.$value->drug_allergy.'</td>

                                    <td>'.$value->reaction.'</td>

                                    <td>'.$value->severity.'</td>

                                    <td>'.$value->status.'</td>

                                    <td>'.$value->notes.'</td>
                                    <td>'.date('Y-m-d h:i:s A', strtotime($value->date)).'</td>

                                    <td>

                                      <div style="float: right;" class="btn-group">
                                            <a href="'.base_url().'dashboard_doctor/health_record/health_report/allergyreport_print/'.$value->id.'" target="_blank" class="btn btn-xs icon-box"><i class="fa fa-print"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital(' . $value->id . ','.$p_id.','.$p_date.')"><i class="fa fa-edit"></i></a>
                                        <a href="#" onClick="remove_allergies('.$value->id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                      </div>

                                    </td>

                                  </tr>';
                                                                }
                                                                echo $msg;
    }
    public function get_lab_result()    {

    $patient_name = $this->input->post("patient_name");
    $sql = "SELECT * FROM lab_result where patient_id='$patient_name' order by date desc";
    $query = $this->db->query($sql);
    $patient_list =  $query->result();
    $msg = "";
    $p_id="0";
    $p_date="0";
    foreach ($patient_list as $value) {

    //  $status = ($patient_list->status==1)?'Active':'Inactive';
                                            $msg .='<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                                                <td>'.$value->loinc_code.'</td>

                                                <td>'.$value->description.'</td>

                                                <td>'.$value->result_value.'</td>

                                                <td>'.$value->units.'</td>

                                                <td>'.$value->normal_range.'</td>

                                                <td>'.$value->abnormal_flag.'</td>
                                                <td>'.date('Y-m-d h:i:s A', strtotime($value->date)).'</td>
                                                <td>
                                                    <div style="float: right;" class="btn-group">
                                                        <a href="'.base_url().'dashboard_doctor/health_record/health_report/labreport_print/'.$value->loinc_code_id.'" target="_blank" target="_blank"  class="btn btn-xs icon-box"><i class="fa fa-print"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital(' . $value->loinc_code_id . ','.$p_id.','.$p_date.')"><i class="fa fa-edit"></i></a>

                                                        <a href="#" onClick="remove_labresult('.$value->loinc_code_id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>

                                        </tr>';
                                    }
                                    echo $msg;
    }
    public function get_vitalsign() {
        $this->session->unset_userdata('healthrecord_ids');
    $patient_name = $this->input->post("patient_name");
    $sql = "SELECT * FROM pa_vital_sign where patient_id='$patient_name' ORDER BY date DESC";
    $query = $this->db->query($sql);
    $patient_list =  $query->result();
    $msg = "";
    $p_id="0";
    $p_date="0";
    foreach ($patient_list as $value) {

    //  $status = ($patient_list->status==1)?'Active':'Inactive';
                $msg .='<tr class="hovertr" style="border-bottom:1px solid #ddd ;">
                    <td>'.$value->temperature.' degree</td>
                    <td>'.$value->heart_rate.'  </td>
                    <td>'.$value->blood_pressure.'  </td>
                    <td>'.$value->respiratory_rate.'</td>
                    <td>'.$value->oxygen_saturation.'</td>
                    <td>'.$value->height.'</td>
                    <td>'.$value->weight.'</td>
                    <td>'.$value->bmi.'</td>
                    <td>'.$value->pain.'</td>
                    <td>'.$value->smoking_status.'</td>
                    <td>'.$value->head_circumference.'</td>
                    <td>'.$value->glucose_by_glucometer.'</td>
                    <td>'.date('Y-m-d h:i:s A',strtotime($value->date)).'</td>
                    <td>
                        <div style="float: right;" class="btn-group">
                        <a href="'.base_url().'dashboard_doctor/health_record/health_report/report_print/pa_vital_sign/'.$value->id.'" target="_blank"  class="btn btn-xs icon-box"><i class="fa fa-print"></i></a>
                            <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital('.$value->id.','.$p_id.','.$p_date.')" class="btn btn-xs icon-box"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" onClick="remove_vital('.$value->id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>';
        }
        echo $msg;
    }
    function report_print($table,$id)
    {
        //echo $table;
    //  echo $id;
    //  exit;
        $this->load->library('dompdf_gen');
        $customPaper = array(0,0,1024,1000);
$this->dompdf->set_paper($customPaper);
    //  $this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
    $patient = $this->db->select("*")->from($table)->where("id",$id)->get()->row();
    $patient_name = $this->db->select("*")->from("patient")->where("id",$patient->patient_id)->get()->row();
        $pdfname = "Patient" . date('YmdHis') . '.pdf';
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
            <h3 style="text-align:center;">Health Report For Vital Sign </h3>
                        <p>Patient Name :'.$patient_name->fname.' '.$patient_name->lname.'</p>
                        <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
                                 <tr>
                                        <th>Temperature</th>
                                        <th>Respiratory Rate</th>
                                        <th>Weight</th>
                                        <th>Smoking Status</th>
                                        <th>Heart Rate</th>
                                        <th>Oxygen Saturation</th>
                                        <th>Bmi</th>
                                        <th>Head Circumference</th>
                                        <th>Blood Pressure</th>
                                        <th>Height</th>
                                        <th>Pain</th>
                                        <th>Glucose By Glucometer</th>
                                        <th>Bloodtype</th>
                                </tr>';
                            //$doctors =    $this->doctor_model->read();
                        //$patients =   $this->patient_model->read();
                //      $patient = $this->db->select("*")->from($table)->where("id",$id)->get()->row();
                    //  echo $this->db->last_query();
                    //  exit;
//foreach ($patients as $patient) {
//$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
                                $html .='<tr>
                                        <td width="10%" style="padding: 5px;">'.$patient->temperature.'</td><td style="padding: 5px;">'.$patient->respiratory_rate.'</td>

                                        <td style="padding: 5px;">'.$patient->weight.'</td><td style="padding: 5px;">'.$patient->smoking_status.'</td>
                                        <td align="left" style="width:16%;padding: 5px;">'.$patient->heart_rate.'
                                        </td>
                                        <td width="12%" style="padding: 5px;">'.$patient->oxygen_saturation.'</td>';

                                        $html .='<td style="padding: 5px;">'.$patient->bmi.'</td>';

                                            $html .='<td style="padding: 5px;">'.$patient->head_circumference.'</td>';


                                            $html .='<td style="padding: 5px;">'.$patient->blood_pressure.'</td>';


                                            $html .='<td style="padding: 5px;">'.$patient->height.'</td>';

                                        $html .='<td style="padding: 5px;">'.$patient->pain.'</td>';
                                        $html .='<td style="padding: 5px;">'.$patient->glucose_by_glucometer.'</td>';
                                        $html .='<td style="padding: 5px;">'.$patient->bloodtype.'</td>';
                                $html .='</tr>';
                    //  }

                        $html .='</table>';
                    // echo $html;
                    //  exit;
$this->dompdf->load_html($html);
        $this->dompdf->render();
        $output = $this->dompdf->output();
        //print_r($output);
        file_put_contents('pdf/' . $pdfname . '', $output);
        redirect('pdf/' . $pdfname . '', $output);
    }
    function problemreport_print($table,$id)
    {
        //echo $table;
    //  echo $id;
    //  exit;
        $this->load->library('dompdf_gen');
        $customPaper = array(0,0,1024,1000);
$this->dompdf->set_paper($customPaper);
$patient = $this->db->select("*")->from("healthreport_problem")->where("id",$id)->get()->row();
$patient_name = $this->db->select("*")->from("patient")->where("id",$patient->patient_id)->get()->row();
    //  $this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
        $pdfname = "Patient" . date('YmdHis') . '.pdf';
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
                        <h3 style="text-align:center;">Health Report For Problem</h3>
                        <p>Patient Name :'.$patient_name->fname.' '.$patient_name->lname.'</p>
                        <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
                                 <tr>
                                        <th>Problem</th>
                                        <th>Icd version</th>
                                        <th>Icd10 Code</th>
                                        <th>Snomed Ct Code</th>
                                        <th>Status</th>
                                        <th>Diagnosis Datetime</th>
                                        <th>Onset Datetime</th>
                                        <th>Changed Datetime</th>
                                        <th>Notes</th>

                                </tr>';
                            //$doctors =    $this->doctor_model->read();
                        //$patients =   $this->patient_model->read();
                        $patient = $this->db->select("*")->from("healthreport_problem")->where("id",$id)->get()->row();
                        $problem = $this->db->select("*")->from("health_problem")->where("problem_id",$patient->problem_id)->get()->row();
                        $icd_version = $this->db->select("*")->from("icd_version")->where("icd_id",$patient->icd_version_id)->get()->row();
                    //  echo $this->db->last_query();
                    //  exit;
//foreach ($patients as $patient) {
//$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
                                $html .='<tr>
                                        <td width="10%" style="padding: 5px;">'.$problem->problem_name.'</td><td style="padding: 5px;">'.$icd_version->icd_name.'</td>

                                        <td style="padding: 5px;">'.$patient->icd10_code.'</td><td style="padding: 5px;">'.$patient->snomed_ct_code.'</td>
                                        <td align="left" style="width:16%;padding: 5px;">'.$patient->status.'
                                        </td>
                                        <td width="12%" style="padding: 5px;">'.$patient->diagnosis_datetime.'</td>';

                                        $html .='<td style="padding: 5px;">'.$patient->onset_datetime.'</td>';

                                            $html .='<td style="padding: 5px;">'.$patient->changed_datetime.'</td>';





                                            $html .='<td style="padding: 5px;">'.$patient->notes.'</td>';


                                $html .='</tr>';
                    //  }

                        $html .='</table>';
                    // echo $html;
                    //  exit;
$this->dompdf->load_html($html);
        $this->dompdf->render();
        $output = $this->dompdf->output();
        //print_r($output);
        file_put_contents('pdf/' . $pdfname . '', $output);
        redirect('pdf/' . $pdfname . '', $output);
    }
    function allergyreport_print($id)
    {
        //echo $table;
    //  echo $id;
    //  exit;
        $this->load->library('dompdf_gen');
        $customPaper = array(0,0,1024,1000);
$this->dompdf->set_paper($customPaper);
$patient = $this->db->select("*")->from("healthreport_allergies")->where("id",$id)->get()->row();
$patient_name = $this->db->select("*")->from("patient")->where("id",$patient->patient_id)->get()->row();
    //  $this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
        $pdfname = "Patient" . date('YmdHis') . '.pdf';
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
                        <h3 style="text-align:center;">Health Report For Allergy</h3>
                        <p>Patient Name :'.$patient_name->fname.' '.$patient_name->lname.'</p>
                        <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
                                 <tr>
                                        <th>Allergy Type</th>
                                        <th>Drug Allergy</th>
                                        <th>Reaction</th>
                                        <th>Severity</th>
                                        <th>Status</th>
                                        <th>Notes</th>


                                </tr>';
                            //$doctors =    $this->doctor_model->read();
                        //$patients =   $this->patient_model->read();

                        $allergy_type = $this->db->select("*")->from("allergy_type")->where("allergy_id",$patient->drug_allergy)->get()->row();
                        $icd_version = $this->db->select("*")->from("icd_version")->where("icd_id",$patient->icd_version_id)->get()->row();
                    //  echo $this->db->last_query();
                    //  exit;
//foreach ($patients as $patient) {
//$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
                                $html .='<tr>
                                        <td width="10%" style="padding: 5px;">'.$patient->allergy_type.'</td><td style="padding: 5px;">'.$allergy_type->allergy_name.'</td>

                                        <td style="padding: 5px;">'.$patient->reaction.'</td><td style="padding: 5px;">'.$patient->severity.'</td>
                                        <td align="left" style="width:16%;padding: 5px;">'.$patient->status.'
                                        </td>
                                        <td width="12%" style="padding: 5px;">'.$patient->notes.'</td>';




                                $html .='</tr>';
                    //  }

                        $html .='</table>';
                    // echo $html;
                    //  exit;
$this->dompdf->load_html($html);
        $this->dompdf->render();
        $output = $this->dompdf->output();
        //print_r($output);
        file_put_contents('pdf/' . $pdfname . '', $output);
        redirect('pdf/' . $pdfname . '', $output);
    }
    function imagingreport_print($id)
    {
        //echo $table;
    //  echo $id;
    //  exit;
        $this->load->library('dompdf_gen');
        $customPaper = array(0,0,1024,1000);
$this->dompdf->set_paper($customPaper);
$patient = $this->db->select("*")->from("imaging_order")->where("imaging_order_id",$id)->get()->row();
$patient_name = $this->db->select("*")->from("patient")->where("id",$patient->patient_id)->get()->row();
    //  $this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
        $pdfname = "Patient" . date('YmdHis') . '.pdf';
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
                        <h3 style="text-align:center;">Health Report For Imaging Order</h3>
                        <p>Patient Name :'.$patient_name->fname.' '.$patient_name->lname.'</p>
                        <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
                                 <tr>
                                        <th>Cpt Code</th>
                                        <th>Description</th>
                                        <th>Order Status</th>
                                        <th>Doctor Comments</th>



                                </tr>';
                            //$doctors =    $this->doctor_model->read();
                        //$patients =   $this->patient_model->read();

                        $cpt_code = $this->db->select("*")->from("cpt_code")->where("cpt_id",$patient->cpt_code)->get()->row();

                    //  echo $this->db->last_query();
                    //  exit;
//foreach ($patients as $patient) {
//$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
                                $html .='<tr>
                                        <td width="10%" style="padding: 5px;">'.$cpt_code->cpt_code.'</td><td style="padding: 5px;">'.$patient->description.'</td>

                                        <td style="padding: 5px;">'.$patient->order_status.'</td><td style="padding: 5px;">'.$patient->doctor_comments.'</td>';




                                $html .='</tr>';
                    //  }

                        $html .='</table>';
                    // echo $html;
                    //  exit;
$this->dompdf->load_html($html);
        $this->dompdf->render();
        $output = $this->dompdf->output();
        //print_r($output);
        file_put_contents('pdf/' . $pdfname . '', $output);
        redirect('pdf/' . $pdfname . '', $output);
    }
    function eprescription_print($id)
    {
        //echo $table;
    //  echo $id;
    //  exit;
        $this->load->library('dompdf_gen');
        $customPaper = array(0,0,1024,1000);
$this->dompdf->set_paper($customPaper);
$patient = $this->db->select("*")->from("e_prescription")->where("e_prescription_id",$id)->get()->row();
$patient_name = $this->db->select("*")->from("patient")->where("id",$patient->patient_id)->get()->row();
    //  $this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
        $pdfname = "Patient" . date('YmdHis') . '.pdf';
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
                        <h3 style="text-align:center;">Health Report For Imaging Order</h3>
                        <p>Patient Name :'.$patient_name->fname.' '.$patient_name->lname.'</p>
                        <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
                                 <tr>
                                        <th>Drug Name</th>
                                        <th>Sig</th>
                                        <th>Datetime Stopped Taking</th>
                                        <th>Number Refills</th>
                                        <th>Pharmacy Note</th>
                                        <th>Notes</th>
                                        <th>Prn</th>
                                        <th>Indication</th>
                                        <th>Datetime Prescribed</th>
                                        <th>Dispense Quantity</th>
                                        <th>Daw</th>
                                        <th>Order Status</th>
                                        <th>Sig Note</th>
                                        <th>Status</th>
                                        <th>Datetime Started Taking</th>
                                        <th>Dispense Package</th>
                                        <th>Date</th>



                                </tr>';
                            //$doctors =    $this->doctor_model->read();
                        //$patients =   $this->patient_model->read();

                        $drug_name = $this->db->select("*")->from("drug")->where("drug_id",$patient->drug_name)->get()->row();

                    //  echo $this->db->last_query();
                    //  exit;
//foreach ($patients as $patient) {
//$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
                                $html .='<tr>
                                        <td width="10%" style="padding: 5px;">'.$drug_name->drug_name.'</td><td style="padding: 5px;">'.$patient->sig.'</td>

                                        <td style="padding: 5px;">'.$patient->datetime_stopped_taking.'</td>

                                        <td style="padding: 5px;">'.$patient->number_refills.'</td>';
$html .='<td style="padding: 5px;">'.$patient->pharmacy_note.'</td>';
$html .='<td style="padding: 5px;">'.$patient->notes.'</td>';
$html .='<td style="padding: 5px;">'.$patient->prn.'</td>';
$html .='<td style="padding: 5px;">'.$patient->indication.'</td>';
$html .='<td style="padding: 5px;">'.$patient->datetime_prescribed.'</td>';
$html .='<td style="padding: 5px;">'.$patient->dispense_quantity.'</td>';
$html .='<td style="padding: 5px;">'.$patient->daw.'</td>';
$html .='<td style="padding: 5px;">'.$patient->order_status.'</td>';
$html .='<td style="padding: 5px;">'.$patient->sig_note.'</td>';
$html .='<td style="padding: 5px;">'.$patient->status.'</td>';
$html .='<td style="padding: 5px;">'.$patient->datetime_started_taking.'</td>';
$html .='<td style="padding: 5px;">'.$patient->dispense_package.'</td>';
$html .='<td style="padding: 5px;">'.$patient->date.'</td>';



                                $html .='</tr>';
                    //  }

                        $html .='</table>';
                    // echo $html;
                    //  exit;
$this->dompdf->load_html($html);
        $this->dompdf->render();
        $output = $this->dompdf->output();
        //print_r($output);
        file_put_contents('pdf/' . $pdfname . '', $output);
        redirect('pdf/' . $pdfname . '', $output);
    }
    function recordvaccination_print($id)
    {
        //echo $table;
    //  echo $id;
    //  exit;
        $this->load->library('dompdf_gen');
        $customPaper = array(0,0,1024,1000);
$this->dompdf->set_paper($customPaper);
$patient = $this->db->select("*")->from("healthreport_recordvaccinations")->where("id",$id)->get()->row();
$patient_name = $this->db->select("*")->from("patient")->where("id",$patient->patient_id)->get()->row();

    //  $this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
        $pdfname = "Patient" . date('YmdHis') . '.pdf';
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
                        <h3 style="text-align:center;">Health Report For Record Vaccinations</h3>
                        <p>Patient Name :'.$patient_name->fname.' '.$patient_name->lname.'</p>
                        <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;margin-left:-30px;">
                                 <tr>

                                        <th>Create <br> Record For</th>
                                        <th>Cvx Code</th>
                                        <th>Name</th>
                                        <th>Cpt Code</th>
                                        <th>manfacturer</th>
                                        <th>Expiration <br> Date</th>
                                        <th>Lot No.</th>
                                        <th>Administered <br> Amount</th>
                                        <th>Vacci <br> Route</th>
                                        <th>Vacci <br> Site</th>
                                        <th>Vacci <br> Status</th>
                                        <th>Administered <br> On</th>
                                        <th>Order <br> Dr</th>
                                        <th>Administered <br> By</th>
                                        <th>Administered <br> At</th>
                                        <th>Invent <br> Lot</th>
                                        <th>Record <br> Type</th>
                                        <th>Fund <br> Elig</th>
                                        <th>Observ <br> Immu</th>
                                        <th>Record <br> vaccination <br> Notes</th>
                                        <th>Administered <br> Units</th>



                                </tr>';
                            //$doctors =    $this->doctor_model->read();
                        //$patients =   $this->patient_model->read();

                        $create_record_for = $this->db->select("*")->from("patient")->where("id",$patient->create_record_for)->get()->row();
                        $manufacture = $this->db->select("*")->from("manufacture")->where("manufacture_id",$patient->manfacturer)->get()->row();

                    //  echo $this->db->last_query();
                    //  exit;
//foreach ($patients as $patient) {
//$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
                                $html .='<tr>
                                        <td width="10%" style="padding: 5px;">'.$create_record_for->fname.' '.$create_record_for->lname.'</td>

                                        <td style="padding: 5px;">'.$patient->cvxcode.'</td>

                                        <td style="padding: 5px;">'.$patient->name.'</td>';
$html .='<td style="padding: 5px;">'.$patient->cpt_code.'</td>';
$html .='<td style="padding: 5px;">'.$manufacture->manufacture.'</td>';
$html .='<td style="padding: 5px;">'.$patient->expirationdate.'</td>';
$html .='<td style="padding: 5px;">'.$patient->lot_num.'</td>';
$html .='<td style="padding: 5px;">'.$patient->administered_amount.'</td>';
$html .='<td style="padding: 5px;">'.$patient->vaccinate_route.'</td>';
$html .='<td style="padding: 5px;">'.$patient->vaccinate_site.'</td>';
$html .='<td style="padding: 5px;">'.$patient->vaccinate_status.'</td>';
$html .='<td style="padding: 5px;">'.$patient->administred_on.'</td>';
$html .='<td style="padding: 5px;">'.$patient->ordering_doctor.'</td>';
$html .='<td style="padding: 5px;">'.$patient->administered_by.'</td>';
$html .='<td style="padding: 5px;">'.$patient->administered_at.'</td>';
$html .='<td style="padding: 5px;">'.$patient->inventory_lot.'</td>';
$html .='<td style="padding: 5px;">'.$patient->record_type.'</td>';
$html .='<td style="padding: 5px;">'.$patient->funding_eligibility.'</td>';
$html .='<td style="padding: 5px;">'.$patient->observed_immunity.'</td>';
$html .='<td style="padding: 5px;">'.$patient->record_vaccination_notes.'</td>';
$html .='<td style="padding: 5px;">'.$patient->administered_units.'</td>';



                                $html .='</tr>';
                    //  }

                        $html .='</table>';
                    // echo $html;
                    //  exit;
$this->dompdf->load_html($html);
        $this->dompdf->render();
        $output = $this->dompdf->output();
        //print_r($output);
        file_put_contents('pdf/' . $pdfname . '', $output);
        redirect('pdf/' . $pdfname . '', $output);
    }
    function lockedclinicalnotes_print($id)
    {
        //echo $table;
    //  echo $id;
    //  exit;
        $this->load->library('dompdf_gen');
        $customPaper = array(0,0,1024,1000);
$this->dompdf->set_paper($customPaper);
$patient = $this->db->select("*")->from("healthreport_lockedclinicalnotes")->where("id",$id)->get()->row();
$patient_name = $this->db->select("*")->from("patient")->where("id",$patient->patient_id)->get()->row();


    //  $this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
        $pdfname = "Patient" . date('YmdHis') . '.pdf';
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
                        <h3 style="text-align:center;">Health Report For Locked Clinical Notes</h3>
                        <p>Patient Name :'.$patient_name->fname.' '.$patient_name->lname.'</p>
                        <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
                                 <tr>

                                        <th>Date Of Service</th>
                                        <th>Locked By</th>
                                        <th>Locked On</th>
                                        <th>Action</th>
                                        <th>Status</th>
                                        <th>Reason</th>
                                        <th>Date</th>




                                </tr>';
                            //$doctors =    $this->doctor_model->read();
                        //$patients =   $this->patient_model->read();



                    //  echo $this->db->last_query();
                    //  exit;
//foreach ($patients as $patient) {
//$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
$status = ($patient->status=="1")?"Active":"Inactive";
                                $html .='<tr>
                                        <td width="10%" style="padding: 5px;">'.$patient->date_of_service.'</td>

                                        <td style="padding: 5px;">'.$patient->locked_by.'</td>

                                        <td style="padding: 5px;">'.$patient->locked_on.'</td>';
$html .='<td style="padding: 5px;">'.$patient->action.'</td>';
$html .='<td style="padding: 5px;">'.$status.'</td>';
$html .='<td style="padding: 5px;">'.$patient->reason.'</td>';
$html .='<td style="padding: 5px;">'.$patient->date.'</td>';



                                $html .='</tr>';
                    //  }

                        $html .='</table>';
                    // echo $html;
                    //  exit;
$this->dompdf->load_html($html);
        $this->dompdf->render();
        $output = $this->dompdf->output();
        //print_r($output);
        file_put_contents('pdf/' . $pdfname . '', $output);
        redirect('pdf/' . $pdfname . '', $output);
    }
    function labresult_print($id)
    {
        //echo $table;
    //  echo $id;
    //  exit;
        $this->load->library('dompdf_gen');
        $customPaper = array(0,0,1024,1000);
$this->dompdf->set_paper($customPaper);
$patient = $this->db->select("*")->from("document_labresult")->where("id",$id)->get()->row();
$patient_name = $this->db->select("*")->from("patient")->where("id",$patient->patient_id)->get()->row();


    //  $this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
        $pdfname = "Patient" . date('YmdHis') . '.pdf';
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
                        <h3 style="text-align:center;">Health Report For Lab Result</h3>
                        <p>Patient Name :'.$patient_name->fname.' '.$patient_name->lname.'</p>
                        <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
                                 <tr>

                                        <th>Lab</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Abnormal</th>
                                        <th>Result Count</th>
                                        <th>Test</th>
                                        <th>Date</th>




                                </tr>';
                            //$doctors =    $this->doctor_model->read();
                        //$patients =   $this->patient_model->read();



                    //  echo $this->db->last_query();
                    //  exit;
//foreach ($patients as $patient) {
//$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();

                                $html .='<tr>
                                        <td width="10%" style="padding: 5px;">'.$patient->lab.'</td>

                                        <td style="padding: 5px;">'.$patient->date.'</td>

                                        <td style="padding: 5px;">'.$patient->action.'</td>';
$html .='<td style="padding: 5px;">'.$patient->abnormal.'</td>';
$html .='<td style="padding: 5px;">'.$patient->result_count.'</td>';
$html .='<td style="padding: 5px;">'.$patient->test.'</td>';
$html .='<td style="padding: 5px;">'.$patient->created_date.'</td>';



                                $html .='</tr>';
                    //  }

                        $html .='</table>';
                    // echo $html;
                    //  exit;
$this->dompdf->load_html($html);
        $this->dompdf->render();
        $output = $this->dompdf->output();
        //print_r($output);
        file_put_contents('pdf/' . $pdfname . '', $output);
        redirect('pdf/' . $pdfname . '', $output);
    }
    function amendment_print($id)
    {
        //echo $table;
    //  echo $id;
    //  exit;
        $this->load->library('dompdf_gen');
        $customPaper = array(0,0,1024,1000);
$this->dompdf->set_paper($customPaper);
$patient = $this->db->select("*")->from("healthreport_amendments")->where("id",$id)->get()->row();
$patient_name = $this->db->select("*")->from("patient")->where("id",$patient->patient_id)->get()->row();


    //  $this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
        $pdfname = "Patient" . date('YmdHis') . '.pdf';
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
                        <h3 style="text-align:center;">Health Report For Amendment</h3>
                        <p>Patient Name :'.$patient_name->fname.' '.$patient_name->lname.'</p>
                        <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
                                 <tr>

                                        <th>Amendment Source</th>
                                        <th>Amendment Status</th>
                                        <th>Amdments Date Time</th>
                                        <th>Amdmentsproccess Date Time</th>

                                        <th>Date</th>




                                </tr>';
                            //$doctors =    $this->doctor_model->read();
                        //$patients =   $this->patient_model->read();



                    //  echo $this->db->last_query();
                    //  exit;
//foreach ($patients as $patient) {
//$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();

                                $html .='<tr>
                                        <td width="10%" style="padding: 5px;">'.$patient->amendment_source.'</td>

                                        <td style="padding: 5px;">'.$patient->amendment_status.'</td>

                                        <td style="padding: 5px;">'.$patient->amdments_date_time.'</td>';
$html .='<td style="padding: 5px;">'.$patient->amdmentsproccess_date_time.'</td>';
$html .='<td style="padding: 5px;">'.$patient->created_date.'</td>';




                                $html .='</tr>';
                    //  }

                        $html .='</table>';
                    // echo $html;
                    //  exit;
$this->dompdf->load_html($html);
        $this->dompdf->render();
        $output = $this->dompdf->output();
        //print_r($output);
        file_put_contents('pdf/' . $pdfname . '', $output);
        redirect('pdf/' . $pdfname . '', $output);
    }
    function summary_print($id)
    {
        //echo $table;
    //  echo $id;
    //  exit;
        $this->load->library('dompdf_gen');
        $customPaper = array(0,0,1024,1000);
$this->dompdf->set_paper($customPaper);
$patient = $this->db->select("*")->from("healthreport_summary")->where("id",$id)->get()->row();
$patient_name = $this->db->select("*")->from("patient")->where("id",$patient->patient_id)->get()->row();

    //  $this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
        $pdfname = "Patient" . date('YmdHis') . '.pdf';
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
                        <h3 style="text-align:center;">Health Report For Summary</h3>
                        <p>Patient Name :'.$patient_name->fname.' '.$patient_name->lname.'</p>
                        <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
                                 <tr>

                                        <th>Summary</th>




                                </tr>';
                            //$doctors =    $this->doctor_model->read();
                        //$patients =   $this->patient_model->read();



                    //  echo $this->db->last_query();
                    //  exit;
//foreach ($patients as $patient) {
//$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
                                $html .='<tr>
                                        <td width="10%" style="padding: 5px;">'.$patient->summary.'</td>';
                                $html .='</tr>';
                    //  }

                        $html .='</table>';
                    // echo $html;
                    //  exit;
$this->dompdf->load_html($html);
        $this->dompdf->render();
        $output = $this->dompdf->output();
        //print_r($output);
        file_put_contents('pdf/' . $pdfname . '', $output);
        redirect('pdf/' . $pdfname . '', $output);
    }
    function labreport_print($id)
    {
        //echo $table;
    //  echo $id;
    //  exit;
        $this->load->library('dompdf_gen');
        $customPaper = array(0,0,1024,1000);
$this->dompdf->set_paper($customPaper);
$patient = $this->db->select("*")->from("lab_result")->where("loinc_code_id",$id)->get()->row();
$patient_name = $this->db->select("*")->from("patient")->where("id",$patient->patient_id)->get()->row();
    //  $this->dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
        $pdfname = "Patient" . date('YmdHis') . '.pdf';
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
                        <h3 style="text-align:center;">Health Report For Lab Result</h3>
                        <p>Patient Name :'.$patient_name->fname.' '.$patient_name->lname.'</p>
                        <table border="1" width="100%" class="pricedetail" style="margin-top: 1px;">
                                 <tr>
                                        <th>Loinc Code</th>
                                        <th>Description</th>
                                        <th>Result Value</th>
                                        <th>Units</th>
                                        <th>Normal Range</th>
                                        <th>Abnormal Flag</th>


                                </tr>';
                            //$doctors =    $this->doctor_model->read();
                        //$patients =   $this->patient_model->read();

                        $loinc_code = $this->db->select("*")->from("loinc_code")->where("loinc_code_id",$patient->loinc_code)->get()->row();

                    //  echo $this->db->last_query();
                    //  exit;
//foreach ($patients as $patient) {
//$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
                                $html .='<tr>
                                        <td width="10%" style="padding: 5px;">'.$loinc_code->loinc_code.'</td><td style="padding: 5px;">'.$patient->description.'</td>

                                        <td style="padding: 5px;">'.$patient->result_value.'</td><td style="padding: 5px;">'.$patient->units.'</td>
                                        <td align="left" style="width:16%;padding: 5px;">'.$patient->normal_range.'
                                        </td>
                                        <td width="12%" style="padding: 5px;">'.$patient->abnormal_flag.'</td>';




                                $html .='</tr>';
                    //  }

                        $html .='</table>';
                    // echo $html;
                    //  exit;
$this->dompdf->load_html($html);
        $this->dompdf->render();
        $output = $this->dompdf->output();
        //print_r($output);
        file_put_contents('pdf/' . $pdfname . '', $output);
        redirect('pdf/' . $pdfname . '', $output);
    }
public function remove_vital()  {

    $patient_name = $this->input->post("patient_name");
        $patient_id = $this->input->post("patient_id");
      $this->db->where('id',$patient_name);
        $this->db->delete('pa_vital_sign');
        echo $patient_id;
}
public function update_vital($p_id=0,$p_date=0) {
    $all_data = array();
    $problem_data = "";
    $patient_name = $this->input->post("patient_name");
    $p_id = $this->input->post("p_id");
    $p_date = $this->input->post("p_date");
    if($patient_name!="0"){
      $detail = $this->db->select("*")->from("pa_vital_sign")->where("id",$p_id)->where("patient_id",$patient_name)->get()->row();
        //$problem_data =   $this->get_update_problem($detail->patient_id,$detail->date);
        //print_r($problem_data);exit;
    }else{
        $detail = $this->db->select("*")->from("pa_vital_sign")->where("id",$p_id)->get()->row();
        $problem_data = $this->get_update_problem($detail->patient_id,$detail->date);
        $allergy_data = $this->get_update_allergylist($detail->patient_id,$detail->date);
        $labelresult_data   =   $this->get_update_labresult($detail->patient_id,$detail->date);
        $imagingorder_data  =   $this->get_update_imaging_order($detail->patient_id,$detail->date);
        $e_prescriptiondata =   $this->get_update_eprescription($detail->patient_id,$detail->date);
        $summary_data       =   $this->get_update_summary($detail->patient_id,$detail->date);
        $document_data      =   $this->get_update_document($detail->patient_id,$detail->date);
        $clinical_notesdata =   $this->get_update_clinical_notes($detail->patient_id,$detail->date);
        $singed_consentdata =   $this->get_update_singed_consent($detail->patient_id,$detail->date);
        $doclabresult_data  =   $this->get_update_doclabresult($detail->patient_id,$detail->date);
        $amendment_data     =   $this->get_update_amendments($detail->patient_id,$detail->date);
        $recordvaccinations_data      =   $this->get_update_recordvaccinations($detail->patient_id,$detail->date);
        $reviewsing_data      =   $this->get_update_reviewsing($detail->patient_id,$detail->date);
        $vaccines_data          = $this->get_update_Vaccines($detail->patient_id,$detail->date);
    }
        //echo json_encode($detail);

        $all_data["data_vitalsing"] = $detail;
        $all_data["problem_data"] = $problem_data;
        $all_data["allergy_data"] = $allergy_data;
        $all_data["labelresult_data"] = $labelresult_data;
        $all_data["imagingorder_data"] = $imagingorder_data;
        $all_data["e_prescriptiondata"] = $e_prescriptiondata;
        $all_data["summary_data"] = $summary_data;
        $all_data["document_data"] = $document_data;
        $all_data["clinical_notesdata"] = $clinical_notesdata;
        $all_data["singed_consentdata"] = $singed_consentdata;
        $all_data["doclabresult_data"] = $doclabresult_data;
        $all_data["amendment_data"] = $amendment_data;
        $all_data["recordvaccinations_data"] = $recordvaccinations_data;
        $all_data["reviewsing_data"] = $reviewsing_data;
        $all_data["vaccines_data"] = $vaccines_data;
         /* echo "<pre>";
        print_r($all_data);exit;*/
        echo json_encode($all_data);
}
    public function get_update_problem($p_id="0",$p_date="0")   {

       $patient_name = $this->input->post("patient_name");
          if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
              $p_date = date('Y-m-d',strtotime($p_date));
              $sql = "SELECT * FROM `healthreport_problem` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
              $query = $this->db->query($sql);
              $detail = $query->row();
               if(!empty($detail)){
                 $detail->diagnosis_datetime = date('Y-m-d h:i:s A',strtotime($detail->diagnosis_datetime));
                  $detail->onset_datetime = date('Y-m-d h:i:s A',strtotime($detail->onset_datetime));
                  $detail->changed_datetime = date('Y-m-d h:i:s A',strtotime($detail->changed_datetime));
                  return $detail;
                }
            }else{
                $detail = $this->db->select("*")->from("healthreport_problem")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
                if(!empty($detail)){
                    $detail->diagnosis_datetime = date('Y-m-d h:i:s A',strtotime($detail->diagnosis_datetime));
                    $detail->onset_datetime = date('Y-m-d h:i:s A',strtotime($detail->onset_datetime));
                    $detail->changed_datetime = date('Y-m-d h:i:s A',strtotime($detail->changed_datetime));
                    return $detail;
                }
            }
            //echo json_encode($detail);
    }
public function get_update_doclabresult($p_id=0,$p_date=0)
{
    $patient_name = $this->input->post("patient_name");
    if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
        $p_date = date('Y-m-d',strtotime($p_date));
        $sql = "SELECT * FROM `document_labresult` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
        $query = $this->db->query($sql);
        $detail = $query->row();

       /* $detail->date = date('Y-m-d',strtotime($detail->date)).'T'.date('H:i:s',strtotime($detail->date));       */
        return $detail;

    }else{
        $detail = $this->db->select("*")->from("document_labresult")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
       /* $detail->date = date('Y-m-d',strtotime($detail->date)).'T'.date('H:i:s',strtotime($detail->date));*/
        return $detail;
    }
    /*$detail = $this->db->select("*")->from("document_labresult")->where("patient_id", $patient_name)->order_by('created_date', 'DESC')->get()->row();

    echo json_encode($detail);*/
}
public function get_update_amendments($p_id=0,$p_date=0){

        $patient_name = $this->input->post("patient_name");

        if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
            $p_date = date('Y-m-d',strtotime($p_date));
            $sql = "SELECT * FROM `healthreport_amendments` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
            $query = $this->db->query($sql);
            $detail = $query->row();
                if (!empty($detail)) {
                    $detail->amdments_date_time = date('Y-m-d h:i:s',strtotime($detail->amdments_date_time));
                    $detail->amdmentsproccess_date_time = date('Y-m-d h:i:s',strtotime($detail->amdmentsproccess_date_time));
                }
            return $detail;

        }else{
           $detail = $this->db->select("*")->from("healthreport_amendments")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
           if (!empty($detail)) {
                $detail->amdments_date_time = date('Y-m-d h:i:s',strtotime($detail->amdments_date_time));
                $detail->amdmentsproccess_date_time = date('Y-m-d h:i:s',strtotime($detail->amdmentsproccess_date_time));
            }
            return $detail;
        }
        /*$detail = $this->db->select("*")->from("healthreport_amendments")->where("patient_id", $patient_name)->order_by('created_date', 'DESC')->get()->row();
        echo json_encode($detail);*/
}
public function get_update_document($p_id=0,$p_date=0){
    $patient_name = $this->input->post("patient_name");
    /*$detail = $this->db->select("*")->from("healthreport_document")->where("patient_id", $patient_name)->order_by('created_date', 'DESC')->get()->row();
    echo json_encode($detail);*/
    if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
        $p_date = date('Y-m-d',strtotime($p_date));
       $sql = "SELECT * FROM `healthreport_document` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
        $query = $this->db->query($sql);
        $detail = $query->row();
       /* echo "1";
        print_r($detail);exit;*/
        return $detail;
    }else{
        $detail = $this->db->select("*")->from("healthreport_document")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
        /*echo "0";
        print_r($detail);exit;*/
        return $detail;
    }
}
public function get_update_allergylist($p_id=0,$p_date=0){

    $patient_name = $this->input->post("patient_name");
        if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
            $p_date = date('Y-m-d',strtotime($p_date));
           $sql = "SELECT * FROM `healthreport_allergies` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
            $query = $this->db->query($sql);
            $detail = $query->row();
           /* echo "1";
            print_r($detail);exit;*/
            return $detail;
        }else{
            $detail = $this->db->select("*")->from("healthreport_allergies")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
            /*echo "0";
            print_r($detail);exit;*/
            return $detail;
        }

}
    public function get_update_singed_consent($p_id=0,$p_date=0){

        $patient_name = $this->input->post("patient_name");
        if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
            $p_date = date('Y-m-d',strtotime($p_date));
            $sql = "SELECT * FROM `healthreport_singedconsentforms` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
            $query = $this->db->query($sql);
            $detail = $query->row();
            if (!empty($detail)) {

                $detail->appointment_datetime = date('Y-m-d h:i:s',strtotime($detail->appointment_datetime));
                $detail->singnature_date = date('Y-m-d h:i:s',strtotime($detail->singnature_date));

                return $detail;
            }
        }else{
            $detail = $this->db->select("*")->from("healthreport_singedconsentforms")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
            if (!empty($detail)) {
               $detail->appointment_datetime = date('Y-m-d h:i:s',strtotime($detail->appointment_datetime));
                $detail->singnature_date = date('Y-m-d h:i:s',strtotime($detail->singnature_date));
                return $detail;
            }
        }
    }
    public function get_update_labresult($p_id="0",$p_date="0"){
        $patient_name = $this->input->post("patient_name");

        if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
            $p_date = date('Y-m-d',strtotime($p_date));
            $sql = "SELECT * FROM `lab_result` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
            $query = $this->db->query($sql);
            $detail = $query->row();
            return $detail;
        }else{
            $detail = $this->db->select("*")->from("lab_result")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
            return $detail;
        }
    }
    public function get_update_clinical_notes($p_id=0,$p_date=0){
        $patient_name = $this->input->post("patient_name");
        if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
            $p_date = date('Y-m-d',strtotime($p_date));
            $sql = "SELECT * FROM `healthreport_lockedclinicalnotes` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
            $query = $this->db->query($sql);
            $detail = $query->row();
            return $detail;
        }else{
            $detail = $this->db->select("*")->from("healthreport_lockedclinicalnotes")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
            return $detail;
        }
    }
    public function get_update_imaging_order($p_id=0,$p_date=0){

        $patient_name = $this->input->post("patient_name");
        if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
            $p_date = date('Y-m-d',strtotime($p_date));
           $sql = "SELECT * FROM `imaging_order` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
            $query = $this->db->query($sql);
            $detail = $query->row();
            return $detail;
        }else{
            $detail = $this->db->select("*")->from("imaging_order")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
            return $detail;
        }
    }
    public function get_update_eprescription($p_id=0,$p_date=0)
    {
        $patient_name = $this->input->post("patient_name");

        if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
            $p_date = date('Y-m-d',strtotime($p_date));
           $sql = "SELECT * FROM `e_prescription` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
            $query = $this->db->query($sql);
            $detail = $query->row();
            if(!empty($detail)){
                $detail->datetime_prescribed = date('Y-m-d h:i:s A',strtotime($detail->datetime_prescribed));
                $detail->datetime_started_taking = date('Y-m-d h:i:s A',strtotime($detail->datetime_started_taking));
                $detail->datetime_stopped_taking = date('Y-m-d h:i:s A',strtotime($detail->datetime_stopped_taking));
                return $detail;
            }
        }else{
            $detail = $this->db->select("*")->from("e_prescription")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
            if (!empty($detail)) {
                $detail->datetime_prescribed = date('Y-m-d h:i:s A',strtotime($detail->datetime_prescribed));
                $detail->datetime_started_taking = date('Y-m-d h:i:s A',strtotime($detail->datetime_started_taking));
                $detail->datetime_stopped_taking = date('Y-m-d h:i:s A',strtotime($detail->datetime_stopped_taking));
                return $detail;
            }

        }
    }

    public function get_update_Vaccines($p_id=0,$p_date=0){

        $patient_name = $this->input->post("patient_name");
        if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
            $p_date = date('Y-m-d',strtotime($p_date));
           $sql = "SELECT * FROM `healthreport_vaccines` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
            $query = $this->db->query($sql);
            $detail = $query->row();
            return $detail;
        }else{
            $detail = $this->db->select("*")->from("healthreport_vaccines")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
            return $detail;
        }
    }

public function get_update_summary($p_id=0,$p_date=0)
{

    $patient_name = $this->input->post("patient_name");
      /*$detail = $this->db->select("*")->from("healthreport_summary")->where("patient_id", $patient_name)->order_by('created_date', 'DESC')->get()->row();
            echo json_encode($detail);*/
        if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
            $p_date = date('Y-m-d',strtotime($p_date));
           $sql = "SELECT * FROM `healthreport_summary` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
            $query = $this->db->query($sql);
            $detail = $query->row();
           /* echo "1";
            print_r($detail);exit;*/
            return $detail;
        }else{
            $detail = $this->db->select("*")->from("healthreport_summary")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
            /*echo "0";
            print_r($detail);exit;*/
            return $detail;
        }
}
public function get_update_reviewsing($p_id=0,$p_date=0)
{
    $patient_name = $this->input->post("patient_name");
    if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
        $p_date = date('Y-m-d',strtotime($p_date));
        $sql = "SELECT * FROM `healthreport_reviewsign` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
        $query = $this->db->query($sql);
        $detail = $query->row();
        return $detail;
    }else{
        $detail = $this->db->select("*")->from("healthreport_reviewsign")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
        return $detail;
    }

    /*$detail = $this->db->select("*")->from("healthreport_reviewsign")->where("patient_id", $patient_name)->order_by('created_date', 'DESC')->get()->row();
    echo json_encode($detail);*/
}
public function get_update_recordvaccinations($p_id=0,$p_date=0)
{
    $patient_name = $this->input->post("patient_name");
    if($p_id!="" && $p_id!= 0 && $p_date!="" && $p_date!= 0){
        $p_date = date('Y-m-d',strtotime($p_date));
        $sql = "SELECT * FROM `healthreport_recordvaccinations` WHERE `patient_id` = '$p_id' AND date(`date`) = '$p_date' ORDER BY `date` DESC";
        $query = $this->db->query($sql);
        $detail = $query->row();
        if (!empty($detail)) {
            $detail->expirationdate = date('Y-m-d',strtotime($detail->expirationdate));
            $detail->administred_on = date('Y-m-d h:i:s A',strtotime($detail->administred_on));
            return $detail;
        }

    }else{
        $detail = $this->db->select("*")->from("healthreport_recordvaccinations")->where("patient_id",$patient_name)->order_by('date','DESC')->get()->row();
        if (!empty($detail)) {
            $detail->expirationdate = date('Y-m-d',strtotime($detail->expirationdate));
            $detail->administred_on = date('Y-m-d h:i:s A',strtotime($detail->administred_on));
            return $detail;
        }
    }

    /*$detail = $this->db->select("*")->from("healthreport_recordvaccinations")->where("patient_id", $patient_name)->order_by('created_date', 'DESC')->get()->row();
    echo json_encode($detail);*/
}
public function remove_labresult()  {

    $patient_name = $this->input->post("patient_name");
        $patient_id = $this->input->post("patient_id");
      $this->db->where('loinc_code_id',$patient_name);
        $this->db->delete('lab_result');
        echo $patient_id;
}
public function remove_imaging_order()  {

    $patient_name = $this->input->post("patient_name");
        $patient_id = $this->input->post("patient_id");
      $this->db->where('imaging_order_id',$patient_name);
        $this->db->delete('imaging_order');
        echo $patient_id;
}
public function remove_prescription_medication()    {

    $patient_name = $this->input->post("patient_name");
        $patient_id = $this->input->post("patient_id");
      $this->db->where('e_prescription_id',$patient_name);
        $this->db->delete('e_prescription');
        echo $patient_id;
}

public function remove_Vaccines()    {

    $patient_name = $this->input->post("patient_name");
        $patient_id = $this->input->post("patient_id");
      $this->db->where('id',$patient_name);
        $this->db->delete('healthreport_vaccines');
        echo $patient_id;
}

public function remove_recordvaccinations() {

    $patient_name = $this->input->post("patient_name");
        $patient_id = $this->input->post("patient_id");
      $this->db->where('id',$patient_name);
        $this->db->delete('healthreport_recordvaccinations');
        echo $patient_id;
}
    public function get_uploadeddocument()  {

    $patient_name = $this->input->post("patient_name");
    $sql = "SELECT * FROM healthreport_document where patient_id='$patient_name' order by date desc";
    $query = $this->db->query($sql);
    $patient_list =  $query->result();
    $msg = "";
    $p_id="0";
    $p_date="0";
    foreach ($patient_list as $value) {

$type="";
if($value->document_type=='1'){
    $type="Locked Clinical Notes";
}else if($value->document_type=='2'){
    $type="Signed Consent Forms";
}else if($value->document_type=='3'){
    $type="Lab Result";
}else if($value->document_type=='4'){
    $type="Amendments";
}
    //  $status = ($patient_list->status==1)?'Active':'Inactive';
                                            $msg .='<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                                                <td><a href='.base_url().'assets/upload_document/'.$value->document_document.' download>'.$value->document_document.'</a></td>

                                                <td>'.$type.'</td>
                                                <td>'.date('Y-m-d h:i:s A',strtotime($value->date)).'</td>
                                                <td>

                                                    <div style="float: right;" class="btn-group">

                                                        <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital(' . $value->id . ','.$p_id.','.$p_date.')"><i class="fa fa-edit"></i></a>

                                                        <a href="#" onClick="remove_uploadeddocument('.$value->id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                                    </div>

                                                </td>

                                            </tr>';
                                    }
                                    echo $msg;
    }
    public function get_lockedclinicalnotes()   {

    $patient_name = $this->input->post("patient_name");
    $sql = "SELECT * FROM healthreport_lockedclinicalnotes where patient_id='$patient_name' order by date desc";
    $query = $this->db->query($sql);
    $patient_list =  $query->result();
    $msg = "";
    $p_id="0";
    $p_date="0";
    foreach ($patient_list as $value) {


    //  $status = ($patient_list->status==1)?'Active':'Inactive';
                                            $msg .='<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                                                <td><a href="#">'.date('Y-m-d h:i',strtotime($value->date_of_service)).'</a></td>

                                                <td>'.$value->reason.'</td>

                                                <td>'.$value->locked_by.'</td>

                                                <td>'.date('Y-m-d',strtotime($value->locked_on)).'</td>
                                                <td>'.date('Y-m-d h:i:s A',strtotime($value->date)).'</td>


                                                <td>

                                                    <div style="float: right;" class="btn-group">
<a href="'.base_url().'dashboard_doctor/health_record/health_report/lockedclinicalnotes_print/'.$value->id.'" target="_blank"  class="btn btn-xs icon-box"><i class="fa fa-print"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital('.$value->id.','.$p_id.','.$p_date.')"><i class="fa fa-edit"></i></a>

                                                        <a href="#" onClick="remove_lockedclinicalnotes('.$value->id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                                    </div>

                                                </td>

                                            </tr>';
                                    }
                                    echo $msg;
    }
    public function get_signedconsentforms()    {

    $patient_name = $this->input->post("patient_name");
    $sql = "SELECT * FROM healthreport_singedconsentforms where patient_id='$patient_name' order by date desc";
    $query = $this->db->query($sql);
    $patient_list =  $query->result();
    $msg = "";
    foreach ($patient_list as $value) {


    //  $status = ($patient_list->status==1)?'Active':'Inactive';
                                            $msg .='<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                                                <td>'.$value->consent_form.'</td>

                                                <td>'.date('Y-m-d',strtotime($value->appointment_datetime)).'</td>

                                                <td>'.date('Y-m-d',strtotime($value->singnature_date)).'</td>
                                                <td>'.date('Y-m-d h:i:s A',strtotime($value->date)).'</td>


                                                <td>

                                                    <div style="float: right;" class="btn-group">

                                                        <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital('.$value->id.')"><i class="fa fa-edit"></i></a>

                                                        <a href="#" onClick="remove_signedconsentforms('.$value->id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                                    </div>

                                                </td>

                                            </tr>';
                                    }
                                    echo $msg;
    }
    public function get_doclabresult()  {

    $patient_name = $this->input->post("patient_name");
    $sql = "SELECT * FROM document_labresult where patient_id='$patient_name' order by date desc";
    $query = $this->db->query($sql);
    $patient_list =  $query->result();
    $msg = "";
    $p_id="0";
    $p_date="0";
    foreach ($patient_list as $value) {


    //  $status = ($patient_list->status==1)?'Active':'Inactive';
                                            $msg .='<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                                  <td>'.$value->lab.'</td>

                                  <td>'.date('d/m/Y',strtotime($value->date)).'</td>

                                  <td>'.$value->action.'</td>

                                  <td>'.$value->abnormal.'</td>

                                  <td>'.$value->result_count.'</td>
                                  <td>'.$value->test.'</td>

                                  <td>'.date('Y-m-d h:i:s A',strtotime($value->date)).'</td>
                                  <td>

                                    <div style="float: right;" class="btn-group">
                                        <a href="'.base_url().'dashboard_doctor/health_record/health_report/labresult_print/'.$value->id.'" target="_blank"  class="btn btn-xs icon-box"><i class="fa fa-print"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-xs icon-box" onClick="update_vital(' . $value->id . ','.$p_id.','.$p_date.')"><i class="fa fa-edit"></i></a>
                                        <a href="#" onClick="remove_doclabresult('.$value->id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>

                                  </td>

                                </tr>';
                                    }
                                    echo $msg;
    }
    public function get_amendments(){
        $patient_name = $this->input->post("patient_name");
        $sql = "SELECT * FROM healthreport_amendments where patient_id='$patient_name' order by date desc";
        $query = $this->db->query($sql);
        $patient_list =  $query->result();
        $msg = "";
        $p_id="0";
        $p_date="0";
        foreach ($patient_list as $value) {
            $msg .='<tr class="hovertr" style="border-bottom:1px solid #ddd ;">
                  <td>'.$value->amendment_source.'</td>
                  <td>'.$value->amendment_status.'</td>
                  <td>'.date('d/m/Y',strtotime($value->amdments_date_time)).'</td>
                  <td>'.date('d/m/Y',strtotime($value->amdmentsproccess_date_time)).'</td>
                  <td>'.date('Y-m-d h:i:s A',strtotime($value->date)).'</td>
                  <td>

                   <div style="float: right;" class="btn-group">
                    <a href="'.base_url().'dashboard_doctor/health_record/health_report/amendment_print/'.$value->id.'" target="_blank"  class="btn btn-xs icon-box"><i class="fa fa-print"></i></a>
                      <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital(' . $value->id . ','.$p_id.','.$p_date.')"><i class="fa fa-edit"></i></a>

                      <a href="#" onClick="remove_amendments('.$value->id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                    </div>

                  </td>

                </tr>';
        }
        echo $msg;
    }
    public function get_imaging_order() {

        $patient_name = $this->input->post("patient_name");
        $sql = "SELECT * FROM imaging_order where patient_id='$patient_name' order by date desc";
        $query = $this->db->query($sql);
        $patient_list =  $query->result();
        $p_id="0";
        $p_date="0";
        $msg = "";
        foreach ($patient_list as $value) {

                $msg .= '<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                    <td>'.$value->description.'</td>
                    <td>'.$value->cpt_code.'</td>

                    <td>'.$value->date.'</td>

                    <td>'.$value->order_status.'</td>

                    <td><a download href='.base_url().'/assets/scanned_result_document/'.$value->scanned_result.'><i class="fa fa-download"></i></td>

                    <td>'.$value->doctor_comments.'</td>
                    <td>'.date('Y-m-d h:i:s A', strtotime($value->date)).'</td>
                    <td>

                        <div style="float: right;" class="btn-group">
                            <a href="'.base_url().'dashboard_doctor/health_record/health_report/imagingreport_print/'.$value->imaging_order_id.'" target="_blank"  class="btn btn-xs icon-box"><i class="fa fa-print"></i></a>
                            <a href="javascript:void(0);" onClick="update_vital(' . $value->imaging_order_id . ','.$p_id.','.$p_date.')" class="btn btn-xs icon-box"><i class="fa fa-edit"></i></a>

                            <a href="#" onClick="remove_imaging_order('.$value->imaging_order_id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>

            </tr>';
        }
        echo $msg;
    }
    public function get_eprescription() {

        $patient_name = $this->input->post("patient_name");
        $sql = "SELECT * FROM e_prescription where patient_id='$patient_name' order by date desc";
        $query = $this->db->query($sql);
        $patient_list =  $query->result();
        $msg = "";
        $p_id="0";
        $p_date="0";
        foreach ($patient_list as $value) {
                $msg .= '<tr class="hovertr" style="border-bottom:1px solid #ddd ;">
                    <td>'.$value->drug_name.'</td>
                    <td>197931</td>
                    <td>'.$value->dispense_package.'</td>
                    <td>'.$value->number_refills.'</td>
                    <td>'.$value->sig.'</td>
                    <td>'.$value->order_status.'</td>
                    <td>'.date('Y-m-d h:i:s A',strtotime($value->date)).'</td>
                    <td>
                        <div style="float: right;" class="btn-group">
                            <a href="'.base_url().'dashboard_doctor/health_record/health_report/eprescription_print/'.$value->e_prescription_id.'" target="_blank"  class="btn btn-xs icon-box"><i class="fa fa-print"></i></a>
                            <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital(' . $value->e_prescription_id . ','.$p_id.','.$p_date.')"><i class="fa fa-edit"></i></a>
                            <a href="#" onClick="remove_prescription_medication('.$value->e_prescription_id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>';
        }
        echo $msg;
    }
    public function get_summary()   {
        $patient_name = $this->input->post("patient_name");
        $sql = "SELECT * FROM healthreport_summary where patient_id='$patient_name' order by date desc";
        $query = $this->db->query($sql);
        $patient_list =  $query->result();
        $msg = "";
        $p_id="0";
        $p_date="0";
            foreach ($patient_list as $value) {
              $msg .= '<tr class="hovertr" style="border-bottom:1px solid #ddd ;">
                            <td>'.$value->summary.'</td>
                            <td>'.date('Y-m-d h:i:s A', strtotime($value->date)).'</td>
                            <td>
                            <div style="float: right;" class="btn-group">
                                <a href="'.base_url().'dashboard_doctor/health_record/health_report/summary_print/'.$value->id.'" target="_blank"  class="btn btn-xs icon-box"><i class="fa fa-print"></i></a>
                                     <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital(' . $value->id . ','.$p_id.','.$p_date.')"><i class="fa fa-edit"></i></a>
                                    <a href="#" onClick="remove_summary('.$value->id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                  </div>
                                </td>
                              </tr>';
            }
            echo $msg;
    }
    public function get_scheduleappointment()   {

    $patient_name = ($this->input->post("patient_name") !=NULL) ? $this->input->post("patient_name") : $this->session
      ->userdata('patient_ID');
    $patientdetail = $this->db->select("*")->from("patient")->where('id',$patient_name)->get()->row();
    $sql = "SELECT * FROM schedule where patent_id='$patientdetail->patient_id' order by whens desc limit 1";
    $query = $this->db->query($sql);
    $patient_list = $query->result();
    $msg = "";
foreach ($patient_list as $value) {
    $doctor =$this->db->select("*")->from("user")->where('user_id',$value->doctor_id)->get()->row();
    $date = date('Y-m-d h:i:s',strtotime($value->whens.$value->from_time));
    //  $status = ($patient_list->status==1)?'Active':'Inactive';
                                            $msg .= '<div class="row">

                                                <div class="col-12 col-md-6">

                                                    <p style="color:#528be7;font-weight:600;">Dr.'.$doctor->firstname.' '.$doctor->lastname.'</p>

                                                </div>

                                                <div class="col-12 col-md-6 text-right">

                                                    <p style="color:#528be7;"> '.date('M d,Y, h:i A',strtotime($date)).'</p>

                                                </div>

                                            </div>

                                            <p style="color:#528be7;">'.$value->chief_complaint.'</p>';
                                                    }
                                                    echo $msg;
    }
    public function get_medications()   {

        $patient_name = $this->input->post("patient_name");
            $sql = "SELECT * FROM e_prescription where patient_id='$patient_name' order by datetime_prescribed desc limit 1";
            $query = $this->db->query($sql);
            $patient_list =  $query->result();
            $msg = "";
            foreach ($patient_list as $value) {
                $drug_name = $this->db->select("*")->from("drug")->where("drug_id",$value->drug_name)->get()->row();

    //  $status = ($patient_list->status==1)?'Active':'Inactive';
                    $msg .= '<div class="row">

                          <div class="col-12 col-md-4">

                            <p style="color:#528be7;"> '.date('M d,Y',strtotime($value->datetime_prescribed)).'</p>

                          </div>

                          <div class="col-12 col-md-8">

                            <p style="color:#528be7;">'.$value->pharmacy_note.' </p>

                          </div>

                        </div>';
                                                    }
                        echo $msg;
    }
    public function get_issue() {

        $patient_name = ($this->input->post("patient_name") !=NULL) ? $this->input->post("patient_name") : $this->session
            ->userdata('patient_ID');
            $sql = "SELECT * FROM healthreport_allergies where patient_id='$patient_name' order by date desc limit 1";
            $query = $this->db->query($sql);
            $patient_list =  $query->result();
            $msg = "";
            foreach ($patient_list as $value) {
                //$drug_name = $this->db->select("*")->from("reaction_name")->where("reaction_id",$value->reaction)->get()->row();

    //  $status = ($patient_list->status==1)?'Active':'Inactive';
        $msg .= '<p style="color:#528be7;">'.$value->reaction.' <label>('.date("M d,Y",strtotime($value->date)).')</label></p>';
                                                    }
                                                    echo $msg;
    }
    public function get_uploadeddocuments() {

        $patient_name = ($this->input->post("patient_name") !=NULL) ? $this->input->post("patient_name") : $this->session
            ->userdata('patient_ID');
            $sql = "SELECT * FROM healthreport_document where patient_id='$patient_name' order by date desc limit 1";
            $query = $this->db->query($sql);
            $patient_list =  $query->result();
            $msg = "";
            foreach ($patient_list as $value) {
                $msg .= '<p><a href='.base_url().'assets/upload_document/'.$value->document_document.' download>'.$value->document_document.'</a></p>';
            }
            echo $msg;
    }
    public function get_immunizations() {

        $patient_name = ($this->input->post("patient_name") !=NULL) ? $this->input->post("patient_name") : $this->session
            ->userdata('patient_ID');
            $sql = "SELECT * FROM healthreport_recordvaccinations where patient_id='$patient_name' order by date desc limit 1";
            $query = $this->db->query($sql);
            $patient_list =  $query->result();
            $msg = "";
            foreach ($patient_list as $value) {
                //$drug_name = $this->db->select("*")->from("reaction_name")->where("reaction_id",$value->reaction)->get()->row();
                //  $status = ($patient_list->status==1)?'Active':'Inactive';
                $msg .= '<p style="color:#528be7;">'.substr(wordwrap($value->record_vaccination_notes,12, "<br />"), 0, 200).'</p>';
            }
            echo $msg;
    }

    public function get_vaccinesschedule()
    {
        $vaccination = $this->input->post("vaccination");
        $sql = "SELECT * FROM healthreport_vaccines_schedule where vaccines='$vaccination'";
        $query = $this->db->query($sql);
        $vaccinesschedule = $query->result();
        $vaccinesschedule_data = array();
        foreach ($vaccinesschedule as $vaccinesschedule_list){
            array_push($vaccinesschedule_data,$vaccinesschedule_list->schedule_name);
        }
        echo json_encode($vaccinesschedule_data);
    }

    public function search_vaccinesschedule()
    {

        $vaccination = $this->input->post("vaccination");
        $schedule = $this->input->post("schedule");
        $sql = " SELECT * FROM healthreport_vaccines_schedule where schedule_name LIKE '$schedule%' and vaccines='$vaccination'";
        $query = $this->db->query($sql);
        $vaccinesschedule = $query->result();
        $vaccinesschedule_data = array();
        if (!empty($vaccinesschedule)) {
            foreach ($vaccinesschedule as $vaccinesschedule_list){
                array_push($vaccinesschedule_data,$vaccinesschedule_list->schedule_name);
            }
            echo json_encode($vaccinesschedule_data);
        }else{
            echo 0;
        }
    }

    public function get_vaccines_vaccine()
    {
        $vaccination = $this->input->post("vaccination");
        $sql        = "SELECT * FROM healthreport_vaccines_vaccine where vaccines='$vaccination'";
        $query      = $this->db->query($sql);
        $vaccine    = $query->result();
        $vaccine_data = array();
        foreach ($vaccine as $vaccine_list){
            array_push($vaccine_data,$vaccine_list->vaccine_name);
        }
        echo json_encode($vaccine_data);
        /*echo json_encode($vaccinesschedule);
        exit;*/
    }

    public function search_vaccines_vaccine()
    {

        $vaccination = $this->input->post("vaccination");
        $vaccine = $this->input->post("vaccine");
        $sql = " SELECT * FROM healthreport_vaccines_vaccine where vaccine_name LIKE '$vaccine%' and vaccines='$vaccination'";
        $query = $this->db->query($sql);
        $vaccine = $query->result();
        $vaccine_data = array();
        if (!empty($vaccine)) {
            foreach ($vaccine as $vaccine_list){
                array_push($vaccine_data,$vaccine_list->vaccine_name);
            }
            echo json_encode($vaccine_data);
        }else{
            echo 0;
        }
    }

    public function get_immunizations_listing() {
        $vacciness = $this->input->post("vacciness");
        $patient_ID = $this->input->post("patient_ID");
        $sql = "SELECT * FROM healthreport_vaccines where patient_id='$patient_ID' and vaccines='$vacciness' order by date desc";
        $query = $this->db->query($sql);
        $patient_list =  $query->result();
        $p_id = "0";
        $p_date="0";
        foreach ($patient_list as $value) {
            $vaccines_status =  ($value->vaccines_status == 1) ? 'Active' : 'Deactive';
            echo $html = "<tr class='hovertr' style='border-bottom:1px solid #ddd ;'>

                                          <td>".$value->schedule."</td>

                                          <td>".$value->vaccine."</td>

                                          <td class='weight-none'>

                                            <select class='form-control' id=''>

                                              <option value='1'>DTaP,IPV,Hib,HepB</option>

                                              <option value='2'>DTap-Hep B-IPV</option>

                                              <option value='3'>Hep A-Hep B</option>

                                              <option value='4'>Hep B, Adult</option>

                                            </select>

                                          </td>

                                          <td>".$value->consent_form."</td>

                                          <td>".$value->vis."</td>

                                          <td>".$value->administreted_on."</td>

                                          <td>".$value->administreted_by."</td>
                                          <td>".$vaccines_status."</td>
                                          <td>".date('Y-m-d h:i:s A', strtotime($value->date))."</td>
                                          <td>

                                            <div style='float: right;' class='btn-group'>

                                               <a href='javascript:void(0);' class='btn btn-xs icon-box' onClick='update_vital(" . $value->id . ",".$p_id.",".$p_date.")'><i class='fa fa-edit'></i></a>

                                               <a href='javascript:void(0);' class='btn btn-xs btn-danger' onClick='remove_Vaccines(" . $value->id . ",".$value->patient_id.")'><i class='fa fa-trash'></i></a>

                                            </div>

                                          </td>

                                        </tr>";
            }
            exit;
    }

    public function get_healthrecord()  {

    $patient_name = $this->input->post("patient_name");
    $sql = "SELECT * FROM healthreport_healthrecord where patient_id='$patient_name' order by date_time DESC";
    $query = $this->db->query($sql);
    $patient_list = $query->result();
    $msg = "";
    $p_id="0";
    $p_date="0";
foreach ($patient_list as $value) {
    $doctor =$this->db->select("*")->from("user")->where('user_id',$value->doctor_name)->get()->row();
    $patient =$this->db->select("*")->from("patient")->where('id',$value->patient_name)->get()->row();
    //  $status = ($patient_list->status==1)?'Active':'Inactive';
      //<td> Dr.'.$doctor->firstname.' '.$doctor->lastname.'</td>
                                            $msg .= '<tr class="hovertr" style="border-bottom:1px solid #ddd ;">



                              <td>'.date('Y-m-d h:i:s A',strtotime($value->date_time)).'</td>

                              <td>'.$value->patient_name.'</td>

                              <td>'.$value->updated_by.'</td>
                              <td>'.date('Y-m-d h:i:s A',strtotime($value->date_time)).'</td>
                              <td>

                                <div style="float: right;" class="btn-group">

                                  <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital(' . $value->id . ','.$p_id.','.$p_date.')"><i class="fa fa-edit"></i></a>

                                  <a href="#" onClick="remove_healthrecord('.$value->id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                </div>

                              </td>

                            </tr>';
                                                    }
                                                    echo $msg;
    }
    public function get_reviewandsign() {

    $patient_name = $this->input->post("patient_name");
    $sql = "SELECT * FROM healthreport_reviewsign where patient_id='$patient_name' order by date desc";
    $query = $this->db->query($sql);
    $patient_list = $query->result();
    $msg = "";
    $p_id="0";
    $p_date="0";
foreach ($patient_list as $value) {

    //  $status = ($patient_list->status==1)?'Active':'Inactive';
                                            $msg .= '<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                                                <td><a href='.base_url().'assets/reviewsing_document/'.$value->reviewsing_document.' download>'.$value->reviewsing_document.'</a></td>
                                                <td>'.date("Y-m-d h:i:s A", strtotime($value->date)).'</td>
                                                <td>

                                                    <div style="float: right;" class="btn-group">

                                                        <a class="btn btn-xs icon-box" target="_blank" href='.base_url().'assets/reviewsing_document/'.$value->reviewsing_document.' download><i class="fa fa-download"></i></a>

                                                        <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital(' . $value->id . ','.$p_id.','.$p_date.')"><i class="fa fa-edit"></i></a>
                                                        <a href="#" onClick="remove_reviewsign('.$value->id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                                    </div>

                                                </td>

                                            </tr>';
                                                    }
                                                    echo $msg;
    }
    public function remove_reviewsign() {

    $patient_name = $this->input->post("patient_name");
        $patient_id = $this->input->post("patient_id");
      $this->db->where('id',$patient_name);
        $this->db->delete('healthreport_reviewsign');
        echo $patient_id;
}
public function remove_summary()    {

    $patient_name = $this->input->post("patient_name");
    $patient_id = $this->input->post("patient_id");
    $this->db->where('id',$patient_name);
    $this->db->delete('healthreport_summary');
    echo $patient_id;
}
public function remove_uploadeddocument()   {

    $patient_name = $this->input->post("patient_name");
    $patient_id = $this->input->post("patient_id");
    $this->db->where('id',$patient_name);
    $this->db->delete('healthreport_document');
    echo $patient_id;
}
public function remove_lockedclinicalnotes()    {

    $patient_name = $this->input->post("patient_name");
    $patient_id = $this->input->post("patient_id");
    $this->db->where('id',$patient_name);
    $this->db->delete('healthreport_lockedclinicalnotes');
    echo $patient_id;
}
public function remove_signedconsentforms() {

    $patient_name = $this->input->post("patient_name");
    $patient_id = $this->input->post("patient_id");
    $this->db->where('id',$patient_name);
    $this->db->delete('healthreport_singedconsentforms');
    echo $patient_id;
}
public function remove_doclabresult()   {

    $patient_name = $this->input->post("patient_name");
    $patient_id = $this->input->post("patient_id");
    $this->db->where('id',$patient_name);
    $this->db->delete('document_labresult');
    echo $patient_id;
}
public function remove_amendments() {

    $patient_name = $this->input->post("patient_name");
    $patient_id = $this->input->post("patient_id");
    $this->db->where('id',$patient_name);
    $this->db->delete('healthreport_amendments');
    echo $patient_id;
}
public function remove_healthrecord()   {


     $patient_name = $this->input->post("patient_name");

     $healht_record_data = $this->db->get_where("healthreport_healthrecord",array("id"=>$patient_name))->row();
     $patient_id = $healht_record_data->patient_id;
     $healthrecord_id  = $healht_record_data->healthrecord_id;

    /* Remove Vital Sing */
     $this->db->where('healthrecord_id',$healthrecord_id);
     $this->db->where('patient_id',$patient_id);
     $this->db->delete('pa_vital_sign');

    //echo $this->db->last_query();exit;

    /* Remove Problem */
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('healthreport_problem');

    /* Remove Allergy*/
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('healthreport_allergies');

    /* Remove Lab Result*/
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('lab_result');

    /* Remove Imaging Order*/
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('imaging_order');

    /* Remove E-Prescription*/
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('e_prescription');

    /* Remove Vaccines*/
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('healthreport_vaccines');

    /* Remove Review Sing*/
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('healthreport_reviewsign');

    /* Remove Record Vaccinations*/
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('healthreport_recordvaccinations');

    /* Remove Summary*/
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('healthreport_summary');

    /* Remove Uploaded Document*/
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('healthreport_document');

    /* Remove locked clinical noted */
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('healthreport_lockedclinicalnotes');

    /* Remove Singed Consent Form */
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('healthreport_singedconsentforms');

    /* Remove Document Lab result */
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('document_labresult');

    /* Remove Document Amendments */
    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->where('patient_id',$patient_id);
    $this->db->delete('healthreport_amendments');



    $this->db->where('healthrecord_id',$healthrecord_id);
    $this->db->delete('healthreport_healthrecord');
    echo $patient_id;
}
    public function get_record_vaccination()    {

    $patient_name = $this->input->post("patient_name");
       $sql = "SELECT * FROM healthreport_recordvaccinations where patient_id='$patient_name' ORDER BY date DESC";
    $query = $this->db->query($sql);
    $patient_list = $query->result();
    $msg = "";
    $p_id="0";
    $p_date="0";
foreach ($patient_list as $value) {

    //  $status = ($patient_list->status==1)?'Active':'Inactive';
                                            $msg .= '<tr>

                                                <td>'.$value->consentform.'</td>

                                                <td>'.$value->create_record_for.'</td>

                                                <td>'.$value->cvxcode.'</td>

                                                <td>'.$value->name.'</td>

                                                <td>'.$value->cpt_code.'</td>

                                                <td>'.$value->manfacturer.' </td>

                                                <td>'.$value->lot_num.' </td>

                                                <td>'.date('Y-m-d h:i',strtotime($value->expirationdate)).'</td>

                                                <td>'.$value->administered_amount.'</td>

                                                <td>'.$value->administered_units.'</td>

                                                <td>'.$value->vaccinate_route.'</td>

                                                <td>'.$value->vaccinate_site.'</td>

                                                <td>'.$value->vaccinate_status.'</td>

                                                <td>'.date('Y-m-d h:i',strtotime($value->administred_on)).'</td>

                                                <td>'.$value->ordering_doctor.'</td>

                                                <td>'.$value->administered_by.'</td>

                                                <td>'.$value->administered_at.'</td>

                                                <td>'.$value->inventory_lot.'</td>

                                                <td>'.$value->record_type.'</td>

                                                <td>'.$value->funding_eligibility.'</td>

                                                <td>'.$value->observed_immunity.'</td>

                                                <td>'.$value->record_vaccination_notes.'</td>
                                                <td>'.date('Y-m-d h:i:s A',strtotime($value->date)).'</td>
                                                <td>

                                                    <div style="float: right;" class="btn-group">
<a href="'.base_url().'dashboard_doctor/health_record/health_report/recordvaccination_print/'.$value->id.'" target="_blank" class="btn btn-xs icon-box"><i class="fa fa-print"></i></a>
                                                          <a href="javascript:void(0);" class="btn btn-xs icon-box" onClick="update_vital(' . $value->id . ','.$p_id.','.$p_date.')"><i class="fa fa-edit"></i></a>

                                                        <a href="#" onClick="remove_recordvaccinations('.$value->id.','.$value->patient_id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                                    </div>

                                                </td>

                                            </tr>';
                                                    }
                                                    echo $msg;
    }

     public function get_loinc_code()
    {   $loinc_codevalue = $this->input->post("loinc_code");
        $loinc_code = $this->healthreport_model->get_loinccode_healthreport($loinc_codevalue);
        $loinc_code_data = array();
        if(!empty($loinc_code)){
            foreach ($loinc_code as $loinc_code_list){
                array_push($loinc_code_data,$loinc_code_list->loinc_code);
            }
            echo json_encode($loinc_code_data);
        }else{
            echo 0;
        }
    }
    public function get_problem_healthreport()
    {
        $problem_value = $this->input->post("problem");
        $problem = $this->healthreport_model->get_problem_healthreport($problem_value);
        $problem_data = array();
        if(!empty($problem)){
            foreach ($problem as $problem_list){
                array_push($problem_data,$problem_list->problem_name);
            }
            echo json_encode($problem_data);
        }else{
            echo 0;
        }
    }
    public function get_suballergy_healthreports(){
        $sub_allergyvalue = $this->input->post("drugallergy");
        $sub_allergy =  $this->get_suballergy_healthreport($sub_allergyvalue);
        $sub_allergy_data = array();
        if(!empty($sub_allergy)){
            foreach ($sub_allergy as $sub_allergy_list){
                array_push($sub_allergy_data,$sub_allergy_list->allergy_name);
            }
            echo json_encode($sub_allergy_data);
        }else{
            echo 0;
        }

    }
    public function get_icdversion_healthreport(){
        $icdversionvalue = $this->input->post("icdversion");
        $icdversion = $this->healthreport_model->get_icdversion_healthreport($icdversionvalue);
        $icdversion_data = array();
        if(!empty($icdversion)){
            foreach ($icdversion as $icdversion_list){
                array_push($icdversion_data,$icdversion_list->icd_name);
            }
            echo json_encode($icdversion_data);
        }else{
            echo 0;
        }
    }
    public function get_cptcode_healthreport(){
        $cpt_codevalue = $this->input->post("cpt_code");
        $cpt_code = $this->healthreport_model->get_cptcode_healthreport($cpt_codevalue);
        $cptcode_data = array();
        if(!empty($cpt_code)){
            foreach ($cpt_code as $cptcode_list){
                array_push($cptcode_data,$cptcode_list->cpt_code);
            }
            echo json_encode($cptcode_data);
        }else{
            echo 0;
        }

    }
    public function get_drug_healthreport(){
        $drugname = $this->input->post("drugname");
        $drug = $this->healthreport_model->get_drug_healthreport($drugname);
        $drug_data = array();
        if(!empty($drug)){
            foreach ($drug as $drug_list){
                array_push($drug_data,$drug_list->drug_name);
            }
            echo json_encode($drug_data);
        }else{
            echo 0;
        }

    }

    public function get_immunizations_cvxcode (){
        $cvxcode_immunizations_value = $this->input->post("immunizationscvx_code_vaccines");
        $cvxcode_immunizations = $this->healthreport_model->get_immunizations_cvxcode( $cvxcode_immunizations_value);
        $cvxcode_immunizations_data = array();
        if(!empty($cvxcode_immunizations)){
            foreach ($cvxcode_immunizations as $cvxcode_immunizations_list){
                array_push($cvxcode_immunizations_data,$cvxcode_immunizations_list->cvx_code);
            }
            echo json_encode($cvxcode_immunizations_data);
        }else{
            echo 0;
        }
    }

    public function get_record_vaccinations_cvx_code (){
        $record_vaccinations_cvx_code = $this->input->post("record_vaccinations_cvx_code");
        $record_vaccinations_cvx_codes = $this->healthreport_model->get_immunizations_cvxcode( $record_vaccinations_cvx_code);
        $cvxcode_immunizations_data = array();
        if(!empty($record_vaccinations_cvx_codes)){
            foreach ($record_vaccinations_cvx_codes as $cvxcode_immunizations_list){
                array_push($cvxcode_immunizations_data,$cvxcode_immunizations_list->cvx_code);
            }
            echo json_encode($cvxcode_immunizations_data);
        }else{
            echo 0;
        }
    }

    public function get_immunizations_manufacturer(){
        $manfacturer_value = $this->input->post("record_vaccinations_manfacturer");
        $manufacturer = $this->healthreport_model->get_immunizations_manufacturer($manfacturer_value);
        $manufacturer_data = array();
        if(!empty($manufacturer)){
            foreach ($manufacturer as $manufacturer_list){
                array_push($manufacturer_data,$manufacturer_list->manufacture);
            }
            echo json_encode($manufacturer_data);
        }else{
            echo 0;
        }

    }
    public function create()
    {
        $data['title'] = "Add Health Report";
        //$data['allergy_type'] = $this->healthreport_model->get_allergy_healthreport();
        $data['recation'] = $this->get_recation_healthreport();
        $session_id = $this->session->userdata('hospital_id');
        $data['appointment'] = $this->healthreport_model->get_apointment_healthreport($session_id);
        $data['ordering_doctor'] = $this->healthreport_model->get_ordering_doctor_healthreport($session_id);

        $data['consentform'] = $this->healthreport_model->get_data_recordvaccinations_healthreport("consent_form","healthreport_vaccines");
        $data['administreted_by'] = $this->healthreport_model->get_data_recordvaccinations_healthreport("administreted_by","healthreport_vaccines");
        $id = $this->session->userdata('hospital_id');
        $created_by_id = $this->session->userdata('created_by');
        $isadmin = $this->session->userdata('isadmin');
        $login_email = $this->session->userdata('email');
        $ignore = array($login_email);
                $session_id = $this->session->userdata('hospital_id');
                $created_by_id = $this->session->userdata('created_by');
                $isadmin = $this->session->userdata('isadmin');
                if($isadmin == 1){
                    $session_id = $created_by_id;
                }
            $doctors = $this->db->select("user.*,department.name")
            ->from("user")
            ->join('department','department.dprt_id = user.department_id','left')
            ->where('user.user_role',2)
            ->where('user.created_by',$session_id)
            ->where('user.status',1)
            ->where_not_in("email",$ignore)
            ->order_by('user.user_id','desc')
            ->get()
            ->result();

        $data['doctors'] = $doctors;

        $data['content'] = $this->load->view('dashboard_doctor/health_record/healthreport_form',$data,true);
        $this->load->view('dashboard_doctor/main_wrapper',$data);
    }

    public function view_healthrecord()
    {

        $data['title'] = display('doctor_list');
        /*$data['doctors'] = $this->doctor_model->read();
        print_r($data['doctors']);exit;*/
        $data['content'] = $this->load->view('view_healthrecord',$data,true);
        $this->load->view('dashboard_doctor/main_wrapper',$data);
    }

    public function save_vitalsing()
    {
        $patient_ID         = $this->input->post("patient_ID");
        $temperature        = $this->input->post("temperature");
        $heart_rate         = $this->input->post("heart_rate");
        $blood_presure      = $this->input->post("blood_presure");
        $respiratory_rate   = $this->input->post("respiratory_rate");
        $oxygen_saturation  = $this->input->post("oxygen_saturation");
        $height             = $this->input->post("height");
        $weight             = $this->input->post("weight");
        $bmi                = $this->input->post("bmi");
        $pain               = $this->input->post("pain");
        $smoking            = $this->input->post("smoking");
        $head_circumfernce  = $this->input->post("head_circumfernce");
        $glucose_glucometer = $this->input->post("glucose_glucometer");
        $bloodtype  = $this->input->post("bloodtype");
        $session_healthrecord_id  = "";
        if($this->session->userdata("healthrecord_ids") !=""){
            $session_healthrecord_id = $this->session->userdata("healthrecord_ids");
        }else{
            $healthrecord_id = "PHR-".rand(1111,9999).uniqid();
            $this->session->set_userdata("healthrecord_ids",$healthrecord_id);
            $session_healthrecord_id = $this->session->userdata("healthrecord_ids");
        }

        $vitasing_data = array("bloodtype"=>$bloodtype,"patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"temperature"=>$temperature,"respiratory_rate"=>$respiratory_rate,"weight"=>$weight,"smoking_status"=>$smoking,"heart_rate"=>$heart_rate,"oxygen_saturation"=>$oxygen_saturation,"bmi"=>$bmi,"head_circumference"=>$head_circumfernce,"blood_pressure"=>$blood_presure,"height"=>$height,"pain"=>$pain,"glucose_by_glucometer"=>$glucose_glucometer,"date"=>date("Y-m-d H:i:s"));

        $result = $this->healthreport_model->save_vitalsing($vitasing_data);

        if ($result) {
            echo 1;exit;

        }else{
            echo 0;exit;
        }
    }
    public function edit_vitalsing()
    {
        $patient_ID         = $this->input->post("patient_ID");
        $id         = $this->input->post("vital_id");
        $temperature        = $this->input->post("temperature");
        $heart_rate         = $this->input->post("heart_rate");
        $blood_presure      = $this->input->post("blood_presure");
        $respiratory_rate   = $this->input->post("respiratory_rate");
        $oxygen_saturation  = $this->input->post("oxygen_saturation");
        $height             = $this->input->post("height");
        $weight             = $this->input->post("weight");
        $bmi                = $this->input->post("bmi");
        $pain               = $this->input->post("pain");
        $smoking            = $this->input->post("smoking");
        $head_circumfernce  = $this->input->post("head_circumfernce");
        $glucose_glucometer = $this->input->post("glucose_glucometer");
        $bloodtype  = $this->input->post("bloodtype");

        // $query = $this->db->query("select patient_id from pa_vital_sign where patient_id='$patient_ID'");
        // $no    = $query->num_rows();
        // if ($no == 1) {
        //  echo 2;exit;
        // }
        $vitasing_data = array("bloodtype"=>$bloodtype,"temperature"=>$temperature,"respiratory_rate"=>$respiratory_rate,"weight"=>$weight,"smoking_status"=>$smoking,"heart_rate"=>$heart_rate,"oxygen_saturation"=>$oxygen_saturation,"bmi"=>$bmi,"head_circumference"=>$head_circumfernce,"blood_pressure"=>$blood_presure,"height"=>$height,"pain"=>$pain,"glucose_by_glucometer"=>$glucose_glucometer,"date"=>date("Y-m-d H:i:s"));

        $this->db->where('id',$id);
        $result = $this->db->update('pa_vital_sign',$vitasing_data);

        if ($result) {
            echo 1;exit;

        }else{
            echo 0;exit;
        }
    }

    public function save_problemlist()
    {
        $patient_ID     = $this->input->post("patient_ID");
        $problem        = $this->input->post("problem");
        $icdversion     = $this->input->post("icdversion");
        $icd10_code     = $this->input->post("icd10_code");
        $snomed_ct_code = $this->input->post("snomed_ct_code");
        $problem_status = $this->input->post("problem_status");
        $notes  = $this->input->post("notes");
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

        if($problem!="" OR $icdversion!="" OR $icd10_code!="" OR $snomed_ct_code!="" OR $problem_status!="" OR $notes!=""){

            $diagnosis_datetime     = ($this->input->post("diagnosis_datetime")!="-0001-11-30 12:00") ? date("Y-m-d h:i:s",strtotime($this->input->post("diagnosis_datetime"))) : "";
        $onset_datetime         = ($this->input->post("onset_datetime")!="-0001-11-30 12:00") ? date("Y-m-d h:i:s",strtotime($this->input->post("onset_datetime"))) : "";
        $channged_datetime      = ($this->input->post("channged_datetime")!="-0001-11-30 12:00") ? date("Y-m-d h:i:s",strtotime($this->input->post("channged_datetime"))) : "";

            $problemlist_data = array("patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"problem_id"=>$problem,"icd_version_id"=>$icdversion,"icd10_code"=>$icd10_code,"snomed_ct_code"=>$snomed_ct_code,"status"=>$problem_status,"diagnosis_datetime"=>$diagnosis_datetime,"onset_datetime"=>$onset_datetime,"changed_datetime"=>$channged_datetime,"notes"=>$notes,"date"=>date("Y-m-d H:i:s"));
            //print_r($problemlist_data);exit;
            $result = $this->healthreport_model->save_problemlist($problemlist_data);
            if ($result) {
                echo 1;exit;
            }else{
                echo 0;exit;
            }
        }
    }
    public function edit_problemlist()
    {
        $patient_ID     = $this->input->post("patient_ID");
        $healthreport_problem_id        = $this->input->post("healthreport_problem_id");
        $problem        = $this->input->post("problem");
        $icdversion     = $this->input->post("icdversion");
        $icd10_code     = $this->input->post("icd10_code");
        $snomed_ct_code = $this->input->post("snomed_ct_code");
        $problem_status = $this->input->post("problem_status");
        $diagnosis_datetime     = date("Y-m-d h:i:s",strtotime($this->input->post("diagnosis_datetime")));
        $onset_datetime         = date("Y-m-d h:i:s",strtotime($this->input->post("onset_datetime")));
        $channged_datetime      = date("Y-m-d h:i:s",strtotime($this->input->post("channged_datetime")));
        $notes                  = $this->input->post("notes");

        // $query = $this->db->query("select patient_id from healthreport_problem where patient_id='$patient_ID'");
        // $no    = $query->num_rows();
        // if ($no == 1) {
        //  echo 2;exit;
        // }

        $problemlist_data = array("patient_id"=>$patient_ID,"problem_id"=>$problem,"icd_version_id"=>$icdversion,"icd10_code"=>$icd10_code,"snomed_ct_code"=>$snomed_ct_code,"status"=>$problem_status,"diagnosis_datetime"=>$diagnosis_datetime,"onset_datetime"=>$onset_datetime,"changed_datetime"=>$channged_datetime,"notes"=>$notes,"date"=>date("Y-m-d H:i:s"));

        //print_r($problemlist_data);exit;
   $this->db->where('id',$healthreport_problem_id);
        $result = $this->db->update('healthreport_problem',$problemlist_data);
        if ($result) {
            echo 1;exit;

        }else{
            echo 0;exit;
        }
    }
    public function save_allergylist()
    {
        $patient_ID     = $this->input->post("patient_ID");
        $allergy_type       = $this->input->post("allergy_type");
        $drug_allergy       = $this->input->post("drug_allergy");
        $reaction       = $this->input->post("reaction");
        $severity   = $this->input->post("severity");
        $allergy_status = $this->input->post("allergy_status");
        $notes                  = $this->input->post("notes");
        $v_date_time    = date("Y-m-d H:i:s",strtotime($this->input->post("a_date_time")));
        $v_updated_by   = $this->input->post("a_updated_by");
        $patient_name   = $this->input->post("patient_name");
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

        if ($allergy_type!=""||$drug_allergy!=""||$reaction!=""||$severity!=""||$allergy_status!=""||$notes!="") {

            $allergylist_data = array("patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"allergy_type"=>$allergy_type,"drug_allergy"=>$drug_allergy,"reaction"=>$reaction,"severity"=>$severity,"status"=>$allergy_status,"notes"=>$notes,"date"=>date("Y-m-d H:i:s"));
            $result = $this->healthreport_model->save_allergylist($allergylist_data);
            if ($result) {
                echo 1;exit;

            }else{
                echo 0;exit;
            }
        }
    }
    function edit_update_allergylist(){
        $patient_ID     = $this->input->post("patient_ID");
        $allergy_type       = $this->input->post("allergy_type");
        $drug_allergy_e     = $this->input->post("drug_allergy_e");
        $reaction       = $this->input->post("reaction");
        $severity   = $this->input->post("severity");
        $allergy_status = $this->input->post("allergy_status");
        $notes                  = $this->input->post("notes");
        $allergies_id   = $this->input->post("allergies_id");

        $allergylist_data = array("patient_id"=>$patient_ID,"allergy_type"=>$allergy_type,"drug_allergy"=>$drug_allergy_e,"reaction"=>$reaction,"severity"=>$severity,"status"=>$allergy_status,"notes"=>$notes,"date"=>date("Y-m-d H:i:s"));
                        $this->db->where('id',$allergies_id);
            $result =   $this->db->update('healthreport_allergies',$allergylist_data);

        if ($result) {
            echo 1;exit;

        }else{
            echo 0;exit;
        }
    }

    public function save_labresult()
    {
        $patient_ID     = $this->input->post("patient_ID");
        $loinc_code     = $this->input->post("loinc_code");
        $discription    = $this->input->post("discription");
        $result_value   = $this->input->post("result_value");
        $units          = $this->input->post("units");
        $normal_range   = $this->input->post("normal_range");
        $abnormal_flag  = $this->input->post("abnormal_flag");
        $l_date_time    = date("Y-m-d H:i:s",strtotime($this->input->post("l_date_time")));
        $l_updated_by   = $this->input->post("l_updated_by");
        $patient_name   = $this->input->post("patient_name");
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");
        if ($loinc_code!=""||$discription!=""||$result_value!=""||$units!=""||$normal_range!=""||$abnormal_flag!="") {

            $labresult_data = array("loinc_code"=>$loinc_code,"description"=>$discription,"result_value"=>$result_value,"units"=>$units,"normal_range"=>$normal_range,"abnormal_flag"=>$abnormal_flag,"patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"date"=>date("Y-m-d H:i:s"),"labresult_datetime"=>$l_date_time);
            $result = $this->healthreport_model->save_labresult($labresult_data);
            if ($result) {
                //$healthrecord_data = array("date_time"=>$l_date_time,"patient_name"=>$patient_name,"updated_by"=>$l_updated_by ,"patient_id"=>$patient_ID);

               // $results = $this->healthreport_model->save_healthrecord($healthrecord_data);
                echo 1;exit;

            }else{
                echo 0;exit;
            }
        }
    }
    public function edit_labresult()
    {
        $patient_ID     = $this->input->post("patient_ID");
        $loinc_code     = $this->input->post("loinc_code");
        $discription    = $this->input->post("discription");
        $result_value   = $this->input->post("result_value");
        $units          = $this->input->post("units");
        $normal_range   = $this->input->post("normal_range");
        $abnormal_flag  = $this->input->post("cvx_code");
        $healthreport_labresult_id = $this->input->post("healthreport_labresult_id");

        $labresult_data = array("loinc_code"=>$loinc_code,"description"=>$discription,"result_value"=>$result_value,"units"=>$units,"normal_range"=>$normal_range,"abnormal_flag"=>$abnormal_flag,"patient_id"=>$patient_ID,"date"=>date("Y-m-d H:i:s"));

    $this->db->where('loinc_code_id',$healthreport_labresult_id);
        $result = $this->db->update('lab_result',$labresult_data);
        if ($result) {
            echo 1;exit;

        }else{
            echo 0;exit;
        }
    }
    public function save_imagingorder()
	{
		$patient_ID 		= $this->input->post("patient_ID");
		$cpt_code			= $this->input->post("cpt_code");
		$discription		= $this->input->post("imaging_order_description");
		$order_status		= $this->input->post("imaging_orders_status");
		$doctor_comments	= $this->input->post("doctor_comments");
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

		if($cpt_code!="" ||  $discription!="" || $order_status!="" || $doctor_comments!=""){

            if (isset($_FILES["scanned_result"]["name"]) && !empty($_FILES["scanned_result"]["name"]) ) {

                if ($_FILES["scanned_result"]["type"] == "application/pdf"  || $_FILES["scanned_result"]["type"] == "image/jpg" || $_FILES["scanned_result"]["type"] == "image/png"  || $_FILES["scanned_result"]["type"] == "image/jpeg") {
                    $scanned_result = $_FILES["scanned_result"]["name"];
                    $scanned_resultdocname = rand(999,9999)."_document".".".pathinfo($scanned_result, PATHINFO_EXTENSION);

                    $imagingorder_data = array("cpt_code"=>$cpt_code,"description"=>$discription,"order_status"=>$order_status,"scanned_result"=>$scanned_resultdocname,"doctor_comments"=>$doctor_comments,"patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"date"=>date("Y-m-d H:i:s"));

                    $result = $this->healthreport_model->save_imagingorder($imagingorder_data);
                    if ($result) {
                        $this->do_upload($scanned_resultdocname,'./assets/scanned_result_document','pdf|jpg|png|jpeg',"scanned_result");
                        echo 1;exit;
                    }else{
                        echo "0";exit;
                    }
                }
            }else{
                $imagingorder_data = array("cpt_code"=>$cpt_code,"description"=>$discription,"order_status"=>$order_status,"doctor_comments"=>$doctor_comments,"patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"date"=>date("Y-m-d H:i:s"));
                $result = $this->healthreport_model->save_imagingorder($imagingorder_data);
                //echo $this->db->last_query();exit;
                if ($result) {
                    echo 1;exit;
                }else{
                    echo "0";exit;
                }
            }
        }
    }
    public function edit_imagingorder()
    {
        $patient_ID         = $this->input->post("patient_ID");
        $cpt_code           = $this->input->post("cpt_code");
        $discription        = $this->input->post("imaging_order_description");
        $order_status       = $this->input->post("imaging_orders_status");
        $healthreport_imaging_id        = $this->input->post("healthreport_imaging_id");
        $doctor_comments    = $this->input->post("doctor_comments");

        if(isset($_FILES["scanned_result"]["name"]) &&  !empty($_FILES["scanned_result"]["name"]))
        {
            if ($_FILES["scanned_result"]["type"] == "application/pdf"  || $_FILES["scanned_result"]["type"] == "image/jpg" || $_FILES["scanned_result"]["type"] == "image/png"  || $_FILES["scanned_result"]["type"] == "image/jpeg") {

                $scanned_result = $_FILES["scanned_result"]["name"];
                $scanned_resultdocname = rand(999,9999)."_document".".".pathinfo($scanned_result, PATHINFO_EXTENSION);

                $imagingorder_data = array("cpt_code"=>$cpt_code,"description"=>$discription,"order_status"=>$order_status,"scanned_result"=>$scanned_resultdocname,"doctor_comments"=>$doctor_comments,"patient_id"=>$patient_ID,"date"=>date("Y-m-d H:i:s"));
                        //print_r($imagingorder_data);exit;

                $this->db->where('imaging_order_id',$healthreport_imaging_id);
                $result = $this->db->update('imaging_order',$imagingorder_data);

                if ($result) {
                    $this->do_upload($scanned_resultdocname,'./assets/scanned_result_document','pdf|jpg|png|jpeg',"scanned_result");
                    echo 1;exit;
                }else{
                    echo "0";exit;
                }
            }
        }else{
            $imagingorder_data = array("cpt_code"=>$cpt_code,"description"=>$discription,"order_status"=>$order_status,"doctor_comments"=>$doctor_comments,"patient_id"=>$patient_ID);
                      $this->db->where('imaging_order_id',$healthreport_imaging_id);
            $result = $this->db->update('imaging_order',$imagingorder_data);
            //echo $this->db->last_query();exit;
            if ($result) {
                echo 1;exit;
            }else{
                echo "0";exit;
            }
        }
    }
    public function save_e_prescription()
    {
        $patient_ID     = $this->input->post("patient_ID");
        $drug_name      = $this->input->post("drug_name");
        $prn    = $this->input->post("prn");
        $sign_note  = $this->input->post("sign_note");
        $sign           = $this->input->post("sign");
        $indication = $this->input->post("indication");
        $e_prescription_status  = $this->input->post("e_prescription_status");
        $appointment    = $this->input->post("appointment");
        $dispense_quantity  = $this->input->post("dispense_quantity");
        $dispense_package   = $this->input->post("dispense_package");
        $number_refills = $this->input->post("number_refills");
        $daw    = $this->input->post("daw");
        $pharmacy_note  = $this->input->post("pharmacy_note");
        $order_status   = $this->input->post("order_status");
        $notes  = $this->input->post("notes");
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

        if ($drug_name!=""|| $prn!=""|| $sign_note!=""|| $sign!=""|| $indication!=""|| $e_prescription_status!=""|| $appointment!="null" ||
            $dispense_quantity!="" || $dispense_package!="" || $number_refills!="" || $daw!="" || $pharmacy_note!="" || $order_status!="" || $notes!="") {

            $prescribe_date_time    = ($this->input->post("prescribe_date_time")!="-0001-11-30 12:00") ? date("Y-m-d h:i:s",strtotime($this->input->post("prescribe_date_time"))) : "";

            $started_taking_date_time    = ($this->input->post("started_taking_date_time")!="-0001-11-30 12:00") ? date("Y-m-d h:i:s",strtotime($this->input->post("started_taking_date_time"))) : "";

            $stopped_taking_date_time   = ($this->input->post("stopped_taking_date_time")!="-0001-11-30 12:00") ? date("Y-m-d h:i:s",strtotime($this->input->post("stopped_taking_date_time"))) : "";

            $e_prescription_data = array("drug_name"=>$drug_name,"sig"=>$sign,"datetime_stopped_taking"=>$stopped_taking_date_time,"number_refills"=>$number_refills,"pharmacy_note"=>$pharmacy_note,"notes"=>$notes,"prn"=>$prn,"indication"=>$indication,"datetime_prescribed"=>$prescribe_date_time,"dispense_quantity"=>$dispense_quantity,"daw"=>$daw,"order_status"=>$order_status,"sig_note"=>$sign_note,"status"=>$e_prescription_status,"datetime_started_taking"=>$started_taking_date_time,"dispense_package"=>$dispense_package,"date"=>date("Y-m-d H:i:s"),"appointment_id"=>$appointment,"healthrecord_id"=>$session_healthrecord_id,"patient_id"=>$patient_ID);
            $result = $this->healthreport_model->save_e_prescription($e_prescription_data);
            if ($result) {
                echo 1;exit;

            }else{
                echo 0;exit;
            }
        }
    }
/*edit **/
public function edit_e_prescription()
{
    $patient_ID     = $this->input->post("patient_ID");
    $drug_name      = $this->input->post("drug_name");
    $prn    = $this->input->post("prn");
    $sign_note  = $this->input->post("sign_note");
    $sign           = $this->input->post("sign");
    $indication = $this->input->post("indication");
    $e_prescription_status  = $this->input->post("e_prescription_status");
    $appointment    = $this->input->post("appointment");
    $prescribe_date_time    = date("Y-m-d h:i:s",strtotime($this->input->post("prescribe_date_time")));
    $started_taking_date_time   = date("Y-m-d h:i:s",strtotime($this->input->post("started_taking_date_time")));
    $stopped_taking_date_time   = date("Y-m-d h:i:s",strtotime($this->input->post("stopped_taking_date_time")));
    $dispense_quantity  = $this->input->post("dispense_quantity");
    $dispense_package   = $this->input->post("dispense_package");
    $number_refills = $this->input->post("number_refills");
    $daw    = $this->input->post("daw");
    $pharmacy_note  = $this->input->post("pharmacy_note");
    $order_status   = $this->input->post("order_status");
    $notes  = $this->input->post("notes");
    $e_prescription = $this->input->post("e_prescription");

    $e_prescription_data = array("drug_name"=>$drug_name,"sig"=>$sign,"datetime_stopped_taking"=>$stopped_taking_date_time,"number_refills"=>$number_refills,"pharmacy_note"=>$pharmacy_note,"notes"=>$notes,"prn"=>$prn,"indication"=>$indication,"datetime_prescribed"=>$prescribe_date_time,"dispense_quantity"=>$dispense_quantity,"daw"=>$daw,"order_status"=>$order_status,"sig_note"=>$sign_note,"status"=>$e_prescription_status,"datetime_started_taking"=>$started_taking_date_time,"dispense_package"=>$dispense_package,"date"=>date("Y-m-d H:i:s"),"appointment_id"=>$appointment,"patient_id"=>$patient_ID);

                    $this->db->where('e_prescription_id',$e_prescription);
        $result =  $this->db->update('e_prescription',$e_prescription_data);
        if ($result) {
            echo 1;exit;

        }else{
            echo 0;exit;
        }
}
    public function save_summary()
    {
        $summary    = $this->input->post("summary");
        $patient_ID     = $this->input->post("patient_ID");
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

        if ($summary!="") {
            $summary_data = array("summary"=>$summary,"patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"date"=>date("Y-m-d H:i:s"));
            $result = $this->healthreport_model->save_summary($summary_data);
            if ($result) {
                echo 1;exit;

            }else{
                echo 0;exit;
            }
        }

    }
    public function edit_summary()
    {
        $summary    = $this->input->post("summary");
        $patient_ID     = $this->input->post("patient_ID");
        $summary_id     = $this->input->post("summary_id");

        $summary_data = array("summary"=>$summary,"patient_id"=>$patient_ID,"date"=>date("Y-m-d H:i:s"));
        $this->db->where('id',$summary_id);
        $result = $this->db->update('healthreport_summary',$summary_data);
        if ($result) {
            echo 1;exit;

        }else{
            echo 0;exit;
        }
    }

    public function save_healthrecord(){
        $doctor_name                = ($this->input->post("doctor_name")!= "" )? $this->input->post("doctor_name") : "";
        $hr_datetime                = date("Y-m-d H:i:s");//$this->input->post("healtrecord_date_time");
        $healt_record_date_time     =  date("Y-m-d H:i:s",strtotime($hr_datetime));
        $patient_name               = ($this->input->post("patient_name")!="") ? $this->input->post("patient_name") : "";
        $updated_by                 = ($this->input->post("updated_by")!="") ? $this->input->post("updated_by") : "";
        $patient_ID                 = ($this->input->post("patient_ID")!="") ? $this->input->post("patient_ID") : "";
        $session_healthrecord_id    = "";

        if($this->session->userdata("healthrecord_ids") !=""){
            $session_healthrecord_id = $this->session->userdata("healthrecord_ids");
        }else{
            $healthrecord_id = "PHR-".rand(1111,9999).uniqid();
            $this->session->set_userdata("healthrecord_ids",$healthrecord_id);
            $session_healthrecord_id = $this->session->userdata("healthrecord_ids");
        }

        $healthrecord_data = array("doctor_name"=>$doctor_name,"date_time"=>$healt_record_date_time,"patient_name"=>$patient_name,"updated_by"=>$updated_by,"patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id);

        $result = $this->healthreport_model->save_healthrecord($healthrecord_data);
        if ($result) {
            echo 1;exit;

        }else{
            echo 0;exit;
        }
    }

    public function save_vaccines(){

        $patient_ID                 = $this->input->post("patient_ID");
        $vaccines                   = $this->input->post("vaccines");
        $schedule                   = $this->input->post("schedule");
        $vaccine                    = $this->input->post("vaccine");
        $cvx_code                   = $this->input->post("cvx_code");
        //$consent_form                 = $this->input->post("consent_form");
        $vis                        = $this->input->post("vis");
        $administreted_on           = $this->input->post("administreted_on");
        $administreted_by           = $this->input->post("administreted_by");
        $vaccinestatus              = $this->input->post("vaccinestatus");
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

        if ($vaccines!="" || $schedule!="" || $vaccine!="" || $cvx_code!="" || $vis!="" || $administreted_on!="" || $vaccinestatus!="") {
            $vaccines_data = array("vaccines"=>$vaccines,"schedule"=>$schedule,"vaccine"=>$vaccine,"cvxcode"=>$cvx_code ,"vis"=>$vis,"administreted_on"=>$administreted_on,"administreted_by"=>$administreted_by,"vaccines_status"=>$vaccinestatus,"patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"date"=>date("Y-m-d H:i:s"));
            $result = $this->healthreport_model->save_vaccines($vaccines_data);
            if ($result) {
                echo 1;exit;

            }else{
                echo 0;exit;
            }
        }
    }

    public function edit_Vaccines()
    {
        $vaccines_e_ID = $this->input->post("vaccines_e_ID");
        $patient_ID = $this->input->post("patient_ID");
        $vaccines = $this->input->post("vaccines");
        $schedule = $this->input->post("schedule");
        $vaccine = $this->input->post("vaccine");
        $cvx_code = $this->input->post("cvx_code");
        //$consent_form                 = $this->input->post("consent_form");
        $vis = $this->input->post("vis");
        $administreted_on = $this->input->post("administreted_on");
        $administreted_by = $this->input->post("administreted_by");
        $vaccinestatus = $this->input->post("vaccinestatus");

        $Vaccines_data = array("vaccines" => $vaccines,"schedule"=>$schedule,"vaccine"=>$vaccine,"cvxcode"=>$cvx_code,"vis"=>$vis,"administreted_on"=>$administreted_on,"administreted_by"=>$administreted_by,"vaccines_status"=>$vaccinestatus,"patient_id" => $patient_ID,"date"=>date("Y-m-d H:i:s"));
        $this->db->where('id', $vaccines_e_ID);
        $result = $this->db->update('healthreport_vaccines', $Vaccines_data);
        // echo $this->db->last_query();exit;
        if ($result) {
            echo 1;
            exit;

        } else {
            echo 0;
            exit;
        }
    }


    public function save_record_vaccinations(){
        //print_r($_POST);

        $patient_ID                 = $this->input->post("patient_ID");
        //$consent_form                 = $this->input->post("consent_form");
        $create_record              = $this->input->post("create_record");
        $cvx_code                   = $this->input->post("cvx_code");
        $name                       = $this->input->post("name");
        $cpt_code                   = $this->input->post("cpt_code");
        $manfacturer                = $this->input->post("manfacturer");
        $lot_num                    = $this->input->post("lot_num");

        $administered_amount        = $this->input->post("administered_amount");
        $vaccinate_route            = $this->input->post("vaccinate_route");
        $vaccinate_site             = $this->input->post("vaccinate_site");
        $vaccinate_status           = $this->input->post("vaccinate_status");

        $ordering_doctor            = $this->input->post("ordering_doctor");
        $administered_by            = $this->input->post("administered_by");
        $administered_at            = $this->input->post("administered_at");
        $inventory_lot              = $this->input->post("inventory_lot");
        $record_type                = $this->input->post("record_type");
        $funding_eligibility        = $this->input->post("funding_eligibility");
        $observed_immunity          = $this->input->post("observed_immunity");
        $record_vaccination_notes   = $this->input->post("record_vaccination_notes");
        $administered_units         = $this->input->post("administered_unit");
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

        $created_date = date('Y-m-d H:i:s');
        if($create_record!="" ||$cvx_code!="" ||$name!=""|| $cpt_code!=""||$manfacturer!="" ||$lot_num!="" ||  $administered_amount!="" || $vaccinate_site!="" || $vaccinate_status!="" ||  $ordering_doctor!="" || $administered_at !="" || $inventory_lot!="" ||$record_type!="null" || $funding_eligibility!="null" || $observed_immunity!="null" || $record_vaccination_notes!="" || $administered_units!="" ){

            $expirationdate   =  ($this->input->post("expirationdate")!= "-0001-11-30 12:00") ? date("Y-m-d h:i:s",strtotime($this->input->post("expirationdate"))) : "";

            $administred_on             = ($this->input->post("administred_on")!= "-0001-11-30 12:00") ? date("Y-m-d h:i:s",strtotime($this->input->post("administred_on"))) : "";

            $recordvaccinations = array("date"=>$created_date,"create_record_for"=>$create_record,"cvxcode"=>$cvx_code,"name"=>$name ,"cpt_code"=>$cpt_code,"manfacturer"=>$manfacturer,"expirationdate"=>$expirationdate,"lot_num"=>$lot_num,"administered_amount"=>$administered_amount,"vaccinate_route"=>$vaccinate_route,"vaccinate_route"=>$vaccinate_route,"vaccinate_site"=>$vaccinate_site,"vaccinate_status"=>$vaccinate_status,"administred_on"=>$administred_on,"ordering_doctor"=>$ordering_doctor,"administered_by"=>$administered_by,"administered_at"=>$administered_at,"inventory_lot"=>$inventory_lot,"record_type"=>$record_type,"funding_eligibility"=>$funding_eligibility,"observed_immunity"=>$observed_immunity,"record_vaccination_notes"=>$record_vaccination_notes,"administered_units"=>$administered_units,"healthrecord_id"=>$session_healthrecord_id,"patient_id"=>$patient_ID);

            //print_r($recordvaccinations);exit;
            $result = $this->healthreport_model->save_record_vaccinations($recordvaccinations);
            if ($result) {
                echo 1;exit;

            }else{
                echo 0;exit;
            }
        }

    }
    public function edit_record_vaccinations(){

        $patient_ID                 = $this->input->post("patient_ID");
        //$consent_form                 = $this->input->post("consent_form");
        $create_record              = $this->input->post("create_record");
        $cvx_code                   = $this->input->post("cvx_code");
        $name                       = $this->input->post("name");
        $cpt_code                   = $this->input->post("cpt_code");
        $manfacturer                = $this->input->post("manfacturer");
        $lot_num                    = $this->input->post("lot_num");
        $expirationdate             =  date("Y-m-d h:i:s",strtotime($this->input->post("expirationdate")));
        $administered_amount        = $this->input->post("administered_amount");
        $vaccinate_route            = $this->input->post("vaccinate_route");
        $vaccinate_site             = $this->input->post("vaccinate_site");
        $vaccinate_status           = $this->input->post("vaccinate_status");
        $administred_on             = date("Y-m-d h:i:s",strtotime($this->input->post("administred_on")));
        $ordering_doctor            = $this->input->post("ordering_doctor");
        $administered_by            = $this->input->post("administered_by");
        $administered_at            = $this->input->post("administered_at");
        $inventory_lot              = $this->input->post("inventory_lot");
        $record_type                = $this->input->post("record_type");
        $funding_eligibility        = $this->input->post("funding_eligibility");
        $observed_immunity          = $this->input->post("observed_immunity");
        $record_vaccination_notes   = $this->input->post("record_vaccination_notes");
        $administered_units         = $this->input->post("administered_unit");
        $record_vaccinations_id         = $this->input->post("record_vaccinations_id");

        $recordvaccinations = array("create_record_for"=>$create_record,"cvxcode"=>$cvx_code,"name"=>$name ,"cpt_code"=>$cpt_code,"manfacturer"=>$manfacturer,"expirationdate"=>$expirationdate,"lot_num"=>$lot_num,"administered_amount"=>$administered_amount,"vaccinate_route"=>$vaccinate_route,"vaccinate_route"=>$vaccinate_route,"vaccinate_site"=>$vaccinate_site,"vaccinate_status"=>$vaccinate_status,"administred_on"=>$administred_on,"ordering_doctor"=>$ordering_doctor,"administered_by"=>$administered_by,"administered_at"=>$administered_at,"inventory_lot"=>$inventory_lot,"record_type"=>$record_type,"funding_eligibility"=>$funding_eligibility,"observed_immunity"=>$observed_immunity,"record_vaccination_notes"=>$record_vaccination_notes,"administered_units"=>$administered_units,"patient_id"=>$patient_ID,"date"=>date("Y-m-d H:i:s"));

        //print_r($recordvaccinations);exit;
        $this->db->where('id',$record_vaccinations_id);
        $result = $this->db->update('healthreport_recordvaccinations',$recordvaccinations);
        if ($result) {
            echo 1;exit;

        }else{
            echo 0;exit;
        }
    }
    public function save_clinical_notes(){
        $patient_ID      = $this->input->post('patient_ID');

        $locked_by       = $this->input->post('locked_by');
        $locked_on       =  $this->input->post('locked_on');
        $lockedaction    =  $this->input->post('lockedaction');
        $lockedstatus    = $this->input->post('lockedstatus');
        $locked_reason   = $this->input->post('locked_reason');
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

        if ( $locked_by!="" || $locked_on!="" || $lockedaction!="" || $lockedstatus!="" || $lockedreason!="") {
            $date_of_service = ($this->input->post('date_of_service')!= "-0001-11-30 12:00") ? date("Y-m-d h:i:s",strtotime($this->input->post('date_of_service'))) : "";
            $clinical_notes = array("patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"date_of_service"=>$date_of_service,"locked_by"=>$locked_by,"locked_on"=>$locked_on,"action"=>$lockedaction ,"status"=>$lockedstatus,"reason"=>$locked_reason,"date"=>date("Y-m-d H:i:s"));
            //print_r($clinical_notes);exit;
            $result = $this->healthreport_model->save_clinical_notes($clinical_notes);
            if ($result) {
                echo 1;exit;
            }else{
                echo 0;exit;
            }
        }
    }

    public function edit_clinical_notes(){
        $patient_ID      = $this->input->post('patient_ID');
        $date_of_service = date("Y-m-d h:i:s",strtotime($this->input->post('date_of_service')));
        $locked_by       = $this->input->post('locked_by');
        $locked_on       =  $this->input->post('locked_on');
        $lockedaction    =  $this->input->post('lockedaction');
        $lockedstatus    = $this->input->post('lockedstatus');
        $locked_reason   = $this->input->post('locked_reason');
        $locked_id   = $this->input->post('locked_id');

        $clinical_notes = array("patient_id"=>$patient_ID,"date_of_service"=>$date_of_service,"locked_by"=>$locked_by,"locked_on"=>$locked_on,"action"=>$lockedaction ,"status"=>$lockedstatus,"reason"=>$locked_reason,"date"=>date("Y-m-d H:i:s"));
        //print_r($clinical_notes);exit;
        $this->db->where('id',$locked_id);
        $result =  $this->db->update('healthreport_lockedclinicalnotes',$clinical_notes);
        if ($result) {
            echo 1;exit;

        }else{
            echo 0;exit;
        }

    }

    public function save_singed_consent(){
        $patient_ID              = $this->input->post('patient_ID');
        //$consent_form          = $this->input->post('consent_form');
        $singnature_action       = $this->input->post('singnature_action');
        //"consent_form"=>$consent_form
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");
        if($singnature_action !=""){
            $appointment_datetime    =  ($this->input->post('appointment_datetime')!= "-0001-11-30 12:00") ? date("Y-m-d h:i:s",strtotime($this->input->post('appointment_datetime'))) : "";
            $singnature_date         = ($this->input->post('singnature_date')!= "-0001-11-30 12:00") ? date("Y-m-d h:i:s",strtotime($this->input->post('singnature_date'))) : "";

            $clinical_notes = array("patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"appointment_datetime"=>$appointment_datetime,"singnature_date"=>$singnature_date,"singnature_action"=>$singnature_action ,"date"=>date("Y-m-d H:i:s"));
            //print_r($clinical_notes);exit;
            $result = $this->healthreport_model->save_singed_consent($clinical_notes);
            if ($result) {
                echo 1;exit;

            }else{
                echo 0;exit;
            }
        }

    }
    public function edit_singed_consent(){
        $patient_ID      = $this->input->post('patient_ID');
        //$consent_form          = $this->input->post('consent_form');
        $appointment_datetime       =  date("Y-m-d h:i:s",strtotime($this->input->post('appointment_datetime')));
        $singnature_date = date("Y-m-d h:i:s",strtotime($this->input->post('singnature_date')));
        $singnature_action    = $this->input->post('singnature_action');
        $singed_consent_forms_id    = $this->input->post('singed_consent_forms_id');
        //"consent_form"=>$consent_form
        $clinical_notes = array("patient_id"=>$patient_ID,"appointment_datetime"=>$appointment_datetime,"singnature_date"=>$singnature_date,"singnature_action"=>$singnature_action ,"date"=>date("Y-m-d H:i:s"));
        //print_r($clinical_notes);exit;
        $this->db->where('id',$singed_consent_forms_id);
        $result = $this->db->update('healthreport_singedconsentforms',$clinical_notes);   //$this->healthreport_model->save_singed_consent($clinical_notes);
        if ($result) {
            echo 1;exit;

        }else{
            echo 0;exit;
        }
    }
    public function save_lab_result(){
        $patient_ID     = $this->input->post('patient_ID');
        $lab            = $this->input->post('document_lab');
        $action         = $this->input->post('document_labaction');
        $abnormal       = $this->input->post('document_abnormal');
        $result_count   = $this->input->post('document_result_count');
        $test           = $this->input->post('document_test');
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

        if($lab !="" || $abnormal !="" ||  $action !="" || $result_count !="" || $test!=""){
            $date    = ($this->input->post('document_labdate_time')!="-0001-11-30 12:00") ?  date("Y-m-d h:i:s",strtotime($this->input->post('document_labdate_time'))) : "";

            $lab_result = array("patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"lab"=>$lab,"date"=>$date,"action"=>$action,"abnormal"=>$abnormal ,"result_count"=>$result_count,"test"=>$test,"date"=>date("Y-m-d H:i:s"));
            //print_r($lab_result);exit;
            $result = $this->healthreport_model->save_lab_result($lab_result);
            if ($result) {
                echo 1;exit;
            }else{
                echo 0;exit;
            }
        }

    }
    public function edit_lab_result(){
        $patient_ID     = $this->input->post('patient_ID');
        $lab            = $this->input->post('document_lab');
        $date           =  date("Y-m-d h:i:s",strtotime($this->input->post('document_labdate_time')));
        $action         = $this->input->post('document_labaction');
        $abnormal       = $this->input->post('document_abnormal');
        $result_count   = $this->input->post('document_result_count');
        $test           = $this->input->post('document_test');
        $document_labresult_id          = $this->input->post('document_labresult_id');

        $lab_result = array("patient_id"=>$patient_ID,"lab"=>$lab,"date"=>$date,"action"=>$action,"abnormal"=>$abnormal ,"result_count"=>$result_count,"test"=>$test,"created_date"=>date("Y-m-d h:i:s"));
        //print_r($lab_result);exit;
        $this->db->where('id',$document_labresult_id);
        $result = $this->db->update('document_labresult',$lab_result); //$this->healthreport_model->save_lab_result($lab_result);
        if ($result) {
            echo 1;exit;
        }else{
            echo 0;exit;
        }
    }
    public function save_amendments() {
        $patient_ID                 = $this->input->post('patient_ID');
        $amendment_source           = $this->input->post('amendment_source');
        $amendment_status           = $this->input->post('amendment_status');
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

        if($amendment_source !="" || $amendment_status !="" ){
            $amdments_date_time         = ($this->input->post('amdments_date_time')!= "-0001-11-30 12:00" ) ? date("Y-m-d h:i:s",strtotime($this->input->post('amdments_date_time'))) : "";
            $amdmentsproccess_date_time = ($this->input->post('amdmentsproccess_date_time')!="") ? date("Y-m-d h:i:s",strtotime($this->input->post('amdmentsproccess_date_time'))) : "";


            $data = array("patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"amendment_source"=>$amendment_source,"amendment_status"=>$amendment_status,"amdments_date_time"=>$amdments_date_time,"amdmentsproccess_date_time"=>$amdmentsproccess_date_time,"date"=>date("Y-m-d H:i:s"));
            $sql = $this->db->insert("healthreport_amendments",$data);
            if ($sql) {
                echo "1";exit;
            }else{
                echo "0";exit;
            }
        }
    }

    public function edit_amendments() {
        $patient_ID                 = $this->input->post('patient_ID');
        $amendment_source           = $this->input->post('amendment_source_e');
        $amendment_status           = $this->input->post('amendment_status_e');
        $amdments_id            = $this->input->post('amdments_id');
        $amdments_date_time         = date("Y-m-d h:i:s",strtotime($this->input->post('amdments_date_time_e')));
        $amdmentsproccess_date_time = date("Y-m-d h:i:s",strtotime($this->input->post('amdmentsproccess_date_time_e')));
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

        if(isset($_FILES["amendments_doc_e"]["name"]))
        {
            if ($_FILES["amendments_doc_e"]["type"] == "application/pdf") {

                $amendments_doc = $_FILES["amendments_doc_e"]["name"];
                $amendments_docname = rand(999,9999)."_amendments_doc".".".pathinfo($amendments_doc, PATHINFO_EXTENSION);
                $data = array("patient_id"=>$patient_ID,"amendments_doc"=>$amendments_docname,"amendment_source"=>$amendment_source,"amendment_status"=>$amendment_status,"amdments_date_time"=>$amdments_date_time,"amdmentsproccess_date_time"=>$amdmentsproccess_date_time,"date"=>date("Y-m-d H:i:s"));

                $this->db->where('id',$amdments_id);
                $sql =  $this->db->update('healthreport_amendments',$data);
                if ($sql) {
                    $this->do_upload($amendments_docname,'./assets/amdments_doc','pdf',"amendments_doc");

                }
            }else{
                echo "0";exit;
            }

        }
    }

    public function save_uploaddocument() {
        $patient_ID                 = $this->input->post('patient_ID');
        $document_type              = $this->input->post('document_type');
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

        if(isset($_FILES["document_document"]["name"]))
        {
            if ($_FILES["document_document"]["type"] == "application/pdf"  || $_FILES["document_document"]["type"] == "image/jpg" || $_FILES["document_document"]["type"] == "image/png"  || $_FILES["document_document"]["type"] == "image/jpeg") {

                $document_doc = $_FILES["document_document"]["name"];
                $document_docname = rand(999,9999)."_document".".".pathinfo($document_doc, PATHINFO_EXTENSION);
                $data = array("patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"document_document"=>$document_docname,"document_type"=>$document_type,"date"=>date("Y-m-d H:i:s"));

                $sql = $this->db->insert("healthreport_document",$data);
                if ($sql) {
                    $this->do_upload($document_docname,'./assets/upload_document','pdf|jpg|png|jpeg',"document_document");

                }
            }else{
                echo "0";exit;
            }

        }
    }
    public function edit_document_form() {
        $patient_ID                 = $this->input->post('patient_ID');
        $document_type              = $this->input->post('document_type_e');
        $healthreport_document_id               = $this->input->post('healthreport_document_id_e');

        if(isset($_FILES["document_document_e"]["name"]))
        {
            if ($_FILES["document_document_e"]["type"] == "application/pdf"  || $_FILES["document_document_e"]["type"] == "image/jpg" || $_FILES["document_document_e"]["type"] == "image/png"  || $_FILES["document_document_e"]["type"] == "image/jpeg") {

                $document_doc = $_FILES["document_document_e"]["name"];
                $document_docname = rand(999,9999)."_document".".".pathinfo($document_doc, PATHINFO_EXTENSION);
                $data = array("patient_id"=>$patient_ID,"document_document"=>$document_docname,"document_type"=>$document_type,"date"=>date("Y-m-d H:i:s"));
                //print_r($data);exit;
                $this->db->where('id',$healthreport_document_id);
                $sql =  $this->db->update('healthreport_document',$data);
                echo $this->db->last_query();exit;
                if ($sql) {
                    $this->do_upload($document_docname,'./assets/upload_document','pdf|jpg|png|jpeg',"document_document_e");

                }
            }else{
                echo "0";exit;
            }

        }
    }

    public function save_review_sing(){
        $patient_ID             = $this->input->post('patient_ID');
        $printname              = $this->input->post('printname');
        $singnature     =  $_REQUEST['singnatureImage'];

        $data = str_replace('data:image/png;base64,', '', $singnature);
        $data = str_replace(' ', '+', $data);
        $data = base64_decode($data);
        $file =     'assets/reviewsing_document/'.rand().'_reviewsing'.'.png';
        $success = file_put_contents($file, $data);
        $session_healthrecord_id = $this->session->userdata("healthrecord_ids");

        if(isset($_FILES["review_document"]["name"]))
        {
            if ($_FILES["review_document"]["type"] == "application/pdf"  || $_FILES["review_document"]["type"] == "image/jpg" || $_FILES["review_document"]["type"] == "image/png"  || $_FILES["review_document"]["type"] == "image/jpeg") {

                $reivew_doc = $_FILES["review_document"]["name"];
                $reivew_docname = rand(999,9999)."_reviewsingdocument".".".pathinfo($reivew_doc, PATHINFO_EXTENSION);
                $data = array("patient_id"=>$patient_ID,"healthrecord_id"=>$session_healthrecord_id,"reviewsing_document"=>$reivew_docname,"printname"=>$printname,"signture_image"=>$file,"date"=>date("Y-m-d H:i:s"));

                $sql = $this->db->insert("healthreport_reviewsign",$data);
                if ($sql) {
                    $this->do_upload($reivew_docname,'./assets/reviewsing_document','pdf|jpg|png|jpeg',"review_document");
                }
            }else{
                echo "0";exit;
            }

        }
    }


    public function do_upload($filename,$path,$type,$controlname){

        $config['upload_path']          = $path;
        $config['allowed_types']        = $type;
        $config['file_name']            = $filename;
        $config['remove_spaces']        = FALSE;
        $config['encrypt_name']         = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($controlname)){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);exit;
        }else{
            $data = array('upload_data' => $this->upload->data());
            //print_r($data);exit;
        }
    }
}
