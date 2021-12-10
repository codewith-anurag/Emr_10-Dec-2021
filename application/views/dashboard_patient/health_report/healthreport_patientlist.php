<style type="text/css">
.active .modal-content {
  border-radius: 16px;
  box-shadow: 2px 14px 16px -3px #5a5a5a;
}
.active .modal-body {
  border-radius: 15px;
  padding: 20px;
}
.active .modal-body h4 {
  padding-top: 20px;
  font-weight: 700;
  color: #150aec;
}
.active .modal-body span {
  padding-top: 10px;
}



</style>
<style type="text/css">
.active .modal-content {
border-radius: 16px;
box-shadow: 2px 14px 16px -3px #5a5a5a;
}
.active .modal-body {
border-radius: 15px;
padding: 20px;
}
.active .modal-body h4 {
padding-top: 20px;
font-weight: 700;
color: #150aec;
}
.active .modal-body span {
padding-top: 10px;
}

.patient-td-div {
margin-right: 0px;
}
.table-patient  thead {
background: #e8e8e8;
color: #404040;
}
.table-patient{
  display: table;
}
/*.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
padding: 8px !important;
}*/
table img {
width: 85%;
text-align: center;
}
table td {
border-right: 1px solid #d6d6d6;
}
table thead th {
border-right: 1px solid #d6d6d6 ;
border-color: #d6d6d6 !important;
}
.dropdown-menu.patient {
    position: relative;
    top: 0%;
    left: 0;
}
.card-box {
	    background: #fff;

    border: 1px solid #bdbdbd;
    border-radius: 10px;
    box-shadow: 1px 9px 10px -7px #ccc;
}
.mb-10 {
	margin-bottom: 10px;
}
.card-box .card-box-body {
	background-color: #f6f6f6;
	    padding: 15px;
	        border-top-left-radius: 11px;
	        border-top-right-radius: 11px;
}
.card-box .card-bottom {
	padding: 15px;
	border-top:1px solid #ccc;
}
</style>
<div class="clearfix"></div>
<div class="col-lg-12 white-box" style="width: 100%;margin-right: 2%;min-height: 850px;">
  <section class="box">
    <table class="table" style="border-bottom: 0.5px solid #c6c4c1;">
      <tbody>
        <tr>
         <!--  <td width="15%">
            <a href="<?php echo base_url("patient/create") ?>">
              <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                <span class="fa fa-user"></span>
                &nbsp;&nbsp;New Patientss</span>
              </button>
            </a>
          </td> -->
          <td width="15%">
            <!-- <ul style="display:flex;list-style-type:none;">
                <li>
                <a href="<?php //echo base_url().'patient/patient_report'; ?>">
                  <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                    <span class="fa fa-file-pdf-o"></span>
                    &nbsp;&nbsp;PDF</span>
                  </button>
                </a>
              </li>
              <li>
              <a href="<?php //echo base_url().'patient/download_excel'; ?>">
                <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                  <span class="fa fa-file-excel-o"></span>
                  &nbsp;&nbsp;Excel</span>
                </button>
              </a>
            </li>
            <li>
            <a href="<?php //echo base_url().'insurance/download_excel'; ?>">
              <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                <span class="fa fa-file-excel-o"></span>
                &nbsp;&nbsp;Excel</span>
              </button>
            </a>
          </li>
            </ul> -->
            <div style="display: flex;">
                <a href="<?php echo base_url().'patient/patient_report'; ?>">
                  <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                    <span class="fa fa-file-pdf-o"></span>
                    &nbsp;&nbsp;PDF</span>
                  </button>
                </a>
                   <div class="dropdown">
                <button id="new" class="btn btn-default dropdown-toggle" style="width: 90%;margin-right: 11px;" data-toggle="dropdown" data-hover="dropdown">
                  <span class="fa fa-file-excel-o"></span>
                  &nbsp;&nbsp;Excel</span>
                </button>
                <ul class="dropdown-menu patient">
    <!-- <li><a href="<?php //echo base_url().'patient/download_excel'; ?>"> -->
                  <button id="new" onclick="window.location.href='<?php echo base_url()."patient/download_excel"; ?>'" class="btn btn-default dropdown-toggle" style="width: 90%;margin-right: 11px;" data-toggle="dropdown" data-hover="dropdown">
                  <span class="fa fa-file-excel-o"></span>
                  &nbsp;&nbsp;Demographic</span>
                </button>
              <!-- </a> -->
              </li>
    <!-- <li><a href="<?php //echo base_url().'insurance/download_excel'; ?>"> -->
                 <button onclick="window.location.href='<?php echo base_url()."insurance/download_excel"; ?>'"   id="new" class="btn btn-default dropdown-toggle" style="width: 90%;margin-right: 11px;" data-toggle="dropdown" data-hover="dropdown">
                  <span class="fa fa-file-excel-o"></span>
                  &nbsp;&nbsp;Insurance</span>
                </button>
              <!-- </a> -->
        </li>
  </ul>
