<?php
// session_start();
// include '../../setting.php';

// function fetchUserID($name, $pdo) {
//     try {
//         $stmt = $pdo->prepare("SELECT Id FROM User WHERE username = :username ");
//         $stmt->bindParam(':username', $name);
//         $stmt->execute();
//         $user_id = $stmt->fetchColumn();
//         return $user_id;
//     } catch(PDOException $e) {
//         echo "Error fetching user ID: " . $e->getMessage();
//         return null;
//     }
// }

// function fetchEventID($eventName, $pdo) {
//     try {
//         $stmt = $pdo->prepare("SELECT EventID FROM Event WHERE EventName = :EventName ");
//         $stmt->bindParam(':EventName', $eventName);
//         $stmt->execute();
//         $event_id = $stmt->fetchColumn();
      
//         return $event_id;
//     } catch(PDOException $e) {
//         echo "Error fetching event ID: " . $e->getMessage();
//         return null;
//     }
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Check if the session variables are set and not empty
//     if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
//         $registrationDate = isset($_POST["date"]) ? $_POST["date"] : '';
//         $eventName = isset($_POST["EventName"]) ? $_POST["EventName"] : '';
        
//         // Check if the registration date and event name are provided
//         if (!empty($registrationDate) && !empty($eventName)) {
//             // Fetch user ID and event ID using the functions
//             $user_id = fetchUserID($_SESSION['username'], $pdo);
//             $event_id = fetchEventID($eventName, $pdo);
           
//              // Check if user ID and event ID were fetched successfully
//             if ($user_id !== null && $event_id !== null) {

//                 // Prepare an SQL statement to insert data into the EventUser table
//                 $stmt = $pdo->prepare("INSERT INTO EventUser (UserID, EventID, RegistrationDate) VALUES (:UserId, :EventId, :RegistrationDate)");
//                 $stmt->bindParam(":UserId", $user_id);
//                 $stmt->bindParam(":EventId", $event_id, PDO::PARAM_INT); // Specify the parameter type as integer
//                 $stmt->bindParam(":RegistrationDate", $registrationDate);

//                 // Execute the statement
//                 if ($stmt->execute()) {
//                     echo "Registration data inserted successfully!";
//                 } else {
//                     echo "Error inserting data: " . $stmt->errorInfo()[2];
//                 }

//                 // Close the statement
//                 $stmt->closeCursor();
//             } else {
//                 echo "Error: User ID or Event ID not found.";
//             }
//         } else {
//             echo "Error: Registration date or Event name is missing or empty.";
//         }
//     } else {
//         echo "Error: Username not found in session.";
//     }
// }
session_start();
include '../../setting.php';

function fetchUserID($name, $pdo) {
    try {
        $stmt = $pdo->prepare("SELECT Id FROM User WHERE username = :username ");
        $stmt->bindParam(':username', $name);
        $stmt->execute();
        $user_id = $stmt->fetchColumn();
        return $user_id;
    } catch(PDOException $e) {
        echo "Error fetching user ID: " . $e->getMessage();
        return null;
    }
}

function fetchEventID($eventName, $pdo) {
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
    // Check if the session variables are set and not empty
    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
        $registrationDate = isset($_POST["RegistrationDate"]) ? $_POST["RegistrationDate"] : '';
        $eventName = isset($_POST["EventName"]) ? $_POST["EventName"] : '';
        
        // Check if the registration date and event name are provided
        if (!empty($registrationDate) && !empty($eventName)) {
            // Fetch user ID and event ID using the functions
            $user_id = fetchUserID($_SESSION['username'], $pdo);
            $event_id = fetchEventID($eventName, $pdo);
           
             // Check if user ID and event ID were fetched successfully
            if ($user_id !== null && $event_id !== null) {

                // Prepare an SQL statement to insert data into the EventUser table
                $stmt = $pdo->prepare("INSERT INTO EventUser (UserID, EventID, RegistrationDate) VALUES (:UserId, :EventId, :RegistrationDate)");
                $stmt->bindParam(":UserId", $user_id);
                $stmt->bindParam(":EventId", $event_id, PDO::PARAM_INT); // Specify the parameter type as integer
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
                echo "Error: User ID or Event ID not found.";
            }
        } else {
            echo "Error: Registration date or Event name is missing or empty.";
        }
    } else {
        echo "Error: Username not found in session.";
    }
}

?>