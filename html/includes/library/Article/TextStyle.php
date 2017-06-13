<?php 
namespace  library\Models\Article;

use library\ModelTable as Model;

require_once("library/ModelTable.php");

require_once("Timer.php");

class TextStyle extends Model
{
	public $idtext;
	public $idtextelement;

	public function __construct($IdText, $IdTextElement)
	{
		$this->idtext = $IdText;
		$this->idtextelement = $IdTextElement;
	}

	public function getAll()
	{
		$query  = "SELECT * FROM textstyle;";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		return TextStyle::generateResult($result);
	}

	public function getElement($id)
	{
		$query = "SELECT * FROM textstyle WHERE id = {$id}";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		$row = $result->fetch_row();
		if ($row != null)
			$text =array(
  			  	"idtext" => $row[0],
  			  	"idtextelement" => $row[1],
  			  	); 	
		if(isset($text))
			return $text;
		return null;
	}

	public function delete($id)
	{
		$query = "DELETE FROM textstyle WHERE id = {$id}";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		if ($result)
			return True;
		return False;
	}

	public static function getTextStyle($article_id)
	{
		$query = "SELECT te.name 
		FROM fiot_acts.text AS t INNER JOIN fiot_acts.textelements AS te INNER JOIN fiot_acts.textstyle AS ts
		WHERE t.id = ts.idtext AND te.id = ts.idtextelement AND t.id = {$article_id};";
		Model::ConnectOpen();
		$result = Model::$connection->query($query);
		Model::ConnectClose();
		$Collection = array();
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) 
  			array_push($Collection,array('textstyle' => $row[0] ));
  		return $Collection;
	}

	// метод для генерации результату
	private static function generateResult($resquery)
	{
		$Collection = array();
		if ($resquery != null)
			while ($row = $resquery->fetch_row()) 
  			  array_push($Collection,array(
  			  	"idtext" => $row[0],
  			  	"idtextelement" => $row[1],
  			  	)); 			  	
		return $Collection;
	}

}

?>