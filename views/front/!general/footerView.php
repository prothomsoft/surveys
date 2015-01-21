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
								<a href="<?=$SN;?>surveys_page/qui-sommes-nous-opinionway.html"><img src="<?=$SN;?>images/surveys/footer_logo_1.jpg" /></a>
								<a href="<?=$SN;?>surveys_page/qui-sommes-nous-cci-france.html"><img src="<?=$SN;?>images/surveys/footer_logo_2.jpg" /></a>
								<div style="border-bottom: 2px solid #666; padding:10px; width:200px;"></div>
								<div style="padding:10px;"></div>
								<h2>CONTACT</h2>
								<address>
									<i class="fa fa-map-marker"></i> Adresse, adresse, adresse<br/>
									<i class="fa fa-phone"></i> Telefon: <br>
									<i class="fa fa-envelope"></i> Mel: <a href="mailto:CCIFrance@opinion-way.fr">CCIFrance@opinion-way.fr</a>
								</address>
							</div>	
							
							<div class="col-xs-6 col-sm-6 col-md-4">
								<h2><a href="<?=$SN;?>login.html">CONNEXION</a></h2>
								<div style="padding:10px;"></div>
								<h2><a href="<?=$SN;?>surveys_page/conditions-de-participation.html">CONDITIONS DE PARTICIPATION</a></h2>
								<div style="padding:10px;"></div>
								<h2>NOUS FAIRE CONNAITRE</h2>
								<ul class="list-inline social-list">
									<li><a data-toggle="tooltip" data-placement="top" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="Twitter" href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="Google+" href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="Pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>									
								</ul>								
								<h2><a href="<?=$SN;?>surveys_page/mentions-legales.html">MENTIONS LÉGALES</a></h2>	
							</div>
							
							<div class="col-xs-6 col-sm-6 col-md-4">
								<h2>NUAGE DE MOTS</h2>
								
								<?$objCmsContentDao = new CmsContentDao();
					  $objCmsContent = $objCmsContentDao->read(39);
					  $longDescription = htmlspecialchars_decode($objCmsContent->getLongDescription());					  
					?>
					<?=$longDescription;?>
								
														
							</div>
							
						</div>
					</div>
					<div class="below-foot">
						<div class="row">
							<div class="col-xs-6 copyrights">
								<p>Copyright &copy; 2015 Surveys. All rights reserved.</p>
							</div>							
						</div>
					</div>
		        </footer>
		    </div>
		</section>
	    <!-- END FOOTER -->