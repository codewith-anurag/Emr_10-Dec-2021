<style>
.form-label {
  float: inherit;
}

.mb-0 {
  margin-bottom: 0px !important;
}
.bootstrap-select .btn-default:hover {
      color: #777 !important;
background-color: transparent !important;
}
.bootstrap-select .btn-default {
  color: #7f7f7f !important;
  border-color:#ccc !important;
  border: 1px solid #ccc !important;
}
.modal-content {
  border-radius: 15px !important;
}
.modal-content h4 {
  color: #150aec;
  font-weight: 700;
}
</style>

<div class="col-xs-12 ">

    <div class="col-lg-12">
        <section> <!--  class="box nobox " -->
            <div class="content-body">
                <div class="row">
                    <!--<div class="col-xs-12 col-md-2">

                        <!-- <form method="post" id="add_event_form">
                            <input type="text" class="form-control new-event-form" placeholder="Add new event..." />
                        </form> -->

                        <!--<div id='external-events'>
                            <h4>Draggable Events</h4>
                            <div class='fc-event bg-purple'>My Event 1</div>
                            <div class='fc-event bg-purple'>My Event 2</div>
                            <div class='fc-event bg-purple'>My Event 3</div>
                            <div class='fc-event bg-purple'>My Event 4</div>
                            <div class='fc-event bg-purple'>My Event 5</div>
                            <br>
                            <label class="form-label" for='drop-remove' style="font-size:13px;">
                                <input type="checkbox" id='drop-remove' class="iCheck"> <span>Drop&nbsp;&&nbsp;Remove</span>
                            </label>

                            <h4>Created Events</h4>
                        </div>-->
                    <!--</div>-->

                    <div id='calendar' class="col-xs-12 col-md-10"></div>

                </div>
            </div>
        </section>
    </div>


</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Appointment</h4>
      </div>
      <?php echo form_open('schedule/create','class="form-inner"') ?>
      <?php echo form_hidden('schedule_id','') ?>
      <div class="modal-body">
        <div class="row form-row">
          <div class="col-xs-12">
            <div class="form-group dis-flex  mb-0">
            <div class="col-xs-12">
              <label class="form-label" for="patent_id">Patient <span class="required">*</span></label>

                <!-- <input type="text" name="patent_id" class="form-control text-field" id="patent_id" value="<?php //echo $doctor->firstname ?>">
                <div id="suggesstion-box"></div> -->
                <select name="patent_id" class="form-control selectpicker" id="patent_id" data-show-subtext="true" data-live-search="true">
                  <?php if(count($patient)>0){ ?>
                    <option value="">select</option>
                    <?php foreach ($patient as  $value) { ?>
                      <option value="<?php echo $value->patient_id ?>"><?php echo $value->firstname.' '.$value->lastname; ?></option>

                  <?php  }
                  } ?>

                </select>
                <input type="hidden" name="start_time" class="form-control text-field" id="start_time" value="<?php //echo $doctor->firstname ?>">
                <input type="hidden" name="end_time" class="form-control text-field" id="end_time" value="<?php //echo $doctor->firstname ?>">
                <input type="hidden" name="date" class="form-control text-field" id="date" value="<?php //echo $doctor->firstname ?>">
                <input type="hidden" name="available_days" class="form-control text-field" id="available_days" value="<?php //echo $doctor->firstname ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row form-row">
          <div class="col-xs-12">
            <div class="form-group mb-0">
            <div class="col-xs-12">
              <label class="form-label" for="doctor_id">Doctor<span class="required">*</span></label>

              <select name="doctor_id" class="form-control selectpicker" id="doctor_id" data-show-subtext="true" data-live-search="true">
                <?php if(count($doctor)>0){ ?>
                  <option value="">select</option>
                  <?php foreach ($doctor as  $value) { ?>
                    <option value="<?php echo $value->user_id ?>"><?php echo $value->firstname.' '.$value->lastname; ?></option>

                <?php  }
                } ?>

              </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row form-row">
          <div class="col-xs-12">
            <div class="form-group">
            <div class="col-xs-12">
              <label class="form-label" for="description">Description<span class="required">*</span></label>

                <textarea  name="description" class="form-control text-field" id="description"><?php //echo $doctor->address ?>
                </textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" >Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
  </div>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>-->
