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

//Home routes
Route::get('/home', 'HomeController@index')->name('home');

//Board routes
Route::resource('boards', 'BoardController');

//Card routes
Route::resource('cards', 'CardController');
Route::get('/{board}/cards/create', 'CardController@create')->name('boards.cards.create');

//Task routes
Route::resource('tasks', 'TaskController');
Route::get('/{board}/{card}/tasks/create', 'TaskController@create')->name('boards.cards.tasks.create');
