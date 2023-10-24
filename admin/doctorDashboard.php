<?php include ('./include/header.php') ?>

            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>150</h3>

                        <p>Completed Appointments</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Prescriptions</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>44</h3>

                        <p>Pending Appointment</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>65</h3>

                        <p>Recommended Test</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                  <!-- Left col -->
                  <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-chart-pie mr-1"></i>
                          Patient Session Form
                        </h3>
                        <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                              <a class="nav-link active" href="#note" data-toggle="tab">Appointment Note</a>
                            </li>
                            <!-- <li class="nav-item">
                              <a class="nav-link" href="#test" data-toggle="tab">Recommend Test</a>
                            </li> -->
                          </ul>
                        </div>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content p-0">
                          <!-- Morris chart - Sales -->
                          <div class="chart tab-pane active" id="note" style="position: relative; height: 700px;">

                            <form action="" method="post" id="appointment_form">
                              <caption>Appointment Form</caption>
                            
                              <div class="form-group">
                                <label for="patient_id">Patient Name</label>
                                <select class="form-control" name="patient_id" required>
                                  <option value="1">Patient 1</option>
                                  <option value="2">Patient 2</option>
                                  <option value="3">Patient 3</option>
                                </select>
                                <a href="#" target="_blank">View Patient Record</a>
                              </div>
                            
                              <div class="form-group">
                                <label for="note">Appointment Note</label>
                                <textarea name="note" id="note" cols="140" rows="15" required></textarea>
                              </div>
                            
                              <div class="form-group mb-2">
                                <h3>Test Recommendation Form</h3>
                                <div class="icheck-primary d-inline">
                                  <input name="malaria" type="checkbox" id="checkboxPrimary1" value="1">
                                  <label for="checkboxPrimary1">Malaria</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                  <input name="fullbloodcount" type="checkbox" id="checkboxPrimary2" value="2">
                                  <label for="checkboxPrimary2">Full Blood Count</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                  <input name="hepatitis" type="checkbox" id="checkboxPrimary3" value="3">
                                  <label for="checkboxPrimary3">Hepatitis</label>
                                </div>
                              </div>
                            
                              <div class="form-group">
                                <input type="submit" value="Submit">
                              </div>
                            </form>
                            

                          
                          </div>
                          
                        </div>
                      </div>
                    </div>

                </section>


              <section class="content">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-chart-pie mr-1"></i>
                          
                        </h3>
                        <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                              <a class="nav-link active" href="#pres" data-toggle="tab">Prescription</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#rec" data-toggle="tab">Record form</a>
                            </li>
                          </ul>
                        </div>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content p-0">
                          <!-- Morris chart - Sales -->
                          <div class="chart tab-pane active" id="pres"
                              style="position: relative; height: 600px;">
                              <form action="" method="post">
                                <caption>Prescriptions Form</caption>
                              
                                <div class="form-group">
                                  <label for="patient_id">Patient Name</label>
                                  <select class="form-control" name="patient_id" required>
                                    <option value="1">Patient 1</option>
                                    <option value="2">Patient 2</option>
                                    <option value="3">Patient 3</option>
                                  </select>
                                  <a href="#" target="_blank">View Prescription History</a>
                                </div>
                              
                                <div class="form-group">
                                  <label for="medication">Medication and Dosage</label>
                                  <textarea name="medication" id="medication" cols="140" rows="7" required></textarea>
                                </div>
                              
                                <div class="form-group">
                                  <label for="prescription_note">Prescription Note</label>
                                  <textarea name="prescription_note" id="prescription_note" cols="140" rows="5" required></textarea>
                                </div>
                              
                                <div class="form-group">
                                  <input type="submit" value="Submit">
                                </div>
                              </form>
                              
                          </div>
                          <div class="chart tab-pane" id="rec" style="position: relative; height: 700px;">
                            <form action="" method="post">
                              <caption>Medical Recommendation Form</caption>
                            
                              <div class="form-group">
                                <label for="patient_id">Select Patient</label>
                                <select class="custom-select rounded-0" name="patient_id" required>
                                  <option value="1">Patient 1</option>
                                  <option value="2">Patient 2</option>
                                  <option value="3">Patient 3</option>
                                </select>
                                <a href="#" target="_blank">View Patient Record</a>
                              </div>
                            
                              <div class="form-group">
                                <label for="diagnosis">Diagnosis</label>
                                <textarea name="diagnosis" id="diagnosis" cols="140" rows="5" required></textarea>
                              </div>
                            
                              <div class="form-group">
                                <label for="medication">Medication</label>
                                <textarea name="medication" id="medication" cols="140" rows="5" required></textarea>
                              </div>
                            
                              <div class="form-group">
                                <label for="medical_note">Medical Note</label>
                                <textarea name="medical_note" id="medical_note" cols="140" rows="5" required></textarea>
                              </div>
                            
                              <div class="form-group">
                                <input type="submit" value="Submit">
                              </div>
                            </form>
                            
                          </div>
                        </div>
                      </div>
                    </div>   
              </section>
            </div>
            </section>
            <!-- /.content-wrapper -->
      </div>
      <?php include ('./include/footer.php') ?>
     


<script>
  $(document).ready(function () {
    $("#appointment_form").submit(function (e) {
      e.preventDefault(); // Prevent the form from submitting traditionally
  
      // Serialize form data
      var formData = $(this).serialize();
  
      $.ajax({
        type: "POST",
        url: "your_server_endpoint.php", // Replace with your server endpoint
        data: formData,
        success: function (response) {
          // Handle success response here
          console.log("Appointment Form submitted successfully");
          console.log(response);
          // You can update the page or show a success message here
        },
        error: function (error) {
          // Handle error response here
          console.log("Error submitting Appointment Form");
          console.log(error);
          // You can display an error message to the user
        },
      });
    });



    $("#prescriptions_form").submit(function (e) {
      e.preventDefault(); // Prevent the form from submitting traditionally
  
      // Serialize form data
      var formData = $(this).serialize();
  
      $.ajax({
        type: "POST",
        url: "your_server_endpoint.php", // Replace with your server endpoint
        data: formData,
        success: function (response) {
          // Handle success response here
          console.log("Prescriptions Form submitted successfully");
          console.log(response);
          // You can update the page or show a success message here
        },
        error: function (error) {
          // Handle error response here
          console.log("Error submitting Prescriptions Form");
          console.log(error);
          // You can display an error message to the user
        },
      });
    });



    $("#medical_recommendation_form").submit(function (e) {
      e.preventDefault(); // Prevent the form from submitting traditionally
  
      // Serialize form data
      var formData = $(this).serialize();
  
      $.ajax({
        type: "POST",
        url: "your_server_endpoint.php", // Replace with your server endpoint
        data: formData,
        success: function (response) {
          // Handle success response here
          console.log("Medical Recommendation Form submitted successfully");
          console.log(response);
          // You can update the page or show a success message here
        },
        error: function (error) {
          // Handle error response here
          console.log("Error submitting Medical Recommendation Form");
          console.log(error);
          // You can display an error message to the user
        },
      });
    });



  });





  </script>
  
</body>
</html>
