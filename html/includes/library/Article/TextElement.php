
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

		Model::ConnectOpen();
		$query = "SELECT * FROM textelements;";
		$result = Model::$conection->query($query);
		Model::ConnectClose();
		return Pages::generateResult($result);
	}

	// метод для отриманя етлементов по его индетификатору
	public function getElement($id)
	{
		Model::ConnectOpen();
		$query = "SELECT * FROM textelements WHERE id = {$id}";
		$result = Model::$conection->query($query);
		Model::ConnectClose();
		$row = $result->fetch_row(); 
  		$element = new TextElement($row[0],$row[1]);
		return $element;
	}


	public function delete($id)
	{
		Model::ConnectOpen();
		$query = "DELETE FROM textelements WHERE id = {$id}";
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
  			  array_push($PagesCollection,new TextElement($row[0],$row[1]));
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
