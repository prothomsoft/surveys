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

	<!-- Begin page top -->
	<section class="page-top-md">				
	</section>
	<!-- End page top -->
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="blog-posts single-post form-register">
					<article class="post post-large blog-single-post">
						<h3 style="text-align:center"><?=$oT->gL("txtAccountActivation")?></h3>
						<div class="post-content">
						
						<?$activationStatus = $event->getArg("activationStatus");?>
						<?if($activationStatus == "success") {?>
							<p style="text-align:center"><?=$oT->gL("txtAccountAtivationSuccess")?></p>
							<div style="text-align:center"><a class="btn btn-primary" href="<?=$SN;?>login.html"><?=$oT->gL("txtLogin")?></a></div>
						<?}?>
						<?if($activationStatus == "fail") {?>
							<p style="text-align:center"><?=$oT->gL("txtAccountAtivationFail")?></p>
						<?}?>
																
						</div>
					</article>							
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- End Main -->