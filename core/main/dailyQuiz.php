<?php
include '../../setting.php'; // Include the file where you established the database connection
session_start();

try {
    // SQL query to fetch 10 random questions with non-empty QuestionTitle from the QuestionBank table
    $sql = "SELECT QuestionTitle, Option1, Option2, Option3, Option4 FROM QuestionBank WHERE QuestionTitle IS NOT NULL AND QuestionTitle <> '' ORDER BY RAND() LIMIT 10";
    
    // Prepare and execute the SQL query
    $stmt = $pdo->query($sql);
    
    // Fetch all rows as an associative array
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Check if any questions were fetched
    if ($questions) {
        // Output JSON response
        echo json_encode($questions);
    } else {
        // No questions found
        echo "No questions found";
    }
} catch(PDOException $e) {
    // Display error message if there's an exception
    echo "Error: " . $e->getMessage();
}
?>
