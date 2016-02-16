<?php
include 'config/db.php';
$port_number = mysqli_real_escape_string($conn, $_GET['port_number']);
$device_id = mysqli_real_escape_string($conn, $_GET['device_id']);
$_SESSION['referrer'] = "rackspace.php?rackid=$rackid";
$sql = "SELECT * FROM `devices` WHERE `device_id`='$device_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $device_label = $row["device_label"];
    }
}
?>
<div class="modal-dialog" style="min-width:1200px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">
                <img src="assets/img/arrow_switch.png"> Viewing Port <?php echo $port_number; ?> on <?php echo $device_label; ?>
            </h4>
        </div>
        <div class="modal-body">
           <img src="test.php" alt="" />
        </div>
        <div class="modal-footer">
            <div class="pull-left">
                <a href="remove_power_feed.php?feed_id=<?php echo $feedid; ?>" class="btn btn-danger confirmation">Disable port</a>
            </div>
            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
          
        </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>