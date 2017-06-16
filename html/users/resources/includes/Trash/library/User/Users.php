<?php 
namespace library\Models\User; // обявление пространства имен

use library\ModelTable as Model; // импорта пространства имен

require_once("library/BaseClasses/ModelTable.php");  // включене файла в проект

class Users extends Model
{
	public $username;
	public $password;
	public $email;
	public $isadmin;
	public $isinsystem;
	public $datecreated;
	public $lastlogin;

	public $userhash;
	public $userip;

	public function __construct($Username, $Password, $Email, $Isadmin, $Isinsystem, $Datecreated, $LastLogin, $Userhash, $Userip)
	{
		$this->username = $Username;
		$this->password = $Password;
		$this->email = $Email;
		$this->isadmin = $Isadmin;
		$this->isinsystem = $Isinsystem;
		$this->datecreated = $Datecreated;
		$this->lastlogin = $LastLogin;
		$this->userhash = $Userhash;
		$this->userip = $Userip;
	}

	public function getAll()
	{
		$query = "SELECT * FROM users;";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Users::generateResult($result);
	}

	public function getElement($id)
	{
		$query = "SELECT * FROM users WHERE id = {$id}";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Users::generateOneResult($result);
	}

	public function delete($id)
	{
		$query = "DELETE FROM users WHERE id = {$id}";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		if ($result != null)
			return True;
		return False;
	}

	public function addUser($login, $password, $email)
	{
		Model::ConnectOpen();
		$login = Model::$connection->real_escape_string($login);
		$password = Model::$connection->real_escape_string($password);
		$email = Model::$connection->real_escape_string($email);
		$query = "INSERT INTO users (username, password, email,isinsystem) VALUES ({$login},{$password, {$email}, '1'});";
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		if (!$result->errno)
			return True;
		return False;
	}


	public static function generateResult($result)
	{
		$UsersCollection = array();
		if ($result != null)
			while ($row = mysqli_fetch_num($result)) {
				array_push($UsersCollection, new Users($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]));
			}
		return $UsersCollection;
	}


	public static function generateOneResult($result)
	{
		$user = null;
		if ($result != null)
		{
			$row = mysqli_fetch_num($result);
			$user = new Users($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
		}
		return $user;
	}
}

?>