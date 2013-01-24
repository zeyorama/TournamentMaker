<?php
  
  /*************************** includes **************************/
  
  
  /**
   * @package lib.classes
   *
   * User class to handle user specific operations
   * errcodes:  100xx
   *
   * @version 0.0
   *
   * @author Frank Kevin Zey
   * Date: 18.11.2012
   */
  final class User {

    /*
      errcodes: 100xx
      10000 : no error
      10001 : no db connection
      10002 : login query wrong
      10003 : login failed, username/password wrong
      10004 : no user with $(id)

      10011 : query error to look for games this user has
      10012 : this user has no games
      10013 : user already has game
      10014 : user doesn't have game
      10015 : query to delete game of user failed
      10016 : query to insert game of user failed
      10017 : user doesn't have any games
      10018 : ingame nick name update failed

      10021 : get all tournaments query failed
      10022 : no tournaments found
      
      10098 : registration failed, query wrong or wrong values
      10099 : wrong register values

     */

    /************************* constants *************************/


    /************************* variables *************************/
    private $id;
    public $username;
    public $email;
    public $role;
    public $created_at;
    public $updated_at;
    public $last_signin;
    public $game_nick;

    private $games = NULL;

    /************************ constructors ***********************/
    private function __construct() {}

    /************************* functions *************************/
    /**
     * Looks for user in DB
     *
     * @param $username
     * @param $password
     *
     * @return Returns true if user is saved in DB, otherwise errorcode
     */
    public static function login($username, $password) {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno)
        return 10001;

      $u = new User();

      if (!($res = $db->query("SELECT * FROM `_user` WHERE `username` LIKE '".$username."' AND `pass` LIKE md5('".$password."') LIMIT 1;")))
        return 10002;

      if ($res->num_rows < 1)
        return 10003;
      
      $user = $res->fetch_assoc();

      $u->id = $user['_id'];
      $u->username = $user['username'];
      $u->email = $user['email'];
      $u->role = $user['role'];
      $u->created_at = $user['created_at'];
      $u->updated_at = $user['updated_at'];
      $u->last_signin = date("Y-m-d H:i:s");

      $_SESSION['user'] = serialize($u);

      $u->updateLastSignIn($db, date("Y-m-d H:i:s"));

      $db->close();

      return 10000;
    }

    public function getID() {
      return $this->id;
    }

    public function updateLastSignIn($db, $last_signin) {
      $db->query("UPDATE `_user` SET `last_signin`='$last_signin', `updated_at`='$last_signin' WHERE `_id`={$this->id};");
      
    }

    public function setInGameNick($gameId, $nick) {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno)
        return 10001;

      if (!($res = $db->query("UPDATE `_user_game` SET `ingame_nick`='$nick' WHERE `game_id`='$gameId' AND `user_id`='{$this->id}';")))
        return 10018;

      return 10000;
    }

    public function isAdmin() {
      return $this->role == ADMIN;
    }

    public function addGame($game_id) {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno)
        return 10001;

      if (!($res = $db->query("INSERT INTO `_user_game`(`user_id`,`game_id`) VALUES('".$this->id."','$game_id');")))
        return 10016;

      return 10000;
    }

    public function delGame($id) {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno)
        return 10001;

      if (!($res = $db->query("DELETE FROM `_user_game` WHERE `user_id`='".$this->id."' AND `game_id`='".$id."';")))
        return 10016;

      $this->games = NULL;

      return 10000;
    }

    public function getGames() {
      if ($this->games != NULL) return $this->games;

      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno)
        return 10001;

      if (!($res = $db->query("SELECT * FROM `_user_game` WHERE `user_id`='".$this->id."';")))
        return 10011;

      if ($res->num_rows < 1)
        return 10017;

      $i = 0;

      while ($r = $res->fetch_assoc()) {
        if (is_int(($g = Game::getGame($r['game_id'])))) continue;

        $games[$i++] = $g;
        $this->game_nick[$g->getID()] = $r['ingame_nick'];
      }

      $db->close();

      if (count($games) < 1) { $this->games == NULL; return 10012; }

      $this->games = $games;

      unset($_SESSION['user']);
      $_SESSION['user'] = serialize($this);

      return $this->games;
    }

    public function hasGame($id) {
      if ($this->games == NULL) {
        $this->games = $this->getGames();

        switch ($this->games) {
          case 10001:
          case 10011:
          case 10012:
          case 10017:
            $this->games = NULL;
            return false;
        }
      }

      foreach ($this->games as $g) {
        if ($g->getID() == $id) return true;
      }

      return false;
    }

    public static function getUser($id) {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno)
        return 10001;

      if (!($res = $db->query("SELECT * FROM `_user` WHERE `_id` LIKE '".$id."' LIMIT 1;")))
        return 10002;

      if ($res->num_rows < 1)
        return 10004;
      
      $u = new User();

      $user = $res->fetch_assoc();

      $u->id = $user['_id'];
      $u->username = $user['username'];
      $u->email = $user['email'];
      $u->role = $user['role'];
      $u->created_at = $user['created_at'];
      $u->updated_at = $user['updated_at'];
      $u->last_signin = $user['last_signin'];

      return $u;
    }

    /**
     * Saves a new user to DB
     *
     * @param $username
     * @param $email
     * @param $password
     *
     * @return true if new user is saved, otherwise errorcode
     */
    public static function register($username, $email, $password) {
      $query = "INSERT INTO `_user`(`username`, `email`, `pass`) VALUES('".$username."', '".$email."', md5('".$password."'));";

      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno)
        return 10001;

      if ($db->query($query))
        return 10000;

      return 10098;
    }

    public function getTournaments() {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno)
        return 10001;

      if (!($res = $db->query("SELECT * FROM `_tour_user` WHERE `user_id` = '".$this->id."' ORDER BY `_id` DESC;")))
        return 10021;

      if (!($res2 = $db->query("SELECT * FROM `_tour` WHERE `owner`='{$this->id}' ORDER BY `_id` DESC;")))
        return 10021;
      
      $t = array();
      $i = 0;
      while ($tz = $res2->fetch_assoc())
        $t[$i++] = Tournament::getTournament($tz['_id']);

      while ($zt = $res->fetch_assoc()) {
        $thisTour = Tournament::getTournament($zt['tour_id']);
        
        foreach ($t as $tournament)
          if ($tournament->equals($thisTour)) break;

        $t[$i++] = $thisTour;
      }

      if ($i < 1) return 10022;

      return $t;
    }

    public function getTournamentsFinished() {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno)
        return 10001;

      if (!($res = $db->query("SELECT * FROM `_tour_user` WHERE `user_id` = '".$this->id."' ORDER BY `_id` DESC;")))
        return 10021;

      if (!($res2 = $db->query("SELECT * FROM `_tour` WHERE `owner`='{$this->id}' ORDER BY `_id` DESC;")))
        return 10021;
      
      $t = array();
      $i = 0;
      while ($tz = $res2->fetch_assoc()) {
        $t[$i++] = Tournament::getTournament($tz['_id']);
      }

      while ($zt = $res->fetch_assoc()) {
        $thisTour = Tournament::getTournament($zt['tour_id']);
        $b = false;
        foreach ($t as $tournament) {
          if ($tournament->equals($thisTour)) {
            $b = true;
            break;
          }
        }
        $t[$i++] = $thisTour;
      }

      if ($i < 1) return 10022;

      $j = 0;
      $tt = array();
      foreach ($t as $tournaments) {
        if ($tournaments->status != 2) continue;

        $tt[$j++] = $tournaments;
      }

      if ($j < 1) return 10022;

      return $tt;
    }

    public function getTournamentsUpcoming() {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno)
        return 10001;

      if (!($res = $db->query("SELECT * FROM `_tour_user` WHERE `user_id` = '".$this->id."' ORDER BY `_id` DESC;")))
        return 10021;

      if (!($res2 = $db->query("SELECT * FROM `_tour` WHERE `owner`='{$this->id}' ORDER BY `_id` DESC;")))
        return 10021;
      
      $t = array();
      $i = 0;
      while ($tz = $res2->fetch_assoc()) {
        $t[$i++] = Tournament::getTournament($tz['_id']);
      }

      while ($zt = $res->fetch_assoc()) {
        $thisTour = Tournament::getTournament($zt['tour_id']);
        $b = false;
        foreach ($t as $tournament) {
          if ($tournament->equals($thisTour)) {
            $b = true;
            break;
          }
        }
        $t[$i++] = $thisTour;
      }

      if ($i < 1) return 10022;

      $j = 0;
      $tt = array();
      foreach ($t as $tournaments) {
        if ($tournaments->status == 2) continue;

        $tt[$j++] = $tournaments;
      }

      if ($j < 1) return 10022;

      return $tt;
    }

    public function getMyTournaments() {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno)
        return 10001;

      if (!($res2 = $db->query("SELECT * FROM `_tour` WHERE `owner`='{$this->id}' ORDER BY `_id` DESC;"))) return 10221;
      
      $t = array();
      $i = 0;
      while ($tz = $res2->fetch_assoc()) {
        $t[$i++] = Tournament::getTournament($tz['_id']);
      }

      if ($i < 1) return 10022;

      $j = 0;
      $tt = array();
      foreach ($t as $tournaments) {
        if ($tournaments->status == 2) continue;

        $tt[$j++] = $tournaments;
      }

      if ($j < 1) return 10022;

      return $tt;
    }

    /**
     * Compares two user objects, if they are equal by ID
     *
     * @param Object to be compared
     *
     * @return true, if equal, otherwise false
     */
    public function equals($object) {
      if (!($object instanceof User))
        return false;

      if ($this->id == $object->getID())
        return true;

      return false;
    }

  }

?>