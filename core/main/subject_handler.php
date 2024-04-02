<?php
session_start();
include '../../setting.php';

//Function to fetch user ID based on session data
function fetchUserID($name, $EmailID, $pdo) {
    try {
        $stmt = $pdo->prepare("SELECT Id FROM User WHERE username = :username AND email = :email");
        $stmt->execute([$name, $EmailID]);
        $user_id = $stmt->fetchColumn();
        return $user_id;
    } catch(PDOException $e) {
        echo "Error fetching user ID: " . $e->getMessage();
        return null;
    }
}
//for inserted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Retrieve session data
//     $name = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
//     $EmailID = isset($_SESSION['mailid']) ? $_SESSION['mailid'] : '';

//     // Check if $_POST['subject'] is an array
//     if (isset($_POST['subject']) && is_string($_POST['subject'])) {
//         // Assign the array of subjects to $subjects
//         $subjects = explode(',', $_POST['subject']);

//         // Fetch user ID based on session data
//         $user_id = fetchUserID($name, $EmailID, $pdo);
//         if ($user_id !== null) {
//                     try {
//                         // Prepare the SQL statement to insert data into the WorldCup table
//                         $stmt = $pdo->prepare("INSERT INTO WorldCupParticipant (UserId, Subject1, Subject2, Subject3, Subject4, Subject5, Subject6, Subject7, Subject8, Subject9, Subject10, Subject11) VALUES (:W_id, :Subject1 ,:Subject2, :Subject3 , :Subject4, :Subject5, :Subject6, :Subject7, :Subject8, :Subject9, :Subject10, :Subject11)");
            
//                         // Bind parameters
//                         $stmt->bindParam(':W_id', $user_id);
//                         for ($i = 1; $i <= 11; $i++) {
//                                             // Bind the subject value to the corresponding parameter
//                                             $stmt->bindParam(':Subject'.$i, $subjects[$i - 1]);
//                                         }
            
            
            
//                         // Execute the statement
//                         $stmt->execute();
            
//                         echo json_encode(array('success' => true, 'message' => "Data inserted successfully into WorldCup table."));
//                     } catch(PDOException $e) {
//                         echo "Error inserting data into WorldCup table: " . $e->getMessage();
//                     }
//                 } else {
//                     echo "User ID not found.";
//                 }
//     }}
            
//for update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve session data
    $name = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
    $EmailID = isset($_SESSION['mailid']) ? $_SESSION['mailid'] : '';

    // Check if $_POST['subject'] is an array
    if (isset($_POST['subject']) && is_string($_POST['subject'])) {
        // Assign the array of subjects to $subjects
        $subjects = explode(',', $_POST['subject']);

        // Fetch user ID based on session data
        $user_id = fetchUserID($name, $EmailID, $pdo);
        print_r($user_id);
        exit();

        try {
            if ($user_id !== null) {
                // Prepare the SQL statement to update data in the WorldCup table
                $stmt = $pdo->prepare("UPDATE WorldCupParticipant 
                                       SET Subject1 = :Subject1, Subject2 = :Subject2, Subject3 = :Subject3, 
                                           Subject4 = :Subject4, Subject5 = :Subject5, Subject6 = :Subject6, 
                                           Subject7 = :Subject7, Subject8 = :Subject8, Subject9 = :Subject9, 
                                           Subject10 = :Subject10, Subject11 = :Subject11 
                                       WHERE UserId = :W_id");
            } else {
                // Prepare the SQL statement to insert data into the WorldCup table
                $stmt = $pdo->prepare("INSERT INTO WorldCupParticipant (UserId, Subject1, Subject2, Subject3, Subject4, Subject5, Subject6, Subject7, Subject8, Subject9, Subject10, Subject11) 
                                       VALUES (:W_id, :Subject1 ,:Subject2, :Subject3 , :Subject4, :Subject5, :Subject6, :Subject7, :Subject8, :Subject9, :Subject10, :Subject11)");

        }

            // Bind parameters
              if ($user_id !== null) {
                $stmt->bindParam(':W_id', $user_id);

         }

            // Bind parameters for subjects using a loop
            for ($i = 1; $i <= 11; $i++) {
                                                            // Bind the subject value to the corresponding parameter
                $stmt->bindParam(':Subject'.$i, $subjects[$i - 1]);
                                                        }
                            
            // Execute the statement
            $stmt->execute();

            // Determine success message based on whether an insert or update operation was performed
            if ($stmt->rowCount() > 0) {
                if ($user_id !== null) {
                    echo json_encode(array('success' => true, 'message' => "Data updated successfully in WorldCup table."));
                } else {
                    echo json_encode(array('success' => true, 'message' => "Data inserted successfully into WorldCup table."));
                }
            } else {
                echo "No changes made to the database.";
            }
        } catch(PDOException $e) {
            echo "Error updating/inserting data into WorldCup table: " . $e->getMessage();
        }
    } else {
        echo "Debugging: ";
        var_dump($_POST['subject']);
        echo "No subjects selected or invalid data received.";
    }
}

   
?> 
