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

// Homepage Route
Route::get('/', 'BlogController@index')->name('home');

// Authors Routes
Route::get('/authors', 'BlogController@authors')->name('authors');
Route::get('/author/{author}', 'BlogController@author')->name('author');

// RSS Feed Route
Route::feeds();

// Register, Login, and forget PW Routes
Auth::routes();

// Super Admin only routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission:perms.super.admin']], function () {
    //
});

// Writer and above routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission:perms.writer']], function () {
    Route::resource('posts', 'Admin\PostController', [
        'names'    => [
            'create' => 'posts.create',
            'index'  => 'admin.posts',
            'update' => 'updatepost',
            // 'store'   => 'storepage',
            // 'update'  => 'updatepage',
        ],
        'except' => [
            'show',
        ],
        'parameters' => [
            'post' => 'id',
        ],
    ]);

    Route::get('/', 'Admin\AdminController@index')->name('admin');
});

// Dynamic Pages Routes
Route::get('/{slug}/', 'BlogController@showPost');
