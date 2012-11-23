<?php
  /**
   * @author Frank Kevin Zey
   */

  include '../../epic.php';

  $e = Game::getGame($_POST['id'])->update($_POST['name'],$_POST['release'],$_POST['usk'],$_POST['description']);

  if ($e == 10100) {
    header("Location: ../../index.php?f=game&s=list&confirm=game_edit");
    exit();
  
  }
  
  header("Location: ../../index.php?f=game&s=edit&e=$e");

?>