<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
    .header-text h1 {
    font-size: 20px;
    background: #5586e7;
    padding: 14px;
    color: #fff;
    margin-top: 0;
    }
    .btn-right {float: right; margin-right: 11px; margin-bottom: 11px;}
    .hovertr:hover {
    background-color: #d5f3f2;
    }
    .modal-content {
    border-radius: 15px !important;
    }
    .modal-content h4 {
    color: #150aec;
    font-weight: 700;
    }
    .modal-body {
    max-height: 100%;
    /* height: 500px; */
    height: 100%;
    overflow: hidden;
    }
    .pagination {
    display: flex;
    justify-content: center;
    }
    .pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    }
    .pagination a.active {
    background-color: #150aec;
    color: white;
    }
    .pagination a:hover:not(.active) {background-color: #ddd;}
    .item_list2 {padding: 0;}
    .item_list2 li {
    background: #150aec;
    display: inline;
    padding: 5px 10px;
    color: #fff;
    border-radius: 10px;
    margin-right: 10px;
}
.edit_item_list2 li a {
    background: transparent;
    border: none;
    margin-right: 7px;
    padding: 0;
    margin-bottom: 10px;
    color: #FFF;
}

.edit_item_list2 {padding: 0;}
.edit_item_list2 li {
    background: #150aec;
    display: inline;
    padding: 5px 10px;
    color: #fff;
    border-radius: 10px;
    margin-right: 10px;
}
.edit_item_list2 li a {
    background: transparent;
    border: none;
    margin-right: 7px;
    padding: 0;
    margin-bottom: 10px;
    color: #FFF;
}
.text-left {text-align: left;}
div.dataTables_wrapper div.dataTables_paginate {float: right;}
.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus {
        background-color: #150aec;
    border-color: #150aec;
}
div.dataTables_wrapper div.dataTables_info {    color: #150aec;}
.pagination a:hover:not(.active) {
    background-color: #fff;
    color: #150aec;
}
.pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover {
    color: #150aec;
    border-color: #150aec;
}

.select2-container {
    z-index: 99999;
    width: 100% !important;
}

.select2-dropdown {
    z-index: 99999;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #5785e8 !important;
}

.select2-container--default .select2-selection--single {
    border: 1px solid #e1e1e1 !important;
}

.select2-results__option[aria-selected] {
    color: #5785e8;
}

</style>

<div class="col-lg-12 p-0">
    <div class="col-lg-12 col-xs-12 p-0">
        <div class="header-text">
            <h1>Patient Name : <b><?php echo $patient->fname ?>   <?php echo $patient->lname ?></b></h1>
        </div>
        <section>
            <header class="panel_header">
                <h2 class="title pull-left" id="form-title">Subscribe</h2>
            </header>
           
            <div class="col-lg-12">
                <table class="table table-border DTable">
                    <thead>
                        <tr>
                            <th class="text-left" width="20%" style="text-align: left;">Date</th>
                            <th width="20%" class="text-left" style="text-align: left;">Amount</th>
                            <th width="20%"  class="text-left">Subscribe</th>
                            <th width="20%" class="text-left">Duration</th>
                            <th width="20%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="padd">
                        <?php 
                            foreach($subscribe as $subscribe_list){
                         ?>
                        <tr class="hovertr">
                            <td class="text-left"><?php echo date("d-m-Y h:i",strtotime($subscribe_list->created_date)); ?></td>
                            <td class="text-left">$ <?php echo $subscribe_list->amount ?></td>
                            <td class="text-left"><?php echo ($subscribe_list->subscribe == 1 ) ? "Yes" : "No";  ?></td>
                            <td class="text-left"><?php echo $subscribe_list->duration;  ?></td>
                            <td class="pt-20">
                                <div class="btn-group" style="float: right;display: flex;">
                                    <a href="<?php echo base_url('dashboard_doctor/invoice/item_master/send_paymentlink/'.$subscribe_list->id.'/'.$subscribe_list->patient_id) ?>" class="btn btn-xs icon-box btn-default" style="margin-right:10px;" onclick="return confirm('Are you sure Resend mail ?')"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url('dashboard_doctor/invoice/item_master/invoice_pdf/'.$subscribe_list->id.'/'.$subscribe_list->patient_id) ?>" target="_blank" class="btn btn-xs icon-box btn-default" style="margin-right:10px;"><i class="fa fa-file-text" aria-hidden="true"></i></a>
                                    
                                    <a href="<?php echo base_url('dashboard_doctor/invoice/item_master/delete_subscribe/'.$subscribe_list->id.'/'.$subscribe_list->patient_id) ?>" onclick="return confirm('Are you sure Delete this record?')" class="btn btn-xs btn-danger icon-box" style="margin-right:10px;border:1px solid #f00 !important;"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <header class="panel_header" style="margin-top: 30px;">
                <h2 class="title pull-left" id="form-title">Invoice</h2>                
            </header>
            <div class="btn-right">
                <button  class="btn btn-default"  data-toggle="modal" data-target="#myModal">Add Invoice</span></button>
            </div>
            <div class="col-lg-12">
                <table class="table table-border DTable">
                    <thead>
                        <tr>
                            <th class="text-left">Date</th>
                            <th  class="text-left">Invoice Number</th>
                            <th  class="text-left">Amount</th>
                            
                            <th class="text-left">Status</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="padd">
                        <?php 
                            foreach($invoice as $invoice_list){
                         ?>
                        <tr class="hovertr">
                            <td class="text-left"><?php echo date("d-m-Y h:i",strtotime($invoice_list->created_date)); ?></td>
                            <td class="text-left"><?php echo $invoice_list->order_id; ?></td>
                            <td class="text-left">$ <?php echo $invoice_list->amount; ?></td>
                            
                            <td class="text-left"><?php echo ($invoice_list->status == 1 ) ? "Paid" : "Unpaid";  ?></td>                            
                            <td class="pt-15">
                                <div class="btn-group" style="float: right;display: flex;">
                                    <button onclick="return edit_subscribe(<?php echo $invoice_list->id ?>);" data-toggle="modal" data-target="#editmyModal" class="btn btn-xs icon-box btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></button>
                                     <a href="<?php echo base_url('dashboard_doctor/invoice/item_master/send_invoice_paymentlink/'.$invoice_list->id.'/'.$invoice_list->patient_id) ?>" class="btn btn-xs icon-box btn-default" style="margin-right:10px;" onclick="return confirm('Are you sure Resend mail ?')"><i class="fa fa-envelope" aria-hidden="true" ></i></a>                                                                
                                    
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <header class="panel_header" style="margin-top: 30px;">
                <h2 class="title pull-left" id="form-title">Communication log</h2>
            </header>
            <div class="col-lg-12">
                <table class="table table-border DTable">
                    <thead>
                        <tr>
                            <th class="text-left">Date</th>
                            <th class="text-left">Type</th>
                            <th  class="text-left">Note</th>
                            <th class="text-left">Amount owed</th>
                           
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="padd">
                        <?php 
                           foreach ($communication_log as $communication_log_list) {                               

                         ?>
                        <tr class="hovertr" style="border-bottom: 1px solid #ccc;">
                            <td class="text-left"><?php echo date("d-m-Y h:i",strtotime($communication_log_list->date))  ?></td>
                            <td class="text-left"><?php echo $communication_log_list->type ?></td>
                            <td class="text-left"><?php echo $communication_log_list->note ?></td>
                            <td class="text-left">$ <?php echo  $communication_log_list->amount_owed ?></td>
                            
                            <td class="pt-15">
                                <div class="btn-group" style="float: right;display: flex;">
                                    <!-- <a href="#" class="btn btn-xs icon-box btn-default" style="margin-right:10px;"><i class="fa fa-repeat" aria-hidden="true"></i></a> -->
                                    <a href="<?php echo base_url('dashboard_doctor/invoice/item_master/delete_communication_log/'.$communication_log_list->id.'/'.$communication_log_list->patient_id) ?>" class="btn btn-xs btn-danger icon-box" style="margin-right:10px;border:1px solid #f00 !important;" onclick="return confirm('Are you sure Delete this record?')"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <header class="panel_header" style="margin-top: 30px;">
                <h2 class="title pull-left" id="form-title">Billing History</h2>
            </header>
            <div class="col-lg-12">
                <table class="table table-border DTable">
                    <thead>
                        <tr>
                            <th  class="text-left">Date</th>
                            <th class="text-left">Item</th>                            
                            <th class="text-left">Paid amount</th>
                            <th class="text-left">Pyment ID</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="padd">
                        <?php 
                        $patientid = $this->uri->segment(5);
                        $serviceName= "";
                        $getitem = array();
                            foreach ($billing_history as  $billing_history_value) {
                                if( strpos($billing_history_value->item,",") !== false ) {
                                    $items = explode(",",$billing_history_value->item);                                    
                                        $this->db->select('*');
		                                $this->db->from('item_master');                
		                                $this->db->where_in('item_master.id',$items);
		                                $query =$this->db->get();             
                                        $getitem = $query->result();                                                                                                              
                                }else{
                                    $getitem = $this->db->get_where("item_master",array('id' =>$billing_history_value->item))->row();
                                    $serviceName = $getitem->service_name;
                                }
                        ?>
                        <tr class="hovertr">
                            <td class="text-left"><?php echo date("d-m-Y h:i",strtotime($billing_history_value->updated_date)); ?></td>
                            <td class="text-left"><?php
                            if( strpos($billing_history_value->item,",") !== false ) {                                    
                                for($i=0;$i<count($getitem);$i++){     
                                    echo $service =  $getitem[$i]->service_name.",";                                    
                                }                                
                            }else{
                                echo $serviceName;
                            }
                                 
                            ?></td>                            
                            <td class="text-left">$ <?php echo $billing_history_value->amount ?></td>
                            <td class="text-left"><?php echo ($billing_history_value->payment_type == 1) ? $billing_history_value->payment_id : 'Cash'?></td>
                            <td class="pt-15">
                                <div class="btn-group" style="float: right;display: flex;">
                                       <a href="<?php echo base_url('dashboard_doctor/invoice/item_master/invoice_pdf/'.$billing_history_value->id.'/'.$billing_history_value->patient_id) ?>" target="_blank" class="btn btn-xs icon-box btn-default" style="margin-right:10px;"><i class="fa fa-file-text" aria-hidden="true"></i></a>

                                    <a href="<?php echo base_url('dashboard_doctor/invoice/item_master/delete_billinghistory/'.$billing_history_value->id.'/'.$patientid) ?>" class="btn btn-xs btn-danger icon-box" style="margin-right:10px;border:1px solid #f00 !important;" onclick="return confirm('Are you sure Delete this record?')"><i class="fa fa-trash"></i></a>

                                </div>
                            </td>
                        </tr>
                       <?php } ?>
                    </tbody>
                </table>
                
            </div>
        </section>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 850px;">
                <div class="modal-content">
                    <form method="POST" id="add_subscribe">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Add Subscribe </h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-md-6 form-group pl-0">
                                    <label>AMOUNT<span class="imp-red">*</span></label>
                                    <input required type="text" name="amount" disabled=""  class="form-control text-field" id="amount" placeholder="Amount">  
                                    <input type="hidden" name="patient_id" id="patinet_id" class="form-control text-field" value="<?php echo $this->uri->segment(5) ?>">                                  
                                </div>
                            </div>
                            <div class="row mt-15">
                                <div class="col-12 col-md-6 form-group pl-0">
                                    <label>Item<span class="imp-red">*</span></label>
                                    <select class="form-control"  name="item" required id="item" onchange="return calculate_item_price();">
                                        <option value="" selected="selected">Select Item</option>
                                        <?php
                                            foreach ($item as $items) {
                                            ?>
                                        <option value="<?php echo $items->id ?>" id="item_ids_<?php echo $items->id?>"><?php echo $items->service_name.'  - $ '.$items->amount.'';  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-15 item_list">
                                <ul class="item_list2" style="list-style-type: none;"></ul>
                            </div>
                            <div class="row mt-15">
                                <div class="col-12 col-md-6 form-group pl-0">
                                    <label>Subscribe <span class="imp-red">*</span></label>
                                    Yes <input type="radio" name="subscribe" class="subscribe" id="subscribe" value="1" required="">
                                    No <input type="radio" name="subscribe" class="subscribe" id="subscribe" value="0" required="">
                                </div>
                            </div>
                            <div class="row mt-15">
                                <div class="col-12 col-md-6 form-group pl-0 select_duration" style="display: none;">
                                    <label>Duration<span class="imp-red">*</span></label>
                                    <select class="form-control duration"  name="duration" required id="duration">
                                        <option value="" selected="selected">Select Duration</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="quaterly">Quaterly</option>
                                        <option value="yearly">Yearly</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button  type="button" class="btn btn-default" onclick="return save_subscribe()">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editmyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 850px;">
                <div class="modal-content">
                    <form method="POST" id="edit_subscribe">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Edit Invoice </h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-md-6 form-group pl-0">
                                    <label>AMOUNT<span class="imp-red">*</span></label>
                                    <input required type="text" name="amount" disabled=""  class="form-control text-field " id="edit_amount" placeholder="Amount">
                                    <input type="hidden" name="editsubscribe_id" id="editsubscribe_id" class="form-control text-field ">
                                    <input type="hidden" name="edit_total_amount" id="edit_total_amount" class="form-control text-field ">
                                    <input type="hidden" name="patient_id" id="patinet_id" class="form-control text-field" value="<?php echo $this->uri->segment(5) ?>">
                                </div>
                            </div>
                            <div class="row mt-15">
                                <div class="col-12 col-md-6 form-group pl-0">
                                    <label>Item<span class="imp-red">*</span></label>
                                    <select class="form-control"  name="item" required id="edit_item" onchange="return edit_calculate_item_price();">
                                        <option value="" selected="selected">Select Item</option>
                                        <?php
                                            foreach ($item as $items_value) {
                                            ?>
                                        <option value="<?php echo $items_value->id ?>" id="edititem_ids_<?php echo $items_value->id?>"><?php echo $items_value->service_name.'  - $ '.$items_value->amount.'';  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-15 item_list">
                                <ul class="edit_item_list2" style="list-style-type: none;"></ul>
                            </div>

                            <div class="row mt-15">
                                <div class="col-12 col-md-6 form-group pl-0">
                                    <label>Payment Type<span class="imp-red">*</span></label>
                                    <select class="form-control"  name="payment_type" required id="payment_type">
                                        <option value="" selected="selected">Select Payment Type</option>
                                        <option value="0">Cash</option>
                                        <option value="1">Paypal</option>
                                    </select>
                                </div>
                            </div>
                           
                            
                        </div>
                        <div class="modal-footer text-center">
                            <button  type="button" class="btn btn-default" onclick="return update_invoice()">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    /*$('.select2').select2({
        closeOnSelect: true,
        tags: true,
        dropdownParent: $('#add_subscribe')
    });
    $('.editselect2').select2({
        closeOnSelect: true,
        tags: true,
        dropdownParent: $('#edit_subscribe')
    });*/
});
</script>
<script type="text/javascript">    
    $(document).ready( function () {
        $('.DTable').DataTable({
            "order": [[ 0, "desc" ]], 
        });
    } );

    $(".subscribe").on("change",function(){
        //alert(10);
        var subscribe = $(this).val();
        //alert(subscribe);
        if(subscribe == 1){
            $(".select_duration").show();
        }else{
            $(".select_duration").hide();
        }

    })
</script>
<script>   
   var  total = 0;
   var item_Data = new Array(); 
function calculate_item_price(){

    var item_id = $("#item").val();
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
    var dataJson = { [csrfName]: csrfHash,  item_id: item_id };


    $.ajax({
        url:"<?php echo base_url(); ?>dashboard_doctor/invoice/item_master/get_item_info",
        method:"POST",
        data:dataJson,
        success:function(data)
        {
            var htmldata = JSON.parse(data);
            var  html = "";
            $.each(htmldata, function( index, value ) {
                html = '<li  title="'+value.service_name+'" data-select2-id="'+value.id+'" id="item_id_'+value.id+'"><a href="javascript:void(0)" onclick="return remove_item('+value.id+','+ parseInt(value.amount)+')"><span  role="presentation" style="color:#FFF">×</span></a>'+value.service_name+'  - $'+value.amount+'</li>';
                $(".item_list2").append(html);
                var value_amount = parseInt(value.amount);
                $('#amount').empty();
                total = value_amount + total;
                $('#amount').val(total);


                item_Data.push(value.id);
                if(item_id == value.id){                    
                    $("#item_ids_"+item_id).hide();
                    $('#item').val(null).trigger('change');
                }
            });           
        }
    });
}

function remove_item(item_id,item_amount) {
    //console.log(item_id);
    var n = item_id.toString();
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
    var dataJson = { [csrfName]: csrfHash,  item_id: item_id,item_amount:item_amount };

    const index = item_Data.indexOf(n);
    console.log(index);
    if (index > -1) {
        item_Data.splice(index, 1);
    }
    console.log(item_Data); 
   
    $("#item_id_"+item_id).remove();
    var Total = $("#amount").val();
    total = Total - item_amount;
    $("#amount").empty();
    $('#amount').val(total);
    $("#item_ids_"+item_id).show();
    $('#item').prop('selectedIndex',0);
}



function save_subscribe(){
    console.log(item_Data);
    var csrfName    = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash    = '<?php echo $this->security->get_csrf_hash(); ?>';
    var patientid   = "<?php echo $this->uri->segment(5) ?>";
    var amount      = $("#amount").val();
    var subscribe   = $('input[name="subscribe"]:checked').val();    
    var duration    = $("#duration").val();
    $.ajax({
        url:"<?php echo base_url(); ?>dashboard_doctor/invoice/item_master/insert_subscribe",
        method:"POST",
        data:{ [csrfName]: csrfHash, item_Data: item_Data,patientid: patientid,amount: amount,subscribe: subscribe,duration: duration },
        success:function(data)
        {
            if(data){
                console.log(data);
                setTimeout(function(){ window.location="<?php echo current_url() ?>"; }, 1000);
            }   
        }
    });
}

function edit_subscribe(subscribe_id) {
    //alert(subscribe_id);

    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
    var dataJson = { [csrfName]: csrfHash,  subscribe_id: subscribe_id };
    var ids_array = new Array();
    var item_id = $("#item").val();

    $.ajax({
        url:"<?php echo base_url(); ?>dashboard_doctor/invoice/item_master/edit_subscribe",
        method:"POST",
        data:dataJson,
        success:function(data)
        {
            var htmldata = JSON.parse(data);
            console.log(htmldata);
            var  html = "";                
            $("#editsubscribe_id").empty();
            $("#editsubscribe_id").val(subscribe_id);
            $.each(htmldata.service_names, function( sindex, svalue ) {
                
               /* html = '<li  title="'+svalue.service_name+'" data-select2-id="'+svalue.id+'" id="edititem_id_'+svalue.id+'"><a href="javascript:void(0)" onclick="return edit_remove_item('+svalue.id+','+ parseInt(svalue.amount)+')"><span  role="presentation">×</span></a>'+svalue.service_name+'  - $'+svalue.amount+'</li>';
                        $(".item_list2").append(html);
                    var value_amount = parseInt(svalue.amount);
                    $('#edit_amount').empty();
                    total = value_amount + total;
                    $('#edit_amount').val(total);*/
                    edit_calculate_item_price(svalue.id);

                    /*item_Data.push(svalue.id);
                    if(item_id == svalue.id){
                        $("#edititem_ids_"+item_id).hide();
                        $("#edit_item").change('refresh');
                    }
*/
            });            
        }
    });
}




function edit_calculate_item_price(item_ids=0){
    //console.table(item_id)
    var item_id = "";
    if(item_ids !=""){
        item_id = item_ids;
    }else{
        item_id = $("#edit_item").val();
    }  
    //alert(item_id);
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
    var dataJson = { [csrfName]: csrfHash,  item_id: item_id };
    

    $.ajax({
        url:"<?php echo base_url(); ?>dashboard_doctor/invoice/item_master/get_item_info",
        method:"POST",
        data:dataJson,
        success:function(data)
        {
           // item_Data.splice(0,item_Data.length);
            var htmldata = JSON.parse(data);
            var  html = "";
            $("#edit_item_list2").empty();
            $.each(htmldata, function( index, svalue ) {
                html = '<li  title="'+svalue.service_name+'" data-select2-id="'+svalue.id+'" id="edit_item_id_'+svalue.id+'"><a href="javascript:void(0)" onclick="return edit_remove_item('+svalue.id+','+ parseInt(svalue.amount)+')"><span  role="presentation">×</span></a>'+svalue.service_name+'  - $'+svalue.amount+'</li>';
                $(".edit_item_list2").append(html);
                var value_amount = parseInt(svalue.amount);
                $('#edit_amount').empty();
                total = value_amount + total;
                $('#edit_amount').val(total);
                $("#edit_total_amount").empty();
                $('#edit_total_amount').val(total);


                item_Data.push(svalue.id);
                
                console.log(item_Data);
                if(item_id == svalue.id){
                    $("#edititem_ids_"+item_id).hide();
                }
            });
            if($("#edit_item").val() !=""){
                item_Data.push($("#edit_item").val());
            }           
        }
    });
}

function edit_remove_item(edit_item_id,edit_item_amount) {
    
    $("#edit_item_id_"+edit_item_id).remove();
    console.log("edit_item_id_"+edit_item_id); 
    var n = edit_item_id.toString();
    const index = item_Data.indexOf(n);
    console.log(index);
    if (index > -1) {
        item_Data.splice(index, 1);
    }
    console.log(item_Data); 
    
    
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
    var dataJson = { [csrfName]: csrfHash,  item_id: edit_item_id,edit_item_amount:edit_item_amount };
   
    
    var Total = $("#edit_total_amount").val();
    console.log(Total);
    var total = Total - edit_item_amount;
    console.log(total);
    console.log(item_Data);
    $("#edit_amount").empty();
    $('#edit_amount').val(total);
    $("#edit_total_amount").empty();
    $('#edit_total_amount').val(total);
    $("#edititem_ids_"+edit_item_id).show();
    $('#edititem').prop('selectedIndex',0);
}




function update_invoice(){
    console.log(item_Data);
    var csrfName    = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash    = '<?php echo $this->security->get_csrf_hash(); ?>';
    var patientid   = '<?php echo $this->uri->segment(5) ?>';
    var amount      = $("#edit_total_amount").val();    
    var subscribe_id = $("#editsubscribe_id").val();
    var payment_type  = $("#payment_type").val();
   
    $.ajax({
        url:"<?php echo base_url(); ?>dashboard_doctor/invoice/item_master/update_invoice",
        method:"POST",
        data:{ [csrfName]: csrfHash, item_Data: item_Data,patientid: patientid,amount: amount,subscribe_id: subscribe_id,payment_type: payment_type },
        success:function(data)
        {
            if(data){
                console.log(data);
                setTimeout(function(){ window.location="<?php echo current_url() ?>"; }, 1000);
            }   
        }
    });
}




</script>
