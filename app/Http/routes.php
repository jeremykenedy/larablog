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

// Route::get('/', function () {
//     return view('welcome');
// });

// Blog pages
get('/', function () {
  return redirect('/blog');
});
get('blog', 'BlogController@index');
get('blog/{slug}', 'BlogController@showPost');
$router->get('contact', 'ContactController@showForm');
Route::post('contact', 'ContactController@sendContactInfo');
get('rss', 'BlogController@rss');
get('sitemap.xml', 'BlogController@siteMap');

// Admin area
get('admin', function () {
  return redirect('/admin/post');
});
$router->group([
  'namespace' => 'Admin',
  'middleware' => 'auth',
], function () {
  resource('admin/post', 'PostController', ['except' => 'show']);
  resource('admin/tag', 'TagController', ['except' => 'show']);
  get('admin/upload', 'UploadController@index');
  post('admin/upload/file', 'UploadController@uploadFile');
  delete('admin/upload/file', 'UploadController@deleteFile');
  post('admin/upload/folder', 'UploadController@createFolder');
  delete('admin/upload/folder', 'UploadController@deleteFolder');
});

// Logging in and out
get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');

// After this line
get('rss', 'BlogController@rss');


// Catch-all URL is last | Not Found Page
Route::any('/{page?}',function(){
  return View::make('blog.layouts.404');
})->where('page','.*');
