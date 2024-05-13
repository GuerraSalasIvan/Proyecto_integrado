<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\LoginController;
use App\Http\Controllers\Private\PlayerController as PrivatePlayerController;
use App\Http\Controllers\Public\PlayerController;
use App\Http\Controllers\Private\TeamController as PrivateTeamController;
use App\Http\Controllers\Public\TeamController;
use App\Http\Controllers\Private\GameController as PrivateGameController;
use App\Http\Controllers\Public\GameController;




Route::get('/', 'App\Http\Controllers\Public\MainPageController@index')->name('index');




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


//
// CRUD GAMES
//

    //Public
    Route::resource('game', GameController::class)->only(['index','show']);


    //Private
    Route::get('/game/table/create', [PrivateGameController::class, 'create'])->name('game.create');
    Route::resource('game', PrivateGameController::class)->except(['index','show','create']);





Auth::routes();



Route::get('/login', [LoginController::class, 'login'])->name('login');

