<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/ProductPictureBean.inc.php");

class ProductPictureDao{

   function __construct(){
   }
   public function create($objProductPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO ProductPicture(ProductId,ImgDriveName,ImgFileName,ImgAlt,ImgType,BigImgDriveName,BigImgFileName,BigImgAlt,BigImgType) ";
      $query.= "VALUES('".$objProductPictureBean->getProductId()."','".$objProductPictureBean->getImgDriveName()."','".$objProductPictureBean->getImgFileName()."','".$objProductPictureBean->getImgAlt()."','".$objProductPictureBean->getImgType()."','".$objProductPictureBean->getBigImgDriveName()."','".$objProductPictureBean->getBigImgFileName()."','".$objProductPictureBean->getBigImgAlt()."','".$objProductPictureBean->getBigImgType()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objProductPictureBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE ProductPicture SET ";
      $query.="ProductId='".$objProductPictureBean->getProductId()."',";
      $query.="ImgDriveName='".$objProductPictureBean->getImgDriveName()."',";
      $query.="ImgFileName='".$objProductPictureBean->getImgFileName()."',";
      $query.="ImgAlt='".$objProductPictureBean->getImgAlt()."',";
      $query.="ImgType='".$objProductPictureBean->getImgType()."',";
	  $query.="BigImgDriveName='".$objProductPictureBean->getBigImgDriveName()."',";
      $query.="BigImgFileName='".$objProductPictureBean->getBigImgFileName()."',";
      $query.="BigImgAlt='".$objProductPictureBean->getBigImgAlt()."',";
      $query.="BigImgType='".$objProductPictureBean->getBigImgType()."' ";
      $query.="WHERE ProductPictureId=".$objProductPictureBean->getProductPictureId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT ProductPictureId,ProductId,ImgDriveName,ImgFileName,ImgAlt,ImgType,BigImgDriveName,BigImgFileName,BigImgAlt,BigImgType FROM ProductPicture";
      $query.=" WHERE ProductPictureId=".$id;
      $DB->query($query);
      $objProductPictureBean= new ProductPictureBean();
      $objProductPictureBean->setProductPictureId($DB->getField("ProductPictureId"));
      $objProductPictureBean->setProductId($DB->getField("ProductId"));
      $objProductPictureBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objProductPictureBean->setImgFileName($DB->getField("ImgFileName"));
      $objProductPictureBean->setImgAlt($DB->getField("ImgAlt"));
      $objProductPictureBean->setImgType($DB->getField("ImgType"));
      $objProductPictureBean->setBigImgDriveName($DB->getField("BigImgDriveName"));
      $objProductPictureBean->setBigImgFileName($DB->getField("BigImgFileName"));
      $objProductPictureBean->setBigImgAlt($DB->getField("BigImgAlt"));
      $objProductPictureBean->setBigImgType($DB->getField("BigImgType"));

      return $objProductPictureBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from ProductPicture ";
      $query.="WHERE ProductPictureId=".$id;
      $DB->query($query);
   }

   public function deleteByPictureAndProductId($productId, $pictureId){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from ProductPicture";
      $query.=" WHERE ProductId='".$productId."'";
      $query.=" AND ImgDriveName='".$pictureId."'";
      $DB->query($query);
   }
}
?>