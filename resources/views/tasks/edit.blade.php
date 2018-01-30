@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="mx-auto pull-left m-b">
                    @include('tasks.components.back-button')
                </div>

                <div class="clearfix"></div>

                <div class="panel panel-default">
                    <div class="panel-heading">

                        @lang('tasks.titlePanelEdit')

                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">@lang('tasks.Title')</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $task->title }}" required autofocus>

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
                                    <textarea id="description" class="form-control" name="description" required>{{ $task->description }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label">@lang('tasks.Status')</label>

                                <div class="col-md-6">
                                    <select id="status" type="password" class="form-control" name="status" required>
                                        <option value="0" @if($task->status == 0) selected @endif>@lang('tasks.notActive')</option>
                                        <option value="1" @if($task->status == 1) selected @endif>@lang('tasks.inProgress')</option>
                                        <option value="2" @if($task->status == 2) selected @endif>@lang('tasks.Completed')</option>
                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                                <label for="priority" class="col-md-4 control-label">@lang('tasks.Priority')</label>

                                <div class="col-md-6">
                                    <select id="priority" class="form-control" name="priority" required>
                                        <option value="0" @if($task->priority == 0) selected @endif>@lang('tasks.priorityLow')</option>
                                        <option value="1" @if($task->priority == 1) selected @endif>@lang('tasks.priorityNormal')</option>
                                        <option value="2" @if($task->priority == 2) selected @endif>@lang('tasks.priorityHigh')</option>
                                    </select>

                                    @if ($errors->has('priority'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('tasks.updateTask')
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