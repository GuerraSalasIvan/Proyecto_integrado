<div>
    <div class="titulo_events_div d-flex ">
        <p class="titulo_events" style="margin: 10px">{{$team->name}}</p>
    </div>


    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
        @foreach ($team->players as $player)
            <div class="col">
                <x-player.card.mediumCard :$player />
            </div>
        @endforeach
    </div>


</div>
