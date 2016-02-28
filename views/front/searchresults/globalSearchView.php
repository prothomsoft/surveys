<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
$arrCmsContents = $event->getArg("arrCmsContents");
function string_limit_words($string, $word_limit) { $words = explode(' ', $string); return implode(' ', array_slice($words, 0, $word_limit)); }
?>



	<!-- Begin Main -->
	<div role="main" class="main">
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 style="text-align:center"><?=$oT->gL("txtSearchResults")?></h3>
					<p style="text-align:center"><?=$oT->gL("txtKeyword")?>: <?=$event->getArg("id1");?></p>
					
					
					<?if($arrCmsContents) {?>
						<?foreach($arrCmsContents as $objCmsContent) {
							$name = htmlspecialchars_decode($objCmsContent->getName());
							$longDescription = htmlspecialchars_decode($objCmsContent->getLongDescription());
							?>
						
							<h3><?=$name;?></h3>
							<p><?=string_limit_words($longDescription, 50);?>...</p>
							<p><a href="<?=$SN?>young_life_page/<?=$objCmsContent->getSeoName();?>.html">&raquo;&nbsp;Lire la suite</a></p>
							<hr/>
							
						<?}?>
						
					<?} else {?>
						<p><?=$oT->gL("txtNoResultsFound");?></p>
					<?}?>
					<p style="padding-bottom:160px"></p>
				</div>
			</div>	
		</div>
	</div>
	<!-- End Main -->