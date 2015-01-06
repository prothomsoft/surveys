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
					     <form name="registerForm" action="<?=$SN;?>index.php?event=executeRegistration" method="POST">
					     	<h3 style="text-align:center;"><?=$oT->gL("txtRegisterForm")?></h3>
					        <div class="form-group">
					            <label for="inputEmail"><?=$oT->gL("txtEmail")?></label>
					            <input type="text" class="form-control" id="inputEmail" name="email" value="<?=$event->getArg("email");?>">
					        </div>
					        <div class="form-group">
					            <label for="inputPassword"><?=$oT->gL("txtPassword")?></label>
					            <input type="password" class="form-control" id="inputPassword" name="password">
					        </div>
					        <div style="text-align:center">
					        	<button type="submit" class="btn btn-primary"><?=$oT->gL("txtRegister")?></button>
					        </div>				        
					    </form>
		            </div>
			 	</div>
			</div>
		</section>
	    <!-- END REGISTER -->