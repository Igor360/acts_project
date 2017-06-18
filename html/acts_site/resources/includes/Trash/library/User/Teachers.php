<?php
namespace library\Models\User; // обявление пространства имен

use library\ModelTable as Model; // импорта пространства имен

require_once("library/BaseClasses/ModelTable.php");  // включене файла в проект

class Teachers extends Model
{
	public $firstName;
	public $middleName;
	public $lastName;
	public $department;
	public $profession;
	public $photo;
	public $timeDay;
	public $room;
	public $phone;
	public $mobile;
	public $profInterests;
	public $discipline;
	public $user_id;
	public $position_id;


	public function __construct($firstname, $middlename, $lastname, $department, $pofession, $photo, $timeday, $room, $phone, $mobile, $profinter, $discipline, $user_id, $position_id)
	{
		$this->firstName = $firstname;
		$this->middleName = $middlename;
		$this->lastName = $lastname;
		$this->department = $department;
		$this->profession = $profession;
		$this->photo = $photo;
		$this->timeDay = $timeday;
		$this->room = $room;
		$this->phone = $phone;
		$this->mobile = $mobile;
		$this->profInterests = $profinter;
		$this->discipline = $discipline;
		$this->user_id = $user_id;
		$this->position_id = $position_id;
	}

	public function getAll()
	{
		$query = "SELECT * FROM teachers;";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Users::generateResult($result);
	}

	public function getElement($id)
	{
		$query = "SELECT * FROM teachers WHERE id = {$id}";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Users::generateOneResult($result);
	}

	public function delete($id)
	{
		$query = "DELETE FROM teachers WHERE id = {$id}";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		if ($result != null)
			return True;
		return False;
	}

	public function addTeacher($firstname, $middlename, $lastname, $pofession, $photo, $timeday, $room, $phone, $mobile, $profinterests, $discipline, $user_id, $position_id)
	{
		Model::ConnectOpen();
		$firstname = Model::$connection->real_escape_string($firstname);
		$middlename = Model::$connection->real_escape_string($middlename);
		$lastname = Model::$connection->real_escape_string($lastname);
		$profession = Model::$connection->real_escape_string($pofession);
		$photo = Model::$connection->real_escape_string($photo);
		$timeday = Model::$connection->real_escape_string($timeday);
		$room = Model::$connection->real_escape_string($room);
		$phone = Model::$connection->real_escape_string($phone);
		$mobile = Model::$connection->real_escape_string($mobile);
		$profinterests = Model::$connection->real_escape_string($profinterests);
		$discipline = Model::$connection->real_escape_string($discipline);
		$user_id = Model::$connection->real_escape_string($user_id);
		$position_id = Model::$connection->real_escape_string($position_id);
		$query = "INSERT INTO `fiot_acts`.`teachers` (`FirstName`, `MiddleName`, `LastName`, `Department`, `Profession`, `Photo`, `TimeDay`, `Room`, `Phone`, `Mobile`, `ProfInterests`, `Discipline`, `position_id`, `user_id`) VALUES ('{$firstname}', '{$middlename}', '{$lastname}', '{$department}', '{$pofession}', '{$photo}', '{$timeday}', '{$room}', '{$phone}', '{$mobile}', '{$profinterests}', '{$discipline}', '{$position_id}', '{$user_id}');";
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
				array_push($UsersCollection, new Teachers($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13]));
			}
		return $UsersCollection;
	}


	public static function generateOneResult($result)
	{
		$user = null;
		if ($result != null)
		{
			$row = mysqli_fetch_num($result);
			$user = new Teachers($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], row[9], $row[10], $row[11], $row[12], $row[13]);
		}
		return $user;
	}

}

?>