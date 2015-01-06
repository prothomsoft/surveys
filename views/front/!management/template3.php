<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
require_once("model/components/MenuBuilderPL.inc.php");
require_once("model/components/MenuBuilderEN.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);

	$title = "Musikkgaver";
	$keywords = "Musikkgaver";
	$description = "Musikkgaver";
	$url = "";
	$image = "";
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	    <meta property="og:site_name" content="Musikkgaver"/>
	    <meta property="fb:admins" content="543999369"/>
	    <meta property="og:description" content="<?=$description?>"/>
		<link type="text/css" href="<?=$SN;?>styles/custom-theme/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
		<link href="<?=$SN;?>styles/global.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript" src="<?=$SN;?>js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/hoverIntent.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/superfish.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/plugins.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.musikkgaver.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.prettyPhoto.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.sparkle.min.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/slides.min.jquery.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.thumbs.js"></script>
		<script type="text/javascript" src="<?=$SN;?>js/jquery.cookie.js"></script>
		<script language="javascript">AC_FL_RunContent = 0;</script>
		<script src="<?=$SN;?>js/AC_RunActiveContent.js" type="text/javascript"></script>		
	</head>
	
	<body style="background:#fff url('<?=$SN?>/images/background/background.jpg') top center repeat-y;">
	
	<div class="top_logo">
		<div id="wrapper">
			<div class="menu ui-helper-clearfix" style="padding:72px 0px 0px 0px; float:right; width:104px;">
				<?$menu = new MenuBuilderEN(66);
					echo $menu->get_menu_html();?>
			</div>
			<div class="menu ui-helper-clearfix" style="padding:72px 0px 0px 0px; float:right; width:184px;">
				<ul class="sf-menu">
					<li><a href="<?=$SN;?>produkty/instrumenter.html">Nettbutikk</a></li>
					<li><a href="<?=$SN?>contact_form.html">Kontakt</a>
						<ul class="submenu">
							<li><a href="<?=$SN?>contact_form.html">Kontaktskjema</a></li>
							<li><a href="<?=$SN?>musikkgaver_page/kontaktinformasjon.html">Kontaktinformasjon</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="ui-helper-clearfix" style="float:left;">
				<a href="<?=$SN?>musikkgaver.html"><img src="<?=$SN?>images/headers/logo.jpg"></a>
			</div>
		</div>		
	</div>
	
	<div class="ui-helper-clearfix spacer6"></div> <!-- end .ui-helper-clearfix spacer -->
	
	<div class="header" style="position:relative; z-index: 0;">
		<div id="wrapper">
			<div class="divSlides"  style="height:230px;">
				<div id="slides">
					<div class="slides_container" style="height:230px;">
						<?$arrDeltas = $event->getArg("arrDeltas");?>
						<?if($arrDeltas[0]) {?>
							<?foreach($arrDeltas as $objDelta) {?>
								<div class="slide">
									<div style="width:1000px; height:260px; background-image:url('<?=$SN?>upload/proper/<?=$objDelta->getImgDriveName();?>');">
										<div class="slide_text">
											<?/*
											<p style="padding-top:20px; text-transform: uppercase;"><?=htmlspecialchars_decode($objDelta->getName());?></p>
											<p><?=htmlspecialchars_decode($objDelta->getShortDescription());?></p>
											*/?>
										</div>
									</div>
								</div>
							<?}?>
						<?}?>
					
					</div>					
				</div><!-- slides -->
			</div>
		</div>	
	</div><!-- header -->
	
	<div class="ui-helper-clearfix spacer6"></div> <!-- end .ui-helper-clearfix spacer -->
	
	<div class="top_menu">
		<div id="wrapper" style="border-bottom: 1px solid #DEDEDE;">
			<div class="ui-helper-clearfix">
					<div class="menu" style="width:1000px; float:left;">
						<?$menu = new MenuBuilderPL();
							echo $menu->get_menu_html();?>							
					</div>					
			</div>
		</div>
	</div>
			
	<div id="wrapper">
		<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->
				
		<div class="ui-helper-clearfix content">
		
			<div class="content-column-right">
				
				<div>
					<?if ($event->getArg('cmsCategoriesView') != "") {
						echo $event->getArg('cmsCategoriesView');
					}?>					
				</div>
				
				<?if ($event->getArg('cmsCategoriesView') != "") {?>
					<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->
				<?}?>
				
				<div>
					
					<div>
					
						<div>
							<a href="<?=$SN?>musikkgaver_page/strykeinstrumenter.html"><img src="<?=$SN?>images/strykeinstrumentbanner.jpg"></a>
						</div>					
					
						<div class="ui-helper-clearfix spacer"></div> <!-- end .ui-helper-clearfix spacer -->

						<div>
							<a href="<?=$SN?>musikkgaver_page/musikkgaver.html"><img src="<?=$SN?>images/musikkgaverlinkbanner.jpg"></a>
						</div>					
					
						<div class="ui-helper-clearfix spacer"></div> <!-- end .ui-helper-clearfix spacer -->
					
						<div class="center-header">
							<img src="<?=$SN;?>images/left_bar/musikkgaver_sok.jpg">
						</div>
							
						<div style="padding: 20px 7px 20px 7px; border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-bottom: 1px solid #DEDEDE;">
							<form id="searchForm" action="<?=$SN?>wyniki_wyszukiwania.html" method="post" style="display:inline">
								<div style="width:140px; float:left;">
									<input id="searchKey" name="searchKey" value="<?=$event->getArg("searchKey")?>" style="width:170px;height:21px;"/>
								</div>
								<div style="width:62px; float:right;">
								<span class="search"><a href="#">&nbsp;Søk&nbsp;</a></span>
								</div> 
							</form>
							<div class="ui-helper-clearfix"></div> <!-- end .ui-helper-clearfix spacer -->
						</div>
							
						<div class="ui-helper-clearfix spacer"></div> <!-- end .ui-helper-clearfix spacer -->
					
						<div class="center-header">
							<img src="<?=$SN;?>images/left_bar/musikkgaver_nyhetsbrev.jpg">
						</div>		
							
						<div style="padding: 20px 7px 20px 7px; border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-bottom: 1px solid #DEDEDE;">
							<form name="formNewsletter" id="formNewsletter" method="post" action="<?=$SN?>executeNewsletterAction.html">
								<div style="width:140px; float:left;">
								<input name="email" id="email" value="" type="text" style="width:170px;height:21px;">
								</div>
								<div style="width:62px; float:right;">
								<span class="save"><a href="javascript:save_box_submit();">Send</a></span>
								</div> 
							</form>
							<div class="ui-helper-clearfix"></div> <!-- end .ui-helper-clearfix spacer -->
						</div>
						
						<div class="ui-helper-clearfix spacer"></div> <!-- end .ui-helper-clearfix spacer -->
						
						
						<div class="center-header">
							<img src="<?=$SN;?>images/left_bar/tilgjengelig.jpg">
						</div>		
						
					</div>
					
					<?if ($event->getArg('bestView') != "") {
							echo $event->getArg('bestView');
					}?>
					
					
					<div class="ui-helper-clearfix spacer"></div> <!-- end .ui-helper-clearfix spacer -->
				</div>
				
				
			</div> <!-- end .content-column-right -->
			
			<div class="content-column-center">
				
					<?if ($event->getArg('newsView') != "") {
						echo $event->getArg('newsView');
					}?>
					<?if ($event->getArg('newsEntryView') != "") {
						echo $event->getArg('newsEntryView');
					}?>
					
					<?if ($event->getArg('searchResultsView') != "") {
						echo $event->getArg('searchResultsView');
					}?>
					
					<?if ($event->getArg('articlesView') != "") {
						echo $event->getArg('articlesView');
					}?>
					<?if ($event->getArg('articleView') != "") {
						echo $event->getArg('articleView');
					}?>
					
					<?if ($event->getArg('cmsView') != "") {
						echo $event->getArg('cmsView');
					}?>
					
					
					<?if ($event->getArg('okView') != "") {
						echo $event->getArg('okView');
					}?>
					<?if ($event->getArg('errorView') != "") {
						echo $event->getArg('errorView');
					}?>
					<?if ($event->getArg('onlineMemberView') != "") {
						echo $event->getArg('onlineMemberView');
					}?>
					<?if ($event->getArg('onlineStoreView') != "") {
						echo $event->getArg('onlineStoreView');
					}?>
					
					
					<?if ($event->getArg('photoView') != "") {
						echo $event->getArg('photoView');
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
					<?if ($event->getArg('bookFormView') != "") {
						echo $event->getArg('bookFormView');
					}?>
					<?if ($event->getArg('bookConfirmationView') != "") {
						echo $event->getArg('bookConfirmationView');
					}?>
					
					<?if ($event->getArg('memberFormView') != "") {
						echo $event->getArg('memberFormView');
					}?>
					<?if ($event->getArg('memberConfirmationView') != "") {
						echo $event->getArg('memberConfirmationView');
					}?>
					
					<?if ($event->getArg('adresyView') != "") {
						echo $event->getArg('adresyView');
					}?>
					<?if ($event->getArg('adresView') != "") {
						echo $event->getArg('adresView');
					}?>
					<?if ($event->getArg('zdjeciaView') != "") {
						echo $event->getArg('zdjeciaView');
					}?>
					<?if ($event->getArg('zdjecieView') != "") {
						echo $event->getArg('zdjecieView');
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
					<?if ($event->getArg('wydarzeniaView') != "") {
						echo $event->getArg('wydarzeniaView');
					}?>
					<?if ($event->getArg('wydarzenieView') != "") {
						echo $event->getArg('wydarzenieView');
					}?>
					<?if ($event->getArg('filmyView') != "") {
						echo $event->getArg('filmyView');
					}?>
					<?if ($event->getArg('filmView') != "") {
						echo $event->getArg('filmView');
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
					<?if ($event->getArg('trasyRoweroweView') != "") {
						echo $event->getArg('trasyRoweroweView');
					}?>
					<?if ($event->getArg('trasaRowerowaView') != "") {
						echo $event->getArg('trasaRowerowaView');
					}?>
					
					
					<?if ($event->getArg('newsletterFormView') != "") {
						echo $event->getArg('newsletterFormView');
					}?>
					<?if ($event->getArg('newsletterConfirmationView') != "") {
						echo $event->getArg('newsletterConfirmationView');
					}?>
					
					<?if ($event->getArg('contactFormView') != "") {
						echo $event->getArg('contactFormView');
					}?>
					<?if ($event->getArg('contactConfirmationView') != "") {
						echo $event->getArg('contactConfirmationView');
					}?>
					
					<?if ($event->getArg('contactInformationView') != "") {
						echo $event->getArg('contactInformationView');
					}?>
					<?if ($event->getArg('konkurranseView') != "") {
						echo $event->getArg('konkurranseView');
					}?>					
					
			</div> <!-- end .content-column-left -->
			
		</div> <!-- .ui-helper-clearfix content -->
		
		<div class="ui-helper-clearfix footer">
		</div> <!-- .ui-helper-clearfix footer -->
		
		<?if ($event->getArg('dialogLogin') != "") {
			echo $event->getArg('dialogLogin');
		}?>
		<?if ($event->getArg('dialogForgotPassword') != "") {
			echo $event->getArg('dialogForgotPassword');
		}?>
		<?if ($event->getArg('dialogForgotPasswordConfirm') != "") {
			echo $event->getArg('dialogForgotPasswordConfirm');
		}?>
		<?if ($event->getArg('dialogRegistration') != "") {
			echo $event->getArg('dialogRegistration');
		}?>
		<?if ($event->getArg('dialogRegistrationConfirm') != "") {
			echo $event->getArg('dialogRegistrationConfirm');
		}?>
		<?if ($event->getArg('dialogContact') != "") {
			echo $event->getArg('dialogContact');
		}?>
		<?if ($event->getArg('dialogContactConfirm') != "") {
			echo $event->getArg('dialogContactConfirm');
		}?>
		<?if ($event->getArg('dialogSamples') != "") {
			echo $event->getArg('dialogSamples');
		}?>
		<?if ($event->getArg('dialogSamplesConfirm') != "") {
			echo $event->getArg('dialogSamplesConfirm');
		}?>
		<?if ($event->getArg('dialogAdvert') != "") {
			echo $event->getArg('dialogAdvert');
		}?>
		
		
		<form id="siteNavigation" action=""></form>
		
		<form id="searchForm" name="searchForm" action="<?=$SN;?>wyniki_wyszukiwania.html" method="post">
			<?if ($objAppSession->getSession("User") != "") {?>
				<?$objUser = $objAppSession->getSession("User");?>
				<input type="hidden" name="form_NameFirst" id="form_NameFirst" value="<?=$objUser->getNameFirst();?>" />
				<input type="hidden" name="form_NameLast" id="form_NameLast" value="<?=$objUser->getNameLast();?>" />
				<input type="hidden" name="form_Email" id="form_Email" value="<?=$objUser->getEmail();?>" />
			<?}?>
			<input type="hidden" name="form_SN" id="form_SN" value="<?=$SN;?>"/>
			<input type="hidden" name="searchType" id="searchType" value=""/>
			<input type="hidden" name="searchKeyword" id="searchKeyword" value=""/>
		</form>
		
	<div id="isLoading"><span class="shadow"></span><span class="white">LOADING...</span></div>
	</div><!-- end #wrapper -->
	
	<div class="footer-line"></div>
	<div class="bottom_footer">
		<div id="wrapper">
			<div id="footer" class="clearfix">
		    		<p>&copy; 2013 <a class="anchor_footer" href="http://musikkgaver.no/" title="">Musikkgaver</a>  | <a href="#" class="contact anchor_footer">Kontakt</a>  | <span class="login"><a class="anchor_footer" href="#">Login</a></span></p>
		    </div><!-- end #footer -->
	    
	    </div><!-- end #wrapper -->
	 </div>
		
	</body>

</html>