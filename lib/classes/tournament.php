<?php
  
  /*************************** includes **************************/


  /**
   * @package lib.classes
   *
   * CLASS DESCRIPTION
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

    */

    /************************* constants *************************/
    

    /************************* variables *************************/
    private $id;
    public $name;
    public $inserted;
    public $start;
    public $game;
    public $playerList;
    public $playerCount;
    public $maxPlayers;
    public $gridType;
    public $owner;

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

      return createTournament($tour);
    }

    private static function createTournament($tour) {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10201;

      $query = "INSERT INTO `_tour`() VALUES()";

      if (!$db->query($query)) return 10202;

      return 10200;
    }

    private function init($SQLResultHash) {
      $this->id = $SQLResultHash['_id']
      $this->name = $SQLResultHash['name'];
      $this->inserted = $SQLResultHash['created_at'];
      $this->gridType = $SQLResultHash['gridType'];
      $this->start = $SQLResultHash['_start'];
      $this->game = Game::getGame($SQLResultHash['game_id']);
      $this->maxPlayers = $SQLResultHash['maxPlayers'];
      $this->playerList = $this->getPlayers();
      $this->playerCount = count($this->playerList);
      $this->owner = $SQLResultHash['owner']
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

      $query = "SELECT * FROM `_tour` WHERE `_id`='$id';";

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
    }

  }

?>