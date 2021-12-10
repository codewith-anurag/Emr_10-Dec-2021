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
.modal-content h4 {
    color: #150aec;
    font-weight: 700;
}
.modal-content {
    border-radius: 15px !important;
}
.modal-body {
    padding: 15px;
    height: 350px;
    max-height: 500px;
    overflow-y: auto;
    overflow-x: hidden;
}
.down-arrow {
  text-align: right;
    position: relative;
    right: 10px;
    top: 13px;
    font-size: 18px;
    color: #2d2d2d;
}
.intl-tel-input {
    display: block !important;
}
</style>

<div class="clearfix"></div>
<div class="col-lg-12 p-0">
                <div class="col-lg-12 col-xs-12 p-0">
                    <section>
                        <header class="panel_header">
                          <?php if(isset($patient->id)){
                            ?>
                            <h2 class="title pull-left" id="form-title">Edit Patient Account</h2>
                          <?php }else{ ?>

                          <h2 class="title pull-left" id="form-title">Create Patient Account</h2>

                          <?php }
                          ?>

                        </header>
                        <?php echo form_open_multipart('dashboard_super/patient/patient/create/'.$admin_id,'class="form-inner"') ?>

                           <?php echo form_hidden('id',$patient->id); ?>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-2 form-group">
                            <label>PREFIX</label>
                            <select class="form-control" name="prefix" id="Prefix">
                                <option value="">Select Prefix</option>
                                <option <?php echo ($patient->prefix=='Mr.')?'Selected':''; ?> value="Mr.">Mr.</option>
                                <option value="Mrs." <?php echo ($patient->prefix=='Mrs.')?'Selected':''; ?> >Mrs.</option>
                                <option value="Ms." <?php echo ($patient->prefix=='Ms.')?'Selected':''; ?> >Ms.</option>
                         </select>
                            <!-- <input type="text" name="prefix" class="form-control text-field" value="<?php //echo $patient->prefix ?>" id="Prefix"> -->
                          </div>
                          <div class="col-12 col-md-3 form-group">
                            <label>First Name<span class="imp-red">*</span></label>
                            <input type="text" name="fname" class="form-control text-field" value="<?php echo $patient->fname ?>" id="fname" placeholder="First Name">
                          </div>
                          <div class="col-12 col-md-3 form-group">
                            <label>Middle Name</label>
                            <input type="text" name="mname" class="form-control text-field" id="mname" value="<?php echo $patient->mname ?>" placeholder="Middle Name(optional)">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label>Last Name<span class="imp-red">*</span></label>
                            <input type="text" name="lname" class="form-control text-field" id="lname" value="<?php echo $patient->lname ?>" placeholder="Last Name">
                          </div>
                        </div>
                               <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-2 form-group">
                            <label>SUFFIX</label>
                            <input type="text" name="suffix" class="form-control text-field" value="<?php echo $patient->suffix ?>" id="suffix">
                          </div>
                          <div class="col-12 col-md-3 form-group">
                            <label>SECOND LAST NAME</label>
                            <input type="text" name="secondlastname" class="form-control text-field"  value="<?php echo $patient->secondlastname ?>" id="secondlast">
                          </div>
                          <div class="col-12 col-md-2 form-group">
                            <label>PREVIOUS NAME</label>
                            <input type="text" name="previousfname" class="form-control text-field" value="<?php echo $patient->previousfname ?>" id="fname" placeholder="First Name">
                          </div>
                           <div class="col-12 col-md-3 form-group">
                            <label></label>
                            <input type="text" name="previousmname" class="form-control text-field" value="<?php echo $patient->previousmname ?>" id="mname" placeholder="Middle Name">
                          </div>
                           <div class="col-12 col-md-2 form-group">
                            <label></label>
                            <input type="text" name="previouslname" class="form-control text-field"  value="<?php echo $patient->previouslname ?>" id="lname" placeholder="Last Name">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10 mb-10">
                         <div class="col-12 col-md-2 form-group">
             <label>SEX<span class="imp-red">*</span></label>
              <select class="form-control" name="sex" id="sex">
                   <option value="">Select</option>
                  <option value="Male" <?php echo ($patient->sex=='Male')?'Selected':''; ?> >Male</option>
                  <option value="Female" <?php echo ($patient->sex=='Female')?'Selected':''; ?> >Female</option>
                  <option value="Other" <?php echo ($patient->sex=='Other')?'Selected':''; ?> >Other</option>
           </select>
            </div>

    <div class="col-12 col-md-3 form-group">
        <label>DATE OF BIRTH<span class="imp-red">*</span></label>
         <input type="text" name="date_of_birth" value="<?php echo $patient->date_of_birth ?>"  class="form-control text-field" id="dob">
      </div>
      <div class="col-12 col-md-3 form-group">
        <label>DATE OF DEATH</label>
      <?php  if(isset($patient->id)){ ?>
         <input type="text" name="dod" value="<?php echo $patient->dod; ?>"  class="form-control text-field" id="dods">
       <?php }else{ ?>
         <input type="text" name="dod" value=""  class="form-control text-field" id="dod">
<?php       } ?>
      </div>
        <div class="col-12 col-md-2 form-group">
            <label>SOCIAL SECURITY NUMBER</label>
            <input type="number" onkeydown="return event.keyCode !== 69" name="ssn" value="<?php echo $patient->ssn ?>" class="form-control text-field" id="ssn">
        </div>
         <div class="col-12 col-md-2 form-group">
             <label>ETHNICITY</label>
              <select class="form-control" name="ethnicity_race" id="ethnicity_race">
                  <option value="">Select Ethnicity</option>
                  <option <?php echo ($patient->ethnicity_race=='American Indian or Alaska Native')?'Selected':''; ?> value="American Indian or Alaska Native">American Indian or Alaska Native</option>
                  <option value="Hispanic or Latino" <?php echo ($patient->ethnicity_race=='Hispanic or Latino')?'Selected':''; ?> >Hispanic or Latino</option>
                  <option value="Asian" <?php echo ($patient->ethnicity_race=='Asian')?'Selected':''; ?> >Asian</option>
                  <option value="Black or African American" <?php echo ($patient->ethnicity_race=='Black or African American')?'Selected':''; ?> >Black or African American</option>
                  <option value="Native Hawaiian or other Pacific Islander" <?php echo ($patient->ethnicity_race=='Native Hawaiian or other Pacific Islander')?'Selected':''; ?> >Native Hawaiian or other Pacific Islander</option>
                  <option value="White" <?php echo ($patient->ethnicity_race=='White')?'Selected':''; ?> >White</option>
           </select>
            </div>
     </div>

              <header class="panel_header">
                            <h2 class="title pull-left" id="form-title">Contact Information</h2>
                        </header>

                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-4 form-group">
                            <label>MOBILE PHONE<span class="imp-red">*</span></label>
                            <input type="number" onkeydown="return event.keyCode !== 69" value="<?php echo $patient->mobile ?>" name="mobile" class="form-control text-field" id="mobile" placeholder="(xxx) xxx-xxxx">
                            <input type="hidden"  value="<?php echo $patient->mobile_prefix; ?>" name="mobile_prefix" class="form-control text-field" id="mobile_prefix">
                          </div>
                          <!-- <div class="col-12 col-md-4 form-group">
                            <label>MOBILE PHONE<span class="imp-red">*</span></label>
                            <input type="tel" class="form-control text-field" id="phone" placeholder="Select Mobile Number">
                          </div> -->
                          <!-- <div class="col-12 col-md-4 form-group">
                            <label></label>
                            <input type="text" value="<?php //echo $patient->mobile ?>" name="mobile" class="form-control text-field" id="mobile" placeholder="(xxx) xxx-xxxx">
                            <input type="hidden"  name="mobile_prefix" class="form-control text-field" id="mobile_prefix">
                          </div> -->
                          <div class="col-12 col-md-4 form-group">
                            <label>EMAIL<span class="imp-red">*</span></label>
                            <input type="text" name="email" value="<?php echo $patient->email ?>" class="form-control text-field" id="email" placeholder="Email">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10 mt-10">
                          <div class="col-12 col-md-6">
                              <div class="form-check">
