<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>

<?$arrProductCategoryPlain = $event->getArg("arrProductCategoryPlain");?>
<?if ($objAppSession->getSession("User") != "") {?>
	<?$objUser = $objAppSession->getSession("User");?>	
	Welcome <?=$objUser->getNameFirst();?> <?=$objUser->getNameLast();?> (<?=$objUser->getEmail();?>).<br/>
<?} else {?>
	&nbsp;<br/>
<?}?>
You are here: <a title="JewelsByEva" class="anchor_link" href="<?=$SN?>musikkpedagogikk.html">Start</a>

<? // custom navigation according to mach-ii.xml
if ($event->getArg("event") == "activation") {
	echo " > Account Activation";
}

if ($event->getArg("event") == "aktualnosci") {
	echo " > Aktualne promocje, nowości, wyprzedaże";
}

	//POMOC
if ($event->getArg("event") == "pomoc") {
	$objCmsContent = $event->getArg('objCmsContent');
	echo " > Pomoc - ".$objCmsContent->getName();
}
if ($event->getArg("event") == "newsletter" || $event->getArg("event") == "executeNewsletterAction") {
	echo " > Pomoc - Newsletter";
}
if ($event->getArg("event") == "wskazowki_dojazdu") {
	echo " > Pomoc - Wskazówki dojazdu (odbiór osobisty zamówień)";
}
if ($event->getArg("event") == "facebook_close2you") {
	echo " > Pomoc - Facebook Fan Page";
}



	//MOJE KONTO
if ($event->getArg("event") == "moje_konto_start") {
	echo " > Moje Konto > Witamy w drogerii internetowej Close2you.pl";
}
if ($event->getArg("event") == "moje_konto") {
	echo " > Moje Konto > Dane osobowe";
}
if ($event->getArg("event") == "zmiana_hasla") {
	echo " > Moje Konto > Zmiana hasła";
}
if ($event->getArg("event") == "punkty") {
	echo " > Moje Konto > Ile punktów Close2you aktualnie mam";
}
if ($event->getArg("event") == "historia_zamowien") {
	echo " > Moje Konto > Historia zamówień";
}
if ($event->getArg("event") == "bezplatny_pakiet_promocyjny") {
	echo " > Moje Konto > Bezpłatny pakiet promocyjny";
}


$arrHighligths = array(moje_konto_zapisz, moje_konto_potwierdzenie, hologramy,  getorderstabledata, zamowienie);
$currentEvent = $event->getArg('event');
	
if (in_array($currentEvent, $arrHighligths)) {
	echo " > Moje Konto";
}
?>
<?if($arrProductCategoryPlain) {?>
	<?foreach($arrProductCategoryPlain as $objProductCategoryPlain) {
		if($objProductCategoryPlain->getProductCategorySeoName() == $event->getArg("id1")) {
			$fatherCategoryName = $objProductCategoryPlain->getProductCategoryName();			
		}
		if($objProductCategoryPlain->getProductCategorySeoName() == $event->getArg("id2")) {
			$productCategoryName = str_replace("&nbsp; &nbsp;","",$objProductCategoryPlain->getProductCategoryName());
			$childrenCategoryName = $productCategoryName; 	
		}	
	}?>
	
	<?if ($event->getArg("event") == "produkt") {?>
		<?$objProduct = $event->getArg("objProduct");?>
		
		<?$urlExtension = "";?>
			<?if($objProduct->getProductCategoryLevelTwoSeoName() != "") {
				$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName()."/".$objProduct->getProductCategoryLevelTwoSeoName();
				echo " > <a title=\"".$objProduct->getProductCategoryLevelOneName()."\" class=\"anchor_link\" href=\"".$SN."produkty/".$objProduct->getProductCategoryLevelOneSeoName().".html\">".$objProduct->getProductCategoryLevelOneName()."</a> > <a title=\"".$objProduct->getProductCategoryLevelTwoName()."\" class=\"anchor_link\" href=\"".$SN."produkty".$urlExtension.".html\">".$objProduct->getProductCategoryLevelTwoName()."</a>";
			} else {
				$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName();
				echo " > <a title=\"".$objProduct->getProductCategoryLevelOneName()."\" class=\"anchor_link\" href=\"".$SN."produkty/".$urlExtension.".html\">".$objProduct->getProductCategoryLevelOneName()."</a>";
			}?>
		<?echo " > ".$objProduct->getName();?> 
		
				
	<?} else {?>
		<?if($fatherCategoryName != "" and $childrenCategoryName != "") {
				echo " > <a title=\"".$fatherCategoryName."\" class=\"anchor_link\" href=\"".$SN."produkty/".$event->getArg("id1").".html\">".$fatherCategoryName."</a> > ".$childrenCategoryName;
			} elseif ($fatherCategoryName != "" and $childrenCategoryName == "") {
				echo " > ".$fatherCategoryName;	
		}?>
		
	<?}?>
	
	
<?}?>