<?php
function displayAlerts() {
    if (isset($_SESSION['success'])) {
        $message = $_SESSION['success'];
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
        echo "<i class='bi bi-check2'></i> ". $message;
        echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        echo "</div>";
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        $message = $_SESSION['error'];
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
        echo "<i class='bi bi-x'></i> ". $message;
        echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        echo "</div>";
        unset($_SESSION['error']);
    }    
}
