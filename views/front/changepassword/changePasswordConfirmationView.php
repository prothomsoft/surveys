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
				<div class="blog-posts single-post form-register">
					<article class="post post-large blog-single-post">
						<h3 style="text-align:center"><?=$oT->gL("txtChangePasswordConfirmation")?></h3>
						<div class="post-content">
							<p style="text-align:center">
								<?=$oT->gL("txtChangePasswordConfirmationMessage")?>
							</p>
							<div style="text-align:center"><a class="btn btn-primary" href="<?=$SN;?>myAccountStart.html"><?=$oT->gL("txtMyAccount")?></a></div>									
						</div>
						<div style="padding-bottom:150px">
						</div>
						
					</article>							
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- End Main -->