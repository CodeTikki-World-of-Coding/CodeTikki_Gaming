<?php

session_start();
include '../../setting.php';

// try {
//     $pdo->beginTransaction();

//     $stmt = $pdo->prepare("INSERT INTO quizzes (num_questions,total_score) VALUES (:num_questions,:total_score)");
//     $stmt->bindValue(':num_questions', 10);
//     $stmt->bindValue(':total_score', 100);
//     $stmt->execute();

//     $quizId = $pdo->lastInsertId();

//     $pdo->commit();

//     echo $quizId;
// } catch(PDOException $e) {
//     $pdo->rollBack();
//     echo "Error: " . $e->getMessage();
// }
try {
    $pdo->beginTransaction();

    $start_date = date('Y-m-d ', strtotime('+1 day'));
    $end_date = date('Y-m-d ', strtotime('+2 days'));

    $stmt = $pdo->prepare("INSERT INTO quizzes (num_questions, total_score, start_date, end_date,quiz_type) VALUES (:num_questions, :total_score, :start_date, :end_date,:quiz_type)");
    $stmt->bindValue(':num_questions', 20);
    $stmt->bindValue(':total_score', 100);
    $stmt->bindValue(':start_date', $start_date);
    $stmt->bindValue(':end_date', $end_date);
    $stmt->bindValue(':quiz_type', 'Weekly');
    $stmt->execute();

    $quizId = $pdo->lastInsertId();

    $pdo->commit();
    echo $quizId;
    // echo json_encode(['quiz_id' => $quizId, 'start_date' => $start_date, 'end_date' => $end_date]);
} catch(PDOException $e) {
    $pdo->rollBack();
    echo json_encode(['error' => $e->getMessage()]);
}
