<link href="<?php echo base_url(); ?>assets/css/health_report/style.css" rel="stylesheet" type="text/css" />

 <link rel="stylesheet"    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"

    integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all"   rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<style>
   #overlay {
    background: #00000085;
    color: #666666;
    position: fixed;
    height: 100%;
    width: 100%;
    z-index: 99999;
    top: 0;
    left: 0;
    float: left;
    text-align: center;
    padding-top: 25%;
    display: none;
    /* opacity: 0.4; */
}
	.loader {
    margin-top: 0;
    margin-left: 666px;
    z-index: 9999999999;
    border: 16px solid #d2d2d2;
    border-radius: 50%;
    border-top: 16px solid #150aec;
    width: 120px;
    height: 120px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
    position: absolute;
    /*display: none;*/
}
	.modal {
    	z-index: 9999;
	}
	.vital-sign th {
    font-size: 13px;
	}
	.select2-container {
        z-index: 99999;
        width: 100% !important;
    }
    .select2-dropdown {
        z-index:99999;
    }
    .canvasjs-chart-credit {

      display: none;

    }
    .scroll-responsive {
	   overflow-x: scroll;
	   display: block;
    }

    .chart-box {

      background: #fff;

      border-radius: 10px;

      box-shadow: 0px 7px 9px -2px #d4d4d4;

      padding: 15px;

      margin: 20px 0px;

    }



    .chart-box span {

      color: #1e12c9;

      padding-bottom: 10px;

      border-bottom: 1px solid #ccc;

      font-size: 14px;

      font-weight: 500;

    }



    .pl-30 {

      padding-left: 30px;

    }



    .pr-30 {

      padding-right: 30px;

    }

.nav>li>a {
  padding: 7px 14px !important;
}


    /***Chart-CSS**/

    .overflow-hidden {

      overflow: hidden !important;

    }



    .card-box {

      position: relative;

      display: flex;

      -ms-flex-direction: column;

      flex-direction: column;

      min-width: 0;

      word-wrap: break-word;

      background-color: #fff;

      background-clip: border-box;

      border: 1px solid rgba(107, 122, 144, 0.3);

      border-radius: 4px;

      margin-bottom: 20px;

      width: 100%;

    }




    .card-body {

      -ms-flex: 1 1 auto;

      flex: 1 1 auto;

      margin: 0;

      padding: 10px;

      position: relative;

    }



    .d-flex {

      display: flex !important;

    }



    .mb-1,

    .my-1 {

      margin-bottom: 0.25rem !important;

    }



    .fs-2 {

      font-size: 18px;

      margin-bottom: 5px;

      color: #150aec;

    }



    .text-muted {

      color: #9aa0ac !important;

    }



    .card-body> :last-child {

      margin-bottom: 0;

    }



    .h-8 {

      height: 70px !important;

    }



    .chartjs-render-monitor {

      -webkit-animation: chartjs-render-animation 0.001s;

      animation: chartjs-render-animation 0.001s;

    }



    .profile-box {

      background-color: #fff;

      border: 1px solid #ccc;

      border-radius: 10px;

      padding: 10px;

      margin: 15px;

    }



    /* .profile img {

 width: 80px;

 height: 80px;

} */

    .text-profile span {

      font-size: 15px;

      color: #528BE8;
      margin-left: 10px;

    }

.profile-box h3 {
  margin-left: 10px;
}


    .text-profile label {

      /* color: #000; */

      font-size: 15px;
       margin-left: 10px;

    }



    .mt-15 {

      margin-top: 15px;

    }



    .appointment-box {

      background: #fff;

      padding: 15px;

      border: 1px solid #ccc;

    }



    .image-upload>input {

      display: none;

    }



    .modal-dialog {

      width: 1260px;

    }



    .modal-body {

      height: 450px;

      max-height: 800px;

      overflow-y: auto;
      min-height: 500px;

    }



    .text-center {

      text-align: center !important;

    }



    datalist {

      width: 100%;

    }



    .dis-flex {

      display: flex;

    }



    .jusify-space {

      justify-content: space-between;

    }



    .check-details-normal {

      color: #1ba526;

      font-size: 13px;

      position: relative;

      top: 9px;

    }



    .check-details-high {

      color: #ef0000;

      font-size: 13px;

      position: relative;

      top: 9px;

    }



    .check-details-low {

      color: #5686e7;

      font-size: 13px;

      position: relative;

      top: 9px;

    }



    /* Autocomplete For Loinc Code */

    .autocomplete-items {

      position: absolute;

      border: 1px solid #d4d4d4;

      border-bottom: none;

      border-top: none;

      z-index: 99999;

      top: 92%;

      left: 0;

      right: 0;

      margin-left: 6px;

      width: 97.5%;
      color: #421de8;
      /*height: 300px;*/
      overflow-y: auto;

    }



    .autocomplete-items div {

      padding: 10px;

      cursor: pointer;

      background-color: #fff;

      border-bottom: 1px solid #d4d4d4;

    }

    .autocomplete-active {
        background-color: #150aec !important;
        color: #ffffff;
    }
    .autocomplete-items div:hover{
        background-color:#e9e9e9 !important;
    }

    .profile img {

      width: 100%;

    }

    @media only screen and (max-width:1390px) {

      .nav>li>a {

        padding: 10px 5px;

      }

      .profile img {

    width: 100%;

    margin-top: 10px;

      }

      /* .nav-tabs>li {

        max-width: 185px;

    word-break: break-all;

      } */

    }
    .bottom-top {
          position: relative;
    width: 100%;
    display: inline-table;
    margin-top: 90px;
    left: 0px;
    bottom: 0;
    }
    /*.add-box {
      display: none;
    }*/
    .table-box {
    	display: none;
    }
       .right-pull {
          float: right;
              position: relative;
    bottom: 27px;
              padding-left: 50px;
    padding-right: 10px;
      }
      .right-pull i {
          font-size: 25px;
              color: #2116ed;
             position: absolute;
    right: 4px;
      }
      .w-66 {
          width: 100%;
              position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
      }
      .w-33 {
              width: 33.33333333%;
              position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
      }
      .dis-inline-flex {
          display: inline-flex;
          width: 100%;
      }
      .panel-group a:hover, a:focus {
      	color: #150aec;
      }

    /*  #get_scheduleappointment p {
            color: #150aec;
      }*/
      .color-blue a {
        color: #528be7 !important;
      }
      .color-blue>li.active>a {
         border-bottom: 3px solid #528be7 !important;
      }
      .color-blue>li.active>a, .color-blue>li.active>a:hover, .color-blue>li.active>a:focus {
        border-bottom: 3px solid #528be7 !important;
         color: #528be7 !important;
      }
      .select2-container--default .select2-selection--single .select2-selection__rendered {
      	color: #5785e8 !important;
      }
      .select2-container--default .select2-selection--single {
      	border: 1px solid #e1e1e1 !important;
      }
      .form-control, input[type=file],  .appointment-box h4, .blue-color, .file-drop-zone-title  {
      	color: #5785e8;
      }
      .select2-results__option[aria-selected] {
        color: #5785e8;
      }
      .form-group label  {
        font-size: 14px;
      }

@media print
{
  .print_table table { page-break-after:auto }
  .print_table tr    { page-break-inside:avoid; page-break-after:auto }
  .print_table td    { page-break-inside:avoid; page-break-after:auto }
  .print_table thead { display:table-header-group }
  .print_table tfoot { display:table-footer-group }
}

  </style>

<div class="col-lg-12">

          <section class="box nobox marginBottom0">

            <div class="content-body">

              <div class="clearfix"></div>

              <div class="col-lg-12 p-0">

                <div class="row">

                  <div class="col-lg-8">

                    <!-- <div style="position:relative;bottom:5px;"> <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search" aria-hidden="true"  style="margin-left: 1px;position: relative;left:24px;top:28px;"></span>

                      <input list="searchbar" name="searchbar" style="padding-left: 3em; width: 100%; height: 100%; border: 1px solid #ccc;margin-left: 15px;" class="form-control flexdatalist" placeholder="Search Patients..." >

                      <datalist id="searchbar" style="height: 34px;width: 800px;">

                        <option value="Michael Cassano">

                        <option value="Janet Martinez">

                        <option value="Linda Guillen">

                        <option value="Steven Cornwell">

                        <option value="John Wade">

                      </datalist>

                    </div> -->




                    <!-- <div class="autocomplete" style="position:relative;bottom:5px;">

                      <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search" aria-hidden="true"

                        style="margin-left: 1px;position: relative;left:24px;top:28px;"></span>

                      <!-- <input id="search-patient" type="text" name="search_patient_name" placeholder="Search Patient..."

                        style="padding-left: 3em; width: 100%; height: 100%; border: 1px solid #ccc;margin-left: 15px;"

                        class="form-control flexdatalist search_patient_name" placeholder="Search Patients..." onkeyup="return get_patient_autocomplete()" autocomplete="off"> -->
                      <!--  <div id='search-patientautocomplete-list' class='autocomplete_items white-box' style="display: none;margin-left: 25px;"></div>


                    </div>
                    	<div class="Patient_errormsg">         </div> -->
                  </div>





                </div>

              </div>

              <div class="col-lg-12 p-0">

              <ul class="nav nav-tabs">

                <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>

                <li><a data-toggle="tab" href="#vital-sign">Vital Sign</a></li>

                <li><a data-toggle="tab" href="#problem-allergies-list">Allergies List</a></li>

                <li><a data-toggle="tab" href="#lab-result">Lab Result</a></li>

                <li><a data-toggle="tab" href="#imaging-order">Imaging Order</a></li>

                <li><a data-toggle="tab" href="#e-prescription-medication">E-prescription/Medication</a></li>

                <li><a data-toggle="tab" href="#immunization">Immunizations</a></li>

                <li><a data-toggle="tab" href="#summary">Summary</a></li>

                <li><a data-toggle="tab" href="#document">Document</a></li>

                <li><a data-toggle="tab" href="#add-health-record">Health Record</a></li>

              </ul>
                              <div class="right-pull"   id="icon-bell">
              <a> <i class="fa fa-bell"></i></a>
            </div>

              </div>

              <div class="dis-inline-flex">

              <div class="w-66" id="menu" style="overflow-x: auto;">

              <div class="tab-content">
                <div id="profile" class="tab-pane fade in active">

                   <section class="patient_profile">
                     <div class='profile-box'>
                                            <div class='row' style='border-bottom:1px solid #ccc;padding:10px 0px;margin:0px -11px;'>
                                              <div class='col-lg-2 col-md-2 profile'>
                                                <img src="<?php echo $profile_picture; ?>" alt='Profile Image'>
                                              </div>

                                              <div class='col-12 col-md-10'>

                                                <div class='row'>
                                                  <div class='col-12 col-md-11'>
                                                    <h3 style='color: #150aec;font-weight: 600;'><?php echo $patient_list->prefix."  ".$patient_list->fname."  ".$patient_list->lname; ?></h3>
                                                  </div>

                                                  <!--<div class='col-12 col-md-1 text-right' style='margin-top:10px;'>
                                                    <div style='text-align: right;' class='btn-group'>
                                                      <a id='edit_p' href='#' class='btn btn-xs icon-box'><i class='fa fa-edit'></i></a>
                                                    </div>
                                                  </div>-->
                                                </div>

                                                <div class='row'>
                                                  <div class='col-12 col-md-3'>
                                                    <div class='text-profile'>
                                                      <span>Bloodtype : </span><label><?php echo $vital_datail->bloodtype; ?></label>
                                                    </div>
                                                  </div>
                                                  <div class='col-12 col-md-3'>
                                                    <div class='text-profile'>
                                                      <span>Height : </span><label><?php echo $vital_datail->height; ?> in</label>
                                                    </div>
                                                  </div>
                                                  <div class='col-12 col-md-3'>
                                                    <div class='text-profile'>
                                                      <span>Weight : </span><label> <?php echo $vital_datail->weight; ?> lb</label>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>



                                            <div class='row'>

                                              <div class='col-12 col-md-6'>

                                                <div class='text-profile mt-15'>

                                                  <span>Birthday : </span><label><?php echo date('M d,Y',strtotime($patient_list->date_of_birth))." (".$from->diff($to)->y; ?> y.o.)</label>

                                                </div>

                                              </div>

                                              <div class='col-12 col-md-6'>

                                                <div class='text-profile mt-15'>

                                                  <span>Address : </span><label><?php echo $patient_list->address1; ?></label>

                                                </div>

                                              </div>

                                            </div>

                                            <div class='row'>

                                              <div class='col-12 col-md-6'>

                                                <div class='text-profile mt-15'>

                                                  <span style='padding-right:14px;'>Phone : </span><label> <?php echo '+'. $patient_list->mobile_prefix." ".$patient_list->mobile; ?></label>

                                                </div>

                                              </div>

                                              <div class='col-12 col-md-6'>

                                                <div class='text-profile mt-15'>

                                                  <span style='padding-right:18px;'>Email : </span><label> <?php echo $patient_list->email; ?> </label>

                                                </div>

                                              </div>

                                            </div>

                                            <div class='row'>

                                              <div class='col-12 col-md-6'>

                                                <div class='text-profile mt-15'>

                                                  <span style='padding-right:18px;'>Policy Number / Insurance Id: </span><label> <?php echo $insurance_detail->insurance_id; ?></label>

                                                </div>

                                              </div>

                                            </div>
                                        </div>
                                       </section>
									   <?php
											$patient_detail = $this->db->select("*")->from("patient")->where("id",$this->session->userdata('user_id'))->get()->row();
											$feature = $this->db->select("*")->from("user")->where("user_id",$patient_detail->hospital_id)->get()->row();

											$features_array = explode(',',$feature->features);
											$growth_chart_style = "style='display:none'";
											if(in_array('growth_charts',$features_array)){
												$growth_chart_style = "style='display:block'";
											}
									   ?>

                					<div class="row mt-15" <?php echo $growth_chart_style?>>

                                      <div class="col-xl-3 col-lg-3 pl-30">

                                        <div class="card-box overflow-hidden">

                                          <div class="card-body pb-0">

                                            <div class="dis-flex jusify-space">

                                              <h2 class="fs-2 mb-2">Temperature(°F)</h2>
<?php
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
} ?>

                                              <span class="<?php echo $st; ?>"><?php echo $temperature; ?></span>

                                            </div>



                                            <p class="mb-1" style="color:#528be7"><?php echo $vital_datail->temperature; ?> degree</p>

                                            <div class="chart-wrapper mt-3">

                                              <canvas id="AreaChart4" class="h-8"></canvas>

                                            </div>

                                          </div>

                                        </div>

                                      </div>
                                      <?php
                                      $heartrate ="";
                                      $st ="";
                                       if($vital_datail->heart_rate >= 60 and $vital_datail->heart_rate <= 100){
                                           $heartrate = "Normal";
                                           $st = "check-details-normal";

                                      }else if($vital_datail->heart_rate >= 100){
                                        $heartrate = "High";
                                        $st = "check-details-high";
                                      }else if($vital_datail->heart_rate <= 60){
                                        $heartrate = "Low";
                                        $st = "check-details-low";
                                      } ?>
                                      <div class="col-xl-3 col-lg-3">

                                        <div class="card-box overflow-hidden">

                                          <div class="card-body pb-0">

                                            <div class="dis-flex jusify-space">

                                              <h2 class="fs-2 mb-2">Heart Rate /Pulse (bpm)</h2>

                                              <span class="<?php echo $st; ?>"><?php echo $heartrate; ?></span>

                                            </div>

                                            <p class="mb-1" style="color:#528be7"> <?php echo $vital_datail->heart_rate; ?> bpm</p>

                                            <div class="chart-wrapper mt-3">

                                              <canvas id="AreaChart5" class="h-8"></canvas>

                                            </div>

                                          </div>

                                        </div>

                                      </div>
                                      <?php
                                      $blood_pressure ="";
                                      $st ="";
                                       if($vital_datail->blood_pressure >= 60 and $vital_datail->blood_pressure <= 120){
                                           $blood_pressure = "Normal";
                                           $st = "check-details-normal";

                                      }else if($vital_datail->blood_pressure >= 120 and $vital_datail->blood_pressure <= 139){
                                        $blood_pressure = "High";
                                        $st = "check-details-high";
                                      }else if($vital_datail->blood_pressure <= 60){
                                        $blood_pressure = "Low";
                                        $st = "check-details-low";
                                      } ?>
                                      <div class="col-xl-3 col-lg-3">

                                        <div class="card-box bg-gradient-secondary overflow-hidden">

                                          <div class="card-body pb-0">

                                            <div class="dis-flex jusify-space">

                                              <h2 class="fs-2 mb-2">Blood Pressure (mmHg)</h2>

                                              <span class="<?php echo $st; ?>"><?php echo $blood_pressure; ?></span>

                                            </div>

                                            <p class="mb-1" style="color:#528be7"><?php echo $vital_datail->blood_pressure; ?> mmHg</p>

                                            <div class="chart-wrapper mt-3">

                                              <canvas id="AreaChart6" class="h-8"></canvas>

                                            </div>

                                          </div>

                                        </div>

                                      </div>
                                      <?php
                                      $respiratory_rate ="";
                                      $st ="";
                                       if($vital_datail->respiratory_rate >= 12 and $vital_datail->respiratory_rate <= 16){
                                           $respiratory_rate = "Normal";
                                           $st = "check-details-normal";

                                      }else if($vital_datail->respiratory_rate >= 16 ){
                                        $respiratory_rate = "High";
                                        $st = "check-details-high";
                                      }else if($vital_datail->respiratory_rate <= 12){
                                        $respiratory_rate = "Low";
                                        $st = "check-details-low";
                                      } ?>
                                      <div class="col-xl-3 col-lg-3 pr-30">

                                        <div class="card-box overflow-hidden">

                                          <div class="card-body pb-0">

                                            <div class="dis-flex jusify-space">

                                              <h2 class="fs-2 mb-2">Respiratory Rate (rpm)</h2>

                                              <span class="<?php echo $st; ?>"><?php echo $respiratory_rate; ?></span>

                                            </div>

                                            <p class="mb-1" style="color:#528be7"><?php echo $vital_datail->respiratory_rate; ?> rpm</p>

                                            <div class="chart-wrapper mt-3">

                                              <canvas id="AreaChart7" class="h-8"></canvas>

                                            </div>

                                          </div>

                                        </div>

                                      </div>

                                    </div>
                                    <?php
                                    $oxygen_saturation ="";
                                    $st ="";
                                     if($vital_datail->oxygen_saturation >= 95 and $vital_datail->oxygen_saturation <= 100){
                                         $oxygen_saturation = "Normal";
                                         $st = "check-details-normal";

                                    }else if($vital_datail->oxygen_saturation >= 100 ){
                                      $oxygen_saturation = "High";
                                      $st = "check-details-high";
                                    }else if($vital_datail->oxygen_saturation <= 95){
                                      $oxygen_saturation = "Low";
                                      $st = "check-details-low";
                                    } ?>
                <div class="row" <?php echo $growth_chart_style?>>

                                      <div class="col-xl-3 col-lg-3 pl-30">

                                        <div class="card-box overflow-hidden">

                                          <div class="card-body pb-0">

                                            <div class="dis-flex jusify-space">

                                              <h2 class="fs-2 mb-2">Oxygen Saturation (%)</h2>

                                              <span class="<?php echo $st;  ?>"><?php echo $oxygen_saturation;  ?></span>

                                            </div>

                                            <p class="mb-1" style="color:#528be7"><?php echo $vital_datail->oxygen_saturation; ?> %</p>

                                            <div class="chart-wrapper mt-3">

                                              <canvas id="AreaChart8" class="h-8"></canvas>

                                            </div>

                                          </div>

                                        </div>

                                      </div>
                                      <?php
                                      $height ="";
                                      $st ="";
                                       if($vital_datail->height == 69){
                                           $height = "Normal";
                                           $st = "check-details-normal";

                                      }else if($vital_datail->height >= 69 ){
                                        $height = "High";
                                        $st = "check-details-high";
                                      }else if($vital_datail->height <= 69){
                                        $height = "Low";
                                        $st = "check-details-low";
                                      } ?>
                                      <div class="col-xl-3 col-lg-3">

                                        <div class="card-box overflow-hidden">

                                          <div class="card-body pb-0">

                                            <div class="dis-flex jusify-space">

                                              <h2 class="fs-2 mb-2">Height (in)</h2>

                                              <span class="<?php echo $height; ?>"><?php echo $height; ?></span>

                                            </div>

                                            <p class="mb-1" style="color:#528be7"> <?php echo $vital_datail->height; ?> in</p>

                                            <div class="chart-wrapper mt-3">

                                              <canvas id="AreaChart9" class="h-8"></canvas>

                                            </div>

                                          </div>

                                        </div>

                                      </div>
                                      <?php
                                      $weight ="";
                                      $st ="";
                                       if($vital_datail->weight >= 89 and $vital_datail->weight <= 90){
                                           $weight = "Normal";
                                           $st = "check-details-normal";

                                      }else if($vital_datail->weight >= 91 ){
                                        $weight = "High";
                                        $st = "check-details-high";
                                      }else if($vital_datail->weight <= 88){
                                        $weight = "Low";
                                        $st = "check-details-low";
                                      } ?>
                                      <div class="col-xl-3 col-lg-3">

                                        <div class="card-box bg-gradient-secondary overflow-hidden">

                                          <div class="card-body pb-0">

                                            <div class="dis-flex jusify-space">

                                              <h2 class="fs-2 mb-2">Weight (lbs)</h2>

                                              <span class="<?php echo $st; ?>"><?php echo $weight; ?></span>

                                            </div>

                                            <p class="mb-1" style="color:#528be7"><?php echo $vital_datail->weight; ?> lbs</p>

                                            <div class="chart-wrapper mt-3">

                                              <canvas id="AreaChart10" class="h-8"></canvas>

                                            </div>

                                          </div>

                                        </div>

                                      </div>
                                      <?php
                                      $bmi ="";
                                      $st ="";
                                     if($vital_datail->bmi <= 19){
                                           $bmi = "Underweight";
                                           $st = "check-details-normal";

                                      }else if($vital_datail->bmi >= 19  and $vital_datail->bmi <= 25){
                                           $bmi = "Normal";
                                           $st = "check-details-normal";

                                      }else if($vital_datail->bmi >= 25  and $vital_datail->bmi <= 30){
                                        $bmi = "Over weight";
                                        $st = "check-details-high";
                                      }else if($vital_datail->bmi >= 30){
                                        $bmi = "Obese";
                                        $st = "check-details-high";
                                      } ?>
                                      <div class="col-xl-3 col-lg-3 pr-30">

                                        <div class="card-box overflow-hidden">

                                          <div class="card-body pb-0">

                                            <div class="dis-flex jusify-space">

                                              <h2 class="fs-2 mb-2">BMI (kg/m2)</h2>

                                              <span class="<?php echo $st; ?>"><?php echo $bmi; ?></span>

                                            </div>

                                            <p class="mb-1" style="color:#528be7"><?php echo $vital_datail->bmi; ?>  kg/m2</p>

                                            <div class="chart-wrapper mt-3">

                                              <canvas id="AreaChart11" class="h-8"></canvas>

                                            </div>

                                          </div>

                                        </div>

                                      </div>

                                    </div>
                <div class="row" <?php echo $growth_chart_style?>>
                                    <?php
                                    $pain ="";
                                    $st ="";
                                     if($vital_datail->pain >= 1  and $vital_datail->pain <= 3){
                                         $pain = "Mild";
                                         $st = "check-details-normal";

                                    }else if($vital_datail->pain >= 4  and $vital_datail->pain <= 7){
                                      $pain = "Moderate";
                                      $st = "check-details-high";
                                    }else if($vital_datail->pain >= 8  and $vital_datail->pain <= 10){
                                      $pain = "Severe";
                                      $st = "check-details-high";
                                    } ?>
                                      <div class="col-xl-3 col-lg-3 pl-30">

                                        <div class="card-box overflow-hidden">

                                          <div class="card-body pb-0">

                                            <div class="dis-flex jusify-space">

                                              <h2 class="fs-2 mb-2">Pain (1-10) </h2>

                                              <span class="check-details-low"><?php echo $pain; ?></span>

                                            </div>

                                            <p class="mb-1" style="color:#528be7"><?php echo $vital_datail->pain; ?></p>

                                            <div class="chart-wrapper mt-3">

                                              <canvas id="AreaChart12" class="h-8"></canvas>

                                            </div>

                                          </div>

                                        </div>

                                      </div>

                                      <!-- <div class="col-xl-3 col-lg-3">

                                        <div class="card-box overflow-hidden">

                                          <div class="card-body pb-0">

                                            <div class="dis-flex jusify-space">

                                              <h2 class="fs-2 mb-2">Smoking Status</h2>

                                              <span class="check-details-low">Low</span>

                                            </div>

                                            <p class="mb-1" style="color:#528be7"> <?php //echo $vital_datail->smoking_status; ?></p>

                                            <div class="chart-wrapper mt-3">

                                              <canvas id="AreaChart13" class="h-8"></canvas>

                                            </div>

                                          </div>

                                        </div>

                                      </div> -->

                                      <!-- <div class="col-xl-3 col-lg-3">

                                        <div class="card-box bg-gradient-secondary overflow-hidden">

                                          <div class="card-body pb-0">

                                            <div class="dis-flex jusify-space">

                                              <h2 class="fs-2 mb-2">Head Circumference (in)</h2>

                                              <span class="check-details-high">High</span>

                                            </div>

                                            <p class="mb-1" style="color:#528be7"><?php //echo $vital_datail->head_circumference; ?> in</p>

                                            <div class="chart-wrapper mt-3">

                                              <canvas id="AreaChart14" class="h-8"></canvas>

                                            </div>

                                          </div>

                                        </div>

                                      </div> -->
                                      <?php
                                      $glucose_by_glucometer ="";
                                      $st ="";
                                       if($vital_datail->glucose_by_glucometer == 140){
                                           $glucose_by_glucometer = "Normal";
                                           $st = "check-details-normal";

                                      }else if($vital_datail->glucose_by_glucometer >= 140 ){
                                        $glucose_by_glucometer = "High";
                                        $st = "check-details-high";
                                      }else if($vital_datail->glucose_by_glucometer <= 140 ){
                                        $glucose_by_glucometer = "Low";
                                        $st = "check-details-high";
                                      } ?>
                                      <div class="col-xl-3 col-lg-3 pr-30">

                                        <div class="card-box overflow-hidden">

                                          <div class="card-body pb-0">

                                            <div class="dis-flex jusify-space">

                                              <h2 class="fs-2 mb-2">Glucose by Glucometer</h2>

                                              <span class="<?php echo $st; ?>"><?php echo $glucose_by_glucometer; ?></span>

                                            </div>

                                            <p class="mb-1" style="color:#528be7"><?php echo $vital_datail->glucose_by_glucometer; ?></p>

                                            <div class="chart-wrapper mt-3">

                                              <canvas id="AreaChart15" class="h-8"></canvas>

                                            </div>

                                          </div>

                                        </div>

                                      </div>

                                    </div>

                </div>


                <div id="vital-sign" class="tab-pane fade">


                  <section>

                    <div class="row mt-15">

                      <div class="col-lg-12">

                        <table class="table" style="overflow-x: auto;display: block;">

                          <thead class="vital-sign" style="border-top:1px solid #ddd ;">

                            <th>Temprature</th>
                            <th>Heart Rate/ <br> Pulse</th>
                            <th>Blood <br> Pressure</th>
                            <th>Respiratory<br> Rate</th>
                            <th>Oxygen <br> Saturation</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>BMI</th>
                            <th>Pain</th>
                            <th>Smoking <br>  Status</th>
                            <th>Head <br> Circumference</th>
                            <th>Glucose <br>by  <br> Glucometer</th>
                            <th>Created Date</th>
<th>Action</th>

                          </thead>

                          <tbody>
<?php foreach ($vital_list as $value) { ?>

                            <tr class="hovertr" style="border-bottom:1px solid #ddd ;">
                              <td><?php echo $value->temperature; ?> degree</td>
                              <td><?php echo $value->heart_rate; ?>	</td>
                              <td><?php echo $value->blood_pressure; ?>	</td>
                              <td><?php echo $value->respiratory_rate; ?></td>
                              <td><?php echo $value->oxygen_saturation; ?></td>
                              <td><?php echo $value->height; ?></td>
                              <td><?php echo $value->weight; ?></td>
                              <td><?php echo $value->bmi; ?></td>
                              <td><?php echo $value->pain; ?></td>
                              <td><?php echo $value->smoking_status; ?></td>
                              <td><?php echo $value->head_circumference; ?></td>
                              <td><?php echo $value->glucose_by_glucometer; ?></td>
                              <td><?php echo date('Y-m-d h:i:s A', strtotime($value->date)); ?></td>

                              <td class="pt-15"><div class="btn-group" style="float: right;display: flex;" data-toggle="modal" data-target="#vital-sing">
              <a href="#" onclick="vital_info('<?php echo $value->id; ?>')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>


                              </div></td>
<?php } ?>
                            </tr>
                      </tbody>

                      </table>

                    </div>

                  </section>

                </div>

                <div id="problem-allergies-list" class="tab-pane fade">

                  <section>

                    <div class="row">

                      <div class="col-lg-12 p-r-l-30">

                        <nav>

                          <ul class="nav nav-tabs tab-list color-blue">

                            <li class="active"><a data-toggle="tab" href="#problem-list-tab">Problem List</a></li>

                            <li><a data-toggle="tab" href="#allergy-list-tab">Allergy List</a></li>

                          </ul>

                        </nav>

                        <div class="tab-content">

                          <div id="problem-list-tab" class="tab-pane fade in active">

                            <div style="padding: 10px;">

                              <table class="table">

                                <thead style="border-top:1px solid #ddd ;">

                                  <th>Problem</th>

                                  <th>Code System</th>

                                  <th>ICD-CM Code</th>

                                  <th>SNOMED</th>

                                  <th>Date Diagnosed</th>

                                  <th>Date Changed</th>

                                  <th>Status</th>

                                  <th>Notes</th>
                                  <th>Created Date</th>
                                  <th>Action</th>


                                </thead>

                                <tbody>
<?php foreach ($problem_list as $value) { ?>

  <tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                                  <td><?php echo $value->problem_id; ?></td>

                                  <td><?php echo  $value->icd_version_id; ?></td>

                                  <td><?php echo $value->icd10_code; ?></td>

                                  <td><?php echo$value->snomed_ct_code; ?></td>

                                  <td><?php echo date('Y-m-d H:i', strtotime($value->diagnosis_datetime)); ?></td>

                                  <td><?php echo date('Y-m-d H:i', strtotime($value->changed_datetime)); ?></td>

                                  <td><?php echo $value->status; ?></td>

                                  <td><?php echo $value->notes; ?></td>
                                  <td><?php echo date('Y-m-d h:i:s A', strtotime($value->date)); ?></td>
                                  <td class="pt-15"><div class="btn-group" style="float: right;display: flex;" data-toggle="modal" data-target="#problem_modal">
                  <a href="#" onclick="problem_info('<?php echo $value->id; ?>')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>


                                  </div></td>


                                </tr>

<?php } ?>
                                </tbody>

                              </table>

                            </div>

                          </div>

                          <div id="allergy-list-tab" class="tab-pane fade in">

                            <div style="padding: 10px;">

                              <table class="table">

                                <thead style="border-top:1px solid #ddd ;">

                                  <th>Allergy</th>

                                  <th>Reaction</th>

                                  <th>Severity</th>

                                  <th>Status</th>

                                  <th>Notes</th>
                                  <th>Created Date</th>
                                  <th>Action</th>



                                </thead>

                                <tbody>
	<?php foreach ($allergy_list as $value) { ?>
                                  <tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                                                                  <td><?php echo $value->allergy_type.' : '.$value->drug_allergy; ?></td>

                                                                  <td><?php echo  $value->reaction; ?></td>

                                                                  <td><?php echo $value->severity; ?></td>

                                                                  <td><?php echo $value->status; ?></td>

                                                                  <td><?php echo $value->notes; ?></td>
                                                                  <td><?php echo date('Y-m-d h:i:s A', strtotime($value->date)); ?></td>

                                                                  <td class="pt-15"><div class="btn-group" style="float: right;display: flex;" data-toggle="modal" data-target="#allergy_modal">
                                                                  <a href="#" onclick="allergy_info('<?php echo $value->id; ?>')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>


                                                                  </div></td>

                                                                </tr>
                                                              <?php }  ?>

                                </tbody>

                              </table>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                  </section>

                </div>

                <div id="lab-result" class="tab-pane fade">

                  <section>

                    <div class="row mt-15">

                      <div class="col-lg-12 p-r-l-30">

                        <table class="table">

                          <thead style="border-top:1px solid #ddd ;">

                            <th>LOINC Code</th>

                            <th>Description</th>

                            <th>Result Value</th>

                            <th>Units</th>

                            <th>Normal Range</th>

                            <th>Abnormal Flag</th>
                            <th>Created Date</th>
                            <th>Action</th>

                          </thead>

                          <tbody id="lab_result">
<?php foreach ($lab_result as $value) { ?>
  <tr class="hovertr" style="border-bottom:1px solid #ddd ;">

    <td><?php echo $value->loinc_code; ?></td>

    <td><?php echo $value->description; ?></td>

    <td><?php echo $value->result_value; ?></td>

    <td><?php echo $value->units; ?></td>

    <td><?php echo $value->normal_range; ?></td>

    <td><?php echo $value->abnormal_flag; ?></td>
    <td><?php echo date('Y-m-d h:i:s A', strtotime($value->date)); ?></td>
    <td class="pt-15"><div class="btn-group" style="float: right;display: flex;" data-toggle="modal" data-target="#lab_modal">
    <a href="#" onclick="lab_info('<?php echo $value->loinc_code_id; ?>')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>


    </div></td>

  </tr>
<?php } ?>

                      </tbody>

                      </table>

                    </div>

                  </section>

                </div>

                <div id="imaging-order" class="tab-pane fade">

                  <section>

                    <div class="row mt-15">

                      <div class="col-lg-12 p-r-l-30">

                        <table class="table">

                          <thead style="border-top:1px solid #ddd ;">

                            <!-- <th>Ordering Dr.</th> -->

                            <th>Description</th>

                            <th>CPT Code</th>

                            <th>Date</th>

                            <th>Status</th>

                            <th>File</th>

                            <th width="30%">Comments</th>
                            <th>Created Date</th>

                            <th>Action</th>

                          </thead>

                          <tbody>
