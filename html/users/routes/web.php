<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Use App\Articles as Articles;



Route::get('/', function () {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('home'); 
	$args['NewsMain'] = Articles::getSomeNews(3); 
	$args['page'] = "home";
    return view('pages.home',$args);
});


Route::get('/about/department',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('about_page'); 
	$args['page'] = "about";
    return view('pages.page',$args);
});

Route::get('/about/history',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('history_page'); 
	$args['page'] = "about";
    return view('pages.page',$args);
});




Route::get('/about/studlife',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('studLife'); 
	$args['page'] = "about";
    return view('pages.page',$args);
});


Route::get('/about/diplom',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('diplomWorks'); 
	$args['page'] = "about";
    return view('pages.page',$args);
});


Route::get('/about/work',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('employment'); 
	$args['page'] = "about";
    return view('pages.page',$args);
});


Route::get('/about/practice',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('practice'); 
	$args['page'] = "about";
    return view('pages.page',$args);
});

Route::get('/incoming/1kurs',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('incoming_1kurs'); 
	$args['page'] = "incoming";
    return view('pages.page',$args);
});

Route::get('/incoming/5kurs',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('incoming_5kurs'); 
	$args['page'] = "incoming";
    return view('pages.page',$args);
});

Route::get('/incoming/offDoc',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('incoming_offDoc'); 
	$args['page'] = "incoming";
    return view('pages.page',$args);
});

Route::get('/incoming/studyACTS',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('incoming_learnToActs'); 
	$args['page'] = "incoming";
    return view('pages.page',$args);
});

Route::get('/incoming/actual_info',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('incoming_actualInfo'); 
	$args['page'] = "incoming";
    return view('pages.page',$args);
});

Route::get('/incoming/contacts',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('incoming_contacts'); 
	$args['page'] = "incoming";
    return view('pages.page',$args);
});



Route::get('/forstudents',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('forStudents'); 
	$args['page'] = "students";
    return view('pages.page',$args);
});

Route::get('/aspirantura',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('aspirantura'); 
	$args['page'] = "aspirantura";
    return view('pages.page',$args);
});

Route::get('/development',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('development'); 
	$args['page'] = "development";
    return view('pages.page',$args);
});

Route::get('/science',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('science'); 
	$args['page'] = "science";
    return view('pages.page',$args);
});


Route::get('/sport',function() {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('sport'); 
	$args['page'] = "sport";
    return view('pages.page',$args);
});



Route::get('/read/{article_number?}', function ($article_number = null){
	$args = array();
	if ($article_number != null)
		$args['Articles'] = Articles::getOneNews($article_number); 
	$args['page'] = "more";
    return view('pages.page',$args);
});


Route::get('/archive/news/', function ($article_number = null){
	$args = array();
	$args['NewsMain'] = Articles::getNews(); 
	$args['page'] = 'news_archive';
    return view('pages.page',$args);
});