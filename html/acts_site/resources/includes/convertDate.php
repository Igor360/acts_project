<?php 
function ConvertDate($Date)
  {
  	$locale = \App::getLocale();
  	switch ($locale)
  	{
  		case 'ua':
  	   	$MonthArray = array('Січень','Лютий','Березень','Квітень','Травень','Червень','Липень','Серпень','Вересень','Жовтень','Листопад','Грудень');
  		break;

  		case 'en':
    	$MonthArray = array('January','February','March','April','May','June','July','August','September','October','November','December');
    	break;

    	default:
    	break;
    }
    list($year,$month,$day) = explode('-', $Date);
    return $MonthArray[$month-1]." ".$day[0].$day[1].", ".$year;
  }
?>