<script src='<?=base_url()?>assets/calendar/moment.min.js'></script>
<script src='<?=base_url()?>assets/calendar/jquery.min.js'></script>
<script src='<?=base_url()?>assets/calendar/fullcalendar.min.js'></script>
<script>

function tester()
{
    alert('test time2:2');
}
var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
var BASE_URL = '<?php echo base_url(); ?>';
    var events_array = [
        {
        title: 'Test1',
        start: new Date(2012, 8, 20),
        tip: 'Personal tip 1'},
    {
        title: 'Test2',
        start: new Date(2012, 8, 21),
        tip: 'Personal tip 2'}
    ];

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        //defaultDate: '<?=date('Y-m-d')?>',
        defaultView: 'agendaWeek',

        navLinks: true, // can click day/week names to navigate views
        editable: false,
        eventLimit: false, // allow "more" link when too many events
        selectable: true,
        //events: events_array,


        select: function(start, end, jsEvent, view) {

         // start contains the date you have selected
         // end contains the end date.
         // Caution: the end date is exclusive (new since v2).
           //test(start, end, jsEvent, view);
         var allDay = !start.hasTime && !end.hasTime;
         //alert(day);
        //  alert(["Event Start date: " + moment(start).format(),
            //   "Event End date: " + moment(end).format(),
              // "AllDay: " + allDay].join("\n"));
                $("#start_time").val(moment(start).format());
                $("#end_time").val(moment(end).format());
                $("#date").val(moment(start).format());
                $("#myModal").modal();

    },selectConstraint: {
        start: $.fullCalendar.moment().subtract(1, 'days'),
        end: $.fullCalendar.moment().startOf('month').add(12, 'month')
    },
        eventClick:function test(callEvent, jsEvent, view){
          //alert(callEvent.start);

          $.ajax({
              url: BASE_URL+"schedule/getdoctor",
              data: 'start='+moment(callEvent.start).format(),
              success: function(msg){

                  //alert(msg);
                  // $("#suggesstio n-box").show();
                  //   $("#suggesstion-box").html(data);
                  //$("#search-box").css("background","#FFF");
                  // alert(msg);
                  // $(".general-item-list").empty();
                  var myObj = JSON.parse(msg);

  //$(".table-fixed").empty();
                  if(myObj.length>0){
                      //alert(myObj);
                      //$(".table-fixed").empty();

  $('#doctor_id').empty();
  $('#doctor_id')
.append($("<option></option>")
.attr("value","")
.text('select'));
                      $.each(myObj, function(index,value) {
                        $('#doctor_id')
         .append($("<option></option>")
                    .attr("value",myObj[index].user_id)
                    .text(myObj[index].firstname+' '+myObj[index].lastname));
                        //$(".table-fixed").empty();
                          //$(".item").empty();
   //msgs="<li><img style='height:30px;width:30px;' src="+BASE_URL+myObj[index].user_id.picture+">"+myObj[index].firstname+' '+myObj[index].lastname+"</li>";
                          //  alert(myObj[index].email);

                        //  $("#add").append(txt);

                      });

                  }else{

                    $('#doctor_id').empty();

                    $('#doctor_id')
                    .append($("<option></option>")
                    .attr("value","")
                    .text('No doctor available'));
                      // $.each(myObj, function(index,value) {
                      //  alert(myObj[index].email);
                      //$(".item").empty();
                    //  txt= ' No data found ';
                      //$("#add").append(txt);

                      // });
                  }
                  $('#doctor_id').selectpicker('refresh');
                  $.ajax({
                      url: BASE_URL+"schedule/getpatient",
                      data: 'start='+moment(callEvent.start).format(),
                      success: function(msg){

                          //alert(msg);
                          // $("#suggesstio n-box").show();
                          //   $("#suggesstion-box").html(data);
                          //$("#search-box").css("background","#FFF");
                          // alert(msg);
                          // $(".general-item-list").empty();
                          var myObj = JSON.parse(msg);

          //$(".table-fixed").empty();
                          if(myObj.length>0){
                              //alert(myObj);
                              //$(".table-fixed").empty();

          $('#patent_id').empty();

          $('#patent_id')
        .append($("<option></option>")
        .attr("value","")
        .text('select'));
                              $.each(myObj, function(index,value) {
                                $('#patent_id')
                 .append($("<option></option>")
                            .attr("value",myObj[index].patient_id)
                            .text(myObj[index].firstname+' '+myObj[index].lastname));
                                //$(".table-fixed").empty();
                                  //$(".item").empty();
           //msgs="<li><img style='height:30px;width:30px;' src="+BASE_URL+myObj[index].user_id.picture+">"+myObj[index].firstname+' '+myObj[index].lastname+"</li>";
                                  //  alert(myObj[index].email);

                                //  $("#add").append(txt);

                              });

                          }else{

                            $('#patent_id').empty();

                            $('#patent_id')
                            .append($("<option></option>")
                            .attr("value","")
                            .text('No patient available'));
                              // $.each(myObj, function(index,value) {
                              //  alert(myObj[index].email);
                              //$(".item").empty();
                            //  txt= ' No data found ';
                              //$("#add").append(txt);

                              // });
                          }
$('#patent_id').selectpicker('refresh');
                          $("#start_time").val(moment(callEvent.start).format());
                          $("#end_time").val(moment(callEvent.end).format());
                          $("#date").val(moment(callEvent.start).format());
                          $("#myModal").modal();
                      }
                  });

              }
          });
// $("#start_time").val(moment(callEvent.start).format());
// $("#end_time").val(moment(callEvent.end).format());
// $("#date").val(moment(callEvent.start).format());
// $("#myModal").modal();

                         // $('#calendar_time').css('display','block');
                         // $('#calendar_time').html('<button style="margin-left: 196px;" onclick="tester()" data-container="time-button" tabindex="0" data-start-time="2:30pm"  type="button"><div class=""><div>2:30pm</div></div></button>');
                      },

                      events: [
                          <?php
                          $i=1;
                          foreach ($schedules as $schedule)
                          {
                              $getSchedulingrow= $schedule->date;
                            //  start_time
                  if(!empty($getSchedulingrow))
                  {
                          ?>
        <?php
                                        $s_dateString = $schedule->date.' '.$schedule->start_time;
                                        $e_dateString = $schedule->date.' '.$schedule->end_time;
                                        $sdateObject = new DateTime($s_dateString);
                                        $edateObject = new DateTime($e_dateString);
                                       // echo $dateObject->format('d-m-Y h:i A');
                                       $doctor = $this->db->select("*")->from("user")->where("user_id",$schedule->doctor_id)->get()->row();
                                       $patient = $this->db->select("*")->from("patient")->where("patient_id",$schedule->patent_id)->get()->row();
                                       $dfname ='';
                                       $dlname ='';
                                       $pfname='';
                                       $plname='';
                                       if($doctor!=''){
                                         $dfname = $doctor->firstname;
                                         $dlname = $doctor->lastname;
                                       }
                                       if($patient!=''){
                                         $pfname=$patient->firstname;
                                         $plname=$patient->lastname;
                                       }
                                        ?>
            {
                title:'<?php echo $dfname.' '.$dlname; ?>',
                start:'<?php echo $s_dateString; ?>' ,
                end: '<?php echo $e_dateString; ?>',
                color  : '#00a2ff',
                background:'#00a2ff',
                tip:'<?php echo 'Dr. '.$dfname.' '.$dlname; ?> - <?php echo $pfname.' '.$plname; ?>'


            },


      <?php  }

                            }


                                    ?>

             ],eventRender: function(event, element) {
                 element.attr('title', event.tip);
             },
    });






