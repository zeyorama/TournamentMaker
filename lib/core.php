<?php
  /**
   * @author Frank Kevin Zey
   */

  # include 'core/'
  include 'core/sysconst.php';
  include 'core/constants.php';
  
  #include 'classes/'
  include 'classes/game.php';
  include 'classes/user.php';
  include 'classes/tournament.php';

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

  function setValue($v) {
    echo "value='$v'";
  }

  function SYSNAME() {
    echo SYS_NAME;
  }

  function SYSVERSION() {
    echo SYS_VERSION;
  }

  function SYSBUILD() {
    echo SYS_BUILD;
  }

  function printName() {
    echo SYSNAME();
  }

  function printVersion() {
    echo "v.".SYS_VERSION." build ".SYS_BUILD;
  }

  function printMotto() {
    echo SYS_MOTTO;
  }

  function printOption($value, $title) {
    return "<option value='$value'>$title</option>";
  }
?>