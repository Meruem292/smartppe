<?php require_once "../helpers/get_functions.php";
$host_id = $_SESSION['host_id'];
$workers = getWorkers($pdo, $host_id);
?>


<table id="workerTbl" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>DeviceID</th>
            <th>Worker Name</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($workers as $worker) : ?>
            <tr>
                <td><?php echo $worker['id']; ?></td>
                <td><?php echo $worker['device_id']; ?></td>
                <td><a href="profile.php?id=<?php echo urlencode($worker['id']); ?>">
                        <?php echo ucwords(htmlspecialchars($worker['name'])); ?>
                    </a>
                </td>
                <td><?php echo $worker['created_at']; ?></td>
            </tr>
        <?php endforeach; ?>
</table>
<!-- Initialize DataTables -->