<?php
  /**
   * @author Frank Kevin Zey
   */

  if (isset($_GET['s'])) {
    switch($_GET['s']) {

      case 'login':
        include 'user/login.php';
        break;

      default:
        include 'user/default.php';
        break;
    }
  } else {
    include 'user/default.php';
  }

?>