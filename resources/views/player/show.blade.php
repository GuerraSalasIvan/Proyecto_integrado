@extends('layouts.landing')
@section('title', 'Gestion')

@section('content')

    <div class="row">
        <div class="col-6">
            <div>
                <p>{{$player->full_name}}</p>
            </div>

            <div>Card</div>

            <div>Estadisticas de temporada</div>

            <div>Estadisticas globales</div>

        </div>
        <div class="col-6">
            <div>Juegos Recientes</div>
            @foreach ($player->teams as $team)
                @if ($team->year == now()->year-1)
                    <img src={{$team->getFirstMedia()->getURL()}}/>
                @endif
            @endforeach

        </div>

    </div>



@endsection
