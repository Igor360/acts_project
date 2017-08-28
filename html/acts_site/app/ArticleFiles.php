<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;


class ArticleFiles extends Model
{
    //
    protected $table = 'articlefiles';
    protected $primaryKey = 'articlefile_id';


   	public static function getFiles($article_id, $articles_image)
	{
        $path_to_image = explode('/', $articles_image);
        $image = $path_to_image[count($path_to_image)-1];
		$query = "SELECT a.article_id, a.title, a.img, a.isText, f.filename, f.mime,  f.originalname, f.file_id
                    FROM articles AS a JOIN articlefiles AS af JOIN files AS f
                    WHERE af.file_id = f.file_id AND af.article_id = a.article_id AND a.article_id = {$article_id} AND f.filename != '{$image}';";
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
        $query = "SELECT a.article_id, a.title, a.img, a.isText, f.filename, f.mime,  f.originalname, f.file_id
                    FROM articles AS a JOIN articlefiles AS af JOIN files AS f
                    WHERE af.file_id = f.file_id AND af.article_id = a.article_id AND a.article_id = {$article_id} AND (f.mime = 'image/jpg' OR f.mime =  'image/png' OR f.mime = 'image/jpeg');";
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
            $AddData['article_id'] = $article_id;

        if ($file_id != null)
            $AddData['file_id'] =  $file_id;
        try{
        DB::table('articlefiles')->insert($AddData);
        }
        catch(QueryException $e)
        {
            return True;
        }
        return True;
    }

  public static function AddArticleDocs($photo_file, $user_id)
    {
        if ($photo_file != null)
        {
            //isPhoto($user_id);
            $extension = $photo_file->getClientOriginalExtension();
            Storage::disk('documents_article')->put($photo_file->getFilename().'.'.$extension,  File::get($photo_file));
            $entry = new Files();
            $entry->mime = $photo_file->getClientMimeType();
            $entry->originalname = $photo_file->getClientOriginalName();
            $entry->filename = $photo_file->getFilename().'.'.$extension;
            $id = $user_id;
            $entry->user_id = $id;
            $entry->size = filesize($photo_file);
            $entry->save();
            return $entry;
        }

    }

  public static function isArticlePhoto($article_id)
    {
        $file = ArticleFiles::getImages($article_id);
        if ( $file != null )
        {
          if (count($file) > 0)
            Storage::delete($file[0]->filename);
          Files::where('file_id', $file[0]->file_id)->delete();
          return True;
        }
        return False;
    }

}
