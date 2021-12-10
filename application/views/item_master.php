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
          <td width="5%" style="border-right: none;">
            <a href="<?php echo base_url().'item_master/' ?>create">
              <button id="create" class="btn btn-default" style="margin-right: 11px;">
                <span class="fa fa-plus"></span>
                &nbsp;&nbsp;Add Item</span>
              </button>
            </a>
          </td>
          <td width="5%" style="border-right: none;">
            <a href="<?php echo base_url().'item_master/' ?>upload_item">
              <button id="create" class="btn btn-default" style="margin-right: 11px;">
                <span class="fa fa-plus"></span>
                &nbsp;&nbsp;Upload Item</span>
              </button>
            </a>
          </td>
          <td width="10%" style="border-left: none;">
             <a href="<?php echo base_url().'item_master/item_category' ?>">
              <button id="create" class="btn btn-default" style="margin-right: 11px;">
                <span class="fa fa-list"></span>
                &nbsp;&nbsp;List of category items</span>
              </button>
            </a>
          </td>
        
          <td>
            <div style="position: absolute;/*right:calc(59% - 28%)*/; /*left: 1em; top: 0;*/ padding-top: 9px;margin-left: 15px;" > <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search" aria-hidden="true"  style="margin-left: 1px;"></span>
            </div>
            <input onkeyup="item_search()" id="item_searchid" style="padding-left: 3em; padding-right: 3em; width: 100%; height: 100%; padding-bottom: 4px; padding-top: 8px; border: 1px solid #f7f8f9;" maxlength="100" class="form-control" placeholder="search by Item Name,Amount" title="search by Item Name,Amount" >
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
            <th class="text-left">Item Name</th>
			<th class="text-left">Amount</th>
            <th class="text-left">Category</th>
            <th width="10%" class="text-left">Status</th>
            <th width="10%" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody id="padd">
          <?php foreach ($list as $value) { ?>


          <tr class="hovertr" style="border-bottom: 1px solid #ccc;">
            <td class="text-left"><?php echo $value->service_name; ?></td>
			<td class="text-left"><?php echo $value->amount; ?></td>
            <td class="text-left"><?php $category = $this->db->get_where("itemcategory_master", array('category_id' => $value->category))->row();
               echo $category->category_name;  ?></td>
            <td class="text-left">
                 <div class="btn-group">
                        <select class="btn btn-default form-control" onchange="call('<?php echo $value->id; ?>',this.options[this.selectedIndex].value)">
                            <option <?php echo($value->status=='active')?'selected':''; ?> value="active">Active</option>
                            <option <?php echo($value->status=='inactive')?'selected':''; ?> value="inactive">Inactive</option>
                        </select>
                    </div>
            </td>
               <td class="pt-15">
                    <div class="btn-group" style="float: right;display: flex;">
                      <!-- <a href="#" class="btn btn-xs icon-box btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a> -->
                      <a href="<?php echo base_url().'item_master/edit/'.$value->id; ?>" class="btn btn-xs icon-box btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo base_url().'item_master/delete/'.$value->id; ?>" onclick="return confirm('Are you sure Delete this record?')" class="btn btn-xs btn-danger icon-box" style="margin-right:10px;border:1px solid #f00 !important;"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>

    </div>
  </section>
</div>
<div class="clearfix"></div>
<div id="active" class="modal fade active" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="h"></h4>
        <!-- <span>Sahil sahil</span> -->
      </div>
    </div>

  </div>
</div>
<script>

function call(id,value)
{
 //alert(value);
   var changeStatus =  confirm('Are you sure?');
    if(changeStatus){
    $.ajax({

         url:'<?=base_url()?>item_master/changestatus',
         data:'id='+id+'&value='+value,
         success: function(msg){

           $("#h").text("Item master status has been "+value);
        //   alert(msg);
        $('#active').modal('toggle');
       }

   });
  }
      setTimeout(function() {
      //  $(".alert").css("display","none");
      window.location="<?=base_url()?>item_master";
  }, 3000);

}
</script>
