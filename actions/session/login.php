<?php
include '../../epic.php';

$POST = true;

include '../default_actions.php';

if (($user = User::Login($_POST['username'], $_POST['drowssap'])) != NULL)
{
	if (setcookie('TM_LoginState', $user->SessionToken(), time() + intval(3600 * 2.5), '/TM/', NULL, NULL, true))
	{
		header('Location: ../../index.php?confirm=login');
	}
	else
	{
		header('Location: ../../index.php?error=login_cookie_failed');
	}
}
else
{
	header('Location: ../../index.php?error=login_failed');
}

?>