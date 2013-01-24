<?php
  /**
   * @author Frank Kevin Zey
   */

  include '../../epic.php';

  $game = Game::getGame($_POST['GID']);

  if (($u = current_user()) == NULL) {
    header("Location: ../../index.php");
    exit();

  }

  $e = $game->setReview($u->getID(), $_POST['rate'], str_replace("\n", "<br>", $_POST['comment']));

  if ($e != 10100) {
    header("Location: ../../index.php?f=game&s=review&game={$game->getID()}&e=$e");
    exit();

  }

  header("Location: ../../index.php?f=game&s=review&game={$game->getID()}&confirm=add_review");

?>