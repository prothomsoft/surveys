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
			<div class="list-box-left">
				<div style="width:220px; height:220px; text-align:center;">
				<?if ($objSigma->getImgDriveName() != "") {?>
				   <a href="<?=$SN?>upload/proper/<?=$objSigma->getImgDriveName();?>" class="anchor_link_1" rel="prettyPhoto" title="<?=htmlspecialchars_decode($objSigma->getName());?>"><img src="<?=$SN?>upload/micro/<?=$objSigma->getImgDriveName();?>" alt="<?=htmlspecialchars_decode($objSigma->getName());?>"></a>
				<? } else { ?>
					<a href="#" class="anchor_link_1"><img src="<?=$SN?>images/hotel.jpg"></a>
				<?} ?>
				</div>
			</div>
			<div class="list-box-right">
				<h3><a class="anchor_link_1" href="<?=$SN?>news_entry/<?=$objSigma->getSigmaId();?>.html"><?=htmlspecialchars_decode($objSigma->getName())?></a></h3>
				<?if(htmlspecialchars_decode($objSigma->getKeyword()) != "" && $objSigma->getEventDate() != "") {?>
					<p class="date"><?=htmlspecialchars_decode($objSigma->getKeyword())?> / <?=$objSigma->getEventDate();?></p>
				<?} else if (htmlspecialchars_decode($objSigma->getKeyword()) != "" && $objSigma->getEventDate() == "") {?>
					<p class="date"><?=htmlspecialchars_decode($objSigma->getKeyword())?></p>
				<?}?>
				<?=htmlspecialchars_decode($objSigma->getShortDescription())?>
				<p><a class="anchor_link_2" href="<?=$SN?>news_entry/<?=$objSigma->getSigmaId();?>.html"><u>les mer...</u></a>
				</p>
			</div>
		</div>
		<div class="ui-helper-clearfix list-box-spacer"></div>
	<?}?>
<?}?>
</div>

<? $arrPagination=$event->getArg('arrPagination');?>
<div id="pagination_container"  class="clearfix">
	<div id="pagination_left">
      <?php if($arrPagination['nCurrentPage'] < $arrPagination['nNumberOfPages']){?>
	     <a href="<?=$SN;?>news/<?=$arrPagination['nNextPage']?>/<?=$event->getArg("id2");?>.html">
	        <img src="<?=$SN;?>images/r_next_a.gif" border="0" alt="" width="7" height="12" /></a>
	     <a href="<?=$SN;?>news/<?=$arrPagination['nNumberOfPages']?>/<?=$event->getArg("id2");?>.html">
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
	     <a href="<?=$SN;?>news/1/<?=$event->getArg("id2");?>.html">			
            <img src="<?=$SN;?>images/l_first_a.gif" border="0" alt="" width="10" height="12" /></a>
         <a href="<?=$SN;?>news/<?=$arrPagination['nPreviousPage']?>/<?=$event->getArg("id2");?>.html">			
            <img src="<?=$SN;?>images/l_next_a.gif" border="0" alt="" width="7" height="12" /></a>
      <?}else{?>  
         <img src="<?=$SN;?>images/l_first_p.gif" border="0" alt="" width="10" height="12" />
         <img src="<?=$SN;?>images/l_next_p.gif" border="0" alt="" width="7" height="12" />
      <?}?>
	</div>
</div>

<div class="ui-helper-clearfix spacer"></div>