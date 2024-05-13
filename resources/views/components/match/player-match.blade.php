@foreach ($gamePlayers as $gamePlayer)

    @php
        $opponentTeam = null;
        foreach ($games as $game) {
            if ($game->local_team_id == $player->teams->first()->id) {
                $opponentTeam = \App\Models\Team::find($game->visit_team_id);
                break;
            } elseif ($game->visit_team_id == $player->teams->first()->id) {
                $opponentTeam = \App\Models\Team::find($game->local_team_id);
                break;
            }
        }
    @endphp


    <div class="row justify-center items-center main-match-body">
        <div class="col">
            <div class="stat">{{ \Carbon\Carbon::parse($gamePlayer->game->match_date)->format('D. d/m') }}</div>
        </div>
        <div class="col">
            <div class="stat">{{ $opponentTeam ? $opponentTeam->name : 'Opponent' }}</div>
        </div>
        <div class="col">
            <div class="stat">{{ $gamePlayer->points }}</div>
        </div>
        <div class="col">
            <div class="stat">{{ $gamePlayer->rebounds }}</div>
        </div>
        <div class="col">
            <div class="stat">{{ $gamePlayer->assists }}</div>
        </div>
        <div class="col">
            <div class="stat">{{ $gamePlayer->steals }}</div>
        </div>
        <div class="col">
            <div class="stat">{{ $gamePlayer->blocks }}</div>
        </div>
    </div>
@endforeach
