<?php

session_start();
include '../../setting.php';

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$json_data = file_get_contents('php://input');
$quizSetData = json_decode($json_data);

if ($quizSetData !== null && isset($quizSetData->quiz_id) && isset($quizSetData->level)) {
    try {
        $pdo->beginTransaction();

        $quiz_id = $quizSetData->quiz_id;
        $level = sanitize($quizSetData->level);
        if ($quiz_id !== null && is_numeric($quiz_id) && $level !== null) {
            list($min_difficulty, $max_difficulty) = explode('-', $level);

            $question_ids = [];
            if (isset($quizSetData->questions) && is_array($quizSetData->questions)) {
                foreach ($quizSetData->questions as $question) {
                    $question_ids[] = sanitize($question->question_id);
                }
            }

            $question_ids_str = implode(',', $question_ids);

            $stmt = $pdo->prepare("INSERT INTO sub_quiz (quiz_id, min_difficulty, max_difficulty, question_ids) VALUES (:quiz_id, :min_difficulty, :max_difficulty, :question_ids)");
            $stmt->bindParam(':quiz_id', $quiz_id);
            $stmt->bindParam(':min_difficulty', $min_difficulty);
            $stmt->bindParam(':max_difficulty', $max_difficulty);
            $stmt->bindParam(':question_ids', $question_ids_str);
            $stmt->execute();

            $pdo->commit();

            $stmt_question = $pdo->prepare("SELECT QuestionTitle, Option1, Option2, Option3, Option4 FROM QuestionBank WHERE QuestionID IN ($question_ids_str)");
            $stmt_question->execute();
            $questions_data = $stmt_question->fetchAll(PDO::FETCH_ASSOC);

            $quiz_set_info = [
                'quiz_id' => $quiz_id,
                'level' => $level,
                'num_questions' => count($question_ids),
                'questions' => $questions_data
            ];
            echo json_encode($quiz_set_info);
        } else {
            echo "Error: Invalid quiz_id or level.";
        }
    } catch(PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Invalid data received.";
}
