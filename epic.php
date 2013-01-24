<?php
  /**
   * @author Frank Kevin Zey
   */

  # setting timezone
  date_default_timezone_set('Europe/Berlin');

  if (isset($_SESSION['user'])) {
    if (isset($_SESSION['LAST_ACTIVITY']) &&
        (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
      // session already expired
      session_destroy();   // destroy session data in storage
      session_unset();     // unset $_SESSION variable for the runtime

      # restarting session
      session_name("TournamentMaker");
      session_start();
    }

  } else {
    # starting new session
    session_name("TournamentMaker");
    session_start();
  }

  include 'lib/core.php';

  $u = current_user();
?>