</script>


<script>
    $("#patent_id").keyup(function(){
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

              //   alert(msg);
                // $("#suggesstio n-box").show();
                //   $("#suggesstion-box").html(data);
                //$("#search-box").css("background","#FFF");
                // alert(msg);
                // $(".general-item-list").empty();
                var myObj = JSON.parse(msg);

//$(".table-fixed").empty();
                if(myObj.length>0){
                    //alert(myObj);
                    //$(".table-fixed").empty();

var msg ="<ul id='outhide'style='list-style:none;' class='search-list'>";
var msgs ="";
var msgss ="";
                    $.each(myObj, function(index,value) {
                      //$(".table-fixed").empty();
                        //$(".item").empty();
 msgs="<li><img style='height:30px;width:30px;' src="+BASE_URL+myObj[index].picture+">"+myObj[index].firstname+' '+myObj[index].lastname+"</li>";
                        //  alert(myObj[index].email);

                      //  $("#add").append(txt);

                    });
                    msgss = "</ul>";
                    $("#suggesstion-box").html(msg+msgs+msgss);
                }else{


                    // $.each(myObj, function(index,value) {
                    //  alert(myObj[index].email);
                    //$(".item").empty();
                    txt= ' No data found ';
                    //$("#add").append(txt);

                    // });
                }
            }
        });

    });
    //$("#outhide").mouseout(function(){
    //  $("#suggesstion-box").hide();
    //});
