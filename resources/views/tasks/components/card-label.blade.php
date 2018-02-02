@foreach($cards as $card)
    @if($task->card_id == $card->id)
        <span class="label label-default">{{ $card->name }}</span>
    @endif
@endforeach