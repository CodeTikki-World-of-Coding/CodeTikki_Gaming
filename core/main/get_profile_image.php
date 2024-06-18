<?php

session_start();
include '../../setting.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

$sql = "SELECT UserProfileImage FROM User WHERE id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    echo $row['UserProfileImage'];
} else {
    echo 'Error: Profile image not found.';
}
