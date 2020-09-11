@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 m-b">

                @if(!empty($teams))
                    <div class="mx-auto float-right m-b">
                        <a href="{{ route('boards.create') }}">
                            <button class="btn btn-primary">@lang('boards.createBoard') </button>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="mb-2 offset-sm-1">
                        @foreach($teams as $team)

                            <div class="mx-auto float-left m-b col-sm-12">
                                <h3>{{ $team->name }}</h3>
                            </div>

                            @foreach($team->boards as $board)

                                <a href="{{ route('boards.show', ['board' => $board->id]) }}" class="hover text-center">
                                    <div class="card col-sm-5 mb-2 ml-0">
                                        <div class="card-body">
                                            {{ $board->name }}
                                        </div>
                                    </div>
                                </a>

                            @endforeach

                            <hr class="col-sm-12 m-2">
                            <div class="clearfix"></div>

                        @endforeach
                    </div>

                @else

                    <h1 class="text-center m-b">@lang('boards.noneBoards')</h1>

                    <div class="col-md-12 text-center">
                        <a href="{{ route('boards.create') }}">
                            <button class="btn btn-primary">@lang('boards.createFirstBoard')</button>
                        </a>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection
