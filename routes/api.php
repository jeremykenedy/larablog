<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', 'Api\BlogController@index')->name('api');
Route::get('posts', 'Api\BlogController@posts')->name('api-posts');
Route::get('posts/all', 'Api\BlogController@allPosts')->name('api-all-posts');
Route::get('post/latest', 'Api\BlogController@latestPost')->name('api-latest-post');
