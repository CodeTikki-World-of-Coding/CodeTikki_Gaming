<?php

session_start();
include '../../setting.php';


$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
if ($user_id !== null) {

    try {

        $stmt = $pdo->prepare("SELECT name, username, email, Gender, Country FROM User WHERE Id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        // Fetch the data
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        // Return the data as JSON
        echo json_encode($data);
    } catch(PDOException $e) {
        echo json_encode(array('success' => false, 'message' => 'Error fetching data from database: ' . $e->getMessage()));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'User ID not found.'));
}
