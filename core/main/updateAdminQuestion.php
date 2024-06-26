<?php

session_start();
include '../../setting.php';
$json_input = file_get_contents('php://input');

$data = json_decode($json_input, true); 

$minLevel = isset($_POST['minLevel']) ? $_POST['minLevel'] : 0;
$maxLevel = isset($_POST['maxLevel']) ? $_POST['maxLevel'] : 1000;
$creator = isset($_POST['creator']) ? $_POST['creator'] : '';
$sortBy = isset($_POST['sortBy']) ? $_POST['sortBy'] : 'asc';

try {
    
    $queryQuestions = "SELECT qb.QuestionID, qb.QuestionTitle, qb.Option1, qb.Option2, qb.Option3, qb.Option4, qb.CorrectAnswer, qb.Level, u.Username
              FROM QuestionBank qb
              LEFT JOIN User u ON qb.UserID = u.Id
              WHERE 1=1";

    if ($creator !== '') {
        $queryQuestions .= " AND u.Username = :username";
    }

    $queryQuestions .= " AND qb.Level >= :minLevel AND qb.Level <= :maxLevel";

    if ($sortBy === 'asc') {
        $queryQuestions .= " ORDER BY qb.Level ASC";
    } else {
        $queryQuestions .= " ORDER BY qb.Level DESC";
    }

    $stmtQuestions = $pdo->prepare($queryQuestions);

    $stmtQuestions->bindParam(':minLevel', $minLevel, PDO::PARAM_INT);
    $stmtQuestions->bindParam(':maxLevel', $maxLevel, PDO::PARAM_INT);
    if ($creator !== '') {
        $stmtQuestions->bindParam(':username', $creator, PDO::PARAM_STR);
    }

    $stmtQuestions->execute();

    $questions = $stmtQuestions->fetchAll(PDO::FETCH_ASSOC);


foreach ($questions as &$question) {
    $correctAnswer = $question['CorrectAnswer'];
    $options = array(
        array('text' => $question['Option1'], 'isCorrect' => ($question['Option1'] === $correctAnswer)),
        array('text' => $question['Option2'], 'isCorrect' => ($question['Option2'] === $correctAnswer)),
        array('text' => $question['Option3'], 'isCorrect' => ($question['Option3'] === $correctAnswer)),
        array('text' => $question['Option4'], 'isCorrect' => ($question['Option4'] === $correctAnswer))
    );
    $question['Options'] = $options;
}

    $uniqueCreators = array_unique(array_column($questions, 'Username'));

    header('Content-Type: application/json');
    echo json_encode(['questions' => $questions, 'creators' => $uniqueCreators]);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
