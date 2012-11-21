<?php
  /**
   * @author Frank Kevin Zey
   */

  include '../../epic.php';
?>
<?php

  $errcode = User::login($_POST['user_username'], $_POST['user_pass']);

  if ($errcode == 10000) {
    header("Location: ../../index.php?f=user&s=profile&confirm=user_login");
    exit();

  }

  header("Location: ../../index.php?f=user&s=login&e=$errcode");  

?>