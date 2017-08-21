<?php

namespace App;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Eloquent\Model;

class Text extends Model
{

    //
    protected $table = "text";
    protected $primaryKey = 'text_id';

    public function textstyle()
    {
    	return	$this->hasMany('App\TextStyles');
    } 

    public static function InsertData($text, $article_id, $type_id)
    {
        $AddData = array();
        if ($text != null)
            $AddData['text'] = $text;

        if ($article_id != null)
            $AddData['article_id'] =  $article_id;

        if ($type_id != null)
            $AddData['texttype_id'] = $type_id; 
        try{
            DB::table('text')->insert($AddData);
        }
        catch(QueryException $e)
        {
            return False;
        }
        return True;
    }


    public static function UpdateData($id , $text)
    {
        $AddData = array();
        if ($text != null)
            $AddData['text'] = $text;
        try{
       Text::where('text_id',$id)->update($AddData);
    }
    catch(QueryException $e)
    {
        return False;
    }
    return True;
    }
}
