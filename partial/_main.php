<?php
  /**
   * @author Frank Kevin Zey
   */

  if (!isset($_GET['s'])) {
    include 'partial/_index.php';
    exit();

  }

  switch($_GET['s']) {
    case 'impress':
      include 'partial/main/impress.php';
      break;

    default:
      include 'partial/_index.php';
      break;
  }

?>