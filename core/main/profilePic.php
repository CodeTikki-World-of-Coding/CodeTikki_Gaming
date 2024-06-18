<?php

session_start();
include '../../setting.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if (isset($_POST['image']) && !empty($_POST['image'])) {
    $imageData = $_POST['image'];

    $imageData = str_replace('data:image/png;base64,', '', $imageData);

    $decodedImage = base64_decode($imageData);

    $imageName = 'cropped-image-' . uniqid() . '.png';

    $uploadDirectory = 'uploads/';

    if (file_put_contents($uploadDirectory . $imageName, $decodedImage)) {
        $profileURL = $uploadDirectory . $imageName;

        $sql = "UPDATE User SET UserProfileImage = :profile_url WHERE id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['profile_url' => $profileURL, 'user_id' => $user_id]);

        echo $profileURL;
    } else {
        http_response_code(500);
        echo 'Error: Failed to save the image.';
    }
} else {
    http_response_code(400); // Bad request
    echo 'Error: Image data not received.';
}
