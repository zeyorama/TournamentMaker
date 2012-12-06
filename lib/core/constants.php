<?php
  /**
   * @author Frank Kevin Zey
   */

  # DB
  define("DB_HOST", "localhost");
  define("DB_USER", "tournament");
  define("DB_PASS", "yebREeJj85QhuFcM");
  define("DB_SCHEMA", "tournament");

  # user specific constants
  define("USER", 0);
  define("ADMIN", 1);

  define("USER_TABLE_NAME", "_user");

  # game specific constants
  define("GAME_TABLE_NAME", "_game");

  # tournament specific constants
  define("TOUR_TABLE_NAME", "_tour");
  define("TOUR_TYPE_SINGLE_ELIMINATION", "0");
  define("TOUR_TYPE_DOUBLE_ELIMINATION", "1");

?>