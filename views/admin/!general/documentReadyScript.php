<script>
$(document).ready(function() {
	
	<?$arrHighligths = array(showCreateCmsContentForm, showEditCmsContentForm, showEditUserApprovedForm,
											showClubStep1, showClubStep2, executeClubWizardClose,
											showAlfaStep1, showAlfaStep2, executeAlfaWizardClose,
											showBetaStep1, showBetaStep2, executeBetaWizardClose,
											showGamaStep1, showGamaStep2, executeGamaWizardClose,
											showDeltaStep1, showDeltaStep2, executeDeltaWizardClose,
											showSigmaStep1, showSigmaStep2, executeSigmaWizardClose,
											showCmsContentStep1, showCmsContentStep2, executeCmsContentWizardClose, showProductStep2);?>
	<?$currentEvent = $event->getArg('event');?>
	
	<?if (in_array($currentEvent, $arrHighligths)) {?>
		jQuery('.wymeditor').wymeditor({
			lang: 'en',
       		containersItems: [
		        {'name': 'P', 'title': 'Paragraph', 'css': 'wym_containers_p'},
		        {'name': 'H1', 'title': 'Heading_1', 'css': 'wym_containers_h1'},
		        {'name': 'H2', 'title': 'Heading_2', 'css': 'wym_containers_h2'},
		        {'name': 'H3', 'title': 'Heading_3', 'css': 'wym_containers_h3'}
		    ],
       		toolsItems: [
		        {'name': 'Bold', 'title': 'Strong', 'css': 'wym_tools_strong'}, 
		        {'name': 'Italic', 'title': 'Emphasis', 'css': 'wym_tools_emphasis'},
		        {'name': 'Superscript', 'title': 'Superscript',
		            'css': 'wym_tools_superscript'},
		        {'name': 'Subscript', 'title': 'Subscript',
		            'css': 'wym_tools_subscript'},
		        {'name': 'InsertUnorderedList', 'title': 'Unordered_List',
		            'css': 'wym_tools_unordered_list'},
		        {'name': 'Undo', 'title': 'Undo', 'css': 'wym_tools_undo'},
		        {'name': 'Redo', 'title': 'Redo', 'css': 'wym_tools_redo'},
		        {'name': 'CreateLink', 'title': 'Link', 'css': 'wym_tools_link'},
		        {'name': 'Unlink', 'title': 'Unlink', 'css': 'wym_tools_unlink'},
		        //{'name': 'InsertImage', 'title': 'Image', 'css': 'wym_tools_image'},
		        //{'name': 'InsertTable', 'title': 'Table', 'css': 'wym_tools_table'},
		        {'name': 'Paste', 'title': 'Paste_From_Word',
		            'css': 'wym_tools_paste'},
		        {'name': 'ToggleHtml', 'title': 'HTML', 'css': 'wym_tools_html'},
		        {'name': 'Preview', 'title': 'Preview', 'css': 'wym_tools_preview'}
		    ]
    	});
	<?}?>
	
	<?if ($event->getArg('productWizardStep3') != "") {?>
		<?$productId = $event->getArg('productId');?>
		// Refresh Edit Mode -------->
		refreshProductPicture();
		
		// File Upload -------->
		$("#uploadify").uploadify({
			'uploader'       : 'uploadify/uploadify.swf',
			'script'         : 'uploadify/uploadifyProductPicture.php',
			'scriptData'	 : {'productId': <?=$productId?>},
			'cancelImg'      : '../images/cancel.png',
			'fileExt'		 : '*.jpg;',
			'fileDesc'		 : 'Only .jpg files are allowed',
			'buttonImg'		 : '../images/upload_btn_en.jpg',
			'width'			 : '155',
			'height'		 : '31',
			'sizeLimit'		 : '2000000',
			'buttonText'	 : '',
			'folder'         : '../upload',
			'queueID'        : 'fileQueue',
			'auto'           : true,
			'multi'          : false,
			'wmode'			 : 'transparent',
			'onError': function (event, queueID ,fileObj, errorObj) {
                    alert("Error: "+errorObj.type+"      Info: "+errorObj.info +"");
                    },
			
					
			'onComplete'	 : function(event, queueID, fileObj, response, data1) {
				$.ajax({
					url: "index.php?event=findProductPictureByProductId",
					dataType: "json",
					data: {'productId': <?=$productId?>},
					success: function(data) {
						if(!data) {
							return false;
						}
						$html = "";
						$("#filesUploaded").html($html);
						$.map(data.ProductPicture, function(item) {
							$html = $html + '<div style="float:left; padding:20px; text-align:center;"><img src="../upload/thumb/' + item.ImgDriveName +'"/><br/><br/>';
							$html = $html + '<a href="javascript:executeProductPictureSetMain(\'<?=$productId?>\', \'' + item.ImgDriveName + '\')">Main</a>&nbsp;|&nbsp;';
							$html = $html + '<a href="javascript:executeProductPictureRemove(\'<?=$productId?>\', \'' + item.ImgDriveName + '\')">Remove</a></div>';
						})
						$("#filesUploaded").html($html);
					}
				});
			}
		});
	<?}?>
			
	<?if ($event->getArg('productWizardStep4') != "") {?>
		// Refresh Preview -------->
		//refreshProductPicture();
	<?}?>
	
	<?if ($event->getArg('ClubWizardStep2') != "") {?>
		<?$ClubId = $event->getArg('ClubId');?>
		// Refresh Edit Mode -------->
		refreshClubPicture();
		
		// File Upload -------->
		$("#uploadify").uploadify({
			'uploader'       : 'uploadify/uploadify.swf',
			'script'         : 'uploadify/uploadifyClubPicture.php',
			'scriptData'	 : {'ClubId': <?=$ClubId?>},
			'cancelImg'      : '../images/cancel.png',
			'fileExt'		 : '*.jpg;',
			'fileDesc'		 : 'Only .jpg files are allowed',
			'buttonImg'		 : '../images/upload_btn_en.jpg',
			'width'			 : '155',
			'height'		 : '31',
			'sizeLimit'		 : '2000000',
			'buttonText'	 : '',
			'folder'         : '../upload',
			'queueID'        : 'fileQueue',
			'auto'           : true,
			'multi'          : false,
			'wmode'			 : 'transparent',
			'onError': function (event, queueID ,fileObj, errorObj) {
                    alert("Error: "+errorObj.type+"      Info: "+errorObj.info +"");
                    },
			'onComplete'	 : function(event, queueID, fileObj, response, data1) {
				$.ajax({
					url: "index.php?event=findClubPictureByClubId",
					dataType: "json",
					data: {'ClubId': <?=$ClubId?>},
					success: function(data) {
						if(!data) {
							return false;
						}
						$html = "";
						$("#filesUploaded").html($html);
						$.map(data.ClubPicture, function(item) {
							$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
							$html = $html + '<input onBlur="javascript:executeClubSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/><br/>';
							if(item.MainPicture == 0) {
								$html = $html + '<a href="javascript:executeClubPictureSetMain(\'<?=$ClubId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
							}
							$html = $html + '<a href="javascript:executeClubPictureRemove(\'<?=$ClubId?>\', \'' + item.ImgDriveName + '\')">Remove</a></div>';							
						})
						$("#filesUploaded").html($html);
					}
				});
			}
		});
	<?}?>
	
	// ---------------------------->
	// ClubTable --------->
	// ---------------------------->
	$('#idClubTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getClubTableData",
		"aaSorting": [[ 5, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 10, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* ClubId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* ImgDriveName */ { "sClass": "center", "bSortable": false, "bVisible": false },					
			/* Name */ { "sClass": "center", "bVisible": true },
			/* SeoName */ { "sClass": "center", "bVisible": false },
			/* UpdateDate */ { "sClass": "center", "bVisible": false },
			/* ClubOrder */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( 	{ "name": "searchKeyword", "value": "<?=$event->getArg('searchKeyword')?>" },
							{ "name": "searchInitials", "value": "<?=$event->getArg('searchInitials')?>" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	});
	
	
	
	<?if ($event->getArg('AlfaWizardStep2') != "") {?>
		<?$AlfaId = $event->getArg('AlfaId');?>
		// Refresh Edit Mode -------->
		refreshAlfaPicture();
		
		// File Upload -------->
		$("#uploadify").uploadify({
			'uploader'       : 'uploadify/uploadify.swf',
			'script'         : 'uploadify/uploadifyAlfaPicture.php',
			'scriptData'	 : {'AlfaId': <?=$AlfaId?>},
			'cancelImg'      : '../images/cancel.png',
			'fileExt'		 : '*.jpg;',
			'fileDesc'		 : 'Only .jpg files are allowed',
			'buttonImg'		 : '../images/upload_btn_en.jpg',
			'width'			 : '155',
			'height'		 : '31',
			'sizeLimit'		 : '2000000',
			'buttonText'	 : '',
			'folder'         : '../upload',
			'queueID'        : 'fileQueue',
			'auto'           : true,
			'multi'          : false,
			'wmode'			 : 'transparent',
			'onError': function (event, queueID ,fileObj, errorObj) {
                    alert("Error: "+errorObj.type+"      Info: "+errorObj.info +"");
                    },
			'onComplete'	 : function(event, queueID, fileObj, response, data1) {
				$.ajax({
					url: "index.php?event=findAlfaPictureByAlfaId",
					dataType: "json",
					data: {'AlfaId': <?=$AlfaId?>},
					success: function(data) {
						if(!data) {
							return false;
						}
						$html = "";
						$("#filesUploaded").html($html);
						$.map(data.AlfaPicture, function(item) {
							$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
							$html = $html + '<input onBlur="javascript:executeAlfaSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/><br/>';
							if(item.MainPicture == 0) {
								$html = $html + '<a href="javascript:executeAlfaPictureSetMain(\'<?=$AlfaId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
							}
							if(item.HeaderPicture == 0) {
								$html = $html + '<a href="javascript:executeAlfaPictureSetHeader(\'<?=$AlfaId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
							}
							$html = $html + '<a href="javascript:executeAlfaPictureRemove(\'<?=$AlfaId?>\', \'' + item.ImgDriveName + '\')">Remove</a></div>';							
						})
						$("#filesUploaded").html($html);
					}
				});
			}
		});
	<?}?>
	
	// ---------------------------->
	// AlfaTable --------->
	// ---------------------------->
	$('#idAlfaTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getAlfaTableData",
		"aaSorting": [[ 5, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 10, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* AlfaId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* ImgDriveName */ { "sClass": "center", "bSortable": false },					
			/* Name */ { "sClass": "center", "bVisible": true },
			/* SeoName */ { "sClass": "center", "bVisible": false },
			/* Category */ { "sClass": "center", "bVisible": false },
			/* AlfaOrder */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( 	{ "name": "searchKeyword", "value": "<?=$event->getArg('searchKeyword')?>" },
							{ "name": "searchInitials", "value": "<?=$event->getArg('searchInitials')?>" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	});
	
	
	<?if ($event->getArg('BetaWizardStep2') != "") {?>
		<?$BetaId = $event->getArg('BetaId');?>
		// Refresh Edit Mode -------->
		refreshBetaPicture();
		
		// File Upload -------->
		$("#uploadify").uploadify({
			'uploader'       : 'uploadify/uploadify.swf',
			'script'         : 'uploadify/uploadifyBetaPicture.php',
			'scriptData'	 : {'BetaId': <?=$BetaId?>},
			'cancelImg'      : '../images/cancel.png',
			'fileExt'		 : '*.jpg;',
			'fileDesc'		 : 'Only .jpg files are allowed',
			'buttonImg'		 : '../images/upload_btn_en.jpg',
			'width'			 : '155',
			'height'		 : '31',
			'sizeLimit'		 : '2000000',
			'buttonText'	 : '',
			'folder'         : '../upload',
			'queueID'        : 'fileQueue',
			'auto'           : true,
			'multi'          : false,
			'wmode'			 : 'transparent',
			'onError': function (event, queueID ,fileObj, errorObj) {
                    alert("Error: "+errorObj.type+"      Info: "+errorObj.info +"");
                    },
			'onComplete'	 : function(event, queueID, fileObj, response, data1) {
				$.ajax({
					url: "index.php?event=findBetaPictureByBetaId",
					dataType: "json",
					data: {'BetaId': <?=$BetaId?>},
					success: function(data) {
						if(!data) {
							return false;
						}
						$html = "";
						$("#filesUploaded").html($html);
						$.map(data.BetaPicture, function(item) {
							$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
							$html = $html + '<input onBlur="javascript:executeBetaSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/><br/>';
							if(item.MainPicture == 0) {
								$html = $html + '<a href="javascript:executeBetaPictureSetMain(\'<?=$BetaId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
							}
							$html = $html + '<a href="javascript:executeBetaPictureRemove(\'<?=$BetaId?>\', \'' + item.ImgDriveName + '\')">Remove</a></div>';							
						})
						$("#filesUploaded").html($html);
					}
				});
			}
		});
	<?}?>
	
	// ---------------------------->
	// BetaTable --------->
	// ---------------------------->
	$('#idBetaTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getBetaTableData",
		"aaSorting": [[ 5, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 25, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* BetaId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* ImgDriveName */ { "sClass": "center", "bSortable": false, "bVisible": false },					
			/* Name */ { "sClass": "center", "bVisible": true },
			/* SeoName */ { "sClass": "center", "bVisible": false },
			/* Category */ { "sClass": "center", "bVisible": false },
			/* BetaOrder */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( 	{ "name": "searchKeyword", "value": "<?=$event->getArg('searchKeyword')?>" },
							{ "name": "searchInitials", "value": "<?=$event->getArg('searchInitials')?>" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	});
	
	
	<?if ($event->getArg('GamaWizardStep2') != "") {?>
		<?$GamaId = $event->getArg('GamaId');?>
		// Refresh Edit Mode -------->
		refreshGamaPicture();
		
		// File Upload -------->
		$("#uploadify").uploadify({
			'uploader'       : 'uploadify/uploadify.swf',
			'script'         : 'uploadify/uploadifyGamaPicture.php',
			'scriptData'	 : {'GamaId': <?=$GamaId?>},
			'cancelImg'      : '../images/cancel.png',
			'fileExt'		 : '*.jpg;',
			'fileDesc'		 : 'Only .jpg files are allowed',
			'buttonImg'		 : '../images/upload_btn_en.jpg',
			'width'			 : '155',
			'height'		 : '31',
			'sizeLimit'		 : '2000000',
			'buttonText'	 : '',
			'folder'         : '../upload',
			'queueID'        : 'fileQueue',
			'auto'           : true,
			'multi'          : false,
			'wmode'			 : 'transparent',
			'onError': function (event, queueID ,fileObj, errorObj) {
                    alert("Error: "+errorObj.type+"      Info: "+errorObj.info +"");
                    },
			'onComplete'	 : function(event, queueID, fileObj, response, data1) {
				$.ajax({
					url: "index.php?event=findGamaPictureByGamaId",
					dataType: "json",
					data: {'GamaId': <?=$GamaId?>},
					success: function(data) {
						if(!data) {
							return false;
						}
						$html = "";
						$("#filesUploaded").html($html);
						$.map(data.GamaPicture, function(item) {
							$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
							$html = $html + '<input onBlur="javascript:executeGamaSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/><br/>';
							if(item.MainPicture == 0) {
								$html = $html + '<a href="javascript:executeGamaPictureSetMain(\'<?=$GamaId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
							}
							$html = $html + '<a href="javascript:executeGamaPictureRemove(\'<?=$GamaId?>\', \'' + item.ImgDriveName + '\')">Remove</a></div>';							
						})
						$("#filesUploaded").html($html);
					}
				});
			}
		});
	<?}?>
	
	// ---------------------------->
	// GamaTable --------->
	// ---------------------------->
	$('#idGamaTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getGamaTableData",
		"aaSorting": [[ 6, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 10, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* GamaId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* ImgDriveName */ { "sClass": "center", "bSortable": false, "bVisible": false },					
			/* Name */ { "sClass": "center", "bVisible": true },
			/* SeoName */ { "sClass": "center", "bVisible": false },
			/* Kategoria */ { "sClass": "center", "bVisible": false },
			/* Gmina */ { "sClass": "center", "bVisible": false },
			/* GamaOrder */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( 	{ "name": "searchKeyword", "value": "<?=$event->getArg('searchKeyword')?>" },
							{ "name": "searchInitials", "value": "<?=$event->getArg('searchInitials')?>" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	});
	
	<?if ($event->getArg('DeltaWizardStep2') != "") {?>
		<?$DeltaId = $event->getArg('DeltaId');?>
		// Refresh Edit Mode -------->
		refreshDeltaPicture();
		
		// File Upload -------->
		$("#uploadify").uploadify({
			'uploader'       : 'uploadify/uploadify.swf',
			'script'         : 'uploadify/uploadifyDeltaPicture.php',
			'scriptData'	 : {'DeltaId': <?=$DeltaId?>},
			'cancelImg'      : '../images/cancel.png',
			'fileExt'		 : '*.jpg;',
			'fileDesc'		 : 'Only .jpg files are allowed',
			'buttonImg'		 : '../images/upload_btn_en.jpg',
			'width'			 : '155',
			'height'		 : '31',
			'sizeLimit'		 : '2000000',
			'buttonText'	 : '',
			'folder'         : '../upload',
			'queueID'        : 'fileQueue',
			'auto'           : true,
			'multi'          : false,
			'wmode'			 : 'transparent',
			'onError': function (event, queueID ,fileObj, errorObj) {
                    alert("Error: "+errorObj.type+"      Info: "+errorObj.info +"");
                    },
			'onComplete'	 : function(event, queueID, fileObj, response, data1) {
				$.ajax({
					url: "index.php?event=findDeltaPictureByDeltaId",
					dataType: "json",
					data: {'DeltaId': <?=$DeltaId?>},
					success: function(data) {
						if(!data) {
							return false;
						}
						$html = "";
						$("#filesUploaded").html($html);
						$.map(data.DeltaPicture, function(item) {
							$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
							$html = $html + '<input onBlur="javascript:executeDeltaSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/><br/>';
							if(item.MainPicture == 0) {
								$html = $html + '<a href="javascript:executeDeltaPictureSetMain(\'<?=$DeltaId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
							}
							$html = $html + '<a href="javascript:executeDeltaPictureRemove(\'<?=$DeltaId?>\', \'' + item.ImgDriveName + '\')">Remove</a></div>';							
						})
						$("#filesUploaded").html($html);
					}
				});
			}
		});
	<?}?>
	
	// ---------------------------->
	// DeltaTable --------->
	// ---------------------------->
	$('#idDeltaTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getDeltaTableData",
		"aaSorting": [[ 5, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 10, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* DeltaId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* ImgDriveName */ { "sClass": "center", "bSortable": false, "bVisible": false },					
			/* Name */ { "sClass": "center", "bVisible": true },
			/* SeoName */ { "sClass": "center", "bVisible": false },
			/* UpdateDate */ { "sClass": "center", "bVisible": false },
			/* DeltaOrder */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( 	{ "name": "searchKeyword", "value": "<?=$event->getArg('searchKeyword')?>" },
							{ "name": "searchInitials", "value": "<?=$event->getArg('searchInitials')?>" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	});
	
	<?if ($event->getArg('SigmaWizardStep2') != "") {?>
		<?$SigmaId = $event->getArg('SigmaId');?>
		// Refresh Edit Mode -------->
		refreshSigmaPicture();
		
		// File Upload -------->
		$("#uploadify").uploadify({
			'uploader'       : 'uploadify/uploadify.swf',
			'script'         : 'uploadify/uploadifySigmaPicture.php',
			'scriptData'	 : {'SigmaId': <?=$SigmaId?>},
			'cancelImg'      : '../images/cancel.png',
			'fileExt'		 : '*.jpg;',
			'fileDesc'		 : 'Only .jpg files are allowed',
			'buttonImg'		 : '../images/upload_btn_en.jpg',
			'width'			 : '155',
			'height'		 : '31',
			'sizeLimit'		 : '2000000',
			'buttonText'	 : '',
			'folder'         : '../upload',
			'queueID'        : 'fileQueue',
			'auto'           : true,
			'multi'          : false,
			'wmode'			 : 'transparent',
			'onError': function (event, queueID ,fileObj, errorObj) {
                    alert("Error: "+errorObj.type+"      Info: "+errorObj.info +"");
                    },
			'onComplete'	 : function(event, queueID, fileObj, response, data1) {
				$.ajax({
					url: "index.php?event=findSigmaPictureBySigmaId",
					dataType: "json",
					data: {'SigmaId': <?=$SigmaId?>},
					success: function(data) {
						if(!data) {
							return false;
						}
						$html = "";
						$("#filesUploaded").html($html);
						$.map(data.SigmaPicture, function(item) {
							$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
							$html = $html + '<input onBlur="javascript:executeSigmaSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/><br/>';
							if(item.MainPicture == 0) {
								$html = $html + '<a href="javascript:executeSigmaPictureSetMain(\'<?=$SigmaId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
							}
							$html = $html + '<a href="javascript:executeSigmaPictureRemove(\'<?=$SigmaId?>\', \'' + item.ImgDriveName + '\')">Remove</a></div>';							
						})
						$("#filesUploaded").html($html);
					}
				});
			}
		});
	<?}?>
	
	// ---------------------------->
	// SigmaTable --------->
	// ---------------------------->
	$('#idSigmaTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getSigmaTableData",
		"aaSorting": [[ 5, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 10, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* SigmaId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* ImgDriveName */ { "sClass": "center", "bSortable": false },					
			/* Name */ { "sClass": "center", "bVisible": true },
			/* SeoName */ { "sClass": "center", "bVisible": false },
			/* UpdateDate */ { "sClass": "center", "bVisible": false },
			/* SigmaOrder */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( 	{ "name": "searchKeyword", "value": "<?=$event->getArg('searchKeyword')?>" },
							{ "name": "searchInitials", "value": "<?=$event->getArg('searchInitials')?>" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	});
	
	// ---------------------------->
	// MemberTable --------->
	// ---------------------------->
	$('#idMemberTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getMemberTableData",
		"aaSorting": [[ 1, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 50, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* MemberId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* Email */ { "sClass": "center", "bVisible": true},
			/* CreateDate */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( 	{ "name": "searchKeyword", "value": "<?=$event->getArg('searchKeyword')?>" },
							{ "name": "searchInitials", "value": "<?=$event->getArg('searchInitials')?>" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	});

	// ---------------------------->
	// NewsletterTable --------->
	// ---------------------------->
	$('#idNewsletterTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getNewsletterTableData",
		"aaSorting": [[ 1, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 50, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* NewsletterId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* Email */ { "sClass": "center", "bVisible": true},
			/* CreateDate */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( 	{ "name": "searchKeyword", "value": "<?=$event->getArg('searchKeyword')?>" },
							{ "name": "searchInitials", "value": "<?=$event->getArg('searchInitials')?>" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	});
	
	// ---------------------------->
	// BookTable --------->
	// ---------------------------->
	$('#idBookTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getBookTableData",
		"aaSorting": [[ 4, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 50, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* BookId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* FirstName */ { "sClass": "center", "bSortable": true, "bVisible": true },					
			/* LastName */ { "sClass": "center", "bVisible": true },
			/* Email */ { "sClass": "center", "bVisible": true},
			/* CreateDate */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( 	{ "name": "searchKeyword", "value": "<?=$event->getArg('searchKeyword')?>" },
							{ "name": "searchInitials", "value": "<?=$event->getArg('searchInitials')?>" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	});
	
	
	<?if ($event->getArg('CmsContentWizardStep2') != "") {?>
		<?$CmsContentId = $event->getArg('CmsContentId');?>
		// Refresh Edit Mode -------->
		refreshCmsContentPicture();
		
		// File Upload -------->
		$("#uploadify").uploadify({
			'uploader'       : 'uploadify/uploadify.swf',
			'script'         : 'uploadify/uploadifyCmsContentPicture.php',
			'scriptData'	 : {'CmsContentId': <?=$CmsContentId?>},
			'cancelImg'      : '../images/cancel.png',
			'fileExt'		 : '*.jpg;',
			'fileDesc'		 : 'Only .jpg files are allowed',
			'buttonImg'		 : '../images/upload_btn_en.jpg',
			'width'			 : '155',
			'height'		 : '31',
			'sizeLimit'		 : '2000000',
			'buttonText'	 : '',
			'folder'         : '../upload',
			'queueID'        : 'fileQueue',
			'auto'           : true,
			'multi'          : false,
			'wmode'			 : 'transparent',
			'onError': function (event, queueID ,fileObj, errorObj) {
                    alert("Error: "+errorObj.type+"      Info: "+errorObj.info +"");
                    },
            'onComplete'	 : function(event, queueID, fileObj, response, data1) {
				$.ajax({
					url: "index.php?event=findCmsContentPictureByCmsContentId",
					dataType: "json",
					data: {'CmsContentId': <?=$CmsContentId?>},
					success: function(data) {
						if(!data) {
							return false;
						}
						$html = "";
						$("#filesUploaded").html($html);
						$.map(data.CmsContentPicture, function(item) {
							$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
							$html = $html + '<input onBlur="javascript:executeCmsContentSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/>';
							$html = $html + '<input onBlur="javascript:executeCmsContentSavePictureOrder(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'1" value="' + item.ImgOrder +'" style="width:190px;"><br/><br/>';
							$html = $html + '<a href="javascript:executeCmsContentPictureRemove(\'<?=$CmsContentId?>\', \'' + item.ImgDriveName + '\')">Remove</a></div>';							
						})
						$("#filesUploaded").html($html);
					}
				});
			}
		});
	<?}?>
	
	// ---------------------------->
	// CmsContentTable --------->
	// ---------------------------->
	$('#idCmsContentTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getCmsContentTableData",
		"aaSorting": [[ 1, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 50, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* CmsContentId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* Name */ { "sClass": "center", "bVisible": true },
			/* UpdateDate */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( 	{ "name": "searchKeyword", "value": "<?=$event->getArg('searchKeyword')?>" },
							{ "name": "searchInitials", "value": "<?=$event->getArg('searchInitials')?>" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	});
	
	// --------------->
	// Button -------->
	// --------------->
	
	$("input:submit").button();
	
	$("a", "#logout").button({
        icons: {
            primary: 'ui-icon-power'
        },
        text: true
	});	
	
	$("a", "#start").button({
        icons: {
            primary: 'ui-icon-home'
        },
        text: true
	});	
	
	$("a", "#Add").button({
        icons: {
            primary: 'ui-icon-check'
        },
        text: true
	});
	
	$("a", "#List").button({
        text: true
	});
		
	$("a", "#userApprovedCancel").button({
        icons: {
            primary: 'ui-icon-check'
        },
        text: true
	});
	
	$("a", ".wizardButtonOpen").button({
        icons: {
            primary: 'ui-icon-folder-open'
        },
        text: true
	});	
	
	$("a", ".wizardButtonCollapsed").button({
        icons: {
            primary: 'ui-icon-folder-collapsed'
        },
        text: true
	});	
	
	$("a", ".wizardButton").button({
        text: true
	});	
	
	// ---------------------------->
	// ProductTable --------->
	// ---------------------------->
	$('#idProductTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getProductTableData",
		"aaSorting": [[ 6, "asc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 50, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* ProductId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* ImgDriveName */ { "sClass": "center", "bSortable": false },					
			/* Name */ { "sClass": "center" },
			/* ProductCategoryName */ { "sClass": "center" },
			/* Price */ { "sClass": "center", "bVisible": false },
			/* UpdateDate */ { "sClass": "center" },
			/* ProductOrder */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( { "name": "productCategorySeoName", "value": "'all'" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	} );
	
	// ---------------------------->
	// OrderTable --------->
	// ---------------------------->
	$('#idOrdersTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getOrdersTableData",
		"aaSorting": [[ 1, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 50, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [
			/* OrderId */ { "sClass": "center", "bSearchable": false },
			/* CreateDate */ { "sClass": "center" },
			/* CustomerInformation */ { "sClass": "center", "bSortable": true, "bVisible": false },					
			/* Amount */ { "sClass": "center" },
			/* AuthorizeStatus */ { "sClass": "center", "bVisible": false },
			/* IsSend */ { "sClass": "center", "bVisible": false },
			/* IsPointed */ { "sClass": "center", "bVisible": false },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( { "name": "productCategorySeoName", "value": "'all'" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	} );
	
	
	
	// ---------------------------->
	// PointTable --------->
	// ---------------------------->
	$('#idPointsTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getPointsTableData",
		"aaSorting": [[ 2, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 50, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [
			/* PointId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* CustomerInformation */ { "sClass": "center", "bSortable": true },
			/* CreateDate */ { "sClass": "center" },
			/* Amount */ { "sClass": "center" },
			/* UserId */ { "sClass": "center", "bSortable": false, "bVisible": false },
			/* OrderId */ { "sClass": "center", "bSortable": false },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( { "name": "productCategorySeoName", "value": "'all'" } );
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	} );
	
	// ---------------------------->
	// UsersApprovedTable --------->
	// ---------------------------->
	$('#idUsersApprovedTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getUsersApprovedTableData",
		"aaSorting": [[ 4, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 100, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* Id */ { "sClass": "center", "bVisible": false, "bSearchable": false },
			/* NameFirst */ { "sClass": "center" },
			/* NameLast */ { "sClass": "center", "bVisible": false },					
			/* Email */ { "sClass": "center" },
			/* CreateDate */ { "sClass": "center", "bVisible": true },
			/* Status */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		]
	} );
	
	// ---------------------------->
	// ProducersTable --------->
	// ---------------------------->
	$('#idProducersTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "index.php?event=getProducersTableData",
		"aaSorting": [[ 1, "desc" ]],
		"bProcessing": false,
		"bLengthChange": true,
		"iDisplayLength": 50, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "../lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* Id */ { "sClass": "center", "bVisible": false, "bSearchable": false },					
			/* Name */ { "sClass": "center" },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false }			  			
  		]
	} );
	
	// --------------->
	// Accordion ----->
	// --------------->
	var icons = {
		header: "ui-icon-circle-arrow-e",
		headerSelected: "ui-icon-circle-arrow-s"
	};
	$("#accordion").accordion({ header: "h3", autoHeight: false, icons: icons});
		
	// --------------->
	// Preloader ----->
	// --------------->
	$("#isLoading").ajaxStart(function() {
		$(this).show();
	});
	
	$("#isLoading").ajaxStop(function() {
		$(this).hide();
	});
	
	$("#showPreloader").click(function() {
		$("#isLoading").show();
	});
	
	$("#hidePreloader").click(function() {
		$("#isLoading").hide();
	});
	
	$("#isLoading").css("position", "absolute");
	 
	$(window).scroll(function() {
	    $("#isLoading").css("top", $(window).scrollTop() + "px");
	});
	
	<?if($event->getArg("event") == "showProductStep4") {?>
		$('.galeria a').lightBox();
	<?}?>
	
});

<?if ($event->getArg('productWizardStep3') != "") {?>
	function executeProductPictureRemove($productId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeProductPictureRemove",
			dataType: "json",
			data: { 'productId': $productId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshProductPicture();
			}
		});
	}
	
	function executeProductPictureSetMain($productId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeProductPictureSetMain",
			dataType: "json",
			data: { 'productId': $productId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshProductPicture();
			}
		});
	}
	
	function refreshProductPicture() {
		$.ajax({
			url: "index.php?event=findProductPictureByProductId",
			dataType: "json",
			data: {'productId': <?=$productId?>},
			success: function(data) {
				if(!data) {
					$html = "";
					$("#filesUploaded").html($html);
					return false;
				}
				$html = "";
				$("#filesUploaded").html($html);
				$.map(data.ProductPicture, function(item) {
					$html = $html + '<div style="float:left; padding:20px; text-align:center;"><img src="../upload/thumb/' + item.ImgDriveName +'"/><br/><br/>';
					$html = $html + '<a href="javascript:executeProductPictureSetMain(\'<?=$productId?>\', \'' + item.ImgDriveName + '\')">Main</a>&nbsp;|&nbsp;';
					$html = $html + '<a href="javascript:executeProductPictureRemove(\'<?=$productId?>\', \'' + item.ImgDriveName + '\')">Remove</a></div>';
				})
				$("#filesUploaded").html($html);
			}
		});
	}
<?}?>

<?if ($event->getArg('productWizardStep4') != "") {?>
	<?$productId = $event->getArg('productId');?>
	function refreshProductPicture() {
		$.ajax({
			url: "index.php?event=findProductPictureByProductId",
			dataType: "json",
			data: {'productId': <?=$productId?>},
			success: function(data) {
				if(!data) {
					$html = "";
					$("#filesUploaded").html($html);
					return false;
				}
				$html = "";
				$("#filesUploaded").html($html);
				$.map(data.ProductPicture, function(item) {
					$html = $html + '<span style="padding:10px;"><img src="../upload/thumb/' + item.ImgDriveName +'"/></span>';
				})
				$("#filesUploaded").html($html);
			}
		});
	}
<?}?>

<?if ($event->getArg('ClubWizardStep2') != "") {?>
	function executeClubPictureRemove($ClubId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeClubPictureRemove",
			dataType: "json",
			data: { 'ClubId': $ClubId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshClubPicture();
			}
		});
	}
	
	function executeClubSavePictureDescription(ImgDriveName, input) {
		
		var text = input.value;
		text = text.replace("'", "")
		
		$.ajax({
			url: "index.php?event=executeClubSavePictureDescription",
			dataType: "json",
			data: { 'imgDriveName': ImgDriveName,
					'imgAltName': text},
			success: function(data) {
				refreshClubPicture();
			}
		});		
	}
	
	function executeClubPictureSetMain($ClubId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeClubPictureSetMain",
			dataType: "json",
			data: { 'ClubId': $ClubId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshClubPicture();
			}
		});
	}
	
	function refreshClubPicture() {
		$.ajax({
			url: "index.php?event=findClubPictureByClubId",
			dataType: "json",
			data: {'ClubId': <?=$ClubId?>},
			success: function(data) {
				if(!data) {
					$html = "";
					$("#filesUploaded").html($html);
					return false;
				}
				$html = "";
				$("#filesUploaded").html($html);
				$.map(data.ClubPicture, function(item) {
					$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
					$html = $html + '<input onBlur="javascript:executeClubSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/><br/>';
					if(item.MainPicture == 0) {
						$html = $html + '<a href="javascript:executeClubPictureSetMain(\'<?=$ClubId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
					}
					$html = $html + '<a href="javascript:executeClubPictureRemove(\'<?=$ClubId?>\', \'' + item.ImgDriveName + '\')" onclick="return confirm(\'Are you sure you want to remove this picture??\')">Remove</a></div>';
					
				})
				$("#filesUploaded").html($html);
			}
		});
	}
<?}?>

<?if ($event->getArg('AlfaWizardStep2') != "") {?>
	function executeAlfaPictureRemove($AlfaId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeAlfaPictureRemove",
			dataType: "json",
			data: { 'AlfaId': $AlfaId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshAlfaPicture();
			}
		});
	}
	
	function executeAlfaSavePictureDescription(ImgDriveName, input) {
		
		var text = input.value;
		text = text.replace("'", "")
		
		$.ajax({
			url: "index.php?event=executeAlfaSavePictureDescription",
			dataType: "json",
			data: { 'imgDriveName': ImgDriveName,
					'imgAltName': text},
			success: function(data) {
				refreshAlfaPicture();
			}
		});		
	}
	
	function executeAlfaPictureSetMain($AlfaId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeAlfaPictureSetMain",
			dataType: "json",
			data: { 'AlfaId': $AlfaId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshAlfaPicture();
			}
		});
	}
	
	function executeAlfaPictureSetHeader($AlfaId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeAlfaPictureSetHeader",
			dataType: "json",
			data: { 'AlfaId': $AlfaId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshAlfaPicture();
			}
		});
	}
	
	function refreshAlfaPicture() {
		$.ajax({
			url: "index.php?event=findAlfaPictureByAlfaId",
			dataType: "json",
			data: {'AlfaId': <?=$AlfaId?>},
			success: function(data) {
				if(!data) {
					$html = "";
					$("#filesUploaded").html($html);
					return false;
				}
				$html = "";
				$("#filesUploaded").html($html);
				$.map(data.AlfaPicture, function(item) {
					$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
					$html = $html + '<input onBlur="javascript:executeAlfaSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/><br/>';
					if(item.MainPicture == 0) {
						$html = $html + '<a href="javascript:executeAlfaPictureSetMain(\'<?=$AlfaId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
					}
					if(item.HeaderPicture == 0) {
						$html = $html + '<a href="javascript:executeAlfaPictureSetHeader(\'<?=$AlfaId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
					}
					$html = $html + '<a href="javascript:executeAlfaPictureRemove(\'<?=$AlfaId?>\', \'' + item.ImgDriveName + '\')" onclick="return confirm(\'Are you sure you want to remove this picture??\')">Remove</a></div>';
					
				})
				$("#filesUploaded").html($html);
			}
		});
	}
<?}?>

<?if ($event->getArg('BetaWizardStep2') != "") {?>
	function executeBetaPictureRemove($BetaId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeBetaPictureRemove",
			dataType: "json",
			data: { 'BetaId': $BetaId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshBetaPicture();
			}
		});
	}
	
	function executeBetaSavePictureDescription(ImgDriveName, input) {
		
		var text = input.value;
		text = text.replace("'", "")
		
		$.ajax({
			url: "index.php?event=executeBetaSavePictureDescription",
			dataType: "json",
			data: { 'imgDriveName': ImgDriveName,
					'imgAltName': text},
			success: function(data) {
				refreshBetaPicture();
			}
		});		
	}
	
	function executeBetaPictureSetMain($BetaId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeBetaPictureSetMain",
			dataType: "json",
			data: { 'BetaId': $BetaId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshBetaPicture();
			}
		});
	}
	
	function refreshBetaPicture() {
		$.ajax({
			url: "index.php?event=findBetaPictureByBetaId",
			dataType: "json",
			data: {'BetaId': <?=$BetaId?>},
			success: function(data) {
				if(!data) {
					$html = "";
					$("#filesUploaded").html($html);
					return false;
				}
				$html = "";
				$("#filesUploaded").html($html);
				$.map(data.BetaPicture, function(item) {
					$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
					$html = $html + '<input onBlur="javascript:executeBetaSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/><br/>';
					if(item.MainPicture == 0) {
						$html = $html + '<a href="javascript:executeBetaPictureSetMain(\'<?=$BetaId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
					}
					$html = $html + '<a href="javascript:executeBetaPictureRemove(\'<?=$BetaId?>\', \'' + item.ImgDriveName + '\')" onclick="return confirm(\'Are you sure you want to remove this picture??\')">Remove</a></div>';
					
				})
				$("#filesUploaded").html($html);
			}
		});
	}
<?}?>

<?if ($event->getArg('GamaWizardStep2') != "") {?>
	function executeGamaPictureRemove($GamaId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeGamaPictureRemove",
			dataType: "json",
			data: { 'GamaId': $GamaId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshGamaPicture();
			}
		});
	}
	
	function executeGamaSavePictureDescription(ImgDriveName, input) {
		
		var text = input.value;
		text = text.replace("'", "")
		
		$.ajax({
			url: "index.php?event=executeGamaSavePictureDescription",
			dataType: "json",
			data: { 'imgDriveName': ImgDriveName,
					'imgAltName': text},
			success: function(data) {
				refreshGamaPicture();
			}
		});		
	}
	
	function executeGamaPictureSetMain($GamaId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeGamaPictureSetMain",
			dataType: "json",
			data: { 'GamaId': $GamaId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshGamaPicture();
			}
		});
	}
	
	function refreshGamaPicture() {
		$.ajax({
			url: "index.php?event=findGamaPictureByGamaId",
			dataType: "json",
			data: {'GamaId': <?=$GamaId?>},
			success: function(data) {
				if(!data) {
					$html = "";
					$("#filesUploaded").html($html);
					return false;
				}
				$html = "";
				$("#filesUploaded").html($html);
				$.map(data.GamaPicture, function(item) {
					$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
					$html = $html + '<input onBlur="javascript:executeGamaSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/><br/>';
					if(item.MainPicture == 0) {
						$html = $html + '<a href="javascript:executeGamaPictureSetMain(\'<?=$GamaId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
					}
					$html = $html + '<a href="javascript:executeGamaPictureRemove(\'<?=$GamaId?>\', \'' + item.ImgDriveName + '\')" onclick="return confirm(\'Are you sure you want to remove this picture??\')">Remove</a></div>';
					
				})
				$("#filesUploaded").html($html);
			}
		});
	}
<?}?>

<?if ($event->getArg('DeltaWizardStep2') != "") {?>
	function executeDeltaPictureRemove($DeltaId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeDeltaPictureRemove",
			dataType: "json",
			data: { 'DeltaId': $DeltaId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshDeltaPicture();
			}
		});
	}
	
	function executeDeltaSavePictureDescription(ImgDriveName, input) {
		
		var text = input.value;
		text = text.replace("'", "")
		
		$.ajax({
			url: "index.php?event=executeDeltaSavePictureDescription",
			dataType: "json",
			data: { 'imgDriveName': ImgDriveName,
					'imgAltName': text},
			success: function(data) {
				refreshDeltaPicture();
			}
		});		
	}
	
	function executeDeltaPictureSetMain($DeltaId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeDeltaPictureSetMain",
			dataType: "json",
			data: { 'DeltaId': $DeltaId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshDeltaPicture();
			}
		});
	}
	
	function refreshDeltaPicture() {
		$.ajax({
			url: "index.php?event=findDeltaPictureByDeltaId",
			dataType: "json",
			data: {'DeltaId': <?=$DeltaId?>},
			success: function(data) {
				if(!data) {
					$html = "";
					$("#filesUploaded").html($html);
					return false;
				}
				$html = "";
				$("#filesUploaded").html($html);
				$.map(data.DeltaPicture, function(item) {
					$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
					$html = $html + '<input onBlur="javascript:executeDeltaSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/><br/>';
					if(item.MainPicture == 0) {
						$html = $html + '<a href="javascript:executeDeltaPictureSetMain(\'<?=$DeltaId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
					}
					$html = $html + '<a href="javascript:executeDeltaPictureRemove(\'<?=$DeltaId?>\', \'' + item.ImgDriveName + '\')" onclick="return confirm(\'Are you sure you want to remove this picture??\')">Remove</a></div>';
					
				})
				$("#filesUploaded").html($html);
			}
		});
	}
<?}?>


<?if ($event->getArg('SigmaWizardStep2') != "") {?>
	function executeSigmaPictureRemove($SigmaId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeSigmaPictureRemove",
			dataType: "json",
			data: { 'SigmaId': $SigmaId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshSigmaPicture();
			}
		});
	}
	
	function executeSigmaSavePictureDescription(ImgDriveName, input) {
		
		var text = input.value;
		text = text.replace("'", "")
		
		$.ajax({
			url: "index.php?event=executeSigmaSavePictureDescription",
			dataType: "json",
			data: { 'imgDriveName': ImgDriveName,
					'imgAltName': text},
			success: function(data) {
				refreshSigmaPicture();
			}
		});		
	}
	
	function executeSigmaPictureSetMain($SigmaId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeSigmaPictureSetMain",
			dataType: "json",
			data: { 'SigmaId': $SigmaId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshSigmaPicture();
			}
		});
	}
	
	function refreshSigmaPicture() {
		$.ajax({
			url: "index.php?event=findSigmaPictureBySigmaId",
			dataType: "json",
			data: {'SigmaId': <?=$SigmaId?>},
			success: function(data) {
				if(!data) {
					$html = "";
					$("#filesUploaded").html($html);
					return false;
				}
				$html = "";
				$("#filesUploaded").html($html);
				$.map(data.SigmaPicture, function(item) {
					$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
					$html = $html + '<input onBlur="javascript:executeSigmaSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/><br/>';
					if(item.MainPicture == 0) {
						$html = $html + '<a href="javascript:executeSigmaPictureSetMain(\'<?=$SigmaId?>\', \'' + item.ImgDriveName + '\')">Main Picture</a>&nbsp;|&nbsp;';
					}
					$html = $html + '<a href="javascript:executeSigmaPictureRemove(\'<?=$SigmaId?>\', \'' + item.ImgDriveName + '\')" onclick="return confirm(\'Are you sure you want to remove this picture??\')">Remove</a></div>';
					
				})
				$("#filesUploaded").html($html);
			}
		});
	}
<?}?>

<?if ($event->getArg('CmsContentWizardStep2') != "") {?>
	function executeCmsContentPictureRemove($CmsContentId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeCmsContentPictureRemove",
			dataType: "json",
			data: { 'CmsContentId': $CmsContentId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshCmsContentPicture();
			}
		});
	}
	
	function executeCmsContentSavePictureDescription(ImgDriveName, input) {
		
		var text = input.value;
		text = text.replace("'", "")
		
		$.ajax({
			url: "index.php?event=executeCmsContentSavePictureDescription",
			dataType: "json",
			data: { 'imgDriveName': ImgDriveName,
					'imgAltName': text},
			success: function(data) {
				refreshCmsContentPicture();
			}
		});		
	}
	
	function executeCmsContentSavePictureOrder(ImgDriveName, input) {
		
		var text = input.value;
		text = text.replace("'", "")
		$.ajax({
			url: "index.php?event=executeCmsContentSavePictureDescription",
			dataType: "json",
			data: { 'imgDriveName': ImgDriveName,
					'imgOrder': text},
			success: function(data) {
				refreshCmsContentPicture();
			}
		});		
	}
	
	function executeCmsContentPictureSetMain($CmsContentId, $pictureId) {
		$.ajax({
			url: "index.php?event=executeCmsContentPictureSetMain",
			dataType: "json",
			data: { 'CmsContentId': $CmsContentId,
					'pictureId': $pictureId},
			success: function(data) {
				refreshCmsContentPicture();
			}
		});
	}
	
	function refreshCmsContentPicture() {
		$.ajax({
			url: "index.php?event=findCmsContentPictureByCmsContentId",
			dataType: "json",
			data: {'CmsContentId': <?=$CmsContentId?>},
			success: function(data) {
				if(!data) {
					$html = "";
					$("#filesUploaded").html($html);
					return false;
				}
				$html = "";
				$("#filesUploaded").html($html);
				$.map(data.CmsContentPicture, function(item) {
					$html = $html + '<div class="galeria" style="float:left; padding:20px; text-align:center;"><div style="width:200px; height:200px;"><a href="../upload/proper/' + item.ImgDriveName +'" target="_blank"><img src="../upload/micro/' + item.ImgDriveName +'"/></a></div><br/><br/>';
					$html = $html + '<input onBlur="javascript:executeCmsContentSavePictureDescription(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'" value="' + item.ImgAltName +'" style="width:190px;"><br/>';
					$html = $html + '<input onBlur="javascript:executeCmsContentSavePictureOrder(\''+ item.ImgDriveName+ '\', this);" type="text" name="' + item.ImgDriveName +'1" value="' + item.ImgOrder +'" style="width:190px;"><br/><br/>';
					$html = $html + '<a href="javascript:executeCmsContentPictureRemove(\'<?=$CmsContentId?>\', \'' + item.ImgDriveName + '\')" onclick="return confirm(\'Are you sure you want to remove this picture??\')">Remove</a></div>';
				})
				$("#filesUploaded").html($html);				
			}
		});
	}
<?}?>
 
</script>