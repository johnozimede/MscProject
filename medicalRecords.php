<?php
session_start();
  include './includes/dashboardheader.php' ;
  include "./scripts/functions.php" ;

  
  if(isset($_GET['page'])){

    $page = $_GET['page'];

        }else{
            $page = "medHistory";

        }
    $userDetials = getUserDetails($userId);
    $userprescript = fetchPrescriptionsByPatientId($userId);
    $appointNotes = fetchAppointmentsByPatientIdAndStatus($userId, "completed");
    $labResults = fetchLabResults($userId);
    $medHistory = medicalHistory($userId);
?>
        <div class="col-lg-11 col-md-12 text-right text-left-xs text-left-sm">
            <div class="bar__module">
                <ul class="menu-horizontal text-left">
                <li class="">
                        <a href="./medicalRecords.php?page=medHistory">Medical History</a>
                    </li>
                    <li class="">
                        <a href="./medicalRecords.php?page=prescript">Prescriptions</a>
                    </li>
                    <li class="dropdown">
                        <a href="./medicalRecords.php?page=appointnotes">Appoinments Notes</a>
                    
                    </li>
                    <li class="dropdown">
                        <a href="./medicalRecords.php?page=lab">Lab Results</a>
                    
                    </li>

                

                    
                    
                </ul>
            </div>
    
                
        </div>
        <div class="main-container">
            <section class="bg--secondary space--sm">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="boxed boxed--lg boxed--border">
                                <?php
                                if($page =="prescript")
                                {
                                    ?>
                                     <caption>Prescriptions</caption>
                                    <table class="border--round table--alternate-row">
                                   
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Medication and Dosaage</th>
                                                <th>Instructions</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        foreach ($userprescript as $prescript) {?>
                                            <tr>
                                                <td><?=$prescript['prescription_date'] ?></td>
                                                <td><?=$prescript['medication_and_dosage'] ?></td>
                                                <td><?=$prescript['instructions'] ?></td>
                                                
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }else if($page =="appointnotes")
                                { ?> 
                                    <caption>Appointment Notes</caption>
                                    <table class="border--round table--alternate-row">
                                    
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Note</th>
                                            
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        foreach ($appointNotes as $notes) {?>
                                            <tr>
                                                <td><?=$notes['appointment_date'] ?></td>
                                                <td><?=$notes['additional_notes'] ?></td>
                                            
                                                
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>

                                <?php 
                                }else if($page =="lab")
                                { ?> 
                                        <caption>Lab Results</caption>
                                    <table class="border--round table--alternate-row">
                                        
                                        <thead>
                                            <tr>
                                                <th>Test</th>
                                                <th>Result</th>
                                            
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        foreach ($labResults as $result) {?>
                                            <tr>
                                                <td><?=$result['test_type'] ?></td>
                                                <td><?=$result['test_results'] ?></td>
                                            
                                                
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>

                                <?php 
                                }else if($page =="medHistory")
                                { ?> 
                                        <caption>medical History</caption>
                                    <table class="border--round table--alternate-row">
                                        
                                        <thead>
                                            <tr>
                                                <th>Diagnosis</th>
                                                <th>Medical Notes</th>
                                                <th>Medication(s)</th>
                                            
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        foreach ($medHistory as $history) {?>
                                            <tr>
                                                <td><?=$history['diagnosis'] ?></td>
                                                <td><?=$history['medical_note'] ?></td>
                                                <td><?=$history['medications'] ?></td>
                                            
                                                
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>

                                <?php 
                                }
                                 ?>
                                  
                            </div>
                           
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
        
  <?php
  include './includes/dashboardfooter.php' ;
  ?>

 