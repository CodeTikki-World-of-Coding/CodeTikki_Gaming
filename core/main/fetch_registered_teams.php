<?php
session_start();
include '../../setting.php';

try {
    if (isset($_POST['selectedEvent']) && !empty($_POST['selectedEvent'])) {
        $selectedEvent = $_POST['selectedEvent'];
        $sql = "SELECT Event.EventID 
                FROM Event 
                INNER JOIN EventUser ON Event.EventID = EventUser.EventID
                WHERE Event.EventName = :selectedEvent";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':selectedEvent', $selectedEvent, PDO::PARAM_STR);
        $stmt->execute();
        $eventID = $stmt->fetchColumn();
        if ($eventID) {
            $sql = "SELECT EventUser.UserID, EventUser.RegistrationDate, User.username 
                    FROM EventUser 
                    INNER JOIN User ON EventUser.UserID = User.Id
                    WHERE EventUser.EventID = :eventID";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':eventID', $eventID, PDO::PARAM_INT);

            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                shuffle($users);
                $pairs = array_chunk($users, 2);
                if (count($users) % 2 !== 0) {
                    $lastUser = array_pop($users);
                    $existingUsers = $users;
                    shuffle($existingUsers);
                    $existingUser = $existingUsers[0];
                    $pairs[] = array($lastUser, $existingUser);
                }
                $html = "<ul>";
                foreach ($pairs as $pair) {
                    if (count($pair) == 2) { // Ensure each pair has exactly two users
                        $html .= "<li>  ";
                        foreach ($pair as $user) {
                            $html .=  $user['username']  . " VS ";
                        }
                        $html = rtrim($html, "VS "); // Remove the last separator
                        $html .= "</li>";
                    }
                }
                $html .= "</ul>";
                echo $html;
            } else {
                echo "No users found for the selected event.";
            }
        } else {
            echo "Error: Event ID not found for the selected event in EventUser.";
        }
    } else {
        echo "Error: Selected event not provided.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

