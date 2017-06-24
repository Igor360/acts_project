<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Teachers extends Model
{
    //
    protected $table = "teachers";

   	public static function getTeacher($user_id)
	{
		$query = "SELECT t.id,t.FirstName,t.MiddleName,t.LastName,t.Department,t.Profession,
					t.Photo,t.TimeDay,t.Room,t.Phone,t.Mobile,t.ProfInterest,t.Discipline,
					p.name as position, u.email as Email, l.AnotherSite, l.Intellect, l.TimeTable
 					FROM fiot_acts.teachers as t inner join fiot_acts.positions as p 
					inner join fiot_acts.users as u inner join fiot_acts.links as l
					WHERE t.position_id = p.id and l.user_id = u.id and t.user_id = u.id and t.user_id ={$user_id};";
		$result = DB::select($query);
		if (count($result) > 0)
			return $result[0];
		return null;
	}

	public static function UpdateData($id, $firstname, $middlename, $lastname, $department, $profession, $photo, $timeday, $room, $phone, $mobile, $profinterests, $discipline, $position, $isteacher = null)
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

		Teachers::where('id',$id)->update($changedata);
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

			DB::table('teachers')->insert($changedata);
		return True;
	} 

	public static function getTeachersForPage($isteacher)
	{
		$query = "SELECT t.id,t.FirstName,t.MiddleName,t.LastName,t.Profession,
					t.Photo,p.name AS position, t.isteacher
                    FROM fiot_acts.teachers AS t JOIN fiot_acts.positions AS p
					WHERE p.id = t.position_id AND t.isteacher = ${isteacher} ORDER BY (p.id);";
		$result = DB::select($query);
		if (count($result) > 0)
			return $result;
		return null;
	}


	   	public static function getTeacherData($id)
	{
		$query = "SELECT t.id,t.FirstName,t.MiddleName,t.LastName,t.Department,t.Profession,
					t.Photo,t.TimeDay,t.Room,t.Phone,t.Mobile,t.ProfInterest,t.Discipline,
					p.name as position, u.email as Email, l.AnotherSite, l.Intellect, l.TimeTable
 					FROM fiot_acts.teachers as t inner join fiot_acts.positions as p 
					inner join fiot_acts.users as u inner join fiot_acts.links as l
					WHERE t.position_id = p.id and l.user_id = u.id and t.user_id = u.id and t.id ={$id};";
		$result = DB::select($query);
		if (count($result) > 0)
			return $result[0];
		return null;
	}
}