<?php

                          	foreach ($imaging_list as $value) {  ?>

                          											<tr class="hovertr" style="border-bottom:1px solid #ddd ;">


                          <td><?php echo $value->description; ?></td>
                          												<td><?php echo $value->cpt_code; ?></td>

                          												<td><?php echo $value->date; ?></td>

                          												<td><?php echo $value->order_status; ?></td>

                          												<td><a download href=<?php echo base_url().'/assets/scanned_result_document/'.$value->scanned_result; ?>><i class="fa fa-download"></i></td>

                          												<td><?php echo $value->doctor_comments; ?></td>
                          												<td><?php echo date('Y-m-d h:i:s A', strtotime($value->date)); ?></td>

                                                  <td class="pt-15"><div class="btn-group" style="float: right;display: flex;" data-toggle="modal" data-target="#imaging_modal">
                                                  <a href="#" onclick="imaging_info('<?php echo $value->imaging_order_id; ?>')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>


                                                  </div></td>




                          										</tr>
                          							<?php		}
                          								 ?>



                      </tbody>

                      </table>

                    </div>

                  </section>

                </div>

                <div id="e-prescription-medication" class="tab-pane fade">

                  <section>

                    <div class="row mt-15">

                      <div class="col-lg-12 p-r-l-30">

                        <table class="table">

                          <thead style="border-top:1px solid #ddd ;">

                            <th>Drug Name</th>

                            <th>Rxnorm</th>

                            <th>Dispense</th>

                            <th>Refills</th>

                            <th>SIG</th>

                            <th>Order Status</th>

                            <th>Created Date</th>

<th>Action</th>


                          </thead>

                          <tbody>
                      <?php       foreach ($eprescription_list as $value) { ?>

                                              <tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                                                  <td><?php echo  $value->drug_name; ?></td>

                                                  <td><?php echo '12345'  ;?></td>

                                                  <td><?php echo  $value->dispense_package; ?></td>

                                                  <td><?php echo  $value->number_refills; ?></td>

                                                  <td><?php echo  $value->sig; ?></td>

                                                  <td><?php echo  $value->order_status; ?></td>

                                                  <td><?php echo  date('Y-m-d h:i:s A', strtotime($value->date)); ?></td>
                                                  <td class="pt-15"><div class="btn-group" style="float: right;display: flex;" data-toggle="modal" data-target="#eprescription_modal">
                                                      <a href="#" onclick="eprescription_info('<?php echo $value->e_prescription_id; ?>')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>


                                                      </div></td>


                                                </tr>
                                              <?php }  ?>




                          </tbody>

                        </table>

                      </div>

                    </div>

                  </section>

                </div>

                <div id="immunization" class="tab-pane fade">

                  <section>

                    <div class="row">

                      <div class="col-lg-12 p-r-l-30">

                        <nav>

                          <ul class="nav nav-tabs tab-list  color-blue">

                            <li class="active"><a data-toggle="tab" href="#select-vaccines">Step-1: Select Vaccines</a>

                            </li>

                            <li><a data-toggle="tab" href="#review-and-sign">Step-2: Review and Sign</a></li>

                            <li><a data-toggle="tab" href="#record-vaccinations">Step-3: Record Vaccinations</a></li>

                          </ul>

                        </nav>

                        <div class="tab-content">

                          <div id="select-vaccines" class="tab-pane fade in active">
                            <form>
                            <div class="row p-15">

                              <div class="col-12 col-md-4 form-group">

                                <select class="form-control" id="Tabselect-vaccination">

                                  <option value="0">Select Vaccines</option>

                                  <option value="birth">Birth - Year</option>

                                  <option value="year">2-18 Years</option>

                                  <option value="adult">Adult</option>

                                  <option value="other">Other </option>

                                </select>

                              </div>
                              <div class="select-vaccines">
                              <div class="col-12 ">

                                <table class="table">

								<thead style="border-top:1px solid #ddd ;">

									<th>Schedule</th>

									<th>Vaccine</th>

									<th>CVX Code</th>

									<th>Consent form</th>

									<th>VIS</th>

									<th>Administered On</th>

									<th>Administered By</th>

									<th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>

								</thead>

                                  <tbody class="immunizations_tbdata">

                                  </tbody>

                                </table>

                              </div>

                            </div>

                        </div>

                          </div>

                      </form>

                          <div id="review-and-sign" class="tab-pane fade in">

                            <table class="table">

                              <thead style="border-top:1px solid #ddd ;">

                                <th>Information Statements</th>
                                <th>Created Date</th>
                                <th>Action</th>

                              </thead>

                              <tbody id="review_sign">
							  <?php foreach ($review_sign as $value) { ?>
<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

												<td><a href=<?php echo base_url().'assets/reviewsing_document/'.$value->reviewsing_document; ?> download> <?php echo $value->reviewsing_document; ?></a></td>
												<td><?php echo date('Y-m-d h:i:s A', strtotime($value->date)); ?></td>
                        <td class="pt-15"><div class="btn-group" style="float: right;display: flex;" data-toggle="modal" data-target="#review_modal">
                            <a href="#" onclick="review_info('<?php echo $value->id; ?>')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>


                            </div></td>

											</tr>

							  <?php } ?>
                              </tbody>

                            </table>

                          </div>

                          <div id="record-vaccinations" class="tab-pane fade in print_table">

                            <div style="padding: 10px;">

                              <table class="table" id="widthpdf" style="display: block;overflow-x: auto;white-space: nowrap;">

                                <thead style="border-top:1px solid #ddd ;">

                                  <!---<th width="10%">Consent <br> Form</th>-->

                                  <th width="10%">Create
                                    <br>record for</th>

                                  <th width="5%">CVX Code</th>

                                  <th width="5%">Name</th>

                                  <th width="15%">CPT Code</th>

                                  <th width="10%">Manufa <br> cturer</th>

                                  <th width="10%">LOT <br> Number</th>

                                  <th width="10%">LOT <br> Expiration Date</th>

                                  <th width="5%">Administered <br> Amount</th>

                                  <th width="5%">Administered <br> Units</th>

                                  <th width="10%">Vaccine <br> Route</th>

                                  <th width="10%">Vaccine <br> Site</th>

                                  <th width="10%">Vaccination <br> Status</th>

                                  <th width="10%">Administered <br> On</th>

                                  <th width="10%">Ordering <br> Doctor</th>

                                  <th width="10%">Administered <br> By</th>

                                  <th width="10%">Administered At</th>

                                  <th width="10%">Vaccination <br> Inventory <br> LOT</th>

                                  <th width="10%">Record Type</th>

                                  <th width="10%">Funding <br> Eligibility</th>

                                  <th width="10%">Observed <br> Immunity</th>

                                  <th width="5%">Notes</th>
                                  <th>Created Date</th>
<th>Action</th>


                                </thead>

                                <tbody>
<?php foreach ($record_vaccination as $value) {

  if($value->vaccinate_route=='1')
  		{
  			$value->vaccinate_route='Vaccinate Route';
  		}else if($value->vaccinate_route=='2'){
  			$value->vaccinate_route='ID (Intradermal)';
  		}else if($value->vaccinate_route=='3')
  		{
  			$value->vaccinate_route='NS (Nasal)';
  		}

  		if($value->vaccinate_status=='1')
  		{
  			$value->vaccinate_status='Complete';
  		}else if($value->vaccinate_status=='2'){
  			$value->vaccinate_status='Refused';
  		}else if($value->vaccinate_status=='3')
  		{
  			$value->vaccinate_status='Not administered';
  		}else if($value->vaccinate_status=='4')
  		{
  			$value->vaccinate_status='Partially administered';
  		}

  		if($value->vaccinate_site=='1')
  		{
  			$value->vaccinate_site='Vaccinate Site';
  		}else if($value->vaccinate_site=='2'){
  			$value->vaccinate_site='LA (Left Upper Arm)';
  		}else if($value->vaccinate_site=='3')
  		{
  			$value->vaccinate_site='LD (Left Deltoid)';
  		}



  ?>
<tr>

												<!--<td><?php //echo $value->consentform; ?></td>-->

												<td><?php echo $value->create_record_for; ?></td>

												<td><?php echo $value->cvxcode; ?></td>

												<td><?php echo $value->name; ?></td>

												<td><?php echo $value->cpt_code; ?></td>

												<td><?php echo $value->manfacturer; ?></td>

												<td><?php echo $value->lot_num; ?></td>

												<td><?php echo date('Y-m-d h:i',strtotime($value->expirationdate)); ?></td>

												<td><?php echo $value->administered_amount; ?></td>

												<td><?php echo $value->administered_units; ?></td>

												<td><?php echo $value->vaccinate_route; ?></td>

												<td><?php echo $value->vaccinate_site; ?></td>

												<td><?php echo $value->vaccinate_status; ?></td>

												<td><?php echo date('Y-m-d h:i',strtotime($value->administred_on)); ?></td>

												<td><?php echo $value->ordering_doctor; ?></td>

												<td><?php echo $value->administered_by; ?></td>

												<td><?php echo $value->administered_at; ?></td>

												<td><?php echo$value->inventory_lot; ?></td>

												<td><?php echo $value->record_type; ?></td>

												<td><?php echo $value->funding_eligibility; ?></td>

												<td><?php echo $value->observed_immunity; ?></td>

												<td><?php echo $value->record_vaccination_notes; ?></td>
												<td><?php echo date('Y-m-d h:i:s A', strtotime($value->date)); ?></td>
                        <td class="pt-15"><div class="btn-group" style="float: right;display: flex;" data-toggle="modal" data-target="#recordvaccinations_modal">
                            <a href="#" onclick="recordvaccinations_info('<?php echo $value->id; ?>')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>


                            </div></td>

											</tr>

<?php } ?>

                                </tbody>

                              </table>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                  </section>

                </div>

                <div id="summary" class="tab-pane fade">

                  <section class="mt-20">

                    <div style="padding: 10px;">

                      <table class="table">

                        <thead style="border-top:1px solid #ddd ;">

                          <th>Summary</th>
                          <th>Created Date</th>
                          <th>Action</th>


                        </thead>

                        <tbody id="get_summary">
<?php foreach ($summary as $value) { ?>
<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                            <td><?php echo $value->summary; ?></td>
                            <td><?php echo date('Y-m-d h:i:s A', strtotime($value->date)); ?></td>
                            <td class="pt-15"><div class="btn-group" style="float: right;display: flex;" data-toggle="modal" data-target="#summary_modal">
    <a href="#" onclick="summary_info('<?php echo $value->id; ?>')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>


    </div></td>


                          </tr>
<?php } ?>
                        </tbody>

                      </table>

                    </div>

                  </section>

                </div>

                <div id="document" class="tab-pane fade">

                  <section class="mt-20">

                    <div class="row">

                      <div class="col-lg-12 p-r-l-30">

                        <nav>

                          <ul class="nav nav-tabs tab-list color-blue">

                            <li class="active"><a data-toggle="tab" href="#uploaded-document">Uploaded Documents</a>

                            </li>

                            <li><a data-toggle="tab" href="#locked-clinical-notes">Locked Clinical Notes</a></li>

                            <li><a data-toggle="tab" href="#signed-consent-forms">Singed Consent Forms</a></li>

                            <!-- <li><a data-toggle="tab" href="#outbound-referrals">Outbound Referrals</a></li> -->

                            <li><a data-toggle="tab" href="#doc-lab-result">Lab Result</a></li>

                            <li><a data-toggle="tab" href="#amendments">Amendments</a></li>

                          </ul>

                        </nav>

                        <div class="tab-content">

                          <div id="uploaded-document" class="tab-pane fade in active">
                            <!-- <div class="mt-15 mb-15">

                              <input type="file" id="real-file" style="display: none;" multiple />

                              <button type="button" class="btn btn-default" id="custom-button">CHOOSE A FILE</button>

                              <span id="custom-text">No file chosen, yet.</span>

                            </div> -->

                            <table class="table mt-15">

                              <thead style="border-top:1px solid #ddd ;">

                                <th>Upload Documents</th>

                                <th> Document type</th>
                                <th>Created Date</th>
<th>Action</th>


                              </thead>

                              <tbody>
                            <?php    foreach ($document as $value) {

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
?>
<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

  <td><a href=<?php echo base_url().'assets/upload_document/'.$value->document_document; ?> download><?php echo $value->document_document; ?></a></td>

  <td><?php echo $type; ?></td>
  <td><?php echo date('Y-m-d h:i:s A', strtotime($value->date)); ?></td>
  <td class="pt-15"><div class="btn-group" style="float: right;display: flex;" data-toggle="modal" data-target="#uploadeddoc_modal">
      <a href="#" onclick="uploadeddoc_info('<?php echo $value->id; ?>')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>


      </div></td>

</tr>
<?php } ?>
                              </tbody>
                            </table>
                          </div>

                          <div id="locked-clinical-notes" class="tab-pane fade in">

                            <table class="table mt-15">

                              <thead style="border-top:1px solid #ddd ;">

                                <th>Date of Service</th>

                                <th>Reason</th>

                                <th>Locked By</th>

                                <th>Locked On</th>
                                <th>Created Date</th>
<th>Action</th>




                              </thead>

                              <tbody id="locked_clinical_notes">
<?php foreach ($locked_clinical as $value) { ?>

<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

												<td><a href="#"><?php echo date('Y-m-d h:i',strtotime($value->date_of_service)); ?></a></td>

												<td><?php echo $value->reason; ?></td>

												<td><?php echo $value->locked_by; ?></td>

												<td><?php echo date('Y-m-d',strtotime($value->locked_on)); ?> </td>
												<td><?php echo date('Y-m-d h:i',strtotime($value->date)); ?></td>
                        <td class="pt-15"><div class="btn-group" style="float: right;display: flex;" data-toggle="modal" data-target="#lockeddoc_modal">
                            <a href="#" onclick="lockeddoc_info('<?php echo $value->id; ?>')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>


                            </div></td>



											</tr>

<?php } ?>
                              </tbody>

                            </table>

                          </div>

                          <div id="signed-consent-forms" class="tab-pane fade in">

                            <table class="table mt-15">

                              <thead style="border-top:1px solid #ddd ;">



                                <th>Date of Appointment </th>

                                <th>Date of Signature</th>
                                <th>Created Date</th>
<th>Action</th>



                              </thead>

                              <tbody>
<?php foreach ($sign_consentforms as $value) {  ?>

<tr class="hovertr" style="border-bottom:1px solid #ddd ;">



												<td><?php echo date('Y-m-d',strtotime($value->appointment_datetime)); ?></td>

												<td><?php echo date('Y-m-d',strtotime($value->singnature_date)); ?></td>
												<td><?php echo date('Y-m-d h:i',strtotime($value->date)); ?></td>
<td><?php echo ($value->singnature_action=='1')?'Accepted':'Decline'; ?></td>



											</tr>
									<?php } ?>




                              </tbody>

                            </table>

                          </div>



                          <div id="doc-lab-result" class="tab-pane fade in">

                            <table class="table mt-15">

                              <thead style="border-top:1px solid #ddd ;">

                                <th>Lab</th>

                                <th>Date</th>

                                <th>Action</th>

                                <th>Abnormal?</th>

                                <th>Result Count</th>

                                <th>Test</th>
                                <th>Created Date</th>


                              </thead>

                              <tbody id="doc_lab_result">
							  <?php foreach ($doclab_result as $value) {  ?>



										<tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                                  <td><?php echo $value->lab; ?></td>

                                  <td><?php echo date('d/m/Y',strtotime($value->date)); ?></td>

                                  <td><?php echo $value->action; ?></td>

                                  <td><?php echo $value->abnormal; ?></td>

                                  <td><?php echo $value->result_count; ?></td>
								  <td><?php echo $value->test; ?></td>

								  <td><?php echo date('Y-m-d h:i:s A', strtotime($value->date)); ?></td>


                                </tr>
									<?php } ?>





                              </tbody>

                            </table>

                          </div>



                          <div id="amendments" class="tab-pane fade in">

                            <table class="table mt-15">

                              <thead style="border-top:1px solid #ddd ;">

                                <!-- <th>Amendments Documents</th> -->

                                <th>Amendments Source</th>

                                <th>Status</th>

                                <th>Request Date</th>

                                <th>Processed Date</th>
                                <th>Created Date</th>



                              </thead>

                              <tbody>
                                <?php foreach ($amendments as $value) {  ?>



                              										<tr class="hovertr" style="border-bottom:1px solid #ddd ;">



                                                                <td><?php echo $value->amendment_source; ?></td>

                                                                <td><?php echo $value->amendment_status; ?> </td>

                                                                <td><?php echo date('d/m/Y',strtotime($value->amdments_date_time)); ?></td>

                                                                <td><?php echo date('d/m/Y',strtotime($value->amdmentsproccess_date_time)); ?></td>
                                                                <td><?php echo date('Y-m-d h:i:s A', strtotime($value->date)); ?> </td>


                                                              </tr>';
                              									<?php }  ?>




                              </tbody>

                            </table>

                          </div>



                        </div>

                      </div>

                    </div>

                  </section>

                </div>

                <div id="add-health-record" class="tab-pane fade">

                  <section class="mt-20">

                    <div class="row">

                      <div class="col-lg-12 p-r-l-30">

                        <table class="table">

                          <thead style="border-top:1px solid #ddd ;">

                            <!-- <th>Doctor Name</th> -->

                            <th>Date & Time</th>

                            <th>Patient Name</th>

                            <th>Updated By</th>
                            <th>Created Date</th>


                          </thead>

                          <tbody id="healthreport">

<?php foreach ($health_report as $value) {  ?>


											<tr class="hovertr" style="border-bottom:1px solid #ddd ;">



                              <td><?php  echo date('Y-m-d h:i:s A',strtotime($value->date_time)); ?></td>

                              <td><?php  echo $value->patient_name; ?></td>

                              <td><?php  echo $value->updated_by; ?></td>
                              <td><?php  echo date('Y-m-d h:i:s A',strtotime($value->date_time)); ?></td>


                            </tr>
									<?php				}  ?>

                          </tbody>

                        </table>

                      </div>

                    </div>

                  </section>

                </div>

              </div>

              </div>

              <div class="w-33"  id="notification" style="padding-right:40px;">


                <section class="nobox marginBottom0" id="notification">

                  <div class="row mt-15">

                    <div class="col-12 col-md-12">

                      <div class="appointment-box" style=" border-top:2px solid #150aec;">

                        <h4><b>Scheduled Appointment</b></h4>

                        <div>
                          <?php foreach ($scheduleappointment as $value) { ?>
                          <?php 	$doctor =$this->db->select("*")->from("user")->where('user_id',$value->doctor_id)->get()->row();
                              $date = date('Y-m-d h:i:s',strtotime($value->whens.$value->from_time));  ?>

                          											<div class="row">

                          												<div class="col-12 col-md-6">

                          													<p style="color:#528be7;font-weight:600;">Dr.<?php echo $doctor->firstname.' '.$doctor->lastname; ?></p>

                          												</div>

                          												<div class="col-12 col-md-6 text-right">

                          													<p style="color:#528be7;"> <?php echo date('M d,Y, h:i A',strtotime($date)); ?></p>

                          												</div>

                          											</div>

                          											<p style="color:#528be7;"><?php echo $value->chief_complaint; ?></p>
                                              <?php }  ?>
                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="row mt-15">

                    <div class="col-12 col-md-12">

                      <div class="appointment-box">

                        <h4><b>Medications</b></h4>
                        <div>
                          <?php foreach ($medications as $value) { ?>
                          <div class="row">

                                          <div class="col-12 col-md-4">

                                            <p style="color:#528be7;"><?php echo date('M d,Y',strtotime($value->datetime_prescribed)); ?></p>

                                          </div>

                                          <div class="col-12 col-md-8">

                                            <p style="color:#528be7;"><?php echo $value->pharmacy_note; ?></p>

                                          </div>

                                        </div>

                                      <?php } ?>

                        </div>




                      </div>

                    </div>

                  </div>

                  <div class="row mt-15">

                    <div class="col-12 col-md-12">

                      <div class="appointment-box">

                        <h4><b>Issues</b></h4>
<div>
  <?php foreach ($issue as $value) { ?>

<p style="color:#528be7;"><?php echo $value->reaction.' <label>('.date("M d,Y",strtotime($value->date)).')</label>'; ?></p>
<?php }  ?>

</div>
                        <!-- <p>Allergic Rhinitis <label>(Jul 7,2011)</label></p> -->

                      </div>

                    </div>

                  </div>

                  <div class="row mt-15">

                    <div class="col-12 col-md-12">

                      <div class="appointment-box">

                        <div class="row">

                          <div class="col-12 col-md-10">

                            <h4><b>Latest Documents</b></h4>

                          </div>

                          <div class="col-12 col-md-2">

                            <div class="image-upload">


                              <!-- <label for="file-input">

                                <img style="width: 50%;" src="<?php //echo base_url() ?>assets/images/health_report/add.png" />

                              </label> -->

                              <!-- <input id="file-input" type="file" /> -->

                            </div>

                          </div>

                        </div>
<div>
<?php foreach ($uploaded_doc as $value) {  ?>
				<p><a href=<?php echo base_url().'assets/upload_document/'.$value->document_document; ?> download> <?php echo $value->document_document; ?></a></p>
			<?php }  ?>
</div>


                      </div>

                    </div>

                  </div>

                  <div class="row mt-15">

                    <div class="col-12 col-md-12">

                      <div class="appointment-box">

                        <h4><b>Immunizations</b></h4>

                        <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.

                        </p> -->
<div>
  <?php foreach ($immunizations as $value) { ?>

	<p style="color:#528be7;"><?php echo substr(wordwrap($value->record_vaccination_notes,12, "<br />"), 0, 200); ?></p>
<?php } ?>
</div>
                      </div>

                    </div>

                  </div>

                </section>

              </div>



            </div>

          </section>

        </div>
        <div class="modal fade" id="vital-sing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:600px;">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
 <h4 class="modal-title" id="myModalLabel">Vital Sign</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
        <div class="row">
        <div class="col-12 col-md-12 form-group">
          <label> Temprature :</label>
          <span id="temprature"></span>
        </div>

       <div class="col-12 col-md-12 form-group">
        <label>Heart Rate/Pulse :</label>
        <span id="heart-rate"></span>

       </div>
       <div class="col-12 col-md-12 form-group">
        <label>Blood Pressure :</label>
        <span id="blood-presure"></span>

       </div>
       <div class="col-12 col-md-12 form-group">
        <label>Respiratory Rate :</label>
        <span id="respiratory-rate"></span>

       </div>
       <div class="col-12 col-md-12 form-group">
        <label>Oxygen Saturation :</label>
        <span id="oxygen-saturation"></span>

       </div>

         <div class="col-12 col-md-12 form-group">
         <label>Height :</label>
         <span id="height"></span>

       </div>

       <div class="col-12 col-md-12 form-group">
       <label>Weight  :</label>
       <span id="weight"></span>
       </div>

        <div class="col-12 col-md-12 form-group">
       <label>Pain  :</label>
       <span id="pain"></span>
       </div>

        <div class="col-12 col-md-12 form-group">
       <label>Smoking Status  :</label>
       <span id="smoking-status"></span>
       </div>

         <div class="col-12 col-md-12 form-group">
       <label>Head Circumference  :</label>
       <span id="head-circumfernce"></span>
       </div>

        <div class="col-12 col-md-12 form-group">
       <label>Glucose by Glucometer  :</label>
       <span id="glucose-glucometer"></span>
       </div>

        <div class="col-12 col-md-12 form-group">
       <label>Created Date    :</label>
       <span id="created-date"></span>
       </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
</div>
</form>
</div>
</div>
</div>
<div class="modal fade" id="problem_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:600px;">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
<h4 class="modal-title" id="myModalLabel">Problem List</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
<div class="row">
<div class="col-12 col-md-12 form-group">
  <label> Problem :</label>
  <span id="problem_id"></span>
</div>

<div class="col-12 col-md-12 form-group">
<label>Icd Version :</label>
<span id="icd_version_id"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Icd10 Code :</label>
<span id="icd10_code"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Snomed CT Code :</label>
<span id="snomed_ct_code"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Status :</label>
<span id="status"></span>

</div>

 <div class="col-12 col-md-12 form-group">
 <label>Datetime Diagnosis :</label>
 <span id="diagnosis_datetime"></span>

</div>

<div class="col-12 col-md-12 form-group">
<label>DateTime Onset  :</label>
<span id="onset_datetime"></span>
</div>

<div class="col-12 col-md-12 form-group">
<label>Datetime Channged  :</label>
<span id="changed_datetime"></span>
</div>

<div class="col-12 col-md-12 form-group">
<label>Notes  :</label>
<span id="notes"></span>
</div>






</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
</div>
</form>
</div>
</div>
</div>

<div class="modal fade" id="allergy_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:600px;">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
<h4 class="modal-title" id="myModalLabel">Allergy List</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
<div class="row">
<div class="col-12 col-md-12 form-group">
  <label> Allergy Type :</label>
  <span id="allergy_type"></span>
</div>

<div class="col-12 col-md-12 form-group">
<label>Reaction :</label>
<span id="reaction"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Drug Allergy :</label>
<span id="drug_allergy"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Severity :</label>
<span id="severity"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Status :</label>
<span id="astatus"></span>

</div>

 <div class="col-12 col-md-12 form-group">
 <label>Notes :</label>
 <span id="anotes"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Created Date :</label>
<span id="acreated_date"></span>

</div>











</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
</div>
</form>
</div>
</div>
</div>

<div class="modal fade" id="lab_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:600px;">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
<h4 class="modal-title" id="myModalLabel">Lab Result</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
<div class="row">
<div class="col-12 col-md-12 form-group">
  <label> Loinc Code :</label>
  <span id="loinc_code"></span>
</div>

<div class="col-12 col-md-12 form-group">
<label>Description :</label>
<span id="description"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Result Value :</label>
<span id="result_value"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Units :</label>
<span id="units"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Normal Range :</label>
<span id="normal_range"></span>

</div>

 <div class="col-12 col-md-12 form-group">
 <label>Abnormal Flag :</label>
 <span id="abnormal_flag"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Created Date :</label>
<span id="lcreated_date"></span>

</div>











</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
</div>
</form>
</div>
</div>
</div>

<div class="modal fade" id="imaging_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:600px;">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
<h4 class="modal-title" id="myModalLabel">Imaging Order</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
<div class="row">
<div class="col-12 col-md-12 form-group">
  <label> Cpt Code :</label>
  <span id="cpt_code"></span>
</div>

<div class="col-12 col-md-12 form-group">
<label>Description :</label>
<span id="description"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Order Status :</label>
<span id="order_status"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Scanned Result :</label>
<a download id="scanned_result" href=""><i class="fa fa-download"></i></a>

</div>
<div class="col-12 col-md-12 form-group">
<label>Doctor Comments :</label>
<span id="doctor_comments"></span>

</div>

 <div class="col-12 col-md-12 form-group">
 <label>Date :</label>
 <span id="idate"></span>

</div>












</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
</div>
</form>
</div>
</div>
</div>


<div class="modal fade" id="eprescription_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:600px;">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
<h4 class="modal-title" id="myModalLabel">E-prescription</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
<div class="row">
<div class="col-12 col-md-12 form-group">
  <label> Drug Name :</label>
  <span id="drug_name"></span>
</div>

<div class="col-12 col-md-12 form-group">
<label>Sig :</label>
<span id="sig"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Datetime Stopped Taking :</label>
<span id="datetime_stopped_taking"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Number Refills :</label>
<span id="number_refills"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Pharmacy Note :</label>
<span id="pharmacy_note"></span>

</div>

 <div class="col-12 col-md-12 form-group">
 <label>Notes :</label>
 <span id="enotes"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Prn :</label>
<span id="prn"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Indication :</label>
<span id="indication"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Datetime Prescribed :</label>
<span id="datetime_prescribed"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Dispense Quantity :</label>
<span id="dispense_quantity"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Daw :</label>
<span id="daw"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Order Status :</label>
<span id="eorder_status"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Sig Note :</label>
<span id="sig_note"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Status :</label>
<span id="estatus"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Datetime Started Taking :</label>
<span id="datetime_started_taking"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Dispense Package :</label>
<span id="dispense_package"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Date :</label>
<span id="edate"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Appointment:</label>
<span id="appointment_id"></span>

</div>








</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
</div>
</form>
</div>
</div>
</div>


<div class="modal fade" id="vaccine_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:600px;">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
<h4 class="modal-title" id="myModalLabel">Immunizations</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
<div class="row">
<div class="col-12 col-md-12 form-group">
  <label> Vaccines :</label>
  <span id="vaccines"></span>
</div>

<div class="col-12 col-md-12 form-group">
<label>Schedule :</label>
<span id="schedule"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Vaccine :</label>
<span id="vaccine"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Cvxcode :</label>
<span id="cvxcode"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Consent Form :</label>
<span id="consent_form"></span>

</div>

 <div class="col-12 col-md-12 form-group">
 <label>Vis :</label>
 <span id="vis"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Administreted On :</label>
<span id="administreted_on"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Administreted By :</label>
<span id="administreted_by"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Vaccines Status :</label>
<span id="vaccines_status"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Created Date :</label>
<span id="vcreated_date"></span>

</div>
















</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
</div>
</form>
</div>
</div>
</div>

<div class="modal fade" id="review_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:600px;">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
<h4 class="modal-title" id="myModalLabel">Review And Sign</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
<div class="row">
<div class="col-12 col-md-12 form-group">
  <label> Reviewsing Document :</label>
  <!-- <span id="reviewsing_document"></span> -->
  <a download id="reviewsing_document" href=""><i class="fa fa-download"></i></a>
</div>

<div class="col-12 col-md-12 form-group">
<label>Print Name :</label>
<span id="printname"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Signture Image :</label>

<a download id="signture_image" href=""><i class="fa fa-download"></i></a>

</div>
<div class="col-12 col-md-12 form-group">
<label>Created Date :</label>
<span id="rcreated_date"></span>

</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
</div>
</form>
</div>
</div>
</div>

<div class="modal fade" id="summary_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:600px;">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
<h4 class="modal-title" id="myModalLabel">Summary</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
<div class="row">


<div class="col-12 col-md-12 form-group">
<label>Summary :</label>
<span id="ssummary"></span>

</div>

<div class="col-12 col-md-12 form-group">
<label>Created Date :</label>
<span id="screated_date"></span>

</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
</div>
</form>
</div>
</div>
</div>





<div class="modal fade" id="uploadeddoc_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:600px;">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
<h4 class="modal-title" id="myModalLabel">Upload Documents	</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
<div class="row">


<div class="col-12 col-md-12 form-group">
<label>Uploaded Document :</label>
<a download id="document_document" href=""><i class="fa fa-download"></i></a>

</div>
<div class="col-12 col-md-12 form-group">
<label>Document Type :</label>
<span id="document_type"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Created Date :</label>
<span id="dcreated_date"></span>

</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
</div>
</form>
</div>
</div>
</div>

<div class="modal fade" id="lockeddoc_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:600px;">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
<h4 class="modal-title" id="myModalLabel">Locked Clinical Notes	</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
<div class="row">


<div class="col-12 col-md-12 form-group">
<label>Date Of Service :</label>
<span id="date_of_service"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Locked By :</label>
<span id="locked_by"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Action :</label>
<span id="action"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Status :</label>
<span id="lstatus"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Reason :</label>
<span id="reason"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Created Date :</label>
<span id="ldate"></span>

</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
</div>
</form>
</div>
</div>
</div>


<div class="modal fade" id="recordvaccinations_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:600px;">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
<h4 class="modal-title" id="myModalLabel">Record Vaccinations</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
<div class="row">
<div class="col-12 col-md-12 form-group">
  <label> Create Record For :</label>
  <!-- <span id="reviewsing_document"></span> -->
  <span id="create_record_for"></span>
</div>

<div class="col-12 col-md-12 form-group">
<label>Cvx Code :</label>
<span id="rcvxcode"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Name :</label>

<span id="name"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Cpt Code :</label>
<span id="rcpt_code"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Manfacturer :</label>
<span id="manfacturer"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Expiration Date :</label>
<span id="expirationdate"></span>

</div>

<div class="col-12 col-md-12 form-group">
<label>Lot Num :</label>
<span id="lot_num"></span>

</div>

<div class="col-12 col-md-12 form-group">
<label>Administered Amount :</label>
<span id="administered_amount"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Vaccinate Route :</label>
<span id="vaccinate_route"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Vaccinate Site :</label>
<span id="vaccinate_site"></span>

</div>

<div class="col-12 col-md-12 form-group">
<label>Vaccinate Status :</label>
<span id="vaccinate_status"></span>

</div>

<div class="col-12 col-md-12 form-group">
<label>Administred On :</label>
<span id="administred_on"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Ordering Doctor :</label>
<span id="ordering_doctor"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Administered By :</label>
<span id="administered_by"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Administered At :</label>
<span id="administered_at"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Inventory Lot :</label>
<span id="inventory_lot"></span>

</div>

<div class="col-12 col-md-12 form-group">
<label>Record Type :</label>
<span id="record_type"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Funding Eligibility :</label>
<span id="funding_eligibility"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Observed Immunity :</label>
<span id="observed_immunity"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Record Vaccination Notes :</label>
<span id="record_vaccination_notes"></span>

</div>
<div class="col-12 col-md-12 form-group">
<label>Administered Units :</label>
<span id="administered_units"></span>

</div>

<div class="col-12 col-md-12 form-group">
<label>Created Date :</label>
<span id="reccreated_date"></span>

</div>

