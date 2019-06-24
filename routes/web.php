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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/posts/create', 'PostsController@create')->name('posts.create');
Route::post('/posts/store', 'PostsController@store')->name('posts.store');
Route::get('/posts/edit/{id}', 'PostsController@edit')->name('posts.edit');
Route::post('/posts/update/{id}', 'PostsController@update')->name('posts.update');
Route::get('/posts/view/{id}', 'PostsController@view')->name('posts.view');
Route::get('/posts/delete/{id}', 'PostsController@delete')->name('posts.delete');



Route::post('/authentication/login', 'AuthenticationController@login')->name('posts.login');
Route::post('/authentication/logout', 'AuthenticationController@logout')->name('posts.logout');