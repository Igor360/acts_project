<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ArticleFiles extends Model
{
    //
    protected $table = 'articlefiles';


   	public static function getFiles($article_id, $articles_image)
	{
        $path_to_image = explode('/', $articles_image);
        $image = $path_to_image[count($path_to_image)-1];
		$query = "SELECT a.id, a.title, a.img, a.isText, f.filename, f.mime,  f.originalname, f.id as file_id
                    FROM articles AS a JOIN articlefiles AS af JOIN files AS f
                    WHERE af.idfile = f.id AND af.idarticle = a.id AND a.id = {$article_id} AND f.filename != '{$image}';";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}


    public static function getImages($article_id)
    {
        $query = "SELECT a.id, a.title, a.img, a.isText, f.filename, f.mime,  f.originalname, f.id as file_id
                    FROM articles AS a JOIN articlefiles AS af JOIN files AS f
                    WHERE af.idfile = f.id AND af.idarticle = a.id AND a.id = {$article_id} AND (f.mime = 'image/jpg' OR f.mime =  'image/png' OR f.mime = 'image/jpeg');";
        try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
        return $result;
    }

	public static function InsertData($article_id, $file_id)
    {
        $AddData = array();
        if ($article_id != null)
            $AddData['idarticle'] = $article_id;

        if ($file_id != null)
            $AddData['idfile'] =  $file_id;

        DB::table('articlefiles')->insert($AddData);
    }
}
