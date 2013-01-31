<?php
  /**
   * @author Frank Kevin Zey
   */
  # DB
  define("DB_HOST", 'localhost');
  define("DB_USER", 'tournament');
  define("DB_PASS", 'K3BGeDMaauLj4bYJ');
  define("DB_SCHEMA", 'tournament');

# -------------------------------------------------------------- #
  # user specific constants
  define("USER_MIN_PASS_LENGTH", 5);

    # ROLES
  define("USER", 0);
  define("ADMIN", 1);

    # DB
  define("USER_TABLE_NAME", "_user");
  define("USER_COL_ID", "_id");
  define("USER_COL_PASS", "pass");

# -------------------------------------------------------------- #
  # game specific constants
    # DB
  define("GAME_TABLE_NAME", "_game");

    # MISCS
  define("GAME_RATE_STRING_LENGTH", 4);


# -------------------------------------------------------------- #
  # tournament specific constants
    # DB
  define("TOUR_TABLE_NAME", "_tour");
    # GRID TYPES
  define("TOUR_TYPE_SINGLE_ELIMINATION", "0");
  define("TOUR_TYPE_DOUBLE_ELIMINATION", "1");

    # STATUS
  define("TOUR_STATUS_NOT_STARTED", 0);
  define("TOUR_STATUS_PREPARED", 1);
  define("TOUR_STATUS_RUNNING", 2);
  define("TOUR_STATUS_CLOSED", 3);

    # USER ROLE IN TOURNAMENT
  define("TOUR_USER_ROLE_PLAYER", 1);
  define("TOUR_USER_ROLE_ADMIN", 2);
  define("TOUR_USER_ROLE_REFEREE", 4);
  define("TOUR_USER_ROLE_CASTER", 8);
  define("TOUR_USER_ROLE_OWNER", 16);


# -------------------------------------------------------------- #
?>