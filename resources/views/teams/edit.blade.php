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

                        @lang('boards.titlePanelEdit')

                    </div>

                    <div class="card-body">
                        <form  method="POST" action="{{ route('boards.update', ['board' => $board->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 col-form-label">@lang('boards.Name')</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $board->name }}" required autofocus>

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
                                        @lang('boards.updateBoard')
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
