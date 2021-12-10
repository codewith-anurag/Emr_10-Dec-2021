<link href="<?php echo base_url(); ?>assets/css/health_report/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
    integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all"
    rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<style>
.kv-file-upload {
    display: none;
}
.timepicker-picker table td {
    border: none !important;
}
.bootstrap-datetimepicker-widget td span {
    display: inline-block;
     width: 30px !important;
    height: 0px !important;
    line-height: 0px !important;
    margin: 2px 1.5px;
    cursor: pointer;
    border-radius: 4px;
}
.timepicker-picker  .datepicker table tr td.active.active:hover, .timepicker-picker  .datepicker table tr td.active.active, .datepicker table tr td.active.highlighted.active, .datepicker table tr td.active.highlighted:active, .datepicker table tr td.active:active {
     background: #4698e3 !important;
    color: #fff !important;
    border-color: #4698e3 !important;
}

.timepicker-picker .btn, .btn.btn-default {
    background: #4698e3;
    color: #fff;
}

@media only screen and (max-width: 1280px) {

    .main-tab .nav>li>a {
        font-size: 12px !important;
        padding: 7px 9px !important;
    }
}

#overlay {
    background: #00000085;
    color: #666666;
    position: fixed;
    height: 100%;
    width: 100%;
    z-index: 99999;
    top: 0;
    left: 0;
    float: left;
    text-align: center;
    padding-top: 25%;
    display: none;
    /* opacity: 0.4; */
}

