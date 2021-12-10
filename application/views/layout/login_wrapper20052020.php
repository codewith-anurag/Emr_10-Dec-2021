<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//get site_align setting
$settings = $this->db->select("site_align")
    ->get('setting')
    ->row();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= display('dashboard') ?> - <?php echo (!empty($title)?$title:null) ?></title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="<?= base_url($this->session->userdata('favicon')) ?>">

    <!-- jquery ui css -->
    <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-114-precomposed.png">
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-72-precomposed.png">
    <!-- For iPad Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-144-precomposed.png">

    <!-- CORE CSS FRAMEWORK - START -->
    <link href="<?php echo base_url(); ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- <link href="<?php //echo base_url(); ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" /> -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->

    <link href="<?php echo base_url(); ?>assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen" />

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE CSS TEMPLATE - START -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/pages/login.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/pages/login-page.css" rel="stylesheet" type="text/css" />
<!--<link href="<?//= base_url('assets/datatables/css/dataTables.min.css') ?>" rel="stylesheet" type="text/css"/>-->
</head>
<style type="text/css">
.form-control{
    background-color: rgb(255, 255, 255, 0.0) !important;
    font-size: 15.0px !important;
    color: rgba(100, 100, 100, 1.0) !important;
    text-align: left !important;
    width: 100% !important;
    line-height: 2em !important;
    padding-top: 0.6em !important;
}

@media only screen and (max-width:1400px) and (min-width:1000px) {
   #login {
    width: 430px !important;left:33%;
    top:60px;
  }
}

@media only screen and (max-width:2000px) and (min-width:1400px) {
  #login {
    width: 430px !important;left:38%;
  }
}
</style>

<body class=" login_page" style="background-color: #FAFAFA;">
    <div class="container-fluid">
        <div class="login-wrapper row">
            <div id="login" class="login loginpage col-xs-12 col-sm-6">
              <?php if ($this->session->flashdata('message') != null) {  ?>
              <div class="alert alert-info alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo $this->session->flashdata('message'); ?>
              </div>
              <?php } ?>
              <?php if ($this->session->flashdata('exception') != null) {  ?>
              <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo $this->session->flashdata('exception'); ?>
              </div>
              <?php } ?>
              <?php if (validation_errors()) {  ?>
              <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo validation_errors(); ?>
              </div>
              <?php } ?>
                <div class="box login">
                    <div class="content-body" style="padding-top:10px">
                      <?php echo form_open('login','id="loginForm" novalidate'); ?>
                        <!--<form id="msg_validate" method="POST" action="#" novalidate="novalidate" class="no-mb no-mt">-->
                        <!--  <form action="http://glasier.in/emr/login" id="loginForm" novalidate="novalidate" method="post" accept-charset="utf-8" class="no-mb no-mt">-->
                        <div class="row">
                            <div class="login-form-header" style="text-align: center;">
                                <img alt="Hospital logo" style="" src="<?php echo base_url(); ?>assets/images/logo.png">
                                <h4><small>Please enter your credentials to login.</small></h4>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="form-label"><b><i>Doctor/Patient Email or ID</i></b></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Doctor/Patient Email or ID" style="
                                        ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"><b><i>Password</i></b></label>
                                    <div class="controls">
                                        <input type="password"   class="form-control"  placeholder="********" maxlength="25" name="password" id="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"><b><i>User Role</i></b></label>
                                    <div class="controls">
                                        <!--<select type="password" id="user_role"  name="user_role" class="form-control" style="padding-top: 0.3em !important;">-->
                                          <select name="user_role" class="form-control" id="user_role" style="padding-top: 0.3em !important;">
                                          <option value="" selected="selected">Select User Role</option>
                                          <option value="1">Admin</option>
                                          <option value="2">Doctor</option>
                                          <option value="10">Patient</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 center-cont">
                                    <div class="checkbox" style="margin: 3px 10px 5px 5px; font-size: 13.5px; height: 100%;">
                                        <label style="padding: 0;"> <span id="rememberBoxUnchecked" class="rememberImgToggle">
                                            <img src="/health/img/remember_me_box_unchecked.png" style="height: 15px; width: 15px;">
                                            <input type="checkbox" id="remember_me" title="Remember my ID on this computer" type="checkbox" value="1">  Remember me
                                        </label>
                                    </div> <span style="cursor: pointer; font-size: 13.5px; height: 100%; color: #6d7278; margin: 1px 5px 5px 10px;font-weight: 700;" title="Reset your forgotten password"><a href="<?php echo base_url('dashboard/reset_password'); ?>" style="color: #6d7278;">Forgot password?</a></span>
                                    </div>
                                    <button class="main_btn_action icon-color center-cont" id="btn-sign-in" type="submit">
                                        <div class="col-xs-10 center-cont" style="height: 100%;">
                                            <h3 id="h3-signIn">Sign In</h3>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                      </div>
                  </div>
                  <!-- <div id="signIn" class="form-group white-box">
                      <div class="row" style="margin:1.5em 0;">
                          <div class="col-xs-12 center-cont">
                              <div>
                                  <h3 class="montserratFont" style="font-size: 17px; margin:0; color: #6d7278;">Don't have an account? <a href="./register.php"><span style="color:#55cac5; cursor: pointer;font-size: 19px !important;">Sign Up</span></a></h3>
                              </div>
                          </div>
                      </div>
                  </div> -->
                  <div class="col-xs-12 iosApp androidApp" style="width: 100%; max-width: 100%; margin: 1em 0 auto; padding:0;">
                      <h3 class="montserratFont" style="font-size: 13.5px;color: #6d7278; text-align: center;">Get the app on...</h3>
                      <div class="col-xs-6" style="padding:3%;">
                          <!-- - footer google IOS icon-->
                          <a href="#" target="_blank">
                              <img alt="IOS" src="https://www.75health.com/health/img/ios.png" width="100%">
                          </a>
                      </div>
                      <div class="col-xs-6" style="padding:3%;">
                          <!-- - footer google playstore icon-->
                          <a href="#" target="_blank">
                              <img alt="playstore" src="https://www.75health.com/health/img/plstore.png" width="100%">
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</body>
<!-- END BODY -->
</html>
        <!-- Content Wrapper -->



        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <!--<script src="<?php //echo base_url('assets/js/jquery.min.js') ?>" type="text/javascript"></script>-->
        <!-- bootstrap js --><!--assets\plugins\bootstrap\js-->
        <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            var info = $('table tbody tr');
            info.click(function() {
                var email    = $(this).children().first().text();
                var password = $(this).children().first().next().text();
                var user_role = $(this).attr('data-role');

                $("input[name=email]").val(email);
                $("input[name=password]").val(password);
                $('select option[value='+user_role+']').attr("selected", "selected");
            });
        });
        </script>

        <script type="text/javascript">
            $(window).load(function() {
            setTimeout(function(){ $('.alert-dismissable').fadeOut('slow'); }, 1600);
            })
        </script>

        <script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/viewport/viewportchecker.js"></script>
        <script>
            window.jQuery || document.write('<script src="./assets/js/jquery.min.js"><\/script>');
        </script>
        <!-- CORE JS FRAMEWORK - END -->
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->
        <!-- CORE TEMPLATE JS - START -->
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
