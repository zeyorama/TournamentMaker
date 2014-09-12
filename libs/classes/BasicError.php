<?php
/**
 * BasicError.php
 * 
 * @author: Frank Kevin Zey
 */

abstract class BasicError
{
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
}
?>