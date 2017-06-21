<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class MasterFiles extends Model
{
    //
     protected $table = "masterfiles";

   	public static function getFiles($masterwork_id)
	{
		$query = "SELECT f.originalname, f.id, f.size, f.filename FROM fiot_acts.masterworks AS 		mw JOIN fiot_acts.masterfiles AS mf JOIN files AS f   
					WHERE mw.user_id =  f.user_id AND mw.id = mf.idmasterworks AND f.id = mf.idfile AND mw.id = {$masterwork_id};";
		$result = DB::select($query);
		return $result;
	}


	public static function InsertData($masterwork_id, $file_id)
    {
        $AddData = array();
        if ($masterwork_id != null)
            $AddData['idmasterworks'] = $masterwork_id;

        if ($file_id != null)
            $AddData['idfile'] =  $file_id;

        DB::table('masterfiles')->insert($AddData);
    }

}
