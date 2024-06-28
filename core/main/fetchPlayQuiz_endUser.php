<?php
session_start();
include '../../setting.php';

if (isset($_GET['sub_quiz_id']) && !empty($_GET['sub_quiz_id'])) {
    $sub_quiz_id = $_GET['sub_quiz_id'];

    try {
        $stmt = $pdo->prepare("SELECT question_ids FROM sub_quiz WHERE sub_quiz_id = ?");
        $stmt->execute([$sub_quiz_id]);

        // Fetch question_ids from sub_quiz
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Extract question_ids from the row
            $question_ids = $row['question_ids'];
            $question_ids_array = explode(',', $question_ids);

            // Get the current question index from query parameter
            $question_index = isset($_GET['question_index']) ? (int)$_GET['question_index'] : 0;

            if ($question_index < count($question_ids_array)) {
                // Fetch the current question based on the index
                $current_question_id = $question_ids_array[$question_index];
                $questionStmt = $pdo->prepare("SELECT * FROM QuestionBank WHERE QuestionId = ?");
                $questionStmt->execute([$current_question_id]);

                // Fetch question
                $question = $questionStmt->fetch(PDO::FETCH_ASSOC);

                if ($question) {
                    echo '<div class="question-container">';
                    echo '<div class="time-marks row"><div class="col-md-10" id="timer" style="font-size: 20px; font-weight: bold; margin-bottom: 20px;">01:00</div><div class="marks col-md-2"><span>Marks:100</span></div></div>';
                    echo '<h5>Question ' . ($question_index + 1) . ':</h5>';
                    echo '<p class="question-title">' . htmlspecialchars($question['QuestionTitle']) . '</p>';
                    echo '<p class="pseudocode"><strong>Pseudocode:</strong><br>' . nl2br(htmlspecialchars($question['Pseudocode'])) . '</p>';
                    echo '<div class="options">';
                    echo '<p class="option">1. ' . htmlspecialchars($question['Option1']) . '</p>';
                    echo '<p class="option">2. ' . htmlspecialchars($question['Option2']) . '</p>';
                    echo '<p class="option">3. ' . htmlspecialchars($question['Option3']) . '</p>';
                    echo '<p class="option">4. ' . htmlspecialchars($question['Option4']) . '</p>';
                    echo '</div>';
                    
                    // Display the "Next" button if there are more questions
                    if ($question_index < count($question_ids_array) - 1) {
                        echo '<button id="nextButton" class="btn btn-primary" data-next-index="' . ($question_index + 1) . '">Next</button>';
                    } else {
                        echo '<p>End of quiz.</p>';
                    }

                    echo '</div>';
                } else {
                    echo "No question found for ID: " . $current_question_id;
                }
            } else {
                echo "No more questions.";
            }
        } else {
            echo "No data found for sub quiz ID: " . $sub_quiz_id;
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the connection
    $pdo = null;

} else {
    echo "Sub quiz ID is missing or invalid.";
}

?>
