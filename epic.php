<?php
  /**
   * @author Frank Kevin Zey
   */

  session_name("TournamentMaker");
  session_start();

  # setting timezone
  date_default_timezone_set('Europe/Berlin');

  include 'lib/core.php';
?>