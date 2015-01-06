<?php
require_once(dirname(__FILE__)."/RightsDao.inc.php");
class RightsUserBean{
   private $RightsId;
   private $UserId;
   private $Right;
   
   public function setRightsId($val){
      $this->RightsId=$val;
   }

   public function getRightsId(){
      return $this->RightsId;
   }
   
   public function getRight(){
      if(!is_object($this->Right)){
         $objRightsDao = new RightsDao();
         $objRightsBean = $objRightsDao->read($this->getRightsId());
         $this->Right = $objRightsBean;
      }
      return $this->Right;
   }   

   public function setUserId($val){
      $this->UserId=$val;
   }

   public function getUserId(){
      return $this->UserId;
   }
}
?>