</div>
             </div>
          </td>
          <td>
            <div style="position: absolute; right: calc(100% - 18%);; /*left: 1em; top: 0;*/ padding-top: 7px;" > <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search" aria-hidden="true"  style="margin-left: 1px;"></span>
            </div>
            <input onkeyup="patientsearch()" id="patient_searchid" style="padding-left: 3em; padding-right: 3em; width: 100%; height: 100%; padding-bottom: 4px; padding-top: 8px; border: 1px solid #f7f8f9;" maxlength="100" class="form-control" placeholder="search by first name , last name , email and phone" title="search by first name , last name , email and phone" >
            <!-- <div style="position: absolute; right: 0em; top: 8px;width: 10px" onclick="$('#patientPartyName', list_patient.ele).focus()"> <span class="hover icon-md fa fa-ellipsis-v dropdown-toggle hidden-print" title="Show more options" style="/*float: right; text-decoration: none;*/ cursor: pointer; /*padding-top: 3px;*/ padding-top: 29px;margin-left: -20px;" data-toggle="dropdown"></span>
              <ul class="dropdown-menu dropdown-menu-right hidden-print" role="menu" aria-labelledby="menu1">
                <li id="new" role="presentation" style="padding-top: 7px;">
                  <a id="menu-alert" class="icon-color dropdown-li-text" role="menuitem" tabindex="1"> <span class="fa fa-user-plus"></span>
                    <span>&nbsp;&nbsp;New Patient</span>
                  </a>
                </li>
                <li id="new" role="presentation" class="divider"></li>
                <li id="recent" role="presentation">
                  <a class="icon-color dropdown-li-text" role="menuitem" tabindex="2" onclick="list_patient.recent()"> <span class="fa fa-clock-o"></span><span>&nbsp;&nbsp;Recent</span><a>
                </li>
                <li id="recent" role="presentation" class="divider"></li>
                <li id="export" role="presentation" class="hidden-doctor hidden-patient hidden-user hidden-xs hidden-sm">
                  <a class="icon-color dropdown-li-text" role="menuitem" tabindex="2" onclick="list_patient.exportToCsv()"><span class="fa fa-download"></span>
                    <span>&nbsp;&nbsp;Export</span>
                  </a>
                </li>
                <li id="import-ccd" role="presentation" class="divider hidden-patient hidden-doctor hidden-user hidden-xs hidden-sm"></li>
                <li class="dropdown dropdown-submenu hidden-patient hidden-doctor hidden-user">
                  <a class="icon-color dropdown-li-text" role="menuitem" tabindex="1" href="#" data-toggle="dropdown" style="text-indent:0.1em;"><span class="fa fa-upload"></span><span>&nbsp;&nbsp;Import</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a onclick="list_patient.importCsv('importListPatient')" class="icon-color" role="menuitem" tabindex="2"><span class="fa fa-file-excel-o"></span>&nbsp;&nbsp;Profile CSV</a>
                    </li>
                    <li id="import-csv" role="presentation" class="divider hidden-xs hidden-sm"></li>
                    <li class="hidden-xs hidden-sm"><a onclick="list_patient.import_ccd_final('no')" class="icon-color" role="menuitem" tabindex="2"><span class="fa fa-file"></span>&nbsp;&nbsp;CCD Import</a>
                    </li>
                  </ul>
                </li>
                <li id="export" role="presentation" class="divider hidden-doctor hidden-patient hidden-user"></li>
                <li role="presentation">
                  <a class="icon-color dropdown-li-text" role="menuitem" tabindex="2" onclick="list_patient.windowPrint();"> <span class="fa fa-print"></span>
                    <span>&nbsp;&nbsp;Print</span>
                  </a>
                </li>
                <li role="presentation" class="divider"></li>
                <li id="youtube-btn" class="tutorial-video" role="presentation" onclick="list_patient.showVideo('listPatient')">
                  <a class="icon-color dropdown-li-text" role="menuitem" tabindex="1"> <span class="icon-color fa fa-youtube"></span>
                    <span>&nbsp;&nbsp;Tutorial Video</span>
                  </a>
                </li>
                <li role="presentation" class="divider tutorial-video"></li>
                <li role="presentation" style="padding-bottom: 1em;">
                  <a id="help-btn" class="icon-color dropdown-li-text" role="menuitem" tabindex="2" onclick="hHelp.healthNeedHelp($('#need-help', list_patient.ele),'/health/help/page/patient/list_patient_needhelp.jsp', 'For List Patients')"> <span class="fa fa-question-circle-o" id="help-btn"></span>
                    <span id="help-btn">&nbsp;&nbsp;Help</span>
                  </a>
                </li>
              </ul>
            </div> -->
          </td>

        </tr>
      </tbody>
    </table>
    <style>
        .hovertr:hover{
           background-color: #d5f3f2;
        }
    </style>
    <div class="col-lg-12" style="min-height: 850px;">
       <table class="table table-patient">
        <thead>
          <tr>
            <th width="5%" class="text-center"></th>
            <th width="12%">First Name</th>
            <th width="12%">Last Name</th>
            <th class="text-center">DOB</th>
            <th class="text-center">Gender</th>
            <th width="15%" class="text-center">Contact Info</th>
            <th>Join Date</th>
            <th width="12%" class="text-center">Status</th>
            <th width="10%" class="text-center">Action</th>

          </tr>
        </thead>
        <tbody id="padd">
          <?php   if (!empty($patients)) { ?>
                  <?php $sl = 1; ?>
                  <?php foreach ($patients as $patient) { ?>
          <tr style="border-bottom: 1px solid #ddd;" class="hovertr" >
            <td onclick="patient_info('<?php echo $patient->patient_id; ?>')">
              <img style="width: 50px;  height: 50px;   border-radius: 50%;"  src="<?php echo ($patient->picture!='')?base_url().$patient->picture:base_url()."assets/images/patient/2017-01-16/p5.png"; ?>">

            </td>
            <td onclick="patient_info('<?php echo $patient->patient_id; ?>')">
              <div class="kpull-left"><div class="word-break"> <span data-id="<?php echo $patient->patient_id; ?>" class="fa fa-circle" data-toggle="tooltip" title="Patient online"> </span> <span class="text-primary"> <?php echo $patient->fname; ?>  <br> <a href="#" class="color-black">  </a> </span>
              </div></div>


<td onclick="patient_info('<?php echo $patient->patient_id; ?>')"><span class="text-primary"><?php echo $patient->lname; ?></span></td>
<td onclick="patient_info('<?php echo $patient->patient_id; ?>')"><?php echo date('d/m/Y',strtotime($patient->date_of_birth)); ?> </td><td onclick="patient_info('<?php echo $patient->patient_id; ?>')"><?php echo $patient->sex; ?></td>
<td onclick="patient_info('<?php echo $patient->patient_id; ?>')"><?php echo $patient->address1.' '.$patient->country.' '.$patient->city.' '.$patient->state.' '.$patient->zip; ?>
  <div style="display:flex;">
    <span class="light-grey" style="width:50%;">M : <label style="color:#000;font-weight:400;color:#5785e8;"><?php echo $patient->mobile; ?></label></span>
    <!-- <span class="light-grey ml-15" style="width:50%;">H : <label style="color:#000;font-weight:400;color:#5785e8;"><?php //echo $patient->phone; ?></label></span> -->
  </div>
</td>

<td onclick="patient_info('<?php echo $patient->patient_id; ?>')"><?php echo date('d/m/Y',strtotime($patient->create_date)); ?></td>

              <td><div class="btn-group">
                <?php echo (($patient->status==1)?'Active':'Inactive'); ?>
              <!-- <select class="btn btn-default form-control" onchange="call('<?php //echo $patient->patient_id; ?>',this.options[this.selectedIndex].value)">
                <option value="1" <?php //echo (($patient->status==1)?'Selected':''); ?>>Active</option>
                <option value="0" <?php //echo (($patient->status==0)?'Selected':''); ?>>Inactive</option>
                 </select> -->
</div></td>
              <td class="pt-15"><div class="btn-group" style="float: right;display: flex;">
                <a href="#" onclick="patient_info('<?php echo $patient->patient_id; ?>')" class="btn btn-xs icon-box" style="margin-right:10px;border-right:1px solid #ccc !important;"><i class="fa fa-eye"></i></a>
                <a href="<?php echo base_url('health_report/create/'.$patient->id); ?>" class="btn btn-xs icon-box" style="margin-right:10px; display: block;  margin: 0 auto;">Health Record</a>
                <a href="<?php echo base_url("patient/familymember/$patient->id") ?>" class="btn btn-xs icon-box" style="margin-right:10px;">Family Member</a>
              <!--   <div class="col-md-3" style="border-right:1px solid #ccc !important;">

                </div> -->
</div>
                                </td>
          </tr>


          <?php $sl++; ?>
                <?php } ?>
            <?php }else{ ?>
          <tr>
            <td colspan="9" align="center">no data found!</td>
          </tr>
<?php } ?>
        </tbody>
      </table>

		  
      </div>
    </div>
  </section>
