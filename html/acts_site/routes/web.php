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
use App\Teachers as Teachers;
use App\User as User;
use App\MasterWorks as MasterWorks;


Route::get('/elfinder/ckeditor/','Barryvdh\Elfinder\ElfinderController@showPopup');

Route::get('/', function () {
	$args = array();
	$args['Articles'] = Articles::getpageArticles('home'); 
	$args['NewsMain'] = Articles::getSomeNews(3); 
	$args['page'] = "home";
    return view('pages.home',$args);
})->name('main_page');


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


Route::get('/archive/news/', function (){
	$args = array();
	$args['NewsMain'] = Articles::getNews(); 
	$args['page'] = 'news_archive';
    return view('pages.page',$args);
});



Route::get('/teachstaff/', function (){
	$args['page'] = 'about';
	$args['namepage'] = "Педагогічний склад";
	$args['persons'] = Teachers:: getTeachersForPage(1);
    return view('pages.teachstaff',$args);
});

Route::get('/teachstaff/more/{id?}', function ($id = null){
	$args['page'] = 'about';
	$args['namepage'] = "Педагогічний склад";
	$args['teacher'] = Teachers::getTeacherData($id);
	$args['user_id'] = Teachers::where('id',$id)->get()[0]->user_id;
    $args['user'] = User::where('id',$args['user_id'])->get()[0];
    return view('pages.teachstaffmore',$args);
});


Route::get('/otherpersonal/', function (){
	$args['page'] = 'about';
	$args['namepage'] = "Допоміжний персонал";
	$args['persons'] = Teachers:: getTeachersForPage(0);
    return view('pages.teachstaff',$args);
});

Route::get('/masterdocs/{id?}', function ($id = null){
	$args['page'] = 'about';
	$args['namepage'] = "Допоміжний персонал";
	$args['docs'] = MasterWorks::where('user_id', $id)->get();
    return view('pages.masterdocs',$args);
});

Route::get('/masterdocs/more/{id?}', function ($id = null){
	$args['page'] = 'about';
	$args['namepage'] = "Допоміжний персонал";
	$args['doc'] = MasterWorks::where('id', $id)->get()[0];
    return view('pages.masterdocs',$args);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/publication/', 'HomeController@publication');

Route::get('/home/conference/', 'HomeController@conference');

Route::get('/home/changeuser','HomeController@changeUserData');

Route::post('/home/changeuser','HomeController@updateUserData')->name('changeuser');

Route::get('/home/changeteacher','HomeController@changeTeacherData');

Route::post('/home/changeteacher','HomeController@updateTeacherData')->name('changeteacher');

Route::get('/home/changelink','HomeController@changeLinks');

Route::post('/home/changelink','HomeController@updateLinks')->name('changelinks');

Route::get('/home/changepublications','HomeController@changePublications');


Route::post('/home/changepublications/add','HomeController@addPublications')->name('addpublication');

Route::post('/home/changepublications/delete','HomeController@deletePublication')->name('deletepublication');

Route::post('/home/changepublications/{id?}/','HomeController@updatePublication')->name('updatepublication');

Route::get('/home/changepublications/{id?}/','HomeController@changePublication');




Route::get('/home/changeconference','HomeController@changeConference');

Route::post('/home/changeconference/add','HomeController@addConference')->name('addconference');

Route::post('/home/changeconference/delete','HomeController@deleteConference')->name('deleteconference');

Route::post('/home/changeconference/{id?}/','HomeController@updateConference')->name('updateconference');

Route::get('/home/changeconference/{id?}/','HomeController@changeoneConference');

Route::get('/home/masterdocs','HomeController@changeMasterDocs')->name('masterdocs');

Route::post('/home/masterdocs/add/','HomeController@addMasterDocs')->name('addmasterdocs');


Route::post('/home/masterdocs/delete/','HomeController@deleteMasterDocs')->name('deletemasterdoc');

Route::get('/home/masterdocs/change/{id?}','HomeController@changeoneMasterDoc');

Route::post('/home/masterdocs/change/update','HomeController@updateMasterDoc')->name('updatemasterdoc');

Route::get('/admin/','AdminController@index')->name('adminhome');

Route::get('/admin/add/','AdminController@Adduser')->name('adminadd');

Route::post('/admin/add/user','AdminController@insertUser')->name('adminadduser');

Route::post('/admin/delete/','AdminController@deleteUser')->name('deleteuser');

Route::get('/admin/user/change/{id?}','AdminController@changeUser')->name('changeuser');

Route::post('/admin/user/change/{id?}','AdminController@updateUser')->name('changeuserdata');

Route::get('/admin/articles/','AdminController@AllArticles')->name('adminarticles');

Route::get('/admin/articles/add','AdminController@AddArticle')->name('adminarticleadd');

Route::post('/admin/articles/add','AdminController@insertArticle')->name('insertarticle');

Route::post('/admin/articles/delete','AdminController@deleteArticles')->name('deletearticle');

Route::get('/admin/articles/change/{id}','AdminController@changeArticle');

Route::post('/admin/articles/change/update','AdminController@updateArticle')->name('updatearticle');









 
Route::get('files', 'FilesController@index');
Route::get('files/get/{filename}', [
	'as' => 'getentry', 'uses' => 'FilesController@get']);
Route::post('files/add',[ 
        'as' => 'addentry', 'uses' => 'FilesController@add']);