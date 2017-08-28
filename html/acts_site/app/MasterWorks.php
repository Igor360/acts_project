<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class MasterWorks extends Model
{
    //
    protected $table = "masterworks";
    protected $primaryKey = 'masterwork_id';

      public static function InsertData($name, $description,$maintext, $datepublish, $user_id)
    {
    		$AddData = array(
    			'name' => $name,
    			'description' => $description,
    			'mainText' => $maintext,
    			'datepublish' => $datepublish,
    			'user_id' => $user_id,
    			 );
    	try{
    		DB::table('masterworks')->insert($AddData);
    	}
        catch(QueryException $e)
        {
            return False;
        }
        return True;
    }



	public static function UpdateData($id, $name, $description,$maintext, $datepublish, $user_id = null)
	{
		$fields_with_data = 0;
		$changedata = array();
		if ($name != null)
		{
			$changedata['name'] = $name;
			$fields_with_data++;
		}

		if ($description != null)
		{
			$changedata['description'] = $description;
			$fields_with_data++;
		}

		if ($maintext != null)
		{
			$changedata['mainText'] = $maintext;
			$fields_with_data++;
		}

		if ($datepublish != null)
		{
			$changedata['datepublish'] = $datepublish;
			$fields_with_data++;
		}

		if ($user_id != null)
		{
			$changedata['user_id'] = $user_id;
			$fields_with_data++;
		}

		if($fields_with_data == 0)
			return False;

		try{
		MasterWorks::where('masterwork_id',$id)->update($changedata);
		}
        catch(QueryException $e)
        {
            return False;
        }
        return True;
	}

	public static function search_data($search_query)
	{
		try{
		$result = DB::table('masterworks')
				  ->select('masterworks.*')
				  ->whereRAW("match(masterworks.name, masterworks.description, masterworks.mainText) against('${search_query}') or masterworks.datepublish LIKE ('%${search_query}%')")
				  ->paginate(5);
		}
        catch(QueryException $e)
        {
            return null;
        }
		return $result;
	}

}
