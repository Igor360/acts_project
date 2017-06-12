<?php 
namespace  library\Models\Article;

use library\ModelTable as Model;

require_once("library/ModelTable.php");

require_once("connectDB.php");

class BaseTextStyle extends Model
{
	public $idtext;
	public $idtextelement;

	public function __construct()
	{ }

	public static function Generate($IdText, $IdTextElement)
	{
		$text = new BaseTextStyle();
		$text->idtext = $IdText;
		$text->idtextelement = $IdTextElement;
	} 

	public  function getAll()
	{
		
		$className = get_called_class();
		$types = explode('\\', $className);
		$type = mb_strtolower($types[count($types)-1]);
		$query  = "SELECT * FROM {$type};";
		global $connection;
		ConnectOpen();
		$result = mysqli_query($connection, $query);
		ConnectClose();
		return BaseTextStyle::generateResult($result);
	}



	// метод для генерации результату
	private static function generateResult($resquery)
	{
		$Collection = array();
		if ($resquery != null)
			while ($row = mysqli_fetch_array($resquery, MYSQL_NUM)) 
			{
  			  array_push($Collection,array(
  			  	"idtext" => $row[0],
  			  	"idtextelement" => $row[1],
  			  	)); 			  	
			}
		return $Collection;
	}

	public function getElement($id)
	{
	
		$className = get_called_class();
		$types = explode('\\', $className);
		$type = mb_strtolower($types[count($types)-1]);
		$query = "SELECT * FROM {$type} WHERE article_id = {$id}";
		global $connection;
		ConnectOpen();
		$result = mysqli_query($connection,$query);
		ConnectClose();
		$row = mysqli_fetch_num($result);
		$text =array(
  			  	"idtext" => $row[0],
  			  	"idtextelement" => $row[1],
  			  	); 	
		if(isset($text))
		{
			return $text;
		}
		return null;
	}


	public static function getElements($id)
	{
		
		$className = get_called_class();
		$types = explode('\\', $className);
		$type = mb_strtolower($types[count($types)-1]);
		$query = "SELECT * FROM {$type} WHERE article_id = {$id}";
		global $connection;
		ConnectOpen();
		$result = mysqli_query($connection,$query);
		ConnectClose();
		return BaseTextStyle::generateResult($result);
	}

	public static function getTextStyle($article_id)
	{
		
		$className = get_called_class();
		$types = explode('\\', $className);
		$type = mb_strtolower($types[count($types)-1]);
		$query = "SELECT d.text, te.name 
FROM fiot_acts.description AS d INNER JOIN fiot_acts.textelements AS te INNER JOIN fiot_acts.descriptionstyle AS ds
WHERE d.id = ds.iddescription AND te.id = ds.idtextelement AND d.id = {$article_id};";
		global $connection;
		ConnectOpen();
		$result = mysqli_query($connection,$query);
		ConnectClose();
		$Collection = array();
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) 
			{
  			array_push($Collection,array('text' => $row[0],
  				'textstyle' => $row[1]
  			 ));
  			}
  		return $Collection;
	}

	public static function isTextStyle($article_id)
	{
		
		$className = get_called_class();
		$types = explode('\\', $className);
		$type = mb_strtolower($types[count($types)-1]);
		$query  = "SELECT * FROM {$type};";
		global $connection;
		ConnectOpen();
		$result = mysqli_query($connection, $query);
		ConnectClose();
		$articles = BaseTextStyle::generateResult($result);
		foreach ($articles as $article) 
			if ($article['idtext'] == $article_id)
				return true;
		return false;
	}
	
}

class TextStyle extends BaseTextStyle
{ }

class DescriptionStyle extends BaseTextStyle 
{ }

?>