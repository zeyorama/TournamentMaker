<?php
  /**
   * @author Frank Kevin Zey
   */

  if (isset($_GET['s'])) {
    switch($_GET['s']) {

      case 'login':
        include 'user/login.php';
        break;

      case 'register':
        include 'user/register.php';
        break;

      case 'profile':
        include 'user/profile.php';
        break;

      case 'addGame':
        include 'user/addGame.php';
        break;

      case 'delGame':
        include 'user/delGame.php';
        break;

      case 'ingame':
        include 'user/setInGameNick.php';
        break;

      default:
        include '_index.php';
        break;
    }
  } else {
    include '_index.php';
  }

?>