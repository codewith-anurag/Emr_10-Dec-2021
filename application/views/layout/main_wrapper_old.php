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
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/text/css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/text/css"/>
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/text/css"/>
        <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->
<!--<link rel="stylesheet" href="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">-->
        <link href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.1.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo base_url(); ?>assets/plugins/morris-chart/css/morris.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo base_url(); ?>assets/plugins/calendar/fullcalendar.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url(); ?>assets/plugins/icheck/skins/minimal/minimal.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END -->

        <!-- CORE CSS TEMPLATE - START -->
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/datatables/css/dataTables.min.css') ?>" rel="stylesheet" type="text/css"/>
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
                                $userRoles = array(
                                    '1' => display('admin'),
                                    '2' => display('doctor'),
                                    '3' => display('accountant'),
                                    '4' => display('laboratorist'),
                                    '5' => display('nurse'),
                                    '6' => display('pharmacist'),
                                    '7' => display('receptionist'),
                                    '8' => display('representative')
                                );
                                echo $userRoles[$this->session->userdata('user_role')];
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
                                  <a href="<?php echo base_url('dashboard/profile'); ?>">
                                      <i class="fa fa-user"></i> <?php echo display('profile') ?>
                                  </a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url('dashboard/form'); ?>">
                                      <i class="fa fa-info"></i> <?php echo display('edit_profile') ?>
                                  </a>
                              </li>
                              <li class="last">
                                  <a href="<?php echo base_url('logout') ?>">
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
                          <a href="<?php echo base_url('dashboard_doctor/home') ?>">
                              <i class="img">
                                  <img src="<?php echo base_url(); ?>assets/data/hos-dash/icons/1.png" alt="" class="width-20">
                              </i>
                              <span class="title"><?php echo display('dashboard') ?></span>
                          </a>
                      </li>
                      <!--<li class="<?php //echo (($this->uri->segment(2) == "department") ? "open" : null) ?>">
                          <a href="javascript:;">
                              <!--<i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/5.png" alt="" class="width-20">
                              </i>-->
                            <!--  <i class="fa fa-sitemap"></i>
                              <span class="title"><?php //echo display('department') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php //echo base_url("department/create") ?>"><?php //echo display('add_department') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("department") ?>"><?php //echo display('department_list') ?></a>
                              </li>

                          </ul>
                      </li>-->

                      <li class="<?php echo (($this->uri->segment(2) == "doctor") ? "open" : null) ?>">
                          <a href="javascript:;">
                              <i class="img">
                                  <img src="<?php echo base_url(); ?>assets/data/hos-dash/icons/2.png" alt="" class="width-20">
                              </i>
                              <span class="title"><?php echo display('doctor') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php echo base_url("doctor/create") ?>"><?php echo display('add_doctor') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php echo base_url("doctor") ?>"><?php echo display('doctor_list') ?></a>
                              </li>

                          </ul>
                      </li>




















                      <li class="<?php echo (($this->uri->segment(2) == "patient") ? "open" : null) ?>">
                          <a href="javascript:;">
                              <i class="img">
                                  <img src="<?php echo base_url(); ?>assets/data/hos-dash/icons/5.png" alt="" class="width-20">
                              </i>
                              <span class="title">Patients</span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php echo base_url("patient/create") ?>"><?php echo display('add_patient') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php echo base_url("patient/createvital") ?>"><?php echo display('add_vital_sign') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php echo base_url("patient") ?>"><?php echo display('patient_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php echo base_url("patient/document_form") ?>"><?php echo display('add_document') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php echo base_url("patient/document") ?>"><?php echo display('document_list') ?></a>
                              </li>
                          </ul>
                      </li>
                      <li class="<?php echo (($this->uri->segment(2) == "schedule") ? "open" : null) ?>">
                          <a href="javascript:;">
                              <!--<i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/6.png" alt="" class="width-20">
                              </i>-->
                              <i class="fa fa-calendar-o"></i>
                              <span class="title"><?php echo display('schedule') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php echo base_url("schedule/create") ?>"><?php echo display('add_schedule') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php echo base_url("schedule") ?>"><?php echo display('schedule_list') ?></a>
                              </li>
                          </ul>
                      </li>
                      <li class="<?php echo (($this->uri->segment(2) == "appointment" || $this->uri->segment(2) == "report") ? "open" : null) ?>">
                          <a href="javascript:;">
                              <i class="img">
                                  <img src="<?php echo base_url(); ?>assets/data/hos-dash/icons/6.png" alt="" class="width-20">
                              </i>
                              <span class="title"><?php echo display('appointment') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php echo base_url("appointment/create") ?>"><?php echo display('add_appointment') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php echo base_url("appointment") ?>"><?php echo display('appointment_list') ?></a>
                              </li>

                          </ul>
                      </li>
                      <li class="<?php echo (($this->uri->segment(2) == "prescription") ? "open" : null) ?>">
                          <a href="javascript:;">
                              <!--<i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/7.png" alt="" class="width-20">
                              </i>-->

