<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $userid = isset($_POST['text']) ? $_POST['text'] : '';
    $mailid = isset($_POST['email']) ? $_POST['email'] : '';
    try {
        // Verify data in the database
        $verifyStmt = $pdo->prepare("SELECT * FROM User WHERE username = :username AND email = :email");
        $verifyStmt->bindParam(':username', $userid);
        $verifyStmt->bindParam(':email', $mailid);
        $verifyStmt->execute();
        $result = $verifyStmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            // Data exists in the database, store in session variables
            $_SESSION['user_id'] = $userid;
            $_SESSION['mail_id'] = $mailid;
            // Redirect to the next page
            header("Location: world-cup.php");
            exit();
        } else {
            echo "Data not found in the database";
        }
    } catch (\PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

 <!-- <?php
// session_start();
// include 'setting.php';
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $userid = isset($_POST['text']) ? $_POST['text'] : '';
//     $mailid = isset($_POST['email']) ? $_POST['email'] : '';
//     $_SESSION['userid'] = $userid;
//     $_SESSION['mailid'] = $mailid;
//}
    // try {
    //     // Verify data in the database
    //     $verifyStmt = $pdo->prepare("SELECT * FROM User WHERE username = :username AND email = :email");
    //     $verifyStmt->bindParam(':username', $userid);
    //     $verifyStmt->bindParam(':email', $mailid);
    //     $verifyStmt->execute();
    //     $result = $verifyStmt->fetch(PDO::FETCH_ASSOC);

    //     if ($result) {
    //         // Data exists in the database, you can proceed with further action
    //         echo "Data verified successfully";
    //     } else {
    //         // Data does not exist in the database, handle accordingly
    //         echo "Data not found in the database";
    //     }

    // } catch (\PDOException $e) {
    //     echo "Error: " . $e->getMessage();
    // }


//}


?> -->
