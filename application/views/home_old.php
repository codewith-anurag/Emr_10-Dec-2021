<div class="wrapper main-wrapper row">
  <div class="clearfix"></div>
  <!-- MAIN CONTENT AREA STARTS -->
  <div class="col-lg-6 white-box" style="width: 48%;margin-right: 2%;min-height: 850px;">
    <section class="box">
      <table class="table" style="border-bottom: 0.5px solid #c6c4c1;">
        <tbody>
          <tr>
            <td width="15%">
              <a href="<?php echo base_url("patient/create") ?>">
                <button id="new" class="btn btn-default" style="width: 90%;margin-right: 11px;">
                  <span class="fa fa-user"></span>
                  &nbsp;&nbsp;New Patient</span>
                </button>
              </a>
            </td>
            <td>
              <div style="position: absolute; /*left: 1em; top: 0;*/ padding-top: 7px;" > <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search" aria-hidden="true" onclick="$(this).parents('form').find(':input').focus()" style="margin-left: 1px;"></span> <!--onclick="$('#patientPartyName', list_patient.ele).focus()"-->
              </div>
              <input id="patientPartyName" style="padding-left: 3em; padding-right: 3em; width: 100%; height: 100%; padding-bottom: 4px; padding-top: 8px; border: 1px solid #f7f8f9;" maxlength="100" class="form-control" placeholder="Search Patient by name, mobile, e:email, birth date, KPiD and/or a:address" title="Search Patient by partial name, p:phone, e:email (prefix with e: or email with @), birth date (DD/MM/YYYY), full KPiD and/or partial a:address (prefix with a:). Multiple search criteria separated by space." >
              <div style="position: absolute; right: 0em; top: 8px;width: 10px" > <span class="hover icon-md fa fa-ellipsis-v dropdown-toggle hidden-print" title="Show more options" style="/*float: right; text-decoration: none;*/ cursor: pointer; /*padding-top: 3px;*/ padding-top: 29px;margin-left: -20px;" data-toggle="dropdown"></span>
                <ul class="dropdown-menu dropdown-menu-right hidden-print" role="menu" aria-labelledby="menu1">
                  <li id="new" role="presentation" style="padding-top: 7px;">
                    <a id="menu-alert" class="icon-color dropdown-li-text" role="menuitem" tabindex="1"> <span class="fa fa-user-plus"></span>
                      <span>&nbsp;&nbsp;New Patient</span>
                    </a>
                  </li>
                  <li id="new" role="presentation" class="divider"></li>
                  <li id="recent" role="presentation">
                    <a class="icon-color dropdown-li-text" role="menuitem" tabindex="2" onclick="list_patient.recent()"> <span class="fa fa-clock-o"></span><span>&nbsp;&nbsp;Recent</span><a>
                  </li>
                  <li id="recent" role="presentation" class="divider"></li>
                  <li id="export" role="presentation" class="hidden-doctor hidden-patient hidden-user hidden-xs hidden-sm">
                    <a class="icon-color dropdown-li-text" role="menuitem" tabindex="2" onclick="list_patient.exportToCsv()"><span class="fa fa-download"></span>
                      <span>&nbsp;&nbsp;Export</span>
                    </a>
                  </li>
                  <li id="import-ccd" role="presentation" class="divider hidden-patient hidden-doctor hidden-user hidden-xs hidden-sm"></li>
                  <li class="dropdown dropdown-submenu hidden-patient hidden-doctor hidden-user">
                    <a class="icon-color dropdown-li-text" role="menuitem" tabindex="1" href="#" data-toggle="dropdown" style="text-indent:0.1em;"><span class="fa fa-upload"></span><span>&nbsp;&nbsp;Import</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a onclick="list_patient.importCsv('importListPatient')" class="icon-color" role="menuitem" tabindex="2"><span class="fa fa-file-excel-o"></span>&nbsp;&nbsp;Profile CSV</a>
                      </li>
                      <li id="import-csv" role="presentation" class="divider hidden-xs hidden-sm"></li>
                      <li class="hidden-xs hidden-sm"><a onclick="list_patient.import_ccd_final('no')" class="icon-color" role="menuitem" tabindex="2"><span class="fa fa-file"></span>&nbsp;&nbsp;CCD Import</a>
                      </li>
                    </ul>
                  </li>
                  <li id="export" role="presentation" class="divider hidden-doctor hidden-patient hidden-user"></li>
                  <li role="presentation">
                    <a class="icon-color dropdown-li-text" role="menuitem" tabindex="2" onclick="list_patient.windowPrint();"> <span class="fa fa-print"></span>
                      <span>&nbsp;&nbsp;Print</span>
                    </a>
                  </li>
                  <li role="presentation" class="divider"></li>
                  <li id="youtube-btn" class="tutorial-video" role="presentation" onclick="list_patient.showVideo('listPatient')">
                    <a class="icon-color dropdown-li-text" role="menuitem" tabindex="1"> <span class="icon-color fa fa-youtube"></span>
                      <span>&nbsp;&nbsp;Tutorial Video</span>
                    </a>
                  </li>
                  <li role="presentation" class="divider tutorial-video"></li>
                  <li role="presentation" style="padding-bottom: 1em;">
                    <a id="help-btn" class="icon-color dropdown-li-text" role="menuitem" tabindex="2" onclick="hHelp.healthNeedHelp($('#need-help', list_patient.ele),'/health/help/page/patient/list_patient_needhelp.jsp', 'For List Patients')"> <span class="fa fa-question-circle-o" id="help-btn"></span>
                      <span id="help-btn">&nbsp;&nbsp;Help</span>
                    </a>
                  </li>
                </ul>
              </div>
            </td>

          </tr>
        </tbody>
      </table>
      <style type="text/css">
        .kpull-left {
            float: left !important;
            max-width: 100%;
            padding-right: 1em;
        }
        .fieldLabelColor, .lbl-color, .color-light, .text-light {
            color: #666;
            font-weight: normal;
        }
        .text-primary {
            color: #337ab7;
        }
        .row-0:hover, .row-1:hover, .bg55, .recordHead, .menu:hover, .menu2:hover, .menu3:hover, .menu-img:hover, .highlight-hover-link:hover, .highlight-hover:hover, .highlight, .bg-hover:hover, .table-hover > tbody > tr:hover {
            background-color: #d5f3f2;
        }
        .table-fixed {
            table-layout: fixed;
            width: 100%;
        }
      </style>
      <div class="col-lg-12">


              <?php $sl = 1; ?>

                  <a href="<?php //echo base_url("patient/profile/") ?>"> <?php //$patient->id ?>
        <table class="table-fixed" style="border-bottom: 0.5px solid #c6cac9;margin-bottom: 5px;">
          <tbody id="add">
            <?php if (!empty($patients)) { ?>
            <?php foreach ($patients as $patient) { ?>
          <tr>
            <td style="width: 40px; overflow: hidden; font-size: 120%; margin-right: 1em;" rowspan="2">
              <div style="width: 39.5px; height: 39.5px; overflow: hidden; margin-right: 15px;">
                <img style="width: 100%; border-radius: 19.75px;" src="<?php echo ($patient->picture!='')?base_url().$patient->picture:base_url()."assets/images/patient/2017-01-16/p5.png"; ?>">
              </div>
            </td>
            <td style="max-width: 100%; padding-left: 1em;">
              <div class="word-break" style="width: 100%;"><span data-id="3243685" class="fa fa-circle" style="display: none; font-size: 9px; padding-right: 0.5em;" data-toggle="tooltip" title="Patient online"></span><span style="font-size: 15px;" class="text-primary"> <?php echo $patient->firstname; ?> <?php echo $patient->lastname; ?>  </span>
              </div>
            </td>
            <td style="white-space: nowrap; text-align: right;"><?php echo $patient->patient_id; ?></td>
          </tr>
          <tr>
            <td style="padding-left: 1em; max-width: 100%; font-size: 90%;" class="text-light" colspan="2">
              <div class="kpull-left"><?php echo ($patient->sex=='Male')?'M':'F'; ?> <?php echo $patient->date_of_birth; ?></div>
              <div class="kpull-left"></div>
              <div class="kpull-left"></div>
              <div class="kpull-left"></div>
              <div class="kpull-left">+91 <?php echo $patient->mobile; ?></div>
              <div class="kpull-left"><?php echo $patient->email; ?></div>
            </td>
          </tr>
            <?php }} ?>
        </tbody>
        </table>
        </a>



      </div>
    </section>
  </div>
  <div class="col-lg-6 white-box" style="min-height: 850px;">
    <section class="box" style="background-color: #ffffff;">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    </section>
  </div>
  <div class="clearfix"></div>
  <!-- MAIN CONTENT AREA ENDS -->
