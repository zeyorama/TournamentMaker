<?php
  
  /*************************** includes **************************/


  /**
   * @package lib.classes
   *
   * Game class to manage game informations and operations
   * errcodes: 101xx
   *
   * @version 0.0
   *
   * @author Frank Kevin Zey
   * Date: 22.11.2012
   */
  final class Game {

    /*
      errcodes: 100xx
      10100 : no error
      10101 : no db connection
      10102 : wrong/missing datas for new game
      10103 : new game creation failed, error on query
      10104 : wrong id given
      10105 : select game query failed
      10106 : no games found

     */

    /************************* constants *************************/
    

    /************************* variables *************************/
    private $id;
    public $name;
    public $description;
    public $release;
    public $usk;
    public $created_at;
    public $updated_at;

    /************************ constructors ***********************/
    private function __construct() {}

    /************************* functions *************************/
    /**
     * Creates a new game entry in DB
     *
     * @param $hash - a hash with keys (name, description) and the values
     *
     * @return true if success, otherwise errcode
     */
    public static function newGame($hash) {
      foreach ($hash as $key => $value) {
        switch ($key) {
          case 'name':
            if ($value == '') { return 10102; }

          case 'description':
            if ($value == '') { return 10102; }
        }
      }
      
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10101;

      $query = "INSERT INTO `_game`(`_name`,`_description`,`_release`,`_usk`,`created_at`) VALUES('{$hash['name']}','{$hash['description']}','{$hash['release']}','{$hash['usk']}',current_timestamp);";

      if ($db->query($query))
        return 10100;

      return 10103;
    }

    /**
     * Gives a new game object with specified ID
     *
     * @param $id - The id of game to looking for; default -1 if no param given
     *
     * @return Returns the game object on success, otherwise errorcode
     */
    public static function getGame($id = -1) {
      if ($id == -1) return 10104;

      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10101;

      $query = "SELECT * FROM `_game` WHERE `_id`='$id';";

      if (!($res = $db->query($query))) return 10105;

      if ($res->num_rows < 1) return 10106;

      $game = $res->fetch_assoc();

      $g = new Game();

      $g->id = $game['_id'];
      $g->name = $game['_name'];
      $g->description = $game['_description'];
      $g->release = $game['_release'];
      $g->usk = $game['_usk'];
      $g->created_at = $game['created_at'];
      $g->updated_at = $game['updated_at'];

      return $g;
    }

    /**
     * Returns a list (array) of all games
     *
     * @return Returns a array of all games as game objects, otherwise errorcode
     */
    public static function getAllGamesArray() {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10101;

      $query = "SELECT * FROM `_game`;";

      if (!($res = $db->query($query))) return 10105;

      if ($res->num_rows < 1) return 10106;

      $games = array();
      $i = 0;

      while ($g = $res->fetch_assoc()) {
        $game = new Game();

        $game->id = $g['_id'];
        $game->name = $g['_name'];
        $game->description = $g['_description'];
        $game->release = $g['_release'];
        $game->usk = $g['_usk'];
        $game->created_at = $g['created_at'];
        $game->updated_at = $g['updated_at'];

        $games[$i++] = $game;
      } 

      return $games;     
    }

    public function getID() {
      return $this->id;
    }

  }

?>