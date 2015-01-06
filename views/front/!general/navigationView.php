<?
require_once("model/components/session.inc.php");
require_once("model/components/MenuBuilderPL.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>

		<!-- BEGIN NAVIGATION -->
	    <header>
	    	<div id="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<ul class="nav nav-pills nav-top navbar-right">
								<li class="search hidden-xs hidden-sm">
									<a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>
								</li>
								<?if ($objAppSession->getSession("User") != "") {?>				
									<li>
										<a href="<?=$SN;?>myAccountStart.html">MON COMPTE</span></a>										
									</li>
									<li>
										<a href="<?=$SN;?>executeLogout.html">LOGOUT</span></a>										
									</li>
									<li>
										<a href="<?=$SN;?>contact_form.html">CONTACT</span></a>
									</li>
								<?} else {?>
									<li>
										<a href="<?=$SN;?>login.html">LOGIN</span></a>
									</li>
									<li>
										<a href="<?=$SN;?>register.html">REGISTER</span></a>
									</li>
									<li>
										<a href="<?=$SN;?>contact_form.html">CONTACT</span></a>
									</li>
								<?}?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div id="logo">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div style="padding:20px; text-align:center;"><a href="<?=$SN?>surveys.html"><img src="<?=$SN?>images/surveys/logo_surveys.jpg"></a></div>
							<div><h4 style="text-align: center; color: #004378;">ENTERPRENEURS DE FRANCE,<br/>UNE FORCE EN ACTION,<br/>COMMUNAUTE DE CCI DE FRANCE</h4></div>
							<div style="border-bottom: 1px dashed #004378;"></div>							
						</div>
					</div>
				</div>
			</div>
	    
	    	<div id="menu">
	    		<div class="container" style="padding-bottom:10px">
	    		    	<nav class="navbar navbar-default navbar-main navbar-main-slide" role="navigation">
	    		    		<div style="padding-bottom: 5px;">
		    		    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						          <span class="sr-only">Toggle navigation</span>
						          <span style="font-size:18px; color: #004378;" class="glyphicon glyphicon-align-justify"></span>
						    </button>
						    </div>
					    													
							<div class="collapse navbar-collapse">
								<?$menu = new MenuBuilderPL();
							echo $menu->get_menu_html();?>						
						</div>
					</nav>
				</div>
			</div>
		</header>
	    <!-- END NAVIGATION -->