</div>
<div class="clearfix"></div>
<div id="active" class="modal fade active" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="h"></h4>
        <!-- <span>Sahil sahil</span> -->
      </div>
    </div>

  </div>
</div>
<div class="modal fade" id="Patientinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
 <h4 class="modal-title" id="myModalLabel">Patient Detail</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
        <div class="row">
        <div class="col-12 col-md-12 form-group">
          <label>	First Name:</label>
          <span id="first"></span>
        </div>
        <div class="col-12 col-md-12 form-group">
          <label>	Middle Name:</label>
          <span id="mname"></span>
        </div>
         <div class="col-12 col-md-12 form-group">
          <label>Last Name:</label>
          <?php //print_r($_SESSION); ?>
          <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
          <span id="last"></span>

        </div>
        <div class="col-12 col-md-12 form-group">
         <label>Suffix :</label>
         <?php //print_r($_SESSION); ?>
         <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
         <span id="suffix"></span>

       </div>
       <div class="col-12 col-md-12 form-group">
        <label>Sex :</label>
        <?php //print_r($_SESSION); ?>
        <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
        <span id="sex"></span>

       </div>
       <div class="col-12 col-md-12 form-group">
        <label>Patient Id :</label>
        <?php //print_r($_SESSION); ?>
        <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
        <span id="patientid"></span>

       </div>
       <div class="col-12  col-md-12 form-group">
         <label>DOB :</label>
         <span id="dobs"></span>
       </div>
       <div class="col-12 col-md-12 form-group">
         <label>Contact Info	 :</label>
         <span id="contactinfo"></span>
       </div>
         <div class="col-12 col-md-12 form-group">
         <label>Join Date	:</label>
         <span id="joindate"></span>

       </div>

       <div class="col-12 col-md-12 form-group">
       <label>Status	:</label>
       <span id="status"></span>

       </div>
       <div class="col-12 col-md-12 form-group">
        <label>Second Last Name :</label>
        <?php //print_r($_SESSION); ?>
        <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
        <span id="secondlastname"></span>

      </div>
      <div class="col-12 col-md-12 form-group">
       <label>Previous First Name :</label>
       <?php //print_r($_SESSION); ?>
       <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
       <span id="previousfname"></span>

     </div>
     <div class="col-12 col-md-12 form-group">
      <label>Previous Middle Name :</label>
      <?php //print_r($_SESSION); ?>
      <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
      <span id="previousmname"></span>

    </div>
    <div class="col-12 col-md-12 form-group">
     <label>Previous Last Name :</label>
     <?php //print_r($_SESSION); ?>
     <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
     <span id="previouslname"></span>

   </div>
   <div class="col-12 col-md-12 form-group">
    <label>Date of Death :</label>
    <?php //print_r($_SESSION); ?>
    <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
    <span id="dod"></span>

  </div>
  <div class="col-12 col-md-12 form-group">
   <label>SSN :</label>
   <?php //print_r($_SESSION); ?>
   <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
   <span id="ssn"></span>

 </div>
 <div class="col-12 col-md-12 form-group">
  <label>Ethnicity :</label>
  <?php //print_r($_SESSION); ?>
  <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
  <span id="ethnicity_race"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Mobile :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="mobile"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Email :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="email"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Phone :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="phone"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Workphone :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="workphone"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Ext :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="ext"></span>

