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

	<?$objSigma = $event->getArg("objSigma");?>	
	<?
		$longDescription = htmlspecialchars_decode($objSigma->getLongDescription());
		$description = htmlspecialchars_decode($objSigma->getDescription());		
	?>
	
<div>
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
			<h3><a class="anchor_link_1" href="<?=$SN?>news_comment/<?=$objSigma->getSigmaId();?>.html"><?=htmlspecialchars_decode($objSigma->getName())?></a></h3>
			<?if(htmlspecialchars_decode($objSigma->getKeyword()) != "" && $objSigma->getEventDate() != "") {?>
					<p class="date"><?=htmlspecialchars_decode($objSigma->getKeyword())?> / <?=$objSigma->getEventDate();?></p>
				<?} else if (htmlspecialchars_decode($objSigma->getKeyword()) != "" && $objSigma->getEventDate() == "") {?>
					<p class="date"><?=htmlspecialchars_decode($objSigma->getKeyword())?></p>
				<?}?>
			<?=htmlspecialchars_decode($objSigma->getLongDescription())?>
			<p><a class="anchor_link_2" href="<?=$SN?>news.html"><u>gå tilbake...</u></a>
			</p>
		</div>
	</div>
</div>
<div class="ui-helper-clearfix spacer"></div>

<?if($description != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="491" src="<?=$description;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	
<div class="ui-helper-clearfix spacer"></div>

<div class="list-box ui-helper-clearfix">
<?$arrSigmaPictures = $event->getArg("arrSigmaPictures");?>
		<?if($arrSigmaPictures) {?>
			<div class="galeria_photos ui-helper-clearfix">
			<?$counter = 0;?> 
			<?foreach($arrSigmaPictures as $objSigmaPicture) {?>
				<?if($counter > 0) {?>
					<div class="galaria_photo_box">
						<center><a href="<?=$SN?>upload/proper/<?=$objSigmaPicture->getImgDriveName();?>" title="<?=$objSigmaPicture->getImgAltName();?>" class="photo" rel="prettyPhoto[gallery<?=$objSigma->getSigmaId();?>]" ><img style="border: 1px solid #DEDEDE;" src="<?=$SN?>upload/micro/<?=$objSigmaPicture->getImgDriveName();?>"/></a></center>
					</div>
				<?}?>
				<?$counter = $counter + 1;?>
			<?}?>
			</div>
		<?}?>
</div>