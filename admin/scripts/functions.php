<?php

include("connect.php");



function getAllPatients() {
    global $host, $dbname, $username, $password;

    try {
        
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Set PDO to throw exceptions on errors
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to retrieve all patients
        $sql = "SELECT * FROM patients";

        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Fetch all patients as an associative array
        $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the database connection
        $conn = null;

        return $patients;
    } catch(PDOException $e) {
        // Handle any database connection or query errors
        die("Database Error: " . $e->getMessage());
    }
}

function generateRandomString($length = 17) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}
function generateRandomInt($length = 10) {
    $characters = '0123456789';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}


function getTotalPatients() {
    global $host, $dbname, $username, $password;

    try {
        // Create a PDO connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Set PDO to throw exceptions on errors
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to count the total number of patients
        $sql = "SELECT COUNT(*) as total FROM patients";

        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Fetch the total as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Close the database connection
        $conn = null;

        // Return 0 if no patients are found
        return isset($result['total']) ? $result['total'] : 0;
    } catch(PDOException $e) {
        // Handle any database connection or query errors
        die("Database Error: " . $e->getMessage());
    }
}


function getAllAppointments() {
    global $host, $dbname, $username, $password;

    try {
        // Create a PDO connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Set PDO to throw exceptions on errors
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to retrieve all appointments
        $sql = "SELECT * FROM appointments";

        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Fetch all appointments as an associative array
        $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the database connection
        $conn = null;

        return $appointments;
    } catch(PDOException $e) {
        // Handle any database connection or query errors
        die("Database Error: " . $e->getMessage());
    }
}





function getAllDoctors() {
    global $host, $dbname, $username, $password;

    try {
        // Create a PDO connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Set PDO to throw exceptions on errors
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to retrieve all appointments
        $sql = "SELECT * FROM doctors";

        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Fetch all appointments as an associative array
        $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the database connection
        $conn = null;

        return $doctors;
    } catch(PDOException $e) {
        // Handle any database connection or query errors
        die("Database Error: " . $e->getMessage());
    }
}

// Function to get the total number of appointments where status is pending
function getTotalPendingAppointments() {
    global $host, $dbname, $username, $password;

    try {
        // Create a PDO connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Set PDO to throw exceptions on errors
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to count pending appointments
        $sql = "SELECT COUNT(*) as total FROM appointments WHERE appointment_status = 'pending'";

        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Fetch the total as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Close the database connection
        $conn = null;

        return isset($result['total']) ? $result['total'] : 0;
    } catch(PDOException $e) {
        // Handle any database connection or query errors
        die("Database Error: " . $e->getMessage());
    }
}

// Function to get all lab results
function getAllLabResults() {
    global $host, $dbname, $username, $password;

    try {
        // Create a PDO connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Set PDO to throw exceptions on errors
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to retrieve all lab results
        $sql = "SELECT * FROM labsandtests";

        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Fetch all lab results as an associative array
        $labResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the database connection
        $conn = null;

        return $labResults;
    } catch(PDOException $e) {
        // Handle any database connection or query errors
        die("Database Error: " . $e->getMessage());
    }
}

// Function to get the total number of lab results where status is pending
function getTotalPendingLabResults() {
    global $host, $dbname, $username, $password;

    try {
        // Create a PDO connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Set PDO to throw exceptions on errors
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to count pending lab results
        $sql = "SELECT COUNT(*) as total FROM labsandtests WHERE status = 'pending'";

        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Fetch the total as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Close the database connection
        $conn = null;

        return isset($result['total']) ? $result['total'] : 0;
    } catch(PDOException $e) {
        // Handle any database connection or query errors
        die("Database Error: " . $e->getMessage());
    }
}

// Function to get all bills
function getAllBills() {
    global $host, $dbname, $username, $password;

    try {
        // Create a PDO connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Set PDO to throw exceptions on errors
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to retrieve all bills
        $sql = "SELECT * FROM billing";

        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Fetch all bills as an associative array
        $bills = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the database connection
        $conn = null;

        return $bills;
    } catch(PDOException $e) {
        // Handle any database connection or query errors
        die("Database Error: " . $e->getMessage());
    }
}

// Function to get the total number of bills where status is pending
function getTotalPendingBills() {
    global $host, $dbname, $username, $password;

    try {
        // Create a PDO connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Set PDO to throw exceptions on errors
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to count pending bills
        $sql = "SELECT COUNT(*) as total FROM billing WHERE payment_status = 0";

        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Fetch the total as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Close the database connection
        $conn = null;

        return isset($result['total']) ? $result['total'] : 0;
    } catch(PDOException $e) {
        // Handle any database connection or query errors
        die("Database Error: " . $e->getMessage());
    }
}


function addDoctor($data) {
    global $host, $dbname, $username, $password;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Set PDO to throw exceptions on errors
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $first_name = $data->first_name;
        $last_name = $data->last_name;
        $password = generateRandomString($length = 17);
        $doctor_id = generateRandomInt($length = 10) ;
        $specialization = $data->specialization; // Corrected variable name
        $phone_number = $data->phone_number; // Corrected variable name
        $email = $data->email;
        $address = $data->address;

        $add_date = date('Y-m-d H:i:s');
        $admin_id = $_SESSION['admin'] ?? 0000;
        $admin_operation = "Registered Doctor";

        $sql = "INSERT INTO doctors (doctor_id,first_name, last_name, password, specialization, contact_number, email, address, joining_date, admin_id, admin_operation) 
                VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters using placeholders
        $stmt->bindParam(1, $doctor_id, PDO::PARAM_STR);
        $stmt->bindParam(2, $first_name, PDO::PARAM_STR);
        $stmt->bindParam(3, $last_name, PDO::PARAM_STR);
        $stmt->bindParam(4, $password, PDO::PARAM_STR);
        $stmt->bindParam(5, $specialization, PDO::PARAM_STR);
        $stmt->bindParam(6, $phone_number, PDO::PARAM_STR);
        $stmt->bindParam(7, $email, PDO::PARAM_STR);
        $stmt->bindParam(8, $address, PDO::PARAM_STR);
        $stmt->bindParam(9, $add_date, PDO::PARAM_STR);
        $stmt->bindParam(10, $admin_id, PDO::PARAM_STR);
        $stmt->bindParam(11, $admin_operation, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true; // Insertion successful
        } else {
            return $stmt->errorInfo(); // Return error description
        }
    } catch (PDOException $e) {
        return $e->getMessage(); // Return the exception message if an error occurs
    }
}








?>
