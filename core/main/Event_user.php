<?php

session_start();
include '../../setting.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

function fetchEventID($eventName, $pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT EventID FROM Event WHERE EventName = :EventName ");
        $stmt->bindParam(':EventName', $eventName);
        $stmt->execute();
        $event_id = $stmt->fetchColumn();

        return $event_id;
    } catch(PDOException $e) {
        echo "Error fetching event ID: " . $e->getMessage();
        return null;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        $registrationDate = isset($_POST["RegistrationDate"]) ? $_POST["RegistrationDate"] : '';
        $eventName = isset($_POST["EventName"]) ? $_POST["EventName"] : '';

        if (!empty($registrationDate) && !empty($eventName)) {
            $event_id = fetchEventID($eventName, $pdo);
            if ($user_id !== null && $event_id !== null) {
                $stmt = $pdo->prepare("INSERT INTO EventUser (UserID, EventID, RegistrationDate) VALUES (:UserId, :EventId, :RegistrationDate)");
                $stmt->bindParam(":UserId", $user_id);
                $stmt->bindParam(":EventId", $event_id, PDO::PARAM_INT);
                $stmt->bindParam(":RegistrationDate", $registrationDate);

                if ($stmt->execute()) {
                    echo "Registration data inserted successfully!";
                } else {
                    echo "Error inserting data: " . $stmt->errorInfo()[2];
                }

                $stmt->closeCursor();
            } else {
                echo "Error: User ID or Event ID not found.";
            }
        } else {
            echo "Error: Registration date or Event name is missing or empty.";
        }
    } else {
        echo "Error: Username not found in session.";
    }
}
