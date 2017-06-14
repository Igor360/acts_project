<?php
namespace library\Authorization;

use library\ConnectDB as ConnectDB;

require_once("library/BaseClasses/ConnectDB.php");

class Login extends ConnectDB
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
}

 ?>