.loader {
    margin-top: 0;
    margin-left: 666px;
    z-index: 9999999999;
    border: 16px solid #d2d2d2;
    border-radius: 50%;
    border-top: 16px solid #150aec;
    width: 85px;
    height: 85px;
    -webkit-animation: spin 2s linear infinite; /* Safari */
    animation: spin 2s linear infinite;
    position: absolute;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


.modal {
    z-index: 9999;
}

.vital-sign th {
    font-size: 13px;
}

.select2-container {
    z-index: 99999;
    width: 100% !important;
}

.select2-dropdown {
    z-index: 99999;
}

.canvasjs-chart-credit {
    display: none;
}

.scroll-responsive {
    overflow-x: scroll;
    display: block;
}

.chart-box {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0px 7px 9px -2px #d4d4d4;
    padding: 15px;
    margin: 20px 0px;
}

.chart-box span {
    color: #1e12c9;
    padding-bottom: 10px;
    border-bottom: 1px solid #ccc;
    font-size: 14px;
    font-weight: 500;
}

.pl-30 {
    padding-left: 30px;
}

.pr-30 {
    padding-right: 30px;
}

.nav>li>a {
    padding: 7px 12px;
}

/***Chart-CSS**/
.overflow-hidden {
    overflow: hidden !important;
}

.card-box {
    position: relative;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(107, 122, 144, 0.3);
    border-radius: 4px;
    margin-bottom: 20px;
    width: 100%;
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 10px;
    position: relative;
}

.d-flex {
    display: flex !important;
}

.mb-1,
.my-1 {
    margin-bottom: 0.25rem !important;
}

.fs-2 {
    font-size: 18px;
    margin-bottom: 5px;
    color: #150aec;
}

.text-muted {
    color: #9aa0ac !important;
}

.card-body> :last-child {
    margin-bottom: 0;
}

.h-8 {
    height: 70px !important;
}

.chartjs-render-monitor {
    -webkit-animation: chartjs-render-animation 0.001s;
    animation: chartjs-render-animation 0.001s;
}

.profile-box {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 10px;
    margin: 15px;
}

/* .profile img {
    width: 80px;
    height: 80px;
    } */
.text-profile span {
    font-size: 15px;
    color: #528BE8;
    margin-left: 10px;
}

.profile-box h3 {
    margin-left: 10px;
}

.text-profile label {
    /* color: #000; */
    font-size: 15px;
    margin-left: 10px;
}

.mt-15 {
    margin-top: 15px;
}

.appointment-box {
    background: #fff;
    padding: 15px;
    border: 1px solid #ccc;
}

.image-upload>input {
    display: none;
}

.modal-dialog {
    width: 1260px;
}

.modal-body {
    height: 450px;
    max-height: 800px;
    overflow-y: auto;
    min-height: 500px;
}

.text-center {
    text-align: center !important;
}

datalist {
    width: 100%;
}

.dis-flex {
    display: flex;
}

.jusify-space {
    justify-content: space-between;
}

.check-details-normal {
    color: #1ba526;
    font-size: 13px;
    position: relative;
    top: 9px;
}

.check-details-high {
    color: #ef0000;
    font-size: 13px;
    position: relative;
    top: 9px;
}

.check-details-low {
    color: #5686e7;
    font-size: 13px;
    position: relative;
    top: 9px;
}

/* Autocomplete For Loinc Code */
.autocomplete-items {
    position: absolute;
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 100000;
    top: 92%;
    left: 0;
    right: 0;
    margin-left: 6px;
    width: 97.5%;
    color: #421de8;
    /*height: 300px;*/
    overflow-y: auto;
}

.autocomplete-items div {
    padding: 10px;
    cursor: pointer;
    background-color: #fff;
    border-bottom: 1px solid #d4d4d4;
}

.autocomplete-active {
    background-color: #150aec !important;
    color: #ffffff;
}

.autocomplete-items div:hover {
    background-color: #e9e9e9 !important;
}

.profile img {
    width: 100%;
}

@media only screen and (max-width:1390px) {
    .nav>li>a {
        padding: 10px 5px;
    }

    .profile img {
        width: 100%;
        margin-top: 10px;
    }

    /* .nav-tabs>li {
    max-width: 185px;
    word-break: break-all;
    } */
}

.bottom-top {
    position: relative;
    width: 100%;
    display: inline-table;
    margin-top: 90px;
    left: 0px;
    bottom: 0;
}

/*.add-box {
    display: none;
    }*/
.table-box {
    display: none;
}

.right-pull {
    float: right;
    position: relative;
    bottom: 27px;
    padding-left: 50px;
    padding-right: 10px;
}

.right-pull i {
    font-size: 25px;
    color: #2116ed;
    position: absolute;
    right: 4px;
}

.w-66 {
    width: 100%;
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

.w-33 {
    width: 33.33333333%;
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

.dis-inline-flex {
    display: inline-flex;
    width: 100%;
}

.panel-group a:hover,
a:focus {
    color: #150aec;
}

/*  #get_scheduleappointment p {
    color: #150aec;
    }*/
.color-blue a {
    color: #528be7 !important;
}

.color-blue>li.active>a {
    border-bottom: 3px solid #528be7 !important;
}

.color-blue>li.active>a,
.color-blue>li.active>a:hover,
.color-blue>li.active>a:focus {
    border-bottom: 3px solid #528be7 !important;
    color: #528be7 !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #5785e8 !important;
}

.select2-container--default .select2-selection--single {
    border: 1px solid #e1e1e1 !important;
}

.form-control,
input[type=file],
.appointment-box h4,
.blue-color,
.file-drop-zone-title {
    color: #5785e8;
}

.select2-results__option[aria-selected] {
    color: #5785e8;
}

@media print {
    .print_table table {
        page-break-after: auto
    }

    .print_table tr {
        page-break-inside: avoid;
        page-break-after: auto
    }

    .print_table td {
        page-break-inside: avoid;
        page-break-after: auto
    }

    .print_table thead {
        display: table-header-group
    }

    .print_table tfoot {
        display: table-footer-group
    }
}
</style>
<div class="col-lg-12">
    <section class="box nobox marginBottom0">
        <div class="content-body">
            <div class="clearfix"></div>
            <div class="col-lg-12 p-0">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- <div style="position:relative;bottom:5px;"> <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search" aria-hidden="true"  style="margin-left: 1px;position: relative;left:24px;top:28px;"></span>
                            <input list="searchbar" name="searchbar" style="padding-left: 3em; width: 100%; height: 100%; border: 1px solid #ccc;margin-left: 15px;" class="form-control flexdatalist" placeholder="Search Patients..." >
                            <datalist id="searchbar" style="height: 34px;width: 800px;">
                            <option value="Michael Cassano">
                                <option value="Janet Martinez">
                                    <option value="Linda Guillen">
                                        <option value="Steven Cornwell">
                                            <option value="John Wade">
                                                </datalist>
                                            </div> -->
                        <div class="autocomplete" style="position:relative;bottom:5px;">
                            <span id="searchButtonShow" class="text-primary hover icon-md fa fa-search"
                                aria-hidden="true"
                                style="margin-left: 1px;position: relative;left:24px;top:28px;"></span>
                            <input id="search-patient" type="text" name="search_patient_name"
                                placeholder="Search Patient..."
                                style="padding-left: 3em; width: 100%; height: 100%; border: 1px solid #ccc;margin-left: 15px;"
                                class="form-control flexdatalist search_patient_name" placeholder="Search Patients..."
                                onkeyup="return get_patient_autocomplete()" autocomplete="off">
                            <div id='search-patientautocomplete-list' class='autocomplete_items white-box'
                                style="display: none;margin-left: 25px;"></div>
                        </div>
                        <div class="Patient_errormsg"> </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mt-15">
                            <a href="<?php echo base_url().'dashboard_doctor/health_record/health_report/all_patient' ?>">
                                <button type="button" class="btn btn-default w-100">All Patients </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mt-15" style="position: relative;right:15px;">
                            <button type="button" class="btn btn-default mr-15  w-100 addhospital_record"
                                onclick="check_patient();">Add Health Record </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-0 main-tab">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
                    <li><a data-toggle="tab" href="#vital-sign">Vital Sign</a></li>
                    <li><a data-toggle="tab" href="#problem-allergies-list">Allergies List</a></li>
                    <li><a data-toggle="tab" href="#lab-result">Lab Result</a></li>
                    <li><a data-toggle="tab" href="#imaging-order">Imaging Order</a></li>
                    <li><a data-toggle="tab" href="#e-prescription-medication">E-prescription/Medication</a></li>
                    <li><a data-toggle="tab" href="#immunization">Immunizations</a></li>
                    <li><a data-toggle="tab" href="#summary">Summary</a></li>
                    <li><a data-toggle="tab" href="#document">Document</a></li>
                    <li><a data-toggle="tab" href="#add-health-record">Health Record</a></li>
                </ul>
                <div class="right-pull" id="icon-bell">
                    <a> <i class="fa fa-bell"></i></a>
                </div>
            </div>
            <div class="dis-inline-flex">

                <div class="w-66" id="menu" style="overflow-x: auto;">
                    <div class="tab-content">
                        <div id="profile" class="tab-pane fade in active">
                            <section class="patient_profile">

                        </div>
                        <div id="vital-sign" class="tab-pane fade">

                            <section>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="delete_errormsg" style="visibility:hidden;"></div>
                                        <table class="table" style="overflow-x: auto;display: block;">
                                            <thead class="vital-sign" style="border-top:1px solid #ddd ;">
                                                <th>Temprature</th>
                                                <th>Heart Rate/ <br> Pulse</th>
                                                <th>Blood <br> Pressure</th>
                                                <th>Respiratory<br> Rate</th>
                                                <th>Oxygen <br> Saturation</th>
                                                <th>Height</th>
                                                <th>Weight</th>
                                                <th>BMI</th>
                                                <th>Pain</th>
                                                <th>Smoking <br> Status</th>
                                                <th>Head <br> Circumference</th>
                                                <th>Glucose <br>by <br> Glucometer</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody id="vital_sign">
                                            </tbody>
                                        </table>
                                    </div>
                            </section>
                        </div>
                        <div id="problem-allergies-list" class="tab-pane fade">
                            <section>
                                <div class="row">
                                    <div class="col-lg-12 p-r-l-30">
                                        <nav>
                                            <ul class="nav nav-tabs tab-list color-blue">
                                                <li class="active"><a data-toggle="tab" href="#problem-list-tab">Problem
                                                        List</a></li>
                                                <li><a data-toggle="tab" href="#allergy-list-tab">Allergy List</a></li>
                                            </ul>
                                        </nav>
                                        <div class="tab-content">
                                            <div id="problem-list-tab" class="tab-pane fade in active">
                                                <div style="padding: 10px;">
                                                    <div class="delete_errormsg" style="visibility:hidden;"></div>
                                                    <table class="table">
                                                        <thead style="border-top:1px solid #ddd ;">
                                                            <th>Problem</th>
                                                            <th>Code System</th>
                                                            <th>ICD-CM Code</th>
                                                            <th>SNOMED</th>
                                                            <th>Date Diagnosed</th>
                                                            <th>Date Changed</th>
                                                            <th>Status</th>
                                                            <th>Notes</th>
                                                            <th>Created Date</th>
                                                            <th>Action</th>
                                                        </thead>
                                                        <tbody id="problem_t">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="allergy-list-tab" class="tab-pane fade in">
                                                <div style="padding: 10px;">
                                                    <div class="delete_errormsg" style="visibility:hidden;"></div>
                                                    <table class="table">
                                                        <thead style="border-top:1px solid #ddd ;">
                                                            <th>Allergy</th>
                                                            <th>Reaction</th>
                                                            <th>Severity</th>
                                                            <th>Status</th>
                                                            <th>Notes</th>
                                                            <th>Created Date</th>
                                                            <th>Action</th>
                                                        </thead>
                                                        <tbody id="allery">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div id="lab-result" class="tab-pane fade">
                            <section>
                                <div class="row mt-15">
                                    <div class="col-lg-12 p-r-l-30">
                                        <div class="delete_errormsg" style="visibility:hidden;"></div>
                                        <table class="table">
                                            <thead style="border-top:1px solid #ddd ;">
                                                <th>LOINC Code</th>
                                                <th>Description</th>
                                                <th>Result Value</th>
                                                <th>Units</th>
                                                <th>Normal Range</th>
                                                <th>Abnormal Flag</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody id="lab_result">
                                            </tbody>
                                        </table>
                                    </div>
                            </section>
                        </div>
                        <div id="imaging-order" class="tab-pane fade">
                            <section>
                                <div class="row mt-15">
                                    <div class="col-lg-12 p-r-l-30">
                                        <div class="delete_errormsg" style="visibility:hidden;"></div>
                                        <table class="table">
                                            <thead style="border-top:1px solid #ddd ;">
                                                <!-- <th>Ordering Dr.</th> -->
                                                <th>Description</th>
                                                <th>CPT Code</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>File</th>
                                                <th width="30%">Comments</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody id="imaging_order">
                                            </tbody>
                                        </table>
                                    </div>
                            </section>
                        </div>
                        <div id="e-prescription-medication" class="tab-pane fade">
                            <section>
                                <div class="row mt-15">
                                    <div class="col-lg-12 p-r-l-30">
                                        <div class="delete_errormsg" style="visibility:hidden;"></div>
                                        <table class="table">
                                            <thead style="border-top:1px solid #ddd ;">
                                                <th>Drug Name</th>
                                                <th>Rxnorm</th>
                                                <th>Dispense</th>
                                                <th>Refills</th>
                                                <th>SIG</th>
                                                <th>Order Status</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody id="eprescription">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div id="immunization" class="tab-pane fade">
                            <section>
                                <div class="row">
                                    <div class="col-lg-12 p-r-l-30">
                                        <nav>
                                            <ul class="nav nav-tabs tab-list  color-blue">
                                                <li class="active"><a data-toggle="tab" href="#select-vaccines">Step-1:
                                                        Select
                                                        Vaccines</a>
                                                </li>
                                                <li><a data-toggle="tab" href="#review-and-sign">Step-2: Review and
                                                        Sign</a></li>
                                                <li><a data-toggle="tab" href="#record-vaccinations">Step-3: Record
                                                        Vaccinations</a></li>
                                            </ul>
                                        </nav>
                                        <div class="tab-content">
                                            <div id="select-vaccines" class="tab-pane fade in active">
                                                <div class="delete_errormsg" style="visibility:hidden;"></div>
                                                <form>
                                                    <div class="row p-15">
                                                        <div class="col-12 col-md-4 form-group">
                                                            <select class="form-control" id="Tabselect-vaccination">
                                                                <option value="">Select Vaccines</option>
                                                                <option value="birth">Birth - Year</option>
                                                                <option value="year">2-18 Years</option>
                                                                <option value="adult">Adult</option>
                                                                <option value="other">Other </option>
                                                            </select>
                                                        </div>
                                                        <div class="select-vaccines">
                                                            <div class="col-12 ">

                                                                <table class="table">
                                                                    <thead style="border-top:1px solid #ddd ;">
                                                                        <th>Schedule</th>
                                                                        <th>Vaccine</th>
                                                                        <th>CVX Code</th>
                                                                        <th>Consent form</th>
                                                                        <th>VIS</th>
                                                                        <th>Administered On</th>
                                                                        <th>Administered By</th>
                                                                        <th>Status</th>
                                                                        <th>Created Date</th>
                                                                        <th class="text-center">Action</th>
                                                                    </thead>
                                                                    <tbody class="immunizations_tbdata">
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            </form>
                                            <div id="review-and-sign" class="tab-pane fade in">
                                                <div class="delete_errormsg" style="visibility:hidden;"></div>
                                                <table class="table">
                                                    <thead style="border-top:1px solid #ddd ;">
                                                        <th>Information Statements</th>
                                                        <th>Created Date</th>
                                                        <th width="3%">Action</th>
                                                    </thead>
                                                    <tbody id="review_sign">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="record-vaccinations" class="tab-pane fade in print_table">
                                                <div class="delete_errormsg" style="visibility:hidden;"></div>
                                                <div style="padding: 10px;">

                                                    <table class="table" id="widthpdf"
                                                        style="display: block;overflow-x: auto;white-space: nowrap;">
                                                        <thead style="border-top:1px solid #ddd ;">
                                                            <th width="10%">Consent <br> Form</th>
                                                            <th width="10%">Create
                                                                <br>record for
                                                            </th>
                                                            <th width="5%">CVX Code</th>
                                                            <th width="5%">Name</th>
                                                            <th width="15%">CPT Code</th>
                                                            <th width="10%">Manufa <br> cturer</th>
                                                            <th width="10%">LOT <br> Number</th>
                                                            <th width="10%">LOT <br> Expiration Date</th>
                                                            <th width="5%">Administered <br> Amount</th>
                                                            <th width="5%">Administered <br> Units</th>
                                                            <th width="10%">Vaccine <br> Route</th>
                                                            <th width="10%">Vaccine <br> Site</th>
                                                            <th width="10%">Vaccination <br> Status</th>
                                                            <th width="10%">Administered <br> On</th>
                                                            <th width="10%">Ordering <br> Doctor</th>
                                                            <th width="10%">Administered <br> By</th>
                                                            <th width="10%">Administered At</th>
                                                            <th width="10%">Vaccination <br> Inventory <br> LOT</th>
                                                            <th width="10%">Record Type</th>
                                                            <th width="10%">Funding <br> Eligibility</th>
                                                            <th width="10%">Observed <br> Immunity</th>
                                                            <th width="5%">Notes</th>
                                                            <th>Created Date</th>
                                                            <th width="5%">Action</th>
                                                        </thead>
                                                        <tbody id="get_record_vaccination">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div id="summary" class="tab-pane fade">
                            <section class="mt-20">
                                <div style="padding: 10px;">
                                    <div class="delete_errormsg" style="visibility:hidden;"></div>
                                    <table class="table">
                                        <thead style="border-top:1px solid #ddd ;">
                                            <th>Summary</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody id="get_summary">
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                        <div id="document" class="tab-pane fade">
                            <section class="mt-20">
                                <div class="row">
                                    <div class="col-lg-12 p-r-l-30">
                                        <nav>
                                            <ul class="nav nav-tabs tab-list color-blue">
                                                <li class="active"><a data-toggle="tab"
                                                        href="#uploaded-document">Uploaded Documents</a>
                                                </li>
                                                <li><a data-toggle="tab" href="#locked-clinical-notes">Locked Clinical
                                                        Notes</a></li>
                                                <li><a data-toggle="tab" href="#signed-consent-forms">Singed Consent
                                                        Forms</a></li>
                                                <!-- <li><a data-toggle="tab" href="#outbound-referrals">Outbound Referrals</a></li> -->
                                                <li><a data-toggle="tab" href="#doc-lab-result">Lab Result</a></li>
                                                <li><a data-toggle="tab" href="#amendments">Amendments</a></li>
                                            </ul>
                                        </nav>
                                        <div class="tab-content">
                                            <div id="uploaded-document" class="tab-pane fade in active">
                                                <!-- <div class="mt-15 mb-15">
                                                                                <input type="file" id="real-file" style="display: none;" multiple />
                                                                                <button type="button" class="btn btn-default" id="custom-button">CHOOSE A FILE</button>
                                                                                <span id="custom-text">No file chosen, yet.</span>
                                                                            </div> -->
                                                <div class="delete_errormsg" style="visibility:hidden;"></div>
                                                <table class="table mt-15">
                                                    <thead style="border-top:1px solid #ddd ;">
                                                        <th>Upload Documents</th>
                                                        <th> Document type</th>
                                                        <th>Created Date</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody id="get_document">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="locked-clinical-notes" class="tab-pane fade in">
                                                <div class="delete_errormsg" style="visibility:hidden;"></div>
                                                <table class="table mt-15">
                                                    <thead style="border-top:1px solid #ddd ;">
                                                        <th>Date of Service</th>
                                                        <th>Reason</th>
                                                        <th>Locked By</th>
                                                        <th>Locked On</th>
                                                        <th>Created Date</th>
                                                        <th>Actions</th>
                                                    </thead>
                                                    <tbody id="locked_clinical_notes">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="signed-consent-forms" class="tab-pane fade in">
                                                <div class="delete_errormsg" style="visibility:hidden;"></div>
                                                <table class="table mt-15">
                                                    <thead style="border-top:1px solid #ddd ;">
                                                        <th>Consent Form</th>
                                                        <th>Date of Appointment </th>
                                                        <th>Date of Signature</th>
                                                        <th>Created Date</th>
                                                        <th>Actions</th>
                                                    </thead>
                                                    <tbody id="signed_consent_forms">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="doc-lab-result" class="tab-pane fade in">
                                                <div class="delete_errormsg" style="visibility:hidden;"></div>
                                                <table class="table mt-15">
                                                    <thead style="border-top:1px solid #ddd ;">
                                                        <th>Lab</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                        <th>Abnormal?</th>
                                                        <th>Result Count</th>
                                                        <th>Test</th>
                                                        <th>Created Date</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody id="doc_lab_result">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="amendments" class="tab-pane fade in">
                                                <div class="delete_errormsg" style="visibility:hidden;"></div>
                                                <table class="table mt-15">
                                                    <thead style="border-top:1px solid #ddd ;">
                                                        <!-- <th>Amendments Documents</th> -->
                                                        <th>Amendments Source</th>
                                                        <th>Status</th>
                                                        <th>Request Date</th>
                                                        <th>Processed Date</th>
                                                        <th>Created Date</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody id="amendments_list">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div id="add-health-record" class="tab-pane fade">
                            <section class="mt-20">
                                <div class="row">
                                    <div class="col-lg-12 p-r-l-30">
                                        <div class="delete_errormsg" style="visibility:hidden;"></div>
                                        <table class="table">
                                            <thead style="border-top:1px solid #ddd ;">
                                                <!-- <th>Doctor Name</th> -->
                                                <th>Date & Time</th>
                                                <th>Patient Name</th>
                                                <th>Updated By</th>
                                                <th>Created Date</th>
                                                <th></th>
                                            </thead>
                                            <tbody id="healthreport">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="w-33" id="notification" style="padding-right:40px;">
                    <section class="nobox marginBottom0" id="notification">
                        <div class="row mt-15">
                            <div class="col-12 col-md-12">
                                <div class="appointment-box" style=" border-top:2px solid #150aec;">
                                    <h4><b>Scheduled Appointment</b></h4>
                                    <div id="get_scheduleappointment"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-12 col-md-12">
                                <div class="appointment-box">
                                    <h4><b>Medications</b></h4>
                                    <div id="get_medications"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-12 col-md-12">
                                <div class="appointment-box">
                                    <h4><b>Issues</b></h4>
                                    <div id="issue"></div>
                                    <!-- <p>Allergic Rhinitis <label>(Jul 7,2011)</label></p> -->
                                </div>
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-12 col-md-12">
                                <div class="appointment-box">
                                    <div class="row">
                                        <div class="col-12 col-md-10">
                                            <h4><b>Latest Documents</b></h4>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="image-upload">
                                                <!-- <label for="file-input">
                                                                                <img style="width: 50%;" src="<?php //echo base_url() ?>assets/images/health_report/add.png" />
                                                                            </label> -->
                                                <!-- <input id="file-input" type="file" /> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div id="latest_upload"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-12 col-md-12">
                                <div class="appointment-box">
                                    <h4><b>Immunizations</b></h4>
                                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.
                                                                </p> -->
                                    <div id="immunizations"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
    </section>
</div>
<div id="overlay">
    <div class="loader"></div><br />
    Loading...
</div>
<div class="modal fade" id="hospital-record" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Health Record </h4>
            </div>
            <div class="modal-body">
                <div class="alert-messge" style="visibility:hidden;"></div>
                <div class="alert-errormessge"></div>
                <div class="Patient_errormsg"> </div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#add-vital-signs">Vital Sign</a></li>
                    <li><a data-toggle="tab" href="#add-problem-allergy-list">Allergies List</a></li>
                    <li><a data-toggle="tab" href="#add-lab-result">Lab Result</a></li>
                    <li><a data-toggle="tab" href="#add-imaging-order">Imaging Order</a></li>
                    <li><a data-toggle="tab" href="#add-e-prescription-medication">E-prescription Medication</a></li>
                    <li><a data-toggle="tab" href="#add-immunizations">Immunizations</a></li>
                    <li><a data-toggle="tab" href="#add-summary">Summary</a></li>
                    <li class="health_document"><a data-toggle="tab" href="#add-document" class="health_documents">Document</a></li>
                    <li class="health_record"><a data-toggle="tab" href="#add-record" class="health_records">Health Record</a></li>
                </ul>
                <div class="tab-content">
                    <div id="add-vital-signs" class="tab-pane fade in active">
                        <form method="POST">
                            <div class="row">
                                <div class="col-12 col-md-4 form-group">
                                    <label>TEMPERATURE(°F)<span style="color:red;font-size:15px;font-weight:bold;">*</span></label>
                                    <input type="number" name="temp" min="1" value="" class="form-control text-field"
                                        id="temp" placeholder="Temperature">
                                    <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                        id="patient_ID" />
                                    <span class="Temperature_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>Bloodtype<span style="color:red;font-size:15px;font-weight:bold;">*</span></label>
                                    <select name="bloodtype" class="form-control select2 text-field  bloodtype"
                                        id="bloodtype">
                                        <option value="A-positive">A-positive</option>
                                        <option value="A-negative">A-negative</option>
                                        <option value="B-positive">B-positive</option>
                                        <option value="B-negative">B-negative</option>
                                        <option value="AB-positive">AB-positive</option>
                                        <option value="AB-negative">AB-negative</option>
                                        <option value="O-positive">O-positive</option>
                                        <option value="O-negative">O-negative</option>
                                    </select>
                                    <span class="Bloodtype_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>HEART RATE/PLUSE (bpm)<span style="color:red;font-size:15px;font-weight:bold;">*</span></label>
                                    <input type="number" name="heart-rate" min="1" value=""
                                        class="form-control text-field" id="heart-rate" placeholder="Heart Rate/Pulse">
                                    <span class="Heartrate_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>BLOOD PRESSURE (mmHg)<span style="color:red;font-size:15px;font-weight:bold;">*</span></label>
                                    <input type="number" name="blood-presure" min="1" value=""
                                        class="form-control text-field" id="blood-presure" placeholder="Blood Presure">
                                    <span class="Bloodpresure_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>RESPIRATORY RATE (rpm)<span style="color:red;font-size:15px;font-weight:bold;">*</span></label>
                                    <input type="text" name="respiratory-rate" value="" class="form-control text-field"
                                        id="respiratory-rate" placeholder="Respiratory rate"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                    <span class="Respiratoryrate_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>OXYGEN SATURATION (%)<span style="color:red;font-size:15px;font-weight:bold;">*</span></label>
                                    <input type="text" name="oxygen-saturation" value="" class="form-control text-field"
                                        id="oxygen-saturation" placeholder="Oxygen Saturation"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                    <span class="Oxygensaturation_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>HEIGHT (in)<span style="color:red;font-size:15px;font-weight:bold;">*</span></label>
                                    <input type="number" name="height" value="" min="1" class="form-control text-field"
                                        id="height"  placeholder="Height" onkeyup="return calculate_bmi();" onchange="return calculate_bmi();">
                                    <span class="Height_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>WEIGHT (lbs)<span style="color:red;font-size:15px;font-weight:bold;">*</span></label>
                                    <input type="number" name="weight" value="" min="1" class="form-control text-field"
                                        id="weight" placeholder="Weight" onkeyup="return calculate_bmi()" onchange="return calculate_bmi();">
                                    <span class="Weight_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>BMI (kg/m2)<span style="color:red;font-size:15px;font-weight:bold;">*</span></label>
                                    <input type="text" name="bmi" value="" class="form-control text-field" id="bmi"
                                        placeholder="BMI" onkeyup="return allowed_alphanumeric(this.value,this.id);" disabled="disabled">
                                    <span class="BMI_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>PAIN (1-10)<span style="color:red;font-size:15px;font-weight:bold;">*</span></label>
                                    <input type="number" name="pain" value="" min="1" max="10"
                                        class="form-control text-field" id="pain" placeholder="Pain">
                                    <span class="Pain_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>SMOKING STATUS</label>
                                    <!-- <input type="text" name="smoking" value="" class="form-control text-field" id="smoking" placeholder="Smoking Status"> -->
                                    <select name="smoking" id="smoking" class="form-control text-field">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <span class="Smoking_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>HEAD CIRCUMFERENCE<span style="color:red;font-size:15px;font-weight:bold;">*</span></label>
                                    <input type="text" name="head-circumfernce" value="" class="form-control text-field"
                                        id="head-circumfernce" placeholder="Head Circumference"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                    <span class="Head_circumference_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>BLOOD SUGAR/BLOOD GLUCOSE<span style="color:red;font-size:15px;font-weight:bold;">*</span></label>
                                    <input type="text" name="glucose-glucometer" value=""
                                        class="form-control text-field" id="glucose-glucometer"
                                        placeholder="BLOOD SUGAR/BLOOD GLUCOSE"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                    <span class="Glucose_by_glucometer_errormsg" style="color:red"></span>
                                </div>

                            </div>
                            <div class="modal-footer text-center bottom-top">
                                <button type="button" class="btn btn-default changetabbutton"
                                    onclick="//return save_vitalsing()">Next</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
                <div id="add-problem-allergy-list" class="tab-pane fade">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                                        Problem List</a>
                                </h4>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse in">
                                <form method="POST">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-12 col-md-6 form-group">
                                                <label>PROBLEM</label>
                                                <div class="autocomplete_problem">
                                                    <input id="select_problem" autocomplete="off" type="text"
                                                        name="problem" placeholder="Search Problem"
                                                        class="form-control text-field"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id),get_problem_healthreport();">
                                                        <img style="float:right;display:none;position:absolute;left: 455px; top: -55px; height: 206px; width: 206px;" id='loading' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                                </div>

                                                <input type="hidden" name="patient_ID"
                                                    class="form-control text-field patient_ID" id="patient_ID" />
                                                <span class="Problem_errormsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-3 form-group">
                                                <label>ICD VERSION</label>
                                                <div class="autocomplete_icdversion">
                                                    <input id="icdversion" type="text" autocomplete="off"
                                                        name="icdversion" placeholder="Search ICD version"
                                                        class="form-control text-field"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id),get_icdversion_healthreport();">
                                                        <img style="float:right;display:none;position:absolute;left: 155px; top: -55px; height: 206px; width: 206px;" id='loadingicdversion' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                                </div>

                                                <span class="Icdversion_errormsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-3 form-group">
                                                <label>ICD10 CODE</label>
                                                <input type="text" name="icd10-code" value=""
                                                    class="form-control text-field" id="icd10_code"
                                                    onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                                    placeholder="ICD10 Code">
                                                <span class="Icd10code_errormsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>SNOMED CT CODE</label>
                                                <input type="text" name="snomed-ct-code" value=""
                                                    class="form-control text-field"
                                                    onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                                    id="snomed_ct_code" placeholder="SnoMED CT Code">
                                                <span class="Snomedctcode_errormsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="problem_status" id="problem_status"
                                                    placeholder="Status">
                                                    <option value="">Select Status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                    <option value="resolved">Resolved</option>
                                                </select>
                                                <span class="Problemstatus_errormsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-4 ">
                                                <div class="form-group">
                                                    <label>DATETIME DIAGNOSIS</label>
                                                    <div class='input-group date'>
                                                       <input type="text" class="form-control add_health_record_datetime" id="diagnosis_datetime"  name="diagnosis_datetime">
                                                       <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                       </span>
                                                    </div>
                                                </div>
                                                <span class="Diagnosisdatetime_errormsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-4 pl-0">
                                                <div class="form-group">
                                                    <label>DATETIME ONSET</label>
                                                    <div class='input-group date'>
                                                       <input type="text" class="form-control add_health_record_datetime" id="onset_datetime"  name="onset_datetime">
                                                       <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                       </span>
                                                    </div>
                                                </div>
                                                <span class="Onsetdatetime_errormsg" style="color:red"></span>
                                            </div>

                                            <div class="col-12 col-md-4 ">
                                                <div class="form-group">
                                                    <label>DATETIME CHANNGED</label>
                                                    <div class='input-group date'>
                                                       <input type="text" class="form-control add_health_record_datetime" id="channged_datetime" name="channged_datetime">
                                                       <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                       </span>
                                                    </div>
                                                </div>
                                                <span class="Channgeddatetime_errormsg" style="color:red"></span>
                                            </div>

                                            <div class="col-12 form-group">
                                                <label>NOTES</label>
                                                <textarea class="w-100" id="problem_notes" name="notes" rows="5"
                                                    placeholder="Notes"></textarea>
                                                <span class="notes_errormsg" style="color:red"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center bottom-top">
                                        <button type="button" class="btn btn-default openaccordian"
                                            onclick="//return save_problemlist();">Next</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                                        Allergy List</a>
                                </h4>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse">
                                <form method="POST">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-12 col-md-6 form-group">
                                                <label>ALLERGY TYPE</label>
                                                <select class="form-control select2" name="allergy" id="allergy_type"
                                                    placeholder="Allergy">
                                                    <option selected="" value="">Select ALLERGY TYPE</option>
                                                    <option value="blank">---------</option>
                                                    <option value="specificdrug">Specific Drug allergy</option>
                                                    <option value="drugclass">Drug Class allergy</option>
                                                    <option value="nondrug">Non-Drug allergy</option>
                                                    <option value="nkda">No Known Drug Allergies (NKDA)</option>
                                                </select>
                                                <input type="hidden" name="patient_ID"
                                                    class="form-control text-field patient_ID" id="patient_ID" />
                                                <span class="Allergytype_errormsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-6 form-group">
                                                <label>DRUG ALLERGY</label>
                                                <div class="autocomplete_drugallergy">
                                                    <input id="drug-allergy" type="text" name="drug_allergy"
                                                        placeholder="Search Drug Allergy" autocomplete="off"
                                                        class="form-control text-field"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id),get_suballergy_healthreports()">
                                                        <img style="float:right;display:none;position:absolute;left: 455px; top: -55px; height: 206px; width: 206px;" id='loadingdrugallergy' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                                </div>
                                                <span class="Drugallergy_errormsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>REACTION</label>
                                                <select class="form-control reaction select2" name="reaction"
                                                    id="reaction" placeholder="Reaction">
                                                    <option selected="" value="">Select REACTION</option>
                                                    <option value="Acute kidney failure">Acute kidney failure</option>
                                                    <option value="Anaphylaxis">Anaphylaxis</option>
                                                    <option value="Arthralgia">Arthralgia</option>
                                                    <option value="Chills">Chills</option>
                                                    <option value="Cough">Cough</option>
                                                    <option value="Fever">Fever</option>
                                                    <option value="Headache">Headache</option>
                                                    <option value="Hives">Hives</option>
                                                    <option value="Malaise/fatigue">Malaise/fatigue</option>
                                                    <option value="Myalgia">Myalgia</option>
                                                    <option value="Nasal congestion">Nasal congestion</option>
                                                    <option value="Nausea">Nausea</option>
                                                    <option value="Pain/soreness at injection site">Pain/soreness at
                                                        injection site</option>
                                                    <option value="Rash">Rash</option>
                                                    <option value="Respiratory distress">Respiratory distress</option>
                                                    <option value="Rhinorrhea">Rhinorrhea</option>
                                                    <option value="Shortness of breath/difficulty breathing">Shortness
                                                        of breath/difficulty breathing</option>
                                                    <option value="Sore throat">Sore throat</option>
                                                    <option value="Swelling">Swelling</option>
                                                </select>
                                                <span class="Reaction_errormsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>SEVERITY</label>
                                                <select class="form-control select2" name="severity" id="severity"
                                                    placeholder="Severity">
                                                    <option value="" selected="">SEVERITY</option>
                                                    <option value="Fatal">Fatal</option>
                                                    <option value="Severe">Severe</option>
                                                    <option value="Moderate to severe">Moderate to severe</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Mild to moderate">Mild to moderate</option>
                                                    <option value="Mild">Mild</option>
                                                    <option value="Unknown">Unknown</option>
                                                </select>
                                                <span class="Severity_errormsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="allergy_status" id="allergy_status"
                                                    placeholder="Status">
                                                    <option value="" slected="slected">Select Status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                                <span class="Allergystatus_errormsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 form-group">
                                                <label>NOTES</label>
                                                <textarea class="w-100" id="allergy_notes" name="notes" rows="5"
                                                    placeholder="Notes"></textarea>
                                                <span class="notes_errormsg" style="color:red"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center bottom-top">
                                        <button type="button" class="btn btn-default changetabbutton"
                                            onclick="//return save_allergylist();">Next</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="add-lab-result" class="tab-pane fade">
                    <form method="POST">
                        <div class="row">
                            <div class="col-12 col-md-4 form-group">
                                <label>LOINC CODE</label>
                                <div class="autocomplete_loinccode">
                                    <input id="loinc_code" type="text" name="loinc_code" placeholder="Search Loinc Code"
                                        class="form-control text-field"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id),get_loiniccode();">
                                        <img style="float:right;display:none;position:absolute;left: 281px; top: -55px; height: 206px; width: 206px;" id='loadingloinc' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                </div>
                                <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                    id="patient_ID" />
                                <span class="Loniccode_errormsg" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <label>LAB DIAGNOSTIC</label>
                                <textarea class="w-100" id="discription" name="discription" rows="5"
                                    placeholder="LAB DIAGNOSTIC"></textarea>
                                <span class="Discription_errormsg" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <label>RESULT VALUE</label>
                                <input type="text" name="result-value" value="" class="form-control text-field"
                                    id="result_value" placeholder="Result value"
                                    onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                <span class="Resultvalue_errormsg" style="color:red"></span>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label>UNITS</label>
                                <input type="text" name="units" value="" class="form-control text-field" id="units"
                                    placeholder="Units" onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                <span class="Units_errormsg" style="color:red"></span>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label>NORMAL RANGE</label>
                                <input type="text" name="normal-range" value="" class="form-control text-field"
                                    id="normal_range" placeholder="NORMAL RANGE"
                                    onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                <span class="Normalrange_errormsg" style="color:red"></span>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label>ABNORMAL FLAG</label>
                                <select class="form-control select2" name="cvx-code" id="abnormal_flag" placeholder="CVX-Code">
                                    <option value="">Select ABNORMAL FLAG</option>
                                    <option value="L -- Below low normal">L -- Below low normal</option>
                                    <option value="H -- Above high normal">H -- Above high normal</option>
                                    <option value="LL -- Below lower panic limits">LL -- Below lower panic limits</option>
                                    <option value="HH -- Above upper panic limits">HH -- Above upper panic limits</option>
                                    <option value="-- Below absolute low-off instrument scale"> -- Below absolute low-off instrument scale</option>
                                    <option value="-- Above absolute high-off instrument scale"> -- Above absolute high-off instrument scale</option>
                                    <option value="N -- Normal (applies to non-numeric results)">N -- Normal (applies to non-numeric results)</option>
                                    <option value="A -- Abnormal (applies to non-numeric results)">A -- Abnormal (applies to non-numeric results)</option>
                                    <option value="----">----</option>
                                    <option value="null -- No range defined, or normal ranges don't apply">null -- No range defined, or normal ranges don't apply</option>
                                    <option value="U -- Significant change up">U -- Significant change up</option>
                                    <option value="D -- Significant change down">D -- Significant change down</option>
                                    <option value="B -- Better--use when direction not relevant">B -- Better--use when direction not relevant</option>
                                    <option value="W -- Worse--use when direction not relevant">W -- Worse--use when direction not relevant</option>
                                    <option value="S -- Susceptible. Indicates for microbiology susceptibilities only.">S -- Susceptible. Indicates for microbiology susceptibilities only.</option>
                                    <option value="R -- Resistant. Indicates for microbiology susceptibilities only.">R -- Resistant. Indicates for microbiology susceptibilities only.</option>
                                    <option value="I -- Intermediate. Indicates for microbiology susceptibilities only.">I -- Intermediate. Indicates for microbiology susceptibilities only.</option>
                                    <option value="MS -- Moderately susceptible. Indicates for microbiology susceptibilities only.">MS -- Moderately susceptible. Indicates for microbiology susceptibilities only.</option>
                                    <option value="VS -- Very susceptible. Indicates for microbiology susceptibilities only.">VS -- Very susceptible. Indicates for microbiology susceptibilities only.</option>
                                </select>
                                <span class="Abnormalflag_errormsg" style="color:red"></span>
                            </div>
                        </div>
                        <div class="modal-footer text-center bottom-top">
                            <button type="button" class="btn btn-default changetabbutton"
                                onclick="//return save_labresult();">Next</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
                <div id="add-imaging-order" class="tab-pane fade">
                    <form method="POST" enctype="multipart/form-data" id="imaging_order_form">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                            value="<?php echo $this->security->get_csrf_hash();?>">
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <label>CPT CODE</label>
                                <div class="autocomplete_cptcode">
                                    <input id="cpt_code" type="text" name="cpt_code" autocomplete="off"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id),get_cptcode()"
                                        placeholder="Search CPT Code" class="form-control text-field">
                                        <img style="float:right;display:none;position:absolute;left: 455px; top: -55px; height: 206px; width: 206px;" id='loadingcpt' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                </div>
                                <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                    id="patient_ID" />
                                <span class="Cptcode_errormsg" style="color:red"></span>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label>DISCRIPTION</label>
                                <input type="text" name="imaging_order_description" value=""
                                    class="form-control text-field" id="imaging_order_description"
                                    placeholder="Description">
                                <span class="Description_errormsg" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <label>ORDER STATUS</label>
                                <select class="form-control select2" name="imaging_orders_status"
                                    id="imaging_order_status" placeholder="Order Status">
                                    <option value="" selected="">Select Order Status</option>
                                    <option value="orderentered">Order Entered</option>
                                    <option value="discountinued">Discountinued</option>
                                    <option value="inprogress">In Progress</option>
                                    <option value="resultrecived">Results Recived</option>
                                </select>
                                <span class="Orderstatus_errormsg" style="color:red"></span>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label>SCANNED IN RESULT</label>
                                <input type="file" name="scanned_result" id="scanned_result">
                                <span class="Scannedresult_errormsg" style="color:red"></span>
                            </div>
                            <div class="col-12 form-group">
                                <label>DOCTOR COMMENTS</label>
                                <textarea class="w-100" id="doctor_comments" name="doctor_comments" rows="5"
                                    placeholder="Doctor comments"></textarea>
                                <span class="Doctorcomments_errormsg" style="color:red"></span>
                            </div>
                        </div>
                        <!-- <div class="row">
                                                            <div class="col-12 col-md-4 form-group">
                                                                <label>DATE&TIME</label>
                                                                <input type="datetime-local" name="i_date_time" value="" class="form-control text-field" id="i_date_time" placeholder="DATE & TIME">
                                                                <span class="i_date_time_errormsg" style="color:red"></span>
                                                            </div>
                                                            <div class="col-12 col-md-6 form-group">
                                                                <label>UPDATE BY</label>
                                                                <input type="text" name="i_updated_by" value="<?php //echo $this->session->userdata('fullname') ?>" class="form-control text-field" id="i_updated_by"
                                                                placeholder="Update By" disabled="disabled">
                                                                <span class="i_Updatedby_errormsg" style="color:red;"></span>
                                                            </div>
                                                        </div> -->
                        <div class="modal-footer text-center bottom-top">
                            <button type="button" class="btn btn-default changetabbutton">Next</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
                <div id="add-e-prescription-medication" class="tab-pane fade">
                    <form method="POST">
                        <div class="row">
                            <div class="col-12 col-md-4 form-group">
                                <label>DRUG NAME</label>
                                <div class="autocomplete_drugname">
                                    <input id="drug_name" type="text"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id),get_drugname()" name="drug_name"
                                        placeholder="Search Drug Name" class="form-control text-field">
                                        <img style="float:right;display:none;position:absolute;left: 260px; top: -55px; height: 206px; width: 206px;" id='loadingdrugname' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                </div>
                                <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                    id="patient_ID" />
                                <span class="Drugname_errormsg" style="color:red;"></span>
                            </div>
                            <div class="col-8 col-md-4 form-check dis-flex text-center" style="margin-top: 35px;">
                                <input class="form-check-input prn" type="checkbox" value="yes" id="defaultCheck1">
                                <label class="form-check-label ml-10" for="defaultCheck1">PRN</label>
                                <span class="PRN_errormsg" style="color:red;"></span>
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label>SIG NOTE</label>
                                <input type="text" onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                    name="sign-note" value="" class="form-control text-field" id="sign_note"
                                    placeholder="Sign Note">
                                <span class="SignNote_errormsg" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4 form-group">
                                <label>SIG </label>
                                <input type="text" name="sign" value="" class="form-control text-field" id="sign"
                                    placeholder="Sign" readonly="readonly">
                                <span class="SIG_errormsg" style="color:red;"></span>
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label>INDICATION </label>
                                <input type="text" onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                    name="indication" value="" class="form-control text-field" id="indication"
                                    placeholder="Indication">
                                <span class="Indication_errormsg" style="color:red;"></span>
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label>STATUS</label>
                                <select class="form-control" name="status" id="e_prescription_status"
                                    placeholder="Status">
                                    <option value="">Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                                <span class="Status_errormsg" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4 form-group">
                                <label>APPOINTMENT</label>
                                <select class="form-control select2" name="appointment" id="appointment"
                                    placeholder="Appointment">
                                    <option selected="selected" disabled="disabled">Appointment</option>
                                    <?php
                                        foreach($appointment as $appointment_list){
                                    ?>
                                    <option value="<?=$appointment_list->schedule_id;?>"><?=$appointment_list->whens;?>
                                        <?=$appointment_list->from_time;?> <?=$appointment_list->appointment_type;?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <span class="Appointment_errormsg" style="color:red;"></span>
                            </div>

                            <div class="col-12 col-md-4 ">
                                <div class="form-group">
                                    <label>DATETIME PRESCRIBED</label>
                                    <div class='input-group date'>
                                       <input type="text" class="form-control add_health_record_datetime"
                                        id="prescribe_date_time"  name="date-time">
                                       <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                       </span>
                                    </div>
                                </div>
                                <span class="PRESCRIBED_errormsg" style="color:red;"></span>
                            </div>

                            <div class="col-12 col-md-4 ">
                                <div class="form-group">
                                    <label>DATETIME STARTED TAKING</label>
                                    <div class='input-group date'>
                                        <input type="text" class="form-control add_health_record_datetime" id="started_taking_date_time" name="date-time">
                                       <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                       </span>
                                    </div>
                                </div>
                                <span class="STARTED_errormsg" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12 col-md-4 pl-0">
                                <div class="form-group">
                                    <label>DATETIME STOPPED TAKING</label>
                                    <div class='input-group date'>
                                       <input type="text" class="form-control add_health_record_datetime" id="stopped_taking_date_time " name="date-time">
                                       <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                       </span>
                                    </div>
                                </div>
                                <span class="STOPPED_errormsg" style="color:red;"></span>
                            </div>

                            <div class="col-12 col-md-4 form-group">
                                <label>DISPENSE QUANTITY </label>
                                <input type="number" min="1" name="dispense-quantity" value=""
                                    class="form-control text-field" id="dispense_quantity"
                                    placeholder="Dispense Quantity" min="1">
                                <span class="Dispenseqty_errormsg" style="color:red;"></span>
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label>DISPENSE PACKAGE </label>
                                <input type="text" name="dispense-package" value="" class="form-control text-field"
                                    id="dispense_package" onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                    placeholder="Dispense Package">
                                <span class="Dispensepkg_errormsg" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <label>NUMBER REFILLS</label>
                                <input type="number" min="1" name="number-refills" value=""
                                    class="form-control text-field" id="number_refills" placeholder="Number Refills">
                                <span class="Numberrefills_errormsg" style="color:red;"></span>
                            </div>
                            <div class="col-12 col-md-6 form-check dis-flex text-center" style="margin-top: 35px;">
                                <input class="form-check-input daw" type="checkbox" value="yes" id="defaultCheck2">
                                <label class="form-check-label ml-10" for="defaultCheck2">Daw</label>
                                <span class="Daw_errormsg" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <label>PHARMACY NOTE</label>
                                <input type="text" name="pharmacy-note"
                                    onkeyup="return allowed_alphanumeric(this.value,this.id);" value=""
                                    class="form-control text-field" id="pharmacy_note" placeholder="Pharmacy Note">
                                <span class="Pharmacynote_errormsg" style="color:red;"></span>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label>ORDER STATUS</label>
                                <select class="form-control select2 e_prescription_orderstatus" name="status"
                                    id="order_status" placeholder="Status">
                                    <option value="" selected="">Select Order Status</option>
                                    <option value="Ordered">Ordered</option>
                                    <option value="Administered during visit">Administered during visit</option>
                                    <option value="Electronic eRx Sent">Electronic eRx Sent</option>
                                    <option value="Phoned into Pharmacy">Phoned into Pharmacy</option>
                                    <option value="Faxed to Pharmacy">Faxed to Pharmacy</option>
                                    <option value="Paper Rx">Paper Rx</option>
                                    <option value="Prescription Printed">Prescription Printed</option>
                                    <option value="Discontinued">Discontinued</option>
                                    <option value="Prescribed by other Dr">Prescribed by other Dr</option>
                                    <option value="Over the Counter">Over the Counter</option>
                                </select>
                                <span class="Orderstatus_errormsg" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <label>NOTES</label>
                                <textarea class="w-100" id="notes" name="notes" rows="5" placeholder="Notes"></textarea>
                                <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                    id="patient_ID" />
                                <span class="Notes_errormsg" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="modal-footer text-center bottom-top">
                            <button type="button" class="btn btn-default changetabbutton"
                                onclick="//return save_e_prescription();">Next</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
                <div id="add-immunizations" class="tab-pane fade">
                    <div class="panel-group mt-15" id="accordion2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse1">
                                        Step-1 : Select Vaccines</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <form method="POST">
                                    <div class="panel-body">
                                        <div class="row" style="padding: 10px;">
                                            <div class="col-12 col-md-4 form-group">
                                                <select class="form-control  Addselect_vaccination"
                                                    id="Addselect_vaccination"
                                                    onchange=" return get_vaccinesschedule(this.value)">
                                                    <option value="">Select Vaccines</option>
                                                    <option value="birth">Birth - Year</option>
                                                    <option value="year">2-18 Years</option>
                                                    <option value="adult">Adult</option>
                                                    <option value="other">Other </option>
                                                </select>
                                                <input type="hidden" name="patient_ID"
                                                    class="form-control text-field patient_ID" id="patient_ID" />
                                                <span class="Vacination_errormsg" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <!-- Birth-year -->
                                        <div class="select-vaccination">
                                            <div class="row birth add-box" style="padding: 10px;">
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>SCHEDULE</label>
                                                    <div class="autocomplete_schedule">
                                                        <input id="schedule" type="text" name="schedule" autocomplete="off"
                                                            onkeyup="return allowed_alphanumeric(this.value,this.id),search_vaccinesschedule();"
                                                            placeholder="Search SCHEDULE"
                                                            class="form-control text-field">
                                                            <img style="float:right;display:none;position:absolute;left:255px; top: -55px; height: 206px; width: 206px;" id='loadingschedule' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                                    </div>

                                                    <span class="Schedule_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>VACCINE</label>
                                                    <div class="autocomplete_vaccine">
                                                        <input id="vaccine" type="text"
                                                            onkeyup="return allowed_alphanumeric(this.value,this.id),search_vaccines_vaccine();"
                                                            name="vaccine" autocomplete="off" placeholder="Search VACCINE"
                                                            class="form-control text-field">
                                                            <img style="float:right;display:none;position:absolute;left: 260px; top: -55px; height: 206px; width: 206px;" id='loadingvaccine' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                                    </div>

                                                    <span class="Vaccine_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>CVX CODE</label>
                                                    <div class="autocomplete_cvxcode">
                                                        <input id="immunizationscvx_code_vaccines" autocomplete="off"
                                                            onkeyup="return allowed_alphanumeric(this.value,this.id),get_immunizations_cvxcode()"
                                                            type="text" name="immunizationscvx_code_vaccines"
                                                            placeholder="Search CVX CODE"
                                                            class="form-control text-field">
                                                            <img style="float:right;display:none;position:absolute;left:220px; top: -55px; height: 206px; width: 206px;" id='loading_immunizationscvx_code_vaccines' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                                    </div>
                                                    <span class="Cvxcode_errormsg" style="color:red;"></span>
                                                </div>
                                                <!-- <div class="col-12 col-md-4 form-group">
                                                                                    <label>CONSENT FORM</label>
                                                                                    <input type="text" name="consent-form" value="" class="form-control text-field consent_form"
                                                                                    id="consent_form" placeholder="Consent Form">
                                                                                    <span class="Consentform_errormsg" style="color:red;"></span>
                                                                                </div> -->
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>VIS</label>
                                                    <input type="text" name="vis"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                                        value="" class="form-control text-field vis" id="vis"
                                                        placeholder="VIS">
                                                    <span class="Vis_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 ">
                                                    <div class="form-group">
                                                        <label>ADMINISTRETED ON</label>
                                                        <div class='input-group date'>
                                                           <input type="text" name="administreted-on"
                                                        class="form-control add_health_record_datetime administreted_on"
                                                        id="administreted_on" placeholder="Administered On">
                                                           <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                           </span>
                                                        </div>
                                                    </div>
                                                    <span class="Administeredon_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>ADMINISTRETED BY</label>
                                                    <input type="text" readonly="readonly" name="administreted-by"
                                                        value="<?php echo $this->session->userdata('fullname') ?>"
                                                        class="form-control text-field administreted_by"
                                                        id="administreted_by" placeholder="Administered By">
                                                    <span class="Administeredby_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>STATUS</label>
                                                    <select class="form-control vaccinestatus" name="status"
                                                        id="vaccinestatus" placeholder="Status">
                                                        <option selected="" value=""> Select Status </option>
                                                        <option value="1">Active</option>
                                                        <option value="2">Deactive</option>
                                                    </select>
                                                    <span class="Vaccinesstatus_errormsg" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-default immuopenaccordian"
                                            onclick="//return save_vaccines();">Next</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
                                        Step-2: Review and Sign</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <form method="POST" enctype="multipart/form-data" id="reviewsing_form">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="panel-body">
                                        <p class="mt-5 blue-color">Please distribute the Vaccine Information Statement
                                            (VIS) for each of the
                                            following vaccines and have the patient/legal guardian(s) review them:</p>
                                        <h4 style="background-color: #f1f1f1;padding:10px;">Upload Form / Files</h4>
                                        <div class="row" style="padding: 15px;">
                                            <div class="col-12 form-group">
                                                <input type="file" multiple name="review_document" id="review_document"
                                                    class="review_document" />
                                                <input type="hidden" name="patient_ID"
                                                    class="form-control text-field patient_ID" id="patient_ID" />
                                                <span style="color:red;" class="Reviewdocument_erorrmsg"></span>
                                                <!-- <input type="file" id="real-file" style="display: none;" multiple />
                                                                                <button type="button" class="btn btn-default" id="custom-button">CHOOSE A
                                                                                FILE</button>
                                                                                <span id="custom-text">No file chosen, yet.</span> -->
                                            </div>
                                        </div>
                                        <h4 style="background-color: #f1f1f1;padding:10px;">Sign Consnt Form</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="mt-5 blue-color">My signature below signifies that I have read
                                                    and received information about the diseases and vaccines listed
                                                    below. I understand the benefits and risks of the vaccines cited,
                                                    and ask that the vaccine(s) listed below be given to me or to the
                                                    person named for whom I am authorized to make this request.</p>
                                            </div>
                                        </div>
                                        <div class="sigPad">
                                            <div class="row" style="padding: 15px;">
                                                <div class="form-group">
                                                    <label>PRINT NAME</label>
                                                    <input type="text" name="name" value=""
                                                        class="form-control text-field typename" id="printname" autocomplete="off"
                                                        onkeyup="return set_valueof_printname();">
                                                    <span class="Printname_errormsg" style="color:red;"></span>
                                                </div>
                                                <ul class="sigNav">
                                                    <li class="typeIt"><a href="#type-it" class="current">Type It</a>
                                                    </li>
                                                    <li class="drawIt"><a href="#draw-it">Draw It</a></li>
                                                    <li class="clearButton"><a href="#clear">Clear</a></li>
                                                </ul>
                                                <div class="sig sigWrapper">
                                                    <div class="typed"></div>
                                                    <canvas class="pad" width="198" height="148"></canvas>
                                                    <input type="hidden" name="output" class="output">
                                                    <input type="hidden" name="singnature_data" class="singnature_data">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="mt-5 blue-color" style="color: #150aec;"><b>I have read the
                                                        vaccine information statements and agree to the above statement
                                                        and acknowledging is my signature entered in this form.</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-default immuopenaccordian2">Next</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
                                        Step-3: Record Vaccinations</a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <form method="POST">
                                    <div class="panel-body">
                                        <div class="row p-15" style="border-bottom:1px solid #ddd;">
                                            <!--   <div class="col-12 col-md-6 form-group">
                                                                                <label>CONSENT FORM</label>
                                                                                <select class="form-control select2" name="consent-form" id="record_vaccinations_consent_form"
                                                                                    placeholder="Consent Form">
                                                                                    <option value="">Select Consent Form</option>
                                                                                    <?php
                                                                                            //foreach ($consentform as $key => $value) {
                                                                                    ?>
                                                                                    <option value="<?php //echo $value->consent_form; ?>"><?php //echo $value->consent_form; ?></option>
                                                                                    <?php //} ?>
                                                                                </select>
                                                                                <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                                                                                <span class="Consent_form_errormsg" style="color:red;"></span>
                                                                            </div> -->
                                            <div class="col-12 col-md-6 form-group">
                                                <label>CREATE A RECORD FOR</label>
                                                <select class="form-control select2" name="create-record"
                                                    id="record_vaccinations_create_record"
                                                    placeholder="Create a record for">
                                                    <option value="" select="selected">Select Create a record for
                                                    </option>
                                                    <option value="1">Create a record for</option>
                                                </select>
                                                <span class="Createrecordfor_errormsg" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="row p-15" style="border-bottom:1px solid #ddd;">
                                            <div class="col-12 col-md-3 form-group">
                                                <label>CVX Code</label>
                                                <div class="autocomplete_record_vaccinations_cvx_code">
                                                    <input id="record_vaccinations_cvx_code"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id),get_record_vaccinations_cvx_code()"
                                                        type="text" name="record_vaccinations_cvx_code"
                                                        placeholder="Search CVX CODE" class="form-control text-field">
                                                        <img style="float:right;display:none;position:absolute;left:155px; top: -55px; height: 206px; width: 206px;" id='loading_record_vaccinations_cvx_code' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                                </div>
                                                <span class="CVX_code_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-3 form-group">
                                                <label>NAME</label>
                                                <input type="text" name="name"
                                                    onkeyup="return allowed_alphanumeric(this.value,this.id);" value=""
                                                    class="form-control text-field" id="record_vaccinations_name"
                                                    placeholder="Name">
                                                <span class="Name_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-3 form-group">
                                                <label>CPT CODE</label>
                                                <input type="text" name="cpt-code" autocomplete="off"
                                                    onkeyup="return allowed_alphanumeric(this.value,this.id);" value=""
                                                    class="form-control text-field" id="record_vaccinations_cpt_code"
                                                    placeholder="CPT Code">
                                                <span class="CPT_CODE_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-3 form-group">
                                                <label>MANUFACTURER</label>
                                                <div class="autocomplete_manfacturer">
                                                    <input id="record_vaccinations_manfacturer"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id),get_immunizations_manufacturer();" type="text" name="record_vaccinations_manfacturer"
                                                        placeholder="Search MANUFACTURER"
                                                        class="form-control text-field">
                                                        <img style="float:right;display:none;position:absolute;left:155px; top: -55px; height: 206px; width: 206px;" id='loading_record_vaccinations_manfacturer' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                                </div>
                                                <span class="Manufacturer_errormsg" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="row p-15" style="border-bottom:1px solid #ddd;">
                                            <div class="col-12 col-md-4 form-group">
                                                <label>LOT NUMBER</label>
                                                <input type="number" min="1" name="lot-num" value=""
                                                    class="form-control text-field" id="record_vaccination_lot-num"
                                                    placeholder="Lot Number">
                                                <span class="LotNumber_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>LOT EXPIRATION DATE</label>
                                                <input type="date" name="lot-num" value=""
                                                    class="form-control text-field"
                                                    id="record_vaccination_expirationdate"
                                                    placeholder="Lot expiration date" max="<?php echo date('Y-m-d') ?>">
                                                <span class="Lotexpirationdate_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>ADMINISTERED AMOUNT</label>
                                                <input type="number" name="administered-amount"
                                                    class="form-control text-field" id="administered_amount"
                                                    placeholder="Administered Amount">
                                                <span class="Administeredamount_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>ADMINISTERED UNITS</label>
                                                <select class="form-control select2"
                                                    id="record_vaccination_administered_unit"
                                                    placeholder="Administered Unit">
                                                    <option value="">------------</option>
                                                    <option value="50% cell culture infectious dose">50% cell culture
                                                        infectious dose</option>
                                                    <option value="50% tissue culture infectious dose">50% tissue
                                                        culture infectious dose</option>
                                                    <option value="MicroGram [SI Mass Units]">MicroGram [SI Mass Units]
                                                    </option>
                                                    <option value="MicroLiter [SI Volume Units]">MicroLiter [SI Volume
                                                        Units]</option>
                                                    <option value="MilliEquivalent [Substance Units]">MilliEquivalent
                                                        [Substance Units]</option>
                                                    <option value="MilliGram [SI Mass Units]">MilliGram [SI Mass Units]
                                                    </option>
                                                    <option value="MilliLiter [SI Volume Units]">MilliLiter [SI Volume
                                                        Units]</option>
                                                </select>
                                                <span class="Administeredunit_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>VACCINE ROUTE</label>
                                                <select class="form-control select2"
                                                    id="record_vaccination_vaccinate_route"
                                                    placeholder="Vaccinate Route">
                                                    <option selected="selected" value="">Select VACCINE ROUTE </option>
                                                    <option value="1">Vaccinate Route</option>
                                                    <option value="2">ID (Intradermal)</option>
                                                    <option value="3">NS (Nasal)</option>
                                                </select>
                                                <span class="Vaccinateroute_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>VACCINE SITE</label>
                                                <select class="form-control select2"
                                                    id="record_vaccination_vaccinate_site" placeholder="Vaccinate Site">
                                                    <option selected="selected" value="">Select VACCINE SITE </option>
                                                    <option value="1">Vaccinate Site</option>
                                                    <option value="2">LA (Left Upper Arm)</option>
                                                    <option value="3">LD (Left Deltoid)</option>
                                                </select>
                                                <span class="Vaccinatesite_errormsg" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="row p-15">
                                            <div class="col-12 col-md-4 form-group">
                                                <label>VACCINATION STATUS</label>
                                                <select class="form-control select2"
                                                    id="record_vaccination_vaccinate_status"
                                                    placeholder="Vaccinate Status">
                                                    <option selected="selected" value="">Select VACCINATION STATUS </option>
                                                    <option value="1">Complete</option>
                                                    <option value="2">Refused</option>
                                                    <option value="3">Not administered</option>
                                                    <option value="3">Partially administered</option>
                                                </select>
                                                <span class="Vaccinatestatus_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 ">
                                                <div class="form-group">
                                                   <label>ADMINISTERED ON</label>
                                                    <div class='input-group date'>
                                                       <input type="text" class="form-control add_health_record_datetime"
                                                    id="record_vaccination_administred_on" name="date-time">
                                                       <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                       </span>
                                                    </div>
                                                </div>
                                                <span class="Administred_on_errormsg" style="color:red;"></span>
                                            </div>

                                            <div class="col-12 col-md-4 form-group">
                                                <label>ORDERING DOCTOR</label>
                                                <select class="form-control select2"
                                                    id="record_vaccination_ordering_doctor"
                                                    placeholder="Ordering Doctor">
                                                    <option selected="selected"  value="">Select
                                                        Ordering Doctor</option>
                                                    <?php
                                                        foreach ($ordering_doctor as $ordering_doctor_list){
                                                    ?>
                                                    <option
                                                        value="<?php echo $ordering_doctor_list->firstname.' '.$ordering_doctor_list->lastname;?>">
                                                        <?php echo $ordering_doctor_list->firstname?>
                                                        <?php echo $ordering_doctor_list->lastname?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="Orderingdoctor_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>ADMINISTERED BY</label>
                                                <input type="text" name="administreted-by"
                                                    value="<?php echo $this->session->userdata('fullname') ?>"
                                                    readonly="readonly" class="form-control text-field administreted_by"
                                                    id="record_vaccination_administered_by"
                                                    placeholder="Administered By">

                                                <span class="Administeredby_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>ADMINISTERED AT</label>
                                                <select class="form-control select2"
                                                    id="record_vaccination_administered_at"
                                                    placeholder="Administered At">
                                                    <option selected="selected" value="">Select ADMINISTERED AT</option>
                                                    <option value="1">Administered At</option>
                                                    <option value="2">-----</option>
                                                    <option value="3">Primary Office</option>
                                                </select>
                                                <span class="Administeredat_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>VACCINATION INVENTORY LOT</label>
                                                <select class="form-control select2"  id="record_vaccination_inventory_lot">
                                                    <option value="" selected="selected">Select Vaccination Inevntory Lot</option>
                                                    <option value="2">-----</option>
                                                    <option value="3">Primary Office</option>
                                                </select>
                                                <span class="Inventorylot_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>RECORD TYPE</label>
                                                <select class="form-control select2" id="record_vaccination_record_type"
                                                    placeholder="Record Type">
                                                    <option value="" selected="selected" disabled="disabled">Select Record Type</option>
                                                    <option value="2">Historical information-source unspecified</option>
                                                    <option value="3">Historical information-from other Provider
                                                    </option>
                                                    <option value="4">Historical information-from Parents recall
                                                    </option>
                                                    <option value="5">Historical information-from School record</option>
                                                </select>
                                                <span class="Recordtype_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>FUNDING ELIGIBILITY</label>
                                                <select class="form-control select2"
                                                    id="record_vaccination_funding_eligibility"
                                                    placeholder="Funding Eligibility">
                                                    <option value="" selected="selectd" disabled="disabled">Select Funding Eligibility</option>
                                                    <option value="2">Not VFC Eligible</option>
                                                    <option value="3">VFC eligible-Uninsured</option>
                                                    <option value="4">VFC eligible-Medicare/Medicaid Managed Care
                                                    </option>
                                                    <option value="5">Local Specific Eligibility</option>
                                                </select>
                                                <span class="Fundingeligibility_errormsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>OBSERVED IMMUNITY</label>
                                                <select class="form-control select2"
                                                    id="record_vaccination_observed_immunity"
                                                    placeholder="Observed Immunity">
                                                    <option value="" selected="slected" disabled="disabled">Select Observed Immunity</option>
                                                    <option value="2">Acute poliomyelitis (disorder)</option>
                                                    <option value="3">Anthrax (disorder)</option>
                                                    <option value="4">Diphtheria (disorder)</option>
                                                    <option value="5">Disease due to Rotavirus (disorder)</option>
                                                </select>
                                                <span class="Observedimmunity_errormsg" style="color:red;"></span>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label>NOTES</label>
                                                <textarea class="w-100" id="record_vaccination_notes"
                                                    name="record_vaccination_notes" rows="5"
                                                    placeholder="Notes"></textarea>
                                                <span class="Notes_errormsg" style="color:red;"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-default changetabbutton"
                                            onclick="//return save_record_vaccinations()">Next</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="add-summary" class="tab-pane fade">
                    <form method="POST">
                        <div class="row p-15">
                            <div class="col-12 form-group ml-10 mr-10">
                                <label>SUMMARY</label>
                                <textarea class="w-100" id="summary_description" name="summary" rows="5"
                                    placeholder="Summary"></textarea>
                                <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                    id="patient_ID" />
                                <span class="Summary_errormsg" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="modal-footer text-center bottom-top">
                            <button type="button" class="btn btn-default changetabbutton"
                                onclick="//return save_summary();">Next</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
                <div id="add-document" class="tab-pane fade">
                    <div class="panel-group mt-15" id="accordion51">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion51" href="#collapse45">
                                        Uploaded Documents</a>
                                </h4>
                            </div>
                            <div id="collapse45" class="panel-collapse collapse in">
                                <form method="POST" enctype="multipart/form-data" id="document_form">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-12 col-md-4 form-group ml-15 mb-10">
                                                <label>SELECT DOCUMENT TYPE</label>
                                                <select class="form-control text-field" id="document_type"
                                                    name="document_type"
                                                    onchange="return hide_show_document_according()">
                                                    <option value="">Select Document Type</option>
                                                    <option value="1">Locked Clinical Notes</option>
                                                    <option value="2">Signed Consent Forms</option>
                                                    <!-- <option value="3">Outbound Referrals</option> -->
                                                    <option value="3">Lab Result</option>
                                                    <option value="4">Amendments</option>
                                                </select>
                                                <input type="hidden" name="patient_ID"
                                                    class="form-control text-field patient_ID" id="patient_ID" />
                                                <input type="hidden" name="healthreport_document_id"
                                                    class="form-control text-field healthreport_document_id"
                                                    id="healthreport_document_id" />
                                                <span class="Documenttype_erorrmsg" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="mt-15">
                                            <div class="form-group">
                                                <div class="file-loading">
                                                    <input id="file-1" type="file" multiple
                                                        class="file document_document" data-overwrite-initial="false"
                                                        data-min-file-count="2" name="document_document">
                                                        <span class="Document_erorrmsg" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-default docopenaccordian">Next</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default locked_clinical_notes_accordian" style="display: none;">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion51" href="#collapse51">
                                        Locked Clinical Notes</a>
                                </h4>
                            </div>
                            <div id="collapse51" class="panel-collapse collapse">
                                <form method="POST">
                                    <div class="panel-body">
                                        <div class="row" style="padding: 10px;">
                                            <div class="col-12 col-md-4 pl-0">
                                                <div class="form-group">
                                                    <label>DATE OF SERVICE</label>
                                                    <div class='input-group date'>
                                                       <input type="text" class="form-control add_health_record_datetime" id="date_of_service"    name="date-time">
                                                       <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                       </span>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="patient_ID"  class="form-control text-field patient_ID" id="patient_ID" />
                                                <span class="Dateofservice_erorrmsg" style="color:red"></span>
                                            </div>

                                            <div class="col-12 col-md-4 form-group">
                                                <label>LOCKED BY</label>
                                                <input type="text" name="locked-by"
                                                    value="<?= $this->session->userdata('fullname'); ?>"
                                                    readonly="readonly" class="form-control text-field" id="lockedby"
                                                    placeholder="Locked By">
                                                <input type="hidden" name="locked_by"
                                                    value="<?= $this->session->userdata('user_id'); ?>" id="locked_by">
                                                <span class="Lockedby_erorrmsg" style="color:red"></span>
                                            </div>

                                            <div class="col-12 col-md-4 pl-0">
                                                <div class="form-group">
                                                    <label>LOCKED ON</label>
                                                    <div class='input-group date'>
                                                       <input type="text" name="Locked-on" value="" class="form-control add_health_record_datetime" id="locked_on">
                                                       <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                       </span>
                                                    </div>
                                                </div>
                                                <span class="Lockedon_erorrmsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>ACTION</label>
                                                <select class="form-control" name="action" id="lockedaction"
                                                    placeholder="Action">
                                                    <option value="" selected="selected">Selcted ACTION</option>
                                                    <option value="1">Accepted</option>
                                                    <option value="2">Decline</option>
                                                </select>
                                                <span class="Lockedaction_erorrmsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>STATUS</label>
                                                <select class="form-control" name="status" id="lockedstatus"
                                                    placeholder="Status">
                                                    <option slected="selected" value="">Select STATUS</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">Inactive</option>
                                                </select>
                                                <span class="Lockedstatus_erorrmsg" style="color:red"></span>
                                            </div>
                                            <div class="col-12 col-md-12 form-group">
                                                <label>REASON</label>
                                                <textarea class="w-100" id="locked_reason" name="locked_reason" rows="5"
                                                    placeholder="Reason"></textarea>
                                                <span class="Lockedreason_erorrmsg" style="color:red"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-default docopenaccordian2 changetabbutton "
                                            onclick="//return save_clinical_notes();">Next</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default singedconsent_form_accordian" style="display: none;">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse6">
                                        Singed Consent Forms</a>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse">
                                <form method="POST">
                                    <div class="panel-body">
                                        <div class="row" style="padding: 10px;">
                                            <!-- <div class="col-12 col-md-4 form-group">
                                                                                <label>CONSENT FORM</label>
                                                                                <input type="text" name="consent-form" value="" class="form-control text-field"  id="singedconsent_form" placeholder="Consent Form">
                                                                                <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID"/>
                                                                                <span class="Singedconsentform_errormsg" style="color:red;"></span>
                                                                            </div> -->
                                            <div class="col-12 col-md-4 ">
                                                <div class="form-group">
                                                    <label>DATE OF APPOINTMENT</label>
                                                    <div class='input-group date'>
                                                       <input type="text" class="form-control add_health_record_datetime"
                                                    id="appointment_datetime" name="date-time">
                                                       <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                       </span>
                                                    </div>
                                                </div>
                                                <span class="Appointment_datetime_erorrmsg" style="color:red"></span>
                                           </div>

                                            <div class="col-12 col-md-4 ">
                                                <div class="form-group">
                                                    <label>DATE OF SIGNATURE</label>
                                                    <div class='input-group date'>
                                                       <input type="text" class="form-control add_health_record_datetime" id="singnature_date"   name="date-time">
                                                       <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                       </span>
                                                    </div>
                                                </div>
                                                <span class="Singnature_date_erorrmsg" style="color:red"></span>
                                           </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>ACTION</label>
                                                <select class="form-control" name="action" id="singnature_action"
                                                    placeholder="Action">
                                                    <option value="" selected="selected">Selcted ACTION</option>
                                                    <option value="1">Accepted</option>
                                                    <option value="2">Decline</option>
                                                </select>
                                                <span class="singnature_action_erorrmsg" style="color:red"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-default docopenaccordian3 changetabbutton"
                                            onclick="//return save_singed_consent();">Next</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default lab_result_accordian" style="display: none;">
                            <div class="panel-heading ">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion51" href="#collapse75">
                                        Lab Result</a>
                                </h4>
                            </div>
                            <div id="collapse75" class="panel-collapse collapse">
                                <form method="POST">
                                    <div class="panel-body">
                                        <div class="row" style="padding: 10px;">
                                            <div class="col-12 col-md-4 form-group">
                                                <label>LAB</label>
                                                <input type="text" name="lab" value="" class="form-control text-field"
                                                    id="document_lab"
                                                    onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                                    placeholder="Lab">
                                                <input type="hidden" name="patient_ID"
                                                    class="form-control text-field patient_ID" id="patient_ID" />
                                                <span class="Documnetlab_erorrmsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 ">
                                                <div class="form-group">
                                                    <label>DATE</label>
                                                    <div class='input-group date'>
                                                       <input type="text" class="form-control add_health_record_datetime"
                                                    id="document_labdate_time" name="date-time">
                                                       <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                       </span>
                                                    </div>
                                                </div>
                                                <span class="Documnetdate_erorrmsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>ACTION</label>
                                                <select class="form-control" name="action" id="document_labaction"
                                                    placeholder="Action">
                                                    <option value="" selected="selected">Selcted ACTION</option>
                                                    <option value="1">Accepted</option>
                                                    <option value="2">Decline</option>
                                                </select>
                                                <span class="Documnetlabaction_erorrmsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>ABNORMAL</label>
                                                <select class="form-control" name="abnormal" id="document_abnormal"
                                                    placeholder="Abnormal">
                                                    <option selected="" value="">Select ABNORMAL</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                                <span class="Documnetabnormal_erorrmsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>RESULT COUNT</label>
                                                <input type="number" min="1" name="result-count" value=""
                                                    class="form-control text-field" id="document_result_count"
                                                    placeholder="Result Count">
                                                <span class="Documnetresultcount_erorrmsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>TEST</label>
                                                <input type="text" name="test" value="" class="form-control text-field"
                                                    id="document_test"
                                                    onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                                    placeholder="test">
                                                <span class="Documnettest_erorrmsg" style="color:red;"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-default docopenaccordian4 changetabbutton"
                                            onclick="//return save_lab_result();">Next</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default amendments_accordian" style="display: none;">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion51" href="#collapse85">
                                        Amendments</a>
                                </h4>
                            </div>
                            <div id="collapse85" class="panel-collapse collapse">
                                <form method="POST" enctype="multipart/form-data" accept-charset="utf-8"
                                    id="amendments_form">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="panel-body">
                                        <div class="row p-15">
                                            <!-- <div class="col-12 col-md-4 form-group">
                                                                                <label>AMENDMENTS DOCUMENT</label><br>
                                                                                <div style="margin-top: 10px">
                                                                                    <input type="file" multiple id="amendments_doc" id="amendments_doc" name="amendments_doc" />
                                                                                    <span class="Amendmentsdoc_erorrmsg" style="color:red;"></span>
                                                                                </div>
                                                                            </div> -->
                                            <div class="col-12 col-md-4 form-group">
                                                <label>AMENDMENTS SOURCE</label>
                                                <input type="text" name="amendment_source" value=""
                                                    class="form-control text-field" id="amendment_source"
                                                    onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                                    placeholder="Amendment Source">
                                                <input type="hidden" name="patient_ID"
                                                    class="form-control text-field patient_ID" id="patient_ID" />
                                                <span class="Amendment_source_erorrmsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label>STATUS</label>
                                                <select class="form-control" id="amendment_status" placeholder="Status"
                                                    name="amendment_status">
                                                    <option value="">Status</option>
                                                    <option value="2">Accepted </option>
                                                    <option value="3">Denied</option>
                                                </select>
                                                <span class="Amendment_status_erorrmsg" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="row p-15">
                                            <div class="col-12 col-md-4 pl-0">
                                                <div class="form-group">
                                                    <label>REQUEST DATE</label>
                                                    <div class='input-group date'>
                                                       <input type="text" class="form-control add_health_record_datetime"
                                                    id="amdments_date_time" name="amdments_date_time">
                                                       <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                       </span>
                                                    </div>
                                                </div>
                                                <span class="Amdments_date_time_erorrmsg" style="color:red;"></span>
                                            </div>
                                            <div class="col-12 col-md-4 pl-0">
                                                <div class="form-group">
                                                    <label>PROCESSED DATE</label>
                                                    <div class='input-group date'>
                                                       <input type="text" class="form-control add_health_record_datetime"
                                                    id="amdmentsproccess_date_time" name="amdmentsproccess_date_time">
                                                       <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                       </span>
                                                    </div>
                                                </div>
                                                <span class="Amdmentsproccess_date_time_erorrmsg" style="color:red;"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-default changetabbutton">Next</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--    <div class="modal-footer text-center">
                                                        <button type="submit" class="btn btn-default">Save</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div> -->
                </div>
                <div id="add-record" class="tab-pane fade">
                    <form method="POST">
                        <div class="row p-25">
                            <!--  <div class="col-12 col-md-6 form-group">
                                                                <label>DOCTOR NAME</label>
                                                                <select class="form-control" id="doctor_name" name="doctor_name">
                                                                    <option value="">Select Doctor</option>
                                                                    <?php //foreach($doctors as $doctors_list){
                                                                    ?>
                                                                    <option value="<?php// echo $doctors_list->user_id; ?>"><?php// echo $doctors_list->firstname." ".$doctors_list->lastname; ?></option>
                                                                    <?php //} ?>
                                                                </select>
                                                                <span class="Doctorname_errormsg" style="color:red;"></span>
                                                            </div> -->
                            <div class="col-12 col-md-6 form-group">
                                <label>DATE&TIME</label>
                                <input type="text" readonly="readonly" class="form-control" id="healtrecord_date_time"
                                    name="healtrecord_date_time" value="<?php echo date("Y-m-d h:i:s"); ?>">
                                <span class="Healtrecorddatetime_errormsg" style="color:red;"></span>
                                <input type="hidden" name="patient-name" value="" class="form-control text-field"
                                    id="patient_name">
                                <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                    id="patient_ID" />
                            </div>
                            <!--  <div class="col-12 col-md-6 form-group">
                                                                <label>PATIENT NAME</label>
                                                                <input type="text" name="patient-name" value="" class="form-control text-field" id="patient_name"
                                                                placeholder="Patient Name" disabled="disabled">
                                                                <span class="Patientname_errormsg" style="color:red;"></span>
                                                            </div> -->
                            <div class="col-12 col-md-6 form-group">
                                <label>UPDATE BY</label>
                                <input type="text" name="upload-by"
                                    value="<?php echo $this->session->userdata('fullname') ?>"
                                    class="form-control text-field" id="updated_by" placeholder="Update By"
                                    disabled="disabled">
                                <span class="Updatedby_errormsg" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="modal-footer text-center bottom-top">
                            <button type="button" class="btn btn-default"
                                onclick="return save_healthrecord();">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="return get_vitalsigns()">Close</button>
                        </div>
                </div>
                <form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- edit modal -->
<div class="modal fade" id="hospital-record-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Health Record </h4>
            </div>
            <div class="modal-body">
                <div class="alert-messge" style="display:none;">
                </div>
                <div class="alert-errormessge" style="display:none;">
                </div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#edit-vital-signs">Vital Sign</a></li>
                    <li><a data-toggle="tab" href="#edit-problem-allergy-list">Problem Allergies List</a></li>
                    <li><a data-toggle="tab" href="#edit-lab-result">Lab Result</a></li>
                    <li><a data-toggle="tab" href="#edit-imaging-order">Imaging Order</a></li>
                    <li><a data-toggle="tab" href="#edit-e-prescription-medication">E-prescription Medication</a></li>
                    <li><a data-toggle="tab" href="#edit-immunizations">Immunizations</a></li>
                    <li><a data-toggle="tab" href="#edit-summary">Summary</a></li>
                    <li><a data-toggle="tab" href="#edit-document">Document</a></li>
                    <!-- <li><a data-toggle="tab" href="#edit-record">Health Record</a></li> -->
                </ul>
                <div class="tab-content">
                    <div id="edit-vital-signs" class="tab-pane fade in active">
                        <form method="POST">
                            <div class="row">
                                <div class="col-12 col-md-4 form-group">
                                    <label>TEMPERATURE(°F)</label>
                                    <input type="number" min="1" name="temp" value="" class="form-control text-field"
                                        id="temp_e" placeholder="Temperature">
                                    <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                        id="patient_ID_e" />
                                    <input type="hidden" name="vital_id" class="form-control text-field"
                                        id="vital_id" />
                                    <span class="Temperature_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>Bloodtype</label>
                                    <select name="bloodtype_e" class="form-control text-field bloodtype select_e2"
                                        id="bloodtype_e">
                                        <option selected="selected" disabled="disabled">Select Blood Type</option>
                                        <option value="A-positive">A-positive</option>
                                        <option value="A-negative">A-negative</option>
                                        <option value="B-positive">B-positive</option>
                                        <option value="B-negative">B-negative</option>
                                        <option value="AB-positive">AB-positive</option>
                                        <option value="AB-negative">AB-negative</option>
                                        <option value="O-positive">O-positive</option>
                                        <option value="O-negative">O-negative</option>
                                    </select>
                                    <span class="Temperature_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>HEART RATE/PLUSE (bpm)</label>
                                    <input type="number" min="1" name="heart-rate" value=""
                                        class="form-control text-field" id="heart-rate_e"
                                        placeholder="Heart Rate/Pulse">
                                    <span class="Heartrate_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>BLOOD PRESSURE (mmHg)</label>
                                    <input type="number" min="1" name="blood-presure" value=""
                                        class="form-control text-field" id="blood-presure_e" placeholder="Blood Presure"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                    <span class="Bloodpresure_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>RESPIRATORY RATE (rpm)</label>
                                    <input type="text" name="respiratory-rate" value="" class="form-control text-field"
                                        id="respiratory-rate_e" placeholder="Respiratory rate"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                    <span class="Respiratoryrate_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>OXYGEN SATURATION (%)</label>
                                    <input type="text" name="oxygen-saturation" value="" class="form-control text-field"
                                        id="oxygen-saturation_e" placeholder="Oxygen Saturation"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                    <span class="Oxygensaturation_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>HEIGHT (in)</label>
                                    <input type="number" min="1" name="height" value="" class="form-control text-field"
                                        id="height_e" placeholder="Height" onkeyup="return calculate_bmi_edit();" onchange="return calculate_bmi_edit()">
                                    <span class="Height_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>WEIGHT (lbs)</label>
                                    <input type="number" min="1" name="weight" value="" class="form-control text-field"
                                        id="weight_e" placeholder="Weight" onkeyup="return calculate_bmi_edit();" onchange="return calculate_bmi_edit()">
                                    <span class="Weight_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>BMI (kg/m2)</label>
                                    <input type="text" name="bmi" value="" class="form-control text-field" id="bmi_e"
                                        placeholder="BMI" disabled="disabled">
                                    <span class="BMI_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>PAIN (1-10)</label>
                                    <input type="number" min="1" name="pain" value="" class="form-control text-field"
                                        id="pain_e" placeholder="Pain">
                                    <span class="Pain_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>SMOKING STATUS</label>
                                    <select name="smoking" id="smoking_e" class="form-control text-field">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <span class="Smoking_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>HEAD CIRCUMFERENCE</label>
                                    <input type="text" name="head-circumfernce" value="" class="form-control text-field"
                                        id="head-circumfernce_e" placeholder="Head Circumference"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                    <span class="Head_circumference_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>GLUCOSE BY GLUCOMETER</label>
                                    <input type="text" name="glucose-glucometer" value=""
                                        class="form-control text-field" id="glucose-glucometer_e"
                                        placeholder="Glucose by Glucometer"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                    <span class="Glucose_by_glucometer_errormsg" style="color:red"></span>
                                </div>
                            </div>
                            <div class="modal-footer text-center bottom-top">
                                <button type="button" class="btn btn-default"
                                    onclick="return edit_vitalsing()">Save</button>
                                <button type="button" class="btn btn-default" onclick="return get_vitalsigns()"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>

                    <div id="edit-problem-allergy-list" class="tab-pane fade">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">
                                            Problem List</a>
                                    </h4>
                                </div>
                                <div id="collapse11" class="panel-collapse collapse in">
                                    <form method="POST">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-12 col-md-6 form-group">
                                                    <label>PROBLEM</label>
                                                    <div class="autocomplete_problem">
                                                        <input id="select_problem_e" type="text" name="problem"
                                                            placeholder="Search Problem" class="form-control text-field"
                                                            onkeyup="return allowed_alphanumeric(this.value,this.id),get_problem_healthreport_edit()">
                                                            <img style="float:right;display:none;position:absolute;left:455px; top: -55px; height: 206px; width: 206px;" id='problemloading' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                                    </div>
                                                    <input type="hidden" name="patient_ID"
                                                        class="form-control text-field patient_ID" id="patient_ID_ap" />
                                                    <input type="hidden" name="healthreport_problem_id"
                                                        class="form-control text-field" id="healthreport_problem_id" />
                                                    <span class="Problem_errormsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-3 form-group">
                                                    <label>ICD VERSION</label>
                                                    <div class="autocomplete_icdversion">
                                                        <input id="icdversion_e" type="text" name="icdversion"
                                                            placeholder="Search ICD version"
                                                            class="form-control text-field"
                                                            onkeyup="return allowed_alphanumeric(this.value,this.id),get_icdversion_healthreport_edit()">
                                                             <img style="float:right;display:none;position:absolute;left: 155px; top: -55px; height: 206px; width: 206px;" id='loadingicdversion' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                                    </div>
                                                    <span class="Icdversion_errormsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-3 form-group">
                                                    <label>ICD10 CODE</label>
                                                    <input type="text" name="icd10-code" value=""
                                                        class="form-control text-field" id="icd10_code_e"
                                                        placeholder="ICD10 Code"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                                    <span class="Icd10code_errormsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>SNOMED CT CODE</label>
                                                    <input type="text" name="snomed-ct-code" value=""
                                                        class="form-control text-field" id="snomed_ct_code_e"
                                                        placeholder="SnoMED CT Code"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                                    <span class="Snomedctcode_errormsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="problem_status"
                                                        id="problem_status_e" placeholder="Status">
                                                        <option value="status">---</option>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                        <option value="resolved">Resolved</option>
                                                    </select>
                                                    <span class="Problemstatus_errormsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-4 ">
                                                    <div class="form-group">
                                                        <label>DATETIME DIAGNOSIS</label>
                                                        <div class='input-group date'>
                                                           <input type="text" class="form-control edit_healthreport_datetime"
                                                        id="diagnosis_datetime_e" name="diagnosis_datetime">
                                                           <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                           </span>
                                                        </div>
                                                    </div>
                                                    <span class="Diagnosisdatetime_errormsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-4 pl-0">
                                                    <div class="form-group">
                                                        <label>DATETIME ONSET</label>
                                                        <div class='input-group date'>
                                                           <input type="text" class="form-control edit_healthreport_datetime"
                                                        id="onset_datetime_e" name="onset_datetime">
                                                           <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                           </span>
                                                        </div>
                                                    </div>
                                                    <span class="Onsetdatetime_errormsg" style="color:red"></span>
                                                </div>

                                                <div class="col-12 col-md-4 pl-0">
                                                    <div class="form-group">
                                                        <label>DATETIME CHANNGED</label>
                                                        <div class='input-group date'>
                                                           <input type="text" class="form-control edit_healthreport_datetime"
                                                        id="channged_datetime_e" name="channged_datetime">
                                                           <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                           </span>
                                                        </div>
                                                    </div>
                                                    <span class="Channgeddatetime_errormsg" style="color:red"></span>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label>NOTES</label>
                                                    <textarea class="w-100" id="problem_notes_e" name="notes" rows="5"
                                                        placeholder="Notes"></textarea>
                                                    <span class="notes_errormsg" style="color:red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center bottom-top">
                                            <button type="button" class="btn btn-default"
                                                onclick="return edit_problemlist();">Save</button>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">
                                            Allergy List</a>
                                    </h4>
                                </div>
                                <div id="collapse12" class="panel-collapse collapse">
                                    <form method="POST">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-12 col-md-6 form-group">
                                                    <label>ALLERGY TYPE</label>
                                                    <select class="form-control select_e2" name="allergy_type_e"
                                                        id="allergy_type_e" placeholder="Allergy">
                                                        <option selected="" value="">Select ALLERGY TYPE</option>
                                                        <option value="specificdrug">Specific Drug allergy</option>
                                                        <option value="drugclass">Drug Class allergy</option>
                                                        <option value="nondrug">Non-Drug allergy</option>
                                                        <option value="nkda">No Known Drug Allergies (NKDA)</option>
                                                    </select>

                                                    <input type="hidden" name="patient_ID"
                                                        class="form-control text-field patient_ID" id="patient_ID" />
                                                    <input type="hidden" name="healthreport_allergies_id"
                                                        class="form-control text-field "
                                                        id="healthreport_allergies_id" />
                                                    <span class="Allergytype_errormsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-6 form-group">
                                                    <label>DRUG ALLERGY</label>
                                                    <div class="autocomplete_drugallergy">
                                                        <input id="drug_allergy_e" type="text" autocomplete="off" name="drug_allergy_e"
                                                            placeholder="Search Drug Allergy"
                                                            class="form-control text-field"
                                                            onkeyup="return allowed_alphanumeric(this.value,this.id),get_suballergy_healthreports_edit()">
                                                         <img style="float:right;display:none;position:absolute;left: 455px; top: -55px; height: 206px; width: 206px;" id='loadingdrugallergy' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                                    </div>
                                                    <span class="Drugallergy_errormsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>REACTION</label>
                                                    <select class="form-control reaction select_e2" name="reaction_e"
                                                        id="reaction_e" placeholder="Reaction">
                                                        <option value="" selected=""></option>
                                                        <option value="Acute kidney failure">Acute kidney failure
                                                        </option>
                                                        <option value="Anaphylaxis">Anaphylaxis</option>
                                                        <option value="Arthralgia">Arthralgia</option>
                                                        <option value="Chills">Chills</option>
                                                        <option value="Cough">Cough</option>
                                                        <option value="Fever">Fever</option>
                                                        <option value="Headache">Headache</option>
                                                        <option value="Hives">Hives</option>
                                                        <option value="Malaise/fatigue">Malaise/fatigue</option>
                                                        <option value="Myalgia">Myalgia</option>
                                                        <option value="Nasal congestion">Nasal congestion</option>
                                                        <option value="Nausea">Nausea</option>
                                                        <option value="Pain/soreness at injection site">Pain/soreness at
                                                            injection site</option>
                                                        <option value="Rash">Rash</option>
                                                        <option value="Respiratory distress">Respiratory distress
                                                        </option>
                                                        <option value="Rhinorrhea">Rhinorrhea</option>
                                                        <option value="Shortness of breath/difficulty breathing">
                                                            Shortness of breath/difficulty breathing</option>
                                                        <option value="Sore throat">Sore throat</option>
                                                        <option value="Swelling">Swelling</option>
                                                    </select>
                                                    <span class="Reaction_errormsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>SEVERITY</label>
                                                    <select class="form-control select_e2" name="severity_e"
                                                        id="severity_e" placeholder="Severity">
                                                        <option value="" selected="">---------</option>
                                                        <option value="Fatal">Fatal</option>
                                                        <option value="Severe">Severe</option>
                                                        <option value="Moderate to severe">Moderate to severe</option>
                                                        <option value="Moderate">Moderate</option>
                                                        <option value="Mild to moderate">Mild to moderate</option>
                                                        <option value="Mild">Mild</option>
                                                        <option value="Unknown">Unknown</option>
                                                    </select>
                                                    <span class="Severity_errormsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="allergy_status"
                                                        id="allergy_status_e" placeholder="Status">
                                                        <option value="" selected="selected">Select Status</option>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select>
                                                    <span class="Allergystatus_errormsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label>NOTES</label>
                                                    <textarea class="w-100" id="allergy_notes_e" name="notes" rows="5"
                                                        placeholder="Notes"></textarea>
                                                    <span class="notes_errormsg" style="color:red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center bottom-top">
                                            <button type="button" class="btn btn-default"
                                                onclick="return allergy_edit();">Save</button>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="edit-lab-result" class="tab-pane fade">
                        <form method="POST">
                            <div class="row">
                                <div class="col-12 col-md-4 form-group">
                                    <label>LOINC CODE</label>
                                    <div class="autocomplete_loinccode">
                                        <input id="loinc_code_e" type="text" name="loinc_code"
                                            placeholder="Search Loinc Code" class="form-control text-field"
                                            onkeyup="return allowed_alphanumeric(this.value,this.id),get_loiniccode_edit()">
                                            <img style="float:right;display:none;position:absolute;left: 281px; top: -55px; height: 206px; width: 206px;" id='loadingloinc' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                    </div>
                                    <!-- <select class="form-control select_e2" id="loinc_code_e">
                                                                            <option value="">Select Lonic Code</option>
                                                                            <?php
                                                                            /* foreach ($loinc_code as $loinc_code_value) {
                                                                            ?>
                                                                            <option value="<?php echo $loinc_code_value->loinc_code_id ?>"><?php echo $loinc_code_value->loinc_code ?></option>
                                                                            <?php }*/ ?>
                                                                        </select> -->
                                    <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                        id="patient_ID" />
                                    <input type="hidden" name="healthreport_labresult_id"
                                        class="form-control text-field" id="healthreport_labresult_id" />
                                    <span class="Loniccode_errormsg" style="color:red"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label>DISCRIPTION</label>
                                    <textarea class="w-100" id="discription_e" name="discription" rows="5"
                                        placeholder="Discription"></textarea>
                                    <span class="Discription_errormsg" style="color:red"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 form-group">
                                    <label>RESULT VALUE</label>
                                    <input type="text" name="result-value" value="" class="form-control text-field"
                                        id="result_value_e" placeholder="Result value"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                    <span class="Resultvalue_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label>UNITS</label>
                                    <input type="text" name="units" value="" class="form-control text-field"
                                        id="units_e" placeholder="Units"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                    <span class="Units_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label>NORMAL RANGE</label>
                                    <input type="text" name="normal-range" value="" class="form-control text-field"
                                        id="normal_range_e" placeholder="NORMAL RANGE"
                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                    <span class="Normalrange_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label>ABNORMAL FLAG</label>
                                    <select class="form-control select_e2" name="cvx-code" id="cvx_code_e"
                                        placeholder="CVX-Code">
                                        <option value="">Select ABNORMAL FLAG</option>
                                        <option value="L -- Below low normal">L -- Below low normal</option>
                                        <option value="H -- Above high normal">H -- Above high normal</option>
                                        <option value="LL -- Below lower panic limits">LL -- Below lower panic limits</option>
                                        <option value="HH -- Above upper panic limits">HH -- Above upper panic limits</option>
                                        <option value="-- Below absolute low-off instrument scale"> -- Below absolute low-off instrument scale</option>
                                        <option value="-- Above absolute high-off instrument scale"> -- Above absolute high-off instrument scale</option>
                                        <option value="N -- Normal (applies to non-numeric results)">N -- Normal (applies to non-numeric results)</option>
                                        <option value="A -- Abnormal (applies to non-numeric results)">A -- Abnormal (applies to non-numeric results)</option>
                                        <option value="----">----</option>
                                        <option value="null -- No range defined, or normal ranges don't apply">null -- No range defined, or normal ranges don't apply</option>
                                        <option value="U -- Significant change up">U -- Significant change up</option>
                                        <option value="D -- Significant change down">D -- Significant change down</option>
                                        <option value="B -- Better--use when direction not relevant">B -- Better--use when direction not relevant</option>
                                        <option value="W -- Worse--use when direction not relevant">W -- Worse--use when direction not relevant</option>
                                        <option value="S -- Susceptible. Indicates for microbiology susceptibilities only.">S -- Susceptible. Indicates for microbiology susceptibilities only.</option>
                                        <option value="R -- Resistant. Indicates for microbiology susceptibilities only.">R -- Resistant. Indicates for microbiology susceptibilities only.</option>
                                        <option value="I -- Intermediate. Indicates for microbiology susceptibilities only.">I -- Intermediate. Indicates for microbiology susceptibilities only.</option>
                                        <option value="MS -- Moderately susceptible. Indicates for microbiology susceptibilities only.">MS -- Moderately susceptible. Indicates for microbiology susceptibilities only.</option>
                                        <option value="VS -- Very susceptible. Indicates for microbiology susceptibilities only.">VS -- Very susceptible. Indicates for microbiology susceptibilities only.</option>
                                    </select>
                                    <span class="Abnormalflag_errormsg" style="color:red"></span>
                                </div>
                            </div>
                            <div class="modal-footer text-center bottom-top">
                                <button type="button" class="btn btn-default"
                                    onclick="return edit_labresult();">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                    <div id="edit-imaging-order" class="tab-pane fade">
                        <form method="POST" enctype="multipart/form-data" id="imaging_order_form_e">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                                value="<?php echo $this->security->get_csrf_hash();?>">
                            <div class="row">
                                <div class="col-12 col-md-6 form-group">
                                    <label>CPT CODE</label>
                                    <div class="autocomplete_cpt_code">
                                        <input id="cpt_code_e" type="text" name="cpt_code" placeholder="Search CPT Code"
                                            class="form-control text-field" autocomplete="off"
                                            onkeyup="return allowed_alphanumeric(this.value,this.id),get_cptcode_edit();">
                                            <img style="float:right;display:none;position:absolute;left: 455px; top: -55px; height: 206px; width: 206px;" id='loadingcpt' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                    </div>

                                    <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                        id="patient_ID" />
                                    <input type="hidden" name="healthreport_imaging_id" class="form-control text-field"
                                        id="healthreport_imaging_id" />
                                    <span class="Cptcode_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label>DISCRIPTION</label>
                                    <input type="text" name="imaging_order_description" value=""
                                        class="form-control text-field" id="imaging_order_description_e"
                                        placeholder="Description">
                                    <span class="Description_errormsg" style="color:red"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 form-group">
                                    <label>ORDER STATUS</label>
                                    <select class="form-control" name="imaging_orders_status"
                                        id="imaging_order_status_e" placeholder="Order Status">
                                        <option value="" selected="">Select Order Status</option>
                                        <option value="orderentered">Order Entered</option>
                                        <option value="discountinued">Discountinued</option>
                                        <option value="inprogress">In Progress</option>
                                        <option value="resultrecived">Results Recived</option>
                                    </select>
                                    <span class="Orderstatus_errormsg" style="color:red"></span>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label>SCANNED IN RESULT</label>
                                    <input type="file" name="scanned_result" id="scanned_result_e">
                                    <span class="Scannedresult_errormsg" style="color:red"></span>
                                    <div class="edit_scanned_result_document"></div>
                                </div>
                                <div class="col-12 form-group">
                                    <label>DOCTOR COMMENTS</label>
                                    <textarea class="w-100" id="doctor_commentse" name="doctor_comments" rows="5"
                                        placeholder="Doctor comments"></textarea>
                                    <span class="Doctorcomments_errormsg" style="color:red"></span>
                                </div>
                            </div>
                            <div class="modal-footer text-center bottom-top">
                                <button type="submit" class="btn btn-default">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                    <div id="edit-e-prescription-medication" class="tab-pane fade">
                        <form method="POST">
                            <div class="row">
                                <div class="col-12 col-md-4 form-group">
                                    <label>DRUG NAME</label>
                                    <div class="autocomplete_drugname">
                                        <input id="drug_name_e" type="text"
                                            onkeyup="return allowed_alphanumeric(this.value,this.id),get_drugname_edit()"
                                            name="drug_name_e" placeholder="Search Drug Name"
                                            class="form-control text-field">
                                            <img style="float:right;display:none;position:absolute;left: 155px; top: -55px; height: 206px; width: 206px;" id='loadingdrugname' width="100px" src="<?php echo base_url('assets/inputloader.gif')?>"/>
                                    </div>
                                    <!-- <select class="form-control select_e2" id="drug_name_e" placeholder="Drug Name">
                                                                            <option value="" selected >Select Drug Name</option>
                                                                            <?php
                                                                            /*foreach ($drug as $key => $drugvalue) {
                                                                            ?>
                                                                            <option value="<?php //echo $drugvalue->drug_id ?>"><?php //echo $drugvalue->drug_name ?></option>
                                                                            <?php } */?>
                                                                        </select> -->
                                    <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                        id="patient_ID" />
                                    <input type="hidden" name="e_prescription_id" class="form-control text-field"
                                        id="e_prescription" />
                                    <span class="Drugname_errormsg" style="color:red;"></span>
                                </div>
                                <div class="col-12 col-md-4 form-check dis-flex text-center" style="margin-top: 35px;">
                                    <input class="form-check-input prn" type="checkbox" value="yes"
                                        id="defaultCheck1_e">
                                    <label class="form-check-label ml-10" for="defaultCheck1">PRN</label>
                                    <span class="PRN_errormsg" style="color:red;"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>SIG NOTE</label>
                                    <input type="text" onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                        name="sign-note" value="" class="form-control text-field" id="sign_note_e"
                                        placeholder="Sign Note">
                                    <span class="SignNote_errormsg" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 form-group">
                                    <label>SIG </label>
                                    <input type="text" name="sign" value="" class="form-control text-field" id="sign_e"
                                        placeholder="Sign" readonly="readonly">
                                    <span class="SIG_errormsg" style="color:red;"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>INDICATION </label>
                                    <input type="text" name="indication" value="" class="form-control text-field"
                                        id="indication_e" placeholder="Indication">
                                    <span class="Indication_errormsg" style="color:red;"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>STATUS</label>
                                    <select class="form-control" name="status" id="e_prescription_status_e"
                                        placeholder="Status">
                                        <option value="">Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <span class="Status_errormsg" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 form-group">
                                    <label>APPOINTMENT</label>
                                    <select class="form-control" name="appointment" id="appointment_e"
                                        placeholder="Appointment">
                                        <option selected="" disabled="disabled">Appointment</option>
                                        <?php
                                            foreach($appointment as $appointment_list){
                                        ?>
                                        <option value="<?=$appointment_list->schedule_id;?>">
                                            <?=$appointment_list->whens;?> <?=$appointment_list->from_time;?>
                                            <?=$appointment_list->appointment_type;?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="Appointment_errormsg" style="color:red;"></span>
                                </div>
                                <div class="col-12 col-md-4 ">
                                    <div class="form-group">
                                        <label>DATETIME PRESCRIBED</label>
                                        <div class='input-group date'>
                                           <input type="text" class="form-control edit_healthreport_datetime" id="prescribe_date_time_e"  name="date-time">
                                           <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                           </span>
                                        </div>
                                    </div>
                                    <span class="PRESCRIBED_errormsg" style="color:red;"></span>
                                </div>
                                <div class="col-12 col-md-4 ">
                                    <div class="form-group">
                                        <label>DATETIME STARTED TAKING</label>
                                        <div class='input-group date'>
                                           <input type="text" class="form-control edit_healthreport_datetime" id="started_taking_date_time_e" name="date-time">
                                           <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                           </span>
                                        </div>
                                    </div>
                                    <span class="STARTED_errormsg" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 pl-0">
                                    <div class="form-group">
                                        <label>DATETIME STOPPED TAKING</label>
                                        <div class='input-group date'>
                                           <input type="text" class="form-control edit_healthreport_datetime" id="stopped_taking_date_time_e" name="date-time">
                                           <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                           </span>
                                        </div>
                                    </div>
                                    <span class="STOPPED_errormsg" style="color:red;"></span>
                                </div>

                                <div class="col-12 col-md-4 form-group">
                                    <label>DISPENSE QUANTITY </label>
                                    <input type="number" min="1" name="dispense-quantity" value=""
                                        class="form-control text-field" id="dispense_quantity_e"
                                        placeholder="Dispense Quantity">
                                    <span class="Dispenseqty_errormsg" style="color:red;"></span>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label>DISPENSE PACKAGE </label>
                                    <input type="text" onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                        name="dispense-package" value="" class="form-control text-field"
                                        id="dispense_package_e" placeholder="Dispense Package">
                                    <span class="Dispensepkg_errormsg" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 form-group">
                                    <label>NUMBER REFILLS</label>
                                    <input type="number" min="1" name="number-refills" value=""
                                        class="form-control text-field" id="number_refills_e"
                                        placeholder="Number Refills">
                                    <span class="Numberrefills_errormsg" style="color:red;"></span>
                                </div>
                                <div class="col-12 col-md-6 form-check dis-flex text-center" style="margin-top: 35px;">
                                    <input class="form-check-input daw" type="checkbox" value="yes"
                                        id="defaultCheck2_e">
                                    <label class="form-check-label ml-10" for="defaultCheck2_e">Daw</label>
                                    <span class="Daw_errormsg" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 form-group">
                                    <label>PHARMACY NOTE</label>
                                    <input type="text" onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                        name="pharmacy-note" value="" class="form-control text-field"
                                        id="pharmacy_note_e" placeholder="Pharmacy Note">
                                    <span class="Pharmacynote_errormsg" style="color:red;"></span>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label>ORDER STATUS</label>
                                    <select class="form-control select_e2 e_prescription_orderstatus_e" name="status"
                                        id="order_status_e" placeholder="Status">
                                        <option value="" selected="">Select Order Status</option>
                                        <option value="Ordered">Ordered</option>
                                        <option value="Administered during visit">Administered during visit</option>
                                        <option value="Electronic eRx Sent">Electronic eRx Sent</option>
                                        <option value="Phoned into Pharmacy">Phoned into Pharmacy</option>
                                        <option value="Faxed to Pharmacy">Faxed to Pharmacy</option>
                                        <option value="Paper Rx">Paper Rx</option>
                                        <option value="Prescription Printed">Prescription Printed</option>
                                        <option value="Discontinued">Discontinued</option>
                                        <option value="Prescribed by other Dr">Prescribed by other Dr</option>
                                        <option value="Over the Counter">Over the Counter</option>
                                    </select>
                                    <span class="Orderstatus_errormsg" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label>NOTES</label>
                                    <textarea class="w-100" id="notes_e" name="notes" rows="5"
                                        placeholder="Notes"></textarea>
                                    <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                        id="patient_ID" />
                                    <span class="Notes_errormsg" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="modal-footer text-center bottom-top">
                                <button type="button" class="btn btn-default"
                                    onclick="return edit_e_prescription();">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                    <div id="edit-immunizations" class="tab-pane fade">
                        <div class="panel-group mt-15" id="accordion21">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion21" href="#collapse21">
                                            Step-1 : Select Vaccines</a>
                                    </h4>
                                </div>
                                <div id="collapse21" class="panel-collapse collapse in">
                                    <form method="POST">
                                        <div class="panel-body">
                                            <div class="row" style="padding: 10px;">
                                                <div class="col-12 col-md-4 form-group">
                                                    <select class="form-control Addselect_vaccination"
                                                        id="Addselect_vaccination_e"
                                                        onchange="return get_edit_vaccinesschedule(this.value);">
                                                        <option value="0">Select Vaccines</option>
                                                        <option value="birth">Birth - Year</option>
                                                        <option value="year">2-18 Years</option>
                                                        <option value="adult">Adult</option>
                                                        <option value="other">Other </option>
                                                    </select>
                                                    <input type="hidden" name="vaccines_e_ID"
                                                        class="form-control text-field vaccines_e_ID"
                                                        id="vaccines_e_ID" />
                                                    <input type="hidden" name="patient_ID"
                                                        class="form-control text-field patient_ID" id="patient_ID" />
                                                    <span class="Vacination_errormsg" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <!-- Birth-year -->
                                            <div class="select-vaccination">
                                                <div class="row birth add-box" style="padding: 10px;">
                                                    <div class="col-12 col-md-4 form-group">
                                                        <label>SCHEDULE</label>
                                                        <div class="autocomplete_schedule_e">
                                                            <input id="schedule_e"
                                                                onkeyup="return allowed_alphanumeric(this.value,this.id),search_vaccinesschedule_edit();"
                                                                type="text" name="schedule"
                                                                placeholder="Search SCHEDULE"
                                                                class="form-control text-field">
                                                        </div>
                                                        <span class="Schedule_errormsg" style="color:red;"></span>
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group">
                                                        <label>VACCINE</label>
                                                        <div class="autocomplete_vaccine_e">
                                                            <input id="vaccine_e"
                                                                onkeyup="return allowed_alphanumeric(this.value,this.id),search_vaccines_vaccine_edit()"
                                                                type="text" name="vaccine" placeholder="Search Vaccine"
                                                                class="form-control text-field">
                                                        </div>
                                                        <!-- <select class="form-control vaccine select_e2" name="vaccine" id="vaccine_e" placeholder="Vaccine">
                                                                                                <option selected="selected" value="">Select Vaccine</option>
                                                                                            </select> -->
                                                        <span class="Vaccine_errormsg" style="color:red;"></span>
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group">
                                                        <label>CVX CODE</label>
                                                        <div class="autocomplete_cvxcode">
                                                            <input id="immunizationscvx_code_vaccines_e"
                                                                onkeyup="return allowed_alphanumeric(this.value,this.id),get_immunizations_cvxcode_edit()"
                                                                type="text" name="cvx-code"
                                                                placeholder="Search CVX Code"
                                                                class="form-control text-field">
                                                        </div>
                                                        <span class="Cvxcode_errormsg" style="color:red;"></span>
                                                    </div>
                                                    <!-- <div class="col-12 col-md-4 form-group">
                                                                                            <label>CONSENT FORM</label>
                                                                                            <input type="text" name="consent-form" value="" class="form-control text-field consent_form"
                                                                                            id="consent_form" placeholder="Consent Form">
                                                                                            <span class="Consentform_errormsg" style="color:red;"></span>
                                                                                        </div> -->
                                                    <div class="col-12 col-md-4 form-group">
                                                        <label>VIS</label>
                                                        <input type="text" name="vis" value=""
                                                            class="form-control text-field vis" id="vis_e"
                                                            onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                                            placeholder="VIS">
                                                        <span class="Vis_errormsg" style="color:red;"></span>
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group">
                                                        <label>ADMINISTRETED ON</label>
                                                        <input type="text" name="administreted-on" value=""
                                                            class="form-control text-field administreted_on"
                                                            id="administreted_on_e" placeholder="Administered On"
                                                            disabled="disabled"
                                                            max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                                                        <span class="Administeredon_errormsg" style="color:red;"></span>
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group">
                                                        <label>ADMINISTRETED BY</label>
                                                        <input type="text" disabled="disabled" name="administreted-by"
                                                            value="<?php echo $this->session->userdata('fullname') ?>"
                                                            class="form-control text-field administreted_by"
                                                            id="administreted_by_e" placeholder="Administered By">
                                                        <span class="Administeredby_errormsg" style="color:red;"></span>
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group">
                                                        <label>STATUS</label>
                                                        <select class="form-control vaccinestatus" name="status"
                                                            id="vaccinestatus_e" placeholder="Status">
                                                            <option selected="" value=""> Select Status </option>
                                                            <option value="1">Active</option>
                                                            <option value="2">Deactive</option>
                                                        </select>
                                                        <span class="Vaccinesstatus_errormsg" style="color:red;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="button" class="btn btn-default"
                                                onclick="return edit_Vaccines();">Save</button>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion21" href="#collapse22">
                                            Step-2: Review and Sign</a>
                                    </h4>
                                </div>
                                <div id="collapse22" class="panel-collapse collapse">
                                    <form method="POST" enctype="multipart/form-data" id="reviewsing_form_e">
                                        <input type="hidden"
                                            name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                            value="<?php echo $this->security->get_csrf_hash(); ?>">

                                        <div class="panel-body">
                                            <p class="mt-5" style="color: #150aec;">Please distribute the Vaccine
                                                Information Statement (VIS) for each of the
                                                following vaccines and have the patient/legal guardian(s) review them:
                                            </p>
                                            <h4 style="background-color: #f1f1f1;padding:10px;">Upload Form / Files</h4>
                                            <div class="row" style="padding: 15px;">
                                                <div class="col-12 form-group">
                                                    <input type="file" multiple name="review_document_e"
                                                        id="review_document_e" class="review_document" />
                                                    <input type="hidden" name="old_review_document"
                                                        class="form-control text-field" id="old_review_document" />
                                                    <input type="hidden" name="patient_ID"
                                                        class="form-control text-field patient_ID" id="patient_ID" />
                                                    <input type="hidden" name="reviewsign_id"
                                                        class="form-control text-field" id="reviewsing_e_ID" />
                                                    <span style="color:red;" class="Reviewdocument_erorrmsg"></span>
                                                    <div class="edit_uploaddocument"></div>
                                                    <!-- <input type="file" id="real-file" style="display: none;" multiple />
                                                                                        <button type="button" class="btn btn-default" id="custom-button">CHOOSE A
                                                                                        FILE</button>
                                                                                        <span id="custom-text">No file chosen, yet.</span> -->
                                                </div>
                                            </div>
                                            <h4 style="background-color: #f1f1f1;padding:10px;">Sign Consnt Form</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="mt-5" style="color: #150aec;">My signature below signifies
                                                        that I have read and received information about the diseases and
                                                        vaccines listed below. I understand the benefits and risks of
                                                        the vaccines cited, and ask that the vaccine(s) listed below be
                                                        given to me or to the person named for whom I am authorized to
                                                        make this request.</p>
                                                </div>
                                            </div>
                                            <div class="sigPad">
                                                <div class="row" style="padding: 15px;">
                                                    <div class="form-group">
                                                        <label>PRINT NAME</label>
                                                        <input type="text" name="name"
                                                            class="form-control text-field typename printname_e" id="printname_e"
                                                            onkeyup="set_valueof_printname_e()">
                                                        <span class="Printname_errormsg" style="color:red;"></span>
                                                    </div>
                                                    <ul class="sigNav">
                                                        <li class="typeIt"><a href="#type-it" class="current">Type
                                                                It</a></li>
                                                        <li class="drawIt"><a href="#draw-it">Draw It</a></li>
                                                        <li class="clearButton"><a href="#clear">Clear</a></li>
                                                    </ul>
                                                    <div class="sig sigWrapper">
                                                        <div class="typed_e"></div>
                                                        <canvas class="pad_e" width="198" height="148"></canvas>
                                                        <input type="hidden" name="output" class="output">
                                                        <input type="hidden" name="singnature_data_e"
                                                            class="singnature_data_e">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-12"><a id="signedit" href="#"></a></div></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="mt-5" style="color: #150aec;"><b>I have read the vaccine
                                                            information statements and agree to the above statement and
                                                            acknowledging is my signature entered in this form.</b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="submit" class="btn btn-default">Save</button>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion21" href="#collapse23">
                                            Step-3: Record Vaccinations</a>
                                    </h4>
                                </div>
                                <div id="collapse23" class="panel-collapse collapse">
                                    <form method="POST">
                                        <div class="panel-body">
                                            <div class="row p-15" style="border-bottom:1px solid #ddd;">
                                                <div class="col-12 col-md-6 form-group">
                                                    <label>CREATE A RECORD FOR</label>
                                                    <select class="form-control select_e2" name="create-record"
                                                        id="record_vaccinations_create_record_e"
                                                        placeholder="Create a record for">
                                                        <option value="" select="selected">Select Create a record for
                                                        </option>
                                                        <option value="1">Create a record for</option>
                                                    </select>
                                                    <input type="hidden" name="patient_ID"
                                                        class="form-control text-field patient_ID" id="patient_ID" />
                                                    <input type="hidden" name="record_vaccinations_id"
                                                        class="form-control text-field" id="record_vaccinations_id" />
                                                    <span class="Createrecordfor_errormsg" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="row p-15" style="border-bottom:1px solid #ddd;">
                                                <div class="col-12 col-md-3 form-group">
                                                    <label>CVX Code</label>
                                                    <div class="autocomplete_record_vaccinations_cvx_code">
                                                        <input id="record_vaccinations_cvx_code_e"
                                                            onkeyup="return allowed_alphanumeric(this.value,this.id),get_record_vaccinations_cvx_code_edit()"
                                                            type="text" name="cvx-code" placeholder="Search  CVX Code"
                                                            class="form-control text-field">
                                                    </div>

                                                    <span class="CVX_code_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-3 form-group">
                                                    <label>NAME</label>
                                                    <input type="text" name="name" value=""
                                                        class="form-control text-field" id="record_vaccinations_name_e"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                                        placeholder="Name">
                                                    <span class="Name_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-3 form-group">
                                                    <label>CPT CODE</label>
                                                    <input type="text" name="cpt-code" value=""
                                                        class="form-control text-field"
                                                        id="record_vaccinations_cpt_code_e"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                                        placeholder="CPT Code">
                                                    <span class="CPT_CODE_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-3 form-group">
                                                    <label>MANUFACTURER</label>
                                                    <div class="autocomplete_manfacturer_e">
                                                        <input id="record_vaccinations_manfacturer_e" type="text"
                                                            name="record_vaccinations_manfacturer_e"
                                                            placeholder="Search MANUFACTURER"
                                                            class="form-control text-field" onkeyup="return allowed_alphanumeric(this.value,this.id),get_immunizations_manufacturer_edit()">
                                                    </div>
                                                    <span class="Manufacturer_errormsg" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="row p-15" style="border-bottom:1px solid #ddd;">
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>LOT NUMBER</label>
                                                    <input type="number" min="1" name="lot-num" value=""
                                                        class="form-control text-field"
                                                        id="record_vaccination_lot-num_e" placeholder="Lot Number">
                                                    <span class="LotNumber_errormsg" style="color:red;"></span>
                                                </div>

                                                <div class="col-12 col-md-4 form-group">

                                                    <input type="date" name="lot-num" value=""
                                                        class="form-control text-field"
                                                        id="record_vaccination_expirationdate_e"
                                                        placeholder="Lot expiration date"
                                                        max="<?php echo date('Y-m-d') ?>T<?php echo '00:00' ?>">
                                                    <span class="Lotexpirationdate_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>ADMINISTERED AMOUNT</label>
                                                    <input type="number" min="1" name="administered-amount"
                                                        class="form-control text-field" id="administered_amount_e"
                                                        placeholder="Administered Amount">
                                                    <span class="Administeredamount_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>ADMINISTERED UNITS</label>
                                                    <select class="form-control select_e2"
                                                        id="record_vaccination_administered_unit_e"
                                                        placeholder="Administered Unit">
                                                        <option value="">------------</option>
                                                        <option value="50% cell culture infectious dose">50% cell
                                                            culture infectious dose</option>
                                                        <option value="50% tissue culture infectious dose">50% tissue
                                                            culture infectious dose</option>
                                                        <option value="MicroGram [SI Mass Units]">MicroGram [SI Mass
                                                            Units]</option>
                                                        <option value="MicroLiter [SI Volume Units]">MicroLiter [SI
                                                            Volume Units]</option>
                                                        <option value="MilliEquivalent [Substance Units]">
                                                            MilliEquivalent [Substance Units]</option>
                                                        <option value="MilliGram [SI Mass Units]">MilliGram [SI Mass
                                                            Units]</option>
                                                        <option value="MilliLiter [SI Volume Units]">MilliLiter [SI
                                                            Volume Units]</option>

                                                    </select>
                                                    <span class="Administeredunit_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>VACCINE ROUTE</label>
                                                    <select class="form-control select_e2"
                                                        id="record_vaccination_vaccinate_route_e"
                                                        placeholder="Vaccinate Route">
                                                        <option value="1">Vaccinate Route</option>
                                                        <option value="2">ID (Intradermal)</option>
                                                        <option value="3">NS (Nasal)</option>
                                                    </select>
                                                    <span class="Vaccinateroute_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>VACCINE SITE</label>
                                                    <select class="form-control select_e2"
                                                        id="record_vaccination_vaccinate_site_e"
                                                        placeholder="Vaccinate Site">
                                                        <option value="1">Vaccinate Site</option>
                                                        <option value="2">LA (Left Upper Arm)</option>
                                                        <option value="3">LD (Left Deltoid)</option>
                                                    </select>
                                                    <span class="Vaccinatesite_errormsg" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="row p-15">
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>VACCINATION STATUS</label>
                                                    <select class="form-control select_e2"
                                                        id="record_vaccination_vaccinate_status_e"
                                                        placeholder="Vaccinate Status">
                                                        <option value="1">Complete</option>
                                                        <option value="2">Refused</option>
                                                        <option value="3">Not administered</option>
                                                        <option value="3">Partially administered</option>
                                                    </select>
                                                    <span class="Vaccinatestatus_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 ">
                                                    <div class="form-group">
                                                         <label>ADMINISTERED ON</label>
                                                        <div class='input-group date'>
                                                           <input type="text" class="form-control edit_healthreport_datetime"
                                                        id="record_vaccination_administred_on_e" name="date-time">
                                                           <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                           </span>
                                                        </div>
                                                    </div>
                                                    <span class="Administred_on_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>ORDERING DOCTOR</label>
                                                    <select class="form-control select_e2"
                                                        id="record_vaccination_ordering_doctor_e"
                                                        placeholder="Ordering Doctor">
                                                        <option selected="selected" disabled="disabled" value="">Select
                                                            Ordering Doctor</option>
                                                        <?php
                                                                                            foreach ($ordering_doctor as $ordering_doctor_list){
                                                                                            ?>
                                                        <option
                                                            value="<?php echo $ordering_doctor_list->firstname.' '.$ordering_doctor_list->lastname;?>">
                                                            <?php echo $ordering_doctor_list->firstname?>
                                                            <?php echo $ordering_doctor_list->lastname?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="Orderingdoctor_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>ADMINISTERED BY</label>
                                                    <input type="text" name="administreted-by"
                                                        value="<?php echo $this->session->userdata('fullname') ?>"
                                                        readonly="readonly" class="form-control text-field administreted_by"
                                                        id="record_vaccination_administered_by"
                                                        placeholder="Administered By">

                                                    <span class="Administeredby_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>ADMINISTERED AT</label>
                                                    <select class="form-control select_e2"
                                                        id="record_vaccination_administered_at_e"
                                                        placeholder="Administered At">
                                                        <option value="1">Administered At</option>
                                                        <option value="2">-----</option>
                                                        <option value="3">Primary Office</option>
                                                    </select>
                                                    <span class="Administeredat_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>VACCINATION INVENTORY LOT</label>
                                                    <select class="form-control select_e2" id="record_vaccination_inventory_lot_e"
                                                        >
                                                        <option value="" selected="" disabled="disabled">Vaccination Inevntory Lot</option>
                                                        <option value="2">-----</option>
                                                        <option value="3">Primary Office</option>
                                                    </select>
                                                    <span class="Inventorylot_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>RECORD TYPE</label>
                                                    <select class="form-control select_e2"
                                                        id="record_vaccination_record_type_e" placeholder="Record Type">
                                                        <option value="1">Record Type</option>
                                                        <option value="2">Historical information-source unspecified
                                                        </option>
                                                        <option value="3">Historical information-from other Provider
                                                        </option>
                                                        <option value="4">Historical information-from Parents recall
                                                        </option>
                                                        <option value="5">Historical information-from School record
                                                        </option>
                                                    </select>
                                                    <span class="Recordtype_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>FUNDING ELIGIBILITY</label>
                                                    <select class="form-control select_e2"
                                                        id="record_vaccination_funding_eligibility_e"
                                                        placeholder="Funding Eligibility">
                                                        <option value="1">Funding Eligibility</option>
                                                        <option value="2">Not VFC Eligible</option>
                                                        <option value="3">VFC eligible-Uninsured</option>
                                                        <option value="4">VFC eligible-Medicare/Medicaid Managed Care
                                                        </option>
                                                        <option value="5">Local Specific Eligibility</option>
                                                    </select>
                                                    <span class="Fundingeligibility_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>OBSERVED IMMUNITY</label>
                                                    <select class="form-control select_e2"
                                                        id="record_vaccination_observed_immunity_e"
                                                        placeholder="Observed Immunity">
                                                        <option value="1">Observed Immunity</option>
                                                        <option value="2">Acute poliomyelitis (disorder)</option>
                                                        <option value="3">Anthrax (disorder)</option>
                                                        <option value="4">Diphtheria (disorder)</option>
                                                        <option value="5">Disease due to Rotavirus (disorder)</option>
                                                    </select>
                                                    <span class="Observedimmunity_errormsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label>NOTES</label>
                                                    <textarea class="w-100" id="record_vaccination_notes_e"
                                                        name="record_vaccination_notes" rows="5"
                                                        placeholder="Notes"></textarea>
                                                    <span class="Notes_errormsg" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="button" class="btn btn-default"
                                                onclick="return edit_record_vaccinations()">Save</button>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="edit-summary" class="tab-pane fade">
                        <form method="POST">
                            <div class="row p-15">
                                <div class="col-12 form-group ml-10 mr-10">
                                    <label>SUMMARY</label>
                                    <textarea class="w-100" id="summary_description_e" name="summary" rows="5"
                                        placeholder="Summary"></textarea>
                                    <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                        id="patient_ID" />
                                    <input type="hidden" name="summary_id" class="form-control text-field"
                                        id="summary_id" />
                                    <span class="Summary_errormsg" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="modal-footer text-center bottom-top">
                                <button type="button" class="btn btn-default"
                                    onclick="return edit_summary();">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                    <div id="edit-document" class="tab-pane fade">
                        <div class="panel-group mt-15" id="accordion1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse4">
                                            Uploaded Documents</a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse in">
                                    <form method="POST" enctype="multipart/form-data" id="edit_document_form">
                                        <input type="hidden"
                                            name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-12 col-md-4 form-group ml-15 mb-10">
                                                    <label>SELECT DOCUMENT TYPE</label>
                                                    <select class="form-control" id="document_type_e"
                                                        name="document_type_e"
                                                        onchange="return hide_show_document_according_edit(this.text)">
                                                        <option value="">Select Document Type</option>
                                                        <option value="1">Locked Clinical Notes</option>
                                                        <option value="2">Signed Consent Forms</option>
                                                        <option value="3">Lab Result</option>
                                                        <option value="4">Amendments</option>
                                                    </select>
                                                    <input type="hidden" name="patient_ID"
                                                        class="form-control text-field patient_ID" id="patient_ID" />
                                                    <input type="hidden" name="healthreport_document_id_e"
                                                        class="form-control text-field healthreport_document_id_e"
                                                        id="healthreport_document_id_e" />
                                                    <span class="Documenttype_erorrmsg" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="mt-15">
                                                <div class="form-group">
                                                    <div class="file-loading">
                                                        <input id="file-1_e" type="file" multiple
                                                            class="file document_document_e"
                                                            data-overwrite-initial="false" data-min-file-count="2"
                                                            name="document_document_e">

                                                        <span class="Document_erorrmsg" style="color:red;"></span>
                                                    </div>
                                                </div>
                                                <div class="edit_upload_document"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="submit" class="btn btn-default">Save</button>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-default locked_clinical_notes_accordian_e" style="display: none;">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse5">
                                            Locked Clinical Notes</a>
                                    </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse">
                                    <form method="POST">
                                        <div class="panel-body">
                                            <div class="row" style="padding: 10px;">

                                                <div class="col-12 col-md-4 pl-0">
                                                    <div class="form-group">
                                                        <label>DATE OF SERVICE</label>
                                                        <div class='input-group date'>
                                                           <input type="text" class="form-control edit_healthreport_datetime"
                                                        id="date_of_service_e" name="date-time">
                                                           <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                           </span>
                                                        </div>
                                                        <input type="hidden" name="patient_ID" class="form-control text-field patient_ID" id="patient_ID" />
                                                        <input type="hidden" name="locked_id"
                                                        class="form-control text-field" id="locked_id" />
                                                    </div>
                                                    <span class="Dateofservice_erorrmsg" style="color:red"></span>
                                                </div>

                                                <div class="col-12 col-md-4 form-group">
                                                    <label>LOCKED BY</label>
                                                    <input type="text" name="locked-by"
                                                        value="<?php echo $this->session->userdata('fullname') ?>"
                                                        class="form-control text-field" class="form-control text-field"
                                                        id="lockedbye" placeholder="Locked By" readonly="readonly">
                                                    <input type="hidden" name=""
                                                        value="<?php echo $this->session->userdata('user_id'); ?>"
                                                        id="locked_by_e">
                                                    <span class="Lockedby_erorrmsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-4 pl-0">
                                                    <div class="form-group">
                                                        <label>LOCKED ON</label>
                                                        <div class='input-group date'>
                                                           <input type="text" name="Locked-on" class="form-control edit_healthreport_datetime" id="locked_on_e">
                                                           <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                           </span>
                                                        </div>
                                                    </div>
                                                    <span class="Lockedon_erorrmsg" style="color:red"></span>
                                                </div>

                                                <div class="col-12 col-md-4 form-group">
                                                    <label>ACTION</label>
                                                    <select class="form-control" name="action" id="lockedaction_e"
                                                        placeholder="Action">
                                                        <option value="" selected="selected">Selcted ACTION</option>
                                                        <option value="1">Accepted</option>
                                                        <option value="2">Decline</option>
                                                    </select>
                                                    <span class="Lockedaction_erorrmsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>STATUS</label>
                                                    <select class="form-control" name="status" id="lockedstatus_e"
                                                        placeholder="Status">
                                                        <option value="" selected="selected"></option>
                                                        <option value="1">Active</option>
                                                        <option value="2">Inactive</option>
                                                    </select>
                                                    <span class="Lockedstatus_erorrmsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-12 form-group">
                                                    <label>REASON</label>
                                                    <textarea class="w-100" id="locked_reason_e" name="locked_reason"
                                                        rows="5" placeholder="Reason"></textarea>
                                                    <span class="Lockedreason_erorrmsg" style="color:red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="button" class="btn btn-default"
                                                onclick="return edit_clinical_notes();">Save</button>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-default singedconsent_form_accordian_e" style="display: none;">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse61">
                                            Singed Consent Forms</a>
                                    </h4>
                                </div>
                                <div id="collapse61" class="panel-collapse collapse">
                                    <form method="POST">
                                        <div class="panel-body">
                                            <div class="row" style="padding: 10px;">
                                                <!-- <div class="col-12 col-md-4 form-group">
                                                                                        <label>CONSENT FORM</label>
                                                                                        <input type="text" name="consent-form" value="" class="form-control text-field"  id="singedconsent_form_e" placeholder="Consent Form">
                                                                                        <span class="Singedconsentform_errormsg" style="color:red;"></span>
                                                                                    </div>
                                                                                    -->
                                                <div class="col-12 col-md-4 pl-0">
                                                    <div class="form-group">
                                                        <label>DATE OF APPOINTMENT</label>
                                                        <div class='input-group date'>
                                                           <input type="text" class="form-control edit_healthreport_datetime" id="appointment_datetime_e" name="date-time">
                                                           <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                           </span>
                                                        </div>
                                                        <input type="hidden" name="patient_ID"
                                                        class="form-control text-field patient_ID" id="patient_ID" />
                                                        <input type="hidden" name="singed_consent_forms_id"
                                                        class="form-control text-field " id="singed_consent_forms_id" />
                                                    </div>
                                                    <span class="Appointment_datetime_erorrmsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-4 ">
                                                    <div class="form-group">
                                                         <label>DATE OF SIGNATURE</label>
                                                        <div class='input-group date'>
                                                           <input type="text" class="form-control edit_healthreport_datetime"
                                                        id="singnature_date_e" name="date-time">
                                                           <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                           </span>
                                                        </div>
                                                    </div>
                                                    <span class="Singnature_date_erorrmsg" style="color:red"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>ACTION</label>
                                                    <select class="form-control" name="action" id="singnature_action_e"
                                                        placeholder="Action">
                                                        <option value="" selected="selected">Selcted ACTION</option>
                                                        <option value="1">Accepted</option>
                                                        <option value="2">Decline</option>
                                                    </select>
                                                    <span class="singnature_action_erorrmsg" style="color:red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="button" class="btn btn-default"
                                                onclick="return edit_singed_consent();">Save</button>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-default lab_result_accordian_e" style="display: none;">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse7">
                                            Lab Result</a>
                                    </h4>
                                </div>
                                <div id="collapse7" class="panel-collapse collapse">
                                    <form method="POST">
                                        <div class="panel-body">
                                            <div class="row" style="padding: 10px;">
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>LAB</label>
                                                    <input type="text" name="lab" value=""
                                                        class="form-control text-field" id="document_lab_e"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                                        placeholder="Lab">
                                                    <input type="hidden" name="patient_ID"
                                                        class="form-control text-field patient_ID" id="patient_ID" />
                                                    <input type="hidden" name="document_labresult_id"
                                                        class="form-control text-field" id="document_labresult_id" />
                                                    <span class="Documnetlab_erorrmsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 ">
                                                    <div class="form-group">
                                                         <label>DATE</label>
                                                        <div class='input-group date'>
                                                           <input type="text" class="form-control edit_healthreport_datetime"
                                                        id="document_labdate_time_e" name="date-time">
                                                           <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                           </span>
                                                        </div>
                                                    </div>
                                                    <span class="Documnetdate_erorrmsg" style="color:red;"></span>
                                                </div>

                                                <div class="col-12 col-md-4 form-group">
                                                    <label>ACTION</label>
                                                    <select class="form-control" name="action" id="document_labaction_e"
                                                        placeholder="Action">
                                                        <option value="" selected="selected">Selcted ACTION</option>
                                                        <option value="1">Accepted</option>
                                                        <option value="2">Decline</option>
                                                    </select>
                                                    <span class="Documnetlabaction_erorrmsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>ABNORMAL</label>
                                                    <select class="form-control" name="abnormal" id="document_abnormal_e" placeholder="Abnormal">
                                                        <option value="" selected="">Select ABNORMAL</option>
                                                        <option value="1">Yes</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                    <span class="Documnetabnormal_erorrmsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>RESULT COUNT</label>
                                                    <input type="number" min="1" name="result-count" value=""
                                                        class="form-control text-field" id="document_result_count_e"
                                                        placeholder="Result Count">
                                                    <span class="Documnetresultcount_erorrmsg"
                                                        style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>TEST</label>
                                                    <input type="text" name="test" value=""
                                                        class="form-control text-field" id="document_test_e"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id);"
                                                        placeholder="test">
                                                    <span class="Documnettest_erorrmsg" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="button" class="btn btn-default"
                                                onclick="return edit_lab_result();">Save</button>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-default amendments_accordian_e" style="display: none;">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse8">
                                            Amendments</a>
                                    </h4>
                                </div>
                                <div id="collapse8" class="panel-collapse collapse">
                                    <form method="POST" enctype="multipart/form-data" accept-charset="utf-8"
                                        id="amendments_form_e">
                                        <div class="panel-body">
                                            <div class="row p-15">
                                                <!-- <div class="col-12 col-md-4 form-group">
                                                    <label>AMENDMENTS DOCUMENT</label><br>
                                                    <div style="margin-top: 10px">
                                                        <input type="file" multiple id="amendments_doc_e"
                                                            name="amendments_doc_e" />
                                                        <span class="Amendmentsdoc_erorrmsg" style="color:red;"></span>
                                                        <input type="hidden" name="patient_ID"
                                                            class="form-control text-field patient_ID"
                                                            id="patient_ID" />

                                                    </div> -->
                                                    <!--  <input type="file" id="real-file" style="display: none;" multiple />
                                                                                        <button type="button" class="btn btn-default" id="custom-button">CHOOSE A
                                                                                        FILE</button>
                                                                                        <span id="custom-text">No file chosen, yet.</span>
                                                </div>-->
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>AMENDMENTS SOURCE</label>
                                                    <input type="text" name="amendment_source_e" value=""
                                                        class="form-control text-field" id="amendment_source_e"
                                                        placeholder="Amendment Source"
                                                        onkeyup="return allowed_alphanumeric(this.value,this.id);">
                                                    <span class="Amendment_source_erorrmsg" style="color:red;"></span>
                                                     <input type="hidden" name="amdments_id"
                                                            class="form-control text-field" id="amdments_id" />
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <label>STATUS</label>
                                                    <select class="form-control" id="amendment_status_e"
                                                        placeholder="Status" name="amendment_status_e">
                                                        <option value="">Status</option>
                                                        <option value="2">Accepted </option>
                                                        <option value="3">Denied</option>
                                                    </select>
                                                    <span class="Amendment_status_erorrmsg" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="row p-15">
                                                <div class="col-12 col-md-4 ">
                                                    <div class="form-group">
                                                        <label>REQUEST DATE</label>
                                                        <div class='input-group date'>
                                                           <input type="text" class="form-control edit_healthreport_datetime"
                                                        id="amdments_date_time_e" name="amdments_date_time_e">
                                                           <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                           </span>
                                                        </div>
                                                    </div>
                                                    <span class="Amdments_date_time_erorrmsg" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 col-md-4 ">
                                                    <div class="form-group">
                                                        <label>PROCESSED DATE</label>
                                                        <div class='input-group date'>
                                                           <input type="text" class="form-control edit_healthreport_datetime"
                                                        id="amdmentsproccess_date_time_e"
                                                        name="amdmentsproccess_date_time_e">
                                                           <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                           </span>
                                                        </div>
                                                    </div>
                                                    <span class="Amdmentsproccess_date_time_erorrmsg" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--    <div class="modal-footer text-center">
                                                                <button type="submit" class="btn btn-default">Save</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div> -->
                    </div>
                    <div id="edit-record" class="tab-pane fade">
                        <form>
                            <div class="row p-25">
                                <div class="col-12 col-md-6 form-group">
                                    <label>DOCTOR NAME</label>
                                    <select class="form-control" id="doctor_name" name="doctor_name">
                                        <option value="">Select Doctor</option>
                                        <?php foreach($doctors as $doctors_list){
                                                                            ?>
                                        <option value="<?php echo $doctors_list->user_id; ?>">
                                            <?php echo $doctors_list->firstname." ".$doctors_list->lastname; ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="patient_ID" class="form-control text-field patient_ID"
                                        id="patient_ID" />
                                    <span class="Doctorname_errormsg" style="color:red;"></span>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label>DATE&TIME</label>
                                    <input type="datetime-local" class="form-control" id="healtrecord_date_time_e"
                                        name="healtrecord_date_time">
                                    <span class="Healtrecorddatetime_errormsg" style="color:red;"></span>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label>PATIENT NAME</label>
                                    <input type="text" name="patient-name" value="" class="form-control text-field"
                                        id="patient_name_e" placeholder="Patient Name" disabled="disabled">
                                    <span class="Patientname_errormsg" style="color:red;"></span>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label>UPDATE BY</label>
                                    <input type="text" name="upload-by" value="" class="form-control text-field"
                                        id="updated_by" placeholder="Update By">
                                    <span class="Updatedby_errormsg" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="modal-footer text-center bottom-top">
                                <button type="button" class="btn btn-default"
                                    onclick="return save_healthrecord();">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                    <form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/Chart.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
    integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"
    type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/health_report/') ?>signature.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
<script src="<?php echo base_url('assets/js/health_report/') ?>chart.bundle.js" type="text/javascript"></script>
<!-- <script src="<?php //echo base_url('assets/js/health_report/') ?>chart-line.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.add_health_record_datetime').datetimepicker({
            "format": 'Y-MM-DD h:mm:ss A',
             maxDate: new Date
        });
    });

    $(document).ready(function() {
        $('.edit_healthreport_datetime').datetimepicker({
            "format": 'Y-MM-DD h:mm:ss A',
            maxDate: new Date
        });
    });
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('.select_e2').select2({
        closeOnSelect: true,
        tags: true,
        dropdownParent: $('#hospital-record-edit')
    });
});
</script>
<script>
function graph(label,tem,h,bl,rp,ox,height,weight,bmi,pain,smoking_status,head_circumference,glucose_by_glucometer){
  var ctx = document.getElementById("AreaChart4");
//  console.log(label);
  //console.log(data);
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: label,
      type: 'line',
      datasets: [{
        data: tem,
        label: 'Degree',
        backgroundColor: 'transparent',
        borderColor: '#ff6666',
        borderWidth: '3',
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'transparent',
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#7886a0',
        bodyFontColor: '#7886a0',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });


  var ctx = document.getElementById("AreaChart5");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: label,
      type: 'line',
      datasets: [{
        data: h,
        label: 'BPM',
        backgroundColor: 'transparent',
        borderColor: '#467fcf',
        borderWidth: '3',
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'transparent',
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#7886a0',
        bodyFontColor: '#7886a0',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  var ctx = document.getElementById("AreaChart6");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: label,
      type: 'line',
      datasets: [{
        data: bl,
        label: 'mmHg',
        backgroundColor: 'transparent',
        borderColor: '#6b6b6b',
        borderWidth: '3',
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'transparent',
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#7886a0',
        bodyFontColor: '#7886a0',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  var ctx = document.getElementById("AreaChart7");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: label,
      type: 'line',
      datasets: [{
        data: rp,
        label: 'rpm',
        backgroundColor: 'transparent',
        borderColor: '#ffca4a',
        borderWidth: '3',
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'transparent',
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#7886a0',
        bodyFontColor: '#7886a0',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });

  var ctx = document.getElementById("AreaChart8");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: label,
      type: 'line',
      datasets: [{
        data: ox,
        label: '%',
        backgroundColor: 'transparent',
        borderColor: '#0d9404',
        borderWidth: '3',
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'transparent',
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#7886a0',
        bodyFontColor: '#7886a0',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });

  var ctx = document.getElementById("AreaChart9");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: label,
      type: 'line',
      datasets: [{
        data: height,
        label: 'in',
        backgroundColor: 'transparent',
        borderColor: '#ec0867',
        borderWidth: '3',
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'transparent',
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#7886a0',
        bodyFontColor: '#7886a0',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  var ctx = document.getElementById("AreaChart10");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: label,
      type: 'line',
      datasets: [{
        data: weight,
        label: 'lbs',
        backgroundColor: 'transparent',
        borderColor: '#985d03',
        borderWidth: '3',
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'transparent',
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#7886a0',
        bodyFontColor: '#7886a0',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  var ctx = document.getElementById("AreaChart11");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: label,
      type: 'line',
      datasets: [{
        data: bmi,
        label: 'kg/m2',
        backgroundColor: 'transparent',
        borderColor: '#0bd7d3',
        borderWidth: '3',
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'transparent',
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#7886a0',
        bodyFontColor: '#7886a0',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  var ctx = document.getElementById("AreaChart12");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: label,
      type: 'line',
      datasets: [{
        data: pain,
        label: '',
        backgroundColor: 'transparent',
        borderColor: '#9870c3',
        borderWidth: '3',
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'transparent',
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#7886a0',
        bodyFontColor: '#7886a0',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  // var ctx = document.getElementById("AreaChart13");
  // var myChart = new Chart(ctx, {
  //   type: 'line',
  //   data: {
  //     labels: label,
  //     type: 'line',
  //     datasets: [{
  //       data: smoking_status,
  //       label: 'smoking status',
  //       backgroundColor: 'transparent',
  //       borderColor: '#ce574a',
  //       borderWidth: '3',
  //       pointBorderColor: 'transparent',
  //       pointBackgroundColor: 'transparent',
  //     }]
  //   },
  //   options: {
  //     maintainAspectRatio: false,
  //     legend: {
  //       display: false
  //     },
  //     responsive: true,
  //     tooltips: {
  //       mode: 'index',
  //       titleFontSize: 12,
  //       titleFontColor: '#7886a0',
  //       bodyFontColor: '#7886a0',
  //       backgroundColor: '#fff',
  //       titleFontFamily: 'Montserrat',
  //       bodyFontFamily: 'Montserrat',
  //       cornerRadius: 3,
  //       intersect: false,
  //     },
  //     scales: {
  //       xAxes: [{
  //         gridLines: {
  //           color: 'transparent',
  //           zeroLineColor: 'transparent'
  //         },
  //         ticks: {
  //           fontSize: 2,
  //           fontColor: 'transparent'
  //         }
  //       }],
  //       yAxes: [{
  //         display: false,
  //         ticks: {
  //           display: false,
  //         }
  //       }]
  //     },
  //     title: {
  //       display: false,
  //     },
  //     elements: {
  //       line: {
  //         borderWidth: 1
  //       },
  //       point: {
  //         radius: 4,
  //         hitRadius: 10,
  //         hoverRadius: 4
  //       }
  //     }
  //   }
  // });
  // var ctx = document.getElementById("AreaChart14");
  // var myChart = new Chart(ctx, {
  //   type: 'line',
  //   data: {
  //     labels: label,
  //     type: 'line',
  //     datasets: [{
  //       data: head_circumference,
  //       label: 'in',
  //       backgroundColor: 'transparent',
  //       borderColor: '#519da9',
  //       borderWidth: '3',
  //       pointBorderColor: 'transparent',
  //       pointBackgroundColor: 'transparent',
  //     }]
  //   },
  //   options: {
  //     maintainAspectRatio: false,
  //     legend: {
  //       display: false
  //     },
  //     responsive: true,
  //     tooltips: {
  //       mode: 'index',
  //       titleFontSize: 12,
  //       titleFontColor: '#7886a0',
  //       bodyFontColor: '#7886a0',
  //       backgroundColor: '#fff',
  //       titleFontFamily: 'Montserrat',
  //       bodyFontFamily: 'Montserrat',
  //       cornerRadius: 3,
  //       intersect: false,
  //     },
  //     scales: {
  //       xAxes: [{
  //         gridLines: {
  //           color: 'transparent',
  //           zeroLineColor: 'transparent'
  //         },
  //         ticks: {
  //           fontSize: 2,
  //           fontColor: 'transparent'
  //         }
  //       }],
  //       yAxes: [{
  //         display: false,
  //         ticks: {
  //           display: false,
  //         }
  //       }]
  //     },
  //     title: {
  //       display: false,
  //     },
  //     elements: {
  //       line: {
  //         borderWidth: 1
  //       },
  //       point: {
  //         radius: 4,
  //         hitRadius: 10,
  //         hoverRadius: 4
  //       }
  //     }
  //   }
  // });
  var ctx = document.getElementById("AreaChart15");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: label,
      type: 'line',
      datasets: [{
        data: glucose_by_glucometer,
        label: '',
        backgroundColor: 'transparent',
        borderColor: '#3f4dff',
        borderWidth: '3',
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'transparent',
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#7886a0',
        bodyFontColor: '#7886a0',
        backgroundColor: '#ccc',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /* Chartjs (#resolved-complaints) */
  var ctx = document.getElementById("resolved-complaints");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
      type: 'line',
      datasets: [{
        data: [1, 7, 3, 9, 4, 5, 2, 4, 1, 0],
        label: 'Resolved-complaints',
        backgroundColor: 'rgba(70, 127, 207, 0.8)',
        borderColor: 'rgba(70, 127, 207)',
      }, ]
    },
    options: {
      maintainAspectRatio: true,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        cornerRadius: 0,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 2
        },
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /* Chartjs (#resolved-complaints) */
  var ctx = document.getElementById("resolved-complaints2");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
      type: 'line',
      datasets: [{
        data: [5, 2, 4, 1, 0, 1, 7, 3, 9, 4, ],
        label: 'Resolved-complaints',
        backgroundColor: 'rgba(94, 186, 0, 0.8)',
        borderColor: 'rgb(94, 186, 0)',
      }, ]
    },
    options: {
      maintainAspectRatio: true,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        cornerRadius: 0,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 2
        },
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });

  //Chart12
        var options = {
            chart: {
                height: 350,
                type: 'line',
                shadow: {
                    enabled: true,
                    color: '#000',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 1
                },
                toolbar: {
                    show: false
                }
            },
            colors: ['#77B6EA', '#545454'],
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                    name: "High - 2013",
                    data: [28, 29, 33, 36, 32, 32, 33]
                },
                {
                    name: "Low - 2013",
                    data: [12, 11, 14, 18, 17, 13, 13]
                }
            ],
            title: {
                text: 'Average High & Low Temperature',
                align: 'left'
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            markers: {

                size: 6
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                title: {
                    text: 'Month'
                }
            },
            yaxis: {
                title: {
                    text: 'Temperature'
                },
                min: 5,
                max: 40
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#chart12"),
            options
        );

        chart.render();

  //Radial chart
  var options = {
    chart: {
      type: 'radialBar',
      background: 'transparent',
      stroke: "#fff",
      color: "#fff"
    },
    plotOptions: {
      responsive: [{
        breakpoint: undefined,
        options: {},
      }],
      radialBar: {
        size: undefined,
        inverseOrder: false,
        startAngle: 0,
        endAngle: 360,
        offsetX: 0,
        offsetY: 0,
        hollow: {
          margin: 5,
          size: '50%',
          background: 'transparent',
          image: undefined,
          imageWidth: 150,
          imageHeight: 150,
          imageOffsetX: 0,
          imageOffsetY: 0,
          imageClipped: true,
          position: 'front',
          dropShadow: {
            enabled: false,
            top: 0,
            left: 0,
            blur: 3,
            opacity: 0.5
          }
        },
        track: {
          show: true,
          startAngle: undefined,
          endAngle: undefined,
          background: '#f9f9f9',
          strokeWidth: '97%',
          opacity: 1,
          margin: 5,
          dropShadow: {
            enabled: false,
            top: 0,
            left: 0,
            blur: 3,
            opacity: 0.5
          }
        },
        dataLabels: {
          show: true,
          name: {
            show: true,
            fontSize: '18px',
            fontFamily: undefined,
            color: undefined,
            offsetY: -10
          },
          value: {
            show: true,
            fontSize: '16px',
            fontFamily: undefined,
            color: undefined,
            offsetY: 16,
            formatter: function(val) {
              return val + '%'
            }
          },
          total: {
            show: false,
            label: 'Total',
            color: '#373d3f',
            formatter: function(w) {
              return w.globals.seriesTotals.reduce((a, b) => {
                return a + b
              }, 0) / w.globals.series.length + '%'
            }
          }
        }
      }
    },
    stroke: {
      lineCap: "round"
    },
    series: [44, 55, 67, 83],
    labels: ['Existing Customers', 'New Customers', 'Visiting Customers', 'Employes'],
    colors: ['#467fcf', '#5eba00', '#ffca4a', '#ff6666'],
  }
  var chart = new ApexCharts(document.querySelector("#pieChart"), options);
  chart.render();
  //Radial chart


  /*--Apex charts--*/
  var options = {
    chart: {
      height: 300,
      type: 'bar',
    },
    plotOptions: {
      bar: {
        horizontal: true,
      }
    },
    dataLabels: {
      enabled: false
    },
    series: [{
      name: 'Defect Rate',
      data: [48, 68, 57, 48, 79, 84, 85, 89, 158, 102, 325, 78]
    }],
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    },
    yaxis: {},
    colors: ['#467fcf'],
    tooltip: {}
  }
  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
}

</script>
<script type="text/javascript">
function createPDF() {
    var sTable = document.getElementById('widthpdf').innerHTML;
    var style = "<style>";
    style = style + "table {width: 1024px;font: 17px Calibri;}";
    style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
    style = style + "padding: 2px 3px;text-align: center;}";
    style = style + "</style>";
    // CREATE A WINDOW OBJECT.
    var win = window.open('', '', 'height=1024,width=1024');
    win.document.write('<html><head>');
    win.document.write('<title>Profile</title>'); // <title> FOR PDF HEADER.
    win.document.write(style); // ADD STYLE INSIDE THE HEAD TAG.
    win.document.write('</head>');
    win.document.write('<body>');
    win.document.write(sTable); // THE TABLE CONTENTS INSIDE THE BODY TAG.
    win.document.write('</body></html>');
    win.document.close(); // CLOSE THE CURRENT WINDOW.
    win.print(); // PRINT THE CONTENTS.
}
</script>
<script type="text/javascript">
function hide_show_document_according(document_type) {
    var document_type = "";
    document_type = $("#document_type option:selected").text();
    console.log(document_type);
    if (document_type == "Locked Clinical Notes") {
        $(".locked_clinical_notes_accordian").show();
        $(".singedconsent_form_accordian").hide();
        $(".lab_result_accordian").hide();
        $(".amendments_accordian").hide();

    } else if (document_type == "Signed Consent Forms") {
        $(".singedconsent_form_accordian").show();
        $(".lab_result_accordian").hide();
        $(".amendments_accordian").hide();
        $(".locked_clinical_notes_accordian").hide();
    } else if (document_type == "Lab Result") {
        $(".lab_result_accordian").show();
        $(".singedconsent_form_accordian").hide();
        $(".amendments_accordian").hide();
        $(".locked_clinical_notes_accordian").hide();
    } else if (document_type == "Amendments") {
        $(".amendments_accordian").show();
        $(".singedconsent_form_accordian").hide();
        $(".lab_result_accordian").hide();
        $(".locked_clinical_notes_accordian").hide();
    }else if (document_type =="Select Document Type"){
        $(".locked_clinical_notes_accordian").hide();
        $(".singedconsent_form_accordian").hide();
        $(".lab_result_accordian").hide();
        $(".amendments_accordian").hide();
    }
    return document_type;
}

function hide_show_document_according_edit(document_type) {
    document_type = $("#document_type_e option:selected").text();
    console.log(document_type);
    if (document_type == "Locked Clinical Notes") {
        $(".locked_clinical_notes_accordian_e").show();
        $(".singedconsent_form_accordian_e").hide();
        $(".lab_result_accordian_e").hide();
        $(".amendments_accordian_e").hide();

    } else if (document_type == "Signed Consent Forms") {
        $(".singedconsent_form_accordian_e").show();
        $(".lab_result_accordian_e").hide();
        $(".amendments_accordian_e").hide();
        $(".locked_clinical_notes_accordian_e").hide();
    } else if (document_type == "Lab Result") {
        $(".lab_result_accordian_e").show();
        $(".singedconsent_form_accordian_e").hide();
        $(".amendments_accordian_e").hide();
        $(".locked_clinical_notes_accordian_e").hide();
    } else if (document_type == "Amendments") {
        $(".amendments_accordian_e").show();
        $(".singedconsent_form_accordian_e").hide();
        $(".lab_result_accordian_e").hide();
        $(".locked_clinical_notes_accordian_e").hide();
    }
    return document_type;
}
</script>
<script>
//var currentTab = 0;
$(function() {
    $('.changetabbutton').click(function(e) {
        if ($(".patient_ID").val() =="") {
            $(".Patient_errormsg").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            setTimeout(function(){ $(".Patient_errormsg").hide(); }, 5000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
        }
        if ($("#temp").val() =="" ) {
            $(".alert-errormessge").show("slow");
            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Temperature In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
        }else{
            if ($("#temp").val().replace(/[^0-9\.]/g, '') == false) {

                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in Temprature In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
                $(".modal-body").animate({ scrollTop: 0 }, "slow");
                return false;
            }
        }
        if ($("#heart-rate").val() == "") {
            $(".alert-errormessge").show("slow");
            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Heart  Rate In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
        }else{
            if ($("#heart-rate").val().replace(/[^0-9\.]/g, '') == false) {

                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in Heart Rate In Vital Sign. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
                $(".modal-body").animate({ scrollTop: 0 }, "slow");
                return false;
            }
        }
        if ($("#blood-presure").val() == "") {
            $(".alert-errormessge").show("slow");
            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Blood  Pressure In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
        }else{
            if ($("#blood-presure").val().replace(/[^0-9\.]/g, '') == false) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Blood Please Enter only Number OR Decinmal value in Blood Presure In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                setTimeout(function() { $(".aalert-danger").hide("slow"); }, 10000);
                $(".modal-body").animate({ scrollTop: 0 }, "slow");
                return false;
            }
        }
        if ($("#respiratory-rate").val() == "") {
            $(".alert-errormessge").show("slow");
            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Respiratory Rate In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
        }else{
            if ($("#respiratory-rate").val().replace(/[^0-9\.]/g, '') == false) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in Respiratory In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
                $(".modal-body").animate({ scrollTop: 0 }, "slow");
                return false;
            }
        }
        if ($("#oxygen-saturation").val() == "") {
            $(".alert-errormessge").show("slow");
            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter OXYGEN SATURATION In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
        }else{
            if ($("#oxygen-saturation").val().replace(/[^0-9\.]/g, '') == false) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in OXYGEN SATURATION In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
                $(".modal-body").animate({ scrollTop: 0 }, "slow");
                return false;
            }
        }
        if ($("#height").val() == "") {
            $(".alert-errormessge").show("slow");
            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter HEIGHT In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;

        }else{
            if ($("#height").val().replace(/[^0-9\.]/g, '') == false) {
                    $(".alert-errormessge").show("slow");
                    $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in HEIGHT In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
                    $(".modal-body").animate({ scrollTop: 0 }, "slow");
                    return false;
            }
        }
        if ($("#weight").val() == "") {
            $(".alert-errormessge").show("slow");
            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter WEIGHT In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;

        }else{
            if ($("#weight").val().replace(/[^0-9\.]/g, '') == false) {
                    $(".alert-errormessge").show("slow");
                    $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in WEIGHT.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
                    $(".modal-body").animate({ scrollTop: 0 }, "slow");
                    return false;
            }
        }
        if ($("#bmi").val() == "") {
            $(".alert-errormessge").show("slow");
            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter BMI In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;

        }else{
            if ($("#bmi").val().replace(/[^0-9\.]/g, '') == false) {
                    $(".alert-errormessge").show("slow");
                    $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in BMI.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
                    $(".modal-body").animate({ scrollTop: 0 }, "slow");
                    return false;
            }
        }
        if ($("#pain").val() == "") {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter PAIN In Vital Sign.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
                $(".modal-body").animate({ scrollTop: 0 }, "slow");
                return false;
        }else{
            if ($("#pain").val().replace(/[^0-9\.]/g, '') == false) {
                    $(".alert-errormessge").show("slow");
                    $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in PAIN.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
                    $(".modal-body").animate({ scrollTop: 0 }, "slow");
                    return false;
            }
        }

        /* if (smoking == "") {
        $(".Smoking_errormsg").text("Please Enter Smoking Status .");
        setTimeout(function(){ $(".Smoking_errormsg").hide(); }, 5000);
        return false;

        }else{
            if (weight.replace("^[a-zA-Z]+$", '') == false) {
                $(".Smoking_errormsg").text("Please Enter only Alphabets.");
                setTimeout(function(){ $(".Smoking_errormsg").hide(); }, 5000);
                return false;
            }
        } */

        if ($("#head-circumfernce").val() == "") {
            $(".alert-errormessge").show("slow");
            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter HEAD CIRCUMFERENCE In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;

        }else{
            if ($("#head-circumfernce").val().replace(/[^0-9\.]/g, '') == false) {
                    $(".alert-errormessge").show("slow");
                    $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in HEAD CIRCUMFERENCE.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
                    $(".modal-body").animate({ scrollTop: 0 }, "slow");
                    return false;
            }
        }

        if ($("#glucose-glucometer").val() == "") {
            $(".alert-errormessge").show("slow");
            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter BLOOD SUGAR/BLOOD GLUCOSE In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;

        }else{
            if ($("#glucose-glucometer").val().replace(/[^0-9\.]/g, '') == false) {
                    $(".alert-errormessge").show("slow");
                    $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in BLOOD SUGAR/BLOOD GLUCOSE.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
                    $(".modal-body").animate({ scrollTop: 0 }, "slow");
                    return false;
            }
        }
        $(".modal-body").scrollTop(0);
        var next_tab = $('.nav-tabs > .active').next('li').find('a');
        if (next_tab.length > 0) {
            next_tab.trigger('click');
            $("#collapse9").addClass("collapse in");
            $("#collapse9").attr("aria-expanded", "true");
            $("#collapse1").addClass("collapse in");
            $("#collapse1").attr("aria-expanded", "true");
            $("#collapse45").addClass("collapse in");
            $("#collapse45").attr("aria-expanded", "true");
        } else {
            $('.nav-tabs li:eq(0) a').trigger('click');
        }
    });
});
$(".openaccordian").click(function(e) {
    $(".modal-body").scrollTop(0);
    $("#collapse9").removeClass("collapse in");
    $("#collapse9").addClass("collapse");
    $("#collapse9").attr("aria-expanded", "flase");
    $("#collapse10").addClass("collapse in");
    $("#collapse10").attr("aria-expanded", "true");
})
$(".immuopenaccordian").click(function(e) {
    $(".modal-body").scrollTop(0);
    $("#collapse1").removeClass("collapse in");
    $("#collapse1").addClass("collapse");
    $("#collapse1").attr("aria-expanded", "flase");
    $("#collapse2").addClass("collapse in");
    $("#collapse2").attr("aria-expanded", "true");
})
$(".immuopenaccordian2").click(function(e) {
    $(".modal-body").scrollTop(0);
    $("#collapse2").removeClass("collapse in");
    $("#collapse2").addClass("collapse");
    $("#collapse2").attr("aria-expanded", "flase");
    $("#collapse3").addClass("collapse in");
    $("#collapse3").attr("aria-expanded", "true");
})
$(".immuopenaccordian2").click(function(e) {
    $(".modal-body").scrollTop(0);
    $("#collapse2").removeClass("collapse in");
    $("#collapse2").addClass("collapse");
    $("#collapse2").attr("aria-expanded", "flase");
    $("#collapse3").addClass("collapse in");
    $("#collapse3").attr("aria-expanded", "true");
})
$(".docopenaccordian").click(function(e) {
    var accordion_name = hide_show_document_according();
    if(accordion_name !="Select Document Type"){

        $(".modal-body").scrollTop(0);
        $("#collapse45").removeClass("collapse in");
        $("#collapse45").addClass("collapse");
        $("#collapse45").attr("aria-expanded", "flase");

        if (accordion_name == "Locked Clinical Notes") {
            $(".modal-body").scrollTop(0);
            $("#collapse45").removeClass("collapse in");
            $("#collapse45").addClass("collapse");
            $("#collapse45").attr("aria-expanded", "flase");
            $("#collapse51").addClass("collapse in");
            $("#collapse51").attr("aria-expanded", "true");
        } else if (accordion_name == "Signed Consent Forms") {
            $(".modal-body").scrollTop(0);
            $("#collapse45").removeClass("collapse in");
            $("#collapse45").addClass("collapse");
            $("#collapse6").addClass("collapse in");
            $("#collapse6").attr("aria-expanded", "true");
        } else if (accordion_name == "Lab Result") {
            $("#collapse45").removeClass("collapse in");
            $("#collapse45").addClass("collapse");
            $("#collapse45").attr("aria-expanded", "flase");
            $(".modal-body").scrollTop(0);
            $("#collapse75").addClass("collapse in");
            $("#collapse75").attr("aria-expanded", "true");
        } else if (accordion_name == "Amendments") {
            $("#collapse45").removeClass("collapse in");
            $("#collapse45").addClass("collapse");
            $("#collapse45").attr("aria-expanded", "flase");
            $(".modal-body").scrollTop(0);
            $("#collapse85").addClass("collapse in");
            $("#collapse85").attr("aria-expanded", "true");
        }
    }else{
        $(".modal-body").scrollTop(0);
        $("#collapse45").removeClass("collapse in");
        $("#collapse45").addClass("collapse");
        $("#collapse45").attr("aria-expanded", "flase");

        $(".health_document").removeClass("active");
        $("#add-document").removeClass("active in");
        $(".health_documents").attr("aria-expanded","flase");


        $("#add-record").addClass("active in");
        $(".health_record").addClass("active");
        $(".health_records").attr("aria-expanded","true");




    }
});

/*$(".docopenaccordian2").click(function(e){
    $(".modal-body").scrollTop(0);
$("#collapse51").removeClass("collapse in");
$("#collapse51").addClass("collapse");
$("#collapse51").attr("aria-expanded","flase");
$("#collapse6").addClass("collapse in");
$("#collapse6").attr("aria-expanded","true");
});

$(".docopenaccordian3").click(function(e){
    $(".modal-body").scrollTop(0);
$("#collapse6").removeClass("collapse in");
$("#collapse6").addClass("collapse");
$("#collapse6").attr("aria-expanded","flase");
$("#collapse75").addClass("collapse in");
$("#collapse75").attr("aria-expanded","true");
});
$(".docopenaccordian4").click(function(e){
    $(".modal-body").scrollTop(0);
$("#collapse75").removeClass("collapse in");
$("#collapse75").addClass("collapse");
$("#collapse75").attr("aria-expanded","flase");
$("#collapse85").addClass("collapse in");
$("#collapse85").attr("aria-expanded","true");
});*/
</script>
<script>
$("#icon-bell").click(function() {
    $("#menu").fadeToggle();
    $("#notification").toggleClass("active");
});
</script>
<script>
$("#icon-bell").click(function() {
    $("#menu").fadeToggle();
    $('#notification').toggle(function() {
        $("#notification").css({
            "width": "100%"
        });
    }, function() {
        $("#notification").css({
            "width": "33%"
        });
    });
});
</script>
<script>
function get_patient_autocomplete() {
    var patient_name = $("#search-patient").val();
    if (patient_name != "") {
        $(".addhospital_record").removeAttr("disabled");
        $(".Patient_errormsg").empty();
        $("#search-patient").css("border-color", "#ccc");
    }
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_patient_autocomplete'); ?>",
        data: 'patient_name=' + patient_name + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var patient_data = JSON.parse(data);
            $(".autocomplete_items").empty();
            if (patient_data.length === 0) {
                var html = '<div><strong>Patient Not Found.</strong></div>';
                $(".autocomplete_items").append(html);
            } else {
                $.each(patient_data, function(key, value) {
                    var html =
                        '<div><input type="hidden" value="d"></div><div><a href="javascript:void(0);" onClick="get_patient_profile(\'' +
                        value.id + '\',\'' + value.fname + "  " + value.lname + '\')"><strong>' +
                        value.fname + "  " + value.lname + '</strong></a></div>';
                    $(".autocomplete_items").css('display', 'block');
                    $(".autocomplete_items").append(html);
                });
            }
        }
    });

}

function get_patient_profile(patient_ID, patient_Name) {
    var edit_url = '<?php echo base_url(); ?>' + 'patient/edit/';
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_patient_profile'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            if (data.length === 0) {
                $(".patient_profile").empty();
            } else {
                $(".patient_profile").html(data);
                $(".patient_ID").empty();
                $(".patient_ID").val(patient_ID);
                $("#patient_name").empty();
                $("#patient_name").val(patient_Name);
                $(".search_patient_name").val(patient_Name);
                $(".autocomplete_items").css('display', 'none');
                $("#edit_p").attr("href", edit_url + patient_ID);
            }

            get_problem_allergies(patient_ID);
            get_allergies(patient_ID);
            get_lab_result(patient_ID);
            get_imaging_order(patient_ID);
            get_eprescription(patient_ID);
            get_summary(patient_ID);
            get_healthrecord(patient_ID);
            get_vitalsign(patient_ID);
            get_document(patient_ID);
            get_lockedclinicalnotes(patient_ID);
            get_signedconsentforms(patient_ID);
            get_healthreportamendments(patient_ID);
            get_doclabresult(patient_ID);
            get_record_vaccination(patient_ID);
            get_reviewsign(patient_ID);
            get_scheduleappointment(patient_ID);
            get_medications(patient_ID);
            get_issue(patient_ID);
            get_uploadeddocuments(patient_ID);
            get_immunizations(patient_ID);
            $.ajax({
                   url: BASE_URL+"dashboard_doctor/health_record/health_report/graph",
                   data: 'patient_ID='+patient_ID,
                   success: function(msg){

                    var myObj = JSON.parse(msg);
      //var f = parseInt(myObj.tem);
                     var tem=myObj.tem;
                     var label=myObj.date;
                     var h=myObj.h;
                     var bl=myObj.bl;
                     var rp=myObj.rp;
                     var ox=myObj.ox;
                     var height=myObj.height;
                     var weight=myObj.weight;
                     var bmi=myObj.bmi;
                     var pain=myObj.pain;
                     var smoking_status=myObj.smoking_status;
                     var head_circumference=myObj.head_circumference;
                     var glucose_by_glucometer=myObj.glucose_by_glucometer;

                     graph(label,tem,h,bl,rp,ox,height,weight,bmi,pain,smoking_status,head_circumference,glucose_by_glucometer);

                   }});
        }
    });
}

    function calculate_bmi() {
        var height   =  $("#weight").val();
        var weight   =  $("#height").val();
         $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/calculate_bmi'); ?>",
            data: 'height=' + height + '&weight=' + weight +'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                if(data !=""){
                    $("#bmi").val(data);
                }

            }
        });
    }

    function calculate_bmi_edit() {
        var height   =  $("#weight_e").val();
        var weight   =  $("#height_e").val();
         $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/calculate_bmi'); ?>",
            data: 'height=' + height + '&weight=' + weight +'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {

                $("#bmi_e").val(data);

            }
        });
    }

