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

  if (!$u->hasGame($_POST['GID'])) {
    header("Location: ../../index.php?f=game&e=10014");
    exit();
  }

  $e = $u->setInGameNick($_POST['GID'], $_POST['nick']);

  if ($e == 10000) {
    header("Location: ../../index.php?f=user&s=profile&confirm=ingame_add");
    exit();
  
  }
  
  header("Location: ../../index.php?f=game&e=$e");

?>