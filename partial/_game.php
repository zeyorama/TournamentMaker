<?php
  /**
   * @author Frank Kevin Zey
   */

  if (!isset($_GET['s'])) {
    include 'partial/_index.php';
    exit();

  }

  switch($_GET['s']) {
    case 'list':
      include 'partial/game/list.php';
      break;
      
    case 'add':
      include 'partial/game/add.php';
      break;
      
    case 'delete':
      include 'partial/game/delete.php';
      break;

    default:
      include 'partial/_index.php';
      break;
  }

?>