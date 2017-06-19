<?php 

function InsertTextToDB($text, $textelement_id, $texttype_id)
{

$texttype = TextElement::where('id',$textelement_id)->get()[0]->name;	
switch ('$textelement') {
	case 'paragraph':
		break;
	
	default:
		break;
}


}


?>