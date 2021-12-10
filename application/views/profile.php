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
                    <button type="button" onclick="printContent('PrintMe')" class="btn btn-default"  style="margin-right:10px;"><i class="fa fa-print"></i></button>
                    <a href="<?php echo base_url('dashboard/form/') ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                </div>
            </div>
                        <div class="panel-body">
                <?php
                    $userRoles = array(
                        '0' => display('superadmin'),
                        '1' => display('admin'),
                        '2' => display('doctor'),
                        '3' => display('accountant'),
                        '4' => display('laboratorist'),
                        '5' => display('nurse'),
                        '6' => display('pharmacist'),
                        '7' => display('receptionist'),
                        '8' => display('representative')
                    );
                ?>
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
                            <?php if(!empty($userRoles[$user->user_role])) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable">Role</th>
                                <td><?php echo $userRoles[$user->user_role]?></td>
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
                            <?php if(!empty($user->designation)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable"><?php echo display('designation') ?></th>
                                <td><?php echo $user->designation ?></td>
                            </tr>
                            <?php } ?>

                        <?php if(!empty($user->department)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable"><?php echo display('department') ?></th>
                                <td> <?php echo $user->department ?></td>
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
                        <?php if(!empty($user->update_date)) { ?>
                            <tr>
                                <th width="15%" class="viewdata-lable"><?php echo display('update_date') ?></th>
                                <td><?php echo date('d-m-Y',strtotime($user->update_date))?></td>
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
            <div class="panel-footer">
                <div class="text-left">
                    <a href="<?php echo base_url('dashboard/form'); ?>" class="btn btn-default">Update Profile</a>
                </div>
            </div>
            <?php /*<div class="panel-body">
                <div class="row">
                    <div class="col-sm-12" align="center">
                        <br>
                    </div>
                    <div class="col-sm-4" align="center">
                        <img alt="Picture" src="<?php echo (!empty($user->picture)?base_url($user->picture):base_url("assets/images/no-img.png")) ?>" style="width:200px;height:200px;">
                        <h4>
                        <?php echo $this->session->userdata('fullname') ?>
                        (<?php
                        $userRoles = array(
                        '1' => display('admin'),
                        '2' => display('doctor'),
                        '3' => display('accountant'),
                        '4' => display('laboratorist'),
                        '5' => display('nurse'),
                        '6' => display('pharmacist'),
                        '7' => display('receptionist'),
                        '8' => display('representative')
                        );
                        echo $userRoles[$user->user_role];
                        ?>)
                        </h4>
                    </div>
                    <div class="col-sm-8">
                        <dl class="dl-horizontal">
                            <?php if(!empty($user->email)) { ?>
                            <dt><?php echo display('email') ?></dt><dd><?php echo $user->email ?></dd>
                            <?php } ?>
                            <?php if(!empty($user->designation)) { ?>
                            <dt><?php echo display('designation') ?></dt><dd><?php echo $user->designation ?></dd>
                            <?php } ?>
                            <?php if(!empty($user->department)) { ?>
                            <dt><?php echo display('department') ?></dt><dd><?php echo $user->department ?></dd>
                            <?php } ?>
                            <?php if(!empty($user->address)) { ?>
                            <dt><?php echo display('address') ?></dt><dd><?php echo $user->address ?></dd>
                            <?php } ?>
                            <?php if(!empty($user->phone)) { ?>
                            <dt><?php echo display('phone') ?></dt><dd><?php echo $user->phone ?></dd>
                            <?php } ?>
                            <?php if(!empty($user->mobile)) { ?>
                            <dt><?php echo display('mobile') ?></dt><dd><?php echo $user->mobile ?></dd>
                            <?php } ?>

                            <?php if(!empty($user->sex)) { ?>
                            <dt><?php echo display('sex') ?></dt><dd><?php echo $user->sex ?></dd>
                            <?php } ?>

                            <?php if(!empty($user->education_degree)) { ?>
                            <dt><?php echo display('education_degree') ?></dt><dd><?php echo $user->education_degree ?></dd>
                            <?php } ?>

                            <?php if(!empty($user->create_date)) { ?>
                            <dt><?php echo display('create_date') ?></dt><dd><?php echo $user->create_date ?></dd>
                            <?php } ?>

                            <?php if(!empty($user->update_date)) { ?>
                            <dt><?php echo display('update_date') ?></dt><dd><?php echo $user->update_date ?></dd>
                            <?php } ?>

                            <?php if(!empty($user->status)) { ?>
                            <dt><?php echo display('status') ?></dt><dd><?php echo (!empty($user->status)?
                            display('active'):display('inactive')) ?></dd>
                            <?php } ?>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="text-center">
                    <strong><?php echo $this->session->userdata('title') ?></strong>
                    <p class="text-center"><?php echo $this->session->userdata('address') ?></p>
                </div>
            </div> */ ?>
        </div>
    </div>

</div>
