<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>
 
 		<div role="main" class="main">
		
			<!-- Begin page top -->
			<div style="padding:5px"></div>
			
			<!-- End page top -->
			<div class="container">
				<div class="contact-content contact-content-full">
					
					<div class="alert alert-success hidden" id="contactsuccess">
						<strong>Succès!</strong> Votre message a été envoyé à nous.
					</div>

					<?if ($event->getArg('message') != "") {?>
						<div class="alert alert-danger" id="contacterror">
							<?if($event->getArg("message") == "txtName") {?>
								<strong></strong> Nom est un champ obligatoire.
							<?}?>
																					
							<?if($event->getArg("message") == "txtEmail") {?>
								<strong></strong> Votre adresse mél est un champ obligatoire.
							<?}?>
							
							<?if($event->getArg("message") == "txtEmailIncorrect") {?>
								<strong></strong> Email saisi ne est pas correcte.
							<?}?>
							
							<?if($event->getArg("message") == "txtPhoneNumber") {?>
								<strong></strong> Numéro de téléphone est un champ obligatoire.
							<?}?>
							
							<?if($event->getArg("message") == "txtMessage") {?>
								<strong></strong> Message est un champ obligatoire.
							<?}?>
						</div>
					<?}?>
					
					<h3 style="text-align: center; font-weight:normal;"><?=$oT->gL("txtContact")?></h3>
					<form id="f4" name="f4" action="<?=$SN?>executeContactAction.html" method="POST">
						<div class="row">
							<div class="col-xs-5 col-sm-4">
								<div class="form-group">
									<label for="name"><?=$oT->gL("txtYourName");?> <font color="red">*</font></label>
									<input type="text" class="form-control" id="Name" name="Name" value="<?=$event->getArg("Name");?>">
								</div>
								<div class="form-group">
									<label for="email"><?=$oT->gL("txtCompanyName");?></label>
									<input type="text" class="form-control" id="Company" name="Company" value="<?=$event->getArg("Company")?>">
								</div>
								<div class="form-group">
									<label for="subject"><?=$oT->gL("txtEmail");?> <font color="red">*</font></label>
									<input type="text" class="form-control" id="Email" name="Email" value="<?=$event->getArg("Email")?>">
								</div>
								
								<div class="form-group">
									<label for="subject"><?=$oT->gL("txtPhoneNumber");?> <font color="red">*</font></label>
									<input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" value="<?=$event->getArg("PhoneNumber")?>">
								</div>
								
								<p><font color="red">*</font> <?=$oT->gL("txtRequiredFields");?></p>
							</div>
							
							<div class="col-xs-7 col-sm-8">
								<div class="form-group">
									<label for="message"><?=$oT->gL("txtMessage");?> <font color="red">*</font></label>
									<textarea class="form-control" id="Message" name="Message" rows="15"><?=$event->getArg("Message")?></textarea>
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
 