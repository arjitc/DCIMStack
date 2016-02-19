            <br>
            <form action="update_shipment_db.php" id="edit_shipment" method="post">
                <input type="hidden" name="shipment_id" class="form-control" value="<?php echo $shipment_id; ?>" required>
                <label>Shipment Tracking ID</label>
                <input type="text" name="shipment_tracking_id" class="form-control" value="<?php echo $shipment_tracking_id; ?>" required>
                <hr>
                <center><input type="submit" form="edit_shipment" value="Update" class="btn btn-primary"></center>
            </form>