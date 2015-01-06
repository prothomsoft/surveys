<?
require_once("model/components/session.inc.php");
require_once("model/components/counter.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$counter=new Counter();
$tab = $counter->counter();
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>

<?$currentEvent = $event->getArg('event');?>
<?$arrHighligths = array(moje_konto_start);?>
<div id="accordion" class="ui-accordion"> 
		<div class="menu_left"> 
		<h3 class="ui-accordion-header" style="background: #000; font-weight: normal;"><a class="anchor_link"  href="<?=$SN;?>moje_konto_start.html"><?=$oT->gL("txtStart")?></a></h3>
		</div>
</div>

<?$currentEvent = $event->getArg('event');?>
<?$arrHighligths = array(moje_konto, moje_konto_zapisz, moje_konto_potwierdzenie);?>
<div id="accordion" class="ui-accordion"> 
		<div class="menu_left"> 
		<h3 class="ui-accordion-header" style="background: #000; font-weight: normal; line-height:20px;"><a class="anchor_link" style="border:0px;" href="<?=$SN;?>moje_konto.html"><?=$oT->gL("txtPersonalData")?></a></h3>
		</div>
</div>

<?$currentEvent = $event->getArg('event');?>
<?$arrHighligths = array(zmiana_hasla);?>
<div id="accordion" class="ui-accordion"> 
		<div class="menu_left"> 
		<h3 class="ui-accordion-header" style="background: #000; font-weight: normal; line-height:20px;"><a class="anchor_link" style="border:0px;" href="<?=$SN;?>zmiana_hasla.html"><?=$oT->gL("txtChangePassword")?></a></h3>
		</div>
</div>

<div class="ui-helper-clearfix spacer"></div>