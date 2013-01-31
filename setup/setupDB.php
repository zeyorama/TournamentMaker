<?php

  include 'core.php';

  $rootUser = $_POST['rootUsername'];
  $rootPass = $_POST['rootPassword'];

  $db = new Mysqli('localhost', $rootUser, $rootPass, '');

  if ($db->errno) {
    header("Location: ../setup.php?s=createDB&e=1");
    exit();

  }

  $newUser = $_POST['username'];
  $newPass = $_POST['password'];
  $newDBName = $_POST['DBName'];

  if ( !$db->multi_query(getCreationQuery($newUser, $newPass, $newDBName)) ) {
    $db->close();
    header("Location: ../setup.php?s=createDB&e=2");
    exit();

  }

  $db->close();

  $db = new Mysqli('localhost', $newUser, $newPass, $newDBName);

  if ($db->errno) {
    $db = new Mysqli('localhost', $rootUser, $rootPass);

    $db->multi_query("DROP DATABASE `$newDBName`; DROP USER $newUser;");
    $db->close();

    header("Location: ../setup.php?s=createDB&e=4");
    exit();

  }

  foreach (getCreationTableQuery() as $query)
    if ( !$db->query($query) ) {
      $db->close();
      header("Location: ../setup.php?s=createDB&e=3");
      exit();

    }

  $_SESSION['db'] = array('username' => $newUser, 'password' => $newPass, 'DBName' => $newDBName);

  header("Location: ../setup.php?s=createAdmin&confirm=createDB");

?>