@extends('layouts.landing')
@section('title', 'Gestion')

@section('content')

    <div class="row">
        <div class="col-6">
            <div>
                <h1 class="player-title">{{$player->full_name}}</h1>
            </div>

            <div><x-player.card.player-info :$player/></div>

            <div>
                <h2>Estadisticas globales</h2>
                <x-player.season-average :$averages/>
            </div>

            <div>
                <h2>Estadisticas de temporada</h2>
                <x-player.season-average :averages=$seasonAverages/>
            </div>

        </div>
        <div class="col-6">
            <div>
                <h2>
                    Juegos Recientes
                </h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="stats-container">
                            <div class="row main-match-header">
                                <div class="col">
                                    <div class="stat">Fecha</div>
                                </div>
                                <div class="col">
                                    <div class="stat">Rival</div>
                                </div>
                                <div class="col">
                                    <div class="stat">Puntos</div>
                                </div>
                                <div class="col">
                                    <div class="stat">Rebotes</div>
                                </div>
                                <div class="col">
                                    <div class="stat">Asitencias</div>
                                </div>
                                <div class="col">
                                    <div class="stat">Robos</div>
                                </div>
                                <div class="col">
                                    <div class="stat">Tapones</div>
                                </div>
                            </div>

                                <x-match.player-match :$games :$player :$gamePlayers/>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>



@endsection
