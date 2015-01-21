<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
require_once("model/components/MenuBuilderPL.inc.php");
require_once("model/components/MenuBuilderEN.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);

	$title = "Surveys";
	$keywords = "Surveys";
	$description = "Surveys";
	$url = "";
	$image = "";
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?=$title;?></title>
		<meta name="keywords" content="<?=$keywords?>" />
		<meta name="description" content="<?=$description;?>" />
		<link rel="shortcut icon" href="" />
		<meta property="og:title" content="<?=$title?>"/>
	    <meta property="og:type" content="article"/>
	    <meta property="og:url" content="<?=$url?>"/>
	    <meta property="og:image" content="<?=$image?>"/>
	    <meta property="og:site_name" content="Surveys"/>
	    <meta property="fb:admins" content="543999369"/>
	    <meta property="og:description" content="<?=$description?>"/>
	    
	    <!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
	
		<!-- Bootstrap -->
		<link href="<?=$SN;?>bootstrap/css/bootstrap.css" rel="stylesheet">
	
		<!-- Icon Fonts -->
		<link href="<?=$SN;?>css/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
	
		<!-- Theme -->
		<link href="<?=$SN;?>css/theme-animate.css" rel="stylesheet">
		<link href="<?=$SN;?>css/theme-elements.css" rel="stylesheet">
		<link href="<?=$SN;?>css/theme-blog.css" rel="stylesheet">
		<link href="<?=$SN;?>css/theme-shop.css" rel="stylesheet">
		<link href="<?=$SN;?>css/theme.css" rel="stylesheet">
		<link href="<?=$SN;?>styles/prettyPhoto.css" rel="stylesheet">
		<link href="<?=$SN;?>styles/flexslider.css" rel="stylesheet">
		
		<!-- Colors-->
		<link href="<?=$SN;?>css/colors/blue/style.css" rel="stylesheet" id="layoutstyle">
	
		<!-- Theme Responsive-->
		<link href="<?=$SN;?>css/theme-responsive.css" rel="stylesheet">
	
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?=$SN;?>vendor/jquery.min.js"></script>
							
	</head>
	
	<body>
			<header>
			<?if ($event->getArg('navigationView') != "") {
				echo $event->getArg('navigationView');
			}?>
			<?if ($event->getArg('userAreaMenuView') != "") {
				echo $event->getArg('userAreaMenuView');
			}?>
			</header>
			
			<?if ($event->getArg('carouselView') != "") {
				echo $event->getArg('carouselView');
			}?>
			
			<?if ($event->getArg('homePageView') != "") {
				echo $event->getArg('homePageView');
			}?>
			
			<?if ($event->getArg('nproductsView') != "") {
				echo $event->getArg('nproductsView');
			}?>
			
			<?if ($event->getArg('nproductView') != "") {
				echo $event->getArg('nproductView');
			}?>
			
			<?if ($event->getArg('nShoppingCartView') != "") {
				echo $event->getArg('nShoppingCartView');
			}?>
			
			<?if ($event->getArg('nOrderAddressView') != "") {
				echo $event->getArg('nOrderAddressView');
			}?>
			
			<?if ($event->getArg('nOrderPaymentView') != "") {
				echo $event->getArg('nOrderPaymentView');
			}?>
			
			<?if ($event->getArg('nOnlineStoreView') != "") {
				echo $event->getArg('nOnlineStoreView');
			}?>
			
			<?if ($event->getArg('nOkView') != "") {
				echo $event->getArg('nOkView');
			}?>
			
			<?if ($event->getArg('nErrorView') != "") {
				echo $event->getArg('nErrorView');
			}?>
			
			<?if ($event->getArg('nOnlineMemberView') != "") {
				echo $event->getArg('nOnlineMemberView');
			}?>
			
			<?if ($event->getArg('newsletterConfirmationView') != "") {
				echo $event->getArg('newsletterConfirmationView');
			}?>
			
			<?if ($event->getArg('newsletterFormView') != "") {
				echo $event->getArg('newsletterFormView');
			}?>
			
			<?if ($event->getArg('loginFormView') != "") {
				echo $event->getArg('loginFormView');
			}?>
			
			<?if ($event->getArg('registerFormView') != "") {
				echo $event->getArg('registerFormView');
			}?>
			
			<?if ($event->getArg('registerConfirmationView') != "") {
				echo $event->getArg('registerConfirmationView');
			}?>
			
			<?if ($event->getArg('forgotPasswordFormView') != "") {
				echo $event->getArg('forgotPasswordFormView');
			}?>
			
			<?if ($event->getArg('forgotPasswordConfirmationView') != "") {
				echo $event->getArg('forgotPasswordConfirmationView');
			}?>
			
			<?if ($event->getArg('changePasswordFormView') != "") {
				echo $event->getArg('changePasswordFormView');
			}?>
			
			<?if ($event->getArg('changePasswordConfirmationView') != "") {
				echo $event->getArg('changePasswordConfirmationView');
			}?>
			
			<?if ($event->getArg('removeAccountFormView') != "") {
				echo $event->getArg('removeAccountFormView');
			}?>
			
			<?if ($event->getArg('removeAccountConfirmationView') != "") {
				echo $event->getArg('removeAccountConfirmationView');
			}?>
			
			<?if ($event->getArg('contactFormView') != "") {
				echo $event->getArg('contactFormView');
			}?>
			
			<?if ($event->getArg('cmsView') != "") {
				echo $event->getArg('cmsView');
			}?>
			
			<?if ($event->getArg('activationView') != "") {
				echo $event->getArg('activationView');
			}?>
			
			<?if ($event->getArg('myAccountStartView') != "") {
				echo $event->getArg('myAccountStartView');
			}?>
			
			<?if ($event->getArg('themeMarketView') != "") {
				echo $event->getArg('themeMarketView');
			}?>
			
			
			
			<?if ($event->getArg('contactConfirmationView') != "") {
				echo $event->getArg('contactConfirmationView');
			}?>
		
			<?if ($event->getArg('footerView') != "") {
				echo $event->getArg('footerView');
			}?>
	
			<?if ($event->getArg('searchView') != "") {
				echo $event->getArg('searchView');
			}?>
		<!-- Include all compiled plugins (below), or include individual files as needed --> 
		<script src="<?=$SN;?>bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=$SN;?>bootstrap/js/bootstrap-hover-dropdown.min.js"></script>
		<script src="<?=$SN;?>vendor/modernizr.custom.js"></script>
		<script src="<?=$SN;?>vendor/jquery.stellar.js"></script>
		<script src="<?=$SN;?>vendor/masonry.pkgd.min.js"></script>
		<script src="<?=$SN;?>vendor/jquery.pricefilter.js"></script>
		<script src="<?=$SN;?>vendor/bxslider/jquery.bxslider.min.js"></script>
		<script src="<?=$SN;?>vendor/mediaelement-and-player.js"></script>
		<script src="<?=$SN;?>vendor/waypoints.min.js"></script>
		
		<!-- Theme Initializer -->
		<script src="<?=$SN;?>js/theme.plugins.js"></script>
		<script src="<?=$SN;?>js/theme.js"></script>
		
		<!-- Highcharts -->
		<script type="text/javascript" src="<?=$SN;?>js/highcharts.js"></script>
		<script src="http://code.highcharts.com/maps/1.0.1/modules/map.js" type="text/javascript"></script>
		<script src="http://code.highcharts.com/stock/modules/exporting.js" type="text/javascript"></script>
		<script src="http://code.highcharts.com/mapdata/custom/world.js" type="text/javascript"></script>
		
		
		<!-- Others -->
		<script src="<?=$SN;?>js/jquery.surveys.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.prettyPhoto.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.flexslider.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/usdeur.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/slides.js"></script>
	</body>

</html>