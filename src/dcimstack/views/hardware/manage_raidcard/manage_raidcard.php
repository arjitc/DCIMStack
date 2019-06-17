<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DCIMStack</title>
    <?php include 'libraries/css2.php'; ?>
    <?php
    if (!ctype_digit($_GET['device_id'])) {
        header('Location: index.php');
        exit();
    } else {
        require_once 'libraries/general.php';
        $device_id = mysqli_real_escape_string($conn, $_GET['device_id']);
        $_SESSION['referrer'] = "manage_raidcard.php?device_id=$device_id"; //manually set it here.
        $sql = "SELECT * FROM `devices` WHERE `device_id`='$device_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $device_label     = $row["device_label"];
                $device_brand     = $row["device_brand"];
                $device_type      = $row["device_type"];
                $device_serial    = $row["device_serial"];
                $device_capacity  = $row["device_capacity"];
                $device_rma       = $row["device_rma"];
                $device_rma_notes = $row["device_rma_notes"];
                $device_rma_date  = $row["device_rma_date"];
                $device_inuse     = $row["device_inuse"];
                $device_parent    = $row["device_parent"];
                $device_rack      = $row["rackid"];
                $device_failed    = $row["device_failed"];
                $device_failed_date = $row["device_failed_date"];
                $device_notes     = $row["device_notes"];
                $server_announce  = $row["server_announce"];
            }
        }
    }
    ?>
</head>

<body>
    <?php include 'libraries/header2.php'; ?>

    <div class="container-fluid">
        <h1 class="page-header"><?php echo $device_label; ?></h1>
        <ol class="breadcrumb">
            <li><a href="manage_server.php?device_id=<?php echo $device_rack; ?>"><?php echo get_server_name($device_parent); ?></a></li>
            <li class="breadcrumb-item active"><?php echo $device_label; ?></li>
        </ol>
        <?php include 'libraries/alerts.php'; ?>
        <div id="content">
            <ul id="mytabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" id="server-tab" href="#server" data-toggle="tab" aria-controls="server" aria-selected="true"><img src="assets/img/calculator.png"> Server</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="other-tab" href="#other" data-toggle="tab" aria-controls="other" aria-selected="false"><img src="assets/img/drive_error.png"> Other</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="delete_device-tab" href="#delete_device" data-toggle="tab" aria-controls="delete_device" aria-selected="false"><img src="assets/img/delete.png"> Delete Device</a>
                </li>
            </ul>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane fade show active" id="server" role="tabpanel" aria-labelledby="server-tab">
                    <?php include_once 'tab_server.php'; ?>
                </div>
                <div class="tab-pane fade" id="rack" role="tabpanel" aria-labelledby="rack-tab">
                    <?php include_once 'tab_rack.php'; ?>
                </div>
                <div class="tab-pane fade" id="capacity" role="tabpanel" aria-labelledby="capacity-tab">
                    <?php include_once 'tab_capacity.php'; ?>
                </div>
                <div class="tab-pane fade" id="rma"  role="tabpanel" aria-labelledby="rma-tab">
                    <?php include_once 'tab_rma.php'; ?>
                </div>
                <div class="tab-pane fade" id="other"  role="tabpanel" aria-labelledby="other-tab">
                    <?php include_once 'tab_other.php'; ?>
                </div>
                <div class="tab-pane fade" id="delete_device" role="tabpanel" aria-labelledby="delete_device-tab">
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <b>Warning</b>
                        <br>
                        Once this device is deleted/removed it cannot be restored back into DCIMStack, any associated data is deleted once the device is removed from DCIMStack. The device & it's associated information will need to be re-added manually later if needed.
                    </div>
                    <a href="delete_device.php?device_id=<?php echo $device_id; ?>" class="btn btn-danger confirmation">Remove Device</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js2.php'; ?>
</body>
</html>
