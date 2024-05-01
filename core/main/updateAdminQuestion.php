<?php

session_start();
include '../../setting.php';

// Retrieve filter values
$minLevel = isset($_POST['minLevel']) ? $_POST['minLevel'] : 0;
$maxLevel = isset($_POST['maxLevel']) ? $_POST['maxLevel'] : 1000;
$creator = isset($_POST['creator']) ? $_POST['creator'] : '';
$sortBy = isset($_POST['sortBy']) ? $_POST['sortBy'] : 'asc';
try {
    // Create a new PDO instance
    // Query to fetch questions based on the provided criteria
    $query = "SELECT qb.QuestionID, qb.QuestionTitle, qb.Option1, qb.Option2, qb.Option3, qb.Option4, qb.CorrectAnswer, qb.Level, u.Username
              FROM QuestionBank qb
              LEFT JOIN User u ON qb.UserID = u.Id";

    // If a creator is selected, add conditions to filter questions by username
    if ($creator !== '') {
       
        $query .= " WHERE u.Username = :username";
    }

    // Add additional conditions for level filtering
    $query .= " AND qb.Level >= :minLevel AND qb.Level <= :maxLevel";

    if ($sortBy === 'asc') {
        $query .= " ORDER BY qb.QuestionID ASC";
    } else {
        $query .= " ORDER BY qb.QuestionID DESC";
    }

    // Prepare the statement
    $stmt = $pdo->prepare($query);

    // Bind parameters
    $stmt->bindParam(':minLevel', $minLevel, PDO::PARAM_INT);
    $stmt->bindParam(':maxLevel', $maxLevel, PDO::PARAM_INT);
    if ($creator !== '') {
        $stmt->bindParam(':username', $creator, PDO::PARAM_STR);
    }

    // Execute the statement
    $stmt->execute();

    // Fetch data
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($questions);
} catch (PDOException $e) {
    // Handle the error
    echo 'Error: ' . $e->getMessage();
}

?>
