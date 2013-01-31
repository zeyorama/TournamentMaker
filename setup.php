<?php

  /* ******************************************************** */
  # TournamentMaker Setup Script
  # 
  # written by Frank Kevin Zey - fkz.dev@hotmail.de
  # 
  # This script generates the Database and its configuration
  # and stores all in the config.php file. If a config.php
  # file already exists, setup.php will automatically
  # redirect back to index.php.
  /* ******************************************************** */

  include 'setup/core.php';

  if (file_exists("./config.php")) {
    header("Location: index.php");
    exit();

  }

  include 'setup/setup/setup.php';

?>