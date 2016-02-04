<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
require_once("model/components/MenuBuilderPL.inc.php");
require_once("model/components/MenuBuilderEN.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);

    $title = "Grande Consultation";
    $keywords = "Grande Consultation";
    $description = "Grande Consultation";
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
        
        <!-- Colors -->
        <link href="<?=$SN;?>css/colors/blue/style.css" rel="stylesheet" id="layoutstyle">
    
        <!-- Theme Responsive -->
        <link href="<?=$SN;?>css/theme-responsive.css" rel="stylesheet">
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?=$SN;?>vendor/jquery.min.js"></script>
        
        <?if ($event->getArg('lesConsultationsEnCoursChatView') != "") {?>
            <link href="<?=$SN;?>styles/metisMenu.min.css" rel="stylesheet">
            <link href="<?=$SN;?>styles/metisMenuNav.css" rel="stylesheet">
            <script src="<?=$SN;?>vendor/metisMenu.js"></script>
            <script>
                $(function () {
                    $('#menu100').metisMenu({
                        toggle: false
                    });    
                });
            </script>
        <?}?>
        
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-60924329-1', 'auto');
          ga('send', 'pageview');
        </script>
                            
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
        
        <?if ($event->getArg('blogView') != "") {
            echo $event->getArg('blogView');
        }?>
        <?if ($event->getArg('blogEntryView') != "") {
            echo $event->getArg('blogEntryView');
        }?>
        
        <?if ($event->getArg('bookFormView') != "") {
            echo $event->getArg('bookFormView');
        }?>
        
        <?if ($event->getArg('bookConfirmationView') != "") {
            echo $event->getArg('bookConfirmationView');
        }?>
        
        <?if ($event->getArg('footerView') != "") {
               echo $event->getArg('footerView');
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
        <script src="<?=$SN;?>js/map.js" type="text/javascript"></script>
        <script src="<?=$SN;?>js/modules/exporting.js" type="text/javascript"></script>
        <script src="<?=$SN;?>js/modules/treemap.js" type="text/javascript"></script>
        
        <!-- Others -->
        <script src="<?=$SN;?>js/jquery.surveys.js"></script>
        <script type="text/javascript" src="<?=$SN;?>js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="<?=$SN;?>js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="<?=$SN;?>js/usdeur.js"></script>
        <script type="text/javascript" src="<?=$SN;?>js/slides.js"></script>
    </body>

</html>