<?php
include 'config/db.php';
include 'views/rackspace/networking/networking_functions.php'; 
$port_number = mysqli_real_escape_string($conn, $_GET['port_number']);
$device_id = mysqli_real_escape_string($conn, $_GET['device_id']);
$sql = "SELECT * FROM `devices` WHERE `device_id`='$device_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $device_label = $row["device_label"];
        $device_location = $row["rackid"];
    }
    $port_name = port_name($port_number, $device_id);
    $port_label = port_label($port_number, $device_id);
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
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#graph" data-toggle="tab">Graph</a></li>
                <li><a href="#configure" data-toggle="tab">Configure</a></li>
            </ul>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="graph">
                    <br>
                    <?php
                    if(isset($port_name) && $port_name!="undefined") {
                        echo "<img src='print_graphs.php?port_number=$port_number&device_id=$device_id'>";
                    } else {
                        echo "Port Graphs not configured";
                    }
                    ?>
                </div>
                <div class="tab-pane" id="configure">
                    <h1>Configure</h1>
                    <form action="update_port.php" method="post">
                        <input type="hidden" name="page_referrer" value="rackspace.php?rackid=<?php echo $device_location; ?>">
                        <input type="hidden" name="port_number" value="<?php echo $port_number; ?>">
                        <input type="hidden" name="device_id" value="<?php echo $device_id; ?>">
                        <label>Port Name</label>
                        <input type="text" class="form-control" name="port_name" value="<?php echo $port_name; ?>"><br>
                        <label>Port Label</label>
                        <input type="text" class="form-control" name="port_label" value="<?php echo $port_label; ?>"><br>
                        <hr>
                        <center><input class="btn btn-primary" type="submit"></center>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
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