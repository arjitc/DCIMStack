<?php
if (!ctype_digit($_GET['device_id'])) {
    header('Location: index.php');
} else {
    $_SESSION['referrer'] = "hdds.php"; //manually set it here.
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
            $device_inuse    = $row["device_inuse"];
            $device_parent   = $row["device_parent"];
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
            <form action="update_device_db.php" id="device_network" method="post">
                <input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
                <label>Server</label>
                <small><i>Select the server this disk is currently inserted into - if any</i></small>
                <?php
                include 'config/db.php';
                $sql = "SELECT * FROM `devices` WHERE `device_type`='server'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<select class='form-control' name='device_parent'>";
                    // output data of each row
                    echo "<option value='$device_parent'>".get_device_label_from_id($device_parent)."</option>";
                    echo "<option value='0'>None</option>";
                    while ($row = $result->fetch_assoc()) {
                        $device_label = $row["device_label"];
                        $device_id = $row["device_id"];
                        if($device_id!=$device_parent) {
                            echo "<option value='$device_id'>$device_label</option>";
                        }
                    }
                    echo "</select>";
                } else {
                    echo "0 results";
                }
                ?>
                <hr>
                <center><input type="submit" form="device_network" class="btn btn-primary"></center>
            </form>
        </div>
        <div class="modal-footer">
            <div class="pull-left">
                <?php 
                if($device_inuse==0) {
                    echo "<a href='update_device_db.php?device_id=$device_id&device_inuse=1' class='btn btn-info confirmation'>Mark In-Use</a>";
                } else {
                   echo "<a href='update_device_db.php?device_id=$device_id&device_inuse=0' class='btn btn-info confirmation'>Mark Not In-Use</a>";
                }
               ?>

               <a href="delete_device.php?device_id=<?php echo $device_id; ?>" class="btn btn-danger confirmation">Remove HDD</a>
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