<?php
function print_ports($physical_label, $port_count) {
	$count = 1;
		echo "<h4>$physical_label</h4>";
		echo "<hr>";
		for($i=0; $i<4; $i++) {
			echo "<div class='row'>";
			for($j=0; $j<$port_count; $j++) {
				echo "<div class='col-md-2'>";
				echo "<div class='panel panel-success'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'><center><small>Port</small><br> $count</center></h3>
					  </div>
					  <div class='panel-body'>
					    Panel content
					  </div>
					</div>";
				echo "</div>";
				$count++;
			}
			echo "</div>";
		}
	}
?>