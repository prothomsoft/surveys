<?
require_once("model/components/session.inc.php");
require_once("model/components/MenuBuilderPL.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>

<div><h3 style="text-align:center">Bienvenue dans votre espace</h3></div>
	
		<div id="menu1">
    		<div class="container" style="padding-bottom:10px">
    		    	<nav class="navbar navbar-default navbar-main-user navbar-main-slide" role="navigation" style="z-index:1">
    		    		<div style="padding-bottom: 5px;">
    		    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".menu2">
				          <span class="sr-only">Toggle navigation</span>
				          <span style="font-size:18px; color: #004378;" class="glyphicon glyphicon-align-justify"></span>
			    </button>
			    </div>										
				<div class="collapse navbar-collapse menu2">
					<?$menu = new MenuBuilderPL();
					echo $menu->get_menu_html(19);?>						
			</div>
		</nav>
	</div>
</div>
<div style="padding:15px;"></div>