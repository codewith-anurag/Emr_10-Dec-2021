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
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/fonts/webfont/cryptocoins.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.1.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo base_url(); ?>assets/plugins/morris-chart/css/morris.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo base_url(); ?>assets/plugins/calendar/fullcalendar.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url(); ?>assets/plugins/icheck/skins/minimal/minimal.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END -->

        <!-- CORE CSS TEMPLATE - START -->
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
<!--<link href="<?//= base_url('assets/datatables/css/dataTables.min.css') ?>" rel="stylesheet" type="text/css"/>-->
    </head>

    <body class="">
      <div class='page-topbar gradient-blue1'>
          <div class='logo-area crypto'>

          </div>
          <div class='quick-area'>
              <div class='pull-left'>
                  <ul class="info-menu left-links list-inline list-unstyled">
                      <li class="sidebar-toggle-wrap">
                          <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                              <i class="fa fa-bars"></i>
                          </a>
                      </li>
                      <li class="topnav-item item1">
                          <a href="#" class="new-link w-text">
                            <?php
                                //$userRoles = array(
                                //    '1' => display('admin'),
                                //    '2' => display('doctor'),
                                //    '3' => display('accountant'),
                                //    '4' => display('laboratorist'),
                                //    '5' => display('nurse'),
                                //    '6' => display('pharmacist'),
                                //    '7' => display('receptionist'),
                                //    '8' => display('representative')
                              //  );
                              //  echo $userRoles[$this->session->userdata('user_role')];
                            ?></a>
                          <!--  <span class="badge badge-primary ml-5">New</span> -->
                          </a>
                      </li>
                    <!--  <li class="topnav-item open item2">
                          <a href="#" class="nav-link w-text">
                            <i class="fa fa-area-chart mr-10"></i>Reports
                          </a>
                      </li>
                      <li class="topnav-item item3">
                          <a href="#" class="nav-link w-text">
                            <i class="fa fa-sitemap mr-10"></i>Trading
                          </a>
                      </li>-->


                      <li class="hidden-sm hidden-xs searchform">
                          <form action="#" method="post">
                              <div class="input-group">
                                  <span class="input-group-addon">
                                  <i class="fa fa-search"></i>
                              </span>
                                  <input type="text" class="form-control animated fadeIn" placeholder="Search & Enter">
                              </div>
                              <input type='submit' value="">
                          </form>
                      </li>
                  </ul>
              </div>
              <div class='pull-right'>
                  <ul class="info-menu right-links list-inline list-unstyled">
                      <li class="profile">
                          <a href="#" data-toggle="dropdown" class="toggle">
                            <?php $picture = $this->session->userdata('picture'); ?>
                              <img src="<?php echo (!empty($picture)?base_url($picture):base_url("assets/images/no-img.png")) ?>" alt="user-image" class="img-circle img-inline">
                              <span><?php echo $this->session->userdata('fullname') ?> <i class="fa fa-angle-down"></i></span>
                          </a>
                          <ul class="dropdown-menu profile animated fadeIn">
                              <!--<li>
                                  <a href="crypto-account-setting.html">
                                      <i class="fa fa-wrench"></i> Settings
                                  </a>
                              </li>-->
                              <li>
                                  <a href="<?php echo base_url('dashboard_patient/home/profile'); ?>">
                                      <i class="fa fa-user"></i> <?php echo display('profile') ?>
                                  </a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url('dashboard_patient/home/form'); ?>">
                                      <i class="fa fa-info"></i> <?php echo display('edit_profile') ?>
                                  </a>
                              </li>
                              <li class="last">
                                  <a href="<?php echo base_url('dashboard_patient/home/logout') ?>">
                                      <i class="fa fa-lock"></i> <?php echo display('logout') ?>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </div>
          </div>

      </div>
      <!-- END TOPBAR -->
      <!-- START CONTAINER -->
      <div class="page-container row-fluid container-fluid">

          <!-- SIDEBAR - START -->

          <div class="page-sidebar fixedscroll">

              <!-- MAIN MENU - START -->
              <div class="page-sidebar-wrapper" id="main-menu-wrapper">

                  <ul class='wraplist'>
                      <li class='menusection'>Main</li>
                      <li class="<?php echo (($this->uri->segment(2) == 'home') ? "open" : null) ?>">
                          <a href="<?php echo base_url('dashboard_patient/home') ?>">
                              <i class="img">
                                  <img src="<?php echo base_url(); ?>assets/data/hos-dash/icons/3.png" alt="" class="width-20">
                              </i>
                              <span class="title"><?php echo display('dashboard') ?></span>
                          </a>
                      </li>
                      <li class="<?php echo (($this->uri->segment(2) == "case_manager") ? "open" : null) ?>">
                          <a href="<?php echo base_url("dashboard_patient/case_manager/patient/index") ?>">
                              <!--<i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/2.png" alt="" class="width-20">
                              </i>-->
                              <i class="fa fa-history"></i>
                              <span class="title"><?php echo display('status') ?></span>
                          </a>
                      </li>


                      <li class="<?php echo (($this->uri->segment(2) == "document") ? "open" : null) ?>">
                          <a href="javascript:;">
                            <i class="fa fa-book"></i>
                              <!--<i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/5.png" alt="" class="width-20">
                              </i>-->
                              <span class="title"><?php echo display('documents') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php echo base_url("dashboard_patient/document/document/form") ?>"><?php echo display('add_document') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php echo base_url("dashboard_patient/document/document/index") ?>"><?php echo display('document_list') ?></a>
                              </li>

                          </ul>
                      </li>
                      <li class="<?php echo (($this->uri->segment(2) == "prescription") ? "open" : null) ?>">
                          <a href="javascript:;">
                              <!--<i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/6.png" alt="" class="width-20">
                              </i>-->
                              <i class="fa fa-file-text-o"></i>
                              <span class="title"><?php echo display('prescription') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php echo base_url("dashboard_patient/prescription/prescription") ?>"><?php echo display('prescription_list') ?></a>
                              </li>

                          </ul>
                      </li>




                  </ul>

              </div>
              <!-- MAIN MENU - END -->

          </div>
          <!--  SIDEBAR - END -->

          <!-- START CONTENT -->
          <section id="main-content" class=" ">
              <div class="wrapper main-wrapper row" style=''>

                  <div class='col-xs-12'>
                      <div class="page-title">

                          <div class="pull-left">
                              <!-- PAGE HEADING TAG - START -->
                              <h1 class="title"><?php echo ucwords(str_replace('_', ' ', $this->uri->segment(1))) ?></h1>
                              <small><?php echo (!empty($title)?$title:null) ?></small>
                              <!-- PAGE HEADING TAG - END -->
                          </div>

                      </div>
                  </div>
                  <div class="col-lg-12">
                      <section class="box nobox marginBottom0">
                          <div class="content-body">
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



                            <!-- content -->
                            <?php echo (!empty($content)?$content:null) ?>
                              <!-- End .row -->
                          </div>
                      </section>
                  </div>

                  <div class="clearfix"></div>
                  <!-- MAIN CONTENT AREA STARTS -->





                  <div class="col-xs-12 col-md-6 col-lg-4" style="display:none;">
                      <section class="box ">
                          <header class="panel_header">
                              <h2 class="title pull-left">Operation Success Rate</h2>
                              <div class="actions panel_actions pull-right">
                                  <a class="box_toggle fa fa-chevron-down"></a>
                                  <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                                  <a class="box_close fa fa-times"></a>
                              </div>
                          </header>
                          <div class="content-body">
                              <div class="row">
                                  <div class="col-xs-12">
                                        <div class="chart-container">
                                            <div class="" style="height:200px" id="user_type"></div>
                                        </div>
                                  </div>
                              </div> <!-- End .row -->
                          </div>
                      </section>
                  </div>



              <div class="col-xs-12 col-md-6 col-lg-4" style="display:none;">
                  <section class="box ">
                      <header class="panel_header">
                          <h2 class="title pull-left">Pharmacy Orders</h2>
                          <div class="actions panel_actions pull-right">
                              <a class="box_toggle fa fa-chevron-down"></a>
                              <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                              <a class="box_close fa fa-times"></a>
                          </div>
                      </header>
                      <div class="content-body">
                          <div class="row">
                              <div class="col-xs-12">
                                  <div class="chart-container">
                                      <div class="" style="height:200px" id="browser_type"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
              </div>








                  <div class="clearfix"></div>

                  <!-- MAIN CONTENT AREA ENDS -->
              </div>
          </section>
          <!-- END CONTENT -->


          <div class="chatapi-windows ">

          </div>
      </div>



































            <!-- =============================================== -->
            <!-- Left side column. contains the sidebar -->


            <!-- =============================================== -->
            <!-- Content Wrapper. Contains page content -->
             <!-- /.content-wrapper -->


   <!-- ./wrapper -->


        <!-- jquery-ui js -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/viewport/viewportchecker.js"></script>
        <script>
            window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"><\/script>');
        </script>


        <!-- CORE JS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->

        <script src="<?php echo base_url(); ?>assets/plugins/echarts/echarts-custom-for-dashboard.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/chart-flot.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/dashboard-hos.js"></script>


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

        <!-- CORE TEMPLATE JS - START -->
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

                <!--<script src="<?php //echo base_url("assets/datatables/js/dataTables.min.js") ?>"></script>
                <!-- tinymce texteditor -->
              <!--  <script src="<?php //echo base_url() ?>assets/tinymce/tinymce.min.js" type="text/javascript"></script>
                <!--<script src="<?php //echo base_url() ?>assets/js/custom.js" type="text/javascript"></script>-->
              <!--  <script type="text/javascript">
                  jQuery.noConflict();
                  // Code that uses other library's $ can follow here.
                </script>-->
                <script>

                //$j("datepicker_new").datepicker();
                $(document).ready(function () {
                  var d = new Date();
                   $('.datepicker').datepicker({
                       format: 'dd-mm-yyyy',
                       startDate: '01/01/1970',
                       todayHighlight: true,
                       autoclose: true

                   });
                });
                   //$('.timepicker').timepicker({
                     //uiLibrary: 'bootstrap4'
                     //});
                   </script>
    </body>
</html>
