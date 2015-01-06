<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>



<?$objCmsContent = $event->getArg('objCmsContent'); ?>
	<?$name = htmlspecialchars_decode($objCmsContent->getName());
	$longDescription = htmlspecialchars_decode($objCmsContent->getLongDescription());
	$shortDescription = $objCmsContent->getShortDescription();
	$ShortDescriptionTransEN = $objCmsContent->getShortDescriptionTransEN();
	$ShortDescriptionTransDE = $objCmsContent->getShortDescriptionTransDE();
	$ShortDescriptionTransRU  = $objCmsContent->getShortDescriptionTransRU();
	$Om1 = $objCmsContent->getOm1();
	$Om2 = $objCmsContent->getOm2();
	$Om3 = $objCmsContent->getOm3();
	$Om4 = $objCmsContent->getOm4();
	$Om5 = $objCmsContent->getOm5();
	$Om6 = $objCmsContent->getOm6();
	$Om7 = $objCmsContent->getOm7();
	$Om8 = $objCmsContent->getOm8();
	$Om9 = $objCmsContent->getOm9();
	$Om10 = $objCmsContent->getOm10();
	$Om11 = $objCmsContent->getOm11();
	$Om12 = $objCmsContent->getOm12();
	$Om13 = $objCmsContent->getOm13();
	$Om14 = $objCmsContent->getOm14();
	$Om15 = $objCmsContent->getOm15();
	$Om16 = $objCmsContent->getOm16();
	$Om17 = $objCmsContent->getOm17();
	$Om18 = $objCmsContent->getOm18();?>

	<?if($shortDescription != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="491" src="<?=$shortDescription;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($ShortDescriptionTransEN != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="491" src="<?=$ShortDescriptionTransEN;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($ShortDescriptionTransDE != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="491" src="<?=$ShortDescriptionTransDE;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($ShortDescriptionTransRU != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="491" src="<?=$ShortDescriptionTransRU;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om1 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om1;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om2 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om2;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om3 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om3;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om4 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om4;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om5 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om5;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om6 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om6;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om7 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om7;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om8 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om8;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om9 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om9;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om10 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om10;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om11 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om11;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om12 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om12;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om13 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om13;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om14 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om14;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om15 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om15;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om16 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om16;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om17 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om17;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	<?if($Om18 != "") {?>
		<div style="padding: 0px 0px 20px 41px;" >	
		<iframe width="655" height="166" scrolling="no" frameborder="no" src="<?=$Om18;?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
	
 
 
 		<!-- Begin Main -->
		<div role="main" class="main">
		
			<!-- Begin page top -->
			<section class="page-top-md">				
			</section>
			<!-- End page top -->
			
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="blog-posts single-post">
							<article class="post post-large blog-single-post">
								<?if ($objCmsContent->getCmsContentId() != "") { ?>
									<h3><?=$name;?></h3>
									<div class="post-content">
										<?=$longDescription?>
										<?$arrCmsContentPictures = $event->getArg("arrCmsContentPictures");?>
										<?if($arrCmsContentPictures) {?>
											<div class="related-posts">
												<div class="row">
													<?foreach($arrCmsContentPictures as $objCmsContentPicture) {?>
													<div class="col-xs-4">
														<article class="post">
															<?/*<div class="post-image"> */?>
															<div class="post-image">
																<a href="<?=$SN?>upload/proper/<?=$objCmsContentPicture->getImgDriveName();?>" title="<?=$objCmsContentPicture->getImgAltName();?>" rel="prettyPhoto[gallery<?=$objCmsContent->getCmsContentId();?>]"><img class="img-responsive" src="<?=$SN?>upload/micro/<?=$objCmsContentPicture->getImgDriveName();?>" alt=""/></a>
															</div>
															<h4><?=$objCmsContentPicture->getImgAltName();?></h4>
														</article>
													</div>
													<?}?>
												</div>
											</div>
										<?}?>
									</div>		
								<?} else {?>
									<h3>-</h3>
									<div class="post-content">-</div>
								<?}?>
							</article>							
						</div>
					</div>
				</div>	
			</div>
		</div>
		<!-- End Main -->
		
	
