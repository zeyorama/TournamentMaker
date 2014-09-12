<?php
/**
 * epic.php
 * 
 * Author: Frank Kevin Zey
 */

# Setze standard Zeitzone auf Europa/Berlin
date_default_timezone_set('Europe/Berlin');

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