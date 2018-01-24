<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DCIMStack</title>
	<?php 
	include 'libraries/css.php';
	include 'libraries/general.php'; 
	?>
</head>

<body>

	<?php include 'libraries/header.php'; 
	$ip_range = mysqli_real_escape_string($conn, $_GET['ip_range']);
	$sql = "SELECT * FROM `bipm` WHERE id = '$ip_range'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($result->num_rows) {
		$ip_node_name = $row['ip_range'];
	}
	?>

	<div class="container">
		<h1 class="page-header">Managing <?PHP echo $ip_node_name; ?>
			<div class='pull-right'>
				<button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_ip_range">
					<img src='assets/img/add.png'> Add</a>
				</button>
			</div>
		</h1>
		<?php include 'libraries/alerts.php';
		include 'config/db.php';
		$ip_range = mysqli_real_escape_string($conn, $_GET['ip_range']);
		$sql = "SELECT * FROM `bipm_iplist` WHERE ip_node = '$ip_range' ORDER BY ID ASC";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
                // output data of each row
			echo "<table class='table' id='search_table'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>IP Address</th>";
			echo "<th>Check IP</th>";
			echo "<th>Bad Sites</th>";
			echo "<th>View Results</th>";
			echo "</tr>";
			echo "</thead>";
			while ($row = $result->fetch_assoc()) {
				$ip = $row['ip'];
				$id = $row['id'];
				echo "<tr>";
				echo "<td>".htmlspecialchars($row['ip'])."</td>";				
				echo "<td><center><a href='dnsbl.php?ip=$ip' data-remote='false' data-toggle='ajaxModal' data-target='#myModal'>Check IP</a></center></td>";
				echo "<td>".htmlspecialchars($row['total'])."</td>";				
				echo "<td><center><a href='results.php?id=$id' data-remote='false' data-toggle='ajaxModal' data-target='#myModal'>View Results</a></center></td>";

	
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
		?>
	</div>

	<!-- Check IP -->
	<div id="check_ip" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body">
<?PHP
function flush_buffers(){ 
    ob_end_flush(); 
    flush(); 
    ob_start(); 
} 

function dnsbllookup($ip)
{
    $dnsbl_lookup=array(
    "b.barracudacentral.org",
    "bl.spamcop.net",
    "block.dnsbl.sorbs.net",
    "cbl.abuseat.org",
    "dialups.mail-abuse.org",
    "dnsbl.sorbs.net",
    "dnsbl-1.uceprotect.net",
    "dnsbl-2.uceprotect.net",
    "dnsbl-3.uceprotect.net",
    "dul.dnsbl.sorbs.net",
    "escalations.dnsbl.sorbs.net",
    "http.dnsbl.sorbs.net",
    "misc.dnsbl.sorbs.net",
    "new.dnsbl.sorbs.net",
    "old.dnsbl.sorbs.net",
    "pbl.spamhaus.org",
    "proxy.bl.gweep.ca",
    "psbl.surriel.com",
    "rbl.schulte.org",
    "rbl.snark.net",
    "recent.dnsbl.sorbs.net",
    "relays.mail-abuse.org",
    "sbl.spamhaus.org",
    "smtp.dnsbl.sorbs.net",
    "socks.dnsbl.sorbs.net",
    "spam.dnsbl.sorbs.net",
    "web.dnsbl.sorbs.net",
    "whois.rfc-ignorant.org",
    "xbl.spamhaus.org",
    "zen.spamhaus.org",
    "zombie.dnsbl.sorbs.net",
    "dnsbl.abuse.ch",
    ); // Add your preferred list of DNSBL's

    $AllCount = count($dnsbl_lookup);
    $BadCount = 0;
    if($ip)
    {
        $reverse_ip = implode(".", array_reverse(explode(".", $ip)));
        foreach($dnsbl_lookup as $host)
        {
            if(checkdnsrr($reverse_ip.".".$host.".", "A"))
            {
                echo "<font color='red'>Listed on ".$host."!</font><br>";
                flush_buffers();
                $BadCount++;
            }
            else
            {
                echo "<font color='green'>Not listed on ".$host."!</font><br>";
                flush_buffers();
            }
        }
    }
    else
    {
        echo "Empty IP!<br>";
        flush_buffers();
    }

    echo "<br>This IP has $BadCount bad listings of $AllCount<br>";
    flush_buffers();

}

if(preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/",@$_GET['ip']) == true)
{
    dnsbllookup($_GET['ip']);
}
?>


				</div>
				<div class="modal-footer">
					<input type="submit" form="add_ips" class="btn btn-primary">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js.php'; ?>
</body>
</html>