<input class="form-check-input" type="checkbox" name="mobilecheck" <?php echo ($patient->mobilecheck=='1')?'checked':''; ?> value="1" id="mobilecheck">
<label class="form-check-label ml-10" for="defaultCheck2">
Patient doesn't have a mobile phone
</label>
</div>
                          </div>
                          <div class="col-12 col-md-6">
                              <!-- <div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
<label class="form-check-label ml-10" for="defaultCheck3">
Patient doesn't have an email address
</label>
</div> -->
                          </div>
                        </div>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-4 form-group">
                            <label>HOME PHONE</label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="phone" value="<?php echo $patient->phone ?>" class="form-control text-field" id="phone" placeholder="">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label>WORK PHONE</label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="workphone" value="<?php echo $patient->workphone ?>" class="form-control text-field" id="workphone" placeholder="">
                          </div>
                          <div class="col-12 col-md-3 form-group">
                            <label></label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="ext" value="<?php echo $patient->ext ?>" class="form-control text-field" id="ext" placeholder="Ext">
                          </div>
                        </div>

                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <label>ADDRESS</label>
                            <input type="text" name="address1" value="<?php echo $patient->address1 ?>" class="form-control text-field" id="address1" placeholder="Street address">
                          </div>
                          <div class="col-12 col-md-6 form-group">
                            <label></label>
                            <input type="text" name="city" class="form-control text-field" value="<?php echo $patient->city ?>" id="city" placeholder="City">
                          </div>
                        </div>
                           <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <input type="text" name="state" class="form-control text-field" value="<?php echo $patient->state ?>" id="state" placeholder="State">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <input type="text" name="country" class="form-control text-field" value="<?php echo $patient->country ?>" id="country" placeholder="Country">
                          </div>
                          <div class="col-12  col-md-2 form-group">
                            <input type="number" onkeydown="return event.keyCode !== 69" name="zip" class="form-control text-field" value="<?php echo $patient->zip ?>" id="zip" placeholder="Zip">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-7 form-group">
                            <label>PREFERRED METHOD OF COMMUNICATION</label>
                            <select class="form-control" name="methodofcommunication" id="state">
                                                <option value="">Provider did not ask</option>
                                                <option <?php echo ($patient->methodofcommunication=='Email')?'Selected':''; ?> value="Email">Email</option>
                                                <option <?php echo ($patient->methodofcommunication=='Home Phone')?'Selected':''; ?> value="Home Phone">Home Phone</option>
                                                <option <?php echo ($patient->methodofcommunication=='Mobile phone')?'Selected':''; ?> value="Mobile phone">Mobile phone</option>
                                                <option <?php echo ($patient->methodofcommunication=='Work Phone')?'Selected':''; ?> value="Work Phone">Work Phone</option>
                                            </select>
                          </div>
                        </div>
                        <div class="row ml-10 mr-10 mt-10">
                          <div class="col-12 form-group">
                            <div class="dis-flex">
                            <div>
          <label class="switch">
            <input type="checkbox" name="emailreminders" value="1">
              <span class="slider round"></span>
            </label>
          </div>
                    <span class="bottom-10">Email reminders and messaging</span>
                    <i class="fa fa-exclamation-circle color-orange pos-l-t"></i>
                          </div>
                        </div>
                        </div>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 form-group">
                            <div class="dis-flex">
                            <div>
          <label class="switch">
            <input type="checkbox" name="smsreminders" value="1">
              <span class="slider round"></span>
            </label>
          </div>
                    <span class="bottom-10">SMS mobile text reminders and messaging </span>
                    <i class="fa fa-exclamation-circle color-orange pos-l-t"></i>
                          </div>
                        </div>
                        </div>
                         <div class="row ml-10 mr-10">
                          <div class="col-12 form-group">
                            <div class="dis-flex">
                            <div>
          <label class="switch">
            <input type="checkbox" name="voicereminders" value="1">
              <span class="slider round"></span>
            </label>
          </div>
                    <span class="bottom-10">Voice reminders and messaging </span>
                    <i class="fa fa-exclamation-circle color-orange pos-l-t"></i>
                          </div>
                        </div>
                        <div class="col-12">
                          <label class="color-grey">Collect patient consent before enabling SMS text or voice reminders</label>
                        </div>
                        <div class="col-12">
                          <i class="fa fa-exclamation-circle color-orange "></i><label class="color-grey ml-10"> Reminder type is OFF for practice. Reminders will not be sent.</label>
                        </div>
                        <div class="col-12">
                          <section class="box">
                            <label class="ml-10">Record patient consent to text and voice messaging</label>
                            <div class="form-check ml-10 dis-flex">
