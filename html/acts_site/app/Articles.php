<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
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
		$query = "SELECT a.id, a.title, a.img, a.date, a.isText, p.Name, tt.name FROM articles AS a INNER JOIN pages AS p 
					INNER JOIN texttype AS tt
					WHERE a.page_id = p.id  AND p.name = \"{$page}\" 
					AND tt.id = a.type_id AND tt.name = \"article\"  ORDER BY(a.id);";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}


	public static function getNews()
	{
		$query = "SELECT a.id, a.title, a.img, a.date, a.isText, p.Name FROM articles AS a INNER JOIN pages AS p 
					WHERE a.page_id = p.id  AND p.name = \"news\" ORDER BY(a.date) DESC;";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}

	public static function getSomeNews($num)
	{
		$query = "SELECT a.id, a.title, a.img, a.date, a.isText, p.Name FROM articles AS a INNER JOIN pages AS p 
					WHERE a.page_id = p.id  AND p.name = \"news\" ORDER BY(a.date) DESC LIMIT 0,{$num};";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}

	public static function getOneNews($news_id)
	{
		$query = "SELECT a.id, a.title, a.img, a.date, a.isText, p.Name FROM articles AS a INNER JOIN pages AS p 
					WHERE a.page_id = p.id  AND p.name = \"news\" AND a.id = {$news_id};";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}


	public static function getAll()
	{
		$query = "SELECT a.id, a.title, p.Name AS page, tt.name AS type FROM articles AS a  JOIN pages AS p JOIN texttype AS tt
			WHERE a.page_id = p.id AND a.type_id = tt.id ORDER BY(a.id) LIMIT 0,200;";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}


	public static function searchArticle($query_str)
	{
		$query = "SELECT a.id, a.title, p.Name AS page, tt.name AS type, t.text, a.img, a.isText
					FROM articles AS a  JOIN pages AS p JOIN texttype AS tt	JOIN text as t 
					WHERE a.page_id = p.id AND a.type_id = tt.id and t.article_id = a.id and t.type_id !=1 and (match(a.title) against('{$query_str}') or match(t.text) against('{$query_str}'));";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}

	public static function getArticles (Array $search_data)
	{
		$query= "SELECT a.id, a.title, p.Name AS page, tt.name AS type FROM articles AS a  JOIN pages AS p JOIN texttype AS tt
			WHERE ";

			$keys = array_keys($search_data);
			foreach ($search_data as $key => $value) {
				switch ($key) {
					case 'type':
						$query .= " a.type_id = ${value} "; 
						break;
					
					case 'title':
						$query .= " match(a.title) against('${value}') ";
						break;

					case 'page':
						$query .= " a.page_id = ${value} ";
						break;	

					default:
						break;
				}
				$query .= "AND"; 
			}
		$query .= " a.page_id = p.id AND a.type_id = tt.id ORDER BY(a.id) LIMIT 0,100;";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}



	public static function InsertData($title, $img, $isText, $page_id, $type_id)
    {
        $article = new Articles();
        if ($title != null)
            $article->title = $title;

        if ($img != null)
            $article->img =  $img;

        if ($isText != null)
            $article->isText = $isText; 
        
        if ($page_id != null)
            $article->page_id = $page_id;

        if ($type_id != null)
            $article->type_id = $type_id;

            $article->save();

        return $article;

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
