<link href="<?php echo base_url(); ?>assets/css/health_report/style.css" rel="stylesheet" type="text/css" />


    <div class="col-lg-12 white-box">

        <section class="box nobox marginBottom0">

            <div class="content-body">

              <div class="clearfix"></div>

              <div class="col-lg-12 p-0">



                <section>

                  <header class="panel_header">

                    <h2 class="title pull-left" id="form-title">Search Health Record</h2>

                  </header>

                  <div class="row">

                    <div class="col-lg-12 p-r-l-30">

                      <div class="pull-right mb-10">

                      <a href="<?php echo base_url('dashboard_doctor/health_record/health_report/create') ?>"><button type="button" class="btn btn-default mr-15">Add Health Record </button></a> 

                      </div>

                    </div>

                  </div>

                      <div class="row p-r-l-30 mb-15">

                        <div class="col-12 col-md-4">

                          <label>PATIENT NAME</label>

                            <input type="text" name="patient-name" value="" class="form-control text-field" id="patient-name"  placeholder="Patient Name">

                        </div>

                        <div class="col-12 col-md-4">

                          <label>DATE</label>

                          <input type="datetime-local" class="form-control" id="date-time" name="date-time">

                        </div>

                        <div class="col-12 col-md-4">

                          <label>DOCTOR NAME</label>

                            <input type="text" name="doctor-name" value="" class="form-control text-field" id="doctor-name" placeholder="Doctor Name">

                        </div>

                      </div>

                      <div class="col-lg-12" style="min-height: 850px;">

                      <table class="table" style="display:table;">

                        <style>.hovertr:hover{background-color:#d5f3f2}</style>

                        <thead >

                          <th>Doctor</th>

                          <th>Date&Time</th>

                          <th>Patient Name</th>

                          <th>Update By</th>

                          <th>Update Date</th>

                          <th></th>

                        </thead>

                        <tbody>

                          <tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                            <td>Dr.John Deo</td>

                            <td>01/05/2020 05:20:45 PM</td>

                            <td>Amber Humble</td>

                            <td>Dr. John Deo</td>

                            <td>05/05/2020 08:25:45 PM</td>

                            <td>

                              <div style="float: right;" class="btn-group">

                                <a href="<?php echo base_url('health_report/view_healthrecord') ?>" class="btn btn-xs icon-box"><i class="fa fa-eye"></i></a>

                                <a href="add-health-record.html" class="btn btn-xs icon-box"><i class="fa fa-edit"></i></a>

                                <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                              </div>

                            </td>

                          </tr>

                          <tr class="hovertr" style="border-bottom:1px solid #ddd ;">

                            <td>Dr.John Deo</td>

                            <td>01/05/2020 05:20:45 PM</td>

                            <td>Amber Humble</td>

                            <td>Dr. John Deo</td>

                            <td>05/05/2020 08:25:45 PM</td>

                            <td>

                              <div style="float: right;" class="btn-group">

                                <a href="view-health-record.html" class="btn btn-xs icon-box"><i class="fa fa-eye"></i></a>

                                <a href="add-health-record.html" class="btn btn-xs icon-box"><i class="fa fa-edit"></i></a>

                                <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                              </div>

                            </td>

                          </tr>

                    </tbody>

                    </table>

                  </div>

                </section>



              </div>

        </section>

    </div>