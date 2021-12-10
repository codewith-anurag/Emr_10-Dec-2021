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

            <th>Payer</th>
            <th width="10%" >Type</th>
            <th class="text-center">Insurance Id</th>
            <th class="text-center">Effective From</th>
            <th>Effective To</th>
            <th width="12%" class="text-center">Copay</th>
            <th class="text-center">Eligibility</th>
            <th class="text-center">Status</th>
<th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($insurance)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($insurance as $patient) { ?>
          <tr style="border-bottom: 1px solid #ddd;" class="hovertr">

            <td>
              <div class="kpull-left"><div class="word-break"> <span data-id="<?php echo $patient->patient_id; ?>" class="fa fa-circle" data-toggle="tooltip" title="Patient online"> </span> <span class="text-primary"> <?php echo $patient->payer_name; ?></span>
              </div></div>
            </td>
            <!-- <td>
              <div class="kpull-left patient-td-div"><img class="patient-image" src="<?php //echo ($patient->picture!='')?base_url().$patient->picture:base_url()."assets/images/patient/2017-01-16/p5.png"; ?>"></div>
              <div class="kpull-left"><div class="word-break"><span data-id="<?php //echo $patient->patient_id; ?>" class="fa fa-circle" data-toggle="tooltip" title="Patient online"></span><span class="text-primary"> <?php //echo $patient->firstname; ?>  <?php //echo $patient->lastname; ?> <br> <?php //echo $patient->patient_id; ?> </span>
              </div></div>
            </td> -->

<td><span class="text-primary"><?php echo $patient->plan_name_and_type; ?></span></td>
<td><?php echo $patient->insurance_id; ?></td>
<td><?php echo $patient->effective_from; ?></td>
<td><?php echo $patient->effective_to; ?></td>
<td><?php echo $patient->copay_type; ?></td>
            <!-- <td>+91<?php //echo $patient->mobile; ?><br><?php //echo $patient->email; ?>
            </td>
            <td><?php //echo $patient->address; ?></td>
            <td>
              <?php //echo ($patient->sex=='Male')?'M':"F"; ?> <?php //echo date('d/m/Y',strtotime($patient->date_of_birth)); ?></td> -->
              <td><?php echo $patient->eligiblility; ?></td><!--<span style="color:green" class="btn btn-default"><?php //echo ($patient->status=='1')?'Active':'Inactive'; ?></span>-->
              <td class="pt-15"> <?php echo $patient->status; ?>
                                </td>
                                <td class="pt-15"><div class="btn-group" style="float: right;display: flex;">
                                        <a href="<?php echo base_url("dashboard_patient/insurance/insurance/edit/$patient->insurance_u_id") ?>" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url("dashboard_patient/insurance/insurance/delete/$patient->insurance_u_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a>
                  </div>
                                                  </td>

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
