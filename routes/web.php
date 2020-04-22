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

Route::get('/',function(){return view('pages.index');});
Route::get('/setting',function(){return view('pages.setting');});

Route::get('/message/archived','MessageController@archived');
Route::resource('/message','MessageController');
Route::resource('/user','UserController');
Auth::routes();

Route::get('/home','HomeController@index');
Route::get('/{user}','MessageController@create');
