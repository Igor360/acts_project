<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Positions extends Model
{
    //
    protected $table = "positions";

    public static function getAll()
    {
    	$query = "SELECT * From fiot_acts.positions as p;";
		$result = DB::select($query);
		return $result;
    }


}
