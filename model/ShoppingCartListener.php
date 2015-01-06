<?php
require_once("components/session.inc.php");
require_once("components/shoppingcart.inc.php");

class model_ShoppingCartListener extends MachII_framework_Listener
{
    function configure() {}
	
    function addToCart(&$event) {
		$objAppSession = new AppSession();
		$arrShoppingCartItems = $objAppSession->getSession("ShoppingCartItems");
		
		
		if (count($arrShoppingCartItems) == 0) {
			$this->clearCart();
		}
				
		$objShoppingCart = new shoppingCart($arrShoppingCartItems);
		$productId = $event->getArg('id1');
		$objShoppingCart->addItems("".$productId."", "1");
		 	
		$arrShoppingCartItems = $objShoppingCart->getCartContent();
		$objAppSession->setSession("ShoppingCartItems",$arrShoppingCartItems);
		$objAppSession->setSession("BackProductId",$productId);
		
		$SN = $objAppSession->getSession("SN");
		
		header("Location: ".$SN."shoppingCart.html");
	}
	
	function removeFromCart(&$event) {
		$objAppSession = new AppSession();
		$arrShoppingCartItems = $objAppSession->getSession("ShoppingCartItems");
		$objShoppingCart = new shoppingCart($arrShoppingCartItems);
		$productId = $event->getArg('id1');
		
		if($productId != "") {
			$objShoppingCart->removeItem("".$productId."");
			$arrShoppingCartItems = $objShoppingCart->getCartContent(); 	
			if (count($arrShoppingCartItems) == 0) {
				$objAppSession = new AppSession();
				$arrShoppingCartItems = array(); 
			}
			$objAppSession->setSession("ShoppingCartItems",$arrShoppingCartItems);
		}
	} 
	
	function clearCart(&$event) {
		$objAppSession = new AppSession();
		$arrShoppingCartItems = array(); 	
		$objAppSession->setSession("ShoppingCartItems",$arrShoppingCartItems);
		$objAppSession->setSession("totalBasketItems",0);
		$objAppSession->setSession("cartTotal",0);
		$objAppSession->setSession("shipPrice","");
		$objAppSession->setSession("deliveryType","");
		$objAppSession->setSession("customerType","");						
	} 
	
	function updateCart(&$event) {
		
		$arrProductId = $event->getArg('arrProductId');
		
		if(count($arrProductId) != 0) {

			$objAppSession = new AppSession();
			$arrShoppingCartItems = $objAppSession->getSession("ShoppingCartItems");
			$objShoppingCart = new shoppingCart($arrShoppingCartItems);
			
			foreach ($arrProductId as $i => $productId) {
				
				//echo $productId;
	
				$arrQuantity = $event->getArg('arrQuantity');
				$quantity = @$arrQuantity[$i];
				
				if (isset($productId)) {
					$objShoppingCart->updateItems("".$productId."", $quantity); 
				}
			}
			
			$arrShoppingCartItems = $objShoppingCart->getCartContent();
			 	
			$objAppSession->setSession("ShoppingCartItems",$arrShoppingCartItems);
		}
	} 
	
	function findProductsList(&$event) {
		
		$objAppSession = new AppSession();
		$arrShoppingCartItems = $objAppSession->getSession("ShoppingCartItems");	

		if (count($arrShoppingCartItems) != 0) {
			foreach($arrShoppingCartItems as $key => $value) 
			{ 
				$listId .= ",'" . $key . "'";
			} 
			$listId = substr($listId, 1);
			
			$event->setArg('listId',$listId);
		}
	}
	
	function saveShoppingCartState(&$event) {
		$shipPrice = $event->getArg("shipPrice");
		$customerType = $event->getArg("customerType");
		$deliveryType = $event->getArg("deliveryType");
		$objAppSession = new AppSession();
		$objAppSession->setSession("shipPrice",$shipPrice);
		$objAppSession->setSession("customerType",$customerType);
		$objAppSession->setSession("deliveryType",$deliveryType);
		$responseJSON = "data saved";
		$event->setArg("responseJSON", $responseJSON);
	}
	
	function saveTester(&$event) {
		$tester = $event->getArg("tester");
		$objAppSession = new AppSession();
		$objAppSession->setSession("tester",$tester);
		$responseJSON = "data saved";
		$event->setArg("responseJSON", $responseJSON);
	}
	
	function savePerfumetka1(&$event) {
		$perfumetka1 = $event->getArg("perfumetka1");
		$perfumetka1_wysylka = $event->getArg("perfumetka1_wysylka");
		$objAppSession = new AppSession();
		$objAppSession->setSession("perfumetka1",$perfumetka1);
		$objAppSession->setSession("perfumetka1_wysylka",$perfumetka1_wysylka);
		$responseJSON = "data saved";
		$event->setArg("responseJSON", $responseJSON);
	}
	
	function savePerfumetka2(&$event) {
		$perfumetka2 = $event->getArg("perfumetka2");
		$perfumetka2_wysylka = $event->getArg("perfumetka2_wysylka");
		$objAppSession = new AppSession();
		$objAppSession->setSession("perfumetka2",$perfumetka2);
		$objAppSession->setSession("perfumetka2_wysylka",$perfumetka2_wysylka);
		$responseJSON = "data saved";
		$event->setArg("responseJSON", $responseJSON);
	}
	
}
?>