<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class Positions extends Model
{
    //
    protected $table = "positions";

    public static function getAll()
    {
    	$query = "SELECT * From positions as p;";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
    }


}
