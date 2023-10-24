<?php
include './conn.php';
include './functions.php';

header('Content-Type: application/json');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $email = $_POST["email"];
    $pass = $_POST["password"];

   $response =  loginUser($email, $pass);

   

    echo json_encode($response);
   
   
   
   
}
?>