<input class="form-check-input" type="checkbox" name="my_practice" value="yes" id="defaultCheck4">
<label class="form-check-label ml-10" for="defaultCheck4">
My practice has documented that this Patient has provided their prior express consent to receive automated text and voice messages at the phone number(s) above.
</label>
</div>
<!-- <a href="#" class="ml-10 mb-10">Learn more about collecting patient consent for your practice</a> -->

                          </section>
                        </div>
                        </div>
                         <header class="panel_header">
                            <h2 class="title pull-left" id="form-title">Payment information</h2>
                        </header>
                        <div class="row m-0">
                          <div class="col-12">
                        <h2 class="title pull-left bg-light-grey" id="form-title">Insurance</h2>
                        <!--<a href="<?php //base_url(); ?>add_insurance" class="insurance"> <span>Add</span></a>-->

                        <a href="#" class="insurance"  onclick="popupopen()"> <span>Add</span></a>

                    </div>
                    </div>
                        <!-- <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-7 form-group">
                            <label>PAYMENT PREFERENCE</label>
                            <select class="form-control" name="payment" id="payment">
                                                <option value="">Self pay</option>
                                                <option value="">Secondary Insurance 	</option>
                                                <option value="">Tertiary Insurance</option>
                                                <option value="">Primary Insurance</option>
                                            </select>
                          </div>
                          <div class="col-12 col-md-5 form-group">
                            <label>SHOW</label>
                            <select class="form-control" name="show" id="show">
                                                <option value="">Active payers</option>
                                                <option value="">Inactive payers 	</option>
                                                <option value="">All payers</option>
                                            </select>
                          </div>
                        </div> -->
                        <table class="table insurance-table mt-10">
                          <thead>
                            <th>PAYER</th>
                            <th>TYPE </th>
                            <th>INSURANCE ID</th>
                            <th>EFFECTIVE FROM </th>
                            <th>EFFECTIVE TO </th>
                            <th>COPAY </th>
                           <th>ELIGIBILITY  </th>
                            <th>STATUS   </th>
                          </thead>
                          <tbody id="in">

                          </tbody>
                        </table>
                        <div class="row m-0">
                         <div class="col-12">
                       <h2 class="title pull-left bg-light-grey" id="form-title">Primary Care Provider</h2>
                   </div>
                   </div>
                        <!-- <header class="panel_header">
                            <h2 class="title pull-left" id="form-title">Primary Care Provider</h2>
                        </header> -->
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-4 form-group">
                            <label>PRIMARY CARE PROVIDER NAME</label>
                            <input type="text" name="primary_fname" value="<?php echo $patient->primary_fname ?>" class="form-control text-field" id="first" placeholder="First Name">
                            <input type="hidden" value="" name="insurance_u_id" id="insurance_u_id">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label></label>
                            <input type="text" name="primary_mname" value="<?php echo $patient->primary_mname ?>" class="form-control text-field" id="middle" placeholder="Middle Name">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label></label>
                            <input type="text" name="primary_lname" value="<?php echo $patient->primary_lname ?>" class="form-control text-field" id="last" placeholder="Last Name">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10">
                          <!-- <div class="col-12 col-md-4 form-group">
                            <label>RELATION TO PATIENT</label>
                            <select class="form-control" name="relation_to_patient" id="language" >
                                                <option <?php //echo ($patient->relation_to_patient=='Associate')?'Selected':''; ?> value="Associate">Associate</option>
                                                <option <?php //echo ($patient->relation_to_patient=='Sibling')?'Selected':''; ?> value="Sibling">Sibling</option>
                                                <option <?php //echo ($patient->relation_to_patient=='Spouse')?'Selected':''; ?> value="Spouse">Spouse</option>
                                                <option  <?php //echo ($patient->relation_to_patient=='Care giver')?'Selected':''; ?> value="Care giver">Care giver</option>
                                                <option <?php //echo ($patient->relation_to_patient=='Child')?'Selected':''; ?> value="Child">Child</option>
                                                <option <?php //echo ($patient->relation_to_patient=='Other')?'Selected':''; ?> value="Other">Other</option>
                                 </select>
                          </div> -->
                            <div class="col-12 col-md-4 form-group">
                            <label>PHONE</label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="primary_phone" value="<?php echo $patient->primary_phone ?>" class="form-control text-field" id="phone" placeholder="(xxx) xxx-xxxx">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label>PHONE TYPE</label>
                            <select class="form-control" name="primary_phone_type" id="phonetype" >
                                                <option  <?php echo ($patient->primary_phone_type=='Telephone')?'Selected':''; ?> value="Telephone">Telephone</option>
                                                <option <?php echo ($patient->primary_phone_type=='Fax')?'Selected':''; ?> value="Fax">Fax</option>
                                                <option <?php echo ($patient->primary_phone_type=='Modem')?'Selected':''; ?>  value="Modem">Modem</option>
                                                <option <?php echo ($patient->primary_phone_type=='Cellular Phone')?'Selected':''; ?> value="Cellular Phone">Cellular Phone</option>
                                 </select>
                          </div>
                        </div>

                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <label>ADDRESS</label>
                            <input type="text" name="primary_address_1" value="<?php echo $patient->primary_address_1; ?>" class="form-control text-field" id="add1" placeholder="Street address">
                          </div>
                          <div class="col-12 col-md-6 form-group">
                            <label></label>
                              <input type="text" name="primary_city" value="<?php echo $patient->primary_city; ?>" class="form-control text-field" id="city" placeholder="City">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <input type="text" name="primary_state" value="<?php echo $patient->primary_state; ?>" class="form-control text-field" id="state" placeholder="State">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <input type="text" name="primary_country" value="<?php echo $patient->primary_country; ?>" class="form-control text-field" id="primary_country" placeholder="Country">
                          </div>
                          <div class="col-12 col-md-2 form-group">
                            <input type="number" onkeydown="return event.keyCode !== 69" name="primary_zip" value="<?php echo $patient->primary_zip; ?>" class="form-control text-field" id="zip" placeholder="Zip">
                          </div>

                        </div>
                         <div class="row m-0">
                          <div class="col-12">
                        <h2 class="title pull-left bg-light-grey" id="form-title">Guarantor</h2>
                    </div>
                    </div>
                    <div class="row ml-10 mr-10">
                      <div class="col-12 col-md-7 form-group">
                            <label>PATIENT RELATIONSHIP TO GUARANTOR</label>
                            <select class="form-control" name="relationship_to_guarantor" id="relationship">
                                                <option value="Self">Self</option>
                                                <option value="Spouse">Spouse</option>
                                                <option value="Child">Child</option>
                                                <option value="Other">Other</option>
                                 </select>
                          </div>
                    </div>
                    <div class="row ml-10 mr-10">
                      <div class="col-12 col-md-4 form-group">
                            <label>GUARANTOR NAME</label>
                            <input type="text" name="guarantor_fname" value="<?php echo $patient->guarantor_fname ?>" class="form-control text-field" id="fname" placeholder="First Name">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label></label>
                            <input type="text" name="guarantor_mname" value="<?php echo $patient->guarantor_mname ?>" class="form-control text-field" id="mname" placeholder="Middle Name">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label></label>
                            <input type="text" name="guarantor_lname" value="<?php echo $patient->guarantor_lname ?>" class="form-control text-field" id="lname" placeholder="Last Name">
                          </div>
                    </div>
                    <div class="row ml-10 mr-10">
                      <div class="col-12 col-md-6 form-group">
                            <label>ADDRESS</label>
                            <input type="text" name="guarantor_address1" value="<?php echo $patient->guarantor_address1 ?>" class="form-control text-field" id="add1" placeholder="Street Address 1">
                          </div>
                          <div class="col-12 col-md-6 form-group">
                            <label></label>
                          <input type="text" name="guarantor_city" value="<?php echo $patient->guarantor_city ?>" class="form-control text-field" id="city" placeholder="City">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <input type="text" name="guarantor_state" value="<?php echo $patient->guarantor_state ?>" class="form-control text-field" id="state" placeholder="State">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <input type="text" name="guarantor_country" value="<?php echo $patient->guarantor_country ?>" class="form-control text-field" id="country" placeholder="Country">
                          </div>
                          <div class="col-12 col-md-2 form-group">
                            <input type="number" onkeydown="return event.keyCode !== 69" name="guarantor_zip" value="<?php echo $patient->guarantor_zip ?>" class="form-control text-field" id="zip" placeholder="Zip">
                          </div>
                    </div>
                    <div class="row ml-10 mr-10">
                      <div class="col-12 col-md-4 form-group">
                            <label>DATE OF BIRTH</label>
                            <?php  if(isset($patient->id)){ ?>
                            <input type="text" name="guarantor_dob"   value="<?php echo $patient->guarantor_dob ?>" class="form-control text-field" id="DOB">
                            <?php }else{ ?>
                              <input type="text" name="guarantor_dob"   value="" class="form-control text-field" id="DOB">
                              <?php } ?>
                          </div>
                        <div class="col-12 col-md-3 form-group">
                          <label>SEX</label>
                            <select class="form-control" name="guarantor_sex" id="sex">
                                                <option <?php echo ($patient->guarantor_sex=='Male')?'Selected':''; ?> value="Male">Male</option>
                                                <option <?php echo ($patient->guarantor_sex=='Female')?'Selected':''; ?> value="Female">Female</option>
                                                <option  <?php echo ($patient->guarantor_sex=='Other')?'Selected':''; ?> value="Other">Other</option>
                                 </select>
                          </div>


          <div class="col-12 col-md-5 form-group">
                            <label>SSN</label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="guarantor_ssn" value="<?php echo $patient->guarantor_ssn ?>" class="form-control text-field" id="ssn" placeholder="###-##-####">
                          </div>
                    </div>
                    <div class="row ml-10 mr-10 mb-10">
                        <div class="col-12 col-md-4 form-group">
                            <label>PRIMARY PHONE NUMBER</label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="guarantor_primary_phone" value="<?php echo $patient->guarantor_primary_phone ?>" class="form-control text-field" id="phone" placeholder="(xxx) xxx-xxxx">
                          </div>
                          <div class="col-12 col-md-2 form-group">
                            <label></label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="guarantor_primary_ext" value="<?php echo $patient->guarantor_primary_ext ?>" class="form-control text-field" id="ext" placeholder="Ext">
                          </div>
                           <div class="col-12 col-md-4 form-group">
                            <label>SECONDARY PHONE NUMBER</label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="guarantor_secondary_phone" value="<?php echo $patient->guarantor_secondary_phone ?>" class="form-control text-field" id="phone" placeholder="(xxx) xxx-xxxx">
                          </div>
                          <div class="col-12 col-md-2 form-group">
                            <label></label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="guarantor_secondary_ext" value="<?php echo $patient->guarantor_secondary_ext ?>" class="form-control text-field" id="ext" placeholder="Ext">
                          </div>
                    </div>

                    <!-- <div class="row m-0">
                      <div class="col-12">
                        <h2 class="title pull-left bg-light-grey" id="form-title">Primary Care Provider</h2>
                      </div>
                    </div>

                    <div class="row ml-10 mr-10">
                      <div class="col-12 col-md-4 form-group">
                        <label>PRIMARY CARE PROVIDER NAME</label>
                        <input type="text" name="primary_fname" value="<?php //echo $patient->primary_fname ?>" class="form-control text-field" id="first" placeholder="First Name">
                        <input type="hidden" value="" name="insurance_u_id" id="insurance_u_id">
                      </div>
                      <div class="col-12 col-md-4 form-group">
                        <label></label>
                        <input type="text" name="primary_mname" value="<?php //echo $patient->primary_mname ?>" class="form-control text-field" id="middle" placeholder="Middle Name">
                      </div>
                      <div class="col-12 col-md-4 form-group">
                        <label></label>
                        <input type="text" name="primary_lname" value="<?php //echo $patient->primary_lname ?>" class="form-control text-field" id="last" placeholder="Last Name">
                      </div>
                    </div>
                    <div class="row ml-10 mr-10">
                        <div class="col-12 col-md-4 form-group">
                        <label>PHONE</label>
                        <input type="text" name="primary_phone" value="<?php //echo $patient->primary_phone ?>" class="form-control text-field" id="phone" placeholder="(xxx) xxx-xxxx">
                      </div>
                      <div class="col-12 col-md-4 form-group">
                        <label>PHONE TYPE</label>
                        <select class="form-control" name="primary_phone_type" id="phonetype" >
                                            <option  <?php //echo ($patient->primary_phone_type=='Telephone')?'Selected':''; ?> value="Telephone">Telephone</option>
                                            <option <?php //echo ($patient->primary_phone_type=='Fax')?'Selected':''; ?> value="Fax">Fax</option>
                                            <option <?php //echo ($patient->primary_phone_type=='Modem')?'Selected':''; ?>  value="Modem">Modem</option>
                                            <option <?php //echo ($patient->primary_phone_type=='Cellular Phone')?'Selected':''; ?> value="Cellular Phone">Cellular Phone</option>
                             </select>
                      </div>
                    </div>

                    <div class="row ml-10 mr-10">
                      <div class="col-12 col-md-6 form-group">
                        <label>ADDRESS</label>
                        <input type="text" name="primary_address_1" value="<?php //echo $patient->primary_address_1 ?>" class="form-control text-field" id="add1" placeholder="Street address 1">
                      </div>
                      <div class="col-12 col-md-6 form-group">
                        <label></label>
                          <input type="text" name="primary_city" value="<?php //echo $patient->primary_city ?>" class="form-control text-field" id="city" placeholder="City">
                      </div>
                    </div>
                    <div class="row ml-10 mr-10">
                      <div class="col-12 col-md-6 form-group">
                        <input type="text" name="primary_state" value="<?php //echo $patient->primary_state ?>" class="form-control text-field" id="state" placeholder="State">
                      </div>
                      <div class="col-12 col-md-4 form-group">
                        <input type="text" name="primary_state" value="<?php //echo $patient->primary_state ?>" class="form-control text-field" id="state" placeholder="Country">
                      </div>
                      <div class="col-12 col-md-2 form-group">
                        <input type="text" name="primary_zip" value="<?php //echo $patient->primary_zip ?>" class="form-control text-field" id="zip" placeholder="Zip">
                      </div>

                    </div> -->
                    <!-- <header class="panel_header">
                            <h2 class="title pull-left" id="form-title">Demographics</h2>
                        </header> -->
                        <!-- <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-5 form-group pickersearch">
                            <select class="form-control selectpicker" name="preferred_language" id="preferred_language" data-show-subtext="true" data-live-search="true">
                                                <option value="">Provider did not ask</option>
                                                <option value="AL">AL</option>
                                                <option value="AK">AK</option>
                                                <option value="AZ">AZ</option>
                                 </select>
                          </div>
                          </div> -->
                          <!-- <div class="row ml-10 mr-10">
                          <div class="col-12">
                            <span class="color-light-blue ml-10 mt-10">ETHNICITY/RACE </span>
                          </div>
                          <div class="col-12 mt-10">
                            <input class="form-check-input ml-10" type="radio" name="ethnicity_race" id="ethnicity_race" value="Provider did not ask" >
        <label class="form-check-label" for="exampleRadios2">
        Provider did not ask
       </label>
                          </div>
                          <div class="col-12">
                            <input class="form-check-input ml-10" type="radio" name="ethnicity_race" id="ethnicity_race" value="Patient declined to specify" >
        <label class="form-check-label" for="exampleRadios2">
        Patient declined to specify
       </label>
                          </div>
                          <div class="col-12">
                            <input class="form-check-input ml-10" type="radio" name="ethnicity_race" id="ethnicity_race" onclick="shows()"  value="choose" >
        <label class="form-check-label" for="exampleRadios2">
        Choose one or more
       </label>
                          </div>
                          </div> -->
                          <!-- <div class="row ml-10 mr-10">
                            <div class="col-12 col-md-6 form-group">
                            <input type="text" name="search-bar" class="form-control text-field" id="search-bar">
                          </div>
                          <div class="col-12 col-md-4">
                            <button type="submit" class="btn btn-default" >Add</button>
                          </div>
                        </div> -->
                        <!-- <div id="showss" class="row ml-10 mr-10" style="display:none;">
                            <div class="col-12 ">
                              <div class="form-check ml-10">
