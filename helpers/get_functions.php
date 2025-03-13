<?php
include "../includes/db.php";
global $pdo;
function getWorkers($pdo, $host_id)
{
    $sql = "SELECT * FROM workers WHERE host_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$host_id]);
    $result = $stmt->fetchAll();
    return $result ? $result : [];
}
function getWorkersLogs($pdo, $worker_id)
{
    $sql = "SELECT * FROM logs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$worker_id]);
    $result = $stmt->fetchAll();
    return $result ? $result : [];
}
function getWorkerByID($id)
{
    global $pdo;
    $sql = "SELECT * FROM workers WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch();
    return $result ? $result : [];
}
