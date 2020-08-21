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

                        @lang('tasks.titlePanelEdit')

                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group">
                                <label for="title" class="col-md-4 col-form-label">@lang('tasks.Title')</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $task->title }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="form-text">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 col-form-label">@lang('tasks.Description')</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" required>{{ $task->description }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="form-text">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="card_id" class="col-md-4 col-form-label">@lang('tasks.Card')</label>

                                <div class="col-md-6">
                                    <select id="card_id" class="form-control" name="card_id" required>
                                        @foreach($cards as $card)
                                            <option value="{{ $card->id }}" @if($task->card_id == $card->id) selected @endif>{{ $card->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('card_id'))
                                        <span class="form-text">
                                        <strong>{{ $errors->first('card_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="priority" class="col-md-4 col-form-label">@lang('tasks.Priority')</label>

                                <div class="col-md-6">
                                    <select id="priority" class="form-control" name="priority" required>
                                        <option value="0" @if($task->priority == 0) selected @endif>@lang('tasks.priorityLow')</option>
                                        <option value="1" @if($task->priority == 1) selected @endif>@lang('tasks.priorityNormal')</option>
                                        <option value="2" @if($task->priority == 2) selected @endif>@lang('tasks.priorityHigh')</option>
                                    </select>

                                    @if ($errors->has('priority'))
                                        <span class="form-text">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 offset-md-4">
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
