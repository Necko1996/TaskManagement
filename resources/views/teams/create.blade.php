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

                        @lang('teams.titlePanelCreate')

                    </div>

                    <div class="card-body">
                        <form  method="POST" action="{{ route('teams.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 col-form-label">@lang('teams.Name')</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="form-text">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('teams.addTeam')
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
