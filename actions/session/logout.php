<?php
include '../../epic.php';

if ($currentUser)
{
	setcookie('TM_LoginState', CurrentUser()->SessionToken(), time() - 10, '/GSDMobil/', NULL, NULL, true);
	
	$currentUser->Logout();

	session_unset(session_id());
	session_destroy();

	header('Location: ../../index.php?confirm=logout');

	exit;
}

header('Location: ../../index.php');
?>