<?php
  /**
   * @author Frank Kevin Zey
   */

  include '../../epic.php';

  if (current_user() == NULL) {
    header("Location: ../../index.php");
    exit();
  }

  $name = $_POST['tourName'];
  $game = $_POST['tourGame'];
  $maxPlayers = $_POST['tourMaxPlayer'];
  $grid = $_POST['tourGrid'];

  

?>