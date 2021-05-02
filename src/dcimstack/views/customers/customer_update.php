<?php
include 'config/db.php';
$customer_id    = mysqli_real_escape_string($conn, $_POST['customer_id']);
$customer_name  =  mysqli_real_escape_string($conn, $_POST['customer_name']);
$customer_notes = mysqli_real_escape_string($conn, $_POST['customer_notes']);
$customer_link  = mysqli_real_escape_string($conn, $_POST['customer_link']);

if(isset($_POST['customer_name'], $_POST['customer_id'])) {
    $sql = "UPDATE `customers` SET `customer_name`='$customer_name' WHERE `id`='$customer_id'";
    $conn->query($sql);
    $_SESSION['success'] = "Success, Customer Updated.";
} 
if(isset($_POST['customer_notes'], $_POST['customer_id'])) {
    $sql = "UPDATE `customers` SET `customer_notes`='$customer_notes' WHERE `id`='$customer_id'";
    $conn->query($sql);
    $_SESSION['success'] = "Success, Customer updated.";
}
if(isset($_POST['customer_link'], $_POST['customer_id'])) {
    $sql = "UPDATE `customers` SET `customer_link`='$customer_link' WHERE `id`='$customer_id'";
    $conn->query($sql);
    $_SESSION['success'] = "Success, Customer updated.";
}

header('Location: customers.php');
?>