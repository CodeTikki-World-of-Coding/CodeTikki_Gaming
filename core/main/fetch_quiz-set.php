<?php

include '../../setting.php';
session_start();
set_time_limit(300);
try {
    $sqlFetchEventId = "SELECT EventID FROM Event";
    $stmtEventId = $pdo->query($sqlFetchEventId);
    $rowEventId = $stmtEventId->fetch(PDO::FETCH_ASSOC);

    if (!$rowEventId || empty($rowEventId['EventID'])) {
        throw new Exception('Invalid event name.');
    }

    $eventID = $rowEventId['EventID'];
    $tmpTableName = "tmp_quizset_event${eventID}";

    $sqlFetchQuizSetIDs = "SELECT QuizSetID FROM $tmpTableName ORDER BY QuizSetID ASC LIMIT 0, 100"; // Fetch first 100 records in ascending order
    $stmtQuizSetIDs = $pdo->query($sqlFetchQuizSetIDs);
    $quizSetIDs = $stmtQuizSetIDs->fetchAll(PDO::FETCH_COLUMN);

    if (!empty($quizSetIDs)) {
        $quizSetData = [];

        foreach ($quizSetIDs as $quizSetID) {
            $sqlFetchQuestionIDs = "SELECT QuestionID1, QuestionID2, QuestionID3, QuestionID4, QuestionID5, QuestionID6, QuestionID7, QuestionID8, QuestionID9, QuestionID10 FROM $tmpTableName WHERE QuizSetID = :quizSetID";
            $stmtQuestionIDs = $pdo->prepare($sqlFetchQuestionIDs);
            $stmtQuestionIDs->execute(['quizSetID' => $quizSetID]);
            $questionIDs = $stmtQuestionIDs->fetch(PDO::FETCH_ASSOC);

            $questions = [];

            foreach ($questionIDs as $questionID) {
                $sqlFetchQuestionData = "SELECT QuestionTitle, Option1, Option2, Option3, Option4 FROM QuestionBank WHERE QuestionID = :questionID";
                $stmtQuestionData = $pdo->prepare($sqlFetchQuestionData);
                $stmtQuestionData->execute(['questionID' => $questionID]);

                $questions[] = $stmtQuestionData->fetch(PDO::FETCH_ASSOC);
            }

            $quizSetData[] = ['QuizSetID' => $quizSetID, 'Questions' => $questions];
        }

        echo json_encode(['success' => true, 'message' => 'Quiz data fetched successfully.', 'quizSetData' => $quizSetData]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No QuizSetIDs found in the temporary table.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
