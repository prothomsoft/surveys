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


<div id="accordion" class="ui-accordion"> 
	<div style="width:240px;"> 
	<?
	$arrDeltas = $event->getArg("arrDeltas");
	foreach($arrDeltas as $objDelta) {?>
		<?// get number of items in the category
		$deltaId = $objDelta->getDeltaId();
		$SigmaGateway = new SigmaGateway();
		$arrEntries = $SigmaGateway->findByCategoryId($deltaId);
		$count = 0;
		if($arrEntries) {
			$count = count($arrEntries);
		}
		?>
		<h3 class="ui-accordion-header" style="background: #666; font-weight: normal; line-height:20px;"><a class="anchor_link" href="<?=$SN?>news/1/<?=$objDelta->getDeltaId();?>.html"><?=$objDelta->getName();?> (<?=$count;?>)</a></h3>
	<?}?>
	</div>
</div>
