<?php

/*
 * Prüft, ob alle erforderlichen Daten vorhanden sind.
 * Zuvor sollte festgelegt werden, ob auf POST oder GET geprüft werden soll.
 * Beispiele:
 * Prüfung ob POST Parameter übergeben wurden => $POST = true;
 * Prüfung ob GET Parameter übergeben wurden  => $GET  = true;
 * 
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!!																																					!!!
 * !!! WICHTIG:																																	!!!
 * !!! Die Variablen erst setzen, nachdem epic.php inkludiert wurde.						!!!
 * !!!																																					!!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */

if ($POST && count($_POST) <= 0)
{
	header('Location: ../index.php');
	exit;
}

if ($GET && count($_GET) <= 0)
{
	header('Location: ../index.php');
	exit;
}

?>