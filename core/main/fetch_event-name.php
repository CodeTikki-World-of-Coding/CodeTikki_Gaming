<?php

session_start();
include '../../setting.php';

try {
    $stmt = $pdo->prepare("SELECT EventName FROM Event");
    $stmt->execute();
    $eventNames = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $options = '';
    foreach ($eventNames as $eventName) {
        $options .= "<option value='$eventName'>$eventName</option>";
    }

    echo $options;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
