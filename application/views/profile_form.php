<style type="text/css">
	/* Crop image box css */
.box-2 {
    padding: 0em;
    width: calc(100% - 1em);
}

.options label,
.options input{
    width:4em;
    padding:0.5em 1em;
    display: none;
}
.btn{
    background:white;
    color:black;
    border:1px solid black;
    padding: 0.5em 1em;
    text-decoration:none;
    margin:0.8em 0.3em;
    display:inline-block;
    cursor:pointer;
}
.cropped{
	width: 150px!important;
}
.hide {
    display: none;
}
/* Crop image box */
</style>
<div class="row">
    <!--  form area -->
    <div class="col-lg-8">
        <div  class="panel panel-default thumbnail" style="padding: 0px;border: 0px solid #ddd;">
            <div class="panel-heading no-print" style="margin-bottom:10px">
                <div class="btn-group">
                    <a class="btn btn-default" href="<?php echo base_url("dashboard/profile") ?>"> <i class="fa fa-list"></i>  <?php echo display('profile') ?> </a>
                </div>
            </div>
				<!-- MAIN CONTENT AREA STARTS -->
				<div class="col-lg-8" style="width: 100%;margin-right: 2%; margin-bottom: 30px; border: 1px solid #e8e8e8;padding-left: 13px;">
                        <div class="col-lg-12 col-xs-12" style="margin-top: -15px;">
                            <section class="box">
                                <header class="panel_header">
                                    <h2 class="title pull-left" id="form-title">Update User Profile</h2>
                                    <div class="actions panel_actions pull-right">
                                        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                                    </div>
                                </header>
                                <div class="col-lg-12 col-xs-12" style="margin-top: 15px;margin-left: 5px;">
	                                <p>To update user's First name, Last name, Gender and press the update button </p>
	                            </div>
                                <div class="content-body">
                                <div class="row">
                               <?php echo form_open_multipart('dashboard/form/','class="form-inner"') ?>
                                        <?php echo form_hidden('user_id',$doctor->user_id) ?>
									<div class="row form-row">
										<div class="col-xs-12">
											<div class="form-group">
											<div class="col-xs-4">
												<label class="form-label" for="first_name"><?php echo display('first_name') ?><span class="required">*</span></label>
											</div>
											<div class="col-xs-8">
													<input name="firstname" type="text" class="form-control text-field"  placeholder="<?php echo display('first_name') ?>" value="<?php echo $doctor->firstname ?>">
												</div>
											</div>
										</div>
									</div>
									<div class="row form-row">
										<div class="col-xs-12">
											<div class="form-group">
											<div class="col-xs-4">
												<label class="form-label" for="last_name"><?php echo display('last_name') ?><span class="required">*</span></label>
											</div>
											<div class="col-xs-8">
													<input name="lastname" type="text" class="form-control text-field"  placeholder="<?php echo display('lastname') ?>" value="<?php echo $doctor->lastname ?>">
												</div>
											</div>
										</div>
									</div>
									<div class="row form-row">
										<div class="col-xs-12">
											<div class="form-group">
											<div class="col-xs-4">
												<label class="form-label" for="email"><?php echo display('email')?> <i class="text-danger">*</i></label>
											</div>
											<div class="col-xs-8">
													<input name="email" class="form-control text-field" type="text" placeholder="<?php echo display('email')?>" id="email"  value="<?php echo $doctor->email ?>">
												</div>
											</div>
										</div>
									</div>
									<div class="row form-row">
										<div class="col-xs-12">
											<div class="form-group">
											<div class="col-xs-4">
												<label class="form-label" for="password"><?php echo display('password') ?> <i class="text-danger">*</i></label>
											</div>
											<div class="col-xs-8">
													<input name="password" class="form-control text-field" autocomplete="new-password" type="password" placeholder="<?php echo display('password') ?>" id="password" >
												</div>
											</div>
										</div>
									</div>
									<div class="row form-row">
										<div class="col-xs-12">
											<div class="form-group">
											<div class="col-xs-4">
												<label class="form-label" for="mobile"><?php echo display('mobile') ?> <i class="text-danger">*</i></label>
											</div>
											<div class="col-xs-8">
													<input name="mobile" class="form-control" type="text" placeholder="<?php echo display('mobile') ?>" id="mobile"  value="<?php echo $doctor->mobile ?>" maxlength="15">
												</div>
											</div>
										</div>
									</div>
									<div class="row form-row">
										<div class="col-xs-12">
											<div class="form-group">
											<div class="col-xs-4">
												<label class="form-label" for="gender"><?php echo display('sex') ?></label>
											</div>
											    <div class="col-xs-8">
													<div class="form-check">
                                                        <label class="radio-inline">
                                                        <input type="radio" name="sex" value="Male" <?php echo  set_radio('sex', 'Male', TRUE); ?> ><?php echo display('male') ?>
                                                        </label>
                                                        <label class="radio-inline">
                                                        <input type="radio" name="sex" value="Female" <?php echo  set_radio('sex', 'Female'); ?> ><?php echo display('female') ?>
                                                        </label>
                                                        <label class="radio-inline">
                                                        <input type="radio" name="sex" value="Other" <?php echo  set_radio('sex', 'Other'); ?> ><?php echo display('other') ?>
                                                        </label>
                                                    </div>
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
													<input type="text" value="<?php echo $doctor->date_of_birth ?>" name="date_of_birth" class="datepicker_new form-control text-field" id="birth_date">
												</div>
											</div>
										</div>
									</div>

									<div class="row form-row">
										<div class="col-xs-12">
											<div class="form-group">
											<div class="col-xs-4">
												<label class="form-label" for="address"><?php echo display('address') ?> <i class="text-danger">*</i></label>
											</div>
											<div class="col-xs-8">
													<textarea name="address" class="form-control" id="address text-field" placeholder="<?php echo display('address') ?>" maxlength="140" rows="5"><?php echo $doctor->address ?></textarea>
												</div>
											</div>
										</div>
									</div>
									<?php
									$getHospitalId = $this->session->userdata('hospital_id');
									$labelName = 'Logo';
									if($getHospitalId){
										$labelName ='Picture';
									 }
									?>
									<div class="row form-row">
										<div class="col-xs-12">
											<div class="form-group">
											<div class="col-xs-4">
												<label class="form-label" for="picture"><?php echo $labelName;?></label>
											</div>
											<div class="col-xs-8">
													<input type="file" name="picture" id="picture" class="form-control text-field" value="<?php echo $doctor->picture ?>">
                                                    <input type="hidden" name="old_picture" value="<?php echo $doctor->picture ?>">
                                                    <input type="hidden" name="croppicture" id="croppicture">
												</div>
											</div>
										</div>
									</div>
									<!-- if employee picture is already uploaded -->
                                    <?php if(!empty($doctor->picture)) {  ?>
									<div class="row form-row">
										<div class="col-xs-12">
											<div class="form-group">
											<div class="col-xs-4">
												<label class="form-label" for="img-thumbnail">Old <?php echo $labelName;?></label>
											</div>
											<div class="col-xs-8">
													<img src="<?php echo base_url($doctor->picture) ?>" alt="Picture" class="img-thumbnail" style="width:150px;">
													<a href="<?php echo base_url();?>dashboard/delete_profile_pic/<?php echo $doctor->user_id;?>" class="btn btn-xs btn-danger" onclick="return confirm('Are You Sure ?') "> <i class="fa fa-trash"></i></a>
												</div>
											</div>
										</div>
									</div>
									<?php } ?>
									<!-- image Crope -->
									<div class="row form-row">
										<div class="col-xs-12">
											<div class="form-group">
											<div class="col-xs-4">

											</div>
											<div class="col-xs-4">
													<div class="box-2">
														<div class="result"></div>
													</div>
													<div class="box1">
														<div class="options hide">
															<label> Width</label>
															<input type="number" class="img-w" value="300" min="100" max="600" />
														</div>
														<button class="btn save hide">Crop</button>
													</div>
												</div>
												<div class="col-xs-4">
													<div class="box-2 img-result hide">
														<img width="150px" class="cropped" src="" alt="">
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- image Crope -->

                  <div class="row form-row">
                    <div class="col-xs-12">
                        <div class="form-group">
                    <div class="col-xs-4">
                       <label class="form-label">Paypal Client ID</label>
                        </div>
                       <div class="col-xs-8">
                       <input type="text" name="client_id" value="<?php echo $doctor->client_id; ?>"  class="form-control text-field" id="client_id">
                     </div>
                   </div>
                   </div>
                   </div>
                   <div class="row form-row">
                   <div class="col-xs-12">
                       <div class="form-group">
                    <div class="col-xs-4">
                       <label class="form-label" >Paypal Secret</label>
                       </div>
                       <div class="col-xs-8">
                       <input type="text" name="secret" value="<?php echo $doctor->secret; ?>" class="form-control text-field" id="secret">
                     </div>
                   </div>
                  </div>
                  </div>
									<?php

									/*?>
									<div class="row form-row">
										<div class="col-xs-12">
											<div class="form-group">
											<div class="col-xs-4">
												<label class="form-label" for="department_id"><?php echo display('status') ?> <span class="required">*</span></label>
											</div>
											<div class="col-xs-8">
												 <div class="form-check">
                                                    <label class="radio-inline">
                                                    <input type="radio" name="status" value="1" <?php echo  set_radio('status', '1', TRUE); ?> ><?php echo display('active') ?>
                                                    </label>
                                                    <label class="radio-inline">
                                                    <input type="radio" name="status" value="0" <?php echo  set_radio('status', '0'); ?> ><?php echo display('inactive') ?>
                                                    </label>
                                                </div>
												</div>
											</div>
										</div>
									</div>
									<?php */?>
                                    <div class="col-xs-12  padding-bottom-30 col-xs-offset-4">
                                        <div class="text-left">
                                            <button type="submit" class="btn btn-default"><span class="fa fa-check" aria-hidden="true"></span> <?php echo display('update') ?></button>
                                            <button type="button" class="btn btn-default" onclick="goBack()"><span class="fa fa-times"></span> Cancel</button>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>
                                    </div>
                                </div>
                            </section>
                        </div>
				</div>



        </div>
    </div>

</div>
