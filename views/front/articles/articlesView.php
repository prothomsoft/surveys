<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>

<?
$pageName = "Arkiv";
if($event->getName() == "videoarticles") {
	$pageName = "Videoarkiv";
}?>

<div class="cms subpage_head">
	<div>
		<h3 class="cms"><?=$pageName?></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer6"></div> <!-- end .ui-helper-clearfix spacer -->

<div class="list-box cms" style="padding-left:10px;">

	<?$arrBetas = $event->getArg("arrBetas");?>
	
	<?if($arrBetas) {?>
			<?foreach($arrBetas as $objBeta) {?>
				<a href="<?=$SN?>article/<?=$objBeta->getBetaId();?>/<?=$objBeta->getSeoName();?>.html"><?=htmlspecialchars_decode($objBeta->getName());?></a><br/>
			<?}?>
	<?}?>
	
</div>
<div class="ui-helper-clearfix spacer"></div>

<? $arrPagination=$event->getArg('arrPagination');?>
<div id="pagination_container"  class="clearfix">

	<div id="pagination_left">
      <?php if($arrPagination['nCurrentPage'] < $arrPagination['nNumberOfPages']){?>
	     <a href="<?=$SN;?>articles/<?=$arrPagination['nNextPage']?>/<?=$event->getArg("id2");?>/<?=$event->getArg("id3");?>.html">
	        <img src="<?=$SN;?>images/r_next_a.gif" border="0" alt="" width="7" height="12" /></a>
	     <a href="<?=$SN;?>articles/<?=$arrPagination['nNumberOfPages']?>/<?=$event->getArg("id2");?>/<?=$event->getArg("id3");?>.html">
	        <img src="<?=$SN;?>images/r_last_a.gif" border="0" alt="" width="10" height="12" /></a>
	    <?}else{?>
	        <img src="<?=$SN;?>images/r_next_p.gif" border="0" alt="" width="7" height="12" />
	        <img src="<?=$SN;?>images/r_last_p.gif" border="0" alt="" width="10" height="12" />
	    <?}?>
	</div>

	<div id="pagination_center">
		<p style="text-align:center;color:#000;font-size:12px;line-height:17px;">PAGE <?=$arrPagination['nCurrentPage']?>/<?=$arrPagination['nNumberOfPages']?></p>
	</div>

	<div id="pagination_right">
       <?php if($arrPagination['nCurrentPage'] > 1){?>
	     <a href="<?=$SN;?>articles/1/<?=$event->getArg("id2");?>/<?=$event->getArg("id3");?>.html">			
            <img src="<?=$SN;?>images/l_first_a.gif" border="0" alt="" width="10" height="12" /></a>
         <a href="<?=$SN;?>articles/<?=$arrPagination['nPreviousPage']?>/<?=$event->getArg("id2");?>/<?=$event->getArg("id3");?>.html">			
            <img src="<?=$SN;?>images/l_next_a.gif" border="0" alt="" width="7" height="12" /></a>
      <?}else{?>  
         <img src="<?=$SN;?>images/l_first_p.gif" border="0" alt="" width="10" height="12" />
         <img src="<?=$SN;?>images/l_next_p.gif" border="0" alt="" width="7" height="12" />
      <?}?>
	</div>
</div>
<div class="ui-helper-clearfix spacer"></div>