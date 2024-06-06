<?php
session_start();
include '../../setting.php';

// Fetch the latest quiz from the quizzes table
$sql_latest_quiz = "SELECT quiz_id, start_date, end_date FROM quizzes ORDER BY quiz_id DESC LIMIT 1";
$stmt_latest_quiz = $pdo->query($sql_latest_quiz);
if ($stmt_latest_quiz->rowCount() > 0) {
    $latest_quiz = $stmt_latest_quiz->fetch();
    
    // Assuming 'quiz_id' is the common field to link quizzes and sub_quiz tables
    $quiz_code = $latest_quiz['quiz_id'];
    $start_date = $latest_quiz['start_date'];
    $end_date = $latest_quiz['end_date'];
    
    // Fetch all related quiz sets from the sub_quiz table based on the latest quiz
    $sql_related_quizzes = "SELECT sub_quiz_id FROM sub_quiz WHERE quiz_id = :quiz_id";
    $stmt_related_quizzes = $pdo->prepare($sql_related_quizzes);
    $stmt_related_quizzes->execute([':quiz_id' => $quiz_code]);

    $related_quizzes = $stmt_related_quizzes->fetchAll(PDO::FETCH_ASSOC);

    // Add start_date and end_date to each sub_quiz item
    foreach ($related_quizzes as &$quiz) {
        $quiz['start_date'] = $start_date;
        $quiz['end_date'] = $end_date;
    }

    header('Content-Type: application/json');
    echo json_encode($related_quizzes);
} else {
    echo json_encode([]);
}

// Close the PDO connection
?>