</script>

























<!-- <div class="row">
    <!--  table area -->
    <!-- <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">

            <div class="panel-heading no-print">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php //echo base_url("schedule/create") ?>"> <i class="fa fa-plus"></i>  <?php //echo display('add_schedule') ?> </a>
                </div>
            </div>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php //echo display('serial') ?></th>
                            <th><?php //echo display('doctor_name') ?></th>
                            <th><?php //echo display('department_name') ?></th>
                            <th><?php //echo display('day') ?></th>
                            <th><?php //echo display('start_time') ?></th>
                            <th><?php //echo display('end_time') ?></th>
                            <th><?php //echo display('per_patient_time') ?></th>
                            <th><?php //echo display('serial_visibility_type') ?></th>
                            <th>Date<?php //echo display('status') ?></th>

                            <th><?php //echo display('status') ?></th>
                            <th><?php //echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //if (!empty($schedules)) { ?>
                            <?php //$sl = 1; ?>
                            <?php //foreach ($schedules as $schedule) { ?>
                                <tr class="<?php //echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php //echo $sl; ?></td>
                                    <td><?php //echo $schedule->firstname; ?> <?php //echo $schedule->lastname; ?></td>
                                    <td><?php// echo $schedule->name; ?></td>
                                    <td><?php //echo $schedule->available_days; ?></td>
                                    <td><?php //echo $schedule->start_time; ?></td>
                                    <td><?php //echo $schedule->end_time; ?></td>
                                    <td><?php //echo $schedule->per_patient_time; ?></td>
                                    <td><?php //echo (($schedule->serial_visibility_type==1)?display('sequential'):display('timestamp')); ?></td>
                                    <td><?php //echo $schedule->date; ?></td>
                                    <td><?php //echo (($schedule->status==1)?display('active'):display('inactive')); ?></td>
                                    <td class="center">
                                        <a href="<?php //echo base_url("schedule/edit/$schedule->schedule_id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="<?php //echo base_url("schedule/delete/$schedule->schedule_id") ?>" onclick="return confirm('<?php //echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php //$sl++; ?>
                            <?php //} ?>
                        <?php //} ?>
                    </tbody>
                </table>  <!-- /.table-responsive -->
          <!--  </div>
        </div>
    </div>
</div> -->
