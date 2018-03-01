@extends('layouts.app')

@section('content')
    <div class="container-fluid">
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
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
                {{-- Fixing bug with .Pull-Right and .Panel --}}
                <div class="clearfix"></div>

                @foreach($board->cards as $card)
                    <div class="panel panel-default col-sm-2 m-l-22">

                        <div class="panel-heading">

                            <div class="pull-left"><h5>{{ $card->name }}</h5></div>

                            <div class="pull-right">
                                <a href="#" onclick="document.getElementById('card-delete-form-{{ $card->id }}').submit()" style="margin-left: 10px">
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </a>

                                <a href="{{ route('cards.edit', ['card' => $card->id]) }}">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </a>

                                <form id="card-delete-form-{{ $card->id }}" action="{{ route('cards.destroy', ['card' => $card->id]) }}" method="POST" style="display: none">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                </form>
                            </div>

                            <div class="clearfix"></div>

                        </div>

                        <div class="panel-body">

                            <div class="list-group">
                                @foreach($card->tasks as $task)
                                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="col-sm-12 col-xs-12 list-group-item list-group-item-action">
                                        <span class="col-sm-8 col-xs-7" >{{ $task->title  }}</span>
                                        <span class="col-sm-2 col-xs-3" >@include('tasks.components.priority-label')</span>
                                    </a>
                                @endforeach
                            </div>

                            <a href="{{ route('boards.cards.tasks.create', ['board' => $board->id, 'card' => $card->id]) }}">
                                <button class="btn btn-default col-sm-12 m-t-22">
                                    <h5> @lang('tasks.createTask') </h5>
                                </button>
                            </a>

                        </div>

                    </div>
                @endforeach

                <a href="{{ route('boards.cards.create', ['board' => $board->id]) }}">
                    <button class="btn btn-default col-sm-2 m-l-22">
                        <h5> @lang('cards.createCard') </h5>
                    </button>
                </a>

            </div>
    </div>
@endsection