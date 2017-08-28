<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class MasterFiles extends Model
{
    //
    protected $table = "masterfiles";
    protected $primaryKey = 'masterfile_id';

   	public static function getFiles($masterwork_id)
	{
		$query = "SELECT f.originalname, f.file_id, f.size, f.filename FROM masterworks AS 		mw JOIN masterfiles AS mf JOIN files AS f
					WHERE mw.user_id =  f.user_id AND mw.masterwork_id = mf.masterwork_id AND f.file_id = mf.file_id AND mw.masterwork_id = {$masterwork_id};";
		try {
         $result = DB::select($query);
        }
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}


	public static function InsertData($masterwork_id, $file_id)
    {
        $AddData = array();
        if ($masterwork_id != null)
            $AddData['masterwork_id'] = $masterwork_id;

        if ($file_id != null)
            $AddData['file_id'] =  $file_id;
        try{
        DB::table('masterfiles')->insert($AddData);
        }
        catch(QueryException $e)  // перевыркка на помилки в виконанні запиту
        {
            return False;
        }
        return True;
    } 



}
