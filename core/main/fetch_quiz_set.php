<?php
session_start();
include '../../setting.php';

// Fetch all quizzes where status = 1 from quizzes table
$sql_select_quizzes = "SELECT quiz_id, quiz_type, start_date, end_date FROM quizzes WHERE status = 1";
$stmt_select_quizzes = $pdo->query($sql_select_quizzes);
$quiz_data = $stmt_select_quizzes->fetchAll(PDO::FETCH_ASSOC);

if ($quiz_data) {
    $result = [];

    // Loop through each quiz and fetch related sub_quiz data
    foreach ($quiz_data as $quiz) {
        $quiz_id = $quiz['quiz_id'];

        // Fetch sub_quiz_id data from sub_quiz table based on the selected quiz_id
        $sql_select_sub_quiz = "SELECT sub_quiz_id FROM sub_quiz WHERE quiz_id = :quiz_id";
        $stmt_select_sub_quiz = $pdo->prepare($sql_select_sub_quiz);
        $stmt_select_sub_quiz->execute([':quiz_id' => $quiz_id]);
        $sub_quiz_data = $stmt_select_sub_quiz->fetchAll(PDO::FETCH_ASSOC);

        // Combine quiz data and sub quiz data into a single array for each quiz
        $combined_data = [
            'quiz_data' => $quiz,
            'sub_quiz_data' => $sub_quiz_data
        ];

        // Add the combined data to the result array
        $result[] = $combined_data;
    }

    // Send the result array as JSON response
    header('Content-Type: application/json');
    echo json_encode($result);
} else {
    echo json_encode(['error' => 'No quizzes with status 1 found.']);
}
?>
