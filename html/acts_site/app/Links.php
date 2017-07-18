<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class Links extends Model
{
    //
    protected $table = "links";

    public static function UpdateData($user_id, $anotersite, $intellect, $timetable)
	{
		$changedata = array();
		if ($anotersite != null)
			$changedata['AnotherSite'] = $anotersite;

		if ($intellect != null)
			$changedata['Intellect'] = $intellect;


		if ($timetable != null)
			$changedata['TimeTable'] = $timetable;

		Links::where('user_id',$user_id)->update($changedata);
		return True;
	} 
    

    public static function InsertData($user_id, $anotersite, $intellect, $timetable)
    {
            $AddData = array();
        if ($user_id != null)
            $AddData['user_id'] = $user_id;

        if ($anotersite != null)
            $AddData['AnotherSite'] = $anotersite;

        if ($intellect != null)
            $AddData['Intellect'] = $intellect; 
        
        if ($timetable != null)
            $AddData['TimeTable'] = $timetable;

        DB::connection('mysql2')->table('links')->insert($AddData);
        DB::connection('mysql')->table('links')->insert($AddData);
    }

}