<input class="form-check-input" type="checkbox" name="ethnicity_race_option[]" value="American Indian or Alaska Native" id="defaultCheck2">
<label class="form-check-label ml-10" for="defaultCheck2">
American Indian or Alaska Native
</label>
</div>
                          </div>
                          <div class="col-12 ">
                              <div class="form-check ml-10">
<input class="form-check-input" type="checkbox" name="ethnicity_race_option[]" value="Hispanic or Latino" id="defaultCheck3">
<label class="form-check-label ml-10" for="defaultCheck3">
Hispanic or Latino
</label>
</div>
                          </div>
                          <div class="col-12 ">
                              <div class="form-check ml-10">
<input class="form-check-input" type="checkbox" name="ethnicity_race_option[]" value="Asian" id="defaultCheck4">
<label class="form-check-label ml-10" for="defaultCheck4">
Asian
</label>
</div>
                          </div>
                          <div class="col-12 ">
                              <div class="form-check ml-10">
<input class="form-check-input" type="checkbox" value="Black or African American" name="ethnicity_race_option[]" id="defaultCheck5">
<label class="form-check-label ml-10" for="defaultCheck5">
Black or African American
</label>
</div>
                          </div>
                          <div class="col-12 ">
                              <div class="form-check ml-10">
<input class="form-check-input" type="checkbox"  name="ethnicity_race_option[]" value="Native Hawaiian or other Pacific Islander" id="defaultCheck5">
<label class="form-check-label ml-10" for="defaultCheck5">
Native Hawaiian or other Pacific Islander
</label>
</div>
                          </div>
                          <div class="col-12 ">
                              <div class="form-check ml-10">
