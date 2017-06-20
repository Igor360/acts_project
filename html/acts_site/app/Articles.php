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


	public static function getAll()
	{
		$query = "SELECT a.id, a.title, p.Name AS page, tt.name AS type FROM fiot_acts.articles AS a  JOIN fiot_acts.pages AS p JOIN fiot_acts.texttype AS tt
			WHERE a.page_id = p.id AND a.type_id = tt.id ORDER BY(a.id);";
		$result = DB::select($query);
		return $result;
	}



	public static function InsertData($title, $img, $isText, $page_id, $type_id)
    {
        $AddData = array();
        if ($title != null)
            $AddData['title'] = $title;

        if ($img != null)
            $AddData['img'] =  $img;

        if ($isText != null)
            $AddData['isText'] = $isText; 
        
        if ($page_id != null)
            $AddData['page_id'] = $page_id;

        if ($type_id != null)
            $AddData['type_id'] = $type_id;

            DB::table('articles')->insert($AddData);
    }

    	public static function UpdateData($id, $title, $img, $isText, $page_id)
    {
        $AddData = array();
        if ($title != null)
            $AddData['title'] = $title;

        if ($img != null)
            $AddData['img'] =  $img;

        if ($isText != null)
            $AddData['isText'] = $isText; 
        
        if ($page_id != null)
            $AddData['page_id'] = $page_id;

            Articles::where('id',$id)->update($AddData);
    }
}
