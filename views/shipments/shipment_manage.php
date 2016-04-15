<?php
if (!ctype_digit($_GET['shipment_id'])) {
    header('Location: index.php');
} else {
    $_SESSION['referrer'] = "shipments.php"; //manually set it here.
    include 'config/db.php';
    include 'libraries/general.php';
    $shipment_id = mysqli_real_escape_string($conn, $_GET['shipment_id']);
    $sql = "SELECT * FROM `shipments` WHERE `id`='$shipment_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $shipment_tracking_id = $row["shipment_tracking_id"];
            $shipment_status = $row["shipment_status"];
            //http://stackoverflow.com/questions/110575/do-htmlspecialchars-and-mysql-real-escape-string-keep-my-php-code-safe-from-inje
            $shipment_notes  = mb_convert_encoding($row["shipment_notes"], 'UTF-8', 'UTF-8');
            $shipment_notes = htmlentities($shipment_notes, ENT_QUOTES, 'UTF-8');
            $shipment_status = $row["shipment_status"];
            $shipment_delivery_eta = $row["shipment_delivery_eta"];
            $shipment_courier = $row["shipment_courier"];
            $shipment_notes = $row["shipment_notes"];
        }
    }
}
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><img src='assets/img/lorry_go.png'> Manage Shipment - <?php echo $shipment_tracking_id; ?></h4>
        </div>
        <div class="modal-body">
            <div id="content">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#edit" data-toggle="tab"><img src="assets/img/pencil.png"> Edit</a></li>
                    <li><a href="#notes" data-toggle="tab"><img src="assets/img/note.png"> Notes</a></li>
                    <li><a href="#move_to_hardware" data-toggle="tab"><img src="assets/img/keyboard.png"> Move to Hardware</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="edit">
                        <?php include 'tabs/edit.php'; ?>
                    </div>
                    <div class="tab-pane" id="move_to_hardware">
                        <?php include 'tabs/move_to_hardware.php'; ?>
                    </div>
                    <div class="tab-pane" id="notes">
                        <?php include 'tabs/notes.php'; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="pull-left">
            <a href="delete_shipment.php?shipment_id=<?php echo $shipment_id; ?>" class="btn btn-danger confirmation">Delete Shipment</a>
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