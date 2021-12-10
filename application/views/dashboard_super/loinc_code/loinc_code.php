<style type="text/css">
    ul.tsc_pagination li a
{
border:solid 1px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
padding:6px 9px 6px 9px;
}
ul.tsc_pagination li
{
padding-bottom:1px;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
color:#FFFFFF;
box-shadow:0px 1px #EDEDED;
-moz-box-shadow:0px 1px #EDEDED;
-webkit-box-shadow:0px 1px #EDEDED;
}
ul.tsc_pagination
{
margin:4px 0;
padding:0px;
height:100%;
overflow:hidden;
font:12px 'Tahoma';
list-style-type:none;
}
ul.tsc_pagination li
{
float:left;
margin:0px;
padding:0px;
margin-left:5px;
}
ul.tsc_pagination li a
{
color:black;
display:block;
text-decoration:none;
padding:7px 10px 7px 10px;
}
ul.tsc_pagination li a img
{
border:none;
}
ul.tsc_pagination li a
{
color:#150aec;
border-color:#150aec;
background:#F8FCFF;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
text-shadow:0px 1px #150aec;
border-color:#150aec;
background:#150aec !important;
color: #fff;
background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
}
ul.tsc_pagination li a:hover, ul.tsc_pagination li a:active {
    text-shadow: 0px 1px #150aec;
    border-color: #150aec;
    background: #150aec !important;
    color: #fff;
    background: -moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
    background: -webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));

}
ul.tsc_pagination .active a {
text-shadow: 0px 1px #150aec;
    border-color: #150aec;
    background: #150aec !important;
    color: #fff;
}

</style>
<style>
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

