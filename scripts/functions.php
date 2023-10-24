<?php
function connectToDatabase() {
    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";
    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $pdo = new PDO($dsn, $username, $password);
        
        // Set PDO attributes
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        return $pdo;
    } catch (PDOException $e) {
        // Handle connection errors
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}



function createUser($userData){

    $full_name = $userData->full_name;
    $phone_number = $userData->phone_number;
    $email = $userData->email;
    $pass = $userData->password;
    $date = $userData->date;


    // Validation (you can add more advanced validation)
    if (empty($full_name) || empty($phone_number) || empty($email) || empty($pass)) {
        return "Please fill in all fields.";
    } else {
      

        $host = "localhost";
        $dbname = "mscproject";
        $username = "root";
        $password = "";
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        

            $stmt = $pdo->prepare("INSERT INTO patients (full_name, phone_number, email, password,date) VALUES (?, ?, ?, ?,?)");
            $stmt->execute([$full_name, $phone_number, $email, $pass, $date]);
            


            return  $response = array('success' => true);

        } catch (PDOException $e) {
            return  $response = array('success' => $e);
            
        }
    }
}

function loginUser($email, $pass){
    

    session_start();
    if (empty($email) || empty($pass)) {
        echo "Please fill in all fields.";
    } else {
        // Perform database validation
        // Replace with your actual database connection and query logic
      
        $host = "localhost";
        $dbname = "mscproject";
        $username = "root";
        $password = "";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT * FROM patients WHERE email = ? AND password = ?");
            $stmt->execute([$email, $pass]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {

                $_SESSION['id'] = $user['patient_id'];

              return  $response = array('success' => true,"user_id" => $user['patient_id']);
            } else {
                // Authentication failed
              return  $response = array('success' => "Authentication failed");
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}


function getUserDetails($userIdOrEmail) {
   

        $host = "localhost";
        $dbname = "mscproject";
        $username = "root";
        $password = "";
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               

        // Check if the input is numeric (assuming it's user ID)
        if (is_numeric($userIdOrEmail)) {
            $stmt = $pdo->prepare("SELECT * FROM patients WHERE patient_id = ?");
        } else { // Assuming it's an email
            $stmt = $pdo->prepare("SELECT * FROM patients WHERE email = ?");
        }

        $stmt->execute([$userIdOrEmail]);
        $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        return $userDetails;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function checkPatientRecordExist($patientID) {
    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM patient_record WHERE patient_id = ?");
        $stmt->execute([$patientID]);

        $rowCount = $stmt->fetchColumn();
        
        return $rowCount > 0; // Return true if record exists, false otherwise
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false; // Return false on error
    }
}


function insertPatientRecord($patientRecord) {
    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO patient_record (patient_id, contact_address, phone_number, date_of_birth, next_of_kin_name, next_of_kin_relationship, next_of_kin_address, provider_id, blood_group, genotype, gender, marital_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $patientRecord->patientID,
            $patientRecord->contact_address,
            $patientRecord->phone_number,
            $patientRecord->date_of_birth,
            $patientRecord->next_of_kin_name,
            $patientRecord->next_of_kin_relationship,
            $patientRecord->next_of_kin_address,
            $patientRecord->insurance_provider,
            $patientRecord->blood_group,
            $patientRecord->genotype,
            $patientRecord->gender,
            $patientRecord->marital_status
        ]);

        return true; // Return true if insertion is successful
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false; // Return false on error
    }
}


function updatePatientRecord($patientRecord) {
    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $updateFields = "";
        $values = array();

        if (isset($patientRecord->contact_address)) {
            $updateFields .= "contact_address = ?, ";
            $values[] = $patientRecord->contact_address;
        }

        if (isset($patientRecord->phone_number)) {
            $updateFields .= "phone_number = ?, ";
            $values[] = $patientRecord->phone_number;
        }

        if (isset($patientRecord->date_of_birth)) {
            $updateFields .= "date_of_birth = ?, ";
            $values[] = $patientRecord->date_of_birth;
        }

        if (isset($patientRecord->next_of_kin_name)) {
            $updateFields .= "next_of_kin_name = ?, ";
            $values[] = $patientRecord->next_of_kin_name;
        }

        if (isset($patientRecord->next_of_kin_relationship)) {
            $updateFields .= "next_of_kin_relationship = ?, ";
            $values[] = $patientRecord->next_of_kin_relationship;
        }

        if (isset($patientRecord->next_of_kin_address)) {
            $updateFields .= "next_of_kin_address = ?, ";
            $values[] = $patientRecord->next_of_kin_address;
        }


        if (isset($patientRecord->insurance_provider)) {
            $updateFields .= "provider_id = ?, ";
            $values[] = $patientRecord->insurance_provider;
        }
        
        if (isset($patientRecord->blood_group)) {
            $updateFields .= "blood_group = ?, ";
            $values[] = $patientRecord->blood_group;
        }
        
        if (isset($patientRecord->genotype)) {
            $updateFields .= "genotype = ?, ";
            $values[] = $patientRecord->genotype;
        }
        
        if (isset($patientRecord->gender)) {
            $updateFields .= "gender = ?, ";
            $values[] = $patientRecord->gender;
        }
        
        if (isset($patientRecord->marital_status)) {
            $updateFields .= "marital_status = ?, ";
            $values[] = $patientRecord->marital_status;
        }
       

        // Remove the trailing comma and space from the updateFields string
        $updateFields = rtrim($updateFields, ", ");

        $query = "UPDATE patient_record SET $updateFields WHERE patient_id = ?";
        $values[] = $patientRecord->patientID; // Assuming you have patient_id in the object

        $stmt = $pdo->prepare($query);
        $stmt->execute($values);

        return true; // Return true if update is successful
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false; // Return false on error
    }
}





