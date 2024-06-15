<div class="card card-player-info text-white">
    <div class="card-body" style="margin-bottom:0px">
        <span class="badge bg-secondary">Inscrito desde {{ \Carbon\Carbon::parse($player->created_at)->format('Y') }}</span>

        <h5 class="card-title text-white fw-bold mt-2">Copa Primavera 2022 (Maria Zambrano Rosa)</h5>
        <h6 class="card-subtitle mb-2 text-white fw-bold">1º Liga regular 2022 (Maria Zambrano Rosa)</h6>
        <div class="d-flex" style="margin-bottom:0px">
            <p class="card-text m-0">
                <strong>Jugador:</strong> Ala-pivot<br>
            </p>
            <p class="card-text m-0 ms-2">{{$player->teams->first()->name}}</p>
        </div>
    </div>
</div>



