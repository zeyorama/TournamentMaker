<?php
/**
 * helper.php
 * 
 * Author: Frank Kevin Zey
 */

function Dump($var)
{
	echo "<br>\n<pre>\n";
	print_r($var);
	echo "\n</pre><br>\n";
}

function StartsWith($haystack, $needle)
{
	return $needle === "" || strpos($haystack, $needle) === 0;
}

function EndsWith($haystack, $needle)
{
	return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

function FileExists($path)
{
	return file_exists($path);
}

function CurrentUser()
{
	if (isset($_COOKIE['TM_LoginState']))
		return Benutzer::BySessionToken($_COOKIE['TM_LoginState']);
	
	return NULL;
}

function DdmYHi($date) {
	switch(date("D",strtotime($date))) {
		case 'Mon':
			$d = "Mon, ".date("d.m.Y H:i", strtotime($date));
			break;

		case 'Tue':
			$d = "Die, ".date("d.m.Y H:i", strtotime($date));
			break;

		case 'Wed':
			$d = "Mit, ".date("d.m.Y H:i", strtotime($date));
			break;

		case 'Thu':
			$d = "Don, ".date("d.m.Y H:i", strtotime($date));
			break;

		case 'Fri':
			$d = "Fre, ".date("d.m.Y H:i", strtotime($date));
			break;

		case 'Sat':
			$d = "Sam, ".date("d.m.Y H:i", strtotime($date));
			break;

		case 'Sun':
			$d = "Son, ".date("d.m.Y H:i", strtotime($date));
			break;
	}

	return $d;
}

function DdmYHis($date) {
	switch(date("D",strtotime($date))) {
		case 'Mon':
			$d = "Mon, ".date("d.m.Y H:i:s", strtotime($date));
			break;

		case 'Tue':
			$d = "Die, ".date("d.m.Y H:i:s", strtotime($date));
			break;

		case 'Wed':
			$d = "Mit, ".date("d.m.Y H:i:s", strtotime($date));
			break;

		case 'Thu':
			$d = "Don, ".date("d.m.Y H:i:s", strtotime($date));
			break;

		case 'Fri':
			$d = "Fre, ".date("d.m.Y H:i:s", strtotime($date));
			break;

		case 'Sat':
			$d = "Sam, ".date("d.m.Y H:i:s", strtotime($date));
			break;

		case 'Sun':
			$d = "Son, ".date("d.m.Y H:i:s", strtotime($date));
			break;
	}

	return $d;
}

function DdmY($date) {
	switch(date("D",strtotime($date))) {
		case 'Mon':
			$d = "Mon, ".date("d.m.Y", strtotime($date));
			break;

		case 'Tue':
			$d = "Die, ".date("d.m.Y", strtotime($date));
			break;

		case 'Wed':
			$d = "Mit, ".date("d.m.Y", strtotime($date));
			break;

		case 'Thu':
			$d = "Don, ".date("d.m.Y", strtotime($date));
			break;

		case 'Fri':
			$d = "Fre, ".date("d.m.Y", strtotime($date));
			break;

		case 'Sat':
			$d = "Sam, ".date("d.m.Y", strtotime($date));
			break;

		case 'Sun':
			$d = "Son, ".date("d.m.Y", strtotime($date));
			break;
	}

	return $d;
}

?>