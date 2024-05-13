@extends('layouts.landing')
@section('title', 'Gestion')

@section('content')

    <div class="row">
        <div class="col-6">
            <div>
                <p>{{$player->full_name}}</p>
            </div>

            <div>Card</div>

            <div>
                <h2>Estadisticas de temporada</h2>
                <x-player.season-average :$averages/>
            </div>

            <div>
                <h2>Estadisticas globales</h2>

            </div>

        </div>
        <div class="col-6">
            <div>Juegos Recientes</div>
            @foreach ($player as $player)

            @endforeach

        </div>

    </div>



@endsection