</div>
<!-- <div class="row">
    <!--  table area -->
    <!--<div class="col-sm-12">
        <div  class="panel panel-default thumbnail">

            <div class="panel-heading no-print">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php //echo base_url("patient/create") ?>"> <i class="fa fa-plus"></i>  <?php //echo display('add_patient') ?> </a>
                </div>
            </div>
            <div class="panel-body">
                <table id="example" width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php //echo display('serial') ?></th>
                            <th><?php //echo display('id_no') ?></th>
                            <th><?php //echo display('picture') ?></th>
                            <th><?php //echo display('first_name') ?></th>
                            <th><?php //echo display('last_name') ?></th>
                            <th><?php //echo display('email') ?></th>
                            <th><?php //echo display('phone') ?></th>
                            <th><?php //echo display('mobile') ?></th>
                            <th><?php //echo display('address') ?></th>
                            <th><?php //echo display('sex') ?></th>
                            <th><?php //echo display('blood_group') ?></th>
                            <th><?php //echo display('action') ?></th>
                            <th><?php //echo display('date_of_birth') ?></th>
                            <th><?php //echo display('create_date') ?></th>
                            <th><?php //echo display('status') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //if (!empty($patients)) { ?>
                            <?php //$sl = 1; ?>
                            <?php //foreach ($patients as $patient) { ?>
                                <tr class="<?php //echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php //echo $sl; ?></td>
                                    <td><?php //echo $patient->patient_id; ?></td>
                                    <td><img src="<?php //echo $patient->picture; ?>"  width="65" height="50"/></td>
                                    <td><?php //echo $patient->firstname; ?></td>
                                    <td><?php //echo $patient->lastname; ?></td>
                                    <td><?php //echo $patient->email; ?></td>
                                    <td><?php //echo $patient->phone; ?></td>
                                    <td><?php //echo $patient->mobile; ?></td>
                                    <td><?php //echo $patient->address; ?></td>
                                    <td><?php //echo $patient->sex; ?></td>
                                    <td><?php //echo $patient->blood_group; ?></td>
                                    <td class="center">
                                        <a href="<?php //echo base_url("patient/profile/$patient->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                                        <!--<a href="<?php //echo base_url("patient/edit/$patient->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> -->

                                      <!--  <a href="<?php //echo base_url("case_manager/patient/form?pid=$patient->patient_id") ?>" class="btn btn-xs btn-warning" title="Add to Case Manager"><i class="fa fa-plus"></i></a>

                                        <a href="<?php //echo base_url("patient/delete/$patient->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php //echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td><?php //echo $patient->date_of_birth; ?></td>
                                    <td><?php //echo $patient->create_date; ?></td>
                                    <td>
                                      <select onchange="call('<?php //echo $patient->patient_id; ?>',this.options[this.selectedIndex].value)">
                                        <option value="1" <?php //echo (($patient->status==1)?'Selected':''); ?>>Active</option>
                                        <option value="0" <?php //echo (($patient->status==0)?'Selected':''); ?>>Inactive</option>
                                         </select>
                                      <?php //echo (($patient->status==1)?display('active'):display('inactive')); ?></td>
                                </tr>
                                <?php //$sl++; ?>
                            <?php //} ?>
                        <?php //} ?>
                    </tbody>
                </table>  <!-- /.table-responsive -->
            <!--</div>
        </div>
    </div>
