<?php
if (!ctype_digit($_GET['device_id'])) {
    header('Location: index.php');
} else {
    $_SESSION['referrer'] = "servers.php"; //manually set it here.
    include 'config/db.php';
    include 'libraries/general.php';
    $device_id = mysqli_real_escape_string($conn, $_GET['device_id']);
    $sql = "SELECT * FROM `devices` WHERE `device_id`='$device_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $device_id        = $row["device_id"];
            $device_label     = $row["device_label"];
            $device_brand     = $row["device_brand"];
            $device_type      = $row["device_type"];
            $device_serial    = $row["device_serial"];
            $device_capacity  = $row["device_capacity"];
            $device_cpu       = $row["device_cpu"];
            $device_cpu_count = $row["device_cpu_count"];
            $device_ram_total = $row["device_ram_total"];
            $device_mgmt_ip   = $row["device_mgmt_ip"];
            $device_mgmt_mac  = $row["device_mgmt_mac"];
        }
    }
}
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><img src='assets/img/drive_go.png'> Manage server - <?php echo $device_label; ?></h4>
        </div>
        <div class="modal-body">
            <div id="content">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#cpu_ram" data-toggle="tab"><img src="assets/img/calculator.png"> CPU / RAM</a></li>
                    <li><a href="#server_information" data-toggle="tab"><img src="assets/img/layout_content.png"> Server information</a></li>
                    <li><a href="#mgmt_ipmi" data-toggle="tab"><img src="assets/img/link.png"> MGMT/IPMI</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="cpu_ram">
                        <?php include 'manage_server/tab_cpu_ram.php'; ?>
                    </div>
                    <div class="tab-pane" id="server_information">
                        <?php include 'manage_server/tab_server_information.php'; ?>
                    </div>
                    <div class="tab-pane" id="mgmt_ipmi">
                        <?php include 'manage_server/tab_mgmt_ipmi.php'; ?>
                    </div>
                </div>
            </div>
            
            
        </form>
    </div>
    <div class="modal-footer">
        <div class="pull-left">
            <a href="delete_device.php?device_id=<?php echo $device_id; ?>" class="btn btn-danger confirmation">Remove Server</a>
        </div>
        <a href="#" class="btn btn-primary" data-dismiss="modal">Cancel</a>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>