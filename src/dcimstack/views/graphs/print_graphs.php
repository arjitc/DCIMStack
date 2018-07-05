<?php
include 'graph_functions.php';
include 'libraries/general.php';
$librenms_api_endpoint = lirenms_api_endpoint();
$librenms_api_key = librenms_api_key();
$device_name = get_device_label_from_id($_GET['device_id']);
$port_name = port_name($_GET['port_number']);
$url = $librenms_api_endpoint."".$device_name."/ports/".$port_name."/port_bits";
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, '3');
curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Auth-Token: $librenms_api_key"));
$content = trim(curl_exec($ch));
curl_close($ch);
header("Content-Type: image/png");
print $content;
?>