<style type="text/css">
    .profile_pic{
        width: 70px;
    }
</style>
<div class="row">
    <div class="col-sm-12" id="PrintMe">
        <div  class="panel panel-default thumbnail">
            <div class="panel-heading no-print">
                <div class="btn-group">
                    <button type="button" onclick="printContent('PrintMe')" class="btn btn-success" ><i class="fa fa-print"></i></button>
                    <a href="<?php echo base_url('dashboard_patient/home/form') ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <h4>
                    <img alt="Picture" class="profile_pic" src="<?php echo (!empty($user->picture)?base_url($user->picture):base_url("assets/images/no-img.png")) ?>" width="70">
                    <?php echo $user->firstname.' '.$user->lastname
                    //$this->session->userdata('fullname')
                    ?>
                </h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <?php if(!empty($user->firstname)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable">Name</th>
                                <td><?php echo $user->firstname.' '.$user->lastname ?></td>
                            </tr>
                             <?php } ?>
                            <?php if(!empty($user->patient_id)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable"><?php echo display('patient_id') ?></th>
                                <td><?php echo $user->patient_id ?></td>
                            </tr>
                            <?php } ?>
                            <?php if(!empty($user->email)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable"><?php echo display('email') ?></th>
                                <td>
                                    <?php echo $user->email ?>
                                </td>
                            </tr>
                            <?php } ?>
                        <?php if(!empty($user->address)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable"><?php echo display('address') ?></th>
                                <td><?php echo $user->address ?></td>
                            </tr>
                        <?php } ?>

                        <?php if(!empty($user->city)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable">City</th>
                                <td><?php echo $user->city ?></td>
                            </tr>
                        <?php } ?>
                        <?php if(!empty($user->state)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable">State</th>
                                <td><?php echo $user->state ?></td>
                            </tr>
                        <?php } ?>
                        <?php if(!empty($user->country)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable">Country</th>
                                <td><?php echo $user->country ?></td>
                            </tr>
                        <?php } ?>
                        <?php if(!empty($user->zipcode)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable">Zipcode</th>
                                <td><?php echo $user->zipcode ?></td>
                            </tr>
                        <?php } ?>
                        <?php if(!empty($user->mobile)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable"><?php echo display('mobile') ?></th>
                                <td><?php echo $user->mobile ?></td>
                            </tr>
                        <?php } ?>
                        <?php if(!empty($user->date_of_birth)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable"><?php echo display('date_of_birth') ?></th>
                                <td><?php echo date('d-m-Y',strtotime($user->date_of_birth)) ?></td>
                            </tr>
                        <?php } ?>
                        <?php if(!empty($user->sex)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable"><?php echo display('sex') ?></th>
                                <td><?php echo $user->sex ?></td>
                            </tr>
                        <?php } ?>
                        <?php if(!empty($user->create_date)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable"><?php echo display('create_date') ?></th>
                                <td><?php echo date('d-m-Y',strtotime($user->create_date))?></td>
                            </tr>
                        <?php } ?>
                        <?php if(!empty($user->blood_group)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable"><?php echo display('blood_group') ?></th>
                                <td><?php echo date('d-m-Y',strtotime($user->blood_group))?></td>
                            </tr>
                        <?php } ?>
                            <?php if(!empty($user->status)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable"><?php echo display('status') ?></th>
                                <td><?php echo (!empty($user->status)? display('active'):display('inactive'))?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <div class="panel-footer">
                <div class="text-left">
                    <a href="<?php //echo base_url('dashboard_doctor/home/form'); ?>" class="btn btn-default">Update Profile</a>
                </div>
            </div> -->
        </div>
    </div>

</div>
