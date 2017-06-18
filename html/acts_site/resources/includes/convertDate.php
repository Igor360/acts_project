<?php 
function ConvertDate($Date)
  {
    $MonthArray = array('Січень','Лютий','Березень','Квітень','Травень','Червень','Липень','Серпень','Вересень','Жовтень','Листопад','Грудень');
    list($year,$month,$day) = explode('-', $Date);
    return $MonthArray[$month-1]." ".$day[0].$day[1].", ".$year;
  }
?>