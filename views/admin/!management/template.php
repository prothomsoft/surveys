<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="website created by prothomsoft - www.prothomsoft.com" />
    <link type="text/css" href="../styles_admin/custom-theme/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
	<link href="../styles_admin/global.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="../styles_admin/jquery.lightbox-0.5.css" rel="stylesheet" type="text/css" media="screen" />
	<script type="text/javascript" src="../js_admin/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="../js_admin/jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript" src="../js_admin/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../js_admin/swfobject.js"></script>
	<script type="text/javascript" src="../js_admin/jquery.uploadify.min.js"></script>
	<script type="text/javascript" src="../js_admin/jquery.wymeditor.min.js"></script>
	<script type="text/javascript" src="../js_admin/jquery.lightbox-0.5.min.js"></script>
	
	<?echo $event->getArg('documentReadyScript');?>
		
  </head>
			
	<body onload="initStartAdmin();">
		
	<div id="wrapper">
	
		<div id="isLoading"><span class="shadow"></span><span class="white">LOADING...</span></div>
		
		<div class="ui-helper-clearfix spacer">
		</div> <!-- end .ui-helper-clearfix spacer -->
		
		<div style="text-align:right;">
			<span id="start">
				<a class="anchor_link" href="index.php?event=startAdmin">Start</a>
			</span>			
			<span id="logout">
				<a class="anchor_link" href="../index.php?event=executeLogout">Logout</a>
			</span>			
		</div>
		
		<div class="ui-helper-clearfix spacer">
		</div> <!-- end .ui-helper-clearfix spacer -->
		

		<div class="ui-helper-clearfix content">
		
			<div class="content-column-left">
				<?echo $event->getArg('menu');?>
			</div> <!-- end .content-column-left -->
			
			<div class="content-column-center-right">
				<?
				// home
				if ($event->getArg('homeList') != "") {
					echo $event->getArg('homeList');
				}
										
				// user
				if ($event->getArg('userList') != "") {
					echo $event->getArg('userList');
				}
				if ($event->getArg('userAddEdit') != "") {
					echo $event->getArg('userAddEdit');
				}	
				
				// producer
				if ($event->getArg('producerList') != "") {
					echo $event->getArg('producerList');
				}
				if ($event->getArg('producerAddEdit') != "") {
					echo $event->getArg('producerAddEdit');
				}
				
				// order
				if ($event->getArg('ordersList') != "") {
					echo $event->getArg('ordersList');
				}
				if ($event->getArg('orderAddEdit') != "") {
					echo $event->getArg('orderAddEdit');
				}	
				
				// point
				if ($event->getArg('pointsList') != "") {
					echo $event->getArg('pointsList');
				}
				if ($event->getArg('pointAddEdit') != "") {
					echo $event->getArg('pointAddEdit');
				}				
												
				// productCategory
				if ($event->getArg('productCategoryList') != "") {
					echo $event->getArg('productCategoryList');
				}
				
				// product
				if ($event->getArg('productList') != "") {
					echo $event->getArg('productList');
				}
								
				if ($event->getArg('productWizardStep1') != "") {
					echo $event->getArg('productWizardStep1');
				}
				if ($event->getArg('productWizardStep2') != "") {
					echo $event->getArg('productWizardStep2');
				}
				if ($event->getArg('productWizardStep3') != "") {
					echo $event->getArg('productWizardStep3');
				}
				if ($event->getArg('productWizardStep4') != "") {
					echo $event->getArg('productWizardStep4');
				}
				
				// Delta
				if ($event->getArg('DeltaList') != "") {
					echo $event->getArg('DeltaList');
				}			
				if ($event->getArg('DeltaWizardStep1') != "") {
					echo $event->getArg('DeltaWizardStep1');
				}
				if ($event->getArg('DeltaWizardStep2') != "") {
					echo $event->getArg('DeltaWizardStep2');
				}	
				
				// Sigma
				if ($event->getArg('SigmaList') != "") {
					echo $event->getArg('SigmaList');
				}			
				if ($event->getArg('SigmaWizardStep1') != "") {
					echo $event->getArg('SigmaWizardStep1');
				}
				if ($event->getArg('SigmaWizardStep2') != "") {
					echo $event->getArg('SigmaWizardStep2');
				}	
				
				// Club
				if ($event->getArg('ClubList') != "") {
					echo $event->getArg('ClubList');
				}			
				if ($event->getArg('ClubWizardStep1') != "") {
					echo $event->getArg('ClubWizardStep1');
				}
				if ($event->getArg('ClubWizardStep2') != "") {
					echo $event->getArg('ClubWizardStep2');
				}	
				
				// Alfa
				if ($event->getArg('AlfaList') != "") {
					echo $event->getArg('AlfaList');
				}			
				if ($event->getArg('AlfaWizardStep1') != "") {
					echo $event->getArg('AlfaWizardStep1');
				}
				if ($event->getArg('AlfaWizardStep2') != "") {
					echo $event->getArg('AlfaWizardStep2');
				}
				
				// Beta
				if ($event->getArg('BetaList') != "") {
					echo $event->getArg('BetaList');
				}			
				if ($event->getArg('BetaWizardStep1') != "") {
					echo $event->getArg('BetaWizardStep1');
				}
				if ($event->getArg('BetaWizardStep2') != "") {
					echo $event->getArg('BetaWizardStep2');
				}
				
				// Gama
				if ($event->getArg('GamaList') != "") {
					echo $event->getArg('GamaList');
				}			
				if ($event->getArg('GamaWizardStep1') != "") {
					echo $event->getArg('GamaWizardStep1');
				}
				if ($event->getArg('GamaWizardStep2') != "") {
					echo $event->getArg('GamaWizardStep2');
				}				
				
				// cmsCategory
				if ($event->getArg('cmsCategoryList') != "") {
					echo $event->getArg('cmsCategoryList');
				}
				
				// cmsContent
				if ($event->getArg('CmsContentList') != "") {
					echo $event->getArg('CmsContentList');
				}			
				if ($event->getArg('CmsContentWizardStep1') != "") {
					echo $event->getArg('CmsContentWizardStep1');
				}
				if ($event->getArg('CmsContentWizardStep2') != "") {
					echo $event->getArg('CmsContentWizardStep2');
				}	
				
				// MemberList
				if ($event->getArg('MemberList') != "") {
					echo $event->getArg('MemberList');
				}
				if ($event->getArg('MemberView') != "") {
					echo $event->getArg('MemberView');
				}
				
				// Update File -->
				if ($event->getArg('c2BoxUpdateCategoryListView') != "") {
					echo $event->getArg('c2BoxUpdateCategoryListView');
				}
				if ($event->getArg('c2BoxUpdateFileListView') != "") {
					echo $event->getArg('c2BoxUpdateFileListView');
				}
				if ($event->getArg('c2BoxUploadView') != "") {
					echo $event->getArg('c2BoxUploadView');
				}
				if ($event->getArg('c2BoxRemoveView') != "") {
					echo $event->getArg('c2BoxRemoveView');
				}
				
				// NewsletterList
				if ($event->getArg('NewsletterList') != "") {
					echo $event->getArg('NewsletterList');
				}
				if ($event->getArg('NewsletterView') != "") {
					echo $event->getArg('NewsletterView');
				}
				
				// BookList
				if ($event->getArg('BookList') != "") {
					echo $event->getArg('BookList');
				}
				if ($event->getArg('BookView') != "") {
					echo $event->getArg('BookView');
				}?>								
			</div> <!-- end .content-column-center-right -->
			
		</div> <!-- .ui-helper-clearfix content -->
		
		<div class="ui-helper-clearfix spacer">
		</div> <!-- end .ui-helper-clearfix spacer -->
		
		<div class="ui-helper-clearfix footer">
			<div class="ui-widget-content ui-corner-all footer-content">
				<p style="text-align:center">&copy; 2015 Surveys</a>
			</div>
		</div> <!-- .ui-helper-clearfix footer -->
		
	</div> <!-- end #wrapper -->
			
</form>
		
	</body>
</html>