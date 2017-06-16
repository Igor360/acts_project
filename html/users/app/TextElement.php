<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextElement extends Model
{
    //
    protected $table = "textelements";

    public function textstyle()
    {
    	return	$this->hasMany('App\TextStyles');
    } 
}
