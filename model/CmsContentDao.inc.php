<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/CmsContentBean.inc.php");

/**
 * CmsContentDAO
 * 
 * database access class - CRUD methods for table CmsContent
 */
class CmsContentDao{

   function __construct(){
   }
   public function create($objCmsContentBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO CmsContent(CmsCategoryId,Name,NameTransEN,NameTransDE,NameTransRU,SeoName,Keyword,Description,ShortDescription,ShortDescriptionTransEN,ShortDescriptionTransDE,ShortDescriptionTransRU,LongDescription,LongDescriptionTransEN,LongDescriptionTransDE,LongDescriptionTransRU,UpdateDate,CmsContentOrder,Status,ImgDriveName,Om1,Om2,Om3,Om4,Om5,Om6,Om7,Om8,Om9,Om10,Om11,Om12,Om13,Om14,Om15,Om16,Om17,Om18) ";
      $query.= "VALUES('".$objCmsContentBean->getCmsCategoryId()."','".$objCmsContentBean->getName()."','".$objCmsContentBean->getNameTransEN()."','".$objCmsContentBean->getNameTransDE()."','".$objCmsContentBean->getNameTransRU()."','".$objCmsContentBean->getSeoName()."','".$objCmsContentBean->getKeyword()."','".$objCmsContentBean->getDescription()."','".$objCmsContentBean->getShortDescription()."','".$objCmsContentBean->getShortDescriptionTransEN()."','".$objCmsContentBean->getShortDescriptionTransDE()."','".$objCmsContentBean->getShortDescriptionTransRU()."','".$objCmsContentBean->getLongDescription()."','".$objCmsContentBean->getLongDescriptionTransEN()."','".$objCmsContentBean->getLongDescriptionTransDE()."','".$objCmsContentBean->getLongDescriptionTransRU()."','".$objCmsContentBean->getUpdateDate()."','".$objCmsContentBean->getCmsContentOrder()."','".$objCmsContentBean->getStatus()."','".$objCmsContentBean->getImgDriveName()."','".$objCmsContentBean->getOm1()."','".$objCmsContentBean->getOm2()."','".$objCmsContentBean->getOm3()."','".$objCmsContentBean->getOm4()."','".$objCmsContentBean->getOm5()."','".$objCmsContentBean->getOm6()."','".$objCmsContentBean->getOm7()."','".$objCmsContentBean->getOm8()."','".$objCmsContentBean->getOm9()."','".$objCmsContentBean->getOm10()."','".$objCmsContentBean->getOm11()."','".$objCmsContentBean->getOm12()."','".$objCmsContentBean->getOm13()."','".$objCmsContentBean->getOm14()."','".$objCmsContentBean->getOm15()."','".$objCmsContentBean->getOm16()."','".$objCmsContentBean->getOm17()."','".$objCmsContentBean->getOm18()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objCmsContentBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE CmsContent SET ";
      $query.="CmsCategoryId='".$objCmsContentBean->getCmsCategoryId()."',";
      $query.="Name='".$objCmsContentBean->getName()."',";
      $query.="NameTransEN='".$objCmsContentBean->getNameTransEN()."',";
      $query.="NameTransDE='".$objCmsContentBean->getNameTransDE()."',";
      $query.="NameTransRU='".$objCmsContentBean->getNameTransRU()."',";
      $query.="SeoName='".$objCmsContentBean->getSeoName()."',";
      $query.="Keyword='".$objCmsContentBean->getKeyword()."',";
      $query.="Description='".$objCmsContentBean->getDescription()."',";
      $query.="ShortDescription='".$objCmsContentBean->getShortDescription()."',";
      $query.="ShortDescriptionTransEN='".$objCmsContentBean->getShortDescriptionTransEN()."',";
      $query.="ShortDescriptionTransDE='".$objCmsContentBean->getShortDescriptionTransDE()."',";
      $query.="ShortDescriptionTransRU='".$objCmsContentBean->getShortDescriptionTransRU()."',";
      $query.="LongDescription='".$objCmsContentBean->getLongDescription()."',";
      $query.="LongDescriptionTransEN='".$objCmsContentBean->getLongDescriptionTransEN()."',";
      $query.="LongDescriptionTransDE='".$objCmsContentBean->getLongDescriptionTransDE()."',";
      $query.="LongDescriptionTransRU='".$objCmsContentBean->getLongDescriptionTransRU()."',";
      $query.="UpdateDate='".$objCmsContentBean->getUpdateDate()."',";
      $query.="CmsContentOrder='".$objCmsContentBean->getCmsContentOrder()."',";
      $query.="Status='".$objCmsContentBean->getStatus()."',";
      $query.="ImgDriveName='".$objCmsContentBean->getImgDriveName()."',";
      $query.="Om1='".$objCmsContentBean->getOm1()."',";
      $query.="Om2='".$objCmsContentBean->getOm2()."',";
      $query.="Om3='".$objCmsContentBean->getOm3()."',";
      $query.="Om4='".$objCmsContentBean->getOm4()."',";
      $query.="Om5='".$objCmsContentBean->getOm5()."',";
      $query.="Om6='".$objCmsContentBean->getOm6()."',";
      $query.="Om7='".$objCmsContentBean->getOm7()."',";
      $query.="Om8='".$objCmsContentBean->getOm8()."',";
      $query.="Om9='".$objCmsContentBean->getOm9()."',";
      $query.="Om10='".$objCmsContentBean->getOm10()."',";
      $query.="Om11='".$objCmsContentBean->getOm11()."',";
      $query.="Om12='".$objCmsContentBean->getOm12()."',";
      $query.="Om13='".$objCmsContentBean->getOm13()."',";
      $query.="Om14='".$objCmsContentBean->getOm14()."',";
      $query.="Om15='".$objCmsContentBean->getOm15()."',";
      $query.="Om16='".$objCmsContentBean->getOm16()."',";
      $query.="Om17='".$objCmsContentBean->getOm17()."',";
      $query.="Om18='".$objCmsContentBean->getOm18()."' ";
      $query.="WHERE CmsContentId=".$objCmsContentBean->getCmsContentId()."";
      
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT CmsContentId,CmsCategoryId,Name,NameTransEN,NameTransDE,NameTransRU,SeoName,Keyword,Description,ShortDescription,ShortDescriptionTransEN,ShortDescriptionTransDE,ShortDescriptionTransRU,LongDescription,LongDescriptionTransEN,LongDescriptionTransDE,LongDescriptionTransRU,UpdateDate,CmsContentOrder,Status,ImgDriveName,Om1,Om2,Om3,Om4,Om5,Om6,Om7,Om8,Om9,Om10,Om11,Om12,Om13,Om14,Om15,Om16,Om17,Om18 FROM CmsContent";
      $query.=" WHERE CmsContentId=".$id;
      $DB->query($query);
      $objCmsContentBean= new CmsContentBean();
      $objCmsContentBean->setCmsContentId($DB->getField("CmsContentId"));
      $objCmsContentBean->setCmsCategoryId($DB->getField("CmsCategoryId"));
      $objCmsContentBean->setName($DB->getField("Name"));
      $objCmsContentBean->setNameTransEN($DB->getField("NameTransEN"));
      $objCmsContentBean->setNameTransDE($DB->getField("NameTransDE"));
      $objCmsContentBean->setNameTransRU($DB->getField("NameTransRU"));
      $objCmsContentBean->setSeoName($DB->getField("SeoName"));
      $objCmsContentBean->setKeyword($DB->getField("Keyword"));
      $objCmsContentBean->setDescription($DB->getField("Description"));
      $objCmsContentBean->setShortDescription($DB->getField("ShortDescription"));
      $objCmsContentBean->setShortDescriptionTransEN($DB->getField("ShortDescriptionTransEN"));
      $objCmsContentBean->setShortDescriptionTransDE($DB->getField("ShortDescriptionTransDE"));
      $objCmsContentBean->setShortDescriptionTransRU($DB->getField("ShortDescriptionTransRU"));
      $objCmsContentBean->setLongDescription($DB->getField("LongDescription"));
      $objCmsContentBean->setLongDescriptionTransEN($DB->getField("LongDescriptionTransEN"));
      $objCmsContentBean->setLongDescriptionTransDE($DB->getField("LongDescriptionTransDE"));
      $objCmsContentBean->setLongDescriptionTransRU($DB->getField("LongDescriptionTransRU"));
      $objCmsContentBean->setUpdateDate($DB->getField("UpdateDate"));
      $objCmsContentBean->setCmsContentOrder($DB->getField("CmsContentOrder"));
      $objCmsContentBean->setStatus($DB->getField("Status"));
      $objCmsContentBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objCmsContentBean->setOm1($DB->getField("Om1"));
      $objCmsContentBean->setOm2($DB->getField("Om2"));
      $objCmsContentBean->setOm3($DB->getField("Om3"));
      $objCmsContentBean->setOm4($DB->getField("Om4"));
      $objCmsContentBean->setOm5($DB->getField("Om5"));
      $objCmsContentBean->setOm6($DB->getField("Om6"));
      $objCmsContentBean->setOm7($DB->getField("Om7"));
      $objCmsContentBean->setOm8($DB->getField("Om8"));
      $objCmsContentBean->setOm9($DB->getField("Om9"));
      $objCmsContentBean->setOm10($DB->getField("Om10"));
      $objCmsContentBean->setOm11($DB->getField("Om11"));
      $objCmsContentBean->setOm12($DB->getField("Om12"));
      $objCmsContentBean->setOm13($DB->getField("Om13"));
      $objCmsContentBean->setOm14($DB->getField("Om14"));
      $objCmsContentBean->setOm15($DB->getField("Om15"));
      $objCmsContentBean->setOm16($DB->getField("Om16"));
      $objCmsContentBean->setOm17($DB->getField("Om17"));
      $objCmsContentBean->setOm18($DB->getField("Om18"));
      
      return $objCmsContentBean;
   }
   
