<div class="d-flex justify-content-around align-items-center">
    <div>
        <h1>{{$game->local_team->name}} vs {{$game->visit_team->name}}</h1>
    </div>

    <div>
        <h2>{{$localPoints}} - {{$visitPoints}}</h2>
    </div>
</div>



<div class="row">
    <div class="col-6">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="stats-container">
                            <div class="row main-match-header">
                                <div class="col-3">
                                    <div class="stat">Nombre</div>
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
                                @foreach ($localTeamPlayers as $player)
                                    <x-game.player-game-detail :$player/>
                                @endforeach


                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="col-6">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="stats-container">
                        <div class="row main-match-header">
                            <div class="col-3">
                                <div class="stat">Nombre</div>
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

                            @foreach ($visitTeamPlayers as $player)
                                <x-game.player-game-detail :$player/>
                            @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>

    <div class="col-12 d-flex justify-content-center">
        <div class="col-10">
            <div class="d-flex flex-column justify-content-center align-items-center" style="background-color: rgba(86, 128, 193, 0.1); border: 1px solid #3F5270;">
                <h2 style="margin-bottom: 0px; padding: 10px;">Incidencias y observaciones</h2>
                <div style="background-color: #ffffff; border-top: 1px solid #3F5270; padding: 10px 10px 50px 10px; width: 100%; margin-bottom: 0px;">
                    {{$game->reports}}
                </div>
            </div>
        </div>
    </div>



</div>
