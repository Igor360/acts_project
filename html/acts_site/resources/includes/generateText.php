<?php 

use App\Text as Text;
use App\TextStyles as TextStyles;


 function AddTextStyles($article_id)
  {
    $resultCollection = array(); 
    $texts = Text::where('article_id', $article_id)->get();
    foreach ($texts as $text)
    {
      $styles = TextStyles::getTextStyle($text->id);
      foreach ($styles as $style) 
      {
        $style_text = $style->name;
        switch ($style_text) {

          case 'paragraph':
            $text->text = "<p>{$text->text}</p>";
            break;

          case 'boldText':
              $lasttext = $text->text;
              $text->text = "<b class=\"text-left\" style=\"color: #414141;\">{$lasttext}</b>";
            break;

          case 'list':
            $lasttext = explode("$", $text->text);
            $text->text = "";
            foreach ($lasttext as $listelem) 
            {
                $text->text .= "<br>". $listelem . "<br>";
            }
            break;

          case 'pointList':
            $lasttext = explode("$", $text->text);
            $text->text = '<ul>';          
            foreach ($lasttext as $listelem) 
            {
                $text->text .= '<li>'. $listelem . '</li>';
            }
            $text->text.='</ul>';
            break;

          case 'numberList':
            $lasttext = explode("$", $text->text);
            $text->text = '<ol>';          
            foreach ($lasttext as $listelem) 
            {
                $text->text .= '<li>'. $listelem . '</li>';
            }
            $text->text .='</ol>';
            break;

          case 'image':
            $lasttext = explode("$", $text->text); 
            $text->text ="";       
            foreach ($lasttext as $listelem) 
            {
                $text->text .= '<img class="col-md-3" src="'.$listelem.'">';
            }
            break;

          default:
            break;
        }

    }
    array_push($resultCollection, $text);
  }
    return $resultCollection;
  }


?>