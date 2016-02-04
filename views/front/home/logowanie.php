<?php
if(file_exists("secret.php")) {
	require_once("secret.php");
}
$formpassword = !isset($_POST['formpassword'])?NULL:$_POST['formpassword'];
if (!in_array($formpassword, array(GOSIA_KUBA_PASSWORD, EDYTA_DANIEL_PASSWORD, ANNA_TOMASZ_PASSWORD, MARTA_PIOTR_PASSWORD, MARTA_PIOTR2_PASSWORD))) {
	include("adminLoginForm.php");	
}

if ($formpassword == GOSIA_KUBA_PASSWORD || $formpassword == EDYTA_DANIEL_PASSWORD || $formpassword == ANNA_TOMASZ_PASSWORD || $formpassword == MARTA_PIOTR_PASSWORD || $formpassword == MARTA_PIOTR2_PASSWORD) {
	session_start();
	$_SESSION['basic_is_logged_in'] = true;	
	$_SESSION['adminPassword'] = $formpassword;
	$SID = session_id();	
	if($_SESSION['adminPassword'] == GOSIA_KUBA_PASSWORD) {$redirectTo = GOSIA_KUBA_URL;}
	if($_SESSION['adminPassword'] == EDYTA_DANIEL_PASSWORD) {$redirectTo = EDYTA_DANIEL_URL;}
	if($_SESSION['adminPassword'] == ANNA_TOMASZ_PASSWORD) {$redirectTo = ANNA_TOMASZ_URL;}
	if($_SESSION['adminPassword'] == MARTA_PIOTR_PASSWORD) {$redirectTo = MARTA_PIOTR_URL;}
	if($_SESSION['adminPassword'] == MARTA_PIOTR2_PASSWORD) {$redirectTo = MARTA_PIOTR2_URL;}
	include($redirectTo);
}
?>