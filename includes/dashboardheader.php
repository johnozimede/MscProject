<?php


if(isset($_SESSION['id'])){

    $userId = $_SESSION['id'];

}else{
     header('Location:./login.php');  
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Toptea Medical Center</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Site Description Here">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/socicon.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body class=" ">
        <a id="start"></a>
        <section class="bar bar-3 bar--sm bg--secondary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bar__module">
                            <span class="type--fade">Toptea Medical Center</span>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right text-left-xs text-left-sm">
                        <div class="bar__module">
                            <ul class="menu-horizontal">
                                <li>
                                <div class="modal-instance">
                                                <a href="#" onclick="logout()" class="modal-trigger">Logout</a>
                                            </div>

                                            <script>
                                                function logout() {
                                                    if (confirm('Are you sure you want to log out?')) {
                                                       
                                                        window.location.href = 'logout.php';
                                                    }
                                                }
                                            </script>
                                </li>
                               
                               
                                <li class="dropdown dropdown--absolute">
                                    <span class="dropdown__trigger">
                                        <img alt="Image" class="flag" src="img/flag-1.png" />
                                    </span>
                                    <div class="dropdown__container">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 dropdown__content">
                                                    <ul class="menu-vertical text-left">
                                                        <li>
                                                            <a href="#">ENG</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">GER</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" data-notification-link="side-menu">
                                    Notifications<i class="stack-dot-3"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        <!--end bar-->
        <div class="notification pos-right pos-top side-menu bg--white" data-notification-link="side-menu" data-animation="from-right">
            <div class="side-menu__module">
                <a class="btn btn--icon bg--facebook block" href="#">
                    <span class="btn__text">
                        
                        Notifications
                    </span>
                </a>
               
            </div>
            <!--end module-->
            <hr>
            <div class="side-menu__module">
                <span class="type--fine-print float-left">Already have an account?</span>
                <a class="btn type--uppercase float-right" href="#">
                    <span class="btn__text">Login</span>
                </a>
            </div>
            <!--end module-->
            <hr>
          
        </div>
       
        <!--end of notification-->
        <div class="nav-container ">
            <div class="bar bar--sm visible-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-3 col-md-2">
                             <a href="index.php">
                            <h1 class="display-7 text-primary">Toptea Medical Center</h1> 
                            </a>
                        </div>
                        <div class="col-9 col-md-10 text-right">
                            <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs">
                                <i class="icon icon--sm stack-interface stack-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </div>
            <!--end bar-->
            <nav id="menu1" class="bar bar--sm bar-1 hidden-xs ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-md-2 hidden-xs">
                            <div class="bar__module">
                                <a href="index.php">
                                <h1 class="display-7 text-primary">Toptea Medical Center</h1> 
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                        <div class="col-lg-11 col-md-12 text-right text-left-xs text-left-sm">
                            <div class="bar__module">
                                <ul class="menu-horizontal text-left">
                                    <li class="">
                                        <a href="./dashboard.php">User Dashboard</a>
                                       
                                       
                                    </li>
                                    <li class="dropdown">
                                        <a href="./record.php">Update  User Records</a>
                                       
                                    </li>
                                    <li class="dropdown">
                                            <a href="./payments.php">Payment Records</a>
                                        
                                       
                                    </li>
                                    <li class="dropdown">
                                        <a href="./medicalRecords.php">Medical Record</a>
                                       
                                    </li>
                                    <li class="dropdown">
                                        <a href="./appointment.php">Book Appointments</a>
                                      
                                    </li>
                                    
                                </ul>
                            </div>
                            <!--end module-->
                        
                          
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </nav>
            <!--end bar-->
        </div>

     