<?
require_once("model/components/session.inc.php");
require_once("model/ProductCategoryDao.inc.php");
require_once("model/ProductCategoryGateway.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');?>

<?if($event->getArg("id1") != "" and $event->getArg("id2") != "") {
	$productCategorySeoName = "'".$event->getArg("id2")."'";
} elseif ($event->getArg("id1") != "" and $event->getArg("id2") == "") {
	
	// get all subcategories for this father category
	$productCategorySeoName = $event->getArg("id1");
	$objProductCategoryDao = new ProductCategoryDao();
	$objProductCategory = $objProductCategoryDao->readBySeoName($productCategorySeoName);
	
	// father categoryId
	$productCategoryId = $objProductCategory->getProductCategoryId();
	$objProductCategoryGateway = new ProductCategoryGateway();
	$arrProductCategory = $objProductCategoryGateway->findByFatherId($productCategoryId);
	
	if($arrProductCategory) {
		$inClause = "";
		foreach($arrProductCategory as $objProductCategory) {
			$inClause .= "'".$objProductCategory->getSeoName()."',";
		}
	}
	$inClause = substr_replace($inClause, "", -1);
	
	if($inClause != "") {
		$productCategorySeoName = $inClause;
	} else {
		$productCategorySeoName = "'".$event->getArg("id1")."'";
	}
	
} else {
	$productCategorySeoName = "'all'";
}
?>		

<script>
 $(document).ready(function() {
 	 	 	
 	// --------------->
	// ProductTable --------->
	// --------------->
	$('#idProductTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "<?=$SN;?>index.php?event=getProductTableData",
		"aaSorting": [[ 10, "asc" ]],
		"bProcessing": false,
		"bLengthChange": false,
		"iDisplayLength": 6,
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "<?=$SN;?>lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* ProductId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* ImgDriveName */ { "sClass": "center", "bSortable": false },
			/* Name */ { "sClass": "center" },
			/* ProductCategoryLevelOneName */ { "sClass": "center", "bSortable": false, "bVisible": false },
			/* ProductCategoryLevelOneSeoName */ { "sClass": "center", "bSortable": false, "bVisible": false },
			/* ProductCategoryLevelTwoName */ { "sClass": "center", "bSortable": false, "bVisible": false },
			/* ProductCategoryLevelTwoSeoName */ { "sClass": "center", "bSortable": false, "bVisible": false },
			/* Price */ { "sClass": "center" },
			/* PriceOld */ { "sClass": "center", "bSortable": false, "bVisible": false },
			/* UpdateDate */ { "sClass": "center", "bVisible": false },
			/* ProductOrder */ { "sClass": "center", "bVisible": false },
			/* isAvailable */ { "sClass": "center", "bVisible": false },
			/* isVisible */ { "sClass": "center", "bVisible": false },
			/* ProducerName */ { "sClass": "center", "bVisible": false },
			/* Action */ { "sClass": "center", "sType": "html" , "bSearchable": false, "bVisible": false }
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( 	{ "name": "productCategorySeoName", "value": "<?=$productCategorySeoName?>" }, 
							{ "name": "id1", "value": "<?=$event->getArg('id1')?>" },
							{ "name": "id2", "value": "<?=$event->getArg('id2')?>" } );
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
	// ProductSearchTable --------->
	// ---------------------------->
	$('#idProductSearchTable').dataTable( {
		"bAutoWidth": false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "<?=$SN;?>index.php?event=getProductSearchTableData",
		"aaSorting": [[ 10, "desc" ]],
		"bProcessing": false,
		"bLengthChange": false,
		"iDisplayLength": 6,
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "<?=$SN;?>lang/pl_PL.txt"
		},					
		"aoColumns": [				
			/* ProductId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* ImgDriveName */ { "sClass": "center", "bSortable": false },
			/* Name */ { "sClass": "center" },
			/* ProductCategoryLevelOneName */ { "sClass": "center", "bSortable": false, "bVisible": false },
			/* ProductCategoryLevelOneSeoName */ { "sClass": "center", "bSortable": false, "bVisible": false },
			/* ProductCategoryLevelTwoName */ { "sClass": "center", "bSortable": false, "bVisible": false },
			/* ProductCategoryLevelTwoSeoName */ { "sClass": "center", "bSortable": false, "bVisible": false },
			/* Price */ { "sClass": "center" },
			/* PriceOld */ { "sClass": "center", "bSortable": false, "bVisible": false },
			/* UpdateDate */ { "sClass": "center", "bVisible": false },
			/* ProductOrder */ { "sClass": "center", "bVisible": false },
			/* isAvailable */ { "sClass": "center", "bVisible": false },
			/* isVisible */ { "sClass": "center", "bVisible": false },
			/* ProducerName */ { "sClass": "center", "bVisible": false },
			/* Action */ { "sClass": "center", "sType": "html" , "bSearchable": false, "bVisible": false }
  		],
  		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push( 	{ "name": "searchType", "value": "<?=$event->getArg('searchType')?>" },
							{ "name": "searchKeyword", "value": "<?=$event->getArg('searchKeyword')?>" } );
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
		"iDisplayLength": 10, 
		"sDom": '<"top"p>t<"bottom"pl<"clear">',
		"oLanguage": {
			"sUrl": "<?=$SN;?>lang/pl_PL.txt"
		},					
		"aoColumns": [
			/* OrderId */ { "sClass": "center", "bSearchable": false },
			/* CreateDate */ { "sClass": "center" },
			/* CustomerInformation */ { "sClass": "center", "bSortable": true },
			/* Amount */ { "sClass": "center" },
			/* AuthorizeStatus */ { "sClass": "center" },
			/* IsSend */ { "sClass": "center" },
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
			"sUrl": "<?=$SN;?>lang/pl_PL.txt"
		},					
		"aoColumns": [
			/* PointId */ { "sClass": "center", "bSearchable": false, "bVisible": false },
			/* CustomerInformation */ { "sClass": "center", "bSortable": true },
			/* CreateDate */ { "sClass": "center" },
			/* Amount */ { "sClass": "center" },
			/* Comments */ { "sClass": "center" },
			/* UserId */ { "sClass": "center", "bSortable": false, "bVisible": false },
			/* Action */ { "sClass": "center", "sType": "html", "bSortable": false , "bSearchable": false, "bVisible": false }			  			
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
	
	// --------------->
	// Button -------->
	// --------------->
	$("a", ".login").button({
        icons: {
            primary: 'ui-icon-check'
        },
        text: true
	});
	$("a", ".login").click(function() {
		$('#divLogin').dialog('open');
		$('#formLoginEmail').focus();
		return false; 
	});
	
	$("a", "#loginNoIcon").button({
        text: true
	});
	$("a", "#loginNoIcon").click(function() {
		$('#divLogin').dialog('open');
		$('#formLoginEmail').focus();
		return false; 
	});
	
	$("a", "#logout").button({
        icons: {
            primary: 'ui-icon-power'
        },
        text: true
	});	
	
	$("a", "#register").button({
        icons: {
	        primary: 'ui-icon-person'
	    },
	    text: true
	});
	$("a", "#register").click(function() {
		$('#divRegistration').dialog('open');
		$('#formRegistrationEmail').focus();
		return false; 
	});
	
	$("a", "#help").button({
        icons: {
	        primary: 'ui-icon-help'
	    },
	    text: true
	});
	
	$("a", ".contact").button({
	        icons: {
	        primary: 'ui-icon-mail-closed'
	    },
	    text: true
	});
	$("a", ".contact").click(function() {
		$('#divContact').dialog('open');
		<?if ($objAppSession->getSession("User") != "") {?>
			<?$objUser = $objAppSession->getSession("User");?>
			$('#formContactMessage').focus();
			$('#formContactName').val("<?=$objUser->getNameFirst();?> <?=$objUser->getNameLast();?>");
			$('#formContactEmail').val("<?=$objUser->getEmail();?>");
		<?} else {?>
			$('#formContactName').focus();
		<?}?>
		return false; 
	});
	
	$("a", "#shoppingCart").button({
	        icons: {
	        primary: 'ui-icon-cart'
	    },
	    text: true
	});
	
	$("a", "#newsletter").button({
	        icons: {
	        primary: 'ui-icon-mail-closed'
	    },
	    text: true
	});
	$("a", "#newsletter").click(function() {
		alert('newsletter');
		return false; 
	});
	
	$("input:submit").button();
	
	$("a", ".shoppingCartButton").button({
        text: true
	});	
	
	$("a", ".shoppingCartButtonDisabled").button({
        text: true,
        disabled: true
	});
	
	$("#signUpLink").click(function() {
			$("#divLogin").dialog("close");
			$('#divRegistration').dialog('open');
			$('#formRegistrationEmail').focus();
			return false;
	});
	
	// --------------->
	// ShipRadio -------->
	// --------------->
	$("#dostawa1").click(function() {
		
		var shipId= "1";
		var shipPrice = "10.00";
		var shipName = "Poczta Polska - PACZKA PRIORYTETOWA - Płatność przelewem na konto - 10,00  PLN - czas dostawy: 1-3 dni";
		
		var cartTotal = $("#cartTotal").html();
		var finalPrice = parseInt(cartTotal) + parseInt(shipPrice);
		$("#shipPrice").html(shipPrice);
		$("#finalPrice").html(to2DecWithComma(finalPrice));
		
		$("#formShipId").val(shipId);
		$("#formShipName").val(shipName);
		$("#formShipPrice").val(shipPrice);
		
		saveShoppingCartState(shipId, shipName, shipPrice, $("#formOrderComments").val(), "");
	});
	
	$("#dostawa2").click(function() {
		
		var shipId= "2";
		var shipPrice = "13.50";
		var shipName = "Poczta Polska - PACZKA PRIORYTETOWA - Płatność przy odbiorze - 13,50  PLN - czas dostawy: 1-3 dni";
		
		var cartTotal = $("#cartTotal").html();
		var finalPrice = parseInt(cartTotal) + parseInt(shipPrice);
		$("#shipPrice").html(shipPrice);
		$("#finalPrice").html(to2DecWithComma(finalPrice));
		
		$("#formShipId").val(shipId);
		$("#formShipName").val(shipName);
		$("#formShipPrice").val(shipPrice);
		
		saveShoppingCartState(shipId, shipName, shipPrice, $("#formOrderComments").val(), "");		
	});
	
	$("#dostawa3").click(function() {
		
		var shipId= "3";
		var shipPrice = "17.00";
		var shipName = "Kurier  DPD - Płatność przelewem na konto - 17,00  PLN - czas dostawy: 1-2 dni";
		
		var cartTotal = $("#cartTotal").html();
		var finalPrice = parseInt(cartTotal) + parseInt(shipPrice);
		$("#shipPrice").html(shipPrice);
		$("#finalPrice").html(to2DecWithComma(finalPrice));
		
		$("#formShipId").val(shipId);
		$("#formShipName").val(shipName);
		$("#formShipPrice").val(shipPrice);
		
		saveShoppingCartState(shipId, shipName, shipPrice, $("#formOrderComments").val(), "");
				
	});
	
	$("#dostawa4").click(function() {
		
		var shipId= "4";
		var shipPrice = "21.00";
		var shipName = "Kurier  DPD - Płatność przy odbiorze - 21,00 PLN - czas dostawy: 1-2 dni";
		
		var cartTotal = $("#cartTotal").html();
		var finalPrice = parseInt(cartTotal) + parseInt(shipPrice);
		$("#shipPrice").html(shipPrice);
		$("#finalPrice").html(to2DecWithComma(finalPrice));
		
		$("#formShipId").val(shipId);
		$("#formShipName").val(shipName);
		$("#formShipPrice").val(shipPrice);
		
		saveShoppingCartState(shipId, shipName, shipPrice, $("#formOrderComments").val(), "");
		
	});
	
	$("#dostawa5").click(function() {
		
		var shipId= "5";
		var shipPrice = "0.00";
		var shipName = "Odbiór osobisty - Płatność przelewem na konto lub gotówką - 0 PLN - w godz. od 9.00 do 16.00 w dniach poniedziałek - piątek";
		
		var cartTotal = $("#cartTotal").html();
		var finalPrice = parseInt(cartTotal) + parseInt(shipPrice);
		$("#shipPrice").html(shipPrice);
		$("#finalPrice").html(to2DecWithComma(finalPrice));
		
		$("#formShipId").val(shipId);
		$("#formShipName").val(shipName);
		$("#formShipPrice").val(shipPrice);
		
		saveShoppingCartState(shipId, shipName, shipPrice, $("#formOrderComments").val(), "");
		
	});
	
	$("#dostawa6").click(function() {
		
		var shipId= "6";
		var shipPrice = "0.00";
		var shipName = "Doręczenie do domu przez pracownika sklepu - płatność przelewem na konto lub gotówką  - 0 PLN - czas dostawy: 1-3 dni dla zamówień powyżej 99 PLN i dostawy na terenie Krakowa, przesyłki dostarczamy we wtorki, czwartki i soboty wieczorem";
		
		var cartTotal = $("#cartTotal").html();
		var finalPrice = parseInt(cartTotal) + parseInt(shipPrice);
		$("#shipPrice").html(shipPrice);
		$("#finalPrice").html(to2DecWithComma(finalPrice));
		
		$("#formShipId").val(shipId);
		$("#formShipName").val(shipName);
		$("#formShipPrice").val(shipPrice);
		
		saveShoppingCartState(shipId, shipName, shipPrice, $("#formOrderComments").val(), "");
		
	});
	
	$("#formOrderComments").blur(function() {
		
		var shipId =  $("#formShipId").val();
		var shipName = $("#formShipName").val();
		var shipPrice = $("#formShipPrice").val();
		
		saveShoppingCartState(shipId, shipName, shipPrice, $("#formOrderComments").val(), "");
		
	});
			
	function to2DecWithComma(num) {
		num="" + Math.floor(num*100.0 + 0.5)/100.0;
		
		var i=num.indexOf(".");
		
		if ( i<0 ) num+=".00";
		else {
		num=num.substring(0,i) + "." + num.substring(i + 1);
		i=(num.length - i) - 1;
		if ( i==0 ) num+="00";
		else if ( i==1 ) num+="0";
		else if ( i>2 ) num=num.substring(0,i + 3);
		}

		return num;
	}
	
	// ----------------------->
	// Autocomplete product -->
	// ----------------------->
	$("#product").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: "<?=$SN;?>index.php?event=findProductByName",
				dataType: "json",
				data: {
					maxRows: 5,
					name: request.term
				},
				success: function(data) {
					if(!data) {
						return false;
					}
					response($.map(data.Product, function(item) {
						return {
							label: item.Name,
							value: item.Name
						}
					}))
				}
			})
		},
		minLength: 1,
		select: function(event, ui) {
			$("#searchType").val("product");
			$("#searchKeyword").val(ui.item.label);
			$("#searchForm").submit();
			return false;
		}
	});
	
	$('#product').focus(function() {
		$('#product').val("");  		
	});
	
	$("a", "#productSearchButton").button({
	        icons: {
	        primary: 'ui-icon-search'
	    },
	    text: true
	});
	$("a", "#productSearchButton").click(function() {
		$("#searchType").val("product");
		var product = $("#product").val();
		if(product == "wpisz nazwę produktu" || product == "") {
			alert("Proszę wpisać nazwę produktu.");
			return false;
		}
		$("#searchKeyword").val(product);
		$("#searchForm").submit();
		return false; 
	});
	
	// ------------------------>
	// Autocomplete producer -->
	// ------------------------>
	$("#producer").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: "<?=$SN;?>index.php?event=findProducerByName",
				dataType: "json",
				data: {
					maxRows: 5,
					name: request.term
				},
				success: function(data) {
					if(!data) {
						return false;
					}
					response($.map(data.Producer, function(item) {
						return {
							label: item.Name,
							value: item.Name
						}
					}))
				}
			})
		},
		minLength: 1,
		select: function(event, ui) {
			$("#searchType").val("producer");
			$("#searchKeyword").val(ui.item.label);
			$("#searchForm").submit();
			return false;
		}
	});
	
	$('#producer').focus(function() {
		$('#producer').val("");  		
	});
	
	$("a", "#producerSearchButton").button({
	        icons: {
	        primary: 'ui-icon-search'
	    },
	    text: true
	});
	$("a", "#producerSearchButton").click(function() {
		$("#searchType").val("producer");
		var producer = $("#producer").val();
		if(producer == "wpisz nazwę producenta" || producer == "") {
			alert("Proszę wpisać nazwę producenta.");
			return false;
		}
		$("#searchKeyword").val(producer);
		$("#searchForm").submit();
		return false; 
	});

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
	
	// --------------->
	// Dialog Forms -->
	// --------------->
	function updateTips(t) {
		$(".validateTips").show();
		$(".validateTips").text(t).addClass('ui-state-highlight');
		setTimeout(function() {
			$(".validateTips").removeClass('ui-state-highlight', 500);
		}, 500);
	}
	
	function removeFieldsHighlight(fields) {
		$(".validateTips").hide();
		fields.removeClass('ui-state-error');
	}
	
	function removeFieldsContent(fields) {
		$(".validateTips").hide();
		fields.val('');
	}
	
	// Login Form Starts -->
	var formLoginFields = $([]).add($("#formLoginEmail")).add($("#formLoginPassword"));
	$('#divLogin').dialog('destroy');
	$('#divLogin').dialog({
		autoOpen: false,
		height: 280,
		width: 350,
		modal: true,
		resizable: false,
		open: function(event, ui) {
			$('#selectedRowId').val();
		},
		buttons: {
			
			"Anuluj": function() {
				removeFieldsHighlight(formLoginFields);
				removeFieldsContent(formLoginFields);
				$("#divLogin").dialog("close"); 
			},
			"Przypomnij hasło": function() {
				$("#divLogin").dialog("close");
				$('#divForgotPassword').dialog('open');
				$('#formForgotPasswordEmail').focus();
			},
			"Logowanie": function() {
				divLoginSubmit();
			}			
		}
	});
	
	$('#divLogin').find('input').keypress(function(e) {
		if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
			divLoginSubmit();
		}
	});
	
	function divLoginSubmit() {
		$.post(  
			"<?=$SN?>index.php?event=executeLogin",  
			$("#formLogin").serialize(),  
			function(data){
		   	  if (data.validationResult) {
		   		    removeFieldsHighlight(formLoginFields);
		   		    removeFieldsContent(formLoginFields);
		   		  	$("#divLogin").dialog("close");
		   		  	if (data.userType == "admin") {
		   	  			$('#executeLoginAdmin').submit();
		   		  	}
		   		  	if (data.userType == "client_profil") {
		   		  		$('#executeLoginClientProfile').submit();
		   		  	}
		   		  	if (data.userType == "client_basket") {
		   		  		$('#executeLoginClientBasket').submit();
		   		  	}
				} else {
					removeFieldsHighlight(formLoginFields);
					updateTips(data.errorMessage);
					$("#" + data.fieldName + "").addClass('ui-state-error');
				}  
		  	},  
		  	"json"  
		 );
	}
	// Login Form End -->
	
	// Registration Form Starts -->
	var formRegistrationFields = $([]).add($("#formRegistrationEmail")).add($("#formRegistrationPassword"));
	$('#divRegistration').dialog('destroy');
	$('#divRegistration').dialog({
		autoOpen: false,
		height: 340,
		width: 350,
		modal: true,
		resizable: false,
		open: function(event, ui) {
			$('#selectedRowId').val();
		},
		buttons: {
			"Anuluj": function() {
				removeFieldsHighlight(formRegistrationFields);
				removeFieldsContent(formRegistrationFields);
				$("#divRegistration").dialog("close");				
			},
			"Rejestracja": function() {
				divRegistrationSubmit();
			}			
		}
	});

	$('#divRegistration').find('input').keypress(function(e) {
		if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
			divRegistrationSubmit();
		}
	});
	
	function divRegistrationSubmit() {
		$.post(  
			"<?=$SN;?>index.php?event=executeRegistration",  
			$("#formRegistration").serialize(),  
			function(data){
		   	  if (data.validationResult) {
		   		  	removeFieldsHighlight(formRegistrationFields);
		   		  	removeFieldsContent(formRegistrationFields);
		   		  	$('#divRegistrationConfirm').dialog('open');
		   		  	$("#divRegistration").dialog("close");
				} else {
					removeFieldsHighlight(formRegistrationFields);
					updateTips(data.errorMessage);
					$("#" + data.fieldName + "").addClass('ui-state-error');
				}  
		  	},  
		  	"json"  
		  );
	}
	// Registration Form End -->
	
	// Registration Form Confirm Starts -->
	$('#divRegistrationConfirm').dialog('destroy');
	$('#divRegistrationConfirm').dialog({
		autoOpen: false,
		height: 220,
		width: 350,
		modal: true,
		resizable: false,
		buttons: {
			"Zamknij": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	// Registration Form Confirm Ends -->
	
	// Contact Form Starts -->
	var formContactFields = $([]).add($("#formContactName")).add($("#formContactEmail")).add($("#formContactMessage"));
	$('#divContact').dialog('destroy');
	$('#divContact').dialog({
		autoOpen: false,
		height: 370,
		width: 350,
		modal: true,
		resizable: false,
		open: function(event, ui) {
			$('#selectedRowId').val();
		},
		buttons: {
			"Anuluj": function() {
				removeFieldsHighlight(formContactFields);
				removeFieldsContent(formContactFields);
				$("#divContact").dialog("close");				
			},
			"Wyślij": function() {
				divContactSubmit();
			}			
		}
	});
	
	$('#divContact').find('input').keypress(function(e) {
		if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
			divContactSubmit();
		}
	});
	
	function divContactSubmit() {
		$.post(  
			"<?=$SN;?>index.php?event=executeContact",  
			$("#formContact").serialize(),  
			function(data){
		   	  if (data.validationResult) {
		   		  	removeFieldsHighlight(formContactFields);
		   		  	removeFieldsContent(formContactFields);
		   		  	$('#divContactConfirm').dialog('open');
					$("#divContact").dialog("close");
				} else {
					removeFieldsHighlight(formContactFields);
					updateTips(data.errorMessage);
					$("#" + data.fieldName + "").addClass('ui-state-error');
				}  
		  	},  
		  	"json"  
		  );
	}
	
	// Contact Form Ends -->
	
	// Contact Form Confirm Starts -->
	$('#divContactConfirm').dialog('destroy');
	$('#divContactConfirm').dialog({
		autoOpen: false,
		height: 180,
		width: 350,
		modal: true,
		resizable: false,
		buttons: {
			"Zamknij": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	// Contact Form Confirm Ends -->
	
	// ForgotPassword Form Starts -->
	var formForgotPasswordFields = $([]).add($("#formForgotPasswordEmail"));
	$('#divForgotPassword').dialog('destroy');
	$('#divForgotPassword').dialog({
		autoOpen: false,
		height: 200,
		width: 350,
		modal: true,
		resizable: false,
		open: function(event, ui) {
			$('#selectedRowId').val();
		},
		buttons: {
			"Anuluj": function() {
				removeFieldsHighlight(formForgotPasswordFields);
				removeFieldsContent(formForgotPasswordFields);
				$("#divForgotPassword").dialog("close");				
			},
			"Wyślij hasło": function() {
				divForgotPasswordSubmit();
			}			
		}
	});

	$('#divForgotPassword').find('input').keypress(function(e) {
		if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
			divForgotPasswordSubmit();
		}
	});
	
	function divForgotPasswordSubmit() {
		$.post(  
			"<?=$SN?>index.php?event=executeForgotPassword",  
			$("#formForgotPassword").serialize(),  
			function(data){
		   	  if (data.validationResult) {
		   		  	removeFieldsHighlight(formForgotPasswordFields);
		   		  	removeFieldsContent(formForgotPasswordFields);
		   		  	$("#divForgotPassword").dialog("close");
		   		    $('#divForgotPasswordConfirm').dialog('open');
				} else {
					removeFieldsHighlight(formForgotPasswordFields);
					updateTips(data.errorMessage);
					$("#" + data.fieldName + "").addClass('ui-state-error');
				}  
		  	},  
		  	"json"  
		  );
	}
	// ForgotPassword Form End -->
	
	// ForgotPassword Confirm Starts -->
	$('#divForgotPasswordConfirm').dialog('destroy');
	$('#divForgotPasswordConfirm').dialog({
		autoOpen: false,
		height: 180,
		width: 350,
		modal: true,
		resizable: false,
		buttons: {
			"Zamknij": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	// ForgotPassword Form Confirm Ends -->
	
	<?if($event->getArg("event") == "produkt") {?>
		$('.galeria a').lightBox();
	<?}?>
			
}); 

function doClear(theText) {
     if (theText.value == theText.defaultValue) {
         theText.value = ""
     }
 }
 
function submitToUrl(url) {
	
	var shipId =  $("#formShipId").val();
	var shipName = $("#formShipName").val();
	var shipPrice = $("#formShipPrice").val();
	
	saveShoppingCartState(shipId, shipName, shipPrice, $("#formOrderComments").val(), url);	
}

function saveShoppingCartState(shipId, shipName, shipPrice, orderComment, url) {
	$.ajax({
	   type: "POST",
	   url: "<?=$SN?>index.php?event=saveShoppingCartState",
	   data: "ShipId=" + shipId + "&ShipName=" + shipName +"&ShipPrice=" + shipPrice + "&OrderComment=" + orderComment,
	   success: function(msg){
	   		if (url != "") {
	   			document.f1.action = url;
				document.f1.target='_self';
				document.f1.submit();			
	   		}
	   }
	 });
}
</script>