</div>

<div class="col-12 col-md-12 form-group">
 <label>Relationship To Guarantor :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="relationship_to_guarantor"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor First Name :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_fname"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor Middle Name :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_mname"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor last Name :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_lname"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor Address1 :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_address1"></span>

</div>

<div class="col-12 col-md-12 form-group">
 <label>Guarantor City :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_city"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor State :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_state"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor Country :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_country"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor Zip :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_zip"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor Date of Birth :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_dob"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor Sex :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_sex"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor SSN :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_ssn"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor Primary Phone :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_primary_phone"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor Primary Ext :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_primary_ext"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor Secondary Phone :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_secondary_phone"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Guarantor Secondary Ext :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_secondary_ext"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Primary Care First Name :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="primary_fname"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Primary Care Middle Name :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="primary_mname"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Primary Care Last Name :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="primary_lname"></span>

</div>
<!-- <div class="col-12 col-md-12 form-group">
 <label>Relation To Patient :</label> -->
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <!-- <span id="relation_to_patient"></span>

</div> -->
<div class="col-12 col-md-12 form-group">
 <label>Primary Care Phone :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="primary_phone"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Primary Care Phone Type :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="primary_phone_type"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Primary Care Address:</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="primary_address_1"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Patient Mother Name :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="patient_mother_name"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Immunization Registery Status :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="immunization_registery_status"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Immunization Effective Date :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="immunization_effective_date"></span>

