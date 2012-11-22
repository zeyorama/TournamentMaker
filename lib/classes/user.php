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

      10098 : registration failed, query wrong or wrong values

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

      $db->query("UPDATE `_user` SET `last_signin`='{$u->last_signin}' WHERE `_id`={$u->id};");
      $db->close();

      return 10000;
    }

    public function getID() {
      return $this->id;
    }

    public function updateUser($keyValueNew) {
      $db->query("UPDATE `_user` SET `last_signin`='{$u->last_signin}' WHERE `_id`={$u->id};");
      $db->close();

    }

    public function isAdmin() {
      return $this->role == ADMIN;
    }

    public function hasGame() {
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

  }

?>