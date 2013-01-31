<?php

  include 'core.php';

  $User = $_SESSION['db']['username'];
  $Pass = $_SESSION['db']['password'];
  $DBName = $_SESSION['db']['DBName'];

  $admin = $_POST['adminUsername'];
  $email = $_POST['adminEmail'];
  $password = $_POST['adminPassword'];

  $db = new Mysqli('localhost', $User, $Pass, $DBName);

  if ($db->errno) {
    header("Location: ../setup.php?s=createAdmin&e=5");
    exit();

  }

  $query = "INSERT INTO `_user`(`username`, `pass`, `email`, `role`) VALUES('$admin', '$email', '$password', '1');";

  if (!$db->query($query)) {
    header("Location: ../setup.php?s=createAdmin&e=6");
    exit();

  }

  if ( ($file = fopen("../config.php", 'w')) == NULL ) {
    if (!isset($_POST['error']))
      $db->query("TRUNCATE `_user`;");

    $e = isset($_POST['error'])?'8':'7';
    header("Location: ../setup.php?s=createAdmin&e=$e");
    exit();

  }

  $db->close();

  $config = '<?php
  # DB
  define("DB_HOST", "localhost");
  define("DB_USER", "'.$User.'");
  define("DB_PASS", "'.$Pass.'");
  define("DB_SCHEMA", "'.$DBName.'");
?>';

  fwrite($file, $config);
  fclose($file);

  unset($_SESSION['db']);

  header("Location: ../setup.php?s=finish&confirm=createAdmin");

?>