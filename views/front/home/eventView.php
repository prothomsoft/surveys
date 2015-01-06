<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>
<?$arrAlfasPage = $event->getArg('arrAlfas');?>
<div class="cms subpage_head">
	<div style="float:left">
		<h3><font color="#666">Aktualności</font></h3>
	</div>
	<div style="float:right">
		<h4><a class="anchor_link_2" href="<?=$SN?>aktualnosci.html">więcej aktualności</a></h4>
	</div>
	<div class="ui-helper-clearfix"></div>	
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->

<?if($arrAlfasPage[0]) {?>
	<?foreach($arrAlfasPage as $objAlfa) {?>
		<div class="list-box cms">
			<h3><?=htmlspecialchars_decode($objAlfa->getName())?></h3>
			<h2><?=htmlspecialchars_decode($objAlfa->getEventDate())?></h2>
			<?=htmlspecialchars_decode($objAlfa->getShortDescription())?>			
		</div>
		<div class="ui-helper-clearfix list-box-spacer"></div>
		<?if($objAlfa->getBeta()->getBetaId() != "") {
			$betaId = $objAlfa->getBeta()->getBetaId();
			$objBetaPictureGateway = new BetaPictureGateway();
			$arrBetaPictures = $objBetaPictureGateway->getByBetaObjAndId($betaId);?>
			<div class="galeria_photos ui-helper-clearfix">	
				<?if($arrBetaPictures) {?>
				    <?foreach($arrBetaPictures as $objBetaPicture)  {?>
						<div class="galaria_photo_box">    	
				    		<center><a href="<?=$SN?>upload/proper/<?=$objBetaPicture->getImgDriveName();?>" class="photo"  rel="prettyPhoto[gallery<?=$betaId;?>]" title="<?=stripslashes($objBetaPicture->getImgAltName())?>"><img src="<?=$SN?>upload/thumb/<?=$objBetaPicture->getImgDriveName();?>" class="thumb"  width="<?=$objBetaPicture->getIW();?>" height="<?=$objBetaPicture->getIH();?>"></a></center>
				    	</div>
				    <?}?>
				 <?}?>
			</div>
			<div class="ui-helper-clearfix spacer"></div>
		<?}?>
	<?}?>
<?}?>