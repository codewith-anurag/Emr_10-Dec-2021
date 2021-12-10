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
.readm{
font-weight: 600;
background-color: #d5f3f2;
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
/* message window */


.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: inline-block;
  font-size: 12px;
  margin: 0px 0 8px;
}
.attachement_sc{
    display: inline-block;
    float: right;
  }
.received_withd_msg { width: 70%;}
.mesgs {
  float: left;
  width: 100%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:10px 0 10px;}
.sent_msg {
  float: right;
  width: 70%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}

/* message window */
</style>
<div class="clearfix"></div>
<div class="col-lg-12 white-box" style="width: 100%;margin-right: 2%;min-height: 850px;">
  <section class="box">
    <table class="table" style="border-bottom: 0.5px solid #c6c4c1; display:table;">
      <tbody>
        <tr>

          <td width="30%">


          </td>
          <td>
            <div style="position: absolute; /*left: 1em; top: 0;*/ padding-top: 7px;" > <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search" aria-hidden="true"  style="margin-left: 25px;"></span>
            </div>
            <input onkeyup="message_search()" id="message_searchdata" style="padding-left: 3em; padding-right: 3em; width: 100%; height: 100%; padding-bottom: 4px; padding-top: 8px; border: 1px solid #f7f8f9;" maxlength="100" class="form-control" placeholder="Search message by email" title="Search message by email" >

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
      <table class="table table-patient" style="display:table;">
        <thead>
          <tr>

            <th>From Email</th>
            <th width="10%" >Subject</th>
            <th class="text-center">Message</th>
            <th class="text-center">Hospital Name</th>
            <th class="text-center">Date</th>
            <th class="text-center">Action</th>

          </tr>
        </thead>
        <tbody id="suMsaages">
          <?php   if (!empty($all_message)) { ?>
            <?php $sl = 1; ?>
            <?php foreach ($all_message as $patient) {
$hospital_name = $this->db->select("*")->from("user")->where('user_id',$patient->from_user_id)->get()->row();
if($hospital_name->is_admin==1){
  $hospital_name = $this->db->select("*")->from("user")->where('user_id',$hospital_name->created_by)->get()->row();
}
              //var_dump($all_message);

              $read = $this->db->select("*")->from("contact_super_admin")->where("from_email_address",$patient->from_email_address)->where('is_read','0')->order_by('date','DESC')->get()->result();
                //$reads = $this->db->select("*")->from("contact_super_admin")->where("from_email_address",$patient->from_email_address)->where('is_read','0')->order_by('date','DESC')->get()->row();

                //print_r($ds);
              //  exit;

            //  exit;
             ?>
              <tr style="border-bottom: 1px solid #ddd;" class="hovertr <?php echo(count($read)>0)?'readm':''; ?>" >
                <td  ><span class="text-primary"><?php echo $patient->from_email_address; ?></span></td> <!--onclick="contact_read('<?php //echo $patient->from_user_id; ?>')"--->
                <td><?php echo $patient->subject; ?></td>
                <td><?php echo $patient->message; ?> </td>

                <td><?php echo $hospital_name->hospitalname; ?> </td>
                <td><?php echo date('Y-m-d h:i:s',strtotime($patient->date)); ?> </td>
                <td class="pt-15"><div class="btn-group" style="float: right;display: flex;">
                  <a href="#" data-toggle="modal" data-target="#MessageDetails" onclick="GetAllUserMassages('<?php echo $patient->from_user_id; ?>')" class="btn btn-xs icon-box" style="margin-right:10px;"><i class="fa fa-eye"></i></a>
                  <a href="#" id="reply_to_user" class="btn btn-xs btn-default" style="margin-right:10px;" onClick="getUserEmailId('<?php echo $patient->from_email_address;?>','<?php echo $patient->from_user_id; ?>')" data-toggle="modal" data-target="#forwrdbox"><i class="fa fa-share"></i></a>
                  <a href="<?php echo base_url("dashboard_super/messages/message/delete_admin_mag/$patient->from_user_id") ?>" class="btn btn-xs btn-danger icon-box" onclick="return confirm('<?php  echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a>
                </div>
              </td>
              </tr>


          <?php $sl++; ?>
                            <?php } ?>
                        <?php } ?>
        </tbody>
      </table>

    </div>
  </section>
</div>
<div class="clearfix"></div>


