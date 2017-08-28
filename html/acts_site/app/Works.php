<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Works extends Model
{
    //
    protected $table = "works";
    protected $primaryKey = 'work_id';

    public static function InsertData($type, $date,$title, $link, $user_id, $typework_id)
    {
    	$AddData = array(
    			'type' => $type,
    			'DatePublish' => $date,
    			'title' => $title,
    			'link' => $link,
    			'user_id' => $user_id,
    			'typework_id' => $typework_id
    			 );
    	try{
    		DB::table('works')->insert($AddData);
    	}
        catch(QueryException $e)
        {
            return False;
        }
        return True;
    }



	public static function UpdateData($id,$type, $date,$title, $link, $user_id = null, $typework_id = null)
	{
		$fields_with_data = 0;
		$changedata = array();
		if ($type != null)
		{
			$changedata['type'] = $type;
			$fields_with_data++;
		}

		if ($date != null)
		{
			$changedata['DatePublish'] = $date;
			$fields_with_data++;
		}

		if ($title != null)
		{
			$changedata['title'] = $title;
			$fields_with_data++;
		}

		if ($link != null)
		{
			$changedata['link'] = $link;
			$fields_with_data++;
		}

		if ($user_id != null)
		{
			$changedata['user_id'] = $user_id;
			$fields_with_data++;
		}

		if ($typework_id != null)
		{
			$changedata['typework_id'] = $typework_id;
			$fields_with_data++;
		}

		if ($fields_with_data == 0)
			return False;

		try{
		Works::where('work_id',$id)->update($changedata);
		}
        catch(QueryException $e)
        {
            return False;
        }
        return True;
	}



    //
	public static function getYearWorks($typework_id, $user_id)
	{
		$query = "SELECT DISTINCT year(w.datePublish) AS year FROM works AS w
			WHERE w.typework_id = ${typework_id} AND w.user_id = ${user_id} ORDER BY(year);";
		 try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}

	public static function getTypesWorks($typework_id, $user_id)
	{
		$query = "SELECT DISTINCT  w.type FROM works AS w WHERE w.typework_id = ${typework_id} AND w.user_id = ${user_id} ORDER BY(w.type);";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}

	public static function getPeriodWorks($year_start, $year_end,$typework_id, $user_id, $type)
	{
		$query = "SELECT * FROM works AS w WHERE w.typework_id = {$typework_id} and w.user_id = ${user_id} and year(w.datePublish) >= ${year_start} AND year(w.datePublish) <= ${year_end} AND w.type = '${type}' order by(w.datePublish);";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}

	public static function getOneYearWorks($year,$typework_id, $user_id, $type)
	{
		$query = "SELECT * FROM works AS w WHERE w.typework_id = ${typework_id} and w.user_id = ${user_id} and year(w.datePublish) <= ${year} AND w.type = '${type}' order by(w.datePublish);";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}


	public static function search_work($search_query, $typework_id, $user_id)
	{
		try{
		$result = DB::table('works')
				  ->select('works.*')
				  ->where('works.typework_id', '=', $typework_id)
				  ->where('works.user_id', '=', $user_id)
				  ->whereRAW(" (works.title Like('%${search_query}%') or works.datePublish like('%${search_query}%') or works.type Like('%${search_query}%') )")
				  ->paginate(5);
		}
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}


  // метод котрий сотртирует дание
  public static function GetWorks($typework_id, $user_id)
  {
  $years = Works::getYearWorks($typework_id, $user_id); // года
  $types = Works::getTypesWorks($typework_id, $user_id); // типи робіт
  $lenth = count($years); // розмір масиву з роками
  $ListWorks = array();
  if ($years != null) // перевірка чи є роки
   if ($lenth % 2 == 0) // сотрування по рокам
  	{
      // в  даному випадку  відбувається сортування по два бо величина масиву років є парне число
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

  // метод для виводу робіт
  public static function ShowWork($typework_id, $user_id)
  {

  	$SortedWorks = Works::GetWorks($typework_id,$user_id);
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
  	echo "<span class=\" c__block-title col-xs-12\" style=\"text-align: left; font-size:16pt;\">".__('teachstaff.message_no_data')."</span>";


  echo "</div>";
  }
}
