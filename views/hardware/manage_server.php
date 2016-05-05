<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DCIMStack</title>
    <?php
    include 'libraries/css.php';
    include 'libraries/general.php';
    include 'config/db.php';
    if (!ctype_digit($_GET['device_id'])) {
        header('Location: index.php');
    } else {
        $device_id = $_GET['device_id'];
    $_SESSION['referrer'] = "manage_server.php?device_id=$device_id"; //manually set it here.
    $device_id = mysqli_real_escape_string($conn, $_GET['device_id']);
    $sql = "SELECT * FROM `devices` WHERE `device_id`='$device_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $device_id        = $row["device_id"];
            $device_label     = $row["device_label"];
            $device_brand     = $row["device_brand"];
            $device_type      = $row["device_type"];
            $device_serial    = $row["device_serial"];
            $device_capacity  = $row["device_capacity"];
            $device_cpu       = $row["device_cpu"];
            $device_cpu_count = $row["device_cpu_count"];
            $device_ram_total = $row["device_ram_total"];
            $device_mgmt_ip   = $row["device_mgmt_ip"];
            $device_mgmt_mac  = $row["device_mgmt_mac"];
            $device_mac       = $row["device_mac"];
        }
    }
}
?>
</head>

<body>
    <?php include 'libraries/header.php'; ?>

    <div class="container">
        <h1 class="page-header">Manage Server <?php echo $device_label; ?></h1>
        <?php include 'libraries/alerts.php'; ?>
        <div id="content">
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#cpu_ram" data-toggle="tab"><img src="assets/img/calculator.png"> CPU / RAM</a></li>
                <li><a href="#server_information" data-toggle="tab"><img src="assets/img/layout_content.png"> Server information</a></li>
                <li><a href="#mgmt_ipmi" data-toggle="tab"><img src="assets/img/link.png"> MGMT/IPMI</a></li>
                <li><a href="#delete_device" data-toggle="tab"><img src="assets/img/link.png"> Delete Device</a></li>
            </ul>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="cpu_ram">
                    <?php include 'manage_server/tab_cpu_ram.php'; ?>
                </div>
                <div class="tab-pane" id="server_information">
                    <?php include 'manage_server/tab_server_information.php'; ?>
                </div>
                <div class="tab-pane" id="mgmt_ipmi">
                    <?php include 'manage_server/tab_mgmt_ipmi.php'; ?>
                </div>
                <div class="tab-pane" id="delete_device">
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
    <!-- Bootstrap core JavaScript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js.php'; ?>
</body>
</html>