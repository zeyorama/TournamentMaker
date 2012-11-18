<?php
  /**
   * @author Frank Kevin Zey
   */

  include '../../epic.php';
?>
<?php

  session_unset(session_id());
  session_destroy();
  
  header("Location: ../../");

?>