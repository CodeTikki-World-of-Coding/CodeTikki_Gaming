<?php
session_start();
include '../../setting.php';

// Check if user ID is set in the session
$user_id = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';

if ($user_id !== null) {
    // Collect data from POST request
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : null;
   
    // $address = isset($_POST['address']) ? $_POST['address'] : '';
    // $city = isset($_POST['city']) ? $_POST['city'] : '';
    // $state = isset($_POST['state']) ? $_POST['state'] : '';
    // $zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : '';
    // $linkdin = isset($_POST['linkdin']) ? $_POST['linkdin'] : '';
    // $facebook = isset($_POST['facebook']) ? $_POST['facebook'] : '';
    // $twitter = isset($_POST['twitter']) ? $_POST['twitter'] : '';
    // $tikkiality = isset($_POST['tikkiality']) ? $_POST['tikkiality'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $country = isset($_POST['country']) ? $_POST['country'] : null;
    try {
        // Prepare and execute the update query
        $stmt = $pdo->prepare("UPDATE User SET 
            name = :name,
            W_NUM = :W_NUM,
            Gender = :gender,
            Country = :country
            WHERE Id = :user_id");
        if ($phoneNumber === '') {
            $stmt->bindValue(':W_NUM', null, PDO::PARAM_NULL); // Set to NULL if empty
        } else {
            $stmt->bindParam(':W_NUM', $phoneNumber, PDO::PARAM_INT); 
        }

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':country', $country);
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
