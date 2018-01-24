<?php

include_once('config/db.php');
include 'libraries/general.php';
$ip_range_node = mysqli_real_escape_string($conn, $_GET['ip_range_node']);

$sql = "SELECT value FROM settings WHERE id='9'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	$lock = $row["value"];
    }
}

if ($lock == 'Yes') {
	echo"I am running";
	exit;
}

$sql = "UPDATE settings SET value='Yes' WHERE id='9'";

if ($conn->query($sql) === TRUE) {
    echo "I have locked mass lookup while running.<br>";
}

function flush_buffers() { 
    ob_end_flush(); 
    flush(); 
    ob_start(); 
}

function dnsbllookup($ip)
{
$dnsbl_lookup=array(
"all.s5h.net",
"b.barracudacentral.org",
"bl.emailbasura.org",
"bl.spamcannibal.org",
"bl.spamcop.net",
"blacklist.woody.ch",
"bogons.cymru.com",
"cbl.abuseat.org",
"cdl.anti-spam.org.cn",
"combined.abuse.ch",
"db.wpbl.info",
"dnsbl-1.uceprotect.net",
"dnsbl-2.uceprotect.net",
"dnsbl-3.uceprotect.net",
"dnsbl.anticaptcha.net",
"dnsbl.cyberlogic.net",
"dnsbl.dronebl.org",
"dnsbl.inps.de",
"dnsbl.sorbs.net",
"dnsbl.spfbl.net",	
"drone.abuse.ch",
"duinv.aupads.org",
"dul.dnsbl.sorbs.net",
"dyna.spamrats.com",
"dynip.rothen.com",
"exitnodes.tor.dnsbl.sectoor.de",
"http.dnsbl.sorbs.net",
"ips.backscatterer.org",
"ix.dnsbl.manitu.net",
"korea.services.net",
"misc.dnsbl.sorbs.net",
"noptr.spamrats.com",
"orvedb.aupads.org",
"pbl.spamhaus.org",
"proxy.bl.gweep.ca",
"psbl.surriel.com",
"relays.bl.gweep.ca",
"relays.nether.net",
"sbl.spamhaus.org",
"short.rbl.jp",
"singular.ttk.pte.hu",
"smtp.dnsbl.sorbs.net",
"socks.dnsbl.sorbs.net",
"spam.abuse.ch",
"spam.dnsbl.anonmails.de",
"spam.dnsbl.sorbs.net",
"spam.spamrats.com",
"spambot.bls.digibase.ca",
"spamrbl.imp.ch",
"spamsources.fabel.dk",
"ubl.lashback.com",
"ubl.unsubscore.com",
"virus.rbl.jp",
"web.dnsbl.sorbs.net",
"wormrbl.imp.ch",
"xbl.spamhaus.org",
"z.mailspike.net",
"zen.spamhaus.org",
"zombie.dnsbl.sorbs.net",
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
		include 'config/db.php';
		$sql = "UPDATE bipm_iplist SET `".$host."`='Yes' WHERE ip='$ip'";
		if ($conn->query($sql) == TRUE) {
                flush_buffers();
                $BadCount++;
		}

            }
            else
            {
		include 'config/db.php';
		$sql = "UPDATE `bipm_iplist` SET `".$host."`='No' WHERE `ip`='$ip'";
		if ($conn->query($sql) === TRUE) {
                flush_buffers();
		}
            }
        }
    }
    else
    {
        echo "Empty IP!<br>";
        flush_buffers();
    }

	$sql = "UPDATE `bipm_iplist` SET total='$BadCount' WHERE `ip`='$ip'";
	if ($conn->query($sql) === TRUE) {
        flush_buffers();
	}

}

$sql = "SELECT ip FROM `bipm_iplist` WHERE ip_node = '$ip_range_node'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
$ip = $row["ip"];
echo"$ip<br>";
if(preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/",$ip) == true)
{
    dnsbllookup($ip);
    sleep(3);
}
}
}
$sql = "UPDATE settings SET value='No' WHERE id='9'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
?>
