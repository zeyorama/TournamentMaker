<?php
  /**
   * @author Frank Kevin Zey
   */

  include '../../epic.php';

  if ($u != NULL) {
    header("Location: ../../index.php");
    exit();
  }

  $b = Game::newGame($_POST);

  switch ($b) {
    case 10101:
    case 10102:
    case 10103:
      header("Location: ../../index.php?f=game&s=add&e=$b");
      exit();

    case 10100:
      header("Location: ../../index.php?f=game&s=list&confirm=game_add");
      exit();
  }

?>