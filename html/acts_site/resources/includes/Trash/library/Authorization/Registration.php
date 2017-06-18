<?php
namespace library\Authorization;

use library\ConnectDB as ConnectDB;

require_once("library/BaseClasses/ConnectDB.php");

class Registration extends ConnectDB
{

	// генерация кода
	function generateCode($length = 8)
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
		$generate_code = "";
		$code_length = strlen($chars) - 1;
		while ( strlen($generate_code) < $length)
		{
			$code .= $chars[mt_rand(0,$code_length)];
		}
		return $code;
	}

	public static function RegistrationUser($username, $password, $email)
	{
		$password_hash = md5(md5(trim($password)));
		
	}


	public static function isUsernameINTabe($username)
	{
		$query = sprintf("SELECT COUNT(id) FROM users WHERE username ='%s';",mysql_real_escape_string($username));
		ConnectDB::ConnectOpen();
		$result = ConnectDB::$connection->query($query);
		ConnectDB::ConnectClose();
		$row = ConnectDB::$connection->fetch_row($result);
		if (!$row[0] > 0)
			return True;	
		return False;		
	}
}

 ?>