<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
    protected $table = "articles";
    protected $primaryKey = 'article_id';

    public function text()
    {
    	return $this->hasMany('App\Text');
    }

    // метод для отримання статей для певної сторінки
	public static function getPageArticles($page)
	{
        try {
         $result = DB::table('articles')
                    ->join('pages', 'articles.page_id', '=', 'pages.page_id')
                    ->join('texttype', 'texttype.texttype_id', '=', 'articles.texttype_id')
                    ->select('articles.article_id', 'articles.title', 'articles.img', 'articles.date',
                        'articles.date', 'articles.isText', 'pages.Name', 'texttype.name')
                    ->where('pages.Name', '=', $page)
                    ->where('texttype.name', '=', 'article')
                    ->orderBy('articles.article_id')
                    ->paginate(5);
	    }
        catch(QueryException $e)
        {
            return null;
        }
        return $result;
	}

    // достаю новини из бд
	public static function getNews()
	{
        try{
         $result = DB::table('articles')
                     ->join('pages', 'articles.page_id', '=', 'pages.page_id')
                     ->select('articles.article_id', 'articles.title', 'articles.img', 'articles.date',
                        'articles.isText', 'pages.Name')
                     ->where('pages.Name', '=', 'news')
                     ->orderBy('articles.date', 'desc')
                     ->paginate(30);
        }
        catch(QueryException $e)
        {
            return null;
        }
        return $result;
	}

    // достаю певное количество новин из бд
	public static function getSomeNews($num)
	{
		try {
         $result = DB::table('articles')
                     ->join('pages', 'articles.page_id', '=', 'pages.page_id')
                     ->select('articles.article_id', 'articles.title', 'articles.img', 'articles.date',
                        'articles.isText', 'pages.Name')
                     ->where('pages.Name', '=', 'news')
                     ->orderBy('articles.date', 'desc')
                     ->limit($num)
                     ->get();
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}


    // достаю новину по ее индетификатору
	public static function getOneNews($news_id)
	{
		try {
         $result =  DB::table('articles')
                     ->join('pages', 'articles.page_id', '=', 'pages.page_id')
                     ->select('articles.article_id', 'articles.title', 'articles.img', 'articles.date',
                        'articles.isText', 'pages.Name')
                     ->where('pages.Name', '=', 'news')
                     ->where('articles.article_id', '=', $news_id)
                     ->get()
                     ->first();
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}

    // достаю все статти
	public static function getAll()
	{
		try {
         $result = DB::table('articles')
                    ->join('pages', 'articles.page_id', '=', 'pages.page_id')
                    ->join('texttype', 'texttype.texttype_id', '=', 'articles.texttype_id')
                    ->select('articles.article_id', 'articles.title', 'pages.Name as page', 'texttype.name as type')
                    ->orderBy('articles.article_id')
                    ->paginate(10);
	    }
        catch(QueryException $e)
        {
            return null;
        }
        return $result;
	}


	public static function searchArticle($query_str)
	{
        $search_data = "(match(articles.title) against('{$query_str}') or match(text.text) against('{$query_str}'))";
	    try {
        $result = DB::table('articles')
                    ->join('pages', 'articles.page_id', '=', 'pages.page_id')
                    ->join('texttype', 'articles.texttype_id', '=', 'texttype.texttype_id')
                    ->join('text', 'articles.article_id', '=', 'text.article_id')
                    ->select('articles.article_id', 'articles.title', 'pages.Name as page', 'texttype.name as type', 'text.text', 'articles.img', 'articles.isText')
                    ->where('text.texttype_id', '!=', 1)
                    ->whereRAW($search_data)
                    ->distinct('articles.article_id')
                    ->paginate(5);
		}
        catch(QueryException $e)
        {
            return null;
        }
        return $result;
	}

	public static function getArticles (Array $search_data)
	{
            $query = "";
            $count = count($search_data)-1;
			foreach ($search_data as $key => $value) {
				switch ($key) {
					case 'texttype':
						$query .= " articles.texttype_id = ${value} ";
						break;

					case 'title':
						$query .= " match(articles.title) against('${value}') ";
						break;

					case 'page':
						$query .= " articles.page_id = ${value} ";
						break;

					default:
						break;
				}
                if ($count > 0)
				 $query .= "AND";
                $count--;
			}
		try {
         $result = DB::table('articles')
                    ->join('pages', 'articles.page_id', '=', 'pages.page_id')
                    ->join('texttype', 'texttype.texttype_id', '=', 'articles.texttype_id')
                    ->select('articles.article_id', 'articles.title', 'pages.Name as page', 'texttype.name as type')
                    ->whereRAW($query)
                    ->orderBy('articles.article_id')
                    ->paginate(10);

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
            $article->texttype_id = $type_id;

        try{
           $article->save();
        }
        catch(QueryException $e)
        {
            return null;
        }
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
        try{
            Articles::where('id',$id)->update($AddData);
        }
        catch(QueryException $e)
        {
            return False;
        }
        return True;
    }
  public static function ConvertDate($Date)
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
}