function remove_vital(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_vital'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Vital Sign Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_vitalsign(data);
            }
        });
    }
}

function remove_problem(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_problem'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Problem Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_problem_allergies(data);
            }
        });
    }
}

function remove_allergies(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_allergies'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Allergy Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_allergies(data);
            }
        });
    }
}

function remove_labresult(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_labresult'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Lab Result Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_lab_result(data);
            }
        });
    }
}

function remove_imaging_order(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_imaging_order'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Imaging Order Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_imaging_order(data);
            }
        });
    }
}

function remove_prescription_medication(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_prescription_medication'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> E-prescription Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_eprescription(data);
            }
        });
    }
}

function remove_Vaccines(vital_id, patient_ID) {
    var vacciness = $("#Tabselect-vaccination :selected").val();

    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_Vaccines'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Vaccines Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);

                $('#Tabselect-vaccination').trigger("chosen:updated", vacciness);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_immunizations_listing') ?>",
                    data: 'vacciness=' + vacciness + '&patient_ID=' + patient_ID +
                        '&<?php echo $this->security->get_csrf_token_name();?>=' +
                        '<?php echo $this->security->get_csrf_hash();?>',
                    dataType: "html",
                    cache: false,
                    success: function(data) {
                        $(".immunizations_tbdata").empty();
                        $(".immunizations_tbdata").html(data);
                    }
                });


            }
        });
    }
}



