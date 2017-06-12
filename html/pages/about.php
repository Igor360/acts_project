<?php
header('Content-Type: text/html; charset=UTF-8');

use library\Models\Articles as Article;
use library\Models\Article\GenerateArticle as GenerateArticle;

require_once("library/Articles.php");
require_once("library/Article/GenerateArticle.php");

require "header.php";	
?>
<div class="container-fluid">
 <div class = "container" id="main">
  <div class = "row">
   <div class = "col-sm-12 col-md-12 col-xs-12 main">
<?php
if (isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = null;
switch ($page)
{
	case "department_info":
	$Articles = Article::getPageArticles("about_page");
	break;

	case "history":
	$Articles = Article::getPageArticles("history_page");
	break;
	
	case "studLife":
	$Articles = Article::getPageArticles("studLife");
	break;
	
	case "diplomWorks":
	$Articles = Article::getPageArticles("diplomWorks");
	break;
	
	case "employment":
	$Articles = Article::getPageArticles("employment");
	break;
	
	case "practice":
	$Articles = Article::getPageArticles("practice");
	break;

	default:
	echo "<h2 class=\"c__block-title col-xs-12\" style=\"text-align: left;\">Нажаль сторінка відсутня</h2>";
	echo "<hr>";
}
if (isset($Articles))
	GenerateArticle::ShowArticles($Articles);
if ($Articles == null)
	echo "<h2 class=\"c__block-title col-xs-12\" style=\"text-align: left;\">Дані відсутні</h2>";
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




