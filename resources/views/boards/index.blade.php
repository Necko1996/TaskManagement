@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 m-b">

                <div class="clearfix"></div>
                @if(!empty($boards))

                    <div class="mx-auto pull-right m-b">
                        <a href="{{ route('boards.create') }}">
                            <button class="btn btn-primary">@lang('boards.createBoard') </button>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="mb-2 col-sm-offset-1">
                        @foreach($boards as $board)
                            <a href="{{ route('boards.show', ['boards' => $board->id]) }}" class="hover">
                                <div class="panel panel-default col-sm-5 m-l-22">
                                    <div class="panel-body">
                                        {{ $board->name  }}
                                    </div>
                                </div>
                            </a>
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