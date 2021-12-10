<style type="text/css">

.timepicker-picker table td {

    border: none !important;

}

/*.timepicker .timepicker-picker .bootstrap-datetimepicker-widget td span {

    width: 30px !important;

    height: 0px !important;

    line-height: 0px !important;

}

*/

 .bootstrap-datetimepicker-widget td span {

    display: inline-block;

     width: 30px !important;

    height: 0px !important;

    line-height: 0px !important;

    margin: 2px 1.5px;

    cursor: pointer;

    border-radius: 4px;

}

.timepicker-picker  .datepicker table tr td.active.active:hover, .timepicker-picker  .datepicker table tr td.active.active, .datepicker table tr td.active.highlighted.active, .datepicker table tr td.active.highlighted:active, .datepicker table tr td.active:active {

     background: #4698e3 !important;

    color: #fff !important;

    border-color: #4698e3 !important;

}



.timepicker-picker .btn, .btn.btn-default {

    background: #4698e3;

    color: #fff;

}

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



</style>

<div class="clearfix"></div>

<div class="col-lg-12 white-box" style="width: 100%;margin-right: 2%;min-height: 850px;">

  <section class="box">

    <table class="table" style="border-bottom: 0.5px solid #c6c4c1;">

      <tbody>

        <tr>

          

          <td width="15%">

           

            <div style="display: flex;">

                <a  onclick="return medicalprovider_report_pdf()">

                  <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;margin-top: 5px;">

                    <span class="fa fa-file-pdf-o"></span>

                    &nbsp;&nbsp;PDF</span>

                  </button>

                </a>
                <button id="new"  onclick="return medicalprovider_report_excel()" class="btn btn-default dropdown-toggle" style="width: 90%;margin-right: 11px;margin-top: 5px;" data-toggle="dropdown" data-hover="dropdown">

                  <span class="fa fa-file-excel-o"></span>

                  &nbsp;&nbsp;Excel</span>

                </button>
                   
             </div>

          </td>

          

           <td>

                    

                

               <div class="col-lg-3">

                   <div class="form-group">

                       <!--  <label>From Date</label> -->

                        <input type="text" name="from_date" class="form-control text-field" id="medical_provider_report_from_datetime" placeholder="From Date">          

                   </div>

               </div>

                <div class="col-lg-3">

                   <div class="form-group">

                        <!-- <label>To Date</label> -->

                        <input type="text" name="to_date" class="form-control text-field" id="medical_provider_report_to_datetime" placeholder="To Date">          

                   </div>

               </div>

               <div class="col-lg-3">

                   <div class="form-group">                        

                        <button id="new" class="btn btn-default" onclick="return medicalprovider_report_search();"><i class="fa fa-search"></i></button>    

                        <button id="new" class="btn btn-default" onclick="return reset_search();">Clear</button>         

                   </div>

               </div>

                

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

      <table class="table table-patient" style="display: table;">

        <thead>

          <tr>

            

            

            <th width="30%">Name</th>                        

            <th width="30%" class="text-center">Email</th>

            <th width="10%" class="text-center">Office Phone</th>

            <th width="10%" class="text-center">Home Phone</th>

            <th  width="10%" class="text-center">Status</th>            

          </tr>

        </thead>

        <tbody id='dadd'>

          <?php if (!empty($medicalprovider)) { ?>

              

            <?php foreach ($medicalprovider as $doctor) { ?>



          <tr style="border-bottom: 1px solid #ddd;" class="hovertr">

               

            <td onclick="doctor_info('<?php echo $doctor->user_id; ?>')">

              <div class="kpull-left"><div class="word-break">  <span class="text-primary"> <?php echo $doctor->firstname." ".$doctor->lastname; ?>   </span>

              </div></div>

            </td>

            <td onclick="doctor_info('<?php echo $doctor->user_id; ?>')">

              <div class="kpull-left text-primary"><div class="word-break"> <span class="text-primary"> <?php echo $doctor->email; ?>   </span>

              </div></div>

            </td>

            <td onclick="doctor_info('<?php echo $doctor->user_id; ?>')">

              <div class="kpull-left"><div class="word-break"> <span class="text-primary"> <?php echo $doctor->phone; ?>   </span>

              </div></div>

            </td>

            <td onclick="doctor_info('<?php echo $doctor->user_id; ?>')">

              <div class="kpull-left"><div class="word-break"> <span class="text-primary"> <?php echo $doctor->mobile; ?>   </span>

              </div></div>

            </td>

            <td onclick="doctor_info('<?php echo $doctor->user_id; ?>')">

              <div class="kpull-left"><div class="word-break"> <span class="text-primary"> <?php echo ($doctor->status==1) ? 'Active' :'Inactive'; ?>   </span>

              </div></div>

            </td>

            

          </tr>



          

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

<div class="modal-body" style="max-height: 556px;height: 500px;overflow-x: auto;">

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

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

<script>    

 $(document).ready(function() {

        //$('.table_medicalprovider_report').DataTable();

        $('#medical_provider_report_from_datetime').datepicker({

            format: "yyyy-mm-dd",

             maxDate: new Date

        });

        $('#medical_provider_report_to_datetime').datepicker({

            format: "yyyy-mm-dd",

             maxDate: new Date

        });

    });





    function medicalprovider_report_search(){

       var BASE_URL = '<?php echo base_url(); ?>';       

       var from_date = $("#medical_provider_report_from_datetime").val();

       var to_date = $("#medical_provider_report_to_datetime").val();

       

          $("#dadd").empty();

           $.ajax({

                type: "GET",

                url: BASE_URL+"medicalprovider_report/medicalprovider_report_search",

                data: 'from_date='+from_date+'&to_date='+to_date,

               success: function(msg){

                    $("#dadd").empty();

                   if(msg!=''){

                        var myObj = JSON.parse(msg);

                        $("#dadd").append(myObj);

                    }else{

                        $("#dadd").empty();

                        txt= '<tr><td>No data found</td></tr>';

                        $("#dadd").append(txt);

                    }

               }

           });

        

    }



    function medicalprovider_report_pdf(){        

        

        if ($("#medical_provider_report_from_datetime").val()!="") {

            var from_date = $("#medical_provider_report_from_datetime").val();

        }else{

            var from_date = "";

        }

        if ($("#medical_provider_report_to_datetime").val()!="") {

            var to_date = $("#medical_provider_report_to_datetime").val();

        }else{

            var to_date = "";

        }

        



        window.location.href='<?php echo base_url(); ?>'+'medicalprovider_report/medicalprovider_report_pdf/'+from_date+'/'+to_date



    }
    function medicalprovider_report_excel(){        

        

        if ($("#medical_provider_report_from_datetime").val()!="") {

            var from_date = $("#medical_provider_report_from_datetime").val();

        }else{

            var from_date = "";

        }

        if ($("#medical_provider_report_to_datetime").val()!="") {

            var to_date = $("#medical_provider_report_to_datetime").val();

        }else{

            var to_date = "";

        }

        



        window.location.href='<?php echo base_url(); ?>'+'medicalprovider_report/download_excel/'+from_date+'/'+to_date



    }

    



    



    function reset_search(){

        window.location.href = window.location.href;

    }



</script>

