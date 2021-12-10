<style type="text/css">
/* .active .modal-content {
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
} */

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
            <a href="<?php echo base_url("dashboard_doctor/doctor/doctor/create") ?>">
              <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                <span class="fa fa-user"></span>
                &nbsp;&nbsp;New Medical Provider</span>
              </button>
            </a>
          </td>
          <td width="15%">

        <ul style="display:flex;list-style-type:none;">
            <li>
            <a href="<?php echo base_url().'dashboard_doctor/doctor/doctor/doctor_report'; ?>">
              <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                <span class="fa fa-file-pdf-o"></span>
                &nbsp;&nbsp;PDF</span>
              </button>
            </a>
          </li>
          <li>

          <a href="<?php echo base_url().'dashboard_doctor/doctor/doctor/download_excel'; ?>">
            <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
              <span class="fa fa-file-excel-o"></span>
              &nbsp;&nbsp;Excel</span>
            </button>
          </a>
        </li>
        </ul>
          </td>
          <td>
            <div style="position: absolute; /*left: 1em; top: 0;*/ padding-top: 7px;" > <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search" aria-hidden="true"  style="margin-left: 1px;"></span>
            </div>
            <input id="doctor_searchid" onkeyup="doctorsearch()" style="padding-left: 3em; padding-right: 3em; width: 100%; height: 100%; padding-bottom: 4px; padding-top: 8px; border: 1px solid #f7f8f9;" maxlength="100" class="form-control" placeholder="Search Medical Provider by first name, last name, e:email and birth date" title="Search Medical Provider by first name, last name, e:email and birth date" >
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
            <!-- <th>Medical Provider Name/KPiD</th>
            <th>Phone/Email</th>
            <th>Address</th>
            <th>Birth Date</th>
            <th>Role</th>
            <th>Status</th>

            <th style="float: right;">Action</th> -->
            <th width="5%" class="text-center"></th>
            <th>First</th>
            <th width="10%" >Last</th>
            <th class="text-center">DOB</th>
            <th width="30%" class="text-center">Contact Info</th>
            <th>Role</th>
            <th width="12%" class="text-center">Status</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody id='dadd'>
          <?php if (!empty($doctors)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($doctors as $doctor) { ?>






          <tr style="border-bottom: 1px solid #ddd;" class="hovertr">
            <td>
              <img  src="<?php echo ($doctor->picture!='')?base_url().$doctor->picture:base_url()."assets/images/patient/2017-01-16/p5.png"; ?>">
            <!-- <div class="kpull-left patient-td-div"></div> -->
            </td>
            <td>
              <div class="kpull-left"><div class="word-break"> <span data-id="" class="fa fa-circle" data-toggle="tooltip" title="Patient online"> </span> <span class="text-primary"> <?php echo $doctor->firstname; ?>   </span>
              </div></div>
            </td>
            <td><span class="text-primary"><?php echo $doctor->lastname; ?></span></td>

<td><?php echo date('d/m/Y',strtotime($doctor->date_of_birth)); ?> <br><?php echo $doctor->sex; ?></td>
<td><?php echo $doctor->address; ?> <br>
    <span class="light-grey">M</span><?php echo $doctor->mobile; ?>
    <span class="light-grey ml-15">H</span><?php echo $doctor->phone; ?>
</td>
<td>
   <?php $role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
   if(isset($role)){
     echo $role->name;
   }

   ?>
</td>

            <!-- <td>
              <div class="kpull-left patient-td-div"><img class="patient-image" src="<?php //echo ($doctor->picture!='')?base_url().$doctor->picture:base_url()."assets/images/patient/2017-01-16/p5.png"; ?>"></div>
              <div class="kpull-left"><div class="word-break"><span data-id="3243685" class="fa fa-circle" data-toggle="tooltip" title="Patient online"></span><span class="text-primary"><?php //echo $doctor->firstname; ?> <?php //echo $doctor->lastname; ?> <br></span>
              </div></div>
            </td>
            <td>+91 <?php //echo $doctor->mobile; ?><br><?php //echo $doctor->email; ?>
            </td>
            <td><?php //echo $doctor->address; ?></td>
            <td><?php //echo ($doctor->sex=='Male')?'M':"F"; ?> <?php //echo date('d/m/Y',strtotime($doctor->date_of_birth)); ?></td>
            <td>
               <?php //$role = $this->db->select("*")->from("role")->where("r_id",$doctor->role_id)->get()->row();
              // if(isset($role)){
                // echo $role->name;
          //     }

               ?>
            </td> -->
            <td><div class="btn-group">
            <select class="btn btn-default dropdown-toggle" onchange="call('<?php echo $doctor->user_id; ?>',this.options[this.selectedIndex].value)">
              <option value="1" <?php echo (($doctor->status==1)?'Selected':''); ?>>Active</option>
              <option value="0" <?php echo (($doctor->status==0)?'Selected':''); ?>>Inactive</option>
               </select>
</div></td><!--<span style="color:green" class="btn btn-default"><?php //echo ($doctor->status=='1')?'Active':'Inactive'; ?></span>-->
            <td class="pt-15"><div class="btn-group" style="float: right;display: flex;">
                                <a  href="<?php echo base_url("dashboard_doctor/doctor/doctor/edit/$doctor->user_id") ?>" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo base_url("dashboard_doctor/doctor/doctor/delete/$doctor->user_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?> ') "> <i class="fa fa-trash"></i></a>
                              </div></td>
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
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
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
<script>

function call(id,value)
{
 //alert(value);
  $.ajax({

       url:'<?=base_url()?>dashboard_doctor/doctor/doctor/changestatus',
       data:'id='+id+'&value='+value,
       success: function(msg){
         var v='';
         if(value =='1'){
           v="Active";
         }else{
           v="Inactive";
         }
         $("#h").text("Medical Provider status has been "+v);
      //   alert(msg);
$('#active').modal('toggle');
//alert(msg);
/**if(value='yes'){
  $("#y"+id).prop("checked", true);
}else{
  $("#n"+id).prop("checked", true);
}**/
//var ts ="<?php //echo $this->session->set_flashdata('message','status changes') ?>";


setTimeout(function() {
    //  $(".alert").css("display","none");
    window.location="<?=base_url()?>dashboard_doctor/doctor/doctor";
}, 3000);


     }

 });
}
</script>
