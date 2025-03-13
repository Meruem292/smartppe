<?php
header('Content-Type: application/json');
require 'db.php'; // Ensure this connects to your database

$device_id = $_POST['device_id'] ?? '';
$on_break = $_POST['on_break'] ?? '';
$is_wear = $_POST['is_wear'] ?? '';
$timestamp = date('Y-m-d H:i:s.u');

if (empty($device_id)) {
    echo json_encode(["error" => "Missing device_id"]);
    exit;
}

// Fetch host_id from workers table
$stmt = $pdo->prepare("SELECT host_id FROM workers WHERE device_id = ?");
$stmt->execute([$device_id]);
$worker = $stmt->fetch();

if (!$worker) {
    echo json_encode(["error" => "Device not found"]);
    exit;
}

$host_id = $worker['host_id'];

// Insert log into the logs table
$stmt = $pdo->prepare("INSERT INTO logs (device_id, host_id, on_break, is_wear, timestamp) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$device_id, $host_id, $on_break, $is_wear, $timestamp]);

echo json_encode(["success" => true, "message" => "Log inserted successfully"]);
