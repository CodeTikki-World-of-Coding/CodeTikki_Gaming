<?php
session_start();
include '../../setting.php';

$stmt = $pdo->query("SELECT  EventName FROM Event");
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return event data as JSON
echo json_encode($events);

?>
