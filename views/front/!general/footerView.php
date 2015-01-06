<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>

		<!-- BEGIN FOOTER -->
		<section class="footer">
		    <div class="container">
		        <footer>
		            <div class="upper-foot">
						<div class="row">
						
							<div class="col-xs-6 col-sm-6 col-md-4">
								<h2>QUI SOMMES-NOUS ?</h2>
								<img src="<?=$SN;?>images/surveys/footer_logo.jpg" />
								<div style="border-bottom: 2px solid #666; padding:10px; width:200px;"></div>
								<div style="padding:10px;"></div>
								<h2>CONTACT</h2>
								<address>
									<i class="fa fa-map-marker"></i> Adresse, adresse, adresse<br/>
									<i class="fa fa-phone"></i> Telefon: <br>
									<i class="fa fa-envelope"></i> Mel: <a href="mailto:X">xxx@xxx.com</a>
								</address>
							</div>	
							
							<div class="col-xs-6 col-sm-6 col-md-4">
								<h2>SE CONNECTER</h2>
								<div style="padding:10px;"></div>
								<h2>CONDITIONS DE PARTICIPATION</h2>
								<div style="padding:10px;"></div>
								<h2>NOUS FAIRE CONNAITRE</h2>
								<ul class="list-inline social-list">
									<li><a data-toggle="tooltip" data-placement="top" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="Twitter" href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="Google+" href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="Pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>									
								</ul>								
							</div>
							
							<div class="col-xs-6 col-sm-6 col-md-4">
								<h2>NUAGE DE MOTS</h2>
								<ul class="list-inline tagclouds">
									<li><a href="#">CONFIANCE</a></li>
									<li><a href="#">INVESTISSEMENTS</a></li>
									<li><a href="#">PMI / ETI</a></li>
									<li><a href="#">CCI</a></li>
									<li><a href="#">CAC 40</a></li>
									<li><a href="#">CICE</a></li>
									<li><a href="#">INNOVATION</a></li>
								</ul>									
							</div>
							
						</div>
					</div>
					<div class="below-foot">
						<div class="row">
							<div class="col-xs-6 copyrights">
								<p>Copyright &copy; 2015 Surveys. All rights reserved.</p>
							</div>
							<?/*?>
							<div class="col-xs-6 text-right">
								<ul class="list-inline social-list">
									<li><a data-toggle="tooltip" data-placement="top" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="Google+" href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="Pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="RSS" href="#"><i class="fa fa-rss"></i></a></li>
								</ul>
							</div>
							<?*/?>
						</div>
					</div>
		        </footer>
		    </div>
		</section>
	    <!-- END FOOTER -->