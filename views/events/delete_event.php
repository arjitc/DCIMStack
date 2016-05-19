<?php
include 'config/db.php';
if ($_SESSION['token'] == $_GET['token'] && isset($_GET['id'])) {
  if(is_numeric($id)) {
    $id = mysqli_real_escape_string($conn, (int)$_GET['id']);
    $sql = "DELETE FROM `events` WHERE `id`='$id'";
    if ($conn->query($sql) === TRUE) {
      $_SESSION['success'] = "Success, Event deleted.";
      unset($_SESSION['token']);
      header('Location: index.php');
    } else {
      $_SESSION['error'] = "Error, Event not deleted.";
      unset($_SESSION['token']);
      header('Location: index.php');
    }
  } if($_GET['id']=="all") {
    $id = mysqli_real_escape_string($conn, (int)$_GET['id']);
    $sql = "DELETE FROM `events`";
    if ($conn->query($sql) === TRUE) {
      $_SESSION['success'] = "Success, Event deleted.";
      unset($_SESSION['token']);
      header('Location: index.php');
    } else {
      $_SESSION['error'] = "Error, Event not deleted.";
      unset($_SESSION['token']);
      header('Location: index.php');
    }
  }
} else {
  $_SESSION['error'] = "Error, Token mismatch.";
  unset($_SESSION['token']);
  header('Location: index.php');
}
?>