function remove_recordvaccinations(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_recordvaccinations'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Record Vaccinations Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_record_vaccination(data);
            }
        });
    }
}

function remove_reviewsign(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_reviewsign'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Review and Sing Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_reviewsign(data);
            }
        });
    }
}

function remove_summary(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_summary'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Summary Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_summary(data);
            }
        });
    }
}

function remove_uploadeddocument(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_uploadeddocument'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Uploaded Document Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_document(data);
            }
        });
    }
}

function remove_lockedclinicalnotes(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_lockedclinicalnotes'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Locked Clinical Notes Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_lockedclinicalnotes(data);
            }
        });
    }
}

function remove_signedconsentforms(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_signedconsentforms'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Singed Consent Forms Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_signedconsentforms(data);
            }
        });
    }
}

function remove_doclabresult(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_doclabresult'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Lab Result Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_doclabresult(data);
            }
        });
    }
}

function remove_amendments(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_amendments'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Amendments Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_healthreportamendments(data);
            }
        });
    }
}

function remove_healthrecord(vital_id, patient_ID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/remove_healthrecord'); ?>",
            data: 'patient_id=' + patient_ID + '&patient_name=' + vital_id +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            success: function(data) {
                $(".delete_errormsg").css("visibility", "visible");
                $(".delete_errormsg").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Health Record Delete Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".delete_errormsg").css("visibility", "hidden");
                    $(".delete_errormsg").empty();
                }, 10000);
                get_vitalsign(data);
                get_problem_allergies(data);
                get_allergies(data);
                get_lab_result(data);
                get_imaging_order(data);
                get_eprescription(data);
                get_record_vaccination(data);
                get_summary(data);
                get_document(data);
                get_lockedclinicalnotes(data);
                get_signedconsentforms(data);
                get_healthreportamendments(data);
                get_doclabresult(data);
                get_reviewsign(data);
                get_scheduleappointment(data);
                get_medications(data);
                get_issue(data);
                get_uploadeddocuments(data);
                get_immunizations(data);
                get_healthreportamendments(data);
                get_healthrecord(data);
            }
        });
    }
}

