<?php
  /**
   * @author Frank Kevin Zey
   */

  if (!isset($_GET['s'])) {
    include 'partial/tour/list.php';
    exit();

  }

  switch($_GET['s']) {
    case 'list':
      include 'partial/tour/list.php';
      break;
      
    case 'new':
      include 'partial/tour/new.php';
      break;
      
    case 'delete':
      include 'partial/tour/delete.php';
      break;
      
    case 'edit':
      include 'partial/tour/edit.php';
      break;
      
    case 'tournament':
      include 'partial/tour/tournament.php';
      break;
      
    case 'bracket':
      include 'partial/tour/bracket.php';
      break;
      
    case 'players':
      include 'partial/tour/players.php';
      break;

    default:
      include 'partial/tour/list.php';
      break;
  }

?>