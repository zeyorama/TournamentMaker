<?php
  include '../../epic.php';

  if ($u == NULL) {
    header("Location: ../../index.php");
    exit();
  }

  $e = $u->resetPassword($_POST);

  switch ($e) {
    case 10000:
      header("Location: ../../index.php?f=user&s=profile&confirm=user_reset_password");
      break;
    
    default:
      header("Location: ../../index.php?f=user&s=rP&e=$e");
      break;
  }
?>