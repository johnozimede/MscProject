<?php
session_start();
  include './includes/dashboardheader.php' ;
  include "./scripts/functions.php" ;



    $userDetials = getUserDetails($userId);
    $userBiil = getUserBill($userId);
  ?>
        <div class="main-container">
            <section class="bg--secondary space--sm">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="boxed boxed--lg boxed--border">
                             <table class="border--round table--alternate-row">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                foreach ($userBiil as $bill) {?>
                                    <tr>
                                        <td><?=$bill['billing_reason'] ?></td>
                                        <td><?=$bill['total_amount'] ?></td>
                                        <td><?=$bill['billing_date'] ?></td>
                                        <td><?php 
                                        If($bill['payment_status'] == 1){ echo  "Paid"; }else{ echo "Outstanding";} ?></td>
                                        <td><a href="./invoice.php?bill_id=<?=$bill['billing_id'] ?>">view reciept</a></td>
                                    </tr>
                                   <?php } ?>
                                </tbody>
                            </table>
                                                
                            </div>
                           
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
          
  <?php
  include './includes/dashboardfooter.php' ;
  ?>

 