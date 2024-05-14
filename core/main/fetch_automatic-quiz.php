<?php
session_start();
include '../../setting.php';
// Assuming you have a database connection established already

// Fetch all questions from the QuestionBank table
$query = "SELECT QuestionID, QuestionTitle,Pseudocode,Option1,Option2,Option3,Option4,CorrectAnswer,Level FROM QuestionBank";
$result = $pdo->query($query);

if ($result) {
    $questions = $result->fetchAll(PDO::FETCH_ASSOC);
    // Return the questions as JSON data
    echo json_encode($questions);
} else {
    // Handle error if query fails
    echo json_encode(array('error' => 'Failed to fetch questions.'));
}
?>