</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
</div>
</form>
</div>
</div>
</div>



        <div id="overlay"><div class="loader"></div><br/>
            Loading...</div>
         <div class="modal fade" id="hospital-record" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

              aria-hidden="true">&times;</span>

          </button>
          <h4 class="modal-title" id="myModalLabel">Add Health Record </h4>

        </div>

        <div class="modal-body">
            <div class="alert-messge" style="visibility:hidden;">

            </div>

             <div class="alert-errormessge" style="visibility:hidden;">

            <div class="Patient_errormsg">    </div>

            </div>

          <ul class="nav nav-tabs">

            <li class="active"><a data-toggle="tab" href="#add-vital-signs">Vital Sign</a></li>

            <li><a data-toggle="tab" href="#add-problem-allergy-list">Problem Allergies List</a></li>

            <li><a data-toggle="tab" href="#add-lab-result">Lab Result</a></li>

            <li><a data-toggle="tab" href="#add-imaging-order">Imaging Order</a></li>

            <li><a data-toggle="tab" href="#add-e-prescription-medication">E-prescription Medication</a></li>

            <li><a data-toggle="tab" href="#add-immunizations">Immunizations</a></li>

            <li><a data-toggle="tab" href="#add-summary">Summary</a></li>

            <li><a data-toggle="tab" href="#add-document">Document</a></li>

            <li><a data-toggle="tab" href="#add-record">Health Record</a></li>

          </ul>

          <div class="tab-content">

            <div id="add-vital-signs" class="tab-pane fade in active">
              <form method="POST">
              <div class="row">

                <div class="col-12 col-md-4 form-group">

                  <label>TEMPERATURE(°F)</label>

                  <input type="text" name="temp" value="" class="form-control text-field" id="temp"  placeholder="Temperature">
          <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>

          <span class="Temperature_errormsg" style="color:red"></span>

                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>Bloodtype</label>


                  <select name="bloodtype" class="form-control text-field select2 bloodtype" id="bloodtype">
                    <option value="A-positive">A-positive</option>
                    <option value="A-negative">A-negative</option>
                    <option value="B-positive">B-positive</option>
                    <option value="B-negative">B-negative</option>
                    <option value="AB-positive">AB-positive</option>
                    <option value="AB-negative">AB-negative</option>
                    <option value="O-positive">O-positive</option>
                    <option value="O-negative">O-negative</option>
                  </select>

          <span class="Temperature_errormsg" style="color:red"></span>

                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>HEART RATE/PLUSE (bpm)</label>

                  <input type="text" name="heart-rate" value="" class="form-control text-field" id="heart-rate"   placeholder="Heart Rate/Pulse">
                  <span class="Heartrate_errormsg" style="color:red"></span>

                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>BLOOD PRESSURE (mmHg)</label>

                  <input type="text" name="blood-presure" value="" class="form-control text-field" id="blood-presure"

                    placeholder="Blood Presure">
                    <span class="Bloodpresure_errormsg" style="color:red"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>RESPIRATORY RATE (rpm)</label>

                  <input type="text" name="respiratory-rate" value="" class="form-control text-field"

                    id="respiratory-rate" placeholder="Respiratory rate">
                    <span class="Respiratoryrate_errormsg" style="color:red"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>OXYGEN SATURATION (%)</label>

                  <input type="text" name="oxygen-saturation" value="" class="form-control text-field"

                    id="oxygen-saturation" placeholder="Oxygen Saturation">
                    <span class="Oxygensaturation_errormsg" style="color:red"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>HEIGHT (in)</label>

                  <input type="text" name="height" value="" class="form-control text-field" id="height"

                    placeholder="Height">
                     <span class="Height_errormsg" style="color:red"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>WEIGHT (lbs)</label>

                  <input type="text" name="weight" value="" class="form-control text-field" id="weight"

                    placeholder="Weight">
                    <span class="Weight_errormsg" style="color:red"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>BMI (kg/m2)</label>

                  <input type="text" name="bmi" value="" class="form-control text-field" id="bmi" placeholder="BMI">
                  <span class="BMI_errormsg" style="color:red"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>PAIN (1-10)</label>

                  <input type="text" name="pain" value="" class="form-control text-field" id="pain" placeholder="Pain">
          <span class="Pain_errormsg" style="color:red"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>SMOKING STATUS</label>

                  <!-- <input type="text" name="smoking" value="" class="form-control text-field" id="smoking" placeholder="Smoking Status"> -->
                  <select name="smoking" id="smoking" class="form-control text-field">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
                    <span class="Smoking_errormsg" style="color:red"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>HEAD CIRCUMFERENCE</label>

                  <input type="text" name="head-circumfernce" value="" class="form-control text-field"

                    id="head-circumfernce" placeholder="Head Circumference">
                    <span class="Head_circumference_errormsg" style="color:red"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>GLUCOSE BY GLUCOMETER</label>

                  <input type="text" name="glucose-glucometer" value="" class="form-control text-field"

                    id="glucose-glucometer" placeholder="Glucose by Glucometer">
                    <span class="Glucose_by_glucometer_errormsg" style="color:red"></span>
                </div>
                <!-- <div class="col-12 col-md-4 form-group">

                  <label>DATE&TIME</label>

                  <input type="datetime-local" name="glucose-glucometer" value="" class="form-control text-field"

                    id="v_date_time" placeholder="DATE & TIME">
                    <span class="v_date_time_errormsg" style="color:red"></span>
                </div> -->
                <!-- <div class="col-12 col-md-6 form-group">

                  <label>UPDATE BY</label>

                  <input type="text" name="upload-by" value="<?php //echo $this->session->userdata('fullname') ?>" class="form-control text-field" id="v_updated_by"

                    placeholder="Update By" disabled="disabled">
                     <span class="v_Updatedby_errormsg" style="color:red;"></span>
                </div> -->
              </div>
                <div class="modal-footer text-center bottom-top">

                <button type="button" class="btn btn-default changetabbutton"  onclick="//return save_vitalsing()">Next</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
        </div>

            </div>

            <div id="add-problem-allergy-list" class="tab-pane fade">


              <div class="panel-group" id="accordion">

                <div class="panel panel-default">

                  <div class="panel-heading">

                    <h4 class="panel-title">

                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">

                        Problem List</a>

                    </h4>

                  </div>

                  <div id="collapse9" class="panel-collapse collapse in">
                     <form method="POST">
                    <div class="panel-body">

                      <div class="row">

                        <div class="col-12 col-md-6 form-group">

                          <label>PROBLEM</label>
							<div class="autocomplete_problem">
                    			<input id="select_problem" autocomplete="off" type="text" name="problem" placeholder="Search Problem" class="form-control text-field">
                  			</div>

                            <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                            <span class ="Problem_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 col-md-3 form-group">

                          <label>ICD VERSION</label>
                          	<div class="autocomplete_icdversion">
                    			<input id="icdversion" type="text" name="icdversion" placeholder="Search ICD version" class="form-control text-field" autocomplete="off">
                  			</div>

                          <span class ="Icdversion_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 col-md-3 form-group">

                          <label>ICD10 CODE</label>

                          <input type="text" name="icd10-code" value="" class="form-control text-field" id="icd10_code"

                            placeholder="ICD10 Code">
                            <span class ="Icd10code_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 col-md-4 form-group">

                          <label>SNOMED CT CODE</label>

                          <input type="text" name="snomed-ct-code" value="" class="form-control text-field"

                            id="snomed_ct_code" placeholder="SnoMED CT Code">
                            <span class ="Snomedctcode_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 col-md-4 form-group">

                          <label>Status</label>

                          <select class="form-control" name="problem_status" id="problem_status" placeholder="Status">

                            <option value="status">---</option>

                            <option value="active">Active</option>

                            <option value="inactive">Inactive</option>

                            <option value="resolved">Resolved</option>

                          </select>
                          <span class ="Problemstatus_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 col-md-4 form-group">

                          <label>DATETIME DIAGNOSIS</label>

                          <input type="datetime-local" class="form-control" id="diagnosis_datetime" name="diagnosis_datetime" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                          <span class ="Diagnosisdatetime_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 col-md-6 form-group">

                          <label>DATETIME ONSET</label>

                          <input type="datetime-local" class="form-control" id="onset_datetime" name="onset_datetime" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                          <span class ="Onsetdatetime_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 col-md-6 form-group">

                          <label>DATETIME CHANNGED</label>

                          <input type="datetime-local" class="form-control" id="channged_datetime" name="channged_datetime" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                          <span class ="Channgeddatetime_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 form-group">

                          <label>NOTES</label>

                          <textarea class="w-100" id="problem_notes" name="notes" rows="5" placeholder="Notes"></textarea>
                          <span class ="notes_errormsg" style="color:red"></span>
                        </div>

                      </div>


                    </div>
                    <div class="modal-footer text-center bottom-top">

                        <button type="button" class="btn btn-default openaccordian" onclick="//return save_problemlist();">Next</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>

                </form>

                  </div>

                </div>

                <div class="panel panel-default">

                  <div class="panel-heading">

                    <h4 class="panel-title">

                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">

                        Allergy List</a>

                    </h4>

                  </div>

                  <div id="collapse10" class="panel-collapse collapse">

                     <form method="POST">
                    <div class="panel-body">

                      <div class="row">

                        <div class="col-12 col-md-6 form-group">

                          <label>ALLERGY TYPE</label>

                            <select class="form-control select2" name="allergy" id="allergy_type" placeholder="Allergy" >
                                <option selected=""  value="">Select ALLERGY TYPE</option>
                                <option value="blank">---------</option>
                                <option value="specificdrug">Specific Drug allergy</option>
                                <option value="drugclass">Drug Class allergy</option>
                                <option value="nondrug">Non-Drug allergy</option>
                                <option value="nkda">No Known Drug Allergies (NKDA)</option>
                            </select>
                            <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                             <span class ="Allergytype_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 col-md-6 form-group">
                          <label>DRUG ALLERGY</label>
                           <div class="autocomplete_drugallergy">
                    			<input id="drug-allergy" type="text" name="drug_allergy" placeholder="Search Drug Allergy" class="form-control text-field">
                  			</div>
                           <span class ="Drugallergy_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 col-md-4 form-group">

                          <label>REACTION</label>

                          <select class="form-control reaction select2" name="reaction" id="reaction" placeholder="Reaction">
                            <option selected=""  value="">Select REACTION</option>

                              <option value="Acute kidney failure">Acute kidney failure</option>

                              <option value="Anaphylaxis">Anaphylaxis</option>

                              <option value="Arthralgia">Arthralgia</option>

                              <option value="Chills">Chills</option>

                              <option value="Cough">Cough</option>

                              <option value="Fever">Fever</option>

                              <option value="Headache">Headache</option>

                              <option value="Hives">Hives</option>

                              <option value="Malaise/fatigue">Malaise/fatigue</option>

                              <option value="Myalgia">Myalgia</option>

                              <option value="Nasal congestion">Nasal congestion</option>

                              <option value="Nausea">Nausea</option>

                              <option value="Pain/soreness at injection site">Pain/soreness at injection site</option>

                              <option value="Rash">Rash</option>

                              <option value="Respiratory distress">Respiratory distress</option>

                              <option value="Rhinorrhea">Rhinorrhea</option>

                              <option value="Shortness of breath/difficulty breathing">Shortness of breath/difficulty breathing</option>

                              <option value="Sore throat">Sore throat</option>

                              <option value="Swelling">Swelling</option>
                          </select>
                          <span class ="Reaction_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 col-md-4 form-group">

                          <label>SEVERITY</label>

                          <select class="form-control select2" name="severity" id="severity" placeholder="Severity">

                            <option value="" selected="">SEVERITY</option>

                          <option value="Fatal">Fatal</option>

                          <option value="Severe">Severe</option>

                          <option value="Moderate to severe">Moderate to severe</option>

                          <option value="Moderate">Moderate</option>

                          <option value="Mild to moderate">Mild to moderate</option>

                          <option value="Mild">Mild</option>

                          <option value="Unknown">Unknown</option>

                          </select>
                          <span class ="Severity_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 col-md-4 form-group">

                          <label>Status</label>

                          <select class="form-control" name="allergy_status" id="allergy_status" placeholder="Status">

                            <option value="1">Status</option>

                            <option value="active">Active</option>

                            <option value="inactive">Inactive</option>

                          </select>
                            <span class ="Allergystatus_errormsg" style="color:red"></span>
                        </div>

                        <div class="col-12 form-group">

                          <label>NOTES</label>

                          <textarea class="w-100" id="allergy_notes" name="notes" rows="5" placeholder="Notes"></textarea>
                          <span class ="notes_errormsg" style="color:red"></span>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer text-center bottom-top">
                        <button type="button" class="btn btn-default changetabbutton" onclick="//return save_allergylist();">Next</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>



                  </div>

                </div>

              </div>



            </div>

            <div id="add-lab-result" class="tab-pane fade">

              <form method="POST">
              <div class="row">

                <div class="col-12 col-md-4 form-group">

                  <label>LOINC CODE</label>
                    <div class="autocomplete_loinccode">
                    	<input id="loinc_code" type="text" name="loinc_code" placeholder="Search Loinc Code" class="form-control text-field">
                  	</div>
                    <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                    <span class ="Loniccode_errormsg" style="color:red"></span>
                </div>

              </div>

              <div class="row">

                <div class="col-12 form-group">

                  <label>DISCRIPTION</label>

                  <textarea class="w-100" id="discription" name="discription" rows="5"

                    placeholder="Discription"></textarea>
                    <span class ="Discription_errormsg" style="color:red"></span>
                </div>

              </div>

              <div class="row">

                <div class="col-12 col-md-6 form-group">

                  <label>RESULT VALUE</label>

                  <input type="text" name="result-value" value="" class="form-control text-field" id="result_value"

                    placeholder="Result value">
                    <span class ="Resultvalue_errormsg" style="color:red"></span>
                </div>

                <div class="col-12 col-md-6 form-group">

                  <label>UNITS</label>

                  <input type="text" name="units" value="" class="form-control text-field" id="units"

                    placeholder="Units">
                    <span class ="Units_errormsg" style="color:red"></span>
                </div>

                <div class="col-12 col-md-6 form-group">

                  <label>NORMAL RANGE</label>

                  <input type="text" name="normal-range" value="" class="form-control text-field" id="normal_range"

                    placeholder="NORMAL RANGE">
                    <span class ="Normalrange_errormsg" style="color:red"></span>
                </div>

                <div class="col-12 col-md-6 form-group">

                  <label>ABNORMAL FLAG</label>

                  <select class="form-control select2" name="cvx-code" id="cvx_code" placeholder="CVX-Code">
                    <option value="">Select ABNORMAL FLAG</option>
                    <option value="1">L -- Below low normal</option>

                    <option value="2">H -- Above high normal</option>

                    <option value="3">LL -- Below lower panic limits</option>

                    <option value="4">HH -- Above upper panic limits</option>

                    <option value="5">

                      < -- Below absolute low-off instrument scale</option>

                    <option value="6">> -- Above absolute high-off instrument scale</option>

                    <option value="7">N -- Normal (applies to non-numeric results)</option>

                    <option value="8">A -- Abnormal (applies to non-numeric results)</option>

                    <option value="9">----</option>

                    <option value="10">null -- No range defined, or normal ranges don't apply</option>

                    <option value="11">U -- Significant change up</option>

                    <option value="12">D -- Significant change down</option>

                    <option value="13">B -- Better--use when direction not relevant</option>

                    <option value="14">W -- Worse--use when direction not relevant</option>

                    <option value="15">S -- Susceptible. Indicates for microbiology susceptibilities only.</option>

                    <option value="16">R -- Resistant. Indicates for microbiology susceptibilities only.</option>

                    <option value="17">I -- Intermediate. Indicates for microbiology susceptibilities only.</option>

                    <option value="18">MS -- Moderately susceptible. Indicates for microbiology susceptibilities only.

                    </option>

                    <option value="19">VS -- Very susceptible. Indicates for microbiology susceptibilities only.

                    </option>

                  </select>
                  <span class ="Abnormalflag_errormsg" style="color:red"></span>
                </div>

              </div>
                <div class="modal-footer text-center bottom-top">
                      <button type="button" class="btn btn-default changetabbutton" onclick="//return save_labresult();">Next</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>

            </div>

            <div id="add-imaging-order" class="tab-pane fade">
              <form method="POST" enctype="multipart/form-data" id="imaging_order_form">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="row">

                    <div class="col-12 col-md-6 form-group">
                        <label>CPT CODE</label>
                          	<div class="autocomplete_cptcode">
                    			<input id="cpt_code" type="text" name="cpt_code" placeholder="Search CPT Code" class="form-control text-field">
                  			</div>
                          <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                          <span class ="Cptcode_errormsg" style="color:red"></span>
                    </div>

                    <div class="col-12 col-md-6 form-group">

                      <label>DISCRIPTION</label>

                      <input type="text" name="imaging_order_description" value="" class="form-control text-field" id="imaging_order_description"

                        placeholder="Description">
                        <span class ="Description_errormsg" style="color:red"></span>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-12 col-md-6 form-group">

                      <label>ORDER STATUS</label>

                      <select class="form-control select2" name="imaging_orders_status" id="imaging_order_status" placeholder="Order Status">
                        <option value="" selected="">Select Order Status</option>
                        <option value="orderentered">Order Entered</option>
                        <option value="discountinued">Discountinued</option>
                        <option value="inprogress">In Progress</option>
                        <option value="resultrecived">Results Recived</option>

                      </select>
                      <span class ="Orderstatus_errormsg" style="color:red"></span>
                    </div>

                    <div class="col-12 col-md-6 form-group">

                      <label>SCANNED IN RESULT</label>
                        <input type="file" name="scanned_result" id="scanned_result">

                        <span class ="Scannedresult_errormsg" style="color:red"></span>
                    </div>

                    <div class="col-12 form-group">

                      <label>DOCTOR COMMENTS</label>

                      <textarea class="w-100" id="doctor_comments" name="doctor_comments" rows="5"   placeholder="Doctor comments"></textarea>
                      <span class ="Doctorcomments_errormsg" style="color:red"></span>
                    </div>
                  </div>
                  <!-- <div class="row">
                  <div class="col-12 col-md-4 form-group">

                  <label>DATE&TIME</label>

                  <input type="datetime-local" name="i_date_time" value="" class="form-control text-field" id="i_date_time" placeholder="DATE & TIME">
                    <span class="i_date_time_errormsg" style="color:red"></span>
                </div>
                <div class="col-12 col-md-6 form-group">

                  <label>UPDATE BY</label>

                  <input type="text" name="i_updated_by" value="<?php //echo $this->session->userdata('fullname') ?>" class="form-control text-field" id="i_updated_by"

                    placeholder="Update By" disabled="disabled">
                     <span class="i_Updatedby_errormsg" style="color:red;"></span>
                </div>
              </div> -->
                    <div class="modal-footer text-center bottom-top">
                        <button type="button" class="btn btn-default changetabbutton">Next</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

            <div id="add-e-prescription-medication" class="tab-pane fade">
              <form method="POST">
              <div class="row">

                <div class="col-12 col-md-4 form-group">

                  <label>DRUG NAME</label>
                  	<div class="autocomplete_drugname">
                    	<input id="drug_name" type="text" name="drug_name" placeholder="Search Drug Name" class="form-control text-field">
                  	</div>
                  <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                  <span class="Drugname_errormsg" style="color:red;"></span>
                </div>

                <div class="col-12 col-md-4 form-check dis-flex text-center" style="margin-top: 35px;">

                  <input class="form-check-input prn" type="checkbox" value="yes" id="defaultCheck1">

                  <label class="form-check-label ml-10" for="defaultCheck1">PRN</label>
                  <span class="PRN_errormsg" style="color:red;"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>SIG NOTE</label>

                  <input type="text" name="sign-note" value="" class="form-control text-field" id="sign_note"

                    placeholder="Sign Note">
                    <span class="SignNote_errormsg" style="color:red;"></span>
                </div>

              </div>

              <div class="row">

                <div class="col-12 col-md-4 form-group">

                  <label>SIG </label>

                  <input type="text" name="sign" value="" class="form-control text-field" id="sign" placeholder="Sign" readonly="readonly">
                  <span class="SIG_errormsg" style="color:red;"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>INDICATION </label>

                  <input type="text" name="indication" value="" class="form-control text-field" id="indication"

                    placeholder="Indication">
                    <span class="Indication_errormsg" style="color:red;"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>STATUS</label>

                  <select class="form-control" name="status" id="e_prescription_status" placeholder="Status">

                    <option value="">Status</option>

                    <option value="1">Active</option>

                    <option value="2">Inactive</option>

                  </select>
                  <span class="Status_errormsg" style="color:red;"></span>
                </div>

              </div>

              <div class="row">

                <div class="col-12 col-md-4 form-group">
                  <label>APPOINTMENT</label>
                  	<select class="form-control select2" name="appointment" id="appointment" placeholder="Appointment">
                        <option value="">Appointment</option>
                        <?php
                            foreach($appointment as $appointment_list){
                        ?>
                        <option value="<?=$appointment_list->schedule_id;?>"><?=$appointment_list->whens;?> <?=$appointment_list->from_time;?> <?=$appointment_list->appointment_type;?></option>
                        <?php } ?>
                  </select>
                  <span class="Appointment_errormsg" style="color:red;"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>DATETIME PRESCRIBED</label>

                  <input type="datetime-local" class="form-control" id="prescribe_date_time" name="date-time" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                  <span class="PRESCRIBED_errormsg" style="color:red;"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>DATETIME STARTED TAKING</label>

                  <input type="datetime-local" class="form-control" id="started_taking_date_time" name="date-time">
                  <span class="STARTED_errormsg" style="color:red;"></span>
                </div>

              </div>

              <div class="row">

                <div class="col-12 col-md-4 form-group">

                  <label>DATETIME STOPPED TAKING</label>

                  <input type="datetime-local" class="form-control" id="stopped_taking_date_time" name="date-time">
                  <span class="STOPPED_errormsg" style="color:red;"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>DISPENSE QUANTITY </label>

                  <input type="number" name="dispense-quantity" value="" class="form-control text-field"

                    id="dispense_quantity" placeholder="Dispense Quantity" min="1">
                    <span class="Dispenseqty_errormsg" style="color:red;"></span>
                </div>

                <div class="col-12 col-md-4 form-group">

                  <label>DISPENSE PACKAGE </label>

                  <input type="text" name="dispense-package" value="" class="form-control text-field"

                    id="dispense_package" placeholder="Dispense Package">
                    <span class="Dispensepkg_errormsg" style="color:red;"></span>
                </div>

              </div>

              <div class="row">

                <div class="col-12 col-md-6 form-group">

                  <label>NUMBER REFILLS</label>

                  <input type="text" name="number-refills" value="" class="form-control text-field" id="number_refills"

                    placeholder="Number Refills">
                    <span class="Numberrefills_errormsg" style="color:red;"></span>
                </div>

                <div class="col-12 col-md-6 form-check dis-flex text-center" style="margin-top: 35px;">

                  <input class="form-check-input daw" type="checkbox" value="yes" id="defaultCheck2">

                  <label class="form-check-label ml-10" for="defaultCheck2">Daw</label>
                  <span class="Daw_errormsg" style="color:red;"></span>
                </div>

              </div>

              <div class="row">

                <div class="col-12 col-md-6 form-group">

                  <label>PHARMACY NOTE</label>

                  <input type="text" name="pharmacy-note" value="" class="form-control text-field" id="pharmacy_note"

                    placeholder="Pharmacy Note">
                    <span class="Pharmacynote_errormsg" style="color:red;"></span>
                </div>

                <div class="col-12 col-md-6 form-group">

                  <label>ORDER STATUS</label>

                  <select class="form-control select2 e_prescription_orderstatus" name="status" id="order_status" placeholder="Status">

                    <option value="" selected="">Select Order Status</option>

                    <option value="Ordered">Ordered</option>

                    <option value="Administered during visit">Administered during visit</option>

                    <option value="Electronic eRx Sent">Electronic eRx Sent</option>

                    <option value="Phoned into Pharmacy">Phoned into Pharmacy</option>

                    <option value="Faxed to Pharmacy">Faxed to Pharmacy</option>

                    <option value="Paper Rx">Paper Rx</option>

                    <option value="Prescription Printed">Prescription Printed</option>

                    <option value="Discontinued">Discontinued</option>

                    <option value="Prescribed by other Dr">Prescribed by other Dr</option>

                    <option value="Over the Counter">Over the Counter</option>

                  </select>
                  <span class="Orderstatus_errormsg" style="color:red;"></span>
                </div>

              </div>

              <div class="row">

                <div class="col-12 form-group">

                  <label>NOTES</label>

                  <textarea class="w-100" id="notes" name="notes" rows="5" placeholder="Notes"></textarea>
                    <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                    <span class="Notes_errormsg" style="color:red;"></span>
                </div>

              </div>
                <div class="modal-footer text-center bottom-top">
                    <button type="button" class="btn btn-default changetabbutton" onclick="//return save_e_prescription();">Next</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>

            </div>

            <div id="add-immunizations" class="tab-pane fade">

              <div class="panel-group mt-15" id="accordion2">

                <div class="panel panel-default">

                  <div class="panel-heading">

                    <h4 class="panel-title">

                      <a data-toggle="collapse" data-parent="#accordion2" href="#collapse1">

                        Step-1 : Select Vaccines</a>

                    </h4>

                  </div>

                  <div id="collapse1" class="panel-collapse collapse in">
                        <form method="POST">
                    <div class="panel-body">

                      <div class="row" style="padding: 10px;">

                        <div class="col-12 col-md-4 form-group">

                          <select class="form-control  Addselect_vaccination" id="Addselect_vaccination" onchange=" return get_vaccinesschedule(this.value)">

                            <option value="0">Select Vaccines</option>

                            <option value="birth">Birth - Year</option>

                            <option value="year">2-18 Years</option>

                            <option value="adult">Adult</option>

                            <option value="other">Other </option>

                          </select>
                          <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                          <span class="Vacination_errormsg" style="color:red;"></span>
                        </div>

                      </div>

                      <!-- Birth-year -->
                      <div class="select-vaccination">
                      <div class="row birth add-box" style="padding: 10px;">

                        <div class="col-12 col-md-4 form-group">

                          <label>SCHEDULE</label>
                          	<div class="autocomplete_schedule">
                                <input id="schedule" type="text" name="schedule" placeholder="Search SCHEDULE" class="form-control text-field">
                            </div>
                          <!-- <select class="form-control schedule select2" name="schedule" id="schedule" placeholder="Schedule">
                            <option value="" selected=""> Select Schedule </option>
                           <option value="1">Birth</option>

                            <option value="2">1 - 4 Months</option>

                            <option value="3">2 - 4 Months</option>

                            <option value="4">4 - 6 Months </option>

                            <option value="5">6 - 9 Months</option>

                            <option value="5">6 - 19 Months</option>

                            <option value="6">12 - 18 Months</option>

                            <option value="7">12 - 24 Months</option>

                          </select> -->
                          <span class="Schedule_errormsg" style="color:red;"></span>
                        </div>

                        <div class="col-12 col-md-4 form-group">

                          <label>VACCINE</label>
                           <div class="autocomplete_vaccine">
                                <input id="vaccine" type="text" name="vaccine" placeholder="Search VACCINE" class="form-control text-field">
                            </div>
                          <!--<select class="form-control vaccine select2" name="vaccine" id="vaccine" placeholder="Vaccine">
                                <option selected="selected" value="">Select Vaccine</option>
                                <option value="1">HepB</option>

                                <option value="2">HIB</option>

                                <option value="3">DTAP</option>

                                <option value="4">POLIO </option>

                                <option value="5">ROTAVIRUS</option>

                                <option value="5">PneumoPCV</option>

                                <option value="6">VARICELLA</option>

                                <option value="7">MMR</option>

                                <option value="8">HepA</option>
                            </select>-->
                          <span class="Vaccine_errormsg" style="color:red;"></span>
                        </div>

                        <div class="col-12 col-md-4 form-group">

                          <label>CVX CODE</label>
                            <div class="autocomplete_cvxcode">
                                <input id="immunizationscvx_code_vaccines" type="text" name="immunizationscvx_code_vaccines" placeholder="Search CVX CODE" class="form-control text-field">
                            </div>
                            <span class="Cvxcode_errormsg" style="color:red;"></span>
                        </div>

                        <!-- <div class="col-12 col-md-4 form-group">

                          <label>CONSENT FORM</label>

                          <input type="text" name="consent-form" value="" class="form-control text-field consent_form"

                            id="consent_form" placeholder="Consent Form">
                            <span class="Consentform_errormsg" style="color:red;"></span>
                        </div> -->

                        <div class="col-12 col-md-4 form-group">

                          <label>VIS</label>

                          <input type="text" name="vis" value="" class="form-control text-field vis" id="vis"

                            placeholder="VIS">
                            <span class="Vis_errormsg" style="color:red;"></span>
                        </div>

                        <div class="col-12 col-md-4 form-group">

                          <label>ADMINISTRETED ON</label>

                          <input type="datetime-local" name="administreted-on" value="" class="form-control text-field administreted_on"

                            id="administreted_on" placeholder="Administered On" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                            <span class="Administeredon_errormsg" style="color:red;"></span>
                        </div>

                        <div class="col-12 col-md-4 form-group">

                          <label>ADMINISTRETED BY</label>

                          <input type="text" readonly="readonly" name="administreted-by" value="<?php echo $this->session->userdata('fullname') ?>" class="form-control text-field administreted_by"

                            id="administreted_by" placeholder="Administered By">
                            <span class="Administeredby_errormsg" style="color:red;"></span>
                        </div>

                        <div class="col-12 col-md-4 form-group">

                          <label>STATUS</label>

                          <select class="form-control vaccinestatus" name="status" id="vaccinestatus" placeholder="Status">
                            <option selected="" value=""> Select Status </option>
                            <option value="1">Active</option>

                            <option value="2">Deactive</option>

                          </select>
                          <span class="Vaccinesstatus_errormsg" style="color:red;"></span>
                        </div>

                      </div>


                    </div>
                    </div>
                    <div class="modal-footer text-center">
                         <button type="button" class="btn btn-default immuopenaccordian" onclick="//return save_vaccines();">Next</button>
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>

                  </div>

                </div>



                  <div class="panel panel-default">

                    <div class="panel-heading">

                      <h4 class="panel-title">

                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse2">

                          Step-2: Review and Sign</a>

                      </h4>

                    </div>

                     <div id="collapse2" class="panel-collapse collapse">
                        <form method="POST" enctype="multipart/form-data" id="reviewsing_form" >
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                      <div class="panel-body">

                        <p class="mt-5 blue-color">Please distribute the Vaccine Information Statement (VIS) for each of the

                          following vaccines and have the patient/legal guardian(s) review them:</p>

                        <h4 style="background-color: #f1f1f1;padding:10px;">Upload Form / Files</h4>

                          <div class="row" style="padding: 15px;">

                            <div class="col-12 form-group">

                              <input type="file" multiple name="review_document" id="review_document" class="review_document" />
                                <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                                <span style="color:red;" class="Reviewdocument_erorrmsg"></span>
                              <!-- <input type="file" id="real-file" style="display: none;" multiple />

                              <button type="button" class="btn btn-default" id="custom-button">CHOOSE A

                                FILE</button>

                              <span id="custom-text">No file chosen, yet.</span> -->

                            </div>

                          </div>

                          <h4 style="background-color: #f1f1f1;padding:10px;">Sign Consnt Form</h4>
                          <div class="row">
                            <div class="col-md-12">
                                  <p class="mt-5 blue-color">My signature below signifies that I have read and received information about the diseases and vaccines listed below. I understand the benefits and risks of the vaccines cited, and ask that the vaccine(s) listed below be given to me or to the person named for whom I am authorized to make this request.</p>
                            </div>
                          </div>
                          <div class="sigPad">
                          <div class="row" style="padding: 15px;">
                              <div class="form-group">
                                <label>PRINT NAME</label>
                                <input type="text" name="name" value="" class="form-control text-field typename" id="printname" onkeyup="return set_valueof_printname();">
                                <span class="Printname_errormsg" style="color:red;"></span>

                              </div>

                              <ul class="sigNav">

                                <li class="typeIt"><a href="#type-it" class="current">Type It</a></li>

                                <li class="drawIt"><a href="#draw-it">Draw It</a></li>

                                <li class="clearButton"><a href="#clear">Clear</a></li>

                              </ul>

                              <div class="sig sigWrapper">

                                <div class="typed"></div>

                                <canvas class="pad" width="198" height="148"></canvas>

                                <input type="hidden" name="output" class="output">
                                <input type="hidden" name="singnature_data" class="singnature_data">
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <p  class="mt-5 blue-color"><b>I have read the vaccine information statements and agree to the above statement and acknowledging is my signature entered in this form.</b></p>
                          </div>
                        </div>
                      </div>
                       <div class="modal-footer text-center">
                            <button type="button" class="btn btn-default immuopenaccordian2">Next</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                  </form>

                    </div>

                </div>



                  <div class="panel panel-default">

                    <div class="panel-heading">

                      <h4 class="panel-title">

                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse3">

                          Step-3: Record Vaccinations</a>

                      </h4>

                    </div>

                    <div id="collapse3" class="panel-collapse collapse">
                        <form method="POST">
                      <div class="panel-body">

                        <div class="row p-15" style="border-bottom:1px solid #ddd;">

                        <!--   <div class="col-12 col-md-6 form-group">

                            <label>CONSENT FORM</label>

                            <select class="form-control select2" name="consent-form" id="record_vaccinations_consent_form"

                              placeholder="Consent Form">
                              <option value="">Select Consent Form</option>
                              <?php
                              		//foreach ($consentform as $key => $value) {
                               ?>
                              <option value="<?php //echo $value->consent_form; ?>"><?php //echo $value->consent_form; ?></option>
                          <?php //} ?>
                            </select>
                            <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                            <span class="Consent_form_errormsg" style="color:red;"></span>
                          </div> -->

                          <div class="col-12 col-md-6 form-group">

                            <label>CREATE A RECORD FOR</label>

                            <select class="form-control select2" name="create-record" id="record_vaccinations_create_record"

                              placeholder="Create a record for">

                              <option value="" select="selected">Select Create a record for</option>

                              <option value="1">Create a record for</option>

                            </select>
                            <span class="Createrecordfor_errormsg" style="color:red;"></span>
                          </div>

                        </div>

                        <div class="row p-15" style="border-bottom:1px solid #ddd;">

                          <div class="col-12 col-md-3 form-group">

                            <label>CVX Code</label>
                            <div class="autocomplete_cvxcode">
                                <input id="record_vaccinations_cvx_code" type="text" name="record_vaccinations_cvx_code" placeholder="Search CVX CODE" class="form-control text-field">
                            </div>
                            <span class="CVX_code_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-3 form-group">

                            <label>NAME</label>

                            <input type="text" name="name" value="" class="form-control text-field" id="record_vaccinations_name"

                              placeholder="Name">
                              <span class="Name_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-3 form-group">

                            <label>CPT CODE</label>

                            <input type="text" name="cpt-code" value="" class="form-control text-field" id="record_vaccinations_cpt_code"

                              placeholder="CPT Code">
                              <span class="CPT_CODE_errormsg" style="color:red;"></span>
                          </div>

                            <div class="col-12 col-md-3 form-group">
    							<label>MANUFACTURER</label>
                                 <div class="autocomplete_manfacturer">
                                    <input id="record_vaccinations_manfacturer" type="text" name="record_vaccinations_manfacturer" placeholder="Search MANUFACTURER" class="form-control text-field">
                                </div>
    							<span class="Manufacturer_errormsg" style="color:red;"></span>
                            </div>
                        </div>

                        <div class="row p-15" style="border-bottom:1px solid #ddd;">

                          <div class="col-12 col-md-4 form-group">

                            <label>LOT NUMBER</label>

                            <input type="text" name="lot-num" value="" class="form-control text-field" id="record_vaccination_lot-num"

                              placeholder="Lot Number">
                              <span class="LotNumber_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>LOT EXPIRATION DATE</label>

                            <input type="date" name="lot-num" value="" class="form-control text-field" id="record_vaccination_expirationdate"

                              placeholder="Lot expiration date" max="<?php echo date('Y-m-d') ?>">
                              <span class="Lotexpirationdate_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>ADMINISTERED AMOUNT</label>

                            <input type="number" name="administered-amount" class="form-control text-field"

                              id="administered_amount" placeholder="Administered Amount">
                              <span class="Administeredamount_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>ADMINISTERED UNITS</label>

                            <select class="form-control select2" id="record_vaccination_administered_unit" placeholder="Administered Unit">

                              <option value="">------------</option>

                              <option value="50% cell culture infectious dose">50% cell culture infectious dose</option>

                              <option value="50% tissue culture infectious dose">50% tissue culture infectious dose</option>
                              <option value="MicroGram [SI Mass Units]">MicroGram [SI Mass Units]</option>
                              <option value="MicroLiter [SI Volume Units]">MicroLiter [SI Volume Units]</option>
                              <option value="MilliEquivalent [Substance Units]">MilliEquivalent [Substance Units]</option>
                              <option value="MilliGram [SI Mass Units]">MilliGram [SI Mass Units]</option>
                              <option value="MilliLiter [SI Volume Units]">MilliLiter [SI Volume Units]</option>

                            </select>
                            <span class="Administeredunit_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>VACCINE ROUTE</label>

                            <select class="form-control select2" id="record_vaccination_vaccinate_route" placeholder="Vaccinate Route">

                              <option value="1">Vaccinate Route</option>

                              <option value="2">ID (Intradermal)</option>

                              <option value="3">NS (Nasal)</option>

                            </select>
                            <span class="Vaccinateroute_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>VACCINE SITE</label>

                            <select class="form-control select2" id="record_vaccination_vaccinate_site" placeholder="Vaccinate Site">

                              <option value="1">Vaccinate Site</option>

                              <option value="2">LA (Left Upper Arm)</option>

                              <option value="3">LD (Left Deltoid)</option>

                            </select>
                            <span class="Vaccinatesite_errormsg" style="color:red;"></span>
                          </div>

                        </div>

                        <div class="row p-15">

                          <div class="col-12 col-md-4 form-group">

                            <label>VACCINATION STATUS</label>

                            <select class="form-control select2" id="record_vaccination_vaccinate_status" placeholder="Vaccinate Status">

                              <option value="1">Complete</option>

                              <option value="2">Refused</option>

                              <option value="3">Not administered</option>

                              <option value="3">Partially administered</option>

                            </select>
                            <span class="Vaccinatestatus_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>ADMINISTERED ON</label>

                            <input type="datetime-local" class="form-control" id="record_vaccination_administred_on" name="date-time" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                            <span class="Administred_on_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>ORDERING DOCTOR</label>

                            <select class="form-control select2" id="record_vaccination_ordering_doctor" placeholder="Ordering Doctor">
                                <option selected="selected" disabled="disabled" value="">Select Ordering Doctor</option>
                                <?php
                                    foreach ($ordering_doctor as $ordering_doctor_list){
                                ?>
                                <option value="<?php echo $ordering_doctor_list->firstname.' '.$ordering_doctor_list->lastname;?>"><?php echo $ordering_doctor_list->firstname?>  <?php echo $ordering_doctor_list->lastname?></option>
                                <?php } ?>
                            </select>
                            <span class="Orderingdoctor_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>ADMINISTERED BY</label>
                            <input type="text" name="administreted-by" value="<?php echo $this->session->userdata('fullname') ?>" readonly="readonly" class="form-control text-field administreted_by" id="record_vaccination_administered_by" placeholder="Administered By">
                            <!-- <select class="form-control select2" id="record_vaccination_administered_by" placeholder="Administered By">

                              <option value="" selected="">Administered By</option>
								<?php
                              		//foreach ($administreted_by as $key => $value) {
                               ?>
                              		<option value="<?php //echo $value->administreted_by; ?>"><?php //echo $value->administreted_by; ?></option>
                          	<?php //} ?>

                            </select> -->
                            <span class="Administeredby_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>ADMINISTERED AT</label>

                            <select class="form-control select2" id="record_vaccination_administered_at" placeholder="Administered At">

                              <option value="1">Administered At</option>

                              <option value="2">-----</option>

                              <option value="3">Primary Office</option>

                            </select>
                            <span class="Administeredat_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>VACCINATION INVENTORY LOT</label>

                            <select class="form-control select2" id="record_vaccination_inventory_lot"

                              placeholder="Vaccination Inventory Lot">

                              <option value="1">Vaccination Inevntory Lot</option>

                              <option value="2">-----</option>

                              <option value="3">Primary Office</option>

                            </select>
                            	<span class="Inventorylot_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>RECORD TYPE</label>

                            <select class="form-control select2" id="record_vaccination_record_type" placeholder="Record Type">

                              <option value="1">Record Type</option>

                              <option value="2">Historical information-source unspecified</option>

                              <option value="3">Historical information-from other Provider</option>

                              <option value="4">Historical information-from Parents recall</option>

                              <option value="5">Historical information-from School record</option>

                            </select>
                            <span class="Recordtype_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>FUNDING ELIGIBILITY</label>

                            <select class="form-control select2" id="record_vaccination_funding_eligibility" placeholder="Funding Eligibility">

                              <option value="1">Funding Eligibility</option>

                              <option value="2">Not VFC Eligible</option>

                              <option value="3">VFC eligible-Uninsured</option>

                              <option value="4">VFC eligible-Medicare/Medicaid Managed Care</option>

                              <option value="5">Local Specific Eligibility</option>

                            </select>
                            	<span class="Fundingeligibility_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>OBSERVED IMMUNITY</label>

                            <select class="form-control select2" id="record_vaccination_observed_immunity" placeholder="Observed Immunity">

                              <option value="1">Observed Immunity</option>

                              <option value="2">Acute poliomyelitis (disorder)</option>

                              <option value="3">Anthrax (disorder)</option>

                              <option value="4">Diphtheria (disorder)</option>

                              <option value="5">Disease due to Rotavirus (disorder)</option>

                            </select>
                            	<span class="Observedimmunity_errormsg" style="color:red;"></span>
                          </div>

                          <div class="col-12 form-group">

                            <label>NOTES</label>

                            <textarea class="w-100" id="record_vaccination_notes" name="record_vaccination_notes" rows="5" placeholder="Notes"></textarea>
                            	<span class="Notes_errormsg" style="color:red;"></span>
                          </div>

                        </div>

                      </div>
                         <div class="modal-footer text-center">

          					<button type="button" class="btn btn-default changetabbutton" onclick="//return save_record_vaccinations()">Next</button>

         					 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        				</div>
        			</form>

                    </div>

                  </div>

              </div>


            </div>

            <div id="add-summary" class="tab-pane fade">
              <form method="POST">
                <div class="row p-15">

                  <div class="col-12 form-group ml-10 mr-10">

                    <label>SUMMARY</label>

                    <textarea class="w-100" id="summary_description" name="summary" rows="5" placeholder="Summary"></textarea>
                     <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                     <span class="Summary_errormsg" style="color:red;"></span>
                  </div>

                </div>
                    <div class="modal-footer text-center bottom-top">

                <button type="button" class="btn btn-default changetabbutton" onclick="//return save_summary();">Next</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              </div>
          </form>
            </div>

            <div id="add-document" class="tab-pane fade">

                <div class="panel-group mt-15" id="accordion51">

                  <div class="panel panel-default">

                    <div class="panel-heading">

                      <h4 class="panel-title">

                        <a data-toggle="collapse" data-parent="#accordion51" href="#collapse45">

                          Uploaded Documents</a>

                      </h4>

                    </div>

                    <div id="collapse45" class="panel-collapse collapse in">
                      <form method="POST" enctype="multipart/form-data" id="document_form">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                      <div class="panel-body">

                        <div class="row">

                          <div class="col-12 col-md-4 form-group ml-15 mb-10">

                            <label>SELECT DOCUMENT</label>

                            <select class="form-control text-field" id="document_type" name="document_type" onchange="return hide_show_document_according()">

                              <option value="">Select Document Type</option>

                              <option value="1">Locked Clinical Notes</option>

                              <option value="2">Signed Consent Forms</option>

                              <!-- <option value="3">Outbound Referrals</option> -->

                              <option value="3">Lab Result</option>

                              <option value="4">Amendments</option>
                               <label>SMOKING STATUS</label>

                  <!-- <input type="text" name="smoking" value="" class="form-control text-field" id="smoking" placeholder="Smoking Status"> -->
                            <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                            <input type="hidden" name="healthreport_document_id" class="form-control text-field healthreport_document_id" id="healthreport_document_id"/>
                            <span class="Documenttype_erorrmsg" style="color:red;"></span>
                          </div>

                        </div>

                        <div class="mt-15">


                            <div class="form-group">

                              <div class="file-loading">

							  <input id="file-1" type="file" multiple class="file document_document" data-overwrite-initial="false" data-min-file-count="2" name="document_document">

                                    <span class="Document_erorrmsg" style="color:red;"></span>

                              </div>

                            </div>
                        </div>



                      </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-default docopenaccordian">Next</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                    </form>

                    </div>

                  </div>

                  <div class="panel panel-default locked_clinical_notes_accordian" style="display: none;">

                    <div class="panel-heading">

                      <h4 class="panel-title">

                        <a data-toggle="collapse" data-parent="#accordion51" href="#collapse51">

                          Locked Clinical Notes</a>

                      </h4>

                    </div>

                    <div id="collapse51" class="panel-collapse collapse">
                      <form method="POST">
                      <div class="panel-body">

                        <div class="row" style="padding: 10px;">

                          <div class="col-12 col-md-4 form-group">

                            <label>DATE OF SERVICE</label>

                            <input type="datetime-local" class="form-control" id="date_of_service" name="date-time" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                                <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>

                                <span class="Dateofservice_erorrmsg" style="color:red"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>LOCKED BY</label>

                            <input type="text" name="locked-by" value="<?= $this->session->userdata('fullname'); ?>" readonly="readonly" class="form-control text-field" id="lockedby"  placeholder="Locked By">
                            <input type="hidden" name="locked_by" value="<?= $this->session->userdata('user_id'); ?>" id="locked_by">
                              <span class="Lockedby_erorrmsg" style="color:red"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>LOCKED ON</label>

                            <input type="datetime-local" name="Locked-on" value="" class="form-control " id="locked_on"  max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                              <span class="Lockedon_erorrmsg" style="color:red"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>ACTION</label>

                            <select class="form-control" name="action" id="lockedaction" placeholder="Action">

                              <option value="1">Accepted</option>

                              <option value="2">Decline</option>

                            </select>
                            <span class="Lockedaction_erorrmsg" style="color:red"></span>
                          </div>

                          <div class="col-12 col-md-4 form-group">

                            <label>STATUS</label>

                            <select class="form-control" name="status" id="lockedstatus" placeholder="Status">

                              <option value="1">Active</option>

                              <option value="2">Inactive</option>

                            </select>
                            <span class="Lockedstatus_erorrmsg" style="color:red"></span>
                          </div>

                          <div class="col-12 col-md-12 form-group">

                            <label>REASON</label>

                            <textarea class="w-100" id="locked_reason" name="locked_reason" rows="5" placeholder="Reason"></textarea>
                            <span class="Lockedreason_erorrmsg" style="color:red"></span>
                          </div>

                        </div>

                      </div>
                      <div class="modal-footer text-center">
                        <button type="button" class="btn btn-default docopenaccordian2 changetabbutton " onclick="//return save_clinical_notes();">Next</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>



                    </div>

                  </div>

                    <div class="panel panel-default singedconsent_form_accordian" style="display: none;">

                      <div class="panel-heading">

                        <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion1" href="#collapse6">

                            Singed Consent Forms</a>

                        </h4>

                      </div>

                      <div id="collapse6" class="panel-collapse collapse">

                        <form method="POST">
                            <div class="panel-body">

                              <div class="row" style="padding: 10px;">

                                <!-- <div class="col-12 col-md-4 form-group">

                                  <label>CONSENT FORM</label>

                                  <input type="text" name="consent-form" value="" class="form-control text-field"  id="singedconsent_form" placeholder="Consent Form">
                                        <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                                        <span class="Singedconsentform_errormsg" style="color:red;"></span>
                                </div> -->

                                <div class="col-12 col-md-4 form-group">

                                  <label>DATE OF APPOINTMENT</label>

                                  <input type="datetime-local" class="form-control" id="appointment_datetime" name="date-time" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                                  <span class="Appointment_datetime_erorrmsg" style="color:red"></span>

                                </div>

                                <div class="col-12 col-md-4 form-group">

                                  <label>DATE OF SIGNATURE</label>

                                  <input type="datetime-local" class="form-control" id="singnature_date" name="date-time" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                                  <span class="Singnature_date_erorrmsg" style="color:red"></span>
                                </div>

                                <div class="col-12 col-md-4 form-group">

                                  <label>ACTION</label>

                                  <select class="form-control" name="action" id="singnature_action" placeholder="Action">

                                    <option value="1">Accepted</option>

                                    <option value="2">Decline</option>

                                  </select>
                                  <span class="singnature_action_erorrmsg" style="color:red"></span>
                                </div>

                              </div>

                            </div>
                            <div class="modal-footer text-center">

                                <button type="button" class="btn btn-default docopenaccordian3 changetabbutton" onclick="//return save_singed_consent();">Next</button>

                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>
                        </form>

                      </div>

                    </div>

                    <div class="panel panel-default lab_result_accordian" style="display: none;">

                      <div class="panel-heading ">

                        <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion51" href="#collapse75">

                            Lab Result</a>

                        </h4>

                      </div>

                      <div id="collapse75" class="panel-collapse collapse">
                        <form method="POST">
                        <div class="panel-body">

                          <div class="row" style="padding: 10px;">

                            <div class="col-12 col-md-4 form-group">

                              <label>LAB</label>

                              <input type="text" name="lab" value="" class="form-control text-field" id="document_lab"

                                placeholder="Lab">
                                <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                                <span class="Documnetlab_erorrmsg" style="color:red;"></span>
                            </div>

                            <div class="col-12 col-md-4 form-group">

                              <label>DATE</label>

                              <input type="datetime-local" class="form-control" id="document_labdate_time" name="date-time" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                              <span class="Documnetdate_erorrmsg" style="color:red;"></span>
                            </div>

                            <div class="col-12 col-md-4 form-group">

                              <label>ACTION</label>

                              <select class="form-control" name="action" id="document_labaction" placeholder="Action">

                                <option value="1">Accepted</option>

                                <option value="2">Decline</option>

                              </select>
                              <span class="Documnetlabaction_erorrmsg" style="color:red;"></span>
                            </div>

                            <div class="col-12 col-md-4 form-group">

                              <label>ABNORMAL</label>

                              <select class="form-control" name="abnormal" id="document_abnormal" placeholder="Abnormal">

                                <option value="1">Yes</option>

                                <option value="2">No</option>

                              </select>
                              <span class="Documnetabnormal_erorrmsg" style="color:red;"></span>
                            </div>

                            <div class="col-12 col-md-4 form-group">

                              <label>RESULT COUNT</label>

                              <input type="text" name="result-count" value="" class="form-control text-field"

                                id="document_result_count" placeholder="Result Count">
                                <span class="Documnetresultcount_erorrmsg" style="color:red;"></span>
                            </div>

                            <div class="col-12 col-md-4 form-group">

                              <label>TEST</label>

                              <input type="text" name="test" value="" class="form-control text-field" id="document_test"

                                placeholder="test">
                                <span class="Documnettest_erorrmsg" style="color:red;"></span>
                            </div>

                          </div>

                        </div>

                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-default docopenaccordian4 changetabbutton" onclick="//return save_lab_result();">Next</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                      </form>

                      </div>

                    </div>

                    <div class="panel panel-default amendments_accordian" style="display: none;">

                      <div class="panel-heading">

                        <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion51" href="#collapse85">

                            Amendments</a>

                        </h4>

                      </div>

                      <div id="collapse85" class="panel-collapse collapse">
                        <form method="POST" enctype="multipart/form-data" accept-charset="utf-8" id="amendments_form">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="panel-body">

                          <div class="row p-15">
                            <!-- <div class="col-12 col-md-4 form-group">
                                <label>AMENDMENTS DOCUMENT</label><br>
                                <div style="margin-top: 10px">
                                    <input type="file" multiple id="amendments_doc" id="amendments_doc" name="amendments_doc" />
                                    <span class="Amendmentsdoc_erorrmsg" style="color:red;"></span>
                                </div>
                            </div> -->

                            <div class="col-12 col-md-4 form-group">

                              <label>AMENDMENTS SOURCE</label>

                              <input type="text" name="amendment_source" value="" class="form-control text-field"  id="amendment_source" placeholder="Amendment Source">
                              <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                                <span class="Amendment_source_erorrmsg" style="color:red;"></span>
                            </div>

                            <div class="col-12 col-md-4 form-group">

                              <label>STATUS</label>

                              <select class="form-control" id="amendment_status" placeholder="Status" name="amendment_status">

                                <option value="">Status</option>

                                <option value="2">Accepted </option>

                                <option value="3">Denied</option>

                              </select>
                              <span class="Amendment_status_erorrmsg" style="color:red;"></span>
                            </div>

                          </div>

                          <div class="row p-15">

                            <div class="col-12 col-md-6 form-group">

                              <label>REQUEST DATE</label>

                              <input type="datetime-local" class="form-control" id="amdments_date_time" name="amdments_date_time" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                              <span class="Amdments_date_time_erorrmsg" style="color:red;"></span>
                            </div>

                            <div class="col-12 col-md-6 form-group">

                              <label>PROCESSED DATE</label>

                              <input type="datetime-local" class="form-control" id="amdmentsproccess_date_time" name="amdmentsproccess_date_time" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                              <span class="Amdmentsproccess_date_time_erorrmsg" style="color:red;"></span>
                            </div>

                          </div>

                        </div>

                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-default changetabbutton">Next</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                      </form>

                      </div>

                    </div>



                </div>

         <!--    <div class="modal-footer text-center">
              <button type="submit" class="btn btn-default">Save</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div> -->


            </div>

            <div id="add-record" class="tab-pane fade">
			<form method="POST">
              <div class="row p-25">

               <!--  <div class="col-12 col-md-6 form-group">

                  <label>DOCTOR NAME</label>
                    <select class="form-control" id="doctor_name" name="doctor_name">
                        <option value="">Select Doctor</option>
                        <?php //foreach($doctors as $doctors_list){
                        ?>
                        <option value="<?php// echo $doctors_list->user_id; ?>"><?php// echo $doctors_list->firstname." ".$doctors_list->lastname; ?></option>
                    <?php //} ?>
                    </select>

                    <span class="Doctorname_errormsg" style="color:red;"></span>
                </div> -->

                <div class="col-12 col-md-6 form-group">

                  <label>DATE&TIME</label>

                  <input type="text" readonly="readonly" class="form-control" id="healtrecord_date_time" name="healtrecord_date_time" value="<?php echo date("Y-m-d h:i:s"); ?>">
                  <span class="Healtrecorddatetime_errormsg" style="color:red;"></span>
                  <input type="hidden" name="patient-name" value="" class="form-control text-field" id="patient_name">
                  <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                </div>

               <!--  <div class="col-12 col-md-6 form-group">

                  <label>PATIENT NAME</label>

                  <input type="text" name="patient-name" value="" class="form-control text-field" id="patient_name"

                    placeholder="Patient Name" disabled="disabled">
                     <span class="Patientname_errormsg" style="color:red;"></span>
                </div> -->

                <div class="col-12 col-md-6 form-group">

                  <label>UPDATE BY</label>

                  <input type="text" name="upload-by" value="<?php echo $this->session->userdata('fullname') ?>" class="form-control text-field" id="updated_by"

                    placeholder="Update By" disabled="disabled">
                     <span class="Updatedby_errormsg" style="color:red;"></span>
                </div>

              </div>
                <div class="modal-footer text-center bottom-top">
                    <button type="button" class="btn btn-default" onclick="return save_healthrecord();">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
             <form>

          </div>

        </div>



