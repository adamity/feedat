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
Route::get('/setting',function(){return view('users.index');});
Route::get('/delete-account',function(){return view('users.delete');});
Route::get('/change-password','UserController@editPassword');
Route::post('/change-password','UserController@updatePassword')->name('changepassword');

Route::get('/message/archived','MessageController@archived');
Route::resource('/message','MessageController');
Route::resource('/user','UserController');
Auth::routes();

Route::get('/home','HomeController@index');
Route::get('/{user}','MessageController@create');
