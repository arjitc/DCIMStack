<?php

include_once('config/db.php');
include 'libraries/general.php';
$ip = mysqli_real_escape_string($conn, $_GET['ip']);

?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><img src='assets/img/lorry_go.png'> Checking - <?php echo $ip; ?></h4>
        </div>
        <div class="modal-body">
            <div id="content">
	

            
<?PHP
echo"Please Wait<br>";
function flush_buffers(){ 
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
                echo "<font color='red'>Listed on ".$host."!</font><br>";
                flush_buffers();
                $BadCount++;
		}

            }
            else
            {
		include 'config/db.php';
		$sql = "UPDATE `bipm_iplist` SET `".$host."`='No' WHERE `ip`='$ip'";
		if ($conn->query($sql) === TRUE) {
                echo "<font color='green'>Not listed on ".$host."!</font><br>";
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
        echo "<br>This IP has $BadCount bad listings of $AllCount<br>";
        flush_buffers();
	}

}

if(preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/",@$_GET['ip']) == true)
{
    dnsbllookup($_GET['ip']);
}
?>



	    </div>
        </div>
 </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>