</div>
</div>

      </div>
<!-- edit modal -->
<div class="modal fade" id="hospital-record-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

     aria-hidden="true">&times;</span>

 </button>
 <h4 class="modal-title" id="myModalLabel">Edit Health Record </h4>

</div>

<div class="modal-body">
   <div class="alert-messge" style="visibility:hidden;">

   </div>

    <div class="alert-errormessge" style="visibility:hidden;">

   </div>

 <ul class="nav nav-tabs">

   <li class="active"><a data-toggle="tab" href="#edit-vital-signs">Vital Sign</a></li>

   <li><a data-toggle="tab" href="#edit-problem-allergy-list">Problem Allergies List</a></li>

   <li><a data-toggle="tab" href="#edit-lab-result">Lab Result</a></li>

   <li><a data-toggle="tab" href="#edit-imaging-order">Imaging Order</a></li>

   <li><a data-toggle="tab" href="#edit-e-prescription-medication">E-prescription Medication</a></li>

   <li><a data-toggle="tab" href="#edit-immunizations">Immunizations</a></li>

   <li><a data-toggle="tab" href="#edit-summary">Summary</a></li>

   <li><a data-toggle="tab" href="#edit-document">Document</a></li>

   <!-- <li><a data-toggle="tab" href="#edit-record">Health Record</a></li> -->

 </ul>

 <div class="tab-content">

   <div id="edit-vital-signs" class="tab-pane fade in active">
     <form method="POST">
     <div class="row">

       <div class="col-12 col-md-4 form-group">

         <label>TEMPERATURE(°F)</label>

         <input type="text" name="temp" value="" class="form-control text-field" id="temp_e"  placeholder="Temperature">
 <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID_e"/>
 <input type="hidden" name="vital_id" class="form-control text-field" id="vital_id"/>
 <span class="Temperature_errormsg" style="color:red"></span>

       </div>
       <div class="col-12 col-md-4 form-group">
          <label>Bloodtype</label>
	         <select name="bloodtype_e" class="form-control text-field bloodtype select_e2" id="bloodtype_e">
                <option value="A-positive">A-positive</option>
                <option value="A-negative">A-negative</option>
                <option value="B-positive">B-positive</option>
                <option value="B-negative">B-negative</option>
                <option value="AB-positive">AB-positive</option>
                <option value="AB-negative">AB-negative</option>
                <option value="O-positive">O-positive</option>
                <option value="O-negative">O-negative</option>
            </select>
          <span class="Temperature_errormsg" style="color:red"></span>

        </div>

       <div class="col-12 col-md-4 form-group">

         <label>HEART RATE/PLUSE (bpm)</label>

         <input type="text" name="heart-rate" value="" class="form-control text-field" id="heart-rate_e"   placeholder="Heart Rate/Pulse">
         <span class="Heartrate_errormsg" style="color:red"></span>

       </div>

       <div class="col-12 col-md-4 form-group">

         <label>BLOOD PRESSURE (mmHg)</label>

         <input type="text" name="blood-presure" value="" class="form-control text-field" id="blood-presure_e"

           placeholder="Blood Presure">
           <span class="Bloodpresure_errormsg" style="color:red"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>RESPIRATORY RATE (rpm)</label>

         <input type="text" name="respiratory-rate" value="" class="form-control text-field"

           id="respiratory-rate_e" placeholder="Respiratory rate">
           <span class="Respiratoryrate_errormsg" style="color:red"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>OXYGEN SATURATION (%)</label>

         <input type="text" name="oxygen-saturation" value="" class="form-control text-field"

           id="oxygen-saturation_e" placeholder="Oxygen Saturation">
           <span class="Oxygensaturation_errormsg" style="color:red"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>HEIGHT (in)</label>

         <input type="text" name="height" value="" class="form-control text-field" id="height_e" placeholder="Height">
            <span class="Height_errormsg" style="color:red"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>WEIGHT (lbs)</label>

         <input type="text" name="weight" value="" class="form-control text-field" id="weight_e" placeholder="Weight">
           <span class="Weight_errormsg" style="color:red"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>BMI (kg/m2)</label>

         <input type="text" name="bmi" value="" class="form-control text-field" id="bmi_e" placeholder="BMI">
         <span class="BMI_errormsg" style="color:red"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>PAIN (1-10)</label>

         <input type="text" name="pain" value="" class="form-control text-field" id="pain_e" placeholder="Pain">
 <span class="Pain_errormsg" style="color:red"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>SMOKING STATUS</label>

         <!-- <input type="text" name="smoking" value="" class="form-control text-field" id="smoking_e"

           placeholder="Smoking Status"> -->
           <select name="smoking" id="smoking_e" class="form-control text-field">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
           <span class="Smoking_errormsg" style="color:red"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>HEAD CIRCUMFERENCE</label>

         <input type="text" name="head-circumfernce" value="" class="form-control text-field"

           id="head-circumfernce_e" placeholder="Head Circumference">
           <span class="Head_circumference_errormsg" style="color:red"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>GLUCOSE BY GLUCOMETER</label>

         <input type="text" name="glucose-glucometer" value="" class="form-control text-field"

           id="glucose-glucometer_e" placeholder="Glucose by Glucometer">
           <span class="Glucose_by_glucometer_errormsg" style="color:red"></span>
       </div>

     </div>
       <div class="modal-footer text-center bottom-top">

       <button type="button" class="btn btn-default" onclick="return edit_vitalsing()">Save</button>

       <button type="button" class="btn btn-default" onclick="return get_vitalsigns()" data-dismiss="modal">Close</button>
