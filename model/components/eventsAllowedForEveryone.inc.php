<?php
/** 
 * Keeps list of events allowed when user is not logged to the system
 * events names must be lower case
 */
class EventsAllowedForEveryone {
	
	public $eventsAllowedForEveryone = array(

	// IDENTITY
	isAdministrator,
	
	sendemail,
	
	getproducttabledata,
	getproductsearchtabledata,
	
	 videoarticles,
	 articles,
	 article,
	 
	 contact_information,
	 
     executepollvoteaction,
	
	  // HOME
	  zamowienie,
      zamowienie_adres,
      zamowienie_platnosc,
      zamowienie_potwierdzenie,
			
	  orderaddress,
	  orderpayment,
	  searchresults,
      
	  surveys_page,
	  surveys,
      search,
	  collections,
	  pomoc,
	  wyniki_wyszukiwania,
	  products,
	  product,
	  shopping_cart,
	  produkty,
	  produkt,
	  activation,
/*	  fotografia_slubna_krakow,
	  fotografia_slubna_krakow_przygotowania,
	  fotografia_slubna_krakow_slub,
	  fotografia_slubna_krakow_wesele,
	  fotografia_slubna_krakow_plener,*/
	  facebook_close2you,	  
	  
	  // platnosci
	  payment_ok,
	  payment_error,
	  payment_online_member,
	  payment_online_store,
	  
	  // contact
	  contact_form,
	  executecontactaction,
	  contact_form_confirmation,
	  
	  // newsletter
	  newsletter,
	  executenewsletteraction,
	  newsletterconfirmation,	  
	  
	  // wskazowki_dojazdu
	  
	  wskazowki_dojazdu,
	  
	  // shopping cart
	  koszyk,
	  executeaddshoppingcartaction,
	  executeclearshoppingcartaction,
	  executeupdateshoppingcartaction,
	  executeremoveshoppingcartaction,
	  saveshoppingcartstate,
	  savetester,
	  saveperfumetka1,
	  saveperfumetka2,
	  
	  //shopping cart new
	  shoppingcart,
	  
      blog,
      blog_entry,
      blog_comment,
      blog_comment_save,
      blog_comment_confirm,
	  
	  findproductbyname,
	  findproducerbyname,
	  
/*	  blank,
	  offer,
	  student_offer,*/
	  
	  download,	  
	  
	  // LINKS
	  showlinksview,

	  // FAQS
	  showfaqsview,

	  // TESTIMONIALS
	  showtestimonialsview,
	  
	  // DISCLAIMER
	  showdisclaimerview,
	
	  // CMS CONTENT
      rsg,
      
      language,

      // USER REGISTER UCONTROL
	  createuserforcompany,
      createuserforcompanyaction,
      showuserforcompanyview,

      // CONTACT
      contact,

      // SITEMAP
      sitemap,
      
      // FINISHING
      finishing,
      
      // FURNISHING
      furnishing,
      
      // LOGIN/LOGOUT
      login,	  
      executelogin,
      executelogout,
	  register,
	  executeregistration,
	  registerconfirmation,
      executecontact,
      executesamples,
	  forgotpassword,
      executeforgotpassword,
	  forgotpasswordconfirmation,
			
      
      // PROPERTIES COMPONENT
      properties,
      property,
      search_list,
      search_gallery,
      search_map,
      search_list_scroller,
      
      // FORGOT PASSWORD
      showforgotpasswordform,
      showforgotpasswordaction,
      showforgotpasswordview,
      
      // NEWS
      videos,
      video,
      shownewsslist,
      
      // NEWSARCHIVE
      shownewsarchiveslist,
      shownewsarchivedetails,
      
      // GALERIA
      showgaleriaslist,
      showgaleriaview,
      
      // GALERIAARCHIVE
      showgaleriaarchiveslist,
      showgaleriaarchivedetails,
      
      // STORE COMPONENT
      showproductslist,
      showproductdetails,
      showshoppingcart,
      executeaddshoppingcartaction,
      executeclearshoppingcartaction,
      executeupdateshoppingcartaction,
      executeremoveshoppingcartaction,
      
      // PAYFORACCESS USER REGISTER
      showpayforaccessform,
      executepayforaccessaction,
      showpayforaccessview,
      
      executeauthorizepayment,
      executeaccessprocessorder,
      showaccessordersuccessview,
      showaccessorderfailview,
      
      // SUBSCRIPTION
      showsubscriptionform,
      executesubscriptionaction,
      showsubscriptionview,
      
      showrecommendsitewindow,
      showdisclaimerwindow,
      
      // CUSTOMER QUESTION
      executecustomerquestion,
      
      profesjonalna_fotografia_slubna,
      profesjonalny_fotograf_slubny,
	  profesjonalne_zdjecia_slubne,
	  fotograf_godny_polecenia,
	  linki_do_fotografii_slubnej,
	  kontakt_z_profesjonalnym_fotografem_slubnym,
	  kontakt_action,
	  pass,
	  sitemap,
	  
	  news,
	  news_entry,
	  news_comment,
	  news_comment_save,
	  news_comment_confirm,
	  
	  //widoki
	  aktualnosci,
	        
      
    );
}
?>
