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
        $_SESSION['referrer'] = "manage_disk.php?device_id=$device_id"; //manually set it here.
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
            }
        }
    }
    ?>
</head>

<body>
    <?php include 'libraries/header2.php'; ?>

    <div class="container-fluid">
        <h1 class="page-header"><?php echo $device_label; ?></h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="manage_rackspace.php"><?php echo get_rack_location($device_rack); ?></a></li>
            <li class="breadcrumb-item"><a href="rackspace.php?rackid=<?php echo $device_rack; ?>"><?php echo get_rack_name_from_device_id($device_id); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $device_label; ?></li>
        </ol>
    </nav>
    <?php include 'libraries/alerts.php'; ?>
    <div id="content">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a href="#disk_information" class="nav-link active" data-toggle="tab"><img src="assets/img/drive.png"> Disk Information</a>
        </li>
        <li class="nav-item">
            <li><a href="#server" class="nav-link" data-toggle="tab"><img src="assets/img/calculator.png"> Server</a></li>
        </li>
        <li class="nav-item">
            <li><a href="#rack" class="nav-link" data-toggle="tab"><img src="assets/img/building.png"> Rack</a></li>
        </li>
        <li class="nav-item">
            <li><a href="#capacity" class="nav-link" data-toggle="tab"><img src="assets/img/drive.png"> Capacity</a></li>
        </li>
        <li class="nav-item">
            <li><a href="#rma" class="nav-link" data-toggle="tab"><img src="assets/img/drive_go.png"> RMA</a></li>
        </li>
        <li class="nav-item">
            <li><a href="#other" class="nav-link" data-toggle="tab"><img src="assets/img/drive_error.png"> Other</a></li>
        </li>
        <li class="nav-item">
            <li><a href="#delete_device" class="nav-link" data-toggle="tab"><img src="assets/img/delete.png"> Delete Device</a></li>
        </li>
    </ul>
    <div id="my-tab-content" class="tab-content">

        <div class="tab-pane active" id="disk_information">
          <?php include_once 'tab_disk_information.php'; ?>
        </div>
        <div class="tab-pane" id="server">
            <?php include_once 'tab_server.php'; ?>
        </div>
        <div class="tab-pane" id="rack">
            <?php include_once 'tab_rack.php'; ?>
        </div>
        <div class="tab-pane" id="capacity">
            <?php include_once 'tab_capacity.php'; ?>
        </div>
        <div class="tab-pane" id="rma">
            <?php include_once 'tab_rma.php'; ?>
        </div>
        <div class="tab-pane" id="other">
            <?php include_once 'tab_other.php'; ?>
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
<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<?php include 'libraries/js2.php'; ?>
</body>
</html>
