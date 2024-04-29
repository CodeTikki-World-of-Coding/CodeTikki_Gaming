<?php
session_start();
include '../../setting.php';



function generateEventName($prefix = 'PB', $sequence = 1, $currentMonth) {
    $paddedSequence = str_pad($sequence, 3, '0', STR_PAD_LEFT);
    
    $eventName = $prefix . $paddedSequence . $currentMonth;
    
    return $eventName;
}

try {
    $stmt = $pdo->prepare("SELECT EventName FROM Event");
    $stmt->execute();
    $existingEventNames = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $sequence = 1;
    do {
        $eventName = generateEventName('PB', $sequence, date('m'));
        $sequence++;
    } while (in_array($eventName, $existingEventNames));

    $stmt = $pdo->prepare("INSERT INTO Event (EventName, EventDate) VALUES (:EventName, NOW())");
    $stmt->bindParam(':EventName', $eventName);

    if ($stmt->execute()) {
        echo "Event data inserted successfully!";
    } else {
        echo "Error inserting event data: " . $stmt->errorInfo()[2];
    }

    $stmt->closeCursor();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
