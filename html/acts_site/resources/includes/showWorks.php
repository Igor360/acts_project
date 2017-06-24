<?php


use Illuminate\Support\Facades\Auth as Auth; 
use App\Works as Works;

function GetWorks($typework_id, $user_id)
{
$years = Works::getYearWorks($typework_id, $user_id);
$types = Works::getTypesWorks($typework_id, $user_id);
$lenth = count($years);
$ListWorks = array();
if ($lenth % 2 == 0)
	{
		foreach ($types as $type)
			for ($i=0; $i < $lenth-1; $i+= 2) { 
				$Works = array();
				$Works['Type'] = $type->type;
				$Works['StartYear'] = $years[$i]->year;
				$Works['EndYear'] = $years[$i+1]->year;
				$Works['Works'] = Works::getPeriodWorks($years[$i]->year,$years[$i+1]->year,$typework_id, $user_id, $type->type);
				array_push($ListWorks, $Works);
		}
	}
else 
{
		foreach ($types as $type)
			for ($i=0; $i < $lenth-2; $i+= 2) { 
				$Works = array();
				$Works['Type'] = $type->type;
				$Works['StartYear'] = $years[$i]->year;
				$Works['EndYear'] = $years[$i+1]->year;
				$work = Works::getPeriodWorks($years[$i]->year,$years[$i+1]->year,$typework_id, $user_id, $type->type);
				$Works['Works'] = $work;
				if ($work != null)
					array_push($ListWorks, $Works);
		}
		foreach ($types as $type)
		{
			$lastWorks = Works::getOneYearWorks($years[$lenth-1]->year,$typework_id, $user_id, $type->type);
			$Works = array();
			$Works['Type'] = $type->type;
			$Works['StartYear'] = $years[$lenth-1]->year;
			$Works['EndYear'] = 0;
			$Works['Works'] = $lastWorks;
			if ($lastWorks != null)
				array_push($ListWorks, $Works);
		}
}


return $ListWorks;
}

function ShowWork($typework_id, $user_id)
{

	$SortedWorks = GetWorks($typework_id,$user_id);
	echo "<div class=\"row\">";
    if (count($SortedWorks) > 0)	
    foreach ($SortedWorks as $Work) {
    echo "<h4 class=\"text-uppercase text-center\">{$Work['Type']}</h4>";
    echo "<h5 class=\"text-center\">{$Work['StartYear']} ";
    if ($Work['EndYear'] != 0)
    echo ' - '.$Work['EndYear'];
    echo "</h5>";
    echo "<table class=\"table table-striped\"><tbody>";
    foreach ($Work['Works'] as $text) 
    	echo "  <tr><td><a href = \"{$text->link}\">{$text->title}</a></td></tr>";
    echo "</tbody></table>";
}
else
	echo "<span class=\" c__block-title col-xs-12\" style=\"text-align: left; font-size:16pt;\">Дані відсутні</span>";


echo "</div>";
}

?>