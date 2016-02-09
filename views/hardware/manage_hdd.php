<?php
if(!ctype_digit($_GET['device_id'])) {
    header('Location: index.php');
} else {
    include 'config/db.php';
    $device_id  = mysqli_real_escape_string($conn, $_GET['device_id']);
    $sql = "SELECT * FROM `devices` WHERE `device_id`='$device_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $device_label = $row["device_label"];
        }
    }
}
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><img src='assets/img/drive_go.png'> Manage disk <?php echo $device_label; ?></h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
            <a href="#" class="btn btn-primary">Button</a>
            <a href="#" class="btn btn-primary">Another button...</a>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->