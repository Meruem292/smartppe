<?php
header('Content-Type: application/json');
require 'db.php'; // Ensure this file connects to your database

$device_id = $_GET['device_id'] ?? '';

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

// Fetch geofencing_range, sms_interval, and phone numbers from hosts table
$stmt = $pdo->prepare("SELECT geofencing_range, sms_interval FROM hosts WHERE host_id = ?");
$stmt->execute([$host_id]);
$host = $stmt->fetch();
if (!$host) {
    echo json_encode(["error" => "Host not found"]);
    exit;
}

$stmt = $pdo->prepare("SELECT phone_no FROM hosts WHERE host_id = ?");
$stmt->execute([$host_id]);
$receivers = $stmt->fetchAll(PDO::FETCH_COLUMN);

$response = [
    "receivers" => $receivers,
    "geofenceRadius" => (int)$host['geofencing_range'],
    "smsInterval" => (int)$host['sms_interval']
];

echo json_encode($response);
