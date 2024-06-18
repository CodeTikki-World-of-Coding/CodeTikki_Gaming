<?php

session_start();
include '../../setting.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

$stmt = $pdo->prepare("SELECT QuestionId, QuestionTitle, Level ,CreateDate FROM QuestionBank WHERE UserId=:userid ORDER BY QuestionId DESC");

$stmt->bindParam(':userid', $user_id);
$stmt->execute();

$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $totalQuestions = count($questions); // Calculate total questions

// echo "<script>";
// echo "const totalQuestions = $totalQuestions;"; // Output total questions as JavaScript variable
// echo "</script>";


if ($questions) {
    echo "<table border='1'>";
    echo "<tr><th width='8%' >Question ID</th><th width='48%'>Question Title</th><th>Level</th><th>Status</th><th>Payment</th><th>Date</th><th></th></tr>";
    foreach ($questions as $question) {
        echo "<tr>";
        echo "<td>".$question['QuestionId']."</td>";
        echo "<td>".$question['QuestionTitle']."</td>";
        echo "<td>".$question['Level']."</td>";
        echo "<td>".''."</td>";
        echo "<td>".''."</td>";
        echo "<td>".$question['CreateDate']."</td>";
        echo "<td><button class='edit-button' data-question-id='".$question['QuestionId']."'>Edit</button></td>"; // Add class and data attribute

        echo "</tr>";
    }
    echo "</table>";

} else {
    echo "No questions found.";
}
