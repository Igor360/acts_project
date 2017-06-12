<?php 
namespace library\Models; // обявление пространства именв

use library\ModelTable as Model; // импрорт пространства имен

require_once("library/ModelTable.php");  // включене файла в проект

require_once("connectDB.php");

class Pages extends Model
{
	public  $name;

	public function __construct() // конструктор класу
	{	}

	// метод для генерации елментов
	public static function generatePage($Id, $Name)
	{
		$page = new Pages();
		$page->id = $Id;
		$page->name = $Name;
		return $page;
	}

	// метод для отримання всіх елементов таблици
	public function getAll()
	{
		global $connection;
		ConnectOpen();
		$query = "SELECT * FROM pages;";
		$result = mysqli_query($connection,$query);
		ConnectClose();
		return Pages::generateResult($result);
	}

	// метод для отриманя етлементов по его индетификатору
	public function getElement($id)
	{
		global $connection;
		ConnectOpen();
		$query = "SELECT * FROM pages WHERE name = \"{$id}\"";
		$result = mysqli_query($connection,$query);
		ConnectClose();
		$page = null;
		$row = mysqli_fetch_array($result, MYSQL_NUM); 
  		$page = Pages::generatePage($row[0],$row[1]);
		return $page;
	}

	// метод для генерации результату
	private static function generateResult($resquery)
	{
		$PagesCollection = array();
		while ($row = mysqli_fetch_array($resquery, MYSQL_NUM)) 
		{
  			  array_push($PagesCollection,Pages::generatePage ($row[0],$row[1]));
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