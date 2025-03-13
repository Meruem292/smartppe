<!-- Modal -->
<?php include "../helpers/get_functions.php";
$getHostByID = getHostByID($_SESSION['host_id']);
?>

<input type="hidden" name="host_id" value="<?php echo $_SESSION['host_id']; ?>">
<input type="hidden" name="old_startbreak" value="<?php echo $getHostByID['start_break']; ?>">
<input type="hidden" name="old_endbreak" value="<?php echo $getHostByID['end_break']; ?>">
<input type="hidden" name="old_smsinterval" value="<?php echo $getHostByID['sms_interval']; ?>">
<input type="hidden" name="old_geofencingrange" value="<?php echo $getHostByID['geofencing_range']; ?>">

<div class="modal fade" id="updateConfigModal" tabindex="-1" aria-labelledby="updateConfigModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateConfigModalLabel">Device Config</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../helpers/put_functions.php" method="POST">
                    <label for="start_break">Start of Break Time</label>
                    <input type="text" name="start_break" id="start_break" class="timepicker form-control" placeholder="Select Time">

                    <label for="end_breake">End of Break Time</label>
                    <input type="text" name="end_break" id="end_break" class="timepicker form-control" placeholder="Select Time">

                    <label for="sms_interval">Set SMS interval (minute)</label>
                    <input type="text" class="form-control" name="sms_interval" id="sms_interval" placeholder="ex. 10 ">

                    <label for="geofencing_range">Geofencing range (meters)</label>
                    <input type="number" class="form-control" name="geofencing_range" id="geofencing_range" placeholder="ex. 50 ">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="update_config" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("document").ready(function() {
        $("#start_break").val("<?php echo $getHostByID['start_break']; ?>");
        $("#end_break").val("<?php echo $getHostByID['end_break']; ?>");
        $("#sms_interval").val("<?php echo $getHostByID['sms_interval']; ?>");
        $("#geofencing_range").val("<?php echo $getHostByID['geofencing_range']; ?>");
    });
</script>