<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>
<!-- Begin Main -->
<div role="main" class="main">
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="text-align:center; padding-bottom:20px;">
					<?$objCmsContentDao = new CmsContentDao();
					  $objCmsContent = $objCmsContentDao->read(25);
					  $longDescription = htmlspecialchars_decode($objCmsContent->getLongDescription());
					  $name = htmlspecialchars_decode($objCmsContent->getName());
					?>
					<h3><?=$name;?></h3>
					<?=$longDescription;?>					
				</div>
				<div style="padding-bottom:30px">
				</div>
			</div>	
		</div>	
	</div>
</div>
<!-- End Main -->