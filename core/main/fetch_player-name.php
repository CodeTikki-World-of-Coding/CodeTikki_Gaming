<?php
session_start();
include '../../setting.php';

// Function to fetch user name and username from the database based on the username
function fetchUserInfo($username, $pdo) {
    try {
        $stmt = $pdo->prepare("SELECT name, username FROM User WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user_info = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user info was fetched successfully
        if ($user_info !== false) {
            // Use the name if it's not null; otherwise, use the username
            $display_name = $user_info['name'] !== null ? $user_info['name'] : $user_info['username'];

            // Return user info as JSON response
            echo json_encode(['name' => $display_name, 'username' => $user_info['username']]);
        } else {
            // Fallback to username if user info is not found
            echo json_encode(['username' => $username]);
        }
    } catch(PDOException $e) {
        // Log the error or output it for debugging
        echo json_encode(['error' => 'Error fetching user info: ' . $e->getMessage()]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the session variables are set and not empty
    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
        // Fetch user info using the fetchUserInfo function
        fetchUserInfo($_SESSION['username'], $pdo);
    } else {
        echo json_encode(['error' => 'Username not found in session.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
