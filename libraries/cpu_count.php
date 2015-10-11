<?php
function device_cpu_count($device_cpu, $device_cpu_count) {
	if($device_cpu_count>1) {
		return $device_cpu_count."x".$device_cpu;
	} else {
		return $device_cpu;
	}
}
?>