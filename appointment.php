<?php

session_start();

if(isset($_SESSION['id'])){

  

    include './includes/dashboardheader.php';

}else{

    include './includes/header.php';
     
}

?>
        <div class="main-container">
            <section class="text-center height-20">
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-8 col-lg-6">
                            <h1>Book Your Appoinments</h1>
                           
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
          
            <?php

                include './includes/appointmentForm.php';


include './includes/footer.php';

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   $(document).ready(() => {
    $('#appointmentForm').submit(event => {
        event.preventDefault();
        const userNature = $('#userNature').val();
        
        // Helper function to perform form validations
        function validateForm(formData) {
            // Add your validation logic here
            // For example, check if required fields are not empty
            if (!formData.appointment_purpose) {
                alert("Please provide the purpose of the appointment.");
                return false;
            }

            if (!formData.section) {
                alert("Please select a section.");
                return false;
            }

            if (!formData.time) {
                alert("Please select a time.");
                return false;
            }

            if (!formData.date) {
                alert("Please select a date.");
                return false;
            }

            // Add more validation rules as needed
            
            return true;
        }

        if (userNature != undefined) {
            // Unregistered user
            const formData = {
                full_name: $('input[name=fullname]').val(),
                phone_number: $('input[name=phone]').val(),
                email: $('input[name=email]').val().trim(),
                password: $('input[name=password]').val(),
                appointment_purpose: $('textarea[name=appointment_purpose]').val(),
                section: $('input[name=section]:checked').val(),
                time: $('input[name=time]:checked').val(),
                date: $('input[name=appointment_date]').val()
            };

            // Perform form validations
            if (!validateForm(formData)) {
                return; // Do not proceed if validation fails
            }
            
            $.ajax({
                type: 'POST',
                url: './scripts/newUserAppointment.php',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    alert("Success response:", response);
                },
                error: function (xhr, status, error) {
                    console.log("Error response:", xhr.responseText);
                }
            });
        } else {
            const formData = {
                appointment_purpose: $('textarea[name=appointment_purpose]').val(),
                section: $('input[name=section]:checked').val(),
                time: $('input[name=time]:checked').val(),
                date: $('input[name=appointment_date]').val()
            };

            // Perform form validations
            if (!validateForm(formData)) {
                return; // Do not proceed if validation fails
            }
            
            $.ajax({
                type: 'POST',
                url: './scripts/registerUserAppointment.php',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    window.location.href ='login.php';
                    alert("Success response:", response);
                    
                },
                error: function (xhr, status, error) {
                    console.log("Error response:", xhr.responseText);
                }
            });
        }
    });
});


</script>
