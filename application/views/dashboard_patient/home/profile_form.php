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

.hide {
    display: none;
}
.cropped{
 width:150px!important;
}
/* Crop image box */
</style>
<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            
            <div class="panel-heading no-print">
                <div class="btn-group">
                    <a class="btn btn-primary" href="<?php echo base_url("dashboard_patient/home/profile") ?>"> <i class="fa fa-list"></i> <?php echo display('profile') ?> </a>
                </div>
            </div>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <?php echo form_open_multipart('dashboard_patient/home/form/','class="form-inner"') ?>
                        <?php echo form_hidden('id',$patient->id) ?>
                        
                        <div class="form-group row">
                            <label for="firstname" class="col-xs-3 col-form-label"><?php echo display('first_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-xs-9">
                                <input name="firstname" type="text" class="form-control" id="firstname" placeholder="<?php echo display('first_name') ?>" value="<?php echo $patient->fname ?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-xs-3 col-form-label"><?php echo display('last_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-xs-9">
                                <input name="lastname" type="text" class="form-control" id="lastname" placeholder="<?php echo display('last_name') ?>" value="<?php echo $patient->lname ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-xs-3 col-form-label"><?php echo display('email')?> <i class="text-danger">*</i></label>
                            <div class="col-xs-9">
                                <input name="email" class="form-control" type="text" placeholder="<?php echo display('email')?>" id="email"  value="<?php echo $patient->email ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-xs-3 col-form-label"><?php echo display('password') ?> <i class="text-danger">*</i></label>
                            <div class="col-xs-9">
                                <input name="password" class="form-control" type="password" placeholder="<?php echo display('password') ?>" id="password" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-xs-3 col-form-label"><?php echo display('mobile') ?> <i class="text-danger">*</i></label>
                            <div class="col-xs-9">
                                <input name="mobile" class="form-control" type="text" placeholder="<?php echo display('mobile') ?>" id="mobile"  value="<?php echo $patient->mobile ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-xs-3 col-form-label"><?php echo display('phone') ?></label>
                            <div class="col-xs-9">
                                <input name="phone" class="form-control" type="text" placeholder="<?php echo display('phone') ?>" id="phone"  value="<?php echo $patient->phone ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3"><?php echo display('sex') ?></label>
                            <div class="col-xs-9">
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
                        <div class="form-group row">
                            <label for="blood_group" class="col-xs-3 col-form-label"><?php echo display('blood_group') ?> </label>
                            <div class="col-xs-9">
                                <?php
                                $bloodList = array(
                                ''   => display('select_option'),
                                'A+' => 'A+',
                                'A-' => 'A-',
                                'B+' => 'B+',
                                'B-' => 'B-',
                                'O+' => 'O+',
                                'O-' => 'O-',
                                'AB+' => 'AB+',
                                'AB-' => 'AB-'
                                );
                                echo form_dropdown('blood_group', $bloodList, $patient->blood_group, 'class="form-control" id="blood_group" ');
                                ?>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-xs-3 col-form-label"><?php echo display('date_of_birth') ?></label>
                            <div class="col-xs-9">
                                <input name="date_of_birth" class="form-control datepicker" type="text" placeholder="<?php echo display('date_of_birth') ?>" id="date_of_birth"  value="<?php echo $patient->date_of_birth ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-xs-3 col-form-label"><?php echo display('address') ?> <i class="text-danger">*</i></label>
                            <div class="col-xs-9">
                                <textarea name="address" class="form-control" id="address" placeholder="<?php echo display('address') ?>" maxlength="140" rows="7"><?php echo $patient->address ?></textarea>
                            </div>
                        </div>
                        <!-- if employee picture is already uploaded -->
                        <?php if(!empty($patient->picture)) {  ?>
                        <div class="form-group row">
                            <label for="picturePreview" class="col-xs-3 col-form-label"></label>
                            <div class="col-xs-9">
                                <img src="<?php echo base_url($patient->picture) ?>" alt="Picture" height="150"/>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group row">
                            <label for="picture" class="col-xs-3 col-form-label"><?php echo display('picture') ?></label>
                            <div class="col-xs-9">
                                <input type="file" name="picture" id="picture" value="<?php echo $patient->picture ?>">
                                <input type="hidden" name="old_picture" value="<?php echo $patient->picture ?>">
                                <input type="hidden" name="croppicture" id="croppicture">
                            </div>
                        </div>
                        <!-- image Crope -->
                        <div class="row form-row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                <div class="col-xs-3">
                                
                                </div>
                                <div class="col-xs-3">
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
                                    <div class="col-xs-6">
                                        <div class="box-2 img-result hide">
                                            <img class="cropped" src="" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- image Crope -->
                        
                        <div class="form-group row">
                            <label class="col-sm-3"><?php echo display('status') ?></label>
                            <div class="col-xs-9">
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
                        <div class="form-group row">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="ui buttons">
                                   <!--  <button type="reset" class=" btn btn-default"><?php echo display('reset') ?></button>
                                    <div class="or"></div> -->
                                    <?php if($patient->id){?>
                                    <button type="submit" class="btn btn-default"><span class="fa fa-check" aria-hidden="true"></span> <?php echo display('update') ?></button>
                                <?php }else{?>
                                    <button type="submit" class="btn btn-default"><span class="fa fa-check" aria-hidden="true"></span> <?php echo display('save') ?></button>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>