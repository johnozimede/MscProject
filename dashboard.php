<?php
session_start();
  include './includes/dashboardheader.php' ;
  include "./scripts/functions.php" ;



    $userDetials = getUserDetails($userId);
  ?>
        <div class="main-container">
            <section class="bg--secondary space--sm">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="boxed boxed--lg boxed--border">
                                <div class="text-block text-center">
                                    <img alt="avatar" src="img/avatar-round-3.png" class="image--md" />
                                    <span class="h5"><?= $userDetials['full_name'] ?></span>
                                    <span>Full Name</span>
                                    <span class="label">In-Patient</span>
                                </div>
                                <div class="text-block clearfix text-center">
                                    <ul class="row row--list">
                                        <li class="col-md-4">
                                            <span class="type--fine-print block">patient Id</span>
                                            <span><?= $userDetials['patient_id'] ?>&nbsp;</span>
                                            
                                        </li>
                                        <li class="col-md-4">
                                            <span class="type--fine-print block">Next Of Kin:</span>
                                            <span><?= $userDetials['userName']?? " NONE"?></span>
                                        </li>
                                        <li class="col-md-4">
                                            <span class="type--fine-print block">Contact:</span>
                                            <a href="#"><?= $userDetials['email'] ?></a>
                                        </li>
                                </div>
                                </ul>
                            </div>
                            <div class="boxed boxed--border">
                                <ul class="row row--list clearfix text-center">
                                    <li class="col-md-3 col-6">
                                        <span class="h6 type--uppercase type--fade">Pending Appointments</span>
                                        <span class="h3">220</span>
                                    </li>
                                    <li class="col-md-3 col-6">
                                        <span class="h6 type--uppercase type--fade">Pending Bill</span>
                                        <span class="h3">14</span>
                                    </li>
                                    <li class="col-md-3 col-6">
                                        <span class="h6 type--uppercase type--fade">Pending Lab Test</span>
                                        <span class="h3">2,129</span>
                                    </li>
                                    <li class="col-md-3 col-6">
                                        <span class="h6 type--uppercase type--fade">Pending Prescription</span>
                                        <span class="h3">119</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="boxed boxed--border">
                                <h4>Doctor in charger</h4>
                                <ul class="clearfix row row--list text-center">
                                    <li class="col-md-3 col-6">
                                        <a href="#">
                                            <img alt="avatar" src="img/avatar-round-2.png" class="image--sm" />
                                            <span class="block">Alice Merriweather</span>
                                        </a>
                                    </li>
                                    <li class="col-md-3 col-6">
                                        <a href="#">
                                            <img alt="avatar" src="img/avatar-round-1.png" class="image--sm" />
                                            <span class="block">Kelly Burgess</span>
                                        </a>
                                    </li>
                                    <li class="col-md-3 col-6">
                                        <a href="#">
                                            <img alt="avatar" src="img/avatar-round-4.png" class="image--sm" />
                                            <span class="block">Marc Nguyen</span>
                                        </a>
                                    </li>
                                    <li class="col-md-3 col-6">
                                        <a href="#">
                                            <img alt="avatar" src="img/avatar-round-5.png" class="image--sm" />
                                            <span class="block">Selena Rouse</span>
                                        </a>
                                    </li>
                                </ul>
                                <a href="#" class="type--fine-print pull-right">View All</a>
                            </div>
                            <div class="boxed boxed--border">
                                <h4>Medical Remarks and  Activity</h4>
                                <ul>
                                    <li class="clearfix">
                                        <div class="row">
                                            <div class="col-lg-2 col-3 text-center">
                                                <div class="icon-circle">
                                                    <i class="icon icon--lg material-icons">comment</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-7">
                                                <span class="type--fine-print">21st July, 2017</span>
                                                <a href="#" class="block color--primary">Check out the relaunched Scope</a>
                                                <p>
                                                    Discourse in writing dealing with a particular point or idea.
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                    </li>
                                    <li class="clearfix">
                                        <div class="row">
                                            <div class="col-lg-2 col-3 text-center">
                                                <div class="icon-circle">
                                                    <i class="icon icon--lg material-icons">mode_edit</i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-7">
                                                <span class="type--fine-print">14th July, 2017</span>
                                                <a href="#" class="block color--primary">Tips for web typography</a>
                                                <p>
                                                    To write beside or "written beside" is a self-contained unit of a discourse in writing dealing with a particular point or idea.
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                    </li>
                                    <li class="clearfix">
                                        <div class="row">
                                            <div class="col-lg-2 col-3 text-center">
                                                <div class="icon-circle">
                                                    <i class="icon icon--lg material-icons">favorite</i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-7">
                                                <span class="type--fine-print">12th July, 2017</span>
                                                <a href="#" class="block color--primary">Where do you source your stock photography?</a>
                                            </div>
                                        </div>
                                        <hr>
                                    </li>
                                    <li class="clearfix">
                                        <div class="row">
                                            <div class="col-lg-2 col-3 text-center">
                                                <div class="icon-circle">
                                                    <i class="icon icon--lg material-icons">comment</i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-7">
                                                <span class="type--fine-print">3rd July, 2017</span>
                                                <a href="#" class="block color--primary">Share your rapid development workflow</a>
                                                <p>
                                                    Of a discourse in writing dealing with a particular point or idea.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <a href="#" class="type--fine-print pull-right">View All</a>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
          
  <?php
  include './includes/dashboardfooter.php' ;
  ?>

 