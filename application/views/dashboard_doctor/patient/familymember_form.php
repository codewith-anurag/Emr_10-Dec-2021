<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
    .select2-container {
        width: 100% !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #5785e8 !important;
    }
    .select2-container--default .select2-selection--single {
      border: 1px solid #e1e1e1 !important;
    }
    .select2-results__option[aria-selected] {
       color: #5785e8;
    }
    .select2-container-multi .select2-choices .select2-search-field input{
        padding: 15px;
        margin: 1px 0;
        font-family: sans-serif;
        font-size: 100%;
        color: #666;
        outline: 0;
        border: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
        background: 0 0!important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
            border: 1px solid #5a87e8 !important;
            background-color: #ffffff !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    background: transparent !important;
    outline: none !important;
    border: none !important;
}
.select2-selection__choice__remove span {
        background: #150aec !important;
    padding: 0px 5px !important;
    border-radius: 100% !important;
    color: #fff !important;
}
.select2-search__field{
  resize: none;
}
.select2-selection  {
        height: 100px;
    overflow-y: auto;
}
</style>

<div class="clearfix"></div>
<div class="col-lg-12 p-0">
                <div class="col-lg-12 col-xs-12 p-0">
                    <section>
                        <header class="panel_header">
                            <?php if(isset($editfamily_member->member_id)) {
                                    $url  = 'dashboard_doctor/patient/patient/edit_familymember';
                                ?>
                                <h2 class="title pull-left" id="form-title">Edit Family Member</h2>
                            <?php }else{
                                    $url  = 'dashboard_doctor/patient/patient/create_familymember';
                                ?>

                                <h2 class="title pull-left" id="form-title">Create Family Member</h2>
                            <?php }  ?>
                        </header>
                    <?php echo form_open_multipart($url,'class="form-inner"') ?>
                     <?php
                        if(isset($editfamily_member->member_id)) {
                            echo form_hidden('member_id',$editfamily_member->member_id);
                            echo form_hidden('patient_id',$editfamily_member->patient_id);
                        }
                    ?>
                    <div class="row ml-10 mr-10">
                        <div class="col-12 col-md-2 form-group">
                          <label>Relation to patient</label>
                            <select class="form-control" name="relation_to_patient" id="relation_to_patient" required="required">
                                  <option value="">Select Relation to patient</option>
                                  <option value="father" <?php echo ($editfamily_member->relation_to_patient == "father") ? "selected='selected'" : ""; ?>>Father</option>
                                  <option value="mother" <?php echo ($editfamily_member->relation_to_patient == "mother") ? "selected='selected'" : ""; ?>>Mother</option>
                                  <option value="daughter" <?php echo ($editfamily_member->relation_to_patient == "daughter") ? "selected='selected'" : ""; ?>>Daughter</option>
                                  <option value="son" <?php echo ($editfamily_member->relation_to_patient == "son") ? "selected='selected'" : ""; ?>>Son</option>
                                  <option value="granddaughter" <?php echo ($editfamily_member->relation_to_patient == "granddaughter") ? "selected='selected'" : ""; ?>>Granddaughter</option>
                                  <option value="drandson" <?php echo ($editfamily_member->relation_to_patient == "drandson") ? "selected='selected'" : ""; ?>>Grandson</option>
                                  <option value="brother" <?php echo ($editfamily_member->relation_to_patient == "brother") ? "selected='selected'" : ""; ?>>Brother</option>
                                  <option value="sister" <?php echo ($editfamily_member->relation_to_patient == "sister") ? "selected='selected'" : ""; ?>>Sister</option>
                                  <option value="halfbrother" <?php echo ($editfamily_member->relation_to_patient == "halfbrother") ? "selected='selected'" : ""; ?>>Half Brother</option>
                                  <option value="halfsister" <?php echo ($editfamily_member->relation_to_patient == "halfsister") ? "selected='selected'" : ""; ?>>Half Sister</option>
                            </select>
                               <?php
                                    if(!isset($editfamily_member->member_id)) {
                               ?>
                             <input type="hidden" name="patient_id" class="form-control" value="<?php echo $this->uri->segment(5); ?>">
                         <?php } ?>
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label>Name<span class="imp-red">*</span></label>
                            <input type="text" id="name" name="name" class="form-control text-field" value="<?php echo ($editfamily_member->name != "") ? $editfamily_member->name : ""; ?>"  placeholder=" Name" required="required" >
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label>Family name</label>
                            <input type="text" name="family_name" class="form-control text-field"  value="<?php echo ($editfamily_member->family_name != "") ? $editfamily_member->family_name : ""; ?>" id="family_name" required="required">
                        </div>
                        <div class="col-12 col-md-2 form-group">
                            <label>PREFIX</label>
                            <select class="form-control" name="prefix" id="prefix" required="required">
                                <option value="">Select Prefix</option>
                                <option <?php echo ($editfamily_member->prefix=='Mr.')?'Selected':''; ?> value="Mr.">Mr.</option>
                                <option value="Mrs." <?php echo ($editfamily_member->prefix=='Mrs.')?'Selected':''; ?> >Mrs.</option>
                                <option value="Ms." <?php echo ($editfamily_member->prefix=='Ms.')?'Selected':''; ?> >Ms.</option>
                            </select>
                        </div>
                    </div>
                    <div class="row ml-10 mr-10">
                        <div class="col-12 col-md-2 form-group" >
                            <label>SUFFIX</label>
                            <input type="text" name="suffix" class="form-control text-field" value="<?php echo ($editfamily_member->suffix != "") ? $editfamily_member->suffix : ""; ?>" id="suffix" required="required">
                        </div>

                      <div class="col-12 col-md-2 form-group">
                        <label>Age</label>
                        <input type="number" name="age" class="form-control text-field" value="<?php echo ($editfamily_member->age != "") ? $editfamily_member->age : ""; ?>"  placeholder="Age" required="required">
                      </div>
                       <div class="col-12 col-md-3 form-group">
                        <label>Birth date</label>
                           <input type="text" name="date_of_birth" value="<?php echo ($editfamily_member->birth_date != "") ? $editfamily_member->birth_date : ""; ?>" data-date-format='yyyy-mm-dd'  class="form-control text-field" id="dob" required="required">
                      </div>
                       <div class="col-12 col-md-3 form-group">
                            <label>Deceased age</label>
                            <input type="number" name="deceased_age" value="<?php echo ($editfamily_member->deceased_age != "") ? $editfamily_member->deceased_age : ""; ?>"  class="form-control text-field" id="deceased_age" required="required">
                        </div>
                    </div>
                    <div class="row ml-10 mr-10 mb-10">
                        <div class="col-12 col-md-4 form-group">
                            <label>Races</label>
                            <select class="form-control select2 races" multiple="multiple" id="races" name="races[]" required="required">
                                <option value="" selected="Selected" disabled="">Select Races</option>
                                <?php
                                $selected = "";
                                if (!empty($races_result)) {
                                        $races =  explode(",", $editfamily_member->races);
                                    foreach ($races_result as  $races_resultvalue) {
                                        if (in_array($races_resultvalue->name, $races)) {
                                            $selected = "selected='selected'";
                                        }else{
                                            $selected = "";
                                        }
                                ?>
                                    <option value="<?php echo $races_resultvalue->name;?>" <?php echo $selected; ?>><?php echo $races_resultvalue->name;?></option>
                                <?php }
                                   }
                                 ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label>Ethnicities</label>
                            <select class="form-control select2 ethnicities" multiple="multiple" id="ethnicities" name="ethnicities[]" required="required">
                                 <option value="" selected="Selected" disabled="">Select Ethnicities</option>
                                <?php
                                if (!empty($ethnicities_result)) {
                                    $ethnicities =  explode(",", $editfamily_member->ethnicities);
                                    foreach ($ethnicities_result as  $ethnicities_resultvalue) {
                                        if (in_array($ethnicities_resultvalue->name, $ethnicities)) {
                                            $selected = "selected='selected'";
                                        }else{
                                            $selected = "";
                                        }
                                ?>
                                    <option value="<?php echo $ethnicities_resultvalue->name;?>" <?php echo $selected; ?>><?php echo $ethnicities_resultvalue->name; ?></option>
                                <?php }
                                 }
                                ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label>Gender<span class="imp-red">*</span></label>
                            <select class="form-control" name="gender" id="gender" required="required">
                                <option value="">Select Gender</option>
                                <option value="Male" <?php echo ($editfamily_member->gender=='Male')?'Selected':''; ?> >Male</option>
                                <option value="Female" <?php echo ($editfamily_member->gender=='Female')?'Selected':''; ?> >Female</option>
                            </select>
                        </div>
                    </div>
            <div class="text-center mb-10 mt-10">
                <button type="submit" class="btn btn-default mb-0" >Save</button>
                <a href="<?php echo base_url().'patient/familymember/'.$this->uri->segment(3); ?>"><button type="button" class="btn btn-default mb-0">Back</button></a>
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
