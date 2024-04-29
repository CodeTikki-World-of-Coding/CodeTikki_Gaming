<?php
session_start();
include '../../setting.php';
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
//     $phoneNumber = isset($_POST['phone']) ? $_POST['phone'] : '';
//  // Handle form submission
//      $userId = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
//     //  $EmailID = isset($_SESSION['mailid']) ? $_SESSION['mailid'] : '';
//     // $phoneNumber = isset($_SESSION['phoneNumber']) ? $_SESSION['phoneNumber'] : '';
      
//     try{
//         $sql = "UPDATE User SET W_NUM = :W_NUM WHERE Id = :userid";
//         $stmt = $pdo->prepare($sql);

//         // Insert data into the database
//         // $stmt = $pdo->prepare("INSERT INTO User (W_NUM) VALUES (:W_NUM)");
//          $stmt->bindParam(':W_NUM', $phoneNumber);
//          $stmt->bindParam(':userid', $userId);
//          $stmt->execute();
//          if ($stmt->rowCount() > 0) {
//             echo json_encode(['success' => true]);
//         } else {
//             echo json_encode(['success' => false, 'message' => 'No matching records found.']);
//         }
//         // $stmt->execute();
//         //echo "Data inserted successfully";
//     } catch (\PDOException $e) {
//         echo "Error: " . $e->getMessage();
//     }
// }

// Check if user ID is set in the session
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if ($user_id !== null) {
    // Collect data from POST request
    $phoneNumber = isset($_POST['phone']) ? $_POST['phone'] : '';
    try {
        // Prepare and execute the update query
        $stmt = $pdo->prepare("UPDATE User SET 
            W_NUM = :W_NUM
            WHERE Id = :user_id");
        if ($phoneNumber === '') {
            $stmt->bindValue(':W_NUM', null, PDO::PARAM_NULL); // Set to NULL if empty
        } else {
            $stmt->bindParam(':W_NUM', $phoneNumber, PDO::PARAM_INT); 
        }

        $stmt->bindParam(':user_id', $user_id);

        $stmt->execute();
        // Respond with success message
        echo json_encode(array('success' => true, 'message' => 'Profile updated successfully.'));
    } catch(PDOException $e) {
        // Handle database error
        echo json_encode(array('success' => false, 'message' => 'Error updating profile: ' . $e->getMessage()));
    }
} else {
    // Respond if user ID is not found
    echo json_encode(array('success' => false, 'message' => 'User ID not found.'));
}

?>

