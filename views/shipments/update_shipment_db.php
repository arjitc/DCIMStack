<?php
include 'config/db.php';
$tracking_id = mysqli_real_escape_string($conn, $_POST['tracking_id']);
$shipping_courier = mysqli_real_escape_string($conn, $_POST['shipping_courier']);
$delivery_eta = mysqli_real_escape_string($conn, $_POST['delivery_eta']);
if(isset($_GET['delivery_status'])) {
    $delivery_status = mysqli_real_escape_string($conn, $_GET['delivery_status']);
} else {
    $delivery_status = mysqli_real_escape_string($conn, $_POST['delivery_status']);
}

?>