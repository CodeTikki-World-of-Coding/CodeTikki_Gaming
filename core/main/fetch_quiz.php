<?php
session_start();
include '../../setting.php';

$all_related_quizzes = [
    'Daily' => [],
    'Weekly' => [],
    'Monthly' => []
];

function fetch_latest_quizzes($pdo, $quiz_type) {
    $sql_latest_quiz = "SELECT quiz_id, start_date, end_date FROM quizzes WHERE quiz_type = :quiz_type ORDER BY quiz_id DESC LIMIT 1";
    $stmt_latest_quiz = $pdo->prepare($sql_latest_quiz);
    $stmt_latest_quiz->execute([':quiz_type' => $quiz_type]);

    return $stmt_latest_quiz->fetch(PDO::FETCH_ASSOC);
}

$quiz_types = ['Daily', 'Weekly', 'Monthly'];
foreach ($quiz_types as $quiz_type) {
    $latest_quiz = fetch_latest_quizzes($pdo, $quiz_type);
    
    if ($latest_quiz) {
        $quiz_code = $latest_quiz['quiz_id'];
        $start_date = $latest_quiz['start_date'];
        $end_date = $latest_quiz['end_date'];
        
        $sql_related_quizzes = "SELECT sub_quiz_id FROM sub_quiz WHERE quiz_id = :quiz_id ORDER BY sub_quiz_id DESC LIMIT 5";
        $stmt_related_quizzes = $pdo->prepare($sql_related_quizzes);
        $stmt_related_quizzes->execute([':quiz_id' => $quiz_code]);
        $related_quizzes = $stmt_related_quizzes->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($related_quizzes as &$quiz) {
            $quiz['start_date'] = $start_date;
            $quiz['end_date'] = $end_date;
        }
        
        $all_related_quizzes[$quiz_type] = $related_quizzes;
    }
}

header('Content-Type: application/json');
echo json_encode($all_related_quizzes);
?>
