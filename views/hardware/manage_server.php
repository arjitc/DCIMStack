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
            <h4 class="modal-title"><img src='assets/img/drive_go.png'> Manage server - <?php echo $device_label; ?></h4>
        </div>
        <div class="modal-body">
            <form action="add_device_db.php" id="add_hdds" method="post">
                    <input type="hidden" class="form-control" name="device_type" value="server">
                    <label>Server CPU</label>
                    <input type="text" class="form-control" name="device_cpu">
                    <label>CPU Count</label>
                    <select class="form-control" name="device_cpu_count">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                    <label>RAM</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="device_ram_total">
                      <div class="input-group-addon">GB</div>
                    </div>
                    <label>Server Size</label>
                    <select class="form-control" name="device_size">
                      <option value="1U">1U</option>
                      <option value="2U">2U</option>
                      <option value="3U">3U</option>
                      <option value="4U">4U</option>
                    </select>
                    <label>Server Vendor</label>
                    <select class="form-control" name="device_brand">
                        <option value="<?php echo $device_brand; ?>"><?php echo $device_brand; ?></option>
                        <option value="HP">HP</option>
                        <option value="Dell">Dell</option>
                        <option value="Supermicro">Supermicro</option>
                        <option value="IBM">IBM</option>
                    </select>
                    <label>Device Location</label>
                    <?php
                    include 'config/db.php';
                    $sql = "SELECT * FROM `rackspace`";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      echo "<select class='form-control' name='device_location'>";
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                          $rackid = $row["rackid"];
                          echo "<option value='$rackid'>".get_rack_name($rackid)."</option>";
                        }
                        echo "</select>";
                      } else {
                        echo "0 results";
                      }
                      ?>
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