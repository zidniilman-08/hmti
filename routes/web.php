<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Events\NotifusEvent;

Route::group(['middleware' => 'xss','web'], function(){

  Route::resource('/','HomeController');
  
  Route::resource('/artikels','PostController');
  
  Route::get('/artikels/{slug}',['as' => 'post', 'uses' => 'PostController@show'])->where('slug', '[A-Za-z0-9-_]+');
  
  Route::post('/artikels/{slug}/postcomment','CommentController@store')->name('/commentpost');
  
  Route::get('/artikels/kategori/{kategori}','PostController@kategori');
  
  Route::get('/artikels/kategories/{kategori}','PostController@kaegori');
  
  Route::get('/tutorial/tags/{tag}','TagsController@index')->where('tag', '[A-Za-z0-9-_]+');

  Route::get('/events','EventController@index');

  Route::get('/forums','ForumsController@index');

  Route::post('/addforum','ForumsController@store')->middleware('auth');

  Route::get('/removeforum/{slug}','ForumsController@remove')->middleware('auth');

  Route::get('/forums/{slug}','ForumsController@show');

  Route::post('/forums/forums-post/{id}','ForumsController@forumpost')->name('/forums-post')->middleware('auth');

  Route::get('/aboutus','AboutController@index');

  Route::get('/find','SearchController@find');

  Route::post('favorite/{artikel}', 'PostController@favoritePost')->middleware('auth');
  
  Route::post('unfavorite/{artikel}', 'PostController@unFavoritePost')->middleware('auth');;

  Route::get('/email-verify',function(){
    return view('email.emailverification');
  });
  
  Route::get('event', function() {
    event(new NotifusEvent('Ok sipp jalan'));
  });
  
  Route::get('register', 'Auth\RegisterController@index');

  Route::post('registers', 'Auth\RegisterController@register');

  Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

  Route::get('login','Auth\LoginController@formlogin');

  Route::get('profile/{slug}','ProfilesController@index')->where('slug', '[A-Za-z0-9-_]+')->name('profile/')->middleware('auth');

  Route::get('profile/{slug}/create-post','ProfilesController@createpost')->name('createpost/')->middleware('auth');

  Route::post('profile/{slug}/postcreate','ProfilesController@createPostUser')->name('createuspost/');

  Route::get('profile/{slug}/favorites','ProfilesController@favoritPost')->name('favoritePost/');


  Route::post('/savepict','CropController@savepict');

  Route::post('/croppict','CropController@croppict');

  Route::post('image-crop', 'ProfilesController@imageCropPost');

  Route::post('cover-crop', 'ProfilesController@coverCrop');

  Route::get('tutorials', 'TutorialController@index');

});




Route::group(['middleware' => 'xss','web','api'], function(){

  Route::auth();
	
  Route::get('tagsrc',array('as'=>'tagsrc','uses'=>'SearchController@tagsrc'));

  Route::resource('forum','RoomController');

  Route::resource('dashboard','dashboardController');

  Route::resource('user','adminUserController');

  Route::get('users','adminUserController@getUser')->name('getUser');

  Route::post('/saveimage','AdminController@saveimage');

  Route::post('/savecrops','AdminController@cropimage');

  Route::post('/updateprofile','AdminController@updateprofile');

  Route::post('ubah_menu','adminUserController@prosespengat');

  Route::get('hapus_user/{id}','adminUserController@destroy');
  
  Route::post('logins','Auth\LoginController@logins');

  Route::get('logout','Auth\LoginController@logout');

  Route::post('/tambahuser','Auth\AuthController@register');

  Route::post('/tambahadmin','AdminController@tambahadmin');

  Route::post('prosesedit', 'AdminController@prosesedit');

  Route::resource('kategori','kategoriController');

  Route::post('update_kategori','kategoriController@update');

  Route::post('/hapus_kategori','kategoriController@destroy');

  Route::resource('/artikel','artikelController');

  Route::get('artikel/hapus/{id}','artikelController@destroy');

  Route::get('publish/{id}','artikelController@publish');

  Route::get('notpublish/{id}','artikelController@notpublish');

  Route::resource('/calendar','TaskController');

  Route::resource('visitor','VisitorController');

  Route::resource('pengaturan','pengaturanController');

  Route::post('ubah_ket','adminUserController@prosesabout');

  Route::post('upload', ['as' => 'upload-post', 'uses' =>'artikelController@postUpload']);

  Route::get('/notification','NotificationController@getNotif')->name('getNotif');
  
  Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
  });

});
