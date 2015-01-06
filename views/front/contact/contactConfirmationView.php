<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
?>


<?//$sendto = "musikkglede@musikkglede.no";
	//$sendto = "tprokop@prothomsoft.com";
	$sendto = "ncurtelin@gmail.com";
	
	$Name = $event->getArg('Name');
	$Company = $event->getArg('Company');
	$Email = $event->getArg('Email');
	$PhoneNumber = $event->getArg('PhoneNumber');
	$Message = $event->getArg('Message');

	$headers = "From: \"=?UTF-8?B?" . base64_encode($Name) ."?=\" <" . $Email . ">\r\n";
	//$headers = "From: " . $email . "\r\n";
	$headers .="Mime-Version: 1.0\r\n";
	$headers.="Content-Type: text/plain; charset=UTF-8";
	//$headers .= "Content-Transfer-Encoding: quoted-printable";
	//$header.="Content-Transfer-Encoding: 8bit\r\n";
	//$headers .= "From: \"$imie\" <".$email.">\r\n";
	//$headers .= "Reply-To:".$email."\r\n";
	//$headers .= "X-Priority: 1\r\n";
	//$headers .= "X-MSMail-Priority: High\r\n";
	$tresc = "".$oT->gL("txtYourName").": ".$Name."\n";
	$tresc .= "".$oT->gL("txtCompanyName").": ".$Company."\n";
	$tresc .= "".$oT->gL("txtEmail").": ".$Email."\n";
	$tresc .= "".$oT->gL("txtPhoneNumber").": ".$PhoneNumber."\n";
	$tresc .= "".$oT->gL("txtMessage").": ".$Message."\n";
	
	//konwertowanie z utf-8 na iso 8859-2
	$temat =  "=?UTF-8?B?".base64_encode("Contact from surveys.prothomsoft.com")."?=";
	//$tresc = stripslashes($tresc);
	//$tresc = strtr($tresc, "\xA5\x8C\x8F\xB9\x9C\x9F", "\xA1\xA6\xAC\xB1\xB6\xBC");
	//$temat = stripslashes($temat);
	//$temat = strtr($temat, "\xA5\x8C\x8F\xB9\x9C\x9F", "\xA1\xA6\xAC\xB1\xB6\xBC");
	//wysyłanie maila
	//$message = wordwrap($message, 70);
	$wyslane = mail($sendto, $temat ,$tresc,$headers);
	//echo $headers . "\n\n\n\n\n" . $tresc;
?>

	<!-- Begin Main -->
	<div role="main" class="main">
	
		<!-- Begin page top -->
		<section class="page-top-md">				
		</section>
		<!-- End page top -->
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="blog-posts single-post">
						<article class="post post-large blog-single-post">
							<h3><?=$oT->gL("txtContact")?></h3>
							<div class="post-content">
								<p>
								<?if($wyslane) {?>
										<?=$oT->gL("txtMessageSend")?>
									<?} else {?>
										<?=$oT->gL("txtMessageNotSend")?>
									<?}?>
								</p>
								<p><a class="btn btn-primary" href="<?=$SN;?>surveys.html"><?=$oT->gL("txtStart")?></a></p>									
							</div>
						</article>							
					</div>
				</div>
			</div>	
		</div>
	</div>
	<!-- End Main -->



