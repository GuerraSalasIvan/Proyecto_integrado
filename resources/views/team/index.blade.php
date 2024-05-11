@extends('layouts.landing')
@section('title', 'Gestion')

@section('content')


<div class="container">
    <div class="row">

        @foreach ($teams as $team)
            <div class="col-md-6">
                <x-team.index-card :$team />
            </div>
        @endforeach
        
    </div>
</div>



{{--
<x-player.card.mediumCard /> --}}

@endsection
