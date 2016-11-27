<?php 

namespace Core;
use App\Config;

class Database{
	private $connection;

	function __construct()
	{
		$this->open_db_connection();
	}

	function get_connection()
	{
		return $this->connection;
	}

	public function open_db_connection()
	{
		$this->connection = new \mysqli(Config::DB_HOST,Config::DB_USER,Config::DB_PASSWORD,Config::DB_NAME) or die(mysqli_error($this->connection));
	}

	public function query($sql)
	{

		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
		return $result;
	}

	private function confirm_query($result)
	{
		if($result)
		{
			die("query failed");
		}
	}

	public function escape_string($string)
	{
		$escaped_string = mysqli_real_escape_string($this->connection,$string);
		return $escaped_string;
	}

	public function insert_id()
	{
		return mysqli_insert_id($this->connection);
	}
}
 ?>