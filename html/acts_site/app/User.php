<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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


        public static function UpdateData($id, $username, $password, $email,  $isadmin = null, $hasmasters = null)
    {
        $changedata = array();
        if ($username != null)
            $changedata['username'] = $username;

        if ($password != null)

            $changedata['password'] = Hash::make($password);

        if ($email != null)
            $changedata['email'] = $email; 

        if ($isadmin != null)
            $AddData['isadmin'] = $isadmin;

        if ($hasmasters != null)
            $AddData['hasmasters'] = $hasmasters;

        User::where('id',$id)->update($changedata);
        return True;
    } 


        public static function InsertData($username, $password, $email, $isadmin, $hasmasters)
    {
            $AddData = array();
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

            DB::table('users')->insert($AddData);
    }

}
