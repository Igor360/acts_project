<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth as Auth; 
use Illuminate\Http\Request;


use Validator;

use App\Teachers as Teachers;
use App\Positions as Positions;
use App\User as User;
use App\Links as Links;
use App\Works as Works;
use App\Files;
use App\MasterFiles;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use App\MasterWorks as MasterWorks;

use App\Http\Controllers\Input;


require_once ('AddImageToDB.php');
require_once ('Validators.php');

class UsersController extends Controller
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
        $args = array();
        $args['teacher'] = Teachers::getTeacher(Auth::user()->getId());
        $args['user'] = User::where('user_id', Auth::user()->getId())->get()->first(); 
        if ($args['user']->isadmin)
            return redirect()->route('adminhome'); 
        $args['page'] = 'home';
        return view('user.main',$args);
    }

    public function publication()
    {
        $args =array();
        $args['teacher'] = Teachers::getTeacher(Auth::user()->getId());
        $args['user'] = User::where('user_id', Auth::user()->getId())->get()->first(); 
        $args['page'] = 'home';
        $args['typework'] = 1;
        $args['user_id'] = Auth::user()->getId();
        return view('user.home',$args);
    }

    public function conference()
    {
        $args =array();
        $args['teacher'] = Teachers::getTeacher(Auth::user()->getId());
        $args['user'] = User::where('user_id',  Auth::user()->getId())->get()->first(); 
        $args['page'] = 'home';
        $args['typework'] = 2;
        $args['user_id'] =  Auth::user()->getId();
        return view('user.home',$args);
    }

    public function changeUserData($message = null, $errors = null)
    {
        $args =array();
        if ($message != null)
            $args['message'] = (object)[ 
               'text' => $message, 
               'has_errors' => $errors,
               ];
        $args['page'] = 'user';
        $args['user'] = User::where('user_id',  Auth::user()->getId())->get()->first();  
        return view('user.changeuserdata',$args);
    }

    public function updateUserData(Request $request)
    {
        $id =  Auth::user()->getId();
        $password = $request['password'];
        $username = $request['username'];
        $email = $request['email'];     

        $Rules = array();
        if ($password != null) 
            $Rules['password'] = 'required|string|min:6|confirmed';    
        if ($username != null) 
            $Rules['username'] = 'required|string|max:255|unique:users'; 
        if ($email != null)
            $Rules['email'] = 'required|string|email|max:255|unique:users';
        if (count($Rules) > 0)
         {   
           $Validator = Validator::make($request->all(), $Rules);
           if ($Validator->fails())
            return redirect()->back()-> Errors($Validator->errors());
         }
        if (User::UpdateData($id,$username,$password,$email)) // перевірка чи були примінені зміни до даних
           $message = [
            'text' => __('messages.successfully_changed'), 
            'has_errors' => 0,
            ];
         else
            $message = [
             'text' => __('messages.error_change'),
             'has_errors' => 1,
        ];          
        return redirect()->route('updateuserdata',$message);
    }

    public function changeTeacherData($message = null, $error = null)
    {
        $args =array();
        $args['page'] = 'teacher';
        if ($message != null)
            $args['message'] = (object)[ 
               'text' => $message, 
               'has_errors' => $error,
               ];
        if (Auth::check())
        {
            $args['user'] = User::where('user_id', Auth::user()->getId())->get()->first(); 
            $args['teacher'] = Teachers::where('user_id',  Auth::user()->getId())->get()->first();
        }
        $args['positions'] = Positions::getAll();
        return view('user.changeteacherdata',$args);
    }
    public function updateTeacherData(Request $request)
    {
        $id = Teachers::getTeacher( Auth::user()->getId())->teacher_id;
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

        $photo_file = $request['photofile'];
        
        if (AddImage($photo_file, Auth::user()->getId()))
        {
            $photo_file = Files::where('user_id', Auth::user()->getId())
                    ->where('mime','image/jpeg')
                    ->orWhere('mime','image/png')->get()->first();
            $photo = route('getimage', $photo_file->filename);
            
        }
        if (Teachers::UpdateData($id, $firstname, $middlename, $lastname, $department, $profession, $photo, $timedate, $room, $phone, $mobile, $profinterests, $disciplines, $position))
            $message = [
            'text' => __('messages.successfully_changed'), 
            'has_errors' => 0,
            ];
        else
            $message = [
             'text' => __('messages.error_change'),
             'has_errors' => 1,
        ];          
        return redirect()->action('UsersController@changeTeacherData', $message);
    }


    public function changeLinks($message = null, $errors = null)
    {
        $args =array();
        $args['page'] = 'links';
        if ($message != null)
            $args['message'] = (object)[ 
               'text' => $message, 
               'has_errors' => $errors,
               ];
        if (Auth::check())
        {
            $args['user'] = User::where('user_id', Auth::user()->getId())->get()->first(); 
            $args['links'] = Links::where('user_id', Auth::user()->getId())->get()->first();
        }
        return view('user.changelinks',$args);
    }

    public function updateLinks(Request $request)
    {
        $id = Auth::user()->getId();
        $Validator = UserLinksValidator([
            'anothersite',
            'intellect' ,
            'timetable' 
            ], $request);
         if ($Validator->fails())
            return redirect()->back()->withErrors($Validator->errors());
        $AnotherSite = $request['anothersite'];
        $Intellect = $request['intellect'];
        $TimeTable = $request['timetable'];
         if (Links::UpdateData($id, $AnotherSite, $Intellect, $TimeTable)) // перевірка чи були примінені зміни до даних
           $message = [
            'text' => __('messages.successfully_changed'), 
            'has_errors' => 0,
            ];
         else
            $message = [
             'text' => __('messages.error_change'),
             'has_errors' => 1,
        ];        
        return redirect()->action('UsersController@changeLinks',$message);
    }

    public function changePublications(Request $request)
    {
        $args =array();
        $args['page'] = 'publications';
        if (Auth::check())
            $args['user'] = User::where('user_id', Auth::user()->getId())->get()[0]; 
        $args['publications'] = Works::where('user_id', Auth::user()->getId())->where('typework_id', 1)->paginate(5); // отримання публыкаций из бд по 5 елементов для каждой страници 
        if (isset($request['search_title']))
            { 
               $args['publications'] = Works::search_work($request['search_title'], 1, Auth::user()->getId());
               $args['search_query'] = ['search_title', $request['search_title']];   
            }
        return view('user.changepublications',$args);
    }

    public function addPublications(Request $request)
    {
        $type = $request['type'];
        $date = $request['datepublication'];
        $link = $request['link'];
        $title = $request['name'];
        $id = Auth::user()->getId();
        Works::InsertData($type,$date,$title,$link,$id, 1);
        return redirect()->route('changepublications_user');
    }

    public function deletePublication(Request $request)
    {
        $id_publication = $request['numpublication'];
        Works::where('work_id',$id_publication)->delete();
        return back()->withInput();
    }


    public function changePublication(Request $request, $id = null, $message  = null,  $errors = null)
    {
        $args =array();
        $args['id_publication'] = $id;
        $args['page'] = 'publications';
        $args['work'] = Works::where('work_id', $id)->where('typework_id', 1)->get()->first();
         if ($message != null)
            $args['message'] = (object)[ 
               'text' => $message, 
               'has_errors' => $errors,
               ];
        return view('user.changework',$args);
    }

    public function updatePublication(Request $request)
    {
        $type = $request['type'];
        $date = $request['datepublication'];
        $link = $request['link'];
        $id = $request['page'];
        $title = $request['name'];
        if (Works::UpdateData($id,$type,$date,$title,$link))
            $message = [
             'id' => $id,
             'message' => __('messages.successfully_changed'), 
             'errors' => 0,
            ];
         else
            $message = [
             'id' => $id,
             'message' => __('messages.error_change'),
             'errors' => 1,
        ];        
        return redirect()->action('UsersController@changePublication', $message);
    }

    public function changeConference(Request $request)
    {
        $args =array();
        $args['page'] = 'conference';
         if (Auth::check())
            $args['user'] = User::where('user_id', Auth::user()->getId())->get()[0]; 
        if (isset($request['search_title']))
            { 
               $args['conferences'] = Works::search_work($request['search_title'], 2, Auth::user()->getId());
               $args['search_query'] = ['search_title', $request['search_title']];   
               return view('user.changeconference',$args);
            }
        $args['conferences'] = Works::where('user_id', Auth::user()->getId())->where('typework_id', 2)->paginate(5); // отримання 5 елеметлов из бд для отной сторінки
        return view('user.changeconference',$args);
    }

    public function addConference(Request $request)
    {
     
        $type = $request['type'];
        $date = $request['datepublication'];
        $link = $request['link'];
        $title = $request['name'];
        $id = Auth::user()->getId();
        Works::InsertData($type,$date,$title,$link,$id, 2);
        return redirect()->route('changeconference_user');
    }


    public function deleteConference(Request $request)
    {
        $id_publication = $request['numconference'];
        Works::where('work_id',$id_publication)->delete();
        return back()->withInput();
    }


    public function changeoneConference(Request $request,$id = null, $message = null, $errors = null)
    {
        $args =array();
        $args['id_publication'] = $id;
        $args['page'] = 'conference';
        $args['work'] = Works::where('work_id', $id)->where('typework_id', 2)->get()->first();
        if ($message != null)
            $args['message'] = (object)[ 
               'text' => $message, 
               'has_errors' => $errors,
               ];
        return view('user.changework',$args);
    }

    public function updateConference(Request $request)
    {
        $type = $request['type'];
        $date = $request['datepublication'];
        $link = $request['link'];
        $id = $request['page'];
        $title = $request['name'];
        if (Works::UpdateData($id,$type,$date,$title,$link))
            $message = [
             'id' => $id,
             'message' => __('messages.successfully_changed'), 
             'errors' => 0,
            ];
         else
            $message = [
             'id' => $id,
             'message' => __('messages.error_change'),
             'errors' => 1,
        ];        
        return redirect()->action('UsersController@changeoneConference', $message);  
    }

    public function changeMasterDocs(Request $request)
    {
        $args =array();
        $args['page'] = 'master';
        if (Auth::check())
        {
            $args['works'] = MasterWorks::where('user_id', Auth::user()->getId())->paginate(5);// отримання 5 статей
            $args['user'] = User::where('user_id', Auth::user()->getId())->get()->first(); 
        }
        if (isset($request['search_title']))
        {
            $args['works'] = MasterWorks::search_data($request['search_title']);
            $args['search_query'] = [ 'search_title' => $request['search_title'] ];
        }
        return view('user.changemasterdocs',$args);
    }

     public function addMasterDocs(Request $request)
    {
        $name = $request['name'];
        $date = $request['datepublication'];
        $description = $request['description'];
        $maintext = $request['maintext'];
        $id = Auth::user()->getId();
        MasterWorks::InsertData($name, $description,$maintext, $date, $id);
        $work_id = MasterWorks::where('name',$name)->where('description',$description)->get()->first()->masterwork_id; 
        $files = $request['filefield'];
        if ($files != null)
            UsersController::UploadFiles($files,$work_id);
        return redirect()->route('masterdocs');
    }


    public function deleteMasterDocs(Request $request)
    {
        $id = $request['num'];
        MasterWorks::where('masterwork_id',$id)->delete();
        return back()->withInput();
    }

     public function changeoneMasterDoc(Request $request,$id = null, $message = null, $errors = null)
    {
        $args =array();
        $args['id'] = $id;
        $args['page'] = 'master';
        $args['files'] = MasterFiles::getFiles($id);
         if (Auth::check())
        {
            $args['work'] = MasterWorks::where('masterwork_id', $id)->get()->first();
            $args['user'] = User::where('user_id', Auth::user()->getId())->get()->first(); 
        }
        if ($message != null)
            $args['message'] = (object)[ 
               'text' => $message, 
               'has_errors' => $errors,
               ];
        return view('user.changedocmaster',$args);
    }
    
    public function updateMasterDoc(Request $request)
    {
        $id = $request['id_mw'];
        $name = $request['name'];
        $date = $request['datepublication'];
        $description = $request['description'];
        $maintext = $request['maintext'];
         if (MasterWorks::UpdateData($id, $name, $description,$maintext, $date))
            $message = [
             'id' => $id,
             'message' => __('messages.successfully_changed'), 
             'errors' => 0,
            ];
         else
            $message = [
             'id' => $id,
             'message' => __('messages.error_change'),
             'errors' => 1,
        ];   
        return redirect()->action('UsersController@changeoneMasterDoc', $message);
    }


    public function deleteMasterFile(Request $request)
    {
        $id_file = $request['num'];
        $id = $request['id_mw']; 
        Files::where('file_id',$id_file)->delete();
        $args['files'] = MasterFiles::getFiles($id);
        return redirect()->route('changemasterdata',$id);
    }

    public function addMasterFile(Request $request)
    {
        $id = $request['id_mw']; 
        $files = $request['filefield'];
        UsersController::UploadFiles($files,$id);
        return redirect()->route('changemasterdata',$id);
    }

    public static  function UploadFiles($files,$work_id)
    {
    if ($files != null)
     foreach ($files as $file) {
          
        $extension = $file->getClientOriginalExtension();
        Storage::disk('documents')->put($file->getFilename().'.'.$extension,  File::get($file));
        $entry = new Files();
        $entry->mime = $file->getClientMimeType();
        $entry->originalname = $file->getClientOriginalName();
        $entry->filename = $file->getFilename().'.'.$extension;
        $id = Auth::user()->getId();
        $entry->user_id = $id;
        $entry->size = filesize($file);
        $entry->save();
        MasterFiles::InsertData($work_id, $entry->file_id);
     }

    }

}


