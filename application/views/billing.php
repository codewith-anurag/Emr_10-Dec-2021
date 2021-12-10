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

table img {
width: 85%;
text-align: center;
}
table td {
    border-right: 1px solid #d6d6d6;
}
.billingDTable tbody td a { color:#150aec; }

table thead th {
border-right: 1px solid #d6d6d6 ;
border-color: #d6d6d6 !important;
}
.dropdown-menu.patient {
    position: relative;
    top: 0%;
    left: 0;
}
.text-left {text-align: left;}
div.dataTables_wrapper div.dataTables_paginate {float: right;}
.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus {
        background-color: #150aec;
    border-color: #150aec;
}
div.dataTables_wrapper div.dataTables_info {    color: #150aec;}
.pagination a:hover:not(.active) {
    background-color: #fff;
    color: #150aec;
}
.pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover {
    color: #150aec;
    border-color: #150aec;
}

</style>
<div class="clearfix"></div>
<div class="col-lg-12 white-box" style="width: 100%;margin-right: 2%;min-height: 850px;">
  <section class="box">
    <table class="table" style="border-bottom: 0.5px solid #c6c4c1;">
      <tbody>
        <tr>
       <!--    <td width="15%">
            <a href="">
              <button id="create" class="btn btn-default" style="margin-right: 11px;">
                <span class="fa fa-plus"></span>
                &nbsp;&nbsp;Add </span>
              </button>
            </a>
          </td> -->
                  <td>
            <div style="position: absolute;/*right:calc(59% - 28%)*/; /*left: 1em; top: 0;*/ padding-top: 9px;margin-left: 15px;" > <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search" aria-hidden="true"  style="margin-left: 1px;"></span>
            </div>
            <input id="patient_searchid" onkeyup="get_patientlist_search()" style="padding-left: 3em; padding-right: 3em; width: 100%; height: 100%; padding-bottom: 4px; padding-top: 8px; border: 1px solid #f7f8f9;" maxlength="100" class="form-control" placeholder="search Patient Name" title="search Patient Name" >
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
      <table class="table billingDTable">
        <thead>
          <tr>
            <th class="text-left">Patient Name</th>
			<th width="15%" class="text-left">Paid Amount</th>
            <th width="15%" class="text-left">Unpaid Amount</th>
            <th width="15%" class="text-left">Total</th>
            <!-- <th width="15%" class="text-left">Date</th> -->
            <!-- <th width="15%" class="text-center">Action</th> -->
          </tr>
        </thead>
        <tbody id="padd">
        <?php 
        foreach ($patient as  $patientvalue) {    
         $Paidtotal = 0;   
         $unpaid_total = 0;     
        ?>
          <tr class="hovertr">            
             <td class="text-left"><a href="<?php echo base_url('item_master/invoice/'.$patientvalue->id)?>"><?php echo $patientvalue->fname." ".$patientvalue->lname ?></a></td>
                <?php 
                    $paid_subscribe = $this->db->get_where("subscribe",array('patient_id'=>$patientvalue->id,"status"=>1 ))->result();                   
                    if(!empty($paid_subscribe)){
                        foreach ($paid_subscribe as  $paid_subscribe_value) {      
                            $Paidtotal = $paid_subscribe_value->amount + $Paidtotal;
                            $created_date = date("d-m-Y h:i:s",strtotime($paid_subscribe_value->created_date));
                        }
                    }

                    $unpaid_subscribe = $this->db->get_where("subscribe",array('patient_id'=>$patientvalue->id,"status"=>0 ))->result();
                    if(!empty($unpaid_subscribe)){
                        foreach ($unpaid_subscribe as  $unpaid_subscribe_value) {      
                            $unpaid_total = $unpaid_subscribe_value->amount + $unpaid_total;
                            $created_date = date("d-m-Y h:i:s",strtotime($unpaid_subscribe_value->created_date));
                        }
                    }

                    $Final_total  = $Paidtotal + $unpaid_total;
                 ?>
            <td class="text-left"><a href="<?php echo base_url('item_master/invoice/'.$patientvalue->id)?>"><?php echo $Paidtotal ?></a></td>            
            <td class="text-left"><a href="<?php echo base_url('item_master/invoice/'.$patientvalue->id)?>"><?php echo $unpaid_total ?></a></td>
            <td class="text-left"><a href="<?php echo base_url('item_master/invoice/'.$patientvalue->id)?>"><?php echo $Final_total; ?></a></td>
			<!-- <td class="text-left"><?php //echo $created_date; ?></td> -->
               <!-- <td class="pt-15">
                    <div class="btn-group" style="float: right;display: flex;">
                      <a href="<?php// echo base_url('item_master/invoice/'.$patientvalue->id)?>" class="btn btn-xs icon-box btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a>
                      <a href="" class="btn btn-xs icon-box btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>
                      <a href="<?php //echo base_url('item_master/delete_billing/'.$patientvalue->id) ?>" class="btn btn-xs btn-danger icon-box" style="margin-right:10px;border:1px solid #f00 !important;"><i class="fa fa-trash"></i></a>
                    </div>
                </td> -->
          </tr>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready( function () {
    $('.billingDTable').DataTable({
        "aDataSort": [[ "date", "desc" ]]
    });
} );
function call(id,value)
{
 //alert(value);
   var changeStatus =  confirm('Are you sure?');
    if(changeStatus){
    $.ajax({

         url:'<?=base_url()?>item_master/changestatus',
         data:'id='+id+'&value='+value,
         success: function(msg){

           $("#h").text("Item master status has been "+value);
        //   alert(msg);
        $('#active').modal('toggle');
       }

   });
  }
      setTimeout(function() {
      //  $(".alert").css("display","none");
      window.location="<?=base_url()?>item_master";
  }, 3000);

}

//patient page search
        function get_patientlist_search() {
            var BASE_URL = '<?php echo base_url(); ?>';
            var vals = $("#patient_searchid").val();
            var doc_val_check = $.trim(vals);

            $("#padd").empty();
            $.ajax({
                url: BASE_URL + "item_master/get_patient_list",
                data: 'p_id=' + doc_val_check,
                success: function(msg) {
                    $("#padd").empty();
                    var myObj = JSON.parse(msg);
                    console.log(myObj);
                    if (myObj.length > 0) {
                        $("#padd").append(myObj);
                    } else {
                        $("#padd").empty();
                        txt = '<tr><td colspan="9" align="center">No data found!</td></tr>';
                        $("#padd").append(txt);
                    }
                }
            });
        }
</script>