</form>
</div>

   </div>

   <div id="edit-problem-allergy-list" class="tab-pane fade">


     <div class="panel-group" id="accordion">

       <div class="panel panel-default">

         <div class="panel-heading">

           <h4 class="panel-title">

             <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">

               Problem List</a>

           </h4>

         </div>

         <div id="collapse11" class="panel-collapse collapse in">
            <form method="POST">
           <div class="panel-body">

             <div class="row">

               <div class="col-12 col-md-6 form-group">

                 <label>PROBLEM</label>
                    <div class="autocomplete_problem">
                        <input id="select_problem_e" type="text" name="problem" placeholder="Search Problem" class="form-control text-field">
                    </div>
                   <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID_ap"/>
                   <input type="hidden" name="healthreport_problem_id" class="form-control text-field" id="healthreport_problem_id"/>
                   <span class ="Problem_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 col-md-3 form-group">

                 <label>ICD VERSION</label>
                    <div class="autocomplete_icdversion">
                        <input id="icdversion_e" type="text" name="icdversion" placeholder="Search ICD version" class="form-control text-field">
                    </div>
                 <span class ="Icdversion_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 col-md-3 form-group">

                 <label>ICD10 CODE</label>

                 <input type="text" name="icd10-code" value="" class="form-control text-field" id="icd10_code_e"

                   placeholder="ICD10 Code">
                   <span class ="Icd10code_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 col-md-4 form-group">

                 <label>SNOMED CT CODE</label>

                 <input type="text" name="snomed-ct-code" value="" class="form-control text-field"

                   id="snomed_ct_code_e" placeholder="SnoMED CT Code">
                   <span class ="Snomedctcode_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 col-md-4 form-group">

                 <label>Status</label>

                 <select class="form-control" name="problem_status" id="problem_status_e" placeholder="Status">

                   <option value="status">---</option>

                   <option value="active">Active</option>

                   <option value="inactive">Inactive</option>

                   <option value="resolved">Resolved</option>

                 </select>
                 <span class ="Problemstatus_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 col-md-4 form-group">

                 <label>DATETIME DIAGNOSIS</label>

                 <input type="datetime-local" class="form-control" id="diagnosis_datetime_e" name="diagnosis_datetime" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                 <span class ="Diagnosisdatetime_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 col-md-6 form-group">

                 <label>DATETIME ONSET</label>

                 <input type="datetime-local" class="form-control" id="onset_datetime_e" name="onset_datetime">
                 <span class ="Onsetdatetime_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 col-md-6 form-group">

                 <label>DATETIME CHANNGED</label>

                 <input type="datetime-local" class="form-control" id="channged_datetime_e" name="channged_datetime" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                 <span class ="Channgeddatetime_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 form-group">

                 <label>NOTES</label>

                 <textarea class="w-100" id="problem_notes_e" name="notes" rows="5" placeholder="Notes"></textarea>
                 <span class ="notes_errormsg" style="color:red"></span>
               </div>

             </div>


           </div>
           <div class="modal-footer text-center bottom-top">

               <button type="button" class="btn btn-default" onclick="return edit_problemlist();">Save</button>

               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

           </div>

       </form>

         </div>

       </div>

       <div class="panel panel-default">

         <div class="panel-heading">

           <h4 class="panel-title">

             <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">

               Allergy List</a>

           </h4>

         </div>

         <div id="collapse12" class="panel-collapse collapse">

            <form method="POST">
           <div class="panel-body">

             <div class="row">


               <div class="col-12 col-md-6 form-group">

                 <label>ALLERGY TYPE</label>

                    <select class="form-control select_e2" name="allergy_type_e" id="allergy_type_e" placeholder="Allergy" >
                        <option selected=""  value="">Select ALLERGY TYPE</option>
                        <option value="blank">---------</option>
                        <option value="specificdrug">Specific Drug allergy</option>
                        <option value="drugclass">Drug Class allergy</option>
                        <option value="nondrug">Non-Drug allergy</option>
                        <option value="nkda">No Known Drug Allergies (NKDA)</option>
                    </select>

                   <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                   <input type="hidden" name="healthreport_allergies_id" class="form-control text-field " id="healthreport_allergies_id"/>
                    <span class ="Allergytype_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 col-md-6 form-group">
                 <label>DRUG ALLERGY</label>
                    <div class="autocomplete_problem">
                        <input id="drug_allergy_e" type="text" name="drug_allergy_e" placeholder="Search Drug Allergy" class="form-control text-field">
                    </div>
                  <span class ="Drugallergy_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 col-md-4 form-group">

                 <label>REACTION</label>

                 <select class="form-control reaction select_e2" name="reaction_e" id="reaction_e" placeholder="Reaction">
                   <option value="" selected=""></option>

                                                 <option value="Acute kidney failure">Acute kidney failure</option>

                                                 <option value="Anaphylaxis">Anaphylaxis</option>

                                                 <option value="Arthralgia">Arthralgia</option>

                                                 <option value="Chills">Chills</option>

                                                 <option value="Cough">Cough</option>

                                                 <option value="Fever">Fever</option>

                                                 <option value="Headache">Headache</option>

                                                 <option value="Hives">Hives</option>

                                                 <option value="Malaise/fatigue">Malaise/fatigue</option>

                                                 <option value="Myalgia">Myalgia</option>

                                                 <option value="Nasal congestion">Nasal congestion</option>

                                                 <option value="Nausea">Nausea</option>

                                                 <option value="Pain/soreness at injection site">Pain/soreness at injection site</option>

                                                 <option value="Rash">Rash</option>

                                                 <option value="Respiratory distress">Respiratory distress</option>

                                                 <option value="Rhinorrhea">Rhinorrhea</option>

                                                 <option value="Shortness of breath/difficulty breathing">Shortness of breath/difficulty breathing</option>

                                                 <option value="Sore throat">Sore throat</option>

                                                 <option value="Swelling">Swelling</option>

                 </select>
                 <span class ="Reaction_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 col-md-4 form-group">

                 <label>SEVERITY</label>

                 <select class="form-control select_e2" name="severity_e" id="severity_e" placeholder="Severity">

                   <option value="" selected="">---------</option>

                          <option value="Fatal">Fatal</option>

                          <option value="Severe">Severe</option>

                          <option value="Moderate to severe">Moderate to severe</option>

                          <option value="Moderate">Moderate</option>

                          <option value="Mild to moderate">Mild to moderate</option>

                          <option value="Mild">Mild</option>

                          <option value="Unknown">Unknown</option>

                 </select>
                 <span class ="Severity_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 col-md-4 form-group">

                 <label>Status</label>

                 <select class="form-control" name="allergy_status" id="allergy_status_e" placeholder="Status">

                   <option value="1">Status</option>

                   <option value="active">Active</option>

                   <option value="inactive">Inactive</option>

                 </select>
                   <span class ="Allergystatus_errormsg" style="color:red"></span>
               </div>

               <div class="col-12 form-group">

                 <label>NOTES</label>

                 <textarea class="w-100" id="allergy_notes_e" name="notes" rows="5" placeholder="Notes"></textarea>
                 <span class ="notes_errormsg" style="color:red"></span>
               </div>

             </div>

           </div>

               <div class="modal-footer text-center bottom-top">

			   		<button type="button" class="btn btn-default" onclick="return allergy_edit();">Save</button>

                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>

       </form>



         </div>

       </div>

     </div>



   </div>

   <div id="edit-lab-result" class="tab-pane fade">

     <form method="POST">
     <div class="row">

       <div class="col-12 col-md-4 form-group">

         <label>LOINC CODE</label>
            <div class="autocomplete_loinccode">
                <input id="loinc_code_e" type="text" name="loinc_code" placeholder="Search Loinc Code" class="form-control text-field">
            </div>
         <!-- <select class="form-control select_e2" id="loinc_code_e">
           <option value="">Select Lonic Code</option>
           <?php
              /* foreach ($loinc_code as $loinc_code_value) {
           ?>
           <option value="<?php echo $loinc_code_value->loinc_code_id ?>"><?php echo $loinc_code_value->loinc_code ?></option>
       <?php }*/ ?>

         </select> -->
           <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
           <input type="hidden" name="healthreport_labresult_id" class="form-control text-field" id="healthreport_labresult_id"/>
           <span class ="Loniccode_errormsg" style="color:red"></span>
       </div>

     </div>

     <div class="row">

       <div class="col-12 form-group">

         <label>DISCRIPTION</label>

         <textarea class="w-100" id="discription_e" name="discription" rows="5"

           placeholder="Discription"></textarea>
           <span class ="Discription_errormsg" style="color:red"></span>
       </div>

     </div>

     <div class="row">

       <div class="col-12 col-md-6 form-group">

         <label>RESULT VALUE</label>

         <input type="text" name="result-value" value="" class="form-control text-field" id="result_value_e"

           placeholder="Result value">
           <span class ="Resultvalue_errormsg" style="color:red"></span>
       </div>

       <div class="col-12 col-md-6 form-group">

         <label>UNITS</label>

         <input type="text" name="units" value="" class="form-control text-field" id="units_e"

           placeholder="Units">
           <span class ="Units_errormsg" style="color:red"></span>
       </div>

       <div class="col-12 col-md-6 form-group">

         <label>NORMAL RANGE</label>

         <input type="text" name="normal-range" value="" class="form-control text-field" id="normal_range_e"

           placeholder="NORMAL RANGE">
           <span class ="Normalrange_errormsg" style="color:red"></span>
       </div>

       <div class="col-12 col-md-6 form-group">

         <label>ABNORMAL FLAG</label>

         <select class="form-control select_e2" name="cvx-code" id="cvx_code_e" placeholder="CVX-Code">
           <option value="">Select ABNORMAL FLAG</option>
           <option value="1">L -- Below low normal</option>

           <option value="2">H -- Above high normal</option>

           <option value="3">LL -- Below lower panic limits</option>

           <option value="4">HH -- Above upper panic limits</option>

           <option value="5">

             < -- Below absolute low-off instrument scale</option>

           <option value="6">> -- Above absolute high-off instrument scale</option>

           <option value="7">N -- Normal (applies to non-numeric results)</option>

           <option value="8">A -- Abnormal (applies to non-numeric results)</option>

           <option value="9">----</option>

           <option value="10">null -- No range defined, or normal ranges don't apply</option>

           <option value="11">U -- Significant change up</option>

           <option value="12">D -- Significant change down</option>

           <option value="13">B -- Better--use when direction not relevant</option>

           <option value="14">W -- Worse--use when direction not relevant</option>

           <option value="15">S -- Susceptible. Indicates for microbiology susceptibilities only.</option>

           <option value="16">R -- Resistant. Indicates for microbiology susceptibilities only.</option>

           <option value="17">I -- Intermediate. Indicates for microbiology susceptibilities only.</option>

           <option value="18">MS -- Moderately susceptible. Indicates for microbiology susceptibilities only.

           </option>

           <option value="19">VS -- Very susceptible. Indicates for microbiology susceptibilities only.

           </option>

         </select>
         <span class ="Abnormalflag_errormsg" style="color:red"></span>
       </div>

     </div>
       <div class="modal-footer text-center bottom-top">
             <button type="button" class="btn btn-default" onclick="return edit_labresult();">Save</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
   </form>

   </div>

   <div id="edit-imaging-order" class="tab-pane fade">
     <form method="POST" enctype="multipart/form-data" id="imaging_order_form_e">
           <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
         <div class="row">

           <div class="col-12 col-md-6 form-group">
               <label>CPT CODE</label>
                <div class="autocomplete_cpt_code">
                    <input id="cpt_code_e" type="text" name="cpt_code" placeholder="Search CPT Code" class="form-control text-field">
                </div>
                <!-- <select class="form-control select_e2" id="cpt_code_e" placeholder="CPT Code" name="cpt_code">
                   <option value="">Select CPT Code</option>
                   <?php  /*foreach ($cpt_code as $key => $cpt_codevalue) {
                   ?>
                       <option value="<?php //echo $cpt_codevalue->cpt_id ?>"><?php //echo $cpt_codevalue->cpt_code ?></option>
                   <?php } */?>
                 </select> -->
                 <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                 <input type="hidden" name="healthreport_imaging_id" class="form-control text-field" id="healthreport_imaging_id"/>
                 <span class ="Cptcode_errormsg" style="color:red"></span>
           </div>

           <div class="col-12 col-md-6 form-group">

             <label>DISCRIPTION</label>

             <input type="text" name="imaging_order_description" value="" class="form-control text-field" id="imaging_order_description_e"

               placeholder="Description">
               <span class ="Description_errormsg" style="color:red"></span>
           </div>

         </div>

         <div class="row">

           <div class="col-12 col-md-6 form-group">

             <label>ORDER STATUS</label>

             <select class="form-control" name="imaging_orders_status" id="imaging_order_status_e" placeholder="Order Status">
               <option value="" selected="">Select Order Status</option>
               <option value="orderentered">Order Entered</option>
               <option value="discountinued">Discountinued</option>
               <option value="inprogress">In Progress</option>
               <option value="resultrecived">Results Recived</option>

             </select>
             <span class ="Orderstatus_errormsg" style="color:red"></span>
           </div>

           <div class="col-12 col-md-6 form-group">

             <label>SCANNED IN RESULT</label>
               <input type="file" name="scanned_result" id="scanned_result_e">
               <span class ="Scannedresult_errormsg" style="color:red"></span>
           </div>

           <div class="col-12 form-group">

             <label>DOCTOR COMMENTS</label>

             <textarea class="w-100" id="doctor_commentse" name="doctor_comments" rows="5"   placeholder="Doctor comments"></textarea>
             <span class ="Doctorcomments_errormsg" style="color:red"></span>
           </div>
         </div>
           <div class="modal-footer text-center bottom-top">
               <button type="submit" class="btn btn-default">Save</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
       </form>
   </div>

   <div id="edit-e-prescription-medication" class="tab-pane fade">
     <form method="POST">
     <div class="row">

       <div class="col-12 col-md-4 form-group">

         <label>DRUG NAME</label>
         <div class="autocomplete_drugname">
            <input id="drug_name_e" type="text" name="drug_name_e" placeholder="Search Drug Name" class="form-control text-field">
        </div>
         <!-- <select class="form-control select_e2" id="drug_name_e" placeholder="Drug Name">
               <option value="" selected >Select Drug Name</option>
           <?php
               /*foreach ($drug as $key => $drugvalue) {
           ?>
           <option value="<?php //echo $drugvalue->drug_id ?>"><?php //echo $drugvalue->drug_name ?></option>
       <?php } */?>
         </select> -->
         <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
         <input type="hidden" name="e_prescription_id" class="form-control text-field" id="e_prescription"/>
         <span class="Drugname_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-4 form-check dis-flex text-center" style="margin-top: 35px;">

         <input class="form-check-input prn" type="checkbox" value="yes" id="defaultCheck1_e">

         <label class="form-check-label ml-10" for="defaultCheck1">PRN</label>
         <span class="PRN_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>SIG NOTE</label>

         <input type="text" name="sign-note" value="" class="form-control text-field" id="sign_note_e"

           placeholder="Sign Note">
           <span class="SignNote_errormsg" style="color:red;"></span>
       </div>

     </div>

     <div class="row">

       <div class="col-12 col-md-4 form-group">

         <label>SIG </label>

         <input type="text" name="sign" value="" class="form-control text-field" id="sign_e" placeholder="Sign" readonly="readonly">
         <span class="SIG_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>INDICATION </label>

         <input type="text" name="indication" value="" class="form-control text-field" id="indication_e"

           placeholder="Indication">
           <span class="Indication_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>STATUS</label>

         <select class="form-control" name="status" id="e_prescription_status_e" placeholder="Status">

           <option value="">Status</option>

           <option value="active">Active</option>

           <option value="inactive">Inactive</option>

         </select>
         <span class="Status_errormsg" style="color:red;"></span>
       </div>

     </div>

     <div class="row">

       <div class="col-12 col-md-4 form-group">

         <label>APPOINTMENT</label>
            <select class="form-control" name="appointment" id="appointment_e" placeholder="Appointment">
               <option value="">Appointment</option>
               <?php
                   foreach($appointment as $appointment_list){
               ?>
               <option value="<?=$appointment_list->schedule_id;?>"><?=$appointment_list->whens;?> <?=$appointment_list->from_time;?> <?=$appointment_list->appointment_type;?></option>
               <?php } ?>
            </select>
         <span class="Appointment_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>DATETIME PRESCRIBED</label>

         <input type="datetime-local" class="form-control" id="prescribe_date_time_e" name="date-time" >
         <span class="PRESCRIBED_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>DATETIME STARTED TAKING</label>

         <input type="datetime-local" class="form-control" id="started_taking_date_time_e" name="date-time">
         <span class="STARTED_errormsg" style="color:red;"></span>
       </div>

     </div>

     <div class="row">

       <div class="col-12 col-md-4 form-group">

         <label>DATETIME STOPPED TAKING</label>

         <input type="datetime-local" class="form-control" id="stopped_taking_date_time_e" name="date-time">
         <span class="STOPPED_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>DISPENSE QUANTITY </label>

         <input type="number" name="dispense-quantity" value="" class="form-control text-field"

           id="dispense_quantity_e" placeholder="Dispense Quantity">
           <span class="Dispenseqty_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-4 form-group">

         <label>DISPENSE PACKAGE </label>

         <input type="text" name="dispense-package" value="" class="form-control text-field"

           id="dispense_package_e" placeholder="Dispense Package">
           <span class="Dispensepkg_errormsg" style="color:red;"></span>
       </div>

     </div>

     <div class="row">

       <div class="col-12 col-md-6 form-group">

         <label>NUMBER REFILLS</label>

         <input type="text" name="number-refills" value="" class="form-control text-field" id="number_refills_e"

           placeholder="Number Refills">
           <span class="Numberrefills_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-6 form-check dis-flex text-center" style="margin-top: 35px;">

         <input class="form-check-input daw" type="checkbox" value="yes" id="defaultCheck2_e">

         <label class="form-check-label ml-10" for="defaultCheck2_e">Daw</label>
         <span class="Daw_errormsg" style="color:red;"></span>
       </div>

     </div>

     <div class="row">

       <div class="col-12 col-md-6 form-group">

         <label>PHARMACY NOTE</label>

         <input type="text" name="pharmacy-note" value="" class="form-control text-field" id="pharmacy_note_e"

           placeholder="Pharmacy Note">
           <span class="Pharmacynote_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-6 form-group">

         <label>ORDER STATUS</label>

         <select class="form-control select_e2 e_prescription_orderstatus_e" name="status" id="order_status_e" placeholder="Status">

           <option value="1">Order Status</option>

           <option value="ordered">Ordered</option>

           <option value="administered_during_visit">Administered During visit </option>

           <option value="electronic_erx_sent">Electronic eRX Sent</option>

           <option value="paper_rx">Paper Rx</option>

         </select>
         <span class="Orderstatus_errormsg" style="color:red;"></span>
       </div>

     </div>

     <div class="row">

       <div class="col-12 form-group">

         <label>NOTES</label>

         <textarea class="w-100" id="notes_e" name="notes" rows="5" placeholder="Notes"></textarea>
           <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
           <span class="Notes_errormsg" style="color:red;"></span>
       </div>

     </div>
       <div class="modal-footer text-center bottom-top">
           <button type="button" class="btn btn-default" onclick="return edit_e_prescription();">Save</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
   </form>

   </div>

   <div id="edit-immunizations" class="tab-pane fade">

     <div class="panel-group mt-15" id="accordion21">

       <div class="panel panel-default">

         <div class="panel-heading">

           <h4 class="panel-title">

             <a data-toggle="collapse" data-parent="#accordion21" href="#collapse21">

               Step-1 : Select Vaccines</a>

           </h4>

         </div>

         <div id="collapse21" class="panel-collapse collapse in">
               <form method="POST">
           <div class="panel-body">

             <div class="row" style="padding: 10px;">

               <div class="col-12 col-md-4 form-group">

                 <select class="form-control Addselect_vaccination" id="Addselect_vaccination_e" onchange="return get_edit_vaccinesschedule(this.value);">

                   <option value="0">Select Vaccines</option>

                   <option value="birth">Birth - Year</option>

                   <option value="year">2-18 Years</option>

                   <option value="adult">Adult</option>

                   <option value="other">Other </option>

                 </select>
                 <input type="hidden" name="vaccines_e_ID" class="form-control text-field vaccines_e_ID" id="vaccines_e_ID"/>
                 <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                 <span class="Vacination_errormsg" style="color:red;"></span>
               </div>

             </div>

             <!-- Birth-year -->
             <div class="select-vaccination">
             <div class="row birth add-box" style="padding: 10px;">

               <div class="col-12 col-md-4 form-group">

                 <label>SCHEDULE</label>
                    <div class="autocomplete_schedule">
                        <input id="schedule_e" type="text" name="schedule" placeholder="Search SCHEDULE" class="form-control text-field">
                    </div>
                 <span class="Schedule_errormsg" style="color:red;"></span>
               </div>

               <div class="col-12 col-md-4 form-group">

                 <label>VACCINE</label>
                    <div class="autocomplete_vaccine">
                        <input id="vaccine_e" type="text" name="vaccine" placeholder="Search Vaccine" class="form-control text-field">
                    </div>
                 <!-- <select class="form-control vaccine select_e2" name="vaccine" id="vaccine_e" placeholder="Vaccine">
                   <option selected="selected" value="">Select Vaccine</option>

                 </select> -->
                 <span class="Vaccine_errormsg" style="color:red;"></span>
               </div>

               <div class="col-12 col-md-4 form-group">

                 <label>CVX CODE</label>
                    <div class="autocomplete_loinccode">
                        <input id="immunizationscvx_code_vaccines_e" type="text" name="cvx-code" placeholder="Search CVX Code" class="form-control text-field">
                    </div>
                  <span class="Cvxcode_errormsg" style="color:red;"></span>
               </div>

               <!-- <div class="col-12 col-md-4 form-group">

                 <label>CONSENT FORM</label>

                 <input type="text" name="consent-form" value="" class="form-control text-field consent_form"

                   id="consent_form" placeholder="Consent Form">
                   <span class="Consentform_errormsg" style="color:red;"></span>
               </div> -->

               <div class="col-12 col-md-4 form-group">

                 <label>VIS</label>

                 <input type="text" name="vis" value="" class="form-control text-field vis" id="vis_e"

                   placeholder="VIS">
                   <span class="Vis_errormsg" style="color:red;"></span>
               </div>

               <div class="col-12 col-md-4 form-group">

                 <label>ADMINISTRETED ON</label>

                 <input type="text" name="administreted-on" value="" class="form-control text-field administreted_on"

                   id="administreted_on_e" placeholder="Administered On" disabled="disabled"  max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                   <span class="Administeredon_errormsg" style="color:red;"></span>
               </div>

               <div class="col-12 col-md-4 form-group">

                 <label>ADMINISTRETED BY</label>

                 <input type="text" disabled="disabled" name="administreted-by" value="<?php echo $this->session->userdata('fullname') ?>" class="form-control text-field administreted_by"

                   id="administreted_by_e" placeholder="Administered By">
                   <span class="Administeredby_errormsg" style="color:red;"></span>
               </div>

               <div class="col-12 col-md-4 form-group">

                 <label>STATUS</label>

                 <select class="form-control vaccinestatus" name="status" id="vaccinestatus_e" placeholder="Status">
                   <option selected="" value=""> Select Status </option>
                   <option value="1">Active</option>

                   <option value="2">Deactive</option>

                 </select>
                 <span class="Vaccinesstatus_errormsg" style="color:red;"></span>
               </div>

             </div>


           </div>
           </div>
           <div class="modal-footer text-center">
                <button type="button" class="btn btn-default" onclick="return edit_Vaccines();">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
       </form>

         </div>

       </div>



         <div class="panel panel-default">

           <div class="panel-heading">

             <h4 class="panel-title">

               <a data-toggle="collapse" data-parent="#accordion21" href="#collapse22">

                 Step-2: Review and Sign</a>

             </h4>

           </div>

            <div id="collapse22" class="panel-collapse collapse">
               <form method="POST" enctype="multipart/form-data" id="reviewsing_form" >
                   <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
             <div class="panel-body">

               <p class="mt-5" style="color: #150aec;">Please distribute the Vaccine Information Statement (VIS) for each of the

                 following vaccines and have the patient/legal guardian(s) review them:</p>

               <h4 style="background-color: #f1f1f1;padding:10px;">Upload Form / Files</h4>

                 <div class="row" style="padding: 15px;">

                   <div class="col-12 form-group">

                     <input type="file" multiple name="review_document" id="review_document" class="review_document" />
                       <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                       <span style="color:red;" class="Reviewdocument_erorrmsg"></span>
                     <!-- <input type="file" id="real-file" style="display: none;" multiple />

                     <button type="button" class="btn btn-default" id="custom-button">CHOOSE A

                       FILE</button>

                     <span id="custom-text">No file chosen, yet.</span> -->

                   </div>

                 </div>

                 <h4 style="background-color: #f1f1f1;padding:10px;">Sign Consnt Form</h4>
                 <div class="row">
                  <div class="col-md-12">
                    <p class="mt-5" style="color: #150aec;">My signature below signifies that I have read and received information about the diseases and vaccines listed below. I understand the benefits and risks of the vaccines cited, and ask that the vaccine(s) listed below be given to me or to the person named for whom I am authorized to make this request.</p>
                  </div>
                 </div>
                 <div class="sigPad">
                 <div class="row" style="padding: 15px;">
                     <div class="form-group">
                       <label>PRINT NAME</label>
                       <input type="text" name="name" value="" class="form-control text-field typename" id="printname">
                       <span class="Printname_errormsg" style="color:red;"></span>

                     </div>

                     <ul class="sigNav">

                       <li class="typeIt"><a href="#type-it" class="current">Type It</a></li>

                       <li class="drawIt"><a href="#draw-it">Draw It</a></li>

                       <li class="clearButton"><a href="#clear">Clear</a></li>

                     </ul>

                     <div class="sig sigWrapper">

                       <div class="typed"></div>

                       <canvas class="pad" width="198" height="148"></canvas>

                       <input type="hidden" name="output" class="output">
                       <input type="hidden" name="singnature_data" class="singnature_data">
                     </div>
                 </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                  <p class="mt-5"><b>I have read the vaccine information statements and agree to the above statement and acknowledging is my signature entered in this form.</b></p>
                </div>
               </div>
             </div>
              <div class="modal-footer text-center">
                   <button type="button" class="btn btn-default">Save</button>
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
         </form>

           </div>

       </div>



         <div class="panel panel-default">

           <div class="panel-heading">

             <h4 class="panel-title">

               <a data-toggle="collapse" data-parent="#accordion21" href="#collapse23">

                 Step-3: Record Vaccinations</a>

             </h4>

           </div>

           <div id="collapse23" class="panel-collapse collapse">
               <form method="POST">
             <div class="panel-body">

               <div class="row p-15" style="border-bottom:1px solid #ddd;">

                 <div class="col-12 col-md-6 form-group">

                   <label>CREATE A RECORD FOR</label>

                   <select class="form-control select_e2" name="create-record" id="record_vaccinations_create_record_e"

                     placeholder="Create a record for">

                     <option value="" select="selected">Select Create a record for</option>

                     <option value="1">Create a record for</option>

                   </select>
                   <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                   <input type="hidden" name="record_vaccinations_id" class="form-control text-field" id="record_vaccinations_id"/>
                   <span class="Createrecordfor_errormsg" style="color:red;"></span>
                 </div>

               </div>

               <div class="row p-15" style="border-bottom:1px solid #ddd;">

                 <div class="col-12 col-md-3 form-group">

                   <label>CVX Code</label>
                        <div class="autocomplete_cvx_code_e">
                             <input id="record_vaccinations_cvx_code_e" type="text" name="cvx-code" placeholder="Search  CVX Code" class="form-control text-field">
                        </div>
                   <!-- <select class="form-control select_e2" name="cvx-code" id="record_vaccinations_cvx_code_e" placeholder="CVX-Code">
                      <option value="">Select CVX Code</option>
                        <?php
                            /*foreach ($cvxcode_immunizations as $key => $value) {
                            ?>
                            <option value="<?php echo $value->cvx_code; ?>"><?php echo $value->cvx_code; ?></option>
                        <?php } */?>
                   </select> -->
                   <span class="CVX_code_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-3 form-group">

                   <label>NAME</label>

                   <input type="text" name="name" value="" class="form-control text-field" id="record_vaccinations_name_e"

                     placeholder="Name">
                     <span class="Name_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-3 form-group">

                   <label>CPT CODE</label>

                   <input type="text" name="cpt-code" value="" class="form-control text-field" id="record_vaccinations_cpt_code_e"

                     placeholder="CPT Code">
                     <span class="CPT_CODE_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-3 form-group">
					<label>MANUFACTURER</label>
                        <div class="autocomplete_manfacturer_e">
                            <input id="record_vaccinations_manfacturer_e" type="text" name="record_vaccinations_manfacturer_e" placeholder="Search MANUFACTURER" class="form-control text-field">
                        </div>
					<!-- <select class="form-control select_e2" name="record_vaccinations_manfacturer_e" id="record_vaccinations_manfacturer_e">
    					<option value="">Select MANUFACTURER</option>
						<?php
							/*foreach ($manufacturer as $key => $value) {
						?>
						<option value="<?php echo $value->manufacture_id; ?>"><?php echo $value->manufacture; ?></option>
						<?php } */?>
					</select> -->
					<span class="Manufacturer_errormsg" style="color:red;"></span>
				</div>
               </div>

               <div class="row p-15" style="border-bottom:1px solid #ddd;">

                 <div class="col-12 col-md-4 form-group">

                   <label>LOT NUMBER</label>

                   <input type="text" name="lot-num" value="" class="form-control text-field" id="record_vaccination_lot-num_e"

                     placeholder="Lot Number">
                     <span class="LotNumber_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>LOT EXPIRATION DATE</label>

                   <input type="date" name="lot-num" value="" class="form-control text-field" id="record_vaccination_expirationdate_e"

                     placeholder="Lot expiration date"  max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                     <span class="Lotexpirationdate_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>ADMINISTERED AMOUNT</label>

                   <input type="number" name="administered-amount" class="form-control text-field"

                     id="administered_amount_e" placeholder="Administered Amount">
                     <span class="Administeredamount_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>ADMINISTERED UNITS</label>

                   <select class="form-control select_e2" id="record_vaccination_administered_unit_e" placeholder="Administered Unit">

                     <option value="1">Administered Units</option>

                     <option value="2">50% tissue cultured infection</option>

                     <option value="3">Microgram [SI Mass Units]</option>

                   </select>
                   <span class="Administeredunit_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>VACCINE ROUTE</label>

                   <select class="form-control select_e2" id="record_vaccination_vaccinate_route_e" placeholder="Vaccinate Route">

                     <option value="1">Vaccinate Route</option>

                     <option value="2">ID (Intradermal)</option>

                     <option value="3">NS (Nasal)</option>

                   </select>
                   <span class="Vaccinateroute_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>VACCINE SITE</label>

                   <select class="form-control select_e2" id="record_vaccination_vaccinate_site_e" placeholder="Vaccinate Site">

                     <option value="1">Vaccinate Site</option>

                     <option value="2">LA (Left Upper Arm)</option>

                     <option value="3">LD (Left Deltoid)</option>

                   </select>
                   <span class="Vaccinatesite_errormsg" style="color:red;"></span>
                 </div>

               </div>

               <div class="row p-15">

                 <div class="col-12 col-md-4 form-group">

                   <label>VACCINATION STATUS</label>

                   <select class="form-control select_e2" id="record_vaccination_vaccinate_status_e" placeholder="Vaccinate Status">

                     <option value="1">Complete</option>

                     <option value="2">Refused</option>

                     <option value="3">Not administered</option>

                     <option value="3">Partially administered</option>

                   </select>
                   <span class="Vaccinatestatus_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>ADMINISTERED ON</label>

                   <input type="datetime-local" class="form-control" id="record_vaccination_administred_on_e" name="date-time" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                   <span class="Administred_on_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>ORDERING DOCTOR</label>

                   <select class="form-control select_e2" id="record_vaccination_ordering_doctor_e" placeholder="Ordering Doctor">
                        <option selected="selected" disabled="disabled" value="">Select Ordering Doctor</option>
                            <?php
                                foreach ($ordering_doctor as $ordering_doctor_list){
                            ?>
                                <option value="<?php echo $ordering_doctor_list->firstname.' '.$ordering_doctor_list->lastname;?>"><?php echo $ordering_doctor_list->firstname?>  <?php echo $ordering_doctor_list->lastname?></option>
                        <?php } ?>

                   </select>
                   <span class="Orderingdoctor_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>ADMINISTERED BY</label>

                   <select class="form-control select_e2" id="record_vaccination_administered_by_e" placeholder="Administered By">

                     <option value="" selected="">Administered By</option>
                        <?php
                         foreach ($administreted_by as $key => $value) {
                      ?>
                         <option value="<?php echo $value->administreted_by; ?>"><?php echo $value->administreted_by; ?></option>
                   <?php } ?>

                   </select>
                   <span class="Administeredby_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>ADMINISTERED AT</label>

                   <select class="form-control select_e2" id="record_vaccination_administered_at_e" placeholder="Administered At">

                     <option value="1">Administered At</option>

                     <option value="2">-----</option>

                     <option value="3">Primary Office</option>

                   </select>
                   <span class="Administeredat_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>VACCINATION INVENTORY LOT</label>

                   <select class="form-control select_e2" id="record_vaccination_inventory_lot_e"

                     placeholder="Vaccination Inventory Lot">

                     <option value="1">Vaccination Inevntory Lot</option>

                     <option value="2">-----</option>

                     <option value="3">Primary Office</option>

                   </select>
                     <span class="Inventorylot_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>RECORD TYPE</label>

                   <select class="form-control select_e2" id="record_vaccination_record_type_e" placeholder="Record Type">

                     <option value="1">Record Type</option>

                     <option value="2">Historical information-source unspecified</option>

                     <option value="3">Historical information-from other Provider</option>

                     <option value="4">Historical information-from Parents recall</option>

                     <option value="5">Historical information-from School record</option>

                   </select>
                   <span class="Recordtype_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>FUNDING ELIGIBILITY</label>

                   <select class="form-control select_e2" id="record_vaccination_funding_eligibility_e" placeholder="Funding Eligibility">

                     <option value="1">Funding Eligibility</option>

                     <option value="2">Not VFC Eligible</option>

                     <option value="3">VFC eligible-Uninsured</option>

                     <option value="4">VFC eligible-Medicare/Medicaid Managed Care</option>

                     <option value="5">Local Specific Eligibility</option>

                   </select>
                     <span class="Fundingeligibility_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>OBSERVED IMMUNITY</label>

                   <select class="form-control select_e2" id="record_vaccination_observed_immunity_e" placeholder="Observed Immunity">

                     <option value="1">Observed Immunity</option>

                     <option value="2">Acute poliomyelitis (disorder)</option>

                     <option value="3">Anthrax (disorder)</option>

                     <option value="4">Diphtheria (disorder)</option>

                     <option value="5">Disease due to Rotavirus (disorder)</option>

                   </select>
                     <span class="Observedimmunity_errormsg" style="color:red;"></span>
                 </div>

                 <div class="col-12 form-group">

                   <label>NOTES</label>

                   <textarea class="w-100" id="record_vaccination_notes_e" name="record_vaccination_notes" rows="5" placeholder="Notes"></textarea>
                     <span class="Notes_errormsg" style="color:red;"></span>
                 </div>

               </div>

             </div>
                <div class="modal-footer text-center">

           <button type="button" class="btn btn-default" onclick="return edit_record_vaccinations()">Save</button>

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </form>

           </div>

         </div>

     </div>


   </div>

   <div id="edit-summary" class="tab-pane fade">
     <form method="POST">
       <div class="row p-15">

         <div class="col-12 form-group ml-10 mr-10">

           <label>SUMMARY</label>

           <textarea class="w-100" id="summary_description_e" name="summary" rows="5" placeholder="Summary"></textarea>
            <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
            <input type="hidden" name="summary_id" class="form-control text-field" id="summary_id"/>
            <span class="Summary_errormsg" style="color:red;"></span>
         </div>

       </div>
           <div class="modal-footer text-center bottom-top">

       <button type="button" class="btn btn-default" onclick="return edit_summary();">Save</button>

       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

     </div>
 </form>
   </div>

   <div id="edit-document" class="tab-pane fade">

       <div class="panel-group mt-15" id="accordion1">

         <div class="panel panel-default">

           <div class="panel-heading">

             <h4 class="panel-title">

               <a data-toggle="collapse" data-parent="#accordion1" href="#collapse4">

                 Uploaded Documents</a>

             </h4>

           </div>

           <div id="collapse4" class="panel-collapse collapse in">
             <form method="POST" enctype="multipart/form-data" id="edit_document_form">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
             <div class="panel-body">
             	<div class="row">
                 <div class="col-12 col-md-4 form-group ml-15 mb-10">
                   <label>SELECT DOCUMENT</label>
                   <select class="form-control" id="document_type_e" name="document_type_e" onchange="return hide_show_document_according_edit()">

                     <option value="">Select Document Type</option>

                     <option value="1">Locked Clinical Notes</option>

                     <option value="2">Signed Consent Forms</option>

                     <option value="3">Lab Result</option>

                     <option value="4">Amendments</option>

                   </select>
                   <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                   <input type="hidden" name="healthreport_document_id_e" class="form-control text-field healthreport_document_id_e" id="healthreport_document_id_e"/>
                   <span class="Documenttype_erorrmsg" style="color:red;"></span>
                 </div>

               </div>
               <div class="mt-15">
                   <div class="form-group">
                     <div class="file-loading">
       					<input id="file-1_e" type="file" multiple class="file document_document_e" data-overwrite-initial="false" data-min-file-count="2" name="document_document_e">
                           <span class="Document_erorrmsg" style="color:red;"></span>
                     </div>
                   </div>
               </div>
             </div>
               <div class="modal-footer text-center">
                   <button type="submit" class="btn btn-default">Save</button>
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>

           </form>

           </div>

         </div>

         <div class="panel panel-default locked_clinical_notes_accordian_e" style="display: none;">

           <div class="panel-heading">

             <h4 class="panel-title">

               <a data-toggle="collapse" data-parent="#accordion1" href="#collapse5">

                 Locked Clinical Notes</a>

             </h4>

           </div>

           <div id="collapse5" class="panel-collapse collapse">
             <form method="POST">
             <div class="panel-body">

               <div class="row" style="padding: 10px;">

                 <div class="col-12 col-md-4 form-group">

                   <label>DATE OF SERVICE</label>

                   <input type="datetime-local" class="form-control" id="date_of_service_e" name="date-time" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                       <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                       <input type="hidden" name="locked_id" class="form-control text-field" id="locked_id"/>
                       <span class="Dateofservice_erorrmsg" style="color:red"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>LOCKED BY</label>

                   <input type="text" name="locked-by" value="<?php echo $this->session->userdata('fullname') ?>" class="form-control text-field" class="form-control text-field" id="lockedbye" placeholder="Locked By">
                    <input type="hidden" name="" value="<?php echo $this->session->userdata('user_id'); ?>" id="locked_by_e">
                     <span class="Lockedby_erorrmsg" style="color:red"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>LOCKED ON</label>

                   <input type="datetime-local" name="Locked-on" value="" class="form-control " id="locked_on_e"  max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                     <span class="Lockedon_erorrmsg" style="color:red"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>ACTION</label>

                   <select class="form-control" name="action" id="lockedaction_e" placeholder="Action">

                     <option value="1">Accepted</option>

                     <option value="2">Decline</option>

                   </select>
                   <span class="Lockedaction_erorrmsg" style="color:red"></span>
                 </div>

                 <div class="col-12 col-md-4 form-group">

                   <label>STATUS</label>

                   <select class="form-control" name="status" id="lockedstatus_e" placeholder="Status">

                     <option value="1">Active</option>

                     <option value="2">Inactive</option>

                   </select>
                   <span class="Lockedstatus_erorrmsg" style="color:red"></span>
                 </div>

                 <div class="col-12 col-md-12 form-group">

                   <label>REASON</label>

                   <textarea class="w-100" id="locked_reason_e" name="locked_reason" rows="5" placeholder="Reason"></textarea>
                   <span class="Lockedreason_erorrmsg" style="color:red"></span>
                 </div>

               </div>

             </div>
             <div class="modal-footer text-center">
               <button type="button" class="btn btn-default" onclick="return edit_clinical_notes();">Save</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
           </form>



           </div>

         </div>

           <div class="panel panel-default singedconsent_form_accordian_e" style="display: none;">

             <div class="panel-heading">

               <h4 class="panel-title">

                 <a data-toggle="collapse" data-parent="#accordion1" href="#collapse61">

                   Singed Consent Forms</a>

               </h4>

             </div>

             <div id="collapse61" class="panel-collapse collapse">

               <form method="POST">
                   <div class="panel-body">

                     <div class="row" style="padding: 10px;">

                       <!-- <div class="col-12 col-md-4 form-group">

                         <label>CONSENT FORM</label>

                         <input type="text" name="consent-form" value="" class="form-control text-field"  id="singedconsent_form_e" placeholder="Consent Form">

                               <span class="Singedconsentform_errormsg" style="color:red;"></span>
                       </div>
 -->
                       <div class="col-12 col-md-4 form-group">

                         <label>DATE OF APPOINTMENT</label>

                         <input type="datetime-local" class="form-control" id="appointment_datetime_e" name="date-time" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                         <span class="Appointment_datetime_erorrmsg" style="color:red"></span>
                         <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                               <input type="hidden" name="singed_consent_forms_id" class="form-control text-field " id="singed_consent_forms_id"/>
                       </div>

                       <div class="col-12 col-md-4 form-group">

                         <label>DATE OF SIGNATURE</label>

                         <input type="datetime-local" class="form-control" id="singnature_date_e" name="date-time" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                         <span class="Singnature_date_erorrmsg" style="color:red"></span>
                       </div>

                       <div class="col-12 col-md-4 form-group">

                         <label>ACTION</label>

                         <select class="form-control" name="action" id="singnature_action_e" placeholder="Action">

                           <option value="1">Accepted</option>

                           <option value="2">Decline</option>

                         </select>
                         <span class="singnature_action_erorrmsg" style="color:red"></span>
                       </div>

                     </div>

                   </div>
                   <div class="modal-footer text-center">

                       <button type="button" class="btn btn-default" onclick="return edit_singed_consent();">Save</button>

                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                   </div>
               </form>

             </div>

           </div>

           <div class="panel panel-default lab_result_accordian_e" style="display: none;">

             <div class="panel-heading">

               <h4 class="panel-title">

                 <a data-toggle="collapse" data-parent="#accordion1" href="#collapse7">

                   Lab Result</a>

               </h4>

             </div>

             <div id="collapse7" class="panel-collapse collapse">
               <form method="POST">
               <div class="panel-body">

                 <div class="row" style="padding: 10px;">

                   <div class="col-12 col-md-4 form-group">

                     <label>LAB</label>

                     <input type="text" name="lab" value="" class="form-control text-field" id="document_lab_e"

                       placeholder="Lab">
                       <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                       <input type="hidden" name="document_labresult_id" class="form-control text-field" id="document_labresult_id"/>
                       <span class="Documnetlab_erorrmsg" style="color:red;"></span>
                   </div>

                   <div class="col-12 col-md-4 form-group">

                     <label>DATE</label>

                     <input type="datetime-local" class="form-control" id="document_labdate_time_e" name="date-time">
                     <span class="Documnetdate_erorrmsg" style="color:red;"></span>
                   </div>

                   <div class="col-12 col-md-4 form-group">

                     <label>ACTION</label>

                     <select class="form-control" name="action" id="document_labaction_e" placeholder="Action">

                       <option value="1">Accepted</option>

                       <option value="2">Decline</option>

                     </select>
                     <span class="Documnetlabaction_erorrmsg" style="color:red;"></span>
                   </div>

                   <div class="col-12 col-md-4 form-group">

                     <label>ABNORMAL</label>

                     <select class="form-control" name="abnormal" id="document_abnormal_e" placeholder="Abnormal">

                       <option value="1">Yes</option>

                       <option value="2">No</option>

                     </select>
                     <span class="Documnetabnormal_erorrmsg" style="color:red;"></span>
                   </div>

                   <div class="col-12 col-md-4 form-group">

                     <label>RESULT COUNT</label>

                     <input type="text" name="result-count" value="" class="form-control text-field" id="document_result_count_e" placeholder="Result Count">
                       <span class="Documnetresultcount_erorrmsg" style="color:red;"></span>
                   </div>

                   <div class="col-12 col-md-4 form-group">

                     <label>TEST</label>

                     <input type="text" name="test" value="" class="form-control text-field" id="document_test_e"

                       placeholder="test">
                       <span class="Documnettest_erorrmsg" style="color:red;"></span>
                   </div>

                 </div>

               </div>

                   <div class="modal-footer text-center">
                       <button type="button" class="btn btn-default" onclick="return edit_lab_result();">Save</button>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   </div>

             </form>

             </div>

           </div>

           <div class="panel panel-default amendments_accordian_e" style="display: none;">

             <div class="panel-heading">

               <h4 class="panel-title">

                 <a data-toggle="collapse" data-parent="#accordion1" href="#collapse8">

                   Amendments</a>

               </h4>

             </div>

             <div id="collapse8" class="panel-collapse collapse">
               <form method="POST" enctype="multipart/form-data" accept-charset="utf-8" id="amendments_form_e">
               <div class="panel-body">

                 <div class="row p-15">

                   <div class="col-12 col-md-4 form-group">

                     <label>AMENDMENTS DOCUMENT</label><br>
                     <div style="margin-top: 10px">
                      <input type="file" multiple  id="amendments_doc_e" name="amendments_doc_e" />
                      <span class="Amendmentsdoc_erorrmsg" style="color:red;"></span>
                      <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                      <input type="hidden" name="amdments_id" class="form-control text-field" id="amdments_id"/>
                    </div>
                    <!--  <input type="file" id="real-file" style="display: none;" multiple />

                     <button type="button" class="btn btn-default" id="custom-button">CHOOSE A

                       FILE</button>

                     <span id="custom-text">No file chosen, yet.</span> -->

                   </div>

                   <div class="col-12 col-md-4 form-group">

                     <label>AMENDMENTS SOURCE</label>

                     <input type="text" name="amendment_source_e" value="" class="form-control text-field" id="amendment_source_e" placeholder="Amendment Source">
                       <span class="Amendment_source_erorrmsg" style="color:red;"></span>
                   </div>

                   <div class="col-12 col-md-4 form-group">

                     <label>STATUS</label>

                     <select class="form-control" id="amendment_status_e" placeholder="Status" name="amendment_status_e">

                       <option value="">Status</option>

                       <option value="2">Accepted </option>

                       <option value="3">Denied</option>

                     </select>
                     <span class="Amendment_status_erorrmsg" style="color:red;"></span>
                   </div>

                 </div>

                 <div class="row p-15">

                   <div class="col-12 col-md-6 form-group">

                     <label>REQUEST DATE</label>

                     <input type="datetime-local" class="form-control" id="amdments_date_time_e" name="amdments_date_time_e" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                     <span class="Amdments_date_time_erorrmsg" style="color:red;"></span>
                   </div>

                   <div class="col-12 col-md-6 form-group">

                     <label>PROCESSED DATE</label>

                     <input type="datetime-local" class="form-control" id="amdmentsproccess_date_time_e" name="amdmentsproccess_date_time_e" max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                     <span class="Amdmentsproccess_date_time_erorrmsg" style="color:red;"></span>
                   </div>

                 </div>

               </div>

                   <div class="modal-footer text-center">
                       <button type="submit" class="btn btn-default">Submit</button>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   </div>

             </form>

             </div>

           </div>



       </div>

