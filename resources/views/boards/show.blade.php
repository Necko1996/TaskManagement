@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="mx-auto pull-left m-b">
                    @include('components.back-button')
                </div>

                <div class="mx-auto pull-right m-b">

                    <a href="#" onclick="document.getElementById('board-delete-form').submit()" style="margin-left: 10px">
                        <button class="btn btn-danger">
                            @lang('boards.deleteBoard') <i class="fas fa-trash"></i>
                        </button>
                    </a>

                    <a href="{{ route('boards.edit', ['board' => $board->id]) }}">
                        <button class="btn btn-primary">
                            @lang('boards.editBoard') <i class="fas fa-pencil-alt"></i>
                        </button>
                    </a>
                </div>

                <form id="board-delete-form" action="{{ route('boards.destroy', ['board' => $board->id]) }}" method="POST" style="display: none">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                </form>

                {{-- Fixing bug with .Pull-Right and .Panel --}}
                <div class="clearfix"></div>

                @foreach($board->cards as $card)
                    <div class="panel panel-default">

                        <div class="panel-heading">

                            {{ $card->name }}

                            <div class="pull-right">

                            </div>

                        </div>

                        <div class="panel-body">

                            @foreach($card->tasks as $task)
                                {{ $task->name }}
                            @endforeach

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection