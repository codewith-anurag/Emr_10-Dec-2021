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
<style type="text/css">
.navbar-inverse .navbar-nav>li>a {
    color: #150aec;
}
.address i {
    color: #150aec;
}
.address span {
    color: #150aec;
}
.contact i {
    color: #150aec;
}
.contact span {
    color: #150aec;
}
.copyright {
    color: #150aec;
}
body.login_page {
    height: 720px;
    overflow: auto;
    min-height: 100%;
}
.forgot-pass .modal-title{
    color: #150aec;
    font-weight: 600;
}
.forgot-pass .modal-body {
    padding: 15px;
}
.forgot-pass p {
    color: #464646;
    font-size: 14px;
}
.forgot-img {
    width: 250px;
    margin: 0 auto;
    display: block;
    margin-bottom: 10px;
}
.text-footer .form__group{
    width: 75%;
}
.text-footer .form__label {
    background: #fff;
}
.text-footer .form__field:focus ~ .form__label{
        background: #fff;
}
.forgot-pass .bg-img {
    position: relative;
}
.forgot-pass .btn-default {
    border-color: #150aec !important;
    background-color: #fff !important;
    border: 1px solid #150aec !important;
    color: #150aec !important;
}
.forgot-pass .btn-default:hover {
    color: #ffffff !important;
     background-color: #150aec !important;
}
.forgot-pass .login-text {
    margin-top: 22px;
}
.dis-flex span {
    color: #150aec;
    cursor: pointer;
}
</style>
</head>
<body class=" login_page" style="background-image:url('../assets/images/bg-cloud.jpg')!important;">
    <header id="myCarousel" class="unselectable landing-nav">
        <nav class="navbar navbar-inverse navbar-fixed-top service_drop" role="navigation">
            <div class="row">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style="padding: 1.3em 15px;" href="/">
                        <img alt="Hospital logo" style="margin-top: -10px" src="<?php echo base_url(); ?>assets/images/logo.png">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departments<i class="fa fa-sort-desc"></i></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Department</a>
                                <a class="dropdown-item" href="#">Cardiology</a>
                                <a class="dropdown-item" href="#">Dental</a>
                                <a class="dropdown-item" href="#">Microscope</a>
                                <a class="dropdown-item" href="#">Nurology</a>
                                <a class="dropdown-item" href="#">Nuclear Magnetic</a>
                                <a class="dropdown-item" href="#">X-Ray</a>
                         </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services<i class="fa fa-sort-desc"></i></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Services</a>
                                <a class="dropdown-item" href="#">Cardiology</a>
                                <a class="dropdown-item" href="#">Children Medical Services</a>
                                <a class="dropdown-item" href="#">Problem in Healthcare</a>
                                <a class="dropdown-item" href="#">Speciality Services</a>
                                <a class="dropdown-item" href="#">Travel Health</a>
                                <a class="dropdown-item" href="#">Women Health</a>
                         </li>
                        <li><a hrf="#">Events</a></li>
                        <li><a href="#">Pages</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-40">
          <h1>Log in </h1>
            <div class="row bg-light-grey">
              <?php echo form_open('login','id="loginForm" novalidate'); ?>
                <div class="col-12 col-md-6">
                    <div class="login-text">
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Email ID" name="email" id="email" required />
                         <label for="email" class="form__label">Email ID</label>
                    </div>
                     <div class="form__group field mt-15">
                        <input type="password" class="form__field" placeholder="Password" name="password" id="password" required  />
                         <label for="password" class="form__label">Password</label>
                    </div>
                        <select name="user_role" id="user_role" class="form-control mt-15">
                          <option value="11" selected="selected">Select User Role</option>
                          <option value="1">Admin</option>
                          <option value="2">Medical Provider</option>
                          <option value="10">Patient</option>
                        </select>
                    </div>
                     <div class="dis-flex">
                        <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                    Remember Me
                    </label>
                        </div>
                         <!-- <a href="<?php //echo base_url('dashboard/reset_password'); ?>"> Forgot Password</a> -->

                         <a href="#"  onclick="return call();"> Forgot Password</a>
                         <!--<span  data-target="#forgot-password"> Forgot Password</span>-->


                     </div>
                    <button type="submit" class="btn btn-primary text-center">Sign In</button>
                     <!-- <div class="heading-bottom">
                        <p>Don't have an account ? <a href="#">Sign Up</a></p>
                    </div> -->
                </div>
              </form>
                <div class="col-12 col-md-6 pr-0 pl-0">
                        <img class="side-img" src="<?php echo base_url(); ?>assets/images/bg-img.jpg">
                          <div class="bg-img">
                            <a href="#">
                            <img class="w-30" src="<?php echo base_url(); ?>assets/images/app-store-icon.png">
                        </a>
                        <span>Get the app on </span>
                        <a href="#">
                            <img class="w-35 right-0" src="<?php echo base_url(); ?>assets/images/google-play.png">
                        </a>

                </div>
            </div>
                </div>
            </div>

            <!-- <footer>
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-12 col-md-3 footer-logo">
                        <img  src="assets/images/logo.png">
                    </div>
                    <div class="col-12 col-md-6 address-contace">
                       <div class="address">
                        <i class="fa fa-map-marker"></i><span></span>
                       </div>
                       <div class="contact">
                        <i class="fa fa-phone"></i><span>+ 862-231-4046</span>
                       </div>
                </div>
                <div class="col-12 col-md-3 copyright">
                    <span><i class="fa fa-copyright"></i>Copyright © 2019 | All rights reserved by GT Consultancy Services </span>
                </div>
            </div>
            </footer> -->
            <footer>
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-12 col-md-3 footer-logo">
                        <!-- <img width="250"  src="assets/images/logo.png"> -->
                         <a href="#"><i class="fa fa-envelope"></i><span>info@visionaryhealthservice.com</span></a>
                    </div>
                    <div class="col-12 col-md-4 address-contace">
                       <div class="contact">
                        <i class="fa fa-phone"></i><span>+ 862-231-4046</span>
                       </div>
                </div>
                <div class="col-12 col-md-5 copyright">
                    <a target="_blank" href="https://www.gtimecs.org/"><span>Copyright © <?php echo date('Y'); ?> | All rights reserved by GT Consultancy Services.  </span></a>
                </div>
            </div>
            </footer>
        </div>


  <div class="modal fade password" id="mypassword" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <?php if ($this->session->flashdata('message') != null) {  ?>
          <h4>Message </h4>
          <span><?php echo $this->session->flashdata('message'); ?> </span>
          <?php } ?>
          <?php if ($this->session->flashdata('exception') != null) {  ?>
        <h4>Alert </h4>
        <span><?php echo $this->session->flashdata('exception'); ?> </span>
        <?php } ?>
        <?php if (validation_errors()) {  ?>
      <h4>Alert </h4>
      <span><?php echo validation_errors() ?> </span>
      <?php } ?>
        </div>
      </div>
    </div>
  </div>

