<div>
    <div class="titulo_events_div d-flex ">
        <h1 class="titulo_events" style="margin: 10px">{{$team->name}}</h1>
    </div>

    <div>
        <h2>Promedios de equipo</h2>
    </div>

    <div>
        <h2>Jugadores</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">

            @foreach ($team->players as $player)
                <div class="col">
                    <x-player.card.mediumCard :$player />
                </div>
            @endforeach
        </div>
    </div>


</div>
