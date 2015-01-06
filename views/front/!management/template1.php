<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
require_once("model/components/MenuBuilderPL.inc.php");
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
			<div style="text-align:left;">
				<a href="<?=$SN?>musikkgaver.html"><img src="<?=$SN?>images/headers/logo.jpg"></a>
			</div>
		</div>		
	</div>
	
	<div class="ui-helper-clearfix spacer6"></div> <!-- end .ui-helper-clearfix spacer -->
	
	<div class="top_menu">
		<div id="wrapper">
			<div class="ui-helper-clearfix">
					<div class="menu" style="width:960px; float:left;">
						<?$menu = new MenuBuilderPL();
							echo $menu->get_menu_html();?>							
					</div>
					<div style="width:40px; float:right; padding-top:3px;">
						<div class="icons">
							<?/*<a target="_blank" href="http://www.stockfleths.as/?feed=rss2" class="rsslink"></a>*/?>
							<a target="_blank" href="https://www.facebook.com/groups/251486917377" class="facebooklink"></a>
						</div>
					</div>
			</div>
		</div>
	</div>
	
	<div class="header" style="position:relative; z-index: 0;">
		<div id="wrapper">
			<div class="divSlides">
				<div id="slides">
					<div class="slides_container">
					
						<?$arrDeltas = $event->getArg("arrDeltas");?>
						<?if($arrDeltas[0]) {?>
							<?foreach($arrDeltas as $objDelta) {?>
								<div class="slide">
									<div style="width:1000px; height:200px; background-image:url('<?=$SN?>upload/proper/<?=$objDelta->getImgDriveName();?>');">
										<div class="slide_text">
											<p style="padding-top:20px; text-transform: uppercase;"><?=htmlspecialchars_decode($objDelta->getName());?></p>
											<p><?=htmlspecialchars_decode($objDelta->getShortDescription());?></p>
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
			
	<div id="wrapper">
		<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->
				
		<div class="ui-helper-clearfix content">
			
			<div class="content-column-center-t1">
				
					<?if ($event->getArg('collectionsView') != "") {
						echo $event->getArg('collectionsView');
					}?>
					<?if ($event->getArg('pomocView') != "") {
						echo $event->getArg('pomocView');
					}?>
					<?if ($event->getArg('productsView') != "") {
						echo $event->getArg('productsView');
					}?>
					<?if ($event->getArg('productView') != "") {
						echo $event->getArg('productView');
					}?>
					<?if ($event->getArg('activationView') != "") {
						echo $event->getArg('activationView');
					}?>
					<?if ($event->getArg('searchResultsView') != "") {
						echo $event->getArg('searchResultsView');
					}?>
					<?if ($event->getArg('orderSuccessView') != "") {
						echo $event->getArg('orderSuccessView');
					}?>
					<?if ($event->getArg('orderFailView') != "") {
						echo $event->getArg('orderFailView');
					}?>
					<?if ($event->getArg('okView') != "") {
						echo $event->getArg('okView');
					}?>
					<?if ($event->getArg('errorView') != "") {
						echo $event->getArg('errorView');
					}?>
					<?if ($event->getArg('onlineView') != "") {
						echo $event->getArg('onlineView');
					}?>
			</div>
			
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