<?php
  /**
   * @author Frank Kevin Zey
   */

  # include 'core/'
  include 'core/constants.php';
  
  #include 'classes/'
  include 'classes/user.php';

  /**
   * Returns the user object of the current logged in user.
   *
   * @return The current user, otherwise NULL
   */
  function current_user() {
    if (isset($_SESSION['user'])) {
      return unserialize($_SESSION['user']);
    }

    return NULL;
  }
?>