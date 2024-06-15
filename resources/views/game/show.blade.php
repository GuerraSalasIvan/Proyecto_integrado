@extends('layouts.landing')
@section('title', 'Gestion')

@section('content')

    <x-game.game-detail :$game :$localPoints :$visitPoints :$localTeamPlayers :$visitTeamPlayers />

@endsection
