<?php require_once "../helpers/get_functions.php";
require "../includes/db.php";

$host_id = $_SESSION['host_id'];
$workerData = getGeneralLogs($pdo, $host_id);

?>

<table id="generalLogsTbl" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>DeviceID</th>
            <th>HostID</th>
            <th>On Break</th>
            <th>Is Wearing</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($workerData as $worker) : ?>
            <tr>
                <td><?php echo $worker['id']; ?></td>
                <td><?php echo $worker['device_id']; ?></td>
                <td><?php echo $worker['host_id']; ?></td>
                <td><?php echo $worker['on_break']; ?></td>
                <td><?php echo $worker['is_wear']; ?></td>
                <td><?php echo $worker['timestamp']; ?></td>
            </tr>
        <?php endforeach; ?>
</table>