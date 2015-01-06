<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>

<div role="main" class="main">
	<!-- Begin page top -->
	<section class="page-top-lg"></section>
	<!-- End page top -->
	<div class="container">
		<div class="contact-content contact-content-full animation">
			<h3><?=$oT->gL("txtNewsletterConfirmation")?></h3>
			<p><?=$oT->gL("txtYourEmailWasAdded")?><br/><br/><a href="<?=$SN;?>musikkglede.html"><?=$oT->gL("txtStart")?></a></p>
		</div>
	</div>
</div>