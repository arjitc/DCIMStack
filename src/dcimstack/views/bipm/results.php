<?php
include 'config/db.php';
include 'libraries/general.php';
$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM `bipm_iplist` WHERE `id`='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
$ip = $row["ip"];
$alls5hnet = $row["all.s5h.net"];
$barracudacentralorg = $row["b.barracudacentral.org"];
$blemailbasuraorg = $row["bl.emailbasura.org"];
$blspamcannibalorg = $row["bl.spamcannibal.org"];
$blspamcopnet = $row["bl.spamcop.net"];
$blacklistwoodych = $row["blacklist.woody.ch"];
$bogonscymrucom = $row["bogons.cymru.com"];
$cblabuseatorg = $row["cbl.abuseat.org"];
$cdlantispamorgcn = $row["cdl.anti-spam.org.cn"];
$combinedabusech = $row["combined.abuse.ch"];
$dbwpblinfo = $row["db.wpbl.info"];
$dnsbl1uceprotectnet = $row["dnsbl-1.uceprotect.net"];
$dnsbl2uceprotectnet = $row["dnsbl-2.uceprotect.net"];
$dnsbl3uceprotectnet = $row["dnsbl-3.uceprotect.net"];
$dnsblanticaptchanet = $row["dnsbl.anticaptcha.net"];
$dnsblcyberlogicnet = $row["dnsbl.cyberlogic.net"];
$dnsbldroneblorg = $row["dnsbl.dronebl.org"];
$dnsblinpsde = $row["dnsbl.inps.de"];
$dnsblsorbsnet = $row["dnsbl.sorbs.net"];
$dnsblspfblnet = $row["dnsbl.spfbl.net"];
$droneabusech = $row["drone.abuse.ch"];
$duinvaupadsorg = $row["duinv.aupads.org"];
$duldnsblsorbsnet = $row["dul.dnsbl.sorbs.net"];
$dynaspamratscom = $row["dyna.spamrats.com"];
$dyniprothencom = $row["dynip.rothen.com"];
$exitnodestordnsblsectoorde = $row["exitnodes.tor.dnsbl.sectoor.de"];
$httpdnsblsorbsnet = $row["http.dnsbl.sorbs.net"];
$ipsbackscattererorg = $row["ips.backscatterer.org"];
$ixdnsblmanitunet = $row["ix.dnsbl.manitu.net"];
$koreaservicesnet = $row["korea.services.net"];
$miscdnsblsorbsnet = $row["misc.dnsbl.sorbs.net"];
$noptrspamratscom = $row["noptr.spamrats.com"];
$orvedbaupadsorg = $row["orvedb.aupads.org"];
$pblspamhausorg = $row["pbl.spamhaus.org"];
$proxyblgweepca = $row["proxy.bl.gweep.ca"];
$psblsurrielcom = $row["psbl.surriel.com"];
$relaysblgweepca = $row["relays.bl.gweep.ca"];
$relaysnethernet = $row["relays.nether.net"];
$sblspamhausorg = $row["sbl.spamhaus.org"];
$shortrbljp = $row["short.rbl.jp"];
$singularttkptehu = $row["singular.ttk.pte.hu"];
$smtpdnsblsorbsnet = $row["smtp.dnsbl.sorbs.net"];
$socksdnsblsorbsnet = $row["socks.dnsbl.sorbs.net"];
$spamabusech = $row["spam.abuse.ch"];
$spamdnsblanonmailsde = $row["spam.dnsbl.anonmails.de"];
$spamdnsblsorbsnet = $row["spam.dnsbl.sorbs.net"];
$spamspamratscom = $row["spam.spamrats.com"];
$spambotblsdigibaseca = $row["spambot.bls.digibase.ca"];
$spamrblimpch = $row["spamrbl.imp.ch"];
$spamsourcesfabeldk = $row["spamsources.fabel.dk"];
$ubllashbackcom = $row["ubl.lashback.com"];
$ublunsubscorecom = $row["ubl.unsubscore.com"];
$virusrbljp = $row["virus.rbl.jp"];
$webdnsblsorbsnet = $row["web.dnsbl.sorbs.net"];
$wormrblimpch = $row["wormrbl.imp.ch"];
$xblspamhausorg = $row["xbl.spamhaus.org"];
$zmailspikenet = $row["z.mailspike.net"];
$zenspamhausorg = $row["zen.spamhaus.org"];
$zombiednsblsorbsnet = $row["zombie.dnsbl.sorbs.net"];
	}
}
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><img src='assets/img/lorry_go.png'> Records of <?php echo $ip; ?></h4>
        </div>
        <div class="modal-body">
            <div id="content">
		<?PHP
		echo"<table style='width:100%'>";
		echo"<td width='70%'>Site</td> <td>Result</td><tr>";

		if ($alls5hnet == 'No') {
		$alls5hnet = "<font color=green>No</font>";
		} ELSE {
		$alls5hnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>all.s5h.net</td> <td> $alls5hnet </td><tr>";
		
		if ($barracudacentralorg == 'No') {
		$barracudacentralorg = "<font color=green>No</font>";
		} ELSE {
		$barracudacentralorg = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>b.barracudacentral.org</td> <td> $barracudacentralorg</td><tr>";

		if ($blemailbasuraorg == 'No') {
		$blemailbasuraorg = "<font color=green>No</font>";
		} ELSE {
		$blemailbasuraorg = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>bl.emailbasura.org</td> <td> $blemailbasuraorg </td><tr>";

		if ($blspamcannibalorg == 'No') {
		$blspamcannibalorg = "<font color=green>No</font>";
		} ELSE {
		$blspamcannibalorg = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>bl.spamcannibal.org </td> <td>$blspamcannibalorg </td><tr>";

		if ($blspamcopnet == 'No') {
		$blspamcopnet = "<font color=green>No</font>";
		} ELSE {
		$blspamcopnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>bl.spamcop.net</td> <td> $blspamcopnet </td><tr>";

		if ($blacklistwoodych == 'No') {
		$blacklistwoodych = "<font color=green>No</font>";
		} ELSE {
		$blacklistwoodych = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>blacklist.woody.ch</td> <td> $blacklistwoodych</td><tr>";

		if ($bogonscymrucom == 'No') {
		$bogonscymrucom = "<font color=green>No</font>";
		} ELSE {
		$bogonscymrucom = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>bogons.cymru.com</td> <td> $bogonscymrucom </td><tr>";

		if ($cblabuseatorg == 'No') {
		$cblabuseatorg = "<font color=green>No</font>";
		} ELSE {
		$cblabuseatorg = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>cbl.abuseat.org</td> <td> $cblabuseatorg </td><tr>";

		if ($cdlantispamorgcn == 'No') {
		$cdlantispamorgcn = "<font color=green>No</font>";
		} ELSE {
		$cdlantispamorgcn = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>cdl.anti-spam.org.cn</td> <td> $cdlantispamorgcn </td><tr>";

		if ($combinedabusech == 'No') {
		$combinedabusech = "<font color=green>No</font>";
		} ELSE {
		$combinedabusech = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>combined.abuse.ch</td> <td> $combinedabusech </td><tr>";

		if ($dbwpblinfo == 'No') {
		$dbwpblinfo = "<font color=green>No</font>";
		} ELSE {
		$dbwpblinfo = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>db.wpbl.info</td> <td> $dbwpblinfo </td><tr>";

		if ($dnsbl1uceprotectnet == 'No') {
		$dnsbl1uceprotectnet = "<font color=green>No</font>";
		} ELSE {
		$dnsbl1uceprotectnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>dnsbl-1.uceprotect.net</td> <td> $dnsbl1uceprotectnet </td><tr>";

		if ($dnsbl2uceprotectnet == 'No') {
		$dnsbl2uceprotectnet = "<font color=green>No</font>";
		} ELSE {
		$dnsbl2uceprotectnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>dnsbl-2.uceprotect.net</td> <td> $dnsbl2uceprotectnet </td><tr>";

		if ($dnsbl3uceprotectnet == 'No') {
		$dnsbl3uceprotectnet = "<font color=green>No</font>";
		} ELSE {
		$dnsbl3uceprotectnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>dnsbl-3.uceprotect.net</td> <td> $dnsbl3uceprotectnet </td><tr>";

		if ($dnsblanticaptchanet == 'No') {
		$dnsblanticaptchanet = "<font color=green>No</font>";
		} ELSE {
		$dnsblanticaptchanet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'> dnsbl.anticaptcha.net</td> <td> $dnsblanticaptchanet</td><tr>";

		if ($dnsblcyberlogicnet == 'No') {
		$dnsblcyberlogicnet = "<font color=green>No</font>";
		} ELSE {
		$dnsblcyberlogicnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>dnsbl.cyberlogic.net</td> <td> $dnsblcyberlogicnet </td><tr>";

		if ($dnsbldroneblorg == 'No') {
		$dnsbldroneblorg = "<font color=green>No</font>";
		} ELSE {
		$dnsbldroneblorg = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'> dnsbl.dronebl.org</td> <td> $dnsbldroneblorg</td><tr>";

		if ($dnsblinpsde == 'No') {
		$dnsblinpsde = "<font color=green>No</font>";
		} ELSE {
		$dnsblinpsde = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>dnsbl.inps.de</td> <td> $dnsblinpsde </td><tr>";

		if ($dnsblsorbsnet == 'No') {
		$dnsblsorbsnet = "<font color=green>No</font>";
		} ELSE {
		$dnsblsorbsnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>dnsbl.sorbs.net</td> <td> $dnsblsorbsnet </td><tr>";

		if ($dnsblspfblnet == 'No') {
		$dnsblspfblnet= "<font color=green>No</font>";
		} ELSE {
		$dnsblspfblnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>dnsbl.spfbl.net</td> <td> $dnsblspfblnet </td><tr>";

		if ($droneabusech == 'No') {
		$droneabusech = "<font color=green>No</font>";
		} ELSE {
		$droneabusech = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>drone.abuse.ch</td> <td> $droneabusech </td><tr>";

		if ($duinvaupadsorg == 'No') {
		$duinvaupadsorg = "<font color=green>No</font>";
		} ELSE {
		$duinvaupadsorg = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>duinv.aupads.org</td> <td> $duinvaupadsorg </td><tr>";

		if ($duldnsblsorbsnet == 'No') {
		$duldnsblsorbsnet = "<font color=green>No</font>";
		} ELSE {
		$duldnsblsorbsnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>dul.dnsbl.sorbs.net</td> <td> $duldnsblsorbsnet </td><tr>";

		if ($dynaspamratscom == 'No') {
		$dynaspamratscom = "<font color=green>No</font>";
		} ELSE {
		$dynaspamratscom = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>dyna.spamrats.com</td> <td> $dynaspamratscom </td><tr>";

		if ($dyniprothencom == 'No') {
		$dyniprothencom = "<font color=green>No</font>";
		} ELSE {
		$dyniprothencom = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>dynip.rothen.com</td> <td> $dyniprothencom </td><tr>";

		if ($exitnodestordnsblsectoorde == 'No') {
		$exitnodestordnsblsectoorde = "<font color=green>No</font>";
		} ELSE {
		$exitnodestordnsblsectoorde = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>exitnodes.tor.dnsbl.sectoor.de</td> <td> $exitnodestordnsblsectoorde </td><tr>";

		if ($httpdnsblsorbsnet == 'No') {
		$httpdnsblsorbsnet = "<font color=green>No</font>";
		} ELSE {
		$httpdnsblsorbsnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>http.dnsbl.sorbs.net</td> <td> $httpdnsblsorbsnet </td><tr>";

		if ($ipsbackscattererorg == 'No') {
		$ipsbackscattererorg = "<font color=green>No</font>";
		} ELSE {
		$ipsbackscattererorg = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>ips.backscatterer.org</td> <td> $ipsbackscattererorg </td><tr>";

		if ($ixdnsblmanitunet == 'No') {
		$ixdnsblmanitunet = "<font color=green>No</font>";
		} ELSE {
		$ixdnsblmanitunet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>ix.dnsbl.manitu.net</td> <td> $ixdnsblmanitunet </td><tr>";

		if ($koreaservicesnet == 'No') {
		$koreaservicesnet = "<font color=green>No</font>";
		} ELSE {
		$koreaservicesnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>korea.services.net</td> <td> $koreaservicesnet </td><tr>";

		if ($miscdnsblsorbsnet== 'No') {
		$miscdnsblsorbsnet= "<font color=green>No</font>";
		} ELSE {
		$miscdnsblsorbsnet= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>misc.dnsbl.sorbs.net</td> <td>$miscdnsblsorbsnet</td><tr>";

		if ($noptrspamratscom == 'No') {
		$noptrspamratscom = "<font color=green>No</font>";
		} ELSE {
		$noptrspamratscom = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>noptr.spamrats.com</td> <td> $noptrspamratscom </td><tr>";

		if ($orvedbaupadsorg == 'No') {
		$orvedbaupadsorg = "<font color=green>No</font>";
		} ELSE {
		$orvedbaupadsorg = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>orvedb.aupads.org</td> <td> $orvedbaupadsorg </td><tr>";

		if ($pblspamhausorg == 'No') {
		$pblspamhausorg = "<font color=green>No</font>";
		} ELSE {
		$pblspamhausorg = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>pbl.spamhaus.org</td> <td> $pblspamhausorg </td><tr>";

		if ($proxyblgweepca == 'No') {
		$proxyblgweepca = "<font color=green>No</font>";
		} ELSE {
		$proxyblgweepca = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>proxy.bl.gweep.ca</td> <td> $proxyblgweepca </td><tr>";

		if ($psblsurrielcom == 'No') {
		$psblsurrielcom = "<font color=green>No</font>";
		} ELSE {
		$psblsurrielcom = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>psbl.surriel.com</td> <td> $psblsurrielcom </td><tr>";

		if ($relaysblgweepca == 'No') {
		$relaysblgweepca = "<font color=green>No</font>";
		} ELSE {
		$relaysblgweepca = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>relays.bl.gweep.ca</td> <td> $relaysblgweepca </td><tr>";

		if ($relaysnethernet== 'No') {
		$relaysnethernet= "<font color=green>No</font>";
		} ELSE {
		$relaysnethernet= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'> relays.nether.net</td> <td> $relaysnethernet</td><tr>";

		if ($sblspamhausorg== 'No') {
		$sblspamhausorg= "<font color=green>No</font>";
		} ELSE {
		$sblspamhausorg= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>sbl.spamhaus.org</td> <td> $sblspamhausorg</td><tr>"; 

		if ($shortrbljp == 'No') {
		$shortrbljp = "<font color=green>No</font>";
		} ELSE {
		$shortrbljp = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>short.rbl.jp</td> <td> $shortrbljp </td><tr>";

		if ($singularttkptehu == 'No') {
		$singularttkptehu = "<font color=green>No</font>";
		} ELSE {
		$singularttkptehu = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>singular.ttk.pte.hu</td> <td> $singularttkptehu </td><tr>";

		if ($smtpdnsblsorbsnet == 'No') {
		$smtpdnsblsorbsnet = "<font color=green>No</font>";
		} ELSE {
		$smtpdnsblsorbsnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>smtp.dnsbl.sorbs.net</td> <td> $smtpdnsblsorbsnet </td><tr>";

		if ($socksdnsblsorbsnet == 'No') {
		$socksdnsblsorbsnet = "<font color=green>No</font>";
		} ELSE {
		$socksdnsblsorbsnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>socks.dnsbl.sorbs.net</td> <td> $socksdnsblsorbsnet </td><tr>";

		if ($spamabusech == 'No') {
		$spamabusech = "<font color=green>No</font>";
		} ELSE {
		$spamabusech = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>spam.abuse.ch</td> <td> $spamabusech </td><tr>";

		if ($spamdnsblanonmailsde == 'No') {
		$spamdnsblanonmailsde = "<font color=green>No</font>";
		} ELSE {
		$spamdnsblanonmailsde = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>spam.dnsbl.anonmails.de</td> <td> $spamdnsblanonmailsde </td><tr>";

		if ($spamdnsblsorbsnet == 'No') {
		$spamdnsblsorbsnet = "<font color=green>No</font>";
		} ELSE {
		$spamdnsblsorbsnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>spam.dnsbl.sorbs.net</td> <td> $spamdnsblsorbsnet </td><tr>";

		if ($spamspamratscom == 'No') {
		$spamspamratscom = "<font color=green>No</font>";
		} ELSE {
		$spamspamratscom = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>spam.spamrats.com</td> <td> $spamspamratscom </td><tr>";

		if ($spambotblsdigibaseca== 'No') {
		$spambotblsdigibaseca= "<font color=green>No</font>";
		} ELSE {
		$spambotblsdigibaseca= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'> spambot.bls.digibase.ca</td> <td> $spambotblsdigibaseca</td><tr>";

		if ($spamrblimpch== 'No') {
		$spamrblimpch= "<font color=green>No</font>";
		} ELSE {
		$spamrblimpch= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'> spamrbl.imp.ch</td> <td> $spamrblimpch</td><tr>";

		if ($spamsourcesfabeldk== 'No') {
		$spamsourcesfabeldk= "<font color=green>No</font>";
		} ELSE {
		$spamsourcesfabeldk= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>spamsources.fabel.dk</td> <td> $spamsourcesfabeldk</td><tr>";

		if ($ubllashbackcom== 'No') {
		$ubllashbackcom= "<font color=green>No</font>";
		} ELSE {
		$ubllashbackcom= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>ubl.lashback.com</td> <td> $ubllashbackcom</td><tr>";

		if ($ublunsubscorecom== 'No') {
		$ublunsubscorecom= "<font color=green>No</font>";
		} ELSE {
		$ublunsubscorecom= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>ubl.unsubscore.com</td> <td> $ublunsubscorecom</td><tr>";

		if ($virusrbljp== 'No') {
		$virusrbljp= "<font color=green>No</font>";
		} ELSE {
		$virusrbljp= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>virus.rbl.jp</td> <td> $virusrbljp</td><tr>";

		if ($webdnsblsorbsnet == 'No') {
		$webdnsblsorbsnet = "<font color=green>No</font>";
		} ELSE {
		$webdnsblsorbsnet = "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>web.dnsbl.sorbs.net</td> <td> $webdnsblsorbsnet </td><tr>";

		if ($wormrblimpch== 'No') {
		$wormrblimpch= "<font color=green>No</font>";
		} ELSE {
		$wormrblimpch= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>wormrbl.imp.ch</td> <td> $wormrblimpch</td><tr>";

		if ($xblspamhausorg== 'No') {
		$xblspamhausorg= "<font color=green>No</font>";
		} ELSE {
		$xblspamhausorg= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>xbl.spamhaus.org</td> <td> $xblspamhausorg</td><tr>";

		if ($zmailspikenet== 'No') {
		$zmailspikenet= "<font color=green>No</font>";
		} ELSE {
		$zmailspikenet= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>z.mailspike.net</td> <td> $zmailspikenet</td><tr>";

		if ($zenspamhausorg== 'No') {
		$zenspamhausorg= "<font color=green>No</font>";
		} ELSE {
		$zenspamhausorg= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>zen.spamhaus.org</td> <td> $zenspamhausorg</td><tr>";

		if ($zombiednsblsorbsnet== 'No') {
		$zombiednsblsorbsnet= "<font color=green>No</font>";
		} ELSE {
		$zombiednsblsorbsnet= "<font color=red>Yes</font>";
		}
		echo"<td width='30%'>zombie.dnsbl.sorbs.net</td> <td>$zombiednsblsorbsnet</td><tr>";

		echo"</table>";
		?>

                
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary" data-dismiss="modal">Cancel</a>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>