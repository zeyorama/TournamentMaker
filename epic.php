<?php
/**
 * epic.php
 * 
 * Author: Frank Kevin Zey
 */

# Setze standard Zeitzone auf Europa/Berlin
date_default_timezone_set('Europe/Berlin');

if (session_id() === '')
	session_start();
else
	session_regenerate_id();

if (!isset($_SESSION['confirm']))
	$_SESSION['confirm'] = array();

if (!isset($_SESSION['error']))
	$_SESSION['error'] = array();

if (!isset($_SESSION['notice']))
	$_SESSION['notice'] = array();

$POST = false;
$GET  = false;

include 'libs/core.php';

$currentUser    = CurrentUser();

$type           = 'Guest';

if ($currentUser)
{
	setcookie('TM_LoginState', $currentUser->SessionToken(), time() + (3600 * 24 * 10), '/TM/', NULL, NULL, true);
}


?>