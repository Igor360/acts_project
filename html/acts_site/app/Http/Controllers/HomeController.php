<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth as Auth; 
use Illuminate\Http\Request;

use App\Teachers as Teachers;
use App\Positions as Positions;
use App\User as User;
use App\Links as Links;
use App\Works as Works;

use App\MasterWorks as MasterWorks;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $args =array();
        $args['teacher'] = Teachers::getTeacher(Auth::id());
        $args['user'] = User::where('id', Auth::id())->get()[0]; 
        if ($args['user']->isadmin)
            return redirect()->route('adminhome'); 
        $args['page'] = 'home';
        return view('home',$args);
    }

    public function publication()
    {
        $args =array();
        $args['teacher'] = Teachers::getTeacher(Auth::id());
        $args['user'] = User::where('id', Auth::id())->get()[0]; 
        $args['page'] = 'home';
        $args['typework'] = 1;
        $args['user_id'] = Auth::id();
        return view('home',$args);
    }

    public function conference()
    {
        $args =array();
        $args['teacher'] = Teachers::getTeacher(Auth::id());
        $args['user'] = User::where('id', Auth::id())->get()[0]; 
        $args['page'] = 'home';
        $args['typework'] = 2;
        $args['user_id'] = Auth::id();
        return view('home',$args);
    }

    public function changeUserData()
    {
        $args =array();
        $args['page'] = 'user';
        $args['user'] = User::where('id', Auth::id())->get()[0];  
        return view('auth.changeuserdata',$args);
    }

    public function updateUserData(Request $request)
    {
        $args =array();
        $args['page'] = 'user';
        $id = Auth::id();
        $password = $request['password'];
        $password2 = $request['password2'];
        $username = $request['username'];
        $email = $request['email'];
        if ($password2 != $password)
        {
            $args['password_error'] = "Паролі не співпадають";
            return view('auth.changeuserdata',$args);
        }        
        User::UpdateData($id,$username,$password,$email);
        if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0];
        $args['message'] = "Дані змінено";
        return view('auth.changeuserdata',$args);
    }

    public function changeTeacherData()
    {
        $args =array();
        $args['page'] = 'teacher';
        if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        $args['positions'] = Positions::getAll();
        return view('auth.changeteacherdata',$args);
    }
    public function updateTeacherData(Request $request)
    {
        $id = Teachers::getTeacher(Auth::id())->id;
        $firstname = $request['firstname'];
        $middlename = $request['middlename'];
        $lastname = $request['lastname'];
        $photo = $request['photo'];
        $position = $request['position'];
        $profession = $request['profession'];
        $timedate = $request['datetime'];
        $room = $request['room'];
        $phone = $request['phone'];
        $mobile = $request['mobile'];
        $profinterests = $request['profint'];
        $disciplines = $request['disciplines'];
        $department = $request['department'];
               echo $id;
        Teachers::UpdateData($id, $firstname, $middlename, $lastname, $department, $profession, $photo, $timedate, $room, $phone, $mobile, $profinterests, $disciplines, $position);

        $args =array();
        if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        $args['page'] = 'teacher';
        $args['positions'] = Positions::getAll();
        $args['message'] = "Дані змінено";
        return view('auth.changeteacherdata',$args);
    }


    public function changeLinks()
    {
        $args =array();
        $args['page'] = 'links';
        if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        return view('auth.changelinks',$args);
    }

    public function updateLinks(Request $request)
    {
        $args =array();
        $id = Auth::id();
        $AnotherSite = $request['anothersite'];
        $Intellect = $request['intellect'];
        $TimeTable = $request['timetable'];
        if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        Links::UpdateData($id, $AnotherSite, $Intellect, $TimeTable);
        $args['message'] = 'Дані змінено';
        $args['page'] = 'links';
        return view('auth.changelinks',$args);
    }

    public function changePublications()
    {
        $args =array();
        $args['page'] = 'publications';
        if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        $args['publications'] = Works::where('user_id', Auth::id())->where('typework_id', 1)->get();
        return view('auth.changepublications',$args);
    }


    public function addPublications(Request $request)
    {
        $args =array();
        $type = $request['type'];
        $date = $request['datepublication'];
        $link = $request['link'];
        $title = $request['name'];
        if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        $id = Auth::id();
        Works::InsertData($type,$date,$title,$link,$id, 1);
        $args['page'] = 'publications';
        $args['publications'] = Works::where('user_id', $id)->where('typework_id', 1)->get();
        return view('auth.changepublications',$args);
    }


    public function deletePublication(Request $request)
    {
        $args =array();
        $id_publication = $request['numpublication'];
        Works::where('id',$id_publication)->delete();
        if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        $args['page'] = 'publications';
        $args['publications'] = Works::where('user_id', Auth::id())->where('typework_id', 1)->get();
        return view('auth.changepublications',$args);
    }


    public function changePublication(Request $request,$id = null)
    {
        $args =array();
        $args['id_publication'] = $id;
        $id = Auth::id();
        $args['page'] = 'publications';
        if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        $args['publications'] = Works::where('user_id', $id)->where('typework_id', 1)->get();
        return view('auth.changework',$args);
    }

