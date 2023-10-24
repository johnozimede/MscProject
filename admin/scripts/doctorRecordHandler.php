<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $patient_id = $_POST["patient_id"];
    $diagnosis = $_POST["diagnosis"];
    $medication = $_POST["medication"];
    $medical_note = $_POST["medical_note"];

    // Create a database connection (replace with your connection details)
    $host = "localhost";
    $dbname = "your_database_name";
    $username = "your_username";
    $password = "your_password";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert data into the medical_recommendation table (replace 'medical_recommendation' with your table name)
        $stmt = $pdo->prepare("INSERT INTO medical_recommendation (patient_id, diagnosis, medication, medical_note) VALUES (?, ?, ?, ?)");
        $stmt->execute([$patient_id, $diagnosis, $medication, $medical_note]);

        // Handle success or redirect to a success page
        echo "Medical Recommendation data inserted successfully.";
    } catch (PDOException $e) {
        // Handle database error
        echo "Error: " . $e->getMessage();
    }
}
?>
