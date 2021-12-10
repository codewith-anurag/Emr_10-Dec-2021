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
<!--<link href="<?//= base_url('assets/datatables/css/dataTables.min.css') ?>" rel="stylesheet" type="text/css"/>-->
</head>
<style type="text/css">
    .form-control{
            background-color: rgb(255, 255, 255, 0.0);
            font-size: 15.0px;
            color: rgba(100, 100, 100, 1.0);
            text-align: left;
            width: 95%;
            line-height: 2em;
            padding-top: 0.6em;
            border-radius: 6px;
        }
        .loginpage form .input, .loginpage input[type="text"], .loginpage input[type="password"] {
            font-size: 18px;
            width: 100%;
            padding: 10px;
            line-height: 25px;
            margin: 5px 0 20px 0;
            border: 1.5px solid #cad1d9;
            border-radius: 6px;
            font-weight: 600;
        }
        .box.login {
            background-color: #ffffff;
            margin: 15px 0;
            -webkit-box-shadow: 0 0px 0px rgba(0,0,0,.1);
            box-shadow: 0 0px 0px rgba(0,0,0,.1);
            border: 1px solid #ddd;
        }
        .form-label{
            font-size: 13.5px;
            color: #55cac5 !important;
            font-weight: 700px;
        }
        .alert-info {
            background-color: #d9edf7;
            border-color: #bce8f1;
            color: #31708f;
        }
        .badge {
            display: inline-block;
            min-width: 10px;
            padding: 3px 7px;
            font-size: 12px;
            font-weight: bold;
            color: #fff;
            line-height: 1;
            vertical-align: middle;
            white-space: nowrap;
            text-align: center;
            background-color: #777;
            border-radius: 10px;
        }
        .navbar {
            position: relative;
            min-height: 80px;
            margin-bottom: 0px;
            border-bottom: 1px solid #e7e7e7;
            box-shadow: 0 2px 4px 0 rgba(151, 145, 151, 0.1);
            padding: 0 2.5%;
        }
        .navbar-inverse {
            background-color: #fff;
            border-color: #fff;
        }
        .montserratFont {
        font-weight: 800;
        font-stretch: normal;
        font-style: normal;
        line-height: normal;
        letter-spacing: normal;
        text-align: center;
        /*color: #141215;*/
    }
    .center-cont {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }
