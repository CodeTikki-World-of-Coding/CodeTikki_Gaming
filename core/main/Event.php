<?php
session_start();
include '../../setting.php';



function generateEventName($prefix = 'PB', $sequence = 1, $currentMonth) {
    // Pad the sequence number with zeros to ensure it has at least 3 digits
    $paddedSequence = str_pad($sequence, 3, '0', STR_PAD_LEFT);
    
    // Generate the event name by combining prefix, padded sequence, and current month
    $eventName = $prefix . $paddedSequence . $currentMonth;
    
    return $eventName;
}

try {
    // Fetch existing event names to ensure uniqueness
    $stmt = $pdo->prepare("SELECT EventName FROM Event");
    $stmt->execute();
    $existingEventNames = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Generate a new event name until it's unique
    $sequence = 1;
    do {
        $eventName = generateEventName('PB', $sequence, date('m'));
        $sequence++;
    } while (in_array($eventName, $existingEventNames));

    // Prepare an SQL statement to insert data into the Event table
    $stmt = $pdo->prepare("INSERT INTO Event (EventName, EventDate) VALUES (:EventName, NOW())");
    $stmt->bindParam(':EventName', $eventName);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Event data inserted successfully!";
    } else {
        echo "Error inserting event data: " . $stmt->errorInfo()[2];
    }

    // Close the statement
    $stmt->closeCursor();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
