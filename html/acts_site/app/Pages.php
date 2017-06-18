<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //
    protected $table = "pages";

    public function articles()
    {
    	return $this->hasMany('App\Articles');
    } 

}
