<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>

		<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
$objUser = $event->getArg("objUser");
$phone1 = $objUser->getPhone1();
$website1 = $objUser->getWebsite1();
$phone2 = $objUser->getPhone2();
?>

		<!-- CHANGE DETAILS -->
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
					     <form name="registerForm" action="<?=$SN;?>index.php?event=executeChangeDetails" method="POST">
					     	<h3 style="text-align:center;"><?=$oT->gL("txtChangeDetailsForm")?></h3>
					        
					        <div class="form-group">
					        	<label for="phone1">Y compris vous-même, combien y a-t-il de salariés dans votre entreprise ?</label>
					        	<?if($phone1 == "Aucun") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="Aucun" checked="true">Aucun</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone1" value="Aucun">Aucun</label>
					        	<?}?>
					        	
					        	<?if($phone1 == "1 salarié") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="1 salarié" checked="true">1 salarié</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone1" value="1 salarié">1 salarié</label>
					        	<?}?>
					        	
					        	<?if($phone1 == "De 2 à 5 salariés") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 2 à 5 salariés" checked="true">De 2 à 5 salariés</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 2 à 5 salariés">De 2 à 5 salariés</label>
					        	<?}?>
					        		
					        	<?if($phone1 == "De 6 à 10 salariés") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 6 à 10 salariés" checked="true">De 6 à 10 salariés</label>
					        	<?} else {?>
									<label class="radio"><input type="radio" name="phone1" value="De 6 à 10 salariés">De 6 à 10 salariés</label>
								<?}?>
									
								<?if($phone1 == "De 11 à 20 salarié") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 11 à 20 salariés" checked="true">De 11 à 20 salariés</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 11 à 20 salariés">De 11 à 20 salariés</label>
					        	<?}?>
					        		
					        	<?if($phone1 == "De 21 à 50 salariés") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 21 à 50 salariés" checked="true">De 21 à 50 salariés</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone1" value="De 21 à 50 salariés">De 21 à 50 salariés</label>
					        	<?}?>
					        		
					        	<?if($phone1 == "Plus de 50 salariés") {?>
					        		<label class="radio"><input type="radio" name="phone1" value="Plus de 50 salariés" checked="true">Plus de 50 salariés</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone1" value="Plus de 50 salariés">Plus de 50 salariés</label>
					        	<?}?>					        		
					        </div>
					        
					        <div style="padding-top: 5px;"></div>
					        
					        <div class="form-group <?if($missingField =="website1") echo "has-error";?>">
					            <label for="inputWebsite1">Depuis combien d’années dirigez-vous votre entreprise ?</label>
					            <input type="text" class="form-control" id="website1" name="website1" value="<?=$website1;?>">
					        </div>
					        
					        <div style="padding-top: 15px;"></div>
					        
					        <div class="form-group <?if($missingField =="phone2") echo "has-error";?>">
					        	<label for="phone2">Dans quelle région est située votre entreprise ?</label>
					        	<?if($phone2 == "Alsace, Champagne-Ardenne et Lorraine") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Alsace, Champagne-Ardenne et Lorraine" checked="true">Alsace, Champagne-Ardenne et Lorraine</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Alsace, Champagne-Ardenne et Lorraine">Alsace, Champagne-Ardenne et Lorraine</label>
					        	<?}?>
					        	
					        	<?if($phone2 == "Aquitaine, Limousin et Poitou-Charentes") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Aquitaine, Limousin et Poitou-Charentes" checked="true">Aquitaine, Limousin et Poitou-Charentes</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Aquitaine, Limousin et Poitou-Charentes">Aquitaine, Limousin et Poitou-Charentes</label>
					        	<?}?>
					        	
					        	<?if($phone2 == "Auvergne et Rhône-Alpes") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Auvergne et Rhône-Alpes" checked="true">Auvergne et Rhône-Alpes</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Auvergne et Rhône-Alpes">Auvergne et Rhône-Alpes</label>
					        	<?}?>
					        		
					        	<?if($phone2 == "Basse-Normandie et Haute-Normandie") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Basse-Normandie et Haute-Normandie" checked="true">Basse-Normandie et Haute-Normandie</label>
					        	<?} else {?>
									<label class="radio"><input type="radio" name="phone2" value="Basse-Normandie et Haute-Normandie">Basse-Normandie et Haute-Normandie</label>
								<?}?>
									
								<?if($phone2 == "Bourgogne et Franche Comté") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Bourgogne et Franche Comté" checked="true">Bourgogne et Franche Comté</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Bourgogne et Franche Comté">Bourgogne et Franche Comté</label>
					        	<?}?>
					        		
					        	<?if($phone2 == "Bretagne") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Bretagne" checked="true">Bretagne</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Bretagne">Bretagne</label>
					        	<?}?>
					        		
					        	<?if($phone2 == "Centre") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Centre" checked="true">Centre</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Centre">Centre</label>
					        	<?}?>
					        						        	
					        	<?if($phone2 == "Corse") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Corse" checked="true">Corse</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Corse">Corse</label>
					        	<?}?>
					        	
					        	<?if($phone2 == "Île-de-France") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Île-de-France" checked="true">Île-de-France</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Île-de-France">Île-de-France</label>
					        	<?}?>
					        	
					        	<?if($phone2 == "Languedoc-Roussillon et Midi-Pyrénées") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Languedoc-Roussillon et Midi-Pyrénées" checked="true">Languedoc-Roussillon et Midi-Pyrénées</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Languedoc-Roussillon et Midi-Pyrénées">Languedoc-Roussillon et Midi-Pyrénées</label>
					        	<?}?>
					        	
					        	<?if($phone2 == "Nord-Pas-de-Calais et Picardie") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Nord-Pas-de-Calais et Picardie" checked="true">Nord-Pas-de-Calais et Picardie</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Nord-Pas-de-Calais et Picardie">Nord-Pas-de-Calais et Picardie</label>
					        	<?}?>
					        	
					        	<?if($phone2 == "Pays de la Loire") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Pays de la Loire" checked="true">Pays de la Loire</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Pays de la Loire">Pays de la Loire</label>
					        	<?}?>
					        	
					        	<?if($phone2 == "Provence-Alpes-Côte d'Azur") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Provence-Alpes-Côte d'Azur" checked="true">Provence-Alpes-Côte d'Azur</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</label>
					        	<?}?>
								
								<?if($phone2 == "Dans un département d'outre-mer") {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Dans un département d'outre-mer" checked="true">Dans un département d'outre-mer</label>
					        	<?} else {?>
					        		<label class="radio"><input type="radio" name="phone2" value="Dans un département d'outre-mer">Dans un département d'outre-mer</label>
					        	<?}?>
					        </div>
					        
					        <div style="padding-top: 15px;"></div>
					        					        
					        <div style="text-align:center">
					        	<button type="submit" class="btn btn-primary"><?=$oT->gL("txtSave")?></button>
					        </div>				        
					    </form>
		            </div>
			 	</div>
			</div>
		</section>
	    <!-- END REGISTER -->