<input class="form-check-input" type="checkbox" name="ethnicity_race_option[]" value="White" id="defaultCheck6">
<label class="form-check-label ml-10" for="defaultCheck6">
White
</label>
</div>
                          </div>
                        </div> -->
                        <!-- <header class="panel_header">
                            <h2 class="title pull-left" id="form-title">Primary Care Provider</h2>
                        </header>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-4 form-group">
                            <label>PRIMARY CARE PROVIDER NAME</label>
                            <input type="text" name="primary_fname" value="<?php //echo $patient->primary_fname ?>" class="form-control text-field" id="first" placeholder="First Name">
                            <input type="hidden" value="" name="insurance_u_id" id="insurance_u_id">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label></label>
                            <input type="text" name="primary_mname" value="<?php //echo $patient->primary_mname ?>" class="form-control text-field" id="middle" placeholder="Middle Name">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label></label>
                            <input type="text" name="primary_lname" value="<?php //echo $patient->primary_lname ?>" class="form-control text-field" id="last" placeholder="Last Name">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10"> -->
                          <!-- <div class="col-12 col-md-4 form-group">
                            <label>RELATION TO PATIENT</label>
                            <select class="form-control" name="relation_to_patient" id="language" >
                                                <option <?php //echo ($patient->relation_to_patient=='Associate')?'Selected':''; ?> value="Associate">Associate</option>
                                                <option <?php //echo ($patient->relation_to_patient=='Sibling')?'Selected':''; ?> value="Sibling">Sibling</option>
                                                <option <?php //echo ($patient->relation_to_patient=='Spouse')?'Selected':''; ?> value="Spouse">Spouse</option>
                                                <option  <?php //echo ($patient->relation_to_patient=='Care giver')?'Selected':''; ?> value="Care giver">Care giver</option>
                                                <option <?php //echo ($patient->relation_to_patient=='Child')?'Selected':''; ?> value="Child">Child</option>
                                                <option <?php //echo ($patient->relation_to_patient=='Other')?'Selected':''; ?> value="Other">Other</option>
                                 </select>
                          </div> -->
                            <!-- <div class="col-12 col-md-4 form-group">
                            <label>PHONE</label>
                            <input type="text" name="primary_phone" value="<?php //echo $patient->primary_phone ?>" class="form-control text-field" id="phone" placeholder="(xxx) xxx-xxxx">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label>PHONE TYPE</label>
                            <select class="form-control" name="primary_phone_type" id="phonetype" >
                                                <option  <?php //echo ($patient->primary_phone_type=='Telephone')?'Selected':''; ?> value="Telephone">Telephone</option>
                                                <option <?php //echo ($patient->primary_phone_type=='Fax')?'Selected':''; ?> value="Fax">Fax</option>
                                                <option <?php //echo ($patient->primary_phone_type=='Modem')?'Selected':''; ?>  value="Modem">Modem</option>
                                                <option <?php //echo ($patient->primary_phone_type=='Cellular Phone')?'Selected':''; ?> value="Cellular Phone">Cellular Phone</option>
                                 </select>
                          </div>
                        </div>

                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <label>ADDRESS</label>
                            <input type="text" name="primary_address_1" value="<?php //echo $patient->primary_address_1; ?>" class="form-control text-field" id="add1" placeholder="Street address">
                          </div>
                          <div class="col-12 col-md-6 form-group">
                            <label></label>
                              <input type="text" name="primary_city" value="<?php //echo $patient->primary_city; ?>" class="form-control text-field" id="city" placeholder="City">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <input type="text" name="primary_state" value="<?php //echo $patient->primary_state; ?>" class="form-control text-field" id="state" placeholder="State">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <input type="text" name="primary_country" value="<?php //echo $patient->primary_country; ?>" class="form-control text-field" id="primary_country" placeholder="Country">
                          </div>
                          <div class="col-12 col-md-2 form-group">
                            <input type="number" onkeydown="return event.keyCode !== 69" name="primary_zip" value="<?php //echo $patient->primary_zip; ?>" class="form-control text-field" id="zip" placeholder="Zip">
                          </div>

                        </div> -->
                        <!-- <div class="row ml-10 mr-10 mb-10 mt-10">
                          <div class="col-12">
                           <a href="#" class="ml-10 mb-10">Add another next of primary</a>
                          </div>
                        </div> -->
                         <header class="panel_header">
                            <h2 class="title pull-left" id="form-title">Patient's Family Info</h2>
                        </header>
                         <div class="row ml-10 mr-10 mb-10">
                          <div class="col-12 col-md-6 form-group">
                            <label>PATIENT'S MOTHER'S MAIDEN NAME</label>
                            <input type="text" name="patient_mother_name" value="<?php echo $patient->patient_mother_name; ?>" class="form-control text-field" id="maide-name" placeholder="Mother's maiden name">
                          </div>
                        </div>
                         <header class="panel_header">
                            <h2 class="title pull-left" id="form-title">Patient settings</h2>
                        </header>
                        <div class="row m-0">
                          <div class="col-12">
                        <h2 class="title pull-left bg-light-grey" id="form-title">Immunization registry</h2>
                    </div>
                    </div>
                    <div class="row ml-10 mr-10 mb-10">
                      <div class="col-12">
                        <p class="color-grey">
                          These settings indicate to the registry the current status of this patient in relation to your practice and how this patient's information will be protected.
                        </p>
                      </div>
                      <div class="col-12 col-md-3 form-group">
                        <label>IMMUNIZATION REGISTRY STATUS</label>
                            <select class="form-control" name="immunization_registery_status" id="state" placeholder="status" >
                                                <option value="">Select</option>
                                                <option <?php echo ($patient->immunization_registery_status=='Active')?'Selected':''; ?> value="Active">Active</option>
                                                <option <?php echo ($patient->immunization_registery_status=='Inactive - Unspecified')?'Selected':''; ?> value="Inactive - Unspecified">Inactive - Unspecified</option>
                                                <option <?php echo ($patient->immunization_registery_status=='Inactive - Lost to follow-up (cannot contact)')?'Selected':''; ?> value="Inactive - Lost to follow-up (cannot contact)">Inactive - Lost to follow-up (cannot contact)</option>
                                                <option <?php echo ($patient->immunization_registery_status=='Inactive - Moved or gone elsewhere (transferred)')?'Selected':''; ?> value="Inactive - Moved or gone elsewhere (transferred)">Inactive - Moved or gone elsewhere (transferred)</option>
                                                <option <?php echo ($patient->immunization_registery_status=='Inactive - Permanently inactive (do not re-activate or add new entries to this record)')?'Selected':''; ?> value="Inactive - Permanently inactive (do not re-activate or add new entries to this record)">Inactive - Permanently inactive (do not re-activate or add new entries to this record)</option>
                                                <option <?php echo ($patient->immunization_registery_status=='Unknown')?'Selected':''; ?> value="Unknown">Unknown</option>
                                 </select>
                          </div>
                          <div class="col-12 col-md-3 form-group">
                            <label>EFFECTIVE DATE<span class="imp-red">*</span></label>
                            <input type="text" value="<?php echo $patient->immunization_effective_date ?>" data-date-format='yyyy-mm-dd' name="immunization_effective_date" class="form-control text-field edate" id="date">
                          </div>
                           <div class="col-12 col-md-6 form-group">
                        <label>IMMUNIZATION REGISTRY NOTIFICATION PREFERENCES</label>
                            <select class="form-control" name="reminder_call" id="state" placeholder="state" >
                                                <option value="">Select</option>
                                                <option <?php echo ($patient->reminder_call=='No reminder/recall')?'Selected':''; ?> value="No reminder/recall">No reminder/recall</option>
                                                <option  <?php echo ($patient->reminder_call=='Reminder/recall - any method')?'Selected':''; ?> value="Reminder/recall - any method">Reminder/recall - any method</option>
                                                <option <?php echo ($patient->reminder_call=='Reminder/recall - no calls')?'Selected':''; ?> value="Reminder/recall - no calls">Reminder/recall - no calls</option>
                                 </select>
                          </div>
                    </div>

                    <div class="row ml-10 mr-10">
                      <div class="col-12">
                      <div class="form-check dis-flex">
       <input class="form-check-input" type="radio" name="data_privacy" id="exampleRadios1" value="Yes, protect the data. Client (or guardian) has indicated that the information shall be protected." <?php echo ($patient->data_privacy=='Yes, protect the data. Client (or guardian) has indicated that the information shall be protected.')?'checked':''; ?> >
        <label class="form-check-label ml-10" for="exampleRadios1">
        Yes, protect the data. Client (or guardian) has indicated that the information shall be protected.
       </label>
      </div>
    </div>
    </div>
    <div class="row ml-10 mr-10">
    <div class="col-12">
                      <div class="form-check dis-flex">
       <input class="form-check-input" type="radio" name="data_privacy" id="exampleRadios1" value="No, it is not necessary to protect data from other clinicians. Client (or guardian) has indicated that the information does not need to be protected." <?php echo ($patient->data_privacy=='No, it is not necessary to protect data from other clinicians. Client (or guardian) has indicated that the information does not need to be protected.')?'checked':''; ?> >
        <label class="form-check-label ml-10" for="exampleRadios1">
        No, it is not necessary to protect data from other clinicians. Client (or guardian) has indicated that the information does not need to be protected.
       </label>
      </div>
    </div>
                    </div>
                    <div class="row ml-10 mr-10 border-bottom mb-10">
    <div class="col-12">
                      <div class="form-check dis-flex">
       <input class="form-check-input" type="radio" name="data_privacy" id="exampleRadios1" value="Patient did not specify. No determination has been made regarding clients (or guardians) wishes regarding information sharing." <?php echo ($patient->data_privacy=='Patient did not specify. No determination has been made regarding clients (or guardians) wishes regarding information sharing.')?'checked':''; ?>>

        <label class="form-check-label ml-10" for="exampleRadios1">
        Patient did not specify. No determination has been made regarding client's (or guardian's) wishes regarding information sharing.
       </label>
      </div>
    </div>
                    </div>
                    <div class="row ml-10 mr-10 border-bottom mb-10">
    <div class="col-12 form-group" style="margin-bottom:10px;">
      <label>PATIENT PHOTO</label>
        <!-- <label class="form-check-label ml-10" for="exampleRadios1ww"> Patient Photo   </label> -->
      <input type="file" name="picture" >  <!--accept="image/gif, image/jpeg, image/png"-->
      <input type="hidden" name="old_picture" value="<?php echo $patient->picture ?>">
    </div>
                    </div>

                         <div class="text-center mb-10 mt-10">
                         <button type="submit" class="btn btn-default" >Save</button>
        <a href="<?php echo base_url().'patient'; ?>"><button type="button" class="btn btn-default">Close</button></a>
      </div>
      </form>
                    </section>
                </div>
