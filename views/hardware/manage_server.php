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
            $device_label     = $row["device_label"];
            $device_brand     = $row["device_brand"];
            $device_type      = $row["device_type"];
            $device_serial    = $row["device_serial"];
            $device_capacity  = $row["device_capacity"];
            $device_cpu       = $row["device_cpu"];
            $device_cpu_count = $row["device_cpu_count"];
            $device_ram_total = $row["device_ram_total"];
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
                    <li><a href="#orange" data-toggle="tab"><img src="assets/img/layout_content.png"> Server information</a></li>
                    <li><a href="#yellow" data-toggle="tab">Yellow</a></li>
                    <li><a href="#green" data-toggle="tab">Green</a></li>
                    <li><a href="#blue" data-toggle="tab">Blue</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="cpu_ram">
                        <?php include 'manage_server/tab_cpu_ram.php'; ?>
                    </div>
                    <div class="tab-pane" id="orange">
                        <h1>Orange</h1>
                        <p>orange orange orange orange orange</p>
                    </div>
                    <div class="tab-pane" id="yellow">
                        <h1>Yellow</h1>
                        <p>yellow yellow yellow yellow yellow</p>
                    </div>
                    <div class="tab-pane" id="green">
                        <h1>Green</h1>
                        <p>green green green green green</p>
                    </div>
                    <div class="tab-pane" id="blue">
                        <h1>Blue</h1>
                        <p>blue blue blue blue blue</p>
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
        <a href="#" class="btn btn-primary">Update</a>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>