<?php

/** 
 * ShoppingCart Class 
 */
class shoppingCart
{
   private $items;
		 	 
   function __construct($arrShoppingCartItems=self::arrShoppingCartItems) {
      	$this->items = $arrShoppingCartItems;
   }
    
   public function addItems($product_id, $qty) {
   		$this->items[$product_id] += $qty; 
   }
   
   public function getCartContent() { 
       return $this->items; 
   }
   
   public function updateItems($product_id, $qty) { 
       if(array_key_exists($product_id, $this->items)) 
       { 
          if($this->items[$product_id]>$qty) 
          { 
             $this->items[$product_id]-=($this->items[$product_id]-$qty); 
          } 
          if($this->items[product_id]<$qty) 
          { 
             $this->items[$product_id]+=abs($this->items[$product_id]-$qty); 
          } 
          if($qty==0) 
          { 
             unset($this->items[product_id]); 
          }
       } 
    } 
    
    function removeItem($product_id) { 
       if(array_key_exists($product_id, $this->items)) 
       { 
          unset($this->items[$product_id]); 
       } 
    }
}
?>