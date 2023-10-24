<?php
// Include the connection settings and the addDoctor function
include_once('connect.php');
include_once('functions.php');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data sent via POST
    $full_name = $_POST["full_name"];
    $last_name = $_POST["last_name"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $specialisation = $_POST["specialisation"]; // Corrected variable name

    $data = (object) [
        "first_name" => $full_name, // Corrected variable name
        "last_name" => $last_name,
        "phone_number" => $phone_number,
        "email" => $email,
        "address" => $address,
        "specialization" => $specialisation // Corrected variable name
    ];

    // Call the addDoctor function with the received data
    $result = addDoctor($data);

    if ($result === true) {
        // If the insertion was successful
        $response = array('success' => true, 'message' => 'Doctor added successfully');
    } else {
        // If there was an error, $result will contain the error description
        $response = array('success' => false, 'message' => $result);
    }
    
    // Send the response as JSON
    header('Content-Type: application/json'); // Set the content type to JSON
    echo json_encode($response); // Encode the response as JSON
}
    
?>
