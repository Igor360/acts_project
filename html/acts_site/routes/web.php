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





Route::get('/', [ 'as' => 'main_page', 'uses' => 'HomeController@index']);


Route:: group([ 'prefix' => 'about'], function (){

Route::get('/department', 'HomeController@department_page');

Route::get('/history','HomeController@history_page');

Route::get('/studlife','HomeController@studLife_page');

Route::get('/diplom','HomeController@diplom_page');

Route::get('/work','HomeController@employment_page');

Route::get('/practice','HomeController@practice_page');

});

Route::group(['prefix' => 'incoming'], function(){ 

Route::get('/1kurs','HomeController@incoming_1kurs_page');

Route::get('/5kurs','HomeController@incoming_5kurs_page');

Route::get('/offDoc','HomeController@incoming_offDoc_page');

Route::get('/studyACTS','HomeController@incoming_learnToActs_page');

Route::get('/actual_info','HomeController@incoming_actualInfo_page');

Route::get('/contacts','HomeController@incoming_contacts_page');

});

Route::get('/forstudents','HomeController@forStudents_page');

Route::get('/aspirantura','HomeController@aspirantura_page');

Route::get('/development','HomeController@development_page');

Route::get('/science','HomeController@science_page');

Route::get('/sport','HomeController@sport_page');

Route::get('/read/{article_number?}','HomeController@read_page');

Route::get('/archive/news/', 'HomeController@news_archive_page');

Route::get('/teachstaff/', 'HomeController@teachstaff_page');

Route::get('/teachstaff/more/{id?}', 'HomeController@teachstaffmore_page');

Route::get('/otherpersonal/', 'HomeController@otherpersonal_page');

Route::get('/masterdocs/{id?}', 'HomeController@masterdocs_page');

Route::get('/masterdocs/more/{id?}', "HomeController@masterdocs_more_page");

Route::get('/search/',['as' => 'search_article', 'uses' => 'HomeController@search_article_page']);

Auth::routes();

# user page routes
Route::group(['prefix' => 'user'], function (){

Route::get('/', 'UsersController@index')->name('home');

Route::get('/publication/', 'UsersController@publication');

Route::get('/conference/', 'UsersController@conference');

Route::get('/changeuser','UsersController@changeUserData');

Route::post('/changeuser','UsersController@updateUserData')->name('changeuser');

Route::get('/changeteacher','UsersController@changeTeacherData');

Route::post('/changeteacher','UsersController@updateTeacherData')->name('changeteacher');

Route::get('/changelink','UsersController@changeLinks');

Route::post('/changelink','UsersController@updateLinks')->name('changelinks');

Route::group(['prefix' => 'changepublications'], function(){

	Route::get('/','UsersController@changePublications');

	Route::post('/add','UsersController@addPublications')->name('addpublication');

	Route::post('/delete','UsersController@deletePublication')->name('deletepublication');

	Route::post('/{id?}/','UsersController@updatePublication')->name('updatepublication');

	Route::get('/{id?}/','UsersController@changePublication');

});

Route::group(['prefix' => 'changeconference'], function(){

	Route::get('/','UsersController@changeConference');

	Route::post('/add','UsersController@addConference')->name('addconference');

	Route::post('/delete','UsersController@deleteConference')->name('deleteconference');

	Route::post('/{id?}/','UsersController@updateConference')->name('updateconference');

	Route::get('/{id?}/','UsersController@changeoneConference');

});

Route::group(['prefix' => 'masterdocs'], function(){

	Route::get('/','UsersController@changeMasterDocs')->name('masterdocs');

	Route::post('/add/','UsersController@addMasterDocs')->name('addmasterdocs');

	Route::post('/delete/','UsersController@deleteMasterDocs')->name('deletemasterdoc');

	Route::get('/change/{id?}','
	UsersController@changeoneMasterDoc')->name('changemasterdata');

	Route::post('/change/update','UsersController@updateMasterDoc')->name('updatemasterdoc');

	Route::post('/change/delete','UsersController@deleteMasterFile')->name('deletemasterfile');

	Route::post('/change/addfiles','UsersController@addMasterFile')->name('addmasterfile');

});

});


# admin page routes

Route:: group([ 'prefix' => 'admin'], function (){

Route::get('/','AdminController@index')->name('adminhome');

Route::get('/add/','AdminController@Adduser')->name('adminadd');

Route::post('/add/user','AdminController@insertUser')->name('adminadduser');

Route::post('/delete/','AdminController@deleteUser')->name('deleteuser');

Route::get('/user/change/{id?}','AdminController@changeUser')->name('changeuser');

Route::post('/user/change/{id?}','AdminController@updateUser')->name('changeuserdata');

Route::group(['prefix' => 'articles'], function(){

	Route::get('/','AdminController@AllArticles')->name('adminarticles');

	Route::get('/add','AdminController@AddArticle')->name('adminarticleadd');	

	Route::post('/add','AdminController@insertArticle')->name('insertarticle');

	Route::post('/delete','AdminController@deleteArticles')->name('deletearticle');

	Route::get('/change/{id}','AdminController@changeArticle')->name('changearticledata');

	Route::post('/change/update','AdminController@updateArticle')->name('updatearticle');

	Route::post('/change/delete','AdminController@deleteArticleFile')->name('deletearticlefile');

	Route::post('/change/addfiles','AdminController@addArticleFiles')->name('addarticlefiles');

});

});

#files routes
Route::group(['prefix' => 'files'], function(){

Route::get('/get/{filename}', ['as' => 'getfile', 'uses' => 'FilesController@get']);

Route::get('/get/image/{filename}', ['as' => 'getimage', 'uses' => 'FilesController@getImage']);

Route::get('/getarticle/doc/{filename}', ['as' => 'getdocarticle', 'uses' => 'FilesController@getArticleDoc']);
});


 
//Route::get('files', 'FilesController@index');

//Route::post('files/add',[ 
  //      'as' => 'addentry', 'uses' => 'FilesController@add']);


//Route::get('/elfinder/ckeditor/','Barryvdh\Elfinder\ElfinderController@showPopup');