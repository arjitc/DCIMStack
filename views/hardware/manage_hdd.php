<?php
if (!ctype_digit($_GET['device_id'])) {
    header('Location: index.php');
} else {
    $_SESSION['referrer'] = "hdds.php"; //manually set it here.
    include 'config/db.php';
    $device_id = mysqli_real_escape_string($conn, $_GET['device_id']);
    $sql = "SELECT * FROM `devices` WHERE `device_id`='$device_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $device_label    = $row["device_label"];
            $device_brand    = $row["device_brand"];
            $device_type     = $row["device_type"];
            $device_serial   = $row["device_serial"];
            $device_capacity = $row["device_capacity"];
        }
    }
}
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><img src='assets/img/drive_go.png'> Manage disk - <?php echo $device_label; ?></h4>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
            <div class="pull-left">
            <a href="delete_device.php?device_id=<?php echo $device_id; ?>" class="btn btn-danger confirmation">Remove HDD</a>
            </div>
            <a href="#" class="btn btn-primary" data-dismiss="modal">Cancel</a>
            <a href="#" class="btn btn-primary">Update</a>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>