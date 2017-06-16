<?php

namespace App;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
    protected $table = "articles";

    public function text()
    {
    	return $this->hasMany('App\Text');
    }

    // метод для отримання статей для певної сторінки
	public static function getPageArticles($page)
	{
		$query = "SELECT a.id, a.title, a.img, a.date, a.isText, p.Name, tt.name FROM fiot_acts.articles AS a INNER JOIN fiot_acts.pages AS p 
					INNER JOIN fiot_acts.texttype AS tt
					WHERE a.page_id = p.id  AND p.name = \"{$page}\" 
					AND tt.id = a.type_id AND tt.name = \"article\"  ORDER BY(a.id);";
		$result = DB::select($query);
		return $result;
	}


	public static function getNews()
	{
		$query = "SELECT a.id, a.title, a.img, a.date, a.isText, p.Name FROM fiot_acts.articles AS a INNER JOIN fiot_acts.pages AS p 
					WHERE a.page_id = p.id  AND p.name = \"news\" ORDER BY(a.id);";
		$result = DB::select($query);
		return $result;
	}

	public static function getSomeNews($num)
	{
		$query = "SELECT a.id, a.title, a.img, a.date, a.isText, p.Name FROM fiot_acts.articles AS a INNER JOIN fiot_acts.pages AS p 
					WHERE a.page_id = p.id  AND p.name = \"news\" ORDER BY(a.id) LIMIT 0,{$num};";
		$result = DB::select($query);
		return $result;
	}

	public static function getOneNews($news_id)
	{
		$query = "SELECT a.id, a.title, a.img, a.date, a.isText, p.Name FROM fiot_acts.articles AS a INNER JOIN fiot_acts.pages AS p 
					WHERE a.page_id = p.id  AND p.name = \"news\" AND a.id = {$news_id};";
		$result = DB::select($query);
		return $result;
	}
}
