<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/DeltaPictureBean.inc.php");

class DeltaPictureDao{

   function __construct(){
   }
   public function create($objDeltaPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO DeltaPicture(DeltaId,ImgDriveName,ImgAltName,IW,IH) ";
      $query.= "VALUES('".$objDeltaPictureBean->getDeltaId()."','".$objDeltaPictureBean->getImgDriveName()."','".$objDeltaPictureBean->getImgAltName()."','".$objDeltaPictureBean->getIW()."','".$objDeltaPictureBean->getIH()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objDeltaPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE DeltaPicture SET ";
      $query.="DeltaId='".$objDeltaPictureBean->getDeltaId()."',";
      $query.="ImgDriveName='".$objDeltaPictureBean->getImgDriveName()."',";
      $query.="IW='".$objDeltaPictureBean->getIW()."',";
      $query.="IH='".$objDeltaPictureBean->getIH()."',";
      $query.="ImgAltName='".$objDeltaPictureBean->getImgAltName()."' ";
      $query.="WHERE DeltaPictureId=".$objDeltaPictureBean->getDeltaPictureId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT DeltaPictureId,DeltaId,ImgDriveName,ImgAltName,IW,IH FROM DeltaPicture";
      $query.=" WHERE DeltaPictureId=".$id;
      $DB->query($query);
      $objDeltaPictureBean= new DeltaPictureBean();
      $objDeltaPictureBean->setDeltaPictureId($DB->getField("DeltaPictureId"));
      $objDeltaPictureBean->setDeltaId($DB->getField("DeltaId"));
      $objDeltaPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objDeltaPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objDeltaPictureBean->setIW($DB->getField("IW"));
      $objDeltaPictureBean->setIH($DB->getField("IH"));      

      return $objDeltaPictureBean;
   }
   
   public function readByImgDriveName($imgDriveName){
      $DB = new DB();
      $DB->connect();
      $query="SELECT DeltaPictureId,DeltaId,ImgDriveName,ImgAltName,IW,IH FROM DeltaPicture";
      $query.=" WHERE ImgDriveName='".$imgDriveName."'";
      $DB->query($query);
      $objDeltaPictureBean= new DeltaPictureBean();
      $objDeltaPictureBean->setDeltaPictureId($DB->getField("DeltaPictureId"));
      $objDeltaPictureBean->setDeltaId($DB->getField("DeltaId"));
      $objDeltaPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objDeltaPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objDeltaPictureBean->setIW($DB->getField("IW"));
      $objDeltaPictureBean->setIH($DB->getField("IH"));
      
      return $objDeltaPictureBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from DeltaPicture ";
      $query.="WHERE DeltaPictureId=".$id;
      $DB->query($query);
   }

   public function deleteByPictureAndDeltaId($DeltaId, $pictureId){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from DeltaPicture";
      $query.=" WHERE DeltaId='".$DeltaId."'";
      $query.=" AND ImgDriveName='".$pictureId."'";
      $DB->query($query);
   }
}
?>