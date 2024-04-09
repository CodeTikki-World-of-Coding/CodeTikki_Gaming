<?php
// session_start();
// include '../../setting.php';
// try {
    
//     $sql = "SELECT UserID, RegistrationDate FROM EventUser";
    
//     // Prepare the SQL statement
//     $stmt = $pdo->prepare($sql);
    
//     // Execute the SQL statement
//     $stmt->execute();
    
//     // Fetch all rows as associative array
//     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
//     // Generate HTML content for registered teams
//     $html = "<ul>";
//     foreach ($users as $user) {
//         $html .= "<li>User ID: " . $user['UserID'] . ", Registration Date: " . $user['RegistrationDate'] . "</li>";
//     }
//     $html .= "</ul>";

//     // Output the HTML data
//     echo $html;
// } catch(PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }



session_start();
include '../../setting.php';

try {
    $sql = "SELECT UserID, RegistrationDate FROM EventUser";
    
    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);
    
    // Execute the SQL statement
    $stmt->execute();
    
    // Fetch all rows as associative array
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Shuffle the array of users to randomize the order
    shuffle($users);
    
    // Pair users in groups of two
    $pairs = array_chunk($users, 2);
    
    // Generate HTML content for pairs
    $html = "<ul>";
    foreach ($pairs as $pair) {
        $html .= "<li> Battle /vs: ";
        foreach ($pair as $user) {
            $html .= "User ID: " . $user['UserID'] . ", Registration Date: " . $user['RegistrationDate'] . " | ";
        }
        $html = rtrim($html, "| "); // Remove the last separator
        $html .= "</li>";
    }
    $html .= "</ul>";

    // Output the HTML data
    echo $html;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

