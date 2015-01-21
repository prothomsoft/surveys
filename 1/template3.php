<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
require_once("model/components/MenuBuilderPL.inc.php");
require_once("model/components/MenuBuilderEN.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);

if($event->getArg('event') == "osrodek_kultury_krakow_nowa_huta") {
	$objCmsContent = $event->getArg('objCmsContent');
	$title = htmlspecialchars_decode($objCmsContent->getName()).", Ośrodek Kultury  Kraków - Nowa Huta";
	$keywords = htmlspecialchars_decode($objCmsContent->getKeyword());
	$description = htmlspecialchars_decode($objCmsContent->getDescription());
}else if ($event->getArg('event') == "kluby") {
	$title = "Ośrodek Kultury  Kraków - Nowa Huta, Kluby";
	$keywords = "Ośrodek Kultury  Kraków - Nowa Huta, Kluby";
	$description = "Ośrodek Kultury  Kraków - Nowa Huta, Kluby";
} else {
	$title = "Ośrodek Kultury  Kraków - Nowa Huta, Kluby";
	$keywords = "Ośrodek Kultury  Kraków - Nowa Huta, Kluby";
	$description = "Ośrodek Kultury  Kraków - Nowa Huta, Kluby";	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?=$title;?></title>
		<meta name="keywords" content="<?=$keywords?>" />
		<meta name="description" content="<?=$description;?>" />
		<meta name="author" content="http://www.prothomsoft.com (tprokop@prothomsoft.com)" /> 
		<link type="text/css" href="<?=$SN;?>styles/custom-theme-orange/jquery-ui-1.8.12.custom.css" rel="stylesheet" />
		<link href="<?=$SN;?>styles/global.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript" src="<?=$SN;?>js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery-ui-1.8.12.custom.min.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/hoverIntent.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/superfish.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/plugins.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.krakownh.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.prettyPhoto.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.sparkle.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.slider.js"></script>
		<script language="javascript">AC_FL_RunContent = 0;</script>
		<script src="<?=$SN;?>js/AC_RunActiveContent.js" type="text/javascript"></script>
		<?if ($event->getArg('headerNavigationWithMapScripts') != "") {
			echo $event->getArg('headerNavigationWithMapScripts');
		}?>		
	</head>
	
	<body>
			
	<div id="wrapper">
	
		<div id="top"><a href="<?=$SN?>osrodek_kultury.html" title="Ośrodek Kultury Kraków - Nowa Huta, zajęcia dla dzieci, młodzieży, dorosłych, seniorów, kursy językowe, kursy komputerowe, zajęcia taneczne, wynajęcia, organizacja urodzin"><img src="<?=$SN;?>images/header/top2.jpg" alt="Ośrodek Kultury Kraków - Nowa Huta, zajęcia dla dzieci, młodzieży, dorosłych, seniorów, kursy językowe, kursy komputerowe, zajęcia taneczne, wynajęcia, organizacja urodzin"></a>
		
		<div class="middle" style="height:250px;">
	        <div class="main_view">
	            <div class="window">	
	                <div class="image_reel">
                            <a href="http://krakownh.pl/aktualnosc/2163/spotkania-swiateczne-w-klubach-osrodka-kultury.html" target="_blank"><img src="<?=$SN?>images/banner/banner1.jpg" alt=""/></a>                            
                            <a href="http://krakownh.pl/zapowiedz/2180/zaplanuj-ferie-z-naszym-osrodkiem.html" target="_blank"><img src="<?=$SN?>images/banner/banner2.jpg" alt=""/></a>                           
	                    <a href="http://krakownh.pl/zajecia_klub/1/16/0.html" target="_blank"><img src="<?=$SN?>images/banner/banner3.jpg" alt=""/></a>
	                    <a href="http://krakownh.pl/zajecia_klub/1/13/0.html" target="_blank"><img src="<?=$SN?>images/banner/banner4.jpg" alt="" /></a>
	                    <a href="http://krakownh.pl/zajecia_klub/1/19/0.html" target="_blank"><img src="<?=$SN?>images/banner/banner5.jpg" alt=""/></a>
	                    <a href="http://krakownh.pl/zajecia_klub/1/10/0.html" target="_blank"><img src="<?=$SN?>images/banner/banner6.jpg" alt=""/></a>
	                    <a href="http://krakownh.pl/zajecia_klub/1/2/0.html"target="_blank"><img src="<?=$SN?>images/banner/banner7.jpg" alt=""/></a>
	                    <a href="http://krakownh.pl/zajecia_klub/1/12/0.html"target="_blank"><img src="<?=$SN?>images/banner/banner8.jpg" alt=""/></a>
	                    <a href="http://krakownh.pl/zajecia_klub/1/14/0.html" target="_blank"><img src="<?=$SN?>images/banner/banner9.jpg" alt=""/></a>
						<a href="http://krakownh.pl/zajecia_klub/1/6/0.html" target="_blank"><img src="<?=$SN?>images/banner/banner10.jpg" alt=""/></a>
						<a href="http://krakownh.pl/zajecia_klub/1/8/0.html" target="_blank"><img src="<?=$SN?>images/banner/banner11.jpg" alt=""/></a>
						<a href="http://krakownh.pl/zajecia_klub/1/9/0.html" target="_blank"><img src="<?=$SN?>images/banner/banner12.jpg" alt=""/></a>
						<a href="http://krakownh.pl/zajecia_klub/1/11/0.html" target="_blank"><img src="<?=$SN?>images/banner/banner13.jpg" alt=""/></a>
						<a href="http://krakownh.pl/zajecia_klub/1/15/0.html" target="_blank"><img src="<?=$SN?>images/banner/banner14.jpg" alt=""/></a>
						<a href="http://krakownh.pl/aktualnosc/2020/seniorze-znajdz-swoj-dobry-czas-nowohucka-akademia-seniora-zaprasza.html" target="_blank"><img src="<?=$SN?>images/banner/banner15.jpg" alt=""/></a>
						<a href="http://krakownh.pl/osrodek_kultury_krakow_nowa_huta/od-potrzeby-do-pomyslu.html" target="_blank"><img src="<?=$SN?>images/banner/banner16.jpg" alt=""/></a>
				
	                </div>
	            </div>
	            <div class="paging">
	                <a href="#" rel="1">&bull;</a>
	                <a href="#" rel="2">&bull;</a>
	                <a href="#" rel="3">&bull;</a>
	                <a href="#" rel="4">&bull;</a>
	                <a href="#" rel="5">&bull;</a>
	                <a href="#" rel="6">&bull;</a>
	                <a href="#" rel="7">&bull;</a>
					<a href="#" rel="8">&bull;</a>
					<a href="#" rel="9">&bull;</a>
					<a href="#" rel="10">&bull;</a>
					<a href="#" rel="11">&bull;</a>
					<a href="#" rel="12">&bull;</a>
					<a href="#" rel="13">&bull;</a>
					
					
					
					
	            </div>
	        </div>
		</div>
		
		<div class="ui-helper-clearfix">
				<div class="menu">
					<?$menu = new MenuBuilderPL();
						echo $menu->get_menu_html();?>	
				</div>
		</div>
		
		<div id="middle"><img src="<?=$SN?>images/header/page_top.jpg"></div>
		
		<div class="ui-helper-clearfix spacer">
		</div> <!-- end .ui-helper-clearfix spacer -->
				
		<div class="ui-helper-clearfix content">
		
			<div class="content-column-right">
			
				<div class="ui-widget-header ui-corner-top center-header">
					<p>Wyszukiwarka</p>
				</div>
				
				<div class="center-header">
					<form name="search_form" id="search_form" method="post" action="<?=$SN?>searchAction.html">
						<div style="width:130px; float:left;">
						<input name="search_keyword" id="search_keyword" value="" type="text" style="width:130px;height:18px;">
						</div>
						<div style="width:60px; float:right;">
						<span class="search"><a href="javascript:search_box_submit();"><u>Szukaj</u></a></span>
						</div> 
					</form>					
				</div>
				
				<div class="ui-helper-clearfix spacer">
				</div> <!-- end .ui-helper-clearfix spacer -->
				
				<div style="padding-left:1px;">
					<div id="eventCalAjax"></div>
				</div>
				<br/>
				
				<?/*
				<div style="height:173px;">
					<a href="<?=$SN?>dokumenty/OKNH_20lat.pdf" target="_blank"><img src="<?=$SN?>images/broszura.jpg"></a>
				</div>
				*/?>
		
				<a class="anchor_link_1" href="<?=$SN?>klub/klub-aneks/6.html"><div class="ui-widget-header ui-corner-all center-header">Klub Aneks</div></a>
				<a class="anchor_link_1" href="<?=$SN?>klub/klub-dukat/2.html"><div class="ui-widget-header ui-corner-all center-header">Klub Dukat</div></a>
				<a class="anchor_link_1" href="<?=$SN?>klub/klub-herkules/8.html"><div class="ui-widget-header ui-corner-all center-header">Klub Herkules</div></a>
				<a class="anchor_link_1" href="<?=$SN?>klub/klub-jednosc/9.html"><div class="ui-widget-header ui-corner-all center-header">Klub Jedność</div></a>
				<a class="anchor_link_1" href="<?=$SN?>klub/klub-jedrus/10.html"><div class="ui-widget-header ui-corner-all center-header">Klub Jędruś</div></a>
				<a class="anchor_link_1" href="<?=$SN?>klub/klub-karino/11.html"><div class="ui-widget-header ui-corner-all center-header">Klub Karino</div></a>
				<a class="anchor_link_1" href="<?=$SN?>klub/klub-303/12.html"><div class="ui-widget-header ui-corner-all center-header">Klub 303</div></a>
				<a class="anchor_link_1" href="<?=$SN?>klub/klub-krzeslawice/13.html"><div class="ui-widget-header ui-corner-all center-header">Klub Krzesławice</div></a>
				<a class="anchor_link_1" href="<?=$SN?>klub/klub-mirage/14.html"><div class="ui-widget-header ui-corner-all center-header">Klub Mirage</div></a>
				<a class="anchor_link_1" href="<?=$SN?>klub/klub-osrodka-kultury/15.html"><div class="ui-widget-header ui-corner-all center-header">Klub Ośrodka Kultury</div></a>
				<a class="anchor_link_1" href="<?=$SN?>klub/klub-pod-kasztanami/16.html"><div class="ui-widget-header ui-corner-all center-header">Klub Pod Kasztanami</div></a>
				<a class="anchor_link_1" href="<?=$SN?>klub/klub-wersalik/19.html"><div class="ui-widget-header ui-corner-all center-header">Klub Wersalik</div></a>
				
				<div class="ui-helper-clearfix spacer">
				</div> <!-- end .ui-helper-clearfix spacer -->
				
				<div class="ui-widget-header ui-corner-top center-header">
					<p>Newsletter</p>
				</div>
				
				<div class="center-header">
					<p>Chcesz otrzymywać wiadomości o aktualnych wydarzeniach? Podaj Twój adres email i kliknij przycisk Zapisz.<br/><br/></p>
					<form name="formNewsletter" id="formNewsletter" method="post" action="<?=$SN?>newsletterAction.html">
						<div style="width:130px; float:left;">
						<input name="email" id="email" value="" type="text" style="width:130px;height:18px;">
						</div>
						<div style="width:60px; float:right;">
						<span class="save"><a href="javascript:save_box_submit();"><u>Zapisz</u></a></span>
						</div> 
					</form>
					<p><br/><br/></p>
				</div>
				
				<div class="ui-helper-clearfix spacer">
				</div> <!-- end .ui-helper-clearfix spacer -->
								
				<div class="ui-widget-header ui-corner-top center-header">
					<p>Sponsor</p>
				</div>
				
				<a href="http://www.prodent.pl" target="_blank"><img src="<?=$SN;?>images/polecamy/prodent.jpg" alt="http://prodent.pl/"/></a>
				
				<?if ($event->getArg('polecamyView') != "") {
					echo $event->getArg('polecamyView');
				}?>
				
				<div class="ui-helper-clearfix spacer">
				</div> <!-- end .ui-helper-clearfix spacer -->
				
				<div class="ui-widget-header ui-corner-top center-header">
					<p>Projekty</p>
				</div>
				<a class="anchor_link_2" href="<?=$SN?>osrodek_kultury_krakow_nowa_huta/dk.html"><div class="ui-widget-header" style="background:#000; border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000; border-bottom:1px solid #333; padding:10px 20px 10px 20px">
					<p>DK+</p>
				</div></a>
				<?/*
				<div class="menu" style="width:230px;">
					$menu = new MenuBuilderEN();
					echo $menu->get_menu_html(449);?>							
				</div>
				*/?>
				
				<div class="ui-helper-clearfix spacer">
				</div> <!-- end .ui-helper-clearfix spacer -->
				
				<div class="ui-widget-header ui-corner-top center-header">
					<p>Tagi</p>
				</div>
	
				<div style="padding:10px">
				<p style="text-align:center">
				<?$arrTags = $event->getArg("arrTags");
				if($arrTags) {
					foreach($arrTags as $objTag) {?>
					<a href="<?=$SN?>zajecia_tag/1/<?=$objTag->getTagId();?>.html"><?=$objTag->getName();?></a>&nbsp;
					<?}
				}
				?>
				</p>
				</div>			
				
								
				<div class="ui-helper-clearfix spacer">
				</div> <!-- end .ui-helper-clearfix spacer -->
				
				
			</div> <!-- end .content-column-right -->
			
			<div class="content-column-left">
				
					<?if ($event->getArg('eventView') != "") {
						echo $event->getArg('eventView');
					}?>
					<?if ($event->getArg('eventKalendarzView') != "") {
						echo $event->getArg('eventKalendarzView');
					}?>
					<?if ($event->getArg('photoView') != "") {
						echo $event->getArg('photoView');
					}?>
					<?if ($event->getArg('mediaView') != "") {
						echo $event->getArg('mediaView');
					}?>
					<?if ($event->getArg('calendarView') != "") {
						echo $event->getArg('calendarView');
					}?>
					
										
					<?if ($event->getArg('klubyView') != "") {
						echo $event->getArg('klubyView');
					}?>
					<?if ($event->getArg('klubView') != "") {
						echo $event->getArg('klubView');
					}?>
					<?if ($event->getArg('mapaKlubowView') != "") {
						echo $event->getArg('mapaKlubowView');
					}?>
										
					
					<?if ($event->getArg('rezerwacjaView') != "") {
						echo $event->getArg('rezerwacjaView');
					}?>
					<?if ($event->getArg('cmsView') != "") {
						echo $event->getArg('cmsView');
					}?>
					<?if ($event->getArg('newsletterFormView') != "") {
						echo $event->getArg('newsletterFormView');
					}?>
					<?if ($event->getArg('newsletterConfirmationView') != "") {
						echo $event->getArg('newsletterConfirmationView');
					}?>
					
					<?if ($event->getArg('filmyView') != "") {
						echo $event->getArg('filmyView');
					}?>
					<?if ($event->getArg('filmView') != "") {
						echo $event->getArg('filmView');
					}?>
					<?if ($event->getArg('zdjeciaView') != "") {
						echo $event->getArg('zdjeciaView');
					}?>
					<?if ($event->getArg('zdjeciaKlubView') != "") {
						echo $event->getArg('zdjeciaKlubView');
					}?>
					<?if ($event->getArg('zdjecieView') != "") {
						echo $event->getArg('zdjecieView');
					}?>
					<?if ($event->getArg('zdjecieKlubView') != "") {
						echo $event->getArg('zdjecieKlubView');
					}?>
					
					
					<?if ($event->getArg('uslugiView') != "") {
						echo $event->getArg('uslugiView');
					}?>
					<?if ($event->getArg('uslugiKlubView') != "") {
						echo $event->getArg('uslugiKlubView');
					}?>
					<?if ($event->getArg('uslugaView') != "") {
						echo $event->getArg('uslugaView');
					}?>
					<?if ($event->getArg('uslugaKlubView') != "") {
						echo $event->getArg('uslugaKlubView');
					}?>
					
					
					<?if ($event->getArg('zajeciaView') != "") {
						echo $event->getArg('zajeciaView');
					}?>
					<?if ($event->getArg('zajeciaTagView') != "") {
						echo $event->getArg('zajeciaTagView');
					}?>
					<?if ($event->getArg('zajeciaKlubView') != "") {
						echo $event->getArg('zajeciaKlubView');
					}?>
					<?if ($event->getArg('zajeciaKlubListaView') != "") {
						echo $event->getArg('zajeciaKlubListaView');
					}?>
					<?if ($event->getArg('zajecieView') != "") {
						echo $event->getArg('zajecieView');
					}?>
					<?if ($event->getArg('zajecieKlubView') != "") {
						echo $event->getArg('zajecieKlubView');
					}?>
					
					
					<?if ($event->getArg('galeriaView') != "") {
						echo $event->getArg('galeriaView');
					}?>
					
					<?if ($event->getArg('aktualnosciView') != "") {
						echo $event->getArg('aktualnosciView');
					}?>					
					<?if ($event->getArg('aktualnoscView') != "") {
						echo $event->getArg('aktualnoscView');
					}?>
					
					<?if ($event->getArg('relacjeView') != "") {
						echo $event->getArg('relacjeView');
					}?>
					<?if ($event->getArg('relacjeKlubView') != "") {
						echo $event->getArg('relacjeKlubView');
					}?>
					<?if ($event->getArg('relacjaView') != "") {
						echo $event->getArg('relacjaView');
					}?>
					<?if ($event->getArg('relacjaKlubView') != "") {
						echo $event->getArg('relacjaKlubView');
					}?>
					
					<?if ($event->getArg('zapowiedziView') != "") {
						echo $event->getArg('zapowiedziView');
					}?>
					<?if ($event->getArg('zapowiedziKlubView') != "") {
						echo $event->getArg('zapowiedziKlubView');
					}?>
					<?if ($event->getArg('zapowiedzView') != "") {
						echo $event->getArg('zapowiedzView');
					}?>
					<?if ($event->getArg('zapowiedzKlubView') != "") {
						echo $event->getArg('zapowiedzKlubView');
					}?>
					
					<?if ($event->getArg('wydarzeniaView') != "") {
						echo $event->getArg('wydarzeniaView');
					}?>
					<?if ($event->getArg('wydarzenieView') != "") {
						echo $event->getArg('wydarzenieView');
					}?>
					
					<?if ($event->getArg('zespolyView') != "") {
						echo $event->getArg('zespolyView');
					}?>
					<?if ($event->getArg('zespolView') != "") {
						echo $event->getArg('zespolView');
					}?>
					
					
					<?if ($event->getArg('plikDoPobraniaView') != "") {
						echo $event->getArg('plikDoPobraniaView');
					}?>
					
					<?if ($event->getArg('searchActionView') != "") {
						echo $event->getArg('searchActionView');
					}?>
					
					<?if ($event->getArg('newsletterActionView') != "") {
						echo $event->getArg('newsletterActionView');
					}?>
					
					<?if ($event->getArg('contactView') != "") {
						echo $event->getArg('contactView');
					}?>
					<?if ($event->getArg('contactActionView') != "") {
						echo $event->getArg('contactActionView');
					}?>
					
			</div> <!-- end .content-column-left -->
			
		</div> <!-- .ui-helper-clearfix content -->
		
		<div class="ui-helper-clearfix footer">
		</div> <!-- .ui-helper-clearfix footer -->
		
		<?if ($event->getArg('dialogLogin') != "") {
			echo $event->getArg('dialogLogin');
		}?>
		<?if ($event->getArg('dialogContact') != "") {
			echo $event->getArg('dialogContact');
		}?>
		<?if ($event->getArg('dialogContactConfirm') != "") {
			echo $event->getArg('dialogContactConfirm');
		}?>
		
		<form id="siteNavigation" action="">
			<input type="hidden" name="form_SN" id="form_SN" value="<?=$SN;?>">
		</form>
		
	<div id="isLoading"><span class="shadow"></span><span class="white">WCZYTYWANIE</span></div>
	
	
	<img src="<?=$SN?>images/header/page_top.jpg">
		<div id="footer" class="clearfix">
	    		<div style="padding-bottom:20px;">
	    		<div style="float:left;color:#999999;text-align:center; width:880px;"><b>Ośrodek Kultury Kraków - Nowa Huta, zajęcia dla dzieci, młodzieży, dorosłych, seniorów, kursy językowe<br/>kursy komputerowe, zajęcia taneczne, wynajęcia, organizacja urodzin</b> | <a class="anchor_link_admin" id="login" href="#">Logowanie</a></div>
	    		<div style="float:right; width:70px;">
	    			<a href="http://www.bip.krakow.pl/?bip_id=466" target="_blank"><img src="<?=$SN?>images/facebook/bip.png" /></a>&nbsp;
	    			<a href="https://www.facebook.com/osrodekkulturykrakownowahuta" target="_blank"><img src="<?=$SN?>images/facebook/facebookicon.png" /></a>
	    		</div>
	    		<div style="clear:both"></div>
	    		</div>
	    		<div>
	    		<p>&copy; 2009-2011 <a href="http://krakownh.pl" title="">Ośrodek Kultury Kraków - Nowa Huta</a><br/>
	    		os. Zgody 1, 31-949 Kraków <br/>tel.: 12 644 24 32, tel./fax: 12 425 89 39  <br/><a href="mailto:biuro@krakownh.pl">biuro@krakownh.pl</a></p>
	    		</div>
	    </div><!-- end #footer -->
	
	</div><!-- end #wrapper -->
	
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-12697971-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
	
	</body>

</html>