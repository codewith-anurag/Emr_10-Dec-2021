<style type="text/css">
  .page-sidebar {
      height: auto;
      width: 260px;
      position: fixed;
      padding: 0px;
      background-color: #ffffff;
      margin-top: 60px;
      overflow: hidden;
      box-shadow: 0 0 0px 0 rgba(33,33,33,.2) !important;
      }

   .sidebar-li{
        border-bottom: 2px #eee solid;
        }
        #main-menu-wrapper li a:hover {
        background-color: #d5f3f2;
        border-left: 4px solid #4d9cf8;
        color: #00b3ac;
        }
         #main-menu-wrapper li a:hover {
              color: #150aec;
               font-weight: 800;
        }
        .text-primary:hover {
                color: #150aec;
               font-weight: 800;
        }
        .table>tbody>tr>td:hover {
       font-weight: 600;
      }
      #main-menu-wrapper li a {
        color: #150aec;
      }
      .text-primary {
color: #150aec;
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
.table>tbody>tr>td:hover {
font-weight: 600;
}
.delete .modal-content {
border-radius: 15px;
}
.delete .modal-title  {
color: #150aec;
font-size: 18px;
font-weight: 700;
}
.delete .modal-body p {
color: red;
font-weight: 700;
}
.delete .modal-body {
padding: 20px;
}
.text-primary .color-black {
color: #848484;
font-size: 15px;
}
.light-grey {
color: #a9a9a9;
padding-right: 10px;
font-weight: 600;
}
.ml-15 {
margin-left: 15px;
}
.pt-15 {
padding-top: 15px !important;
}
.p-0 {
padding: 0px;
}
.border-right {
border-right: 1px solid #ccc;
}
section header {
  border:none !important;
  border-bottom: 1px solid #ccc !important;
      margin-bottom: 10px;
background: #efefef !important;
min-height: 0px;
padding-left: 5px !important;
}
.insurance {
  position: relative;
left: 13px;
top: 18px;
}
.pos-icon {
  display: flex;
position: absolute;
right: 15px;
bottom: 13px;
}
.w-100 {
width: 100%;
}
.imp-red {
color: red;
}
.page-sidebar.chat_shift .wraplist li .title, .page-sidebar.collapseit .wraplist li .title, .page-sidebar.chat_shift .wraplist li .arrow, .page-sidebar.collapseit .wraplist li .arrow {
display: block;
position: absolute;
left: 0;
top: 38px;
font-size: 13px;
margin-left: 5px;
max-width: 139px;
word-break: break-word;
width: 70px;
white-space: break-spaces;
line-height: 17px;
}
.page-sidebar.chat_shift .wraplist li:hover .title, .page-sidebar.collapseit .wraplist li:hover .title {
top: 30px;
}
.page-sidebar.chat_shift #main-menu-wrapper .wraplist li a, .page-sidebar.collapseit #main-menu-wrapper .wraplist li a {
padding-left: 0px;
margin-bottom: 33px;
}
.page-sidebar.chat_shift .wraplist li:hover .title, .page-sidebar.collapseit .wraplist li:hover .title {
top: 40px;
}
.page-sidebar {
width: 180px;
}
#main-content {
  margin-left: 165px;
}
.insurance-table thead {
color: #000;
background: #ccc;
font-size: 12px;
}
.m-0 {
margin: 0px;
}
.bg-light-grey {
  background: #eee;
padding: 10px;
}
.border-bottom {
border-bottom: 1px solid #ccc;

}
.down-arrow {
  text-align: right;
    position: relative;
    right: 10px;
    top: 13px;
    font-size: 18px;
    color: #2d2d2d;
}
</style>
<div class="clearfix"></div>

