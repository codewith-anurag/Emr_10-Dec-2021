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



.patient-td-div {

margin-right: 0px;

}

.table-patient  thead {

background: #e8e8e8;

color: #404040;

}

.table-patient{

  display: table;

}

/*.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {

padding: 8px !important;

}*/

table img {

width: 85%;

text-align: center;

}

table td {

border-right: 1px solid #d6d6d6;

}

table thead th {

border-right: 1px solid #d6d6d6 ;

border-color: #d6d6d6 !important;

}

.dropdown-menu.patient {

    position: relative;

    top: 0%;

    left: 0;

}



</style>

<div class="clearfix"></div>

<div class="col-lg-12 white-box" style="width: 100%;margin-right: 2%;min-height: 850px;">

  <section class="box">

    <table class="table" style="border-bottom: 0.5px solid #c6c4c1;">

      <tbody>

        <tr>

          <td width="15%">

            <?php $patient_ID = $this->uri->segment(3) ?>

            <!-- <a href="<?php //echo base_url("patient/create_familymember/".$patient_ID) ?>">

              <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">

                <span class="fa fa-user"></span>

                &nbsp;&nbsp;Add Family member</span>

              </button>

            </a> -->

          </td>



          <td>

            <div style="position: absolute;right:calc(100% - 28%); /*left: 1em; top: 0;*/ padding-top: 7px;" > <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search" aria-hidden="true"  style="margin-left: 1px; position: relative;right: 170px;"></span>

            </div>

            <input onkeyup="familysearch()"  id="f_searchid" style="padding-left: 3em; padding-right: 3em; width: 100%; height: 100%; padding-bottom: 4px; padding-top: 8px; border: 1px solid #f7f8f9;" maxlength="100" class="form-control" placeholder="search by first name , last name , email and phone" title="search by first name , last name , email and phone" >



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

      <table class="table table-patient">

        <thead>

            <tr>

                <th width="15%">Name</th>

                <th width="15%">Relation</th>

                <th class="text-center">Race</th>

                <th class="text-center">Gender</th>

                <th width="30%" class="text-center">Ethnic Group</th>
<!--<th  class="text-center">Action</th>-->
                <!-- <th width="12%" class="text-center">Status</th> -->



            </tr>

        </thead>

        <tbody id="padd">

          <?php   if (!empty($familymembers)) { ?>

                <?php $sl = 1; ?>

                <?php foreach ($familymembers as $familymember) { ?>

          <tr style="border-bottom: 1px solid #ddd;" class="hovertr" >

            <td><?php echo $familymember->prefix."  ".$familymember->name ?></td>

            <td><?php echo $familymember->relation_to_patient ?></td>

            <td><?php echo $familymember->races ?></td>

            <td><?php echo $familymember->gender ?></td>

            <td><?php echo $familymember->ethnicities; ?></td>
<!--<td><a href="<?php //echo base_url("dashboard_patient/family_history/family_history/delete_familymember/$familymember->member_id/$familymember->patient_id")?>" class="btn btn-xs btn-danger icon-box" onclick="return confirm('<?php //echo display('are_you_sure') ?>')" style="margin-right:10px;"><i class="fa fa-trash"></i></a></td>-->
            <!-- <td>

                <div class="btn-group">

                    <select class="btn btn-default form-control" onchange="call('<?php //echo $patient->patient_id; ?>',this.options[this.selectedIndex].value)">

                        <option value="1" <?php //echo (($patient->status==1)?'Selected':''); ?>>Active</option>

                        <option value="0" <?php //echo (($patient->status==0)?'Selected':''); ?>>Inactive</option>

                    </select>

                </div>

            </td> -->



          </tr>





          <?php $sl++; ?>

                <?php } ?>

            <?php }else{ ?>

          <tr>

            <td colspan="9" align="center">no data found!</td>

          </tr>

          <?php } ?>

        </tbody>

      </table>

    </div>

  </section>

</div>

<div class="clearfix"></div>
