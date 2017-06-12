<?php 
namespace  library\Models\Article;

use library\ModelTable as Model;

require_once("library/ModelTable.php");
require_once("library/Article/BaseTextStyle.php");
require_once("library/Article/GenerateArticle.php");

require_once("connectDB.php");

class BaseDescription extends Model
{
	public $text;
	public $articleid;

	public function __construct()
	{ }

	public static function Generate($Id, $Text, $ArticleId)
	{
		$text = new BaseDescription();
		$text->id = $Id;
		$text->text = $Text;
		$text->articleid = $ArticleId;
	} 

	public function getAll()
	{
		
		$className = get_called_class();
		$types = explode('\\', $className);
		$type = mb_strtolower($types[count($types)-1]);
		$query  = "SELECT * FROM {$type};";
		global $connection;
		ConnectOpen();
		$result = mysqli_query($connection, $query);
		ConnectClose();
		return BaseDescription::generateResult($result);
	}

	// метод для генерации результату
	private static function generateResult($resquery)
	{
		$Collection = array();
		if ($resquery != null)
			while ($row = mysqli_fetch_array($resquery, MYSQL_NUM)) 
			{
				if(DescriptionStyle::isTextStyle($row[0]))
					$text = GenerateArticle::AddDescriptionStyles($row);
				else
					$text = $row[1];
  			  array_push($Collection,array(
  			  	"id" => $row[0],
  			  	"text" => $text,
  			  	"articleid" =>	$row[2]
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
  			  	"id" => $row[0],
  			  	"text" => $row[1],
  			  	"articleid" =>	$row[2]
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
		return BaseDescription::generateResult($result);
	}
}

class Description extends BaseDescription
{
	public function __construct()
	{ }

}

class Text extends BaseDescription
{
	public function __construct()
	{ }

}

class NewsArticle extends BaseDescription
{ }

?>