<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>

	<!-- Begin Search -->
	<div class="modal fade bs-example-modal-lg search-wrapper" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<p class="clearfix"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></p>
				<form class="form-inline form-search" role="form" method="post" action="<?=$SN;?>searchResults.html">
					<input type="hidden" name="form_SN" id="form_SN" value="<?=$SN;?>"/>
					<div class="form-group">
						<label class="sr-only" for="textsearch">Enter text search</label>
						<input type="text" class="form-control input-lg" id="textsearch" name="keyword" placeholder="Enter text search">
					</div>
					<button type="submit" class="btn btn-white" style="padding: 14px 15px 13px;">Search</button>
				</form>
			</div>
		</div>
	</div>
	<!-- End Search -->