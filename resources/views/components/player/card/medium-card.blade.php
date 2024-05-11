<div class="card mb-3"  style="border: 0">
    <div class="row" style="align-items: center">
        {{-- <div class="col-md-4">
            @if($player->getMedia()->first())
                <img src="{{$player->getMedia()->first()->getURL()}}" class="img-fluid card-img-top" alt="Event Image" style="max-height: 205px;">
            @else
                <img src="{{ asset('assets/img/Image2.png') }}" class="img-fluid card-img-top" alt="Event Image" style="max-height: 205px;">
            @endif
        </div> --}}
        <div class="col-md-8">
            <div class="card-body">
                <div class="fecha_event_div">
                    <span class="fecha_event"><strong>{{\Carbon\Carbon::parse($player->birthdate)->format('j M Y') }}</strong></span>
                </div>
                <h5 class="card-title"><strong>{{ $player->full_name }}</strong></h5>
                <p class="card-text">{{ Str::limit($player->position, 100, '...') }}</p>
                <div class="detalles_events_div">
                    <span class="card-text detalles_events"><small><a href="{{ route('player.show', $player->id)}}">Ver evento</a></small></span>
                </div>
            </div>
        </div>
    </div>
</div>
