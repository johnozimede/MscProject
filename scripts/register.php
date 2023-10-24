<?php
include './conn.php';
include './functions.php';
header('Content-Type: application/json');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from the AJAX request
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $date = date("Y-m-d H:i:s");


   
    $userData = (object) [
        "full_name" => $full_name,
        "phone_number" => $phone_number,
        "email" => $email,
        "password" => $password,
        "date" => $date,
       
    ];

   

  $message = createUser($userData);

//   var_dump($message);
 


   $userId = getUserDetails($email);
//    var_dump($userId);
  

   if (is_array($userId) && isset($userId['patient_id'])){

    $patientID =  $userId['patient_id'] ;


  

    $billObject = (object) [
        "patientID" =>  $patientID,
        "amount" => 500.00,
        "reason" => "Card Creation",
        "discount" => 0,
        "providerID" => 0,
        "Paid" => true 
    ];
   
     $ReturnData =  (object)[
         "success" => true,
         "data" => $billObject
     ];
 
     $jsonResponse = json_encode($ReturnData);
 
     echo $jsonResponse; 
 
     
     
   
 

   }else{

    $ReturnData =  (object)[
        "success" => false,
        "data" => null
    ];
    $jsonResponse = json_encode($ReturnData);
 
     echo $jsonResponse; 
   }

   


   
 }
