<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Works extends Model
{
    //
    protected $table = "works";

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
    		echo var_dump($AddData);
    		DB::table('works')->insert($AddData);
    }



	public static function UpdateData($id,$type, $date,$title, $link, $user_id = null, $typework_id = null)
	{
		$changedata = array();
		if ($type != null)
			$changedata['type'] = $type;

		if ($date != null)
			$changedata['DatePublish'] = $date;

		if ($title != null)
			$changedata['title'] = $title;

		if ($link != null)
			$changedata['link'] = $link;

		if ($user_id != null)
			$changedata['user_id'] = $user_id;

		if ($typework_id != null)
			$changedata['typework_id'] = $typework_id;

		Works::where('id',$id)->update($changedata);
		return True;
	} 



    // 
	public static function getYearWorks($typework_id, $user_id)
	{
		$query = "SELECT DISTINCT year(w.datePublish) AS year FROM fiot_acts.works AS w WHERE w.typework_id = ${typework_id} AND w.user_id = ${user_id} ORDER BY (w.DatePublish);";
		$result = DB::select($query);
		return $result;
	}

	public static function getTypesWorks($typework_id, $user_id)
	{
		$query = "SELECT DISTINCT  w.type FROM fiot_acts.works AS w WHERE w.typework_id = ${typework_id} AND w.user_id = ${user_id} ORDER BY(w.type);";
		$result = DB::select($query);
		return $result;
	} 

	public static function getPeriodWorks($year_start, $year_end,$typework_id, $user_id, $type)
	{
		$query = "SELECT * FROM fiot_acts.works AS w WHERE w.typework_id = {$typework_id} and w.user_id = ${user_id} and year(w.datePublish) >= ${year_start} AND year(w.datePublish) <= ${year_end} AND w.type = '${type}' order by(w.datePublish);";
		$result = DB::select($query);
		return $result;
	}

	public static function getOneYearWorks($year,$typework_id, $user_id, $type)
	{
		$query = "SELECT * FROM fiot_acts.works AS w WHERE w.typework_id = ${typework_id} and w.user_id = ${user_id} and year(w.datePublish) <= ${year} AND w.type = '${type}' order by(w.datePublish);";
		$result = DB::select($query);
		return $result;
	}

}
