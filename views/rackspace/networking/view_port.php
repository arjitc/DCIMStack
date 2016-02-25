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
    }
    $port_name = port_name($port_number, $device_id);
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
            <?php
            if(isset($port_name) && $port_name!="undefined") {
                echo "<img src='print_graphs.php?port_number=$port_number&device_id=$device_id'>";
            } else {
                echo "Port Graphs not configured";
            }
            ?>
            
        </div>
        <div class="modal-footer">
            <div class="pull-left">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#configure_port">Configure Port</button>
            </div>
            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
            
        </form>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<!-- Configure Port Modal -->
<div id="configure_port" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Configure Port <?php echo $port_number; ?> on <?php echo $device_label; ?></h4>
    </div>
    <div class="modal-body">
        <p>Some text in the modal.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>

</div>
</div>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>