<div class="modal fade" id="forwrdbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel" style="color:#150aec;font-weight:700;">Reply Message </h4>
      </div>
      <form action="<?php echo base_url(); ?>dashboard_super/messages/message/new_message_admin" class="form-inner" enctype="multipart/form-data" method="post" accept-charset="utf-8">
      <div class="modal-body" >
        <div class="row">
          <div class="col-12 col-md-12 form-group">
            <label>TO</label>
            <?php
            $admin_id = $this->session->userdata('user_id');
            $admin_email = $this->session->userdata('email');
            $contact_user = $this->db->select("*")->from("contact_super_admin")->group_by("from_email_address")->where('from_user_id !=',$admin_id)->get()->row();
            /* ?>
            <!--  <select class="form-control" name="to_user" id="to_user" required="">
              <option value="">Select To</option>
              <?php foreach ($contact_user as $list) { ?>
                    <option value="abc"><?php echo $list['from_email_address'] ?></option>
              <?php } ?>
            </select> --> */ ?>
            <input type="hidden" name="from_user_id" required class="form-control text-field" value="<?php echo $admin_id;?>">
            <input type="hidden" id="to_user_id" name="to_user_id" required class="form-control text-field">
            <input type="email" name="to_email_address" id="reply_to_email" required="" class="form-control text-field">
          </div>
          <div class="col-12 col-md-12 form-group">
            <label>FROM</label>
            <!-- <input type="email" name="from_user" required class="form-control text-field" value="" id="Prefix"> -->
            <input type="email" name="from_email_address" required="" class="form-control text-field" value="<?php echo $admin_email;?>" id="Prefix">
          </div>
          <div class="col-12  col-md-12 form-group">
            <label>SUBJECT</label>
            <input type="text" name="subject" required="" class="form-control text-field" value="" id="p_subject">
          </div>
          <div class="col-12 col-md-12 form-group">
            <label>MESSAGE</label>
            <textarea id="p_message" required="" name="message" rows="5" style="width:100%;"></textarea>
          </div>
          <div class="col-12 col-md-12 form-group">
            <label>UPLOAD SCREENSHOT</label>
            <input type="file" class="form-control" name="file" onchange="document.getElementById('upload_image').src = window.URL.createObjectURL(this.files[0])">

            <img src="<?php echo base_url('assets/images/transparent.png');?>" id="upload_image" style="max-width: 100px; margin-top: 15px;">
          </div>
        </div>
      </div>
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">Send Message</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="MessageDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="refresh();" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="MessageDetails" style="color:#150aec;font-weight:700;">Reply Message Detail </h4>
      </div>
      <div class="modal-body" style="height: 500px;">
         <div class="mesgs">
          <div class="msg_history">
          </div>
        </div>
        </div>
        <div class="clearfix"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="refresh();">Close</button>
        </div>
    </div>
  </div>
</div>
</div>
<script>

function call(id,value,admin_id)
{
 //alert(value);
  $.ajax({

       url:'<?=base_url()?>dashboard_super/patient/patient/changestatus/'+admin_id,
       data:'id='+id+'&value='+value,
       success: function(msg){

         var v='';
         if(value =='1'){
           v="Active";
         }else{
           v="Inactive";
         }
         $("#h").text("Patient status has been "+v);
      //   alert(msg);
$('#active').modal('toggle');
        // alert(msg);
//$('#exampleModal').modal('toggle');
//alert(msg);
/**if(value='yes'){
  $("#y"+id).prop("checked", true);
}else{
  $("#n"+id).prop("checked", true);
}**/
setTimeout(function() {
    //  $(".alert").css("display","none");
    window.location="<?=base_url()?>dashboard_super/patient/patient/"+admin_id;
}, 3000);
//window.location="<?=base_url()?>patient/";
     }

 });
}

function getUserEmailId(email,from_id) {
    $('#reply_to_email').val(email);
    $('#to_user_id').val(from_id);
}

function GetAllUserMassages(from_id){
  $(".msg_history").empty();
  var txt ='';
  $.ajax({
       type: 'POST',
       url:'<?=base_url()?>dashboard_super/messages/message/getAllMsgData',
       data: {
          'from_user_id': from_id,
          '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
        },
       dataType: 'json',
       success: function(response){
        $.each(response.msg, function(index,value) {
          var attachement_sc = '';
          if(response.msg[index].file){
          attachement_sc = '<a href="<?php echo base_url()?>'+response.msg[index].file+'" target="_blank" class="attachement_sc"><i class="fa fa-paperclip" aria-hidden="true"></i><a>';
          }

          if(response.msg[index].type == 1){
          	txt = '<div class="outgoing_msg"><div class="sent_msg"><p><span class="small">Subject: '+response.msg[index].subject+'</span><br>Message: '+response.msg[index].message+'</p><span class="time_date"> '+response.msg[index].date+'</span> '+attachement_sc+'</div>';
          }
          if(response.msg[index].type == 2){
          	txt = '<div class="incoming_msg"><div class="received_msg"><div class="received_withd_msg"><p><span class="small">Subject: '+response.msg[index].subject+'</span><br>Message: '+response.msg[index].message+'</p><span class="time_date"> '+response.msg[index].date+'</span>'+attachement_sc+'</div></div></div>';
          }
          // console.log(txt);
          $('.msg_history').append(txt);
        })
        contact_read(from_id);
     }

 });
}

</script>
