@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="mx-auto pull-left m-b">
                    @include('components.back-button')
                </div>

                <div class="clearfix"></div>

                <div class="panel panel-default">

                    <div class="panel-heading">

                        @lang('cards.titlePanelCreate')

                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('cards.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">@lang('cards.Name')</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label">@lang('cards.Status')</label>

                                <div class="col-md-6">
                                    <input id="status" type="text" class="form-control" name="status" value="{{ old('status') }}" required>

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('board_id') ? ' has-error' : '' }}" hidden>
                                <label for="board_id" class="col-md-4 control-label"></label>

                                <div class="col-md-6">
                                    <input id="board_id" type="text" class="form-control" name="board_id" value="{{ $board->id }}" required>

                                    @if ($errors->has('board_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('board_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('cards.addCard')
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