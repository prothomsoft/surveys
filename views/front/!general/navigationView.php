<?
require_once("model/components/session.inc.php");
require_once("model/components/MenuBuilderPL.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>
<div id="top">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<ul class="nav nav-pills nav-top navbar-right">
					<?/* ?>
					<li class="search hidden-xs hidden-sm">
						<a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>
					</li>
					<?*/?>
					<?if ($objAppSession->getSession("User") != "") {?>				
						<li style="background: #E50043; border-left: 1px solid #FFF;">
							<a href="<?=$SN;?>myAccountStart.html">MON COMPTE</a>										
						</li>
						<li style="background: #E50043; margin: 0px; border-left: 1px solid #FFF;">
							<a href="<?=$SN;?>executeLogout.html">DÉCONNECTION</a>										
						</li>
						<li style="background: #004379; margin: 0px; border-left: 1px solid #FFF;border-right: 1px solid #FFF;">
							<a href="<?=$SN;?>contact_form.html">NOUS CONTACTER</a>
						</li>
					<?} else {?>
						<li style="background: #E50043; border-left: 1px solid #FFF;">
							<a href="<?=$SN;?>login.html">CONNEXION</a>
						</li>
						<li style="background: #E50043; margin: 0px; border-left: 1px solid #FFF;">
							<a href="<?=$SN;?>register.html">S'INSCRIRE</a>
						</li>
						<li style="background: #004379; margin: 0px; border-left: 1px solid #FFF;border-right: 1px solid #FFF;">
							<a href="<?=$SN;?>contact_form.html">NOUS CONTACTER</a>
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
				<div><h3 style="text-align: center; color: #004378; font-size: 34px;">GRANDE CONSULTATION<br/>DES ENTREPRENEURS</h3></div>
				<div style="border-bottom: 1px dashed #004378;"></div>							
					</div>
				</div>
			</div>
		</div>
    
    	<div id="menu">
    		<div class="container" style="padding-bottom:10px">
    		    	<nav class="navbar navbar-default navbar-main navbar-main-slide" role="navigation">
    		    		<div style="padding-bottom: 5px;">
    		    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".menu1">
				          <span class="sr-only">Toggle navigation</span>
				          <span style="font-size:18px; color: #004378;" class="glyphicon glyphicon-align-justify"></span>
			    </button>
			    </div>										
				<div class="collapse navbar-collapse menu1">
					<?$menu = new MenuBuilderPL();
					echo $menu->get_menu_html(18);?>						
			</div>
		</nav>
	</div>
</div>