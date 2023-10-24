<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $patient_id = $_POST["patient_id"];
    $medication_and_dosage = $_POST["medication_and_dosage"];
    $prescription_note = $_POST["prescription_note"];

    // Create a database connection (replace with your connection details)
    $host = "localhost";
    $dbname = "your_database_name";
    $username = "your_username";
    $password = "your_password";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert data into the prescriptions table (replace 'prescriptions' with your table name)
        $stmt = $pdo->prepare("INSERT INTO prescriptions (patient_id, medication_and_dosage, prescription_note) VALUES (?, ?, ?)");
        $stmt->execute([$patient_id, $medication_and_dosage, $prescription_note]);

        // Handle success or redirect to a success page
        echo "Prescriptions data inserted successfully.";
    } catch (PDOException $e) {
        // Handle database error
        echo "Error: " . $e->getMessage();
    }
}
?>
