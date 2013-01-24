<?php
  /**
   * @author Frank Kevin Zey
   */

  if (!isset($_GET['s'])) {
    include 'partial/game/list.php';
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
      
    case 'edit':
      include 'partial/game/edit.php';
      break;
      
    case 'review':
      include 'partial/game/review.php';
      break;

    case 'my':
      include 'partial/game/my.php';
      break;

    default:
      include 'partial/game/list.php';
      break;
  }

?>