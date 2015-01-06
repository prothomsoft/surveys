<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>

<?$objBeta = $event->getArg("objBeta");
$shortDescription = htmlspecialchars_decode($objBeta->getShortDescription());
?>
	

<div class="cms subpage_head">
	<div>
		<h3><font color="#666">Kontaktinformasjon</font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->
<div class="list-box cms">
<p>

<p><strong>Besøkadresse etter avtale:</strong></p> 

<p>Musikkpedagogisk Senter<br/>
Kreativ Musikkpedagogikk<br/>
Bibliotekgata 30, 1473 Lørenskog</p>

<p><strong>Leveringsadresse (varemottak) etter avtale:</strong></p> 

<p>Musikkpedagogisk Senter<br/>
Kreativ Musikkpedagogikk<br/>
Kulturhusgata 21<br/>
1473 Lørenskog</p>

<p><strong>Posboksadresse:</strong></p>

<p>Musikkpedagogisk Senter<br/>
Kreativ Musikkpedagogikk<br/>
Boks 44<br/>
1471 Lørenskog</p>

<p><strong>Telefon:</strong> 67 90 85 66</p>

<p><strong>Mobil:</strong> 954 75 972</p>




</div>