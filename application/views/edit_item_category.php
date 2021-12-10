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
    <h2 class="title pull-left" id="form-title">Edit Item Category</h2>
    <div class="actions panel_actions pull-right">
      <!-- <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a> -->
    </div>
  </header>
  <div class="content-body">
    <form method="POST" action="<?php echo base_url('item_master/edit_item_category/'.$category->category_id ) ?>" onsubmit="return validate();">
    <div class="row">
 
      <div class="row form-row ml-15 mr-15">
            <div class="col-xs-4">
              <div class="form-group">
                <label  for="service-name" style="margin-bottom: 5px;">Category Name<span class="required">*</span></label>
              <input type="text" name="category_name" class="form-control text-field" id="category_name" value="<?php echo $category->category_name ?>" placeholder="Category name">
              <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
              <input type="hidden" name="category_id" value="<?php echo $category->category_id ?>">
              <span class="category_name_erorr" style="color:red"></span>
            </div>
          </div>
                <div class="col-xs-4">
               <div class="form-group">
               <label for="status"  style="margin-bottom: 5px;">Status</label>
              <select class="form-control" name="status" id="status">
                <option  value="active" <?php echo ($category->status == "active") ? "selected='selected'" :'' ?>>Active</option>
                <option  value="inactive" <?php echo ($category->status == "inactive") ? "selected='selected'" : '' ?>>Inactive</option>
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
          <button type="submit" name="submit"  class="btn btn-default"><span class="fa fa-check" aria-hidden="true" style="margin-right: 5px;"></span>Update
          </button>
          <button type="button" class="btn btn-default"><span class="fa fa-times" style="margin-right: 5px;"></span> Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
</section>
<script type="text/javascript">
    function validate() {
        if($("#category_name").val() == ""){
            $(".category_name_erorr").html("Category Name is required.");
            return false;
        }
    }
</script>
