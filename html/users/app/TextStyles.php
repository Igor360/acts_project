<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class TextStyles extends Model
{
    //
    protected $table = "textstyle";

   	public static function getTextStyle($article_id)
	{
		$query = "SELECT te.name 
		FROM fiot_acts.text AS t INNER JOIN fiot_acts.textelements AS te INNER JOIN fiot_acts.textstyle AS ts
		WHERE t.id = ts.idtext AND te.id = ts.idtextelement AND t.id = {$article_id};";
		$result = DB::select($query);
		return $result;
	}


}
