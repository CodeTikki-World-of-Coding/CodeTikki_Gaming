<?php
session_start();
include '../../setting.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the date parameter is set and not empty
    if (isset($_POST["date"]) && !empty($_POST["date"])) {
        $registrationDate = $_POST["date"];

        // Prepare an SQL statement to insert data into the EventUser table
        $stmt = $pdo->prepare("INSERT INTO EventUser (RegistrationDate) VALUES (:RegistrationDate)");
        $stmt->bindParam(":RegistrationDate", $registrationDate);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Registration data inserted successfully!";
        } else {
            echo "Error inserting data: " . $stmt->errorInfo()[2];
        }

        // Close the statement
        $stmt->closeCursor();
    } else {
        echo "Error: Registration date is missing or empty.";
    }
}

?>