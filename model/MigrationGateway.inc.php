<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/components/clear_url.inc.php");
 
/**
 * MigrationGateway
 * 
 * database access class - gateway methods for table Migration
 */
class MigrationGateway {

   function __construct(){
   }
   
   public function migrate() {
   	  $DB = new DB();
      $DB->connect();
      $DB1 = new DB();
      $DB1->connect();
      
      $query  = "SELECT GamaId, ImgDriveName FROM GamaPicture";
      
      
            // to read
      //$longDescription = htmlspecialchars_decode($objCmsContent->getLongDescription());
      
      // to save
      //$longDescription = htmlspecialchars(trim($event->getArg('shortDescription')), ENT_QUOTES,'UTF-8',true);
      
      
      $DB->query($query);
            
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next()) {
      			$query1 = "UPDATE `krakownh_new`.`Gama` SET `VideoDriveName` = '".$DB->getField("ImgDriveName")."', `ShortDescription` = '".$ShortDescription."', `EventDate` = '".$EventDate."', `LongDescription` = '".$LongDescription."', `Keyword` = '".$Keyword."' WHERE `Gama`.`GamaId` = ".$DB->getField("GamaId")."";
				$DB1->query($query1);
      		}
      }
      
      
      /*$query  = "SELECT * FROM Product1";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			
      			$name =  $DB->getField("Name");
      			$objClearUrl = new ClearUrl($name);
      			$clearName = $objClearUrl->clear();
      			
      			
      			$query1 = "INSERT INTO  Alfa (
`AlfaId` ,
`CategoryId` ,
`Name` ,
`NameTransEN` ,
`NameTransDE` ,
`NameTransRU` ,
`SeoName` ,
`Keyword` ,
`Description` ,
`ShortDescription` ,
`ShortDescriptionTransEN` ,
`ShortDescriptionTransDE` ,
`ShortDescriptionTransRU` ,
`LongDescription` ,
`LongDescriptionTransEN` ,
`LongDescriptionTransDE` ,
`LongDescriptionTransRU` ,
`UpdateDate` ,
`AlfaOrder` ,
`Status` ,
`StatusEN` ,
`StatusDE` ,
`StatusRU` ,
`ImgDriveName`
)
VALUES (
'' ,  '".$DB->getField("Product1CategoryId")."',  '".$name."',  '',  '',  '',  '".$clearName."',  '".$name."',  '".$name."',  '".addslashes($DB->getField("ShortDescription"))."',  '',  '',  '',  '".addslashes($DB->getField("LongDescription"))."',  '',  '',  '',  '2011-01-30 00:00:00',  '1',  '1',  '',  '', '',  '0'
);";
      			
      			
      			
      			
      			$DB1->query($query1);
      		}
      }*/
      
      
      /*$query  = "SELECT * FROM gci_new";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			
      			$name =  $DB->getField("question");
      			$objClearUrl = new ClearUrl($name);
      			$clearName = $objClearUrl->clear();
      			
      			$answer =  $DB->getField("answer");
      			$date =  $DB->getField("date");
      			
      			
      			
      			$query1 = "INSERT INTO Gama (`GamaId`, `UserId`, `Name`, `NameTransEN`, `NameTransDE`, `NameTransRU`, `SeoName`, `Keyword`, `Description`, `ShortDescription`, `ShortDescriptionTransEN`, `ShortDescriptionTransDE`, `ShortDescriptionTransRU`, `LongDescription`, `LongDescriptionTransEN`, `LongDescriptionTransDE`, `LongDescriptionTransRU`, `UpdateDate`, `GamaOrder`, `Status`, `StatusEN`, `StatusDE`, `StatusRU`, `ImgDriveName`) " .
      					"VALUES ('', '3', '".$name."', '', '', '', '".$clearName."', '".$name."', '".$name."', '".addslashes($answer)."', '', '', '', '".addslashes($answer)."', '', '', '', '2011-01-30 00:00:00', '1', '1', '', '', '', '0');";
      			$DB1->query($query1);
      		}
      }*/
      
      /*$query  = "SELECT * FROM gci_cms_kategorie";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			
      			$name =  $DB->getField("cat_name");
      			$objClearUrl = new ClearUrl($name);
      			$clearName = $objClearUrl->clear();
      			$clearName = $clearName."-".$DB->getField("cat_id");
      			
      			$url = "http://new.pogorzedynowskie.pl/pogorzedynowskie/".$clearName.".html";
      			
      			$query1  = "INSERT INTO CmsCategory (`CmsCategoryId`, `FatherId`, `Name`, `SeoName`, `TransEN`, `TransDE`, `TransRU`, `ListOrder`, `Url`, `IsModule`, `NumberOfItems`) " .
      					"VALUES ('".$DB->getField("cat_id")."', '".$DB->getField("parent_id")."', '".$name."', '".$clearName."', '', '', '', '".$DB->getField("cat_description")."', '".$url."', '0', '0');";
      			$DB1->query($query1);
      		}
      }   
      
      $query  = "SELECT * FROM gci_cms_kategorie_plain";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			
      			$name =  $DB->getField("cat_name");
      			$objClearUrl = new ClearUrl($name);
      			$clearName = $objClearUrl->clear();
      			$clearName = $clearName."-".$DB->getField("cat_id");
      			
      			$query1  = "INSERT INTO CmsCategoryPlain (`CmsCategoryPlainId`, `CategoryId`, `CategoryName`, `CategorySeoName`) " .
      					"VALUES ('','".$DB->getField("cat_id")."', '".$name."', '".$clearName."');";
      			$DB1->query($query1);
      		}
      }
      
      
      $query  = "SELECT * FROM gci_cms_zawartosc";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$name =  $DB->getField("tytul");
      			
      			// seo is based on category name so I need to take it
      			
      			$DB2 = new DB();
      			$DB2->connect();
      			$query2  = "SELECT SeoName FROM `CmsCategory` WHERE CmsCategoryId = '".$DB->getField("cat_id")."'";
      			$DB2->query($query2);
      			
      			$clearName = $DB2->getField("SeoName");
      			
      			$query1  = "INSERT INTO CmsContent (`CmsContentId`, `CmsCategoryId`, `Name`, `NameTransEN`, `NameTransDE`, `NameTransRU`, `SeoName`, `Keyword`, `Description`, `ShortDescription`, `ShortDescriptionTransEN`, `ShortDescriptionTransDE`, `ShortDescriptionTransRU`, `LongDescription`, `LongDescriptionTransEN`, `LongDescriptionTransDE`, `LongDescriptionTransRU`, `UpdateDate`, `CmsContentOrder`, `Status`, `ImgDriveName`) " .
      					"VALUES ('', '".$DB->getField("cat_id")."', '".$name."', '', '', '', '".$clearName."', '".$name."', '".$name."', '".addslashes($DB->getField("zawartosc"))."', '', '', '', '".addslashes($DB->getField("zawartosc"))."', '', '', '', '0000-00-00 00:00:00', '1', '1', '');";
      			$DB1->query($query1);
      		}
      }*/
   }           
}
?>