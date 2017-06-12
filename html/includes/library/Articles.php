<?php
namespace library\Models; // обявление пространства имен

use library\ModelTable as Model; // импорта пространства имен
use library\Models\Article\Text as Text; 
use library\Models\Article\Description as Description;

require_once("library/ModelTable.php");  // включене файла в проект
require_once("library/Pages.php"); // включение файла
require_once("library/Article/BaseDescription.php");

require_once("connectDB.php");

// Клас котрий реализуєт доступ до таблици статтів
class Articles extends Model
{
	
	public 	$title;
	public  $data;
	public  $img;
	public  $page;

	public 	$text;
	public 	$description;
	
	public function __construct() // конструктор класу
	{ }

	// метод для генерации обэктов
	public static function generateArticle($Id, $Title,$Data,$Img,$Page,$Description,$Text)
	{
		$article = new Articles();
		$article->id = $Id;
		$article->title = $Title;
		$article->data = $Data;
		$article->img = $Img;
		$article->page = $Page;
		$article->description = $Description;
		$article->text = $Text;
		return $article;
	}

	// метод для отримання всех елеменотов
	public function getAll()
	{
		global $connection;
		ConnectOpen();
		$query = "SELECT * FROM article;";
		$result = mysqli_query($connection,$query);
		ConnectClose();
		return Articles::generateResult($result);

	}

	// метод для отримання елемента таблици по ее индетификатору
	public function getElement($id)
	{
		global $connection;
		ConnectOpen();
		$query = "SELECT * FROM article WHERE id = {$id}";
		$result = mysqli_query($connection,$query);
		ConnectClose();
		if ($result != null)	
		{
			return Articles::generateOneResult($result);
  		}
  		return null;
	}


	// метод для вибору из таблици несколько елементов
	public static function getSome($num)
	{
		global $connection;
		ConnectOpen();
		$query = "SELECT * FROM article LIMIT 0,{$num};";
		$result = mysqli_query($connection,$query);
		ConnectClose();
		return Articles::generateResult($result);
	}


	// метод для отримання статей для певної сторінки
	public static function getPageArticles($page)
	{
		
		$Page = (new Pages())->getElement($page);
		global $connection;
		ConnectOpen();
		$query = "SELECT * FROM article Where page_id = {$Page->id}";
		$result = mysqli_query($connection,$query);
		ConnectClose();
		return Articles::generateResult($result);
	}

	// метод для отримання елемента по его странице и идетификатору
	public static function getArticle($page,$article_id)
	{
		
		$Page = Pages::getElement($page);
		$query = "SELECT * FROM article WHERE page_id = {$Page->id} AND id = {$article_id}";
		global $connection;
		ConnectOpen();
		$result = mysqli_query($connection,$query);
		$article = null;
		ConnectClose();
		if ($result != null)	
		{
			return Articles::generateOneResult($result);
  		}
  		return null;
	}

	// метод для геннерации статті
	private static function generateOneResult($result)
	{
		$row = mysqli_fetch_row($result); 
		$id_article = $row[0]; // индетификатор статті
		$text = Text::getElements($id_article); // отримаю всі тексти звязані з статею
		$description = Description::getElements($id_article); // оримаю все описания связаних из статею
  		$article =  Articles::generateArticle($row[0],$row[1],$row[2],$row[3],$row[4],$description,$text);
  		return $article;
	}

	// метод для генерации результата запроса
	private static function generateResult($resquery)
	{
		$ArticleCollection = array();
		if (isset($resquery) and $resquery != null)
			while ($row = mysqli_fetch_array($resquery, MYSQL_NUM)) 
			{
				$id_article = $row[0]; // индетификатор статті
				$text = Text::getElements($id_article); // отримаю всі тексти звязані з статею
				$description = Description::getElements($id_article); // оримаю все описания связаних из статею
				$article = Articles::generateArticle($row[0], $row[1], $row[2], $row[3], $row[4], $description, $text);
  				array_push($ArticleCollection,$article);
			}
		if (count($ArticleCollection) > 0)
			return $ArticleCollection;
		return null;
	}

}
?>