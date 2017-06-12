<?php

namespace library; // обявление пространства имен 

use mysqli;

// Класс для роботи з базою даних
abstract class ConnectDB
{

	// поля котрие описивают дание какие нужны для подключения к бд
	public static $dbhost = "localhost";
	public static $dbusername = "root";  // имя пользвателя
 	public static $dbpassword  = "1234"; // пароля
	public static $dbname = "fiot_acts"; // имя бд

	protected static $conection; // поле котрое ханит подключение к бд

	// откритие подключения к бд
	 public static function ConnectOpen() 
 	{
 		ConnectDB::$conection = new mysqli(ConnectDB::$dbhost, ConnectDB::$dbusername, ConnectDB::$dbpassword, ConnectDB::$dbname);
 		mysqli_query( ConnectDB::$conection,"SET NAMES 'utf8';");
     	mysqli_query( ConnectDB::$conection,"SET CHARACTER SET utf8;");
     	mysqli_set_charset( ConnectDB::$conection,'utf8' );
	}

	// закритие подключения к бд
	public static function ConnectClose()
	{
		if (ConnectDB::$conection)
			ConnectDB::$conection->close();	
	}

}
?>
