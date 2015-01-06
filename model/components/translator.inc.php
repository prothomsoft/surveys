<?php
class Translator
{
   const DEFAULTLANG = 'EN';
   const TRANSPATH = "language/";
   const bWARNING = 1;
   

   private $transPath = "";
   private $bWarning = "";
   private $paths = "language/";

   private $arrTranslations = "";
   private $page = "";
   private $lang = "";

   function __construct($file, $lang = self::DEFAULTLANG, $path = self::TRANSPATH, $bWarning = self::bWARNING)
   {
   	  $this->transPath = $path;
      $this->bWarning = $bWarning;
      $file = basename($file);
      $intPrefix = strpos($file, ".");
      if ($intPrefix === false)
         $strFileBase = $file;
      else
         $strFileBase = substr($file, 0, $intPrefix);
      $this->lang = $lang;
      $this->page = $strFileBase;
      
      // because we have two levels in views folder
      $file = $this->transPath.$strFileBase.".";
      $fileAdmin = "../".$this->transPath.$strFileBase.".";
      if (file_exists($file.$lang)) {
         	$this->arrTranslations = parse_ini_file($file.$lang);
      } elseif (file_exists($fileAdmin.$lang)) {
			$this->arrTranslations = parse_ini_file($fileAdmin.$lang);
      }
   }
   public function getAll()
   {
         return $this->arrTranslations;
   }
   
   public function getTransPath()
   {	
   		return $this->paths;
   }

   public function gL($label)
   {
      if (!isset($this->arrTranslations[$label]))
         if ($this->bWarning == 1)
            $this->arrTranslations[$label] = "<span style='color:red'>[PAGE:".$this->page.";LABEL:".$label.";LANG:".$this->lang."]</span>";
         else
            $this->arrTranslations[$label] = "";

      return $this->arrTranslations[$label];
   }
}
?>