</div>

        <!-- <div class="col-12 col-md-5 form-group pull-right">
          <label>ATTACHMENTS</label>
          <input type="file" id="myfile" name="file" multiple>
          <input type="hidden" name="<?php //echo $this->security->get_csrf_token_name();?>" value="<?php //echo $this->security->get_csrf_hash();?>">
      </div> -->
</div>
</div>
<div class="modal-footer">
<!-- <button type="submit" class="btn btn-default">Send Message</button> -->
<button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.reload()">Close</button>

</div>
</form>
</div>
</div>
</div>
<script>

function call(id,value)
{
 //alert(value);
  $.ajax({

       url:'<?=base_url()?>patient/changestatus',
       data:'id='+id+'&value='+value,
       success: function(msg){

         var v='';
         if(value =='1'){
           v="Active";
         }else{
           v="Inactive";
         }
         $("#h").text("Patient status has been "+v);
      //   alert(msg);
$('#active').modal('toggle');
        // alert(msg);
//$('#exampleModal').modal('toggle');
//alert(msg);
/**if(value='yes'){
  $("#y"+id).prop("checked", true);
}else{
  $("#n"+id).prop("checked", true);
}**/
setTimeout(function() {
    //  $(".alert").css("display","none");
    window.location="<?=base_url()?>patient/";
}, 3000);
//window.location="<?=base_url()?>patient/";
     }

 });
}
</script>
