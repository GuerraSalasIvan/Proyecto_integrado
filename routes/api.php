<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Public\LoginController;
use App\Http\Controllers\Private\PlayerController as PrivatePlayerController;
use App\Http\Controllers\Public\PlayerController;
use App\Http\Controllers\Private\TeamController as PrivateTeamController;
use App\Http\Controllers\Public\TeamController;
use App\Http\Controllers\Private\GameController as PrivateGameController;
use App\Http\Controllers\Public\GameController;
use App\Http\Controllers\Private\GameDetailController as PrivateGameDetailController;
use App\Http\Controllers\Private\GamePlayerController as PrivateGamePlayerController;

use App\Http\Controllers\Public\LeagueController;
use App\Http\Controllers\Public\UbicationController;
use App\Http\Controllers\UserController;




Route::get('/dashboard', 'App\Http\Controllers\Public\MainPageController@index');

Route::get('/csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);
});

//
// CRUD PLAYERS
//

    //Public
    Route::resource('player', PlayerController::class)->only(['index','show']);


    //Private
    Route::get('/player/table/create', [PrivatePlayerController::class, 'create']);
    Route::resource('player', PrivatePlayerController::class)->except(['index','show','create','store']);
    Route::middleware('auth:api')->group(function () {
        Route::post('/player', [PlayerController::class, 'store']);
    });


//
// CRUD TEAMS
//

    //Public
    Route::resource('team', TeamController::class)->only(['index','show']);
    Route::get('/currentteams', [TeamController::class, 'getCurrentTeams']);


    //Private
    Route::get('/team/table/create', [PrivateTeamController::class, 'create']);
    Route::resource('team', PrivateTeamController::class)->except(['index','show','create']);


//
// CRUD GAMES
//

    //Public
    Route::resource('game', GameController::class)->only(['index','show']);
    Route::get('/game/details/{game}', [GameController::class, 'details']);
    Route::get('/arbitrated', [GameController::class, 'arbitrated']);


    //Private
    Route::get('/game/table/create', [PrivateGameController::class, 'create'])->name('game.create');
    Route::resource('game', PrivateGameController::class)->except(['index','show','create']);

//
// LEAGUES
//

    Route::get('/leagues', [LeagueController::class, 'index']);
    Route::get('/leagues/{year}', [LeagueController::class, 'show']);

//
// GAME DETAILS
//

    Route::resource('gameDetail', PrivateGameDetailController::class);


//
// GAME DETAILS
//

    Route::resource('gamePlayer', PrivateGamePlayerController::class);



//
// UBICATIONS
//

    Route::get('/ubications', [UbicationController::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);
Route::post('/assignTeam', [UserController::class, 'assignTeam']);
Route::post('/updateUser', [UserController::class, 'updateUser']);
