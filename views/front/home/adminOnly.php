<?php
@session_start();

if(file_exists("secret.php")) {
	require_once("secret.php");
}

if(isset($_SESSION['adminPassword']) && $_SESSION['adminPassword'] == GOSIA_KUBA_PASSWORD) {$redirectTo = GOSIA_KUBA_URL;}
if(isset($_SESSION['adminPassword']) && $_SESSION['adminPassword'] == EDYTA_DANIEL_PASSWORD) {$redirectTo = EDYTA_DANIEL_URL;}
if(isset($_SESSION['adminPassword']) && $_SESSION['adminPassword'] == ANNA_TOMASZ_PASSWORD) {$redirectTo = ANNA_TOMASZ_URL;}
if(isset($_SESSION['adminPassword']) && $_SESSION['adminPassword'] == MARTA_PIOTR_PASSWORD) {$redirectTo = MARTA_PIOTR_URL;}
if(isset($_SESSION['adminPassword']) && $_SESSION['adminPassword'] == MARTA_PIOTR2_PASSWORD) {$redirectTo = MARTA_PIOTR2_URL;}
if(isset($_SESSION['adminPassword'])) {
	include($redirectTo);
	exit; 
}

if(!isset($_SESSION['adminPassword']) ) {
	include_once("logowanie.php");
	exit;
}


if (!in_array($_SESSION['adminPassword'], array(GOSIA_KUBA_PASSWORD, EDYTA_DANIEL_PASSWORD, ANNA_TOMASZ_PASSWORD, MARTA_PIOTR_PASSWORD, MARTA_PIOTR2_PASSWORD))) {
	include_once("logowanie.php");
	exit;
}?>