function get_allergies(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_allergies'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            $("#allery").html(data);
        }

    });
}

function get_scheduleappointment(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_scheduleappointment'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            $("#get_scheduleappointment").html(data);
        }

    });
}

function get_medications(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_medications'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            $("#get_medications").html(data);
        }

    });
}

function get_issue(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_issue'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            $("#issue").html(data);
        }

    });
}

function get_uploadeddocuments(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_uploadeddocuments'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            $("#latest_upload").html(data);
        }

    });
}

function get_immunizations(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_immunizations'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            $("#immunizations").html(data);
        }

    });
}
/*function get_update_problem(patient_ID){
$.ajax({
type: "POST",
url: "<?php //echo base_url('health_report/get_update_problem'); ?>",
data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
success:
function(data){
// alert(data);
var myArray = jQuery.parseJSON(data);
//alert(myArray.id);
$(".patient_ID").val(myArray.patient_id);
$("#select_problem_e").val(myArray.problem_id).trigger('change');
$('#select_problem_e  option[value="'+myArray.problem_id+'"]').prop("selected", true);
$('#icdversion_e  option[value="'+myArray.icd_version_id+'"]').prop("selected", true);
$('#problem_status_e  option[value="'+myArray.status+'"]').prop("selected", true);
$("#problem_notes_e").val(myArray.notes);
$("#snomed_ct_code_e").val(myArray.snomed_ct_code);
$("#icd10_code_e").val(myArray.icd10_code);
$("#diagnosis_datetime_e").val(myArray.diagnosis_datetime);
$("#onset_datetime_e").val(myArray.onset_datetime);
$("#changed_datetime_e").val(myArray.changed_datetime);
$("#healthreport_problem_id").val(myArray.id);
}
});
}
function get_update_singed_consent(patient_ID){
$.ajax({
type: "POST",
url: "<?php //echo base_url('health_report/get_update_singed_consent'); ?>",
data:'patient_name='+patient_ID+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
success:
function(data){
// alert(data);
var myArray = jQuery.parseJSON(data);
//alert(myArray.id);
$(".patient_ID").val(myArray.patient_id);
$('#singnature_action_e  option[value="'+myArray.singnature_action+'"]').prop("selected", true);
// $("#singedconsent_form_e").val(myArray.consent_form);
$("#appointment_datetime_e").val(myArray.appointment_datetime);
$("#singnature_date_e").val(myArray.singnature_date);
$("#singed_consent_forms_id").val(myArray.id);
}

});
}
function get_update_doclabresult(patient_ID){
$.ajax({
type: "POST",
url: "<?php// echo base_url('health_report/get_update_doclabresult'); ?>",
data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
success:
function(data){
// alert(data);
var myArray = jQuery.parseJSON(data);
//alert(myArray.id);
$(".patient_ID").val(myArray.patient_id);
$('#document_labaction_e  option[value="'+myArray.action+'"]').prop("selected", true);
$('#document_abnormal_e  option[value="'+myArray.abnormal+'"]').prop("selected", true);
$("#document_lab_e").val(myArray.lab);
$("#document_labdate_time_e").val(myArray.appointment_datetime);
$("#document_result_count_e").val(myArray.result_count);
$("#document_test_e").val(myArray.test);
$("#document_labresult_id").val(myArray.id);
}

});
}
function get_update_amendments(patient_ID){
$.ajax({
type: "POST",
url: "<?php// echo base_url('health_report/get_update_amendments'); ?>",
data:'patient_name='+patient_ID+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
success:
function(data){
// alert(data);
var myArray = jQuery.parseJSON(data);
//alert(myArray.id);
$(".patient_ID").val(myArray.patient_id);
$('#amendment_status_e  option[value="'+myArray.amendment_status+'"]').prop("selected", true);
$("#amendment_source_e").val(myArray.amendment_source);
$("#amdments_date_time_e").val(myArray.amdments_date_time);
$("#amdmentsproccess_date_time_e").val(myArray.amdmentsproccess_date_time);
$("#amdments_id").val(myArray.id);
}

});
}
function get_update_document(patient_ID){
$.ajax({
type: "POST",
url: "<?php //echo base_url('health_report/get_update_document'); ?>",
data:'patient_name='+patient_ID+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
success:
function(data){
//alert(data);
var myArray = jQuery.parseJSON(data);
//alert(myArray.id);
$("#healthreport_document_id_e").val(myArray.id);
//$("#healthreport_document_id_e").attr("value",myArray.id);
$("#document_type_e").val(myArray.document_type).trigger('change');
$('#document_type_e  option[value="'+myArray.document_type+'"]').prop("selected", true);
$(".patient_ID").val(myArray.patient_id);
}
});
}
function get_update_clinical_notes(patient_ID){
$.ajax({
type: "POST",
url: "<?php //echo base_url('health_report/get_update_clinical_notes'); ?>",
data:'patient_name='+patient_ID+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
success:
function(data){
// alert(data);
var myArray = jQuery.parseJSON(data);
//alert(myArray.id);
$(".patient_ID").val(myArray.patient_id);
$('#lockedstatus_e  option[value="'+myArray.status+'"]').prop("selected", true);
$('#lockedaction_e  option[value="'+myArray.action+'"]').prop("selected", true);
$("#date_of_service_e").val(myArray.date_of_service);
$("#locked_by_e").val(myArray.locked_by);
$("#locked_on_e").val(myArray.locked_on);
//$("#lockedaction_e").val(myArray.action);
//$("#lockedstatus_e").val(myArray.status);
$("#locked_reason_e").val(myArray.reason);
$("#locked_id").val(myArray.id);
}

});
}
function get_update_allergylist(patient_ID){
$.ajax({
type: "POST",
url: "<?php //echo base_url('health_report/get_update_allergylist'); ?>",
data:'patient_name='+patient_ID+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
success:
function(data){
// alert(data);
var myArray = jQuery.parseJSON(data);
//alert(myArray.id);
$(".patient_ID").val(myArray.patient_id);
$("#allergy_type_e").val(myArray.allergy_type).trigger('change');
$('#allergy_type_e  option[value="'+myArray.allergy_type+'"]').prop("selected", true);
$("#drug_allergy_e").val(myArray.drug_allergy).trigger('change');
$('#drug_allergy_e  option[value="'+myArray.drug_allergy+'"]').prop("selected", true);
$("#severity_e").val(myArray.severity).trigger('change');
$('#severity_e  option[value="'+myArray.severity+'"]').prop("selected", true);
$("#reaction_e").val(myArray.reaction).trigger('change');
$('#reaction_e  option[value="'+myArray.reaction+'"]').prop("selected", true);
$('#allergy_status_e  option[value="'+myArray.status+'"]').prop("selected", true);
$("#allergy_notes_e").val(myArray.notes);
$("#healthreport_allergies_id").val(myArray.id);
}

});
}
function get_update_imaging_order(patient_ID){
$.ajax({
type: "POST",
url: "<?php //echo base_url('health_report/get_update_imaging_order'); ?>",
data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
success:
function(data){
var myArray = jQuery.parseJSON(data);
$(".patient_ID").val(myArray.patient_id);
$("#cpt_code_e").val(myArray.cpt_code).trigger('change');
$('#cpt_code_e  option[value="'+myArray.cpt_code+'"]').prop("selected", true);
//$('#reaction_e  option[value="'+myArray.reaction+'"]').prop("selected", true);
$('#imaging_order_status_e  option[value="'+myArray.order_status+'"]').prop("selected", true);
$("#imaging_order_description_e").val(myArray.description);
$("#doctor_commentse").val(myArray.doctor_comments);
$("#healthreport_imaging_id").val(myArray.imaging_order_id);
}

});
}
function get_update_recordvaccinations(patient_ID){
$.ajax({
type: "POST",
url: "<?php// echo base_url('health_report/get_update_recordvaccinations'); ?>",
data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php// echo $this->security->get_csrf_hash();?>',
success:
function(data){
var myArray = jQuery.parseJSON(data);
$(".patient_ID").val(myArray.patient_id);
$("#record_vaccinations_create_record_e").val(myArray.create_record_for).trigger('change');
$('#record_vaccinations_create_record_e  option[value="'+myArray.create_record_for+'"]').prop("selected", true);
$("#record_vaccinations_cvx_code_e").val(myArray.cvxcode).trigger('change');
$('#record_vaccinations_cvx_code_e  option[value="'+myArray.cvxcode+'"]').prop("selected", true);
$("#record_vaccinations_manfacturer_e").val(myArray.manfacturer).trigger('change');
$('#record_vaccinations_manfacturer_e  option[value="'+myArray.manfacturer+'"]').prop("selected", true);
$("#record_vaccination_administered_unit_e").val(myArray.administered_units).trigger('change');
$('#record_vaccination_administered_unit_e  option[value="'+myArray.administered_units+'"]').prop("selected", true);
$("#record_vaccination_vaccinate_route_e").val(myArray.vaccinate_route).trigger('change');
$('#record_vaccination_vaccinate_route_e  option[value="'+myArray.vaccinate_route+'"]').prop("selected", true);
$("#record_vaccination_vaccinate_site_e").val(myArray.vaccinate_site).trigger('change');
$('#record_vaccination_vaccinate_site_e  option[value="'+myArray.vaccinate_site+'"]').prop("selected", true);
$("#record_vaccination_vaccinate_status_e").val(myArray.vaccinate_site).trigger('change');
$('#record_vaccination_vaccinate_status_e  option[value="'+myArray.vaccinate_status+'"]').prop("selected", true);
$("#record_vaccination_ordering_doctor_e").val(myArray.ordering_doctor).trigger('change');
$('#record_vaccination_ordering_doctor_e  option[value="'+myArray.ordering_doctor+'"]').prop("selected", true);
$("#record_vaccination_administered_by_e").val(myArray.administered_by).trigger('change');
$('#record_vaccination_administered_by_e  option[value="'+myArray.administered_by+'"]').prop("selected", true);
$("#record_vaccination_administered_at_e").val(myArray.administered_at).trigger('change');
$('#record_vaccination_administered_at_e  option[value="'+myArray.administered_at+'"]').prop("selected", true);
$("#record_vaccination_inventory_lot_e").val(myArray.inventory_lot).trigger('change');
$('#record_vaccination_inventory_lot_e  option[value="'+myArray.inventory_lot+'"]').prop("selected", true);
$("#record_vaccination_record_type_e").val(myArray.record_type).trigger('change');
$('#record_vaccination_record_type_e  option[value="'+myArray.record_type+'"]').prop("selected", true);
$("#record_vaccination_funding_eligibility_e").val(myArray.funding_eligibility).trigger('change');
$('#record_vaccination_funding_eligibility_e  option[value="'+myArray.funding_eligibility+'"]').prop("selected", true);
$("#record_vaccination_observed_immunity_e").val(myArray.observed_immunity).trigger('change');
$('#record_vaccination_observed_immunity_e  option[value="'+myArray.observed_immunity+'"]').prop("selected", true);
$("#record_vaccinations_name_e").val(myArray.name);
$("#record_vaccinations_cpt_code_e").val(myArray.cpt_code);
$("#record_vaccination_lot-num_e").val(myArray.lot_num);
$("#record_vaccination_expirationdate_e").val(myArray.expirationdate);
$("#administered_amount_e").val(myArray.administered_amount);
$("#record_vaccination_administred_on_e").val(myArray.administred_on);
$("#record_vaccination_notes_e").val(myArray.record_vaccination_notes);
$("#record_vaccinations_id").val(myArray.id);
}

});
}
function get_update_eprescription(patient_ID){
$.ajax({
type: "POST",
url: "<?php// echo base_url('health_report/get_update_eprescription'); ?>",
data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php// echo $this->security->get_csrf_hash();?>',
success:
function(data){
var myArray = jQuery.parseJSON(data);
$(".patient_ID").val(myArray.patient_id);
$("#drug_name_e").val(myArray.drug_name).trigger('change');
$('#drug_name_e  option[value="'+myArray.drug_name+'"]').prop("selected", true);
$('#e_prescription_status_e  option[value="'+myArray.status+'"]').prop("selected", true);
$('#appointment_e  option[value="'+myArray.appointment_id+'"]').prop("selected", true);
$("#sign_note_e").val(myArray.sig_note);
$("#sign_e").val(myArray.sig);
$("#indication_e").val(myArray.indication);
$("#dispense_quantity_e").val(myArray.dispense_quantity);
$("#dispense_package_e").val(myArray.dispense_package);
$("#number_refills_e").val(myArray.number_refills);
$("#pharmacy_note_e").val(myArray.pharmacy_note);
$("#order_status_e").val(myArray.order_status).trigger('change');
$("#order_status_e").val(myArray.order_status);
$("#notes_e").val(myArray.notes);
$("#e_prescription").val(myArray.e_prescription_id);
}

});
}
function get_update_summary(patient_ID){
$.ajax({
type: "POST",
url: "<?php// echo base_url('health_report/get_update_summary'); ?>",
data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
success:
function(data){
var myArray = jQuery.parseJSON(data);
$(".patient_ID").val(myArray.patient_id);
$("#summary_description_e").val(myArray.summary);
$("#summary_id").val(myArray.id);
}

});
}
function get_update_labresult(patient_ID){
$.ajax({
type: "POST",
url: "<?php// echo base_url('health_report/get_update_labresult'); ?>",
data:'patient_name='+patient_ID+'&<?php// echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
success:
function(data){
var myArray = jQuery.parseJSON(data);
$(".patient_ID").val(myArray.patient_id);
//$('#allergy_type_e  option[value="'+myArray.allergy_type+'"]').prop("selected", true);
//$('#drug-allergy_e  option[value="'+myArray.drug_allergy+'"]').prop("selected", true);
$("#loinc_code_e").val(myArray.loinc_code).trigger('change');
$('#loinc_code_e  option[value="'+myArray.loinc_code+'"]').prop("selected", true);
//$('#reaction_e  option[value="'+myArray.reaction+'"]').prop("selected", true);
$("#cvx_code_e").val(myArray.abnormal_flag).trigger('change');
$('#cvx_code_e  option[value="'+myArray.abnormal_flag+'"]').prop("selected", true);
$("#discription_e").val(myArray.description);
$("#result_value_e").val(myArray.result_value);
$("#units_e").val(myArray.units);
$("#normal_range_e").val(myArray.normal_range);
$("#healthreport_labresult_id").val(myArray.loinc_code_id);
}

});
}*/
function update_vital(p_id, patient_ID, p_date) {
//  alert(patient_ID);
  //  alert(p_id);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/update_vital'); ?>",
        data: 'p_date=' + p_date + '&p_id=' + p_id + '&patient_name=' + patient_ID +
            '&<?php  echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var myArray = jQuery.parseJSON(data);
            if (myArray.data_vitalsing == null) {} else {
                $(".patient_ID").val(myArray.data_vitalsing.patient_id);
                $("#temp_e").val(myArray.data_vitalsing.temperature);
                $("#vital_id").val(myArray.data_vitalsing.id);
                $("#heart-rate_e").val(myArray.data_vitalsing.heart_rate);
                $("#blood-presure_e").val(myArray.data_vitalsing.blood_pressure);
                $("#respiratory-rate_e").val(myArray.data_vitalsing.respiratory_rate);
                $("#oxygen-saturation_e").val(myArray.data_vitalsing.oxygen_saturation);
                $("#bmi_e").val(myArray.data_vitalsing.bmi);
                $("#height_e").val(myArray.data_vitalsing.height);
                $("#weight_e").val(myArray.data_vitalsing.weight);
                $("#pain_e").val(myArray.data_vitalsing.pain);
                $('#smoking_e  option[value="' + myArray.data_vitalsing.smoking_status + '"]').prop(
                    "selected", true);
                $('#bloodtype_e').val(myArray.data_vitalsing.bloodtype).trigger('change');
                $('#bloodtype_e  option[value="' + myArray.data_vitalsing.bloodtype + '"]').prop("selected",
                    true);
                $("#head-circumfernce_e").val(myArray.data_vitalsing.head_circumference);
                $("#glucose-glucometer_e").val(myArray.data_vitalsing.glucose_by_glucometer);
            }
            if (myArray.problem_data == null) {} else {
                $("#healthreport_problem_id").val(myArray.problem_data.id);
                $("#select_problem_e").val(myArray.problem_data.problem_id);
                $('#icdversion_e').val(myArray.problem_data.icd_version_id);
                $('#problem_status_e  option[value="' + myArray.problem_data.status + '"]').prop("selected",
                    true);
                $("#problem_notes_e").val(myArray.problem_data.notes);
                $("#snomed_ct_code_e").val(myArray.problem_data.snomed_ct_code);
                $("#icd10_code_e").val(myArray.problem_data.icd10_code);
                $("#diagnosis_datetime_e").val(myArray.problem_data.diagnosis_datetime);
                $("#onset_datetime_e").val(myArray.problem_data.onset_datetime);
                $("#channged_datetime_e").val(myArray.problem_data.changed_datetime);
            }
            if (myArray.allergy_data == null) {} else {
                $("#allergy_type_e").val(myArray.allergy_data.allergy_type).trigger('change');
                $('#allergy_type_e  option[value="' + myArray.allergy_data.allergy_type + '"]').prop(
                    "selected", true);
                $('#drug_allergy_e').val(myArray.allergy_data.drug_allergy);
                $("#severity_e").val(myArray.allergy_data.severity).trigger('change');
                $('#severity_e  option[value="' + myArray.allergy_data.severity + '"]').prop("selected",
                    true);
                $("#reaction_e").val(myArray.allergy_data.reaction).trigger('change');
                $('#reaction_e  option[value="' + myArray.allergy_data.reaction + '"]').prop("selected",
                    true);
                $('#allergy_status_e  option[value="' + myArray.allergy_data.status + '"]').prop("selected",
                    true);
                $("#allergy_notes_e").val(myArray.allergy_data.notes);
                $("#healthreport_allergies_id").val(myArray.allergy_data.id);
            }

            if (myArray.labelresult_data == null) {} else {
                $(".patient_ID").val(myArray.labelresult_data.patient_id);
                $("#loinc_code_e").val(myArray.labelresult_data.loinc_code);
                $("#cvx_code_e").val(myArray.labelresult_data.abnormal_flag).trigger('change');
                $('#cvx_code_e  option[value="' + myArray.labelresult_data.abnormal_flag + '"]').prop(
                    "selected", true);
                $("#discription_e").val(myArray.labelresult_data.description);
                $("#result_value_e").val(myArray.labelresult_data.result_value);
                $("#units_e").val(myArray.labelresult_data.units);
                $("#normal_range_e").val(myArray.labelresult_data.normal_range);
                $("#healthreport_labresult_id").val(myArray.labelresult_data.loinc_code_id);
            }

            if (myArray.imagingorder_data == null) {

            } else {
                $(".patient_ID").val(myArray.imagingorder_data.patient_id);
                $("#cpt_code_e").val(myArray.imagingorder_data.cpt_code);
                $('#imaging_order_status_e  option[value="' + myArray.imagingorder_data.order_status + '"]')
                    .prop("selected", true);
                var docURL = "<?php echo base_url()?>assets/scanned_result_document/" + myArray
                    .imagingorder_data.scanned_result;

                //$("#old_review_document").val(myArray.reviewsing_data.reviewsing_document);
                $(".edit_scanned_result_document").html("<a href=" + docURL +
                    " target='_blank'>Download Document</a>");

                $("#imaging_order_description_e").val(myArray.imagingorder_data.description);
                $("#doctor_commentse").val(myArray.imagingorder_data.doctor_comments);
                $("#healthreport_imaging_id").val(myArray.imagingorder_data.imaging_order_id);
            }
            if (myArray.e_prescriptiondata == null) {} else {
                $(".patient_ID").val(myArray.e_prescriptiondata.patient_id);
                $("#drug_name_e").val(myArray.e_prescriptiondata.drug_name);
                $('#e_prescription_status_e  option[value="' + myArray.e_prescriptiondata.status + '"]')
                    .prop("selected", true);
                $('#appointment_e  option[value="' + myArray.e_prescriptiondata.appointment_id + '"]').prop(
                    "selected", true);
                $("#prescribe_date_time_e").val(myArray.e_prescriptiondata.datetime_prescribed);
                $("#started_taking_date_time_e").val(myArray.e_prescriptiondata.datetime_started_taking);
                $("#stopped_taking_date_time_e").val(myArray.e_prescriptiondata.datetime_stopped_taking);
                $("#sign_note_e").val(myArray.e_prescriptiondata.sig_note);
                $("#sign_e").val(myArray.e_prescriptiondata.sig);
                $("#indication_e").val(myArray.e_prescriptiondata.indication);
                $("#dispense_quantity_e").val(myArray.e_prescriptiondata.dispense_quantity);
                $("#dispense_package_e").val(myArray.e_prescriptiondata.dispense_package);
                $("#number_refills_e").val(myArray.e_prescriptiondata.number_refills);
                $("#pharmacy_note_e").val(myArray.e_prescriptiondata.pharmacy_note);
                $("#order_status_e").val(myArray.e_prescriptiondata.order_status).trigger('change');
                $("#order_status_e").val(myArray.e_prescriptiondata.order_status).prop("selected", true);
                if (myArray.e_prescriptiondata.daw == "yes") {
                    $('.daw').prop('checked', true);
                } else {
                    $('.daw').prop('checked', false);
                }
                $("#notes_e").val(myArray.e_prescriptiondata.notes);
                $("#e_prescription").val(myArray.e_prescriptiondata.e_prescription_id);
                if (myArray.e_prescriptiondata.prn == "yes") {
                    $("#defaultCheck1_e").attr('checked', true);
                } else {
                    $("#defaultCheck1_e").attr('checked', false);
                }
            }
            if (myArray.vaccines_data === null) {} else {
                $(".patient_ID").val(myArray.vaccines_data.patient_id)
                $("#Addselect_vaccination_e").val(myArray.vaccines_data.vaccines).trigger('change');
                $('#Addselect_vaccination_e  option[value="' + myArray.vaccines_data.vaccines + '"]').prop(
                    "selected", true);
                get_edit_vaccinesschedule(myArray.vaccines_data.vaccines, myArray.vaccines_data.schedule,
                    myArray.vaccines_data.vaccine);
                get_edit_vaccines_vaccine(myArray.vaccines_data.vaccines, myArray.vaccines_data.vaccine);
                $("#immunizationscvx_code_vaccines_e").val(myArray.vaccines_data.cvxcode);

                $("#vis_e").val(myArray.vaccines_data.vis);
                $("#administreted_on_e").val("<?php echo date('Y-m-d h:i:s'); ?>");
                $('#vaccinestatus_e option[value="' + myArray.vaccines_data.vaccines_status + '"]').prop(
                    "selected", true);
                $("#vaccines_e_ID").val(myArray.vaccines_data.id);
            }
            if (myArray.reviewsing_data === null) {} else {
                $(".patient_ID").val(myArray.vaccines_data.patient_id)
                $("#printname_e").val(myArray.reviewsing_data.printname);
                var docURL = "<?php echo base_url()?>assets/reviewsing_document/" + myArray.reviewsing_data
                    .reviewsing_document;
                    var docsignURL = "<?php echo base_url()?>" +myArray.reviewsing_data.signture_image;
                $("#old_review_document").val(myArray.reviewsing_data.reviewsing_document);
                $(".edit_uploaddocument").html("<a href=" + docURL +
                    " target='_blank'>Download Document</a>");
                    $("#signedit").html("<a href=" + docsignURL +
                        " target='_blank'>Download Document</a>");
                $(".typed_e").empty();
                $(".typed_e").html(myArray.reviewsing_data.printname);
                $(".singnature_data_e").empty();
                $(".singnature_data_e").val(myArray.reviewsing_data.printname);
                $("#reviewsing_e_ID").val(myArray.reviewsing_data.id);
            }
            if (myArray.summary_data == null) {} else {
                $(".patient_ID").val(myArray.summary_data.patient_id);
                $("#summary_description_e").val(myArray.summary_data.summary);
                $("#summary_id").val(myArray.summary_data.id);
            }

            if (myArray.document_data == null) {

            } else {
                $("#healthreport_document_id_e").val(myArray.document_data.id);
                $('#document_type_e  option[value="' + myArray.document_data.document_type + '"]').prop(
                    "selected", true);
                console.log(myArray.document_data.document_type);
                var document_typetext = $("#document_type_e option:selected").text();
                hide_show_document_according_edit(document_typetext);
                $(".patient_ID").val(myArray.document_data.patient_id);

                if(myArray.document_data.document_document !=""){
                    var docURL = "<?php echo base_url()?>assets/upload_document/" + myArray.document_data
                        .document_document;
                    $(".edit_upload_document").html("<a href=" + docURL +" target='_blank'>Download Document</a>");
                }
            }

            if (myArray.clinical_notesdata == null) {

            } else {
                $(".patient_ID").val(myArray.clinical_notesdata.patient_id);
                $('#lockedstatus_e  option[value="' + myArray.clinical_notesdata.status + '"]').prop(
                    "selected", true);
                $('#lockedaction_e  option[value="' + myArray.clinical_notesdata.action + '"]').prop(
                    "selected", true);
                $("#date_of_service_e").val(myArray.clinical_notesdata.date_of_service);
                //$("#locked_by_e").val(myArray.clinical_notesdata.locked_by);
                $("#locked_on_e").val(myArray.clinical_notesdata.locked_on);
                $("#locked_reason_e").val(myArray.clinical_notesdata.reason);
                $("#locked_id").val(myArray.clinical_notesdata.id);
            }
            if (myArray.singed_consentdata == null) {

            } else {
                $(".patient_ID").val(myArray.singed_consentdata.patient_id);
                /*$('#singnature_action_e  option[value="'+myArray.singed_consentdata.singnature_action+'"]').prop("selected", true);
                $("#singedconsent_form_e").val(myArray.consent_form);*/
                $("#appointment_datetime_e").val(myArray.singed_consentdata.appointment_datetime);
                $("#singnature_date_e").val(myArray.singed_consentdata.singnature_date);
                $("#singed_consent_forms_id").val(myArray.singed_consentdata.id);
            }
            if (myArray.doclabresult_data == null) {

            } else {
                $(".patient_ID").val(myArray.doclabresult_data.patient_id);
                $('#document_labaction_e  option[value="' + myArray.doclabresult_data.action + '"]').prop(
                    "selected", true);
                $('#document_abnormal_e  option[value="' + myArray.doclabresult_data.abnormal + '"]').prop(
                    "selected", true);
                $("#document_lab_e").val(myArray.doclabresult_data.lab);
                $("#document_labdate_time_e").val(myArray.doclabresult_data.date);
                $("#document_result_count_e").val(myArray.doclabresult_data.result_count);
                $("#document_test_e").val(myArray.doclabresult_data.test);
                $("#document_labresult_id").val(myArray.doclabresult_data.id);
            }
            if (myArray.amendment_data == null) {} else {
                $(".patient_ID").val(myArray.amendment_data.patient_id);
                $('#amendment_status_e  option[value="' + myArray.amendment_data.amendment_status + '"]')
                    .prop("selected", true);
                $("#amendment_source_e").val(myArray.amendment_data.amendment_source);
                $("#amdments_date_time_e").val(myArray.amendment_data.amdments_date_time);
                $("#amdmentsproccess_date_time_e").val(myArray.amendment_data.amdmentsproccess_date_time);
                $("#amdments_id").val(myArray.amendment_data.id);
            }
            if (myArray.recordvaccinations_data == null) {} else {
                $(".patient_ID").val(myArray.recordvaccinations_data.patient_id);
                //$('#record_vaccinations_consent_form_e  option[value="'+myArray.consentform+'"]').prop("selected", true);
                $("#record_vaccinations_create_record_e").val(myArray.recordvaccinations_data
                    .create_record_for).trigger('change');
                $('#record_vaccinations_create_record_e  option[value="' + myArray.recordvaccinations_data
                    .create_record_for + '"]').prop("selected", true);
                $('#record_vaccinations_cvx_code_e').val(myArray.recordvaccinations_data.cvxcode);
                $("#record_vaccinations_manfacturer_e").val(myArray.recordvaccinations_data.manfacturer);

                $("#record_vaccination_administered_unit_e").val(myArray.recordvaccinations_data
                    .administered_units).trigger('change');
                $('#record_vaccination_administered_unit_e  option[value="' + myArray
                    .recordvaccinations_data.administered_units + '"]').prop("selected", true);

                $("#record_vaccination_vaccinate_route_e").val(myArray.recordvaccinations_data
                    .vaccinate_route).trigger('change');
                $('#record_vaccination_vaccinate_route_e  option[value="' + myArray.recordvaccinations_data
                    .vaccinate_route + '"]').prop("selected", true);
                $("#record_vaccination_vaccinate_site_e").val(myArray.recordvaccinations_data
                    .vaccinate_site).trigger('change');
                $('#record_vaccination_vaccinate_site_e  option[value="' + myArray.recordvaccinations_data
                    .vaccinate_site + '"]').prop("selected", true);
                $("#record_vaccination_vaccinate_status_e").val(myArray.recordvaccinations_data
                    .vaccinate_status).trigger('change');
                $('#record_vaccination_vaccinate_status_e  option[value="' + myArray.recordvaccinations_data
                    .vaccinate_status + '"]').prop("selected", true);
                $("#record_vaccination_ordering_doctor_e").val(myArray.recordvaccinations_data
                    .ordering_doctor).trigger('change');
                $('#record_vaccination_ordering_doctor_e  option[value="' + myArray.recordvaccinations_data
                    .ordering_doctor + '"]').prop("selected", true);
                $("#record_vaccination_administered_by_e").val(myArray.recordvaccinations_data
                    .administered_by).trigger('change');
                $('#record_vaccination_administered_by_e  option[value="' + myArray.recordvaccinations_data
                    .administered_by + '"]').prop("selected", true);
                $("#record_vaccination_administered_at_e").val(myArray.recordvaccinations_data
                    .administered_at).trigger('change');
                $('#record_vaccination_administered_at_e  option[value="' + myArray.recordvaccinations_data
                    .administered_at + '"]').prop("selected", true);
                $("#record_vaccination_inventory_lot_e").val(myArray.recordvaccinations_data.inventory_lot)
                    .trigger('change');
                $('#record_vaccination_inventory_lot_e  option[value="' + myArray.recordvaccinations_data
                    .inventory_lot + '"]').prop("selected", true);
                $("#record_vaccination_record_type_e").val(myArray.recordvaccinations_data.record_type)
                    .trigger('change');
                $('#record_vaccination_record_type_e  option[value="' + myArray.recordvaccinations_data
                    .record_type + '"]').prop("selected", true);
                $("#record_vaccination_funding_eligibility_e").val(myArray.recordvaccinations_data
                    .funding_eligibility).trigger('change');
                $('#record_vaccination_funding_eligibility_e  option[value="' + myArray
                    .recordvaccinations_data.funding_eligibility + '"]').prop("selected", true);
                $("#record_vaccination_observed_immunity_e").val(myArray.recordvaccinations_data
                    .observed_immunity).trigger('change');
                $('#record_vaccination_observed_immunity_e  option[value="' + myArray
                    .recordvaccinations_data.observed_immunity + '"]').prop("selected", true);
                $("#record_vaccinations_name_e").val(myArray.recordvaccinations_data.name);
                $("#record_vaccinations_cpt_code_e").val(myArray.recordvaccinations_data.cpt_code);
                $("#record_vaccination_lot-num_e").val(myArray.recordvaccinations_data.lot_num);
                $("#record_vaccination_expirationdate_e").val(myArray.recordvaccinations_data
                    .expirationdate).trigger('change');
                $("#administered_amount_e").val(myArray.recordvaccinations_data.administered_amount);
                $("#record_vaccination_administred_on_e").val(myArray.recordvaccinations_data
                    .administred_on);
                $("#record_vaccination_notes_e").val(myArray.recordvaccinations_data
                    .record_vaccination_notes);
                $("#record_vaccinations_id").val(myArray.recordvaccinations_data.id);
            }

            $('#hospital-record-edit').modal('toggle');
        }

    });
}

