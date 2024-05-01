<?php
session_start();
include '../../setting.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['questionId']) || empty($_POST['questionTitle']) || empty($_POST['option1']) || empty($_POST['option2']) || empty($_POST['option3']) || empty($_POST['option4'])|| empty($_POST['correctAnswere'])) {
        echo json_encode(array('success' => false, 'message' => 'All fields are required'));
        exit;
    }

    $questionId = $_POST['questionId'];
    $questionTitle = $_POST['questionTitle'];
    $level = $_POST['questionLevel'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correctAnswere=$_POST['correctAnswere'];
    $stmt = $pdo->prepare("UPDATE QuestionBank SET QuestionTitle = :questionTitle,Level = :level, Option1 = :option1, Option2 = :option2, Option3 = :option3, Option4 = :option4, CorrectAnswer = :correctAnswere WHERE QuestionId = :questionId");

    $stmt->bindParam(':questionTitle', $questionTitle);
    $stmt->bindParam(':level', $level);
    $stmt->bindParam(':option1', $option1);
    $stmt->bindParam(':option2', $option2);
    $stmt->bindParam(':option3', $option3);
    $stmt->bindParam(':option4', $option4);
    $stmt->bindParam(':correctAnswere', $correctAnswere);
    $stmt->bindParam(':questionId', $questionId);

    if ($stmt->execute()) {
        echo json_encode(array('success' => true, 'message' => 'Question updated successfully'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to update question'));
    }
}
?>
