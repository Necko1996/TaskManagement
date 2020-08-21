@foreach($cards as $card)
    @if($task->card_id == $card->id)
        <span class="badge badge-light">{{ $card->name }}</span>
    @endif
@endforeach
