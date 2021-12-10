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

.hide {
    display: none;
}
.cropped{
 width:150px!important;
}
/* Crop image box */
</style>
<div class="clearfix"></div>
<div class="row">
<div class="col-lg-12" style="margin-right: 2%; margin-bottom: 30px;"> <!---border: 1px solid #e8e8e8;-->
                <div>
                    <section > <!--class="box"-->
                        <header class="panel_header">
                            <h2 class="title pull-left" id="form-title">
                                <?php if(isset($doctor->user_id)){ ?>Edit Medical Provider Account <?php }else{ ?>Create Medical Provider Account<?php  } ?></h2>
                            <div class="actions panel_actions pull-right">
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                            </div>
                        </header>
                        <div class="col-lg-12 col-xs-12" style="margin-top: 15px;margin-left: 5px;">
                        <p>Enter new Medical Provider's First name, Last name, Gender and press the create button </p>
                    </div>
                        <div class="content-body">
                        <div class="row">
                          <?php echo form_open_multipart('dashboard_super/doctor/doctor/create/'.$admin_id.'/'.$doctor->user_id,'class="form-inner"') ?>

                              <?php echo form_hidden('user_id',$doctor->user_id) ?>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="firstname">First Name <span class="required">*</span></label>
              </div>
              <div class="col-xs-6">
                  <input type="text" name="firstname" class="form-control text-field" id="firstname" value="<?php echo $doctor->firstname ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="lastname">Last Name <span class="required">*</span></label>
              </div>
              <div class="col-xs-6">
                  <input type="text" name="lastname" value="<?php echo $doctor->lastname ?>" class="form-control text-field" id="lastname">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="sex">Gender <span class="required">*</span></label>
              </div>
              <div class="col-xs-6">
                   <select class="form-control" name="sex" id="sex">
                                                <option value="">Select Gender</option>
                                                <option value="Male" <?php echo ($doctor->sex=='Male')?'Selected':''; ?> >Male</option>
                                                <option value="Female" <?php echo ($doctor->sex=='Female')?'Selected':''; ?> >Female</option>
                                                <option value="other" <?php echo ($doctor->sex=='Other')?'Selected':''; ?> >Other</option>
                                            </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="date_of_birth">Birth Date <span class="required">*</span></label>
              </div>
              <div class="col-xs-6">
                <?php if(isset($doctor->user_id)){
                  $d = $doctor->date_of_birth;
                }else{
                  $d = date('m/d/Y',strtotime('-18 years'));
                }
                  ?>
                  <input type="text" name="date_of_birth" class="form-control text-field" data-date-format='yyyy-mm-dd' id="date_of_birth"  value="<?php echo date('Y-m-d',strtotime($d)); ?>">
                </div>
              </div>
            </div>
          </div>
          <?php if (empty($doctor->user_id)) { ?>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="email">Email<span class="required">*</span></label>
              </div>
              <div class="col-xs-6">
                  <input type="email" name="email" class="form-control text-field" id="email" value="<?php echo $doctor->email ?>">
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="mobile">Mobile<span class="required">*</span></label>
              </div>
              <div class="col-xs-6">
                  <input type="text" name="mobile" class="form-control text-field" id="mobile" maxlength="15" value="<?php echo $doctor->mobile ?>">
                  <input type="hidden"  value="<?php echo $doctor->mobile_prefix; ?>" name="mobile_prefix" class="form-control text-field" id="mobile_prefix">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="address">Address<span class="required">*</span></label>
              </div>
              <div class="col-xs-6">
                  <!-- <textarea  name="address" class="form-control text-field" id="address"><?php //echo trim($doctor->address); ?></textarea> -->
                  <input type="text" name="address"  value="<?php echo $doctor->address ?>" class="form-control text-field" id="address" placeholder="Address">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="city">City<span class="required">*</span></label>
              </div>
              <div class="col-xs-6">
                  <!-- <textarea  name="address" class="form-control text-field" id="address"><?php //echo trim($doctor->address); ?></textarea> -->
                  <input type="text" name="city"  value="<?php echo $doctor->city ?>" class="form-control text-field" id="city" placeholder="city">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="city">State<span class="required">*</span></label>
              </div>
              <div class="col-xs-6">
                  <!-- <textarea  name="address" class="form-control text-field" id="address"><?php //echo trim($doctor->address); ?></textarea> -->
                  <input type="text" name="state"  value="<?php echo $doctor->state ?>" class="form-control text-field" id="state" placeholder="state">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="city">Country<span class="required">*</span></label>
              </div>
              <div class="col-xs-6">
                  <!-- <textarea  name="address" class="form-control text-field" id="address"><?php //echo trim($doctor->address); ?></textarea> -->
                  <input type="text" name="country"  value="<?php echo $doctor->country ?>" class="form-control text-field" id="country" placeholder="country">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
                <div class="col-xs-3">
                  <label class="form-label" for="address">Zip Code<span class="required">*</span></label>
                </div>
                <div class="col-xs-6">
                  <!-- <textarea  name="address" class="form-control text-field" id="address"><?php //echo $doctor->address ?></textarea> -->
                  <input type="text" name="zipcode"  value="<?php echo $doctor->zipcode ?>" class="form-control text-field" id="zipcode" placeholder="Zip Code">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="department_id">Department <span class="required">*</span></label>
              </div>
              <div class="col-xs-6">
                   <?php echo form_dropdown('department_id',$department_list,$doctor->department_id,'class="form-control" id="department_id" onchange="shows(this.options[this.selectedIndex].text)"') ?>
                </div>
                <div class="col-xs-1">
                  <a href="#" class="btn btn-xs btn-danger" id="btnDelete" value="Delete" onclick="delete_department();"> <i class="fa fa-trash"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row" id="ddiv" style="display:none;">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="otherdepatment">Other Department</label>
              </div>
              <div class="col-xs-6">
                  <input type="text" name="department" class="form-control text-field" id="otherdepatment" maxlength="15" value="">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="role_id">Role <span class="required">*</span></label>
              </div>
              <div class="col-xs-6">
                   <?php echo form_dropdown('role_id',$role_list,$doctor->role_id,'class="form-control" id="role_id" onchange="rshows(this.options[this.selectedIndex].text)"') ?>
                </div>
                <div class="col-xs-1">
                  <a href="#" class="btn btn-xs btn-danger" id="btnDelete" value="Delete" onclick="delete_role();"> <i class="fa fa-trash"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row" id="rdiv" style="display:none;">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="otherrole">Other Role</label>
              </div>
              <div class="col-xs-6">
                  <input type="text" name="role" class="form-control text-field" id="otherrole" maxlength="15" value="">
                </div>
              </div>
            </div>
          </div>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="admin_access">Admin Access</label>
              </div>
              <div class="col-xs-6">
                <input type="radio"  name="is_admin" <?php echo ($doctor->is_admin=='1')?'checked':''; ?>   value="1">  Yes
&nbsp;&nbsp;
                <input type="radio"  name="is_admin" <?php echo ($doctor->is_admin=='0')?'checked':''; ?>   value="0">  No
                   <!-- <select class="form-control" name="is_admin" id="admin_access">

                                                <option value="1" <?php //echo ($doctor->sex=='1')?'Active':''; ?> >Active</option>
                                                <option value="0" <?php //echo ($doctor->sex=='0')?'Inactive':''; ?> >Inactive</option>

                                            </select> -->
                </div>
              </div>
            </div>
          </div>
          <?php //if(isset($doctor->user_id)){
            ?>
            <?php if(!empty($doctor->picture)) {  ?>
            <div class="row form-row">
              <div class="col-xs-12">
                <div class="form-group">
                <div class="col-xs-3">
                  <label class="form-label" for="picturePreview"></label>
                </div>
                <div class="col-xs-6">
                    <img src="<?php echo base_url($doctor->picture) ?>" alt="Picture" class="img-thumbnail" style="width:150px;" />
                    <a href="<?php echo base_url();?>dashboard_super/doctor/doctor/delete_profile_pic/<?php echo $doctor->user_id;?>" class="btn btn-xs btn-danger" onclick="return confirm('Are You Sure ?') "> <i class="fa fa-trash"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="picture">Picture</label>
              </div>
              <div class="col-xs-6">
                  <input type="file" name="picture" class="form-control text-field" id="picture" maxlength="15" value="<?php echo $doctor->picture ?>">
                  <input type="hidden" name="old_picture" value="<?php echo $doctor->picture ?>">
                  <input type="hidden" name="croppicture" id="croppicture">
                </div>
              </div>
            </div>
          </div>
          <!-- image Crope -->
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">

              </div>
              <div class="col-xs-4">
                  <div class="box-2">
                    <div class="result"></div>
                  </div>
                  <div class="box1">
                    <div class="options hide">
                      <label> Width</label>
                      <input type="number" class="img-w" value="300" min="100" max="600" />
                    </div>
                    <button class="btn save hide">Crop</button>
                  </div>
                </div>
                <div class="col-xs-2">
                  <div class="box-2 img-result hide">
                    <img class="cropped" src="" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- image Crope -->
          <div class="row form-row">
            <div class="col-xs-12">
              <div class="form-group">
              <div class="col-xs-3">
                <label class="form-label" for="status">Status</label>
              </div>
              <div class="col-xs-6">
                   <select class="form-control" name="status" id="status">

                                                <option value="1" <?php echo ($doctor->sex=='1')?'Active':''; ?> >Active</option>
                                                <option value="0" <?php echo ($doctor->sex=='0')?'Inactive':''; ?> >Inactive</option>

                                            </select>
                </div>
              </div>
            </div>
          </div>
        <?php// } ?>

                            <div class="col-xs-12  padding-bottom-30 col-xs-offset-4">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-default"><span class="fa fa-check" aria-hidden="true"></span> <?php if(isset($doctor->user_id)){ ?>Update <?php }else{ ?>Create <?php  } ?></button>
                                    <button type="button" class="btn btn-default" onclick="goBack()"><span class="fa fa-times"></span> Cancel</button>
                                </div>
                            </div>
                            </form>
                            </div>
                        </div>
                    </section>
                </div>
</div>
</div>
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
function shows(txt){
  if(txt=='Other'){
    $("#ddiv").css("display","block");
  }else{
    $("#ddiv").css("display","none");
  }

  //alert(txt);

}
function rshows(txt){
  if(txt=='Other'){
    $("#rdiv").css("display","block");
  }else{
    $("#rdiv").css("display","none");
  }

  //alert(txt);

}
    function goBack() {
      window.history.back();
    }
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.5.0/css/intlTelInput.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.5.0/js/intlTelInput.js"></script>
<script>
$("#mobile").intlTelInput({
autoHideDialCode: true,
autoPlaceholder: true,
separateDialCode: true,
nationalMode: true,
geoIpLookup: function (callback) {
    $.get("https://ipinfo.io", function () {}, "jsonp").always(function (resp) {
        var countryCode = (resp && resp.country) ? resp.country : "";
        //
      //  alert(resp);
        //console.log(resp);
        callback(countryCode);
    });
},
initialCountry: "auto",
});

// get the country data from the plugin
var countryData = $.fn.intlTelInput.getCountryData(),
telInput = $("#mobile"),
addressDropdown = $("#listcountry");
//alert(countryData);
// init plugin
telInput.intlTelInput({
utilsScript: "../wp-content/themes/saba/build/js/utils.js" // just for formatting/placeholders etc
});

// populate the country dropdown
$.each(countryData, function(i, country) {
  //console.log(country);

addressDropdown.append($("<option></option>").attr("value", country.iso2).text(country.name));
});

// listen to the telephone input for changes
telInput.on("countrychange", function() {
  var a = telInput.intlTelInput("getSelectedCountryData").dialCode;
  //alert(a);
  $("#mobile_prefix").val(a);
var countryCode = telInput.intlTelInput("getSelectedCountryData").iso2;
addressDropdown.val(countryCode);
});

// trigger a fake "change" event now, to trigger an initial sync
telInput.trigger("countrychange");

// listen to the address dropdown for changes
addressDropdown.change(function() {

var countryCode = $(this).val();
//alert(countryCode);
telInput.intlTelInput("setCountry", countryCode);
});
// Image crop
 // vars
let result = document.querySelector('.result'),
img_result = document.querySelector('.img-result'),
img_w = document.querySelector('.img-w'),
img_h = document.querySelector('.img-h'),
options = document.querySelector('.options'),
save = document.querySelector('.save'),
cropped = document.querySelector('.cropped'),
upload = document.querySelector('#picture'),
cropper = '';

// on change show image with crop options
upload.addEventListener('change', (e) => {
  if (e.target.files.length) {
    // start file reader
    const reader = new FileReader();
    reader.onload = (e)=> {
      if(e.target.result){
        // create new image
        let img = document.createElement('img');
        img.id = 'image';
        img.src = e.target.result
        // clean result before
        result.innerHTML = '';
        // append new image
        result.appendChild(img);
        // show save btn and options
        save.classList.remove('hide');
        options.classList.remove('hide');
        // init cropper
        cropper = new Cropper(img);
      }
    };
    reader.readAsDataURL(e.target.files[0]);

  }
});

// save on click
save.addEventListener('click',(e)=>{
  e.preventDefault();
  // get result to data uri
  let imgSrc = cropper.getCroppedCanvas({
    width: img_w.value // input value
  }).toDataURL();
    $('#croppicture').val(imgSrc);
  // remove hide class of img
    cropped.classList.remove('hide');
  img_result.classList.remove('hide');
  // show image cropped
  cropped.src = imgSrc;
});
// Image crop

    </script>
