<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

use Auth;

class User extends Authenticatable
{
    protected $table = "users";
    protected $primaryKey = "user_id"; 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'isadmin', 'isinsystem'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function UpdateData($id, $username, $password, $email,  $isadmin = null, $hasmasters = null)
    {
        $changedata =  array();
        if ($username != null)
            $changedata['username'] = $username;

        if ($password != null)
            $changedata['password'] = Hash::make($password);

        if ($email != null)
            $changedata['email'] = $email; 

        if ($isadmin != null)
            $changedata['isadmin'] = $isadmin;

        if ($hasmasters != null)
            $changedata['hasmasters'] = $hasmasters;

        try{
        DB::connection('mysql2')->table('users')->where('user_id', $id)->update($changedata);
        DB::connection('mysql')->table('users')->where('user_id', $id)->update($changedata);
        }
        catch(QueryException $e)
        {
            return False;
        }
        return True;
    } 


    public static function InsertData($username, $password, $email, $isadmin, $hasmasters)
    {
        $AddData = array();
        $AddData['user_id'] =  uniqid();
        if ($username != null)
            $AddData['username'] = $username;

        if ($password != null)
            $AddData['password'] =  Hash::make($password);

        if ($email != null)
            $AddData['email'] = $email; 
        
        if ($isadmin != null)
            $AddData['isadmin'] = $isadmin;

        if ($hasmasters != null)
            $AddData['hasmasters'] = $hasmasters;

        try{
         DB::connection('mysql2')->table('users')->insert($AddData);
         DB::connection('mysql')->table('users')->insert($AddData);
        }
        catch(QueryException $e)
        {
            return null;
        }
        return  $AddData['user_id'];
    }

    public static function getUsers()
    {
        try{
            $result = DB::table('users')
                    ->join('teachers', 'users.user_id', '=', 'teachers.user_id')
                    ->select('users.user_id', 'users.hasmasters', 'users.isadmin', 'users.username', 'users.email', 'users.password', 'users.updated_at', 'teachers.teacher_id AS teacherid')
                    ->paginate(10);
        }
        catch(QueryException $e)
        {
            return null;
        }
        return $result;
    }


    public static function findData($query_str)
    {
        try{
            $result = DB::table('users')
                        ->join('teachers', 'teachers.user_id', '=', 'users.user_id')
                        ->select('users.user_id', 'users.hasmasters', 'users.isadmin', 'users.username', 'users.email', 'users.password', 'users.updated_at', 'teachers.teacher_id AS teacherid')
                        ->whereRAW("MATCH(
                            users.email,users.username) AGAINST('${query_str}')")
                        ->paginate(10);
        }
        catch(QueryException $e)
        {
            return null;
        }
        return $result;
    }


    public function getId()
    {
        if (Auth::check())
        {
         $user = Auth::user();
         $query = "SELECT u.user_id FROM users AS u
                    WHERE u.username = '{$user->username}' AND u.email = '{$user->email}';";
         try {
          $result = DB::select($query);
         }
         catch(QueryException $e)
         {
            return null;
         }
         return $result[0]->user_id;
        }
        return null;
    }

}
