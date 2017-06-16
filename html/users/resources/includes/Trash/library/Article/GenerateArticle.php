<?php 
namespace library\Models\Article;


use library\Models\Articles as Article;

require_once("library/Article/Articles.php");
require_once("library/Article/TextStyle.php");

class GenerateArticle
{

  // метод коотрий конвертирюет дату в формат: месяц, число
  public static function ConvertDate($Date)
  {
    $MonthArray = array('Січень','Лютий','Березень','Квітень','Травень','Червень','Липень','Серпень','Вересень','Жовтень','Листопад','Грудень');
    list($year,$month,$day) = explode('-', $Date);
    return $MonthArray[$month-1]." ".$day[0].$day[1].", ".$year;
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