</div> -->
<script>

function call(id,value)
{
 //alert(value);
  $.ajax({

       url:'<?=base_url()?>patient/changestatus',
       data:'id='+id+'&value='+value,
       success: function(msg){
        // alert(msg);
//$('#exampleModal').modal('toggle');
//alert(msg);
/**if(value='yes'){
  $("#y"+id).prop("checked", true);
}else{
  $("#n"+id).prop("checked", true);
}**/
window.location="<?=base_url()?>patient/";
     }

 });
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $("#patientPartyName").keyup(function(){
        var BASE_URL = '<?php echo base_url(); ?>';
      //  alert(BASE_URL);
        //alert(category_id);
        //alert($(trim((this).val())));
        //alert($.trim($(this).val()));
        //exit;
        // if(($(this).val())!=''){
        //
        $("#add").empty();
        // }

        $.ajax({
            url: BASE_URL+"dashboard/search_patient",
            data: 'p_id='+$.trim($(this).val()),
            success: function(msg){
                 //alert(msg);
                // $("#suggesstio n-box").show();
                //   $("#suggesstion-box").html(data);
                //$("#search-box").css("background","#FFF");
                // alert(msg);
                // $(".general-item-list").empty();
                var myObj = JSON.parse(msg);
$("#add").empty();
//$(".table-fixed").empty();
                if(myObj.length>0){
                    //alert(myObj);
                    //$(".table-fixed").empty();
$("#add").empty();
                    $.each(myObj, function(index,value) {
                      //$(".table-fixed").empty();
                        //$(".item").empty();

                        //  alert(myObj[index].email);
                        txt= '<tr><td style="width: 40px; overflow: hidden; font-size: 120%; margin-right: 1em;" rowspan="2"><div style="width: 39.5px; height: 39.5px; overflow: hidden; margin-right: 15px;"><img style="width: 100%; border-radius: 19.75px;" src="'+BASE_URL+myObj[index].picture+'"></div></td><td style="max-width: 100%; padding-left: 1em;"><div class="word-break" style="width: 100%;"><span data-id="3243685" class="fa fa-circle" style="display: none; font-size: 9px; padding-right:0.5em;" data-toggle="tooltip" title="Patient online"></span><span style="font-size: 15px;" class="text-primary">'+myObj[index].firstname+' '+myObj[index].lastname+'</span></div></td><td style="white-space: nowrap; text-align: right;">'+myObj[index].patient_id+'</td></tr><tr><td style="padding-left: 1em; max-width: 100%; font-size: 90%;" class="text-light" colspan="2"><div class="kpull-left">'+myObj[index].sex+' '+myObj[index].date_of_birth+'</div><div class="kpullleft"></div><div class="kpull-left"></div><div class="kpull-left"></div><div class="kpull-left">'+myObj[index].mobile+'</div><div class="kpull-left">'+myObj[index].email+' </div></td></tr>';
                        $("#add").append(txt);

                    });
                }else{
                    $("#add").empty();

                    // $.each(myObj, function(index,value) {
                    //  alert(myObj[index].email);
                    //$(".item").empty();
                    txt= ' No data found ';
                    $("#add").append(txt);

                    // });
                }
            }
        });

    });
    //$("#outhide").mouseout(function(){
    //  $("#suggesstion-box").hide();
    //});
</script>
