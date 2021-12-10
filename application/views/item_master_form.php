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
.cropped{
  width: 150px!important;
}
.hide {
    display: none;
}
/* Crop image box */
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<div class="clearfix"></div>
<!---border: 1px solid #e8e8e8;-->

  <section > <!--class="box"-->
  <header class="panel_header">
    <!-- <h2 class="title pull-left" id="form-title">Create Item Master</h2> -->
    <h2 class="title pull-left" id="form-title">
    <?php if(isset($item->id)){ ?>Edit Item Master <?php }else{ ?>Create Item Master<?php  } ?></h2>
    <div class="actions panel_actions pull-right">
      <!-- <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a> -->
    </div>
  </header>
  <div class="content-body">
    <div class="row">
  <?php echo form_open_multipart('item_master/create','class="form-inner"') ?>
    <?php echo form_hidden('id',$item->id) ?>
      <div class="row form-row ml-15 mr-15">
            <div class="col-xs-4">
              <div class="form-group">
                <label  for="service-name" style="margin-bottom: 5px;">Service Name<span class="required">*</span></label>
              <input type="text" name="service_name" class="form-control text-field" id="service-name" value="<?php echo $item->service_name; ?>" placeholder="Service name">
            </div>
          </div>
		  <div class="col-xs-4">
                 <div class="form-group">
               		<label for="category"  style="margin-bottom: 5px;">Amount <span class="required">*</span></label>
					   <input type="text" name="amount" class="form-control text-field" id="amount" value="<?php echo $item->amount; ?>" placeholder="Amount">
            	</div>
            </div>
            <div class="col-xs-4">
                 <div class="form-group">
               		<label for="category"  style="margin-bottom: 5px;">Category <span class="required">*</span></label>
					<select class="form-control" name="category" id="category">
						<option  value="">Select Category</option>
						<?php foreach ($category as $key => $value) {                    
						?>
						<option <?php echo ($value->category_id == $item->category)? 'selected':''; ?> value="<?php echo $value->category_id;?>"><?php echo $value->category_name ?></option>
						<?php } ?>                
					</select>
            	</div>
            </div>
            <div class="col-xs-4">
               <div class="form-group">
            	   <label for="status"  style="margin-bottom: 5px;">Status</label>
              		<select class="form-control" name="status" id="status">
                		<option <?php echo ($item->status=='active')?'selected':''; ?> value="active">Active</option>
                		<option <?php echo ($item->status=='inactive')?'selected':''; ?> value="inactive">Inactive</option>
              		</select>
            	</div>
          </div>
      </div>

      <div class="row form-row">
        <div class="col-xs-12">

            <div class="col-xs-4">

            </div>

        </div>
      </div>



      <div class="col-xs-12  padding-bottom-30" style="margin-right: 20px;">
        <div class="text-center">
          <button type="submit" name="submit" class="btn btn-default"><span class="fa fa-check" aria-hidden="true" style="margin-right: 5px;">
            <?php if($item->id){ ?>Update <?php }else{ ?>Create <?php  } ?></span>
          </button>
          <button type="button" class="btn btn-default"><span class="fa fa-times" style="margin-right: 5px;"></span> Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
</section>
