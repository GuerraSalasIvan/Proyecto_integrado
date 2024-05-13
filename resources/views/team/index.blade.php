@extends('layouts.landing')
@section('title', 'Gestion')

@section('content')


<div class="container">
    <div class="row">

        @foreach ($teams as $team)

            @if ($team->leagues && $team->leagues->year == date('Y')-1)
                <div class="col-md-6">
                    <x-team.index-card :$team />
                </div>
            @endif
        @endforeach


    </div>
</div>



{{--
<x-player.card.mediumCard /> --}}

@endsection