</style>

    <div class="alert alert-info alert-dismissible" style="text-align: center; border: none; border-radius: unset; margin: 0;" role="alert"> <strong><span class="badge badge-pill" style="background-color: #17a2b8; margin: 0;">COVID-19 NOTE</span></strong>
        <span class="badge" style="background: transparent; margin: 0; color: #6d7278; white-space: normal;">
            In this time of need, we are providing an extended trial period and
            other assistance. Please contact us at
            <a onclick="window.open('')" style="color: pink;font-weight: 600;">support@demohealth.com</a>
            for additional support.
        </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position: absolute; top: 10px; right: 10px;"> <span id="cancel-btn" class="hover icon-md fas fa-times-circle" data-toggle="tooltip" style="font-size: 21.6px; font-weight: bold; color: #141215; padding:0;" title="cancel"></span>
        </button>
    </div>
    <header id="myCarousel" class="unselectable landing-nav">
        <nav class="navbar navbar-inverse navbar-fixed-top service_drop" role="navigation">
            <div>
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style="padding: 1.3em 15px;" href="/">
                        <img alt="Hospital logo" style="height: 1.8em;" src="<?php echo base_url(); ?>assets/images/logo.png">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="navbar-rectangle" href="/about.jsp"><span></span></a>
                        </li>
                        <li><a class="navbar-rectangle" href="/services.jsp"><span></span></a>
                        </li>
                        <li><a class="navbar-rectangle" href="/pricing.jsp"><span></span></a>
                        </li>
                        <li style="margin-left: 16px;"></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid" style="margin-top: 5px;">
        <div class="login-wrapper row">
            <div id="login" class="login loginpage col-lg-offset-4 col-md-offset-3 col-sm-offset-3 col-xs-offset-0 col-xs-12 col-sm-6 col-lg-4" style="width: 450px !important;">
                <div class="box login">
                    <div class="content-body" style="padding-top:30px">
                      <?php echo form_open('login','id="loginForm" novalidate'); ?>
                        <!--<form id="msg_validate" method="POST" action="#" novalidate="novalidate" class="no-mb no-mt">-->
                        <!--  <form action="http://glasier.in/emr/login" id="loginForm" novalidate="novalidate" method="post" accept-charset="utf-8" class="no-mb no-mt">-->
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="login-form-header" style="text-align: center;">
                                        <h4 class="bold color-black"><img alt="Hospital logo" style="height: 1.8em;" src="<?php echo base_url(); ?>assets/images/logo.png"></h4>
                                        <h4><small>Please enter your credentials to login.</small></h4>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Doctor/Patient Email or ID</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Doctor/Patient Email or ID">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <div class="controls">
                                            <input type="password" class="form-control"  placeholder="********" name="password" id="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">User Role</label>
                                        <div class="controls">
                                          <?php

                                              $userRoles = array(

                                                  ''  => display('select_user_role'),

                                                  '1' => display('admin'),

                                                  '2' => display('doctor'),

                                                //  '3' => display('accountant'),

                                                  //'4' => display('laboratorist'),

                //                                  '5' => display('nurse'),

              //                                    '6' => display('pharmacist'),

                //                                  '7' => display('receptionist'),

                  //                                '8' => display('representative'),

                    //                              '9' => display('case_manager'),

                                                  '10' => display('patient')

                                              );

                                              echo form_dropdown('user_role', $userRoles, $user->user_role, 'class="form-control" id="user_role" ');



                                          ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 center-cont">
                                        <div class="checkbox" style="margin: 3px 10px 5px 5px; font-size: 13.5px; height: 100%;">
                                            <label style="padding: 0;"> <span id="rememberBoxUnchecked" class="rememberImgToggle">
                                                <img src="/health/img/remember_me_box_unchecked.png" style="height: 15px; width: 15px;">
                                            </span><span id="rememberBoxChecked" class="rememberImgToggle" style="display: none;">
                                                <span style="display: inline-block;">
                                                    <img src="/health/img/remember_me_box_checked.png" style="height: 15px; width: 15px;">
                                                    <img src="/health/img/remember_me_check_mark.png" style="height: 10px; width: 10px; position: absolute; left: 2px; top: 4px;">
                                                </span>
                                                </span>
                                                <input id="remember_me" title="Remember my ID on this computer" type="checkbox" value="1" style="display: none;"> <span id="remember_me_label" class="montserratFont" title="Remember my ID on this computer" style=" color: #6d7278;"> Remember me </span>
                                            </label>
                                        </div> <span style="cursor: pointer; font-size: 13.5px; height: 100%; color: #6d7278; margin: 1px 5px 5px 10px;font-weight: 700;" title="Reset your forgotten password"><a href="./reset-password.php" style="color: #6d7278;">Forgot password?</a></span>
                                    </div>
                                    <button class="main_btn_action icon-color center-cont" type="submit" style="height: 3.5em; width: 225px; background-color: #D52C53; margin: auto; border-radius: 1.75em; border: none;">
                                        <div class="col-xs-10 center-cont" style="height: 100%;">
                                            <h3 style="margin: 0; font-size: 25px; color: #ebeef1; font-weight: 600;">Sign In</h3>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="signIn" class="form-group white-box" style="border: solid 1px rgba(20,18,21,0.11); width: 100%; max-width: 100%; padding: 0 1em; margin: 1em 0 auto;background-color: #ffffff;">
                    <!-- Sign up button -->
                    <!-- <div class="row" style="margin:1.5em 0;">
                        <div class="col-xs-12 center-cont">
                            <div>
                                <h3 class="montserratFont" style="font-size: 17px; margin:0; color: #6d7278;">Don't have an account? <a href="./register.php"><span style="color:#55cac5; cursor: pointer;font-size: 19px !important;">Sign Up</span></a></h3>
                            </div>
                            <div style="height: 0.25em;"></div>
                            <div style="height: 100%;" align="center">
                                <div id="errmsg" style="overflow: auto; color: red; display: none; font-size: 80%;"></div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="col-xs-12 iosApp androidApp" style="width: 100%; max-width: 100%; margin: 1em 0 auto; padding:0;">
                    <h3 class="montserratFont" style="font-size: 13.5px;color: #6d7278; text-align: center;">Get the app on...</h3>
                    <div class="col-xs-6" style="padding:3%;">
                        <!-- - footer google IOS icon-->
                        <a href="" target="_blank">
                            <img alt="IOS" src="https://www.75health.com/health/img/ios.png" width="100%">
                        </a>
                    </div>
                    <div class="col-xs-6" style="padding:3%;">
                        <!-- - footer google playstore icon-->
                        <a href="" target="_blank">
                            <img alt="playstore" src="https://www.75health.com/health/img/plstore.png" width="100%">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    </body>
</html>
