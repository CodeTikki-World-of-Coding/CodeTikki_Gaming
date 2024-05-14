<?php

// session_start();
// include '../../setting.php';

// // Function to sanitize input data
// function sanitize($data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

// // Assuming you receive JSON data from the frontend
// $json_data = file_get_contents('php://input');
// $quiz_data = json_decode($json_data);

// if ($quiz_data !== null) {
//     try {
//         // Start a transaction
//         $pdo->beginTransaction();

//         // Insert quiz set data into 'quizzes' table
//         $num_questions = $quiz_data->num_questions;
//         $stmt = $pdo->prepare("INSERT INTO quizzes (num_questions) VALUES (:num_questions)");
//         $stmt->bindParam(':num_questions', $num_questions);
//         $stmt->execute();

//         // Get the last inserted quiz ID
//         $quiz_id = $pdo->lastInsertId();

//         // Insert quiz set data into 'sub_quiz' table
//         $min_difficulty = 0; // Assuming default minimum difficulty
//         $max_difficulty = 200; // Assuming default maximum difficulty

//         // Create an array of question IDs
//         $question_ids = [];
//         if (isset($quiz_data->questions) && is_array($quiz_data->questions)) {
//             foreach ($quiz_data->questions as $question) {
//                 $question_ids[] = sanitize($question->question_id);
//             }
//         }

//         $question_ids_str = implode(',', $question_ids);

//         $stmt = $pdo->prepare("INSERT INTO sub_quiz (quiz_id, min_difficulty, max_difficulty, question_ids) VALUES (:quiz_id, :min_difficulty, :max_difficulty, :question_ids)");
//         $stmt->bindParam(':quiz_id', $quiz_id);
//         $stmt->bindParam(':min_difficulty', $min_difficulty);
//         $stmt->bindParam(':max_difficulty', $max_difficulty);
//         $stmt->bindParam(':question_ids', $question_ids_str);
//         $stmt->execute();

//         // Commit the transaction
//         $pdo->commit();

//         // Fetch question details from QuestionBank table
//         $stmt_question = $pdo->prepare("SELECT  QuestionTitle, Option1, Option2, Option3, Option4 FROM QuestionBank WHERE QuestionID IN ($question_ids_str)");
//         $stmt_question->execute();
//         $questions_data = $stmt_question->fetchAll(PDO::FETCH_ASSOC);
        
//         // Return quiz set information with question details as JSON response
//         $quiz_set_info = [
//             'quiz_id' => $quiz_id,
//             'num_questions' => $num_questions,
//             'questions' => $questions_data
//         ];
        
//         echo json_encode($quiz_set_info);
//             } catch(PDOException $e) {
//         // Rollback the transaction in case of an error
//         $pdo->rollback();
//         echo "Error: " . $e->getMessage();
//     }
// } else {
//     echo "Error: No data received.";
// }
session_start();
include '../../setting.php';

// Function to sanitize input data
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Assuming you receive JSON data from the frontend
$json_data = file_get_contents('php://input');
$quiz_data = json_decode($json_data);

if ($quiz_data !== null) {
    try {
        // Start a transaction
        $pdo->beginTransaction();

        // Insert quiz set data into 'quizzes' table
        $num_questions = $quiz_data->num_questions;
        $stmt = $pdo->prepare("INSERT INTO quizzes (num_questions) VALUES (:num_questions)");
        $stmt->bindParam(':num_questions', $num_questions);
        $stmt->execute();

        // Get the last inserted quiz ID
        $quiz_id = $pdo->lastInsertId();

        // Insert quiz set data into 'sub_quiz' table
        $min_difficulty = 0; // Assuming default minimum difficulty
        $max_difficulty = 200; // Assuming default maximum difficulty

        // Create an array of question IDs
        $question_ids = [];
        if (isset($quiz_data->questions) && is_array($quiz_data->questions)) {
            foreach ($quiz_data->questions as $question) {
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

        // Commit the transaction

        // Fetch specific question details from QuestionBank table
        $stmt_question = $pdo->prepare("SELECT QuestionTitle, Option1, Option2, Option3, Option4 FROM QuestionBank WHERE QuestionID IN ($question_ids_str)");
        $stmt_question->execute();
        $questions_data = $stmt_question->fetchAll(PDO::FETCH_ASSOC);
        
        // Return quiz set information with question details as JSON response
        $quiz_set_info = [
            'quiz_id' => $quiz_id,
            'num_questions' => $num_questions,
            'questions' => $questions_data
        ];
        echo json_encode($quiz_set_info);
    } catch(PDOException $e) {
        // Rollback the transaction in case of an error
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: No data received.";
}

?>
