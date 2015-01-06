<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>


<div class="menu_left">
<form id="searchForm" action="<?=$SN?>wyniki_wyszukiwania.html" method="post" style="display:inline">
		<input id="searchKey" name="searchKey" value="<?=$event->getArg("searchKey")?>" style="width:150px;padding-right:20px;"/>
</form>
			
			<span class="search">&nbsp;&nbsp;<a href="#" style="text-decoration : underline;">Søk</a></span>
</div>