<!--    <div class="modal-footer text-center">
     <button type="submit" class="btn btn-default">Save</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

 </div> -->


   </div>

   <div id="edit-record" class="tab-pane fade">
     <form>
     <div class="row p-25">

       <div class="col-12 col-md-6 form-group">

         <label>DOCTOR NAME</label>
           <select class="form-control" id="doctor_name" name="doctor_name">
               <option value="">Select Doctor</option>
               <?php foreach($doctors as $doctors_list){
               ?>
               <option value="<?php echo $doctors_list->user_id; ?>"><?php echo $doctors_list->firstname." ".$doctors_list->lastname; ?></option>
           <?php } ?>
           </select>
           <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
           <span class="Doctorname_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-6 form-group">

         <label>DATE&TIME</label>

         <input type="datetime-local" class="form-control" id="healtrecord_date_time" name="healtrecord_date_time">
         <span class="Healtrecorddatetime_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-6 form-group">

         <label>PATIENT NAME</label>

         <input type="text" name="patient-name" value="" class="form-control text-field" id="patient_name"

           placeholder="Patient Name" disabled="disabled">
            <span class="Patientname_errormsg" style="color:red;"></span>
       </div>

       <div class="col-12 col-md-6 form-group">

         <label>UPDATE BY</label>

         <input type="text" name="upload-by" value="" class="form-control text-field" id="updated_by"

           placeholder="Update By">
            <span class="Updatedby_errormsg" style="color:red;"></span>
       </div>

     </div>
       <div class="modal-footer text-center bottom-top">
           <button type="button" class="btn btn-default" onclick="return save_healthrecord();">Save</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>

   </div>
    <form>

 </div>

</div>



</div>
</div>

