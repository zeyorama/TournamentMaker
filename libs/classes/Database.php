<?php
/**
 * Handles database connections and queries, aswell as result sets.
 * 
 * Version 1.0: 2015-08-04 fkzey
 * 	- initial code
 * 
 * @author Frank Kevin Zey
 */
class Database extends BasicError
{
	private $db;

	private $state;
	private $results;

	private static $DB_ADDRESS = 'localhost';
	private static $DB_USER    = 'TM';
	private static $DB_PASS    = 'dS7H3wvwStrPtxqC';
	private static $DB_SCHEMA  = 'TM';

	/**
	 * Builds a connection to the TM Database.
	 */
	public
	function __construct()
	{
		parent::__construct(0);

		$this->db 			= new Mysqli(Database::$DB_ADDRESS, Database::$DB_USER, Database::$DB_PASS, Database::$DB_SCHEMA);

		$this->errno 		= $this->db->errno;
		$this->error 		= $this->db->error;
		$this->state 		= $this->db->sqlstate;

		$this->results	= array();
	}

	/**
	 * Closes the connection to the TM Database,
	 * also frees all result sets by executed queries.
	 */
	public
	function __destruct()
	{
		foreach ($this->results as $i => $r)
			$r->free();

		$this->db->close();
	}

	/**
	 * Executes the given query and returns the result.<br>
	 * <b>HINT</b>: Query needs to be escaped with $db->Escape().
	 *
	 * @param String $escaped_query_string Escaped query to be executed.
	 * @return <b>MySQLi_result</b> Result of query.
	 */
	public
	function query($escaped_query_string)
	{
		$res					= $this->db->query( $escaped_query_string );

		$this->errno	= $this->db->errno;
		$this->error	= $this->db->error;
		$this->state	= $this->db->sqlstate;

		if ( is_object( $res ) ) $this->results[] =& $res;

		return $res;
	}

	/**
	 * executes real_escape_string for $value.
	 *
	 * @param multi $value Value to be escaped.
	 * @return string Escaped value.
	 */
	public function Escape($value) { return $this->db->real_escape_string( $value ); }

	/**
	 * Returns the SQLState for the last executed query.
	 *
	 * @return <b>number</b> SQLState.
	 */
	public function SQLState()
	{
		$state 				= $this->state;
		$this->state 	= 0;

		return $state;
	}

	/**
	 * Returns the ID of the last inserted row.
	 *
	 * @return <b>number</b> ID.
	 */
	public function InsertedID() { return $this->db->insert_id; }

}
?>