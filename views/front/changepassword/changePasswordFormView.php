<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>

		<!-- BEGIN REGISTER -->
		<section class="register" style="padding-bottom:50px">
			<div class="container">
			    <div class="starter-template">
			        <div class="form-register">
		        		<?if ($event->getArg('message') != "") {?>
							<div class="alert alert-danger" id="loginerror">
								<strong><?=$oT->gL("txtWarning");?>: </strong>
								<?if($event->getArg("message") != "") {
									echo $oT->gL($event->getArg("message"));
								}?>
							</div>
						<?}?>
					     <form name="registerForm" action="<?=$SN;?>index.php?event=executeChangePassword" method="POST">
					     	<h3 style="text-align:center;"><?=$oT->gL("txtChangePasswordForm")?></h3>
					     	<div class="form-group">
					            <label for="inputNewPassword"><?=$oT->gL("txtNewPassword")?></label>
					            <input type="text" class="form-control" id="inputNewPassword" name="newPassword" value="<?=$event->getArg("newPassword");?>">
					        </div>
					        <div class="form-group">
					            <label for="inputRepeatNewPassword"><?=$oT->gL("txtRepeatNewPassword")?></label>
					            <input type="text" class="form-control" id="inputRepeatNewPassword" name="repeatNewPassword" value="<?=$event->getArg("repeatNewPassword");?>">
					        </div>
					        <div style="text-align:center">
					        	<button type="submit" class="btn btn-primary"><?=$oT->gL("txtChangePasswordSubmit")?></button> <a class="btn btn-primary" href="<?=$SN;?>myAccountStart.html"><?=$oT->gL("txtMyAccount")?></a>
					        </div>
					        <div style="padding-bottom:60px;"></div>
					    </form>
		            </div>
			 	</div>
			</div>
		</section>
	    <!-- END REGISTER -->