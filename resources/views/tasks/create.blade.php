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

                        @lang('tasks.titlePanelCreate')

                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('tasks.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">@lang('tasks.Title')</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">@lang('tasks.Description')</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" required></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                                <label for="priority" class="col-md-4 control-label">@lang('tasks.Priority')</label>

                                <div class="col-md-6">
                                    <select id="priority" class="form-control" name="priority" required>
                                        <option></option>
                                        <option value="0">@lang('tasks.priorityLow')</option>
                                        <option value="1">@lang('tasks.priorityNormal')</option>
                                        <option value="2">@lang('tasks.priorityHigh')</option>
                                    </select>

                                    @if ($errors->has('priority'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('priority') }}</strong>
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

                            <div class="form-group{{ $errors->has('card_id') ? ' has-error' : '' }}" hidden>
                                <label for="card_id" class="col-md-4 control-label"></label>

                                <div class="col-md-6">
                                    <input id="card_id" type="text" class="form-control" name="card_id" value="{{ $card->id }}" required>

                                    @if ($errors->has('card_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('card_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('tasks.addTask')
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