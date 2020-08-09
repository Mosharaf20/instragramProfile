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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

//Posts section
Route::get('/post/create','PostsController@create')->name('post.create');
Route::post('/post','PostsController@store')->name('post.store');
Route::get('/post/{post}', 'PostsController@show')->name('post.show');
Route::get('/','PostsController@index')->name('index')->middleware('verified');


Route::get('/profile/{user}', 'ProfileController@index')->name('profile.index');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::post('follow/{user}','FollowsController@store');