<?php 
namespace library\Models\Article;


use library\Models\Articles as Article;

require_once("library/Articles.php");
require_once("library/Article/TextStyle.php");
require_once("Timer.php");

class GenerateArticle
{

	public static function ShowArticles($Articles)
	{

	if ($Articles != null)
		foreach ($Articles as $article) 
		{
  			echo "<section class = \"article_block\" ";
        if ($article->id == 12)
          echo "style = \"height:300px;\"";
        echo ">";
  		if ($article != "NULL")
 			  echo "<h2 class=\"c__block-title col-xs-12\" style=\"text-align: left;\">".$article->title."</h2>";
 		if ($article->img != null)
  			echo "<img class=\"presentation\" data-wow-duration=\"2s\" src=\"{$article->img}\" alt=\"\" height=\"300px\" width=\"200px\" align=\"center\"><br>";
  		if($article->description != null)	
    	  foreach ($article->description as  $d)
      	{
        	echo $d["text"];
      	}
      echo "<br>";
  		if ($article->isText)
  			echo "<p class=\"text-right\"><a class=\"social-url\" href = \"{$baseLink}/pages/more.php?page={$name}&numarticle={$article->id}\"><button type = \"button\" class = \"btn btn-default\">Детальнiше</button></a></p>";
  		echo "<br></section>";  
	}
	else
		echo "<h2 class=\"c__block-title col-xs-12\" style=\"text-align: left;\">Дані відсутні</h2><hr>";

  }


  public static function AddDescriptionStyles($article_text)
  {
    $styles = TextStyle::getTextStyle($article_text[0]);
    $text = $article_text[1];
    foreach ($styles as $style) 
    {
      $style_text = $style['textstyle'];
      switch ($style_text) {
          case 'paragraph':
            $lasttext = $text;
            $text = "<p>{$text}</p>";
            break;
          case 'boldText':
              $lasttext = $text;
              $text = "<b class=\"text-left\" style=\"color: #414141;\">{$lasttext}</b>";
            break;
          case 'list':
            $lasttext = explode("$", $text);
            $text = "";
            foreach ($lasttext as $listelem) 
            {
                $text .= "<br>". $listelem . "<br>";
            }
            break;
          case 'pointList':
            $lasttext = explode("$", $text);
            $text = '<ul>';          
            foreach ($lasttext as $listelem) 
            {
                $text .= '<li>'. $listelem . '</li>';
            }
            $text.='</ul>';
            break;
          case 'numberList':
            $lasttext = explode("$", $text);
            $text = '<ol>';          
            foreach ($lasttext as $listelem) 
            {
                $text .= '<li>'. $listelem . '</li>';
            }
            $text.='</ol>';
            break;
          case 'image':
            $lasttext = explode("$", $text); 
            $text="";       
            foreach ($lasttext as $listelem) 
            {
                $text .= '<img class="col-md-3" src="'.$listelem.'">';
            }
            break;
          default:
            # code...
            break;
        }  
    }
    return $text;
  }

}
?>