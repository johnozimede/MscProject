<?php include ('./include/header.php') ?>

<?php

include ('./scripts/functions.php');

$all_patients = getAllPatients();
$all_doctors = getAllDoctors();

$all_appointments = getAllAppointments();

$all_lab_results = getAllLabResults();

$all_bill = getAllBills();

$total_patients = getTotalPatients();
$total_pending_aapointments = getTotalPendingAppointments();
$total_pending_bill = getTotalPendingBills();


$total_pending_lab = getTotalPendingLabResults();






?>

            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?= $total_patients ?></h3>

                        <p>Total Number Of Patients</p>
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
                        <h3><?= $total_pending_aapointments ?><sup style="font-size: 20px"></sup></h3>

                        <p>Pending Appointment</p>
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
                        <h3><?= $total_pending_bill ?></h3>

                        <p>Pending Payment Bill</p>
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
                        <h3><?= $total_pending_lab ?></h3>

                        <p>Pending Lab Results</p>
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
                              <a class="nav-link active" href="#note" data-toggle="tab">Appointment Table</a>
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

                          <table id="appointmentTable" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Booked Date</th>
                                            <th>Booked Time</th>
                                            <th>Purpose</th>
                                            <th>Status</th>
                                            <th>Section</th>
                                            <th>Assign to Doctor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (count($all_appointments) > 0) {
                                            foreach ($all_appointments as $appointment) {
                                                ?>
                                                <tr>
                                                    <td><?= $appointment['appointment_id'] ?></td>
                                                    <td><?= $appointment['appointment_date'] ?></td>
                                                    <td><?= $appointment['appointment_time'] ?></td>
                                                    <td><?= $appointment['appointment_purpose'] ?></td>
                                                    <td>
                                                <?php if ($appointment['appointment_status'] != 'completed') { ?>
                                                    <button class="update-appointment-status-btn" data-appointment-id="<?= $appointment['appointment_id'] ?>">Update Status</button>
                                                <?php } else { ?>
                                                    <!-- Display a message or icon for paid bills -->
                                                    Completed
                                                <?php } ?>
                                               </td>
                                                   
                                                    <td><?= $appointment['admin_assigned_section'] ?></td>
                                                    <td>
                                                        <form>
                                                            <select name="doctor_id">
                                                            <option value="">Select Doctor</option>
                                                               
                                                              <?php
                                                            if (count($all_doctors) > 0) {
                                            foreach ($all_doctors as $doctor) {
                                                ?>
                                                                <option id="doctor_id" value="<?= $doctor['doctor_id'] ?>"><?= $doctor['first_name'] ?></option>
                                                               
                                                                <?php }
                                                            }?>            
                                                            <!-- Add more doctors as needed -->
                                                            </select>
                                                            <button id="assignDoctor" type="submit">Assign</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php }
                                        }?>
                                    </tbody>
                                    
                                </table>


                        

                          
                            

                          
                          </div>
                          
                        </div>
                      </div>
                    </div>

                  </section>


              <section class="col-lg-12 connectedSortable">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-chart-pie mr-1"></i>
                          
                        </h3>
                        <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                              <a class="nav-link active" href="#bill" data-toggle="tab">Bill Table</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#lab" data-toggle="tab">Lab Results</a>
                            </li>
                          </ul>
                        </div>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content p-0">
                          <!-- Morris chart - Sales -->
                          <div class="chart tab-pane active" id="bill" style="position: relative; height: 600px;">
                          <table id="billingTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Bill ID</th>
                                    <th>Billing Date</th>
                                    <th>Total Amount</th>
                                    <th>Discount</th>
                                    <th>Payment Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($all_bill) > 0) {
                                    foreach ($all_bill as $bill) {
                                        ?>
                                        <tr>
                                            <td><?= $bill['billing_id'] ?></td>
                                            <td><?= $bill['billing_date'] ?></td>
                                            <td><?= $bill['total_amount'] ?></td>
                                            <td><?= $bill['discount'] ?></td>
                                            <td><?= $bill['payment_status'] == 1 ? 'Paid' : 'Pending' ?></td>
                                            <td>
                                                <?php if ($bill['payment_status'] == 0) { ?>
                                                    <button class="update-payment-status-btn" data-bill-id="<?= $bill['billing_id'] ?>">Update Status</button>
                                                <?php } else { ?>
                                                    <!-- Display a message or icon for paid bills -->
                                                    Paid
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td style="text-align:center;" colspan="6">NO RECORDS FOUND</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Bill ID</th>
                                    <th>Billing Date</th>
                                    <th>Total Amount</th>
                                    <th>Discount</th>
                                    <th>Payment Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>




                          
                              
                          </div>
                          <div class="chart tab-pane" id="lab" style="position: relative; height: 700px;">
                                <table id="labTable" class="display" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>Test ID</th>
                                          <th>Ordering Physician</th>
                                          <th>Date</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      if (count($all_lab_results) > 0) {
                                          foreach ($all_lab_results as $lab_result) {
                                              ?>
                                              <tr>
                                                  <td><?= $lab_result['test_id'] ?></td>
                                                  <td><?= $lab_result['ordering_physician'] ?></td>
                                                  <td><?= $lab_result['date'] ?></td>
                                                  <td><?= $lab_result['status'] ?></td>
                                                  <td>
                                                      <?php if ($lab_result['status'] == 'Pending') { ?>
                                                          <div class="btn-group">
                                                              <button class="update-status-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                  Update Status
                                                              </button>
                                                              <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Completed</a>
                                                                  <a class="dropdown-item" href="#">In Progress</a>
                                                                  <a class="dropdown-item" href="#">Other Status</a>
                                                              </div>
                                                          </div>
                                                      <?php } elseif ($lab_result['status'] == 'Completed') { ?>
                                                          <button class="update-status-btn" disabled>Completed</button>
                                                      <?php } else { ?>
                                                          <button class="update-status-btn" disabled><?= $lab_result['status'] ?></button>
                                                      <?php } ?>
                                                  </td>
                                              </tr>
                                          <?php }
                                      }  ?>
                                  </tbody>
                                
                              </table>

                                                        
                            
                          </div>
                        </div>
                      </div>
                    </div>   
              </section>

              <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-chart-pie mr-1"></i>
                      ADD DOCTOR FORM
                    </h3>
                    <div class="card-tools">
                      <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                          <a class="nav-link active" href="#note" data-toggle="tab">Add Doctor Form</a>
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

                      <form action="./scripts/addDoctor.php" method="post" id="doctor_registration_form">
                      <!-- <form action="./scripts/addDoctor.php" method="post" > -->
                          <caption>Doctor Registration Form</caption>

                          <div class="form-group">
                              <label for="first_name">First Name</label>
                              <input type="text" id="first_name" name="full_name" class="form-control" required>
                          </div>

                          <div class="form-group">
                              <label for="last_name">Last Name</label>
                              <input type="text" id="last_name" name="last_name" class="form-control" required>
                          </div>

                          <div class="form-group">
                              <label for="specialization">Specialization</label>
                              <select class="form-control" id="specialization" name="specialisation" required>
                                  <option value="">Select Specialization</option>
                                  <option value="Cardiologist">Cardiologist</option>
                                  <option value="Dermatologist">Dermatologist</option>
                                  <option value="Pediatrician">Pediatrician</option>
                                  <!-- Add more options as needed -->
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="contact_number">Contact Number</label>
                              <input type="tel" id="phone_number" name="phone_number" class="form-control" required>
                          </div>

                          <div class="form-group">
                              <label for="email">Email Address</label>
                              <input type="email" id="email" name="email" class="form-control" required>
                          </div>

                          <div class="form-group">
                              <label for="address">Address</label>
                              <textarea id="address" name="address" class="form-control" rows="4" required></textarea>
                          </div>

                          <div class="form-group">
                              <input type="submit" value="Register">
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

<?php include('./include/footer.php'); ?>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>


<script>

  new DataTable('#appointmentTable');
  new DataTable('#billingTable');
  new DataTable('#labTable');



  $("#doctor_registration_form").submit(function (e) {
    e.preventDefault(); // Prevent the form from submitting traditionally

    const fullName = $('#first_name').val().trim();
    const lastName = $('#last_name').val().trim();
    const specialization = $('#specialization').val(); // No need to trim here
    const email = $('#email').val().trim();
    const contactNumber = $('#phone_number').val().trim();
    const address = $('#address').val().trim();

    // Serialize form data
    var formData = {
        first_name: fullName,
        last_name: lastName,
        specialization: specialization,
        phone_number: contactNumber,
        email: email,
        address: address
    };

    // Send an AJAX request to your server for validation and submission
    $.ajax({
        type: "POST",
        url: "./scripts/addDoctor.php",
        data: formData,
        dataType: "json",
        success: function (response) {
            if (response.success) {
                // Registration successful, you can redirect or show a success message
                console.log("Registration successful!");
                // Redirect to a thank you page
                // window.location.href = "thank_you.html";
            } else {
                // Registration failed, display an error message from the server
                console.log("Registration failed. Error: " + response.message);
            }
        },
        error: function (xhr, status, error) {
            // Handle server error and display the error message
            console.log("Error submitting registration form. Please try again later. Error: " + error);
            console.error(xhr.responseText);
        }
    });
});

$("#assignDoctor").click(function (e){
  e.preventDefault();

  let doctor_id = $("#doctor_id").val();

  alert(doctor_id)

})


 




  </script>
  
</body>
</html>
