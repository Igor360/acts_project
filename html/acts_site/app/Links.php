<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class Links extends Model
{
    //
    protected $table = "links";
    protected $primaryKey = 'link_id';


    // обновление даних посилань
    public static function UpdateData($user_id, $anotersite, $intellect, $timetable)
	{
        $fields_with_data = 0;
		$changedata = array();
		if ($anotersite != null)
        {
			$changedata['AnotherSite'] = $anotersite;
            $fields_with_data++;
        }

		if ($intellect != null)
		{
            $changedata['Intellect'] = $intellect;
            $fields_with_data++;
        }

		if ($timetable != null)
        {
			$changedata['TimeTable'] = $timetable;
            $fields_with_data;
        }


        if ($fields_with_data ==  0)
            return False;

        try{
		  Links::where('user_id',$user_id)->update($changedata);
        }
        catch(QueryException $e)  // перевыркка на помилки в виконанні запиту
        {
            return False;
        }
		return True;
	}

    // додавання нових даних до бд
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

        try{
        DB::connection('mysql2')->table('links')->insert($AddData); // підключенні до бд та виполнение запита
        DB::connection('mysql')->table('links')->insert($AddData);
          }
        catch(QueryException $e)
        {
            return False;
        }
        return True;
    }

    public static function LinksValidator($links_array, $request){
      $Rules = array();
      foreach ($links_array as $key) {
        if ($request[$key] != null)
         $Rules[$key] = 'required|url|min:2';
      }
      if (count($Rules) > 0)
         {
           $Validator = \Validator::make($request->all(), $Rules);
           if ($Validator->fails())
            return redirect()->back()->withErrors($Validator->errors());
         }
    }

    public static function UserLinksValidator($links_array, $request)
    {
        $Rules = array();
        foreach ($links_array as $key) {
            if ($request[$key] != null)
             $Rules[$key] = 'required|url|min:2';
        }
        if (count($Rules) > 0)
         {
           $Validator = \Validator::make($request->all(), $Rules);
           return $Validator;
         }
    }

}
