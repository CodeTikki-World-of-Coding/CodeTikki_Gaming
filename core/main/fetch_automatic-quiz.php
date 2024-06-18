<?php

session_start();
include '../../setting.php';

$query = "SELECT QuestionID, QuestionTitle,Pseudocode,Option1,Option2,Option3,Option4,CorrectAnswer,Level FROM QuestionBank";
$result = $pdo->query($query);

if ($result) {
    $questions = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($questions);
} else {
    echo json_encode(array('error' => 'Failed to fetch questions.'));
}
