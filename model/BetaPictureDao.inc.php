<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/BetaPictureBean.inc.php");

class BetaPictureDao{

   function __construct(){
   }
   public function create($objBetaPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO BetaPicture(BetaId,ImgDriveName,ImgAltName,IW,IH) ";
      $query.= "VALUES('".$objBetaPictureBean->getBetaId()."','".$objBetaPictureBean->getImgDriveName()."','".$objBetaPictureBean->getImgAltName()."','".$objBetaPictureBean->getIW()."','".$objBetaPictureBean->getIH()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objBetaPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE BetaPicture SET ";
      $query.="BetaId='".$objBetaPictureBean->getBetaId()."',";
      $query.="ImgDriveName='".$objBetaPictureBean->getImgDriveName()."',";
      $query.="ImgAltName='".$objBetaPictureBean->getImgAltName()."',";
      $query.="IW='".$objBetaPictureBean->getIW()."',";
      $query.="IH='".$objBetaPictureBean->getIH()."' ";
      $query.="WHERE BetaPictureId=".$objBetaPictureBean->getBetaPictureId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT BetaPictureId,BetaId,ImgDriveName,ImgAltName,IW,IH FROM BetaPicture";
      $query.=" WHERE BetaPictureId=".$id;
      $DB->query($query);
      $objBetaPictureBean= new BetaPictureBean();
      $objBetaPictureBean->setBetaPictureId($DB->getField("BetaPictureId"));
      $objBetaPictureBean->setBetaId($DB->getField("BetaId"));
      $objBetaPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objBetaPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objBetaPictureBean->setIW($DB->getField("IW"));
      $objBetaPictureBean->setIH($DB->getField("IH"));      

      return $objBetaPictureBean;
   }
   
   public function readByImgDriveName($imgDriveName){
      $DB = new DB();
      $DB->connect();
      $query="SELECT BetaPictureId,BetaId,ImgDriveName,ImgAltName,IW,IH FROM BetaPicture";
      $query.=" WHERE ImgDriveName='".$imgDriveName."'";
      $DB->query($query);
      $objBetaPictureBean= new BetaPictureBean();
      $objBetaPictureBean->setBetaPictureId($DB->getField("BetaPictureId"));
      $objBetaPictureBean->setBetaId($DB->getField("BetaId"));
      $objBetaPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objBetaPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objBetaPictureBean->setIW($DB->getField("IW"));
      $objBetaPictureBean->setIH($DB->getField("IH"));
      
      return $objBetaPictureBean;
   }
   
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from BetaPicture ";
      $query.="WHERE BetaPictureId=".$id;
      $DB->query($query);
   }

   public function deleteByPictureAndBetaId($BetaId, $pictureId){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from BetaPicture";
      $query.=" WHERE BetaId='".$BetaId."'";
      $query.=" AND ImgDriveName='".$pictureId."'";
      $DB->query($query);
   }
}
?>