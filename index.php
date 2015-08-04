<?php
include 'config.php';

date_default_timezone_set('Europe/Berlin');

if ( session_id() === '' ) 	session_start();
else 												session_regenerate_id();

if ( !isset( $_SESSION[ 'error' ] ) ) 		$_SESSION[ 'error' ] 		= array();
if ( !isset( $_SESSION[ 'notice' ] ) ) 	$_SESSION[ 'notice' ] 	= array();
if ( !isset( $_SESSION[ 'confirm' ] ) ) 	$_SESSION[ 'confirm' ] 	= array();

include 'libs/core.php';


?>