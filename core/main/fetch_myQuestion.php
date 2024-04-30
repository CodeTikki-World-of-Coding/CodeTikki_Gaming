<?php
session_start();
include '../../setting.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

$stmt = $pdo->prepare("SELECT QuestionId, QuestionTitle, Level FROM QuestionBank WHERE UserId=:userid ORDER BY QuestionId DESC");

$stmt->bindParam(':userid', $user_id);
$stmt->execute();

$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($questions) {
    echo "<table border='1'>";
    echo "<tr><th>Question ID</th><th>Question Title</th><th>Level</th><th></th></tr>";
    foreach ($questions as $question) {
        echo "<tr>";
        echo "<td>".$question['QuestionId']."</td>";
        echo "<td>".$question['QuestionTitle']."</td>";
        echo "<td>".$question['Level']."</td>";
        echo "<td><button class='edit-button' data-question-id='".$question['QuestionId']."'>Edit</button></td>"; // Add class and data attribute

        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No questions found.";
}
?>
