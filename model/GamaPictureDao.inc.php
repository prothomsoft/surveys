<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/GamaPictureBean.inc.php");

class GamaPictureDao{

   function __construct(){
   }
   public function create($objGamaPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO GamaPicture(GamaId,ImgDriveName,ImgAltName,IW,IH) ";
      $query.= "VALUES('".$objGamaPictureBean->getGamaId()."','".$objGamaPictureBean->getImgDriveName()."','".$objGamaPictureBean->getImgAltName()."','".$objGamaPictureBean->getIW()."','".$objGamaPictureBean->getIH()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objGamaPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE GamaPicture SET ";
      $query.="GamaId='".$objGamaPictureBean->getGamaId()."',";
      $query.="ImgDriveName='".$objGamaPictureBean->getImgDriveName()."',";
      $query.="ImgAltName='".$objGamaPictureBean->getImgAltName()."',";
      $query.="IW='".$objGamaPictureBean->getIW()."',";
      $query.="IH='".$objGamaPictureBean->getIH()."' ";
      $query.="WHERE GamaPictureId=".$objGamaPictureBean->getGamaPictureId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT GamaPictureId,GamaId,ImgDriveName,ImgAltName,IW,IH FROM GamaPicture";
      $query.=" WHERE GamaPictureId=".$id;
      $DB->query($query);
      $objGamaPictureBean= new GamaPictureBean();
      $objGamaPictureBean->setGamaPictureId($DB->getField("GamaPictureId"));
      $objGamaPictureBean->setGamaId($DB->getField("GamaId"));
      $objGamaPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objGamaPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objGamaPictureBean->setIW($DB->getField("IW"));
      $objGamaPictureBean->setIH($DB->getField("IH"));      

      return $objGamaPictureBean;
   }
   
   public function readByImgDriveName($imgDriveName){
      $DB = new DB();
      $DB->connect();
      $query="SELECT GamaPictureId,GamaId,ImgDriveName,ImgAltName,IW,IH FROM GamaPicture";
      $query.=" WHERE ImgDriveName='".$imgDriveName."'";
      $DB->query($query);
      $objGamaPictureBean= new GamaPictureBean();
      $objGamaPictureBean->setGamaPictureId($DB->getField("GamaPictureId"));
      $objGamaPictureBean->setGamaId($DB->getField("GamaId"));
      $objGamaPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objGamaPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objGamaPictureBean->setIW($DB->getField("IW"));
      $objGamaPictureBean->setIH($DB->getField("IH"));  
      
      return $objGamaPictureBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from GamaPicture ";
      $query.="WHERE GamaPictureId=".$id;
      $DB->query($query);
   }

   public function deleteByPictureAndGamaId($GamaId, $pictureId){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from GamaPicture";
      $query.=" WHERE GamaId='".$GamaId."'";
      $query.=" AND ImgDriveName='".$pictureId."'";
      $DB->query($query);
   }
}
?>