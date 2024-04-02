<?php
session_start();
include '../../setting.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $phoneNumber = isset($_POST['phone']) ? $_POST['phone'] : '';
 // Handle form submission
     $name = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
     $EmailID = isset($_SESSION['mailid']) ? $_SESSION['mailid'] : '';
    // $phoneNumber = isset($_SESSION['phoneNumber']) ? $_SESSION['phoneNumber'] : '';
      
    try{
        $sql = "UPDATE User SET W_NUM = :W_NUM WHERE username = :username AND email = :email";
        $stmt = $pdo->prepare($sql);

        // Insert data into the database
        // $stmt = $pdo->prepare("INSERT INTO User (W_NUM) VALUES (:W_NUM)");
         $stmt->bindParam(':W_NUM', $phoneNumber);
         $stmt->bindParam(':username', $name);
         $stmt->bindParam(':email', $EmailID);
         $stmt->execute();

         if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No matching records found.']);
        }
        // $stmt->execute();
        //echo "Data inserted successfully";
    } catch (\PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>
