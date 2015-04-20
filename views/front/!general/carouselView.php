<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
$arrDeltas = $event->getArg("arrDeltas");?>

<style>
/* styles for texts over banner 1  start */
 .slide-text-banner-1 {
	background-image: url("<?=$SN;?>images/banners/banner_1.jpg");
	text-align: center;	
	height:360px;	
}
@media (min-width: 992px) {
	 .slide-text-banner-1 {
		padding-top: 80px;
	}
	 .slide-text-banner-1 h1 {
		color: #FFFFFF;
		font-size:60px;
		font-weight:bold;
	}
	 .slide-text-banner-1 h2 {
		color: #FFFFFF;
		font-size:30px;
	}
	 .slide-text-banner-1 h3 {
		color: #FFFFFF;
		font-size:20px;
	}
}
@media (max-width: 992px) {
	 .slide-text-banner-1 {
		padding-top: 100px;
	}
	 .slide-text-banner-1 h1 {
		color: #FFFFFF;
		font-size:40px;
		font-weight:bold;
	}
	 .slide-text-banner-1 h2 {
		color: #FFFFFF;
		font-size:25px;
	}
	 .slide-text-banner-1 h3 {
		color: #FFFFFF;
		font-size:15px;
	}
}
/* styles for texts over banner 1  end */


/* styles for texts over banner 2  start */
 .slide-text-banner-2 {
	background-image: url("<?=$SN;?>images/banners/banner_2.jpg");
	text-align: center;	
	height:360px;	
}
@media (min-width: 992px) {
	 .slide-text-banner-2 {
		padding-top: 80px;
	}
	 .slide-text-banner-2 h1 {
		color: #FFFFFF;
		font-size:60px;
		font-weight:bold;
	}
	 .slide-text-banner-2 h2 {
		color: #FFFFFF;
		font-size:30px;
	}
	 .slide-text-banner-2 h3 {
		color: #FFFFFF;
		font-size:20px;
	}
}
@media (max-width: 992px) {
	 .slide-text-banner-2 {
		padding-top: 100px;
	}
	 .slide-text-banner-2 h1 {
		color: #FFFFFF;
		font-size:40px;
		font-weight:bold;
	}
	 .slide-text-banner-2 h2 {
		color: #FFFFFF;
		font-size:25px;
	}
	 .slide-text-banner-2 h3 {
		color: #FFFFFF;
		font-size:15px;
	}
}
/* styles for texts over banner 2  end */
</style>

 
		<!-- Begin Main Slide -->
		<div role="main" style="height:370px;">
			<!-- Begin Main Slide -->
			<section>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="flexslider">
					    	<ul class="slides">


							
								<li>
									<div class="flex-slides">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<a href="http://grandeconsultation.fr/register.html" target="_blank"><div class="slide-text-banner-1">
											        <h1>Vous êtes entrepreneur ?</h1>
											        <h2>Venez rejoindre la grande consultation !</h2>
											        <h3></h3>
											    </div></a>
											</div>
										</div>
									</div>
								</li>
								

								
								<li>
							  		<div class="flex-slides">
							  			<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<a href="http://grandeconsultation.fr/surveys_page/la-grande-consultation-des-entrepreneurs-sondages-opinionway-pour-cci-france-la-tribune-europe-1.html" target="_blank"><div class="container-head-one"></div></a>
											</div>
										</div>
									</div>
								</li>
								
								
							
								<li>
									<div class="flex-slides">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<a href="http://grandeconsultation.fr/surveys_page/la-grande-consultation-des-entrepreneurs-sondages-opinionway-pour-cci-france-la-tribune-europe-1.html" target="_blank"><div class="container-head-two"></div></a>
											</div>
										</div>
									</div>
								</li>
								
								
								
								<li>
									<div class="flex-slides">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<a href="http://grandeconsultation.fr/surveys_page/la-grande-consultation-des-entrepreneurs-sondages-opinionway-pour-cci-france-la-tribune-europe-1.html" target="_blank"><div class="container-head-three"></div></a>
											</div>
										</div>
									</div>
								</li>
								
								
								
								<li>
									<div class="flex-slides">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<a href="http://grandeconsultation.fr/surveys_page/la-grande-consultation-des-entrepreneurs-sondages-opinionway-pour-cci-france-la-tribune-europe-1.html" target="_blank"><div class="container-head-four"></div></a>
											</div>
										</div>
									</div>
								</li>								
																
						



						
								
								<li>
									<div class="flex-slides">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<a href="http://grandeconsultation.fr/surveys_page/observatoire-de-la-performance-des-pmeeti-banque-palatinechallengesitele.html" target="_blank"><div class="container-head-five"></div></a>
											</div>
										</div>
									</div>
								</li> 
								
								
					    	</ul>
							
							
			        	</div>
			        </div>
				</div>
			</div>
		</section>
		<!-- End Main Slide -->	 		 
	