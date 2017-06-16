<?php 
namespace library\Models; // обявление пространства именв

use library\ModelTable as Model; // импрорт пространства имен

require_once("library/ModelTable.php");  // включене файла в проект


class Pages extends Model
{
	public  $Name;

	public function __construct($id, $name) // конструктор класу
	{
		$this->id = $id;
		$this->Name = $name;
	}

	// метод для отримання всіх елементов таблици
	public function getAll()
	{
		Model::ConnectOpen();
		$query = "SELECT * FROM pages;";
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Pages::generateResult($result);
	}

	// метод для отриманя етлементов по его индетификатору
	public function getElement($id)
	{
		Model::ConnectOpen();
		$query = "SELECT * FROM pages WHERE name = \"{$id}\"";
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		if ($result)
		{ 
			$row = $result->fetch_row();
			return new Pages($row[0], $row[1]);
		}
		return null;
	}


	public function delete($id)
	{
		Model::ConnectOpen();
		$query = "DELETE FROM pages WHERE id = {$id}";
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		if ( $result != null )
			return True;
		return False;
	}

	// метод для генерации результату
	private static function generateResult($resquery)
	{
		$PagesCollection = array();
		while ($row = $resquery->fetch_row()) 
		{
  			  array_push($PagesCollection,new Pages($row[0],$row[1]));
		}
		return $PagesCollection;
	}

	// перевизначення стандартнои функции
	public function __toString()
	{
		return $this->name;
	}

}
?>