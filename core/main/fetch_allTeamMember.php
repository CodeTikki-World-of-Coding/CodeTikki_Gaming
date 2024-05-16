<?php
session_start();
include '../../setting.php';

try {
    if (isset($_POST['selectedEvent']) && !empty($_POST['selectedEvent'])) {
        $selectedEvent = $_POST['selectedEvent'];
        $sql = "SELECT Event.EventID 
                FROM Event 
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
                $html = "<ul>";
                foreach ($users as $user) {
                    $html .= "<li>" . $user['username'] . "</li>";
                }
                $html .= "</ul>";
                echo $html; 
            } else {
                echo "No users found for the selected event.";
            }
        } else {
            echo "Error: Event ID not found for the selected event.";
        }
    } else {
        echo "Error: Selected event not provided.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
