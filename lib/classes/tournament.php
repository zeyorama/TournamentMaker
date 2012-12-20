<?php
  
  /*************************** includes **************************/


  /**
   * @package lib.classes
   *
   * Class to organize and control tournaments
   *
   * @version 0.0
   *
   * Changelog:
   *
   * @author Frank Kevin Zey
   * Date: 06.12.2012
   */
  final class Tournament {

    /*
      errorcodes: 102xx
      10200 : no errors

      10201 : no db connection
      10202 : insert query for new tournament failed
      10203 : tournament not found
      10204 : no tournaments found
      10205 : select tournament query failed
      10206 : select * tournamens query failed

      10211 : all players from current tournament query failed
      10212 : no players in current tournament
      10213 : player could not be added to tournament
      10214 : tournament full
      10215 : player could not be removed out of this tournament

    */

    /************************* constants *************************/
    

    /************************* variables *************************/
    private $id;
    public $name;
    public $inserted;
    public $start;
    private $game;
    public $playerList;
    public $playerCount;
    public $maxPlayers;
    public $gridType;
    public $owner;
    public $status;

    /************************ constructors ***********************/
    private function __construct() {}

    /************************* functions *************************/
    public static function newTournament($name, $start, $game, $maxPlayers, $gridType) {
      $tour = new Tournament();

      $tour->name = $name;
      $tour->start = $start;
      $tour->game = $game;
      $tour->maxPlayers = $maxPlayers;
      $tour->gridType = $gridType;
      $tour->owner = current_user()->getID();

      return Tournament::createTournament($tour);
    }

    private static function createTournament(Tournament $tour) {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10201;

      $query = "INSERT INTO `_tour`(`name`,`maxPlayers`,`game_id`,`gridType`,`owner`,`_start`) VALUES('{$tour->name}','{$tour->maxPlayers}','{$tour->game}','{$tour->gridType}','{$tour->owner}','{$tour->start}')";

      if (!$db->query($query)) return 10202;

      return 10200;
    }

    private function init($SQLResultHash) {
      $this->id = $SQLResultHash['_id'];
      $this->name = $SQLResultHash['name'];
      $this->inserted = $SQLResultHash['created_at'];
      $this->gridType = $SQLResultHash['gridType'];
      $this->start = $SQLResultHash['_start'];
      $this->game = Game::getGame($SQLResultHash['game_id']);
      $this->maxPlayers = $SQLResultHash['maxPlayers'];
      $this->playerList = $this->getPlayers();
      $this->playerCount = count($this->playerList);
      $this->owner = $SQLResultHash['owner'];
      $this->status = $SQLResultHash['status'];
    }

    public static function getTournament($id = -1) {
      if ($id == -1) return NULL;

      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10201;

      $query = "SELECT * FROM `_tour` WHERE `_id`='$id';";

      if (!($res = $db->query($query))) return 10205;

      if ($res->num_rows < 1) return 10203;

      $tour = new Tournament();

      $tour->init($res->fetch_assoc());

      return $tour;
    }

    public static function getAllTournaments() {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10201;

      $query = "SELECT * FROM `_tour`;";

      if (!($res = $db->query($query))) return 10206;

      if ($res->num_rows < 1) return 10204;

      $tours = array();
      $i = 0;
      while ($t = $res->fetch_assoc()) {
        $tour = new Tournament();
        $tour->init($t);
        $tours[$i++] = $tour;
      }
      
      if ($i < 1) return 10204;

      return $tours;
    }

    public function getPlayers() {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10201;

      $query = "SELECT * FROM `_tour_user` WHERE `tour_id`='{$this->id}';";

      if (!($res = $db->query($query))) return 10211;

      if ($res->num_rows < 1) return 10212;

      $players = array();
      $i = 0;
      while ($t = $res->fetch_assoc()) {
        $players[$i++] = User::getUser($t['user_id']);
      }
      
      if ($i < 1) return 10212;

      return $players;
    }

    public function getGame() {
      return $this->game;
    }

    public function addPlayer(User $player) {
      if ($this->maxPlayers <= count($this->getPlayers)) return 10214;

      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10201;

      $query = "INSERT INTO `_tour_user`(`tour_id`, `user_id`) VALUES('{$this->id}', '{$player->getID()}');";

      if (!$db->query($query)) return 10213;

      return 10200;
    }

    public function remPlayer(User $player) {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10201;

      $query = "DELETE FROM `_tour_user` WHERE `user_id`={$player->getID()} AND `game_id`='{$this->id}';";

      if (!$db->query($query)) return 10215;

      return 10200;
    }

    public function getID() {
      return $this->id;
    }

    public function equals(Tournament $tour) {
      return $this->id == $tour->getID();
    }

  }

?>