</body>
<!-- END BODY -->
<div id="forgotpasswords" class="modal fade forgot-pass" role="dialog">
<?php echo form_open('dashboard/reset_password','id="loginForm" novalidate'); ?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reset Password</h4>
      </div>
      <div class="modal-body">
        <img class="forgot-img" src="<?php base_url(); ?>assets/images/logo.png">
        <!-- <p>Please enter your emr.visionaryhealthservices.com account Email Id and click Reset Password. Wait a few moments and check your Email. (Check your Spam or Junk Mail box also!)</p> -->
        <div class="login-text text-footer">
             <div class="form__group field">
                        <input type="input" class="form__field" placeholder="DOCTOR/PATIENT EMAIL OR ID" name="email" id="email" required />
                         <label for="emailID" class="form__label">Email ID</label>
             </div>
        </div>
        <!-- <div class="bg-img">
                            <a href="#">
                            <img class="w-30" src="assets/images/app-store-icon.png">
                        </a>
                        <span>Get the app on </span>
                        <a href="#">
                            <img class="w-35 right-0" src="assets/images/google-play.png">
                        </a>
                </div> -->
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" >Reset your Password</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
      </div>
    </div>
  </div>
  </form>
</div>
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
            //e.preventDefault();

        });
        function call(){
            $("#forgotpasswords").modal();
        }
        </script>


        <?php if ($this->session->flashdata('message') != null) {
        echo "<script type='text/javascript'> $(document).ready(function(){ $('#mypassword').modal('show');  });</script>";
         } ?>
         <?php if ($this->session->flashdata('exception') != null) {
         echo "<script type='text/javascript'> $(document).ready(function(){ $('#mypassword').modal('show');  });</script>";
          } ?>
          <?php if (validation_errors()) {
          echo "<script type='text/javascript'> $(document).ready(function(){ $('#mypassword').modal('show');  });</script>";
           } ?>
        <script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/viewport/viewportchecker.js"></script>
        <script>
            window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"><\/script>');
        </script>
        <!-- CORE JS FRAMEWORK - END -->
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->
        <!-- CORE TEMPLATE JS - START -->
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <script>

</script>
