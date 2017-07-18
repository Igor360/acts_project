<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Auth;

class User extends Authenticatable
{
    protected $table = "users";
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

    public function getId()
    {
        if (Auth::check())
        {
         $user = Auth::user();
         $query = "SELECT u.id FROM users AS u
                    WHERE u.username = '{$user->username}' AND u.email = '{$user->email}';";
         $result = DB::select($query);
         return $result[0]->id;
        }
        return null;
    }

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

        DB::connection('mysql2')->table('users')->update($changedata);
        DB::connection('mysql')->table('users')->update($changedata);
       
    } 


        public static function InsertData($username, $password, $email, $isadmin, $hasmasters)
    {
        $AddData = array();
        $AddData['id'] =  uniqid();
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

        DB::connection('mysql2')->table('users')->insert($AddData);
        DB::connection('mysql')->table('users')->insert($AddData);
        return  $AddData['id'];
    }

    public static function getUsers()
    {
        $query = "SELECT u.id, u.hasmasters, u.isadmin, u.username, u.email, u.password, u.updated_at, t.id AS teacherid
                    FROM users AS u join teachers as t
                    WHERE u.id = t.user_id; ";
        $result = DB::select($query);
        return $result;
    }


    public static function findData($query_str)
    {
        $query = "SELECT u.id, u.hasmasters, u.isadmin, u.username, u.email, u.password, u.updated_at, t.id AS teacherid
                    FROM users AS u join teachers as t
                    WHERE u.id = t.user_id AND MATCH(u.email,u.username) AGAINST('${query_str}');";
        $result = DB::select($query);
        return $result;
    }

}
