<?php

/** 
 * ClearUrl Class 
 */
class ClearUrl
{
	 private $sText;
	 		 	 
   function __construct($sText=self::sText)
   {
      $this->sText = $sText;      
   }
   
   function clearDiacritics()
   {
		$aReplacePL = array(
			'ą' => 'a', 'ę' => 'e', 'ś' => 's', 'ć' => 'c',
			'ó' => 'o', 'ń' => 'n', 'ż' => 'z', 'ź' => 'z', 'ł' => 'l',
			'Ą' => 'A', 'Ę' => 'E', 'Ś' => 'S', 'Ć' => 'C',
			'Ó' => 'O', 'Ń' => 'N', 'Ż' => 'Z', 'Ź' => 'Z', 'Ł' => 'L', '&nbsp;' => '',
			'å' => 'a', '\'' => '', '/' => '', '039' => '',
			'Å' => 'A', 'æ' => '', 'Æ' => '',	'â' => 'a', 'Â' => 'A', 'é' => 'e',
			'É' => 'E', 'è' => 'e', 'È' => 'E', 'ê' => 'e', 'Ê' => 'E','ø' => 'o',
			'Ø' => 'O', 'ó' => 'O', 'Ó' => 'O', 'ò' => 'o', 'Ò' => 'O', 'ô' => 'o',
			'Ô' => 'O', '’' => '', '„' => '', '”' => '', '–' => '-', '—' => '-',
			'Ç' => 'C', 'ç' => 'c', '«' => '', '»' => '', '€' => '', '>' => '', '&gt;' => '', '<br/>' => ''
			);
		
		$this->sText = str_replace(array_keys($aReplacePL), array_values($aReplacePL), $this->sText);
		
   }
   
   function clear()
   {
   		// pozbywamy się polskich znaków diakrytycznych
   		
		$this->clearDiacritics();
		
		// dla przejrzystości wszystko z małych liter
		$this->sText = strtolower($this->sText);
	
		// wszystkie spacje zamieniamy na myślniki
		$this->sText = str_replace(' ', '-', $this->sText);
	
		// usuń wszytko co jest niedozwolonym znakiem
		$this->sText = preg_replace('/[^0-9a-z\-]+/', '', $this->sText);
	
		// zredukuj liczbę myślników do jednego obok siebie
		$this->sText = preg_replace('/[\-]+/', '-', $this->sText);
	
		// usuwamy możliwe myślniki na początku i końcu
		$this->sText = trim($this->sText, '-');
	
		return $this->sText;
   }
}
?>