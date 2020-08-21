@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="mx-auto float-left m-b">
                    @include('components.back-button')
                </div>

                <div class="mx-auto float-right m-b">

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

    {{-- Fixing bug with .float-right and .Panel --}}
    <div class="clearfix"></div>

    <div class="container-fluid">
        <div class="row">
                @foreach($board->cards as $card)
                    <div class="card col-sm-2 m-l-22 p-0">

                        <div class="card-header">

                            <div class="float-left"><h5 class="m-0">{{ $card->name }}</h5></div>

                            <div class="float-right">
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

                        <div class="card-body">

                            <div class="list-group">
                                @foreach($card->tasks as $task)
                                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="col-sm-12 col-12 list-group-item list-group-item-action">
                                        <span class="col-sm-8 col-7" >{{ $task->title  }}</span>
                                        <span class="col-sm-2 col-3" >@include('tasks.components.priority-label')</span>
                                    </a>
                                @endforeach
                            </div>

                            <a href="{{ route('tasks.create', ['board' => $board->id, 'card' => $card->id]) }}">
                                <button class="btn btn-secondary col-sm-12 m-t-22">
                                    <h5 class="m-0"> @lang('tasks.createTask') </h5>
                                </button>
                            </a>

                        </div>

                    </div>
                @endforeach

                <a href="{{ route('cards.create', ['board' => $board->id]) }}" class="col-sm-2 m-l-22 p-0">
                    <button class="btn btn-secondary">
                        <h5 class="m-0"> @lang('cards.createCard') </h5>
                    </button>
                </a>
                </div>

            </div>
    </div>
@endsection
