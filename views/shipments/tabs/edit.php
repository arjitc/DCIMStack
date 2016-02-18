            <br>
            <form action="edit_device.php" id="edit_shipment" method="post">
                <label>Shipment Tracking ID</label>
                <input type="text" name="shipment_tracking_id" class="form-control" value="<?php echo $shipment_tracking_id; ?>" required>
                <hr>
                <center><input type="submit" form="edit_shipment" value="Update" class="btn btn-primary"></center>
            </form>