<div class="col-lg-12 p-0">
  <?php echo form_open_multipart('dashboard_patient/insurance/insurance/create','class="form-inner"') ?>

      <?php echo form_hidden('id',$insurance->insurance_u_id) ?>
                <div class="col-lg-12 col-xs-12 p-0">
                    <section>
                      <div class="row  ml-10 mr-10">
                         <div class="col-12 col-md-4 form-group">
                                              <?php
                                                  $patient_id = $this->session->userdata('patient_id');

                                               $p_result = $this->db->select("*")->from("patient")->where("status",'1')->where('patient_id',$patient_id)->get()->result();
                  //echo $this->db->last_query();
                                              ?>
                                              <label>PATIENT ID<span class="imp-red">*</span></label>
                                              <!-- <input type="text" name="payer_name" class="form-control text-field" id="add1" placeholder="Search payer list"> -->
                                              <select class="form-control" name="patient_id">
                                                <?php if(count($p_result)>0){ ?>
                                                          <?php foreach ($p_result as $value){ ?>
                                                            <option value="<?php echo $value->patient_id; ?>" <?php echo ($value->patient_id==$insurance->patient_id)?'Selected':''; ?> ><?php echo $value->patient_id; ?></option>
                                                          <?php }; ?>

                                                  <?php }else{ ?>
                                                    <option value=" ">No data found!</option>
                                                <?php  } ?>
                                              </select>
                                              <!-- <i class="fa fa-search pos-icon"></i> -->
                                            </div>
                                          </div>
                       <div class="row ml-10 mr-10 mt-30">
         <div class="col-12 ml-10">
                      <div class="form-check">
       <input class="form-check-input" type="radio"  name="status" id="exampleRadios1" value="Active" <?php echo ($insurance->status=='Active')?'checked':''; ?>>
        <label class="form-check-label" for="exampleRadios1">
        Active
       </label>

       <input class="form-check-input ml-10" type="radio" name="status" id="exampleRadios2"    value="Inactive" <?php echo ($insurance->status=='Inactive')?'checked':''; ?>>
        <label class="form-check-label" for="exampleRadios2">
        Inactive
       </label>
      </div>
    </div>
  </div>
  <div class="row ml-10 mr-10">
    <div class="col-12 col-md-6 form-group">
                            <label>PAYER NAME<span class="imp-red">*</span></label>
                            <input type="text" name="payer_name" value="<?php echo $insurance->payer_name; ?>" class="form-control text-field" id="add1" placeholder="Payer Name">

                          </div>
                           <div class="col-12 col-md-6 form-group">
                            <label>PLAN NAME AND TYPE<span class="imp-red">*</span></label>
                            <input type="text" name="plan_name_and_type" value="<?php echo $insurance->plan_name_and_type; ?>" class="form-control text-field" id="add1" placeholder="Plan Name And Type">

                          </div>
                          <div class="col-12">
                            <span>ELIGIBILITY NOT SUPPORTED</span>
                            <i class="fa fa-exclamation-circle color-orange"></i>
                          </div>

  </div>
  <div class="row  ml-10 mr-10">
  <div class="col-12 col-md-5 form-group">
                        <label>ORDER OF BENEFITS<span class="imp-red">*</span></label>
                            <select class="form-control" name="order_of_benefits" id="order_of_benefits" placeholder="order of benefits" >
                                                <option <?php echo ($insurance->order_of_benefits=='Primary')?'Selected':''; ?> value="Primary">Primary</option>
                                                <option <?php echo ($insurance->order_of_benefits=='Secondary')?'Selected':''; ?> value="Secondary">Secondary</option>
                                                <option  <?php echo ($insurance->order_of_benefits=='Tertiary')?'Selected':''; ?> value="Tertiary">Tertiary</option>
                                                <option <?php echo ($insurance->order_of_benefits=='Unknown')?'Selected':''; ?> value="Unknown">Unknown/None</option>
                                 </select>
                          </div>
                            <div class="col-12 col-md-7 mt-30">
                              <div class="form-check">
