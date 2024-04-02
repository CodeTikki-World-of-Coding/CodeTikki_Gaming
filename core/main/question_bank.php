<?php
session_start();
include '../../setting.php';

// Validate and sanitize the input data (not shown for brevity)
$name = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
$EmailID = isset($_SESSION['mailid']) ? $_SESSION['mailid'] : '';

// Function to fetch user ID based on session data
function fetchUserID($name, $EmailID, $pdo) {
    try {
        $stmt = $pdo->prepare("SELECT Id FROM User WHERE username = :username AND email = :email");
        $stmt->bindParam(':username', $name);
        $stmt->bindParam(':email', $EmailID);
        $stmt->execute();
        $user_id = $stmt->fetchColumn();
        return $user_id;
    } catch(PDOException $e) {
        echo json_encode(array('success' => false, 'message' => "Error fetching user ID: " . $e->getMessage()));
        return null;
    }
}

// Get the form data
$formData = $_POST;
// Fetch user ID based on session data
$user_id = fetchUserID($name, $EmailID, $pdo);

if ($user_id !== null) {
    try {
        // Check if the selected value from selectType exists in QuestionTypePicklist
        $selectedType = $formData['selectType'];
        $stmtCheckType = $pdo->prepare("SELECT Value FROM QuestionTypePicklist WHERE Value = :description");
        $stmtCheckType->bindParam(':description', $selectedType);
        $stmtCheckType->execute();
        $typeResult = $stmtCheckType->fetch(PDO::FETCH_ASSOC);

        if ($typeResult) {
            $questionTypeValue = $typeResult['Value'];

            // Prepare the SQL statement to insert data into the QuestionBank table
            $stmtInsert = $pdo->prepare("INSERT INTO QuestionBank (QuestionTitle, Pseudocode, Option1, Option2, Option3, Option4, CorrectAnswer, Level, UserID, QuestionType) 
                                   VALUES (:questionTitle, :pseudocode, :option1, :option2, :option3, :option4, :correctAnswer, :level, :userID, :questionType)");

            // Bind parameters for original form data
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

            // Loop through cloned form data and insert into QuestionBank table
            // Loop through cloned form data and insert into QuestionBank table
        foreach ($formData as $key => $value) {
            if (strpos($key, 'cloned_question_') !== false) {
                $parts = explode('_', $key);
                $index = end($parts);
                $stmtClone = $pdo->prepare("INSERT INTO QuestionBank (QuestionTitle, Pseudocode, Option1, Option2, Option3, Option4, CorrectAnswer, Level, UserID, QuestionType) 
                                   VALUES (:questionTitle, :pseudocode, :option1, :option2, :option3, :option4, :correctAnswer, :level, :userID, :questionType)");
        // Check and insert cloned form data
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