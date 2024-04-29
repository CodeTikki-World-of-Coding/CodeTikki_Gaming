<?php
session_start();
include '../../setting.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($user_id)) {
        try {
            $stmt = $pdo->prepare("SELECT name, username FROM User WHERE Id = :userId");
            $stmt->bindParam(':userId', $user_id);
            $stmt->execute();
            $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user_info !== false) {
                $display_name = $user_info['name'] !== null ? $user_info['name'] : $user_info['username'];
                
                echo json_encode(['name' => $display_name, 'username' => $user_info['username']]);
            } else {
                echo json_encode(['username' => '']);
            }
        } catch(PDOException $e) {
            // Log the error or output it for debugging
            echo json_encode(['error' => 'Error fetching user info: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'User ID not found in session.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
