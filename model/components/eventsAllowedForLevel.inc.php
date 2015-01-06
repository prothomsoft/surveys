<?php
/** 
 * Keeps list of events allowed for user level
 * events names must be lower case
 */
class EventsAllowedForLevel {

	// LEVEL 0 - ADMINISTRATOR
	public $eventsAllowedForLevel_0 = array(
      // PRIVILAGES
      isadministrator,
      
	  // ADMIN HOME
	  startadmin,
      
       // CMS CATEGORIES
	  showcmscategorieslist,

	  // NEWSLETTER
	  shownewsletterlist,
	  getnewslettertabledata,
	  shownewsletterview,
	  executeremovenewsletteraction,
	  
	  // MEMBER
	  showmemberlist,
	  getmembertabledata,
	  showmemberview,
	  executeremovememberaction,
	  
	  // BOOK
	  showbooklist,
	  getbooktabledata,
	  showbookview,
	  executeremovebookaction,
	  executeauthorizebookaction,
	  
	  // CMS CONTENT
	  getcmscontenttabledata,
	  showcmscontentslist,
	  showcmscontentstep1,
	  showcmscontentstep2,
	  executecmscontentwizardclose,
	  executeremovecmscontentaction,
	  findcmscontentpicturebycmscontentid,
	  executecmscontentpictureremove,
	  executecmscontentsavepicturedescription,
	  executecmscontentpicturesetmain,
	  findcmscontentbystreet,
	  
	  showcreatecmscontentform, 
      executecreatecmscontentaction, 
      showeditcmscontentform, 
      executeeditcmscontentaction, 
      showfinalcmscontentview, 
      executeremovecmscontentaction,
	  
	  blank,
	  
		  // APPROVED USERS MANAGEMENT
      showusersapprovedlist,
      getusersapprovedtabledata,
      showcreateuserapprovedform,
      executecreateuserapprovedaction,
	  showedituserapprovedform,
	  executeedituserapprovedaction,
	  showuserapprovedview,
	  executeremoveusersapprovedaction,
	  	  	  
	  // delta management
	  getdeltatabledata,
	  showdeltaslist,
	  showdeltastep1,
	  showdeltastep2,
	  executedeltawizardclose,
	  executeremovedeltaaction,
	  finddeltapicturebydeltaid,
	  executedeltapictureremove,
	  executedeltasavepicturedescription,
	  executedeltapicturesetmain,
	  finddeltabystreet,
	  
	  // sigma management
	  getsigmatabledata,
	  showsigmaslist,
	  showsigmastep1,
	  showsigmastep2,
	  executesigmawizardclose,
	  executeremovesigmaaction,
	  findsigmapicturebysigmaid,
	  executesigmapictureremove,
	  executesigmasavepicturedescription,
	  executesigmapicturesetmain,
	  findsigmabystreet,
	  
	  // club management
	  getclubtabledata,
	  showclubslist,
	  showclubstep1,
	  showclubstep2,
	  executeclubwizardclose,
	  executeremoveclubaction,
	  findclubpicturebyclubid,
	  executeclubpictureremove,
	  executeclubsavepicturedescription,
	  executeclubpicturesetmain,
	  findclubbystreet,
	  
	  // alfa management
	  getalfatabledata,
	  showalfaslist,
	  showalfastep1,
	  showalfastep2,
	  executealfawizardclose,
	  executeremovealfaaction,
	  findalfapicturebyalfaid,
	  executealfapictureremove,
	  executealfasavepicturedescription,
	  executealfapicturesetmain,
	  findalfabystreet,
	  executealfapicturesetheader,
	  
	  // beta management
	  getbetatabledata,
	  showbetaslist,
	  showbetastep1,
	  showbetastep2,
	  executebetawizardclose,
	  executeremovebetaaction,
	  findbetapicturebybetaid,
	  executebetapictureremove,
	  executebetasavepicturedescription,
	  executebetapicturesetmain,
	  findbetabystreet,
	  
	  // update file
	  showupdatecategorylist,
	  showupdatefilelist,
	  showcreateupdatefileform, 
      executecreateupdatefileaction, 
      showeditupdatefileform, 
      executeeditupdatefileaction, 
      showfinalupdatefileview, 
      executeremoveupdatefileaction,
      upload,
	  remove,
	  
	  // gama management
	  getgamatabledata,
	  showgamaslist,
	  showgamastep1,
	  showgamastep2,
	  executegamawizardclose,
	  executeremovegamaaction,
	  findgamapicturebygamaid,
	  executegamapictureremove,
	  executegamasavepicturedescription,
	  executegamapicturesetmain,
	  findgamabystreet,
	  
	  // PRODUCERS MANAGEMENT
      showproducerslist,
      getproducerstabledata,
      showcreateproducerform,
      executecreateproduceraction,
	  showeditproducerform,
	  executeeditproduceraction,
	  showproducerview,
	  executeremoveproducersaction,
	  
	  // ORDERS MANAGEMENT
      showorderslist,
      getorderstabledata,
      showcreateorderform,
      executecreateorderaction,
	  showeditorderform,
	  executeeditorderaction,
	  showorderview,
	  executeremoveordersaction,
	  
	  // POINTS MANAGEMENT
      showpointslist,
      getpointstabledata,
      showcreatepointform,
      executecreatepointaction,
	  showeditpointform,
	  executeeditpointaction,
	  showpointview,
	  executeremovepointsaction,
	  
	  // productcategory
	  showproductcategorieslist,
	  	  	  
	  // product management
	  getproducttabledata,
	  showproductslist,
	  showproductstep1,
	  showproductstep2,
	  showproductstep3,
	  showproductstep4,
	  executewizardclose,
	  executeremoveproductaction,
	  executecopyproductaction,
	  findproductpicturebyproductid,
	  executeproductpictureremove,
	  executeproductpicturesetmain
    );
    
    // LEVEL 1 - ZONE 1 - $4.99
    public $eventsAllowedForLevel_1 = array(
      // PRIVILAGES
      isuser,
      
      // ADMIN HOME
      startadmin,
    		
      myaccountstart
    );
    
    // LEVEL 2 - ZONE 2 - $4.99
    public $eventsAllowedForLevel_2 = array(
      // PRIVILAGES
      ismanager,
    
      // ADMIN HOME
      startadmin,

    	// USERACCOUNT
    	moje_konto_start,
    	moje_konto,
    	bezplatny_pakiet_promocyjny,
    	bezplatny_pakiet_promocyjny_zapisz,
    	bezplatny_pakiet_promocyjny_potwierdzenie,
    	zmiana_hasla,
    	zmiana_hasla_zapisz,
    	zmiana_hasla_potwierdzenie,
    	moje_konto_zapisz,
    	moje_konto_potwierdzenie,
    	punkty,
    	getpointstabledata,
    	historia_zamowien,
    	getorderstabledata,
    	getpointstabledata,
    	executecreateorder,
    	executecreateorderandpayment
    );
}
?>
