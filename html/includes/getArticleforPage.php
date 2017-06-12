<?php 

use library\Models\Articles as Article;

require_once("library/Articles.php");



$page_name = basename($_SERVER['PHP_SELF']);
list($name,$type) = explode(".", $page_name,2);
$Articles = Article::getPageArticles($name);
if ($Articles != null)
	foreach ($Articles as $article) 
	{
  		echo "<section class = \"article_block\">";
  	if ($article != "NULL")
 			echo "<h2 class=\"c__block-title col-xs-12\" style=\"text-align: left;\">".$article->title."</h2>";
 		if ($article->img != null)
  			echo "<img class=\"presentation\" data-wow-duration=\"2s\" src=\"{$article->img}\" alt=\"\" height=\"300px\" width=\"200px\" align=\"center\"><br>";
  	if($article->description != null)	
      foreach ($article->description as  $d)
      {
        echo "<span class=\"text-left\">{$d["text"]}</span>";
      }
    echo "<br>";
  	if ($article->text != null)
  			echo "<p class=\"text-right\"><a class=\"social-url\" href = \"{$baseLink}/pages/more.php?page={$name}&numarticle={$article->id}\"><button type = \"button\" class = \"btn btn-default\">Детальнiше</button></a></p>";
  		echo "<br></section>";  
	}
else
	echo "<h2 class=\"c__block-title col-xs-12\" style=\"text-align: left;\">Дані відсутні</h2><hr>";
?>