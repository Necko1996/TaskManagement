@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="mx-auto float-left m-b">
                    @include('components.back-button')
                </div>

                <div class="clearfix"></div>

                <div class="card">

                    <div class="card-header">

                        @lang('teams.titlePanelAddUser')

                    </div>

                    <div class="card-body">
                        <form  method="POST" action="{{ route('teams.storeUser') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="email" class="col-md-4 col-form-label">@lang('teams.Email')</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="form-text">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="team_id" class="col-md-4 col-form-label">@lang('teams.Team')</label>

                                <div class="col-md-6">
                                    <select id="team_id" class="form-control" name="team_id" required>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('team_id'))
                                        <span class="form-text">
                                        <strong>{{ $errors->first('team_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('teams.addUser')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
