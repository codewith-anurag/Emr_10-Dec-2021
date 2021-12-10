<div class="row">

    <!--  form area -->

    <div class="col-sm-12">

        <div  class="panel panel-default thumbnail">



            <div class="panel-heading no-print">

                <div class="btn-group">

                    <a class="btn btn-primary" href="<?php echo base_url("patient") ?>"> <i class="fa fa-list"></i>  <?php echo display('patient_list') ?> </a>

                </div>

            </div>



            <div class="panel-body panel-form">

                <div class="row">

                    <div class="col-md-9 col-sm-12">



                        <?php echo form_open_multipart('patient/createvital','class="form-inner"') ?>



                            <?php echo form_hidden('vital_id',$patient->vital_id); ?>  <!--it may be vital id -->



                            <div class="form-group row">

                                <label for="patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_id')?> <i class="text-danger">*</i></label>

                                <div class="col-xs-9">

                                    <input name="patient_id"  type="text" class="form-control" id="patient_id" placeholder="<?php echo display('patient_id')?>" value="">

                                </div>

                            </div>




                            <div class="form-group row">

                                <label for="pulse" class="col-xs-3 col-form-label"><?php echo display('pulse') ?> <i class="text-danger">*</i></label>

                                <div class="col-xs-9">

                                    <input name="pulse" type="text" class="form-control" id="pulse" placeholder="<?php echo display('reading') ?>" value="<?php echo $patient->pulse ?>">

                                </div>

                            </div>



                            <div class="form-group row">

                                <label for="temperature" class="col-xs-3 col-form-label"><?php echo display('temperature') ?> <i class="text-danger">*</i></label>

                                <div class="col-xs-3">

                                    <input name="temperature" type="text" class="form-control" id="temperature" placeholder="<?php echo display('reading') ?>" value="<?php echo $patient->temperature ?>">

                                </div>
                                <div class="col-xs-3">

                                    <?php

                                        $bloodList = array(

                                            ''   => display('select_option'),

                                            'Axillary(Armpit)' => 'Axillary(Armpit)',



                                        );

                                        echo form_dropdown('temperature_a', $bloodList,'', 'class="form-control" id="temperature_a" '); ////$patient->blood_group

                                    ?>

                                </div>
                            </div>



                            <div class="form-group row">

                                <label for="sytolic" class="col-xs-3 col-form-label"><?php echo display('blood pressure') ?> <i class="text-danger">*</i></label>

                                <div class="col-xs-3">

                                    <input name="blood_pressure_sytolic" type="text" class="form-control" id="sytolic" placeholder="<?php echo display('sytolic') ?>">

                                </div>
                                <div class="col-xs-3">

                                    <input name="blood_pressure_diastolic" type="text" class="form-control" id="diastolic" placeholder="<?php echo display('diastolic') ?>">

                                </div>
                                <div class="col-xs-3">

                                  <?php

                                      $bloodLista = array(

                                          ''   => display('select_option'),

                                          'Sitting' => 'Sitting',
                                          'Standing' => 'Standing'



                                      );

                                      echo form_dropdown('blood_pressure_position', $bloodLista,'', 'class="form-control" id="blood_pressure_position" '); ////$patient->blood_group

                                  ?>

                                </div>
                            </div>



                            <div class="form-group row">

                                <label for="weight" class="col-xs-3 col-form-label"><?php echo display('Weight(kg)') ?></label>

                                <div class="col-xs-9">

                                    <input name="weight" class="form-control" type="text" placeholder="<?php echo display('reading') ?>" id="weight"  value="<?php //echo $patient->phone ?>">

                                </div>

                            </div>



                            <div class="form-group row">

                                <label for="rest_rate" class="col-xs-3 col-form-label"><?php echo display('Rest.Rate(Breaths/min)') ?> <i class="text-danger">*</i></label>

                                <div class="col-xs-9">

                                    <input name="rest_rate" class="form-control" type="text" placeholder="<?php echo display('reading') ?>" id="rest_rate"  value="<?php //echo $patient->mobile ?>">

                                </div>

                            </div>















                            <!-- if patient picture is already uploaded -->















                            <!--<div class="form-group row">

                                <div class="col-sm-offset-3 col-sm-6">

                                    <div class="ui buttons">

                                        <button type="reset" class="ui button"><?php //echo display('reset') ?></button>

                                        <div class="or"></div>

                                        <button class="ui positive button"><?php //echo display('save') ?></button>

                                    </div>

                                </div>

                            </div>
-->
                            <div class="col-xs-12  padding-bottom-30 form-group">
                                <div class="text-left">
                                    <button type="reset" class="btn btn-primary gradient-blue"><?php echo display('reset') ?></button>
                                    <button  class="btn positive"><?php echo display('save') ?></button>
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
