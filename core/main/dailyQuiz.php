<?php

include '../../setting.php'; 
session_start();

try {
    $sqlFetchEventId = "SELECT EventID FROM Event";
    $stmtEventId = $pdo->query($sqlFetchEventId);
    $rowEventId = $stmtEventId->fetch(PDO::FETCH_ASSOC);

    if (!$rowEventId) {
        echo json_encode(['success' => false, 'message' => 'Invalid event name.']);
        exit; 
    }

    $eventID = $rowEventId['EventID'];
    $tmpTableName = "tmp_quizset_event${eventID}";

    $sqlCheckTable = "SHOW TABLES LIKE '$tmpTableName'";
    $stmtCheckTable = $pdo->query($sqlCheckTable);
    $tableExists = $stmtCheckTable->rowCount() > 0;

    if (!$tableExists) {
        $sqlCreateTable = "CREATE TABLE $tmpTableName (
            QuizSetID INT AUTO_INCREMENT PRIMARY KEY,
            QuestionID1 INT,
            QuestionID2 INT,
            QuestionID3 INT,
            QuestionID4 INT,
            QuestionID5 INT,
            QuestionID6 INT,
            QuestionID7 INT,
            QuestionID8 INT,
            QuestionID9 INT,
            QuestionID10 INT
        )";
        $pdo->exec($sqlCreateTable);
        $sqlAddConstraints = "ALTER TABLE $tmpTableName
        ADD CONSTRAINT fk_question1_tmp_quizset_event_${eventID} FOREIGN KEY (QuestionID1) REFERENCES QuestionBank(QuestionID),
        ADD CONSTRAINT fk_question2_tmp_quizset_event_${eventID} FOREIGN KEY (QuestionID2) REFERENCES QuestionBank(QuestionID),
        ADD CONSTRAINT fk_question3_tmp_quizset_event_${eventID} FOREIGN KEY (QuestionID3) REFERENCES QuestionBank(QuestionID),
        ADD CONSTRAINT fk_question4_tmp_quizset_event_${eventID} FOREIGN KEY (QuestionID4) REFERENCES QuestionBank(QuestionID),
        ADD CONSTRAINT fk_question5_tmp_quizset_event_${eventID} FOREIGN KEY (QuestionID5) REFERENCES QuestionBank(QuestionID),
        ADD CONSTRAINT fk_question6_tmp_quizset_event_${eventID} FOREIGN KEY (QuestionID6) REFERENCES QuestionBank(QuestionID),
        ADD CONSTRAINT fk_question7_tmp_quizset_event_${eventID} FOREIGN KEY (QuestionID7) REFERENCES QuestionBank(QuestionID),
        ADD CONSTRAINT fk_question8_tmp_quizset_event_${eventID} FOREIGN KEY (QuestionID8) REFERENCES QuestionBank(QuestionID),
        ADD CONSTRAINT fk_question9_tmp_quizset_event_${eventID} FOREIGN KEY (QuestionID9) REFERENCES QuestionBank(QuestionID),
        ADD CONSTRAINT fk_question10_tmp_quizset_event_${eventID} FOREIGN KEY (QuestionID10) REFERENCES QuestionBank(QuestionID)
    ";
        $pdo->exec($sqlAddConstraints);
    }

    for ($i = 0; $i < 10; $i++) {
        $sqlFetchQuestions = "SELECT QuestionID FROM QuestionBank WHERE QuestionTitle IS NOT NULL AND QuestionTitle <> '' AND Level BETWEEN :minLevel AND :maxLevel ORDER BY RAND() LIMIT 10";
        $stmt = $pdo->prepare($sqlFetchQuestions);
        $stmt->execute(['minLevel' => $_POST['minLevel'], 'maxLevel' => $_POST['maxLevel']]);
        $questionIDs = $stmt->fetchAll(PDO::FETCH_COLUMN);

        if (!empty($questionIDs)) {
            $insertValues = implode(',', $questionIDs);
            $sqlInsert = "INSERT INTO $tmpTableName (QuestionID1, QuestionID2, QuestionID3, QuestionID4, QuestionID5, QuestionID6, QuestionID7, QuestionID8, QuestionID9, QuestionID10) VALUES ($insertValues)";
            $pdo->exec($sqlInsert);
        }
    }
    $sqlFetchData = "SELECT * FROM $tmpTableName";
    $stmtFetchData = $pdo->query($sqlFetchData);
    $quizSetData = $stmtFetchData->fetchAll(PDO::FETCH_ASSOC);

    if ($quizSetData) {
        echo json_encode(['success' => true, 'message' => '10 quiz sets created successfully.', 'quizSetData' => $quizSetData]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No data available in the temporary table.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}

?>

