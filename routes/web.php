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

Auth::routes(['verify' => true]);

//Home routes
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//Board routes
Route::resource('boards', 'BoardController');

//Card routes
Route::get('/{board}/cards/create', 'CardController@create')->name('cards.create');
Route::post('/{board}/cards', 'CardController@store')->name('cards.store');
Route::get('cards/{card}/edit', 'CardController@edit')->name('cards.edit');
Route::patch('cards/{card}', 'CardController@update')->name('cards.update');
Route::delete('cards/{card}', 'CardController@destroy')->name('cards.destroy');

//Task routes
Route::get('/{board}/{card}/tasks/create', 'TaskController@create')->name('tasks.create');
Route::post('/{board}/{card}/tasks', 'TaskController@store')->name('tasks.store');
Route::get('tasks/{task}', 'TaskController@show')->name('tasks.show');
Route::get('tasks/{task}/edit', 'TaskController@edit')->name('tasks.edit');
Route::patch('tasks/{task}', 'TaskController@update')->name('tasks.update');
Route::delete('tasks/{task}', 'TaskController@destroy')->name('tasks.destroy');

//Team routes
Route::get('teams', 'TeamController@index')->name('teams.index');
Route::get('teams/create', 'TeamController@create')->name('teams.create');
Route::post('teams', 'TeamController@store')->name('teams.store');
////Team User routes
Route::get('teams/user', 'TeamController@addUser')->name('teams.addUser');
Route::post('teams/user', 'TeamController@storeUser')->name('teams.storeUser');

Route::get('/home', 'HomeController@index')->name('home');
