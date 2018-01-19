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

//Task routes
Route::get('/tasks', 'TasksController@index')->name('tasks');
Route::get('/tasks/create', 'TasksController@create')->name('tasks.create');
Route::post('/tasks', 'TasksController@store')->name('tasks.store');
Route::get('/tasks/{task}', 'TasksController@show')->name('tasks.show');
Route::get('/tasks/{task}/edit', 'TasksController@edit')->name('tasks.edit');
Route::patch('/tasks/{task}', 'TasksController@update')->name('tasks.update');
Route::delete('/tasks/{task}', 'TasksController@destroy')->name('tasks.destroy');
