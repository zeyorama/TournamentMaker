<?php
  /**
   * @author Frank Kevin Zey
   */

  include '../../epic.php';

  $u = current_user();

  if ($u == NULL) {
    header("Location: ../../index.php");
    exit();
  }

  if ($u->hasGame($_GET['id'])) {
    header("Location: ../../index.php?f=game&e=10013");
    exit();
  }

  $e = $u->addGame($_GET['id']);

  if ($e == 10000) {
    header("Location: ../../index.php?f=game&s=list&confirm=user_game_add");
    exit();
  
  }
  
  header("Location: ../../index.php?f=game&e=$e");

?>