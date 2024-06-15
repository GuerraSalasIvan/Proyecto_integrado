<a href="{{ route('game.show', $game->id)}}">
<div class="row d-flex justify-content-around align-items-center main-match-body">


    <div class="col">{{ $game->local_team->name }}</div>
    <div class="col">
        {{-- Suma de los puntos del equipo local --}}
        {{ $game->gameDetails->local_first_cuarter +
           $game->gameDetails->local_second_cuarter +
           $game->gameDetails->local_third_cuarter +
           $game->gameDetails->local_fourth_cuarter }}
           -
        {{ $game->gameDetails->visit_first_cuarter +
            $game->gameDetails->visit_second_cuarter +
            $game->gameDetails->visit_third_cuarter +
            $game->gameDetails->visit_fourth_cuarter }}
    </div>
    <div class="col">{{ $game->visit_team->name }}</div>
    <div class="col">{{ $game->leagues->name}}</div>
    <div class="col">{{ $game->gameDetails->mvps->full_name }}</div>
</div>
</a>
