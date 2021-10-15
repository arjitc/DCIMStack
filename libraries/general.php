<?php

function convertTimestampToHumanTime($Timestamp) {
    return gmdate("jS M Y h:i:s A", $Timestamp);
}
function convertUserIDToUserName($userID) {
    $row = DB::queryFirstRow("SELECT user_name FROM users WHERE user_id=%s", $userID);
    return $row['user_name'];
}
function getDatacenterNameFromDatacenterID($datacenterID) {
    $row = DB::queryFirstRow("SELECT datacenterName FROM datacenters WHERE id=%s", $datacenterID);
    return $row['datacenterName'];
}
function getDatacenterShortNameFromDatacenterID($datacenterID) {
    $row = DB::queryFirstRow("SELECT datacenterShortName FROM datacenters WHERE id=%s", $datacenterID);
    return $row['datacenterShortName'];
}
function getDatacenterCityFromDatacenterID($datacenterID) {
    $row = DB::queryFirstRow("SELECT datacenterCity FROM datacenters WHERE id=%s", $datacenterID);
    return $row['datacenterCity'];
}
function getDatacenterCountryFromDatacenterID($datacenterID) {
    $row = DB::queryFirstRow("SELECT datacenterCountry FROM datacenters WHERE id=%s", $datacenterID);
    return $row['datacenterCountry'];
}
?>