<?php
session_start();
include '../../setting.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['questionId']) || empty($_POST['questionTitle']) || empty($_POST['option1']) || empty($_POST['option2']) || empty($_POST['option3']) || empty($_POST['option4'])) {
        echo json_encode(array('success' => false, 'message' => 'All fields are required'));
        exit;
    }

    // Retrieve form data
    $questionId = $_POST['questionId'];
    $questionTitle = $_POST['questionTitle'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    // Prepare and execute the SQL UPDATE statement
    $stmt = $pdo->prepare("UPDATE QuestionBank SET QuestionTitle = :questionTitle, Option1 = :option1, Option2 = :option2, Option3 = :option3, Option4 = :option4 WHERE QuestionId = :questionId");

    $stmt->bindParam(':questionTitle', $questionTitle);
    $stmt->bindParam(':option1', $option1);
    $stmt->bindParam(':option2', $option2);
    $stmt->bindParam(':option3', $option3);
    $stmt->bindParam(':option4', $option4);
    $stmt->bindParam(':questionId', $questionId);

    if ($stmt->execute()) {
        // Update successful
        echo json_encode(array('success' => true, 'message' => 'Question updated successfully'));
    } else {
        // Update failed
        echo json_encode(array('success' => false, 'message' => 'Failed to update question'));
    }
}
?>
