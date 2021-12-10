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
        <link href="<?php echo base_url(); ?>assets/css/cropper.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/datatables/css/dataTables.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/pages/patients-dashboard.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/pages/form.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/pages/patient-add.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link  href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
    </head>

    <style type="text/css">
    /* .page-sidebar.chat_shift .wraplist li .title, .page-sidebar.collapseit .wraplist li .title, .page-sidebar.chat_shift .wraplist li .arrow, .page-sidebar.collapseit .wraplist li .arrow {
   display: block;
    position: absolute;
    left: 0;
    top: 38px;
    font-size: 13px;
    margin-left: 10px;
    max-width: 139px;
    word-break: break-word;
    width: 70px;
    white-space: break-spaces;
    line-height: 17px;
} */
.page-sidebar.collapseit .wraplist li a i.img {
    float: left;
    margin-top: 3px;
    padding-left: 18px;
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
  .page-sidebar.chat_shift .wraplist li, .page-sidebar.collapseit .wraplist li {
            position: relative !important;
            bottom: 18px;
            }
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
.imp-red {
  color: red;
}
.page-sidebar.chat_shift .wraplist li .title, .page-sidebar.collapseit .wraplist li .title, .page-sidebar.chat_shift .wraplist li .arrow, .page-sidebar.collapseit .wraplist li .arrow {
    display: block;
    position: absolute;
    left: 0;
    top: 38px;
    font-size: 13px;
    / margin-left: 5px !important; /
    max-width: 139px;
    word-break: break-word;
    white-space: break-spaces;
    line-height: 17px;
    width: 77px !important;
    text-align: center;
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
  width: 190px !important;
}
#main-content {
      margin-left: 165px;
}
.page-sidebar.collapseit {
    width: 60px !important;
}
.p-t-10 {
padding: 10px 0px 0px 0px;
}
.p-0 {
padding:0px;
}
/* .sidebar-img {
    width: 13%;
    margin-left: 12px;
    margin-right: 10px;
} */
.sidebar-img {
  width: 13%;
    margin-left: 19px !important;
    margin-right: 10px !important;
}
thead {
    background: #f5f5f5 !important;
    color: #5785e8 !important;
}
.page-sidebar.collapseit #main-menu-wrapper .wraplist li a .sidebar-img {
    width: 45% !important;
}

    </style>

    <body class="container-body" style='background-color: #ffffff !important;'>
      <div class='page-topbar gradient-blue1'>
          <div class='logo-area crypto'>
             <?php
             // $picture =  $this->session->userdata('picture');
             $sess_user = $this->session->userdata('user_id');
             $userData = $this->db->select("*")->from("user")->where('user_id', $sess_user)->get()->row();
             if($userData->picture!=''){ ?>
               <img src="<?php echo base_url().$userData->picture; ?>">
            <?php  }else{ ?>
            <img src="<?php echo base_url(); ?>assets/images/logo.png">
          <?php } ?>
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
                                    '2' => "Medical Provider",//display('doctor'),
                                    '3' => display('accountant'),
                                    '4' => display('laboratorist'),
                                    '5' => display('nurse'),
                                    '6' => display('pharmacist'),
                                    '7' => display('receptionist'),
                                    '8' => display('representative'),
                                    '11' =>'superadmin',
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
                            <?php //$picture = $this->session->userdata('picture'); ?>
                              <img src="<?php echo (!empty($userData->picture)?base_url($userData->picture):base_url("assets/images/no-img.png")) ?>" alt="user-image" class="img-circle img-inline">
                              <span><?php echo $userData->firstname.' '.$userData->lastname;

                             // $this->session->userdata('fullname')

                               ?> <i class="fa fa-angle-down"></i></span>
                          </a>
                          <ul class="dropdown-menu profile animated fadeIn">
                              <!--<li>
                                  <a href="crypto-account-setting.html">
                                      <i class="fa fa-wrench"></i> Settings
                                  </a>
                              </li>-->
                              <li>
                                  <a href="<?php echo base_url('dashboard_super/home/profile'); ?>">
                                      <i class="fa fa-user"></i> <?php echo display('profile') ?>
                                  </a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url('dashboard_super/home/form'); ?>">
                                      <i class="fa fa-info"></i> <?php echo display('edit_profile') ?>
                                  </a>
                              </li>
                              <li class="last">
                                  <a href="<?php echo base_url('dashboard_super/home/logout') ?>">
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
<?php $mainUrl = base_url();?>
          <!-- SIDEBAR - START -->
          <div class="page-sidebar fixedscroll">
             <!-- MAIN MENU - START -->
              <div class="page-sidebar-wrapper" id="main-menu-wrapper">
                  <ul class='wraplist' style="margin-top:22px;">
                      <li class='menusection'></li>
                      <!-- <li class="<?php// echo (($this->uri->segment(2) == 'home') ? "open" : null) ?> sidebar-li">
                          <a href="<?php //echo base_url('dashboard_super/home') ?>">
                              <i class="img">
                                  <span class="fa fa-home width-20" style="color: coral;font-size: 21px;" aria-hidden="true"></span>
                              </i>
                              <span class="title">Dashboard</span>
                          </a>
                      </li> -->
                      <li class="<?php echo (($this->uri->segment(2) == "admin") ? "open" : null) ?> sidebar-li">
                          <a href="<?php echo base_url("dashboard_super/admin/admin") ?>">
                              <!-- <i class="img">
                                 <span class="ttext-primary fa fa-user width-20" style="color: pink;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                              <img class="sidebar-img" src="<?php echo base_url()?>assets/images/hospital.png" style="margin-left:12px !important;width:10% !important;">
                              <span class="title">Hospital</span>
                          </a>
                      </li>
                      <li class="<?php echo (($this->uri->segment(2) == "admin") ? "open" : null) ?> sidebar-li">
                          <a href="<?php echo base_url("dashboard_super/messages/message/index") ?>">
                         <!--    <i class="img">
                                <span class="text-primary fa fa-question-circle width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                            </i> -->
                              <!-- <i class="img">
                                 <span class="ttext-primary fa fa-user width-20" style="color: pink;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                            <img class="sidebar-img" src="<?php echo base_url()?>assets/images/support.png" style="margin-left:12px !important;width:10% !important;">
                              <span class="title">Support</span>
                          </a>
                      </li>
                      <!-- <li class="<?php //echo (($this->uri->segment(2) == "admin") ? "open" : null) ?> sidebar-li">
                          <a href="<?php //echo base_url("dashboard_super/allergy/allergy/index") ?>">
                             <i class="img">
                                <span class="text-primary fas fa-allergies width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                            </i> -->
                              <!-- <i class="img">
                                 <span class="ttext-primary fa fa-user width-20" style="color: pink;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                            <!-- <img class="sidebar-img" src="<?php //echo base_url()?>assets/images/allergies.png" style="margin-left:12px !important;width:10% !important;">
                              <span class="title">Allergy</span>
                          </a>
                      </li> -->
                      <li class="<?php echo (($this->uri->segment(2) == "admin") ? "open" : null) ?> sidebar-li">
                          <a href="<?php echo base_url("dashboard_super/allergy/allergy/subcategory") ?>">
                          <!--   <i class="img">
                                <span class="text-primary fas fa-disease width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                            </i> -->
                              <!-- <i class="img">
                                 <span class="ttext-primary fa fa-user width-20" style="color: pink;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                             <img class="sidebar-img" src="<?php echo base_url()?>assets/images/suballergies.png" style="margin-left:12px !important;width:10% !important;">
                              <span class="title">Allergy</span>
                          </a>
                      </li>
                      <li class="<?php echo (($this->uri->segment(2) == "admin") ? "open" : null) ?> sidebar-li">
                          <a href="<?php echo base_url("dashboard_super/icd/icd") ?>">
                          <!--   <i class="img">
                                <span class="text-primary fas fa-code-branch width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                            </i> -->
                              <!-- <i class="img">
                                 <span class="ttext-primary fa fa-user width-20" style="color: pink;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                                      <img class="sidebar-img" src="<?php echo base_url()?>assets/images/ICD-version.png" style="margin-left:12px !important;width:10% !important;">
                              <span class="title">Icd Version</span>
                          </a>
                      </li>

                      <li class="<?php echo (($this->uri->segment(2) == "admin") ? "open" : null) ?> sidebar-li">
                          <a href="<?php echo base_url("dashboard_super/loinc_code/loinc_code") ?>">
                          <!--   <i class="img">
                                <span class="text-primary fab fa-codepen width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                            </i> -->
                              <!-- <i class="img">
                                 <span class="ttext-primary fa fa-user width-20" style="color: pink;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                             <img class="sidebar-img" src="<?php echo base_url()?>assets/images/loinc-code.png" style="margin-left:12px !important;width:10% !important;">
                              <span class="title">Loinc Code</span>
                          </a>
                      </li>
                      	<li class="<?php echo (($this->uri->segment(2) == "admin") ? "open" : null) ?> sidebar-li">
                          <a href="<?php echo base_url("dashboard_super/cvx_code/cvx_code") ?>">

                              <img class="sidebar-img" src="<?php echo base_url()?>assets/images/loinc-code.png" style="margin-left:12px !important;width:10% !important;">
                              <span class="title">CVX Code</span>
                          </a>
                      	</li>
                      	 <li class="<?php echo(($this->uri->segment(2) == "admin") ? "open" : null) ?> sidebar-li">
		                    <a href="<?php echo base_url("dashboard_super/cpt_code/cpt_code") ?>">

		                        <img class="sidebar-img" src="<?php echo base_url() ?>assets/images/loinc-code.png"
		                             style="margin-left:12px !important;width:10% !important;">
		                        <span class="title">CPT Code</span>
		                    </a>
                		</li>
                      	<li class="<?php echo (($this->uri->segment(2) == "admin") ? "open" : null) ?> sidebar-li">
                          <a href="<?php echo base_url("dashboard_super/manufacture/manufacture") ?>">
                              <!--   <i class="img">
                                    <span class="text-primary fab fa-codepen width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                                </i> -->
                              <!-- <i class="img">
                                 <span class="ttext-primary fa fa-user width-20" style="color: pink;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                              <img class="sidebar-img" src="<?php echo base_url()?>assets/images/loinc-code.png" style="margin-left:12px !important;width:10% !important;">
                              <span class="title">Manufacture</span>
                          </a>
                      </li>
                      <li class="<?php echo (($this->uri->segment(2) == "admin") ? "open" : null) ?> sidebar-li">
                          <a href="<?php echo base_url("dashboard_super/problem/problem") ?>">
                           <!--  <i class="img">
                                <span class="text-primary fas fa-exclamation-circle width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                            </i> -->
                              <!-- <i class="img">
                                 <span class="ttext-primary fa fa-user width-20" style="color: pink;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                            <img class="sidebar-img" src="<?php echo base_url()?>assets/images/problem.png" style="margin-left:12px !important;width:10% !important;">
                              <span class="title">Problem</span>
                          </a>
                      </li>
                      <li class="<?php echo (($this->uri->segment(2) == "admin") ? "open" : null) ?> sidebar-li">
                          <a href="<?php echo base_url("dashboard_super/drug/drug") ?>">
                          <!--   <i class="img">
                                <span class="text-primary fas fa-capsules width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                            </i> -->
                              <!-- <i class="img">
                                 <span class="ttext-primary fa fa-user width-20" style="color: pink;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                          <img class="sidebar-img" src="<?php echo base_url()?>assets/images/drug.png" style="margin-left:12px !important;width:10% !important;">
                              <span class="title">Drug</span>
                          </a>
                      </li>
                      <li class="<?php echo (($this->uri->segment(2) == "admin") ? "open" : null) ?> sidebar-li">
                        <a href="<?php echo base_url() . 'dashboard_super/auditdump/auditdump' ?>">
                            <img class="sidebar-img" src="<?php echo base_url(); ?>assets/images/auditor-icon.png">
                            <!-- <i class="img">
                                  <span class="text-primary fa fa-envelope-o width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                            <span class="title">Audit Dump</span>
                        </a>
                    </li>
                      <!-- <li class="sidebar-li">
                          <a href="http://emr.visionaryhealthservices.com/dashboard_doctor/insurance/insurance">
                            <img class="sidebar-img" src="http://emr.visionaryhealthservices.com/assets/images/sidebar-insurance.png">
                 <span class="title">Insurance eligibility</span>
                          </a>
                      </li> -->
                      <!-- <li class="<?php //echo (($this->uri->segment(2) == "patient") ? "open" : null) ?> sidebar-li">
                          <a href="<?php //echo base_url("dashboard_super/patient/patient") ?>">
                              <i class="img">
                                 <span class="ttext-primary fa fa-user width-20" style="color: pink;font-size: 21px;" aria-hidden="true"></span>
                              </i>
                              <span class="title">Patient</span>
                          </a>
                      </li> -->
                      <?php $isadmin = $this->session->userdata('isadmin');
                            //if($isadmin=='1'){
                       ?>
                      <!-- <li class="<?php //echo (($this->uri->segment(2) == "doctor") ? "open" : null) ?> sidebar-li">
                          <a href="<?php //echo base_url("dashboard_super/doctor/doctor") ?>">
                              <i class="img">
                                 <span class="text-primary fa fa-user width-20" style="color: #a94442;font-size: 21px;" aria-hidden="true"></span>
                              </i>
                              <span class="title">Medical Provider</span>
                          </a>
                      </li> -->
                    <?php //} ?>
                      <!-- <li class="sidebar-li">
                          <a href="">
                              <i class="img">
                                  <span class="text-danger fa fa-list width-20" style="color: #a94442;font-size: 21px;" aria-hidden="true"></span>
                              </i>
                              <span class="title">Health Record</span>
                          </a>
                      </li> -->
                      <!-- <li class="<?php //echo (($this->uri->segment(2) == "schedule") ? "open" : "null") ?> sidebar-li">
                          <a href="<?php //echo base_url("dashboard_super/schedule/schedule") ?>">
                              <i class="img">
                                  <span class="text-primary fa fa-calendar width-20" style="color: orange;font-size: 21px;" aria-hidden="true"></span>
                              </i>
                              <span class="title">Schedule</span>
                          </a>
                      </li> -->
                      <!-- <li class="sidebar-li">
                          <a href="">
                              <i class="img">
                                  <span class="text-primary fa fa-credit-card width-20" style="color: #337ab7;font-size: 21px;" aria-hidden="true"></span>
                              </i>
                              <span class="title">Billing</span>
                          </a>
                      </li> -->
                      <!-- <li class="sidebar-li">
                          <a href="<?php echo base_url().'dashboard_super/messages/message/index' ?>">
                              <i class="img">
                                  <span class="text-primary fa fa-envelope-o width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                              </i>
                              <span class="title">Message</span>
                          </a>
                      </li> -->
                      <!-- <li class="sidebar-li">
                          <a href="#">
                            <img class="sidebar-img" src="<?php //echo base_url(); ?>assets/images/sidebar-e-prescribing.png">
                              <!-- <i class="img">
                                  <span class="text-primary fa fa-envelope-o width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                              <!--<span class="title">E-Prescribing</span>
                          </a>
                      </li> -->
                      <!-- <li class="sidebar-li">
                          <a href="#">
                            <img class="sidebar-img" src="<?php //echo base_url(); ?>assets/images/sidebar-online-profile.png">
                              <!-- <i class="img">
                                  <span class="text-primary fa fa-envelope-o width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                              <!--<span class="title">Online Profile</span>
                          </a>
                      </li> -->
                       <!-- <li class="sidebar-li">
                          <a href="#">
                            <img class="sidebar-img" src="<?php //echo base_url(); ?>assets/images/sidebar-lab.png">
                              <!-- <i class="img">
                                  <span class="text-primary fa fa-envelope-o width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                              <!--<span class="title">Labs</span>
                          </a>
                      </li> -->
                      <!-- <li class="sidebar-li">
                          <a href="<?php //echo base_url(); ?>dashboard_super/insurance/insurance">
                            <img class="sidebar-img" src="<?php //echo base_url(); ?>assets/images/sidebar-insurance.png">
                              <!-- <i class="img">
                                  <span class="text-primary fa fa-envelope-o width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                              <!--<span class="title">Insurance eligibility</span>
                          </a>
                      </li> -->
                         <!-- <li class="sidebar-li">
                          <a href="#">
                            <img class="sidebar-img" src="<?php //echo base_url(); ?>assets/images/sidebar-telemedicine.png">
                              <!-- <i class="img">
                                  <span class="text-primary fa fa-envelope-o width-20" style="color: green;font-size: 21px;" aria-hidden="true"></span>
                              </i> -->
                              <!--<span class="title">Telemedicine</span>
                          </a>
                      </li> -->
                      <!-- <li class="sidebar-li">
                          <a href="javascript:;">
                              <i class="img">
                                  <span class="text-primary fa fa-cog width-20" style="color: #333333;font-size: 21px;" aria-hidden="true"></span>
                              </i>
                              <span class="title">Setting</span>
                          </a>
                      </li> -->
                  </ul>
                  <!-- <div id="Invite_Practitioner" style="padding: 15px 5px;" class="hidden-xs hidden-sm hidden-md invite-practioner">
                      <div class="col-xs-12 fieldLabelColor" id="label" style="font-size: 80%;">Invite Practitioner*</div>
                      <div class="col-xs-12" style="margin-bottom: 5px;">
                          <input style="width: 100%; font-size: 80%; height: 25px; background-color: #fff;" type="text" class="form-control" id="invite-practitioner-email-id" name="email" placeholder="Doctor email id" maxlength="250" title="Spread the word about the software to your colleagues" onkeyup="Invite_Practitioner.enterKey(event)">
                      </div>
                      <div class="col-xs-12">
                          <div class="col-xs-7 text-left" style="padding-left: 0;">
                              <span id="leftInvitationCount" style="font-size: 60%;">50 invites left</span>
                          </div>
                          <div class="col-xs-5 text-right" style="padding: 0;">
                              <button data-toggle="tooltip" title="Send Invitation" onclick="Invite_Practitioner.send()" style="font-size: 70%;" class="icon-color btn btn-default btn-xs">
                                  <span class="fa fa-envelope" style="font-size: 100%;"></span>
                                  <span>&nbsp;&nbsp;Send</span>
                              </button>
                          </div>
                      </div>
                  </div> -->
              </div>
              <!-- MAIN MENU - END -->
          </div>

          <!--  SIDEBAR - END -->
          <style type="text/css">
            /* .white-box {
                background-color: white;
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
                border: 1px solid rgba(0, 0, 0, 0.125);
                border-radius: 4px;
            } */
          </style>
          <style type="text/css">
            /* .btn-default {
                border-color: #00b3ac !important;
                background-color: #fff !important;
                border: 1px solid #00b3ac !important;
            }
            .text-theme, .fa-star, .btn-default, .iD, .hCl, .hCl1, .hCl2, .hCl3, .head-brick, .menu, .bg-theme-light {
                color: #00b3ac !important;
            }
            .btn-default:hover {
                color: #ffffff !important;
                 background-color: #00b3ac;
            }

            input, button, select, textarea {
                font-family: inherit;
                font-size: inherit;
                line-height: inherit;
            }
            button, html input[type="button"], input[type="reset"], input[type="submit"] {
                -webkit-appearance: button;
                cursor: pointer;
            }
            button, select {
                text-transform: none;
            }
            button {
                overflow: visible;
            }
            button, input, optgroup, select, textarea {
                color: inherit;
                font: inherit;
                    font-weight: inherit;
                    font-size: inherit;
                    line-height: inherit;
                    font-family: inherit;
                margin: 0;
                    margin-bottom: 0px;
            }
            .fa {
                font-size: 16px;
                cursor: pointer;
            }
            .fa, .fab, .fal, .far, .fas {
                -moz-osx-font-smoothing: grayscale;
                -webkit-font-smoothing: antialiased;
                display: inline-block;
                font-style: normal;
                font-variant: normal;
                text-rendering: auto;
                line-height: 1;
            }
            .dropdown-menu-right {
                right: 0;
                left: none;
            } */
          </style>
          <!-- START CONTENT -->
          <section id="main-content" class=" ">
              <div class="wrapper main-wrapper row" style=''>

                  <!-- <div class='col-xs-12'>
                      <div class="page-title">

                          <div class="pull-left">
                              <!-- PAGE HEADING TAG - START -->
                              <!--<h1 class="title"><?php //echo ucwords(str_replace('_', ' ', $this->uri->segment(1))) ?></h1>
                              <small><?php //echo (!empty($title)?$title:null) ?></small>
                              <!-- PAGE HEADING TAG - END -->
                          <!--</div>

                      </div>
                  </div> -->
                  <div class="col-lg-12" >
                    <?php //if ($this->session->flashdata('message') != null) {  ?>
                      <!-- <section  class="box nobox marginBottom0">

