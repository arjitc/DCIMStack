<?php
include 'config/db.php';
$shipment_id     = mysqli_real_escape_string($conn, $_GET['shipment_id']);
$shipment_status = mysqli_real_escape_string($conn, $_GET['status']);
if(empty($shipment_status)) {
	$shipment_status = mysqli_real_escape_string($conn, $_GET['archive']);
}
if(isset($shipment_id, $shipment_status) && ctype_digit($shipment_id)) {
	if($shipment_status=="undelivered") {
		$shipment_status = ucfirst($shipment_status);
		$sql = "UPDATE `shipments` SET `shipment_status`='$shipment_status' WHERE `id`='$shipment_id'";
		$conn->query($sql);
		$_SESSION['success'] = "Success, Shipment status updated.";
		header('Location: shipments.php');
	}
	if($shipment_status=="delivered") {
		$shipment_status = ucfirst($shipment_status);
		$sql = "UPDATE `shipments` SET `shipment_status`='$shipment_status' WHERE `id`='$shipment_id'";
		$conn->query($sql);
		$_SESSION['success'] = "Success, Shipment status updated.";
		header('Location: shipments.php');
	}
	if($shipment_status=="0") {
		$shipment_status = ucfirst($shipment_status);
		$sql = "UPDATE `shipments` SET `shipment_archived`='$shipment_status' WHERE `id`='$shipment_id'";
		$conn->query($sql);
		$_SESSION['success'] = "Success, Shipment status updated.";
		header('Location: shipments.php');
	}
	if($shipment_status=="1") {
		$shipment_status = ucfirst($shipment_status);
		$sql = "UPDATE `shipments` SET `shipment_archived`='$shipment_status' WHERE `id`='$shipment_id'";
		$conn->query($sql);
		$_SESSION['success'] = "Success, Shipment status updated.";
		header('Location: shipments.php');
	}
} else {
	$_SESSION['error'] = "Error, Shipment status not updated.";
	header('Location: shipments.php');
}
?>