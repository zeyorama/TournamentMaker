<?php
/**
 * BasicError.php
 * 
 * @author: Frank Kevin Zey
 */

abstract class BasicError
{
	const NO_DB_CONNECTION  = 0xFFFFFFFF;
	const DB_TIMEOUT        = 0xFFFFFFFE;

	const NO_RESULT         = 0xEFFFFFFF;
	const NO_OBJECT         = 0xEFFFFFFE;
	const NO_NUMERIC_ID     = 0xEFFFFFFD;
	const INVALID_GEN_QUERY = 0xEFFFFFFC;
	const INVALID_RESULT    = 0xEFFFFFFB;
#	const NO_RESULT         = 0xEFFFFFFA;
	
	protected $id;
	
	protected $errno;
	protected $error;
	
	public
	function __construct($id)
	{
		$this->id    = intval($id);
		
		$this->errno = 0;
		$this->error = 'no errors';
	}
	
	/**
	 * The ID of the current object.
	 * 
	 * @return number ID
	 */
	public final function ID() { return $this->id; }
	
	/**
	 * Returns the last registered error code and resets it.
	 * 
	 * @return number Error code
	 */
	public final function ErrCode()
	{
		$errno       = $this->errno;
		$this->errno = 0;
		
		return $errno;
	}
	
	/**
	 * Returns the last registered error message and resets it.
	 * 
	 * @return string Error message
	 */
	public final function ErrMsg()
	{
		$error       = $this->error;
		$this->error = 'no errors';
		
		return $error;
	}
	
	/**
	 * Returns if an error has occured.
	 * 
	 * @return boolean <i>true</i> if error occured, otherwise <i>false</i>.
	 */
	public function hasError()   { return $this->errno != 0; }
}
?>