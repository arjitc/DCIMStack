<?php
if (!ctype_digit($_GET['shipment_id'])) {
    header('Location: index.php');
} else {
    $_SESSION['referrer'] = "shipments.php"; //manually set it here.
    include 'config/db.php';
    $shipment_id = mysqli_real_escape_string($conn, $_GET['shipment_id']);
    $sql = "SELECT * FROM `shipments` WHERE `id`='$shipment_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tracking_id    = $row["tracking_id"];
            $delivery_status    = $row["delivery_status"];
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
            <h4 class="modal-title"><img src='assets/img/lorry_go.png'> Manage Shipment - <?php echo $tracking_id; ?></h4>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
            <div class="pull-left">
            <a href="delete_shipment.php?shipment_id=<?php echo $shipment_id; ?>" class="btn btn-danger confirmation">Delete Shipment</a>
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