<?php //}else if ($this->session->flashdata('exception') != null) {  ?>
  <section  class="box nobox marginBottom0">


<?php //}else if (validation_errors()) {   ?>
  <section  class="box nobox marginBottom0">
<?php //}else{ ?>
<section style="margin-top: -83px;" class="box nobox"> -->
<?php //} ?>
<?php if(($this->uri->segment(2) == 'home')){ ?>
<section style="margin-top: -70px;margin-bottom:0;" class="box nobox" >
<?php }else if(($this->session->flashdata('message') != null) or ($this->session->flashdata('exception') != null) or (validation_errors())){ ?>
  <section  class="box nobox marginBottom0">
<?php }else{ ?>
  <section  class="box nobox marginBottom0">
<?php } ?>
                        <!-- -->
                          <div class="content-body">
                            <?php //if ($this->session->flashdata('message') != null) {  ?>
                            <!-- <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php //echo $this->session->flashdata('message'); ?>
                            </div>
                            <?php //} ?>

                            <?php //if ($this->session->flashdata('exception') != null) {  ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php //echo $this->session->flashdata('exception'); ?>
                            </div>
                            <?php //} ?>

                            <?php //if (validation_errors()) {  ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php //echo validation_errors(); ?>
                            </div> -->
                            <?php //} ?>



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

























      <div class="modal fade delete" id="mypassword" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">

              <?php if ($this->session->flashdata('message') != null) {  ?>
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Message </h4>
            </div>
            <div class="modal-body">
            <p><?php echo $this->session->flashdata('message'); ?> <p>
              </div>
            <?php } ?>
            <?php if ($this->session->flashdata('exception') != null) {  ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Message </h4>
          </div>
          <div class="modal-body">
          <h4 class="modal-title">Message </h4>
          <p><?php echo $this->session->flashdata('exception'); ?> <p>
            </div>
          <?php } ?>
          <?php if (validation_errors()) {  ?>
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Message </h4>
      </div>
      <div class="modal-body">
      <!-- <h4 class="modal-title">Message </h4> -->
        <?php echo validation_errors() ?>
        </div>
        <?php } ?>

        </div>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  -->
  <script>

    $(document).ready(function() {

      $('.select2').select2({
        closeOnSelect: true,
        dropdownParent: $('#hospital-record')
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('.select2').select2({
        closeOnSelect: true
      });
    });
  </script>



      <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>-->
      <!--<script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>-->
      <script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap-datepicker.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/viewport/viewportchecker.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/cropper.min.js"></script>




        <script>
            //window.jQuery || document.write('<script src="<?php //echo base_url(); ?>assets/js/jquery.min.js"><\/script>');
        </script>


        <!-- CORE JS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->

        <script src="<?php echo base_url(); ?>assets/plugins/echarts/echarts-custom-for-dashboard.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/chart-flot.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/dashboard-hos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
<!-- <script src='<?//=base_url()?>assets/calendar/jquery.min.js'></script> -->
<script src='<?=base_url()?>assets/calendar/moment.min.js'></script>

<script src='<?=base_url()?>assets/calendar/fullcalendar.min.js'></script>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

        <!-- CORE TEMPLATE JS - START -->
      <!--  <script src="<?php //echo base_url(); ?>/assets/plugins/calendar/moment.min.js"></script>
        <script src="<?php //echo base_url(); ?>/assets/plugins/jquery-ui/smoothness/jquery-ui.min.js"></script>
        <script src="<?php //echo base_url(); ?>/assets/plugins/calendar/fullcalendar.min.js"></script>
        <script src="<?php //echo base_url(); ?>/assets/plugins/icheck/icheck.min.js"></script>

        <script src="<?php //echo base_url(); ?>assets/data/calendars/hos-doc-schedule.js"></script>-->


        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
                <!--<script src="<?php //echo base_url("assets/datatables/js/dataTables.min.js") ?>"></script>
                <!-- tinymce texteditor -->
              <!--  <script src="<?php //echo base_url() ?>assets/tinymce/tinymce.min.js" type="text/javascript"></script>
                <!--<script src="<?php //echo base_url() ?>assets/js/custom.js" type="text/javascript"></script>-->
              <!--  <script type="text/javascript">
                  jQuery.noConflict();
                  // Code that uses other library's $ can follow here.
                </script>-->
<script src="<?php echo base_url('assets/js/Chart.min.js') ?>" type="text/javascript"></script>
<?php if(!isset($schedules)){
  $where = "1=1";
  $schedules = $this->db->select("*")->from("schedule")->where($where)->get()->result();
} ?>
<script>
var BASE_URL = '<?php echo base_url(); ?>';
//$j("datepicker_new").datepicker();
$(document).ready(function () {
  const today = new Date()
  const yesterday = new Date(today)

  yesterday.setDate(yesterday.getDate() - 1)

  today.toDateString()
  yesterday.toDateString()
  const eight = new Date(today)
  eight.setDate(eight.getDate() - 6570)
  //alert(yesterday);

  // $("#date_of_birth").datepicker("dateFormat", 'yyyy-mm-dd');
  // $("#date_of_birth").datepicker("setDate", eight);
  $("#dob").datepicker({
  format: "yyyy-mm-dd",
  endDate:"today",
  autoclose: true


  });
  $("#date_of_birth").datepicker({
  format: "yyyy-mm-dd",
  endDate:eight,
  autoclose: true


  });
  $("#DOB").datepicker({
  format: "yyyy-mm-dd",
  endDate:"today",
  autoclose: true


  });
  $(".dates").datepicker({
  format: "yyyy-mm-dd",
  endDate:"today",
  autoclose: true


  });

  $("#dod").datepicker({
  format: "yyyy-mm-dd",
  endDate:"today",
  autoclose: true


  });
  $("#dods").datepicker({
  format: "yyyy-mm-dd",
  endDate:"today",
  autoclose: true


  });
  $(".edate").datepicker({
  format: "yyyy-mm-dd",
  endDate:"today",
  autoclose: true


  });
  $("#etdate").datepicker({
  format: "yyyy-mm-dd",
  autoclose: true
  //endDate:"today"


  });
  $("#efdate").datepicker({
  format: "yyyy-mm-dd",
  autoclose: true
  //endDate:"today"


  });




  var BASE_URL = '<?php echo base_url(); ?>';
  var d = new Date();
   $('.datepicker_new').datepicker({
       format: 'dd-mm-yyyy',
       startDate: '01/01/1970',
       todayHighlight: true,
       autoclose: true,
       endDate: '-18y'

   });
   $('#example').DataTable();

   var BASE_URL = '<?php echo base_url(); ?>';
       var events_array = [
           {
           title: 'Test1',
           start: new Date(2012, 8, 20),
           tip: 'Personal tip 1'},
       {
           title: 'Test2',
           start: new Date(2012, 8, 21),
           tip: 'Personal tip 2'}
       ];

       $('#calendar').fullCalendar({
           header: {
               left: 'prev,next today',
               center: 'title',
               right: 'month,agendaWeek,agendaDay'
           },

           //defaultDate: '<?//=date('Y-m-d')?>',
           defaultView: 'agendaWeek',

           navLinks: true, // can click day/week names to navigate views
           editable: false,
           eventLimit: false, // allow "more" link whens too many events
           selectable: true,
           //events: events_array,


           select: function(start, end, jsEvent, view) {

            // start contains the date you have selected
            // end contains the end date.
            // Caution: the end date is exclusive (new since v2).
              //test(start, end, jsEvent, view);
            var allDay = !start.hasTime && !end.hasTime;
            //alert(day);
           //  alert(["Event Start date: " + moment(start).format(),
               //   "Event End date: " + moment(end).format(),
                 // "AllDay: " + allDay].join("\n"));
                 //  $("#start_time").val(moment(start).format());
                 //  $("#end_time").val(moment(end).format());
                 //  $("#date").val(moment(start).format());
                   //$("#myModal").modal();

       },
       selectConstraint: {
           start: $.fullCalendar.moment().subtract(1, 'days'),
           end: $.fullCalendar.moment().startOf('month').add(12, 'month')
       },
       eventClick:function test(callEvent, jsEvent, view){
       //  alert(callEvent.id);
       //  console.log(callEvent.id);
   //$("#myModal").modal();
         $.ajax({
             url: BASE_URL+"dashboard_super/schedule/schedule/getdetail",
             data: 'schedule_id='+callEvent.id,
             success: function(msg){

                 //alert(msg);

                 var myObj = JSON.parse(msg);
   //alert(myObj.patient_name);

                 if(myObj!=''){
   $("#schedule_idss").val(myObj.schedule_id);
                  if(myObj.type=='appointment'){
                    $("#apts").css('display','none');
                    $("#apt").css('display','block');
                    $("#patient_name").text(myObj.patient_name);
                      $("#doctor_name").text(myObj.doctor_name);
                      $("#date").text(myObj.whens);
                      //$("#schedule_idss").val(myObj.schedule_id);
                      $("#chief_complaintss").text(myObj.chief_complaint);
                      $("#tos_times").text(myObj.to_time);
                      $("#ap_type").text(myObj.appointment_type);
                      $("#fors_times").text(myObj.from_time);
                  }else{
                    $("#apt").css('display','none');
                    $("#apts").css('display','block');
                    $("#reasons").text(myObj.reason);
                     $("#dates").text(myObj.whens);
                     //$("#schedule_idsss").val(myObj.schedule_id);
                     $("#tos_time").text(myObj.to_time);
                     $("#fors_time").text(myObj.from_time);
                     $("#notess").text(myObj.note);
                  }


                     $("#myModal").modal();


                 }else{

                   $('#doctor_id').empty();

                   $('#doctor_id')
                   .append($("<option></option>")
                   .attr("value","")
                   .text('No doctor available'));

                 }



             }
         });
       // $("#start_time").val(moment(callEvent.start).format());
       // $("#end_time").val(moment(callEvent.end).format());
       // $("#date").val(moment(callEvent.start).format());
       // $("#myModal").modal();

                        // $('#calendar_time').css('display','block');
                        // $('#calendar_time').html('<button style="margin-left: 196px;" onclick="tester()" data-container="time-button" tabindex="0" data-start-time="2:30pm"  type="button"><div class=""><div>2:30pm</div></div></button>');
                     },

                         events: [
                             <?php
                             $i=1;
                             foreach ($schedules as $schedule)
                             {
                                 $getSchedulingrow= $schedule->whens;
                               //  start_time
                     if(!empty($getSchedulingrow))
                     {
                             ?>
           <?php
                                           $s_dateString = $schedule->whens.' '.$schedule->from_time;
                                           $e_dateString = $schedule->whens.' '.$schedule->to_time;
                                           $sdateObject = new DateTime($s_dateString);
                                           $edateObject = new DateTime($e_dateString);
                                          // echo $dateObject->format('d-m-Y h:i A');
                                          $doctor = $this->db->select("*")->from("user")->where("user_id",$schedule->doctor_id)->get()->row();
                                          $patient = $this->db->select("*")->from("patient")->where("patient_id",$schedule->patent_id)->get()->row();
                                          $dfname ='';
                                          $dlname ='';
                                          $pfname='';
                                          $plname='';
                                          $bcolor='';
                                          if($doctor!=''){
                                            $dfname = $doctor->firstname;
                                            $dlname = $doctor->lastname;
                                          }
                                          if($patient!=''){
                                            $pfname=$patient->fname;
                                            $plname=$patient->lname;
                                          }
                                           ?>
               {
                   id:'<?php echo $schedule->schedule_id; ?>',
                   title:'<?php echo $dfname.' '.$dlname; ?>',
                   start:'<?php echo $s_dateString; ?>' ,
                   end: '<?php echo $e_dateString; ?>',
   <?php if($schedule->appointment_type=='Follow-up Visit'){
            $bcolor = '#B25900';

   }else if($schedule->appointment_type=='Wellness Exam'){

     $bcolor = '#4D8285';
   }else if($schedule->appointment_type=='Nursing Only'){

     $bcolor = '#537343';
   }else if($schedule->appointment_type=='Urgent Visit'){

     $bcolor = '#854D64';
   }else if($schedule->appointment_type=='New Patient Visit'){
     $bcolor = '#6A4D85';
   }else if($schedule->appointment_type=='Video Visit'){

     $bcolor = '#FFCC99';
   }else if($schedule->type=='block'){

     $bcolor = '#FF0000';
   } ?>
                     color  : '#00a2ff',
                     backgroundColor:'<?php echo $bcolor;  ?>',


                   tip:'<?php echo 'Dr. '.$dfname.' '.$dlname; ?> - <?php echo $pfname.' '.$plname; ?>'


               },


         <?php  }

                               }


                                       ?>

                ]
       ,eventRender: function eventRender(event,element, view) {
           element.attr('title', event.tip);
    //     return ['all', event].indexOf($('.cptype').val()) >= 0
    //return ['all', event.school].indexOf($('.cptype').val()) >= 0
   },

                eventColor: '#B25900',
                // eventRender: function(event, element) {
                //     element.attr('title', event.tip);
                // },
                eventOverlap: false,
                slotEventOverlap : false,
       });



});
jQuery(".cptype").change(function(){
    filter_id = $(this).val();

var BASE_URL = '<?php echo base_url(); ?>';
    if (filter_id == 'all') {
      //  $("#eventwrapper").fadeOut();
      $('#calendar').fullCalendar ('removeEvents');
//$('#calendar').fullCalendar('refetchEvents');

//$('#calendar').fullCalendar('destroy');
$.ajax({
                url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentlistallforcalenderall",
                data:'filter_id='+filter_id,
                // data: 'type='+callEvent.id,


                success: function(response) {
                        //just example

                      //  $('#calendar').fullCalendar({

                          //  events: JSON.parse(response)


                      //  });
                        $('#calendar').fullCalendar('addEventSource', JSON.parse(response));
                      }

});



               //backgroundColor:'#4D8285'




        //$('#calendar').fullCalendar('addEventSource', start_source1);
        //$('#calendar').fullCalendar('refetchEvents');
    }else if(filter_id == 'block_time'){
      $('#calendar').fullCalendar ('removeEvents');
//$('#calendar').fullCalendar('refetchEvents');

//$('#calendar').fullCalendar('destroy');
$.ajax({
                url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentlistallforcalenderblock",
                data:'filter_id='+filter_id,
                // data: 'type='+callEvent.id,


                success: function(response) {
                        //just example

                      //  $('#calendar').fullCalendar({

                          //  events: JSON.parse(response)


                      //  });
                        $('#calendar').fullCalendar('addEventSource', JSON.parse(response));
                      }

});
    }else{
      var favorite = [];
                      $.each($("input[name='appointment_typess']:checked"), function(){
                          favorite.push($(this).val());
                      });
      $('#calendar').fullCalendar ('removeEvents');
//$('#calendar').fullCalendar('refetchEvents');

//$('#calendar').fullCalendar('destroy');
$.ajax({
                url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentlistallforcalender",
                data:'filter_id='+favorite,
                // data: 'type='+callEvent.id,


                success: function(response) {
                        //just example

                      //  $('#calendar').fullCalendar({

                          //  events: JSON.parse(response)


                      //  });
                        $('#calendar').fullCalendar('addEventSource', JSON.parse(response));
                      }

});
    }
  });

// user filter
jQuery(".cpl").change(function(){
    filter_id = $(this).val();

var BASE_URL = '<?php echo base_url(); ?>';

      var favorite = [];
                      $.each($("input[name='cpl']:checked"), function(){
                          favorite.push($(this).val());
                      });
      $('#calendar').fullCalendar ('removeEvents');
//$('#calendar').fullCalendar('refetchEvents');

//$('#calendar').fullCalendar('destroy');
$.ajax({
                url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentlistalluserforcalender",
                data:'filter_id='+favorite,
                // data: 'type='+callEvent.id,


                success: function(response) {
                        //just example

                      //  $('#calendar').fullCalendar({

                          //  events: JSON.parse(response)


                      //  });
                        $('#calendar').fullCalendar('addEventSource', JSON.parse(response));
                      }

});

  });



   //$('.timepicker').timepicker({
     //uiLibrary: 'bootstrap4'
     //});

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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
      <script type="text/javascript">
        var dropdown = document.getElementsByClassName("dropdown-btn");
      var i;

      for (i = 0; i < dropdown.length; i++) {
       dropdown[i].addEventListener("click", function() {
         this.classList.toggle("active");
         var dropdownContent = this.nextElementSibling;
         if (dropdownContent.style.display === "block") {
           dropdownContent.style.display = "none";
         } else {
           dropdownContent.style.display = "block";
         }
       });
      }
      </script>
      <script language="javascript">

             jQuery("#txtdate").datepicker({
                 showOn: "button",
                 buttonText: "Select date"
             });

      </script>
      <!-- <script type="text/javascript">
                 $(function () {
                     $('#datetimepicker3').datetimepicker({
                         format: 'LT'
                     });
                 });
             </script> -->
      <script type="text/javascript">
        $(".table-auditdump").DataTable({
          "order": [[ 0, "desc" ]],
          	"columnDefs": [ { type: 'date', 'targets': [0] } ]
        });

      $('#auditdump_report_from_datetime ,#auditdump_report_to_datetime ').datetimepicker({

          "format": 'Y-MM-DD h:mm:ss A',



      });


      </script>
      <script>



      function tester()
      {
          alert('test time2:2');
      }

      var date = new Date();
          var d = date.getDate();
          var m = date.getMonth();
          var y = date.getFullYear();





      </script>


      <script>
          $("#patent_id").keyup(function(){
              var BASE_URL = '<?php echo base_url(); ?>';
            //  alert(BASE_URL);
              //alert(category_id);
              //alert($(trim((this).val())));
              //alert($.trim($(this).val()));
              //exit;
              // if(($(this).val())!=''){
              //
              $("#add").empty();
              // }

              $.ajax({
                  url: BASE_URL+"dashboard/search_patient",
                  data: 'p_id='+$.trim($(this).val()),
                  success: function(msg){

                    //   alert(msg);
                      // $("#suggesstio n-box").show();
                      //   $("#suggesstion-box").html(data);
                      //$("#search-box").css("background","#FFF");
                      // alert(msg);
                      // $(".general-item-list").empty();
                      var myObj = JSON.parse(msg);

      //$(".table-fixed").empty();
                      if(myObj.length>0){
                          //alert(myObj);
                          //$(".table-fixed").empty();

      var msg ="<ul id='outhide'style='list-style:none;' class='search-list'>";
      var msgs ="";
      var msgss ="";
                          $.each(myObj, function(index,value) {
                            //$(".table-fixed").empty();
                              //$(".item").empty();
       msgs="<li><img style='height:30px;width:30px;' src="+BASE_URL+myObj[index].picture+">"+myObj[index].firstname+' '+myObj[index].lastname+"</li>";
                              //  alert(myObj[index].email);

                            //  $("#add").append(txt);

                          });
                          msgss = "</ul>";
                          $("#suggesstion-box").html(msg+msgs+msgss);
                      }else{


                          // $.each(myObj, function(index,value) {
                          //  alert(myObj[index].email);
                          //$(".item").empty();
                          txt= ' No data found ';
                          //$("#add").append(txt);

                          // });
                      }
                  }
              });

          });
$("#patientPartyName").keyup(function(){
          //function search(){
              var BASE_URL = '<?php echo base_url(); ?>';

              var vals = $("#patientPartyName").val();
            //  alert(BASE_URL);
              //alert(category_id);
              //alert($(trim((this).val())));
              //alert($.trim($(this).val()));
              //exit;
             $("#add").css('display','none');
             var doc_val_check=$.trim(vals);
             //alert(doc_val_check.length);
               if(doc_val_check.length!=0 && $.trim(vals)!=null && $.trim(vals)!=''){
              //
            //  alert($.trim($(this).val()));
              $("#add").empty();
              // }

              $.ajax({
                  url: BASE_URL+"dashboard_super/home/search_patient",
                  data: 'p_id='+$.trim(vals),
                  success: function(msg){
                      // alert(msg);
                      // $("#suggesstio n-box").show();
                      //   $("#suggesstion-box").html(data);
                      //$("#search-box").css("background","#FFF");
                      // alert(msg);
                      // $(".general-item-list").empty();
                      //var myObj = JSON.parse(msg);
      $("#add").css('display','block');
      //$(".table-fixed").empty();
                    //  if(myObj.length>0){
                        if(msg!=''){
                          var myObj = JSON.parse(msg);
                          //alert(myObj);
                          //$(".table-fixed").empty();
      $("#add").empty();
                          $.each(myObj, function(index,value) {
                            //$(".table-fixed").empty();
                              //$(".item").empty();

                              //  alert(myObj[index].email);
                            //  var t = 'onclick=test(\'' +myObj[index].email+ '\')';
                              txt  ='<div class="row" onClick="test(\'' + myObj[index].patient_id + '\',\'' + myObj[index].fname +' '+myObj[index].lname + '\')"><div class="col-12 col-md-3"><img src="'+BASE_URL+'assets/images/user-img.png"><p class="text-center"><b>' + myObj[index].fname+' '+myObj[index].lname + '</b></p></div><div class="col-12 col-md-2 mt-15"><span>' + myObj[index].age + '</span></div><div class="col-12 col-md-2 mt-15"><span>' + myObj[index].sex + '</span></div><div class="col-12 col-md-2 mt-15 text-center"><span>' + myObj[index].date_of_birth + '</span></div><div class="col-12 col-md-2 mt-15"><span>' + myObj[index].email + '</span></div><div class="col-12 col-md-4 mt-15"><span><b>M</b></span><span class="ml-10">' + myObj[index].mobile + '</span></div><div class="col-12 col-md-3 mt-15"><span><b>PRN</b></span><span class="ml-10">' + myObj[index].patient_id + '</span></div></div>';


                             $("#add").append(txt);
                          //  $("#add").html(msg);

                          });
                      }else{
                        $("#add").css('display','none');
                          $("#add").empty();

                          // $.each(myObj, function(index,value) {
                          //  alert(myObj[index].email);
                          //$(".item").empty();
                        //  txt= ' No data found ';
                      //    $("#add").append(txt);

                          // });
                      }
                  }
              });
      }else{
        $("#add").css('display','none');
        //$("#patientPartyName").va
      }
          });

        //  $("#patientPartyName").keyup(function(){
                  function adminsearch(){
                        var BASE_URL = '<?php echo base_url(); ?>';

                        var vals = $("#admin_searchid").val();
                        // console.log(vals);

                      //  alert(BASE_URL);
                        //alert(category_id);
                        //alert($(trim((this).val())));
                        //alert($.trim($(this).val()));
                        //exit;
                       $("#adminadd").css('display','none');
                       var doc_val_check=$.trim(vals);
                       //alert(doc_val_check.length);

                       var txt = '';
                         // if(doc_val_check.length!=0 && $.trim(vals)!=null && $.trim(vals)!=''){
                        //
                      //  alert($.trim($(this).val()));
                        $("#adminadd").empty();
                        // }

                        $.ajax({
                            url: BASE_URL+"dashboard_super/home/search_admin",
                            data: 'p_id='+$.trim(vals),
                            success: function(msg){
                                // alert(msg);
                                // $("#suggesstio n-box").show();
                                //   $("#suggesstion-box").html(data);
                                //$("#search-box").css("background","#FFF");
                                // alert(msg);
                                // $(".general-item-list").empty();
                                //var myObj = JSON.parse(msg);
                              $("#adminadd").css('display','table-row-group');

                //$(".table-fixed").empty();
                              //  if(myObj.length>0){
                                  var myObj = JSON.parse(msg);
                                  if(myObj.length > 0){
                                    //alert(myObj);
                                    //$(".table-fixed").empty();
                                    $("#adminadd").empty();
                                    $.each(myObj, function(index,value) {
                                      //$(".table-fixed").empty();
                                        //$(".item").empty();
                                        // console.log(myObj);
                                        //  alert(myObj[index].email);
                                      // var cnf = 'onclick=test(\'' +myObj[index].email+ '\')';
                                      // var cnf = 'onclick="return confirm(\''Are You Sure'\')';
                                        // txt  ='<tr style="border-bottom: 1px solid #ddd;" class="hovertr"><td onclick="admin_info(\'' + myObj[index].user_id + '\')"><img  src="'+BASE_URL+myObj[index].picture+'"><div class="kpull-left admin-td-div"></div></td>';
                                        var picture = '';
                                          if(myObj[index].picture){
                                            picture = myObj[index].picture;
                                          }else{
                                            picture = 'assets/images/profile.png';
                                          }
                                        txt = '<tr style="border-bottom: 1px solid #ddd;" class="hovertr"><td  onclick="admin_info('+ myObj[index].user_id +')"><img src="'+BASE_URL+picture+'"><div class="kpull-left admin-td-div"></div></td><td onclick="admin_info('+ myObj[index].user_id +')"><div class="kpull-left"><div class="word-break"><span class="text-primary"> '+myObj[index].firstname+'  <br> </span></div></div></td><td onclick="admin_info('+ myObj[index].user_id +')"><span class="text-primary">'+myObj[index].lastname+'</span></td><td class="text-primary" onclick="admin_info('+ myObj[index].user_id +')">'+myObj[index].date_of_birth+' <br>'+myObj[index].sex+'</td><td class="text-primary" onclick="admin_info('+ myObj[index].user_id +')">'+myObj[index].address+' <br><span class="light-grey">M</span>'+myObj[index].mobile+' <span class="light-grey ml-15">H</span>'+myObj[index].phone+'</td><td onclick="admin_info('+ myObj[index].user_id +')" ><span class="text-primary">'+myObj[index].hospitalname+'</span></td><td><a href="'+BASE_URL+'dashboard_super/doctor/doctor/'+ myObj[index].user_id +'" style="margin-right:10px;font-weight: 700;text-decoration: underline;">Medical Provider</a></td><td><a href="'+BASE_URL+'dashboard_super/patient/patient/'+ myObj[index].user_id +'" style="margin-right:10px;font-weight: 700;text-decoration: underline;">Patient</a></td><td class="text-primary" onclick="admin_info('+ myObj[index].user_id +')">'+myObj[index].features+'</td><td class="text-primary" onclick="admin_info('+ myObj[index].user_id +')">'+myObj[index].create_date+'</td><td><select class="btn btn-default dropdown-toggle" onchange="call('+ myObj[index].status +',this.options[this.selectedIndex].value)"><option value="1" selected="">Active</option><option value="0">Inactive</option></select></td><td><div class="btn-group" style="float: right;display: flex;"><a href="#" onclick="admin_info('+ myObj[index].user_id +')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a> <a href="'+BASE_URL+'dashboard_super/admin/admin/edit/'+ myObj[index].user_id +'" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-edit"></i></a><a href="'+BASE_URL+'dashboard_super/admin/admin/delete/'+ myObj[index].user_id +'" class="btn btn-xs btn-danger" onclick="return confirmation()"> <i class="fa fa-trash"></i></a></div></td></tr>';
                                    //  $("#add").html(msg);
                                    $("#adminadd").append(txt);
                                    });
                                }else{
                                  // $("#adminadd").css('display','none');
                                  $("#adminadd").empty();
                                   txt  = '<tr style="border-bottom: 1px solid #ddd;" class="hovertr"><td colspan="11" align="center">No record found!</td></tr>';
                                   $("#adminadd").append(txt);
                                   // $("#adminadd").empty();

                                    // $.each(myObj, function(index,value) {
                                    //  alert(myObj[index].email);
                                    //$(".item").empty();
                                  //  txt= ' No data found ';
                                //    $("#add").append(txt);

                                    // });
                                }

                            }
                        });
                // }else{
                //   $("#adminadd").css('display','none');
                //   //$("#patientPartyName").va
                // }
              }


          //$("#outhide").mouseout(function(){
          //  $("#suggesstion-box").hide();
          //});
          function confirmation() {
              return confirm('Are you sure?');
            }
          function test(id,name){
          //  alert(id);
            $("#patientPartyName").val(name);
            $("#patent_ids").val(id);
            $("#add").css('display','none');
          }
         function callmonth(){
           var BASE_URL = '<?php echo base_url(); ?>';
         //  alert(BASE_URL);
           //alert(category_id);
           //alert($(trim((this).val())));
           //alert($.trim($(this).val()));
           //exit;
           // if(($(this).val())!=''){
           //
         //  $("#add").empty();
           // }
           $("#dateprint").text('<?php echo date('F Y'); ?>');
      $("#calendar_type").val('month');
           $.ajax({
               url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentlistbymonth",

               success: function(msg){
                      //alert(msg);
                      //console.log(msg);
                   // $("#suggesstio n-box").show();
                   //   $("#suggesstion-box").html(data);
                   //$("#search-box").css("background","#FFF");
                   // alert(msg);
                   // $(".general-item-list").empty();
                   if(msg!=''){
                     var myObj = JSON.parse(msg);
                       //alert(myObj);
                       //$(".table-fixed").empty();
      $("#apladd").empty();
      $("#apladd").append(myObj);
                   }else{
                       $("#apladd").empty();

                       // $.each(myObj, function(index,value) {
                       //  alert(myObj[index].email);
                       //$(".item").empty();
                       txt= '<tr><td>No data found</td></tr>';
                       $("#apladd").append(txt);

                       // });
                   }
               }
           });
         }
         function myConfirm() {
          var result = confirm("Are You Sure?");
          if (result==true) {
             return true;
            } else {
             return false;
            }
        }
         function callweek(){
           var BASE_URL = '<?php echo base_url(); ?>';
      $("#dateprint").text('<?php
      //$d = date('Y-m-d');
      $sunday = strtotime("last sunday");
      $sunday = date('w', $sunday)==date('w') ? $sunday+7*86400 : $sunday;

      $satday = strtotime(date("Y-m-d",$sunday)." +6 days");

      $this_week_sd = date("M d",$sunday);
      $this_week_ed = date("d,Y",$satday);

      echo "$this_week_sd - $this_week_ed ";
      ?>');
      $("#calendar_type").val('week');
           $.ajax({
               url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentlistbyweek",

               success: function(msg){

                   // $("#suggesstio n-box").show();
                   //   $("#suggesstion-box").html(data);
                   //$("#search-box").css("background","#FFF");
                   // alert(msg);
                   // $(".general-item-list").empty();
                   if(msg!=''){
                     var myObj = JSON.parse(msg);
                       //alert(myObj);
                       //$(".table-fixed").empty();
         $("#apladd").empty();
         $("#apladd").append(myObj);
                   }else{
                       $("#apladd").empty();

                       // $.each(myObj, function(index,value) {
                       //  alert(myObj[index].email);
                       //$(".item").empty();
                       txt= '<tr><td>No data found</td></tr>';
                       $("#apladd").append(txt);

                       // });
                   }
               }
           });
         }
         function calltoday(){
           var BASE_URL = '<?php echo base_url(); ?>';
         //  alert(BASE_URL);
           //alert(category_id);
           //alert($(trim((this).val())));
           //alert($.trim($(this).val()));
           //exit;
           // if(($(this).val())!=''){
           //
         //  $("#add").empty();
           // }
           $("#calendar_type").val('today');
      $("#dateprint").text('<?php echo date('jS F, Y'); ?>');
           $.ajax({
               url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentlistbytoday",

               success: function(msg){

                   // $("#suggesstio n-box").show();
                   //   $("#suggesstion-box").html(data);
                   //$("#search-box").css("background","#FFF");
                   // alert(msg);
                   // $(".general-item-list").empty();
                   if(msg!=''){
                     var myObj = JSON.parse(msg);

                       //alert(myObj);
                       //$(".table-fixed").empty();
         $("#apladd").empty();
         $("#apladd").append(myObj);
                   }else{
                       $("#apladd").empty();

                       // $.each(myObj, function(index,value) {
                       //  alert(myObj[index].email);
                       //$(".item").empty();
                       txt= '<tr><td>No data found</td></tr>';
                       $("#apladd").append(txt);

                       // });
                   }
               }
           });
         }
          $(".apl").change(function() {
            var type =  $("#calendar_type").val();
            var date = $("#dateprint").text();
          if(this.checked) {
              //Do stuff
              //alert($(this).val());
              var favorite = [];
                          $.each($("input[name='apl']:checked"), function(){
                              favorite.push($(this).val());
                          });
                          //alert("My favourite sports are: " + favorite.join(", "));
                        //  alert(favorite);
              var BASE_URL = '<?php echo base_url(); ?>';
            //  alert(BASE_URL);
              //alert(category_id);
              //alert($(trim((this).val())));
              //alert($.trim($(this).val()));
              //exit;
              // if(($(this).val())!=''){
              //
            //  $("#add").empty();
              // }

              $.ajax({
                  url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentlist",
                  data: 'p_id='+favorite+'&type='+type+'&date='+date,
                  success: function(msg){

                      // $("#suggesstio n-box").show();
                      //   $("#suggesstion-box").html(data);
                      //$("#search-box").css("background","#FFF");
                      // alert(msg);
                      // $(".general-item-list").empty();
                      if(msg!=''){
                        var myObj = JSON.parse(msg);
                          //alert(myObj);
                          //$(".table-fixed").empty();
      $("#apladd").empty();
      $("#apladd").append(myObj);
                      }else{
                          $("#apladd").empty();

                          // $.each(myObj, function(index,value) {
                          //  alert(myObj[index].email);
                          //$(".item").empty();
                          txt= '<tr><td>No data found</td></tr>';
                          $("#apladd").append(txt);

                          // });
                      }
                  }
              });





          }else{
            var favorite = [];
                        $.each($("input[name='apl']:checked"), function(){
                            favorite.push($(this).val());
                        });
                        //alert("My favourite sports are: " + favorite.join(", "));
                      //  alert(favorite);
            var BASE_URL = '<?php echo base_url(); ?>';
          //  alert(BASE_URL);
            //alert(category_id);
            //alert($(trim((this).val())));
            //alert($.trim($(this).val()));
            //exit;
            // if(($(this).val())!=''){
            //
          //  $("#add").empty();
            // }

            $.ajax({
                url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentlistall",
                data: 'p_id='+favorite,
                success: function(msg){

                    // $("#suggesstio n-box").show();
                    //   $("#suggesstion-box").html(data);
                    //$("#search-box").css("background","#FFF");
                    // alert(msg);
                    // $(".general-item-list").empty();
                    if(msg!=''){
                      var myObj = JSON.parse(msg);
                        //alert(myObj);
                        //$(".table-fixed").empty();
      $("#apladd").empty();
      $("#apladd").append(myObj);
                    }else{
                        $("#apladd").empty();

                        // $.each(myObj, function(index,value) {
                        //  alert(myObj[index].email);
                        //$(".item").empty();
                        txt= '<tr><td>No data found</td></tr>';
                        $("#apladd").append(txt);

                        // });
                    }
                }
            });
          }
      });
      $(".aptype").change(function() {
      var type =  $("#calendar_type").val();
      var date = $("#dateprint").text();
      if(this.checked) {

        if($(this).val()=='All'){

                      //alert("My favourite sports are: " + favorite.join(", "));
                    //  alert(favorite);
          var BASE_URL = '<?php echo base_url(); ?>';
        //  alert(BASE_URL);
          //alert(category_id);
          //alert($(trim((this).val())));
          //alert($.trim($(this).val()));
          //exit;
          // if(($(this).val())!=''){
          //
        //  $("#add").empty();
          // }

          $.ajax({
              url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentlistall",
              data: 'type='+type+'&date='+date,
              success: function(msg){

                  // $("#suggesstio n-box").show();
                  //   $("#suggesstion-box").html(data);
                  //$("#search-box").css("background","#FFF");
                  // alert(msg);
                  // $(".general-item-list").empty();
                  if(msg!=''){
                    var myObj = JSON.parse(msg);
                      //alert(myObj);
                      //$(".table-fixed").empty();
      $("#apladd").empty();
      $("#apladd").append(myObj);
                  }else{
                      $("#apladd").empty();

                      // $.each(myObj, function(index,value) {
                      //  alert(myObj[index].email);
                      //$(".item").empty();
                      txt= '<tr><td>No data found</td></tr>';
                      $("#apladd").append(txt);

                      // });
                  }
              }
          });
        }else if($(this).val()=='block_time'){

                      //alert("My favourite sports are: " + favorite.join(", "));
                    //  alert(favorite);
          var BASE_URL = '<?php echo base_url(); ?>';
        //  alert(BASE_URL);
          //alert(category_id);
          //alert($(trim((this).val())));
          //alert($.trim($(this).val()));
          //exit;
          // if(($(this).val())!=''){
          //
        //  $("#add").empty();
          // }

          $.ajax({
              url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentlistforblock",
              data: 'type='+type+'&date='+date,
              success: function(msg){

                  // $("#suggesstio n-box").show();
                  //   $("#suggesstion-box").html(data);
                  //$("#search-box").css("background","#FFF");
                  // alert(msg);
                  // $(".general-item-list").empty();
                  if(msg!=''){
                    var myObj = JSON.parse(msg);
                      //alert(myObj);
                      //$(".table-fixed").empty();
      $("#apladd").empty();
      $("#apladd").append(myObj);
                  }else{
                      $("#apladd").empty();

                      // $.each(myObj, function(index,value) {
                      //  alert(myObj[index].email);
                      //$(".item").empty();
                      txt= '<tr><td>No data found</td></tr>';
                      $("#apladd").append(txt);

                      // });
                  }
              }
          });
        }else{
          //Do stuff
          //alert($(this).val());
          var favorite = [];
                      $.each($("input[name='appointment_types']:checked"), function(){
                          favorite.push($(this).val());
                      });
                      //alert("My favourite sports are: " + favorite.join(", "));
                    //  alert(favorite);
          var BASE_URL = '<?php echo base_url(); ?>';
        //  alert(BASE_URL);
          //alert(category_id);
          //alert($(trim((this).val())));
          //alert($.trim($(this).val()));
          //exit;
          // if(($(this).val())!=''){
          //
        //  $("#add").empty();
          // }

          $.ajax({
              url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentbytype",
              data: 'p_id='+favorite+'&type='+type+'&date='+date,
              success: function(msg){
                //console.log(msg);
      //alert(msg);
                  // $("#suggesstio n-box").show();
                  //   $("#suggesstion-box").html(data);
                  //$("#search-box").css("background","#FFF");
                  // alert(msg);
                  // $(".general-item-list").empty();

                  //alert(myObj);
      //$("#add").css('display','block');
      //$(".table-fixed").empty();
                  if(msg!=''){
                    var myObj = JSON.parse(msg);
                      //alert(myObj);
                      //$(".table-fixed").empty();
      $("#apladd").empty();
      $("#apladd").append(myObj);
                  }else{
                      $("#apladd").empty();

                      // $.each(myObj, function(index,value) {
                      //  alert(myObj[index].email);
                      //$(".item").empty();
                      txt= '<tr><td>No data found</td></tr>';
                      $("#apladd").append(txt);

                      // });
                  }
              }
          });

      }



      }else{
        var favorite = [];
                    $.each($("input[name='appointment_types']:checked"), function(){
                        favorite.push($(this).val());
                    });
                    //alert("My favourite sports are: " + favorite.join(", "));
                  //  alert(favorite);
        var BASE_URL = '<?php echo base_url(); ?>';
      //  alert(BASE_URL);
        //alert(category_id);
        //alert($(trim((this).val())));
        //alert($.trim($(this).val()));
        //exit;
        // if(($(this).val())!=''){
        //
      //  $("#add").empty();
        // }

        $.ajax({
            url: BASE_URL+"dashboard_super/schedule/schedule/get_appoitmentlistall",
            data: 'p_id='+favorite,
            success: function(msg){

                // $("#suggesstio n-box").show();
                //   $("#suggesstion-box").html(data);
                //$("#search-box").css("background","#FFF");
                // alert(msg);
                // $(".general-item-list").empty();
                //var myObj = JSON.parse(msg);
                //alert(myObj);
      //$("#add").css('display','block');
      //$(".table-fixed").empty();
      if(msg!=''){
        var myObj = JSON.parse(msg);
                    //alert(myObj);
                    //$(".table-fixed").empty();
      $("#apladd").empty();
      $("#apladd").append(myObj);
                }else{
                    $("#apladd").empty();

                    // $.each(myObj, function(index,value) {
                    //  alert(myObj[index].email);
                    //$(".item").empty();
                    txt= '<tr><td>No data found</td></tr>';
                    $("#apladd").append(txt);

                    // });
                }
            }
        });
      }
      });


      function getval(){
      var date1 = $("#datetimepicker3").val();
      var aduration = $("#aduration").val();
      var splitTime1= date1.split(':');
      var splitTime2= aduration.split(' ');
      var min = parseInt(splitTime1[1])+parseInt(splitTime2[0]);
      var minute = parseInt(splitTime1[0])*60;
      var minutesum = min+minute;
      var hours = ''+minutesum/60;
      hour = hours.split('.');
      var min = Math.round(minutesum%60);
      hour =hour[0];
      if((''+hour).length==1){
      hour ='0'+hour;
      }

      if((''+min).length==1){
        min ='0'+min;
      }
      //alert((''+min).length);
      //if()
      //min = min.toFixed(2);
    //alert(hour+':'+min);
      //alert(splitTime2[0]);
      if(aduration!=''){

      $("#datetimepicker4").val(hour+':'+min);

      }else{
        $("#aduration").focus();
      }

      }

      function setval(){
        var date1 = $("#datetimepicker3").val();
        var date2 = $("#datetimepicker4").val();

        var splitTime1= date1.split(':');
        var splitTime2= date2.split(':');

       var hours1 = parseInt(splitTime1[0])*60;
       var min1 = parseInt(splitTime1[1]);
       var totalmin1 = hours1+min1;

       var hours2 = parseInt(splitTime2[0])*60;
       var min2 = parseInt(splitTime2[1]);
       var totalmin2 = hours2+min2;

      var substraction = totalmin1 - totalmin2;
      substraction = Math.abs(substraction);

      var pr ='';
      if(substraction>=60){

      pr = Math.round(substraction/60)+' '+'hours';

      }else{
        pr = Math.round(substraction)+' '+'min';
      }


      $('#aduration').html($('<option>', {
          value: pr,
          text: pr
      }));

      //$("#aduration").text();
        // var min = parseInt(splitTime1[1])+parseInt(splitTime2[0]);
        // var minute = parseInt(splitTime1[0])*60;
        // var minutesum = min+minute;
        // var hour = Math.round(minutesum/60);
        // var min = Math.round(minutesum%60);
        // if((''+min).length==1){
        //   min ='0'+min;
        // }
        //alert((''+min).length);
        //if()
        //min = min.toFixed(2);
        //alert(hour+':'+min);
        //alert(splitTime2[0]);
        // if(aduration!=''){
        //
        // $("#datetimepicker4").val(hour+':'+min);
        //
        // }else{
        //   $("#aduration").focus();
        // }
      }

      $("#repeat").change(function() {

          if(($(this)).val()=='yes'){
            //alert($(this).val());
            $("#tosdate").css('display','block');
          }else{
            $("#tosdate").css('display','none');
          }
                // alert($('option:selected', $(this)).text());
             });

      function getvals(){
      var date1 = $("#datetimepicker5").val();
      var aduration = $("#bduration").val();
      var splitTime1= date1.split(':');
      var splitTime2= aduration.split(' ');
      var min = parseInt(splitTime1[1])+parseInt(splitTime2[0]);
      var minute = parseInt(splitTime1[0])*60;
      var minutesum = min+minute;
      //var hour = Math.round(minutesum/60);
      var hours = ''+minutesum/60;
      hour = hours.split('.');
      var min = Math.round(minutesum%60);
      hour =hour[0];
      var min = Math.round(minutesum%60);
      if((''+hour).length==1){
        hour ='0'+hour;
      }
      if((''+min).length==1){
        min ='0'+min;
      }
      //alert(hour+':'+min);
      //alert(splitTime2[0]);
      if(aduration!=''){

      $("#datetimepicker6").val(hour+':'+min);

      }else{
        $("#bduration").focus();
      }

      }


      function setvals(){
        var date1 = $("#datetimepicker5").val();
        var date2 = $("#datetimepicker6").val();

        var splitTime1= date1.split(':');
        var splitTime2= date2.split(':');

       var hours1 = parseInt(splitTime1[0])*60;
       var min1 = parseInt(splitTime1[1]);
       var totalmin1 = hours1+min1;

       var hours2 = parseInt(splitTime2[0])*60;
       var min2 = parseInt(splitTime2[1]);
       var totalmin2 = hours2+min2;

      var substraction = totalmin1 - totalmin2;
      substraction = Math.abs(substraction);

      var pr ='';
      if(substraction>=60){

      pr = Math.round(substraction/60)+' '+'hours';

      }else{
        pr = Math.round(substraction)+' '+'min';
      }


      $('#bduration').html($('<option>', {
          value: pr,
          text: pr
      }));

      //$("#aduration").text();
        // var min = parseInt(splitTime1[1])+parseInt(splitTime2[0]);
        // var minute = parseInt(splitTime1[0])*60;
        // var minutesum = min+minute;
        // var hour = Math.round(minutesum/60);
        // var min = Math.round(minutesum%60);
        // if((''+min).length==1){
        //   min ='0'+min;
        // }
        //alert((''+min).length);
        //if()
        //min = min.toFixed(2);
        //alert(hour+':'+min);
        //alert(splitTime2[0]);
        // if(aduration!=''){
        //
        // $("#datetimepicker4").val(hour+':'+min);
        //
        // }else{
        //   $("#aduration").focus();
        // }
      }

      function changedate()
      {
        var BASE_URL = '<?php echo base_url(); ?>';
        var date = $("#dateprint").text();
        var type = $("#calendar_type").val();

        //var pdate = date-1;
        //var msec = Date.parse(date);
        //alert(msec);
        //var d = new Date(msec);
        $.ajax({
            url: BASE_URL+"dashboard_super/schedule/schedule/get_todayleft",
            data: 'p_id='+date+'&type='+type,
            success: function(msg){
              //console.log(msg);
             //alert(msg);

                // $("#suggesstio n-box").show();
                //   $("#suggesstion-box").html(data);
                //$("#search-box").css("background","#FFF");
                // alert(msg);
                // $(".general-item-list").empty();
                if(msg!=''){
                  var myObjs = JSON.parse(msg);

                var myObj = myObjs.split("~~");
                    //alert(myObj[1]);
                    $("#dateprint").text(myObj[1])
                    //$(".table-fixed").empty();
      $("#apladd").empty();
      $("#apladd").append(myObj[0]);
      console.log(myObj[1]);
                }else{
                    $("#apladd").empty();

                    // $.each(myObj, function(index,value) {
                    //  alert(myObj[index].email);
                    //$(".item").empty();
                    txt= '<tr><td>No data found</td></tr>';
                    $("#apladd").append(txt);

                    // });
                }
            }
        });
      }
      function changedateright()
      {
        var BASE_URL = '<?php echo base_url(); ?>';
        var date = $("#dateprint").text();
        var type = $("#calendar_type").val();

        //var pdate = date-1;
        //var msec = Date.parse(date);
        //alert(msec);
        //var d = new Date(msec);
        $.ajax({
            url: BASE_URL+"dashboard_super/schedule/schedule/get_todayright",
            data: 'p_id='+date+'&type='+type,
            success: function(msg){
              //console.log(msg);
             //alert(msg);

                // $("#suggesstio n-box").show();
                //   $("#suggesstion-box").html(data);
                //$("#search-box").css("background","#FFF");
                // alert(msg);
                // $(".general-item-list").empty();
                if(msg!=''){
                  var myObjs = JSON.parse(msg);

                var myObj = myObjs.split("~~");
                    //alert(myObj[1]);
                    $("#dateprint").text(myObj[1])
                    //$(".table-fixed").empty();
      $("#apladd").empty();
      $("#apladd").append(myObj[0]);
      console.log(myObj[1]);
                }else{
                    $("#apladd").empty();

                    // $.each(myObj, function(index,value) {
                    //  alert(myObj[index].email);
                    //$(".item").empty();
                    txt= '<tr><td>No data found</td></tr>';
                    $("#apladd").append(txt);

                    // });
                }
            }
        });
      }
      function medical_msgsearch(){
          var BASE_URL = '<?php echo base_url(); ?>';

          var vals = $("#medical_search").val();
        //alert(vals);
          //alert(category_id);
          //alert($(trim((this).val())));
          //alert($.trim($(this).val()));
          //exit;
         //$("#add").css('display','none');
         var doc_val_check=$.trim(vals);
         //alert(doc_val_check.length);
        // if(doc_val_check.length!=0 && $.trim(vals)!=null && $.trim(vals)!=''){
          //
        //  alert($.trim($(this).val()));
          //$("#add").empty();
          // }

          $.ajax({
              url: BASE_URL+"dashboard_super/messages/message/search",
              data: 'p_id='+$.trim(vals),
              success: function(msg){
                //   alert(msg);
                  // $("#suggesstio n-box").show();
                  //   $("#suggesstion-box").html(data);
                  //$("#search-box").css("background","#FFF");
                  // alert(msg);
                  // $(".general-item-list").empty();
                  //var myObj = JSON.parse(msg);
  //$("#add").css('display','block');
  //$(".table-fixed").empty();
                //  if(myObj.length>0){
                    if(msg!=''){
                      var myObj = JSON.parse(msg);
                      //alert(myObj);
                      //$(".table-fixed").empty();
  $("#medical_t").empty();
                      $.each(myObj, function(index,value) {
                        //$(".table-fixed").empty();
                          //$(".item").empty();

                          //  alert(myObj[index].email);
                        //  var t = 'onclick=test(\'' +myObj[index].email+ '\')';
                        //  txt  ='<div class="row" onClick="test(\'' + myObj[index].patient_id + '\',\'' + myObj[index].fname + myObj[index].lname + '\')"><div class="col-12 col-md-3"><img src="'+BASE_URL+'assets/images/user-img.png"><p class="text-center"><b>' + myObj[index].fname+myObj[index].lname + '</b></p></div><div class="col-12 col-md-2 mt-15"><span>' + myObj[index].age + '</span></div><div class="col-12 col-md-2 mt-15"><span>' + myObj[index].sex + '</span></div><div class="col-12 col-md-2 mt-15 text-center"><span>' + myObj[index].date_of_birth + '</span></div><div class="col-12 col-md-2 mt-15"><span>' + myObj[index].email + '</span></div><div class="col-12 col-md-4 mt-15"><span><b>M</b></span><span class="ml-10">' + myObj[index].mobile + '</span></div><div class="col-12 col-md-3 mt-15"><span><b>PRN</b></span><span class="ml-10">' + myObj[index].patient_id + '</span></div></div>';

  txt = '<tr class="hovertr"><td>'+myObj[index].to_user+'</td><td>'+myObj[index].from_user+'</td><td>'+myObj[index].subject+'</td><td>'+myObj[index].message+'</td><td>'+myObj[index].message_type+'</td><td><a href='+BASE_URL+myObj[index].file+' download ><i class="fa fa-download" aria-hidden="true"></i></a></td><td class="text-right"><div class="btn-group"><a href="#" onclick="patient_view(\''+myObj[index].message_id+'\')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a><a href="#" onclick="admin_share(\''+myObj[index].message_id+'\')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-share"></i></a><a href="'+BASE_URL+'messages/message/delete/'+myObj[index].message_id+'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></div></td></tr>';
                         $("#medical_t").append(txt);
                      //  $("#add").html(msg);

                      });
                  }else{
                    //$("#medical_t").empty();
                  //  $("#add").css('display','none');
                    //  $("#add").empty();

                      // $.each(myObj, function(index,value) {
                      //  alert(myObj[index].email);
                      //$(".item").empty();
                      txt= ' No data found ';
                      $("#medical_t").append(txt);

                      // });
                  }
              }
          });
  //}else{
    //$("#add").css('display','none');
  //  $("#medical_t").empty();
    //$("#patientPartyName").va
  //}
      }
      function patient_msgsearch(){
          var BASE_URL = '<?php echo base_url(); ?>';

          var vals = $("#patient_search").val();
        //  alert(BASE_URL);
          //alert(category_id);
          //alert($(trim((this).val())));
          //alert($.trim($(this).val()));
          //exit;
         //$("#add").css('display','none');
         var doc_val_check=$.trim(vals);
         //alert(doc_val_check.length);
           if(doc_val_check.length!=0 && $.trim(vals)!=null && $.trim(vals)!=''){
          //
        //  alert($.trim($(this).val()));
          //$("#add").empty();
          // }

          $.ajax({
              url: BASE_URL+"dashboard_super/messages/message/patientmsgsearch",
              data: 'p_id='+$.trim(vals),
              success: function(msg){
                  // alert(msg);
                  // $("#suggesstio n-box").show();
                  //   $("#suggesstion-box").html(data);
                  //$("#search-box").css("background","#FFF");
                  // alert(msg);
                  // $(".general-item-list").empty();
                  //var myObj = JSON.parse(msg);
  //$("#add").css('display','block');
  //$(".table-fixed").empty();
                //  if(myObj.length>0){
                    if(msg!=''){
                      var myObj = JSON.parse(msg);
                      //alert(myObj);
                      //$(".table-fixed").empty();
  $("#patient_t").empty();
                      $.each(myObj, function(index,value) {
                        //$(".table-fixed").empty();
                          //$(".item").empty();

                          //  alert(myObj[index].email);
                        //  var t = 'onclick=test(\'' +myObj[index].email+ '\')';
                        //  txt  ='<div class="row" onClick="test(\'' + myObj[index].patient_id + '\',\'' + myObj[index].fname + myObj[index].lname + '\')"><div class="col-12 col-md-3"><img src="'+BASE_URL+'assets/images/user-img.png"><p class="text-center"><b>' + myObj[index].fname+myObj[index].lname + '</b></p></div><div class="col-12 col-md-2 mt-15"><span>' + myObj[index].age + '</span></div><div class="col-12 col-md-2 mt-15"><span>' + myObj[index].sex + '</span></div><div class="col-12 col-md-2 mt-15 text-center"><span>' + myObj[index].date_of_birth + '</span></div><div class="col-12 col-md-2 mt-15"><span>' + myObj[index].email + '</span></div><div class="col-12 col-md-4 mt-15"><span><b>M</b></span><span class="ml-10">' + myObj[index].mobile + '</span></div><div class="col-12 col-md-3 mt-15"><span><b>PRN</b></span><span class="ml-10">' + myObj[index].patient_id + '</span></div></div>';
  txt = '<tr class="hovertr"><td>'+myObj[index].to_user+'</td><td>'+myObj[index].from_user+'</td><td>'+myObj[index].subject+'</td><td>'+myObj[index].message+'</td><td>'+myObj[index].created_date+'</td><td>'+myObj[index].message_type+'</td><td><a href='+BASE_URL+myObj[index].file+' download ><i class="fa fa-download" aria-hidden="true"></i></a></td><td class="text-right"><div class="btn-group"><a href="#" onclick="patient_view(\''+myObj[index].message_id+'\')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-eye"></i></a><a href="#" onclick="patient_share(\''+myObj[index].message_id+'\')" class="btn btn-xs btn-default" style="margin-right:10px;"><i class="fa fa-share"></i></a><a href="'+BASE_URL+'messages/message/delete/'+myObj[index].message_id+'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></div></td></tr>';
                         $("#patient_t").append(txt);
                      //  $("#add").html(msg);

                      });
                  }else{
                    //$("#medical_t").empty();
                  //  $("#add").css('display','none');
                    //  $("#add").empty();

                      // $.each(myObj, function(index,value) {
                      //  alert(myObj[index].email);
                      //$(".item").empty();
                      txt= ' No data found ';
                      $("#patient_t").append(txt);

                      // });
                  }
              }
          });
  }else{
    //$("#add").css('display','none');
    $("#medical_t").empty();
    //$("#patientPartyName").va
  }
      }


      function medical_share(msg_id)
      {
        //alert(msg_id);
        $.ajax({
            url: BASE_URL+"dashboard_super/messages/message/mmessage_detail",
            data: 'msg_id='+$.trim(msg_id),
            success: function(msg){
                var myObj = JSON.parse(msg);
                //alert(myObj.to_user);
                $("#m_subject").val(myObj.subject);
                $("#m_message").val(myObj.message);
                var type='';
                if(myObj.message_type=='erx'){
                  type ='eRX';
                }else if(myObj.message_type=='lab'){
                  type ='Lab';
                }else if(myObj.message_type=='problem'){
                  type ='Problem';
                }else if(myObj.message_type=='normal'){
                  type ='Normal';
                }
                $("#m_messagetype").append("<option value='"+myObj.message_type+"' selected>"+type+"</option>");
              //  $("#m_messagetype").text(myObj.message_type);
            }
          });
        $('#MedicalProvidershare').modal('show');
      }
      function admin_share(msg_id)
      {
        //alert(msg_id);
        $.ajax({
            url: BASE_URL+"dashboard_super/messages/message/mmessage_detail",
            data: 'msg_id='+$.trim(msg_id),
            success: function(msg){
                var myObj = JSON.parse(msg);
                //alert(myObj.to_user);
                $("#m_subject").val(myObj.subject);
                $("#m_message").val(myObj.message);
                var type='';
                if(myObj.message_type=='erx'){
                  type ='eRX';
                }else if(myObj.message_type=='lab'){
                  type ='Lab';
                }else if(myObj.message_type=='problem'){
                  type ='Problem';
                }else if(myObj.message_type=='normal'){
                  type ='Normal';
                }
                $("#m_messagetype").append("<option value='"+myObj.message_type+"' selected>"+type+"</option>");
              //  $("#m_messagetype").text(myObj.message_type);
            }
          });
        $('#Adminshare').modal('show');
      }
      function amedical_share(msg_id)
      {
        //alert(msg_id);
        $.ajax({
            url: BASE_URL+"dashboard_super/messages/message/ammessage_detail",
            data: 'msg_id='+$.trim(msg_id),
            success: function(msg){
                var myObj = JSON.parse(msg);
                //alert(myObj.to_user);
                $("#m_subject").val(myObj.subject);
                $("#m_message").val(myObj.message);
                var type='';
                if(myObj.message_type=='erx'){
                  type ='eRX';
                }else if(myObj.message_type=='lab'){
                  type ='Lab';
                }else if(myObj.message_type=='problem'){
                  type ='Problem';
                }else if(myObj.message_type=='normal'){
                  type ='Normal';
                }
                $("#m_messagetype").append("<option value='"+myObj.message_type+"' selected>"+type+"</option>");
              //  $("#m_messagetype").text(myObj.message_type);
            }
          });
        $('#MedicalProvidershare').modal('show');
      }

      function patient_share(msg_id)
      {
        //alert(msg_id);
        $.ajax({
            url: BASE_URL+"dashboard_super/messages/message/mmessage_detail",
            data: 'msg_id='+$.trim(msg_id),
            success: function(msg){
                var myObj = JSON.parse(msg);
                //alert(myObj.to_user);
                $("#p_subject").val(myObj.subject);
                $("#p_message").val(myObj.message);
                var type='';
                if(myObj.message_type=='erx'){
                  type ='eRX';
                }else if(myObj.message_type=='lab'){
                  type ='Lab';
                }else if(myObj.message_type=='problem'){
                  type ='Problem';
                }else if(myObj.message_type=='normal'){
                  type ='Normal';
                }
                $("#p_messagetype").append("<option value='"+myObj.message_type+"' selected>"+type+"</option>");
              //  $("#m_messagetype").text(myObj.message_type);
            }
          });
        $('#Patientmessageforward').modal('show');
      }
      function patient_view(msg_id)
      {
        read(msg_id);
        //alert(msg_id);
        $.ajax({
            url: BASE_URL+"dashboard_super/messages/message/mmessage_detail",
            data: 'msg_id='+$.trim(msg_id),
            success: function(msg){
                var myObj = JSON.parse(msg);

                $("#vp_to").text(myObj.to_user);
                $("#vp_subject").text(myObj.subject);
                $("#vp_message").text(myObj.message);
                $("#vp_from").text(myObj.from_user);

              //  if(myObj.message_type=='erx'){

                $("#vp_messagetype").text(myObj.message_type);

              //  $("#m_messagetype").text(myObj.message_type);
            }
          });
        $('#Patientmessageview').modal('show');
      }
      function apatient_view(msg_id)
      {
        aread(msg_id);
        //alert(msg_id);
        $.ajax({
            url: BASE_URL+"dashboard_super/messages/message/ammessage_detail",
            data: 'msg_id='+$.trim(msg_id),
            success: function(msg){
                var myObj = JSON.parse(msg);

                $("#avp_to").text(myObj.to_user);
                $("#avp_subject").text(myObj.subject);
                $("#avp_message").text(myObj.message);
                $("#avp_from").text(myObj.from_user);

              //  if(myObj.message_type=='erx'){

                $("#avp_messagetype").text(myObj.message_type);

              //  $("#m_messagetype").text(myObj.message_type);
            }
          });
        $('#aPatientmessageview').modal('show');
      }
      function aread(msg_id){
      //  alert(msg_id);
        $.ajax({
            url: BASE_URL+"dashboard_super/messages/message/areadmessage",
            data: 'msg_id='+$.trim(msg_id),
            success: function(msg){
              //  window.location.href = BASE_URL+'dashboard_super/messages/message';
              //  $("#m_messagetype").text(myObj.message_type);
            }
          });
      }
      function read(msg_id){
      //  alert(msg_id);
        $.ajax({
            url: BASE_URL+"dashboard_super/messages/message/readmessage",
            data: 'msg_id='+$.trim(msg_id),
            success: function(msg){
              //  window.location.href = BASE_URL+'dashboard_super/messages/message';
              //  $("#m_messagetype").text(myObj.message_type);
            }
          });
      }
      function refresh(){
        window.location.href = BASE_URL+'dashboard_super/messages/message';
      }
      function contact_read(msg_id){
      //  alert(msg_id);
        $.ajax({
            url: BASE_URL+"dashboard_super/messages/message/contact_read",
            data: 'msg_id='+$.trim(msg_id),
            success: function(msg){
            // window.location.href = BASE_URL+'dashboard_super/messages/message';
              //  $("#m_messagetype").text(myObj.message_type);
            }
          });
      }
      function patientsearch(){
          var BASE_URL = '<?php echo base_url(); ?>';

          var vals = $("#patient_searchid").val();
        //  alert(BASE_URL);
          //alert(category_id);
          //alert($(trim((this).val())));
          //alert($.trim($(this).val()));
          //exit;
       //  $("#padd").css('display','none');
         var doc_val_check=$.trim(vals);
         //alert(doc_val_check.length);
           if(doc_val_check.length!=0 && $.trim(vals)!=null && $.trim(vals)!=''){
          //
        //  alert($.trim($(this).val()));
          $("#padd").empty();
          // }

          $.ajax({
              url: BASE_URL+"dashboard_super/patient/patient/patient_search",
              data: 'p_id='+$.trim(vals),
              success: function(msg){
   //console.log(msg);
   //$("#padd").css('display','block');
   $("#padd").empty();
      if(msg!=''){
                           var myObj = JSON.parse(msg);
                           //  alert(myObj);
                         //    console.log(myObj);
                             //$(".table-fixed").empty();

               $("#padd").append(myObj);
                         }else{
                             $("#padd").empty();

                             // $.each(myObj, function(index,value) {
                             //  alert(myObj[index].email);
                             //$(".item").empty();
                             txt= '<tr><td>No data found</td></tr>';
                             $("#padd").append(txt);

                             // });
                         }
              }
          });
   }else{
    //$("#padd").css('display','none');
    //$("#patientPartyName").va
      $("#padd").empty();
   }
      }
      function doctorsearch(doctor_id){
        var BASE_URL = '<?php echo base_url();?>';
        var vals = $("#doctor_searchid").val();
        vals = $.trim(vals);
        // var doctor_id = $(this).data('doctorid');
        var doc_val_check=$.trim(vals);
          $("#dadd").empty();
          $.ajax({
              url: BASE_URL+"dashboard_super/doctor/doctor/doctor_search",
              data:{
                'p_id':vals,
                'doctor_id':doctor_id
              },
              success: function(msg){
              $("#dadd").empty();
              if(msg!=''){
                  // var myObj = JSON.parse(msg);
                   $("#dadd").append(msg);
                    }else{
                         $("#dadd").empty();
                         txt= '<tr><td>No data found</td></tr>';
                         txt = JSON.parse(txt);
                         $("#dadd").append(txt);
                    }
                  }
            });
      }
      function message_search(){
          var BASE_URL = '<?php echo base_url(); ?>';
         var vals = $("#message_searchdata").val();
         var doc_val_check=$.trim(vals);
            $("#suMsaages").empty();
            $.ajax({
                url: BASE_URL+"dashboard_super/messages/message/search_messages",
                data: 'search='+$.trim(vals),
                success: function(msg){
                var myObj = JSON.parse(msg);
                  if(myObj.length > 0){
                    $("#suMsaages").empty();
                    $.each(myObj, function(index,value) {
                         txt = '<tr style="border-bottom: 1px solid #ddd;" class="hovertr" ><td ><span class="text-primary">'+myObj[index].from_email_address+'</span></td><td>'+myObj[index].subject+'</td><td>'+myObj[index].message+'</td><td class="pt-15"><div class="btn-group" style="float: right;display: flex;"><a href="#" data-toggle="modal" data-target="#MessageDetails" onclick="GetAllUserMassages('+myObj[index].from_user_id+')" class="btn btn-xs icon-box" style="margin-right:10px;"><i class="fa fa-eye"></i></a><a href="#" id="reply_to_user" class="btn btn-xs btn-default" style="margin-right:10px;" onClick="getUserEmailId('+myObj[index].from_email_address+','+myObj[index].from_user_id+')" data-toggle="modal" data-target="#forwrdbox"><i class="fa fa-share"></i></a><a href="'+BASE_URL+"dashboard_super/messages/message/delete/"+myObj[index].from_user_id+'" class="btn btn-xs btn-danger icon-box" onclick="return confirmation()"><i class="fa fa-trash"></i></a></div></td></tr>';
                    $("#suMsaages").append(txt);
                    });
                }else{
                  // $("#adminadd").css('display','none');
                  $("#suMsaages").empty();
                   txt  = '<tr style="border-bottom: 1px solid #ddd;" class="hovertr"><td colspan="4" align="center">No record found!</td></tr>';
                   $("#suMsaages").append(txt);
                }
              }
            });
      }

      function admin_info(d_id)
      {
        //alert(d_id);
        //read(msg_id);
        //alert(msg_id);
        $.ajax({
            url: BASE_URL+"dashboard_super/admin/admin/admindetail",
            data: 'd_id='+$.trim(d_id),
            success: function(msg){
            //  alert(msg);
         //  var features = '<?php $feature// = explode(',',$admin->features); ?>';
            var myObj = JSON.parse(msg);
            //alert(myObj.to_user);
            $("#fullname").text(myObj.fullname);
            $("#email").text(myObj.email);
            $("#phone").text(myObj.phone);
            $("#mobile").text(myObj.mobile);
            $("#sex").text(myObj.sex);
            $("#department").text(myObj.department);
            $("#hospitalname").text(myObj.hospitalname ? myObj.hospitalname : '');
            $("#role").text(myObj.role);
            $("#admin_access").text(myObj.admin_access);
            $("#dobs").text(myObj.date_of_birth);

            $("#city").text(myObj.city);
            $("#state").text(myObj.state);
            $("#country").text(myObj.country);
            $("#zipcode").text(myObj.zipcode);

            $("#contactinfo").text(myObj.contactinfo);
            $("#features").text(myObj.features);
            $("#back_ground").text(myObj.back_ground);
            $("#joindate").text(myObj.create_date);
            $("#status").text(myObj.status);

              //  if(myObj.message_type=='erx'){


              //  $("#m_messagetype").text(myObj.message_type);
            }
          });
        $('#admininfo').modal('show');
      }
      function patient_info(p_id,admin_id)
      {
        //read(msg_id);
        //alert(msg_id);
        $.ajax({
            url: BASE_URL+"dashboard_super/patient/patient/patientdetail/"+admin_id,
            data: 'p_id='+$.trim(p_id),
            success: function(msg){
            //  alert(msg);
                var myObj = JSON.parse(msg);
                //alert(myObj.to_user);
                $("#first").text(myObj.fname);
                $("#last").text(myObj.lname);
                $("#dobs").text(myObj.date_of_birth);
                $("#contactinfo").text(myObj.contactinfo);
                $("#joindate").text(myObj.create_date);
                $("#patientid").text(myObj.patient_id);
                $("#status").text(myObj.status);
                $("#mname").text(myObj.mname);
                $("#suffix").text(myObj.suffix);
                $("#secondlastname").text(myObj.secondlastname);
                $("#previousfname").text(myObj.previousfname);
                $("#previousmname").text(myObj.previousmname);
                $("#previouslname").text(myObj.previouslname );
                $("#dod").text(myObj.dod);
                $("#ssn").text(myObj.ssn);
                $("#ethnicity_race").text(myObj.ethnicity_race);
                $("#mobile").text(myObj.mobile);
                $("#email").text(myObj.email);
                $("#phone").text(myObj.phone);
                $("#workphone").text(myObj.workphone);
                $("#ext").text(myObj.ext);
                $("#relationship_to_guarantor").text(myObj.relationship_to_guarantor);
                $("#guarantor_fname").text(myObj.guarantor_fname);
                $("#guarantor_mname").text(myObj.guarantor_mname);
                $("#guarantor_lname").text(myObj.guarantor_lname);
                $("#guarantor_address1").text(myObj.guarantor_address1);
                $("#guarantor_country").text(myObj.guarantor_country);
                $("#guarantor_city").text(myObj.guarantor_city);
                $("#guarantor_state").text(myObj.guarantor_state);
                $("#guarantor_zip").text(myObj.guarantor_zip);
                $("#guarantor_dob").text(myObj.guarantor_dob);
                $("#guarantor_sex").text(myObj.guarantor_sex);
                $("#guarantor_ssn").text(myObj.guarantor_ssn);
                $("#guarantor_primary_phone").text(myObj.guarantor_primary_phone);
                $("#guarantor_primary_ext").text(myObj.guarantor_primary_ext);
                $("#guarantor_secondary_phone").text(myObj.guarantor_secondary_phone);
                $("#guarantor_secondary_ext").text(myObj.guarantor_secondary_ext);
                $("#primary_fname").text(myObj.primary_fname);
                $("#primary_mname").text(myObj.primary_mname);
                $("#primary_lname").text(myObj.primary_lname);
                //$("#relation_to_patient").text(myObj.relation_to_patient);
                $("#primary_phone").text(myObj.primary_phone);
                $("#primary_phone_type").text(myObj.primary_phone_type);
                $("#primary_address_1").text(myObj.primary_address_1);

                 $("#primary_city").text(myObj.primary_city);
                 $("#primary_state").text(myObj.primary_state);
                  $("#primary_country").text(myObj.primary_country);
                 $("#primary_zip").text(myObj.primary_zip);
                $("#patient_mother_name").text(myObj.patient_mother_name);
                $("#immunization_registery_status").text(myObj.immunization_registery_status);
                $("#immunization_effective_date").text(myObj.immunization_effective_date);
                $("#sex").text(myObj.sex);

              //  if(myObj.message_type=='erx'){


              //  $("#m_messagetype").text(myObj.message_type);
            }
          });
        $('#Patientinfo').modal('show');
      }
      function doctor_info(d_id)
      {
        //read(msg_id);
        $.ajax({
            type: 'POST',
            url: BASE_URL+"dashboard_super/doctor/doctor/doctordetail",
            data: {
            'd_id': d_id,
              '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
            },
           dataType: 'json',
            success: function(response){
            //alert(msg);
                // var myObj = JSON.parse(response);
                var myObj = response;
                //alert(myObj.to_user);
                $("#fullname").text(myObj.fullname);
                $("#email").text(myObj.email);
                $("#phone").text(myObj.phone);
                $("#mobile").text(myObj.mobile);
                $("#sex").text(myObj.sex);
                $("#department").text(myObj.department);
                $("#role").text(myObj.role);
                $("#features").text(myObj.features);
                $("#admin_access").text(myObj.admin_access);
                $("#dobs").text(myObj.date_of_birth);
                $("#contactinfo").text(myObj.contactinfo);
                $("#back_ground").text(myObj.back_ground);
                $("#joindate").text(myObj.create_date);
                $("#status").text(myObj.status);
            }
          });
        $('#Docotrinfo').modal('show');
      }
      function delete_department()
      {
       var department_id =   $( "#department_id option:selected" ).val();
       var department_name =   $( "#department_id option:selected" ).text();
      alert(department_id);

        if(department_name!='Other'){
        //read(msg_id);
        //alert(msg_id);
        $.ajax({
            url: BASE_URL+"dashboard_super/doctor/doctor/department_delete",
            data: 'd_id='+$.trim(department_id),
            success: function(msg){
               alert(msg);
              $("#department_id option[value="+department_name+"]").remove();

              //  var myObj = JSON.parse(msg);
                //alert(myObj.to_user);
            // $('#department_id').trigger("chosen:updated");
             //$("#department_id").selectmenu('refresh', true);
             $('#department_id').trigger("liszt:updated");
             location.reload();
            }
          });
        }
      //  $('#Docotrinfo').modal('show');
      }
      function delete_role()
      {
        var role_id =   $( "#role_id option:selected" ).val();
        var role_name =   $( "#role_id option:selected" ).text();
       //  alert(department_id);

         if(role_name!='Other'){
         //read(msg_id);
         //alert(msg_id);
         $.ajax({
             url: BASE_URL+"dashboard_super/doctor/doctor/role_delete",
             data: 'd_id='+$.trim(role_id),
             success: function(msg){
               $("#role_id option[value="+role_name+"]").remove();
             //  alert(msg);
               //  var myObj = JSON.parse(msg);
                 //alert(myObj.to_user);
             // $('#department_id').trigger("chosen:updated");
              //$("#department_id").selectmenu('refresh', true);
              $('#role_id').trigger("liszt:updated");
              location.reload();
             }
           });
         }
      }
      function effective(){
        var date1 = $("#efdate").val();  //  from
        var date2 = $("#etdate").val(); // to
      //  alert(date1);
      //  alert(date2);
        if(date2<date1){
        //  alert("to time should not be less than from time");
$("#effectivetime").css('color','red');
$("#effectivetime").css('font-size','10px');
$("#effectivetime").css('display','block');
          $('#etdate').css('border-color', 'red');
          $("#etdate").focus();
        }else{
          $('#etdate').css('border-color', '');
          $("#effectivetime").hide();
        }

      }
      // Admin email for message reply
        // $('#reply_to_user').click(function(){
        //   alert();
        //   var userEmail = $(this).data('email');
        //   $('#reply_to_email').val(userEmail);
        // });
        // Admin email for message reply
        $('input[name="number"]').keyup(function(e){
          if (/\D/g.test(this.value))
          {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
          }
        });

// // Image crop
//  // vars
// let resultc = document.querySelector('.result'),
// img_result = document.querySelector('.img-result'),
// img_w = document.querySelector('.img-w'),
// img_h = document.querySelector('.img-h'),
// options = document.querySelector('.options'),
// save = document.querySelector('.save'),
// cropped = document.querySelector('.cropped'),
// upload = document.querySelector('#picture'),
// cropper = '';

// // on change show image with crop options
// upload.addEventListener('change', (e) => {
//   if (e.target.files.length) {
//     // start file reader

//     const reader = new FileReader();
//       console.log(e.target.resultc);
//     reader.onload = (e)=> {
//       if(e.target.resultc){
//         // create new image
//         let img = document.createElement('img');
//         img.id = 'image';
//         img.src = e.target.resultc
//         // clean result before
//         resultc.innerHTML = '';
//         // append new image
//         resultc.appendChild(img);
//         // show save btn and options
//         save.classList.remove('hide');
//         options.classList.remove('hide');
//         // init cropper
//         cropper = new Cropper(img);
//       }
//     };
//     reader.readAsDataURL(e.target.files[0]);

//   }
// });

// // save on click
// save.addEventListener('click',(e)=>{
//   e.preventDefault();
//   // get result to data uri
//   let imgSrc = cropper.getCroppedCanvas({
//     width: img_w.value // input value
//   }).toDataURL();
//     $('#croppicture').val(imgSrc);
//   // remove hide class of img
//     cropped.classList.remove('hide');
//   img_result.classList.remove('hide');
//   // show image cropped
//   cropped.src = imgSrc;
// });
// // Image crop
      </script>

    </body>
</html>