function get_record_vaccination(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_record_vaccination'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#get_record_vaccination").html(data);
        }

    });
}

function get_reviewsign(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_reviewandsign'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#review_sign").html(data);
        }

    });
}

function get_vitalsign(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_vitalsign'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#vital_sign").html(data);
        }

    });
}

function get_vitalsigns(patient_ID) {

    var patient_ID = $(".patient_ID").val();
    get_scheduleappointment(patient_ID)
    get_vitalsign(patient_ID);
    get_problem_allergies(patient_ID);
    get_allergies(patient_ID);
    get_lab_result(patient_ID);
    get_imaging_order(patient_ID);
    get_eprescription(patient_ID);
    get_record_vaccination(patient_ID);
    get_reviewsign(patient_ID);
    get_summary(patient_ID);
    get_document(patient_ID);
    get_lockedclinicalnotes(patient_ID);
    get_signedconsentforms(patient_ID);
    get_doclabresult(patient_ID);
    get_healthrecord(patient_ID);
    get_patient_profile(patient_ID);
}

function get_lockedclinicalnotes(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_lockedclinicalnotes'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#locked_clinical_notes").html(data);
        }
    });
}

function get_signedconsentforms(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_signedconsentforms'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#signed_consent_forms").html(data);
        }
    });
}

function get_healthreportamendments(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_amendments'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#amendments_list").html(data);
        }

    });
}

function get_doclabresult(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_doclabresult'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#doc_lab_result").html(data);
        }

    });
}

function get_document(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_uploadeddocument'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#get_document").html(data);
        }

    });
}

function get_summary(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_summary'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#get_summary").html(data);
        }

    });
}

function get_eprescription(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_eprescription'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#eprescription").html(data);
        }

    });
}

function get_healthrecord(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_healthrecord'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#healthreport").html(data);
        }

    });
}

function get_lab_result(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_lab_result'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#lab_result").html(data);
        }

    });
}

function get_imaging_order(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_imaging_order'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#imaging_order").html(data);
        }

    });
}

function get_problem_allergies(patient_ID) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_problem_allergies'); ?>",
        data: 'patient_name=' + patient_ID + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            //alert(data);
            $("#problem_t").html(data);
        }

    });
}
</script>
<!-- <script language="javascript">
                                window.onload = function () {
                                var chart = new CanvasJS.Chart("chartHeartrate", {
                                animationEnabled: true,
                                theme: "light2",
                                title:{
                                text: "Heart Rate"
                                },
                                data: [{
                                type: "line",
                                indexLabelFontSize: 16,
                                dataPoints: [
                                { y: 30 },
                                { y: 20},
                                { y: 50 },
                                { y: 80 },
                                { y: 44 },
                                ]
                                }]
                                });
                                chart.render();
                                }
                                </script>
                                <script language="javascript">
                                window.onload = function () {
                                var chart = new CanvasJS.Chart("chartBloodpressure", {
                                animationEnabled: true,
                                theme: "light2",
                                title:{
                                text: "Blood Pressure"
                                },
                                data: [{
                                type: "line",
                                indexLabelFontSize: 16,
                                dataPoints: [
                                { y: 30 },
                                { y: 20},
                                { y: 50 },
                                { y: 80 },
                                { y: 44 },
                                ]
                                }]
                                });
                                chart.render();
                                }
                                </script> -->
<script>
//   $(document).on("click", ".panel-heading", function () {
//       if ($(this).attr('class').indexOf('open') == 1)
//  $(this).toggleClass("open").next().slideToggle('fast');
//       //Hide the other panels
//       $(".panel-heading").not($(this)).removeClass("open");
//       $(".panel-collapse").not($(this).next()).slideUp('fast');
//   });
</script>
<script>
(function($) {
    if ($('.chart-circle').length) {
        $('.chart-circle').each(function() {
            let $this = $(this);
            $this.circleProgress({
                fill: {
                    color: $this.attr('data-color')
                },
                size: $this.height(),
                startAngle: -Math.PI / 4 * 2,
                emptyFill: '#f9f9f9',
                lineCap: 'round'
            });
        });
    }
});
</script>
<script>
$("#file-1").fileinput({
    theme: 'fa',
    uploadUrl: '#',
    allowedFileExtensions: ['jpg', 'png', 'gif', 'pdf'],
    overwriteInitial: false,
    maxFileSize: 2000,
    maxFilesNum: 10,
    slugCallback: function(filename) {
        return filename.replace('(', '_').replace(']', '_');
    }
});
$("#file-1_e").fileinput({
    theme: 'fa',
    uploadUrl: '#',
    allowedFileExtensions: ['jpg', 'png', 'gif', 'pdf'],
    overwriteInitial: false,
    maxFileSize: 2000,
    maxFilesNum: 10,
    slugCallback: function(filename) {
        return filename.replace('(', '_').replace(']', '_');
    }
});
</script>
<script>
// $(document).ready(function () {
//   $("select").change(function () {
//     $(this).find("option:selected").each(function () {
//       var optionValue = $(this).attr("value");
//       if (optionValue) {
//         $(".table-box").not("." + optionValue).hide();
//         $("." + optionValue).show();
//       } else {
//         $(".table-box").hide();
//       }
//     });
//   }).change();
// });
$(document).ready(function() {
    $("select").change(function() {
        $("select option:selected").each(function() {
            if ($(this).attr("value") == "birth") {
                $(".table-box").hide();
                $(".birth").show();
            }
            if ($(this).attr("value") == "year") {
                $(".table-box").hide();
                $(".year").show();
            }
            if ($(this).attr("value") == "adult") {
                $(".table-box").hide();
                $(".adult").show();
            }
            if ($(this).attr("value") == "other") {
                $(".table-box").hide();
                $(".other").show();
            }
        });
    }).change();
});
</script>

<script>
function get_vaccinesschedule(vaccination) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_vaccinesschedule'); ?>",
        data: 'vaccination=' + vaccination + '&<?php echo $this->security->get_csrf_token_name();?>=' + '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var schedule_data = JSON.parse(data);
            var array_length = data.length;
            //alert(typeof(obj));
            //autocomplete(document.getElementById("schedule"), schedule_data, array_length);
            get_vaccines_vaccine(vaccination)
        }
    });
}
function get_vaccines_vaccine(vaccination) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_vaccines_vaccine'); ?>",
        data: 'vaccination=' + vaccination + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var vaccine_data = JSON.parse(data);
            var array_length = data.length;
            //alert(typeof(obj));
           // autocomplete(document.getElementById("vaccine"), vaccine_data, array_length);
        }
    });
}
function search_vaccinesschedule(){
    var vaccination = $("#Addselect_vaccination").val();
    var schedule    = $("#schedule").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/search_vaccinesschedule'); ?>",
        beforeSend: function() {
            $("#loadingschedule").css("display","block");
        },
        data: 'vaccination=' + vaccination +'&schedule='+schedule+'&<?php echo $this->security->get_csrf_token_name();?>=' + '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var schedule_data = JSON.parse(data);
            var array_length = data.length;
            //alert(typeof(obj));

            if (schedule_data === 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>SCHEDULE Not Found.</strong>";
                a.append(b);
                $(".autocomplete_schedule").after(a);
                $("#schedule").val("");
                $("#loadingschedule").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("schedule"), schedule_data, array_length);
                $("#loadingschedule").css("display","none");
            }
        }
    });
}


function search_vaccinesschedule_edit(){
    var vaccination = $("#Addselect_vaccination_e").val();
    var schedule    = $("#schedule_e").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/search_vaccinesschedule'); ?>",
        data: 'vaccination=' + vaccination +'&schedule='+schedule+'&<?php echo $this->security->get_csrf_token_name();?>=' + '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var schedule_data = JSON.parse(data);
            var array_length = data.length;
            //alert(typeof(obj));

            if (schedule_data === 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>SCHEDULE Not Found.</strong>";
                a.append(b);
                $(".autocomplete_schedule_e").after(a);
                $("#schedule_e").val("");

            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("schedule_e"), schedule_data, array_length);
            }
        }
    });
}


function search_vaccines_vaccine(){
    var vaccination = $("#Addselect_vaccination").val();
    var vaccine    = $("#vaccine").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/search_vaccines_vaccine'); ?>",
        beforeSend: function() {
            $("#loadingvaccine").css("display","block");
        },
        data: 'vaccination=' + vaccination +'&vaccine='+vaccine+'&<?php echo $this->security->get_csrf_token_name();?>=' + '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var vaccine_data = JSON.parse(data);
            var array_length = data.length;
            //alert(typeof(obj));

            if (vaccine_data.length === 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>VACCINE Not Found.</strong>";
                a.append(b);
                $(".autocomplete_vaccine").after(a);
                $("#vaccine").val("");
                $("#loadingvaccine").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("vaccine"), vaccine_data, array_length);
                $("#loadingvaccine").css("display","none");
            }
        }
    });
}

function search_vaccines_vaccine_edit(){
    var vaccination = $("#Addselect_vaccination_e").val();
    var vaccine    = $("#vaccine_e").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/search_vaccines_vaccine'); ?>",
        data: 'vaccination=' + vaccination +'&vaccine='+vaccine+'&<?php echo $this->security->get_csrf_token_name();?>=' + '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var vaccine_data = JSON.parse(data);
            var array_length = data.length;
            //alert(typeof(obj));

            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>VACCINE Not Found.</strong>";
                a.append(b);
                $(".autocomplete_vaccine_e").after(a);
                $("#vaccine_e").val("");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("vaccine_e"), vaccine_data, array_length);
            }
        }
    });
}


function get_edit_vaccinesschedule(vaccination, schedule = "", vaccine = "") {
    //alert(schedule);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_vaccinesschedule'); ?>",
        data: 'vaccination=' + vaccination + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var schedule_data = JSON.parse(data);
            var array_length = data.length;
            autocomplete(document.getElementById("schedule_e"), schedule_data, array_length);
            $("#schedule_e").val(schedule);

            get_edit_vaccines_vaccine(vaccination, vaccine);
        }
    });
}

function get_edit_vaccines_vaccine(vaccination, vaccine = "") {
     //alert(schedule);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_vaccines_vaccine'); ?>",
        data: 'vaccination=' + vaccination + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var vaccine_data = JSON.parse(data);
            var array_length = data.length;
            autocomplete(document.getElementById("vaccine_e"), vaccine_data, array_length);
            $("#vaccine_e").val(vaccine);
        }
    });
}
/*function get_update_Vaccines(patient_ID){
$.ajax({
type: "POST",
url: "<?php //echo base_url('health_report/get_update_Vaccines'); ?>",
data:'patient_name='+patient_ID+'&<?php //echo $this->security->get_csrf_token_name();?>='+'<?php //echo $this->security->get_csrf_hash();?>',
success:
function(data){
var myArray = jQuery.parseJSON(data);
//console.log(myArray.vaccines);
//console.log(myArray.schedule);
//console.log(myArray.vaccine);
$(".patient_ID").val(myArray.patient_id);

$("#Addselect_vaccination_e").val(myArray.vaccines).trigger('change');
$('#Addselect_vaccination_e  option[value="'+myArray.vaccines+'"]').prop("selected", true);
get_edit_vaccinesschedule(myArray.vaccines,myArray.schedule,myArray.vaccine);
get_edit_vaccines_vaccine(myArray.vaccines,myArray.vaccine);
$("#immunizationscvx_code_vaccines_e").val(myArray.cvxcode).trigger('change');
$('#immunizationscvx_code_vaccines_e  option[value="'+myArray.cvxcode+'"]').prop("selected", true);
$("#vaccines_e_ID").val(myArray.id);
}
});
}*/
</script>
<script>
$(document).ready(function() {
    $('.sigPad').signaturePad();

    $("#hospital-record").on('hidden.bs.modal', function() {
        get_vitalsigns();
    });

    $("#hospital-record-edit").on('hidden.bs.modal', function() {
        get_vitalsigns();
    });

});
</script>
<script>
const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");
customBtn.addEventListener("click", function() {
    realFileBtn.click();
});
realFileBtn.addEventListener("change", function() {
    if (realFileBtn.value) {
        customTxt.innerHTML = realFileBtn.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } else {
        customTxt.innerHTML = "No file chosen, yet.";
    }
});
</script>
<script>
$(document).ready(function() {
    $('select').selectize({
        sortField: 'text'
    });
    $(".alert-errormessge").hide();
    $(".Patient_errormsg").hide();
});
</script>
<script type="text/javascript">

