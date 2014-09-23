<?php
/**
 * User.php
 * 
 * GSD Geographic Systems DataService AG 2014
 * Author: Frank Kevin Zey
 */

class User extends BasicError
{
	const TABLE    = 'user';
	
	const ID       = 'id';
	const USERNAME = 'username';
	const EMAIL    = 'email';
	const TYPE     = 'userType_id';
	const CREATED  = 'created_at';
	const UPDATED  = 'last_updated';
	
	const SESSION  = 'session_tkn';
	
	private $username = 'error';
	private $email    = 'error';
	private $type     = NULL;
	private $created  = NULL;
	private $updated  = NULL;
	private $password = 'error';
	private $session  = NULL;
	
	public
	function __construct($id)
	{
		if (!is_numeric($id))
		{
			parent::__construct(-1);
			
			$this->errno = BasicError::NO_NUMERIC_ID;
			$this->error = 'Given ID is invalid.';
			
			return;
		}
		
		parent::__construct($id);
		
		$db = new Database();
		
		if ($db->hasError())
		{
			$this->errno = $db->ErrCode();
			$this->error = $db->ErrMsg();
			
			return;
		}
		
		$query = "SELECT * FROM `" . self::TABLE . "` WHERE `" . self::ID . "` = " . $id . ";";
		
		$res = $db->query($query);
		
		if ($db->hasError())
		{
			$this->errno = $db->ErrCode();
			$this->error = $db->SQLState() . ':' . $db->ErrMsg();
			
			return;
		}
		
		if ($res->num_rows != 1)
		{
			$this->errno = BasicError::INVALID_RESULT;
			$this->error = 'No user found.';
			
			return;
		}
		
		$data = $res->fetch_assoc();

		$this->id       = $data[self::ID];
		$this->created  = $data[self::CREATED];
		$this->updated  = $data[self::UPDATED];
		$this->username = $data[self::USERNAME];
		$this->email    = $data[self::EMAIL];
		$this->type     = $data[self::TYPE];
		$this->password = $data['pass'];
		$this->session  = $data[self::SESSION];
		
		return;
	}
	
	public static
	function BySessionToken($token)
	{
		if (!is_string($token)) return NULL;
		
		$db = new Database();
		
		if ($db->hasError()) return NULL;
		
		$query = "SELECT `" . User::ID . "` FROM `" . User::TABLE . "` WHERE `" . User::SESSION . "`='" . $db->Escape($token) . "';";
		
		$res = $db->query($query);
		
		if ($db->hasError() || $res->num_rows != 1) return NULL;
		
		$data = $res->fetch_assoc();
		
		return new User($data[User::ID]);
	}
	
	public
	function Login($username, $drowssap)
	{
		$user = self::__loadForLogin($username, md5($drowssap));
		
		if (!$user) return NULL;
		
		$session_tkn = sha1(md5(time() . $this->name . '-' . $this->id), false);
		
		$db = new Database();
		
		if ($db->hasError())
		{
			$this->errno = $db->ErrCode();
			$this->error = $db->ErrMsg();
				
			return false;
		}
		
		$query = "UPDATE `" . User::TABLE . "` SET `" . User::SESSION . "`='" . $session_tkn . "', `" . User::UPDATED . "`=current_timestamp WHERE `" . User::ID . "` = " . $user->id . ";";
		
		$db->query($query);
		
		if ($db->hasError())
		{
			$this->errno = $db->ErrCode();
			$this->error = $db->SQLState() . ':' . $db->ErrMsg();
				
			return false;
		}
		
		$user->session = $session_tkn;
		
		return $user;
	}
	
	private
	function __loadForLogin($name, $pass)
	{
		$db = new Database();
		
		if ($db->hasError()) return NULL;
		
		$query = "SELECT `" . User::ID . "` FROM `" . user::TABLE . "` WHERE `" . User::USERNAME . "` = '" . $db->Escape($name) . "' AND `pass`='" . $pass . "';";
		
		$res = $db->query($query);
		
		if ($db->hasError() || $res->num_rows != 1) return NULL;
		
		$data = $res->fetch_assoc();
		
		return new User($data[User::ID]);
	}
	
}
?>