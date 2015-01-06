<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/ClubPictureBean.inc.php");

class ClubPictureDao{

   function __construct(){
   }
   public function create($objClubPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO ClubPicture(ClubId,ImgDriveName,ImgAltName,IW,IH) ";
      $query.= "VALUES('".$objClubPictureBean->getClubId()."','".$objClubPictureBean->getImgDriveName()."','".$objClubPictureBean->getImgAltName()."','".$objClubPictureBean->getIW()."','".$objClubPictureBean->getIH()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objClubPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE ClubPicture SET ";
      $query.="ClubId='".$objClubPictureBean->getClubId()."',";
      $query.="ImgDriveName='".$objClubPictureBean->getImgDriveName()."',";
      $query.="ImgAltName='".$objClubPictureBean->getImgAltName()."',";
      $query.="IW='".$objClubPictureBean->getIW()."',";
      $query.="IH='".$objClubPictureBean->getIH()."' ";
      $query.="WHERE ClubPictureId=".$objClubPictureBean->getClubPictureId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT ClubPictureId,ClubId,ImgDriveName,ImgAltName,IW,IH FROM ClubPicture";
      $query.=" WHERE ClubPictureId=".$id;
      $DB->query($query);
      $objClubPictureBean= new ClubPictureBean();
      $objClubPictureBean->setClubPictureId($DB->getField("ClubPictureId"));
      $objClubPictureBean->setClubId($DB->getField("ClubId"));
      $objClubPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objClubPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objClubPictureBean->setIW($DB->getField("IW"));
      $objClubPictureBean->setIH($DB->getField("IH"));      

      return $objClubPictureBean;
   }
   
   public function readByImgDriveName($imgDriveName){
      $DB = new DB();
      $DB->connect();
      $query="SELECT ClubPictureId,ClubId,ImgDriveName,ImgAltName,IW,IH FROM ClubPicture";
      $query.=" WHERE ImgDriveName='".$imgDriveName."'";
      $DB->query($query);
      $objClubPictureBean= new ClubPictureBean();
      $objClubPictureBean->setClubPictureId($DB->getField("ClubPictureId"));
      $objClubPictureBean->setClubId($DB->getField("ClubId"));
      $objClubPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objClubPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objClubPictureBean->setIW($DB->getField("IW"));
      $objClubPictureBean->setIH($DB->getField("IH"));
      
      return $objClubPictureBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from ClubPicture ";
      $query.="WHERE ClubPictureId=".$id;
      $DB->query($query);
   }

   public function deleteByPictureAndClubId($ClubId, $pictureId){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from ClubPicture";
      $query.=" WHERE ClubId='".$ClubId."'";
      $query.=" AND ImgDriveName='".$pictureId."'";
      $DB->query($query);
   }
}
?>