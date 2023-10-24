<?php
include './includes/header.php';
?>
        <div class="main-container">
            <section class="text-center height-50">
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-8 col-lg-6">
                            <h1>Welcome</h1>
                            <p class="lead">
                                Please Fill in Your Login Information
                            </p>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class=" bg--secondary">
                <div class="container">
                    <div class="row justify-content-center no-gutters">
                        <div class="col-md-10 col-lg-8">
                            <div class="boxed boxed--border">
                            <form method="POST" action="./scripts/login.php" id="loginForm" class="text-left row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                                <div class="col-md-6">
                                    <span>Email:</span>
                                    <input type="email" name="email" class="validate-required" />
                                </div>
                                <div class="col-md-6">
                                    <span>Password:</span>
                                    <input type="password" name="password" class="validate-required" />
                                </div>
                                <div class="col-md-12 boxed">
                                    <button type="submit" class="btn btn--primary type--uppercase">Sign In</button>
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <?php
include './includes/footer.php';
?>



<script>
$(document).ready(function () {
    $('#loginForm').submit(function (event) {
        event.preventDefault(); // Prevent form submission

        // Get form data
        var formData = {
            email: $('input[name=email]').val(),
            password: $('input[name=password]').val()
        };

        // Make Ajax request
        $.ajax({
            type: 'POST',
            url: './scripts/login.php', 
            data: formData,
            success: function (response) {
             
                console.log(response);

                if(response.success == true) {
                    alert(response.success);
                    
                    window.location.href = 'dashboard.php'; 
                    
                }else{

                alert("login failed");
                }
                
               
            },
            error: function (xhr, status, error) {
                
                console.log("error: " + error);
            }
        });
    });
});
</script>


<?php

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo "<script>alert('$msg');</script>";
   
    
}?>