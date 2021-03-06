<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextType extends Model
{
    //
    protected $table = "texttype";
    protected $primaryKey = 'texttype_id';

   	public function articles()
    {
    	return $this->hasMany('App\Articles');
    }
    
    public function text()
    {
    	return $this->hasMany('App\Text');
    }

}