   public function readByCmsCategoryId($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT CmsContentId,CmsCategoryId,Name,NameTransEN,NameTransDE,NameTransRU,SeoName,Keyword,Description,ShortDescription,ShortDescriptionTransEN,ShortDescriptionTransDE,ShortDescriptionTransRU,LongDescription,LongDescriptionTransEN,LongDescriptionTransDE,LongDescriptionTransRU,UpdateDate,CmsContentOrder,Status,ImgDriveName,Om1,Om2,Om3,Om4,Om5,Om6,Om7,Om8,Om9,Om10,Om11,Om12,Om13,Om14,Om15,Om16,Om17,Om18 FROM CmsContent";
      $query.=" WHERE CmsCategoryId=".$id;
      $DB->query($query);
      $objCmsContentBean= new CmsContentBean();
      $objCmsContentBean->setCmsContentId($DB->getField("CmsContentId"));
      $objCmsContentBean->setCmsCategoryId($DB->getField("CmsCategoryId"));
      $objCmsContentBean->setName($DB->getField("Name"));
      $objCmsContentBean->setNameTransEN($DB->getField("NameTransEN"));
      $objCmsContentBean->setNameTransDE($DB->getField("NameTransDE"));
      $objCmsContentBean->setNameTransRU($DB->getField("NameTransRU"));
      $objCmsContentBean->setSeoName($DB->getField("SeoName"));
      $objCmsContentBean->setKeyword($DB->getField("Keyword"));
      $objCmsContentBean->setDescription($DB->getField("Description"));
      $objCmsContentBean->setShortDescription($DB->getField("ShortDescription"));
      $objCmsContentBean->setShortDescriptionTransEN($DB->getField("ShortDescriptionTransEN"));
      $objCmsContentBean->setShortDescriptionTransDE($DB->getField("ShortDescriptionTransDE"));
      $objCmsContentBean->setShortDescriptionTransRU($DB->getField("ShortDescriptionTransRU"));
      $objCmsContentBean->setLongDescription($DB->getField("LongDescription"));
      $objCmsContentBean->setLongDescriptionTransEN($DB->getField("LongDescriptionTransEN"));
      $objCmsContentBean->setLongDescriptionTransDE($DB->getField("LongDescriptionTransDE"));
      $objCmsContentBean->setLongDescriptionTransRU($DB->getField("LongDescriptionTransRU"));
      $objCmsContentBean->setUpdateDate($DB->getField("UpdateDate"));
      $objCmsContentBean->setCmsContentOrder($DB->getField("CmsContentOrder"));
      $objCmsContentBean->setStatus($DB->getField("Status"));
      $objCmsContentBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objCmsContentBean->setOm1($DB->getField("Om1"));
      $objCmsContentBean->setOm2($DB->getField("Om2"));
      $objCmsContentBean->setOm3($DB->getField("Om3"));
      $objCmsContentBean->setOm4($DB->getField("Om4"));
      $objCmsContentBean->setOm5($DB->getField("Om5"));
      $objCmsContentBean->setOm6($DB->getField("Om6"));
      $objCmsContentBean->setOm7($DB->getField("Om7"));
      $objCmsContentBean->setOm8($DB->getField("Om8"));
      $objCmsContentBean->setOm9($DB->getField("Om9"));
      $objCmsContentBean->setOm10($DB->getField("Om10"));
      $objCmsContentBean->setOm11($DB->getField("Om11"));
      $objCmsContentBean->setOm12($DB->getField("Om12"));
      $objCmsContentBean->setOm13($DB->getField("Om13"));
      $objCmsContentBean->setOm14($DB->getField("Om14"));
      $objCmsContentBean->setOm15($DB->getField("Om15"));
      $objCmsContentBean->setOm16($DB->getField("Om16"));
      $objCmsContentBean->setOm17($DB->getField("Om17"));
      $objCmsContentBean->setOm18($DB->getField("Om18"));
      
      return $objCmsContentBean;
   }
   
