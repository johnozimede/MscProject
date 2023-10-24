<?php
include './includes/header.php';
?>
        <div class="main-container">
            <section class="text-center height-50">
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-8 col-lg-6">
                            <h1>Let's get you started</h1>
                            <p class="lead">
                                fill in the form below
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
                            <form action="./scripts/register.php" id="formBody" method="Post" class="text-left row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                                <div class="col-md-6">
                                    <span>Full Name:</span>
                                    <input type="text" name="full_name" class="validate-required" />
                                </div>
                                <div class="col-md-6">
                                    <span>Phone Number:</span>
                                    <input type="tel" name="phone_number" class="validate-required" />
                                </div>
                                <div class="col-md-6">
                                    <span>Email:</span>
                                    <input type="email" name="email" class="validate-required" />
                                </div>
                                <div class="col-md-6">
                                    <span>Password:</span>
                                    <input type="password" name="password" class="validate-required" />
                                </div>
                               
                                <div class="col-md-12 boxed">
                                    <button type="submit" id="formButton" class="btn btn--primary type--uppercase">Sign Up</button>
                                </div>
                               
                            </form>

                            </div>
                        </div>
                    </div>
                    
                </div>
             
            </section>
            <?php
include './includes/footer.php';

?>


<script>

$(document).ready(function () {
    $('#formBody').submit(function (event) {
        event.preventDefault(); // Prevent form submission

        var formData = {
            full_name: $('input[name=full_name]').val(),
            phone_number: $('input[name=phone_number]').val(),
            email: $('input[name=email]').val(),
            password: $('input[name=password]').val(),
        };

        if (formData.full_name === '' || formData.phone_number === '' || formData.email === '' || formData.password === '') {
            alert('Please fill in all fields.');
            return;
        }

        $.ajax({
            type: 'POST',
            url: './scripts/register.php',
            data: formData,
            dataType: 'json', 
            success: function (response) {
                console.log(response);

                if(response.success == true) {
                var billObject = {
                    patientID: response.data.patientID,
                    amount: 500,
                    reason: 'Card Creation',
                    discount: 0,
                    providerID: 0,
                    Paid: true
                };

                $.ajax({
                    type: 'POST',
                    url: './scripts/bill.php', 
                    data: JSON.stringify(billObject),
                    success: function (secondResponse) {
                        // alert(secondResponse);
                        
                        $('input[name=full_name]').val('');
                        $('input[name=phone_number]').val('');
                        $('input[name=email]').val('');
                        $('input[name=password]').val('');

                    
                       
                        window.location.href = './login.php?msg=welcome Please login with your email address and password';
                    },
                    error: function (xhr, status, error) {
                       
                       console.log(error);
                    }
                });

                }
                else{
                    alert("Registration Failed");
                }
            },
            error: function (xhr, status, error) {
                var errorMessage = "An error occurred2: " + xhr.responseText;
                console.log(errorMessage);
            }
        });
    });
});


</script>





