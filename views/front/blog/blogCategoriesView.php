<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
require_once("model/BookGateway.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);

$arrSigmaLatest = $event->getArg("arrSigmaLatest");
?>

<div style="padding-top:20px;">
	<span style="font-family:Georgia; font-size: 20px; font-style:italic; color:#E11825; padding-left:0px;">Entrées récentes</span>
</div>
<div class="spacer-15"></div>
<div class="cms">
	<?if($arrSigmaLatest) {?>
		<?foreach($arrSigmaLatest as $objSigmaLatest) {?>
			<p><a href="<?=$SN?>blog_entry/<?=$objSigmaLatest->getSigmaId();?>/<?=$objSigmaLatest->getSeoName();?>.html">&raquo; <?=$objSigmaLatest->getName();?></a></p>
		<?}?>
	<?}?>
</div>

<div class="spacer-15"></div>
<?if ($event->getArg("tweet1View") != "") {
	echo $event->getArg("tweet1View");
}?>
<div class="spacer-15"></div>
<?if ($event->getArg("tweet2View") != "") {
	echo $event->getArg("tweet2View");
}?>
<div class="spacer-15"></div>
<?if ($event->getArg("tweet3View") != "") {
	echo $event->getArg("tweet3View");
}?>