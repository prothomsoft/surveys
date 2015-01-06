<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/CmsContentPictureBean.inc.php");

class CmsContentPictureDao{

   function __construct(){
   }
   public function create($objCmsContentPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO CmsContentPicture(CmsContentId,ImgDriveName,ImgAltName,ImgOrder, IW, IH) ";
      $query.= "VALUES('".$objCmsContentPictureBean->getCmsContentId()."','".$objCmsContentPictureBean->getImgDriveName()."','".$objCmsContentPictureBean->getImgAltName()."','".$objCmsContentPictureBean->getImgOrder()."','".$objCmsContentPictureBean->getIW()."','".$objCmsContentPictureBean->getIH()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objCmsContentPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE CmsContentPicture SET ";
      $query.="CmsContentId='".$objCmsContentPictureBean->getCmsContentId()."',";
      $query.="ImgDriveName='".$objCmsContentPictureBean->getImgDriveName()."',";
      $query.="ImgAltName='".$objCmsContentPictureBean->getImgAltName()."',";
      $query.="ImgOrder='".$objCmsContentPictureBean->getImgOrder()."',";
      $query.="IW='".$objCmsContentPictureBean->getIW()."',";
      $query.="IH='".$objCmsContentPictureBean->getIH()."'";
      $query.="WHERE CmsContentPictureId=".$objCmsContentPictureBean->getCmsContentPictureId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT CmsContentPictureId,CmsContentId,ImgDriveName,ImgAltName,ImgOrder, IW, IH FROM CmsContentPicture";
      $query.=" WHERE CmsContentPictureId=".$id;
      $DB->query($query);
      $objCmsContentPictureBean= new CmsContentPictureBean();
      $objCmsContentPictureBean->setCmsContentPictureId($DB->getField("CmsContentPictureId"));
      $objCmsContentPictureBean->setCmsContentId($DB->getField("CmsContentId"));
      $objCmsContentPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objCmsContentPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objCmsContentPictureBean->setImgOrder($DB->getField("ImgOrder"));
      $objCmsContentPictureBean->setIW($DB->getField("IW"));
      $objCmsContentPictureBean->setIH($DB->getField("IH"));      

      return $objCmsContentPictureBean;
   }
   
   public function readByImgDriveName($imgDriveName){
      $DB = new DB();
      $DB->connect();
      $query="SELECT CmsContentPictureId,CmsContentId,ImgDriveName,ImgAltName,ImgOrder, IW, IH FROM CmsContentPicture";
      $query.=" WHERE ImgDriveName='".$imgDriveName."'";
      $DB->query($query);
      $objCmsContentPictureBean= new CmsContentPictureBean();
      $objCmsContentPictureBean->setCmsContentPictureId($DB->getField("CmsContentPictureId"));
      $objCmsContentPictureBean->setCmsContentId($DB->getField("CmsContentId"));
      $objCmsContentPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objCmsContentPictureBean->setImgAltName($DB->getField("ImgAltName"));
      $objCmsContentPictureBean->setImgOrder($DB->getField("ImgOrder"));
      $objCmsContentPictureBean->setIW($DB->getField("IW"));
      $objCmsContentPictureBean->setIH($DB->getField("IH"));
      
      return $objCmsContentPictureBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from CmsContentPicture ";
      $query.="WHERE CmsContentPictureId=".$id;
      $DB->query($query);
   }

   public function deleteByPictureAndCmsContentId($CmsContentId, $pictureId){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from CmsContentPicture";
      $query.=" WHERE CmsContentId='".$CmsContentId."'";
      $query.=" AND ImgDriveName='".$pictureId."'";
      $DB->query($query);
   }
}
?>