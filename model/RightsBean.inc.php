<?php
class RightsBean{
   private $RightsId;
   private $Label;
   private $Level;

   public function setRightsId($val){
      $this->RightsId=$val;
   }

   public function getRightsId(){
      return $this->RightsId;
   }

   public function setLabel($val){
      $this->Label=$val;
   }

   public function getLabel(){
      return $this->Label;
   }
   
   public function setLevel($val){
      $this->Level=$val;
   }

   public function getLevel(){
      return $this->Level;
   }
   
}
?>