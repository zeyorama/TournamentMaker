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

  $start = date("Y-m-d H:i:s", strtotime($_POST['tourStart'].' '.$_POST['tourTime'].':00'));

  $e = Tournament::newTournament($name, $start, $game, $maxPlayers, $grid);

  switch ($e) {
    case 10200:
      header("Location: ../../index.php?f=tour&s=tournament&confirm=tour_new");
      exit();

    default:
      header("Location: ../../index.php?f=tour&s=new&e=$e");
      exit();
  }

?>