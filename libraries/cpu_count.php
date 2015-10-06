<?php
function server_cpu_count($server_cpu, $server_cpu_count) {
	if($server_cpu_count>1) {
		return $server_cpu_count."x".$server_cpu;
	} else {
		return $server_cpu;
	}
}
?>