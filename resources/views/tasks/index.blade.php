@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 m-b">

                <div class="clearfix"></div>
                @if(!empty($tasks))

                    <div class="mx-auto pull-right m-b">
                        <a href="{{ url('/tasks/create') }}">
                            <button class="btn btn-primary">@lang('tasks.createTask') </button>
                        </a>
                    </div>

                    <div class="mb-2">
                        <div class="list-group">
                            <a class="col-sm-12 col-xs-12 list-group-item list-group-item-action disabled">
                                <span class="col-sm-2 col-xs-2" >@lang('tasks.ID')</span>
                                <span class="col-sm-8 col-xs-7" >@lang('tasks.Title')</span>
                                <span class="col-sm-2 col-xs-3" >@lang('tasks.Status')</span>
                            </a>

                            @foreach($tasks as $task)
                                <a href="{{ url('/tasks/' . $task->id) }}" class="col-sm-12 col-xs-12 list-group-item list-group-item-action">
                                    <span class="col-sm-2 col-xs-2" >{{ $task->id  }}</span>
                                    <span class="col-sm-8 col-xs-7" >{{ $task->title  }}</span>
                                    <span class="col-sm-2 col-xs-3" >@include('tasks.components.select-label')</span>
                                </a>
                            @endforeach
                        </div>

                    </div>

                @else

                    <h1 class="text-center m-b">@lang('tasks.noneTasks')</h1>

                    <div class="col-md-12 text-center">
                        <a href="{{ url('/tasks/create') }}">
                            <button class="btn btn-primary">@lang('tasks.createFirstTask')</button>
                        </a>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection