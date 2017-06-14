<?php
	require "PageParts/header.php";	
 //<!--Intro Full Width Slider -->
	require "PageParts/slider.php";
//<!-- .master-slider.ms-skin-default -->
?>
<div class="container-fluid">
 <div class = "container" id="main">
  <div class = "row">
   <div class = "col-sm-12 col-md-12 col-xs-12 main">
<?php
// Вибор статей
require_once("library/Article/getArticleforPage.php");
 ?>
     <!-- Section news -->
     <section class = "article_block bounceInUp wow col-xs-12" data-wow-duration="0.5s" data-wow-delay="0.2s" data-wow-offset = "100">
       <h2 class="c__block-title" style="text-align: left;">Новини</h2>
       <div class="news">

<?php
use library\Models\Articles as Article;

require_once("library/Article/Articles.php");

$NewsMain = Article::getSomeNews(3);
if ($NewsMain != null)
  foreach ($NewsMain as $news) 
  {
        echo "<a class=\"news__news\" href=\"{$baseLink}/pages/more.php?page=news&numarticle={$news->id}\">";
        echo "<div class=\"news__news__img\">";
        echo "<img src=\"{$news->img}\" alt=\"\">";
        echo "</div>";
        echo "<h3 class=\"news__news__header\">";
        echo  $news->title;
        echo "</h3>";
        echo "<span class=\"news__news__date\">";
        echo Article::ConvertDate($news->date);
        echo "</span>";
        echo "</a>";
  }
?>
</div>
<a href="" class="c__button btn" style="margin-left: 40.2%; margin-top: 2.5%; padding-top: 0px;">Архів</a>
</section>
<!-- End news -->
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




