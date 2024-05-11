<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\LoginController;
use App\Http\Controllers\Private\PlayerController as PrivatePlayerController;
use App\Http\Controllers\Public\PlayerController;
use App\Http\Controllers\Private\TeamController as PrivateTeamController;
use App\Http\Controllers\Public\TeamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


//
// CRUD PLAYERS
//

    //Public
    Route::resource('player', PlayerController::class)->only(['index','show']);


    //Private
    Route::get('/player/table/create', [PrivatePlayerController::class, 'create'])->name('news.create');
    Route::resource('player', PrivatePlayerController::class)->except(['index','show','create']);


//
// CRUD TEAMS
//

    //Public
    Route::resource('team', TeamController::class)->only(['index','show']);


    //Private
    Route::get('/team/table/create', [PrivateTeamController::class, 'create'])->name('news.create');
    Route::resource('team', PrivateTeamController::class)->except(['index','show','create']);




Auth::routes();



Route::get('/login', [LoginController::class, 'login'])->name('login');

