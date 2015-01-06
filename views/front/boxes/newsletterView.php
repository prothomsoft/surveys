<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>
<div class="ui-helper-clearfix spacer">
</div> <!-- end .ui-helper-clearfix spacer -->
<div class="ui-widget-header ui-corner-top left-header">
	Newsletter
</div>		
<div id="box_newsletter" class="ui-widget-content ui-corner-bottom left-content">
	<div id="log">
		<p style="text-align:left;">
			<br/><b>Wpisz się na nasz newsletter!</b> <br/><br/>nowości, promocje,<br /> wyprzedaże<br/><br/>
		 <span style="padding-left:25px;"><a class="anchor_home" href="<?=$SN;?>newsletter.html">więcej...</a></span><br/><br/>
		</p>
	</div>
</div>