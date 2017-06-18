<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    //
    protected $table = "text";

    public function textstyle()
    {
    	return	$this->hasMany('App\TextStyles');
    } 



    
}
