<?php
session_start();
include '../../setting.php';

try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("INSERT INTO quizzes (num_questions,total_score) VALUES (:num_questions,:total_score)");
    $stmt->bindValue(':num_questions', 10); 
    $stmt->bindValue(':total_score', 100); 
    $stmt->execute();

    $quizId = $pdo->lastInsertId();

    $pdo->commit();

    echo $quizId; 
} catch(PDOException $e) {
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
