<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/SigmaPictureBean.inc.php");

class SigmaPictureDao{

   function __construct(){
   }
   public function create($objSigmaPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO SigmaPicture(SigmaId,ImgDriveName,ImgAltName,IW,IH) ";
      $query.= "VALUES('".$objSigmaPictureBean->getSigmaId()."','".$objSigmaPictureBean->getImgDriveName()."','".$objSigmaPictureBean->getImgAltName()."','".$objSigmaPictureBean->getIW()."','".$objSigmaPictureBean->getIH()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objSigmaPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE SigmaPicture SET ";
      $query.="SigmaId='".$objSigmaPictureBean->getSigmaId()."',";
      $query.="ImgDriveName='".$objSigmaPictureBean->getImgDriveName()."',";
      $query.="IW='".$objSigmaPictureBean->getIW()."',";
      $query.="IH='".$objSigmaPictureBean->getIH()."',";
      $query.="ImgAltName='".$objSigmaPictureBean->getImgAltName()."' ";
      $query.="WHERE SigmaPictureId=".$objSigmaPictureBean->getSigmaPictureId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT SigmaPictureId,SigmaId,ImgDriveName,ImgAltName,IW,IH FROM SigmaPicture";
      $query.=" WHERE SigmaPictureId=".$id;
      $DB->query($query);
      $objSigmaPictureBean= new SigmaPictureBean();
      $objSigmaPictureBean->setSigmaPictureId($DB->getField("SigmaPictureId"));
      $objSigmaPictureBean->setSigmaId($DB->getField("SigmaId"));
      $objSigmaPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objSigmaPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objSigmaPictureBean->setIW($DB->getField("IW"));
      $objSigmaPictureBean->setIH($DB->getField("IH"));      

      return $objSigmaPictureBean;
   }
   
   public function readByImgDriveName($imgDriveName){
      $DB = new DB();
      $DB->connect();
      $query="SELECT SigmaPictureId,SigmaId,ImgDriveName,ImgAltName,IW,IH FROM SigmaPicture";
      $query.=" WHERE ImgDriveName='".$imgDriveName."'";
      $DB->query($query);
      $objSigmaPictureBean= new SigmaPictureBean();
      $objSigmaPictureBean->setSigmaPictureId($DB->getField("SigmaPictureId"));
      $objSigmaPictureBean->setSigmaId($DB->getField("SigmaId"));
      $objSigmaPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objSigmaPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objSigmaPictureBean->setIW($DB->getField("IW"));
      $objSigmaPictureBean->setIH($DB->getField("IH"));
      
      return $objSigmaPictureBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from SigmaPicture ";
      $query.="WHERE SigmaPictureId=".$id;
      $DB->query($query);
   }

   public function deleteByPictureAndSigmaId($SigmaId, $pictureId){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from SigmaPicture";
      $query.=" WHERE SigmaId='".$SigmaId."'";
      $query.=" AND ImgDriveName='".$pictureId."'";
      $DB->query($query);
   }
}
?>