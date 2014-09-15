<?php
include '../../epic.php';

$POST = true;

include '../default_actions.php';

if (($user = User::Login($_POST['username'], $_POST['drowssap'])) != NULL)
{
	if (setcookie('TM_LoginState', $user->SessionToken(), time() + intval(3600 * 2.5), '/TM/', NULL, NULL, true))
	{
		header('Location: ../../index.php');
		$_SESSION['confirm'][] = 'Successfully logged in.';
	}
	else
	{
		header('Location: ../../index.php');
		$_SESSION['error'][] = 'Unable to create cookie. Cookies must be enabled to use this site.';
	}
}
else
{
	header('Location: ../../index.php');
		$_SESSION['error'][] = 'Username and password not matching.';
}

?>