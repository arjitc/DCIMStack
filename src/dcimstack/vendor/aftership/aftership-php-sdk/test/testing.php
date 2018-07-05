<?php

echo '
<html>
<head>
<title>Testing</title>
<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$(function(){
	$(".btn").click(function(){
		var value = $(this).val();
		$("#hidden").val(value);
		$("#form").submit();
	});
});
</script>
</head>

<body>
';

require('../src/AfterShip/Exception/AftershipException.php');
require('../src/AfterShip/Core/Request.php');
require('../src/AfterShip/Couriers.php');
require('../src/AfterShip/Trackings.php');
require('../src/AfterShip/Notifications.php');
require('../src/AfterShip/LastCheckPoint.php');

$action = isset($_GET['action']) ? $_GET['action'] : '';
$api_key = isset($_GET['api_key']) ? $_GET['api_key'] : '';
$request_all = ($action == 'ALL');

echo '<img src="https://www.aftership.com/assets/common/img/logo-aftership-premium-bright.png"/>';
echo '<h1>AfterShip API PHP SDK Testing</h1>';
echo 'This is the offical PHP SDK of AfterShip API. Provided by AfterShip ';
echo '<a href="support@aftership.com">support@aftership.com</a>';
print '</br>';

echo '<form action="testing.php" method="get" id="form">';
echo 'API KEY: ';
print '<input type="text" value="' . $api_key . '" name="api_key" size="45"/>';
print ' <a href="http://aftership.uservoice.com/knowledgebase/articles/401963">How to generate AfterShip API Key?</a>';
print '</br>';
echo 'Request All: ';
print '<input type="button" value="ALL" class="btn"/>';
print '</br>';
echo 'ACTION: ' . $action;
print '</br>';

print '<hr>';

if (!$api_key) {
	echo '</br>';
	echo '<b>Plase input API key first</b>';
	exit;
}

function p($arr) {
	print '<div class="response">';
	print '<pre style="width: 800px; height: 20pc; overflow-y: scroll; background-color:#CCCCCC">';
	print_r($arr);
	print '</pre>';
	print '</div>';
	print '</br>';
}


echo '<input type="hidden" name="action" id="hidden"/>';

$couriers = new AfterShip\Couriers($api_key);

