<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('index','PostsController@index');
Route::get('index/{sPost?}','PostsController@index')->name('posts.index');

Route::get('/create-form','PostsController@createForm');

Route::post('/post/create','PostsController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/login' ,'RegisterController@');
//  ↑にログイン画面へのルーティングを書く

Route::get('post/{id}/update-form','PostsController@updateForm');

Route::post('/post/update','PostsController@update');

Route::get('/post/{id}/delete','PostsController@delete');

// Route::post('/post/search','PostsController@search');
