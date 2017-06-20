<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth;
use App\Teachers as Teachers;
use App\User as User;
use App\Positions as Positions;
use App\Articles as Articles;
use App\Links as Links;


use App\TextElement as TextElement;
use App\Text as Text;
use App\TextStyles as TextStyles;
use App\TextType as TextType;
use App\Pages as Pages;


class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $guard = 'admin';
    //
	public function index()
	{
		$args =array();
        if (Auth::check())
        {
            $args['users'] = User::get();
            $args['user'] = User::where('id', Auth::id())->get()[0]; 

        }
        else 
            $args['teachers'] = null;
        $args['page'] = 'home';
        return view('admin.adminhome',$args);
	}

	//
	public function Adduser()
	{
		$args =array();
		$args['positions'] = Positions::getAll();
        $args['page'] = 'Add';
        return view('admin.adduser',$args);
	}

	public function insertUser(Request $request)
	{
		$args = array();
		$password = $request['password'];
        $password2 = $request['password2'];
        $username = $request['username'];
        $email = $request['email'];
        $isadmin = $request['isadmin'];
        $hasmasters = $request['hasmaster']; 
        if ($password2 != $password)
        {
            $args['password_error'] = "Паролі не співпадають";
            return view('admin.adduser',$args);
        }        
		User::InsertData($username, $password, $email, $isadmin, $hasmasters);

		$user_id = User::where('email',$email)->get()[0]->id;

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

        Teachers::InsertData($firstname, $middlename, $lastname, $department, $profession, $photo, $timedate, $room, $phone, $mobile, $profinterests, $disciplines, $position, $isteacher, $user_id);

        $AnotherSite = $request['anothersite'];
        $Intellect = $request['intellect'];
        $TimeTable = $request['timetable'];

        Links::InsertData($user_id, $AnotherSite, $Intellect, $TimeTable);

        $args['page'] = "Add";
        $args['positions'] = Positions::getAll();
		$args['message'] = "Користувача додано";
		return view('admin.adduser',$args);
	}


	public function updateUser(Request $request, $id = null)
	{
		$user_id = $request['id_user'];
		$args = array();
		$password = $request['password'];
        $password2 = $request['password2'];
        $username = $request['username'];
        $email = $request['email'];
        $isadmin = $request['isadmin'];
        $hasmasters = $request['hasmaster']; 
        if ($password != null and $password2 != nnull)
        if ($password2 != $password)
        {
            $args['password_error'] = "Паролі не співпадають";
            return view('admin.changedata',$args);
        }        
		User::UpdateData($user_id, $username, $password, $email, $isadmin, $hasmasters);

	

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

        $id_teacher = Teachers::where('user_id',$user_id)->get()[0]->id;

        Teachers::UpdateData($id_teacher, $firstname, $middlename, $lastname, $department, $profession, $photo, $timedate, $room, $phone, $mobile, $profinterests, $disciplines, $position, $isteacher, $user_id);

        $AnotherSite = $request['anothersite'];
        $Intellect = $request['intellect'];
        $TimeTable = $request['timetable'];

        Links::UpdateData($user_id, $AnotherSite, $Intellect, $TimeTable);

        $args['page'] = "Add";
        $args['positions'] = Positions::getAll();
		$args['message'] = "Дані змінено!";
		return redirect()->route('adminhome');
	}



 	public function deleteUser(Request $request)
    {
        $args =array();
        $id = $request['user_id'];
        User::where('id',$id)->delete();
        if (Auth::check())
        {
            $args['users'] = User::get();
            $args['user'] = User::where('id', Auth::id())->get()[0]; 

        }
        $args['page'] = 'home';
        return view('admin.adminhome',$args);
    }

    public function  changeUser($id = null)
    {
    	$args = array();
    	$args['positions'] = Positions::getAll();
    	$args['page'] = 'home';
    	$args['userid'] = $id;
        return view('admin.changedata',$args);
    }

	public function AllArticles()
	{
		$args =array();
		$args['articles'] = Articles::getAll();
        $args['page'] = 'articles';
        return view('admin.articles',$args);
	}

    public function deleteArticles(Request $request)
    {
        Articles::where('id', $request['num'])->delete();
        $args =array();
        $args['articles'] = Articles::getAll();
        $args['page'] = 'articles';
        return view('admin.articles',$args);
    }

	public function AddArticle()
	{
		$args =array();
        $args['pages'] = Pages::get();
        $args['typesarticle'] = TextType::where('id','>',2)->get();
        $args['textelements'] = TextElement::get();
        $args['page'] = 'addarticles';
        return view('admin.addarticle',$args);
	}

    public function insertArticle(Request $request)
    {
        $args = array();
        $args['pages'] = Pages::get();
        $args['typesarticle'] = TextType::where('id','>',2)->get();
        $args['textelements'] = TextElement::get();
        $args['message'] = "Дані додано";
        $args['page'] = 'addarticles';

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
        Articles::InsertData($title, $img, $isText, $page_id, $articletype_id);
        $article_id = Articles::where('title',$title)->get()[0]->id;
        if (count($text) > 0)
            Text::InsertData($text, $article_id, 1);
        Text::InsertData($description, $article_id, 2);
        return view('admin.addarticle',$args);
    }



    public function changeArticle($id)
    {
        $args =array();
        $args['pages'] = Pages::get();
        $args['types'] = TextType::where('id','<',3)->get();
        $args['typesarticle'] = TextType::where('id','>',2)->get();
        $args['textelements'] = TextElement::get();
        $args['text'] = Text::where('article_id', $id)->where('type_id', 1 )->get();
        $args['description'] = Text::where('article_id', $id)->where('type_id', 2 )->get();
        $args['article'] = Articles::where('id',$id)->get()[0];
        $args['page'] = 'articles';
        $args['article_id'] = $id;
        return view('admin.changearticle',$args);
    }

    public function updateArticle(Request $request)
    {
        $args =array();
        $args['articles'] = Articles::getAll();
        $args['page'] = 'articles';

        
        $article_id = $request['article'];
        $title = $request['title'];
        $page_id = $request['page'];
        $img = $request['photo'];
        $text = $request['text'];
        $description = $request['description'];
        if (count($text) > 0)
            $isText = 1;
        else 
            $isText = 0;
        Articles::UpdateData($article_id , $title, $img, $isText, $page_id);
        $texts = Text::where('article_id', $article_id)->where('type_id',1)->get();
        if (count($texts) > 0)
        {
            if (count($text) > 0)
             Text::UpdateData($texts[0]->id,$text);
        }
        else
          if (count($text) > 0)
            Text::InsertData($text, $article_id, 1);
        $descriptions = Text::where('article_id', $article_id)->where('type_id',2)->get();
        if (count($descriptions) > 0)
        {
            Text::UpdateData($descriptions[0]->id, $description);
        }
        else         
            Text::InsertData($description, $article_id, 2);
        return redirect()->route('adminarticles');
    }
}

