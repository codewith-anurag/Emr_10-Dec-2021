<div class="clearfix"></div>
<div class="col-lg-6" style="width: 60%;margin-right: 2%;border: 1px solid #e8e8e8;">
                <div class="col-lg-12 col-xs-12">
                    <section class="box">
                        <header class="panel_header">
                            <h2 class="title pull-left" id="form-title">
<?php if(isset($patient->id)){
  ?>
  Edit Patient Account
<?php }else{ ?>
Create Patient Account

<?php }
?>                              </h2>
                            <div class="actions panel_actions pull-right">
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                            </div>
                        </header>
                        <div class="col-lg-12 col-xs-12" style="margin-top: -15px;margin-left: 5px;">
                        <p>Enter new patient's First name, Last name, Gender and press the create button </p>
                    </div>
                        <div class="content-body">
                        <div class="row">
                          <?php echo form_open_multipart('patient/create','class="form-inner"') ?>

                             <?php echo form_hidden('id',$patient->id); ?>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-4">
                <label class="form-label" for="first_name">First Name <span class="required">*</span></label>
              </div>
              <div class="col-xs-8">
                  <input type="text" name="firstname" value="<?php echo $patient->firstname ?>" class="form-control text-field" id="firstname">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-4">
                <label class="form-label" for="last_name">Last Name <span class="required">*</span></label>
              </div>
              <div class="col-xs-8">
                  <input type="text" name="lastname" value="<?php echo $patient->lastname ?>" class="form-control text-field" id="lastname">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-4">
                <label class="form-label" for="gender">Gender <span class="required">*</span></label>
              </div>
              <div class="col-xs-8">
                   <select class="form-control" name="sex" id="sex">
                                                <option value="">Select Gender</option>
                                                <option value="Male" <?php echo ($patient->sex=='Male')?'Selected':''; ?> >Male</option>
                                                <option value="Female" <?php echo ($patient->sex=='Female')?'Selected':''; ?> >Female</option>
                                                <option value="other" <?php echo ($patient->sex=='Other')?'Selected':''; ?> >Other</option>
                                            </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-4">
                <label class="form-label" for="birth_date">Birth Date</label>
              </div>
              <div class="col-xs-8">
                  <input type="text" name="date_of_birth" value="<?php echo $patient->date_of_birth ?>" class="datepicker_new form-control text-field" id="date_of_birth">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-4">
                <label class="form-label" for="email">Email<span class="required">*</span></label>
              </div>
              <div class="col-xs-8">
                  <input type="email" name="email" class="form-control text-field" value="<?php echo $patient->email ?>" id="email">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-4">
                <label class="form-label" for="mobile">Mobile<span class="required">*</span></label>
              </div>
              <div class="col-xs-8">
                  <input type="text" name="mobile" class="form-control text-field" id="mobile" maxlength="15" value="<?php echo $patient->mobile ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-4">
                <label class="form-label" for="address">Address<span class="required">*</span></label>
              </div>
              <div class="col-xs-8">
                  <textarea  name="address" class="form-control text-field" id="address"><?php echo $patient->address ?>
                  </textarea>
                </div>
              </div>
            </div>
          </div>
          <?php if(isset($patient->id)){
            ?>
            <?php if(!empty($patient->picture)) {  ?>
            <div class="row form-row">
              <div class="col-xs-12">
                <div class="form-group">
                <div class="col-xs-4">
                  <label class="form-label" for="picturePreview"></label>
                </div>
                <div class="col-xs-8">
                    <img src="<?php echo base_url($patient->picture) ?>" alt="Picture" class="img-thumbnail" style="height: 250px;width:250px;" />
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-4">
                <label class="form-label" for="picture">Picture</label>
              </div>
              <div class="col-xs-8">
                  <input type="file" name="picture" class="form-control text-field" id="picture" maxlength="15" value="<?php echo $patient->picture ?>">
                  <input type="hidden" name="old_picture" value="<?php echo $patient->picture ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-4">
                <label class="form-label" for="status">Status</label>
              </div>
              <div class="col-xs-8">
                   <select class="form-control" name="status" id="status">

                                                <option value="1" <?php echo ($patient->status=='1')?'Selected':''; ?> >Active</option>
                                                <option value="0" <?php echo ($patient->status=='0')?'Selected':''; ?> >inactive</option>

                                            </select>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="row form-row">
          <div class="col-xs-12">
            <div class="form-group">
            <div class="col-xs-4">
              <label class="form-label" for="insurance">Insurance</label>
            </div>
            <div class="col-xs-8">
                <input type="text" name="insurance" class="form-control text-field" id="insurance" maxlength="15" value="<?php echo $patient->insurance ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row form-row">
          <div class="col-xs-12">
            <div class="form-group">
            <div class="col-xs-4">
              <label class="form-label" for="insurance_file">Insurance File</label>
            </div>
            <div class="col-xs-8">
                <input type="file" name="insurance_file" class="form-control text-field" id="insurance_file" maxlength="15" >
                <input type="hidden" name="old_insurance" value="<?php echo $patient->insurance_file ?>">
              </div>
            </div>
          </div>
        </div>
                            <div class="col-xs-12  padding-bottom-30 col-xs-offset-4">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-default"><span class="fa fa-check" aria-hidden="true"></span> <?php if(isset($patient->id)){ ?>Edit <?php }else{ ?>Create <?php  } ?></button>
                                    <button type="button" class="btn btn-default" onclick="goBack()"><span class="fa fa-times"></span> Cancel</button>
                                </div>
                            </div>
                            </form>
                            </div>
                        </div>
                    </section>
                </div>
</div>
<script>
    function goBack() {
      window.history.back();
    }
</script>