function save_vitalsing() {
    var patient_ID = $(".patient_ID").val();
    var temperature = $("#temp").val();
    var heart_rate = $("#heart-rate").val();
    var blood_presure = $("#blood-presure").val();
    var respiratory_rate = $("#respiratory-rate").val();
    var oxygen_saturation = $("#oxygen-saturation").val();
    var height = $("#height").val();
    var weight = $("#weight").val();
    var bmi = $("#bmi").val();
    var pain = $("#pain").val();
    var smoking = $("#smoking").val();
    var head_circumfernce = $("#head-circumfernce").val();
    var glucose_glucometer = $("#glucose-glucometer").val();
    var bloodtype = $("#bloodtype").val();
    if (patient_ID =="") {
        $(".Patient_errormsg").show("slow");
      $(".Patient_errormsg").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

      return false;
    }
    if (temperature =="" ) {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Temperature In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;
    }else{
      if (temperature.replace(/[^0-9\.]/g, '') == false) {


        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in Temprature In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;
      }
    }
    if (heart_rate == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Heart  Rate In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;
    }else{
      if (heart_rate.replace(/[^0-9\.]/g, '') == false) {


        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in Heart Rate In Vital Sing. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;
      }
    }
    if (blood_presure == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Blood  Pressure In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;
    }else{
      if (blood_presure.replace(/[^0-9\.]/g, '') == false) {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Blood Please Enter only Number OR Decinmal value in Blood Presure In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;
      }
    }
    if (respiratory_rate == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Respiratory Rate In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;
    }else{
      if (respiratory_rate.replace(/[^0-9\.]/g, '') == false) {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in Respiratory.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;
      }
    }
    if (oxygen_saturation == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter OXYGEN SATURATION In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;
    }else{
      if (oxygen_saturation.replace(/[^0-9\.]/g, '') == false) {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in OXYGEN SATURATION.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;
      }
    }
    if (height == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter HEIGHT In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;

    }else{
      if (height.replace(/[^0-9\.]/g, '') == false) {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in HEIGHT.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

            return false;
      }
    }
    if (weight == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter WEIGHT In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;

    }else{
      if (weight.replace(/[^0-9\.]/g, '') == false) {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in WEIGHT.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

            return false;
      }
    }
    if (bmi == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter BMI In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;

    }else{
      if (bmi.replace(/[^0-9\.]/g, '') == false) {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in BMI.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

            return false;
      }
    }
    if (pain == "") {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter PAIN In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

            return false;
    }else{
      if (pain.replace(/[^0-9\.]/g, '') == false) {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in PAIN.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

            return false;
      }
    }

    /* if (smoking == "") {
      $(".Smoking_errormsg").text("Please Enter Smoking Status .");
      setTimeout(function(){ $(".Smoking_errormsg").hide(); }, 5000);
      return false;

    }else{
      if (weight.replace("^[a-zA-Z]+$", '') == false) {
        $(".Smoking_errormsg").text("Please Enter only Alphabets.");
        setTimeout(function(){ $(".Smoking_errormsg").hide(); }, 5000);
        return false;
      }
    } */

    if (head_circumfernce == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter HEAD CIRCUMFERENCE In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;

    }else{
      if (head_circumfernce.replace(/[^0-9\.]/g, '') == false) {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in HEAD CIRCUMFERENCE.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

            return false;
      }
    }

    if (glucose_glucometer == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter BLOOD SUGAR/BLOOD GLUCOSE In Vital Sing.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

        return false;

    }else{
      if (glucose_glucometer.replace(/[^0-9\.]/g, '') == false) {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in BLOOD SUGAR/BLOOD GLUCOSE.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");

            return false;
      }
    }
    setTimeout(function(){ $(".Patient_errormsg").hide("slow"); }, 5000);
    setTimeout(function(){ $(".alert-errormessge").hide("slow"); }, 1000);

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_vitalsing') ?>",
        global: false,
        data: 'bloodtype=' + bloodtype + '&patient_ID=' + patient_ID + '&' + 'temperature=' + temperature +
            '&heart_rate=' + heart_rate + '&blood_presure=' + blood_presure + '&respiratory_rate=' +
            respiratory_rate + '&oxygen_saturation=' + oxygen_saturation + '&height=' + height + '&weight=' +
            weight + '&bmi=' + bmi + '&pain=' + pain + '&smoking=' + smoking + '&head_circumfernce=' +
            head_circumfernce + '&glucose_glucometer=' + glucose_glucometer +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        beforeSend: function() {
            $('#overlay').css("display", "block");
        },
        dataType: "text",
        cache: false,
        success: function(data) {
            if (data == 1) {

                $("#temp").val("");
                $("#heart-rate").val("");
                $("#blood-presure").val("");
                $("#respiratory-rate").val("");
                $("#oxygen-saturation").val("");
                $("#height").val("");
                $("#weight").val("");
                $("#bmi").val("");
                $("#pain").val("");
                $("#smoking").val("");
                $("#head-circumfernce").val("");
                $("#glucose-glucometer").val("");
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Vital Sign For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}
/*edit vital **/
function edit_vitalsing() {
    var patient_ID = $(".patient_ID").val();
    var temperature = $("#temp_e").val();
    var vital_id = $("#vital_id").val();
    var heart_rate = $("#heart-rate_e").val();
    var blood_presure = $("#blood-presure_e").val();
    var respiratory_rate = $("#respiratory-rate_e").val();
    var oxygen_saturation = $("#oxygen-saturation_e").val();
    var height = $("#height_e").val();
    var weight = $("#weight_e").val();
    var bmi = $("#bmi_e").val();
    var pain = $("#pain_e").val();
    var smoking = $("#smoking_e").val();
    var head_circumfernce = $("#head-circumfernce_e").val();
    var glucose_glucometer = $("#glucose-glucometer_e").val();
    var bloodtype = $("#bloodtype_e").val();
    if (patient_ID == "") {
        $(".Patient_errormsg").html(
            "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
            );
        setTimeout(function() {
            $(".Patient_errormsg").hide();
        }, 10000);
        return false;
    }
    if (temperature == "") {
        $(".Temperature_errormsg").text("Please Enter Temperature.");
        setTimeout(function() {
            $(".Temperature_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (temperature.replace(/[^0-9\.]/g, '') == false) {
            $(".Temperature_errormsg").text("Please Enter only Number OR Decinmal value.");
            setTimeout(function() {
                $(".Temperature_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (heart_rate == "") {
        $(".Heartrate_errormsg").text("Please Enter Heart  Rate.");
        setTimeout(function() {
            $(".Heartrate_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (heart_rate.replace(/[^0-9\.]/g, '') == false) {
            $(".Heartrate_errormsg").text("Please Enter only Number OR Decinmal value.");
            setTimeout(function() {
                $(".Heartrate_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (blood_presure == "") {
        $(".Bloodpresure_errormsg").text("Please Enter Blood  Pressure.");
        setTimeout(function() {
            $(".Bloodpresure_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (blood_presure.replace(/[^0-9\.]/g, '') == false) {
            $(".Bloodpresure_errormsg").text("Please Enter only Number OR Decinmal value.");
            setTimeout(function() {
                $(".Bloodpresure_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (respiratory_rate == "") {
        $(".Respiratoryrate_errormsg").text("Please Enter Respiratory Rate.");
        setTimeout(function() {
            $(".Respiratoryrate_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (respiratory_rate.replace(/[^0-9\.]/g, '') == false) {
            $(".Respiratoryrate_errormsg").text("Please Enter only Number OR Decinmal value.");
            setTimeout(function() {
                $(".Respiratoryrate_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (oxygen_saturation == "") {
        $(".Oxygensaturation_errormsg").text("Please Enter Respiratory Rate.");
        setTimeout(function() {
            $(".Oxygensaturation_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (oxygen_saturation.replace(/[^0-9\.]/g, '') == false) {
            $(".Oxygensaturation_errormsg").text("Please Enter only Number OR Decinmal value.");
            setTimeout(function() {
                $(".Oxygensaturation_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (height == "") {
        $(".Height_errormsg").text("Please Enter Respiratory Rate.");
        setTimeout(function() {
            $(".Height_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (height.replace(/[^0-9\.]/g, '') == false) {
            $(".Height_errormsg").text("Please Enter only Number OR Decinmal value.");
            setTimeout(function() {
                $(".Height_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (weight == "") {
        $(".Weight_errormsg").text("Please Enter Respiratory Rate.");
        setTimeout(function() {
            $(".Weight_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (weight.replace(/[^0-9\.]/g, '') == false) {
            $(".Weight_errormsg").text("Please Enter only Number OR Decinmal value.");
            setTimeout(function() {
                $(".Weight_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (bmi == "") {
        $(".BMI_errormsg").text("Please Enter BMI .");
        setTimeout(function() {
            $(".BMI_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (weight.replace(/[^0-9\.]/g, '') == false) {
            $(".BMI_errormsg").text("Please Enter only Number OR Decinmal value.");
            setTimeout(function() {
                $(".BMI_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (pain == "") {
        $(".Pain_errormsg").text("Please Enter Pain .");
        setTimeout(function() {
            $(".Pain_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (weight.replace(/[^0-9\.]/g, '') == false) {
            $(".Pain_errormsg").text("Please Enter only Number OR Decinmal value.");
            setTimeout(function() {
                $(".Pain_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (smoking == "") {
        $(".Smoking_errormsg").text("Please Enter Smoking Status .");
        setTimeout(function() {
            $(".Smoking_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (weight.replace("^[a-zA-Z]+$", '') == false) {
            $(".Smoking_errormsg").text("Please Enter only Alphabets.");
            setTimeout(function() {
                $(".Smoking_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (head_circumfernce == "") {
        $(".Head_circumference_errormsg").text("Please Enter Smoking Status .");
        setTimeout(function() {
            $(".Head_circumference_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (weight.replace(/[^0-9\.]/g, '') == false) {
            $(".Head_circumference_errormsg").text("Please Enter only Alphabets.");
            setTimeout(function() {
                $(".Head_circumference_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (glucose_glucometer == "") {
        $(".Glucose_by_glucometer_errormsg").text("Please Enter Smoking Status .");
        setTimeout(function() {
            $(".Glucose_by_glucometer_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (glucose_glucometer.replace(/[^0-9\.]/g, '') == false) {
            $(".Glucose_by_glucometer_errormsg").text("Please Enter only Alphabets.");
            setTimeout(function() {
                $(".Glucose_by_glucometer_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/edit_vitalsing') ?>",
        data: 'bloodtype=' + bloodtype + '&vital_id=' + vital_id + '&patient_ID=' + patient_ID + '&' +
            'temperature=' + temperature + '&heart_rate=' + heart_rate + '&blood_presure=' + blood_presure +
            '&respiratory_rate=' + respiratory_rate + '&oxygen_saturation=' + oxygen_saturation + '&height=' +
            height + '&weight=' + weight + '&bmi=' + bmi + '&pain=' + pain + '&smoking=' + smoking +
            '&head_circumfernce=' + head_circumfernce + '&glucose_glucometer=' + glucose_glucometer +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "text",
        cache: false,
        success: function(data) {
            if (data == 1) {
                $(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   Vital Sign Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );

                //  $(".patient_ID").val("");
                $("#temp").val("");
                $("#heart-rate").val("");
                $("#blood-presure").val("");
                $("#respiratory-rate").val("");
                $("#oxygen-saturation").val("");
                $("#height").val("");
                $("#weight").val("");
                $("#bmi").val("");
                $("#pain").val("");
                $("#smoking").val("");
                $("#head-circumfernce").val("");
                $("#glucose-glucometer").val("");
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                    $('#hospital-record-edit').modal('hide');
                    get_vitalsigns();
                }, 10000);
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Vital Sign For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}
/*Svae Problem List*/
function save_problemlist() {
    var patient_ID = $(".patient_ID").val();
    var problem = $("input[name=problem]").val();
    var icdversion = $("#icdversion").val();
    var icd10_code = $("#icd10_code").val();
    var snomed_ct_code = $("#snomed_ct_code").val();
    var problem_status = $("#problem_status").val();
    var diagnosis_datetime = $("#diagnosis_datetime").val();
    var onset_datetime = $("#onset_datetime").val();
    var channged_datetime = $("#channged_datetime").val();
    var notes = $("#problem_notes").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_problemlist') ?>",
        global: false,
        data: 'patient_ID=' + patient_ID + '&' + 'problem=' + problem + '&icdversion=' + icdversion +
            '&icd10_code=' + icd10_code + '&snomed_ct_code=' + snomed_ct_code + '&problem_status=' +
            problem_status + '&diagnosis_datetime=' + diagnosis_datetime + '&onset_datetime=' + onset_datetime +
            '&channged_datetime=' + channged_datetime + '&notes=' + notes +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        beforeSend: function() {
            $('#overlay').css("display", "block");
        },
        dataType: "text",
        cache: false,
        success: function(data) {
            if (data == 1) {
                /*$(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   Problem List Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                }, 10000);*/
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Problem List For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}

function edit_problemlist() {
    var patient_ID = $(".patient_ID").val();
    var problem = $("#select_problem_e").val();
    var healthreport_problem_id = $("#healthreport_problem_id").val();
    var icdversion = $("#icdversion_e").val();
    var icd10_code = $("#icd10_code_e").val();
    var snomed_ct_code = $("#snomed_ct_code_e").val();
    var problem_status = $("#problem_status_e").val();
    var diagnosis_datetime = $("#diagnosis_datetime_e").val();
    var onset_datetime = $("#onset_datetime_e").val();
    var channged_datetime = $("#channged_datetime_e").val();
    var notes = $("#problem_notes_e").val();
    if (patient_ID == "") {
        $(".Patient_errormsg").html(
            "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
            );
        setTimeout(function() {
            $(".Patient_errormsg").hide();
        }, 10000);
        return false;
    }
    if (problem == "") {
        $(".Problem_errormsg").text("Please Select Problem.");
        setTimeout(function() {
            $(".Problem_errormsg").hide();
        }, 10000);
        return false;
    }
    if (icdversion == "") {
        $(".Icdversion_errormsg").text("Please Select ICD Version.");
        setTimeout(function() {
            $(".Icdversion_errormsg").hide();
        }, 10000);
        return false;
    }
    if (icd10_code == "") {
        $(".Icd10code_errormsg").text("Please Enter ICD10Code.");
        setTimeout(function() {
            $(".Icd10code_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (icd10_code.replace(/[^0-9\.]/g, '') == false) {
            $(".Icd10code_errormsg").text("Please Enter only Number OR Decinmal value.");
            setTimeout(function() {
                $(".Icd10code_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (snomed_ct_code == "") {
        $(".Snomedctcode_errormsg").text("Please Enter SNOMED CT Code.");
        setTimeout(function() {
            $(".Snomedctcode_errormsg").hide();
        }, 10000);
        return false;
    } else {
        if (snomed_ct_code.replace(/[^0-9\.]/g, '') == false) {
            $(".Snomedctcode_errormsg").text("Please Enter only Number OR Decinmal value.");
            setTimeout(function() {
                $(".Snomedctcode_errormsg").hide();
            }, 10000);
            return false;
        }
    }
    if (problem_status == "") {
        $(".Problemstatus_errormsg").text("Please Select Status .");
        setTimeout(function() {
            $(".Problemstatus_errormsg").hide();
        }, 10000);
        return false;
    }
    if (diagnosis_datetime == "") {
        $(".Diagnosisdatetime_errormsg").text("Please Select Diagnosis Date Time.");
        setTimeout(function() {
            $(".Diagnosisdatetime_errormsg").hide();
        }, 10000);
        return false;
    }
    if (onset_datetime == "") {
        $(".Onsetdatetime_errormsg").text("Please Select ONSET Datetime.");
        setTimeout(function() {
            $(".Onsetdatetime_errormsg").hide();
        }, 10000);
        return false;
    }
    if (channged_datetime == "") {
        $(".Channgeddatetime_errormsg").text("Please Select CHANNGED Datetime .");
        setTimeout(function() {
            $(".Channgeddatetime_errormsg").hide();
        }, 10000);
        return false;
    }
    if (notes == "") {
        $(".notes_errormsg").text("Please Enter Notes .");
        setTimeout(function() {
            $(".notes_errormsg").hide();
        }, 10000);
        return false;
    }
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/edit_problemlist') ?>",
        data: 'healthreport_problem_id=' + healthreport_problem_id + '&patient_ID=' + patient_ID + '&' +
            'problem=' + problem + '&icdversion=' + icdversion + '&icd10_code=' + icd10_code +
            '&snomed_ct_code=' + snomed_ct_code + '&problem_status=' + problem_status + '&diagnosis_datetime=' +
            diagnosis_datetime + '&onset_datetime=' + onset_datetime + '&channged_datetime=' +
            channged_datetime + '&notes=' + notes + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "text",
        cache: false,
        success: function(data) {
            if (data == 1) {
                $(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   Problem List Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                    $('#hospital-record-edit').modal('hide');
                    get_vitalsigns();
                }, 10000);
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Problem List For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}
/*Svae Allergy  List*/
function save_allergylist() {
    var patient_ID = $(".patient_ID").val();
    var allergy_type = $("#allergy_type").val();
    var drug_allergy = $("input[name=drug_allergy]").val();
    var reaction = $(".reaction").val();
    var severity = $("#severity").val();
    var allergy_status = $("#allergy_status").val();
    var notes = $("#allergy_notes").val();
    var a_date_time = $("#a_date_time").val();
    var a_updated_by = $("#a_updated_by").val();
    var patient_name = $("#patient_name").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_allergylist') ?>",
        global: false,
        data: 'patient_name=' + patient_name + '&a_date_time=' + a_date_time + '&a_updated_by=' + a_updated_by +
            '&patient_ID=' + patient_ID + '&' + 'allergy_type=' + allergy_type + '&drug_allergy=' +
            drug_allergy + '&reaction=' + reaction + '&severity=' + severity + '&allergy_status=' +
            allergy_status + '&notes=' + notes + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        beforeSend: function() {
            $('#overlay').css("display", "block");
        },
        dataType: "text",
        cache: false,

        success: function(data) {
            if (data == 1) {
                /*$(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   Allergy List Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                }, 10000);*/
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Allergy List For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}
/*Svae lab Result  List*/
function save_labresult() {
    var patient_ID = $(".patient_ID").val();
    var loinc_code = $("#loinc_code").val();
    var discription = $("#discription").val();
    var result_value = $("#result_value").val();
    var units = $("#units").val();
    var normal_range = $("#normal_range").val();
    var abnormal_flag = $("#abnormal_flag").val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_labresult') ?>",
        global: false,
        data: 'patient_ID=' + patient_ID + '&' + 'loinc_code=' + loinc_code + '&discription=' + discription +
            '&result_value=' + result_value + '&units=' + units + '&normal_range=' + normal_range +
            '&abnormal_flag=' + abnormal_flag + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        beforeSend: function() {
            $('#overlay').css("display", "block");
        },
        dataType: "text",
        cache: false,

        success: function(data) {
            if (data == 1) {
                /*$(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   Lab Result Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                }, 10000);*/
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Lab Result  For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}

function edit_labresult() {
  //alert($("#healthreport_labresult_id").val());
//  exit;
    var patient_ID = $(".patient_ID").val();
    var loinc_code = $("#loinc_code_e").val();
    var healthreport_labresult_id = $("#healthreport_labresult_id").val();
    var discription = $("#discription_e").val();
    var result_value = $("#result_value_e").val();
    var units = $("#units_e").val();
    var normal_range = $("#normal_range_e").val();
    var cvx_code = $("#cvx_code_e").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/edit_labresult') ?>",
        data: 'healthreport_labresult_id=' + healthreport_labresult_id + '&patient_ID=' + patient_ID + '&' +
            'loinc_code=' + loinc_code + '&discription=' + discription + '&result_value=' + result_value +
            '&units=' + units + '&normal_range=' + normal_range + '&cvx_code=' + cvx_code +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "text",
        cache: false,
        success: function(data) {
            if (data == 1) {
                $(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   Lab Result Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                    $('#hospital-record-edit').modal('hide');
                    get_vitalsigns();
                }, 10000);
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Lab Result  For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}
/*Svae Imaging Order  List*/
$(document).ready(function() {
    $('#imaging_order_form').on('submit', function(e) {
        e.preventDefault();
        var patient_ID = $(".patient_ID").val();
        var cpt_code = $("#cpt_code").val();
        var discription = $("#imaging_order_description").val();
        var order_status = $("#imaging_order_status").val();
        var scanned_result = $("#scanned_result").val();
        var doctor_comments = $("#doctor_comments").val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_imagingorder') ?>",
            global: false,
            data: new FormData(this),
            beforeSend: function() {
                $('#overlay').css("display", "block");
            },
            async: false,
            enctype: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,

            success: function(data) {
                /*$(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   Imaging Order  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                }, 10000);*/
            }
        });
    });
    /*edit **/
    $('#imaging_order_form_e').on('submit', function(e) {
        e.preventDefault();
        var patient_ID = $(".patient_ID").val();
        var cpt_code = $("#cpt_code_e").val();
        var discription = $("#imaging_order_description_e").val();
        var order_status = $("#imaging_order_status_e").val();
        var healthreport_imaging_id = $("#healthreport_imaging_id");
        var scanned_result = $("#scanned_result_e").val();
        var doctor_comments = $("#doctor_comments_e").val();
        if (patient_ID == "") {
            $(".Patient_errormsg").html(
                "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                );
            setTimeout(function() {
                $(".Patient_errormsg").hide();
            }, 10000);
            return false;
        }
        if (cpt_code == "") {
            $(".Cptcode_errormsg").text("Please Select CPT Code.");
            setTimeout(function() {
                $(".Cptcode_errormsg").hide();
            }, 10000);
            return false;
        }
        if (discription == "") {
            $(".Description_errormsg").text("Please Enter Discription.");
            setTimeout(function() {
                $(".Description_errormsg").hide();
            }, 10000);
            return false;
        }
        if (order_status == "") {
            $(".Orderstatus_errormsg").text("Please Select  Order Status.");
            setTimeout(function() {
                $(".Orderstatus_errormsg").hide();
            }, 10000);
            return false;
        }
        /*if (scanned_result == "") {
        $(".Scannedresult_errormsg").text("Please Select Scanned In Result.");
        setTimeout(function(){ $(".Scannedresult_errormsg").hide(); }, 10000);
        return false;
        }*/
        if (doctor_comments == "") {
            $(".Doctorcomments_errormsg").text("Please Enter Normal Range .");
            setTimeout(function() {
                $(".Doctorcomments_errormsg").hide();
            }, 10000);
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/edit_imagingorder') ?>",
            data: new FormData(this),
            async: false,
            enctype: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   Imaging Order  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                    $('#hospital-record-edit').modal('hide');
                    get_vitalsigns();
                }, 10000);
            }
        });
    });
});
/*Svae E-prescription Medication  List*/
function save_e_prescription() {
    var patient_ID = $(".patient_ID").val();
    var drug_name = $("#drug_name").val();
    if ($(".prn").is(":checked"))
    {
        var prn = $(".prn").val();
    }else{
        var prn = "";
    }

    var sign_note = $("#sign_note").val();
    var sign = $("#sign").val();
    var indication = $("#indication").val();
    var e_prescription_status = $("#e_prescription_status option:selected").val();
    var appointment = $("#appointment").val();
    var prescribe_date_time = $("#prescribe_date_time").val();
    var started_taking_date_time = $("#started_taking_date_time").val();
    var stopped_taking_date_time = $("#stopped_taking_date_time").val();
    var dispense_quantity = $("#dispense_quantity").val();
    var dispense_package = $("#dispense_package").val();
    var number_refills = $("#number_refills").val();
    if ($(".daw").is(":checked"))
    {
        var daw = $(".daw").val();
    }else{
        var daw = "";
    }

    var pharmacy_note = $("#pharmacy_note").val();
    var order_status = $(".e_prescription_orderstatus").val();
    var notes = $("#notes").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_e_prescription') ?>",
        global: false,
        data: 'patient_ID=' + patient_ID + '&drug_name=' + drug_name + '&prn=' + prn + '&sign_note=' +
            sign_note + '&sign=' + sign + '&indication=' + indication + '&e_prescription_status=' +
            e_prescription_status + '&appointment=' + appointment + '&prescribe_date_time=' +
            prescribe_date_time + '&started_taking_date_time=' + started_taking_date_time +
            '&stopped_taking_date_time=' + stopped_taking_date_time + '&dispense_quantity=' +
            dispense_quantity + '&number_refills=' + number_refills + '&daw=' + daw + '&dispense_package=' +
            dispense_package + '&pharmacy_note=' + pharmacy_note + '&order_status=' + order_status + '&notes=' +
            notes + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
         beforeSend: function() {
            $('#overlay').css("display", "block");
        },
        dataType: "text",
        cache: false,

        success: function(data) {
            if (data == 1) {
                /*$(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   E-prescription Medication  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                }, 10000);*/
            } else if (data == 2) {
               $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  E-Prescription For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}

function edit_e_prescription() {
//  alert('test');

    var patient_ID = $(".patient_ID").val();
    var drug_name = $("#drug_name_e").val();
    var prn = $(".prn").val();
    var sign_note = $("#sign_note_e").val();
    var sign = $("#sign_e").val();
    var indication = $("#indication_e").val();
    var e_prescription_status = $("#e_prescription_status_e option:selected").val();
  //  alert(e_prescription_status);
    var appointment = $("#appointment_e").val();
    var prescribe_date_time = $("#prescribe_date_time_e").val();
    var started_taking_date_time = $("#started_taking_date_time_e").val();
    var stopped_taking_date_time = $("#stopped_taking_date_time_e").val();
    var dispense_quantity = $("#dispense_quantity_e").val();
    var dispense_package = $("#dispense_package_e").val();
    var number_refills = $("#number_refills_e").val();
    var daw = $(".daw").val();
    var pharmacy_note = $("#pharmacy_note_e").val();
    var order_status = $(".e_prescription_orderstatus_e").val();
    var notes = $("#notes_e").val();
    var e_prescription = $("#e_prescription").val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/edit_e_prescription') ?>",
        data: 'e_prescription=' + e_prescription + '&patient_ID=' + patient_ID + '&drug_name=' + drug_name +
            '&prn=' + prn + '&sign_note=' + sign_note + '&sign=' + sign + '&indication=' + indication +
            '&status=' + e_prescription_status + '&appointment=' + appointment + '&prescribe_date_time=' +
            prescribe_date_time + '&started_taking_date_time=' + started_taking_date_time +
            '&stopped_taking_date_time=' + stopped_taking_date_time + '&dispense_quantity=' +
            dispense_quantity + '&number_refills=' + number_refills + '&daw=' + daw + '&dispense_package=' +
            dispense_package + '&pharmacy_note=' + pharmacy_note + '&order_status=' + order_status + '&notes=' +
            notes + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "text",
        cache: false,
        success: function(data) {
            if (data == 1) {
                $(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   E-prescription Medication  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                    $('#hospital-record-edit').modal('hide');
                    get_vitalsigns();
                }, 10000);
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  E-Prescription For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}

function save_summary() {
    var patient_ID = $(".patient_ID").val();
    var summary = $("#summary_description").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_summary') ?>",
        global: false,
        data: 'patient_ID=' + patient_ID + '&summary=' + summary +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        beforeSend: function() {
            $('#overlay').css("display", "block");
        },
        dataType: "text",
        cache: false,

        success: function(data) {
            if (data == 1) {
                /*$(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   Summary  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                }, 10000);*/
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Summary For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}

function edit_summary() {
    var patient_ID = $(".patient_ID").val();
    var summary = $("#summary_description_e").val();
    var summary_id = $("#summary_id").val();
    //  console.log(summary);
    if (patient_ID == "") {
        $(".Patient_errormsg").html(
            "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
            );
        setTimeout(function() {
            $(".Patient_errormsg").hide();
            get_vitalsigns();
        }, 10000);
        return false;
    }
    if (summary == "") {
        $(".Summary_errormsg").text("Please Enter Summary.");
        setTimeout(function() {
            $(".Summary_errormsg").hide();
        }, 10000);
        return false;
    }
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/edit_summary') ?>",
        data: 'summary_id=' + summary_id + '&patient_ID=' + patient_ID + '&summary=' + summary +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "text",
        cache: false,
        success: function(data) {
            if (data == 1) {
                $(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   Summary  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                    $('#hospital-record-edit').modal('hide');
                    get_vitalsigns();
                }, 10000);
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Summary For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}

function allergy_edit() {
    var URL = "<?php echo base_url('dashboard_doctor/health_record/health_report/edit_update_allergylist') ?>";
    var patient_ID = $(".patient_ID").val();
    var allergy_type = $("#allergy_type_e").val();
    var drug_allergy_e = $("#drug_allergy_e").val();
    var reaction = $("#reaction_e").val();
    var severity = $("#severity_e").val();
    var allergy_status = $("#allergy_status_e").val();
    var notes = $("#allergy_notes_e").val();
    var allergy_ID = $("#healthreport_allergies_id").val();
    if (patient_ID == "") {
        $(".Patient_errormsg").html(
            "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
            );
        setTimeout(function() {
            $(".Patient_errormsg").hide();
        }, 10000);
        return false;
    }
    if (allergy_type == "") {
        $(".Allergytype_errormsg").text("Please Select Problem.");
        setTimeout(function() {
            $(".Allergytype_errormsg").hide();
        }, 10000);
        return false;
    }
    if (drug_allergy_e == "") {
        $(".Drugallergy_errormsg").text("Please Select Drug Allergy");
        setTimeout(function() {
            $(".Drugallergy_errormsg").hide();
        }, 10000);
        return false;
    }
    if (reaction == "") {
        $(".Reaction_errormsg").text("Please  Select Reaction.");
        setTimeout(function() {
            $(".Reaction_errormsg").hide();
        }, 10000);
        return false;
    }
    if (severity == "") {
        $(".Severity_errormsg").text("Please Enter SNOMED CT Code.");
        setTimeout(function() {
            $(".Severity_errormsg").hide();
        }, 10000);
        return false;
    }
    if (allergy_status == "") {
        $(".Allergystatus_errormsg").text("Please Select Status .");
        setTimeout(function() {
            $(".Allergystatus_errormsg").hide();
        }, 10000);
        return false;
    }
    if (notes == "") {
        $(".notes_errormsg").text("Please Enter Notes .");
        setTimeout(function() {
            $(".notes_errormsg").hide();
        }, 10000);
        return false;
    }
    $.ajax({
        type: "POST",
        url: URL,
        data: 'patient_ID=' + patient_ID + '&allergy_type=' + allergy_type + '&drug_allergy_e=' +
            drug_allergy_e + '&reaction=' + reaction + '&severity=' + severity + '&allergy_status=' +
            allergy_status + '&notes=' + notes + '&allergies_id=' + allergy_ID +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        success: function(response) {
            if (response == 1) {

            } else if (response == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Allergy List For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                    $('#hospital-record-edit').modal('hide');
                    get_vitalsigns();
                }, 10000);
            }
        }
    });
}

function save_healthrecord() {

    if ($(".patient_ID").val() =="") {
      $(".Patient_errormsg").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient</div>");
      setTimeout(function(){ $(".Patient_errormsg").hide(); }, 5000);
      $(".modal-body").animate({ scrollTop: 0 }, "slow");
      return false;
    }
    if ($("#temp").val() =="" ) {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Temperature In Vital Sign.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;
    }else{
      if ($("#temp").val().replace(/[^0-9\.]/g, '') == false) {


        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in Temprature In Vital Sign.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;
      }
    }
    if ($("#heart-rate").val() == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Heart  Rate In Vital Sign.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;
    }else{
      if ($("#heart-rate").val().replace(/[^0-9\.]/g, '') == false) {


        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in Heart Rate In Vital Sign. </div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;
      }
    }
    if ($("#blood-presure").val() == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Blood  Pressure In Vital Sign.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;
    }else{
      if ($("#blood-presure").val().replace(/[^0-9\.]/g, '') == false) {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Blood Please Enter only Number OR Decinmal value in Blood Presure In Vital Sign.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;
      }
    }
    if ($("#respiratory-rate").val() == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter Respiratory Rate In Vital Sign.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;
    }else{
      if ($("#respiratory-rate").val().replace(/[^0-9\.]/g, '') == false) {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in Respiratory In Vital Sign.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;
      }
    }
    if ($("#oxygen-saturation").val() == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter OXYGEN SATURATION In Vital Sign.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;
    }else{
      if ($("#oxygen-saturation").val().replace(/[^0-9\.]/g, '') == false) {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in OXYGEN SATURATION In Vital Sign.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;
      }
    }
    if ($("#height").val() == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter HEIGHT In Vital Sign.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;

    }else{
      if ($("#height").val().replace(/[^0-9\.]/g, '') == false) {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in HEIGHT In Vital Sign.</div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
      }
    }
    if ($("#weight").val() == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter WEIGHT In Vital Sign.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;

    }else{
      if ($("#weight").val().replace(/[^0-9\.]/g, '') == false) {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in WEIGHT.</div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
      }
    }
    if ($("#bmi").val() == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter BMI In Vital Sign.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;

    }else{
      if ($("#bmi").val().replace(/[^0-9\.]/g, '') == false) {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in BMI.</div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
      }
    }
    if ($("#pain").val() == "") {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter PAIN In Vital Sign.</div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
    }else{
      if ($("#pain").val().replace(/[^0-9\.]/g, '') == false) {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in PAIN.</div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
      }
    }

    /* if (smoking == "") {
      $(".Smoking_errormsg").text("Please Enter Smoking Status .");
      setTimeout(function(){ $(".Smoking_errormsg").hide(); }, 5000);
      return false;

    }else{
      if (weight.replace("^[a-zA-Z]+$", '') == false) {
        $(".Smoking_errormsg").text("Please Enter only Alphabets.");
        setTimeout(function(){ $(".Smoking_errormsg").hide(); }, 5000);
        return false;
      }
    } */

    if ($("#head-circumfernce").val() == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter HEAD CIRCUMFERENCE In Vital Sing.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;

    }else{
      if ($("#head-circumfernce").val().replace(/[^0-9\.]/g, '') == false) {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in HEAD CIRCUMFERENCE.</div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
      }
    }

    if ($("#glucose-glucometer").val() == "") {

        $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter BLOOD SUGAR/BLOOD GLUCOSE In Vital Sing.</div>");
        setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
        $(".modal-body").animate({ scrollTop: 0 }, "slow");
        return false;

    }else{
      if ($("#glucose-glucometer").val().replace(/[^0-9\.]/g, '') == false) {

            $(".alert-errormessge").html("<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Enter only Number OR Decinmal value in BLOOD SUGAR/BLOOD GLUCOSE.</div>");
            setTimeout(function() { $(".alert-danger").hide("slow"); }, 10000);
            $(".modal-body").animate({ scrollTop: 0 }, "slow");
            return false;
      }
    }

    save_vitalsing();
    var patient_ID = $(".patient_ID").val();
    var doctor_name = $("#doctor_name").val();
    var healtrecord_date_time = $("#healtrecord_date_time").val();
    var patient_name = $("#patient_name").val();
    var updated_by = $("#updated_by").val();
    if (patient_ID == "") {
        $(".Patient_errormsg").html(
            "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient</div>"
            );
        setTimeout(function() {
            $(".Patient_errormsg").hide();
        }, 10000);
        return false;
    }


    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_healthrecord') ?>",
        global: false,
        data: 'patient_ID=' + patient_ID + '&doctor_name=' + doctor_name + '&healtrecord_date_time=' +
            healtrecord_date_time + '&patient_name=' + patient_name + '&updated_by=' + updated_by +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        beforeSend: function() {
            $('#overlay').css("display", "block");
        },
        dataType: "text",
        cache: false,
        success: function(data) {
            save_problemlist();
            save_allergylist();
            save_labresult();
            save_e_prescription();
            $("#imaging_order_form").submit();
            save_vaccines();
            $("#reviewsing_form").submit();
            save_record_vaccinations();
            save_summary();
            $("#document_form").submit();
            if (data == 1) {

                if ($("#date_of_service").val() != "") {
                    save_clinical_notes();
                } else if ($("#appointment_datetime").val() != "") {
                    save_singed_consent();
                } else if ($("#document_lab").val() != "") {
                    save_lab_result();
                } else if ($("#amendment_source").val() != "") {
                    //$("#amendments_form").submit();
                    save_amendments();
                }

                /*$(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   Health Record  Save Successfully!</div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                }, 10000);*/
                setTimeout(function() {
                    $("#overlay").hide("slow");
                    $('#hospital-record').modal('hide');

                }, 10000);
            } else if (data == 2) {

                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Health Record For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                    ('#hospital-record').modal('hide');
                }, 10000);
            }

        }
    });

}
/* Save Vaccines Of Immunizations*/
function save_vaccines() {
    var patient_ID = $(".patient_ID").val();
    var vaccines = $("#Addselect_vaccination").val();
    var schedule = $("input[name=schedule]").val();
    var vaccine = $("input[name=vaccine]").val();
    var cvx_code = $("input[name=immunizationscvx_code_vaccines]").val();
    //var consent_form    = $(".consent_form").val();
    var vis = $(".vis").val();
    var administreted_on = $(".administreted_on").val();
    var administreted_by = $(".administreted_by").val();
    var vaccinestatus = $(".vaccinestatus").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_vaccines') ?>",
        global: false,
        data: 'patient_ID=' + patient_ID + '&vaccines=' + vaccines + '&schedule=' + schedule + '&vaccine=' +
            vaccine + '&cvx_code=' + cvx_code + '&vis=' + vis + '&administreted_on=' + administreted_on +
            '&administreted_by=' + administreted_by + '&vaccinestatus=' + vaccinestatus +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        beforeSend: function() {
            $('#overlay').css("display", "block");
        },
        dataType: "text",
        cache: false,
        success: function(data) {
            if (data == 1) {
                /*$(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Immunizations  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                }, 10000);*/
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Immunizations For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}
/* Save Record Vaccinations Of Immunizations*/
function save_record_vaccinations() {
    var patient_ID = $(".patient_ID").val();
    var consent_form = $("#record_vaccinations_consent_form").val();
    var create_record = $("#record_vaccinations_create_record").val();
    var cvx_code = $("input[name=record_vaccinations_cvx_code]").val();
    var name = $("#record_vaccinations_name").val();
    var cpt_code = $("#record_vaccinations_cpt_code").val();
    var manfacturer = $("input[name=record_vaccinations_manfacturer]").val();
    var lot_num = $("#record_vaccination_lot-num").val();
    var expirationdate = $("#record_vaccination_expirationdate").val();
    var administered_amount = $("#administered_amount").val();
    var administered_unit = $("#record_vaccination_administered_unit").val();
    var vaccinate_route = $("#record_vaccination_vaccinate_route").val();
    var vaccinate_site = $("#record_vaccination_vaccinate_site").val();
    var vaccinate_status = $("#record_vaccination_vaccinate_status").val();
    var administred_on = $("#record_vaccination_administred_on").val();
    var ordering_doctor = $("#record_vaccination_ordering_doctor").val();
    var administered_by = $("#record_vaccination_administered_by").val();
    var administered_at = $("#record_vaccination_administered_at").val();
    var inventory_lot = $("#record_vaccination_inventory_lot").val();
    var record_type = $("#record_vaccination_record_type").val();
    var funding_eligibility = $("#record_vaccination_funding_eligibility").val();
    var observed_immunity = $("#record_vaccination_observed_immunity").val();
    var record_vaccination_notes = $("#record_vaccination_notes").val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_record_vaccinations') ?>",
        global: false,
        data: 'patient_ID=' + patient_ID + '&create_record=' + create_record +
            '&cvx_code=' + cvx_code + '&name=' + name + '&cpt_code=' + cpt_code + '&manfacturer=' +
            manfacturer + '&lot_num=' + lot_num + '&expirationdate=' + expirationdate +
            '&administered_amount=' + administered_amount + '&administered_unit=' + administered_unit +
            '&vaccinate_route=' + vaccinate_route + '&vaccinate_site=' + vaccinate_site + '&vaccinate_status=' +
            vaccinate_status + '&administred_on=' + administred_on + '&ordering_doctor=' + ordering_doctor +
            '&administered_by=' + administered_by + '&administered_at=' + administered_at + '&inventory_lot=' +
            inventory_lot + '&record_type=' + record_type + '&funding_eligibility=' + funding_eligibility +
            '&observed_immunity=' + observed_immunity + '&record_vaccination_notes=' +
            record_vaccination_notes + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
         beforeSend: function() {
            $("#overlay").css("display","block");
        },
        dataType: "text",
        cache: false,
        success: function(data) {
            if (data == 1) {
               /* $(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Immunizations  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                }, 10000);*/
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Immunizations For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}
/**Edit **/
function edit_record_vaccinations() {
    var patient_ID = $(".patient_ID").val();
    var consent_form = $("#record_vaccinations_consent_form_e").val();
    var create_record = $("#record_vaccinations_create_record_e").val();
    var cvx_code = $("#record_vaccinations_cvx_code_e").val();
    var name = $("#record_vaccinations_name_e").val();
    var cpt_code = $("#record_vaccinations_cpt_code_e").val();
    var manfacturer = $("#record_vaccinations_manfacturer_e").val();
    var lot_num = $("#record_vaccination_lot-num_e").val();
    var expirationdate = $("#record_vaccination_expirationdate_e").val();
    var administered_amount = $("#administered_amount_e").val();
    var administered_unit = $("#record_vaccination_administered_unit_e").val();
    var vaccinate_route = $("#record_vaccination_vaccinate_route_e").val();
    var vaccinate_site = $("#record_vaccination_vaccinate_site_e").val();
    var vaccinate_status = $("#record_vaccination_vaccinate_status_e").val();
    var administred_on = $("#record_vaccination_administred_on_e").val();
    var ordering_doctor = $("#record_vaccination_ordering_doctor_e").val();
    var administered_by = $("#record_vaccination_administered_by_e").val();
    var administered_at = $("#record_vaccination_administered_at_e").val();
    var inventory_lot = $("#record_vaccination_inventory_lot_e").val();
    var record_type = $("#record_vaccination_record_type_e").val();
    var funding_eligibility = $("#record_vaccination_funding_eligibility_e").val();
    var observed_immunity = $("#record_vaccination_observed_immunity_e").val();
    var record_vaccination_notes = $("#record_vaccination_notes_e").val();
    var record_vaccinations_id = $("#record_vaccinations_id").val();
    if (patient_ID == "") {
        $(".Patient_errormsg").html(
            "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
            );
        setTimeout(function() {
            $(".Patient_errormsg").hide();
        }, 10000);
        return false;
    }
    /*if (consent_form =="") {
    $(".Consent_form_errormsg").text("Please Select Consent Form.");
    setTimeout(function(){ $(".Consent_form_errormsg").hide(); }, 10000);
    return false;
    }*/
    /**
    if (create_record == "") {
        $(".Createrecordfor_errormsg").text("Please Select Create A Record For.");
        setTimeout(function() {
            $(".Createrecordfor_errormsg").hide();
        }, 10000);
        return false;
    }
    if (cvx_code == "") {
        $(".CVX_code_errormsg").text("Please Select CVX Code.");
        setTimeout(function() {
            $(".CVX_code_errormsg").hide();
        }, 10000);
        return false;
    }
    if (name == "") {
        $(".Name_errormsg").text("Please Enter Name.");
        setTimeout(function() {
            $(".Name_errormsg").hide();
        }, 10000);
        return false;
    }
    if (cpt_code == "") {
        $(".CPT_CODE_errormsg").text("Please Enter CPT CODE.");
        setTimeout(function() {
            $(".CPT_CODE_errormsg").hide();
        }, 10000);
        return false;
    }
    if (manfacturer == "") {
        $(".Manufacturer_errormsg").text("Please Select Manufacturer.");
        setTimeout(function() {
            $(".Manufacturer_errormsg").hide();
        }, 10000);
        return false;
    }
    if (lot_num == "") {
        $(".LotNumber_errormsg").text("Please Enter Lot Number.");
        setTimeout(function() {
            $(".LotNumber_errormsg").hide();
        }, 10000);
        return false;
    }
    if (expirationdate == "") {
        $(".Lotexpirationdate_errormsg").text("Please Select Lot Expiration Date.");
        setTimeout(function() {
            $(".Lotexpirationdate_errormsg").hide();
        }, 10000);
        return false;
    }
    if (administered_amount == "") {
        $(".Administeredamount_errormsg").text("Please Enter Administreted Amount.");
        setTimeout(function() {
            $(".Administeredamount_errormsg").hide();
        }, 10000);
        return false;
    }
    if (administered_unit == "") {
        $(".Administeredunit_errormsg").text("Please Select Administered Unit.");
        setTimeout(function() {
            $(".Administeredunit_errormsg").hide();
        }, 10000);
        return false;
    }
    if (vaccinate_route == "") {
        $(".Vaccinateroute_errormsg").text("Please Select Vaccines Route.");
        setTimeout(function() {
            $(".Vaccinateroute_errormsg").hide();
        }, 10000);
        return false;
    }
    if (vaccinate_site == "") {
        $(".Vaccinatesite_errormsg").text("Please Select Vaccines Site.");
        setTimeout(function() {
            $(".Vaccinatesite_errormsg").hide();
        }, 10000);
        return false;
    }
    if (vaccinate_status == "") {
        $(".Vaccinesstatus_errormsg").text("Please Select Vaccines Status.");
        setTimeout(function() {
            $(".Vaccinesstatus_errormsg").hide();
        }, 10000);
        return false;
    }
    if (administred_on == "") {
        $(".Administred_on_errormsg").text("Please Select Administred ON.");
        setTimeout(function() {
            $(".Administred_on_errormsg").hide();
        }, 10000);
        return false;
    }
    if (ordering_doctor == "") {
        $(".Orderingdoctor_errormsg").text("Please Select Ordering Doctor.");
        setTimeout(function() {
            $(".Orderingdoctor_errormsg").hide();
        }, 10000);
        return false;
    }
    if (administered_by == "") {
        $(".Administeredby_errormsg").text("Please Select Administered By.");
        setTimeout(function() {
            $(".Administeredby_errormsg").hide();
        }, 10000);
        return false;
    }
    if (administered_at == "") {
        $(".Administeredat_errormsg").text("Please Select Administered At.");
        setTimeout(function() {
            $(".Administeredat_errormsg").hide();
        }, 10000);
        return false;
    }
    if (inventory_lot == "") {
        $(".Inventorylot_errormsg").text("Please Select Inventory Lot.");
        setTimeout(function() {
            $(".Inventorylot_errormsg").hide();
        }, 10000);
        return false;
    }
    if (record_type == "") {
        $(".Recordtype_errormsg").text("Please Select Record Type.");
        setTimeout(function() {
            $(".Recordtype_errormsg").hide();
        }, 10000);
        return false;
    }
    if (funding_eligibility == "") {
        $(".Fundingeligibility_errormsg").text("Please Select Funding Eligibility.");
        setTimeout(function() {
            $(".Fundingeligibility_errormsg").hide();
        }, 10000);
        return false;
    }
    if (observed_immunity == "") {
        $(".Observedimmunity_errormsg").text("Please Select Observed Immunity.");
        setTimeout(function() {
            $(".Observedimmunity_errormsg").hide();
        }, 10000);
        return false;
    }
    if (record_vaccination_notes == "") {
        $(".Notes_errormsg").text("Please Select Vaccines Status.");
        setTimeout(function() {
            $(".Notes_errormsg").hide();
        }, 10000);
        return false;
    }**/
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/edit_record_vaccinations') ?>",
        data: 'record_vaccinations_id=' + record_vaccinations_id + '&patient_ID=' + patient_ID +
            '&consent_form=' + consent_form + '&create_record=' + create_record + '&cvx_code=' + cvx_code +
            '&name=' + name + '&cpt_code=' + cpt_code + '&manfacturer=' + manfacturer + '&lot_num=' + lot_num +
            '&expirationdate=' + expirationdate + '&administered_amount=' + administered_amount +
            '&administered_unit=' + administered_unit + '&vaccinate_route=' + vaccinate_route +
            '&vaccinate_site=' + vaccinate_site + '&vaccinate_status=' + vaccinate_status + '&administred_on=' +
            administred_on + '&ordering_doctor=' + ordering_doctor + '&administered_by=' + administered_by +
            '&administered_at=' + administered_at + '&inventory_lot=' + inventory_lot + '&record_type=' +
            record_type + '&funding_eligibility=' + funding_eligibility + '&observed_immunity=' +
            observed_immunity + '&record_vaccination_notes=' + record_vaccination_notes +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "text",
        cache: false,
        success: function(data) {
            if (data == 1) {
                $(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Immunizations  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                    $('#hospital-record-edit').modal('hide');
                    get_vitalsigns();
                }, 10000);
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Immunizations For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}

function edit_Vaccines() {
    var vaccines_e_ID = $("#vaccines_e_ID").val();
    var patient_ID = $(".patient_ID").val();
    var vaccines = $("#Addselect_vaccination_e").val();
    var schedule = $("#schedule_e").val();
    var vaccine = $("#vaccine_e").val();
    var cvx_code = $("#immunizationscvx_code_vaccines_e").val();
    //var consent_form    = $(".consent_form").val();
    var vis = $("#vis_e").val();
    var administreted_on = $("#administreted_on_e").val();
    var administreted_by = $("#administreted_by_e").val();
    var vaccinestatus = $("#vaccinestatus_e").val();
    //  console.log(summary);

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/edit_Vaccines') ?>",
        data: 'vaccines_e_ID=' + vaccines_e_ID + '&patient_ID=' + patient_ID + '&vaccines=' + vaccines +
            '&schedule=' + schedule + '&vaccine=' + vaccine + '&cvx_code=' + cvx_code + '&vis=' + vis +
            '&administreted_on=' + administreted_on + '&administreted_by=' + administreted_by +
            '&vaccinestatus=' + vaccinestatus + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "text",
        cache: false,
        success: function(data) {
            if (data == 1) {
                $(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong>   Vaccines  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                    $('#hospital-record-edit').modal('hide');
                    get_vitalsigns();
                }, 10000);
            } else if (data == 2) {
                $(".alert-errormessge").show("slow");
                $(".alert-errormessge").html(
                    "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> You already added  Summary For this Patient!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-errormessge").hide("slow");
                }, 10000);
            }
        }
    });
}
/*Document Locked Clinical Notes*/
function save_clinical_notes() {
    var patient_ID = $(".patient_ID").val();
    var date_of_service = $("#date_of_service").val();
    var locked_by = $("#locked_by").val();
    var locked_on = $("#locked_on").val();
    var lockedaction = $("#lockedaction").val();
    var lockedstatus = $("#lockedstatus").val();
    var locked_reason = $("#locked_reason").val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_clinical_notes') ?>",
        global: false,
        data: 'patient_ID=' + patient_ID + '&date_of_service=' + date_of_service + '&locked_by=' + locked_by +
            '&locked_on=' + locked_on + '&lockedaction=' + lockedaction + '&lockedstatus=' + lockedstatus +
            '&locked_reason=' + locked_reason + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        beforeSend: function() {
            $('#overlay').css("display", "block");
        },
        dataType: "text",
        cache: false,
        success: function(data) {
            /*$(".alert-messge").css("visibility", "visible");
            $(".alert-messge").html(
                "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Locked Clinical Notes  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                );
            setTimeout(function() {
                $(".alert-messge").hide("slow");
            }, 10000);*/
        }
    });
}

function edit_clinical_notes() {
    var patient_ID = $(".patient_ID").val();
    var date_of_service = $("#date_of_service_e").val();
    var locked_by = $("#locked_by_e").val();
    var locked_on = $("#locked_on_e").val();
    var lockedaction = $("#lockedaction_e").val();
    var lockedstatus = $("#lockedstatus_e").val();
    var locked_reason = $("#locked_reason_e").val();
    var locked_id = $("#locked_id").val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/edit_clinical_notes') ?>",
        data: 'locked_id=' + locked_id + '&patient_ID=' + patient_ID + '&date_of_service=' + date_of_service +
            '&locked_by=' + locked_by + '&locked_on=' + locked_on + '&lockedaction=' + lockedaction +
            '&lockedstatus=' + lockedstatus + '&locked_reason=' + locked_reason +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "text",
        cache: false,
        success: function(data) {
            $(".alert-messge").css("visibility", "visible");
            $(".alert-messge").html(
                "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Locked Clinical Notes  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                );
            setTimeout(function() {
                $(".alert-messge").hide("slow");
                $('#hospital-record-edit').modal('hide');
                get_vitalsigns();
            }, 10000);
        }
    });
}
/*Document Singed Consent Forms*/
function save_singed_consent() {
    var patient_ID = $(".patient_ID").val();
    var consent_form = $("#singedconsent_form").val();
    var appointment_datetime = $("#appointment_datetime").val();
    var singnature_date = $("#singnature_date").val();
    var singnature_action = $("#singnature_action").val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_singed_consent') ?>",
        global: false,
        data: 'patient_ID=' + patient_ID + '&consent_form=' + consent_form + '&appointment_datetime=' +
            appointment_datetime + '&singnature_date=' + singnature_date + '&singnature_action=' +
            singnature_action + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        beforeSend: function() {
            $('#overlay').css("display", "block");
        },
        dataType: "text",
        cache: false,
        success: function(data) {
            /*$(".alert-messge").css("visibility", "visible");
            $(".alert-messge").html(
                "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Singed Consent Form   Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                );
            setTimeout(function() {
                $(".alert-messge").hide("slow");
            }, 10000);*/
        }
    });
}

function edit_singed_consent() {
    var patient_ID = $(".patient_ID").val();
    var consent_form = $("#singedconsent_form_e").val();
    var appointment_datetime = $("#appointment_datetime_e").val();
    var singnature_date = $("#singnature_date_e").val();
    var singnature_action = $("#singnature_action_e").val();
    var singed_consent_forms_id = $("#singed_consent_forms_id").val();
    // if (patient_ID == "") {
    //     $(".Patient_errormsg").html(
    //         "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
    //         );
    //     setTimeout(function() {
    //         $(".Patient_errormsg").hide();
    //     }, 10000);
    //     return false;
    // }
    // if (consent_form == "") {
    //     $(".Singedconsentform_errormsg").text("Please enter Singedconsent Form.");
    //     setTimeout(function() {
    //         $(".Singedconsentform_errormsg").hide();
    //     }, 10000);
    //     return false;
    // }
    // if (appointment_datetime == "") {
    //     $(".Appointment_datetime_erorrmsg").text("Please select Appointment Date.");
    //     setTimeout(function() {
    //         $(".Appointment_datetime_erorrmsg").hide();
    //     }, 10000);
    //     return false;
    // }
    // if (singnature_date == "") {
    //     $(".Singnature_date_erorrmsg").text("Please Select Singnature Date.");
    //     setTimeout(function() {
    //         $(".Singnature_date_erorrmsg").hide();
    //     }, 10000);
    //     return false;
    // }
    // if (singnature_action == "") {
    //     $(".singnature_action_erorrmsg").text("Please Select  Action.");
    //     setTimeout(function() {
    //         $(".singnature_action_erorrmsg").hide();
    //     }, 10000);
    //     return false;
    // }
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/edit_singed_consent') ?>",
        data: 'singed_consent_forms_id=' + singed_consent_forms_id + '&patient_ID=' + patient_ID +
            '&consent_form=' + consent_form + '&appointment_datetime=' + appointment_datetime +
            '&singnature_date=' + singnature_date + '&singnature_action=' + singnature_action +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "text",
        cache: false,
        success: function(data) {
            $(".alert-messge").css("visibility", "visible");
            $(".alert-messge").html(
                "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Singed Consent Form   Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                );
            setTimeout(function() {
                $(".alert-messge").hide("slow");
                $('#hospital-record-edit').modal('hide');
                get_vitalsigns();
            }, 10000);
        }
    });
}
/*Document Singed Consent Forms*/
function save_lab_result() {
    var patient_ID = $(".patient_ID").val();
    var document_lab = $("#document_lab").val();
    var document_labdate_time = $("#document_labdate_time").val();
    var document_labaction = $("#document_labaction").val();
    var document_abnormal = $("#document_abnormal").val();
    var document_result_count = $("#document_result_count").val();
    var document_test = $("#document_test").val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/save_lab_result') ?>",
        global: false,
        data: 'patient_ID=' + patient_ID + '&document_lab=' + document_lab + '&document_labdate_time=' +
            document_labdate_time + '&document_labaction=' + document_labaction + '&document_abnormal=' +
            document_abnormal + '&document_result_count=' + document_result_count + '&document_result_count=' +
            document_result_count + '&document_test=' + document_test +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        beforeSend: function() {
            $('#overlay').css("display", "block");
        },
        dataType: "text",
        cache: false,
        success: function(data) {
           /* $(".alert-messge").css("visibility", "visible");
            $(".alert-messge").html(
                "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Lab Result  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                );
            setTimeout(function() {
                $(".alert-messge").hide("slow");
            }, 10000);*/
        }
    });
}

function edit_lab_result() {
    var patient_ID = $(".patient_ID").val();
    var document_lab = $("#document_lab_e").val();
    var document_labdate_time = $("#document_labdate_time_e").val();
    var document_labaction = $("#document_labaction_e").val();
    var document_abnormal = $("#document_abnormal_e").val();
    var document_result_count = $("#document_result_count_e").val();
    var document_test = $("#document_test_e").val();
    var document_labresult_id = $("#document_labresult_id").val();
    // if (patient_ID == "") {
    //     $(".Patient_errormsg").html(
    //         "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
    //         );
    //     setTimeout(function() {
    //         $(".Patient_errormsg").hide();
    //     }, 10000);
    //     return false;
    // }
    // if (document_lab == "") {
    //     $(".Documnetlab_erorrmsg").text("Please enter Lab.");
    //     setTimeout(function() {
    //         $(".Documnetlab_erorrmsg").hide();
    //     }, 10000);
    //     return false;
    // }
    // if (document_labdate_time == "") {
    //     $(".Documnetdate_erorrmsg").text("Please select  Date.");
    //     setTimeout(function() {
    //         $(".Documnetdate_erorrmsg").hide();
    //     }, 10000);
    //     return false;
    // }
    // if (document_labaction == "") {
    //     $(".Documnetlabaction_erorrmsg").text("Please Select Action.");
    //     setTimeout(function() {
    //         $(".Documnetlabaction_erorrmsg").hide();
    //     }, 10000);
    //     return false;
    // }
    // if (document_abnormal == "") {
    //     $(".Documnetabnormal_erorrmsg").text("Please Select Abnormal .");
    //     setTimeout(function() {
    //         $(".Documnetabnormal_erorrmsg").hide();
    //     }, 10000);
    //     return false;
    // }
    // if (document_result_count == "") {
    //     $(".Documnetresultcount_erorrmsg").text("Please enter  Result Count.");
    //     setTimeout(function() {
    //         $(".Documnetresultcount_erorrmsg").hide();
    //     }, 10000);
    //     return false;
    // }
    // if (document_test == "") {
    //     $(".Documnettest_erorrmsg").text("Please enter  Test.");
    //     setTimeout(function() {
    //         $(".Documnettest_erorrmsg").hide();
    //     }, 10000);
    //     return false;
    // }
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/edit_lab_result') ?>",
        data: 'document_labresult_id=' + document_labresult_id + '&patient_ID=' + patient_ID +
            '&document_lab=' + document_lab + '&document_labdate_time=' + document_labdate_time +
            '&document_labaction=' + document_labaction + '&document_abnormal=' + document_abnormal +
            '&document_result_count=' + document_result_count + '&document_result_count=' +
            document_result_count + '&document_test=' + document_test +
            '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "text",
        cache: false,
        success: function(data) {
            $(".alert-messge").css("visibility", "visible");
            $(".alert-messge").html(
                "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Lab Result  Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                );
            setTimeout(function() {
                $(".alert-messge").hide("slow");
                $('#hospital-record-edit').modal('hide');
                get_vitalsigns();
            }, 10000);
        }
    });
}

function save_amendments() {
    var patient_ID = $(".patient_ID").val();
    var amendment_source = $("#amendment_source").val();
    var amendment_status = $("#amendment_status").val();
    var amdments_date_time = $("#amdments_date_time").val();
    var amdmentsproccess_date_time = $("#amdmentsproccess_date_time").val();

    $.ajax({
        url: "<?php echo base_url(); ?>dashboard_doctor/health_record/health_report/save_amendments",
        method: "POST",
        global: false,
        data: 'patient_ID=' + patient_ID + '&amendment_source=' + amendment_source + '&amendment_status=' +
            amendment_status + '&amdments_date_time=' + amdments_date_time + '&amdmentsproccess_date_time=' +
            amdmentsproccess_date_time + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
       beforeSend: function() {
            $('#overlay').css("display", "block");
        },
        success: function(data) {
            if (data == 0) {
                $(".Amendmentsdoc_erorrmsg").text("Please Upload PDF file.");
                setTimeout(function() {
                    $(".Amendmentsdoc_erorrmsg").hide();
                }, 10000);
            }
            /*$(".alert-messge").css("visibility", "visible");
            $(".alert-messge").html(
                "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Amendment Document   Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                );
            setTimeout(function() {
                $(".alert-messge").hide("slow");
            }, 10000);*/
        }
    });
}
$(document).ready(function() {
    $('#amendments_form_e').on('submit', function(e) {
        e.preventDefault();
        var patient_ID = $(".patient_ID").val();
        var amendment_source = $("#amendment_source_e").val();
        var amendment_status = $("#amendment_status_e").val();
        var amdments_date_time = $("#amdments_date_time_e").val();
        var amdmentsproccess_date_time = $("#amdmentsproccess_date_time_e").val();
        var amdments_id  = $("#amdments_id").val();
       //  if (patient_ID == "") {
       //      $(".Patient_errormsg").html(
       //          "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
       //          );
       //      setTimeout(function() {
       //          $(".Patient_errormsg").hide();
       //      }, 10000);
       //      return false;
       //  }
       // /* if ($('#amendments_doc_e').val() == '') {
       //      $(".Amendmentsdoc_erorrmsg").text("Please Select Amendment Document.");
       //      setTimeout(function() {
       //          $(".Amendmentsdoc_erorrmsg").hide();
       //      }, 10000);
       //      return false;
       //  }*/
       //  if (amendment_source == "") {
       //      $(".Amendment_source_erorrmsg").text("Please enter Amendment Source.");
       //      setTimeout(function() {
       //          $(".Amendment_source_erorrmsg").hide();
       //      }, 10000);
       //      return false;
       //  }
       //  if (amendment_status == "") {
       //      $(".Amendment_status_erorrmsg").text("Please select Amendment Status.");
       //      setTimeout(function() {
       //          $(".Amendment_status_erorrmsg").hide();
       //      }, 10000);
       //      return false;
       //  }
       //  if (amdments_date_time == "") {
       //      $(".Amdments_date_time_erorrmsg").text("Please select Request Date Time.");
       //      setTimeout(function() {
       //          $(".Amdments_date_time_erorrmsg").hide();
       //      }, 10000);
       //      return false;
       //  }
       //  if (amdmentsproccess_date_time == "") {
       //      $(".Amdmentsproccess_date_time_erorrmsg").text("Please select Processed Date Time.");
       //      setTimeout(function() {
       //          $(".Amdmentsproccess_date_time_erorrmsg").hide();
       //      }, 10000);
       //      return false;
       //  }
        var formData = new FormData(this);
        formData.append('<?php echo $this->security->get_csrf_token_name();?>', '<?php echo $this->security->get_csrf_hash();?>');
        formData.append('patient_ID', patient_ID);
        formData.append('amdments_id',amdments_id);
        $.ajax({
            url: "<?php echo base_url(); ?>dashboard_doctor/health_record/health_report/edit_amendments",

            method: "POST",
            data: formData,
            async: false,
            enctype: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data == 0) {
                    $(".Amendmentsdoc_erorrmsg").text("Please Upload PDF file.");
                    setTimeout(function() {
                        $(".Amendmentsdoc_erorrmsg").hide();

                    }, 10000);
                }
                $(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Amendment Document   Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                    $('#hospital-record-edit').modal('hide');
                    get_vitalsigns();
                }, 10000);
            }
        });
    });
});
$(document).ready(function() {
    $('#document_form').on('submit', function(e) {
        e.preventDefault();
        var patient_ID = $(".patient_ID").val();
        var document_type = $("#document_type").val();

        $.ajax({
            url: "<?php echo base_url(); ?>dashboard_doctor/health_record/health_report/save_uploaddocument",
            global: false,
            method: "POST",
            data: new FormData(this),
            beforeSend: function() {
                $("#overlay").css("display","block");
            },
            async: false,
            enctype: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data == 0) {
                    $(".Document_erorrmsg").text(
                    "Please Upload JPG , PNG , GIF, PDF file.");
                    setTimeout(function() {
                        $(".Document_erorrmsg").hide();
                    }, 10000);
                }
               /* $(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Document Form   Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                }, 10000);*/
            }
        });
    });
    $('#edit_document_form').on('submit', function(e) {
        e.preventDefault();
        var patient_ID = $(".patient_ID").val();
        var document_type = $("#document_type_e").val();
        // if (patient_ID == "") {
        //     $(".Patient_errormsg").html(
        //         "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Please Search Patient and Select Patient<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
        //         );
        //     setTimeout(function() {
        //         $(".Patient_errormsg").hide();
        //     }, 10000);
        //     return false;
        // }
        // if ($('.document_document_e').val() == '') {
        //     $(".Document_erorrmsg").text("Please Select  Document.");
        //     setTimeout(function() {
        //         $(".Document_erorrmsg").hide();
        //     }, 10000);
        //     return false;
        // }
        // if (document_type == "") {
        //     $(".Documenttype_erorrmsg").text("Please Select Document Type.");
        //     setTimeout(function() {
        //         $(".Documenttype_erorrmsg").hide();
        //     }, 10000);
        //     return false;
        // }
        $.ajax({
            url: "<?php echo base_url(); ?>dashboard_doctor/health_record/health_report/edit_document_form",
            method: "POST",
            data: new FormData(this),
            async: false,
            enctype: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data == 0) {
                    $(".Document_erorrmsg").text(
                    "Please Upload JPG , PNG , GIF, PDF file.");
                    setTimeout(function() {
                        $(".Document_erorrmsg").hide();
                    }, 10000);
                }
                $(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Document Form   Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                    $('#hospital-record-edit').modal('hide');
                    get_vitalsigns();
                }, 10000);
            }
        });
    });
});

function allowed_alphanumeric(value, id) {
    if (value.match(/[^a-zA-Z0-9 ]/g)) {
        $("#" + id).css('border-color', "red");
        var label = $("#" + id).attr("placeholder");
        console.log("#" + id);

        $(".alert-errormessge").show("slow");
        $(".alert-errormessge").html(
            "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong>  Please Enter Only Number and Alphabets In " +
            label +
            "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
            );
        setTimeout(function() {
            $(".alert-errormessge").css("visibility", "hidden");
        }, 10000);
        $(".changetabbutton").attr("disabled", "disabled");
        return false;
    } else if (!value.match(/[^a-zA-Z0-9 ]/g) || value == "") {
        $("#" + id).css('border-color', "#e1e1e1");
        $(".alert-errormessge").empty();
        $(".changetabbutton").removeAttr("disabled");
        return true;
    }
}
$("input[type='number']").on("keypress", function(evt) {
    if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57) {
        evt.preventDefault();
    }
})

function set_valueof_printname() {
    var printname = $("#printname").val();
    $(".typed").empty();
    $(".typed").html(printname);
    $(".singnature_data").empty();
    $(".singnature_data").val(printname);
}

function set_valueof_printname_e() {
    var printname = $("#printname_e").val();
    $(".typed_e").empty();
    $(".typed_e").html(printname);
    $(".singnature_data_e").empty();
    $(".singnature_data_e").val(printname);
}
$(document).ready(function() {
    $('#reviewsing_form').on('submit', function(e) {
        e.preventDefault();
        var patient_ID = $(".patient_ID").val();
        var printname = $(".singnature_data").val();
        var singnature = $(".pad");
        var ctx = singnature[0].getContext("2d");
        var formData = new FormData(this);

        var singnatureImage = singnature[0].toDataURL("image/png");
        formData.append('singnatureImage', singnatureImage);
        formData.append('printname', printname);
        console.log(formData);
        $.ajax({
            url: "<?php echo base_url(); ?>dashboard_doctor/health_record/health_report/save_review_sing",
            global: false,
            method: "POST",
            data: formData,
            beforeSend: function() {
                //$("#overlay").css("display","block");
            },
            async: false,
            enctype: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data == 0) {
                    $(".Document_erorrmsg").text(
                    "Please Upload JPG , PNG , GIF, PDF file.");
                    setTimeout(function() {
                        $(".Document_erorrmsg").hide();
                    }, 10000);

                }
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                    $('#hospital-record').modal('hide');
                    get_vitalsigns();
                }, 10000);
                /*setTimeout(function() {
                    $("#overlay").css("display","none");
                }, 10000);*/
                /*$(".alert-messge").css("visibility", "visible");
                $(".alert-messge").html(
                    "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Review Sing Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                setTimeout(function() {
                    $(".alert-messge").hide("slow");
                }, 10000);*/
            }
        });
    });


});
$('#reviewsing_form_e').on('submit', function(e) {

  e.preventDefault();
    var patient_ID = $(".patient_ID").val();
    var printname = $(".singnature_data_e").val();
    var singnature = $(".pad_e");
    var ctx = singnature[0].getContext("2d");
    var formData = new FormData(this);
//alert(formData);
    var singnatureImage = singnature[0].toDataURL("image/png");
    formData.append('singnatureImage_e', singnatureImage);
    formData.append('printname_e', printname);
  //  console.log(formData);
    $.ajax({
        url: "<?php echo base_url(); ?>dashboard_doctor/health_record/health_report/update_review_sing",
        global: false,
        method: "POST",
        data: formData,
        beforeSend: function() {
            //$("#overlay").css("display","block");
        },
        async: false,
        enctype: 'multipart/form-data',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {

            if (data == 0) {
                $(".Reviewdocument_erorrmsg").text(
                "Please Upload JPG , PNG , GIF, PDF file.");
                setTimeout(function() {
                    $(".Reviewdocument_erorrmsg").hide();
                }, 10000);
            }
            setTimeout(function() {
                //$("#overlay").css("display","none");
                $(".alert-messge").hide("slow");
                $('#hospital-record-edit').modal('hide');
            }, 10000);

            /*$(".alert-messge").css("visibility", "visible");
            $(".alert-messge").html(
                "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success!</strong> Review Sing Save Successfully!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                );
            setTimeout(function() {
                $(".alert-messge").hide("slow");
            }, 10000);*/
        }
    });
});
function get_suballergy_healthreport_edit(allergy_id, drug_allergy) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_suballergy_healthreport') ?>",
        data: 'allergy_id=' + allergy_id + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "html",
        cache: false,
        success: function(data) {
            $("#drug_allergy_e").empty();
            var selected = "";
            var drugallergy_data = JSON.parse(data);
            $.each(drugallergy_data, function(key, value) {
                if (value.allergy_id == drug_allergy) {
                    selected = "selected='selected'";
                } else {
                    selected = "";
                }
                var html_data = "<option value=" + value.allergy_id + " " + selected + " >" + value
                    .allergy_name + "</option>";
                $("#drug_allergy_e").append(html_data);
            });
        }
    });
}

function get_recation_edit(suballergy_id, reaction_id) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('health_report/get_recation_healthreport') ?>",
        data: 'suballergy_id=' + suballergy_id + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "html",
        cache: false,
        success: function(data) {
            $("#reaction_e").empty();
            var selected = "";
            var recation_data = JSON.parse(data);
            $.each(recation_data, function(key, value) {
                if (value.recation_id == reaction_id) {
                    selected = "selected='selected'";
                } else {
                    selected = "";
                }
                var html_data = "<option value=" + value.reaction_id + " " + selected + " >" + value
                    .reaction_name + "</option>";
                $("#reaction_e").append(html_data);
            });
        }
    });
}

function check_patient() {
    var patient_Value = $("#search-patient").val();
    if (patient_Value != "") {
        $(".addhospital_record").removeAttr("disabled");
        $('#hospital-record').modal('toggle');
        $(".Patient_errormsg").empty();
        $("#search-patient").css("border-color", "#ccc");
    } else {
        $(".Patient_errormsg").html("Please Select Patient").css({
            "color": "red",
            "margin-left": "15px"
        });
        setTimeout(function() {
            $(".Patient_errormsg").hide("slow");
        }, 10000);
        $("#search-patient").css("border-color", "red");
        $(".addhospital_record").attr("disabled", "disabled");
    }
}
$("#Tabselect-vaccination").on("change", function() {
    var patient_ID = $(".patient_ID").val();
    var vacciness = $("#Tabselect-vaccination").val();
    if (patient_ID == "") {
        $(".Patient_errormsg").html("Please Select Patient").css({
            "color": "red",
            "margin-left": "15px"
        });
        setTimeout(function() {
            $(".Patient_errormsg").hide("slow");
        }, 10000);
        $("#search-patient").css("border-color", "red");
        $(".addhospital_record").attr("disabled", "disabled");
    } else {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_immunizations_listing') ?>",
            data: 'vacciness=' + vacciness + '&patient_ID=' + patient_ID +
                '&<?php echo $this->security->get_csrf_token_name();?>=' +
                '<?php echo $this->security->get_csrf_hash();?>',
            dataType: "html",
            cache: false,
            success: function(data) {
                $(".immunizations_tbdata").empty();
                $(".immunizations_tbdata").html(data);
            }
        });
    }
});
$(document).ready(function() {
    var patientid = "<?php echo $this->uri->segment(3)?>";
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_patient_info') ?>",
        data: 'patient_ID=' + patientid + '&<?php echo $this->security->get_csrf_token_name();?>=' +
            '<?php echo $this->security->get_csrf_hash();?>',
        dataType: "html",
        cache: false,
        success: function(data) {
            var data = JSON.parse(data)
            if (jQuery.isEmptyObject(data)) {} else {
                var patient_name = data.fname + " " + data.lname;
                get_patient_profile(patientid, patient_name);
                // get_vitalsigns(patientid);
            }
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    if ($("#defaultCheck1_e").is(':checked')) {
        $('#sign_e').removeAttr("disabled");
        $('#sign_e').val("PRN");
        $('#sign_e').attr("disabled", "disabled");
    } else if (!$(this).is(':checked')) {
        $('#sign_e').val("");
        $('#sign_e').removeAttr("disabled");
        $('#sign_e').attr("disabled", "disabled");
    }
});
$('#defaultCheck1').change(function() {
    if ($(this).is(':checked')) {
        $('#sign').removeAttr("disabled");
        $('#sign').val("PRN");
        $('#sign').attr("disabled", "disabled");
    } else if (!$(this).is(':checked')) {
        $('#sign').val("");
        $('#sign').removeAttr("disabled");
        //$('#sign').attr("disabled","disabled");
    }
});
</script>
<script>
function get_problem_healthreport(){
    var problem = $("#select_problem").val();
   // console.log(problem);
    $.ajax({
        type: "POST",
        beforeSend: function() {
            $("#loading").css("display","block");
        },
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_problem_healthreport'); ?>",
        data:"problem="+problem+'&<?php echo $this->security->get_csrf_token_name();?>=' +
        '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            console.log(array_length);
            var obj = JSON.parse(data);
            console.log(obj);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>Data Not Found.</strong>";
                a.append(b);
                $(".autocomplete_problem").after(a);
                $("#select_problem").val("");
                $("#loading").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("select_problem"), obj, array_length);
                $("#loading").css("display","none");
            }
        }
    });
}

function get_problem_healthreport_edit(){
    var problem = $("#select_problem_e").val();
   // console.log(problem);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_problem_healthreport'); ?>",
        beforeSend: function() {
            $("#problemloading").css("display","block");
        },
        data:"problem="+problem+'&<?php echo $this->security->get_csrf_token_name();?>=' +
        '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            console.log(array_length);
            var obj = JSON.parse(data);
            console.log(obj);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>Data Not Found.</strong>";
                a.append(b);
                $(".autocomplete_problem").after(a);
                $("#select_problem_e").val("");
                $("#problemloading").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("select_problem_e"), obj, array_length);
                $("#problemloading").css("display","none");
            }
        }
    });
}

function get_icdversion_healthreport(){
    var icdversion = $("#icdversion").val();
   // console.log(problem);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_icdversion_healthreport'); ?>",
        beforeSend: function() {
            $("#loadingicdversion").css("display","block");
        },
        data:"icdversion="+icdversion+'&<?php echo $this->security->get_csrf_token_name();?>=' +
        '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            console.log(array_length);
            var obj = JSON.parse(data);
            console.log(obj);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>Data Not Found.</strong>";
                a.append(b);
                $(".autocomplete_icdversion").after(a);
                $("#icdversion").val("");
                $("#loadingicdversion").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                 autocomplete(document.getElementById("icdversion"), obj, array_length);
                 $("#loadingicdversion").css("display","none");
            }
        }
    });
}

function get_icdversion_healthreport_edit(){
    var icdversion = $("#icdversion_e").val();
   // console.log(problem);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_icdversion_healthreport'); ?>",
        beforeSend: function() {
            $("#loadingicdversion").css("display","block");
        },
        data:"icdversion="+icdversion+'&<?php echo $this->security->get_csrf_token_name();?>=' +
        '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            console.log(array_length);
            var obj = JSON.parse(data);
            console.log(obj);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>Data Not Found.</strong>";
                a.append(b);
                $(".autocomplete_icdversion").after(a);
                $("#icdversion_e").val("");
                $("#loadingicdversion").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                 autocomplete(document.getElementById("icdversion_e"), obj, array_length);
                 $("#loadingicdversion").css("display","none");
            }
        }
    });
}

function get_suballergy_healthreports(){
    var drugallergy = $("#drug-allergy").val()
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_suballergy_healthreports'); ?>",
        beforeSend: function() {
            $("#loadingdrugallergy").css("display","block");
        },
        data:"drugallergy="+drugallergy+'&<?php echo $this->security->get_csrf_token_name();?>=' +
        '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            console.log(array_length);
            var obj = JSON.parse(data);
            console.log(obj);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>Data Not Found.</strong>";
                a.append(b);
                $(".autocomplete_drugallergy").after(a);
                $("#drug-allergy").val("");
                $("#loadingdrugallergy").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                 autocomplete(document.getElementById("drug-allergy"), obj, array_length);
                 $("#loadingdrugallergy").css("display","none");

            }
        }
    });
}

function get_suballergy_healthreports_edit(){
    var drugallergy = $("#drug_allergy_e").val()
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_suballergy_healthreports'); ?>",
        beforeSend: function() {
            $("#loadingdrugallergy").css("display","block");
        },
        data:"drugallergy="+drugallergy+'&<?php echo $this->security->get_csrf_token_name();?>=' +
        '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            console.log(array_length);
            var obj = JSON.parse(data);
            console.log(obj);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>Data Not Found.</strong>";
                a.append(b);
                $(".autocomplete_drugallergy").after(a);
                $("#drug_allergy_e").val("");
                $("#loadingdrugallergy").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                 autocomplete(document.getElementById("drug_allergy_e"), obj, array_length);
                 $("#loadingdrugallergy").css("display","none");
            }
        }
    });
}

function get_loiniccode(){
    var loinc_code = $("#loinc_code").val();
    $.ajax({
        type: "POST",
        beforeSend: function() {
            $("#loadingloinc").css("display","block");
        },
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_loinc_code'); ?>",
        data:"loinc_code="+loinc_code+'&<?php echo $this->security->get_csrf_token_name();?>=' +
        '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            var obj = JSON.parse(data);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>Loinc Code Not Found.</strong>";
                a.append(b);
                $(".autocomplete_loinccode").after(a);
                $("#loinc_code").val("");
                $("#loadingloinc").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("loinc_code"), obj, array_length);
                $("#loadingloinc").css("display","none");
            }
        }
    });
}

function get_loiniccode_edit(){
    var loinc_code = $("#loinc_code_e").val();
    $.ajax({
        type: "POST",
        beforeSend: function() {
            $("#loadingloinc").css("display","block");
        },
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_loinc_code'); ?>",
        data:"loinc_code="+loinc_code+'&<?php echo $this->security->get_csrf_token_name();?>=' +
        '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            var obj = JSON.parse(data);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>Loinc Code Not Found.</strong>";
                a.append(b);
                $(".autocomplete_loinccode").after(a);
                $("#loinc_code_e").val("");
                $("#loadingloinc").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("loinc_code_e"), obj, array_length);
                $("#loadingloinc").css("display","none");
            }
        }
    });
}

function get_cptcode(){
    var cpt_code = $("#cpt_code").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_cptcode_healthreport'); ?>",
        beforeSend: function() {
            $("#loadingcpt").css("display","block");
        },
        data:"cpt_code="+cpt_code+'&<?php echo $this->security->get_csrf_token_name();?>=' +
        '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            var obj = JSON.parse(data);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>CPT Code Not Found.</strong>";
                a.append(b);
                $(".autocomplete_cptcode").after(a);
                $("#cpt_code").val("");
                $("#loadingcpt").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("cpt_code"), obj, array_length);
                $("#loadingcpt").css("display","none");
            }
        }
    });
}

function get_cptcode_edit(){
    var cpt_code = $("#cpt_code_e").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_cptcode_healthreport'); ?>",
        beforeSend: function() {
            $("#loadingcpt").css("display","block");
        },
        data:"cpt_code="+cpt_code+'&<?php echo $this->security->get_csrf_token_name();?>=' +
        '<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            var obj = JSON.parse(data);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>CPT Code Not Found.</strong>";
                a.append(b);
                $(".autocomplete_cptcode").after(a);
                $("#cpt_code_e").val("");
                $("#loadingcpt").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("cpt_code_e"), obj, array_length);
                $("#loadingcpt").css("display","none");
            }
        }
    });
}

function get_drugname(){
     var drugname = $("#drug_name").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_drug_healthreport'); ?>",
        beforeSend: function() {
            $("#loadingdrugname").css("display","block");
        },
        data:"drugname="+drugname+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            var obj = JSON.parse(data);

            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>Drug Name Not Found.</strong>";
                a.append(b);
                $(".autocomplete_drugname").after(a);
                $("#drug_name").val("");
                $("#loadingdrugname").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("drug_name"), obj, array_length);
                $("#loadingdrugname").css("display","none");
            }
        }
    });
}

function get_drugname_edit(){
     var drugname = $("#drug_name_e").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_drug_healthreport'); ?>",
        data:"drugname="+drugname+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            var obj = JSON.parse(data);

            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>Drug Name Not Found.</strong>";
                a.append(b);
                $(".autocomplete_drugname").after(a);
                $("#drug_name_e").val("");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("drug_name_e"), obj, array_length);
            }
        }
    });
}

function get_immunizations_cvxcode(){
    var immunizationscvx_code_vaccines = $("#immunizationscvx_code_vaccines").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_immunizations_cvxcode'); ?>",
        beforeSend: function() {
            $("#loading_immunizationscvx_code_vaccines").css("display","block");
        },
        data:"immunizationscvx_code_vaccines="+immunizationscvx_code_vaccines+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            var obj = JSON.parse(data);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>CVX Code Not Found.</strong>";
                a.append(b);
                $(".autocomplete_cvxcode").after(a);
                $("#immunizationscvx_code_vaccines").val("");
                $("#loading_immunizationscvx_code_vaccines").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("immunizationscvx_code_vaccines"), obj, array_length);
                $("#loading_immunizationscvx_code_vaccines").css("display","none");
            }
        }
    });
}

