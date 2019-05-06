<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', 'BlogController@index')->name('home');
Route::post('/blog/create', 'BlogController@store');
Route::delete('/blog/delete/{id}', 'BlogController@destroy')->name('delete');
Route::get('/blog/{id}/edit', 'BlogController@edit')->name('edit');
Route::put('/blog/{id}/edit', 'BlogController@update');
Route::get('/blog/json','BlogController@json')->name('getjson');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
