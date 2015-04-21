$(document).ready(function() {
        
	
	$("a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'light_square',slideshow:3000, autoplay_slideshow: false, hideflash: false, wmode: 'opaque',opacity: 1, show_title: false, social_tools: false});
	
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
	
	// radio - only to replace image
	$(".customerType input:radio").click(function() {
		var customerType = $('input[name=customerType]:checked').val();
		if(customerType == "Company") {
			$(".shoppingCartButtonCheckout img").attr("src", $("#form_SN").val() + "images/checkout_company.png");
		} else {
			$(".shoppingCartButtonCheckout img").attr("src", $("#form_SN").val() + "images/checkout.png");
			
		}
	});
	
	
	// radio
	$(".deliveryType input:radio").click(function() {
		var shipPrice = $("#shipPrice").html();
		var cartWeightTotal = $("#cartWeightTotal").val();
		var customerType = $('input[name=customerType]:checked').val();
		var deliveryType = $('input[name=deliveryType]:checked').val();
		var cartTotal = $("#cartTotal").html();
		var finalPrice = "";
		
		if(deliveryType == "Post") {
			// if we come from Appointment then we need to set ship price again base on cartWeightTotal.
			if(cartWeightTotal >= 0 && cartWeightTotal < 999) {
				shipPrice = "80.00";
			} else if (cartWeightTotal >= 1000 && cartWeightTotal < 1999) {
				shipPrice = "110.00";
			} else if (cartWeightTotal >= 2000 && cartWeightTotal < 9599) {
				shipPrice = "150.00";
			} else if (cartWeightTotal >= 9600 && cartWeightTotal < 24999) {
				shipPrice = "260.00";
			} else if (cartWeightTotal >= 25000 && cartWeightTotal < 35000) {
				shipPrice = "370.00";
			}
			finalPrice = parseFloat(cartTotal) + parseFloat(shipPrice);	
		} else {
			finalPrice = parseFloat(cartTotal);
			shipPrice = 0;
		}
		
		$("#shipPrice").html(shipPrice);
		$("#finalPrice").html(to2DecWithComma(finalPrice));
		
		saveShoppingCartState(shipPrice, customerType, deliveryType, "");
	});
		
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

function doClear(theText) {
     if (theText.value == theText.defaultValue) {
         theText.value = "";
     }
 }
 
function submitToUrl(url) {
	var shipPrice = $("#shipPrice").html();
	var customerType = $('input[name=customerType]:checked').val();
	var deliveryType = $('input[name=deliveryType]:checked').val();
	saveShoppingCartState(shipPrice, customerType, deliveryType, url);	
}

function saveShoppingCartState(shipPrice, customerType, deliveryType, url) {
	$.ajax({
	   type: "POST",
	   url: $("#form_SN").val() + "index.php?event=saveShoppingCartState",
	   data: "shipPrice=" + shipPrice + "&customerType=" + customerType + "&deliveryType=" + deliveryType,
	   success: function(msg){
	   		if (url != "") {
	   			document.f1.action = url;
				document.f1.target='_self';
				document.f1.submit();			
	   		}
	   }
	 });
}

function disableEnterKey(e)
{
	 var key;     
     if(window.event)
          key = window.event.keyCode; //IE
     else
          key = e.which; //firefox     
     
     return (key != 13);
}

function save_box_submit() {
	var email = document.getElementById('email').value;
	if(email == ''){
		alert('Epost er et obligatorisk felt.');
	} else {
		document.getElementById('formNewsletter').submit();
	}
}