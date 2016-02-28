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
								<a href="<?=$SN;?>young_life_page/qui-sommes-nous-cci-france.html"><img src="<?=$SN;?>images/young_life/footer_logo_1.jpg" /></a>
								<a href="<?=$SN;?>young_life_page/qui-sommes-nous-opinionway.html"><img src="<?=$SN;?>images/young_life/footer_logo_3.jpg" /></a>
								<div style="border-bottom: 1px solid #666; padding:10px; width:200px;"></div>
								<div style="padding:10px;"></div>
								<h2>CONTACT</h2>
								<address>
									<i class="fa fa-envelope"></i> Mel: <a href="mailto:CCIFrance@opinion-way.com">CCIFrance@opinion-way.com</a>
								</address>
							</div>	
							
							<div class="col-xs-6 col-sm-6 col-md-4">
								<h2><a href="<?=$SN;?>login.html">CONNEXION</a></h2>
								<div style="padding:10px;"></div>
								<h2><a href="<?=$SN;?>young_life_page/conditions-de-participation.html">CONDITIONS DE PARTICIPATION</a></h2>
								<div style="padding:10px;"></div>
								<h2>NOUS RETROUVER SUR LES RÉSEAUX SOCIAUX</h2>
								<ul class="list-inline social-list">
									<li><a href="<?=$SN;?>young_life_page/qui-sommes-nous-cci-france.html"><img src="<?=$SN;?>images/young_life/footer_logo_1.jpg" /></a></li>
									<li><a data-toggle="tooltip" data-placement="top" title="Twitter" href="https://twitter.com/ccifrance/status/568795447189508096" target="_blank"><i class="fa fa-twitter"></i></a></li>																		
								</ul>
								<ul class="list-inline social-list">
                                    <li style="padding-right:35px;"><a href="http://www.latribune.fr/" target="_blank"><img src="<?=$SN;?>images/young_life/footer_logo_2.jpg" /></a></li>
                                    <li><a data-toggle="tooltip" data-placement="top" title="Facebook" href="https://www.facebook.com/latribune" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a data-toggle="tooltip" data-placement="top" title="Twitter" href="https://twitter.com/latribune" target="_blank"><i class="fa fa-twitter"></i></a></li>                                                                       
                                </ul>                               
								<h2><a href="<?=$SN;?>young_life_page/mentions-legales.html">MENTIONS LÉGALES</a></h2>	
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
								<p>Copyright &copy; 2015 grandeconsultation.fr. All rights reserved.</p>
							</div>							
						</div>
					</div>
		        </footer>
		    </div>
		</section>
	    <!-- END FOOTER -->