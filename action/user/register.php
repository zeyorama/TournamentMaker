<?php
  /**
   * @author Frank Kevin Zey
   */

  include '../../epic.php';

  $username = $_POST['user_username'];
  $email = $_POST['user_email'];
  $password = $_POST['user_pass'];

  if ($username == '' || $email == '' || $password == '') {
    header("Location: ../../index.php?f=user&s=register&e=10099");
    exit();

  }

  $u = User::register($username, $email, $password);

  if ($u != 10000) {
    header("Location: ../../index.php?f=user&s=register&e=$u");
    exit();

  }

  header("Location: ../../index.php?f=user&s=login&confirm=user_register");

?>