public function updatePublication(Request $request)
    {
        $args =array();
        $args['page'] = 'publications';
        $type = $request['type'];
        $date = $request['datepublication'];
        $link = $request['link'];
        $id = $request['page'];
        $title = $request['name'];
         if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        Works::UpdateData($id,$type,$date,$title,$link);
        $args['publications'] = Works::where('user_id', Auth::id())->where('typework_id', 1)->get();
        return view('auth.changepublications',$args);
    }





    public function changeConference()
    {
        $args =array();
        $args['page'] = 'conference';
         if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
         $args['conferences'] = Works::where('user_id', Auth::id())->where('typework_id', 2)->get();
        return view('auth.changeconference',$args);
    }

    public function addConference(Request $request)
    {
        $args =array();
        $type = $request['type'];
        $date = $request['datepublication'];
        $link = $request['link'];
        $title = $request['name'];
        $id = Auth::id();
         if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        Works::InsertData($type,$date,$title,$link,$id, 2);
        $args['page'] = 'conference';
        $args['conferences'] = Works::where('user_id', $id)->where('typework_id', 2)->get();
        return view('auth.changeconference',$args);
    }


    public function deleteConference(Request $request)
    {
        $args =array();
        $id_publication = $request['numconference'];
        Works::where('id',$id_publication)->delete();
        $args['page'] = 'conference';
         if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        $args['conferences'] = Works::where('user_id', Auth::id())->where('typework_id', 2)->get();
        return view('auth.changeconference',$args);
    }


    public function changeoneConference(Request $request,$id = null)
    {
        $args =array();
        $args['id_publication'] = $id;
        $id = Auth::id();
        $args['page'] = 'conference';
         if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        $args['conferences'] = Works::where('user_id', $id)->where('typework_id', 2)->get();
        return view('auth.changework',$args);
    }

public function updateConference(Request $request)
    {
        $args =array();
        $args['page'] = 'conference';
        $type = $request['type'];
        $date = $request['datepublication'];
        $link = $request['link'];
        $id = $request['page'];
        $title = $request['name'];
         if (Auth::check())
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        Works::UpdateData($id,$type,$date,$title,$link);
        $args['conferences'] = Works::where('user_id', Auth::id())->where('typework_id', 2)->get();
        return view('auth.changeconference',$args);
    }









    public function changeMasterDocs(Request $request)
    {
        $args =array();
        $args['page'] = 'master';
        if (Auth::check())
        {
            $args['works'] = MasterWorks::where('user_id', Auth::id())->get();
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        }
        return view('auth.changemasterdocs',$args);
    }

     public function addMasterDocs(Request $request)
    {
        $args =array();
        $args['page'] = 'master';
        $name = $request['name'];
        $date = $request['datepublication'];
        $description = $request['description'];
        $maintext = $request['maintext'];
        $id = Auth::id();
        MasterWorks::InsertData($name, $description,$maintext, $date, $id);
        if (Auth::check())
        {
            $args['works'] = MasterWorks::where('user_id', Auth::id())->get();
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        }
        return view('auth.changemasterdocs',$args);
    }


    public function deleteMasterDocs(Request $request)
    {
        $args =array();
        $id = $request['num'];
        MasterWorks::where('id',$id)->delete();
        $args['page'] = 'master';
         if (Auth::check())
        {
            $args['works'] = MasterWorks::where('user_id', Auth::id())->get();
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        }
        return view('auth.changemasterdocs',$args);
    }

     public function changeoneMasterDoc(Request $request,$id = null)
    {
        $args =array();
        $args['id'] = $id;
        $id = Auth::id();
        $args['page'] = 'master';
         if (Auth::check())
        {
            $args['works'] = MasterWorks::where('user_id', Auth::id())->get();
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        }
        return view('auth.changedocmaster',$args);
    }
    
    public function updateMasterDoc(Request $request)
    {
        $args =array();
        $args['page'] = 'master';
        $id = $request['page'];
        $name = $request['name'];
        $date = $request['datepublication'];
        $description = $request['description'];
        $maintext = $request['maintext'];
        MasterWorks::UpdateData($id, $name, $description,$maintext, $date);
        if (Auth::check())
        {
            $args['works'] = MasterWorks::where('user_id', Auth::id())->get();
            $args['user'] = User::where('id', Auth::id())->get()[0]; 
        }
        return redirect()->route('masterdocs');
    }


}
