<?php
session_start();
include '../../setting.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
    if (isset($_POST['subject']) && is_string($_POST['subject'])) {
        $subjects = explode(',', $_POST['subject']);
  
        if ($user_id !== null) {
                    try {
                        $stmt = $pdo->prepare("INSERT INTO WorldCupParticipant (UserId, Subject1, Subject2, Subject3, Subject4, Subject5, Subject6, Subject7, Subject8, Subject9, Subject10, Subject11) VALUES (:W_id, :Subject1 ,:Subject2, :Subject3 , :Subject4, :Subject5, :Subject6, :Subject7, :Subject8, :Subject9, :Subject10, :Subject11)");
            
                        $stmt->bindParam(':W_id', $user_id);
                        for ($i = 1; $i <= 11; $i++) {
                            $stmt->bindParam(':Subject'.$i, $subjects[$i - 1]);
                        }
                        $stmt->execute();
            
                        echo json_encode(array('success' => true, 'message' => "Data inserted successfully into WorldCup table."));
                    } catch(PDOException $e) {
                        echo "Error inserting data into WorldCup table: " . $e->getMessage();
                    }
                } else {
                    echo "User ID not found.";
                }
    }}
            
 
?> 
