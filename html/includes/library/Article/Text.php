<?php 
namespace  library\Models\Article;

use library\ModelTable as Model;

require_once("library/BaseClasses/ModelTable.php");
require_once("library/Article/TextStyle.php");
require_once("library/Article/GenerateArticle.php");

class Text extends Model
{
	public $text;
	public $articleid;
	public $type;

	public function __construct($Id, $Text, $ArticleId, $Type)
	{
		$this->id = $Id;
		$this->text = $Text;
		$this->articleid = $ArticleId;
		$this->type = $Type;
	}

	public function getAll()
	{
		$query  = "SELECT * FROM text;";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Text::generateResult($result);
	}

	public function getElement($id)
	{
		$query = "SELECT t.id, t.text , t.article_id, tt.name
					FROM fiot_acts.text AS t INNER JOIN fiot_acts.texttype AS tt
					WHERE t.type_id = tt.id AND t.id = {$id};";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		$row = $result->fetch_row();
		$text =array(
  			  	"id" => $row[0],
  			  	"text" => $row[1],
  			  	"articleid" =>	$row[2],
  			  	"type" => $row[3]
  			  	);
		if(count($text) > 0)
		{
			return $text;
		}
		return null;
	}

	
	public function delete($id)
	{
		Model::ConnectOpen();
		$query = "DELETE FROM text WHERE id = {$id}";
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		if ( $result != null )
			return True;
		return False;
	}

	public static function getElements($id)
	{
		$query = "SELECT t.id, t.text , t.article_id, tt.name
					FROM fiot_acts.text AS t INNER JOIN fiot_acts.texttype AS tt
					WHERE t.type_id = tt.id AND t.article_id = {$id};";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Text::generateResult($result);
	}

	public static function getDescription($article_id)
	{
		$query = "SELECT t.id, t.text , t.article_id, tt.name
					FROM fiot_acts.text AS t INNER JOIN fiot_acts.texttype AS tt
					WHERE t.type_id = tt.id AND t.article_id = {$article_id} AND tt.name =\"description\";";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Text::generateResult($result);
	}

	public static function getText($article_id)
	{
		$query = "SELECT t.id, t.text , t.article_id, tt.name
					FROM fiot_acts.text AS t INNER JOIN fiot_acts.texttype AS tt
					WHERE t.type_id = tt.id AND t.article_id = {$article_id} AND tt.name =\"maintext\";";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return Text::generateResult($result);
	}

	// метод для генерации результату
	private static function generateResult($resquery)
	{
		$Collection = array();
		if ($resquery != null)
			while ($row = $resquery->fetch_row()) 
			{
			  $text = GenerateArticle::AddDescriptionStyles($row);
  			  array_push($Collection,array(
  			  	"id" => $row[0],
  			  	"text" => $text,
  			  	"articleid" =>	$row[2]
  			  	)); 			  	
			}
		return $Collection;
	}
}

?>