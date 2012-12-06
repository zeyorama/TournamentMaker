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
      errcodes: 101xx
      10100 : no error
      10101 : no db connection
      10102 : wrong/missing datas for new game
      10103 : new game creation failed, error on query
      10104 : wrong id given
      10105 : select game query failed
      10106 : no games found
      10107 : update query failed

      10120 : user already reviewed
      10121 : insert review for game query failed
      10122 : isreviewed query failed
      10123 : select review query failed
      10124 : no reviews found

      10131 : delete query failed
      
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

    private $reviewTable = '_game_review';

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

    public static function delete($id) {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10101;

      $query = "DELETE FROM `_game` WHERE `_id`='$id';";

      if ($db->query($query)) return 10100;

      return 10131;
    }

    public function update($name, $release, $usk, $desc) {
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10101;

      $query = "UPDATE `_game` SET `_name`='$name', `_release`='$release', `_usk`='$usk', `_description`='$desc' WHERE `_id`='{$this->id}';";

      if ($db->query($query)) return 10100;

      return 10107;

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

    /**
     * Gives the ID of this user
     *
     * @return Returns the ID of this user
     */
    public function getID() {
      return $this->id;
    }

    /**
     * Sets a review by user
     *
     * @param $uid The ID of the user
     * @param $rate The given rate by user
     * @param $comment The comment given by user
     *
     * @return Returns true if successfully reviewed, otherwise errorcode
     */
    public function setReview($uid, $rate, $comment) {
      if ($this->isReviewedByUser($uid)) return 10120;

      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10101;

      $query = "INSERT INTO `_game_review`(`user_id`, `game_id`, `_rate`, `_comment`) VALUES('$uid','{$this->id}','$rate','$comment');";

      if (!$db->query($query)) return 10121;

      return true;
    }

    /**
     * Checks, if user has already reviewed this game
     *
     * @param $uid The ID of user
     *
     * @return true if already reviewd or error occured, otherwise false
     */
    public function isReviewedByUser($uid = -1) {
      if ($uid == -1) return false;

      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10101;

      $query = "SELECT * FROM `_game_review` WHERE `user_id`='$uid' AND `game_id`='{$this->id}';";

      if (!($res = $db->query($query))) return 10122;

      if ($res->num_rows < 1) return false;

      return true;
    }

    public function getReviews($num = -1) {
      $limit = "";
      if ($num != -1)
        $limit = "LIMIT 0,$num";
      
      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10101;

      $query = "SELECT * FROM `_game_review` WHERE `game_id`='{$this->id}' ORDER BY `_id` DESC $limit;";

      if (!($res = $db->query($query))) return 10123;

      if ($res->num_rows < 1) return 10124;

      $i = 0;
      $reviews = array();
      while (($review = $res->fetch_assoc()) != NULL) {
        $reviews[$i++] = $review;
      }

      return $reviews;
    }

  }

?>