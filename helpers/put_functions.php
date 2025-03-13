<?php
session_start();
if (isset($_POST['update_config'])) {
    require_once "../includes/db.php";
    $host_id = $_SESSION['host_id'];
    $start_break = $_POST['start_break'];
    $end_break = $_POST['end_break'];
    $sms_interval = $_POST['sms_interval'];
    $geofencing_range = $_POST['geofencing_range'];

    $stmt = $pdo->prepare("UPDATE hosts SET start_break = :start_break, end_break = :end_break, sms_interval = :sms_interval, geofencing_range = :geofencing_range WHERE host_id = :host_id");
    $stmt->bindParam(':geofencing_range', $geofencing_range);
    $stmt->bindParam(':start_break', $start_break);
    $stmt->bindParam(':end_break', $end_break);
    $stmt->bindParam(':sms_interval', $sms_interval);
    $stmt->bindParam(':host_id', $host_id);

    if ($stmt->execute()) {
        header("Location: ../host/index.php");
    } else {
        header("Location: ../host/index.php");
    }
}
