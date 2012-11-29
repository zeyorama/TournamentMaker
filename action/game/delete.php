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

  if (!$u->isAdmin()) {
    header("Location: ../../index.php");
    exit();
  }

  $b = Game::delete($_GET['id']);

  switch ($b) {
    case 10101:
    case 10102:
    case 10103:
      header("Location: ../../index.php?f=game&s=list&e=$b");
      exit();

    case 10100:
      header("Location: ../../index.php?f=game&s=list&confirm=game_del");
      exit();
  }

?>