</div>

<script>
    function goBack() {
      window.history.back();
    }
</script>
<div class="clearfix"></div>
<div id="insurance" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Insurance</h4>
      </div>
      <div class="modal-body">
         <section>
                       <div class="row ml-10 mr-10">
         <div class="col-12 ml-10">
                      <div class="form-check">
       <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="Active" checked>
        <label class="form-check-label" for="exampleRadios1">
        Active
       </label>

       <input class="form-check-input ml-10" type="radio" name="status" id="exampleRadios2" value="Inactive" checked>
        <label class="form-check-label" for="exampleRadios2">
        Inactive
       </label>
      </div>
    </div>
  </div>
  <div class="row ml-10 mr-10">
    <div class="col-12 col-md-6 form-group">
                            <label>PAYER NAME<span class="imp-red">*</span></label>
                            <input type="text" name="payer_name" class="form-control text-field" id="payer_name" placeholder="payer name">
                            <!-- <i class="fa fa-search pos-icon"></i> -->
                          </div>
                           <div class="col-12 col-md-6 form-group">
                            <label>PLAN NAME AND TYPE<span class="imp-red">*</span></label>
                            <input type="text" name="plan_name_and_type" class="form-control text-field" id="add1" placeholder="plan name and type">
                            <!-- <i class="fa fa-search pos-icon"></i> -->
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
                                                <option value="Primary">Primary</option>
                                                <option value="Secondary">Secondary</option>
                                                <option value="Tertiary">Tertiary</option>
                                                <option value="Unknown">Unknown/None</option>
                                 </select>
                          </div>
                            <div class="col-12 col-md-7 mt-30">
                              <div class="form-check">