.admin-td-div {
margin-right: 0px;
}
.table-admin  thead {
background: #e8e8e8;
color: #404040;
}
/*.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
padding: 8px !important;
}*/
table img {
width: 50px;
text-align: left;
height: 50px;
object-fit: contain;
border-radius: 50%
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
            <a href="<?php echo base_url("dashboard_super/loinc_code/loinc_code/create") ?>">
              <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                <span class="fa fa-user"></span>
                &nbsp;&nbsp;Add Loinc Code</span>
              </button>
            </a>
          </td>
          <td width="15%">
            <a href="<?php echo base_url("dashboard_super/loinc_code/loinc_code/upload_loniccode") ?>">
              <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                <span class="fa fa-user"></span>
                &nbsp;&nbsp;Upload Loinc Code</span>
              </button>
            </a>
          </td>
          <td width="15%">
            <?php $isadmin = $this->session->userdata('isadmin'); if($isadmin=='1'){ ?>
            <ul style="display:flex;list-style-type:none;">
                <li>
                <a href="<?php echo base_url().'dashboard_super/admin/admin/admin_report'; ?>">
                  <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                    <span class="fa fa-file-pdf-o"></span>
                    &nbsp;&nbsp;PDF</span>
                  </button>
                </a>
              </li>
              <li>
              <a href="<?php echo base_url().'dashboard_super/admin/admin/download_excel'; ?>">
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
            <div style="position: absolute; /*left: 1em; top: 0;*/ padding-top: 7px;" > <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search" aria-hidden="true"  style="margin-left: 1px;position:relative;left:25px;"></span>
            </div>
            <input onkeyup="adminsearch()" id="admin_searchid"  style="padding-left: 3em; padding-right: 3em; width: 100%; height: 100%; padding-bottom: 4px; padding-top: 8px; border: 1px solid #f7f8f9;" maxlength="100" class="form-control"  placeholder="" title=""  >

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
      <table class="table table-admin tableBlock">
        <thead>
          <tr>
			<th>Id</th>
            <th>Loinc Code</th>
            <th width="12%" class="text-center">Status</th>
            <th width="12%" class="text-center">Action</th>
          </tr>
        </thead>

        <tbody id="adminadd">
          <?php          
          	if (!empty($loinc_code)) { 
                    $sl = 1; 
                foreach ($loinc_code as $value) {
            ?>
		          	<tr style="border-bottom: 1px solid #ddd;" class="hovertr">

						<td><span class="text-primary"><?php echo $value->loinc_code_id; ?></span></td>
						<td><span class="text-primary"><?php echo $value->loinc_code; ?></span></td>
						<td><select class="btn btn-default dropdown-toggle" onchange="call('<?php echo $value->loinc_code_id; ?>',this.options[this.selectedIndex].value)">
		  					<option value="1" <?php echo (($value->status==1)?'Selected':''); ?>>Active</option>
		  					<option value="0" <?php echo (($value->status==0)?'Selected':''); ?>>Inactive</option>
		   					</select>
		   				</td>

						<td>
							<div class="btn-group" style="float: right;display: flex;">
		    
		                      <a  href="<?php echo base_url("dashboard_super/loinc_code/loinc_code/edit/$value->loinc_code_id") ?>" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>
		                      <a href="<?php echo base_url("dashboard_super/loinc_code/loinc_code/delete/$value->loinc_code_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?> ') "> <i class="fa fa-trash"></i></a>
		                    </div>
						</td>           
		            </tr>
				<?php $sl++; 
                    }
                }
                ?>
        </tbody>
      </table>
      <div id="pagination">
        <ul style="float:right;" class="tsc_pagination"><?php echo $links; ?></ul>
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
<div class="modal fade" id="admininfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<form action="" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

</button>
 <h4 class="modal-title" id="myModalLabel">Admin Detail</h4>

</div>
<div class="modal-body" style="max-height: 556px;height: 500px;">
  <div class="row">
  <div class="col-12 col-md-12 form-group">
    <label>	Name :</label>
    <span id="fullname"></span>
  </div>

  <div class="col-12 col-md-12 form-group">
   <label>Email :</label>
   <?php //print_r($_SESSION); ?>
   <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
   <span id="email"></span>

 </div>
 <div class="col-12 col-md-12 form-group">
  <label>Office Phone :</label>
  <?php //print_r($_SESSION); ?>
  <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
  <span id="phone"></span>

</div>
<div class="col-12 col-md-12 form-group">
 <label>Mobile :</label>
 <?php //print_r($_SESSION); ?>
 <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
 <span id="mobile"></span>

</div>
 <div class="col-12 col-md-12 form-group">
  <label>Sex :</label>
  <?php //print_r($_SESSION); ?>
  <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
  <span id="sex"></span>

 </div>

 <div class="col-12 col-md-12 form-group">
  <label>Hospital Name :</label>
  <span id="hospitalname"></span>

 </div>
  <?php /*<div class="col-12 col-md-12 form-group">
  <label>Role :</label>
  <?php //print_r($_SESSION); ?>
  <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
  <span id="role"></span>

 </div>
 */ ?>
 <div class="col-12 col-md-12 form-group">
  <label>Features :</label>
  <?php //print_r($_SESSION); ?>
  <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
  <span id="features"></span>

 </div>
  <!-- <div class="col-12 col-md-12 form-group">
   <label>Admin Access  :</label>
   <span id="admin_access"></span>
 </div> -->
 <div class="col-12  col-md-12 form-group">
   <label>DOB :</label>
   <span id="dobs"></span>
 </div>
 <div class="col-12 col-md-12 form-group">
   <label>Address	:</label>
   <span id="contactinfo"></span>
 </div>
  <div class="col-12 col-md-12 form-group">
   <label>City :</label>
   <span id="city"></span>
 </div>
  <div class="col-12 col-md-12 form-group">
   <label>State :</label>
   <span id="state"></span>
 </div>
  <div class="col-12 col-md-12 form-group">
   <label>Country :</label>
   <span id="country"></span>
 </div>
   <div class="col-12 col-md-12 form-group">
   <label>Zip Code :</label>
   <span id="zipcode"></span>
 </div>

   <div class="col-12 col-md-12 form-group">
   <label>Join Date	:</label>
   <span id="joindate"></span>

 </div>

 <div class="col-12 col-md-12 form-group">
 <label>Status	:</label>
 <span id="status"></span>

 </div>

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

  var changeStatus =  confirm('Are you sure?');
  if(changeStatus){
      $.ajax({
           url:'<?=base_url()?>dashboard_super/loinc_code/loinc_code/changestatus',
           data:'id='+id+'&value='+value,
           success: function(msg){

				var v='';
				if(value =='1'){
				v="Active";
				}else{
				v="Inactive";
				}
				$("#h").text("loinc code status has been "+v);
					//   alert(msg);
					$('#active').modal('toggle');
  
			}
     });
  }
   setTimeout(function() {
        window.location="<?=base_url()?>dashboard_super/loinc_code/loinc_code";
    }, 3000);
}

</script>
