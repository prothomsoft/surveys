<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/AlfaPictureBean.inc.php");

class AlfaPictureDao{

   function __construct(){
   }
   public function create($objAlfaPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO AlfaPicture(AlfaId,ImgDriveName,ImgAltName,IW,IH) ";
      $query.= "VALUES('".$objAlfaPictureBean->getAlfaId()."','".$objAlfaPictureBean->getImgDriveName()."','".$objAlfaPictureBean->getImgAltName()."','".$objAlfaPictureBean->getIW()."','".$objAlfaPictureBean->getIH()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objAlfaPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE AlfaPicture SET ";
      $query.="AlfaId='".$objAlfaPictureBean->getAlfaId()."',";
      $query.="ImgDriveName='".$objAlfaPictureBean->getImgDriveName()."',";
      $query.="IW='".$objAlfaPictureBean->getIW()."',";
      $query.="IH='".$objAlfaPictureBean->getIH()."',";
      $query.="ImgAltName='".$objAlfaPictureBean->getImgAltName()."' ";
      $query.="WHERE AlfaPictureId=".$objAlfaPictureBean->getAlfaPictureId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT AlfaPictureId,AlfaId,ImgDriveName,ImgAltName,IW,IH FROM AlfaPicture";
      $query.=" WHERE AlfaPictureId=".$id;
      $DB->query($query);
      $objAlfaPictureBean= new AlfaPictureBean();
      $objAlfaPictureBean->setAlfaPictureId($DB->getField("AlfaPictureId"));
      $objAlfaPictureBean->setAlfaId($DB->getField("AlfaId"));
      $objAlfaPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objAlfaPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objAlfaPictureBean->setIW($DB->getField("IW"));
      $objAlfaPictureBean->setIH($DB->getField("IH"));      

      return $objAlfaPictureBean;
   }
   
   public function readByImgDriveName($imgDriveName){
      $DB = new DB();
      $DB->connect();
      $query="SELECT AlfaPictureId,AlfaId,ImgDriveName,ImgAltName,IW,IH FROM AlfaPicture";
      $query.=" WHERE ImgDriveName='".$imgDriveName."'";
      $DB->query($query);
      $objAlfaPictureBean= new AlfaPictureBean();
      $objAlfaPictureBean->setAlfaPictureId($DB->getField("AlfaPictureId"));
      $objAlfaPictureBean->setAlfaId($DB->getField("AlfaId"));
      $objAlfaPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objAlfaPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objAlfaPictureBean->setIW($DB->getField("IW"));
      $objAlfaPictureBean->setIH($DB->getField("IH"));
      
      return $objAlfaPictureBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from AlfaPicture ";
      $query.="WHERE AlfaPictureId=".$id;
      $DB->query($query);
   }

   public function deleteByPictureAndAlfaId($AlfaId, $pictureId){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from AlfaPicture";
      $query.=" WHERE AlfaId='".$AlfaId."'";
      $query.=" AND ImgDriveName='".$pictureId."'";
      $DB->query($query);
   }
}
?>