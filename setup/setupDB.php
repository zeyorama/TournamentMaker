<?php

  include 'core.php';

  $rootUser = $_POST['rootUsername'];
  $rootPass = $_POST['rootPassword'];

  $db = new Mysqli('localhost', $rootUser, $rootPass);

  if ($db->errno) {
    header("Location: ../setup.php?s=createDB&e=1");
    exit();

  }

  $newUser = $_GET['username'];
  $newPass = $_GET['password'];
  $newDBName = $_GET['DBName'];

  if ( !$db->multi_query(getCreationQuery($newUser, $newPass, $newDBName)) ) {
    header("Location: ../setup.php?s=createDB&e=2");
    exit();

  }

  if ( !$db->multi_query(getCreationTableQuery()) ) {
    header("Location: ../setup.php?s=createDB&e=3");
    exit();

  }

  $_SESSION['db'] = array('username' => $newUser, 'password' => $newPass, 'DBName' => $newDBName);

  header("Location: ../setup.php?s=createAdmin&confirm=createDB");

?>