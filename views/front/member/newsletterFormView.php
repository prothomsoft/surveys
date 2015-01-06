<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>

		<div role="main" class="main">
		
			<!-- Begin page top -->
			<section class="page-top-lg"></section>
			
			<!-- End page top -->
			<div class="container">
				<div class="contact-content contact-content-full animation">
					
					<?if ($event->getArg('message') != "") {?>
						<div class="alert alert-danger" id="contacterror">
							<strong>Warning:</strong>
							<?if($event->getArg("message") != "") {
								echo $event->getArg("message");
							}?>
						</div>
					<?}?>
					
					<h3>Meld deg på vårt nyhetsbrev</h3>
					
					<form id="f5" name="f5" action="<?=$SN?>executeNewsletterAction.html" method="POST">
						<div class="row">
							<div class="col-xs-5 col-sm-4">
								<p>Få de siste nyhetene sendt direkte til din epost</p>
								<div class="form-group">
									<label for="email"><?=$oT->gL("txtYourEmail");?> <font color="red">*</font></label>
									<input type="email" class="form-control" id="email" name="email" value="<?=$event->getArg("email");?>">
								</div>
								
								<div class="form-group">
									<input type="submit" value="<?=$oT->gL("txtSend");?>" class="btn btn-primary">
								</div>
							</div>
						</div>
					</form>
										
				</div>
			</div>
		</div>