function get_immunizations_cvxcode_edit(){
    var immunizationscvx_code_vaccines = $("#immunizationscvx_code_vaccines_e").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_immunizations_cvxcode'); ?>",
        data:"immunizationscvx_code_vaccines="+immunizationscvx_code_vaccines+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            var obj = JSON.parse(data);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>CVX Code Not Found.</strong>";
                a.append(b);
                $(".autocomplete_cvxcode").after(a);
                $("#immunizationscvx_code_vaccines_e").val("");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("immunizationscvx_code_vaccines_e"), obj, array_length);
            }
        }
    });
}

function get_record_vaccinations_cvx_code() {
    var record_vaccinations_cvx_code = $("#record_vaccinations_cvx_code").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_record_vaccinations_cvx_code'); ?>",
        beforeSend: function() {
            $("#loading_record_vaccinations_cvx_code").css("display","block");
        },
        data:"record_vaccinations_cvx_code="+record_vaccinations_cvx_code+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            var obj = JSON.parse(data);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>CVX Code Not Found.</strong>";
                a.append(b);
                $(".autocomplete_record_vaccinations_cvx_code").after(a);
                $("#record_vaccinations_cvx_code").val("");
                $("#loading_record_vaccinations_cvx_code").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("record_vaccinations_cvx_code"), obj, array_length);
                $("#loading_record_vaccinations_cvx_code").css("display","none");
            }
        }
    });
}


function get_record_vaccinations_cvx_code_edit() {
    var record_vaccinations_cvx_code = $("#record_vaccinations_cvx_code_e").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_record_vaccinations_cvx_code'); ?>",
        data:"record_vaccinations_cvx_code="+record_vaccinations_cvx_code+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            var obj = JSON.parse(data);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>CVX Code Not Found.</strong>";
                a.append(b);
                $(".autocomplete_record_vaccinations_cvx_code").after(a);
                $("#record_vaccinations_cvx_code_e").val("");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("record_vaccinations_cvx_code_e"), obj, array_length);
            }
        }
    });
}

function get_immunizations_manufacturer(){
    var record_vaccinations_manfacturer = $("#record_vaccinations_manfacturer").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_immunizations_manufacturer'); ?>",
        beforeSend: function() {
            $("#loading_record_vaccinations_manfacturer").css("display","block");
        },
        data:"record_vaccinations_manfacturer="+record_vaccinations_manfacturer+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            var obj = JSON.parse(data);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>Manufacturer Not Found.</strong>";
                a.append(b);
                $(".autocomplete_manfacturer").after(a);
                $("#record_vaccinations_manfacturer").val("");
                $("#loading_record_vaccinations_manfacturer").css("display","none");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("record_vaccinations_manfacturer"), obj, array_length);
                $("#loading_record_vaccinations_manfacturer").css("display","none");
            }
        }
    });
}

function get_immunizations_manufacturer_edit(){
    var record_vaccinations_manfacturer = $("#record_vaccinations_manfacturer_e").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('dashboard_doctor/health_record/health_report/get_immunizations_manufacturer'); ?>",
        data:"record_vaccinations_manfacturer="+record_vaccinations_manfacturer+'&<?php echo $this->security->get_csrf_token_name();?>='+'<?php echo $this->security->get_csrf_hash();?>',
        success: function(data) {
            var array_length = data.length;
            var obj = JSON.parse(data);
            if (data == 0) {
                var a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                var b = document.createElement("DIV");
                b.setAttribute("id", this.id + "displaymessage");
                b.setAttribute("class", "displaymessage");
                b.setAttribute("disabled", "disabled");
                b.innerHTML = "<strong>Manufacturer Not Found.</strong>";
                a.append(b);
                $(".autocomplete_manfacturer_e").after(a);
                $("#record_vaccinations_manfacturer_e").val("");
            }else{
                $(".displaymessage").css("display","none");
                autocomplete(document.getElementById("record_vaccinations_manfacturer_e"), obj, array_length);
            }
        }
    });
}

function autocomplete(inp, arr, array_length) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) {

            return false;
        }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        if (array_length <= 125) {
            a.setAttribute("style", "height:" + array_length);
        } else if (array_length > 125) {
            a.setAttribute("style", "height:300px");
        }
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' class='autocomplete_value' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");

        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });

    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }

    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
}
</script>
