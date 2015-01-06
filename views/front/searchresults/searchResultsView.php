<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>

<div class="cms subpage_head">
	<div>
		<h3 class="cms">Søk på musikkgaver.no: <strong><?=$event->getArg("searchKey")?></strong></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer6"></div> <!-- end .ui-helper-clearfix spacer -->

<div>
	<?$arrSigmas = $event->getArg("arrSigmas");?>
	<?if($arrSigmas[0]) {?>
	<?foreach($arrSigmas as $objSigma) {?>
		
		<?// for each entry count number of comments
		$sigmaId = $objSigma->getSigmaId();
		$BookGatewayObj = new BookGateway();
		$arrCount = $BookGatewayObj->findAllAuthorized($sigmaId);
		if($arrCount) {
			$counter = count($arrCount);
		} else {
			$counter = 0;
		}?>
		<div class="list-box ui-helper-clearfix">
			<div class="list-box-center" style="padding-left:13px;">
			
				<?if($objSigma->getEventDate() == "news") {?>
					<h3><a class="anchor_link_1" href="<?=$SN?>news_entry/<?=$objSigma->getSigmaId();?>.html"><?=htmlspecialchars_decode($objSigma->getName())?></a></h3>	
				<?}?>
				<?if($objSigma->getEventDate() == "article") {?>
					<h3><a class="anchor_link_1" href="<?=$SN?>article/<?=$objSigma->getSigmaId();?>.html"><?=htmlspecialchars_decode($objSigma->getName())?></a></h3>	
				<?}?>
				<?if($objSigma->getEventDate() == "cms") {?>
					<h3><a class="anchor_link_1" href="<?=$SN?>musikkgaver_page/<?=$objSigma->getSeoName();?>.html"><?=htmlspecialchars_decode($objSigma->getName())?></a></h3>	
				<?}?>
				
				
				<?if($objSigma->getEventDate() == "news") {?>
					<p><a class="anchor_link_2" href="<?=$SN?>news_entry/<?=$objSigma->getSigmaId();?>.html"><u>les mer...</u></a>	</p>
				<?}?>
				<?if($objSigma->getEventDate() == "article") {?>
					<p><a class="anchor_link_2" href="<?=$SN?>article/<?=$objSigma->getSigmaId();?>.html"><u>les mer...</u></a></p>
				<?}?>
				<?if($objSigma->getEventDate() == "cms") {?>
					<p><a class="anchor_link_2" href="<?=$SN?>musikkgaver_page/<?=$objSigma->getSeoName();?>.html"><u>les mer...</u></a></p>
				<?}?>
			</div>
		</div>
		<div class="ui-helper-clearfix list-box-spacer"></div>
	<?}?>
<?} else {?>
	<center>Ingen poster funnet</center>
<?}?>
</div>

<?if($arrSigmas[0]) {?>
<? $arrPagination=$event->getArg('arrPagination');?>
<div id="pagination_container"  class="clearfix">
	<div id="pagination_left">
      <?php if($arrPagination['nCurrentPage'] < $arrPagination['nNumberOfPages']){?>
	     <a href="<?=$SN;?>wyniki_wyszukiwania/<?=$arrPagination['nNextPage']?>/<?=$event->getArg("id2");?>.html">
	        <img src="<?=$SN;?>images/r_next_a.gif" border="0" alt="" width="7" height="12" /></a>
	     <a href="<?=$SN;?>wyniki_wyszukiwania/<?=$arrPagination['nNumberOfPages']?>/<?=$event->getArg("id2");?>.html">
	        <img src="<?=$SN;?>images/r_last_a.gif" border="0" alt="" width="10" height="12" /></a>
	    <?}else{?>
	        <img src="<?=$SN;?>images/r_next_p.gif" border="0" alt="" width="7" height="12" />
	        <img src="<?=$SN;?>images/r_last_p.gif" border="0" alt="" width="10" height="12" />
	    <?}?>
	</div>
	<div id="pagination_center">
			<p style="text-align:center;color:#000;font-size:13px;line-height:7px;">PAGE <?=$arrPagination['nCurrentPage']?>/<?=$arrPagination['nNumberOfPages']?></p>
	</div>
	<div id="pagination_right">
       <?php if($arrPagination['nCurrentPage'] > 1){?>
	     <a href="<?=$SN;?>wyniki_wyszukiwania/1/<?=$event->getArg("id2");?>.html">			
            <img src="<?=$SN;?>images/l_first_a.gif" border="0" alt="" width="10" height="12" /></a>
         <a href="<?=$SN;?>wyniki_wyszukiwania/<?=$arrPagination['nPreviousPage']?>/<?=$event->getArg("id2");?>.html">			
            <img src="<?=$SN;?>images/l_next_a.gif" border="0" alt="" width="7" height="12" /></a>
      <?}else{?>  
         <img src="<?=$SN;?>images/l_first_p.gif" border="0" alt="" width="10" height="12" />
         <img src="<?=$SN;?>images/l_next_p.gif" border="0" alt="" width="7" height="12" />
      <?}?>
	</div>
</div>
<?}?>

<div class="ui-helper-clearfix spacer"></div>