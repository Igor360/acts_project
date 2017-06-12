<?php
header('Content-Type: text/html; charset=UTF-8');
use library\Model\News as News;

require_once("library/News.php");
	require "header.php";	
?>
<div class="container-fluid">
 <div class = "container" id="main">
  <div class = "row">
   <div class = "col-sm-12 col-md-12 col-xs-12 main">
<?php
if(isset($_GET['page']))
	$page = $_GET['page'];
if(isset($_GET['numarticle']))
	$article_id = $_GET['numarticle'];

if(isset($page))
	switch ($page) {
	case 'news':
		if (isset($article_id))
			$news = (new News())->getElement($article_id);
		break;
	case 'science':
		if (isset($article_id))
			$article = Article::getArticle($page,$article_id);
		break;
	case 'sport':
		if (isset($article_id))
			$article = Article::getArticle($page,$article_id);
		break;
	case 'development' or 'practice':
		if (isset($article_id))
			$article = Article::getArticle($page,$article_id);
		break;
	case 'aspirantura' or 'employment':
		if (isset($article_id))
			$article = Article::getArticle($page,$article_id);
		break;
	case 'forStudents' or 'studLife':
		if (isset($article_id))
			$article = Article::getArticle($page,$article_id);
		break;
	default:
		echo "<h2 class=\"c__block-title col-xs-12\" style=\"text-align: left;\">Нажаль дані відсутні</h2>";
		break;
}
if(isset($news) and $news != null)
	{	
		echo "<section class = \"article_block\">";
		if ($news != "NULL")
			echo "<h2 class=\"c__block-title col-xs-12\" style=\"text-align: left;\">".$news->title."</h2>";
		if ($news->img != null)
			echo "<img class=\"presentation\" data-wow-duration=\"2s\" src=\"{$news->img}\" alt=\"\" height=\"300px\" width=\"200px\" align=\"center\">";
		echo "<span class=\"text-left\">{$news->description}</span>";
		if($news->text != null)	
    	  foreach ($news->text as  $d)
      	{
        	echo $d["text"];
      	}
		echo "</section>";  
	}
if(isset($article) and $article != null)
{
	echo "<section class = \"article_block\">";
	if ($article != "NULL")
		echo "<h2 class=\"c__block-title col-xs-12\" style=\"text-align: left;\">".$article->title."</h2>";
	if ($article->img != null)
		echo "<img class=\"presentation\" data-wow-duration=\"2s\" src=\"{$article->img}\" alt=\"\" height=\"300px\" width=\"200px\" align=\"center\">";
	echo "<span class=\"text-left\">{$article->description}</span>";
	if (strlen($article->text) > 0)
		echo $article->text;
	echo "</section>";  
}



 ?>

</div>
</div>
</div>
</div>
<!-- Scroll To Top Button -->
<a href="#" class="scroll-to-top-btn">
 <i class="icon-arrow-up"></i>   
</a><!-- .scroll-to-top-btn -->
<!-- flie Footer -->
<?php
require "footer.php";
?>
<!-- end Footer -->




