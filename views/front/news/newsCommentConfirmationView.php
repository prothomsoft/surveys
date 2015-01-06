<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>


<div class="cms subpage_head">
	<div>
		<h3><font color="#666">Comment confirmation</font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->

<div class="cms" style="height:650px;"><p>Thank you for adding Your comment. <br/>It will be visible after administator approval.<br/><br/><a href="<?=$SN?>news.html">Go back...</a></p></div>