<input class="form-check-input" name="workers_compensation" type="checkbox" value="WORKERS COMPENSATION" id="defaultCheck3">
<label class="form-check-label ml-10" for="defaultCheck3">
WORKER'S COMPENSATION</label>
</div>
                          </div>
  </div>
  <div class="row  ml-10 mr-10">
 <div class="col-12 col-md-6 form-group">
                            <label>INSURANCE ID<span class="imp-red">*</span></label>
                            <input type="text" name="insurance_id" class="form-control text-field" id="insuranceid" placeholder="Insurance ID">
                          </div>
                          <div class="col-12 col-md-6 form-group">
                            <label>GROUP ID</label>
                            <input type="text" name="group_id" class="form-control text-field" id="groupid" placeholder="Group ID">
                          </div>
  </div>
  <div class="row  ml-10 mr-10">
     <div class="col-12 col-md-4 form-group">
                            <label>EFFECTIVE FROM<span class="imp-red">*</span></label>
                            <input type="text" onchange="effective()" name="effective_from"   class="form-control text-field" id="efdate" placeholder="EFFECTIVE FROM">
                          </div>
                           <div class="col-12 col-md-4 form-group">
                            <label>EFFECTIVE TO</label>
                            <input type="text" name="effective_to" onchange="effective()" class="form-control text-field" id="etdate" placeholder="EFFECTIVE TO">
                            <div id="effectivetime" style="display:none;"> Effective To Date Should Not Be Less Than Effective From Date</div>
                          </div>
                          <div class="col-12 col-md-4 form-group">
                        <label>RELATION TO INSURED</label>
                                <select class="form-control" name="relation_to_insured" id="insured">
                                                <option value="Child">Child</option>
                                                <option value="Other">Other</option>
                                                <option value="Self">Self</option>
                                                <option value="Spouse">Spouse</option>
                                 </select>
                          </div>
  </div>
  <div class="row  ml-10 mr-10">
     <div class="col-12 col-md-4 form-group">
                        <label>COPAY TYPE</label>
                            <select class="form-control" name="copay_type" id="copay_type">
                                                <option value="Fixed">Fixed</option>
                                                <option value="Percent">Percent</option>
                                 </select>
                          </div>


    <div class="col-12 col-md-4 form-group">
                            <label>COPAY AMOUNT<span class="imp-red">*</span></label>
                            <input type="text" name="copay_amount" class="form-control text-field" id="amount" placeholder="$">
                          </div>
                           <div class="col-12 col-md-4 form-group">
                            <label>CLAIM NUMBER</label>
                            <input type="text" name="claim_number" class="form-control text-field" id="cliam" placeholder="Claim number">
                          </div>
                        </div>

                        <div class="row ml-10 mr-10">
                          <div class="col-12 form-group">
                            <label>NOTES</label>
                            <textarea class="w-100" id="notes" name="notes" rows="5" placeholder="Notes"></textarea>
                          </div>
                        </div>
                        <div class="row ml-10 mb-10">
                          <div class="col-12 col-md-7 form-group">
                            <label>ELIGIBILITY</label>
                            <select class="form-control" name="eligiblility" id="eligiblility">
                              <option value="">Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                          </div>
                        </div>
                      <header class="panel_header" data-toggle="collapse" data-target="#employer">
                            <h2 class="title pull-left" id="form-title">Employer information</h2>
                            <div class="down-arrow"><i class="fa fa-caret-down"></i></div>
                            <!-- <div class="actions panel_actions pull-right">
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                            </div> -->
                        </header>
                        <div  id="employer" class="collapse">
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <label>EMPLOYER NAME</label>
                            <input type="text" name="employer_name" class="form-control text-field" id="employname" placeholder="Employer Name">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <label>EMPLOYER ADDRESS</label>
                            <input type="text" name="employer_address1" class="form-control text-field" id="add1" placeholder="Address 1">
                          </div>
                          <div class="col-12 col-md-6 form-group">
                            <label></label>
                            <input type="text" name="employer_address2" class="form-control text-field" id="add2" placeholder="Address 2">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10 mb-10">
                          <div class="col-12 col-md-6 form-group">
                            <input type="text" name="city" class="form-control text-field" id="city" placeholder="City">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <input type="text" name="state" class="form-control text-field" id="state" placeholder="State">
                          </div>
                           <div class="col-12 col-md-2 form-group">
                            <input type="number" onkeydown="return event.keyCode !== 69" name="zip" class="form-control text-field" id="zip" placeholder="Zip">
                          </div>
                        </div>
                      </div>
                         <header class="panel_header" data-toggle="collapse" data-target="#subscriber">
                            <h2 class="title pull-left" id="form-title">Subscriber information</h2>
                            <div class="down-arrow"><i class="fa fa-caret-down"></i></div>
                         <!--    <div class="actions panel_actions pull-right">
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                            </div> -->
                        </header>
                         <div  id="subscriber" class="collapse">
                        <!-- <div class="row ml-10 mr-10">
                          <div class="col-12">
                            <a href="#">Copy from guarantor information</a>
                          </div>
                        </div> -->
                        <div class="row ml-10 mr-10">
                           <div class="col-12 col-md-4 form-group">
                            <label>SUBSCRIBER'S FIRST NAME</label>
                            <input type="text" name="subscribers_fname" class="form-control text-field" id="fname" placeholder="Subscriber First Name">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label></label>
                            <input type="text" name="subscribers_mname" class="form-control text-field" id="mname" placeholder="Middle Initial">
                          </div>
                           <div class="col-12 col-md-4 form-group">
                            <label>SUBSCRIBER'S LAST NAME</label>
                            <input type="text" name="subscribers_lname" class="form-control text-field" id="lname" placeholder="Subscriber Last Name">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <label>SUBSCRIBER DATE OF BIRTH</label>
                            <input type="text" data-date-format='yyyy-mm-dd' name="subscribers_dob"  class="form-control text-field dates" id="date">
                          </div>
                               <div class="col-12 col-md-6 form-group">
                        <label>SEX</label>
                            <select class="form-control" name="subscribers_sex" id="subscribers_sex">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                 </select>
                          </div>
      <div class="col-12 col-md-6 form-group">
                            <label>SUBSCRIBER SOCIAL SECURITY NUMBER</label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="subscribers_ssn" class="form-control text-field" id="subscribers_ssn">
                          </div>

                        </div>
                        <div class="row ml-10 mr-10">
                           <div class="col-12 col-md-6 form-group">
                            <label>SUBSCRIBER ADDRESS</label>
                            <input type="text" name="subscribers_address1" class="form-control text-field" id="add1" placeholder="Address 1">
                          </div>
                          <div class="col-12 col-md-6 form-group">
                            <label></label>
                            <input type="text" name="subscribers_address2" class="form-control text-field" id="add2" placeholder="Address 2">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10 mb-10">
                          <div class="col-12 col-md-6 form-group">
                            <input type="text" name="subscribers_city" class="form-control text-field" id="city" placeholder="City">
                          </div>
                           <div class="col-12 col-md-4 form-group">
                            <input type="text" name="subscribers_state" class="form-control text-field" id="state" placeholder="State">
                          </div>
                           <div class="col-12 col-md-2 form-group">
                            <input type="number" onkeydown="return event.keyCode !== 69" name="subscribers_zip" class="form-control text-field" id="zip" placeholder="Zip">
                          </div>
                        </div>
                        <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <label>SUBSCRIBER PRIMARY PHONE NUMBER</label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="subscribers_primary_number" class="form-control text-field" id="phonenum">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label></label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="subscribers_primary_ext" class="form-control text-field" id="ext" placeholder="Ext">
                          </div>
                        </div>
                         <div class="row ml-10 mr-10">
                          <div class="col-12 col-md-6 form-group">
                            <label>SECONDARY PHONE NUMBER</label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="subscribers_secondary_number" class="form-control text-field" id="phonenum">
                          </div>
                          <div class="col-12 col-md-4 form-group">
                            <label></label>
                            <input type="number" onkeydown="return event.keyCode !== 69" name="subscribers_secondary_ext" class="form-control text-field" id="ext" placeholder="Ext">
                          </div>
                        </div>
                      </div>
                    </section>
      </div>
      <div class="modal-footer">
          <button type="button" onclick="add_insurance()" class="btn btn-default" >Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
  if($('#mobilecheck').prop("checked") == true){
    $("#mobile").prop("readonly", true);
  }
});
$('#mobilecheck').change(function() {
        if(this.checked) {
            //var returnVal = confirm("Are you sure?");
            //$(this).prop("checked", returnVal);
            $("#mobile").prop("readonly", true);
        }else{
          $("#mobile").prop("readonly", false);
        }
      //  $('#textbox1').val(this.checked);
    });
 $('input[type=radio][name=ethnicity_race]').change(function() {
    if (this.value == 'choose') {
        $("#showss").css('display','block');
    }
    else  {
        $("#showss").css('display','none');
    }
});
function popupopen(){
    var BASE_URL = '<?php echo base_url(); ?>';
    if($("#fname").val()==''){
      $("#fname").focus();
    }else if($("#lname").val()==''){
      $("#lname").focus();
    }else{
      var name = $("#fname").val() + ' '+ $("#lname").val();
      $("#payer_name").val(name);
      $("#insurance").modal();
    }
}
    function add_insurance(){
var BASE_URL = '<?php echo base_url(); ?>';
  var status =  $("input[name=status]:checked").val();
  var payer_name =  $("input[name=payer_name]").val();
  var plan_name_and_type =  $("input[name=plan_name_and_type]").val();
  var order_of_benefits =  $("#order_of_benefits :selected").val();
  var workers_compensation =  $("input[name=workers_compensation]").val();
  var insurance_id =  $("input[name=insurance_id]").val();
  var group_id =  $("input[name=group_id]").val();
  var effective_from =  $("input[name=effective_from]").val();
  var effective_to =  $("input[name=effective_to]").val();
  var relation_to_insured =  $("input[name=relation_to_insured]").val();
  var copay_type =  $("#copay_type :selected").val();
  var copay_amount =  $("input[name=copay_amount]").val();
  var claim_number =  $("input[name=claim_number]").val();
  var notes =  $("textarea#notes").val();
  var employer_name =  $("input[name=employer_name]").val();
  var employer_address1 =  $("input[name=employer_address1]").val();
  var employer_address2 =  $("input[name=employer_address2]").val();
  var city =  $("input[name=city]").val();
  var state =  $("input[name=state]").val();
  var zip =  $("input[name=zip]").val();
  var subscribers_fname =  $("input[name=subscribers_fname]").val();
  var subscribers_mname =  $("input[name=subscribers_mname]").val();
  var subscribers_lname =  $("input[name=subscribers_lname]").val();
  var subscribers_dob =  $("input[name=subscribers_dob]").val();
  var subscribers_sex =  $("#subscribers_sex :selected").val();
  var subscribers_ssn =  $("input[name=subscribers_ssn]").val();
  var subscribers_address1 =  $("input[name=subscribers_address1]").val();
  var subscribers_address2 =  $("input[name=subscribers_address2]").val();
  var subscribers_city =  $("input[name=subscribers_city]").val();
  var subscribers_state =  $("input[name=subscribers_state]").val();
  var subscribers_zip =  $("input[name=subscribers_zip]").val();
  var subscribers_primary_number =  $("input[name=subscribers_primary_number]").val();
  var subscribers_primary_ext =  $("input[name=subscribers_primary_ext]").val();
  var subscribers_secondary_number =  $("input[name=subscribers_secondary_number]").val();
  var subscribers_secondary_ext =  $("input[name=subscribers_secondary_ext]").val();
  var eligiblility =  $("#eligiblility :selected").val();
///exit;


if(payer_name==''){
  $("input[name=payer_name]").focus();
}else if(plan_name_and_type=='')
  {
    $("input[name=plan_name_and_type]").focus();
  }else if(order_of_benefits==''){
    $("input[name=order_of_benefits]").focus();
  }else if(insurance_id==''){
    $("input[name=insurance_id]").focus();
  }else if(effective_from==''){
    $("input[name=effective_from]").focus();
  }else if(eligiblility==''){
    $("#eligiblility").focus();
  }else{
      $.ajax({
          url: BASE_URL+"insurance/creates",
          data: 'status='+status+'&payer_name='+payer_name+'&plan_name_and_type='+plan_name_and_type+'&order_of_benefits='+order_of_benefits+'&workers_compensation='+workers_compensation+'&insurance_id='+insurance_id+'&group_id='+group_id+
          '&effective_from='+effective_from+'&effective_to='+effective_to+'&relation_to_insured='+relation_to_insured+'&copay_type='+copay_type+'&copay_amount='+copay_amount+'&claim_number='+claim_number+'&notes='+notes+'&employer_name='+employer_name+'&employer_address1='+employer_address1+'&employer_address2='+employer_address2+'&city='+city+'&state='+state+'&zip='+zip+'&subscribers_fname='+subscribers_fname+'&subscribers_mname='+subscribers_mname+'&subscribers_lname='+subscribers_lname+
          '&subscribers_dob='+subscribers_dob+'&subscribers_sex='+subscribers_sex+'&subscribers_ssn='+subscribers_ssn+'&subscribers_address1='+subscribers_address1+'&subscribers_address2='+subscribers_address2+'&subscribers_city='+subscribers_city+'&subscribers_state='+subscribers_state+'&subscribers_zip='+subscribers_zip+'&subscribers_primary_number='+subscribers_primary_number+'&subscribers_primary_ext='+subscribers_primary_ext+'&subscribers_secondary_number='+subscribers_secondary_number+
          '&subscribers_secondary_ext='+subscribers_secondary_ext+'&eligiblility='+eligiblility,
          success: function(msg){
//alert(msg);
              var myObj = JSON.parse(msg);
//$("#add").empty();
//$(".table-fixed").empty();
$('#insurance').modal('toggle');
 $("#insurance_u_id").val(myObj.insurance_u_id);
  // alert(v);
  // alert(myObj.insurance_u_id);
              if(myObj!=''){
                  //alert(myObj);
                  //$(".table-fixed").empty();


                //  $.each(myObj, function(index,value) {
                  //  var c = myObj[index].insurance_u_id;
                  //  var v =   $("#insurance_u_id").val(c);

                      txt = '<tr><td>'+myObj.payer_name+'</td><td>'+myObj.plan_name_and_type+'</td><td>'+myObj.insurance_id+'</td><td>'+myObj.effective_from+'</td><td>'+myObj.effective_to+'</td><td>'+myObj.copay_type+'</td><td>'+myObj.eligiblility+'</td><td>'+myObj.status+'</td></tr>';
                      $("#in").append(txt);

                  //});
              }else{
                  $("#in").empty();

                  // $.each(myObj, function(index,value) {
                  //  alert(myObj[index].email);
                  //$(".item").empty();
                  txt= ' No data found ';
                  $("#in").append(txt);

                  // });
              }
          }
      });
    }
    }
    //$("#outhide").mouseout(function(){
    //  $("#suggesstion-box").hide();
    //});
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.5.0/css/intlTelInput.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.5.0/js/intlTelInput.js"></script>
<script>
$("#mobile").intlTelInput({
autoHideDialCode: true,
autoPlaceholder: true,
separateDialCode: true,
nationalMode: true,
geoIpLookup: function (callback) {
    $.get("https://ipinfo.io", function () {}, "jsonp").always(function (resp) {
        var countryCode = (resp && resp.country) ? resp.country : "";
        //
      //  alert(resp);
        //console.log(resp);
        callback(countryCode);
    });
},
initialCountry: "auto",
});

// get the country data from the plugin
var countryData = $.fn.intlTelInput.getCountryData(),
telInput = $("#mobile"),
addressDropdown = $("#listcountry");
//alert(countryData);
// init plugin
telInput.intlTelInput({
utilsScript: "../wp-content/themes/saba/build/js/utils.js" // just for formatting/placeholders etc
});

// populate the country dropdown
$.each(countryData, function(i, country) {
  //console.log(country);

addressDropdown.append($("<option></option>").attr("value", country.iso2).text(country.name));
});

// listen to the telephone input for changes
telInput.on("countrychange", function() {
  var a = telInput.intlTelInput("getSelectedCountryData").dialCode;
  //alert(a);
  $("#mobile_prefix").val(a);
var countryCode = telInput.intlTelInput("getSelectedCountryData").iso2;
addressDropdown.val(countryCode);
});

// trigger a fake "change" event now, to trigger an initial sync
telInput.trigger("countrychange");

// listen to the address dropdown for changes
addressDropdown.change(function() {

var countryCode = $(this).val();
//alert(countryCode);
telInput.intlTelInput("setCountry", countryCode);
});
    </script>
