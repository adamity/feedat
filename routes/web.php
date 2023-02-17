<?php

Auth::routes();
Route::get('/', function () {
    if (Auth::check()) return redirect('/home');
    return view('pages.index');
});

Route::get('/home', 'HomeController@home');
Route::get('/setting', 'HomeController@setting');
Route::get('/delete-account', 'HomeController@deleteAccount');

Route::get('/user', 'UserController@show');
Route::get('/edit-info', 'UserController@editInfo');
Route::post('/edit-info', 'UserController@updateInfo')->name('updateinfo');
Route::get('/change-password', 'UserController@editPassword');
Route::post('/change-password', 'UserController@updatePassword')->name('changepassword');
Route::delete('/delete-account', 'UserController@destroy')->name('destroy');

Route::get('/message', 'MessageController@index');
Route::get('/{user}', 'MessageController@create');
Route::post('/send-message', 'MessageController@store')->name('sendmessage');
Route::get('/archive-message/{message}', 'MessageController@edit');
Route::get('/message/archived', 'MessageController@archived');
Route::delete('/delete-message/{message}', 'MessageController@destroy');
