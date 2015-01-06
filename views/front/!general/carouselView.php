<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
$arrDeltas = $event->getArg("arrDeltas");?>


 
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
												<a href="http://www.google.pl" target="_blank"><div class="container-head-one"></div></a>
											</div>
										</div>
									</div>
								</li>
							
								<li>
									<div class="flex-slides">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<a href="http://www.onet.pl" target="_blank"><div class="container-head-two"></div></a>
											</div>
										</div>
									</div>
								</li>
								
								<li>
									<div class="flex-slides">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<a href="http://www.google.pl" target="_blank"><div class="container-head-three"></div></a>
											</div>
										</div>
									</div>
								</li>
								
								<li>
									<div class="flex-slides">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<a href="http://www.google.pl" target="_blank"><div class="container-head-four"></div></a>
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
	