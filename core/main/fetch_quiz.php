<?php

session_start();
include '../../setting.php';

$all_related_quizzes = [
    'Daily' => [],
    'Weekly' => [],
    'Monthly' => []
];

function fetch_latest_quizzes($pdo, $quiz_type) {
    $sql_latest_quiz = "SELECT quiz_id, start_date, end_date, quiz_type, status FROM quizzes WHERE quiz_type = :quiz_type ORDER BY quiz_id DESC LIMIT 5";
    $stmt_latest_quiz = $pdo->prepare($sql_latest_quiz);
    $stmt_latest_quiz->execute([':quiz_type' => $quiz_type]);

    return $stmt_latest_quiz->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows, not just one
}

$quiz_types = ['Daily', 'Weekly', 'Monthly'];
foreach ($quiz_types as $quiz_type) {
    $latest_quizzes = fetch_latest_quizzes($pdo, $quiz_type);
    
    if ($latest_quizzes) {
        $all_related_quizzes[$quiz_type] = $latest_quizzes;
    }
}

header('Content-Type: application/json');
echo json_encode($all_related_quizzes);

?>
