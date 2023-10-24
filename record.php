<?php
session_start();
  include './includes/dashboardheader.php' ;
  include "./scripts/functions.php" ;
    $userDetials = getUserDetails($userId);
    $providers = getInsuranceProviders();

   
  ?>


<div class="main-container">
            <section class="text-center height-10">
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
            <section class="bg--secondary">
    <div class="container">
        <div class="row justify-content-center no-gutters">
            <div class="col-md-10 col-lg-8">
                <div class="boxed boxed--border">

                <form action="./scripts/updatePassword.php" method="post" id="updatePassword" class="text-left row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                    <div class="col-md-6">
                            <span>Old Password:</span>
                            <input type="password" name="old_password" class="validate-required" value="" />
                           
                        </div>
                        <div class="col-md-6">
                            <span>New Password:</span>
                            <input type="password" name="new_password" class="validate-required" />
                        </div>

                        <div class="col-md-12">
                            <span>Email:</span>
                            <input type="email" name="email"  value="<?= $userDetials['email'] ?>"class="validate-required" />
                        </div>

                        <div class="col-md-12 boxed">
                            <button type="submit" id="formButton1" class="btn btn--primary type--uppercase">Change Password</button>
                        </div>
                </form>

                <form id="patientRecordForm" method="post" action="./scripts/updateRecord.php" class="text-left row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                    
                    <div class="col-md-12">
                            <span>Contact Address:</span>
                            <input type="text" name="contact_address" class="validate-required" />
                        </div>
                        <div class="col-md-6">
                            <span>Phone Number:</span>
                            <input type="tel" name="phone_number" class="validate-required" />
                        </div>
                       
                      
                        <div class="col-md-6">
                            <span>Date of Birth:</span>
                            <input type="date" name="date_of_birth" class="validate-required" />
                        </div>
                        <div class="col-md-6">
                            <span>Next of Kin Name:</span>
                            <input type="text" name="next_of_kin_name" class="validate-required" />
                        </div>
                        <div class="col-md-6">
                            <span>Next of Kin Relationship:</span>
                            <input type="text" name="next_of_kin_relationship" class="validate-required" />
                        </div>
                        <div class="col-md-12">
                            <span>Next of Kin Address:</span>
                            <input type="text" name="next_of_kin_address" class="validate-required" />
                        </div>
                        <div class="col-md-8">
                        <span>Insurance Provider:</span>
                        <select name="insurance_provider" class="validate-required">
                            <?php
                            

                            foreach ($providers as $provider) {
                                echo '<option value="' . $provider['provider_id'] . '">' . $provider['provider_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                        <div class="col-md-6">
                            <span>Blood Group:</span>
                            <select name="blood_group" class="validate-required">
                                <option >Choose Options.....</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <span>Genotype:</span>
                            <select name="genotype" class="validate-required">
                                <option >Choose Options.....</option>
                                <option value="AA">AA</option>
                                <option value="AS">AS</option>
                                <option value="SS">SS</option>
                                <option value="AC">AC</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <span>Gender:</span>
                            <select name="gender" class="validate-required">
                                 <option >Choose Options.....</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <span>Marital Status:</span>
                            <select name="marital_status" class="validate-required">
                                <option >Choose Options.....</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>
                       
                        <div class="col-md-12 boxed">
                            <button type="submit" id="formButton2" class="btn btn--primary type--uppercase">Update Record</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
  include './includes/dashboardfooter.php' ;
  ?>

<script>
    $(document).ready(()=>{

        $('#updatePassword').submit((event)=>{
            event.preventDefault();
            var formData = {
                old_password : $('input[name = old_password]').val(),
                new_password : $('input[name = new_password]').val(),
                email: $('input[name = email]').val(),
            }

            for (var key in formData) {
                if (formData.hasOwnProperty(key) && formData[key].trim() === '') {
                    alert(`${key} must not be empty`);
                    return; 
                }
             }

            $.ajax({
                type: "POST",
                url:"./scripts/updatePassword.php",
                data:formData,
               
                success: (response)=>{
                    if(response.success){
                    alert(`${response.message}`)
                    }else{
                        alert(`${response.message}`)
                    }

                },
                error:(xhr,status,error)=>{

                    console.log("error: " + error);

                }
            })
        });




        $('#patientRecordForm').submit((event)=>{
            event.preventDefault();
            var formData = {
            contact_address: $('input[name=contact_address]').val(),
            phone_number: $('input[name=phone_number]').val(),
            date_of_birth: $('input[name=date_of_birth]').val(),
            next_of_kin_name: $('input[name=next_of_kin_name]').val(),
            next_of_kin_relationship: $('input[name=next_of_kin_relationship]').val(),
            next_of_kin_address: $('input[name=next_of_kin_address]').val(),
            insurance_provider: $('select[name=insurance_provider]').val(),
            blood_group: $('select[name=blood_group]').val(),
            genotype: $('select[name=genotype]').val(),
            gender: $('select[name=gender]').val(),
            marital_status: $('select[name=marital_status]').val(),
        };

        for (var key in formData) {
            if (formData.hasOwnProperty(key) && formData[key].trim() === '') {
                alert(`${key} must not be empty`);
                return; 
            }
        }

        $.ajax({
            type: "POST",
                url:"./scripts/updateRecord.php",
                data:formData,
               
                success: (response)=>{
                    if(response.success){
                    alert(`${response.message}`)
                    }else{
                        alert(`${response.message}`)
                    }

                },
                error:(xhr,status,error)=>{

                    console.log("error: " + error);

                }
        })

        });







    });
  </script>
