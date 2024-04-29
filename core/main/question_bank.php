<?php
session_start();
include '../../setting.php';

// Validate and sanitize the input data (not shown for brevity)
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';


// Get the form data
$formData = $_POST;

if ($user_id !== null && !empty($user_id)) {
    try {
        $selectedType = $formData['selectType'];
        $stmtCheckType = $pdo->prepare("SELECT Value FROM QuestionTypePicklist WHERE Value = :description");
        $stmtCheckType->bindParam(':description', $selectedType);
        $stmtCheckType->execute();
        $typeResult = $stmtCheckType->fetch(PDO::FETCH_ASSOC);

        if ($typeResult) {
            $questionTypeValue = $typeResult['Value'];

            $stmtInsert = $pdo->prepare("INSERT INTO QuestionBank (QuestionTitle, Pseudocode, Option1, Option2, Option3, Option4, CorrectAnswer, Level, UserID, QuestionType) 
                                   VALUES (:questionTitle, :pseudocode, :option1, :option2, :option3, :option4, :correctAnswer, :level, :userID, :questionType)");

            $stmtInsert->bindParam(':pseudocode', $formData['pseudoCode']);
            $stmtInsert->bindParam(':option1', $formData['option1']);
            $stmtInsert->bindParam(':option2', $formData['option2']);
            $stmtInsert->bindParam(':option3', $formData['option3']);
            $stmtInsert->bindParam(':option4', $formData['option4']);
            $stmtInsert->bindParam(':correctAnswer', $formData['correctAnswere']);
            $stmtInsert->bindParam(':level', $formData['level']);
            $stmtInsert->bindParam(':userID', $user_id);
            $stmtInsert->bindParam(':questionType', $questionTypeValue);

            // Check and insert original form data
            if (!empty($formData['question'])) {
                $stmtInsert->bindParam(':questionTitle', $formData['question']);
                $stmtInsert->execute();
            }

        foreach ($formData as $key => $value) {
            if (strpos($key, 'cloned_question_') !== false) {
                $parts = explode('_', $key);
                $index = end($parts);
                $stmtClone = $pdo->prepare("INSERT INTO QuestionBank (QuestionTitle, Pseudocode, Option1, Option2, Option3, Option4, CorrectAnswer, Level, UserID, QuestionType) 
                                   VALUES (:questionTitle, :pseudocode, :option1, :option2, :option3, :option4, :correctAnswer, :level, :userID, :questionType)");
                if (!empty($formData['cloned_question_' . $index])) {
                    $stmtClone->bindParam(':questionTitle', $formData['cloned_question_' . $index]);
                    $stmtClone->bindParam(':pseudocode', $formData['cloned_pseudoCode_' . $index]);
                    $stmtClone->bindParam(':option1', $formData['cloned_option1_' . $index]);
                    $stmtClone->bindParam(':option2', $formData['cloned_option2_' . $index]);
                    $stmtClone->bindParam(':option3', $formData['cloned_option3_' . $index]);
                    $stmtClone->bindParam(':option4', $formData['cloned_option4_' . $index]);
                    $stmtClone->bindParam(':correctAnswer', $formData['cloned_correctAnswere_' . $index]);
                    $stmtClone->bindParam(':level', $formData['cloned_level_' . $index]);
                    $stmtClone->bindParam(':userID', $user_id);
                    $stmtClone->bindParam(':questionType', $questionTypeValue);
                    $stmtClone->execute();
                }
            }
        }

         echo json_encode(array('success' => true, 'message' => "Data inserted successfully into QuestionBank table."));
        } else {
            echo json_encode(array('success' => false, 'message' => "Selected question type not found in the QuestionTypePicklist table."));
        }
    } catch(PDOException $e) {
        echo json_encode(array('success' => false, 'message' => "Error inserting data into QuestionBank table: " . $e->getMessage()));
    }
} else {
    echo json_encode(array('success' => false, 'message' => "User ID not found."));
}

?> 
