
<?php 
namespace library\Models\Article; // обявление пространства именв

use library\ModelTable as Model; // импрорт пространства имен

require_once("library/ModelTable.php");  // включене файла в проект

class TextElement extends Model
{
	public  $name;

	public function __construct() // конструктор класу
	{	}

	// метод для генерации елментов
	public static function generate($Id, $Name)
	{
		$text = new Pages();
		$text->id = $Id;
		$text->name = $Name;
		return $text;
	}

	// метод для отримання всіх елементов таблици
	public function getAll()
	{
		global $connection;
		ConnectOpen();
		$query = "SELECT * FROM textelements;";
		$result = mysqli_query(Model::$conection,$query);
		ConnectClose();
		return Pages::generateResult($result);
	}

	// метод для отриманя етлементов по его индетификатору
	public function getElement($id)
	{
		global $connection;
		ConnectOpen();
		$query = "SELECT * FROM textelements WHERE id = {$id}";
		$result = mysqli_query(Model::$conection,$query);
		ConnectClose();
		$row = mysqli_fetch_array($result, MYSQL_NUM); 
		$element = null;
  		$element = TextElement::generate($row[0],$row[1]);
		return $element;
	}


	// метод для генерации результату
	private static function generateResult($resquery)
	{
		$PagesCollection = array();
		while ($row = mysqli_fetch_array($resquery, MYSQL_NUM)) 
		{
  			  array_push($PagesCollection,TextElement::generate ($row[0],$row[1]));
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
