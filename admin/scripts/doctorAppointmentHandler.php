<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $patient_id = $_POST["patient_id"];
    $note = $_POST["note"];
    $malaria = isset($_POST["malaria"]) ? 1 : 0;
    $fullbloodcount = isset($_POST["fullbloodcount"]) ? 1 : 0;
    $hepatitis = isset($_POST["hepatitis"]) ? 1 : 0;

    // Create a database connection (replace with your connection details)
    $host = "localhost";
    $dbname = "your_database_name";
    $username = "your_username";
    $password = "your_password";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert data into the appointment table (replace 'appointments' with your table name)
        $stmt = $pdo->prepare("INSERT INTO appointments (patient_id, note, malaria, fullbloodcount, hepatitis) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$patient_id, $note, $malaria, $fullbloodcount, $hepatitis]);

        // Handle success or redirect to a success page
        echo "Appointment data inserted successfully.";
    } catch (PDOException $e) {
        // Handle database error
        echo "Error: " . $e->getMessage();
    }
}
?>