   public function readByItemSeo($ItemSeo){
      $DB = new DB();
      $DB->connect();
      $query="SELECT CmsContentId,CmsCategoryId,Name,NameTransEN,NameTransDE,NameTransRU,SeoName,Keyword,Description,ShortDescription,ShortDescriptionTransEN,ShortDescriptionTransDE,ShortDescriptionTransRU,LongDescription,LongDescriptionTransEN,LongDescriptionTransDE,LongDescriptionTransRU,UpdateDate,CmsContentOrder,Status,ImgDriveName,Om1,Om2,Om3,Om4,Om5,Om6,Om7,Om8,Om9,Om10,Om11,Om12,Om13,Om14,Om15,Om16,Om17,Om18 FROM CmsContent";
      $query.=" WHERE SeoName='".$ItemSeo."'";
      $DB->query($query);
      $objCmsContentBean= new CmsContentBean();
      $objCmsContentBean->setCmsContentId($DB->getField("CmsContentId"));
      $objCmsContentBean->setCmsCategoryId($DB->getField("CmsCategoryId"));
      $objCmsContentBean->setName($DB->getField("Name"));
      $objCmsContentBean->setNameTransEN($DB->getField("NameTransEN"));
      $objCmsContentBean->setNameTransDE($DB->getField("NameTransDE"));
      $objCmsContentBean->setNameTransRU($DB->getField("NameTransRU"));
      $objCmsContentBean->setSeoName($DB->getField("SeoName"));
      $objCmsContentBean->setKeyword($DB->getField("Keyword"));
      $objCmsContentBean->setDescription($DB->getField("Description"));
      $objCmsContentBean->setShortDescription($DB->getField("ShortDescription"));
      $objCmsContentBean->setShortDescriptionTransEN($DB->getField("ShortDescriptionTransEN"));
      $objCmsContentBean->setShortDescriptionTransDE($DB->getField("ShortDescriptionTransDE"));
      $objCmsContentBean->setShortDescriptionTransRU($DB->getField("ShortDescriptionTransRU"));
      $objCmsContentBean->setLongDescription($DB->getField("LongDescription"));
      $objCmsContentBean->setLongDescriptionTransEN($DB->getField("LongDescriptionTransEN"));
      $objCmsContentBean->setLongDescriptionTransDE($DB->getField("LongDescriptionTransDE"));
      $objCmsContentBean->setLongDescriptionTransRU($DB->getField("LongDescriptionTransRU"));
      $objCmsContentBean->setUpdateDate($DB->getField("UpdateDate"));
      $objCmsContentBean->setCmsContentOrder($DB->getField("CmsContentOrder"));
      $objCmsContentBean->setStatus($DB->getField("Status"));
      $objCmsContentBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objCmsContentBean->setOm1($DB->getField("Om1"));
      $objCmsContentBean->setOm2($DB->getField("Om2"));
      $objCmsContentBean->setOm3($DB->getField("Om3"));
      $objCmsContentBean->setOm4($DB->getField("Om4"));
      $objCmsContentBean->setOm5($DB->getField("Om5"));
      $objCmsContentBean->setOm6($DB->getField("Om6"));
      $objCmsContentBean->setOm7($DB->getField("Om7"));
      $objCmsContentBean->setOm8($DB->getField("Om8"));
      $objCmsContentBean->setOm9($DB->getField("Om9"));
      $objCmsContentBean->setOm10($DB->getField("Om10"));
      $objCmsContentBean->setOm11($DB->getField("Om11"));
      $objCmsContentBean->setOm12($DB->getField("Om12"));
      $objCmsContentBean->setOm13($DB->getField("Om13"));
      $objCmsContentBean->setOm14($DB->getField("Om14"));
      $objCmsContentBean->setOm15($DB->getField("Om15"));
      $objCmsContentBean->setOm16($DB->getField("Om16"));
      $objCmsContentBean->setOm17($DB->getField("Om17"));
      $objCmsContentBean->setOm18($DB->getField("Om18"));

      return $objCmsContentBean;
   }
   
   public function deleteByCmsCategoryId($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from CmsContent ";
      $query.="WHERE CmsCategoryId=".$id;
      $DB->query($query);
   }
  
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from CmsContent ";
      $query.="WHERE CmsContentId=".$id;
      $DB->query($query);
   }
}
?>