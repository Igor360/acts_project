<?php

namespace App;

use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class Teachers extends Model
{
    //
    protected $table = "teachers";
    protected $primaryKey = 'teacher_id';

	public static function UpdateData($id, $firstname, $middlename, $lastname, $department, $profession, $photo, $timeday, $room, $phone, $mobile, $profinterests, $discipline, $position, $isteacher = null)
	{
		$fields_with_data = 0;
		$changedata = array();
		if ($firstname != null)
		{
			$changedata['FirstName'] = $firstname;
			$fields_with_data++;
		}

		if ($middlename != null)
		{
			$changedata['MiddleName'] = $middlename;
			$fields_with_data++;
		}


		if ($lastname != null)
		{
			$changedata['LastName'] = $lastname;
			$fields_with_data++;
		}

		if ($department != null)
		{
			$changedata['Department'] = $department;
			$fields_with_data++;
		}


		if ($profession != null)
		{
			$changedata['Profession'] = $profession;
			$fields_with_data++;
		}

		if ($photo != null)
		{
			$changedata['Photo'] = $photo;
			$fields_with_data++;
		}

		if ($timeday != null)
		{
			$changedata['TimeDay'] = $timeday;
			$fields_with_data++;
		}

		if ($room != null)
		{
			$changedata['Room'] = $room;
			$fields_with_data++;
		}

		if ($phone != null)
		{
			$changedata['Phone'] = $phone;
			$fields_with_data++;
		}

		if ($mobile != null)
		{
			$changedata['Mobile'] = $mobile;
			$fields_with_data++;
		}

		if ($profinterests != null)
		{
			$changedata ['ProfInterest'] = $profinterests;
			$fields_with_data++;
		}

		if ($discipline != null)
		{
			$changedata ['Discipline'] = $discipline;
			$fields_with_data++;
		}

		if ($position != null)
		{
			$changedata['position_id'] = $position;
			$fields_with_data++;
		}

		if ($isteacher != null)
		{
			$changedata['isteacher'] = $isteacher;
			$fields_with_data++;
		}

		if ($fields_with_data == 0)
			return False;

		try{
		Teachers::where('teacher_id',$id)->update($changedata);
		}
        catch(QueryException $e)
        {
            return False;
        }
        return True;
	}


    public static function InsertData($firstname, $middlename, $lastname, $department, $profession, $photo, $timeday, $room, $phone, $mobile, $profinterests, $discipline, $position, $isteacher, $user_id)
	{
		$changedata = array();
		if ($firstname != null)
			$changedata['FirstName'] = $firstname;

		if ($middlename != null)
			$changedata['MiddleName'] = $middlename;


		if ($lastname != null)
			$changedata['LastName'] = $lastname;

		if ($department != null)
			$changedata['Department'] = $department;


		if ($profession != null)
			$changedata['Profession'] = $profession;

		if ($photo != null)
			$changedata['Photo'] = $photo;

		if ($timeday != null)
			$changedata['TimeDay'] = $timeday;

		if ($room != null)
			$changedata['Room'] = $room;

		if ($phone != null)
			$changedata['Phone'] = $phone;

		if ($mobile != null)
			$changedata['Mobile'] = $mobile;

		if ($profinterests != null)
			$changedata ['ProfInterest'] = $profinterests;

		if ($discipline != null)
			$changedata ['Discipline'] = $discipline;

		if ($position != null)
			$changedata['position_id'] = $position;

		if ($isteacher != null)
			$changedata['isteacher'] = $isteacher;

		if ($user_id != null)
			$changedata['user_id'] = $user_id;

		try{
	    DB::connection('mysql2')->table("teachers")->insert($changedata);
        DB::connection('mysql')->table("teachers")->insert($changedata);
		}
        catch(QueryException $e)
        {
            return False;
        }
        return True;
	}

	public static function getTeachersForPage($isteacher)
	{
		$query = "SELECT t.teacher_id, t.FirstName, t.MiddleName, t.LastName, t.Profession,
					t.Photo, p.name AS position, t.isteacher
                    FROM teachers AS t JOIN positions AS p
					WHERE p.position_id = t.position_id AND t.isteacher = ${isteacher} ORDER BY (p.position_id);";
		try {
		 $result = DB::select($query);
		}
		catch(QueryException $e)
		{
			return null;
		}
		if (count($result) > 0)
			return $result;
		return null;
	}


	   	public static function getTeacherData($id)
	{
		$query = "SELECT t.teacher_id, t.FirstName, t.MiddleName, t.LastName, t.Department, t.Profession,
					 t.Photo, t.TimeDay, t.Room, t.Phone, t.Mobile, t.ProfInterest, t.Discipline,
					p.name as position, u.email as Email, l.AnotherSite, l.Intellect, l.TimeTable, t.isteacher
 					FROM teachers as t inner join positions as p
					inner join users as u inner join links as l
					WHERE t.position_id = p.position_id and l.user_id = u.user_id and t.user_id = u.user_id and t.teacher_id ={$id};";
		try {
		 $result = DB::select($query);
		}
		catch(QueryException $e)
		{
			return null;
		}
		if (count($result) > 0)
			return $result[0];
		return null;
	}



   	public static function getTeacher($user_id)
	{
		$query = "SELECT t.teacher_id, t.FirstName, t.MiddleName, t.LastName, t.Department, t.Profession,
					 t.Photo, t.TimeDay, t.Room, t.Phone, t.Mobile, t.ProfInterest, t.Discipline,
					p.name as position, u.email as Email, l.AnotherSite, l.Intellect, l.TimeTable, t.isteacher
 					FROM teachers as t inner join positions as p
					inner join users as u inner join links as l
					WHERE t.position_id = p.position_id and l.user_id = u.user_id and t.user_id = u.user_id and t.user_id =
					'{$user_id}';";
		try {
		 $result = DB::select($query);
		}
		catch(QueryException $e)
		{
			return null;
		}
		if (count($result) > 0)
			return $result[0];
		return null;
	}

  public static function TeacherDataValidator($request)
  {
      $Rules = array();

      if ($request['firstname'] != null)
          $Rules['firstname'] = 'required|string|min:6';

      if ($request['middlename'] != null)
          $Rules['middlename'] = 'required|string|min:6';

      if ($request['lastname'] != null)
          $Rules['lastname'] = 'required|string|min:6';

      if ($request['department'] != null)
        $Rules['department'] = 'required|string|min:4';

      if ($request['profession'] != null)
        $Rules['profession'] = 'required|string|min:6';

      if ($request['photo'] != null)
        $Rules['photo'] = 'mimes:jpeg,png,bmp,gif';

      if ($request['datetime'] != null)
        $Rules['datetime'] = 'required|min:4';

      if ($request['room'] != null)
        $Rules['room'] = 'required|string';

      if ($request['phone'] != null)
        $Rules['phone'] = 'required|min:10';

      if ($request['mobile'] != null)
        $Rules['mobile'] = 'required|min:10';

      if ($request['profint'] != null)
        $Rules['profint'] = 'required|min:6';

      if ($request['disciplines'] != null)
        $Rules['disciplines'] = 'required|min:6';

      if ($request['position'] != null)
        $Rules['position'] = 'required|min:6';

      if ($request['isteacher'] != null)
        $Rules['isteacher'] = 'required|boolean';
      if (count($Rules) > 0)
       {
         $Validator = \Validator::make($request->all(), $Rules);
         if ($Validator->fails())
          return redirect()->back()->withErrors($Validator->errors());
       }
  }
  public static function DataValidator($request)
  {
      $Rules = array();

      if ($request['firstname'] != null)
          $Rules['firstname'] = 'required|string|min:6';

      if ($request['middlename'] != null)
          $Rules['middlename'] = 'required|string|min:6';

      if ($request['lastname'] != null)
          $Rules['lastname'] = 'required|string|min:6';

      if ($request['department'] != null)
        $Rules['department'] = 'required|string|min:4';

      if ($request['profession'] != null)
        $Rules['profession'] = 'required|string|min:6';

      if ($request['photo'] != null)
        $Rules['photo'] = 'mimes:jpeg,png,bmp,gif';

      if ($request['datetime'] != null)
        $Rules['datetime'] = 'required|min:4';

      if ($request['room'] != null)
        $Rules['room'] = 'required|string';

      if ($request['phone'] != null)
        $Rules['phone'] = 'required|min:10';

      if ($request['mobile'] != null)
        $Rules['mobile'] = 'required|min:10';

      if ($request['profint'] != null)
        $Rules['profint'] = 'required|min:6';

      if ($request['disciplines'] != null)
        $Rules['disciplines'] = 'required|min:6';

      if ($request['position'] != null)
        $Rules['position'] = 'required|min:6';

      if ($request['isteacher'] != null)
        $Rules['isteacher'] = 'required|boolean';
      if (count($Rules) > 0)
       {
         $Validator = \Validator::make($request->all(), $Rules);
         return $Validator;
       }
  }
}
