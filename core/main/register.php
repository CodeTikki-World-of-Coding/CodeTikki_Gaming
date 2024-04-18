<?php
include '../../setting.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';
    $agreeTerms = isset($_POST['agreeTerms']) ? $_POST['agreeTerms'] : '';

    // Validate the form data (e.g., check if passwords match, validate email format, etc.)
    if ($password != $confirmPassword) {
        $response = ['success' => false, 'message' => "Passwords do not match."];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = ['success' => false, 'message' => "Invalid email format."];
    } elseif (!$agreeTerms) {
        $response = ['success' => false, 'message' => "Please agree to the terms and conditions."];
    } else {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Check if the username already exists in the database
            $checkUsernameStmt = $pdo->prepare("SELECT * FROM User WHERE username = :username");
            $checkUsernameStmt->bindParam(':username', $username);
            $checkUsernameStmt->execute();
            $existingUsername = $checkUsernameStmt->fetch(PDO::FETCH_ASSOC);

            if ($existingUsername) {
                $response = ['success' => false, 'message' => "Username already exists."];
            } else {
                // Insert the new user data into the database
                $insertStmt = $pdo->prepare("INSERT INTO User (username, email, password) VALUES (:username, :email, :password)");
                $insertStmt->bindParam(':username', $username);
                $insertStmt->bindParam(':email', $email);
                $insertStmt->bindParam(':password', $hashedPassword);
                $insertStmt->execute();

                $_SESSION['success_message'] = "Registration successful. You can now log in.";
                $response = ['success' => true];
                header("Location: ../../index.php");
                exit();

            }
        } catch (\PDOException $e) {
            $response = ['success' => false, 'message' => "Error: " . $e->getMessage()];
        }
    }

    // Send JSON response
    echo json_encode($response);
    exit();
}
?>