</div>
    </div>

  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/Chart.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"  integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/health_report/') ?>signature.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url('assets/js/health_report/') ?>chart.bundle.js" type="text/javascript"></script>
    <!-- <script src="<?php //echo base_url('assets/js/health_report/') ?>chart-line.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script>
    function graph(label,tem,h,bl,rp,ox,height,weight,bmi,pain,smoking_status,head_circumference,glucose_by_glucometer){
      var ctx = document.getElementById("AreaChart4");
    //  console.log(label);
      //console.log(data);
    	var myChart = new Chart(ctx, {
    		type: 'line',
    		data: {
    			labels: label,
    			type: 'line',
    			datasets: [{
    				data: tem,
    				label: 'Degree',
    				backgroundColor: 'transparent',
    				borderColor: '#ff6666',
    				borderWidth: '3',
    				pointBorderColor: 'transparent',
    				pointBackgroundColor: 'transparent',
    			}]
    		},
    		options: {
    			maintainAspectRatio: false,
    			legend: {
    				display: false
    			},
    			responsive: true,
    			tooltips: {
    				mode: 'index',
    				titleFontSize: 12,
    				titleFontColor: '#7886a0',
    				bodyFontColor: '#7886a0',
    				backgroundColor: '#fff',
    				titleFontFamily: 'Montserrat',
    				bodyFontFamily: 'Montserrat',
    				cornerRadius: 3,
    				intersect: false,
    			},
    			scales: {
    				xAxes: [{
    					gridLines: {
    						color: 'transparent',
    						zeroLineColor: 'transparent'
    					},
    					ticks: {
    						fontSize: 2,
    						fontColor: 'transparent'
    					}
    				}],
    				yAxes: [{
    					display: false,
    					ticks: {
    						display: false,
    					}
    				}]
    			},
    			title: {
    				display: false,
    			},
    			elements: {
    				line: {
    					borderWidth: 1
    				},
    				point: {
    					radius: 4,
    					hitRadius: 10,
    					hoverRadius: 4
    				}
    			}
    		}
    	});


    	var ctx = document.getElementById("AreaChart5");
    	var myChart = new Chart(ctx, {
    		type: 'line',
    		data: {
    			labels: label,
    			type: 'line',
    			datasets: [{
    				data: h,
    				label: 'BPM',
    				backgroundColor: 'transparent',
    				borderColor: '#467fcf',
    				borderWidth: '3',
    				pointBorderColor: 'transparent',
    				pointBackgroundColor: 'transparent',
    			}]
    		},
    		options: {
    			maintainAspectRatio: false,
    			legend: {
    				display: false
    			},
    			responsive: true,
    			tooltips: {
    				mode: 'index',
    				titleFontSize: 12,
    				titleFontColor: '#7886a0',
    				bodyFontColor: '#7886a0',
    				backgroundColor: '#fff',
    				titleFontFamily: 'Montserrat',
    				bodyFontFamily: 'Montserrat',
    				cornerRadius: 3,
    				intersect: false,
    			},
    			scales: {
    				xAxes: [{
    					gridLines: {
    						color: 'transparent',
    						zeroLineColor: 'transparent'
    					},
    					ticks: {
    						fontSize: 2,
    						fontColor: 'transparent'
    					}
    				}],
    				yAxes: [{
    					display: false,
    					ticks: {
    						display: false,
    					}
    				}]
    			},
    			title: {
    				display: false,
    			},
    			elements: {
    				line: {
    					borderWidth: 1
    				},
    				point: {
    					radius: 4,
    					hitRadius: 10,
    					hoverRadius: 4
    				}
    			}
    		}
    	});
    	var ctx = document.getElementById("AreaChart6");
    	var myChart = new Chart(ctx, {
    		type: 'line',
    		data: {
    			labels: label,
    			type: 'line',
    			datasets: [{
    				data: bl,
    				label: 'mmHg',
    				backgroundColor: 'transparent',
    				borderColor: '#6b6b6b',
    				borderWidth: '3',
    				pointBorderColor: 'transparent',
    				pointBackgroundColor: 'transparent',
    			}]
    		},
    		options: {
    			maintainAspectRatio: false,
    			legend: {
    				display: false
    			},
    			responsive: true,
    			tooltips: {
    				mode: 'index',
    				titleFontSize: 12,
    				titleFontColor: '#7886a0',
    				bodyFontColor: '#7886a0',
    				backgroundColor: '#fff',
    				titleFontFamily: 'Montserrat',
    				bodyFontFamily: 'Montserrat',
    				cornerRadius: 3,
    				intersect: false,
    			},
    			scales: {
    				xAxes: [{
    					gridLines: {
    						color: 'transparent',
    						zeroLineColor: 'transparent'
    					},
    					ticks: {
    						fontSize: 2,
    						fontColor: 'transparent'
    					}
    				}],
    				yAxes: [{
    					display: false,
    					ticks: {
    						display: false,
    					}
    				}]
    			},
    			title: {
    				display: false,
    			},
    			elements: {
    				line: {
    					borderWidth: 1
    				},
    				point: {
    					radius: 4,
    					hitRadius: 10,
    					hoverRadius: 4
    				}
    			}
    		}
    	});
    	var ctx = document.getElementById("AreaChart7");
    	var myChart = new Chart(ctx, {
    		type: 'line',
    		data: {
    			labels: label,
    			type: 'line',
    			datasets: [{
    				data: rp,
    				label: 'rpm',
    				backgroundColor: 'transparent',
    				borderColor: '#ffca4a',
    				borderWidth: '3',
    				pointBorderColor: 'transparent',
    				pointBackgroundColor: 'transparent',
    			}]
    		},
    		options: {
    			maintainAspectRatio: false,
    			legend: {
    				display: false
    			},
    			responsive: true,
    			tooltips: {
    				mode: 'index',
    				titleFontSize: 12,
    				titleFontColor: '#7886a0',
    				bodyFontColor: '#7886a0',
    				backgroundColor: '#fff',
    				titleFontFamily: 'Montserrat',
    				bodyFontFamily: 'Montserrat',
    				cornerRadius: 3,
    				intersect: false,
    			},
    			scales: {
    				xAxes: [{
    					gridLines: {
    						color: 'transparent',
    						zeroLineColor: 'transparent'
    					},
    					ticks: {
    						fontSize: 2,
    						fontColor: 'transparent'
    					}
    				}],
    				yAxes: [{
    					display: false,
    					ticks: {
    						display: false,
    					}
    				}]
    			},
    			title: {
    				display: false,
    			},
    			elements: {
    				line: {
    					borderWidth: 1
    				},
    				point: {
    					radius: 4,
    					hitRadius: 10,
    					hoverRadius: 4
    				}
    			}
    		}
    	});

    	var ctx = document.getElementById("AreaChart8");
    	var myChart = new Chart(ctx, {
    		type: 'line',
    		data: {
    			labels: label,
    			type: 'line',
    			datasets: [{
    				data: ox,
    				label: '%',
    				backgroundColor: 'transparent',
    				borderColor: '#0d9404',
    				borderWidth: '3',
    				pointBorderColor: 'transparent',
    				pointBackgroundColor: 'transparent',
    			}]
    		},
    		options: {
    			maintainAspectRatio: false,
    			legend: {
    				display: false
    			},
    			responsive: true,
    			tooltips: {
    				mode: 'index',
    				titleFontSize: 12,
    				titleFontColor: '#7886a0',
    				bodyFontColor: '#7886a0',
    				backgroundColor: '#fff',
    				titleFontFamily: 'Montserrat',
    				bodyFontFamily: 'Montserrat',
    				cornerRadius: 3,
    				intersect: false,
    			},
    			scales: {
    				xAxes: [{
    					gridLines: {
    						color: 'transparent',
    						zeroLineColor: 'transparent'
    					},
    					ticks: {
    						fontSize: 2,
    						fontColor: 'transparent'
    					}
    				}],
    				yAxes: [{
    					display: false,
    					ticks: {
    						display: false,
    					}
    				}]
    			},
    			title: {
    				display: false,
    			},
    			elements: {
    				line: {
    					borderWidth: 1
    				},
    				point: {
    					radius: 4,
    					hitRadius: 10,
    					hoverRadius: 4
    				}
    			}
    		}
    	});

    	var ctx = document.getElementById("AreaChart9");
    	var myChart = new Chart(ctx, {
    		type: 'line',
    		data: {
    			labels: label,
    			type: 'line',
    			datasets: [{
    				data: height,
    				label: 'in',
    				backgroundColor: 'transparent',
    				borderColor: '#ec0867',
    				borderWidth: '3',
    				pointBorderColor: 'transparent',
    				pointBackgroundColor: 'transparent',
    			}]
    		},
    		options: {
    			maintainAspectRatio: false,
    			legend: {
    				display: false
    			},
    			responsive: true,
    			tooltips: {
    				mode: 'index',
    				titleFontSize: 12,
    				titleFontColor: '#7886a0',
    				bodyFontColor: '#7886a0',
    				backgroundColor: '#fff',
    				titleFontFamily: 'Montserrat',
    				bodyFontFamily: 'Montserrat',
    				cornerRadius: 3,
    				intersect: false,
    			},
    			scales: {
    				xAxes: [{
    					gridLines: {
    						color: 'transparent',
    						zeroLineColor: 'transparent'
    					},
    					ticks: {
    						fontSize: 2,
    						fontColor: 'transparent'
    					}
    				}],
    				yAxes: [{
    					display: false,
    					ticks: {
    						display: false,
    					}
    				}]
    			},
    			title: {
    				display: false,
    			},
    			elements: {
    				line: {
    					borderWidth: 1
    				},
    				point: {
    					radius: 4,
    					hitRadius: 10,
    					hoverRadius: 4
    				}
    			}
    		}
    	});
    	var ctx = document.getElementById("AreaChart10");
    	var myChart = new Chart(ctx, {
    		type: 'line',
    		data: {
    			labels: label,
    			type: 'line',
    			datasets: [{
    				data: weight,
    				label: 'lbs',
    				backgroundColor: 'transparent',
    				borderColor: '#985d03',
    				borderWidth: '3',
    				pointBorderColor: 'transparent',
    				pointBackgroundColor: 'transparent',
    			}]
    		},
    		options: {
    			maintainAspectRatio: false,
    			legend: {
    				display: false
    			},
    			responsive: true,
    			tooltips: {
    				mode: 'index',
    				titleFontSize: 12,
    				titleFontColor: '#7886a0',
    				bodyFontColor: '#7886a0',
    				backgroundColor: '#fff',
    				titleFontFamily: 'Montserrat',
    				bodyFontFamily: 'Montserrat',
    				cornerRadius: 3,
    				intersect: false,
    			},
    			scales: {
    				xAxes: [{
    					gridLines: {
    						color: 'transparent',
    						zeroLineColor: 'transparent'
    					},
    					ticks: {
    						fontSize: 2,
    						fontColor: 'transparent'
    					}
    				}],
    				yAxes: [{
    					display: false,
    					ticks: {
    						display: false,
    					}
    				}]
    			},
    			title: {
    				display: false,
    			},
    			elements: {
    				line: {
    					borderWidth: 1
    				},
    				point: {
    					radius: 4,
    					hitRadius: 10,
    					hoverRadius: 4
    				}
    			}
    		}
    	});
    	var ctx = document.getElementById("AreaChart11");
    	var myChart = new Chart(ctx, {
    		type: 'line',
    		data: {
    			labels: label,
    			type: 'line',
    			datasets: [{
    				data: bmi,
    				label: 'kg/m2',
    				backgroundColor: 'transparent',
    				borderColor: '#0bd7d3',
    				borderWidth: '3',
    				pointBorderColor: 'transparent',
    				pointBackgroundColor: 'transparent',
    			}]
    		},
    		options: {
    			maintainAspectRatio: false,
    			legend: {
    				display: false
    			},
    			responsive: true,
    			tooltips: {
    				mode: 'index',
    				titleFontSize: 12,
    				titleFontColor: '#7886a0',
    				bodyFontColor: '#7886a0',
    				backgroundColor: '#fff',
    				titleFontFamily: 'Montserrat',
    				bodyFontFamily: 'Montserrat',
    				cornerRadius: 3,
    				intersect: false,
    			},
    			scales: {
    				xAxes: [{
    					gridLines: {
    						color: 'transparent',
    						zeroLineColor: 'transparent'
    					},
    					ticks: {
    						fontSize: 2,
    						fontColor: 'transparent'
    					}
    				}],
    				yAxes: [{
    					display: false,
    					ticks: {
    						display: false,
    					}
    				}]
    			},
    			title: {
    				display: false,
    			},
    			elements: {
    				line: {
    					borderWidth: 1
    				},
    				point: {
    					radius: 4,
    					hitRadius: 10,
    					hoverRadius: 4
    				}
    			}
    		}
    	});
    	var ctx = document.getElementById("AreaChart12");
    	var myChart = new Chart(ctx, {
    		type: 'line',
    		data: {
    			labels: label,
    			type: 'line',
    			datasets: [{
    				data: pain,
    				label: '',
    				backgroundColor: 'transparent',
    				borderColor: '#9870c3',
    				borderWidth: '3',
    				pointBorderColor: 'transparent',
    				pointBackgroundColor: 'transparent',
    			}]
    		},
    		options: {
    			maintainAspectRatio: false,
    			legend: {
    				display: false
    			},
    			responsive: true,
    			tooltips: {
    				mode: 'index',
    				titleFontSize: 12,
    				titleFontColor: '#7886a0',
    				bodyFontColor: '#7886a0',
    				backgroundColor: '#fff',
    				titleFontFamily: 'Montserrat',
    				bodyFontFamily: 'Montserrat',
    				cornerRadius: 3,
    				intersect: false,
    			},
    			scales: {
    				xAxes: [{
    					gridLines: {
    						color: 'transparent',
    						zeroLineColor: 'transparent'
    					},
    					ticks: {
    						fontSize: 2,
    						fontColor: 'transparent'
    					}
    				}],
    				yAxes: [{
    					display: false,
    					ticks: {
    						display: false,
    					}
    				}]
    			},
    			title: {
    				display: false,
    			},
    			elements: {
    				line: {
    					borderWidth: 1
    				},
    				point: {
    					radius: 4,
    					hitRadius: 10,
    					hoverRadius: 4
    				}
    			}
    		}
    	});
    	// var ctx = document.getElementById("AreaChart13");
    	// var myChart = new Chart(ctx, {
    	// 	type: 'line',
    	// 	data: {
    	// 		labels: label,
    	// 		type: 'line',
    	// 		datasets: [{
    	// 			data: smoking_status,
    	// 			label: 'smoking status',
    	// 			backgroundColor: 'transparent',
    	// 			borderColor: '#ce574a',
    	// 			borderWidth: '3',
    	// 			pointBorderColor: 'transparent',
    	// 			pointBackgroundColor: 'transparent',
    	// 		}]
    	// 	},
    	// 	options: {
    	// 		maintainAspectRatio: false,
    	// 		legend: {
    	// 			display: false
    	// 		},
    	// 		responsive: true,
    	// 		tooltips: {
    	// 			mode: 'index',
    	// 			titleFontSize: 12,
    	// 			titleFontColor: '#7886a0',
    	// 			bodyFontColor: '#7886a0',
    	// 			backgroundColor: '#fff',
    	// 			titleFontFamily: 'Montserrat',
    	// 			bodyFontFamily: 'Montserrat',
    	// 			cornerRadius: 3,
    	// 			intersect: false,
    	// 		},
    	// 		scales: {
    	// 			xAxes: [{
    	// 				gridLines: {
    	// 					color: 'transparent',
    	// 					zeroLineColor: 'transparent'
    	// 				},
    	// 				ticks: {
    	// 					fontSize: 2,
    	// 					fontColor: 'transparent'
    	// 				}
    	// 			}],
    	// 			yAxes: [{
    	// 				display: false,
    	// 				ticks: {
    	// 					display: false,
    	// 				}
    	// 			}]
    	// 		},
    	// 		title: {
    	// 			display: false,
    	// 		},
    	// 		elements: {
    	// 			line: {
    	// 				borderWidth: 1
    	// 			},
    	// 			point: {
    	// 				radius: 4,
    	// 				hitRadius: 10,
    	// 				hoverRadius: 4
    	// 			}
    	// 		}
    	// 	}
    	// });
    	// var ctx = document.getElementById("AreaChart14");
    	// var myChart = new Chart(ctx, {
    	// 	type: 'line',
    	// 	data: {
    	// 		labels: label,
    	// 		type: 'line',
    	// 		datasets: [{
    	// 			data: head_circumference,
    	// 			label: 'in',
    	// 			backgroundColor: 'transparent',
    	// 			borderColor: '#519da9',
    	// 			borderWidth: '3',
    	// 			pointBorderColor: 'transparent',
    	// 			pointBackgroundColor: 'transparent',
    	// 		}]
    	// 	},
    	// 	options: {
    	// 		maintainAspectRatio: false,
    	// 		legend: {
    	// 			display: false
    	// 		},
    	// 		responsive: true,
    	// 		tooltips: {
    	// 			mode: 'index',
    	// 			titleFontSize: 12,
    	// 			titleFontColor: '#7886a0',
    	// 			bodyFontColor: '#7886a0',
    	// 			backgroundColor: '#fff',
    	// 			titleFontFamily: 'Montserrat',
    	// 			bodyFontFamily: 'Montserrat',
    	// 			cornerRadius: 3,
    	// 			intersect: false,
    	// 		},
    	// 		scales: {
    	// 			xAxes: [{
    	// 				gridLines: {
    	// 					color: 'transparent',
    	// 					zeroLineColor: 'transparent'
    	// 				},
    	// 				ticks: {
    	// 					fontSize: 2,
    	// 					fontColor: 'transparent'
    	// 				}
    	// 			}],
    	// 			yAxes: [{
    	// 				display: false,
    	// 				ticks: {
    	// 					display: false,
    	// 				}
    	// 			}]
    	// 		},
    	// 		title: {
    	// 			display: false,
    	// 		},
    	// 		elements: {
    	// 			line: {
    	// 				borderWidth: 1
    	// 			},
    	// 			point: {
    	// 				radius: 4,
    	// 				hitRadius: 10,
    	// 				hoverRadius: 4
    	// 			}
    	// 		}
    	// 	}
    	// });
    	var ctx = document.getElementById("AreaChart15");
    	var myChart = new Chart(ctx, {
    		type: 'line',
    		data: {
    			labels: label,
    			type: 'line',
    			datasets: [{
    				data: glucose_by_glucometer,
    				label: '',
    				backgroundColor: 'transparent',
    				borderColor: '#3f4dff',
    				borderWidth: '3',
    				pointBorderColor: 'transparent',
    				pointBackgroundColor: 'transparent',
    			}]
    		},
    		options: {
    			maintainAspectRatio: false,
    			legend: {
    				display: false
    			},
    			responsive: true,
    			tooltips: {
    				mode: 'index',
    				titleFontSize: 12,
    				titleFontColor: '#7886a0',
    				bodyFontColor: '#7886a0',
    				backgroundColor: '#ccc',
    				titleFontFamily: 'Montserrat',
    				bodyFontFamily: 'Montserrat',
    				cornerRadius: 3,
    				intersect: false,
    			},
    			scales: {
    				xAxes: [{
    					gridLines: {
    						color: 'transparent',
    						zeroLineColor: 'transparent'
    					},
    					ticks: {
    						fontSize: 2,
    						fontColor: 'transparent'
    					}
    				}],
    				yAxes: [{
    					display: false,
    					ticks: {
    						display: false,
    					}
    				}]
    			},
    			title: {
    				display: false,
    			},
    			elements: {
    				line: {
    					borderWidth: 1
    				},
    				point: {
    					radius: 4,
    					hitRadius: 10,
    					hoverRadius: 4
    				}
    			}
    		}
    	});
    	/* Chartjs (#resolved-complaints) */
    	var ctx = document.getElementById("resolved-complaints");
    	var myChart = new Chart(ctx, {
    		type: 'line',
    		data: {
    			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    			type: 'line',
    			datasets: [{
    				data: [1, 7, 3, 9, 4, 5, 2, 4, 1, 0],
    				label: 'Resolved-complaints',
    				backgroundColor: 'rgba(70, 127, 207, 0.8)',
    				borderColor: 'rgba(70, 127, 207)',
    			}, ]
    		},
    		options: {
    			maintainAspectRatio: true,
    			legend: {
    				display: false
    			},
    			responsive: true,
    			tooltips: {
    				mode: 'index',
    				titleFontSize: 12,
    				titleFontColor: '#000',
    				bodyFontColor: '#000',
    				backgroundColor: '#fff',
    				cornerRadius: 0,
    				intersect: false,
    			},
    			scales: {
    				xAxes: [{
    					gridLines: {
    						color: 'transparent',
    						zeroLineColor: 'transparent'
    					},
    					ticks: {
    						fontSize: 2,
    						fontColor: 'transparent'
    					}
    				}],
    				yAxes: [{
    					display: false,
    					ticks: {
    						display: false,
    					}
    				}]
    			},
    			title: {
    				display: false,
    			},
    			elements: {
    				line: {
    					borderWidth: 2
    				},
    				point: {
    					radius: 0,
    					hitRadius: 10,
    					hoverRadius: 4
    				}
    			}
    		}
    	});
    	/* Chartjs (#resolved-complaints) */
    	var ctx = document.getElementById("resolved-complaints2");
    	var myChart = new Chart(ctx, {
    		type: 'line',
    		data: {
    			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    			type: 'line',
    			datasets: [{
    				data: [5, 2, 4, 1, 0, 1, 7, 3, 9, 4, ],
    				label: 'Resolved-complaints',
    				backgroundColor: 'rgba(94, 186, 0, 0.8)',
    				borderColor: 'rgb(94, 186, 0)',
    			}, ]
    		},
    		options: {
    			maintainAspectRatio: true,
    			legend: {
    				display: false
    			},
    			responsive: true,
    			tooltips: {
    				mode: 'index',
    				titleFontSize: 12,
    				titleFontColor: '#000',
    				bodyFontColor: '#000',
    				backgroundColor: '#fff',
    				cornerRadius: 0,
    				intersect: false,
    			},
    			scales: {
    				xAxes: [{
    					gridLines: {
    						color: 'transparent',
    						zeroLineColor: 'transparent'
    					},
    					ticks: {
    						fontSize: 2,
    						fontColor: 'transparent'
    					}
    				}],
    				yAxes: [{
    					display: false,
    					ticks: {
    						display: false,
    					}
    				}]
    			},
    			title: {
    				display: false,
    			},
    			elements: {
    				line: {
    					borderWidth: 2
    				},
    				point: {
    					radius: 0,
    					hitRadius: 10,
    					hoverRadius: 4
    				}
    			}
    		}
    	});

    	//Chart12
            var options = {
                chart: {
                    height: 350,
                    type: 'line',
                    shadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 1
                    },
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#77B6EA', '#545454'],
                dataLabels: {
                    enabled: true,
                },
                stroke: {
                    curve: 'smooth'
                },
                series: [{
                        name: "High - 2013",
                        data: [28, 29, 33, 36, 32, 32, 33]
                    },
                    {
                        name: "Low - 2013",
                        data: [12, 11, 14, 18, 17, 13, 13]
                    }
                ],
                title: {
                    text: 'Average High & Low Temperature',
                    align: 'left'
                },
                grid: {
                    borderColor: '#e7e7e7',
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                markers: {

                    size: 6
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    title: {
                        text: 'Month'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Temperature'
                    },
                    min: 5,
                    max: 40
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    floating: true,
                    offsetY: -25,
                    offsetX: -5
                }
            }

            var chart = new ApexCharts(
                document.querySelector("#chart12"),
                options
            );

            chart.render();

    	//Radial chart
    	var options = {
    		chart: {
    			type: 'radialBar',
    			background: 'transparent',
    			stroke: "#fff",
    			color: "#fff"
    		},
    		plotOptions: {
    			responsive: [{
    				breakpoint: undefined,
    				options: {},
    			}],
    			radialBar: {
    				size: undefined,
    				inverseOrder: false,
    				startAngle: 0,
    				endAngle: 360,
    				offsetX: 0,
    				offsetY: 0,
    				hollow: {
    					margin: 5,
    					size: '50%',
    					background: 'transparent',
    					image: undefined,
    					imageWidth: 150,
    					imageHeight: 150,
    					imageOffsetX: 0,
    					imageOffsetY: 0,
    					imageClipped: true,
    					position: 'front',
    					dropShadow: {
    						enabled: false,
    						top: 0,
    						left: 0,
    						blur: 3,
    						opacity: 0.5
    					}
    				},
    				track: {
    					show: true,
    					startAngle: undefined,
    					endAngle: undefined,
    					background: '#f9f9f9',
    					strokeWidth: '97%',
    					opacity: 1,
    					margin: 5,
    					dropShadow: {
    						enabled: false,
    						top: 0,
    						left: 0,
    						blur: 3,
    						opacity: 0.5
    					}
    				},
    				dataLabels: {
    					show: true,
    					name: {
    						show: true,
    						fontSize: '18px',
    						fontFamily: undefined,
    						color: undefined,
    						offsetY: -10
    					},
    					value: {
    						show: true,
    						fontSize: '16px',
    						fontFamily: undefined,
    						color: undefined,
    						offsetY: 16,
    						formatter: function(val) {
    							return val + '%'
    						}
    					},
    					total: {
    						show: false,
    						label: 'Total',
    						color: '#373d3f',
    						formatter: function(w) {
    							return w.globals.seriesTotals.reduce((a, b) => {
    								return a + b
    							}, 0) / w.globals.series.length + '%'
    						}
    					}
    				}
    			}
    		},
    		stroke: {
    			lineCap: "round"
    		},
    		series: [44, 55, 67, 83],
    		labels: ['Existing Customers', 'New Customers', 'Visiting Customers', 'Employes'],
    		colors: ['#467fcf', '#5eba00', '#ffca4a', '#ff6666'],
    	}
    	var chart = new ApexCharts(document.querySelector("#pieChart"), options);
    	chart.render();
    	//Radial chart


    	/*--Apex charts--*/
    	var options = {
    		chart: {
    			height: 300,
    			type: 'bar',
    		},
    		plotOptions: {
    			bar: {
    				horizontal: true,
    			}
    		},
    		dataLabels: {
    			enabled: false
    		},
    		series: [{
    			name: 'Defect Rate',
    			data: [48, 68, 57, 48, 79, 84, 85, 89, 158, 102, 325, 78]
    		}],
    		xaxis: {
    			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    		},
    		yaxis: {},
    		colors: ['#467fcf'],
    		tooltip: {}
    	}
    	var chart = new ApexCharts(document.querySelector("#chart"), options);
    	chart.render();
    }

    </script>
<script type="text/javascript">
    $(document).ready(function() {

    //  alert('test');
      $('.select_e2').select2({
        closeOnSelect: true,
        tags: true,
        dropdownParent: $('#hospital-record-edit')
      });
    });
</script>
  <script type="text/javascript">
  	  function createPDF() {
        var sTable = document.getElementById('widthpdf').innerHTML;

        var style = "<style>";
        style = style + "table {width: 1024px;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=1024,width=1024');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
  </script>
    <script type="text/javascript">

        function hide_show_document_according(document_type) {
            var document_type = "";
            document_type = $( "#document_type option:selected" ).text();
            console.log(document_type);
            if(document_type == "Locked Clinical Notes"){
                $(".locked_clinical_notes_accordian").show();
                $(".singedconsent_form_accordian").hide();
                $(".lab_result_accordian").hide();
                $(".amendments_accordian").hide();

            }else if(document_type == "Signed Consent Forms"){
                $(".singedconsent_form_accordian").show();
                $(".lab_result_accordian").hide();
                $(".amendments_accordian").hide();
                $(".locked_clinical_notes_accordian").hide();
            }else if(document_type =="Lab Result"){
                $(".lab_result_accordian").show();
                $(".singedconsent_form_accordian").hide();
                $(".amendments_accordian").hide();
                $(".locked_clinical_notes_accordian").hide();
            }else if(document_type =="Amendments"){
                $(".amendments_accordian").show();
                $(".singedconsent_form_accordian").hide();
                $(".lab_result_accordian").hide();
                $(".locked_clinical_notes_accordian").hide();
            }
            return document_type;
        }

        function hide_show_document_according_edit(document_type) {
            console.log(document_type);
            if(document_type == "Locked Clinical Notes"){
                $(".locked_clinical_notes_accordian_e").show();
                $(".singedconsent_form_accordian_e").hide();
                $(".lab_result_accordian_e").hide();
                $(".amendments_accordian_e").hide();

            }else if(document_type == "Signed Consent Forms"){
                $(".singedconsent_form_accordian_e").show();
                $(".lab_result_accordian_e").hide();
                $(".amendments_accordian_e").hide();
                $(".locked_clinical_notes_accordian_e").hide();
            }else if(document_type =="Lab Result"){
                $(".lab_result_accordian_e").show();
                $(".singedconsent_form_accordian_e").hide();
                $(".amendments_accordian_e").hide();
                $(".locked_clinical_notes_accordian").hide();
            }else if(document_type =="Amendments"){
                $(".amendments_accordian_e").show();
                $(".singedconsent_form_accordian_e").hide();
                $(".lab_result_accordian_e").hide();
                $(".locked_clinical_notes_accordian_e").hide();
            }
            return document_type;
        }
    </script>
    <script>
   //var currentTab = 0;
  $(function(){

        $('.changetabbutton').click(function(e){
        	  	// alert("test");
    		$(".modal-body").scrollTop(0);
            var next_tab = $('.nav-tabs > .active').next('li').find('a');
            if(next_tab.length > 0){
              next_tab.trigger('click');
              $("#collapse9").addClass("collapse in");
              $("#collapse9").attr("aria-expanded","true");
              $("#collapse1").addClass("collapse in");
              $("#collapse1").attr("aria-expanded","true");
              $("#collapse45").addClass("collapse in");
              $("#collapse45").attr("aria-expanded","true");
            }else{
              $('.nav-tabs li:eq(0) a').trigger('click');
            }
        });
    });

    $(".openaccordian").click(function(e){
    	$(".modal-body").scrollTop(0);
        $("#collapse9").removeClass("collapse in");
        $("#collapse9").addClass("collapse");
        $("#collapse9").attr("aria-expanded","flase");
        $("#collapse10").addClass("collapse in");
        $("#collapse10").attr("aria-expanded","true");
    })

    $(".immuopenaccordian").click(function(e){
    	$(".modal-body").scrollTop(0);
        $("#collapse1").removeClass("collapse in");
        $("#collapse1").addClass("collapse");
        $("#collapse1").attr("aria-expanded","flase");
        $("#collapse2").addClass("collapse in");
        $("#collapse2").attr("aria-expanded","true");
    })
    $(".immuopenaccordian2").click(function(e){
    	$(".modal-body").scrollTop(0);
        $("#collapse2").removeClass("collapse in");
        $("#collapse2").addClass("collapse");
        $("#collapse2").attr("aria-expanded","flase");
        $("#collapse3").addClass("collapse in");
        $("#collapse3").attr("aria-expanded","true");
    })

    $(".immuopenaccordian2").click(function(e){
    	$(".modal-body").scrollTop(0);
        $("#collapse2").removeClass("collapse in");
        $("#collapse2").addClass("collapse");
        $("#collapse2").attr("aria-expanded","flase");
        $("#collapse3").addClass("collapse in");
        $("#collapse3").attr("aria-expanded","true");
    })

    $(".docopenaccordian").click(function(e){
        var accordion_name = hide_show_document_according();
        //alert(accordion_name);
    	$(".modal-body").scrollTop(0);
        $("#collapse45").removeClass("collapse in");
        $("#collapse45").addClass("collapse");
        $("#collapse45").attr("aria-expanded","flase");

        if(accordion_name == "Locked Clinical Notes"){
            $(".modal-body").scrollTop(0);
            $("#collapse45").removeClass("collapse in");
            $("#collapse45").addClass("collapse");
            $("#collapse45").attr("aria-expanded","flase");
            $("#collapse51").addClass("collapse in");
            $("#collapse51").attr("aria-expanded","true");
        }else if(accordion_name == "Signed Consent Forms"){
            $(".modal-body").scrollTop(0);
            $("#collapse45").removeClass("collapse in");
            $("#collapse45").addClass("collapse");
            $("#collapse6").addClass("collapse in");
            $("#collapse6").attr("aria-expanded","true");
        }else if(accordion_name == "Lab Result"){
            $("#collapse45").removeClass("collapse in");
            $("#collapse45").addClass("collapse");
            $("#collapse45").attr("aria-expanded","flase");
            $(".modal-body").scrollTop(0);
            $("#collapse75").addClass("collapse in");
            $("#collapse75").attr("aria-expanded","true");
        }else if(accordion_name == "Amendments"){
            $("#collapse45").removeClass("collapse in");
            $("#collapse45").addClass("collapse");
            $("#collapse45").attr("aria-expanded","flase");
            $(".modal-body").scrollTop(0);
            $("#collapse85").addClass("collapse in");
            $("#collapse85").attr("aria-expanded","true");
        }
    });

        /*$(".docopenaccordian2").click(function(e){
        	$(".modal-body").scrollTop(0);
            $("#collapse51").removeClass("collapse in");
            $("#collapse51").addClass("collapse");
            $("#collapse51").attr("aria-expanded","flase");
            $("#collapse6").addClass("collapse in");
            $("#collapse6").attr("aria-expanded","true");
        });

        $(".docopenaccordian3").click(function(e){
        	$(".modal-body").scrollTop(0);
            $("#collapse6").removeClass("collapse in");
            $("#collapse6").addClass("collapse");
            $("#collapse6").attr("aria-expanded","flase");
            $("#collapse75").addClass("collapse in");
            $("#collapse75").attr("aria-expanded","true");
        });

    $(".docopenaccordian4").click(function(e){
    	$(".modal-body").scrollTop(0);
        $("#collapse75").removeClass("collapse in");
        $("#collapse75").addClass("collapse");
        $("#collapse75").attr("aria-expanded","flase");
        $("#collapse85").addClass("collapse in");
        $("#collapse85").attr("aria-expanded","true");
    });*/


    </script>
    <script>
        $("#icon-bell").click(function(){
            $("#menu").fadeToggle();
            $("#notification").toggleClass("active");
        });
    </script>
    <script>
    $("#icon-bell").click(function(){
        $("#menu").fadeToggle();
        $('#notification').toggle(function () {
            $("#notification").css({"width":"100%"});
        }, function () {
            $("#notification").css({"width":"33%"});
        });

    });
    </script>
   <script>
   function get_patient_autocomplete(){
    var patient_name = $("#search-patient").val();
    	if(patient_name != ""){
			$(".addhospital_record").removeAttr("disabled");
			$(".Patient_errormsg").empty();
			$("#search-patient").css("border-color","#ccc");
		}


        $.ajax({
         type: "POST",
         url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_patient_autocomplete'); ?>",
         data:'patient_name='+patient_name+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
         success:
            function(data){

               var patient_data  = JSON.parse(data);
               $(".autocomplete_items").empty();
               if (patient_data.length === 0) {
                    var  html = '<div><strong>Patient Not Found.</strong></div>';
                    $(".autocomplete_items").append(html);
               }else{

                    $.each(patient_data, function(key, value) {
                        var  html = '<div><input type="hidden" value="d"></div><div><a href="javascript:void(0);" onClick="get_patient_profile(\'' + value.id + '\',\'' +value.fname+"  "+value.lname+ '\')"><strong>'+value.fname+"  "+value.lname+'</strong></a></div>';
                        $(".autocomplete_items").css('display','block');
                        $(".autocomplete_items").append(html);
                    });
               }
            }
        });
    }

    function get_patient_profiles(patient_ID,patient_Name){
       //var edit_url = '<?php //echo base_url(); ?>'+'patient/edit/';
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_patient_profile'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){

                    if (data.length === 0) {
                        $(".patient_profile").empty();
                    }else{
                        $(".patient_profile").html(data);
                        $(".patient_ID").empty();
                        $(".patient_ID").val(patient_ID);
                        $("#patient_name").empty();
                        $("#patient_name").val(patient_Name);
                        $(".search_patient_name").val(patient_Name);
                        $(".autocomplete_items").css('display','none');
                      //  $("#edit_p").attr("href", edit_url+patient_ID);
                    }
                        get_problem_allergies(patient_ID);
					    get_allergies(patient_ID);
                        get_lab_result(patient_ID);
                        get_imaging_order(patient_ID);
                        get_eprescription(patient_ID);
                        get_summary(patient_ID);
                        get_healthrecord(patient_ID);
                        get_vitalsign(patient_ID);
                        get_document(patient_ID);
                        get_lockedclinicalnotes(patient_ID);
                        get_signedconsentforms(patient_ID);
                        get_healthreportamendments(patient_ID);
                        get_doclabresult(patient_ID);
                        get_record_vaccination(patient_ID);
                        get_reviewsign(patient_ID);
                        get_scheduleappointment(patient_ID);
                        get_medications(patient_ID);
                        get_issue(patient_ID);
                        get_uploadeddocuments(patient_ID);
                        get_immunizations(patient_ID);



                }

        });
    }
    function remove_vital(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_vital'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                  function(data){
                  get_vitalsign(data);

                  }
            });
        }
  	}
    function remove_problem(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_problem'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                function(data){
                    get_problem_allergies(data);
                }
            });
        }
  	}
    function remove_allergies(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_allergies'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                function(data){
                    get_allergies(data);
                }
            });
        }
  	}
    function remove_labresult(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_labresult'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                function(data){
                  get_lab_result(data);
                }
            });
        }
  	}
    function remove_imaging_order(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_imaging_order'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                  function(data){
                  get_imaging_order(data);
                }
            });
        }
  	}
    function remove_prescription_medication(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_prescription_medication'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                  function(data){
                  get_eprescription(data);
                }
            });
        }
  	}
    function remove_recordvaccinations(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_recordvaccinations'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                  function(data){
                  get_record_vaccination(data);
                }
            });
        }
  	}
    function remove_reviewsign(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_reviewsign'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                function(data){
                    get_reviewsign(data);
                }
            });
        }
  	}

    function remove_summary(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_summary'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                function(data){
                  get_summary(data);
                }
            });
        }
  	}
    function remove_uploadeddocument(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_uploadeddocument'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                function(data){
                    get_document(data);
                }
            });
        }
  	}
    function remove_lockedclinicalnotes(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_lockedclinicalnotes'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                function(data){
                  get_lockedclinicalnotes(data);
                }
           });
        }
  	}
    function remove_signedconsentforms(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_signedconsentforms'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                  function(data){
                  get_signedconsentforms(data);

                }
           });
        }
  	}
    function remove_doclabresult(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_doclabresult'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                function(data){
                    get_doclabresult(data);

                }
            });
        }
  	}
    function remove_amendments(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_amendments'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                function(data){
                    get_healthreportamendments(data);

                }
            });
        }
  	}
    function remove_healthrecord(vital_id,patient_ID){
        if (confirm('Are you sure you want to delete this?')) {
  		    $.ajax({
              type: "POST",
              url: "<?php echo base_url('health_report/remove_healthrecord'); ?>",
              data:'patient_id='+patient_ID+'&patient_name='+vital_id+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
              success:
                function(data){
                  get_healthrecord(data);
                }
            });
        }
  	}
	function get_allergies(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('health_report/get_allergies'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    $("#allery").html(data);
                }

        });
	}
  function get_scheduleappointment(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('health_report/get_scheduleappointment'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    $("#get_scheduleappointment").html(data);
                }

        });
	}
  function get_medications(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('health_report/get_medications'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    $("#get_medications").html(data);
                }

        });
	}
  function get_issue(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('health_report/get_issue'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    $("#issue").html(data);
                }

        });
	}
  function get_uploadeddocuments(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('health_report/get_uploadeddocuments'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    $("#latest_upload").html(data);
                }

        });
	}
  function get_immunizations(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('health_report/get_immunizations'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    $("#immunizations").html(data);
                }

        });
	}
    /*function get_update_problem(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php //echo base_url('health_report/get_update_problem'); ?>",
            data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    // alert(data);
                     var myArray = jQuery.parseJSON(data);
                     //alert(myArray.id);
                     $(".patient_ID").val(myArray.patient_id);

                     $("#select_problem_e").val(myArray.problem_id).trigger('change');
                     $('#select_problem_e  option[value="'+myArray.problem_id+'"]').prop("selected", true);
                     $('#icdversion_e  option[value="'+myArray.icd_version_id+'"]').prop("selected", true);
                     $('#problem_status_e  option[value="'+myArray.status+'"]').prop("selected", true);
                     $("#problem_notes_e").val(myArray.notes);
                     $("#snomed_ct_code_e").val(myArray.snomed_ct_code);
                     $("#icd10_code_e").val(myArray.icd10_code);
                     $("#diagnosis_datetime_e").val(myArray.diagnosis_datetime);
                     $("#onset_datetime_e").val(myArray.onset_datetime);
                     $("#changed_datetime_e").val(myArray.changed_datetime);
                     $("#healthreport_problem_id").val(myArray.id);
                }
        });
	}
        function get_update_singed_consent(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php //echo base_url('health_report/get_update_singed_consent'); ?>",
            data:'patient_name='+patient_ID+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    // alert(data);
                     var myArray = jQuery.parseJSON(data);
                     //alert(myArray.id);
                     $(".patient_ID").val(myArray.patient_id);


                     $('#singnature_action_e  option[value="'+myArray.singnature_action+'"]').prop("selected", true);

                    // $("#singedconsent_form_e").val(myArray.consent_form);
                     $("#appointment_datetime_e").val(myArray.appointment_datetime);

                     $("#singnature_date_e").val(myArray.singnature_date);

                     $("#singed_consent_forms_id").val(myArray.id);


                }

        });
	}
  function get_update_doclabresult(patient_ID){
     $.ajax({
            type: "POST",
            url: "<?php// echo base_url('health_report/get_update_doclabresult'); ?>",
            data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    // alert(data);
                     var myArray = jQuery.parseJSON(data);
                     //alert(myArray.id);
                     $(".patient_ID").val(myArray.patient_id);


                     $('#document_labaction_e  option[value="'+myArray.action+'"]').prop("selected", true);
                     $('#document_abnormal_e  option[value="'+myArray.abnormal+'"]').prop("selected", true);

                     $("#document_lab_e").val(myArray.lab);
                     $("#document_labdate_time_e").val(myArray.appointment_datetime);

                     $("#document_result_count_e").val(myArray.result_count);
                     $("#document_test_e").val(myArray.test);

                     $("#document_labresult_id").val(myArray.id);


                }

        });
  }
  function get_update_amendments(patient_ID){
     $.ajax({
            type: "POST",
            url: "<?php// echo base_url('health_report/get_update_amendments'); ?>",
            data:'patient_name='+patient_ID+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    // alert(data);
                     var myArray = jQuery.parseJSON(data);
                     //alert(myArray.id);
                     $(".patient_ID").val(myArray.patient_id);


                     $('#amendment_status_e  option[value="'+myArray.amendment_status+'"]').prop("selected", true);


                     $("#amendment_source_e").val(myArray.amendment_source);
                     $("#amdments_date_time_e").val(myArray.amdments_date_time);

                     $("#amdmentsproccess_date_time_e").val(myArray.amdmentsproccess_date_time);


                     $("#amdments_id").val(myArray.id);


                }

        });
  }
  function get_update_document(patient_ID){
     $.ajax({
            type: "POST",
            url: "<?php //echo base_url('health_report/get_update_document'); ?>",
            data:'patient_name='+patient_ID+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                     var myArray = jQuery.parseJSON(data);
                     //alert(myArray.id);
                      $("#healthreport_document_id_e").val(myArray.id);
                      //$("#healthreport_document_id_e").attr("value",myArray.id);
                     $("#document_type_e").val(myArray.document_type).trigger('change');
                     $('#document_type_e  option[value="'+myArray.document_type+'"]').prop("selected", true);
                     $(".patient_ID").val(myArray.patient_id);
                }
        });
  }
  function get_update_clinical_notes(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php //echo base_url('health_report/get_update_clinical_notes'); ?>",
            data:'patient_name='+patient_ID+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    // alert(data);
                     var myArray = jQuery.parseJSON(data);
                     //alert(myArray.id);
                     $(".patient_ID").val(myArray.patient_id);



                     $('#lockedstatus_e  option[value="'+myArray.status+'"]').prop("selected", true);
                    $('#lockedaction_e  option[value="'+myArray.action+'"]').prop("selected", true);
                     $("#date_of_service_e").val(myArray.date_of_service);
                     $("#locked_by_e").val(myArray.locked_by);
                     $("#locked_on_e").val(myArray.locked_on);
                     //$("#lockedaction_e").val(myArray.action);
                     //$("#lockedstatus_e").val(myArray.status);
                     $("#locked_reason_e").val(myArray.reason);
                     $("#locked_id").val(myArray.id);


                }

        });
	}
  function get_update_allergylist(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php //echo base_url('health_report/get_update_allergylist'); ?>",
            data:'patient_name='+patient_ID+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    // alert(data);
                     var myArray = jQuery.parseJSON(data);
                     //alert(myArray.id);
                     $(".patient_ID").val(myArray.patient_id);

                     $("#allergy_type_e").val(myArray.allergy_type).trigger('change');
                     $('#allergy_type_e  option[value="'+myArray.allergy_type+'"]').prop("selected", true);

                     $("#drug_allergy_e").val(myArray.drug_allergy).trigger('change');
                     $('#drug_allergy_e  option[value="'+myArray.drug_allergy+'"]').prop("selected", true);

                     $("#severity_e").val(myArray.severity).trigger('change');
                     $('#severity_e  option[value="'+myArray.severity+'"]').prop("selected", true);

                     $("#reaction_e").val(myArray.reaction).trigger('change');
                     $('#reaction_e  option[value="'+myArray.reaction+'"]').prop("selected", true);

					 $('#allergy_status_e  option[value="'+myArray.status+'"]').prop("selected", true);
                     $("#allergy_notes_e").val(myArray.notes);

                     $("#healthreport_allergies_id").val(myArray.id);


                }

        });
	}
  function get_update_imaging_order(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php //echo base_url('health_report/get_update_imaging_order'); ?>",
            data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     var myArray = jQuery.parseJSON(data);
                        $(".patient_ID").val(myArray.patient_id);
                        $("#cpt_code_e").val(myArray.cpt_code).trigger('change');
                        $('#cpt_code_e  option[value="'+myArray.cpt_code+'"]').prop("selected", true);
                        //$('#reaction_e  option[value="'+myArray.reaction+'"]').prop("selected", true);
                        $('#imaging_order_status_e  option[value="'+myArray.order_status+'"]').prop("selected", true);
                        $("#imaging_order_description_e").val(myArray.description);
                        $("#doctor_commentse").val(myArray.doctor_comments);
                        $("#healthreport_imaging_id").val(myArray.imaging_order_id);
                }

        });
	}
  function get_update_recordvaccinations(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php// echo base_url('health_report/get_update_recordvaccinations'); ?>",
            data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php// echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     var myArray = jQuery.parseJSON(data);
                     $(".patient_ID").val(myArray.patient_id);
                    $("#record_vaccinations_create_record_e").val(myArray.create_record_for).trigger('change');
                    $('#record_vaccinations_create_record_e  option[value="'+myArray.create_record_for+'"]').prop("selected", true);

                    $("#record_vaccinations_cvx_code_e").val(myArray.cvxcode).trigger('change');
                    $('#record_vaccinations_cvx_code_e  option[value="'+myArray.cvxcode+'"]').prop("selected", true);

                    $("#record_vaccinations_manfacturer_e").val(myArray.manfacturer).trigger('change');
                    $('#record_vaccinations_manfacturer_e  option[value="'+myArray.manfacturer+'"]').prop("selected", true);

                    $("#record_vaccination_administered_unit_e").val(myArray.administered_units).trigger('change');
                    $('#record_vaccination_administered_unit_e  option[value="'+myArray.administered_units+'"]').prop("selected", true);

                    $("#record_vaccination_vaccinate_route_e").val(myArray.vaccinate_route).trigger('change');
                    $('#record_vaccination_vaccinate_route_e  option[value="'+myArray.vaccinate_route+'"]').prop("selected", true);

                    $("#record_vaccination_vaccinate_site_e").val(myArray.vaccinate_site).trigger('change');
                    $('#record_vaccination_vaccinate_site_e  option[value="'+myArray.vaccinate_site+'"]').prop("selected", true);

                    $("#record_vaccination_vaccinate_status_e").val(myArray.vaccinate_site).trigger('change');
                    $('#record_vaccination_vaccinate_status_e  option[value="'+myArray.vaccinate_status+'"]').prop("selected", true);

                    $("#record_vaccination_ordering_doctor_e").val(myArray.ordering_doctor).trigger('change');
                    $('#record_vaccination_ordering_doctor_e  option[value="'+myArray.ordering_doctor+'"]').prop("selected", true);

                    $("#record_vaccination_administered_by_e").val(myArray.administered_by).trigger('change');
                    $('#record_vaccination_administered_by_e  option[value="'+myArray.administered_by+'"]').prop("selected", true);

                    $("#record_vaccination_administered_at_e").val(myArray.administered_at).trigger('change');
                    $('#record_vaccination_administered_at_e  option[value="'+myArray.administered_at+'"]').prop("selected", true);

                    $("#record_vaccination_inventory_lot_e").val(myArray.inventory_lot).trigger('change');
                    $('#record_vaccination_inventory_lot_e  option[value="'+myArray.inventory_lot+'"]').prop("selected", true);

                    $("#record_vaccination_record_type_e").val(myArray.record_type).trigger('change');
                    $('#record_vaccination_record_type_e  option[value="'+myArray.record_type+'"]').prop("selected", true);

                    $("#record_vaccination_funding_eligibility_e").val(myArray.funding_eligibility).trigger('change');
                    $('#record_vaccination_funding_eligibility_e  option[value="'+myArray.funding_eligibility+'"]').prop("selected", true);

                    $("#record_vaccination_observed_immunity_e").val(myArray.observed_immunity).trigger('change');
                    $('#record_vaccination_observed_immunity_e  option[value="'+myArray.observed_immunity+'"]').prop("selected", true);

                     $("#record_vaccinations_name_e").val(myArray.name);
                     $("#record_vaccinations_cpt_code_e").val(myArray.cpt_code);
                     $("#record_vaccination_lot-num_e").val(myArray.lot_num);
                     $("#record_vaccination_expirationdate_e").val(myArray.expirationdate);
                     $("#administered_amount_e").val(myArray.administered_amount);
                     $("#record_vaccination_administred_on_e").val(myArray.administred_on);
                     $("#record_vaccination_notes_e").val(myArray.record_vaccination_notes);
                     $("#record_vaccinations_id").val(myArray.id);


                }

        });
	}
  function get_update_eprescription(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php// echo base_url('health_report/get_update_eprescription'); ?>",
            data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php// echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     var myArray = jQuery.parseJSON(data);
                     $(".patient_ID").val(myArray.patient_id);

                    $("#drug_name_e").val(myArray.drug_name).trigger('change');
                    $('#drug_name_e  option[value="'+myArray.drug_name+'"]').prop("selected", true);
                    $('#e_prescription_status_e  option[value="'+myArray.status+'"]').prop("selected", true);
                    $('#appointment_e  option[value="'+myArray.appointment_id+'"]').prop("selected", true);

                     $("#sign_note_e").val(myArray.sig_note);
                     $("#sign_e").val(myArray.sig);
                     $("#indication_e").val(myArray.indication);
                     $("#dispense_quantity_e").val(myArray.dispense_quantity);
                     $("#dispense_package_e").val(myArray.dispense_package);
                     $("#number_refills_e").val(myArray.number_refills);
                     $("#pharmacy_note_e").val(myArray.pharmacy_note);

                     $("#order_status_e").val(myArray.order_status).trigger('change');
                     $("#order_status_e").val(myArray.order_status);

                     $("#notes_e").val(myArray.notes);
                     $("#e_prescription").val(myArray.e_prescription_id);
                }

        });
	}
  function get_update_summary(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php// echo base_url('health_report/get_update_summary'); ?>",
            data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     var myArray = jQuery.parseJSON(data);
                     $(".patient_ID").val(myArray.patient_id);
                     $("#summary_description_e").val(myArray.summary);
                     $("#summary_id").val(myArray.id);
                }

        });
	}

  function get_update_labresult(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php// echo base_url('health_report/get_update_labresult'); ?>",
            data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    var myArray = jQuery.parseJSON(data);
                    $(".patient_ID").val(myArray.patient_id);
                    //$('#allergy_type_e  option[value="'+myArray.allergy_type+'"]').prop("selected", true);
    				//$('#drug-allergy_e  option[value="'+myArray.drug_allergy+'"]').prop("selected", true);
    				$("#loinc_code_e").val(myArray.loinc_code).trigger('change');
					$('#loinc_code_e  option[value="'+myArray.loinc_code+'"]').prop("selected", true);
					//$('#reaction_e  option[value="'+myArray.reaction+'"]').prop("selected", true);
					$("#cvx_code_e").val(myArray.abnormal_flag).trigger('change');
					$('#cvx_code_e  option[value="'+myArray.abnormal_flag+'"]').prop("selected", true);
                    $("#discription_e").val(myArray.description);
                    $("#result_value_e").val(myArray.result_value);
                    $("#units_e").val(myArray.units);
                    $("#normal_range_e").val(myArray.normal_range);
					$("#healthreport_labresult_id").val(myArray.loinc_code_id);
                }

        });
	}*/
	function update_vital(p_id,patient_ID,p_date){
	$.ajax({
	   type: "POST",
	   url: "<?php echo base_url('health_report/update_vital'); ?>",
	   data:'p_date='+p_date+'&p_id='+p_id+'&patient_name='+patient_ID+'&<?php  echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
	   success:
		   function(data){
				var myArray = jQuery.parseJSON(data);
				if (myArray.data_vitalsing == null) {

				}else{
					$(".patient_ID").val(myArray.data_vitalsing.patient_id);
					$("#temp_e").val(myArray.data_vitalsing.temperature);
					$("#vital_id").val(myArray.data_vitalsing.id);
					$("#heart-rate_e").val(myArray.data_vitalsing.heart_rate);
					$("#blood-presure_e").val(myArray.data_vitalsing.blood_pressure);
					$("#respiratory-rate_e").val(myArray.data_vitalsing.respiratory_rate);
					$("#oxygen-saturation_e").val(myArray.data_vitalsing.oxygen_saturation);
					$("#bmi_e").val(myArray.data_vitalsing.bmi);
					$("#height_e").val(myArray.data_vitalsing.height);
					$("#weight_e").val(myArray.data_vitalsing.weight);
					$("#pain_e").val(myArray.data_vitalsing.pain);
					$('#smoking_e  option[value="'+myArray.data_vitalsing.smoking_status+'"]').prop("selected", true);
					$('#bloodtype_e').val(myArray.data_vitalsing.bloodtype).trigger('change');
					$('#bloodtype_e  option[value="'+myArray.data_vitalsing.bloodtype+'"]').prop("selected", true);
					$("#head-circumfernce_e").val(myArray.data_vitalsing.head_circumference);
					$("#glucose-glucometer_e").val(myArray.data_vitalsing.glucose_by_glucometer);
				}
				if (myArray.problem_data == null) {
				}else{
					$("#healthreport_problem_id").val(myArray.problem_data.id);
					$("#select_problem_e").val(myArray.problem_data.problem_id);
	                $('#icdversion_e').val(myArray.problem_data.icd_version_id);
					$('#problem_status_e  option[value="'+myArray.problem_data.status+'"]').prop("selected", true);
					$("#problem_notes_e").val(myArray.problem_data.notes);
					$("#snomed_ct_code_e").val(myArray.problem_data.snomed_ct_code);
					$("#icd10_code_e").val(myArray.problem_data.icd10_code);
					$("#diagnosis_datetime_e").val(myArray.problem_data.diagnosis_datetime);
					$("#onset_datetime_e").val(myArray.problem_data.onset_datetime);
					$("#channged_datetime_e").val(myArray.problem_data.changed_datetime);
				}
				if (myArray.allergy_data == null){
				}else{
					$("#allergy_type_e").val(myArray.allergy_data.allergy_type).trigger('change');
					$('#allergy_type_e  option[value="'+myArray.allergy_data.allergy_type+'"]').prop("selected", true);
					$('#drug_allergy_e').val(myArray.allergy_data.drug_allergy);
					$("#severity_e").val(myArray.allergy_data.severity).trigger('change');
					$('#severity_e  option[value="'+myArray.allergy_data.severity+'"]').prop("selected", true);

					$("#reaction_e").val(myArray.allergy_data.reaction).trigger('change');
					$('#reaction_e  option[value="'+myArray.allergy_data.reaction+'"]').prop("selected", true);

					$('#allergy_status_e  option[value="'+myArray.allergy_data.status+'"]').prop("selected", true);
					$("#allergy_notes_e").val(myArray.allergy_data.notes);
					$("#healthreport_allergies_id").val(myArray.allergy_data.id);
				}

				if(myArray.labelresult_data == null){

				}else{
					$(".patient_ID").val(myArray.labelresult_data.patient_id);
	                $("#loinc_code_e").val(myArray.labelresult_data.loinc_code);
	                $("#cvx_code_e").val(myArray.labelresult_data.abnormal_flag).trigger('change');
	                $('#cvx_code_e  option[value="'+myArray.labelresult_data.abnormal_flag+'"]').prop("selected", true);
	                $("#discription_e").val(myArray.labelresult_data.description);
	                $("#result_value_e").val(myArray.labelresult_data.result_value);
	                $("#units_e").val(myArray.labelresult_data.units);
	                $("#normal_range_e").val(myArray.labelresult_data.normal_range);
	                $("#healthreport_labresult_id").val(myArray.labelresult_data.loinc_code_id);
				}

				if(myArray.imagingorder_data == null){

	            }else{
	            	$(".patient_ID").val(myArray.imagingorder_data.patient_id);
	                $("#cpt_code_e").val(myArray.imagingorder_data.cpt_code);
	                $('#imaging_order_status_e  option[value="'+myArray.imagingorder_data.order_status+'"]').prop("selected", true);

	                $("#imaging_order_description_e").val(myArray.imagingorder_data.description);
	                $("#doctor_commentse").val(myArray.imagingorder_data.doctor_comments);
	                $("#healthreport_imaging_id").val(myArray.imagingorder_data.imaging_order_id);
	            }


                if (myArray.e_prescriptiondata == null) {
                }else{
                    $(".patient_ID").val(myArray.e_prescriptiondata.patient_id);
                    $("#drug_name_e").val(myArray.e_prescriptiondata.drug_name);
                    $('#e_prescription_status_e  option[value="'+myArray.e_prescriptiondata.status+'"]').prop("selected", true);
                    $('#appointment_e  option[value="'+myArray.e_prescriptiondata.appointment_id+'"]').prop("selected", true);
                    $("#prescribe_date_time_e").val(myArray.e_prescriptiondata.datetime_prescribed);
                    $("#started_taking_date_time_e").val(myArray.e_prescriptiondata.datetime_started_taking);
                    $("#stopped_taking_date_time_e").val(myArray.e_prescriptiondata.datetime_stopped_taking);
                    $("#sign_note_e").val(myArray.e_prescriptiondata.sig_note);
                    $("#sign_e").val(myArray.e_prescriptiondata.sig);
                    $("#indication_e").val(myArray.e_prescriptiondata.indication);
                    $("#dispense_quantity_e").val(myArray.e_prescriptiondata.dispense_quantity);
                    $("#dispense_package_e").val(myArray.e_prescriptiondata.dispense_package);
                    $("#number_refills_e").val(myArray.e_prescriptiondata.number_refills);
                    $("#pharmacy_note_e").val(myArray.e_prescriptiondata.pharmacy_note);
                    $("#order_status_e").val(myArray.e_prescriptiondata.order_status).trigger('change');
                    $("#order_status_e").val(myArray.e_prescriptiondata.order_status).prop("selected", true);
                    $("#notes_e").val(myArray.e_prescriptiondata.notes);
                    $("#e_prescription").val(myArray.e_prescriptiondata.e_prescription_id);

                    if(myArray.e_prescriptiondata.prn == "yes"){
                       $("#defaultCheck1_e").attr('checked', true);
                    }else{
                       $("#defaultCheck1_e").attr('checked', false);
                    }
                }
                if (myArray.summary_data == null) {
                }else{
                    $(".patient_ID").val(myArray.summary_data.patient_id);
                    $("#summary_description_e").val(myArray.summary_data.summary);
                    $("#summary_id").val(myArray.summary_data.id);
                }

                if (myArray.document_data == null){

                }else{
                    $("#healthreport_document_id_e").val(myArray.document_data.id);
                    $('#document_type_e  option[value="'+myArray.document_data.document_type+'"]').prop("selected", true);
                    console.log(myArray.document_data.document_type);
                    var document_typetext = $("#document_type_e option:selected").text();
                    hide_show_document_according_edit(document_typetext);
                    $(".patient_ID").val(myArray.document_data.patient_id);
                }


                if (myArray.clinical_notesdata == null) {

                }else{
                    $(".patient_ID").val(myArray.clinical_notesdata.patient_id);
                    $('#lockedstatus_e  option[value="'+myArray.clinical_notesdata.status+'"]').prop("selected", true);
                    $('#lockedaction_e  option[value="'+myArray.clinical_notesdata.action+'"]').prop("selected", true);
                    $("#date_of_service_e").val(myArray.clinical_notesdata.date_of_service);
                    //$("#locked_by_e").val(myArray.clinical_notesdata.locked_by);
                    $("#locked_on_e").val(myArray.clinical_notesdata.locked_on);
                    $("#locked_reason_e").val(myArray.clinical_notesdata.reason);
                    $("#locked_id").val(myArray.clinical_notesdata.id);
                }

                if (myArray.singed_consentdata == null) {

                }else{
                     $(".patient_ID").val(myArray.singed_consentdata.patient_id);
                    /*$('#singnature_action_e  option[value="'+myArray.singed_consentdata.singnature_action+'"]').prop("selected", true);
                    $("#singedconsent_form_e").val(myArray.consent_form);*/
                    $("#appointment_datetime_e").val(myArray.singed_consentdata.appointment_datetime);
                    $("#singnature_date_e").val(myArray.singed_consentdata.singnature_date);
                    $("#singed_consent_forms_id").val(myArray.singed_consentdata.id);
                }

                if (myArray.doclabresult_data == null) {

                }else{
                    $(".patient_ID").val(myArray.doclabresult_data.patient_id);
                    $('#document_labaction_e  option[value="'+myArray.doclabresult_data.action+'"]').prop("selected", true);
                    $('#document_abnormal_e  option[value="'+myArray.doclabresult_data.abnormal+'"]').prop("selected", true);
                    $("#document_lab_e").val(myArray.doclabresult_data.lab);

                    $("#document_labdate_time_e").val(myArray.doclabresult_data.date);
                    $("#document_result_count_e").val(myArray.doclabresult_data.result_count);
                    $("#document_test_e").val(myArray.doclabresult_data.test);
                    $("#document_labresult_id").val(myArray.doclabresult_data.id);
                }
                if (myArray.amendment_data == null) {
                }else{
                    $(".patient_ID").val(myArray.amendment_data.patient_id);
                    $('#amendment_status_e  option[value="'+myArray.amendment_data.amendment_status+'"]').prop("selected", true);
                    $("#amendment_source_e").val(myArray.amendment_data.amendment_source);
                    $("#amdments_date_time_e").val(myArray.amendment_data.amdments_date_time);
                    $("#amdmentsproccess_date_time_e").val(myArray.amendment_data.amdmentsproccess_date_time);
                    $("#amdments_id").val(myArray.amendment_data.id);
                }
    			if (myArray.recordvaccinations_data == null) {

    			}else{
    				$(".patient_ID").val(myArray.recordvaccinations_data.patient_id);
	                //$('#record_vaccinations_consent_form_e  option[value="'+myArray.consentform+'"]').prop("selected", true);
	                $("#record_vaccinations_create_record_e").val(myArray.recordvaccinations_data.create_record_for).trigger('change');
	                $('#record_vaccinations_create_record_e  option[value="'+myArray.recordvaccinations_data.create_record_for+'"]').prop("selected", true);
	                $('#record_vaccinations_cvx_code_e').val(myArray.recordvaccinations_data.cvxcode);
	                $("#record_vaccinations_manfacturer_e").val(myArray.recordvaccinations_data.manfacturer);


	               	$("#record_vaccination_administered_unit_e").val(myArray.recordvaccinations_data.administered_units).trigger('change');
	                $('#record_vaccination_administered_unit_e  option[value="'+myArray.recordvaccinations_data.administered_units+'"]').prop("selected", true);


	                $("#record_vaccination_vaccinate_route_e").val(myArray.recordvaccinations_data.vaccinate_route).trigger('change');
	                $('#record_vaccination_vaccinate_route_e  option[value="'+myArray.recordvaccinations_data.vaccinate_route+'"]').prop("selected", true);

	                $("#record_vaccination_vaccinate_site_e").val(myArray.recordvaccinations_data.vaccinate_site).trigger('change');
	                $('#record_vaccination_vaccinate_site_e  option[value="'+myArray.recordvaccinations_data.vaccinate_site+'"]').prop("selected", true);

	                $("#record_vaccination_vaccinate_status_e").val(myArray.recordvaccinations_data.vaccinate_status).trigger('change');
	                $('#record_vaccination_vaccinate_status_e  option[value="'+myArray.recordvaccinations_data.vaccinate_status+'"]').prop("selected", true);

	                $("#record_vaccination_ordering_doctor_e").val(myArray.recordvaccinations_data.ordering_doctor).trigger('change');
	                $('#record_vaccination_ordering_doctor_e  option[value="'+myArray.recordvaccinations_data.ordering_doctor+'"]').prop("selected", true);

	                $("#record_vaccination_administered_by_e").val(myArray.recordvaccinations_data.administered_by).trigger('change');
	                $('#record_vaccination_administered_by_e  option[value="'+myArray.recordvaccinations_data.administered_by+'"]').prop("selected", true);

	                $("#record_vaccination_administered_at_e").val(myArray.recordvaccinations_data.administered_at).trigger('change');
	                $('#record_vaccination_administered_at_e  option[value="'+myArray.recordvaccinations_data.administered_at+'"]').prop("selected", true);

	                $("#record_vaccination_inventory_lot_e").val(myArray.recordvaccinations_data.inventory_lot).trigger('change');
	                $('#record_vaccination_inventory_lot_e  option[value="'+myArray.recordvaccinations_data.inventory_lot+'"]').prop("selected", true);

	                $("#record_vaccination_record_type_e").val(myArray.recordvaccinations_data.record_type).trigger('change');
	                $('#record_vaccination_record_type_e  option[value="'+myArray.recordvaccinations_data.record_type+'"]').prop("selected", true);

	                $("#record_vaccination_funding_eligibility_e").val(myArray.recordvaccinations_data.funding_eligibility).trigger('change');
	                $('#record_vaccination_funding_eligibility_e  option[value="'+myArray.recordvaccinations_data.funding_eligibility+'"]').prop("selected", true);

	                $("#record_vaccination_observed_immunity_e").val(myArray.recordvaccinations_data.observed_immunity).trigger('change');
	                $('#record_vaccination_observed_immunity_e  option[value="'+myArray.recordvaccinations_data.observed_immunity+'"]').prop("selected", true);
	                $("#record_vaccinations_name_e").val(myArray.recordvaccinations_data.name);
	                $("#record_vaccinations_cpt_code_e").val(myArray.recordvaccinations_data.cpt_code);
	                $("#record_vaccination_lot-num_e").val(myArray.recordvaccinations_data.lot_num);

	                $("#record_vaccination_expirationdate_e").val(myArray.recordvaccinations_data.expirationdate);

	                $("#administered_amount_e").val(myArray.recordvaccinations_data.administered_amount);
	                $("#record_vaccination_administred_on_e").val(myArray.recordvaccinations_data.administred_on);
	                $("#record_vaccination_notes_e").val(myArray.recordvaccinations_data.record_vaccination_notes);
	                $("#record_vaccinations_id").val(myArray.recordvaccinations_data.id);
    			}
                if (myArray.vaccines_data === null){

                }else{
	                $(".patient_ID").val(myArray.vaccines_data.patient_id)
	                $("#Addselect_vaccination_e").val(myArray.vaccines_data.vaccines).trigger('change');
	                $('#Addselect_vaccination_e  option[value="'+myArray.vaccines_data.vaccines+'"]').prop("selected", true);

	                get_edit_vaccinesschedule(myArray.vaccines_data.vaccines,myArray.vaccines_data.schedule,myArray.vaccines_data.vaccine);
	                get_edit_vaccines_vaccine(myArray.vaccines_data.vaccines,myArray.vaccines_data.vaccine);
	                $("#immunizationscvx_code_vaccines_e").val(myArray.vaccines_data.cvxcode);

	                $("#vis_e").val(myArray.vaccines_data.vis);
	                $("#administreted_on_e").val("<?php echo date('Y-m-d h:i:s'); ?>");
	                $('#vaccinestatus_e option[value="'+myArray.vaccines_data.vaccines_status+'"]').prop("selected", true);
	                $("#vaccines_e_ID").val(myArray.vaccines_data.id);
	            }

			    $('#hospital-record-edit').modal('toggle');
		   }

   		});
	}
  function get_record_vaccination(patient_ID){
     $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_record_vaccination'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#get_record_vaccination").html(data);

                }

        });
  }
  function get_reviewsign(patient_ID){
     $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_reviewandsign'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#review_sign").html(data);

                }

        });
  }
  function get_vitalsign(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_vitalsign'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#vital_sign").html(data);

                }

        });
	}
  function get_vitalsigns(){
    var patient_ID = $(".patient_ID").val();
        get_vitalsign(patient_ID);
        get_problem_allergies(patient_ID);
        get_allergies(patient_ID);
        get_lab_result(patient_ID);
        get_imaging_order(patient_ID);
        get_eprescription(patient_ID);
        get_record_vaccination(patient_ID);
        get_reviewsign(patient_ID);
        get_summary(patient_ID);
        get_document(patient_ID);
        get_lockedclinicalnotes(patient_ID);
        get_signedconsentforms(patient_ID);
        get_doclabresult(patient_ID);
        get_healthrecord(patient_ID);
      //  get_patient_profile(patient_ID);
	}

  function get_lockedclinicalnotes(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_lockedclinicalnotes'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#locked_clinical_notes").html(data);

                }
        });
	}
  function get_signedconsentforms(patient_ID){
     $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_signedconsentforms'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#signed_consent_forms").html(data);

                }
        });
  }
  function get_healthreportamendments(patient_ID){
     $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_amendments'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#amendments_list").html(data);

                }

        });
  }
  function get_doclabresult(patient_ID){
     $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_doclabresult'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#doc_lab_result").html(data);

                }

        });
  }
  function get_document(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_uploadeddocument'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#get_document").html(data);

                }

        });
	}
  function get_summary(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_summary'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#get_summary").html(data);

                }

        });
	}
  function get_eprescription(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_eprescription'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#eprescription").html(data);

                }

        });
	}
  function get_healthrecord(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_healthrecord'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#healthreport").html(data);

                }

        });
	}
  function get_lab_result(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_lab_result'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#lab_result").html(data);

                }

        });
	}
  function get_imaging_order(patient_ID){
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_imaging_order'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#imaging_order").html(data);

                }

        });
	}
	function get_problem_allergies(patient_ID){

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_problem_allergies'); ?>",
            data:'patient_name='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                     //alert(data);
                    $("#problem_t").html(data);

                }

        });
    }


  </script>

  <!-- <script language="javascript">

    window.onload = function () {



    var chart = new CanvasJS.Chart("chartHeartrate", {

      animationEnabled: true,

      theme: "light2",

      title:{

        text: "Heart Rate"

      },

      data: [{

        type: "line",

            indexLabelFontSize: 16,

        dataPoints: [

          { y: 30 },

          { y: 20},

          { y: 50 },

          { y: 80 },

          { y: 44 },

        ]

      }]

    });

    chart.render();

    }

      </script>



      <script language="javascript">

        window.onload = function () {



        var chart = new CanvasJS.Chart("chartBloodpressure", {

          animationEnabled: true,

          theme: "light2",

          title:{

            text: "Blood Pressure"

          },

          data: [{

            type: "line",

                indexLabelFontSize: 16,

            dataPoints: [

              { y: 30 },

              { y: 20},

              { y: 50 },

              { y: 80 },

              { y: 44 },

            ]

          }]

        });

        chart.render();

        }

          </script> -->

  <script>

    //   $(document).on("click", ".panel-heading", function () {

    //       if ($(this).attr('class').indexOf('open') == 1)

    //  $(this).toggleClass("open").next().slideToggle('fast');

    //       //Hide the other panels

    //       $(".panel-heading").not($(this)).removeClass("open");

    //       $(".panel-collapse").not($(this).next()).slideUp('fast');

    //   });

  </script>

  <script>

    (function ($) {

      if ($('.chart-circle').length) {

        $('.chart-circle').each(function () {

          let $this = $(this);

          $this.circleProgress({

            fill: {

              color: $this.attr('data-color')

            },

            size: $this.height(),

            startAngle: -Math.PI / 4 * 2,

            emptyFill: '#f9f9f9',

            lineCap: 'round'

          });

        });

      }

    });

  </script>

  <script>

    $("#file-1").fileinput({

      theme: 'fa',

      uploadUrl: '#',

      allowedFileExtensions: ['jpg', 'png', 'gif', 'pdf'],

      overwriteInitial: false,

      maxFileSize: 2000,

      maxFilesNum: 10,

      slugCallback: function (filename) {

        return filename.replace('(', '_').replace(']', '_');

      }

    });
    $("#file-1_e").fileinput({

      theme: 'fa',

      uploadUrl: '#',

      allowedFileExtensions: ['jpg', 'png', 'gif', 'pdf'],

      overwriteInitial: false,

      maxFileSize: 2000,

      maxFilesNum: 10,

      slugCallback: function (filename) {

        return filename.replace('(', '_').replace(']', '_');

      }

    });
  </script>



  <script>

    // $(document).ready(function () {

    //   $("select").change(function () {

    //     $(this).find("option:selected").each(function () {

    //       var optionValue = $(this).attr("value");

    //       if (optionValue) {

    //         $(".table-box").not("." + optionValue).hide();

    //         $("." + optionValue).show();

    //       } else {

    //         $(".table-box").hide();

    //       }

    //     });

    //   }).change();

    // });

       $(document).ready(function() {
        $("select").change(function() {
            $("select option:selected").each(function() {
                  if ($(this).attr("value") == "birth") {
                    $(".table-box").hide();
                    $(".birth").show();
                  }
                  if ($(this).attr("value") == "year") {
                    $(".table-box").hide();
                    $(".year").show();
                  }
                  if ($(this).attr("value") == "adult") {
                    $(".table-box").hide();
                    $(".adult").show();
                  }
                  if ($(this).attr("value") == "other") {
                    $(".table-box").hide();
                    $(".other").show();
                  }

            });
        }).change();
    });

  </script>

  <script>
    /*$(".Addselect_vaccination").on("change",function() {
        var Addselect_vaccination = $(this).val();
        	//alert(Addselect_vaccination);
        if (Addselect_vaccination == "birth") {
           $("#schedule").empty();
           var birth_schdule =  [{ "id" : "1", "name" : "Birth" },
                            { "id" : "2", "name" : "1 - 4 Months"},
                            { "id" : "3", "name" : "2 - 4 Months" },
                            { "id" : "4", "name" : "4 - 6 Months" },
                            { "id" : "5", "name" : "6 - 9 Months" },
                            { "id" : "6", "name" : "6 - 19 Months" },
                            { "id" : "7", "name" : "12 - 18 Months" },
                          { "id" : "8", "name" : "12 - 24 Months" },{ "id" : "8", "name" : "15 - 19 Months" },]
            var html = "<option value='' selected='selected' > Select Schedule</option>";
            $("#schedule").html(html);
            $.each(birth_schdule, function(key, value) {
               var html = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#schedule").append(html);
            });

            $("#vaccine").empty();
           var birth_vaccine =  [{ "id" : "1", "name" : "HepB" },
                            { "id" : "2", "name" : "HIB"},
                            { "id" : "3", "name" : "DTAP" },
                            { "id" : "4", "name" : "POLIO" },
                            { "id" : "5", "name" : "ROTAVIRUS" },
                            { "id" : "6", "name" : "PneumoPCV" },
                            { "id" : "7", "name" : "VARICELLA" },{ "id" : "8", "name" : "MMR" },{ "id" : "9", "name" : "HepA" }]
            var htmlvaccine = "<option value='' selected='selected' > Select Vaccine</option>";
            $("#vaccine").html(htmlvaccine);
            $.each(birth_vaccine, function(key, value) {
               var htmlvaccine = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#vaccine").append(htmlvaccine);
            });
        }
        if (Addselect_vaccination == "year") {
           $("#schedule").empty();
           var year_schdule =  [{ "id" : "1", "name" : "2 - 18 Years"},
                            { "id" : "2", "name" : "4 - 7 Years" },
                            { "id" : "3", "name" : "9 - 18 Years" },
                            { "id" : "4", "name" : "11 - 13 Years" },
                            { "id" : "5", "name" : "13 - 16 Years" },
                            { "id" : "6", "name" : "16 Years" },{ "id" : "7", "name" : "16 - 18 Years" }]
            var html = "<option value='' selected='selected' > Select Schedule</option>";
            $("#schedule").html(html);
            $.each(year_schdule, function(key, value) {
               var html = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#schedule").append(html);
            });

            $("#vaccine").empty();
           var year_vaccine =  [{ "id" : "1", "name" : "HepA" },
                            { "id" : "2", "name" : "DTAP"},
                            { "id" : "3", "name" : "POLIO" },
                            { "id" : "4", "name" : "MMR" },
                            { "id" : "5", "name" : "VARICELLA" },
                            { "id" : "6", "name" : "HPV" },
                            { "id" : "7", "name" : "MENING" },{ "id" : "8", "name" : "Td" },{ "id" : "9", "name" : "MeningB" }]
            var htmlvaccine = "<option value='' selected='selected' > Select Vaccine</option>";
            $("#vaccine").html(htmlvaccine);
            $.each(year_vaccine, function(key, value) {
               var htmlvaccine = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#vaccine").append(htmlvaccine);
            });
        }
        if (Addselect_vaccination == "adult") {
            $("#schedule").empty();
            var year_schdule =  [{ "id" : "1", "name" : "18 Years" }]
            var html = "<option value='' selected='selected' > Select Schedule</option>";
            $("#schedule").html(html);
            $.each(year_schdule, function(key, value) {
               var html = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#schedule").append(html);
            });

            $("#vaccine").empty();
           var year_vaccine =  [{ "id" : "1", "name" : "VARICELLA" },
                            { "id" : "2", "name" : "HPV"},
                            { "id" : "3", "name" : "ZOSTER" },
                            { "id" : "4", "name" : "MMR" },
                            { "id" : "5", "name" : "PneumoPCV" },
                            { "id" : "6", "name" : "MENING" },
                            { "id" : "7", "name" : "HepA" },{ "id" : "8", "name" : "HepB" },{ "id" : "9", "name" : "HIB" },{ "id" : "9", "name" : "MeningB" }]
            var htmlvaccine = "<option value='' selected='selected' > Select Vaccine</option>";
            $("#vaccine").html(htmlvaccine);
            $.each(year_vaccine, function(key, value) {
               var htmlvaccine = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#vaccine").append(htmlvaccine);
            });
        }
        if (Addselect_vaccination == "other") {
            $("#schedule").empty();
            var year_schdule =  [{ "id" : "1", "name" : "Recurring" },{ "id" : "2", "name" : "Pending" },{ "id" : "3", "name" : "None" },{ "id" : "4", "name" : "Non-US" },{ "id" : "5", "name" : "Non-routine"},{ "id" : "6", "name" : "Never Active"},{ "id" : "7", "name" : "Inactive"},{ "id" : "8", "name" : "Active"}]
            var html = "<option value='' selected='selected' > Select Schedule</option>";
            $("#schedule").html(html);
            $.each(year_schdule, function(key, value) {
               var html = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#schedule").append(html);
            });

            $("#vaccine").empty();
           var year_vaccine =  [{ "id" : "1", "name" : "FLU" },
                            { "id" : "2", "name" : "Td"},
                            { "id" : "3", "name" : "Pending" },
                            { "id" : "4", "name" : "Non-US" },
                            { "id" : "5", "name" : "TYPHOID" },
                            { "id" : "6", "name" : "VACCINIA" },
                            { "id" : "7", "name" : "H5N1 flu" },{ "id" : "8", "name" : "Japanese encephalitis" },{ "id" : "9", "name" : "ADENO" },{ "id" : "10", "name" : "RABIES" },{ "id" : "11", "name" : "BCG" },{ "id" : "12", "name" : "Plague" },{ "id" : "13", "name" : "ANTHRAX" },{ "id" : "14", "name" : "PneumoPPV" },{ "id" : "15", "name" : "YELLOWFEVER" },{ "id" : "16", "name" : "cholera" },{ "id" : "17", "name" : "TDAP" },{ "id" : "18", "name" : "ZOSTER" },{ "id" : "19", "name" : "Never Active" },{ "id" : "20", "name" : "Inactive" },{ "id" : "21", "name" : "Active" },{ "id" : "22", "name" : "COVID-19	" }]
            var htmlvaccine = "<option value='' selected='selected' > Select Vaccine</option>";
            $("#vaccine").html(htmlvaccine);
            $.each(year_vaccine, function(key, value) {
               var htmlvaccine = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#vaccine").append(htmlvaccine);
            });
        }
    });

    /*For Edit
    $("#Addselect_vaccination_e").on("change",function() {
        //alert($(this).val());
        var Addselect_vaccination = $(this).val();
            //alert(Addselect_vaccination);
        if (Addselect_vaccination == "birth") {
           $("#schedule_e").empty();
           var birth_schdule =  [{ "id" : "1", "name" : "Birth" },
                            { "id" : "2", "name" : "1 - 4 Months"},
                            { "id" : "3", "name" : "2 - 4 Months" },
                            { "id" : "4", "name" : "4 - 6 Months" },
                            { "id" : "5", "name" : "6 - 9 Months" },
                            { "id" : "6", "name" : "6 - 19 Months" },
                            { "id" : "7", "name" : "12 - 18 Months" },
                          { "id" : "8", "name" : "12 - 24 Months" },{ "id" : "8", "name" : "15 - 19 Months" },]
            var html = "<option value='' selected='selected' > Select Schedule</option>";
            $("#schedule_e").html(html);
            $.each(birth_schdule, function(key, value) {
               var html = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#schedule_e").append(html);
            });

            $("#vaccine_e").empty();
          var birth_vaccine =  [{ "id" : "1", "name" : "HepB" },
                            { "id" : "2", "name" : "HIB"},
                            { "id" : "3", "name" : "DTAP" },
                            { "id" : "4", "name" : "POLIO" },
                            { "id" : "5", "name" : "ROTAVIRUS" },
                            { "id" : "6", "name" : "PneumoPCV" },
                            { "id" : "7", "name" : "VARICELLA" },{ "id" : "8", "name" : "MMR" },{ "id" : "9", "name" : "HepA" }]
            var htmlvaccine = "<option value='' selected='selected' > Select Vaccine</option>";
            $("#vaccine_e").html(htmlvaccine);
            $.each(birth_vaccine, function(key, value) {
               var htmlvaccine = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#vaccine_e").append(htmlvaccine);
            });
        }
        if (Addselect_vaccination == "year") {
           $("#schedule_e").empty();
           var year_schdule =  [{ "id" : "1", "name" : "2 - 18 Years"},
                            { "id" : "2", "name" : "4 - 7 Years" },
                            { "id" : "3", "name" : "9 - 18 Years" },
                            { "id" : "4", "name" : "11 - 13 Years" },
                            { "id" : "5", "name" : "13 - 16 Years" },
                            { "id" : "6", "name" : "16 Years" },{ "id" : "7", "name" : "16 - 18 Years" }]
            var html = "<option value='' selected='selected' > Select Schedule</option>";
            $("#schedule_e").html(html);
            $.each(year_schdule, function(key, value) {
               var html = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#schedule_e").append(html);
            });

            $("#vaccine").empty();
           var year_vaccine =  [{ "id" : "1", "name" : "HepA" },
                            { "id" : "2", "name" : "DTAP"},
                            { "id" : "3", "name" : "POLIO" },
                            { "id" : "4", "name" : "MMR" },
                            { "id" : "5", "name" : "VARICELLA" },
                            { "id" : "6", "name" : "HPV" },
                            { "id" : "7", "name" : "MENING" },{ "id" : "8", "name" : "Td" },{ "id" : "9", "name" : "MeningB" }]
            var htmlvaccine = "<option value='' selected='selected' > Select Vaccine</option>";
            $("#vaccine_e").html(htmlvaccine);
            $.each(year_vaccine, function(key, value) {
               var htmlvaccine = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#vaccine_e").append(htmlvaccine);
            });
        }
        if (Addselect_vaccination == "adult") {
            $("#schedule_e").empty();
            var year_schdule =  [{ "id" : "1", "name" : "18 Years" }]
            var html = "<option value='' selected='selected' > Select Schedule</option>";
            $("#schedule_e").html(html);
            $.each(year_schdule, function(key, value) {
               var html = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#schedule_e").append(html);
            });

            $("#vaccine_e").empty();
           var year_vaccine =  [{ "id" : "1", "name" : "VARICELLA" },
                            { "id" : "2", "name" : "HPV"},
                            { "id" : "3", "name" : "ZOSTER" },
                            { "id" : "4", "name" : "MMR" },
                            { "id" : "5", "name" : "PneumoPCV" },
                            { "id" : "6", "name" : "MENING" },
                            { "id" : "7", "name" : "HepA" },{ "id" : "8", "name" : "HepB" },{ "id" : "9", "name" : "HIB" },{ "id" : "9", "name" : "MeningB" }]
            var htmlvaccine = "<option value='' selected='selected' > Select Vaccine</option>";
            $("#vaccine_e").html(htmlvaccine);
            $.each(year_vaccine, function(key, value) {
               var htmlvaccine = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#vaccine_e").append(htmlvaccine);
            });
        }
        if (Addselect_vaccination == "other") {
            $("#schedule_e").empty();
            var year_schdule =  [{ "id" : "1", "name" : "Recurring" },{ "id" : "2", "name" : "Pending" },{ "id" : "3", "name" : "None" },{ "id" : "4", "name" : "Non-US" },{ "id" : "5", "name" : "Non-routine"},{ "id" : "6", "name" : "Never Active"},{ "id" : "7", "name" : "Inactive"},{ "id" : "8", "name" : "Active"}]
            var html = "<option value='' selected='selected' > Select Schedule</option>";
            $("#schedule_e").html(html);
            $.each(year_schdule, function(key, value) {
               var html = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#schedule_e").append(html);
            });

            $("#vaccine_e").empty();
           var year_vaccine =  [{ "id" : "1", "name" : "FLU" },
                            { "id" : "2", "name" : "Td"},
                            { "id" : "3", "name" : "Pending" },
                            { "id" : "4", "name" : "Non-US" },
                            { "id" : "5", "name" : "TYPHOID" },
                            { "id" : "6", "name" : "VACCINIA" },
                            { "id" : "7", "name" : "H5N1 flu" },{ "id" : "8", "name" : "Japanese encephalitis" },{ "id" : "9", "name" : "ADENO" },{ "id" : "10", "name" : "RABIES" },{ "id" : "11", "name" : "BCG" },{ "id" : "12", "name" : "Plague" },{ "id" : "13", "name" : "ANTHRAX" },{ "id" : "14", "name" : "PneumoPPV" },{ "id" : "15", "name" : "YELLOWFEVER" },{ "id" : "16", "name" : "cholera" },{ "id" : "17", "name" : "TDAP" },{ "id" : "18", "name" : "ZOSTER" },{ "id" : "19", "name" : "Never Active" },{ "id" : "20", "name" : "Inactive" },{ "id" : "21", "name" : "Active" },{ "id" : "22", "name" : "COVID-19    " }]
            var htmlvaccine = "<option value='' selected='selected' > Select Vaccine</option>";
            $("#vaccine_e").html(htmlvaccine);
            $.each(year_vaccine, function(key, value) {
               var htmlvaccine = "<option value='"+value.name + "'>"+value.name + "</option>";
               $("#vaccine_e").append(htmlvaccine);
            });
        }

    });*/
  </script>
  <script>
    function get_vaccinesschedule(vaccination){
        $.ajax({
         type: "POST",
         url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_vaccinesschedule'); ?>",
         data:'vaccination='+vaccination+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
         success:
            function(data){
               var schedule_data  = JSON.parse(data);
               var array_length = data.length;
            //alert(typeof(obj));
            autocomplete(document.getElementById("schedule"), schedule_data,array_length);
               /*$("#schedule").empty();
               var html = "<option value='' selected='selected' > Select Schedule</option>";
                $("#schedule").html(html);
               if (schedule_data.length === 0) {
                    var  html = '<div><strong>Schedule Not Found.</strong></div>';
                    $("#schedule").append(html);
               }else{
                    $.each(schedule_data, function(key, value) {
                       var html = "<option value='"+value.schedule_name + "'>"+value.schedule_name + "</option>";
                       $("#schedule").append(html);
                    });

               }*/
               get_vaccines_vaccine(vaccination)
            }
        });
    }
    function get_vaccines_vaccine(vaccination){
        $.ajax({
         type: "POST",
         url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_vaccines_vaccine'); ?>",
         data:'vaccination='+vaccination+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
         success:
            function(data){
               var vaccine_data  = JSON.parse(data);
               var array_length = data.length;
                //alert(typeof(obj));
                autocomplete(document.getElementById("vaccine"), vaccine_data,array_length);
               /*$("#vaccine").empty();
               var html = "<option value='' selected='selected' > Select Vaccine</option>";
                $("#vaccine").html(html);
               if (vaccine_data.length === 0) {
                    var  html = '<div><strong>Schedule Not Found.</strong></div>';
                    $("#vaccine").append(html);
               }else{
                    $.each(vaccine_data, function(key, value) {
                       var html = "<option value='"+value.vaccine_name + "'>"+value.vaccine_name + "</option>";
                       $("#vaccine").append(html);
                    });

               }*/
            }
        });
    }

    function get_edit_vaccinesschedule(vaccination,schedule="",vaccine=""){
        $.ajax({
         type: "POST",
         url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_vaccinesschedule'); ?>",
         data:'vaccination='+vaccination+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
         success:
            function(data){
                var schedule_data  = JSON.parse(data);
                var array_length = data.length;
                autocomplete(document.getElementById("schedule_e"), schedule_data,array_length);
                $("#schedule_e").val(schedule);
               /*var schedule_data  = JSON.parse(data);
               $("#schedule_e").empty();
               var html = "<option value='' selected='selected' > Select Schedule</option>";
                $("#schedule_e").html(html);
               if (schedule_data.length === 0) {
                    var  html = '<div><strong>Schedule Not Found.</strong></div>';
                    $("#schedule_e").append(html);
               }else{
                    $("#schedule_e").val(schedule).trigger('change');
                    $.each(schedule_data, function(key, value) {
                       var html = "<option value='"+value.schedule_name + "'>"+value.schedule_name + "</option>";
                       $("#schedule_e").append(html);

                    });
                    $('#schedule_e  option[value="'+schedule+'"]').prop("selected", true);
                }*/
               get_edit_vaccines_vaccine(vaccination,vaccine);
            }
        });
    }
    function get_edit_vaccines_vaccine(vaccination,vaccine=""){
        $.ajax({
         type: "POST",
         url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_vaccines_vaccine'); ?>",
         data:'vaccination='+vaccination+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
         success:
            function(data){
               var vaccine_data  = JSON.parse(data);
               var array_length = data.length;
               autocomplete(document.getElementById("vaccine_e"), vaccine_data,array_length);
                $("#vaccine_e").val(vaccine);
              /* $("#vaccine_e").empty();
               var html = "<option value='' selected='selected' > Select Vaccine</option>";
                $("#vaccine_e").html(html);
               if (vaccine_data.length === 0) {
                    var  html = '<div><strong>Schedule Not Found.</strong></div>';
                    $("#vaccine").append(html);
               }else{
                    $("#vaccine_e").val(vaccine).trigger('change');
                    $.each(vaccine_data, function(key, value) {
                       var html = "<option value='"+value.vaccine_name + "'>"+value.vaccine_name + "</option>";
                       $("#vaccine_e").append(html);

                    });
                    $('#vaccine_e  option[value="'+vaccine+'"]').prop("selected", true);
                }*/
            }
        });
    }

    /*function get_update_Vaccines(patient_ID){
         $.ajax({
            type: "POST",
            url: "<?php //echo base_url('health_report/get_update_Vaccines'); ?>",
            data:'patient_name='+patient_ID+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
            success:
                function(data){
                    var myArray = jQuery.parseJSON(data);
                    //console.log(myArray.vaccines);
                    //console.log(myArray.schedule);
                    //console.log(myArray.vaccine);
                    $(".patient_ID").val(myArray.patient_id);

                    $("#Addselect_vaccination_e").val(myArray.vaccines).trigger('change');
                    $('#Addselect_vaccination_e  option[value="'+myArray.vaccines+'"]').prop("selected", true);
                    get_edit_vaccinesschedule(myArray.vaccines,myArray.schedule,myArray.vaccine);
                    get_edit_vaccines_vaccine(myArray.vaccines,myArray.vaccine);
                    $("#immunizationscvx_code_vaccines_e").val(myArray.cvxcode).trigger('change');
                    $('#immunizationscvx_code_vaccines_e  option[value="'+myArray.cvxcode+'"]').prop("selected", true);
                    $("#vaccines_e_ID").val(myArray.id);
                }
        });
    }*/

  </script>

  <script>
    $(document).ready(function () {
      $('.sigPad').signaturePad();
        $("#hospital-record-edit").on('hidden.bs.modal', function(){
            get_vitalsigns();
        });
        $("#hospital-record").on('hidden.bs.modal', function(){
            get_vitalsigns();
        });
    });

  </script>
  <script>
    const realFileBtn = document.getElementById("real-file");
    const customBtn = document.getElementById("custom-button");
    const customTxt = document.getElementById("custom-text");
    customBtn.addEventListener("click", function () {
      realFileBtn.click();
    });
    realFileBtn.addEventListener("change", function () {
        if (realFileBtn.value) {
            customTxt.innerHTML = realFileBtn.value.match(
              /[\/\\]([\w\d\s\.\-\(\)]+)$/
            )[1];

        }else {
           customTxt.innerHTML = "No file chosen, yet.";
        }
    });

  </script>

  <script>

    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
       });
    });

  </script>
