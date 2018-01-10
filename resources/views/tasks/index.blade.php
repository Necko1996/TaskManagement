@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(!empty($tasks))

                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->id  }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>
                                        @if($task->status == 0)
                                            @lang('tasks.notActive')
                                        @elseif($task->status == 1)
                                            @lang('tasks.notActive')
                                        @elseif($task->status == 2)
                                            @lang('tasks.notActive')
                                        @else
                                            @lang('tasks.errorStatus')
                                        @endif
                                    </td>
                                    <td> {{ $task->created_at->diffForHumans() }}</td>
                                    <td> {{ $task->updated_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                @else

                        <h1 class="text-center">@lang('tasks.noneTasks')</h1>
                        <div class="col-md-12 text-center">
                            <a href="{{ url('/tasks/create') }}">
                                <button class="btn btn-primary">@lang('tasks.createFirstTask')</button>
                            </a>
                        </div>
                @endif


                </table>

            </div>
        </div>
    </div>
@endsection