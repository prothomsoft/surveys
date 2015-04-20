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
		
			$this->arrTranslations = array("txtShoppingCart" =>  "Handlekurv",
"txtRegister" =>  "Registrering",
"txtProducts" =>  "Produkter",
"txtPrice" =>  "Pris",
"txtQuantity" =>  "Antall",
"txtTotal" =>  "Totalt",
"txtRemove" =>  "Fjern",
"txtChooseDeliveryMethod" =>  "Velg leveringsmetode",
"txtShoppingCartEmpty" =>  "Din handlekurv er tom",
"txtIfYouAreNewClient" =>  "Ny kunde?",
"txtClickHere" =>  "Klikk her",
"txtToRegister" =>  "for registrering",
"txtRegister1" =>  "For å registrere deg på Musikkgaver.no må du skrive inn din epostadresse og passord...",
"txtRegister2" =>  "...Vi vil automatisk sende deg en aktiveringslink via epost. Du må klikke på aktiveringslinken for å fullføre registreringen.",
"txtRegister3" =>  "Aktiveringslink er sendt til din epostadresse.",
"txtRegister4" =>  "Sjekk din epost og klikk på aktiveringslinken for å fullføre registreringen.",
"txtDeliveryAddress" =>  "Leveringsadresse",
"txtFirstName" =>  "Fornavn",
"txtLastName" =>  "Etternavn",
"txtStreet" =>  "Adresse",
"txtHouseNumber" =>  "Husnummer",
"txtZip" =>  "Postnummer",
"txtCity" =>  "By/Sted",
"txtOrderedProducts" =>  "Bestilte produkter",
"txtChosenDeliveryMethod" =>  "Velg leveringsmetode",
"txtOrderPayment" =>  "Betaling",
"txtOrderNumber" =>  "Order no.",
"txtReceivedPayment" =>  "Vi har mottatt din ordre og vil snart kontakte deg.",
"txtPersonalData" =>  "Personlig informasjon",
"txtChangePassword" =>  "Endre passord",
"txtMyAccount" =>  "Min brukerkonto",
"txtMyAccount1" =>  "Velg fra menyen på høyre side.",
"txtMyAccount2" =>  "Du kan endre din personlige informasjon og passord.",
"txtOldPassword" =>  "Gammelt passord",
"txtNewPassword" =>  "Nytt passord",
"txtRepeatNewPassword" =>  "Gjenta nytt passord",
"txtPasswordChanged" =>  "Ditt passord er blitt endret.",
"txtPersonalDetailsSaved" =>  "Dine personlige detaljer er lagret.",
"txtCartWeightTotal" =>  "Produktenes totalvekt",
"txtDelivery1" =>  "Jeg ønsker å hente produktene selv",
"txtDelivery2" =>  "Produktet vil bli levert",
"txtDelivery3" =>  "Produktet vil bli levert i Europa",
"txtCountry" =>  "Land",
"txtOrderedProducts" =>  "Produkter i bestilling",
"txtDeliveryCost" =>  "Fraktkostnad",
"txtOrderConfirmation" =>  "Ordrebekreftelse",
"txtOrderNumber" =>  "Ordrenummer",
"txtHasBeenReceived" =>  "er blitt mottatt",
"txtKindRegards" =>  "Beste hilsener",
"txtChosenDeliveryMethod" =>  "Valgt leveringsmetode",
"txtYourMessageSent" =>  "Din melding er blitt sendt",
"txtEmailWithPasswordSent" =>  "Ditt passord er blitt sendt til deg på epost.",
"txtNewsletterConfirmation" =>  "Nyhetsbrev bekreftelse",
"txtYourEmailWasAdded" =>  "Din e-post ble lagt på vårt nyhetsbrev",
"txtCancel" =>  "Avbryt",
"txtMandatoryFields" =>  "obligatoriske filelds",
"txtPersonalDetails" =>  "Personlig informasjon",
"txtRepeatEmail" =>  "Gjenta E-post",
"txtOrganization" =>  "Organisasjonsnavn",
"txtOrganizationEmail" =>  "Organisasjonens e-post",
"txtEmail" =>  "Votre adresse mél",
"txtPassword" =>  "Merci de choisir un mot de passe",
"txtLoginForm" =>  "CONNEXION",
"txtLogin" =>  "Connexion",
"txtWarning" =>  "Attention",
"txtEmailEmpty" =>  "Vous devez saisir votre adresse email.",
"txtPasswordEmpty" =>  "Vous devez saisir votre mot de passe.",
"txtEmailIncorrect" =>  "L'adresse email saisie n'est pas correcte.",
"txtEmailOrPasswordIncorrect" =>  "L'adresse email ou le mot de passe saisi n'est pas correct.",
"txtForgotYourPassword" =>  "Mot de passe oublié ?",
"txtRegisterForm" =>  "INSCRIPTION",
"txtRegister" =>  "S'inscrire",
"txtForgotPasswordForm" =>  "MOT DE PASSE OUBLIE",
"txtEmailAlreadyExists" =>  "Cette adresse email est déjà utilisée.",
"txtRegisterConfirmation" =>  "CONFIRMATION D'INSCRIPTION",
"txtRegisterMessage" =>  "Votre compte a bien été créé. Pour l'activer, veuillez consulter votre boîte aux lettres et cliquer sur le lien d'activation.",
"txtAccountActivation" =>  "ACTIVATION DU COMPTE",
"txtAccountAtivationSuccess" =>  "Votre compte a été activé.",
"txtAccountAtivationFail" =>  "Votre compte a déjà été activé.",
"txtEmailNotFound" =>  "L'adresse email saisie n'a pas été trouvée dans la base de donnée.",
"txtForgotPasswordMessage" =>  "Merci d'entrer votre adresse email. <br/>Un nouveau mot de passe sera généré et vous sera envoyé par email.",
"txtForgotPasswordSend" =>  "Envoyer mon nouveau mot de passe",
"txtForgotPasswordConfirmation" =>  "MOT DEPASSE OUBLIE - CONFIRMATION",
"txtForgotPasswordConfirmationMessage" =>  "Un nouveau mot de passe vous a été envoyé par email.<br/>Merci de vérifier votre boîte email.",
"txtLogout" =>  "Déconnexion",
"txtMyAccount" =>  "MON COMPTE",
"txtContact" =>  "NOUS CONTACTER",
"txtYourName" =>  "Nom",
"txtCompanyName" =>  "Nom de votre entreprise",
"txtYourEmail" =>  "Votre adresse email",
"txtMessage" =>  "Message",
"txtPhoneNumber" =>  "Numéro de téléphone",
"txtRequiredFields" =>  "Champs obligatoires",
"txtSend" =>  "Envoyer",
"txtMessageSend" =>  "Merci, votre message a bien été envoyé. Nous nous efforçons de vous répondre dans les plus brefs délais",
"txtMessageNotSend" =>  "Votre message n'a pas été envoyé.",
"txtThemeMarket" =>  "LA BOURSE AUX THÉMATIQUES",
"txtChangePasswordForm" =>  "MODIFIEZ VOTRE MOT DE PASSE",
"txtNewPassword" =>  "Votre nouveau mot de passe",
"txtRepeatNewPassword" =>  "Confirmez votre nouveau mot de passe",
"txtChangePasswordSubmit" =>  "Enregistrer",
"txtNewPasswordRequired" =>  "Vous devez saisir un nouveau mot de passe.",
"txtRepeatNewPasswordRequired" =>  "Vous devez confirmer votre nouveau mot de passe.",
"txtPasswordMismatch" =>  "Votre saisie n'est pas identique à votre nouveau mot de passe.",
"txtChangePasswordConfirmation" =>  "CHANGEMENT DE MOT DE PASSE - CONFIRMATION",
"txtChangePasswordConfirmationMessage" =>  "Votre mot de passe a bien été modifié.",
"txtRemoveAccountForm" =>  "SUPPRIMER SON COMPTE",
"txtRemoveAccountMessage" =>  "Etes-vous sûr de vouloir supprimer votre compte ?",
"txtRemoveAccountSubmit" =>  "Supprimer mon compte",
"txtRemoveAccountConfirmation" =>  "SUPPRESSION DE COMPTE - CONFIRMATION",
"txtRemoveAccountConfirmationMessage" =>  "Votre compte a bien été supprimé",
"txtOnlyNumericValueAllowed" =>  "Only numeric values are allowed.",
"txtYComprisIsRequiredField" =>  "Y Compris is a required field.",
"txtDepuisCombienIsRequiredField" =>  "Depuis Combien is a required field.",
"txtDansQuelleIsRequiredField" =>  "Dans Quelle is a required field.",
"txtVoters" =>  "Votants",
"txtChangeDetailsForm" =>  "MODIFIER MES INFORMATIONS",
"txtChangeDetailsConfirmation" =>  "MODIFIER MES INFORMATIONS - CONFIRMATION",
"txtChangeDetailsConfirmationMessage" =>  "Vos informations ont été modifiées. Merci !",
"txtSave" =>  "Enregistrer",
"txtPleaseEnterYourAnswerHere" =>  "Merci d'entrer votre réponse ici...",
"txtActivePollsWereNotFound" =>  "Aucune Bourse aux thématiques n'a été trouvée.",
"txtAlreadyVoted" =>  "Vous avez déjà participé à cette consultation.",
"txtStart" =>  "Retour à la page d'accueil",
"txtRegisterConfirmationMessage1" =>  "Lien d'activation",
"txtRegisterConfirmationMessage2" =>  "Merci pour votre participation.",
"txtRegisterConfirmationMessage3" =>  "Voici vos identifiant et mot de passe:",
"txtRegisterConfirmationMessage4" =>  "Merci de cliquer sur le lien suivant pour activer votre compte:",
"txtSearchResults" =>  "RESULTATS DE RECHERCHE",
"txtKeyword" =>  "Mot clé",
"txtNoResultsFound" =>  "Aucun résultat... Merci de préciser votre recherche.");
			
      } elseif (file_exists($fileAdmin.$lang)) {
			$this->arrTranslations = parse_ini_string($fileAdmin.$lang);
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