<input class="form-check-input" name="workers_compensation" type="checkbox" <?php echo ($insurance->workers_compensation=='WORKERS COMPENSATION')?'checked':''; ?> value="WORKERS COMPENSATION" id="defaultCheck3">
<label class="form-check-label ml-10" for="defaultCheck3">
WORKER'S COMPENSATION</label>
</div>
                          </div>
  </div>
  <div class="row  ml-10 mr-10">
 <div class="col-12 col-md-6 form-group">
                            <label>INSURANCE ID<span class="imp-red">*</span></label>
                            <input type="text" name="insurance_id" value="<?php echo $insurance->insurance_id; ?>" class="form-control text-field" id="insuranceid" placeholder="Insurance ID">
                          </div>
                          <div class="col-12 col-md-6 form-group">
                            <label>GROUP ID</label>
                            <input type="text" name="group_id" value="<?php echo $insurance->group_id; ?>"  class="form-control text-field" id="groupid" placeholder="Group ID">
                          </div>
  </div>
  <div class="row  ml-10 mr-10">
     <div class="col-12 col-md-4 form-group">
                            <label>EFFECTIVE FROM<span class="imp-red">*</span></label>
                            <input type="date" onchange="effective()" name="effective_from" value="<?php echo $insurance->effective_from; ?>" class="form-control text-field" id="efdate" placeholder="effective from">
                          </div>
                           <div class="col-12 col-md-4 form-group">
                            <label>EFFECTIVE TO</label>
                            <input type="date" onchange="effective()" name="effective_to" value="<?php echo $insurance->effective_to; ?>" class="form-control text-field" id="etdate" placeholder="effective to">
                            <div id="effectivetime" style="display:none;"> Effective To Date Should Not Be Less Than Effective From Date</div>
                          </div>
                          <div class="col-12 col-md-4 form-group">
                        <label>RELATION TO INSURED</label>
                                <select class="form-control" name="relation_to_insured" id="insured">
                                                <option <?php echo ($insurance->relation_to_insured=='Child')?'Selected':''; ?> value="Child">Child</option>
                                                <option <?php echo ($insurance->relation_to_insured=='Other')?'Selected':''; ?> value="Other">Other</option>
                                                <option <?php echo ($insurance->relation_to_insured=='Self')?'Selected':''; ?> value="Self">Self</option>
                                                <option <?php echo ($insurance->relation_to_insured=='Spouse')?'Selected':''; ?> value="Spouse">Spouse</option>
                                 </select>
                          </div>
  </div>
  <div class="row  ml-10 mr-10">
     <div class="col-12 col-md-4 form-group">
                        <label>COPAY TYPE</label>
                            <select class="form-control" name="copay_type" id="copay">
                                                <option <?php echo ($insurance->copay_type=='Fixed')?'Selected':''; ?> value="Fixed">Fixed</option>
                                                <option <?php echo ($insurance->copay_type=='Percent')?'Selected':''; ?> value="Percent">Percent</option>
                                 </select>
                          </div>


    <div class="col-12 col-md-4 form-group">
                            <label>COPAY AMOUNT<span class="imp-red">*</span></label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="copay_amount" value="<?php echo $insurance->copay_amount; ?>" class="form-control text-field" id="amount" placeholder="$">
                          </div>
                           <div class="col-12 col-md-4 form-group">
                            <label>CLAIM NUMBER</label>
                            <input type="text" name="claim_number" value="<?php echo $insurance->claim_number; ?>" class="form-control text-field" id="cliam" placeholder="Claim number">
                          </div>
                        </div>

                        <div class="row ml-10 mr-10">
                          <div class="col-12 form-group">
                            <label>NOTES</label>
                            <textarea class="w-100" id="notes" value="<?php echo $insurance->notes; ?>" name="notes" rows="5" placeholder="Notes"></textarea>
                          </div>
                        </div>
                        <div class="row ml-10 mb-10">
                          <div class="col-12 col-md-7 form-group">
                            <label>ELIGIBILITY</label>
                            <select class="form-control" name="eligiblility" id="eligiblility">
                              <option value="">Select</option>
                                                <option <?php echo ($insurance->eligiblility=='Yes')?'Selected':''; ?> value="Yes">Yes</option>
                                                <option <?php echo ($insurance->eligiblility=='No')?'Selected':''; ?> value="No">No</option>
                                            </select>
                          </div>
                        </div>
                      <header class="panel_header">
                            <h2 class="title pull-left" id="form-title">Employer information</h2>
                            <div class="actions panel_actions pull-right">
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                            </div>
                        </header>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <label>EMPLOYER NAME</label>
                            <input type="text" value="<?php echo $insurance->employer_name; ?>" name="employer_name" class="form-control text-field" id="employname" placeholder="Employer Name">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <label>EMPLOYER ADDRESS</label>
                            <input type="text" name="employer_address1" value="<?php echo $insurance->employer_address1; ?>" class="form-control text-field" id="add1" placeholder="Address 1">
                          </div>
                          <div class="col-12 col-md-6 form-group">
                            <label></label>
                            <input type="text" name="employer_address2" value="<?php echo $insurance->employer_address2; ?>" class="form-control text-field" id="add2" placeholder="Address 2">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10 mb-10">
                          <div class="col-12 col-md-6 form-group">
                            <input type="text" name="city" value="<?php echo $insurance->city; ?>" class="form-control text-field" id="city" placeholder="City">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <input type="text" name="state" value="<?php echo $insurance->state; ?>" class="form-control text-field" id="state" placeholder="State">
                          </div>
                           <div class="col-12 col-md-2 form-group">
                            <input type="number" onkeydown="return event.keyCode !== 69" name="zip" value="<?php echo $insurance->zip; ?>" class="form-control text-field" id="zip" placeholder="Zip">
                          </div>
                        </div>
                         <header class="panel_header">
                            <h2 class="title pull-left"  id="form-title">Subscriber information</h2>
                            <div class="actions panel_actions pull-right">
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                            </div>
                        </header>
                        <div class="row ml-10 mr-10">
                          <div class="col-12">
                            <a href="#">Copy from guarantor information</a>
                          </div>
                        </div>
                        <div class="row ml-10 mr-10">
                           <div class="col-12 col-md-4 form-group">
                            <label>SUBSCRIBER'S FIRST NAME</label>
                            <input type="text" name="subscribers_fname" value="<?php echo $insurance->subscribers_fname; ?>" class="form-control text-field" id="fname" placeholder="Subscriber First Name">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label></label>
                            <input type="text" name="subscribers_mname" value="<?php echo $insurance->subscribers_mname; ?>" class="form-control text-field" id="mname" placeholder="Middle Initial">
                          </div>
                           <div class="col-12 col-md-4 form-group">
                            <label>SUBSCRIBER'S LAST NAME</label>
                            <input type="text" name="subscribers_lname" value="<?php echo $insurance->subscribers_lname; ?>" class="form-control text-field" id="lname" placeholder="Subscriber Last Name">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-4 form-group">
                            <label>SUBSCRIBER DATE OF BIRTH</label>
                            <input type="date" name="subscribers_dob" value="<?php echo $insurance->subscribers_dob; ?>" class="form-control text-field" id="date">
                          </div>
                               <div class="col-12 col-md-4 form-group">
                        <label>SEX</label>
                            <select class="form-control"  name="subscribers_sex" id="subscribers_sex">
                                                <option <?php echo ($insurance->subscribers_sex=='Male')?'Selected':''; ?> value="Male">Male</option>
                                                <option <?php echo ($insurance->subscribers_sex=='Female')?'Selected':''; ?> value="Female">Female</option>
                                                <option <?php echo ($insurance->subscribers_sex=='Other')?'Selected':''; ?> value="Other">Other</option>
                                 </select>
                          </div>
      <div class="col-12 col-md-4 form-group">
                            <label>SUBSCRIBER SOCIAL SECURITY NUMBER</label>
                            <input type="number" value="<?php echo $insurance->subscribers_ssn; ?>" name="subscribers_ssn" class="form-control text-field" id="subscribers_ssn">
                          </div>

                        </div>
                        <div class="row ml-10 mr-10">
                           <div class="col-12 col-md-6 form-group">
                            <label>SUBSCRIBER ADDRESS</label>
                            <input type="text" value="<?php echo $insurance->subscribers_address1; ?>" name="subscribers_address1" class="form-control text-field" id="add1" placeholder="Address 1">
                          </div>
                          <div class="col-12 col-md-6 form-group">
                            <label></label>
                            <input type="text" value="<?php echo $insurance->subscribers_address2; ?>" name="subscribers_address2" class="form-control text-field" id="add2" placeholder="Address 2">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10 mb-10">
                          <div class="col-12 col-md-6 form-group">
                            <input type="text" name="subscribers_city" value="<?php echo $insurance->subscribers_city; ?>" class="form-control text-field" id="city" placeholder="City">
                          </div>
                           <div class="col-12 col-md-4 form-group">
                            <input type="text" name="subscribers_state" value="<?php echo $insurance->subscribers_state; ?>" class="form-control text-field" id="state" placeholder="State">
                          </div>
                           <div class="col-12 col-md-2 form-group">
                            <input type="number" onkeydown="return event.keyCode !== 69" name="subscribers_zip" value="<?php echo $insurance->subscribers_zip; ?>" class="form-control text-field" id="zip" placeholder="Zip">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10 mb-10 border-bottom">
                          <div class="col-12 col-md-4 form-group">
                            <label>SUBSCRIBER PRIMARY PHONE NUMBER</label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="subscribers_primary_number" value="<?php echo $insurance->subscribers_primary_number; ?>" class="form-control text-field" id="phonenum">
                          </div>
                          <div class="col-12 col-md-2 form-group">
                            <label></label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="subscribers_primary_ext" value="<?php echo $insurance->subscribers_primary_ext; ?>" class="form-control text-field" id="ext" placeholder="Ext">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label>SECONDARY PHONE NUMBER</label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="subscribers_secondary_number" value="<?php echo $insurance->subscribers_secondary_number; ?>" class="form-control text-field" id="phonenum">
                          </div>
                          <div class="col-12 col-md-2 form-group">
                            <label></label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="subscribers_secondary_ext" value="<?php echo $insurance->subscribers_secondary_ext; ?>" class="form-control text-field" id="ext" placeholder="Ext">
                          </div>
                        </div>
                        <div class="text-center mb-10">
                         <button type="submit" class="btn btn-default" >Save</button>
        <button type="button" class="btn btn-default">Close</button>
      </div>
                    </section>
                </div>
              </form>
</div>
<script>
    function goBack() {
      window.history.back();
    }
</script>
