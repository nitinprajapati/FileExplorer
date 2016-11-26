<?php
class _dbConnection{
	public static $username = "root";
	public static $password = "";
	public static $host		= "127.0.0.1";
	public static $dbName	= "chatapplication";

	public static function conn(){
		$db	= new mysqli('p:'.self::$host, self::$username, self::$password, self::$dbName, 3306);
		return $db;
	}
}
