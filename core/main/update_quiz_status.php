<?php
session_start();
include '../../setting.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quizId = $_POST['quiz_id'];
    $status = $_POST['status'];
    $stmt = $pdo->prepare("UPDATE quizzes SET status = :status WHERE quiz_id = :quiz_id");
    $stmt->execute(['status' => $status, 'quiz_id' => $quizId]);

    if ($stmt->rowCount()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'No rows affected']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}

?>
