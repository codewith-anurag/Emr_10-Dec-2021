<style type="text/css">
  .page-sidebar {
      height: auto;
      width: 260px;
      position: fixed;
      padding: 0px;
      background-color: #ffffff;
      margin-top: 60px;
      overflow: hidden;
      box-shadow: 0 0 0px 0 rgba(33,33,33,.2) !important;
      }

   .sidebar-li{
        border-bottom: 2px #eee solid;
        }
        #main-menu-wrapper li a:hover {
        background-color: #d5f3f2;
        border-left: 4px solid #4d9cf8;
        color: #00b3ac;
        }
         #main-menu-wrapper li a:hover {
              color: #150aec;
               font-weight: 800;
        }
        .text-primary:hover {
                color: #150aec;
               font-weight: 800;
        }
        .table>tbody>tr>td:hover {
       font-weight: 600;
      }
      #main-menu-wrapper li a {
        color: #150aec;
      }
      .text-primary {
color: #150aec;
}
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
.table>tbody>tr>td:hover {
font-weight: 600;
}
.delete .modal-content {
border-radius: 15px;
}
.delete .modal-title  {
color: #150aec;
font-size: 18px;
font-weight: 700;
}
.delete .modal-body p {
color: red;
font-weight: 700;
}
.delete .modal-body {
padding: 20px;
}
.text-primary .color-black {
color: #848484;
font-size: 15px;
}
.light-grey {
color: #a9a9a9;
padding-right: 10px;
font-weight: 600;
}
.ml-15 {
margin-left: 15px;
}
.pt-15 {
padding-top: 15px !important;
}
.p-0 {
padding: 0px;
}
.border-right {
border-right: 1px solid #ccc;
}
section header {
  border:none !important;
  border-bottom: 1px solid #ccc !important;
      margin-bottom: 10px;
background: #efefef !important;
min-height: 0px;
padding-left: 5px !important;
}
.insurance {
  position: relative;
left: 13px;
top: 18px;
}
.pos-icon {
  display: flex;
position: absolute;
right: 15px;
bottom: 13px;
}
.w-100 {
width: 100%;
}
.imp-red {
color: red !important;
}
.page-sidebar.chat_shift .wraplist li .title, .page-sidebar.collapseit .wraplist li .title, .page-sidebar.chat_shift .wraplist li .arrow, .page-sidebar.collapseit .wraplist li .arrow {
display: block;
position: absolute;
left: 0;
top: 38px;
font-size: 13px;
margin-left: 5px;
max-width: 139px;
word-break: break-word;
width: 70px;
white-space: break-spaces;
line-height: 17px;
}
.page-sidebar.chat_shift .wraplist li:hover .title, .page-sidebar.collapseit .wraplist li:hover .title {
top: 30px;
}
.page-sidebar.chat_shift #main-menu-wrapper .wraplist li a, .page-sidebar.collapseit #main-menu-wrapper .wraplist li a {
padding-left: 0px;
margin-bottom: 33px;
}
.page-sidebar.chat_shift .wraplist li:hover .title, .page-sidebar.collapseit .wraplist li:hover .title {
top: 40px;
}
.page-sidebar {
width: 180px;
}
#main-content {
  margin-left: 165px;
}
.insurance-table thead {
color: #000;
background: #ccc;
font-size: 12px;
}
.m-0 {
margin: 0px;
}
.bg-light-grey {
  background: #eee;
padding: 10px;
}
.border-bottom {
border-bottom: 1px solid #ccc;

}
.modal-content h4 {
    color: #150aec;
    font-weight: 700;
}
.modal-content {
    border-radius: 15px !important;
}
.modal-body {
    padding: 15px;
    height: 350px;
    max-height: 500px;
    overflow-y: auto;
    overflow-x: hidden;
}
.down-arrow {
  text-align: right;
    position: relative;
    right: 10px;
    top: 13px;
    font-size: 18px;
    color: #2d2d2d;
}
.intl-tel-input {
    display: block !important;
}

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

.hide {
    display: none;
}
.cropped{
 width:150px!important;
}
/* Crop image box */
</style>
<div class="clearfix"></div>
<div class="col-lg-12 p-0">
    <?php 
        if ($this->session->flashdata('fail')) {                    
    ?>
        <div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> <?php  echo $this->session->flashdata('fail') ?><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>
    <?php } ?>
  <div class="col-lg-12 col-xs-12 p-0">    
    <section>
        <header class="panel_header">        
            <h2 class="title pull-left" id="form-title">Add Icd</h2>
            
        </header>
       <?php echo form_open_multipart('dashboard_super/icd/icd/upload_icdversion','class="form-inner"') ?>
        
          <div class="row ml-10 mr-10">        
            <div class="col-12 col-md-3 form-group">
              <label>Icd Version File<span class="imp-red">*</span></label>
              <input type="file" required=""  name="icd_codefile" class=" text-field"  id="icd_namefile">
            </div>
          </div>

  
    <div class="mb-10 mt-10 ml-10">
      <button type="submit" class="btn btn-default"  name="save" value="1">Save</button>
      <a href ="<?php echo base_url()."dashboard_super/icd/icd/"; ?>" ><button type="button" class="btn btn-default">Close</button></a>
    </div>
  <?php form_close(); ?>
  </section>
  </div>

</div>
</div>
<script>
    function goBack() {
      window.history.back();
    }
</script>
<div class="clearfix"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    setTimeout(function(){ $(".alert-danger").hide(); }, 3000);
</script>