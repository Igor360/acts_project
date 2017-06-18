<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class MasterWorks extends Model
{
    //
    protected $table = "masterworks";


      public static function InsertData($name, $description,$maintext, $datepublish, $user_id)
    {
    		$AddData = array(
    			'name' => $name,
    			'description' => $description,
    			'mainText' => $maintext,
    			'datepublish' => $datepublish,
    			'user_id' => $user_id,
    			 );
    		echo var_dump($AddData);
    		DB::table('masterworks')->insert($AddData);
    }



	public static function UpdateData($id, $name, $description,$maintext, $datepublish, $user_id = null)
	{
		$changedata = array();
		if ($name != null)
			$changedata['name'] = $name;

		if ($description != null)
			$changedata['description'] = $description;

		if ($maintext != null)
			$changedata['mainText'] = $maintext;

		if ($datepublish != null)
			$changedata['datepublish'] = $datepublish;

		if ($user_id != null)
			$changedata['user_id'] = $user_id;

		MasterWorks::where('id',$id)->update($changedata);
		return True;
	} 

}
