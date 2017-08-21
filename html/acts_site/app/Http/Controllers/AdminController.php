<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use App\Http\Requests\UserDataRequest;

use Auth;
use App\Teachers as Teachers;
use App\User as User;
use App\Positions as Positions;
use App\Articles as Articles;
use App\Links as Links;
use App\Files;
use App\ArticleFiles;


use App\TextElement as TextElement;
use App\Text as Text;
use App\TextStyles as TextStyles;
use App\TextType as TextType;
use App\Pages as Pages;


require_once ('AddImageToDB.php');
require_once ('Validators.php');

class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $guard = 'admin';
    //
	public function index(Request $request)
	{
		$args =array();
        $args['page'] = 'home';
        if (Auth::check())
        {
            $args['user'] = User::where('user_id',  Auth::user()->getId())->get()->first(); 
            $args['users'] = User::getUsers();
            if(isset($request['search_title']))
            {
              $args['users'] = User::findData($request['search_title']);         
              $args['search_query'] = ['search_title' => $request['search_title']];
            }
        }
        return view('admin.adminhome',$args);
	}

	//
	public function Adduser($message = null, $errors = null)
	{
		$args =array();
		$args['positions'] = Positions::getAll();
        $args['page'] = 'Add';
        if ($message != null)
            $args['message'] = (object)[ 
               'text' => $message, 
               'has_errors' => $errors,
               ];
        return view('admin.adduser',$args);
	}

	public function insertUser(UserDataRequest $request)
	{

		$is_data_add = false;
		$password = $request['password'];
        $password2 = $request['password2'];
        $username = $request['username'];
        $email = $request['email'];
        $isadmin = $request['isadmin'];
        $hasmasters = $request['hasmaster'];     

		$user_id = User::InsertData($username, $password, $email, $isadmin, $hasmasters);
        if($user_id != null)
            $is_data_add = true;
		
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
        $isteacher = $request['isteacher'];
        $photo_file = $request['photofile'];
        
        if (AddImage($photo_file, $user_id))
        {
            $photo_file = Files::where('user_id' , $user_id)
                    ->where('mime','image/jpeg')
                    ->orWhere('mime','image/png')->get()->first();
            if ($photo_file != null)
                $photo = route('getimage', $photo_file->filename);
            
        }

        Teachers::InsertData($firstname, $middlename, $lastname, $department, $profession, $photo, $timedate, $room, $phone, $mobile, $profinterests, $disciplines, $position, $isteacher, $user_id);

        $AnotherSite = $request['anothersite'];
        $Intellect = $request['intellect'];
        $TimeTable = $request['timetable'];

        Links::InsertData($user_id, $AnotherSite, $Intellect, $TimeTable);

        if($is_data_add)
            $message = [
             'message' => __('messages.successfully_changed'), 
             'errors' => 0,
            ];
        else
            $message = [
             'message' => __('messages.error_change'),
             'errors' => 1,
         ];
		return redirect()->action('AdminController@Adduser', $message);
	}


	public function updateUser(Request $request, $id = null)
	{
        $is_data_add = false;
		$user_id = $request['id_user'];
		$args = array();
		$password = $request['password'];
        $username = $request['username'];
        $email = $request['email'];
        $isadmin = $request['isadmin'];
        $hasmasters = $request['hasmaster']; 
        UserDataValidator($request); // валидация даних користувача
	
    	$is_data_add = User::UpdateData($user_id, $username, $password, $email, $isadmin, $hasmasters);
	
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
        $isteacher = $request['isteacher'];
        TeacherDataValidator($request); // валидаци даних учителя
        $id_teacher = Teachers::where('user_id',$user_id)->get()->first()->teacher_id;
        $photo_file = $request['photofile'];
        if (AddImage($photo_file, $user_id))
        {
            $photo_file = Files::where('user_id' , $user_id)
                    ->where('mime','image/jpeg')
                    ->orWhere('mime','image/png')->get()->first();
            $photo = route('getimage', $photo_file->filename);            
        }
        if (!$is_data_add)
         $is_data_add = Teachers::UpdateData($id_teacher, $firstname, $middlename, $lastname, $department, $profession, $photo, $timedate, $room, $phone, $mobile, $profinterests, $disciplines, $position, $isteacher, $user_id);
        else
            Teachers::UpdateData($id_teacher, $firstname, $middlename, $lastname, $department, $profession, $photo, $timedate, $room, $phone, $mobile, $profinterests, $disciplines, $position, $isteacher, $user_id);

        $AnotherSite = $request['anothersite'];
        $Intellect = $request['intellect'];
        $TimeTable = $request['timetable'];
        LinksValidator([
            'anothersite',
            'intellect' ,
            'timetable' 
            ], $request); // валидация введених силок
        if (!$is_data_add)
         $is_data_add = Links::UpdateData($user_id, $AnotherSite, $Intellect, $TimeTable);
        else
         	Links::UpdateData($user_id, $AnotherSite, $Intellect, $TimeTable);	
        if($is_data_add)
            $message = [
             'id' => $user_id,
             'message' => __('messages.successfully_changed'), 
             'errors' => 0,
            ];
         else
            $message = [
             'id' => $user_id,
             'message' => __('messages.error_change'),
             'errors' => 1,
         ];
        return redirect()->action('AdminController@changeUser', $message);
	}



 	public function deleteUser(Request $request)
    {
        $args =array();
        $id = $request['user_id'];
        User::where('user_id',$id)->delete();
        return back()->withInput();
    }

    public function  changeUser($id = null, $message = null, $errors = null)
    {
    	$args = array();
    	$args['positions'] = Positions::getAll();
    	$args['page'] = 'home';
    	$args['userid'] = $id;
        $args['teacher'] = Teachers::where('user_id', $id)->get()->first();
        $args['user'] = User::where('user_id', $id)->get()->first();
        $args['links'] = Links::where('user_id', $id)->get()->first();
        if ($message != null)
            $args['message'] = (object)[ 
               'text' => $message, 
               'has_errors' => $errors,
               ];
        return view('admin.changedata',$args);
    }

	public function AllArticles(Request $request)
	{
		$args =array();
    
        $search_query = array();
        $search_data = array();
        if (isset($request['search_title']))
            if ($request['search_title'] != null)
            {
                $search_query['title'] = $request['search_title'];
                $search_data['search_title'] = $request['search_title'];
            }
        if (isset($request['page_search']))
            {
              $search_query['page'] = $request['page_search'];
              $search_data['page_search'] = $request['page_search'];    
            }
        if (isset($request['type']))
            {
              $search_query['texttype'] = $request['type'];
              $search_data['type'] = $request['type'];
            }

        if (count($search_query) > 0)
        {
            $args['articles'] = Articles::getArticles($search_query);
            $args['search_data'] = $search_data;
        }
            else
                $args['articles'] = Articles::getAll();
		
        $args['page'] = 'articles';
        $args['pages'] = Pages::get();
        $args['types_article'] = TextType::where('texttype_id', '>', 2 )->get();
        return view('admin.articles',$args); 
	}

    public function deleteArticles(Request $request)
    {
        Articles::where('article_id', $request['num'])->delete();
        return back()->withInput();
    }

	public function AddArticle($message = null, $errors = null)
	{
		$args =array();
        $args['pages'] = Pages::get();
        $args['typesarticle'] = TextType::where('texttype_id','>',2)->get();
        $args['page'] = 'addarticles';
        if ($message != null)
            $args['message'] = (object)[ 
               'text' => $message, 
               'has_errors' => $errors,
               ];
        return view('admin.addarticle',$args);
	}

    public function insertArticle(Request $request)
    {
        $is_data_add = false; // перевырка чи дані додані до бд
        $title = $request['title'];
        $description = $request['description'];
        $page_id = $request['page'];
        $img = $request['photo'];
        $text = $request['text'];
        $articletype_id = $request['typearticle'];
        if (count($text) > 0)
            $isText = 1;
        else 
            $isText = 0;        

        $photo_file = $request['photofile'];
        if ($photo_file != null)
        {
            $add_articledoc = AddArticleDocs($photo_file, Auth::user()->getId());
            if ($add_articledoc != null)
              $img = route('getdocarticle', $add_articledoc->filename);
        }
        $article = Articles::InsertData($title, $img, $isText, $page_id, $articletype_id);
        if ($article != null)
        {
         $article_id = $article->article_id;
         if (isset($add_articledoc))
            $is_data_add = ArticleFiles::InsertData($article_id,$add_articledoc->file_id);
         
         $files = $request['filesfield'];
         AdminController::UploadFiles($files,$article_id);
         
         if (count($text) > 0)
           $is_data_add = Text::InsertData($text, $article_id, 1);
         
         $is_data_add = Text::InsertData($description, $article_id, 2);
        }
         if($is_data_add)
            $message = [
             'message' => __('messages.successfully_changed'), 
             'errors' => 0,
            ];
         else
            $message = [
             'message' => __('messages.error_change'),
             'errors' => 1,
         ];
        return redirect()->action('AdminController@AddArticle', $message);
    }



    public function changeArticle($id, $message = null, $errors = null)
    {
        $args =array();
        $args['pages'] = Pages::get();
        $args['types'] = TextType::where('texttype_id','<',3)->get();
        $args['typesarticle'] = TextType::where('texttype_id','>',2)->get();
        $args['text'] = Text::where('article_id', $id)->where('texttype_id', 1 )->get();
        $args['description'] = Text::where('article_id', $id)->where('texttype_id', 2 )->get();
        $args['article'] = Articles::where('article_id',$id)->get()[0];
        $args['page'] = 'articles';
        $args['article_id'] = $id;
        $args['files'] = ArticleFiles::getFiles($id,Articles::where('article_id',$id)->get()[0]->img);
        if ($message != null)
            $args['message'] = (object)[ 
               'text' => $message, 
               'has_errors' => $errors,
               ];
        return view('admin.changearticle',$args);
    }

    public function updateArticle(Request $request)
    {        
        $is_data_add = false; // перевырка чи дані додані до бд
        $article_id = $request['article'];
        $title = $request['title'];
        $page_id = $request['page'];
        $img = $request['photo'];
        $text = $request['text'];
        $description = $request['description'];
        $isText = $request['isText'];

        $photo_file = $request['photofile'];
        if($photo_file != null)
        {
            $add_articledoc = AddArticleDocs($photo_file, Auth::user()->getId());
            if ($add_articledoc != null)
              $img = route('getdocarticle', $add_articledoc->filename);
            isArticlePhoto($article_id);
            ArticleFiles::InsertData($article_id,$add_articledoc->file_id);
        }
        $is_data_add = Articles::UpdateData($article_id , $title, $img, $isText, $page_id);
        $texts = Text::where('article_id', $article_id)->where('texttype_id',1)->get();
        if (count($texts) > 0)
        {
            $is_data_add = Text::UpdateData($texts[0]->id,$text);
        }
        else
            $is_data_add = Text::InsertData($text, $article_id, 1);
        $descriptions = Text::where('article_id', $article_id)->where('texttype_id',2)->get();
        if (count($descriptions) > 0)
        {
           $is_data_add = Text::UpdateData($descriptions[0]->id, $description);
        }
        else         
           $is_data_add = Text::InsertData($description, $article_id, 2);

        if($is_data_add)
            $message = [
             'id' => $article_id,
             'message' => __('messages.successfully_changed'), 
             'errors' => 0,
            ];
         else
            $message = [
             'id' => $article_id,
             'message' => __('messages.error_change'),
             'errors' => 1,
         ];
        return redirect()->action('AdminController@changeArticle', $message);
    }


    public function deleteArticleFile(Request $request)
    {
        $id_file = $request['num'];
        $id = $request['id_a']; 
        Files::where('file_id',$id_file)->delete();
        return redirect()->route('changearticledata',$id);
    }

    public function addArticleFiles(Request $request)
    {
        $id = $request['id_a']; 
        $files = $request['filesfield'];
        AdminController::UploadFiles($files,$id);
        return redirect()->route('changearticledata',$id);
    }


    public static  function UploadFiles($files,$article_id)
    {
    if ($files != null)
     foreach ($files as $file) 
     {
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
        ArticleFiles::InsertData($article_id, $entry->file_id);
     }

    }
}