<script type="text/javascript">






















function set_valueof_printname(){
    var printname =   $("#printname").val();
    $(".typed").empty();
    $(".typed").html(printname);
    $(".singnature_data").empty();
    $(".singnature_data").val(printname);

}






// function check_patient(){
// 	var patient_Value = $("#search-patient").val();
// 	if(patient_Value != ""){
// 		$(".addhospital_record").removeAttr("disabled");
//         $('#hospital-record').modal('toggle');
// 		$(".Patient_errormsg").empty();
// 		$("#search-patient").css("border-color","#ccc");
// 	}else{
// 		$(".Patient_errormsg").html("Please Select Patient").css({"color": "red", "margin-left": "15px"});
//         setTimeout(function(){ $(".Patient_errormsg").hide("slow"); }, 10000);
// 		$("#search-patient").css("border-color","red");
// 		$(".addhospital_record").attr("disabled","disabled");
// 	}
// }

$("#Tabselect-vaccination").on("change", function(){
    var patient_ID  = '<?php echo $_SESSION['user_id']; ?>';
    var vacciness   = $("#Tabselect-vaccination").val();
    if (patient_ID == "") {
        $(".Patient_errormsg").html("Please Select Patient").css({"color": "red", "margin-left": "15px"});
        setTimeout(function(){ $(".Patient_errormsg").hide("slow"); }, 10000);
        $("#search-patient").css("border-color","red");
        $(".addhospital_record").attr("disabled","disabled");
    }else{
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_patient/health_record/health_report/get_immunizations_listing') ?>",
            data:'vacciness='+vacciness+'&patient_ID='+patient_ID+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            dataType: "html",
            cache:false,
            success:
                function(data){
                    $(".immunizations_tbdata").empty();
                    $(".immunizations_tbdata").html(data);
                }
       });
    }
});

// $(document).ready(function(){
//     var patientid = "<?php //echo $_SESSION['user_id']; ?>";
//     $.ajax({
//         type: "POST",
//         url: "<?php //echo base_url('dashboard_patient/health_record/health_report/get_patient_info') ?>",
//         data:'patient_ID='+patientid+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
//         dataType: "html",
//         cache:false,
//         success:
//         function(data){
//             var data = JSON.parse(data)
//
//             if(jQuery.isEmptyObject(data)){
//
//             }else {
// 	            var patient_name = data.fname+" "+data.lname;
// 	          //  get_patient_profile(patientid,patient_name);
// 	           // get_vitalsigns(patientid);
// 	        }
//         }
//     });
// });
</script>
<script type="text/javascript">
    $(document).ready(function(){
      $.ajax({
             url: BASE_URL+"dashboard_patient/health_record/Health_report/graph",
             data: 'test=1',
             success: function(msg){

              var myObj = JSON.parse(msg);
//var f = parseInt(myObj.tem);
               var tem=myObj.tem;
               var label=myObj.date;
               var h=myObj.h;
               var bl=myObj.bl;
               var rp=myObj.rp;
               var ox=myObj.ox;
               var height=myObj.height;
               var weight=myObj.weight;
               var bmi=myObj.bmi;
               var pain=myObj.pain;
               var smoking_status=myObj.smoking_status;
               var head_circumference=myObj.head_circumference;
               var glucose_by_glucometer=myObj.glucose_by_glucometer;

               graph(label,tem,h,bl,rp,ox,height,weight,bmi,pain,smoking_status,head_circumference,glucose_by_glucometer);

             }});

        if($("#defaultCheck1_e").is(':checked')){
            $('#sign_e').removeAttr("disabled");
            $('#sign_e').val("PRN");
            $('#sign_e').attr("disabled","disabled");
        }else if (!$(this).is(':checked')) {
            $('#sign_e').val("");
            $('#sign_e').removeAttr("disabled");
            $('#sign_e').attr("disabled","disabled");
        }
    });
    $('#defaultCheck1').change(function() {
        if($(this).is(':checked')){
            $('#sign').removeAttr("disabled");
            $('#sign').val("PRN");
            $('#sign').attr("disabled","disabled");
        }else if (!$(this).is(':checked')) {
            $('#sign').val("");
            $('#sign').removeAttr("disabled");
            //$('#sign').attr("disabled","disabled");
        }

    });
</script>
