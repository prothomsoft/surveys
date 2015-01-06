<?php

class ProducerBean{
   private $ProducerId;
   private $Name;
   
   public function setProducerId($val){
      $this->ProducerId=$val;
   }

   public function getProducerId(){
      return $this->ProducerId;
   }

   public function setName($val){
      $this->Name=$val;
   }

   public function getName(){
      return $this->Name;
   }
}
?>