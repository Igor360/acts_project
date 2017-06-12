<?php 

	// поля котрие описивают дание какие нужны для подключения к бд
	$dbhost = "localhost";
	$dbusername = "root";  // имя пользвателя
 	$dbpassword  = "1234"; // пароля
	$dbname = "fiot_acts"; // имя бд

	$connection = null; // поле котрое ханит подключение к бд

	function ConnectOpen()
	{
		ini_set('max_execution_time', 300); 
		global $dbname, $dbhost, $dbusername, $dbpassword, $connection;
	// откритие подключения к бд
 		$connection = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
 		mysqli_query($connection,"SET NAMES 'utf8';");
     	mysqli_query($connection,"SET CHARACTER SET utf8;");
     	mysqli_set_charset($connection,'utf8' );
	}

	// закритие подключения к бд
	 function ConnectClose()
	{
		global $connection;
		if ($connection)
			$connection->close();	
	}
?>