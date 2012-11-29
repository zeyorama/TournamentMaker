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
    header("Location: ../../index.php?");
    exit();
  }

  $e = Game::getGame($_POST['id'])->update($_POST['name'],$_POST['release'],$_POST['usk'],$_POST['description']);

  if ($e == 10100) {
    header("Location: ../../index.php?f=game&s=list&confirm=game_edit");
    exit();
  
  }
  
  header("Location: ../../index.php?f=game&s=edit&e=$e");

?>