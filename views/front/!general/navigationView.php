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
					    <?$objUser = $objAppSession->getSession("User")?>
					    <li style="background: #E50043; border-left: 1px solid #FFF;">
							<a href="<?=$SN;?>myAccountStart.html">MON COMPTE</a>										
						</li>
						<li style="background: #E50043; margin: 0px; border-left: 1px solid #FFF;">
							<a href="<?=$SN;?>executeLogout.html">DÉCONNEXION</a>																	
						</li>
						<?if($objUser->getUserId() == 3) {?>
                            <li style="background: #FF9900; margin: 0px; border-left: 1px solid #FFF;">
                                <a href="<?=$SN;?>admin/index.php?event=showTopicsList"><?=$oT->gL("txtGoBackToAdminPanel")?></a>                                       
                            </li>    
                        <?}?>                        
                        <li style="background: #004379; margin: 0px; border-left: 1px solid #FFF;border-right: 1px solid #FFF;">
                            <a href="<?=$SN;?>blog.html">LE BLOG</a>
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
                            <a href="<?=$SN;?>blog.html">LE BLOG</a>
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
		<div class="row" style="background-color:#515356;">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div style="text-align:center;"><a href="<?=$SN?>young_life.html"><img src="<?=$SN?>images/young_life/young_life.jpg"></a></div>															
			</div>			
		</div>
		
		<div class="row" style="background-color:#FF5E1B;">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div style="padding:10px 10px 10px 10px; color: #FFFFFF; font-size:40px; font-weight:bold;">Bienvenue Jean-Pierre!</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3">
				<div style="padding:7px 10px 10px 10px; color: #FFFFFF; font-size:22px; font-weight:bold; text-align:right;">Vous avez déjà<br/>participé à</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3">
				<div style="padding:10px 10px 10px 10px; color: #FFFFFF; font-size:36px; font-weight:bold;">2/9 enquêtes</div>
			</div>
		</div>
	</div>
</div>
    
    	<div id="menu">
    		<div class="container" style="padding-bottom:10px;">
    		
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