echo '<h2>Couriers</h2>';
echo '<input type="button" value="couriers_get" class="btn">' . 'get user\'s couriers' . '</br>';
if ($request_all || $action == 'couriers_get') {
	try{
		p($couriers->get());
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="couriers_get_all" class="btn">' . 'get all couriers' . '</br>';
if ($request_all || $action == 'couriers_get_all') {
	try{
		p($couriers->get_all());
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="couriers_detect" class="btn">' . 'detect courier by tracking number' . '</br>';
if ($request_all || $action == 'couriers_detect') {
	try{
		p($couriers->detect('1ZV90R483A33906706'));
	}catch(Exception $e){
		p($e);
	}
}


$trackings = new AfterShip\Trackings($api_key);
echo '<h2>Trackings</h2>';
echo '<input type="button" value="trackings_create" class="btn">' . 'create tracking' . '</br>';
if ($request_all || $action == 'trackings_create') {
	try{
		p($trackings->create('1ZV90R483A33906705'));
	}catch(Exception $e){
		p($e);
	}
}

/*
echo '<input type="button" value="couriers_get" class="btn">'.'batch create'.'</br>';
if ($request_all || $action == 'couriers_get'){
p($trackings->batch_create(array('1ZV90R483A33906706')));
}
*/

echo '<input type="button" value="trackings_delete" class="btn">' . 'delete tracking' . '</br>';
if ($request_all || $action == 'trackings_delete') {
	try{
		p($trackings->delete('ups', '1ZV90R483A33906705'));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="trackings_delete_by_id" class="btn">' . 'delete tracking by id' . '</br>';
if ($request_all || $action == 'trackings_delete_by_id') {
	try{
		p($trackings->delete_by_id('53df4d66868a6df243b6f882'));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="trackings_get_all" class="btn">' . 'get all trackings' . '</br>';
if ($request_all || $action == 'trackings_get_all') {
	try{
		p($trackings->get_all(array(
			'slug' => 'ups',
			'fields' => 'title,order_id,message,country_name'
			)));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="trackings_get" class="btn">' . 'get a tracking' . '</br>';
if ($request_all || $action == 'trackings_get') {
	try{
		p($trackings->get('ups', '1ZV90R483A33906706'));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="trackings_get_by_id" class="btn">' . 'get a tracking by id' . '</br>';
if ($request_all || $action == 'trackings_get_by_id') {
	try{
		p($trackings->get_by_id('53df4a90868a6df243b6efd8', array(
			'fields' => 'customer_name'
			)));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="trackings_update" class="btn">' . 'update a tracking' . '</br>';
if ($request_all || $action == 'trackings_update') {
	try{
		p($trackings->update('ups', '1ZV90R483A33906706', array(
			'title' => 'haha'
			)));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="trackings_update_by_id" class="btn">' . 'update a tracking by id' . '</br>';
if ($request_all || $action == 'trackings_update_by_id') {
	try{
		p($trackings->update_by_id('53df4a90868a6df243b6efd8'), array(
			'title' => 'T1',
			'customer_name' => 'Sunny'
			));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="trackings_retrack" class="btn">' . 'retrack a tracking' . '</br>';
if ($request_all || $action == 'trackings_retrack') {
	try{
		p($trackings->retrack('ups', '1ZV90R483A33906706'));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="trackings_retrack_by_id" class="btn">' . 'retrack a tracking by id' . '</br>';
if ($request_all || $action == 'trackings_retrack_by_id') {
	try{
		p($trackings->retrack_by_id('53df4a90868a6df243b6efd8'));
	}catch(Exception $e){
		p($e);
	}
}

$last_check_point = new AfterShip\LastCheckPoint($api_key);
echo '<h2>Last Check Point</h2>';
echo '<input type="button" value="last_check_point_get" class="btn">' . 'get' . '</br>';
if ($request_all || $action == 'last_check_point_get') {
	try{
		p($last_check_point->get('ups', '1ZV90R483A33906706'));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="last_check_point_get_by_id" class="btn">' . 'get by id' . '</br>';
if ($request_all || $action == 'last_check_point_get_by_id') {
	try{
		p($last_check_point->get_by_id('53df4a90868a6df243b6efd8', array(
			'fields' => 'city,zip,state'
			)));
	}catch(Exception $e){
		p($e);
	}
}


$notifications = new AfterShip\Notifications($api_key);
echo '<h2>Notifications</h2>';

echo '<input type="button" value="notifications_create" class="btn">' . 'create notification' . '</br>';
if ($request_all || $action == 'notifications_create') {
	try{
		p($notifications->create('ups', '1ZV90R483A33906706', array(
			'emails' => ['youremail@yourdomain.com']
			)));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="notifications_create_by_id" class="btn">' . 'create notification by id' . '</br>';
if ($request_all || $action == 'notifications_create_by_id') {
	try{
		p($notifications->create_by_id('53df4a90868a6df243b6efd8'));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="notifications_delete" class="btn">' . 'delete notification' . '</br>';
if ($request_all || $action == 'notifications_delete') {
	try{
		p($notifications->delete('ups', '1ZV90R483A33906706', array(
			'emails' => ['youremail@yourdomain.com']
			)));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="notifications_delete_by_id" class="btn">' . 'delete notification by id' . '</br>';
if ($request_all || $action == 'notifications_delete_by_id') {
	try{
		p($notifications->delete_by_id('53df4d66868a6df243b6f882'));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="notifications_get" class="btn">' . 'get a notification' . '</br>';
if ($request_all || $action == 'notifications_get') {
	try{
		p($notifications->get('ups', '1ZV90R483A33906706'));
	}catch(Exception $e){
		p($e);
	}
}

echo '<input type="button" value="notifications_get_by_id" class="btn">' . 'get a notification by id' . '</br>';
if ($request_all || $action == 'notifications_get_by_id') {
	try{
		p($notifications->get_by_id('53df4a90868a6df243b6efd8', array(
			'fields' => 'customer_name'
			)));
	}catch(Exception $e){
		p($e);
	}
}


echo '</form>';

echo '
</body>
</html>';