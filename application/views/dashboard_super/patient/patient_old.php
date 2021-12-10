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
</style>
<div class="clearfix"></div>
<div class="col-lg-12 white-box" style="width: 100%;margin-right: 2%;min-height: 850px;">
  <section class="box">
    <table class="table" style="border-bottom: 0.5px solid #c6c4c1;">
      <tbody>
        <tr>
          <td width="15%">
            <a href="<?php echo base_url("dashboard_doctor/patient/patient/create") ?>">
              <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                <span class="fa fa-user"></span>
                &nbsp;&nbsp;New Patient</span>
              </button>
            </a>
          </td>
          <td width="15%">
            <?php $isadmin = $this->session->userdata('isadmin'); if($isadmin=='1'){ ?>
            <ul style="display:flex;list-style-type:none;">
                <li>
                <a href="<?php echo base_url().'dashboard_doctor/patient/patient/patient_report'; ?>">
                  <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                    <span class="fa fa-file-pdf-o"></span>
                    &nbsp;&nbsp;PDF</span>
                  </button>
                </a>
              </li>
              <li>
              <a href="<?php echo base_url().'dashboard_doctor/patient/patient/download_excel'; ?>">
                <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                  <span class="fa fa-file-excel-o"></span>
                  &nbsp;&nbsp;Excel</span>
                </button>
              </a>
            </li>
            </ul>
          <?php } ?>
          </td>
          <td>
            <div style="position: absolute; /*left: 1em; top: 0;*/ padding-top: 7px;" > <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search" aria-hidden="true"  style="margin-left: 1px;"></span>
            </div>
            <input onkeyup="patientsearch()" id="patient_searchid"  style="padding-left: 3em; padding-right: 3em; width: 100%; height: 100%; padding-bottom: 4px; padding-top: 8px; border: 1px solid #f7f8f9;" maxlength="100" class="form-control"  placeholder="Search Patient by first name, mobile, e:email, birth date and patient id" title="Search Patient by first name, mobile, e:email, birth date and patient id"  >

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
            <th>First</th>
            <th width="10%" >Last</th>
            <th class="text-center">DOB</th>
            <th width="30%" class="text-center">Contact Info</th>
            <th>Join Date</th>
            <th width="12%" class="text-center">Status</th>
            <th width="12%" class="text-center">Action</th>

            <!-- <th class="text-center">Action</th> -->
            <!-- <th style="float: right;">Action</th> -->
          </tr>
        </thead>
        <tbody id="padd">
          <?php if (!empty($patients)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($patients as $patient) { ?>
          <tr style="border-bottom: 1px solid #ddd;" class="hovertr">
            <td>
              <img  src="<?php echo base_url()."assets/images/patient/2017-01-16/p5.png"; ?>">
            <div class="kpull-left patient-td-div"></div>
            </td>
            <td>
              <div class="kpull-left"><div class="word-break"><span data-id="<?php echo $patient->patient_id; ?>" class="fa fa-circle" data-toggle="tooltip" title="Patient online"></span><span class="text-primary"> <?php echo $patient->fname; ?>  <br><a href="#" class="color-black"> <?php echo $patient->patient_id; ?> </a> </span>
              </div></div>
            </td>
<td><span class="text-primary"><?php echo $patient->lname; ?></span></td>
<td><?php echo date('d/m/Y',strtotime($patient->date_of_birth)); ?> <br><?php echo $patient->sex; ?></td>
<td><?php echo $patient->address1.' '.$patient->address2.' '.$patient->city.' '.$patient->state.' '.$patient->zip; ?> <br>
    <span class="light-grey">M</span><?php echo $patient->mobile; ?>
    <span class="light-grey ml-15">H</span><?php echo $patient->phone; ?>
</td>
<td><?php echo date('d/m/Y',strtotime($patient->create_date)); ?></td>
<td><span style="color:green" class="btn btn-default"><?php echo ($patient->status=='1')?'Active':'Inactive'; ?></span></td>
<td><a href="#" onclick="patient_info('<?php echo $patient->patient_id; ?>')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a></td>
            <!-- <td class="patient-td">
              <div class="kpull-left patient-td-div"><img class="patient-image" src="<?php //echo ($patient->picture!='')?base_url().$patient->picture:base_url()."assets/images/patient/2017-01-16/p5.png"; ?>"></div>
              <div class="kpull-left"><div class="word-break"><span data-id="<?php //echo $patient->patient_id; ?>" class="fa fa-circle" data-toggle="tooltip" title="Patient online"></span><span class="text-primary"> <?php //echo $patient->fname; ?>  <?php //echo $patient->lname; ?> <br> <?php //echo $patient->patient_id; ?> </span>
              </div></div>
            </td>
            <td>+91<?php //echo $patient->mobile; ?><br><?php //echo $patient->email; ?>
            </td>
            <td><?php //echo $patient->address; ?></td>
            <td>
              <?php //echo ($patient->sex=='Male')?'M':"F"; ?> <?php //echo date('d/m/Y',strtotime($patient->date_of_birth)); ?></td>
              <td><span style="color:green" class="btn btn-default"><?php //echo ($patient->status=='1')?'Active':'Inactive'; ?></span></td>
              <td><div class="btn-group" style="float: right;">
                      <a href="<?php //echo base_url("dashboard_doctor/patient/patient/edit/$patient->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                      <!-- <a href="<?php //echo base_url("patient/delete/$patient->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php //echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> -->
<!-- </div>
                                </td> -->
          </tr>


          <?php $sl++; ?>
                            <?php } ?>
                        <?php } ?>
        </tbody>
      </table>

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
          <label>	First :</label>
          <span id="first"></span>
        </div>
        <div class="col-12 col-md-12 form-group">
          <label>	Middle :</label>
          <span id="mname"></span>
        </div>
         <div class="col-12 col-md-12 form-group">
          <label>Last :</label>
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
         <span id="dob"></span>
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
  <label>Gestitation :</label>
  <?php //print_r($_SESSION); ?>
  <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
  <span id="gestitation"></span>

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
 <label>Guarantor Address2 :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_address2"></span>

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
 <label>Guarantor Zip :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="guarantor_zip"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>guarantor Date of Birth :</label>
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
 <label>Kin First Name :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="kin_fname"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Kin Middle Name :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="kin_mname"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Kin Last Name :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="kin_lname"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Relation To Patient :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="relation_to_patient"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Kin Phone :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="kin_phone"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Kin Phone Type :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="kin_phone_type"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Kin address:</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="kin_address_1"></span>

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
