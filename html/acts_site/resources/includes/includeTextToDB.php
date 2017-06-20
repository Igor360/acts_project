<?php 

function InsertTextToDB($text, $textelement_id, $texttype_id, $article_id)
{

$texttype = TextElement::where('id',$textelement_id)->get()[0]->name;	
switch ('$textelement') {
	case 'paragraph':
		Text::InsertData($text, $article_id, $texttype_id);
		$text_id = Text::where('text',$text)->where('article_id',$article_id)->get()[0]->id;
		TestStyle::InsertData($text_id,$textelement_id);
		break;
		
	default:
		Text::InsertData($text, $article_id, $texttype_id);
		$text_id = Text::where('text',$text)->where('article_id',$article_id)->get()[0]->id;
		TestStyle::InsertData($text_id,$textelement_id);
		break;
}


}


?>