function updateUserLogDetails($userData) {
    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";

    $update = false;

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $userId = $userData->id;
        $newEmail = isset($userData->newEmail) ? $userData->newEmail : null;
        $newPassword = isset($userData->newPassword) ? $userData->newPassword : null;

        // Update either email or password based on the provided data
        if ($newEmail !== null) {
            $stmt = $pdo->prepare("UPDATE patients SET email = ? WHERE patient_id = ?");
            $stmt->execute([$newEmail, $userId]);

            $update = 1;
        }
        
        if ($newPassword !== null) {
            // You should hash the password before updating
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
            // $stmt = $pdo->prepare("UPDATE patients SET password = ? WHERE patient_id = ?");
            // $stmt->execute([$hashedPassword, $userId]);

            $stmt = $pdo->prepare("UPDATE patients SET password = ? WHERE patient_id = ?");
            $stmt->execute([$newPassword, $userId]);

            $update = 2;
        }

        if($update == 1 || $update == 2) {

            return $update;

        }

        return " no Update performed";

        // Return true if update is successful
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false; // Return false on error
    }
}



function insertBillFromObject($billData) {
   

    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";


    $date = date("Y-m-d H:i:s");
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO billing (`patient_id`, `provider_id`, `billing_date`, `total_amount`, `discount`, `payment_status`, `billing_reason`) VALUES (?, ?, ?, ?, ?,?,?)");
        $stmt->execute([$billData->patientID, $billData->providerID, $date, $billData->amount, $billData->discount, $billData->Paid ? 1 : 0, $billData->reason]);
        
        return  $response = array('success' => true); // Return true if insertion is successful
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return  $response = array('success' => false);; // Return false on error
    }
}




function bookAppointment($appointmentData) {
    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";

    $dateCreated = date("Y-m-d H:i:s");

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL query with placeholders for the "appointments" table
        $stmt = $pdo->prepare("INSERT INTO appointments (`patient_id`, `appointment_date`, `appointment_time`, `section`, `appointment_purpose`, `date_created`) VALUES (?, ?, ?, ?, ?, ?)");
        $success = $stmt->execute([
            $appointmentData->patientID,
            $appointmentData->date,
            $appointmentData->time,
            $appointmentData->section,
            $appointmentData->appointment_purpose,
            $dateCreated
        ]);

        if ($success) {
            // Return success status
            return ['success' => true];
        } else {
            // Handle any errors here
            $errorInfo = $stmt->errorInfo();
            echo "Error: " . $errorInfo[2];
            
            // Return failure status
            return ['success' => false, 'message' => 'Failed to book appointment'];
        }
    } catch (PDOException $e) {
        // Handle any database connection errors
        echo "Database Error: " . $e->getMessage();

        // Return failure status
        return ['success' => false, 'message' => 'Database connection error'];
    }
}



function getInsuranceProviders() {
    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM providers");
        $stmt->execute();

        $providers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $providers;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

function getUserBill($userid) {
    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM billing where patient_id = ?");
        $stmt->execute([$userid]);

        $providers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $providers;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}



function fetchPrescriptionsByPatientId($userId) {
    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM prescriptions WHERE patient_id = :userId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $prescriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $prescriptions;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}



function fetchAppointmentsByPatientIdAndStatus($userId, $status) {
    // Establish a database connection (you can use the connectToDatabase function from the previous code)
    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Prepare and execute the SQL query
        $stmt = $pdo->prepare("SELECT * FROM appointments WHERE patient_id = ? AND appointment_status = ?");
        $stmt->execute([$userId, $status]);

        // Fetch all matching records as an associative array
        $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the database connection
        $pdo = null;

        return $appointments;
    } catch (PDOException $e) {
        // Handle any database query errors
        echo "Error: " . $e->getMessage();
        return []; // Return an empty array on error
    }
}

function fetchLabResults($userId) {
    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM labsandtests WHERE patient_id = :userId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $prescriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $prescriptions;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}


function medicalHistory($userId) {
    $host = "localhost";
    $dbname = "mscproject";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM medicalrecords WHERE patient_id = :userId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $prescriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $prescriptions;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}


?>






















