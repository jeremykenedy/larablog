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

    Route::resource('posts', 'Admin\PostController',
        ['except' => 'show']
    );


    Route::resource('posts', 'Admin\PostController')->except([
        'show'
    ])->names([
        'create' => 'posts.create',
        'index' => 'admin.posts',
    ])->parameters([
        'post' => 'id'
    ]);


    Route::get('/', 'Admin\AdminController@index')->name('admin');
});

// Dynamic Pages Routes
Route::get('/{slug}/', 'BlogController@showPost');
