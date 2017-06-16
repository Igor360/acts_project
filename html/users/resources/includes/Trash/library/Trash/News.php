<?php 
namespace library\Model; // обявляю пространство имен

use library\ModelTable as Model; // импортирую пространство имен
use library\Models\Article\NewsArticle as NewsArticle;

require_once("library/ModelTable.php");  // включене файла в проект 

require_once("connectDB.php");
require_once("library/Article/BaseDescription.php");


// клас для роботи з даними новостей
class News extends Model
{
	public 	$title;
	public 	$description;
	public  $data;
	public  $img;

	public $text;
	
	public function __construct() // конструктор класа
	{	}

	// метод для генерации обекта(викону функцию конструктора)
	public static function generateNews($Id, $Title,$Description,$Data,$Img, $Text)
	{
		$news = new News();
		$news->id = $Id;
		$news->title = $Title;
		$news->description = $Description;
		$news->data = $Data;
		$news->img = $Img;
		$news->text = $Text;
		return $news;
	}

	// метод котрий повертаэтт все елементт таблици
	public function getAll()
	{
		global $connection;
		ConnectOpen();
		$query = "SELECT * FROM news;";
		$result = mysqli_query($connection,$query);
		ConnectClose();
		return News::generateResult($result);
	}

	// метод котрий повертает елементи по их индетификатору
	public function getElement($id)
	{
		global $connection;
		ConnectOpen();
		$query = "SELECT * FROM news WHERE id = {$id}";
		$result = mysqli_query($connection,$query);
		ConnectClose();
		$news = null;
		if ($result != null)	
		{
			return News::generateOneResult($result);
  		}
		return $news;
	}

	// метод котрий берет и бд несколько елементов
	public static function getSome($num)
	{
		global $connection;
		ConnectOpen();
		$query = "SELECT * FROM news ORDER BY date LIMIT 0,{$num};";
		$result = mysqli_query($connection,$query);
		ConnectClose();
		return News::generateResult($result);
	}

	// метод котрий генериюет результат
	private static function generateResult($resquery)
	{
		$NewsCollection = array();
		while ($row = mysqli_fetch_array($resquery, MYSQL_NUM)) 
		{
			$id_article = $row[0]; // индетификатор статті
			$text = NewsArticle::getElements($id_article); // отримаю всі тексти звязані з статею
			$article = News::generateNews($row[0], $row[1], $row[2], $row[3], $row[4], $text);
  			array_push($NewsCollection,$article);
		}
		return $NewsCollection;
	}

	// метод для геннерации статті
	private static function generateOneResult($result)
	{
		$row = mysqli_fetch_row($result); 
		$id_article = $row[0]; // индетификатор статті
		$text = NewsArticle::getElements($id_article); // отримаю всі тексти звязані з статею
		$article = News::generateNews($row[0], $row[1], $row[2], $row[3], $row[4], $text);
  		return $article;
	}


	// метод коотрий конвертирюет дату в формат: месяц, число
	public static function ConvertDate($Date)
	{
		$MonthArray = array('Січень','Лютий','Березень','Квітень','Травень','Червень','Липень','Серпень','Вересень','Жовтень','Листопад','Грудень');
		list($year,$month,$day) = explode('-', $Date);
		return $MonthArray[$month-1]." ".$day.", ".$year;
	}
}
?>