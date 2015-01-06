<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>

<!-- BEGIN LOGIN -->
<section class="login" style="padding-bottom:50px">
	<div class="container">
	    <div class="starter-template">
	        <div class="form-login">
		        <?if ($event->getArg('message') != "") {?>
					<div class="alert alert-danger" id="loginerror">
						<strong><?=$oT->gL("txtWarning");?>: </strong>
						<?if($event->getArg("message") != "") {
							echo $oT->gL($event->getArg("message"));
						}?>
					</div>
				<?}?>			                          
			    <form name="loginForm" action="<?=$SN;?>index.php?event=executeLogin" method="POST">
			     	<h3 style="text-align:center;"><?=$oT->gL("txtLoginForm")?></h3>
			        <div class="form-group">
			            <label for="inputEmail"><?=$oT->gL("txtEmail");?></label>
			            <input type="text" class="form-control" id="inputEmail" name="email">
			        </div>
			        <div class="form-group">
			            <label for="inputPassword"><?=$oT->gL("txtPassword");?></label>
			            <input type="password" class="form-control" id="inputPassword" name="password">
			        </div>
			        <div class="form-group" style="text-align:center">
			        	<a href="<?=$SN?>forgotPassword.html"><font style="color:#000"><u><?=$oT->gL("txtForgotYourPassword");?></u></font></a>
			        </div>
			        
			        <div style="text-align:center">			        	
			        	<button type="submit" class="btn btn-primary"><?=$oT->gL("txtLogin");?></button>
			        </div>				        
				</form>
	        </div>
		 	</div>
		</div>
	</section>
    <!-- END LOGIN -->