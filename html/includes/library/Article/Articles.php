<?php
namespace library\Models; // обявление пространства имен

use library\ModelTable as Model; // импорта пространства имен
use library\Models\Article\Text as Text; 

require_once("library/BaseClasses/ModelTable.php");  // включене файла в проект
require_once("library/Article/Text.php");


// Клас котрий реализуєт доступ до таблици статтів
class Articles extends Model
{
	
	public 	$title;
	public  $date;
	public  $img;
	
	public 	$description;
	public 	$isText;

	public function __construct($Id, $Title, $Date, $Img, $Description, $isText) // конструктор класу
	{ 
		$this->id = $Id;
		$this->title = $Title;
		$this->date = $Date;
		$this->img = $Img;
		$this->description = $Description;
		$this->isText = $isText;
	}

	// метод для отримання всех елеменотов
	public function getAll()
	{
		Models::ConnectOpen();
		$query = "SELECT * FROM articles;";
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return $result;

	}

	// метод для отримання елемента таблици по ее индетификатору
	public function getElement($id)
	{
		Model::ConnectOpen();
		$query = "SELECT * FROM articles WHERE id = {$id}";
		$result = Models::$connection->query($query);
		Model::ConnectClose();
		if ($result != null)
		{	
			return Articles::generateOneResult($result);
  		}
  		return null;
	}


	public function delete($id)
	{
		Model::ConnectOpen();
		$query = "DELETE FROM articles WHERE id = {$id}";
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		if ( $result != null )
			return True;
		return False;
	}

	// метод для вибору из таблици несколько елементов
	public static function getSome($num)
	{
		Model::ConnectOpen();
		$query = "SELECT * FROM articles LIMIT 0,{$num};";
		$result = $connection->query($query);
		Model::ConnectClose();
		return Articles::generateResult($result);
	}


	// метод для отримання статей для певної сторінки
	public static function getPageArticles($page)
	{
		Model::ConnectOpen();
		$query = "SELECT * FROM fiot_acts.articles AS a INNER JOIN fiot_acts.pages AS p 
					WHERE a.page_id = p.id  AND p.name = \"{$page}\" ORDER BY(a.id);";
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Articles::generateResult($result);
	}

	// метод для отримання елемента по его странице и идетификатору
	public static function getArticle($page,$article_id)
	{
		
		$Page = Pages::getElement($page);
		$query = "SELECT * FROM articles WHERE page_id = {$Page->id} AND id = {$article_id}";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		$article = null;
		if ($result != null)	
			return $result;
  		return null;
	}

	public static function getNews()
	{
		Model::ConnectOpen();
		$query = "SELECT * FROM fiot_acts.articles AS a INNER JOIN fiot_acts.pages AS p 
					WHERE a.page_id = p.id  AND p.name = \"news\" ORDER BY(a.id);";
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Articles::generateResult($result);
	}

	public static function getSomeNews($num)
	{
		Model::ConnectOpen();
		$query = "SELECT * FROM fiot_acts.articles AS a INNER JOIN fiot_acts.pages AS p 
					WHERE a.page_id = p.id  AND p.name = \"news\" ORDER BY(a.id) LIMIT 0,{$num};";
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Articles::generateResult($result);
	}

	public static function getOneNews($news_id)
	{
		Model::ConnectOpen();
		$query = "SELECT * FROM fiot_acts.articles AS a INNER JOIN fiot_acts.pages AS p 
					WHERE a.page_id = p.id  AND p.name = \"news\" AND a.id = {$news_id};";
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Articles::generateOneResult($result);
	}

	// метод для геннерации статті
	private static function generateOneResult($result)
	{
		$row = mysqli_fetch_row($result); 
		$id_article = $row[0]; // индетификатор статті
		$text=Text::getElements($id_article);
  		$article =  new Articles($row[0],$row[1],$row[2],$row[3],$text,$row[4]);
  		return $article;
	}

	// метод для генерации результата запроса
	private static function generateResult($resquery)
	{
		$ArticleCollection = array();
		if (isset($resquery) and $resquery != null)
			while ($row = mysqli_fetch_array($resquery, MYSQL_NUM)) 
			{
				$id_article = $row[0]; 
				$text = Text::getDescription($id_article);
				$article = new Articles ($row[0], $row[1], $row[2], $row[3],$text,$row[4]);
  				array_push($ArticleCollection,$article);
			}
		if (count($ArticleCollection) > 0)
			return $ArticleCollection;
		return null;
	}


	// метод коотрий конвертирюет дату в формат: месяц, число
	public static function ConvertDate($Date)
	{
		$MonthArray = array('Січень','Лютий','Березень','Квітень','Травень','Червень','Липень','Серпень','Вересень','Жовтень','Листопад','Грудень');
		list($year,$month,$day) = explode('-', $Date);
		return $MonthArray[$month-1]." ".$day[0].$day[1].", ".$year;
	}
}
?>