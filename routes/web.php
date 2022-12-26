<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Board routes
Route::resource('boards', BoardController::class);

//Card routes
Route::get('/{board}/cards/create', [CardController::class, 'create'])->name('cards.create');
Route::post('/{board}/cards', [CardController::class, 'store'])->name('cards.store');
Route::get('cards/{card}/edit', [CardController::class, 'edit'])->name('cards.edit');
Route::patch('cards/{card}', [CardController::class, 'update'])->name('cards.update');
Route::delete('cards/{card}', [CardController::class, 'destroy'])->name('cards.destroy');

//Task routes
Route::get('/{board}/{card}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/{board}/{card}/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::patch('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

//Team routes
Route::get('teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::post('teams', [TeamController::class, 'store'])->name('teams.store');
////Team User routes
Route::get('teams/user', [TeamController::class, 'addUser'])->name('teams.addUser');
Route::post('teams/user', [TeamController::class, 'storeUser'])->name('teams.storeUser');

Route::get('/home', [HomeController::class, 'index'])->name('home');
