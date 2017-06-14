<?php
header('Content-Type: text/html; charset=UTF-8');
use library\Models\Articles as Article;
use library\Models\Article\GenerateArticle as GenerateArticle;

require_once("library/Article/Articles.php");
require_once("library/Article/GenerateArticle.php");

	require "PageParts/header.php";	
?>
<div class="container-fluid">
 <div class = "container" id="main">
  <div class = "row">
   <div class = "col-sm-12 col-md-12 col-xs-12 main">
<?php
$page_name = basename($_SERVER['PHP_SELF']);
list($name,$type) = explode(".", $page_name);
if (isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = null;
switch ($page)
{
	case "1kurs":
	$Articles = Article::getPageArticles("incoming_1kurs");
	break;

	case "5kurs":
	$Articles = Article::getPageArticles("incoming_5kurs");
	break;

	case "offDoc":
	$Articles = Article::getPageArticles("incoming_offDoc");
	break;
	
	case "learnToActs":
	$Articles = Article::getPageArticles("incoming_learnToActs");
	break;
	
	case "actualInfo":
	$Articles = Article::getPageArticles("incoming_actualInfo");
	break;
	
	case "contacts":
	$Articles = Article::getPageArticles("incoming_contacts");
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
require "PageParts/footer.php";
?>
<!-- end Footer -->




