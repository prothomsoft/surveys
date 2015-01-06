<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>

<?$objBeta = $event->getArg("objBeta");
$longDescription = htmlspecialchars_decode($objBeta->getLongDescription());
?>

<div class="cms subpage_head">
	<div>
		<h3><font color="#666">Konkurranse</font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->
<div class="list-box cms"><?=$longDescription;?></div>