<i class="fa fa-file-text-o"></i>
                              <span class="title"><?php echo display('prescription') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php echo base_url("prescription/insurance/create") ?>"><?php echo display('add_insurance') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php echo base_url("prescription/insurance") ?>"><?php echo display('insurance_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php echo base_url("prescription/case_study/create") ?>"><?php echo display('add_patient_case_study') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php echo base_url("prescription/case_study") ?>"><?php echo display('patient_case_study_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php echo base_url("prescription/prescription") ?>"><?php echo display('prescription_list') ?></a>
                              </li>
                          </ul>
                      </li>

                      <!--<li class="<?php //echo (($this->uri->segment(2) == "account_manager") ? "open" : null) ?>">
                          <a href="javascript:;">
                            <i class="fa fa-money"></i>
                              <!--<i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/7.png" alt="" class="width-20">
                              </i>-->
                            <!--  <span class="title"><?php //echo display('account_manager') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php //echo base_url("account_manager/account/create") ?>"><?php //echo display('add_account') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("account_manager/account") ?>"><?php //echo display('account_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("account_manager/invoice/create") ?>"><?php //echo display('add_invoice') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("account_manager/invoice") ?>"><?php //echo display('invoice_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("account_manager/payment/create") ?>"><?php //echo display('add_payment') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("account_manager/payment") ?>"><?php //echo display('payment_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("account_manager/report") ?>"><?php //echo display('report') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("account_manager/report/debit") ?>"><?php //echo display('debit_report') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("account_manager/report/credit") ?>"><?php //echo display('credit_report') ?></a>
                              </li>
                          </ul>
                      </li>
                      <li class="<?php //echo (($this->uri->segment(2) == "human_resources") ? "open" : null) ?>">
                          <a href="javascript:;">
                              <!--<i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/7.png" alt="" class="width-20">
                              </i>-->
                            <!--  <i class="fa fa-users"></i>
                              <span class="title"><?php //echo display('human_resources') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php //echo base_url("human_resources/employee/form") ?>"><?php //echo display('add_employee') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("human_resources/employee/index/accountant") ?>"><?php //echo display('accountant_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("human_resources/employee/index/laboratorist") ?>"><?php //echo display('laboratorist_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("human_resources/employee/index/nurse") ?>"><?php //echo display('nurse_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("human_resources/employee/index/pharmacist") ?>"><?php //echo display('pharmacist_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("human_resources/employee/index/receptionist") ?>"><?php //echo display('receptionist_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("human_resources/employee/index/representative") ?>"><?php //echo display('representative_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("human_resources/employee/index/case_manager") ?>"><?php //echo display('case_manager_list') ?></a>
                              </li>

                          </ul>
                      </li>
                      <li class="<?php //echo (($this->uri->segment(2) == "bed_manager") ? "open" : null) ?>">
                          <a href="javascript:;">
                              <i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/icons/hos-icon-so1.png" alt="" class="width-20">
                              </i>
                              <span class="title"><?php //echo display('bed_manager') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php //echo base_url("bed_manager/bed/form") ?>"><?php //echo display('add_bed') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("bed_manager/bed") ?>"><?php //echo display('bed_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("bed_manager/bed_assign/create") ?>"><?php //echo display('bed_assign') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("bed_manager/bed_assign") ?>"><?php //echo display('bed_assign_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("bed_manager/report") ?>"><?php //echo display('report') ?></a>
                              </li>
                          </ul>
                      </li>
                      <li class="<?php //echo (($this->uri->segment(2) == "noticeboard") ? "open" : null) ?>">
                          <a href="javascript:;">
                              <i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/9.png" alt="" class="width-20">
                              </i>
                              <span class="title"><?php //echo display('noticeboard') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php //echo base_url("noticeboard/notice/form") ?>"><?php //echo display('add_notice') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("noticeboard/notice") ?>"><?php //echo display('notice_list') ?></a>
                              </li>
                          </ul>
                      </li>
                      <li class="<?php //echo (($this->uri->segment(2) == "case_manager") ? "open" : null) ?>">
                          <a href="javascript:;">
                              <i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/3.png" alt="" class="width-20">
                              </i>
                              <span class="title"><?php //echo display('case_manager') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php //echo base_url("case_manager/patient/form") ?>"><?php //echo display('add_patient') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("case_manager/patient") ?>"><?php //echo display('patient_list') ?></a>
                              </li>
                          </ul>
                      </li>















                      <li class="<?php //echo (($this->uri->segment(2) == "hospital_activities") ? "open" : null) ?>">
                          <a href="javascript:;">

                            <i class="fa fa-building"></i>
                              <!--<i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/10.png" alt="" class="width-20">
                              </i>-->
                              <!--<span class="title"><?php //echo display('hospital_activities') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php //echo base_url('hospital_activities/birth/form') ?>"><?php //echo display('add_birth_report') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url('hospital_activities/birth/index') ?>"><?php //echo display('birth_report') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url('hospital_activities/death/form') ?>"><?php //echo display('add_death_report') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url('hospital_activities/death/index') ?>"><?php //echo display('death_report') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url('hospital_activities/operation/form') ?>"><?php //echo display('add_operation_report') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url('hospital_activities/operation/index') ?>"><?php //echo display('operation_report') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url('hospital_activities/investigation/form') ?>"><?php //echo display('add_investigation_report') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url('hospital_activities/investigation/index') ?>"><?php //echo display('investigation_report') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url('hospital_activities/category/form') ?>"><?php //echo display('add_medicine_category') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url('hospital_activities/category/index') ?>"><?php //echo display('medicine_category_list') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url('hospital_activities/medicine/form') ?>"><?php //echo display('add_medicine') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url('hospital_activities/medicine/index') ?>"><?php //echo display('medicine_list') ?></a>
                              </li>
                          </ul>
                      </li>

                      <li class="<?php //echo (($this->uri->segment(1) == "enquiry") ? "open" : null) ?>">
                          <a href="<?php //echo base_url('enquiry') ?>">
                            <i class="fa fa-question-circle"></i>
                              <!--<i class="img">
                                  <img src="../data/hos-dash/icons/4.png" alt="" class="width-20">
                              </i>-->
                              <!--<span class="title"><?php //echo display('enquiry') ?></span>
                          </a>
                      </li>
                      <li class="<?php //echo (($this->uri->segment(1) == "setting" || $this->uri->segment(1) == "language") ? "open" : null) ?>">
                          <a href="javascript:;">
                              <!--<i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/11.png" alt="" class="width-20">
                              </i>-->
                            <!--  <i class="fa fa-cog"></i>
                              <span class="title"><?php //echo display('setting') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php //echo base_url("setting") ?>"><?php //echo display('app_setting') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("language") ?>"><?php //echo display('language_setting') ?></a>
                              </li>
                          </ul>
                      </li>
                      <li class="<?php //echo (($this->uri->segment(2) == "messages") ? "open" : null) ?>">
                          <a href="javascript:;">
                            <i class="fa fa-comments"></i>
                              <!--<i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/11.png" alt="" class="width-20">
                              </i>-->
                            <!--  <span class="title"><?php //echo display('messages') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php //echo base_url("messages/message/new_message") ?>"><?php //echo display('new_message') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("messages/message") ?>"><?php //echo display('inbox') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url("messages/message/sent") ?>"><?php //echo display('sent') ?></a>
                              </li>
                          </ul>
                      </li>
                      <li class="<?php //echo (($this->uri->segment(2) == 'mail') ? "open" : null) ?>">
                          <a href="javascript:;">
                            <i class="fa fa-envelope-o"></i>

                              <!--<i class="img">
                                  <img src="<?php //echo base_url(); ?>assets/data/hos-dash/icons/11.png" alt="" class="width-20">
                              </i>-->
                          <!--    <span class="title"><?php //echo display('mail') ?></span>
                              <span class="arrow "></span>
                          </a>
                          <ul class="sub-menu">
                              <li>
                                  <a class="" href="<?php //echo base_url('mail/email') ?>"><?php //echo display('send_mail') ?></a>
                              </li>
                              <li>
                                  <a class="" href="<?php //echo base_url('mail/setting') ?>"><?php //echo display('mail_setting') ?></a>
                              </li>
                          </ul>
                      </li>-->


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
      <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>-->
      <!--<script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>-->
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
      <!--  <script src="<?php //echo base_url(); ?>/assets/plugins/calendar/moment.min.js"></script>
        <script src="<?php //echo base_url(); ?>/assets/plugins/jquery-ui/smoothness/jquery-ui.min.js"></script>
        <script src="<?php //echo base_url(); ?>/assets/plugins/calendar/fullcalendar.min.js"></script>
        <script src="<?php //echo base_url(); ?>/assets/plugins/icheck/icheck.min.js"></script>

        <script src="<?php //echo base_url(); ?>assets/data/calendars/hos-doc-schedule.js"></script>
        <script src="<?php //echo base_url(); ?>assets/js/scripts.js"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
                <!--<script src="<?php //echo base_url("assets/datatables/js/dataTables.min.js") ?>"></script>
                <!-- tinymce texteditor -->
              <!--  <script src="<?php //echo base_url() ?>assets/tinymce/tinymce.min.js" type="text/javascript"></script>
                <!--<script src="<?php //echo base_url() ?>assets/js/custom.js" type="text/javascript"></script>-->
              <!--  <script type="text/javascript">
                  jQuery.noConflict();
                  // Code that uses other library's $ can follow here.
                </script>-->
<script src="<?php echo base_url('assets/js/Chart.min.js') ?>" type="text/javascript"></script>

<script>

//$j("datepicker_new").datepicker();
$(document).ready(function () {
  var d = new Date();
   $('.datepicker_new').datepicker({
       format: 'dd-mm-yyyy',
       startDate: '01/01/1970',
       todayHighlight: true,
       autoclose: true

   });
   $('#example').DataTable();
});
   //$('.timepicker').timepicker({
     //uiLibrary: 'bootstrap4'
     //});

   </script>
    </body>
</html>
