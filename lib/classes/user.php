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

    /************************* constants *************************/


    /************************* variables *************************/
    public $id;
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
      $pass = md5($password);

      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10001;

      $u = new User();

      if (!($res = $db->query("SELECT * FROM `".USER_TABLE_NAME."` WHERE `username` LIKE '$username' AND `pass` LIKE '$pass' LIMIT 1;"))) return 10002;

      $user = $res->fetch_assoc();

      $u->id = $user['_id'];
      $u->username = $user['username'];
      $u->email = $user['email'];
      $u->role = $user['role'];
      $u->created_at = $user['created_at'];
      $u->updated_at = $user['updated_at'];
      $u->last_signin = $user['last_signin'];

      $_SESSION['user'] = serialize($u);

      return true;
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
      $pass = md5($password);

      $query = "INSERT INTO ".USER_TABLE_NAME."(username, email, pass) VALUES($username, $email, $pass);";

      $db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

      if ($db->errno) return 10001;

      return $db->query($query);
    }

  }

?>