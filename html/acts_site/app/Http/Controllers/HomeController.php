<?php

namespace App\Http\Controllers;

Use App\Articles as Articles;
use App\Teachers as Teachers;
use App\User as User;
use App\MasterFiles as MasterFiles;

use App;
use Session;
use Config;

use App\MasterWorks as MasterWorks;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
	public function changelocation ($locale)
	{
  		if (in_array($locale, Config::get('app.locales'))) 
  		{   													# Проверяем, что у пользователя выбран доступный язык 
    		Session::put('locale', $locale);                    # И устанавливаем его в сессии под именем locale
   		}
  		return redirect()->back();
	}	


    public function index () 
    {
		$args = array();
		$args['Articles'] = Articles::getpageArticles('home'); 
		$args['NewsMain'] = Articles::getSomeNews(3); 
		$args['page'] = "home";
    	return view('pages.home',$args);
	}

	public function department_page () 
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('about_page'); 
		$args['page'] = "about";
    	return view('pages.page',$args);
	}

	public function history_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('history_page'); 
		$args['page'] = "about";
    	return view('pages.page',$args);
	}

	public function studLife_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('studLife'); 
		$args['page'] = "about";
    	return view('pages.page',$args);
	}

	public function diplom_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('diplomWorks'); 
		$args['page'] = "about";
    	return view('pages.page',$args);
	}

	public function employment_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('employment'); 
		$args['page'] = "about";
   		return view('pages.page',$args);
	}

	public function practice_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('practice'); 
		$args['page'] = "about";
    	return view('pages.page',$args);
	}


	public function incoming_1kurs_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('incoming_1kurs'); 
		$args['page'] = "incoming";
    	return view('pages.page',$args);
	}

	public function incoming_5kurs_page ()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('incoming_5kurs'); 
		$args['page'] = "incoming";
    	return view('pages.page',$args);
	}
	
	public function incoming_offDoc_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('incoming_offDoc'); 
	 	$args['page'] = "incoming";
	    return view('pages.page',$args);
	}

	public function incoming_learnToActs_page() 
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('incoming_learnToActs'); 
		$args['page'] = "incoming";
    	return view('pages.page',$args);
	}

	public function incoming_actualInfo_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('incoming_actualInfo'); 
		$args['page'] = "incoming";
    	return view('pages.page',$args);
	}

	public function incoming_contacts_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('incoming_contacts'); 
		$args['page'] = "incoming";
	    return view('pages.page',$args);
	}

	public function forStudents_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('forStudents'); 
		$args['page'] = "students";
    	return view('pages.page',$args);
	}

	public function aspirantura_page() 
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('aspirantura'); 
		$args['page'] = "aspirantura";
    	return view('pages.page',$args);
	}

	public function development_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('development'); 
		$args['page'] = "development";
    	return view('pages.page',$args);
	}

	public function science_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('science'); 
		$args['page'] = "science";
    	return view('pages.page',$args);
	}

	public function sport_page()
	{
		$args = array();
		$args['Articles'] = Articles::getpageArticles('sport'); 
		$args['page'] = "sport";
	    return view('pages.page',$args);
	}

	public function news_archive_page()
	{
		$args = array();
		$args['NewsMain'] = Articles::getNews(); 
		$args['page'] = 'news_archive';
   		return view('pages.page',$args);
	}

	public function teachstaff_page()
	{
		$args = array();
		$args['page'] = 'teachstaff';
		$args['namepage'] =__('teachstaff.teachstaff_page');
		$args['persons'] = Teachers:: getTeachersForPage(1);
   		return view('pages.teachstaff',$args);
	}

	public function teachstaffmore_page($id = null)
	{
		$args = array();
		$args['page'] = 'about';
		$args['teacher'] = Teachers::getTeacherData($id);
		$teacher = Teachers::where('id', $id)->get()->first();
    		if ($teacher != null)
    		{
    			$user_id = $teacher->user_id;
    			$args['user'] = User::where('id',$user_id)->get()->first();
    		}
    	return view('pages.teachstaffmore',$args);
	}

	public function otherpersonal_page()
	{
		$args = array();
		$args['page'] = 'otherpersonal';
		$args['namepage'] = __('teachstaff.otherpersonal_page');
		$args['persons'] = Teachers:: getTeachersForPage(0);
    	return view('pages.teachstaff',$args);
	}

	public function masterdocs_page($id = null)
	{
		$args = array();
		$args['page'] = 'about';
		$args['docs'] = MasterWorks::where('user_id', $id)->get();
    	return view('pages.masterdocs',$args);
	}

	public function masterdocs_more_page($id = null)
	{
		$args = array();
		$args['page'] = 'about';
		$args['doc'] = MasterWorks::where('id', $id)->get()[0];
		$args['files'] = MasterFiles::getFiles($id);
    	return view('pages.masterdocs',$args);
	}

	public function read_page($article_number = null)
	{
		$args = array();
		if ($article_number != null)
			$args['Articles'] = Articles::where('id', $article_number)->get(); 
		$args['page'] = "more";
    	return view('pages.page',$args);
	}

	public function search_article_page(Request $request)
	{
		$args = array();
		$args['Articles'] = Articles::searchArticle($request['search_data']); 
		$args['page'] = "search";
    	return view('pages.page',$args);

	}
}	
