@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 m-b">

                <div class="clearfix"></div>
                @if(!empty($teams))

                    <div class="mx-auto pull-right m-b">
                        <a href="{{ route('teams.create') }}">
                            <button class="btn btn-primary">@lang('teams.createTeam') </button>
                        </a>

                        <a href="{{ route('teams.addUser') }}">
                            <button class="btn btn-primary">@lang('teams.addUser') </button>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    @foreach($teams as $team)

                        <div class="mx-auto pull-left m-b col-sm-12">
                            <h3>{{ $team->name }}</h3>
                        </div>

                        <div class="clearfix"></div>

                        <div class="mb-2 col-sm-offset-1">
                            @foreach($team->users as $user)
                                <a href="{{--{{ route('teams.show', ['teams' => $team->id]) }}--}}" class="hover">
                                    <div class="panel panel-default col-sm-5 m-l-22">
                                        <div class="panel-body">
                                            {{ $user->name }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <hr class="col-sm-12">

                    @endforeach

                @else

                    <h1 class="text-center m-b">@lang('teams.noneTeams')</h1>

                    <div class="col-md-12 text-center">
                        <a href="{{ route('teams.create') }}">
                            <button class="btn btn-primary">@lang('teams.createFirstTeam')</button>
                        </a>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection