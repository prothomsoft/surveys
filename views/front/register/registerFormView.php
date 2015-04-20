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
			        	<?$missingField = $event->getArg('missingField');?>
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
					        <div class="form-group <?if($missingField =="email") echo "has-error";?>">
					            <label for="inputEmail"><?=$oT->gL("txtEmail")?></label>
					            <input type="text" class="form-control" id="inputEmail" name="email" value="<?=$event->getArg("email");?>">
					        </div>
					        <div class="form-group <?if($missingField =="password") echo "has-error";?>">
					            <label for="inputPassword"><?=$oT->gL("txtPassword")?></label>
					            <input type="password" class="form-control" id="inputPassword" name="password" value="<?=$event->getArg("password");?>">
					        </div>
					        
					        <div style="padding-top: 15px;"></div>
					        
					        <div class="form-group <?if($missingField =="phone1") echo "has-error";?>">
					        	<label for="phone1"><strong>Y compris vous-même, combien y a-t-il de salariés dans votre entreprise ?</strong></label>
					        	<?if($event->getArg("phone1") == "Aucun") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="Aucun" checked="true">Aucun</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone1" value="Aucun">Aucun</label>
					        	<?}?>
					        	
					        	<?if($event->getArg("phone1") == "1 salarié") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="1 salarié" checked="true">1 salarié</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone1" value="1 salarié">1 salarié</label>
					        	<?}?>
					        	
					        	<?if($event->getArg("phone1") == "De 2 à 5 salariés") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 2 à 5 salariés" checked="true">De 2 à 5 salariés</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 2 à 5 salariés">De 2 à 5 salariés</label>
					        	<?}?>
					        		
					        	<?if($event->getArg("phone1") == "De 6 à 10 salariés") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 6 à 10 salariés" checked="true">De 6 à 10 salariés</label>
					        	<?} else {?>
									<label class="radio"><input type="radio" name="phone1" value="De 6 à 10 salariés">De 6 à 10 salariés</label>
								<?}?>
									
								<?if($event->getArg("phone1") == "De 11 à 20 salarié") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 11 à 20 salariés" checked="true">De 11 à 20 salariés</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 11 à 20 salariés">De 11 à 20 salariés</label>
					        	<?}?>
					        		
					        	<?if($event->getArg("phone1") == "De 21 à 50 salariés") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 21 à 50 salariés" checked="true">De 21 à 50 salariés</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 21 à 50 salariés">De 21 à 50 salariés</label>
					        	<?}?>
					        		
					        	<?if($event->getArg("phone1") == "Plus de 50 salariés") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="Plus de 50 salariés" checked="true">Plus de 50 salariés</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone1" value="Plus de 50 salariés">Plus de 50 salariés</label>
					        	<?}?>					        		
					        </div>
					        
					        <div style="padding-top: 5px;"></div>
					        
					        <div class="form-group <?if($missingField =="website1") echo "has-error";?>">
					            <label for="inputWebsite1"><strong>Depuis combien d’années dirigez-vous votre entreprise ?</strong></label>
					            <input type="text" class="form-control" id="website1" name="website1" value="<?=$event->getArg("website1");?>">
					        </div>
					        
					        <div style="padding-top: 15px;"></div>
					        
					        <div class="form-group <?if($missingField =="phone2") echo "has-error";?>">
					        	<label for="phone2"><strong>Dans quelle région est située votre entreprise ?</strong></label>
					        	<?if($event->getArg("phone2") == "Alsace, Champagne-Ardenne et Lorraine") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Alsace, Champagne-Ardenne et Lorraine" checked="true">Alsace, Champagne-Ardenne et Lorraine</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Alsace, Champagne-Ardenne et Lorraine">Alsace, Champagne-Ardenne et Lorraine</label>
					        	<?}?>
					        	
					        	<?if($event->getArg("phone2") == "Aquitaine, Limousin et Poitou-Charentes") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Aquitaine, Limousin et Poitou-Charentes" checked="true">Aquitaine, Limousin et Poitou-Charentes</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Aquitaine, Limousin et Poitou-Charentes">Aquitaine, Limousin et Poitou-Charentes</label>
					        	<?}?>
					        	
					        	<?if($event->getArg("phone2") == "Auvergne et Rhône-Alpes") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Auvergne et Rhône-Alpes" checked="true">Auvergne et Rhône-Alpes</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Auvergne et Rhône-Alpes">Auvergne et Rhône-Alpes</label>
					        	<?}?>
					        		
					        	<?if($event->getArg("phone2") == "Basse-Normandie et Haute-Normandie") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Basse-Normandie et Haute-Normandie" checked="true">Basse-Normandie et Haute-Normandie</label>
					        	<?} else {?>
									<label class="radio"><input type="radio" name="phone2" value="Basse-Normandie et Haute-Normandie">Basse-Normandie et Haute-Normandie</label>
								<?}?>
									
								<?if($event->getArg("phone2") == "Bourgogne et Franche Comté") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Bourgogne et Franche Comté" checked="true">Bourgogne et Franche Comté</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Bourgogne et Franche Comté">Bourgogne et Franche Comté</label>
					        	<?}?>
					        		
					        	<?if($event->getArg("phone2") == "Bretagne") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Bretagne" checked="true">Bretagne</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Bretagne">Bretagne</label>
					        	<?}?>
					        		
					        	<?if($event->getArg("phone2") == "Centre") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Centre" checked="true">Centre</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Centre">Centre</label>
					        	<?}?>
					        						        	
					        	<?if($event->getArg("phone2") == "Corse") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Corse" checked="true">Corse</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Corse">Corse</label>
					        	<?}?>
					        	
					        	<?if($event->getArg("phone2") == "Île-de-France") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Île-de-France" checked="true">Île-de-France</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Île-de-France">Île-de-France</label>
					        	<?}?>
					        	
					        	<?if($event->getArg("phone2") == "Languedoc-Roussillon et Midi-Pyrénées") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Languedoc-Roussillon et Midi-Pyrénées" checked="true">Languedoc-Roussillon et Midi-Pyrénées</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Languedoc-Roussillon et Midi-Pyrénées">Languedoc-Roussillon et Midi-Pyrénées</label>
					        	<?}?>
					        	
					        	<?if($event->getArg("phone2") == "Nord-Pas-de-Calais et Picardie") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Nord-Pas-de-Calais et Picardie" checked="true">Nord-Pas-de-Calais et Picardie</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Nord-Pas-de-Calais et Picardie">Nord-Pas-de-Calais et Picardie</label>
					        	<?}?>
					        	
					        	<?if($event->getArg("phone2") == "Pays de la Loire") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Pays de la Loire" checked="true">Pays de la Loire</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Pays de la Loire">Pays de la Loire</label>
					        	<?}?>
					        	
					        	<?if($event->getArg("phone2") == "Provence-Alpes-Côte d'Azur") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Provence-Alpes-Côte d'Azur" checked="true">Provence-Alpes-Côte d'Azur</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</label>
					        	<?}?>
					        </div>
					        
					        <div style="padding-top: 15px;"></div>
					        					        
					        <div style="text-align:center">
					        	<button type="submit" class="btn btn-primary"><?=$oT->gL("txtRegister")?></button>
					        </div>				        
					    </form>
		            </div>
			 	</div>
			</div>
		</section>
	    <!-- END REGISTER -->