@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">

                        @lang('tasks.titlePanelShow')
                        <span class="pull-right">
                            @include('tasks.components.select-label')
                        </span>

                    </div>

                    <div class="panel-body">

                        <h3 class="text-center">{{ $task->title }}</h3>


                        <h4 >@lang('tasks.Description'):</h4>
                        {{ $task->body }}

                        <hr>

                        <ul class="list-group">

                            <li class="list-group-item justify-content-between">
                                @lang('tasks.Status'):
                                <span class="pull-right">
                                    @include('tasks.components.select-label')
                                </span>
                            </li>

                            <li class="list-group-item justify-content-between">
                                @lang('tasks.Created'):
                                <span class="label label-default pull-right">{{ $task->created_at->toDateString() }}</span>
                            </li>

                            <li class="list-group-item justify-content-between">
                                @lang('tasks.Updated'):
                                <span class="label label-default pull-right">{{ $task->updated_at->toDateString() }}</span>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection