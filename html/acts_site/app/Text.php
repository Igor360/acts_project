<?php

namespace App;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Eloquent\Model;

class Text extends Model
{

    //
    protected $table = "text";

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
            $AddData['type_id'] = $type_id; 

            DB::table('text')->insert($AddData);
    }


    public static function UpdateData($id , $text)
    {
        $AddData = array();
        if ($text != null)
            $AddData['text'] = $text;

       Text::where('id',$id)->update($AddData);
    }
    
}
