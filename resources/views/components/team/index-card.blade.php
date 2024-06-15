<div class="divider">
    <a href="{{ route('team.show', $team->id)}}">
        <img src="{{$team->getMedia()->first()->getURL()}}" class="img-fluid" alt="Imagen 1">
    </a>
</div>
